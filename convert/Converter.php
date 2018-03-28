<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
require_once __DIR__ . '/util/CodeConverter.php';
require_once __DIR__ . '/util/PreformattedConverter.php';

use League\HTMLToMarkdown\Environment;
use League\HTMLToMarkdown\HtmlConverter;
class Converter {
    /** @var modX */
    protected $modx;
    /** @var HtmlConverter  */
    protected $converter;

    protected static $ignoreIDs = [
        2, //404 page
        1314, // create
        1313, // edit
        1327, // login
        1315, // preview
        1328, // sitemap
        1701, // ajax search results
        1326, // search
        1703, // prefetch
        1325, // search results

        485, // empty resource uri redirecting to 264
        1653, // the xPDO 1.x root, we don't need this anymore
        345, // the revolution/aliases/ section
        1655, // empty index file
    ];

    protected static $ignoreContexts = [
        'evolution',
        'extras',
    ];

    public function __construct()
    {
        $this->modx = new modX();
        $this->modx->initialize('web');
        $this->modx->getService('error','error.modError', '', '');
        $this->modx->setLogTarget('ECHO');

        // Get the League's converter

        $options = array(
            'header_style' => 'atx', // Set to 'atx' to output H1 and H2 headers as # Header1 and ## Header2
            'suppress_errors' => true, // Set to false to show warnings when loading malformed HTML
            'strip_tags' => true, // Set to true to strip tags that don't have markdown equivalents. N.B. Strips tags, not their content. Useful to clean MS Word HTML output.
            'bold_style' => '**', // Set to '__' if you prefer the underlined style
            'italic_style' => '_', // Set to '*' if you prefer the asterisk style
            'remove_nodes' => '', // space-separated list of dom nodes that should be removed. example: 'meta style script'
            'hard_break' => true, // Set to true to turn <br> into `\n` instead of `  \n`
            'list_item_style' => '-', // Set the default character for each <li> in a <ul>. Can be '-', '*', or '+'
        );

        $environment = Environment::createDefaultEnvironment($options);
        $environment->addConverter(new CodeConverter());
        $environment->addConverter(new PreformattedConverter());
        $this->converter = new HtmlConverter($environment);

        $this->outputDir = dirname(__DIR__) . '/en/';
    }

    public function magic()
    {

        $c = $this->modx->newQuery('modResource');
        $c->where([
            'parent' => 0,
            'context_key:NOT IN' => self::$ignoreContexts,
            'published' => true
        ]);
        foreach ($this->modx->getIterator('modResource', $c) as $rootResource) {
            $this->convertResource($rootResource, $rootResource->get('context_key') . '/');
        }
    }

    public function convertResource(modResource $resource, $currentDirectory = '/', $currentParent = 0)
    {
        if (in_array($resource->get('id'), self::$ignoreIDs, true)) {
            echo "Ignoring resource {$resource->get('id')} as its blacklisted ({$resource->get('pagetitle')})\n";
            return;
        }
        // Prepare the file meta
        $fileMeta = [
            'title' => $resource->get('pagetitle'),
            '_old_id' => $resource->get('id'),
            '_old_uri' => $resource->get('uri'),
        ];
        $desc = $resource->get('description');
        if (!empty($desc)) {
            $fileMeta['description'] = $this->parseInline($desc);
        }
        $introtext = $resource->get('introtext');
        if (!empty($introtext)) {
            $fileMeta['summary'] = $this->parseBlock($introtext);
        }

        // Prepare the content
        $content = $resource->get('content');
        $content = $this->parseBlock($content);

        // Create the markdown file
        $output = "---\n";
        foreach ($fileMeta as $key => $value) {
            $value = str_replace('"', '\"', $value);
            $output .= "{$key}: \"{$value}\"\n";
        }
        $output .= "---\n\n";
        $output .= $content;

        // Get the file name
        $name = $resource->get('alias');
        if (empty($name)) {
            $name = $this->modx->filterPathSegment($resource->get('pagetitle'));
        }
        $name .= $resource->get('isfolder') ? '/index.md' : '.md';

        $childDirectory = $currentDirectory . $resource->get('alias') . '/';
        $ignoreParent = false;
        // Handle resource-specific overrides to clean things up
        switch ($resource->get('id')) {
            // Home!
            case 1:
                $currentDirectory = '/';
                $name = 'index.md';
                break;

            // Move revolution/2.x/ into /
            case 3:
                $childDirectory = '/';
                $ignoreParent = true;
                break;

            // Move xpdo/2.x/ into /
            case 1183:
                $childDirectory =  '/xpdo/';
                $ignoreParent = true;
                break;

            // Move web/style-guide into community
            case 1312:
                $currentDirectory = '/community/';
                break;
        }

        if (!$ignoreParent) {
            $absFileName = $this->outputDir . $currentDirectory . $name;
            $this->ensureCanBeWritten($absFileName);
            file_put_contents($absFileName, $output);

            echo $currentDirectory . $name . ' converted' . "\n";
        }

        $c = $this->modx->newQuery('modResource');
        $c->where([
            'parent' => $resource->get('id'),
            'published' => true,
        ]);
        foreach ($this->modx->getIterator('modResource', $c) as $childResource) {
            $this->convertResource($childResource, $childDirectory, $resource->get('id'));
        }
    }

    public function parseBlock($content)
    {
        try {
            $parsed = $this->converter->convert($content);


            // Filter out parts of the links to turn 'm into relative links
            $stripUrls = [
                'revolution/2.x/' => '',
                'xpdo/2.x/' => 'xpdo/'
            ];
            foreach ($stripUrls as $stripUrl => $newTarget) {
                $parsed = str_replace([
                    '](' . $stripUrl,
                    '](/' . $stripUrl,
                    '](https://docs.modx.com/' . $stripUrl,
                    '](http://docs.modx.com/' . $stripUrl,
                    '](https://rtfm.modx.com/' . $stripUrl,
                    '](http://rtfm.modx.com/' . $stripUrl,
                ], '](' . $newTarget, $parsed);

            }

            return $parsed;
        }
        catch (Exception $e) {
            echo "!!! Invalid HTML content found\n";
            return $content;
        }
    }

    public function parseInline($content)
    {
        try {
            return $this->converter->convert($content);
        }
        catch (Exception $e) {
            echo "!!! Invalid inline HTML content found\n";
            return $content;
        }
    }

    public function ensureCanBeWritten($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }

        $path = dirname($path);
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }
}