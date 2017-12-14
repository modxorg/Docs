---
title: "AjaxSearch"
_old_id: "601"
_old_uri: "evo/ajaxsearch"
---

<div class="note">AjaxSearch is currently only available for MODx Evolution.</div><div>- - [Download](#AjaxSearch-Download)
  - [Description](#AjaxSearch-Description)
  - [Features](#AjaxSearch-Features)
  - [AjaxSearch installation](#AjaxSearch-AjaxSearchinstallation)
  - [Setup parallel installations](#AjaxSearch-Setupparallelinstallations)
  - [Search Highlight plugin installation](#AjaxSearch-SearchHighlightplugininstallation)
  - [advSearch Highlight plugin installation](#AjaxSearch-advSearchHighlightplugininstallation)
- [AjaxSearch Usage](#AjaxSearch-AjaxSearchUsage)
  - [Creating your first search](#AjaxSearch-Creatingyourfirstsearch)
  - [Creating your first search (non-ajax mode)](#AjaxSearch-Creatingyourfirstsearch%28nonajaxmode%29)
  - [Search Highlight plugin Usage (optional)](#AjaxSearch-SearchHighlightpluginUsage%28optional%29)
- [AjaxSearch Parameters](#AjaxSearch-AjaxSearchParameters)
  - [General Parameters](#AjaxSearch-GeneralParameters)

</div>Download
--------

- [Download AjaxSearch](http://modxcms.com/extras/package/8 "Download AjaxSearch")

Description
-----------

The AjaxSearch snippet is an enhanced version of the original FlexSearchForm snippet for MODx. This snippet adds AJAX functionality on top of the robust content searching.

- Search in title, description, content, alias, intro and Template Variable (TV) values of documents
- Search in title and description of \[[MaxiGallery](/extras/evo/maxigallery "MaxiGallery")\] images. Display the images found as search results with a link to the image in the gallery
- Search in content of jot and display the document with the comment
- Search in your own tables (it is required to describe them)

Features
--------

It could works in two modes:

- ajaxSearch mode : 
  - search results are displayed in a popup window over the current page through an AJAX request
  - available link to view all results in a new page when only a subset is retuned (Show more results link)
  - allow a live search (Each new letter which is entering in the search box provide new search results)
  - tune the opacity parameter of the popup window
  - Uses the MooTools or jQuery js library for AJAX and visual effects
  - with JS disabled swap to the non-ajaxSearch mode

- non-ajaxSearch mode : 
  - search results displayed in a new page
  - customize the paginating of results
  - works without JS enabled as FlexSearchForm
  - designed to load only the required non-ajaxSearch code

for the two modes :

- provide several templates to customize search input form and search results
- use extended place holder and template parameters to fit your needs
- redifined the templates and provide them as file or chunck
- advanced seach allow to search among the search words provided between: one word, all words, the exact phrase or no words
- a template is available to let the user choose the advanced search parameter
- rather to use a search input field, use a template with a drop down list with predefined search terms
- define search in subset of documents and adds radio-buttoms to let the user choose where applied the search
- specify the subset by using a list of id or by providing a list of hierachies of documents
- specify the search into the hidden documents and into the documents of reference type (links))
- search terms are searched in private documents only if you are logged as a user who has the rights of access on the document group of the document
- user could define his own strip functions to applied on input search term or on search results
- define in which tables the search will occur. content, tv, maxigallery, jot available
- do a search in your own tables. Define the main table and the joined table. Do a search with them.
- specify precisely in which fields you want use for search
- restrict the search to a list of TVs
- filter unwanted documents of the search. Use the metacharacter # as search terms
- define the content (which fields from which tables) of extract
- define the maximum number of extracts to be shown
- define your own extract ellipsis and add the extract separator you want
- all the searchable text fields of results are available as extended placeholders
- highlighting of searchword in the extracts returned
- display the path of documents found by adding a breadcrumb
- order the results
- define the ranking value and sort the results with it
- choose the clear default mode to don't lose the initial phrase in the input form
- use a configuration file to define permanent parameters. Decide if snippet call parameters overwrite or not the configuration definition.
- 2 debug modes. Output the trace in a file or directly in the firebug console. 3 levels of log.
- external language files to ease the implementation of multi-language site
- log the search requests (successfull and unsucessfull)
- allow your end user to comment the search results

AjaxSearch installation
-----------------------

- Extract the contents of the zip file to your computer
- Open the js/ajaxSearch.js file and set the loading & close image path to an image you want to display while the search is working. Otherwise the default ajax image will be used. You could also change the relative url by your absolute url if needed.
- FTP the ajaxSearch folder to your server under assets/snippets and the files and sub-folders will go to correct place
- Close your FTP program and go to the MODx manager
- Go to MODx manager and create a new snippet called `AjaxSearch` and paste the contents of `snippet.ajaxSearch.txt` to it
- Call the snippet on some document with the parameters you want. Note: If javascript is disabled the snippet functions like the original FlexSearchForm. So you will want to set any of the other options in the snippet call for these users. Test by calling via `<span class="error">[\!AjaxSearch? &ajaxSearch=0 &otherParamsAsNeeded=`here`\!]</span>`
- Use the following styles to change how your search looks:

<figure class="code"><figcaption>**styles for the layout template**</figcaption>```
<pre class="brush: html">
        #ajaxSearch_form {
            color: #444;
            width: auto;
        }
        #ajaxSearch_input {
            width: auto;
            display: inline;
            height: 17px;
            border: 1px solid #ddd;
            border-left-color: #c3c3c3;
            border-top-color: #7c7c7c;
            background: #fff url(images/input-bg.gif) repeat-x top left;
            margin: 0 3px 0 0;
            padding: 3px 0 0;
            vertical-align: top;
        }
        #ajaxSearch_submit {
            display: inline;
            height: 22px;
            line-height: 22px;
        }
        #ajaxSearch_output {
            border: 1px solid #444;
            padding: 10px;
            background: #fff;
            display: block;
            height: auto;
            vertical-align: top;
        }
        .AS_ajax_result {
            color: #444;
            margin-bottom: 3px;
        }
        .AS_ajax_resultLink {
            text-decoration: underline;
        }
        .AS_ajax_resultDescription{
            color: #555;
        }
        .AS_ajax_more {
            color: #555;
        }

```</figure><figure class="code"><figcaption>**styles for the paging template**</figcaption>```
<pre class="brush: html">
        .ajaxSearch_paging {

        }

```</figure>- styles for ajax results and results. See the detailed section below.

Setup parallel installations
----------------------------

If you want to install new version, but want to try it first and don't want to replace your current AjaxSearch installation, you can do parallel setup.

- Extract the contents of the zip file to your computer
- Rename ''ajaxSearch'' folder in the extracted files to something else, for example ''ajaxSearch-new''
- Open the extracted snippet.ajaxSearch.php and change<br><code>define('AS\_SPATH', 'assets/snippets/ajaxSearch/');</code><br>to<br><code>define('AS\_SPATH', 'assets/snippets/ajaxSearch-new/');</code>
- Open the extracted ajaxSearchPopup.php and change<br><code>define('AS\_SPATH', 'assets/snippets/ajaxSearch/');</code><br>to<br><code>define('AS\_SPATH', 'assets/snippets/ajaxSearch-new/');</code>
- Open the extracted js/ajaxSearch.js and change <br><code>var \_base = 'assets/snippets/ajaxSearch/';</code><br>to<br><code>var \_base = 'assets/snippets/ajaxSearch-new/';</code>
- FTP the ajaxSearch-new folder to your server under assets/snippets and the files and sub-folders will go to correct place
- Go to MODx manager and create a new snippet called ''AjaxSearchNew'' and paste the contents of ''snippet.ajaxSearch.php'' to it
- Use AjaxSearchNew snippet call in some document and view results

Search Highlight plugin installation
------------------------------------

- Extract the contents of the zip file to your computer
- Create a new plugin named SearchHighlight
- Copy the contents of the file plugin.searchHighlight.tpl into the plugin
- On the System Events tab of the plugin, select OnWebPagePrerender
- To improve the performances, the searchHighlight plugin uses the <body> tag. If you use a complex body tag like '<body id="type-a">', change the line 53 of the plugin:<code>$body = explode("<body>", $output);</code> // break out the head</code><br>with your own body tag.

advSearch Highlight plugin installation
---------------------------------------

advSearch is a variation of the SearchHighlight plugin. Use which fit your needs the better.

- Extract the contents of the zip file to your computer
- Create a new plugin named AdvSearchHighlight
- Copy the contents of the file plugin.advSearchHighlight.tpl into the plugin
- On the System Events tab of the plugin, select OnWebPagePrerender.
- 
- In your templates or documents define which section could be highlighted.
- For that frame the search content sections you want by "< <span class="error">Unable to render embedded object: File (--start highlight-->" and <) not found.</span>-<del>end highlight</del>->
- This will limit the highlighting of search words to this part of your document.

AjaxSearch Usage
================

Creating your first search
--------------------------

In a document:

1. Put the snippet call <span class="error">\[!AjaxSearch!\]</span> in the document content area and save the document
2. Check ''Published'' and ''Searchable'' on the ''Page Settings'' tab

In a template:

1. Put the snippet call <span class="error">\[!AjaxSearch!\]</span> in the template and save it
2. Create a document with your template
3. Check ''Published'' and ''Searchable'' on the ''Page Settings'' tab of your document

Creating your first search (non-ajax mode)
------------------------------------------

In a document:

1. Put the snippet call <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0`\\!\]</span> in the document content area and save the document
2. Check ''Published'' and ''Searchable'' on the ''Page Settings'' tab

To show the results in other page:

1. Put the snippet call <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_landing=`x`\\!\]</span> in the document content area and save the document. Here x is the id of your results page.
2. Check ''Published'' and ''Searchable'' on the ''Page Settings'' tab
3. Create the page #x with the snippet call <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_showForm=`0`\\!\]</span>

'''IMPORTANT NOTE:'''

- Your database character set is different of utf8:   
  \#the php\_mbstring extension for the multibyte support should be loaded. Check the phpinfo file of your server   
  \#the $database\_connection\_charset variable of your /manager/includes/config.inc.php file should be set with the MySql database character set (not the collation) of your database. e.g: latin1, latin2, ...

Searching for words containing characters like "å,ä,ö,Å,Ä,Ö" require to configure your editor to avoid entity encoding.   
With TinyMCE, for that, change the entity\_encoding parameter from "named" to "raw" in the configuration tab and save again your documents.

See below the error messages section that you can get.

Search Highlight plugin Usage (optional)
----------------------------------------

1. Somewhere in your template or document add the html: <code><!-<del>search\_terms</del>-></code>
2. This will display the search terms and a link to remove the highlighting
3. Do a search and click the link to see the search highlighting carried through to the page

AjaxSearch Parameters
=====================

General Parameters
------------------

<table><tbody><tr><th>Parameter</th><th>Possible values</th><th>Default value</th></tr><tr><td>&config   
Load a custom configuration. (optional)</td><td>string as configuration file name.   
  
Configuration files should be named in the form: <config\_name>.config.php.   
Other config installed in the configs folder or in any folder within the MODx base path via @FILE</td><td> </td></tr><tr><td>&mbstring   
php\_mbstring extension</td><td>1: mbstring extension available (default)   
0: don't use php\_mbstring extension   
  
The php\_mbstring is supposed to be loaded.   
If html charset page is "UTF-8", php\_mbstring extension should be loaded for language which need a multi-byte representation.   
If the extension is not available for the PHP server, some charset like ISO-8859-1 (latin1) could be used.   
With UTF-8, a message "Php\_mbstring extension is required" when &mbstring=`1` and the extension not loaded.   
In this case load the extension or set the mbstring parameter to 0 if you couldn't load the extension.</td><td>1</td></tr><tr><td>&language   
Sets the ajaxSearch language.(optional)</td><td>chinese (traditional or not), english, finish, francais, german, hebrew, italian, japanese, nederlands, norsk, persian, portugues, portuguese-br, russian, slovak, spanish, svenska   
  
Note: Language files are not fully implemented yet. Feel free to add your language(s). (See english.inc.php for examples.)</td><td>the language set for your MODx manager</td></tr><tr><td>&debug   
Output debugging information.(optional)</td><td>0 : debug not activated   
File mode : Trace is by default logged into a file named ajaxSearch\_log.txt in the ajaxSearch folder.   
1 : Parameters, search context and sql query logged.   
2 : Parameters, search context, sql query AND templates logged   
3 : Parameters, search context, sql query, templates AND Results logged   
  
To avoid an increasing of the file, only one transaction is logged. Overwritten by the log of the following one.   
  
FireBug mode : The trace is logged into the firebug console of Mozilla.   
-1 : Parameters, search context and sql query logged.   
-2 : Parameters, search context, sql query AND templates logged   
-3 : Parameters, search context, sql query, templates AND Results logged   
  
with the FireBug mode you need to install: the Firebug plugin under Firefox : <https://addons.mozilla.org/en-US/firefox/addon/1843> and the FirePhp plugin (version 0.2.b.1 or upper) : <http://www.firephp.org/>  
  
For the FireBug mode, Php5 is mandatory. These level -1,-2,-3 are switched respectively to 1,2,3 if your server runs with Php4.   
  
For security reasons, the full name of tables (with database name) have been replaced by short names (prefix + table name only). The output produce the SELECT statement and you could use it directly by copy & paste in PhpMyAdmin to retrieve your results and understand it.</td><td>0</td></tr><tr><td>&ajaxSearch   
Use the ajaxSearch mode.(optional)   
  
The AjaxSearch mode use an Ajax call to get the results without full page reloading</td><td>0 , 1</td><td>1 (true)</td></tr><tr><td>&advSearch   
Set the advanced search options. (optional)</td><td>exactphrase : provides the documents which contain the exact phrase   
allwords : provides the documents which contain all the words   
nowords : provides the documents which do not contain the words   
oneword : provides the document which contain at least one word</td><td>oneword</td></tr><tr><td>&subSearch   
subSearch allow to use radio buttons to select sub-domains where to search. (optional)</td><td>Integer,Integer   
  
Initialize the subSearch by defining the number of possible choices (radio-buttons) and choose the default checked selection e.g: 6,2 - 6 sub-domains (radio-buttons), the second one selected by default. Each sub-domain should be defined by a function in the configuration file. See layout template section.</td><td>5,1</td></tr></tbody></table>'''&whereSearch '''

Set in which tables & fields the search occurs. (optional)

tables & fields should be described as:   
table\_name<span class="error">\[:list\_of\_field\_names\]</span>\[|table\_name<span class="error">\[:list\_of\_field\_names\]</span>\]

The MODx "content\_site" table is define as main table. Nick name: content   
"tmplvar\_contentvalues" table is defined as a joined table. Nick name: tv   
"jot\_content" table is defined as a joined table. Nick name: jot   
"maxigallery" table is defined as joined table. Nick name: maxigallery

For these AS predefined tables, the fields available for search are the following:

- content:pagetitle,longtitle,description,alias,introtext,menutitle,content
- tv:tv\_value
- jot:jot\_content
- maxigallery:gal\_title,gal\_descr,gal\_filename

All these fields are usable for display.   
If you would like use the table for display but not as searchable fields, use the NULL metacharacter. e.g: &whereSearch=`content:NULL|tv`

content|tv

which means: content:pagetitle,longtitle,description,alias,introtext,menutitle,content | tv:tv\_value

<table><tbody><tr><td>-</td></tr></tbody></table>'''&withTvs '''

Specify the template variables (TV) used with the search. (optional)

<span class="error">\[+ \]</span>:comma separated TV names list

\*+:comma separated TV names list : use only these TVs in the search   
\*-:comma separated TV names list : exclude these TVs of the search

e.g:   
&withTvs=`+:tag1,tag2`   
&withTvs=`-:tag1,tag2`

all the TVs are used

<table><tbody><tr><td>-</td></tr></tbody></table>'''&order '''

Define in which order are sorted the displayed search results. (optional)

comma separated list of table fields with optionaly the key word "DESC"

e.g: pagetitle DESC, publishedon

publishedon,pagetitle (sorted by published date and then pagetitle)

<table><tbody><tr><td>-</td></tr></tbody></table>'''&rank '''

define the ranking of search results. (optional)

comma separated list of fields with optionaly user defined weight   
\[string<span class="error">\[:Integer\]</span>\[|\[string<span class="error">\[:Integer\]</span>\]\]\]

e.g: pagetitle:100,alias:10,extract   
A document with the search term found one time in pagetitle, one time in alias and five time in the extract (defined the parameter &extract) has a rank value of 100+10+5 = 115. Results are ordered by rank value. Results with same rank value are ordered by &order parameter

pagetitle:100,extract

<table><tbody><tr><td>-</td></tr></tbody></table>'''&minChars '''

Minimum number of characters to require for a word to be valid for searching. (optional)

Integer

3

<table><tbody><tr><td>-</td></tr></tbody></table>'''&maxWords '''

Limit the amount of keywords that will be queried by a search. (optional)   
Maximum number of words for searching

Integer

5

<table><tbody><tr><td>-</td></tr></tbody></table>'''&AS\_showForm '''

Show the search form with the results.(optional)

\*0   
\*1

1 (true)

<table><tbody><tr><td>-</td></tr></tbody></table>'''&AS\_showResults '''

Show the results with the snippet.(optional)   
(For non-ajax search)

\*0   
\*1

1 (true)

<table><tbody><tr><td>-</td></tr></tbody></table>'''&extract '''

Define the maximum number of extracts that will be displayed per document and define which fields will be used to set up extracts. (optional)

Integer:Comma separated list of searchable fields

e.g: 99:content

1:content,description,introtext,tv\_content

<table><tbody><tr><td>-</td></tr></tbody></table>'''&extractEllips '''

define your ellipsis in extract. (optional)

string used as ellipsis to start/end an extract

...

<table><tbody><tr><td>-</td></tr></tbody></table>'''&extractSeparator '''

Length of extract around the search words found. (optional)

html tag like <code><br /></code> or <code><hr /></code> or any other html tag

<code><br /></code>

<table><tbody><tr><td>-</td></tr></tbody></table>'''&extractLength '''

Define how separate extracts. (optional)

50 < Integer < 800

200

<table><tbody><tr><td>-</td></tr></tbody></table>'''&highlightResult '''

Create links so that search terms will be highlighted when linked page clicked. (optional)

Require the use of the highligth plugin.

\*0   
\*1

1 (true)

<table><tbody><tr><td>-</td></tr></tbody></table>'''&formatDate '''

The format of outputted dates. (optional)

See <http://www.php.net/manual/en/function.date.php>

d/m/y : H:i:s e.g: 21/01/08 : 23:09:22

<table><tbody><tr><td>-</td></tr></tbody></table>'''&hideMenu '''

Search in hidden documents from menu. (optional)

\*0 : search only in documents visible from menu   
\*1 : search only in documents hidden from menu   
\*2 : search in hidden or visible documents from menu

2

<table><tbody><tr><td>-</td></tr></tbody></table>'''&hideLink '''

Search in content of type reference (Links). (optional)

\*0 : search in content of type document AND reference   
\*1 : search only in content of type document

1

<table><tbody><tr><td>-</td></tr></tbody></table>'''&parents '''

To define a subset of documents where to search. (optional)

A comma separated list of parent-documents whose descendants you want searched to &depth depth when searching.

all the public documents

<table><tbody><tr><td>-</td></tr></tbody></table>'''&depth '''

Number of levels deep to go. (optional)

Integer > 0

10

<table><tbody><tr><td>-</td></tr></tbody></table>'''&documents '''

To define a subset of documents where to search. (optional)

A comma separated list of documents where to search

all the public documents

<table><tbody><tr><td>-</td></tr></tbody></table>'''&filter '''

Exclude unwanted documents. (optional)

&filter runs as the &filter Ditto 2.1 parameter.   
(see [http://ditto.modxcms.com/tutorials/basic\_filtering.html](http://ditto.modxcms.com/tutorials/basic_filtering.html))

The metacharacter '#' is replaced by the search string provided by the web user   
when used with the filter parameter. The advSearch parameter is also taken into account.

e.g: &filter=`pagetitle,#,8` with searchString=`school child` and advSearch='oneword'   
is equivalent to &filter=`pagetitle,school,8|pagetitle,child,8`

''

<table><tbody><tr><td>-</td></tr></tbody></table>'''&stripInput '''

stripInput user function to transform on fly the search input extract. (optional)

string as a php function name, defined in the configuration file.

See configuration file section.

defaultStripInput() function

<table><tbody><tr><td>-</td></tr></tbody></table>'''&stripOutput '''

stripOutput user function to transform on fly the search output extract. (optional)

string as a php function name, defined in the configuration file.

See configuration file section.

defaultStripOutput() function

<table><tbody><tr><td>-</td></tr></tbody></table>'''&searchWordList '''

searchWordList user function to define a search word list. (optional)

string<span class="error">\[,array\]</span>  
string as a php function name, defined in the configuration file.   
See configuration file section.   
array of values as parameters

e.g: mySearchWordList,<span class="error">\[!snippet!\]</span> where<span class="error">\[!snippet!\]</span> for instance return a list of ids

''

<table><tbody><tr><td>-</td></tr></tbody></table>'''&clearDefault '''

clearing default text. (optional)   
add the class "cleardefault" to your input text form and set this parameter

\*0 : not activated   
\*1 : activated. Include the clear default js function in header

0

<table><tbody><tr><td>-</td></tr></tbody></table>'''&breadcrumbs '''

Display the path of the documents found. (optional)

\*0 : disallow the breadcrumbs link   
\*string as name of the breadcrumbs function : allow the breadcrumbs link

Breadcrumbs is the default function provided for the "content" table   
The function name could be followed by some parameter initialization

e.g: &breadcrumbs=`Breadcrumbs,showHomeCrumb:0,showCrumbsAtHome:1`

0

<table><tbody><tr><td>-</td></tr></tbody></table>'''&tvPhx '''

Set placeHolders for TV (template variables). (optional)

\*0 : disallow the feature   
\*joined table name,display function

tv:displayTV : set up a placeholder named <span class="error">\[+as.tvName+\]</span> for each TV (named tvName) linked to the documents found   
displayTV is a provided ajaxSearch function which render the TV output for "tv" table

tvPhx could also be used with custom tables

0

<table><tbody><tr><td>-</td></tr></tbody></table>'''&asLog '''

Capturing failed search criteria and search logs. (optional)

ajaxSearch log \[ level \[: comment <span class="error">\[: purge\]</span>\]\]

level:   
\*0 : disallow the ajaxSearch log (default)   
\*1 : failed search requests are logged   
\*2 : all ajaxSearch requests are logged

comment:   
\*0 : user comment not allowed (default)   
\*1 : user comment allowed

purge: number of logs allowed before to do an automatic purge of the table   
\*0 : no purge allowed (= illimited number of logs)   
\*default: 200

&asLog=`x` is equivalent to &asLog=`x:0:200`   
&asLog=`x:y` is equivalent to &asLog=`x:y:200`

&asLog=`1:1:500` means that 500 failed search requests possibly commented by the end user could be stored in the ajaxSearch\_log table

&tplComment : chunk to style comment form   
by default: @FILE:".AS\_SPATH.'templates/comment.tpl.html'

You need to paste the following code into your CSS file. Otherwise the field will not be hidden.

.ajaxSearch\_hiddenField

<div class="error"><span class="error">Unknown macro: { position}</span></div>0:0:200

<table><tbody><tr><td>-</td></tr></tbody></table>'''&tplLayout '''

chunk to style the ajaxSearch input form and layout. (optional)

\*string as chunck name   
\*string as '@FILE:' + template file path

e.g: @FILE:assets/snippets/ajaxSearch/templates/myLayout.tpl.html

'@FILE:'' . AS\_SPATH . 'templates/layout.tpl.html

<table><tbody><tr><td>-</td></tr><tr><td>}</td></tr></tbody></table>===Ajax Parameters - Used by the ajaxSearch mode===

<div class="error"><span class="error">Unknown macro: {| border="1" cellpadding="20" cellspacing="0"!width="450" |Parameter!align="center" width="180" |Possible values!width="180" |Default value|-|'''&ajaxMax ''' The number of results you would like returned from the ajax search. (optional)|Integer|6|-|'''&showMoreResults ''' If you want a link to show all of the results from the ajax search. (optional)|\*0\*1|0 (false)|-|'''&moreResultsPage ''' Page you want the more results link to point to. (optional) This page should contain another call to this snippet for displaying results.|ID's of a document|0|-|'''&liveSearch ''' There are two forms of the ajaxSearch mode. (optional) Parameter formely named ajaxSearchType |\*0 - The form button is displayed and searching does not start until the button is pressed by the user.\*1 - There is no form button, the search is started automatically as the user types (liveSearch)|0|-|'''&opacity ''' Opacity of the ajaxSearch\_output div where are returned the ajax results. (optional) From transparent (0.) to opaque (1.)|0. < Float < 1.|1.|-|'''&addJscript ''' If you want the mootools library added to the header of your pages automatically set this to 1. (optional) Set to 0 if you do not want them included automatically.|\*0\*1|1 (True)|-|'''&jScript ''' Choose between Mootools (1.11 or 1.2) or jQuery. (optional)Set this to jquery if you would like to include the jquery library rather than mootools|\*mootools\*mootools1.2\*jquery|mootools|-|'''&jsMooTools ''' Location of the mootools javascript library|path to the mootools library|manager/media/script/mootools/mootools.js|-|'''&jsJquery ''' Location of the Jquery javascript library|path to the jquery library|AS\_SPATH . 'js/jQuery/jquery.js'|-|'''&tplAjaxResults ''' chunk to style the ajax output results outer. (optional)|\*string as chunck name\*string as '@FILE}</span></div>===Non Ajax Parameters - Used by the non-ajaxSearch mode===

<div class="error"><span class="error">Unknown macro: {| border="1" cellpadding="20" cellspacing="0"!width="450" |Parameter!align="center" width="180" |Possible values!width="180" |Default value|-|'''&AS\_landing ''' Document id you would like the search to show on. (optional) This page should contain another call to this snippet for displaying results.|ID's of a document|0|-|'''&grabMax ''' The max number of records you would like on each page. (optional) Set to 0 if unlimited.|Integer >= 0|10|-|'''&showPagingAlways ''' always display paging. Even if you get only one page. (optional) Two use cases}</span></div>==Placeholders==

To use an another template, define the template name and location with   
@FILE:assets/snippets/ajaxSearch/templates/folderName/templateName.tpl.htm   
or create a chunck parameter by copy/paste and change of an existing template.

\*&tplLayout : chunk to style the ajaxSearch input form and layout   
Global ajaxSearch layout (input form, intro message, results)   
by default : /templates/layout.tpl.html

Non ajax mode & more results page :

\*&tplResults : chunk to style the output results outer   
Results outer layout (number of results, list of results, paging)   
by default : /templates/results.tpl.html

\*&tplResult : chunk to style each output result   
Result template (title link, description, extract, breadcrumbs link)   
by default : /templates/result.tpl.html

\*&tplPaging : chunk to style the paging links   
Paging link template (pages, current page)   
by default : /templates/paging.tpl.html

\*&tplComment   
chunk to style comment form   
by default: @FILE:".AS\_SPATH.'templates/comment.tpl.html'

Ajax mode :

\*&tplAjaxResults : chunk to style the ajax output results outer   
Results outer layout (number of results, list of results, more results link)   
by default : /templates/ajaxResults.tpl.html

\*&tplAjaxResult : chunk to style each ajax output result   
Result template (title link, description, extract, breadcrumbs link)   
by default : /templates/ajaxResult.tpl.html

searchString available as placeholder   
Use <span class="error">\[+as.searchString+\]</span> to get the search string used for the search.   
For instance use "Search results for <span class="error">\[+as.searchString+\]</span>" as pagetitle for your landing page.

All the fields of the main table and of the joined table defined as "displayed"   
in the table definition could be used with the tplResult and tplAjaxResult templates:

For each field named "xxxx" we having:   
<span class="error">\[+as.xxxx+\]</span> the content of the field named xxxx   
<span class="error">\[+as.xxxxShow+\]</span> a boolean value which is equal to 0 when xxxx='', 1 otherwise   
<span class="error">\[+as.xxxxClass+\]</span> a class name equal to:

- ajaxSearch\_resultXxxx for the non ajax results (&tplResult)
- AS\_ajax\_resultXxxx for the ajax window (&tplAjaxResult)

For instance, with &whereSearch="content,tv", the following informations are available

\*"content" as main table - id field : <span class="error">\[+as.id+\]</span>  
\*"content" as main table - date field : <span class="error">\[+as.publishon+\]</span>  
\*"content" as main table - displayed fields :

\*<span class="error">\[+as.pagetitle+\]</span>, <span class="error">\[+as.pagetitleShow+\]</span>, <span class="error">\[+as.pagetitleClass+\]</span>  
\*<span class="error">\[+as.longtitle+\]</span>, <span class="error">\[+as.longtitleShow+\]</span>, <span class="error">\[+as.longtitleClass+\]</span>  
\*<span class="error">\[+as.description+\]</span>, <span class="error">\[+as.descriptionShow+\]</span>, <span class="error">\[+as.descriptionClass+\]</span>  
\*<span class="error">\[+as.alias+\]</span>, <span class="error">\[+as.aliasShow+\]</span>, <span class="error">\[+as.aliasClass+\]</span>  
\*<span class="error">\[+as.introtext+\]</span>, <span class="error">\[+as.introtextShow+\]</span>, <span class="error">\[+as.introtextClass+\]</span>  
\*<span class="error">\[+as.menutitle+\]</span>, <span class="error">\[+as.menutitleShow+\]</span>, <span class="error">\[+as.menutitleClass+\]</span>  
\*<span class="error">\[+as.content+\]</span>, <span class="error">\[+as.contentShow+\]</span>, <span class="error">\[+as.contentClass+\]</span>

\*"content" as main table - breadcrumbs link:   
\*<span class="error">\[+as.breadcrumbs+\]</span>,<span class="error">\[+as.breadcrumbsShow+\]</span>,<span class="error">\[+as.breadcrumbsClass+\]</span>

\*"tv" as joined table - 'concat\_alias' field : <span class="error">\[\\+as.tv\_value\]</span>, <span class="error">\[\\+as.tv\_valueShow\\+\]</span>, <span class="error">\[\\+as.tv\_valueClass\\+\]</span>

and in any case the extract result built with &extract parameter:

\*<span class="error">\[+as.extract+\]</span>, <span class="error">\[+as.extractShow+\]</span>, <span class="error">\[+as.extractClass+\]</span>  
with AS\_ajax\_resultExtract (ajax) or ajaxSearch\_resultExtract (non-ajax) as class names

With &whereSearch="content,tv,maxigallery,jot" we add :

\*<span class="error">\[\\+as.jot\_content\]</span>, <span class="error">\[\\+as.jot\_contentShow\]</span>, <span class="error">\[\\+as.jot\_contentClass\]</span>  
\*<span class="error">\[\\+as.gal\_title\]</span>, <span class="error">\[\\+as.gal\_titleShow\]</span>, <span class="error">\[\\+as.gal\_titleClass\]</span>  
\*<span class="error">\[\\+as.gal\_descr\]</span>, <span class="error">\[\\+as.gal\_descrShow\]</span>, <span class="error">\[\\+as.gal\_descrClass\]</span>

&tvPhx : Set placeHolders for TV (template variables)

\*0 : disallow the feature   
\*'tv:displayTV' : set up placeholders for each TV (named tvName) linked to the documents found (default)

Placeholders for TVs are:

\*<span class="error">\[+as.tvName+\]</span>, <span class="error">\[+as.tvNameShow+\]</span>, <span class="error">\[+as.tvNameClass+\]</span>

Where tvName is the MODx name of a TV

\*<span class="error">\[+as.tvName+\]</span> is the HTML output of your TV   
\*<span class="error">\[+as.tvNameShow+\]</span> = 1 if the TV is not NULL   
\*<span class="error">\[+as.tvNameClass+\]</span> :

- ajaxSearch\_resultTvName for the non ajax results (&tplResult)
- AS\_ajax\_resultTvName for the ajax window (&tplAjaxResult)

e.g: AS\_ajax\_resultAsTag1, a tv named "asTag1"   
(take care, the first letter of tvName should be here an upper case)

displayTV is a provided ajaxSearch function which render the Modx TV output. Don't change the name!

But tvPhx could also be a user function and runs with your custom tables.

==Examples==

Feel free to add your own examples to the list.

The following examples have been tested with Firefox 2.0, IE 6.0, IE 7.0   
And some of them with Safari and Opera

=== With AjaxSearch mode ===

<code><span class="error">\[pseudocode,N\]</span><span class="error">\[!AjaxSearch!\]</span></code>   
\*A basic (Ajax) default call that renders a search form with the default images and parameters   
\*Output search results are displayed through ajax in a window upper the page

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &moreResultsPage=`33` &showMoreResults=`1`\\!\]</span></code>   
\*Basic call witch adds a link "More results" at the end of the results list, to go to a full search results page (#33)   
\*The page #33 should contain a non-ajaxSearch snippet call like:

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_showForm=`0`\\!\]</span></code>   
\*Display the results without the search form again

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxMax=`10` &extract=`0`\\!\]</span></code>   
\*Basic call witch overrides the number of maximum results returned in the ajax output results window   
\*Removes the display of extracts. Only the title and description are displayed

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &documents=`2,3,8,16`\\!\]</span></code>   
\*Basic call which renders a search form with the default images and parameters   
\*Search terms are searched among the documents `2,3,8,16`

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &parents=`5,7` &depth=`4`\\!\]</span></code>   
\*Renders a search form with the default images and parameters   
\*Search terms are searched on 4 levels among the document children of documents 5, 7

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &parents=`9,12` &hideMenu=`0` &advSearch=`allwords`\\!\]</span></code>   
\*Renders a search form with the default images and parameters   
\*Search terms are searched among the document children of documents 9, 12   
\*Documents should contains all the search terms and not hidden from the menu

=== Without AjaxSearch mode ===

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_landing=`33`\\!\]</span></code>   
\*Basic call which renders a search form with the default images and non-Ajax parameters   
\*Results are outputed to the page #33   
\*The document #33 should contain a non-ajaxSearch snippet call like :

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_showForm=`0`\\!\]</span></code>   
\*Display the results without the search form again

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_landing= `33`\\!\]</span></code>   
\*Search results will be displayed on document #33   
\*The document #33 should contain a non-ajaxSearch snippet call like :

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_landing= `33` &AS\_showForm=`0` &grabMax=`10` &highlightResult=`0`\\!\]</span></code>   
\*Same as above. To display the results without the search form again   
\*Overrides the number of maximum results returned per page and removes search term highlighting

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_landing=`33`\\!\]</span></code>   
\*Basic call which renders a search form with the default images and non-Ajax parameters   
\*Results are outputed to the page #33   
\*The document #33 should contain a non-ajaxSearch snippet call like :

<code><span class="error">\[pseudocode,N\]</span> <span class="error">\[\\!AjaxSearch? &ajaxSearch=`0` &AS\_showForm=`0` &parents=`10` hideMenu=`1` &advSearch=`nowords`\\!\]</span></code>   
\*Display the results without the search form again   
\*Search terms are searched among the document children of documents 10   
\*Documents should not contain any of the search terms and should not be visible from the menu

==Demo site==

\*More examples on the demo site : <http://www.modx.wangba.fr/>

\*AjaxSearch versions comparison   
\*Sql explanations

==Configuration file==

The default configuration file is configs/default.config.php

Except if &config is set with a different configuration file name, this file is always loaded and read.   
<br>Inside the config file, parameter values should be added with the syntax: $param = 'value' or $\_\_param = 'value'   
$\_\_param is always overwritted by the parameter of the snippet call, if it exists.   
On the contrary, $param is always applied, whatever the parameter in the snippet call.

Inside the config file, should be defined, if used :   
\*stripInput function   
\*stripOutput function   
\*searchWordList   
\*subSearch

The signature of StripInput function is:   
<code>   
// StripInput user function.   
// Uncomment and complete the core function and choose your own function name   
// string functionName(string searchstring, string advsearch)   
// functionName : name of stripInput function passed as &stripInput parameter   
// searchstring : string php variable name as searchString input value   
// advSearch : string advSearch variable as advSearch parameter and return value   
// return the filtered searchString value

function myStripInput($searchString, &$advSearch)

<div class="error"><span class="error">Unknown macro: { $advSearch = ... ; return $searchString; }</span></div></code>

The signature of StripOutput function is:   
<code>   
// StripOutput user function   
// Uncomment and complete the core function and choose your own function name   
// string functionName(string results)   
// functionName : name of stripOutput function passed as &stripOutput parameter   
// results : string php variable name as results   
// return the filtered results

function myStripOutput($results)

<div class="error"><span class="error">Unknown macro: { $results = .... return $results; }</span></div></code>

The AjaxSearch functions: stripHtml(), stripHtmlExceptImage(), stripJscripts() and stripLineBreaking() are available to set up your own stripOutput function.

e.g: &stripOutput=`saveImage`

<code>   
function saveImage($results)

<div class="error"><span class="error">Unknown macro: { // replace line Breaking by space $results = stripLineBreaking($results); // strip other html tags $results = stripHtmlExceptImage($results); // strip javascript tags $results = stripJscripts($results); return $results; }</span></div></code>

The signature of a searchWordList is:   
<code>   
// searchWordList user function   
// Uncomment and complete the core function and choose your own function name   
// string functionName(params)   
// functionName : name of searchWordList function passed as &searchWordList parameter   
// params : array of parameters   
// return a comma separated list of words</code>

e.g: &searchWordList=`mySearchWordList,<span class="error">\[\*id\*\]</span>`   
<code>   
function searchWordList($params){   
switch($params<span class="error">\[0\]</span>)

<div class="error"><span class="error">Unknown macro: { case '61'}</span></div>return $list;   
}</code>

The signature of subsearch definition is:   
<code>   
// subSearch user function   
// Uncomment and complete the core function and choose your own function name   
// string functionName()   
// functionName : name of token linked with the sub-domain as defined in the layout template   
// return an array with a list of configuration parameters</code>

eg: for instance with   
<code><li><input type="radio" id="subSearch1" name="subSearch" value="travel,1" <span class="error">\[+as.subSearch1Checked+\]</span> /><label for="subSearch1">Travel pictures gallery</label></li></code>

<code>   
function travel()

<div class="error"><span class="error">Unknown macro: { $config = array(); // travel search definition $config\['documents'\] = '104'; $config\['whereSearch'\] = 'content}</span></div></code>

==Error messages==

<code>AjaxSearch version is not defined. Please check the snippet code in MODx manager.</code>   
\*means that the snippet code in the manager is not properly installed or has changed and doesn't fit with the snippet source folder (includes/snippet.ajaxSearch.inc.php)

<code>AjaxSearch version is obsolete. Please check the snippet code in MODx manager.</code>   
\*means that you the version of the snippet code in the manager doesn't fit with the version of the snippet source folder (includes/snippet.ajaxSearch.inc.php)

<code>AjaxSearch setup path is not defined. Please check the snippet code in MODx manager.</code>   
\*means that the path, to the snippet source folder (includes/snippet.ajaxSearch.inc.php), in the snippet code, in the manager is not defined

<code>AjaxSearch version obsolete. Check the version of AjaxSearch.js file</code>   
\*means that the version of the snippet source folder (includes/snippet.ajaxSearch.inc.php) doesn't fit with the js/ajaxSearch.js file

<code>AjaxSearch error: php\_mbstring extension required</code>   
\*means that the Php mbstring extension should be set

<code>AjaxSearch error: search function not defined in the configuration file</code>   
\*means that the subSearch domain is not defined in the configuration file. Check your layout template and your configuration file.

<code>AjaxSearch error: table not defined in the configuration file</code>   
\*means that you use an unknown table with the whereSearch parameter. Check the whereSearch parameter and your configuration file.

<code>AjaxSearch error: the function is not defined in the configuration file</code>   
\*means that you use an unknown function with the tvPhx parameter. Check the tvPhx parameter and your configuration file.

<code>AjaxSearch error: the function is not defined in the configuration file</code>   
\*means that you use an unknown function with the tvPhx parameter. Check the tvPhx parameter and your configuration file.

<code>AjaxSearch: database\_connection\_charset is null. Check your config file</code>   
\*means that your $database\_connection\_charset variable of your /manager/includes/config.inc.php file is an empty value

<code>AjaxSearch: unknown database\_connection\_charset = something. Add the appropriate Html charset mapping in the ajaxSearch.php file</code>   
\*is not an error but need that you add in the ajaxSearch.php file the mapping between the mysql database character set (not the collation) and the html charset.   
\*e.g: 'latin1' => 'ISO-8859-1',

== Browser tests ==

Tested on Windows XP SP2 with:   
\*Firefox 2.0   
\*IE6.0, IE7.0   
\*Opera 9.26   
\*Safari 3.1

==Support==

<http://modxcms.com/forums/index.php/topic,5357.0.html>

For all new posts, thanks the first time to give the following informations:

\*ajaxSearch snippet version   
\*ajaxSearch snippet call of the page where is the search form   
\*ajaxsearch snippet call of your landing or moreResults page   
\*value of your search terms.   
\*where the searched term is. In a title/description/content of a public/private document or in a TV   
\*charset of your html page   
\*charset of your database   
\*value of your $database\_connection\_charset variable in your /manager/includes/config.inc.php file   
\*type of entity\_encoding (Raw / Named) of your editor (TinyMCE, ...)   
\*browser type and version (IE, FireFox, Opera, Safari, ...)   
\*activate the debug mode and catch the log

and if needed:   
\*Client side operating system (Windows / Linux) and browser type   
\*Php version   
\*MySql version

Thanks for your feedbacks.<br>

==AjaxSearch Glossary==

;AjaxSearch mode   
:Search results displayed in current page through AJAX request

;Non ajaxSearch mode   
:Search results displayed in a new page

;Search term   
:The entry term in the search form, searched

;Extract   
:Part of a document extracted and added in the results page

;Search result   
:Title, as a link to the document, description and extract

;Rank   
:Value of ranking depending of number of search results and where the results have been found

;Search results page   
:All the search results with optionaly a more results link to a showMoreResult page.   
:or all the search results paginated with the grabMax parameter

;highlighted term   
:In the search results page, the search terms found could be (or not) highlighted.   
:In the linked document, the highlighting of the terms needs the plugin searchHighlight