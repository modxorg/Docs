---
title: "Custom Output Filter Examples"
_old_id: "353"
_old_uri: "2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)/custom-output-filter-examples"
---

##  Introduction 

 Custom Output Filters are MODx Snippets dedicated to formatting placeholder output in the view layer (in a Template or in a Chunk). If a raw placeholder, e.g.

``` php 
[[*pagetitle]]
```

 returns a string of text, you can modify it via a custom Output Filter, e.g.

``` php 
[[*pagetitle:myOutputFilter]]
```

 simply by creating a Snippet named **myOutputFilter**

 In the above example, the pagetitle value will be modified by a Snippet named **myOutputFilter**

 Check the page on MODX's [built-in output filters](building-sites/tag-syntax/output-filters) "Input and Output Filters (Output Modifiers)") before writing your own filter.

##  Creating a Custom Output Modifier 

 When writing your own Output Modifier, your Snippet can take the following inputs:

``` php 
$input; // the value that is being formatted/filtered
$options; // optional values passed via backticks
```

 A custom output filter is simply a [Snippet](extending-modx/snippets "Snippets") that is earmarked to modify content. Simply put the [Snippet](extending-modx/snippets "Snippets") name instead of the modifier.

 The syntax is that the Snippet name comes after a colon. Example with a snippet named 'makeDownloadLink':

``` php 
[[+file:makeDownloadLink=`notitle`]]
```

 This will pass these properties to the snippet:

| Param   | Value                             | Example Result                           |
| ------- | --------------------------------- | ---------------------------------------- |
| input   | The element's value.              | The value of \[\[+file\]\]               |
| options | Any value passed to the modifier. | 'notitle'                                |
| token   | The type of the parent element.   | + (the token on `file`)                  |
| name    | The name of the parent element.   | file                                     |
| tag     | The complete parent tag.          | \[\[+file:makeDownloadLink=`notitle`\]\] |

 The most important (and perhaps the most obvious) of these parameters is the **$input** parameter. Your Snippet could do something as simple as this:

``` php 
return strtolower($input);
```

##  Examples 

 As the examples to be found below are not included in the core, you will need to add these yourself. Luckily, MODx makes this ridiculously easy. You can simply use snippets as output filters, so the process of adding a custom output filter is merely adding a new snippet! To use the output filter, you reference the snippet name.

 To documentation contributors: please add examples in alphabetical order.

###  alternateClass 

 alternateClass simply checks if an integer (for example, a counting placeholder) passed can be divided by two. If that is possible, it returns the class you specify as the output filter's property.

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

 Use like this:

``` php 
[[+component.idx:alternateClass=`alt`]]
```

###  parseLinks 

 The parseLinks output filter finds links, and replaces them with a html <a> attribute.</a>

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

This parseTags takes input as a comma delimited list, and makes all individual tags a link to resource 9 with tag=tagname query parameter appended to the link.

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

This parseTags takes input as a comma delimited list, and makes all individual tags a link to resource 9 with tag=tagname query parameter appended to the link.

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

This shortens the input like :ellipsis but it does not truncate words. Defaults to the length of max. 50 characters. Based on code by gOmp.

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

Get a substring of the input.

``` php 
<?php
$options=explode(',',$options);
return count($options)>1 ? substr($input,$options[0],$options[1]) : substr($input,$options[0]);
?>
```

Example:

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

 Example:
``` php 
[[+price:numberformat=`&decimals=2&dec_point=,&thousands_sep=.`]]
```
