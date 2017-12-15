---
title: "Input and Output Filters (Output Modifiers)"
_old_id: "164"
_old_uri: "2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)"
---

<div>- [What are Filters?](#InputandOutputFilters%28OutputModifiers%29-WhatareFilters%3F)
- [Input Filter](#InputandOutputFilters%28OutputModifiers%29-InputFilter)
- [Output Filter](#InputandOutputFilters%28OutputModifiers%29-OutputFilter)
- [Output Modifiers](#InputandOutputFilters%28OutputModifiers%29-OutputModifiers)
  - [Conditional output modifiers](#InputandOutputFilters%28OutputModifiers%29-Conditionaloutputmodifiers)
  - [String output modifiers](#InputandOutputFilters%28OutputModifiers%29-Stringoutputmodifiers)
  - [Caching](#InputandOutputFilters%28OutputModifiers%29-Caching)
  - [Using an Output Modifier with Tag Properties](#InputandOutputFilters%28OutputModifiers%29-UsinganOutputModifierwithTagProperties)
  - [Creating a Custom Output Modifier](#InputandOutputFilters%28OutputModifiers%29-CreatingaCustomOutputModifier)
- [Chaining (Multiple Output Filters)](#InputandOutputFilters%28OutputModifiers%29-Chaining%28MultipleOutputFilters%29)
- [See Also](#InputandOutputFilters%28OutputModifiers%29-SeeAlso)

</div>What are Filters?
-----------------

 Filters in Revolution allow you to manipulate the way data is presented or parsed in a tag. They allow you to modify values from inside your templates.

Input Filter
------------

 Currently the input filter processes tag calls in preparation for the output filter. It is generally used only internally by MODx.

Output Filter
-------------

 In Revolution, the Output Filter applies one or more of series of output modifiers, which behave similarly to PHx calls in MODx Evolution - except they're built into the core. The syntax looks like this:

 ```
<pre class="brush: php">[[element:modifier=`value`]]

``` They can also be chained (executed left to right):

 ```
<pre class="brush: php">[[element:modifier:anothermodifier=`value`:andanothermodifier:yetanother=`value2`]]

``` You can also use these to modify Snippet output; note that the modifier comes after the Snippet name and before the question mark, e.g.

 ```
<pre class="brush: php">[[mySnippet:modifier=`value`? &mySnippetParam=`something`]]

``` If you have longer code in a :then=``:else=`` statement and you want to make it more readable by putting it on multiple lines, it has to be done like this:

 ```
<pre class="brush: php">[[+placeholder:is=`0`:then=`
     // code
`:else=`
     // code
`]]

```Output Modifiers
----------------

 The following table lists some of the existing modifiers and shows examples of their use. Although the examples below are placeholder tags, the output modifiers can be used with any MODx tag. **Make sure that the placeholder used are actually receiving data.**

### Conditional output modifiers

 <table id="TBL1376497247034"><tbody><tr><th> Modifier </th> <th> Description </th> <th> Example </th> </tr><tr><td> if, input </td> <td> </td> <td> </td> </tr><tr><td> or   
</td> <td> Can be used to string output modifiers together with an "OR" relationship.   
</td> <td> \[\[+numbooks:is=`5`:or:is=`6`:then=`There are 5 or 6 books!`:else=`Not sure how many books`\]\] </td> </tr><tr><td> and   
</td> <td> Can be used to string output modifiers together with an "AND" relationship.   
</td> <td> </td> </tr><tr><td> isequalto, isequal, equalto, equals, is, eq   
</td> <td> Compares to a passed value, and moves on if it's the same. Used with "then" and "else"   
</td> <td> \[\[+numbooks:isequalto=`5`:then=`There are 5 books!`:else=`Not sure how many books`\]\] </td> </tr><tr><td> notequalto, notequals, isnt, isnot, neq, ne   
</td> <td> Compares to a passed value, and moves on if it is not the same. Used with "then" and "else"   
</td> <td> \[\[+numbooks:notequalto=`5`:then=`Not sure how many books`:else=`There are 5 books!`\]\] </td> </tr><tr><td> greaterthanorequalto, equalorgreaterthen, ge, eg, isgte, gte   
</td> <td> Compares to a passed value, and moves on if it is greater than or equal to the value. Used with "then" and "else".   
</td> <td> \[\[+numbooks:gte=`5`:then=`There are 5 books or more than 5 books`:else=`There are less than 5 books`\]\]   
</td> </tr><tr><td> isgreaterthan, greaterthan, isgt, gt   
</td> <td> Compares to a passed value, and moves on if it is greater than the value. Used with "then" and "else".   
</td> <td> \[\[+numbooks:gt=`5`:then=`There are more than 5 books`:else=`There are less than 5 books`\]\] </td> </tr><tr><td> equaltoorlessthan, lessthanorequalto, el, le, islte, lte   
</td> <td> Compares to a passed value, and moves on if it is less then or equal to the value. Used with "then" and "else".   
</td> <td> \[\[+numbooks:lte=`5`:then=`There are 5 or less than 5 books`:else=`There are more than 5 books`\]\]   
</td> </tr><tr><td> islowerthan, islessthan, lowerthan, lessthan, islt, lt   
</td> <td> Compares to a passed value, and moves on if it is less than the value. Used with "then" and "else". </td> <td> \[\[+numbooks:lt=`5`:then=`There are less than 5 books`:else=`There are more than 5 books`\]\] </td> </tr><tr><td> contains </td> <td> Checks to see if value contains a passed string.   
</td> <td> \[\[+author:contains=`Samuel Clemens`:then=`Mark Twain`\]\]   
</td> </tr><tr><td> containsnot </td> <td> Check to see if the value does not contain the passed string.   
</td> <td> \[\[+author:containsnot=`Samuel Clemens`:then=`Somebody Else`\]\]   
</td> </tr><tr><td>in, IN, inarray, inArray</td> <td>Check to see if the value is in an array (comma seperated)</td> <td>\[\[+id:in=`5,15,22`:then=`Yes in array`\]\]</td> </tr><tr><td> hide   
</td> <td> Will check earlier conditions, and hide the element if the conditions were met.   
</td> <td> \[\[+numbooks:lt=`1`:hide\]\]   
</td> </tr><tr><td> show   
</td> <td> Will check earlier conditions, and show the element if the conditions were met.   
</td> <td> \[\[+numbooks:gt=`0`:show\]\]   
</td> </tr><tr><td> then   
</td> <td> Conditional usage.   
</td> <td> \[\[+numbooks:gt=`0`:then=`Now available!`\]\]   
</td> </tr><tr><td> else   
</td> <td> Conditional usage, together with then.   
</td> <td> \[\[+numbooks:gt=`0`:then=`Now available!`:else=`Sorry, currently sold out.`\]\]   
</td> </tr><tr><td> select   
</td> <td>Output a replacement, if the value is found in the list of values before the equal sign. Otherwise the result is empty.  
</td> <td> \[\[+numbooks:select=`0=Value 0&1=Value 1&2=Value 2`\]\]   
</td> </tr><tr><td> memberof, ismember, mo   
</td> <td> Checks if the user is a member of the specified group(s).   
</td> <td> \[\[+modx.user.id:memberof=`Administrator`\]\]   
</td></tr></tbody></table>### String output modifiers

 <table id="TBL1376497247035"><tbody><tr><th> Modifier </th> <th> Description </th> <th> Example </th> </tr><tr><td> cat </td> <td> Appends the option's value (if not empty) to the input value </td> <td> \[\[+numbooks:cat=` books`\]\] </td> </tr><tr><td> after, append </td> <td> appends the options value to the input value (if both not empty) </td> <td> \[\[+totalnumber:after=` total`\]\]   
</td> </tr><tr><td> before, prepend </td> <td> prepends the options value to the input value (if both not empty) </td> <td> \[\[+booknum:before=`book #`\]\] </td> </tr><tr><td> lcase, lowercase, strtolower </td> <td> Transforms strings to lowercase. Similar to PHP's [strtolower](http://www.php.net/manual/en/function.strtolower.php) </td> <td> \[\[+title:lcase\]\] </td> </tr><tr><td> ucase, uppercase, strtoupper </td> <td> Transforms strings to uppercase. Similar to PHP's [strtoupper](http://www.php.net/manual/en/function.strtoupper.php) </td> <td> \[\[+headline:ucase\]\] </td> </tr><tr><td> ucwords </td> <td> Transforms the first letter of a word to uppercase. Similar to PHP's [ucwords](http://www.php.net/manual/en/function.ucwords.php) </td> <td> \[\[+title:ucwords\]\] </td> </tr><tr><td> ucfirst </td> <td> Transforms the first letter of the string to uppercase. Similar to PHP's [ucfirst](http://www.php.net/manual/en/function.ucfirst.php) </td> <td> \[\[+name:ucfirst\]\] </td> </tr><tr><td> htmlent, htmlentities </td> <td> Replaces any character that has an HTML entity with that entity. Similar to PHP's [htmlentities](http://www.php.net/manual/en/function.htmlentities.php). Uses the current value the system setting "modx\_charset" with flag ENT\_QUOTES   
</td> <td> \[\[+email:htmlent\]\] </td> </tr><tr><td> esc,escape </td> <td> Safely escapes character values using regex and str\_replace. Also escapes \[, \] and ` </td> <td> \[\[+email:escape\]\] </td> </tr><tr><td> strip </td> <td> Replaces all linebreaks, tabs and multiple spaces with just one space </td> <td> \[\[+textdocument:strip\]\] </td> </tr><tr><td> stripString </td> <td> Strips string of specified value </td> <td> \[\[+name:stripString=`Mr.`\]\] </td> </tr><tr><td> replace </td> <td> Replaces one value with another </td> <td> \[\[+pagetitle:replace=`Mr.==Mrs.`\]\] </td> </tr><tr><td> striptags, stripTags,notags,strip\_tags </td> <td> Removes HTML tags from the input. Optionally accepts a value to indicate which tags to allow. Similar to PHP's [strip\_tags](http://www.php.net/manual/en/function.strip-tags.php) </td> <td> \[\[+code:strip\_tags=`  `\]\]

 </td> </tr><tr><td> len,length, strlen   
</td> <td> Counts the length of the passed string. Similar to PHP's [strlen](http://www.php.net/manual/en/function.strlen.php) </td> <td> \[\[+longstring:strlen\]\] </td> </tr><tr><td> reverse, strrev </td> <td> Reverses the input, character by character. Similar to PHP's [strrev](http://www.php.net/manual/en/function.strrev.php) </td> <td> \[\[+mirrortext:reverse\]\] </td> </tr><tr><td> wordwrap </td> <td> Inserts a newline character after the set amount of characters. Similar to PHP's [wordwrap](http://www.php.net/manual/en/function.wordwrap.php). Takes optional value to set wordwrap position. </td> <td> \[\[+bodytext:wordwrap=`80`\]\] </td> </tr><tr><td> wordwrapcut </td> <td> Inserts a newline character after the set amount of characters, irrespective of word boundaries. Similar to PHP's [wordwrap](http://www.php.net/manual/en/function.wordwrap.php), with word cutting enabled. Takes optional value to set wordwrap position. </td> <td> \[\[+bodytext:wordwrapcut=`80`\]\] </td> </tr><tr><td> limit </td> <td> Limits a string to a certain number of characters. Defaults to 100. </td> <td> \[\[+description:limit=`50`\]\] </td> </tr><tr><td> ellipsis </td> <td> Adds an ellipsis to and truncates a string if it's longer than a certain number of characters. Only uses spaces as breakpoints. Defaults to 100. </td> <td> \[\[+description:ellipsis=`50`\]\] </td> </tr><tr><td> tag </td> <td> Displays the raw element without the :tag. Useful for documentation. </td> <td> \[\[+showThis:tag\]\] </td> </tr><tr><td>tvLabel</td> <td>Display's the Label from a tv usefull when using select or checkboxes etc where you use "Label==1||Otherlabel==2||More options==3" so if the value is 2 this wil return Otherlabel.</td> <td>\[\[+mySelectboxTv:tvLabel\]\]</td> </tr><tr><td> <del>math</del> </td> <td> <del>Returns the result of an advanced calculation (expensive on processor. not recommended)</del> Removed in Revolution 2.2.6. </td> <td> </td> </tr><tr><td> add,increment,incr </td> <td> Returns input incremented by option (default: +1) </td> <td> \[\[+downloads:incr\]\]   
 \[\[+blackjack:add=`21`\]\] </td> </tr><tr><td> subtract,decrement,decr </td> <td> Returns input decremented by option (default: -1) </td> <td> \[\[+countdown:decr\]\]   
 \[\[+moneys:subtract=`100`\]\] </td> </tr><tr><td> multiply,mpy </td> <td> Returns input multiplied by option (default: \*2) </td> <td> \[\[+trifecta:mpy=`3`\] </td> </tr><tr><td> divide,div </td> <td> Returns input divided by option (default: /2) Does not accept 0. </td> <td> \[\[+rating:div=`4`\]\] </td> </tr><tr><td> modulus,mod </td> <td> Returns the option modulus on input (default: %2, returns 0 or 1) </td> <td> \[\[+number:mod\]\] or \[\[+number:mod=`3`\]\] </td> </tr><tr><td> ifempty,default,empty, isempty </td> <td> Returns the input value if empty </td> <td> \[\[+name:default=`anonymous`\]\] </td> </tr><tr><td> notempty, !empty, ifnotempty, isnotempty </td> <td> Returns the input value if not empty </td> <td> \[\[+name:notempty=`Hello \[\[+name\]\]!`\]\] </td> </tr><tr><td> nl2br </td> <td> Converts a new line character (\\n) to an html   
 element. Use this if you're taking in input, you think that there should be new lines in it, and there aren't. Similar to PHP's [nl2br](http://www.php.net/manual/en/function.nl2br.php). </td> <td> \[\[+textfile:nl2br\]\] </td> </tr><tr><td> date </td> <td> Formats a unix timestamp into a different format. Similar to PHP's [strftime](http://www.php.net/manual/en/function.strftime.php). Value is format. See [Date Formats](/revolution/2.x/making-sites-with-modx/commonly-used-template-tags/date-formats "Date Formats"). </td> <td> \[\[+birthyear:date=`%Y`\]\] </td> </tr><tr><td> strtotime </td> <td> Converts a date string into a unix timestamp. Useful to combine this with the date output filter. Similar to PHP's [strtotime](http://www.php.net/strtotime). Takes in a date. See [Date Formats](/revolution/2.x/making-sites-with-modx/commonly-used-template-tags/date-formats "Date Formats"). </td> <td> \[\[+thetime:strtotime\]\] </td> </tr><tr><td> fuzzydate </td> <td> Returns a pretty date format with yesterday and today being filtered. Takes in a date. </td> <td> \[\[+createdon:fuzzydate\]\] </td> </tr><tr><td> ago </td> <td> Returns a pretty date format in seconds, minutes, weeks or months ago. Takes in a date (strtotime). </td> <td> \[\[+createdon:date=`%d-%m-%Y`:ago\]\] </td> </tr><tr><td> md5 </td> <td> Creates an MD5 hash of the input string. Similar to PHP's [md5](http://www.php.net/manual/en/function.md5.php). </td> <td> \[\[+password:md5\]\] </td> </tr><tr><td> cdata </td> <td> Wraps the text with CDATA tags </td> <td> \[\[+content:cdata\]\] </td> </tr><tr><td> userinfo </td> <td> Returns the requested user data. The element must be a modUser ID. The value field is the column to grab, e.g. fullname, email. See Examples below. </td> <td> \[\[+modx.user.id:userinfo=`username`\]\] </td> </tr><tr><td> isloggedin </td> <td> Returns true if user is authenticated in this context. </td> <td> \[\[+modx.user.id:isloggedin\]\] </td> </tr><tr><td> isnotloggedin </td> <td> Returns true if user is not authenticated in this context. </td> <td> \[\[+modx.user.id:isnotloggedin\]\] </td> </tr><tr><td> toPlaceholder   
</td> <td> Puts the input value into the passed placeholder. Does not prevent the output of the TV value, so add \[\[\*someTV:toPlaceholder=`placeholder`:notempty=``\]\] if you don't want to output the value of the TV itself. </td> <td> ?\[\[\*someTV:toPlaceholder=`placeholder`\]\]   
</td> </tr><tr><td> cssToHead   
</td> <td> Put a < link > element into < head >, where the input value is placed inside the href attribute.   
 Uses [modX.regClientCSS](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientcss "modX.regClientCSS"). </td> <td> \[\[+cssTV:cssToHead\]\]   
</td> </tr><tr><td> htmlToHead   
</td> <td> Insert a block of HTML code in the header of the page, before < / head >.   
 Uses [modX.regClientStartupHTMLBlock](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")   
</td> <td> \[\[+htmlTV:htmlToHead\]\]   
</td> </tr><tr><td> htmlToBottom   
</td> <td> Insert HTML code at the end of the page, before < / body >.   
 Uses [modX.regClientHTMLBlock](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclienthtmlblock "modX.regClientHTMLBlock").   
</td> <td> \[\[+htmlTV:htmlToBottom\]\]   
</td> </tr><tr><td> jsToHead   
</td> <td> Insert JS code (or a link) in the header of the page, before < / head >.   
 Uses [modX.regClientStartupScript](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartupscript "modX.regClientStartupScript").   
</td> <td> \[\[+jsTV:jsToHead\]\]   
</td> </tr><tr><td> jsToBottom   
</td> <td> Insert JS code (or a link) at the end of the page, before < / body >.   
 Uses [modX.regClientScript](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientscript "modX.regClientScript").   
</td> <td> \[\[+jsTV:jsToBottom\]\]   
</td> </tr><tr><td> urlencode </td> <td> Converts the input into a URL-friendly string similar to how an HTML form would do so. Similar to PHP's [urlencode](http://www.php.net/manual/en/function.urlencode.php) </td> <td> \[\[+mystring:urlencode\]\] </td> </tr><tr><td> urldecode </td> <td> Converts the input from an URL-friendly string Similar to PHP's [urldecode](http://www.php.net/manual/en/function.urldecode.php) </td> <td> \[\[+myparam:urldecode\]\] </td></tr></tbody></table>### Caching

 In general, any content in a placeholder that you think **might change dynamically** should be uncached. For example:

 ```
<pre class="brush: php">[[+placeholder:default=`A default value!`]]

``` This means that this could **sometimes** be empty, and sometimes not. Why would you ever want that cached? That would eliminate the point of the output modifier.

 Sometimes, output modifiers can be used on a cached placeholder - but only if you're calling the Snippet that sets them cached as well. Otherwise, you're performing an illogical maneuver - trying to cache statically something that was never meant to be static.

 In general, the rule is: If you set a placeholder in an uncached Snippet, the placeholder needs to be uncached as well if you expect the content of the placeholder to differ.

### Using an Output Modifier with Tag Properties

 If you have properties on the tag, you'll want to specify those **after** the modifier:

 ```
<pre class="brush: php">[[!getResources:default=`Sorry - nothing matched your search.`?
   &tplFirst=`blogTpl`
   &parents=`2,3,4,8`
   &tvFilters=`blog_tags==%[[!tag:htmlent]]%`
   &includeTVs=`1`]]

```### Creating a Custom Output Modifier

 Also, [Snippets](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") can be used as custom modifiers. Simply put the [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") name instead of the modifier. Example with a snippet named 'makeExciting' that appends a variable amount of exclamation marks:

 ```
<pre class="brush: php">[[*pagetitle:makeExciting=`4`]]

``` This document variable call with an output modifier will pass these properties to the snippet:

 <table><tbody><tr><th> Param </th> <th> Value </th> <th> Example Result </th> </tr><tr><td> input </td> <td> The element's value. </td> <td> The value of \[\[\*pagetitle\]\] </td> </tr><tr><td> options </td> <td> Any value passed to the modifier. </td> <td> '4' </td> </tr><tr><td> token </td> <td> The type of the parent element. </td> <td> \* (the token on `pagetitle`) </td> </tr><tr><td> name </td> <td> The name of the parent element. </td> <td> pagetitle </td> </tr><tr><td> tag </td> <td> The complete parent tag. </td> <td> \[\[\*pagetitle:makeExciting=`4`\]\] </td></tr></tbody></table> Here is a sample implementation for our snippet makeExciting:

 ```
<pre class="brush: php">$defaultExcitementLevel = 1;
$result = $input;
if ( true === isset($options) ) {
$numberOfExclamations = $options;
} else {
$numberOfExclamations = $defaultExcitementLevel;
}
for ( $i = $numberOfExclamations; $i > 0; $i-- ) {
  $result = $result . '!';
}
return $result;

``` The return value of the call will be whatever the snippet returns. For our example, the result will be the value of the pagetitle document variable appended with four exclamation marks.

<div class="info"> The original input value will be returned if the snippet returns an empty string. </div>Chaining (Multiple Output Filters)
----------------------------------

 A good example of chaining would be to format a date string to another format, like so:

 ```
<pre class="brush: php">[[+mydate:strtotime:date=`%Y-%m-%d`]]

``` Directly accessing the modx\_user\_attributes table in the database using output modifiers instead of a [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") can be accomplished simply by utilizing the userinfo modifier. Select the appropriate column from the table and specify it as the property of the output modifier, like so:

 ```
<pre class="brush: php">User Internal Key: [[!+modx.user.id:userinfo=`internalKey`]]<br />
User name: [[!+modx.user.id:userinfo=`username`]]<br />
Full Name: [[!+modx.user.id:userinfo=`fullname`]]<br />
Role:  [[!+modx.user.id:userinfo=`role`]]<br />
E-mail: [[!+modx.user.id:userinfo=`email`]]<br />
Phone: [[!+modx.user.id:userinfo=`phone`]]<br />
Mobile Phone: [[!+modx.user.id:userinfo=`mobilephone`]]<br />
Fax: [[!+modx.user.id:userinfo=`fax`]]<br />
Date of birth: [[!+modx.user.id:userinfo=`dob`:date=`%Y-%m-%d`]]<br />
Gender: [[!+modx.user.id:userinfo=`gender`]]<br />
Country: [[+modx.user.id:userinfo=`country`]]<br />
State: [[+modx.user.id:userinfo=`state`]]<br />
Zip Code: [[+modx.user.id:userinfo=`zip`]]<br />
Photo: [[+modx.user.id:userinfo=`photo`]]<br />
Comment: [[+modx.user.id:userinfo=`comment`]]<br />
Password: [[+modx.user.id:userinfo=`password`]]<br />
Cache Password: [[+modx.user.id:userinfo=`cachepwd`]]<br />
Last Login: [[+modx.user.id:userinfo=`lastlogin`:date=`%Y-%m-%d`]]<br />
The Login:[[+modx.user.id:userinfo=`thislogin`:date=`%Y-%m-%d`]]<br />
Number of Logins: [[+modx.user.id:userinfo=`logincount`]]

``` \[\[!+modx.user.id\]\] defaults to the currently logged in user ID. You can of course replace that with \[\[\*createdby\]\] or other resource field or placeholders that return a numeric ID representing a user.

<div class="note"> Note that the user ID and username is already available by default in MODx, so you dont need to use the "userinfo" modifier: ```
<pre class="brush: php">[[!+modx.user.id]] - Prints the ID
[[!+modx.user.username]] - Prints the username
	
``` You will most likely want to call these uncached (see note about caching above) to prevent unexpected results.

</div>See Also
--------

- [Properties and Property Sets](/revolution/2.x/making-sites-with-modx/customizing-content/properties-and-property-sets "Properties and Property Sets")
- [Templates](/revolution/2.x/making-sites-with-modx/structuring-your-site/templates "Templates")
- [Template Variables](/revolution/2.x/making-sites-with-modx/customizing-content/template-variables "Template Variables")
- [Snippets](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets")