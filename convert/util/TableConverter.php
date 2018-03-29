<?php


use League\HTMLToMarkdown\Converter\ConverterInterface;
use League\HTMLToMarkdown\ElementInterface;

class TableConverter implements ConverterInterface
{
    /**
     * @param ElementInterface $element
     *
     * @return string
     */
    public function convert(ElementInterface $element)
    {
        switch ($element->getTagName()) {
            case 'tr':
                $line = [];
                $i = 1;
                foreach ($element->getChildren() as $td) {
                    $i++;
                    $v = $td->getValue();
                    $v = trim($v);
                    if ($i % 2 === 0 || $v !== '') {
                        $line[] = $v;
                    }
                }
                return '| ' . implode(' | ', $line) . " |\n";

            case 'td':
            case 'th':
                return trim($element->getValue());

            case 'tbody':
                return $element->getValue();

            case 'thead':
                $headerLine = [];
                $betweenLine = [];
                foreach ($element->getChildren() as $child) {
                    $v = $child->getValue();
                    $headerLine[] = $v;
                    $betweenLine[] = str_repeat('-', 5);
                }
                $headerLine = implode(' | ', $headerLine);
                $betweenLine = implode(' | ', $betweenLine);

                return $headerLine . "\n" . $betweenLine . "\n";
            case 'table':
                $inner = $element->getValue();
                if (strpos($inner, '-----') === false) {
                    $inner = explode("\n", $inner);
                    $single = explode(' | ', trim($inner[0], '|'));
                    $hr = [];
                    foreach ($single as $td) {
                        $length = strlen(trim($td)) + 2;
                        $hr[] = str_repeat('-', $length > 3 ? $length : 3);
                    }
                    $hr = '|' . implode('|', $hr) . '|';
                    array_splice($inner, 1, 0, $hr);
                    $inner = implode("\n", $inner);
                }
                return $inner;
        }
        return $element->getValue();
    }

    /**
     * @return string[]
     */
    public function getSupportedTags()
    {
        return array('table', 'tr', 'thead', 'td', 'tbody');
    }
}