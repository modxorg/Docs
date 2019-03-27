---
title: "Code Standards"
_old_id: "59"
_old_uri: "2.x/developing-in-modx/code-standards"
---

# Code Standards

 This page describes the MODX coding standards for any MODX Component, Extension or core code. These are not de-facto rules, but guidelines for easier development and collaboration between developers.

 This page was heavily borrowed from [Fellowship One's Design Standards](http://developer.fellowshipone.com/patterns/code.php). Thanks!

## General Practices

### Indentation and Line Breaks

 All indentation must be done with **4 spaces**, not tabs. Make sure to change your editor settings to reflect this. Line breaks must be in **UNIX** format.

### Trailing Spaces

 MODX recommends removing any trailing spaces in a line in code, unless that spacing is for design purposes.

### Compression

 MODX suggests packaging both compressed and uncompressed JS/CSS. MODX recommends using the compressed JS/CSS in production environments, but allowing users the option to toggle between compressed and uncompressed JS/CSS. This allows for easier debugging.

 MODX does not advocate PHP compression.

## HTML

 HTML5 is a new version of HTML and XHTML. The HTML5 draft specification defines a single language that can be written in HTML and XML. It attempts to solve issues found in previous iterations of HTML and addresses the needs of Web Applications, an area previously not adequately covered by HTML. ( [from html5.org](http://html5.org/))

 MODX recommends following the HTML5 specs: <http://whatwg.org/specs/web-apps/current-work/>

### Validation

 All HTML must be HTML5-validated. MODX recommends using the [W3C Validator](http://validator.w3.org/).

### Inline HTML in Snippets

 MODX requires that **no html** be echo'ed or inline in a Snippet. MODX also recommends externalizing any HTML in PHP code into [Chunks](building-sites/elements/chunks "Chunks").

 All HTML pages should be verified against the W3C validator, to ensure that the markup is well formed. This in and of itself is not directly indicative of good code, but it helps to weed out problems that are able to be tested via automation. It is no substitute for manual code review.

 Note: In TextMate, Control + Shift + V will check the validity of the currently open HTML document.

### Self-closing Elements

 Though we are using HTML5, which allows for either HTML or XHTML style syntax, we prefer the strictness of XHTML. Therefore, all tags must be properly closed. For tags that can wrap nodes such as text or other elements, termination is a trivial enough task. For tags that are self-closing, the forward slash should have exactly one space preceding it 
 vs. the compact but incorrect 
 . The W3C specifies that a single space should precede the self-closing slash (source).

### Terseness

#### Doctype

 A nice aspect of HTML5 is that it streamlines the amount of code that is required. Meaningless attributes have been dropped, and the DOCTYPE declaration has been simplified significantly. Additionally, there is no need to use CDATA to escape inline JavaScript, formerly a requirement to meet XML strictness in XHTML.

 **"HTML5 Doctype"** ``` php 



```
 **"XHTML 1.0 Transitional Doctype"** ``` php 
```

### Tags and Attributes

 All tags and attributes must be written in lowercase. Additionally, we prefer that any attribute values also be lowercase, when the purpose of the text therein is only to be interpreted by machines. For instances in which the data needs to be human readable, proper title capitalization should be followed, such as:

 **"For machines"** 
 ``` php 
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
```

 **"For humans"** 
 ``` php 
<a href="http://example.com/" title="Description Goes Here">Example.com</a>
```

### Quotes

 In keeping with the strictness of XHTML code conventions, according to the W3C, all attributes must have a value, and must use double-quotes (source). The following are examples of proper and improper usage of quotes and attribute/value pairs.

 **"Correct"** 
 ``` php 
<input type="text" name="email" disabled="disabled" />
```

 **"Incorrect"** 
 ``` php 
<input type=text name=email disabled>
```

## CSS

### Inline Styles

 We strive to maintain proper separation of content and design, and therefore highly discourage the use of inline style="..." attributes. This not only makes maintenance a nightmare, but inextricably ties the presentation to the data it represents. All of our CSS will be stored in external files, with one master.css file called per page. That single file will incorporate other files as necessary with the @import syntax.

 Note: An exception to this rule is style="display:none" for revealing hidden elements via JavaScript.

### CSS Validation

 All cascading stylesheets should be verified against the W3C validator, to ensure correct syntax and to check for possible accessibility issues with text and background colors. This in and of itself is not directly indicative of good code, but it helps to weed out problems that are able to be tested via automation. It is no substitute for manual code review.

 Note: In TextMate, Control + Shift + V will check the validity of the currently open CSS document.

### CSS Formatting

 To ease potential headaches for maintenance, we require that all CSS be written in a consistent manner. For one, all CSS selectors must be listed on their own line. As a general rule of thumb, if there is a comma in CSS, it should immediately be followed by a line break. This way, we know that all text on a single line is part of the same selector. Likewise, all property/value pairs must be on their own line, with one tab of indentation. The closing brace must be on the same level of indentation as the selector that began it - flush left.

 **"Correct"** 
``` css 
#selector_1 span,
#selector_2 span,
#selector_3 span {
    background: #fff;
    color: #000;
}
```

 **"Incorrect"** 
``` css 
#selector_1 span, #selector_2 span, #selector_3 span {
    background: #fff; color: #000;
}
```

 **"Also incorrect"** 
``` css 
#selector { background: #fff; color: #000; }
```

### Pixels vs. Ems

 We use the px unit of measurement to define font size, because it offers absolute control over text. We realize that using the em unit for font sizing used to be popular, to accommodate for Internet Explorer 6 not resizing pixel based text. However, all major browsers (including IE7 and IE8) now support text resizing of pixel units and/or full-page zooming. Since IE6 is largely considered deprecated, pixels sizing is preferred. Additionally, unit-less line-height is preferred because it does not inherit a percentage value of its parent element, but instead is based on a multiplier of the font-size.

 **"Correct"** 
 ``` css 
/*
13 * 1.5 = 19.5 ~ Rounds to 20px.
*/
#selector {
    font-size: 13px;
    line-height: 1.5;
}
```

 **"Incorrect"** 
 ``` css 
/*
Equivalent to 13px font-size and 20px line-height,
but only if the browser default text size is 16px.
*/
#selector {
    font-size: 0.813em;
    line-height: 1.25em;
}
```

### Internet Explorer Bugs

 Inevitably, when all other browsers appear to be working correctly, any and all versions of Internet Explorer will introduce a few nonsensical bugs, delaying time to deployment. While we encourage troubleshooting and building code that will work in all browsers without special modifications, sometimes it is necessary to use conditional if IE comments to serve up specific fixes, which are ignored by other browsers.

 **"Fixing IE"** 
 ``` php 
<!--[if IE 7]>
<link type="text/css" rel="stylesheet" href="/assets/styleshseets/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link type="text/css" rel="stylesheet" href="/assets/styleshseets/ie8.css" />
<![endif]-->
```

### Shorthand

 In general, CSS shorthand is preferred because of its terseness, and the ability to later go back and add in values that are already present, such as the case with margin and padding. Developers should be aware of the TRBL acronym, denoting the order in which the sides of an element are defined, in a clock-wise manner: Top, Right, Bottom, Left. If bottom is undefined, it inherits its value from top. Likewise, if left is undefined, it inherits its value from right. If only the top value is defined, all sides inherit from that one declaration.

 For more on reducing stylesheet code redundancy, and using CSS shorthand in general:

- <http://qrayg.com/journal/news/css-background-shorthand>
- <http://sonspring.com/journal/css-redundancy>
- <http://dustindiaz.com/css-shorthand>

#### Margin & Padding

 **"Correct"** 
 ``` css 
#selector {
    margin: 0 0 10px;
    padding: 0 0 10px;
}
```

 **"Incorrect - left attribute unnecessary"** 
 ``` css 
#selector {
    margin: 0 0 10px 0;
    padding: 0 0 10px 0;
}
```

#### Hex Colors

 We prefer hex values for all colors, written in lower-case. No upper-case or RGB, please! Additionally, all colors should be written as tersely as possible. This means that colors such as full blue, which can be written lengthily as #0000FF, should be simply written as #00f. Obviously, for colors that require more precision, all six characters should be used. For example, a light shade of grayish beige: #f9f9f0.

#### Background

 **"Correct - shorthand"** 
 ``` css 
#selector {
    background: #fff url(../images/file.png) repeat-x fixed left bottom;
}
```

 **"Incorrect - longhand unnecessary"** 
 ``` css 
#selector {
    background-color: #fff;
    background-image: url(../images/file.png);
    background-repeat: repeat-x;
    background-attachment: fixed;
    background-position: left bottom;
}
```

#### Border

 In general, border should be a single line declaration, assuming that the values of the border are the same on all sides of the element. The order in which values are declared are: width, style, and color.

 **"Shorthand - method 1"** 
 ``` css 
#selector {
    border: 1px solid #000;
}
```

 If the values of each side differ, then there are two possible ways of using shorthand, and it is up to the discretion of the developer to decide which to use. Note that method 2 follows the TRBL pattern.

 **"Shorthand - method 2"** 
 ``` css 
#selector {
    border-color: #fff #999 #666 #ccc;
    border-style: solid dashed dotted double;
    border-width: 1px 2px 3px 4px;
}
```

 **"Shorthand - method 3"** 
 ``` css 
#selector {
    border-top: 1px solid #fff;
    border-right: 2px dashed #999;
    border-bottom: 3px dotted #666;
    border-left: 4px double #ccc;
}
```

 By contrast, the same style declaration is extremely verbose using longhand. This should be avoided, except in instances where only one particular value needs to be overridden, allowing the rest to flow through.

 **"Longhand"** 
 ``` css 
#selector {
    border-top-color: #fff;
    border-right-color: #999;
    border-bottom-color: #666;
    border-left-color: #ccc;
    border-top-style: solid;
    border-right-style: dashed;
    border-bottom-style: dotted;
    border-left-style: double;
    border-top-width: 1px;
    border-right-width: 2px;
    border-bottom-width: 3px;
    border-left-width: 4px;
}
```

#### Font

 Not to be confused with the inadvisable  tag, the CSS font property can be written in a few different ways. The shorthand property puts all the aspects of the font into a single declaration, whereas the longhand splits it out over several lines. While the contrast between methods is not as stark as with that of the border property, there is still space to be saved by using shorthand. While line-height can be defined within the scope of the font declaration, but when written in longhand it has its own unique property.

 Note: Times New Roman is encapsulated in quotes, because the font name itself contains spaces.

 **"Shorthand"** 
 ``` css 
#selector {
    font: italic small-caps bold 15px/1.5 Cambria, 'Times New Roman', sans-serif;
}
```

 **"Longhand"** 
 ``` css 
#selector {
    font-style: italic;
    font-variant: small-caps;
    font-weight: bold;
    font-size: 15px;
    line-height: 1.5;
    font-family: Cambria, 'Times New Roman', sans-serif;
}
```

#### Longhand

 When overriding only parts of a style, longhand declaration is preferred. This way, by sticking to shorthand for initial style declarations, anytime we see a longhand declaration used, we know that we are specifically overriding only a very precise part of an overall style, thereby leaving other aspects unaffected.

 **"Longhand override"** 
 ``` css 
#selector {
    border: 1px solid #ccc;
    font: 11px Verdana, sans-serif;
}
#selector.modifier {
    border-bottom-color: #333;
    border-bottom-width: 2px;
    font-family: Georgia, serif;
}
```

## Javascript

### Type Coercion

 Unlike strongly typed languages such as Java or C#, JavaScript will perform type coercion when evaluating conditional statements. This sometimes creates awkward scenarios in which numerical values are seen as false or the existence of a string is mistaken for true. This is typically disadvantageous.

 To ensure a strict level of comparison, as might be seen in a strongly typed or compiled language, JavaScript (like PHP) has a triple-equals operator ===. In similar fashion, it also has a strict negation operator !==. Consider the following examples of potential pitfalls when it comes to evaluating comparisons.

 ``` javascript 
var test_1 = 'true';
var test_2 = 0;
if (test_1 == true) {
    // Code here will run.
    // But it shouldn't.
}
if (test_1 === true) {
    // Code here won't run.
    // Correct behavior.
}
if (test_2 != false) {
    // Code here won't run.
    // But it should.
}
if (test_2 !== false) {
    // Code here will run.
    // Correct behavior.
}
```

 As you can see in the example above, simply using == and != is insufficient because it makes for potentially unpredictable results. Therefore, the stricter comparison operators should always be used. There is never a good reason to use the lesser form of comparison operators. To simply for the existence of elements in the DOM, there is an even more abbreviated way, that leaves no room for ambiguity. If you are unsure if certain elements will be present in an HTML page, use one of the following techniques.

 ``` javascript 
function first_func() {
    if (!document.getElementById('id_name')) {
        return;
    }
    // If code gets here, element exists.
}
function second_func() {
    if (!document.getElementsByTagName('div').length) {
        return;
    }
    // If code gets here, one or more exist.
}
```

### White-space

 In general, the use of whitespace should follow longstanding English reading conventions. Such that, there will be one space after each comma and colon (and semi-colon where applicable), but no spaces immediately inside the right and left sides of parenthesis. In short, we advocate readability within reason. Additionally, braces should always appear on the same line as their preceding argument.

 Consider the following examples of a JavaScript for-loop...

 **"Correct"** 
 ``` javascript 
for (var i=0, j=arr.length; i<j; i++) {
    // Do something.
}
```

 **"Incorrect"** 
``` javascript 
for ( var i = 0, j = arr.length; i < j; i++ )
{
// Do something.
}
```

### Variables, ID & Class

 All JavaScript variables shall be written in completely lowercase letters, with underscores to separate words if need be. Likewise, all id and class declarations in CSS shall be written in the same manner. Neither dashes nor camelCase shall be used, except for words that contain dashes when written in plain English.

### Quotes

 The preferred method of delineating strings is to use single quotes for everything. Since JavaScript exists to manipulate markup, and because HTML is generally written with double quotes in W3C specifications, using single quoted strings will better facilitate handling HTML fragments, and keep code more readable.

 **"Correct"** 
 ``` javascript 
var my_html = '<img class="photo" src="/path/file.jpg" alt="Text" />';
```

 **"Incorrect"** 
 ``` javascript 
var my_html = "<img class=\"photo\" src=\"/path/file.jpg\" alt=\"Text\" />";
```

### Event Listeners

 Rather than using attributes such as onload, onfocus, onsubmit, or onclick directly in markup, we will instead attach event listeners to these elements via unobtrusive techniques. The reasoning for this is the same philosophy that is behind not using inline style="..." declarations. So doing inextricably ties the behavior of a web page to its data, and makes maintenance more difficult.

### Event Delegation

 When assigning unobtrusive event listeners, it is typically acceptable to assign the event listener directly to the element(s) which will trigger some resulting action. However, occasionally there may be multiple elements which match the criteria for which you are checking, and attaching event listeners to each one might negatively impact performance. In such cases you should use event delegation instead.

### Closures & Scope

 To maintain proper scope for variables, it is highly recommended that self-executing anonymous function be used as a closure. For the most part, variables defined correctly using the var syntax, within the scope of a function will not add to global scope pollution. However, from time to time, you may need to access variables via two or more functions. In such cases, multiple functions can be grouped together inside a closure.

 **"Closure"** 
 ``` javascript 
(function() {
    var first_variable = 'value 1';
    var second_variable = 'value 2';
    function first_func() {
        // Do something.
    }
    function second_func() {
        // Do something.
    }
})();
```

### Objects & Arrays

 Objects can be thought of as tiered variables that contain multiple attributes. Similarly, an array could be described as a list of data that all share common characteristics. The following code snippets show examples of objects and arrays, and the different ways in which they can be defined. Note that values such as John Doe's age and marital status do not have quotation marks around them. This is because age is truely numerical, and true is a Boolean value.

 Note also that the commas are before the variable or method declaration. This prevents errors with trailing commas in IE and other browsers.

 Objects (and arrays) are an important part of JSON - JavaScript Object Notation, which is a platform and language independent way of transmitting data, used as an alternative to XML.

 **"Object literal - preferred"** 
 ``` javascript 
var john_doe = {
    first_name: 'John'
    ,last_name: 'Doe'
    ,job: 'Everyman Respresentative'
    ,email: 'john.doe@example.com'
    ,married: true
    ,age: 30
};
```

 **"Object dot notation"** 
 ``` javascript 
/*
Could also be written:
var john_doe = new Object();
*/
var john_doe = {};
john_doe.first_name = 'John';
john_doe.last_name = 'Doe';
john_doe.job = 'Everyman Representative';
john_doe.email = 'john.doe@example.com';
john_doe.married = true;
john_doe.age = 30;
```

 **"Array literal - preferred"** 
 ``` javascript 
var doe_family = [
    'John'
    ,'James'
    ,'Jane'
    ,'Jenny'
    ,'Jared'
    ,'Jerome'
];
```

 **"Array bracket notation"** 
 ``` javascript 
/*
Could also be written:
var doe_family = new Array();
*/
var doe_family = [];
doe_family[0] = 'John';
doe_family[1] = 'James';
doe_family[2] = 'Jane';
doe_family[3] = 'Jenny';
doe_family[4] = 'Jared';
doe_family[5] = 'Jerome';
```

## PHP

### General

- Beginning brackets do NOT linebreak. They start one space after the end parenthesis, as according to traditional Unix policy.
- Do not do any real logic in object constructors. Create class methods to do so.
- null, true and false should always be lowercase.
- Avoid embedded assignments (ex: `$d = ($a = $b + $c)` is bad).
- Never use extract().
- Avoid using global variables if at all possible.
- Document EVERYTHING.

### Parenthesis

- Do not put parenthesis next to keywords. Put a space between.
- Do put parenthesis next to function names.
- Do not use parenthesis in return statements when it's not necessary. Example: 
- ``` php 
  if ($test) {
  }
  while ($test == $other) {
  }
  array_push($one,$two);
  return $test;
  ```
- Do **not** use parenthesis when using include, require, include\_once, and require\_once.

### Classes

- All ''core'' classnames, unless stated otherwise for special conditions, will be prefixed with the "mod" prefix: ie, modChunk, modTemplate, etc.
- All method names will be camelCase and will start with a lowercase letter.
- All private methods and variables must be prefixed with the underscore \_ character. 
``` php 
  class modFactor {
      public $publicVar;
      private $_privateVar;
      private function _privateFunc() { }
      public function publicFunc() { }
  }	
  ```

### Variables

 Note these are not function arguments.

- Use all lowercase letters.
- Separate words with the underscore.

### Function Arguments and Class Variables

- The first letter is lowercase, rest are camelCase. Example: 
``` php 
  class modFactor {
      public function testFunc($testVar, array &$anotherTest = array()) {
          $this->_privateVar = $testVar;
          $local_variable =& $anotherTest;
      }
  }
  ```

### Arrays

- Array index names use the underscore \_, not the dash as their separator. This prevents errors with magic\_quotes.
- Array index names are always lowercase. Spaces are represented by an underscore.
- Array index names are always encapsulated with single quotes. 
   Example: 
  ``` php 
  $_lang['chunk_create_text'] = 'Test';
  ```

### Constants

- Constants must be in all UPPERCASE letters.
- Use only if absolutely necessary.

### File Structure

- Always name PHP class files in name.class.php format.

### Prefixing

- Lexicon strings for Components need to be prefixed:
 
``` php 
$_lang['mycomponent.welcome_message'] = 'Welcome!';
```

- Always prefix class names; eg: 'finBank', 'finTransaction', etc.
- Always prefix [Chunk](building-sites/elements/chunks "Chunks") names; eg: 'finStatement', 'finDeposit'

## SQL

 All inline SQL must be capitalized, and table and column names must be enclosed with backticks.

 **"Correct"** 
 ``` php 
UPDATE `mydatabase`.`mytable`
SET `name` = "Johnny"
WHERE `id` = 123;
```

 **"Incorrect"** 
 ``` php 
update mydatabase.mytable set name='Johnny' where id=12
```