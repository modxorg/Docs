<?php


use League\HTMLToMarkdown\Converter\ConverterInterface;
use League\HTMLToMarkdown\ElementInterface;

/**
 * This converter is 99% the same as the one that ships with the original package, but has some slight
 * differences to account for weirdness in the MODX docs. Like using brush instead of language classes.
 *
 * Class CodeConverter
 */
class CodeConverter implements ConverterInterface
{
    /**
     * @param ElementInterface $element
     *
     * @return string
     */
    public function convert(ElementInterface $element)
    {
        $language = null;

        // Checking for language class on the code block
        $class = $element->getAttribute('class');
        if ($class) {
            if (strpos($class, 'brush: ') !== false) {
                // Found one, save it as the selected language and stop looping over the classes.
                // The space after the language avoids gluing the actual code with the language tag
                $language = ' ' . str_replace('brush: ', '', $class) . ' ';
            }
        }



        $markdown = '';
        $code = html_entity_decode($element->getChildrenAsString());

        // In order to remove the code tags we need to search for them and, in the case of the opening tag
        // use a regular expression to find the tag and the other attributes it might have
        $code = preg_replace('/<code\b[^>]*>/', '', $code);
        $code = str_replace('</code>', '', $code);

        // Checking if the code has multiple lines
        $lines = preg_split('/\r\n|\r|\n/', $code);
        if (count($lines) > 1) {
            // Multiple lines detected, adding three backticks and newlines
            $markdown .= '```' . $language . "\n" . $code . "\n" . '```' . "\n\n";
        } else {
            // One line of code, wrapping it on one backtick.
            $markdown .= '`' . $language . $code . '`';
        }

        return $markdown;
    }

    /**
     * @return string[]
     */
    public function getSupportedTags()
    {
        return array('code');
    }
}