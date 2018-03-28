<?php

use League\HTMLToMarkdown\Converter\ConverterInterface;
use League\HTMLToMarkdown\ElementInterface;

class PreformattedConverter implements ConverterInterface
{
    /**
     * @param ElementInterface $element
     *
     * @return string
     */
    public function convert(ElementInterface $element)
    {
        $markdown = '';

        $pre_content = html_entity_decode($element->getChildrenAsString());
        // Remove the elements
        $pre_content = preg_replace('/<pre\b[^>]*>/', '', $pre_content);
        $pre_content = str_replace('</pre>', '', $pre_content);


        // Checking for language class on the code block
        $class = $element->getAttribute('class');

        $language = null;
        if ($class) {
            if (strpos($class, 'brush: ') !== false) {
                // Found one, save it as the selected language and stop looping over the classes.
                // The space after the language avoids gluing the actual code with the language tag
                $language = ' ' . str_replace('brush: ', '', $class) . ' ';
            }
        }


        /*
         * Checking for the code tag.
         * Usually pre tags are used along with code tags. This conditional will check for already converted code tags,
         * which use backticks, and if those backticks are at the beginning and at the end of the string it means
         * there's no more information to convert.
         */
        $firstBacktick = strpos(trim($pre_content), '`');
        $lastBacktick = strrpos(trim($pre_content), '`');
        if ($firstBacktick === 0 && $lastBacktick === strlen(trim($pre_content)) - 1) {
            return $pre_content;
        }

        // If the execution reaches this point it means it's just a pre tag, with no code tag nested

        // Normalizing new lines
        $pre_content = trim($pre_content, "\n");
        $pre_content = preg_replace('/\r\n|\r|\n/', PHP_EOL, $pre_content);

        $markdown .= '```' . $language . "\n" . $pre_content . "\n" . "```\n\n";

        return $markdown;
    }

    /**
     * @return string[]
     */
    public function getSupportedTags()
    {
        return array('pre');
    }
}
