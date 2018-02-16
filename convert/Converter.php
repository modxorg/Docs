<?php
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
    ];

    protected static $ignoreContexts = [
        'evolution'
    ];

    public function __construct()
    {
        require_once __DIR__ . '/vendor/autoload.php';
        require_once dirname(__DIR__) . '/config.core.php';
        require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
        $this->modx = new modX();
        $this->modx->initialize('web');
        $this->modx->getService('error','error.modError', '', '');
        $this->modx->setLogTarget('ECHO');

        // Get the League's converter
        $this->converter = new HtmlConverter();

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
        $absFileName = $this->outputDir . $currentDirectory . $name;
        $this->ensureCanBeWritten($absFileName);
        file_put_contents($absFileName, $output);

        echo $currentDirectory . $name . ' converted'."\n";

        $c = $this->modx->newQuery('modResource');
        $c->where([
            'parent' => $resource->get('id'),
            'published' => true,
        ]);
        foreach ($this->modx->getIterator('modResource', $c) as $childResource) {
            $this->convertResource($childResource, $currentDirectory . $resource->get('alias') . '/', $resource->get('id'));
        }
    }

    public function parseBlock($content)
    {
        try {
            $parsed = $this->converter->convert($content);
            // Filter out part of the link to turn 'm into relative links
            $parsed = str_replace('](revolution/2.x/', '](', $parsed);
            $parsed = str_replace('](/revolution/2.x/', '](', $parsed);

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