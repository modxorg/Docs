---
title: "PHx"
_old_id: "692"
_old_uri: "evo/phx"
---

PHx (Placeholders Xtended) will add the capability of output modifiers when using placeholders, content tags (including template variables) and settings tags. The recursive parser allows for nested tags. Custom modifiers can be added by creating "mini-snippets" in the MODx resource manager. PHx is only intended for use with MODX Evolution, if you are using MODX Revolution see [Output Filters](/revolution/2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)").

Download
--------

You can download the [latest version](http://modx.com/extras/package/phx) of PHx from MODX extras site. The current version is **2.2.0-rc**.

Installation
------------

### New install

1. Download and extract the archive.
2. Create a directory called "phx" in your \[MODX Directory\]/assets/plugins directory
3. FTP or copy the files into \[MODX Directory\]/assets/plugins/phx
4. Create a new plugin in the manager called "PHx" and copy/paste the contents of phx.plugin.txt into the code field.
5. Check "OnParseDocument" at the System Events tab

### Update

1. Download and extract the archive.
2. Backup and delete the contents of \[MODX Directory\]/assets/snippets/phx
3. Create a directory called "phx" in your \[MODX Directory\]/assets/plugins directory
4. FTP or copy the files into \[MODX Directory\]/assets/plugins/phx
5. Update the "PHx" plugin in the manager and copy/paste the contents of phx.plugin.txt into the code field.
6. Check "OnParseDocument" at the System Events tab

### Configuration

On the Configuration tab -> Plugin configuration enter:&phxdebug=Log events;int;0 &phxmaxpass=Max. Passes;int;50

#### Advanced Users

You can change the default values of the PHx parser

- **Log Events** 0 = Disabled 1 = Enabled logging of PHx When enabled PHx creates a detailed processing log for every page load in the MODX System Event log ( Manager->Reports->System Events)
- **Max. Passes** Enter a number which represents the maximum depth of your nested tags. I recommend leaving this on the default value of 50.

Description
-----------

PHx (Placeholders Xtended) extends the use of placeholders, content tags (including template variables) and settings tags so you can easily format how the final output should look. When enabled it plugs into the MODX parser, extending it with modifiers, conditionals and as a bonus makes it truly recursive. PHx will also eliminate the need for lesser parameter snippets where you'd use them to format a value for display.

Great for templating!

Transforming a value is is as easy as adding **:modifier**.

### Supported tags

When enabled, PHx supports extensions of the following MODX tags:

```
<pre class="brush: php">[+placeholder+]
[*content tag/TV*]
[(setting)]

```### Snippets supporting PHx

- Ditto
- Jot
- MaxiGallery

You can also use PHx in chunks of other snippets that are not in the above list but it may require another approach (see the Tips & Tricks section).

### Usage

A normal placeholder like \[<ins>placeholder</ins>\] can be extended to a PHx placeholder: \[<ins>placeholder:esc</ins>\]. The same applies for content tags like:

```
<pre class="brush: php">[*createdby*]

```Some modifiers take options like:

```
<pre class="brush: php">[*createdby:date=`%a %B %d, %Y at %H:%M`*]

```Multiple modifiers can be placed into one placeholder/template variables and will be processed from left to right.

```
<pre class="brush: php">somevar:esc:nl2br:strip

```#### Advanced usage

There is a special placeholder called 'phx' which acts as a dummy placeholder to start a sequence without an actual variable.

```
<pre class="brush: php">[+phx:if=`[+this+]`:is=`[+that+]`:then=`do this`:else=`do that`+]

```Also, with some modifiers this dummy will automatically have a specific default value. In case of the "userinfo" modifier it takes on the value of the current userid.

```
<pre class="brush: php">[+phx:userinfo=`username`+]

```#### Known issues

##### Syntax

It seems logical, but I mention this as an issue because it's easy to take into account. Try to avoid the following character combinations in your template if they are not part of a MODx tag:

```
<pre class="brush: php">[+
[*
[(
+]
*]
)]
]]

```They might throw the parser and MODx off guard. In normal circumstances this wouldn't be a problem. But in the case of JavaScript in your template a situation like this:

```
<pre class="brush: php">array[counter++]

```... might trigger weird behavior because of the +\]. Also, using a closing CDATA tag like this:

```
<pre class="brush: php">/* ]]> */

```... will create issues as well.

Just remember that you can't break your website by using faulty PHx syntax, the worst thing that could happen is that your layout comes out the wrong way.

Modifiers
---------

### String

#### lcase

Returns current value with all alphabetic characters converted to lowercase.Example:

```
<pre class="brush: php">[+string:lcase+]

```- Input: This is a string
- Returns: this is a string

#### ucase

Returns current value with all alphabetic characters converted to uppercase.Example:

```
<pre class="brush: php">[+string:ucase+]

```- Input:This is a string
- Returns:THIS IS A STRING

#### ucfirst

Returns current value's first character as uppercaseExample:

```
<pre class="brush: php">[+string:ucfirst+]

```- Input:this is a string
- Returns:This is a string

#### length | len

Returns length of the current value.Example:

```
<pre class="brush: php">[+string:len+]

```- Input:this is a string
- Returns:16

#### notags

Strips html tags from the current value.Example:

```
<pre class="brush: php">[+string:notags+]

```- Input:this **is** a _string_
- Returns:this is a string

#### esc

Escapes html and the bracket characters.

#### htmlent

Converts the input to html entities.

#### nl2br

Converts new lines to breaks.Example:

```
<pre class="brush: php">[+string:nl2br+]

```- Input:this isa string

- Returns:this is   
  a string

#### strip

Strip newlines (\\n), tabs (\\t) and multiple spaces.Example:

```
<pre class="brush: php">[+string:strip+]

```- Input:this is a string

- Returns:this is a string

#### Other

- **reverse** Reverses the current value.
- **wordwrap**(=`length`) length - charactersBreaks words in the current value longer than the given length of characters by putting a space in between.Default: 70 characters.
- **limit**(=`length`) Returns the first X characters from the current value. Default: 100 characters.

### Special

#### date(=`dateformat`)

- dateformat: Like PHP [strftime](http://www.php.net/strftime)
- Converts unix timestamps to the format specified.

Example:

```
<pre class="brush: php">[*createdon:date=`%d.%m.%Y`*]

```To change the output of date according to the language of the website, insert setlocale at the beginning of the PHx-plugin (this is an example for German language): setlocale(LC\_ALL, 'de\_DE@euro', 'de\_DE', 'de', 'ge');

#### md5

- Creates a MD5 hash from the current value.

#### userinfo=`field`

- field: Formats a userid value (webuser have negative ids) to a field specified. Similar to the fields used in the MODx database _user\_attributes_ table (eg: username, useremail):
  - **cachepwd** : Cache password
  - **comment** : Comment
  - **country** : Country
  - **dob** : Date of birth, in UNIX time format
  - **email** : Email
  - **fax** : Fax
  - **fullname** : Full name
  - **gender** : Gender
  - **internalKey** : User internal key
  - **lastlogin** : Last login, in UNIX time format
  - **logincount** : Number of logins
  - **mobilephone** : Mobile phone
  - **password** : Password
  - **phone** : Phone
  - **photo** : Photo
  - **role** : Role
  - **state** : State
  - **thislogin** : This login, in UNIX time format
  - **username** : User name
  - **zip** : Zip code

#### math=`calculation`

- Use simple calculations like - \* + /.
- The "?" character is replaced by the current value of the extension but you can also use nested tags.
- Example calculation: ?<ins>1</ins>(2+3)+4/5\*6

#### ifempty=`other value`

- Use "other value" when the output of the placeholder/templatevar is empty.

#### select=`options`

Translates the value of placeholder/templatevar to a specified output.

- options like: value1=output1&value2=output2

**Example**:

- Input: 1

```
<pre class="brush: php">[+placeholder:select=`0=OFF&1=ON&2=UNKNOWN`+]

```- Returns ON

### Conditional operators

#### is

- alias: eq

is equal to (==)

#### ne

- alias: isnot, isnt

is not equal to (!=)

#### eg

- alias: isgt

is equal or greater than (>=)

#### el

- alias: islt

is equal or lower than (<=)

#### gt

is greater than (>)

#### lt

is lower than (<)

#### mo=`Webgroups`

- aliases: isinrole, ir, memberof

Takes a comma-separated list of webgroup names and returns true/false depending on the user being in the group or not (replaces the "inrole" modifier which had to be combined with a conditional operator). Example:

```
<pre class="brush: php">[+phx:mo=`myWebgroup`:then=`I'm a member`:else=`I'm NOT a member`+]

```#### if=`value`

Takes a new value. Will normally be used before :or or :and

#### or

Previous OR next statement

```
<pre class="brush: php">[+phx:if=`[*id*]`:is=`2`:or:is=`3`:then=`{{Chunk}}`:else=`{{OtherChunk}}`+]

```#### and

Previous AND next statement

```
<pre class="brush: php">[+phx:if=`[!UltimateParent!]`:is=`1`:and:isnot=`[*id*]`:then=`{{ChildChunk}}`:else=`{{ParentChunk}}`+]

```#### then=`template`

template : This is shown if conditions are true. Template can be a `chunk`, \[\[snippet\]\] or just plain html

#### else=`template`

template : This is shown if conditions are false. Template can be a `chunk`, \[\[snippet\]\] or just plain html

#### show

Similar to **then** except that it uses the original input as 'template' when the condition is true.

```
<pre class="brush: php">[+myplaceholder:len:gt=`3`:show+]

```- Will return the value of myplaceholder if it contains more then 3 characters.

#### More examples

##### Example 1

**myplaceholder** is set to **myvalue**

- **\[****+myplaceholder:is=`myvalue`:then=`Correct`:else=`Incorrect`+****\]** will return:Correct
- **\[****+myplaceholder:isnot=`myvalue`:then=`Correct`:else=`Incorrect`+****\]**
- **\[****+myplaceholder:is=`othervalue`:then=`Correct`:else=`Incorrect`****+\]** will both return:Incorrect

##### Example 2

- **myplaceholder** is set to **2**
- **someplaceholder** is set to **3**
- **otherplaceholder** is set to **1**

```
<pre class="brush: php">     [+myplaceholder:is=`2`:then=`
     {{ChunkGood}}
     `:else=`
     {{ChunkBad}}
     `+]

```Will display the contents of chunk called **ChunkGood**.

- \[+<ins>myplaceholder:gt=`1`:then=`Yes`:else=`No`</ins>+\]
- \[<ins>+myplaceholder:lt=`3`:and:gt=`1`:then=`Yes`:else=`No`</ins>+\]
- \[<ins>+myplaceholder:lt=`\[+someplaceholder</ins>\]`:then=`Yes`:else=`No`+\]
- \[<ins>+myplaceholder:islt=`2`:then=`Yes`:else=`No`</ins>+\]
- \[<ins>+myplaceholder:isnot=`2`:or:lt=`3`:then=`Yes`:else=`No`</ins>+\]

Will all return **Yes**.

- \[<ins>+myplaceholder:isnot=`2`:then=`Yes`:else=`No`</ins>+\]
- \[<ins>+myplaceholder:gt=`\[+someplaceholder</ins>\]`:then=`Yes`:else=`No`+\]
- \[<ins>+myplaceholder:lt=`2`:then=`Yes`:else=`No`</ins>+\]
- \[<ins>+myplaceholder:gt=`2`:then=`Yes`:else=`No`</ins>+\]
- \[<ins>+myplaceholder:lt=`1`:then=`Yes`:else=`No`</ins>+\]

Will all return **No**.

Custom modifiers
----------------

A modifier is in fact a replacement for a simple snippet to process a given value to anything you like. It's possible to create your own custom modifiers/mini-snippets by adding a new snippet into the MODx resource manager.

Because a modifier doesn't hold complicated code you don't need parameters other than what a modifier in PHx gets from the parser. There are two main variables:

1. **$output** the current value of the variable that is getting "modified"
2. **$options** (optional) an optionial string that a modifier could have

To bring this into perspective here are some short examples assuming **myplaceholder** is set to **"test"**:

```
<pre class="brush: php">[+myplaceholder:mymodifier+]

```- **$output** contains the value "**test**".
- **$options** contains **nothing** because they aren't specified.

```
<pre class="brush: php">[+myplaceholder:mymodifier=`my options`+]

```- **$output** still contains the value "**test**".
- **$options** contains the value "**my options**".   
   ----**Other variables (advanced users)**
- **$input** contains the original input (starting value).
- **$condition** an array containing the elements that make up a conditional statement (, _1_, _||_ and _&&_).

### Creating a custom modifier

#### Example: I love MODx

With this knowledge we are going to create a new custom modifier. In this example I want to create a modifier (without options) that adds the string " because I love MODx" to a variable.

1. Login to the MODx manager
2. Go to Resources -> Manage Resources -> Snippets
3. Click "new snippet"
4. For the snippet name we enter "'**_phx:love'_**" For PHx to know about the custom modifier all snippets created for PHx should be prefixed with "phx:" the string (containing NO spaces) after the prefix will be the actual modifier name. In this case our modifier will be triggered by adding :love to the placeholder like \[<ins>+myplaceholder:love</ins>+\].
5. Now we are going to enter the modifier code into the snippet code field. For this example we create it like this:
6. Click "Save" and your custom modifier (**:love**) is ready for use!

#### Example: I love MODx even more

Similar to example 1 we are now going to create a modifier that will do the same BUT if there are options specified it will take the options value as the string to append.

1. Login to the MODx manager
2. Go to Resources -> Manage Resources -> Snippets
3. Click "new snippet"
4. For the snippet name we enter "**phx:love2**" For PHx to know about the custom modifier all snippets created for PHx should be prefixed with "phx:" the string (containing NO spaces) after the prefix will be the actual modifier name. In this case our modifier will be triggered by adding :love to the placeholder like **\[****<ins>+myplaceholder:love2</ins>****+\]**.
5. Now we are going to enter the modifier code into the snippet code field. For this example we create it like this:

```
<pre class="brush: php"><?php
$defaultValue = " because I do love MODx";
if (strlen($options)>0) {
$newvalue = $output . $options;
} else {
$newvalue = $output . $defaultValue;
}
return $newvalue;
?>

```1. Click "Save" and your custom modifier (**:love2**) is ready for use!

### Contributed

Check [PHx/CustomModifiers](/extras/evo/phx/phx-custom-modifiers "PHx Custom Modifiers") for a list of custom modifiers you can install.

Tips and Tricks
---------------

### Using PHx in non-phx snippet templates

Most snippets render their templates "locally" before they are passed to MODx. Unless the snippet's description states it's using PHx to render the templates it's not possible to use the modifiers directly, however you still CAN use PHx by using a special modifier called phx:input.

This example will **not** work with a non-PHx snippet:

```
<pre class="brush: php">[+phx:input=`[+myplaceholder+]`:modifier1:modifier2+]

```Try this method instead:

```
<pre class="brush: php">[+phx:input=`[+myplaceholder+]`:modifier1:modifier2+]

```Or:

```
<pre class="brush: php">[+phx:input=`[+myplaceholder+]`:modifier1:modifier2+]

```This example will work with a non-PHx snippet. Some restrictions may apply depending on the snippet logic.

Technical Documentation
-----------------------

This part of the documentation is not intended for the average user but is just here to give some background information of how PHx works.

PHx makes use of the **OnParseDocument** (MODx API) event to process the documentOutput. OnParseDocument is triggered before the default MODx elements are processed so PHx is activated on the raw template version of the output and goes trough the following phases:

1. We only start if we did not reach maximum passes yet.
2. A hash is made of the current content of the document to check for changes in the process later on.
3. The document is prepared with some filters to escape the rogue bracket characters (the ones that are not part of a MODx tag).
4. The document now enters the main parser function:
  1. A hash is made of the current content of the document to check for changes in the process later on.
  2. Chunks are merged using **mergeChunkContent** (MODx API).
  3. Snippets are detected using an advanced regular expression that takes nested tags into account:
      1. Snippet calls which contain no nested tags are matched.
      2. Each matching call is checked for (non-)cached output, prepared and passed to **evalSnippets** (MODx API).
  4. Snippet output is merged with the document.
  5. The rest of the MODx tags are detected using an advanced regular expression that takes nested tags into account:
      1. Document/Template Variable output is gathered from **mergeDocumentContent** (MODx API).
      2. Setting Variables output is gathered from **mergeSettingsContent** (MODx API).
      3. Placeholder output is gathered in the following order PHx, MODx.
      4. If the requested placeholder is not set it is skipped for the current pass (replaced with original).
  6. For each detected tag, the ones which also contains modifiers are passed to the filter that will modify the value as given.
  7. The final output for all tags is then merged into the document.
  8. A hash is made of the content of the merged document and compared to the initial hash to check if there were changes.
  9. If we did not reach maximum passes AND if the document content has changed we repeat this entire level (pass+1).
5. The document's rogue bracket characters are restored to their non-escaped versions.
6. The tags that are still present (and thus unresolved for the entire document) are removed from the output.
7. A hash is made of the new document content and compared to the initial hash to check if there were changes.
8. If the document content has changed let it repeat this entire level.
9. Log the parser steps into the Event Log if required.
10. Return the new documentOutput to MODx.

After the entire PHx logic is through, it's 99% certain that MODx does not have any tags left to parse. You could say that PHx replaces the core function of MODx that handles the merging (with added flexibility by allowing nesting). However, the different types of elements are still processed by the responsible MODx functions.

Troubleshooting
---------------

If you experience problems with the page loading slowly, this could be cause by a PHx loop. Lower the Max Passes value to 5 or 10, this should allow the affected page to finish loading thus showing the error.

Example of a PHx Loop:Page Call: \[<ins>+phx:if=`</ins><ins><span class="error">\[\*shownews\*\]</span></ins><ins>`:is=`1`:then=`</ins>`<ins>Chunk</ins>`<ins>`</ins>+\]   
 Chunk Contents: ?\[<ins>+phx:if=`</ins><ins><span class="error">\[\*shownews\*\]</span></ins><ins>`:is=`1`:then=`</ins>`<ins>Chunk</ins>`<ins>`</ins>+\]