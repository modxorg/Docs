---
title: "Примеры пользовательских фильтров вывода"
translation: "building-sites/tag-syntax/output-filters/custom"
---

## Вступление

Пользовательские выходные фильтры - это сниппеты MODX, предназначенные для форматирования вывода плейсхолдера в слое представления (в шаблоне или в блоке). Если необработанный плейсхолдер, например

``` php
[[*pagetitle]]
```

возвращает строку текста, вы можете изменить ее с помощью пользовательского фильтра вывода, например:

``` php
[[*pagetitle:myOutputFilter]]
```

просто создав сниппет с именем **myOutputFilter**

В приведенном выше примере значение pagetitle будет изменено сниппетом с именем **myOutputFilter**

Проверьте страницу [встроенныt выходныt фильтры MODX](building-sites/tag-syntax/output-filters) перед написанием собственного фильтра.

## Создание пользовательского модификатора вывода

При написании вашего собственного Модификатора вывода ваш сниппет может принимать следующие входные данные:

``` php
$input; // the value that is being formatted/filtered
$options; // optional values passed via backticks
```

Пользовательский выходной фильтр просто [Сниппет](extending-modx/snippets "Сниппет") это предназначено для изменения контента. Проще говоря [Сниппет](extending-modx/snippets "Сниппет") вместо модификатора.

Синтаксис в том, что имя Сниппета идет после двоеточия. Пример сниппет с именем 'makeDownloadLink':

``` php
[[+file:makeDownloadLink=`notitle`]]
```

Это передаст эти свойства во сниппет:

| Парамет | Значение                                 | Пример результата                          |
| ------- | ---------------------------------------- | ------------------------------------------ |
| input   | Значение элемента.                       | Значение `[[+file]]`                       |
| options | Любое значение, переданное модификатору. | 'notitle'                                  |
| token   | Тип родительского элемента.              | + (токен на `file`)                        |
| name    | Имя родительского элемента               | file                                       |
| tag     | Полный родительский тег.                 | ```[[+file:makeDownloadLink=`notitle`]]``` |

Наиболее важным (и, возможно, самым очевидным) из этих параметров является параметр **$input**. Ваш сниппет может сделать что-то простое, как это:

``` php
return strtolower($input);
```

## Примеры

Поскольку приведенные ниже примеры не включены в ядро, вам нужно будет добавить их самостоятельно. К счастью, MODX делает это до смешного легким. Вы можете просто использовать сниппеты в качестве выходных фильтров, поэтому процесс добавления пользовательского выходного фильтра просто добавляет новый сниппет! Чтобы использовать выходной фильтр, вы ссылаетесь на имя сниппета.

Для авторов документации: пожалуйста, добавьте примеры в алфавитном порядке.

### alternateClass

alternateClass просто проверяет, можно ли разделить переданное целое число (например, заполнитель подсчета) на два. Если это возможно, он возвращает класс, который вы указали в качестве свойства выходного фильтра.

``` php
<?php
/*
 * Based on phx:alternateClass by Smashingred
 * Updated for Revolution by Mark Hamstra
 */
if ($input % 2) {
  return $options;
} else {
  return ''; // Could set another class here
}
?>
```

Используйте как это:

``` php
[[+component.idx:alternateClass=`alt`]]
```

### parseLinks

Выходной фильтр parseLinks находит ссылки и заменяет их html `<a>` атрибутом `</a>`

``` php
<?php
/*
 * Based on phx:parseLinks
 */
$t = $input;
$t = ereg_replace("[a-zA-Z]+://([.]?[a-zA-Z0-9_/-])*", "<a href=\"\\0\">\\0</a>", $t);
$t = ereg_replace("(^| |\n)(www([.]?[a-zA-Z0-9_/-])*)", "\\1<a href=\"http://\\2\">\\2</a>", $t);
return $t;
```

### parseTags

Этот parseTags принимает входные данные в виде списка, разделенного запятыми, и делает все отдельные теги ссылкой на ресурс 9 с параметром запроса tag=tagname, добавленным к ссылке.

``` php
<?php
/*
 * Based on phx:parseLinks
 */
$t = $input;
$t = ereg_replace("[a-zA-Z]+://([.]?[a-zA-Z0-9_/-])*", "<a href=\"\\0\">\\0</a>", $t);
$t = ereg_replace("(^| |\n)(www([.]?[a-zA-Z0-9_/-])*)", "\\1<a href=\"http://\\2\">\\2</a>", $t);
return $t;
```

### parseTags

TЭтот parseTags принимает входные данные в виде списка, разделенного запятыми, и делает все отдельные теги ссылкой на ресурс 9 с параметром запроса tag=tagname, добавленным к ссылке.

``` php
<?php
/*
 * parseTags output filter
 * by Mark Hamstra (http://www.markhamstra.nl)
 * free to use / modify / distribute to your will
 */
if ($input == '') { return ''; } // Output filters are also processed when the input is empty, so check for that.
  $tags = explode(', ',$input); // Based on a delimiter of comma-space.
  foreach ($tags as $key => $value) { // Process them individually
    $output[] = '<a href="'.$modx->makeurl(9, '', array('tag' => $value)).'">'.$value.'</a>';
  }
  return implode(', ',$output); // Delimit again with a comma-space
```

### shorten

Это сокращает ввод, например :ellipsis, но не усекает слова. По умолчанию длина макс. 50 символов. Основано на коде от gOmp.

``` php
<?php
$output = '';
$options = !empty($options)?$options:50;
if (!empty($input) && !empty($options)) {
  if (strlen($input) > $options) {
    $output = substr($input, 0, strrpos(substr($input, 0, $options), ' ')).' …';
  }
  else{
    $output = $input;
  }
}
return $output;
?>
```

### substring

Получить подстроку ввода.

``` php
<?php
$options=explode(',',$options);
return count($options)>1 ? substr($input,$options[0],$options[1]) : substr($input,$options[0]);
?>
```

Пример:

``` php
<span>[[*introtext:substring=`0,1`]]</span>[[*introtext:substring=`1`]]
```

### numberformat

[PHP: number_format](http://php.net/manual/en/function.number-format.php)

``` php
<?php
$number = floatval($input);
$optionsXpld = @explode('&', $options);
$optionsArray = array();
foreach ($optionsXpld as $xpld) {
    $params = @explode('=', $xpld);
    array_walk($params, function(&$v) { return $v = trim($v);});
    if (isset($params[1])) {
        $optionsArray[$params[0]] = $params[1];
    } else {
        $optionsArray[$params[0]] = '';
    }
}
$decimals = isset($optionsArray['decimals']) ? $optionsArray['decimals'] : null;
$dec_point = isset($optionsArray['dec_point']) ? $optionsArray['dec_point'] : null;
$thousands_sep = isset($optionsArray['thousands_sep']) ? $optionsArray['thousands_sep'] : null;
$output = number_format($number, $decimals, $dec_point, $thousands_sep);
return $output;
```

### Пример

``` php
[[+price:numberformat=`&decimals=2&dec_point=,&thousands_sep=.`]]
```
