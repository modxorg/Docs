---
title: "Output Filter/Modifiers"
_old_id: "164"
_old_uri: "2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers)"
---

## What are Filters?

Filters in Revolution allow you to manipulate the way data is presented or parsed in a tag. They allow you to modify values from inside your templates.

## Input Filter

## Output Filter

In Revolution, the Output Filter applies one or more of series of output modifiers, which behave similarly to PHx calls in MODX Evolution - except they're built into the core. The syntax looks like this:

```php
[[element:modifier=`value`]]
```

They can also be chained (executed left to right):

```php
[[element:modifier:anothermodifier=`value`:andanothermodifier:yetanother=`value2`]]
```

You can also use these to modify Snippet output; note that the modifier comes after the Snippet name and before the question mark, e.g.

```php
[[mySnippet:modifier=`value`? &mySnippetParam=`something`]]
```

If you have longer code in a `` :then=`...`:else=`...` `` statement and you want to make it more readable by putting it on multiple lines, it has to be done like this:

```php
[[+placeholder:is=`0`:then=`
 // code
`:else=`
 // code
`]]
```

## Output Modifiers

The following table lists some of the existing modifiers and shows examples of their use. Although the examples below are placeholder tags, the output modifiers can be used with any MODX tag. **Make sure that the placeholder used are actually receiving data.**

### Conditional output modifiers

| Modifier                                                     | Description                                                                                                             | Example                                                                                                  |
| ------------------------------------------------------------ | ----------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- |
| if, input                                                    | `if` - sets an additional condition. `input` - adds the data to be processed to the tag                                                                                                             | ```[[*id:is=`1`:and:if=`[[*id]]`:ne=`2`:then=`Yes`:else=`No`]]```                                                                                                        |
| or                                                           | Can be used to string output modifiers together with an "OR" relationship.                                              | ```[[+numbooks:is=`5`:or:is=`6`:then=`There are 5 or 6 books!`:else=`Not sure how many books`]]```           |
| and                                                          | Can be used to string output modifiers together with an "AND" relationship.                                             | ```[[*numbooks:is=`1`:and:if=`[[*id]]`:ne=`2`:then=`Yes`:else=`No`]]```                                                                                                         |
| isequalto, isequal, equalto, equals, is, eq                  | Compares to a passed value, and moves on if it's the same. Used with "then" and "else"                                  | ```[[+numbooks:isequalto=`5`:then=`There are 5 books!`:else=`Not sure how many books`]]```                  |
| notequalto, notequals, isnt, isnot, neq, ne                  | Compares to a passed value, and moves on if it is not the same. Used with "then" and "else"                             | ```[[+numbooks:notequalto=`5`:then=`Not sure how many books`:else=`There are 5 books!`]]```                 |
| greaterthanorequalto, equalorgreaterthen, ge, eg, isgte, gte | Compares to a passed value, and moves on if it is greater than or equal to the value. Used with "then" and "else".      | ```[[+numbooks:gte=`5`:then=`There are 5 books or more than 5 books`:else=`There are less than 5 books`]]``` |
| isgreaterthan, greaterthan, isgt, gt                         | Compares to a passed value, and moves on if it is greater than the value. Used with "then" and "else".                  | ```[[+numbooks:gt=`5`:then=`There are more than 5 books`:else=`There are less than 5 books`]]```             |
| equaltoorlessthan, lessthanorequalto, el, le, islte, lte     | Compares to a passed value, and moves on if it is less then or equal to the value. Used with "then" and "else".         | ```[[+numbooks:lte=`5`:then=`There are 5 or less than 5 books`:else=`There are more than 5 books`]]```       |
| islowerthan, islessthan, lowerthan, lessthan, islt, lt       | Compares to a passed value, and moves on if it is less than the value. Used with "then" and "else".                     | ```[[+numbooks:lt=`5`:then=`There are less than 5 books`:else=`There are more than 5 books`]]```             |
| contains                                                     | Checks to see if value contains a passed string.                                                                        | ```[[+author:contains=`Samuel Clemens`:then=`Mark Twain`]]```                                                |
| containsnot                                                  | Check to see if the value does not contain the passed string.                                                           | ```[[+author:containsnot=`Samuel Clemens`:then=`Somebody Else`]]```                                          |
| in, IN, inarray, inArray                                     | Check to see if the value is in an array (comma seperated)                                                              | ```[[+id:in=`5,15,22`:then=`Yes in array`]]` ```                                                              |
| hide                                                         | Will check earlier conditions, and hide the element if the conditions were met.                                         | ```[[+numbooks:lt=`1`:hide]]```                                                                              |
| show                                                         | Will check earlier conditions, and show the element if the conditions were met.                                         | ```[[+numbooks:gt=`0`:show]] ```                                                                             |
| then                                                         | Conditional usage.                                                                                                      | ```[[+numbooks:gt=`0`:then=`Now available!`]]```                                                             |
| else                                                         | Conditional usage, together with then.                                                                                  | ```[[+numbooks:gt=`0`:then=`Now available!`:else=`Sorry, currently sold out.`]]```                           |
| select                                                       | Output a replacement, if the value is found in the list of values before the equal sign. Otherwise the result is empty. | ```[[+numbooks:select=`0=Value 0&1=Value 1&2=Value 2`]]```                                                   |
| memberof, ismember, mo                                       | Checks if the user is a member of the specified group(s).                                                               | ```[[+modx.user.id:memberof=`Administrator`]]```                                                             |

### String output modifiers

| Modifier                                 | Description                                                                                                                                                                                                                                                         | Example                                            |
| ---------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------- |
| cat                                      | Appends the option's value (if not empty) to the input value                                                                                                                                                                                                        | ```[[+numbooks:cat=`books`]]```                        |
| after, append                            | Appends the options value to the input value (if both not empty) Added in 2.6.0.                                                                                                                                                                                    | ```[[+totalnumber:after=`total`]]```                   |
| before, prepend                          | Prepends the options value to the input value (if both not empty) Added in 2.6.0.                                                                                                                                                                                   | ```[[+booknum:before=`book #`]]```                     |
| lcase, lowercase, strtolower             | Transforms strings to lowercase. Similar to PHP's [strtolower](http://www.php.net/manual/en/function.strtolower.php)                                                                                                                                                | `[[+title:lcase]]`                                 |
| ucase, uppercase, strtoupper             | Transforms strings to uppercase. Similar to PHP's [strtoupper](http://www.php.net/manual/en/function.strtoupper.php)                                                                                                                                                | `[[+headline:ucase]]`                              |
| ucwords                                  | Transforms the first letter of a word to uppercase. Similar to PHP's [ucwords](http://www.php.net/manual/en/function.ucwords.php)                                                                                                                                   | `[[+title:ucwords]]`                               |
| ucfirst                                  | Transforms the first letter of the string to uppercase. Similar to PHP's [ucfirst](http://www.php.net/manual/en/function.ucfirst.php)                                                                                                                               | `[[+name:ucfirst]]`                                |
| htmlent, htmlentities                    | Replaces any character that has an HTML entity with that entity. Similar to PHP's [htmlentities](http://www.php.net/manual/en/function.htmlentities.php). Uses the current value the system setting `modx_charset` with flag `ENT_QUOTES`                           | `[[+email:htmlent]]`                               |
| esc,escape                               | Safely escapes character values using regex and str_replace.                                                                                                                                                                                                        | Also escapes \[, \] and `[[+email:escape]]`        |
| strip                                    | Replaces all linebreaks, tabs and multiple spaces with just one space                                                                                                                                                                                               | `[[+textdocument:strip]]`                          |
| stripString                              | Strips string of specified value                                                                                                                                                                                                                                    | ```[[+name:stripString=`Mr.`]]```                      |
| replace                                  | Replaces one value with another                                                                                                                                                                                                                                     | ```[[+pagetitle:replace=`Mr.==Mrs.`]]```               |
| striptags, stripTags,notags,strip_tags   | Removes HTML tags from the input. Optionally accepts a value to indicate which tags to allow. Similar to PHP's [strip_tags](http://www.php.net/manual/en/function.strip-tags.php)                                                                                   | ```[[+code:strip_tags=` `]]```                         |
| stripmodxtags                            | Removes MODX tags from the input. (Added in v2.7)                                                                                                                                                                                                                   | `[[+code:stripmodxtags]]`                          |
| len,length, strlen                       | Counts the length of the passed string. Similar to PHP's [strlen](http://www.php.net/manual/en/function.strlen.php)                                                                                                                                                 | `[[+longstring:strlen]]`                           |
| reverse, strrev                          | Reverses the input, character by character. Similar to PHP's [strrev](http://www.php.net/manual/en/function.strrev.php)                                                                                                                                             | `[[+mirrortext:reverse]]`                          |
| wordwrap                                 | Inserts a newline character after the set amount of characters. Similar to PHP's [wordwrap](http://www.php.net/manual/en/function.wordwrap.php). Takes optional value to set wordwrap position.                                                                     | ```[[+bodytext:wordwrap=`80`]]```                      |
| wordwrapcut                              | Inserts a newline character after the set amount of characters, irrespective of word boundaries. Similar to PHP's [wordwrap](http://www.php.net/manual/en/function.wordwrap.php), with word cutting enabled. Takes optional value to set wordwrap position.         | ```[[+bodytext:wordwrapcut=`80`]]```                   |
| limit                                    | Limits a string to a certain number of characters. Defaults to 100.                                                                                                                                                                                                 | ```[[+description:limit=`50`]]```                      |
| ellipsis                                 | Adds an ellipsis to and truncates a string if it's longer than a certain number of characters. Only uses spaces as breakpoints. Defaults to 100.                                                                                                                    | ```[[+description:ellipsis=`50`]]```                   |
| tag                                      | Displays the raw element without the :tag. Useful for documentation.                                                                                                                                                                                                | `[[+showThis:tag]]`                                |
| tvLabel                                  | Display's the Label from a tv usefull when using select or checkboxes etc where you use `Label==1||Otherlabel==2||More options==3` so if the value is 2 this wil return Otherlabel.                                                                                 | `[[+mySelectboxTv:tvLabel]]`                       |
| math                                     | Returns the result of an advanced calculation (expensive on processor. not recommended) Removed in Revolution 2.2.6.                                                                                                                                                | ```[[+blackjack:add=`21`]]```                          |
| add,increment,incr                       | Returns input incremented by option (default: +1)                                                                                                                                                                                                                   | `[[+downloads:incr]]`                              |
| subtract,decrement,decr                  | Returns input decremented by option (default: -1)                                                                                                                                                                                                                   | `[[+countdown:decr]]` ```[[+moneys:subtract=`100`]]``` |
| multiply,mpy                             | Returns input multiplied by option (default: \*2)                                                                                                                                                                                                                   | ```[[+trifecta:mpy=`3`]]```                           |
| divide,div                               | Returns input divided by option (default: /2) Does not accept 0.                                                                                                                                                                                                    | ```[[+rating:div=`4`]]```                              |
| modulus,mod                              | Returns the option modulus on input (default: %2, returns 0 or 1)                                                                                                                                                                                                   | `[[+number:mod]]` or ```[[+number:mod=`3`]]```         |
| ifempty,default,empty, isempty           | Returns the input value if empty                                                                                                                                                                                                                                    | ```[[+name:default=`anonymous`]]```                    |
| notempty, !empty, ifnotempty, isnotempty | Returns the input value if not empty                                                                                                                                                                                                                                | ```[[+name:notempty=`Hello [[+name]]!`]]```          |
| nl2br                                    | Converts a new line character (\\n) to an html element. Use this if you're taking in input, you think that there should be new lines in it, and there aren't. Similar to PHP's [nl2br](http://www.php.net/manual/en/function.nl2br.php).                            | `[[+textfile:nl2br]]`                              |
| date                                     | Formats a unix timestamp into a different format. Similar to PHP's [strftime](http://www.php.net/manual/en/function.strftime.php). Value is format. See [Date Formats](building-sites/tag-syntax/date-formats "Date Formats").                                      | ```[[+birthyear:date=`%Y`]]```                        |
| strtotime                                | Converts a date string into a unix timestamp. Useful to combine this with the date output filter. Similar to PHP's [strtotime](http://www.php.net/strtotime). Takes in a date. See [Date Formats](building-sites/tag-syntax/date-formats "Date Formats").           | `[[+thetime:strtotime]]`                           |
| fuzzydate                                | Returns a pretty date format with yesterday and today being filtered. Takes in a date.                                                                                                                                                                              | `[[+createdon:fuzzydate]]`                         |
| ago                                      | Returns a pretty date format in seconds, minutes, weeks or months ago. Takes in a date (strtotime).                                                                                                                                                                 | ```[[+createdon:date=`%d-%m-%Y`:ago]]```               |
| md5                                      | Creates an MD5 hash of the input string. Similar to PHP's [md5](http://www.php.net/manual/en/function.md5.php).                                                                                                                                                     | `[[+password:md5]]`                                |
| cdata                                    | Wraps the text with CDATA tags                                                                                                                                                                                                                                      | `[[+content:cdata]]`                               |
| userinfo                                 | Returns the requested user data. The element must be a modUser ID. The value field is the column to grab, e.g. fullname, email. See Examples below.                                                                                                                 | ```[[+modx.user.id:userinfo=`username`]]```            |
| isloggedin                               | Returns true if user is authenticated in this context.                                                                                                                                                                                                              | `[[+modx.user.id:isloggedin]]`                     |
| isnotloggedin                            | Returns true if user is not authenticated in this context.                                                                                                                                                                                                          | `[[+modx.user.id:isnotloggedin]]`                  |
| toPlaceholder                            | Puts the input value into the passed placeholder. Does not prevent the output of the TV value, so add ```[[*someTV:toPlaceholder=`placeholder`:notempty= ``]]``` if you don't want to output the value of the TV itself. | ```[[*someTV:toPlaceholder=`placeholder`]]``` |
| cssToHead                                | Put a `<link>` element into <head>, where the input value is placed inside the href attribute. Uses [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS").                                                                 | `[[+cssTV:cssToHead]]`                             |
| htmlToHead                               | Insert a block of HTML code in the header of the page, before `</head>`. Uses [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")                                                 | `[[+htmlTV:htmlToHead]]`                           |
| htmlToBottom                             | Insert HTML code at the end of the page, before `</body>`. Uses [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock").                                                                                   | `[[+htmlTV:htmlToBottom]]`                         |
| jsToHead                                 | Insert JS code (or a link) in the header of the page, before `</head>`. Uses [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript").                                                          | `[[+jsTV:jsToHead]]`                               |
| jsToBottom                               | Insert JS code (or a link) at the end of the page, before `</body>`. Uses [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript").                                                                                  | `[[+jsTV:jsToBottom]]`                             |
| urlencode                                | Converts the input into a URL-friendly string similar to how an HTML form would do so. Similar to PHP's [urlencode](http://www.php.net/manual/en/function.urlencode.php)                                                                                            | `[[+mystring:urlencode]]`                          |
| urldecode                                | Converts the input from an URL-friendly string Similar to PHP's [urldecode](http://www.php.net/manual/en/function.urldecode.php)                                                                                                                                    | `[[+myparam:urldecode]]`                           |
| filterPathSegment                        | Added in 2.7. Converts the input into a URL-friendly string with the same mechanism that turns a pagetitle into an alias, including transliteration if enabled. Useful for custom urls.                                                                             | `[[+pagetitle:filterPathSegment]]`                 |

### Caching

In general, any content in a placeholder that you think **might change dynamically** should be uncached. For example:

```php
[[+placeholder:default=`A default value!`]]
```

This means that this could **sometimes** be empty, and sometimes not. Why would you ever want that cached? That would eliminate the point of the output modifier.

Sometimes, output modifiers can be used on a cached placeholder - but only if you're calling the Snippet that sets them cached as well. Otherwise, you're performing an illogical maneuver - trying to cache statically something that was never meant to be static.

In general, the rule is: If you set a placeholder in an uncached Snippet, the placeholder needs to be uncached as well if you expect the content of the placeholder to differ.

### Using an Output Modifier with Tag Properties

If you have properties on the tag, you'll want to specify those **after** the modifier:

```php
[[!getResources:default=`Sorry - nothing matched your search.`?
    &tplFirst=`blogTpl`
    &parents=`2,3,4,8`
    &tvFilters=`blog_tags==%[[!tag:htmlent]]%`
    &includeTVs=`1`
]]
```

### Creating a Custom Output Modifier

Also, [Snippets](extending-modx/snippets "Snippets") can be used as custom modifiers. Simply put the [Snippet](extending-modx/snippets "Snippets") name instead of the modifier. Example with a snippet named 'makeExciting' that appends a variable amount of exclamation marks:

```php
[[*pagetitle:makeExciting=`4`]]
```

This document variable call with an output modifier will pass these properties to the snippet:

| Param   | Value                             | Example Result                    |
| ------- | --------------------------------- | --------------------------------- |
| input   | The element's value.              | The value of `[[*pagetitle]]`     |
| options | Any value passed to the modifier. | '4'                               |
| token   | The type of the parent element.   | \* (the token on `pagetitle`)     |
| name    | The name of the parent element.   | pagetitle                         |
| tag     | The complete parent tag.          | ```[[*pagetitle:makeExciting=`4`]]``` |

Here is a sample implementation for our snippet makeExciting:

```php
$defaultExcitementLevel = 1;
$result = $input;
if (isset($options)) {
    $numberOfExclamations = $options;
} else {
    $numberOfExclamations = $defaultExcitementLevel;
}
for ( $i = $numberOfExclamations; $i > 0; $i-- ) {
    $result = $result . '!';
}
return $result;
```

The return value of the call will be whatever the snippet returns. For our example, the result will be the value of the pagetitle document variable appended with four exclamation marks.

The original input value will be returned if the snippet returns an empty string.

## Chaining (Multiple Output Filters)

A good example of chaining would be to format a date string to another format, like so:

```php
[[+mydate:strtotime:date=`%Y-%m-%d`]]
```

Directly accessing the `modx_user_attributes` table in the database using output modifiers instead of a [Snippet](extending-modx/snippets "Snippets") can be accomplished simply by utilizing the userinfo modifier. Select the appropriate column from the table and specify it as the property of the output modifier, like so:

```php
User Internal Key: [[!+modx.user.id:userinfo=`internalKey`]]<br />
User name: [[!+modx.user.id:userinfo=`username`]]<br />
Full Name: [[!+modx.user.id:userinfo=`fullname`]]<br />
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
```

`[[!+modx.user.id]]` defaults to the currently logged in user ID. You can of course replace that with `[[*createdby]]` or other resource field or placeholders that return a numeric ID representing a user.

Note that the user ID and username is already available by default in MODX, so you dont need to use the "userinfo" modifier:

```php
[[!+modx.user.id]] - Prints the ID
[[!+modx.user.username]] - Prints the username
```

You will most likely want to call these uncached (see note about caching above) to prevent unexpected results.

## See Also

-   [Properties and Property Sets](building-sites/properties-and-property-sets "Properties and Property Sets")
-   [Templates](building-sites/elements/templates "Templates")
-   [Template Variables](building-sites/elements/template-variables "Template Variables")
-   [Snippets](extending-modx/snippets "Snippets")
