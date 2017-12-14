---
title: "Examples"
_old_id: "1751"
_old_uri: "evo/doclister/examples"
---

Examples
--------

### A simple example without pagination

 Select the latest 20 documents from the parent with ID=5.

`[!DocLister? &display=`20` &summary=`notags,len` &dateSource=`pub_date` &parents=`5` &tvList=`img,tag` &id=`lastnews` &tpl=`ListSummaryPost`!]`

 The text of each document will be have extra processing by the **summary** extender, with preliminary removal of HTML tags and length curtailed to 200 +/-50 characters. The placeholders `tv.img` amd `tv.tag` will be available in the chunk, containing the values of the template variables `img` and `tag`.

 A look at the ListSummaryPost chunk:

 ```
<pre class="brush: xml"><div class="post">
<div class="date">[+createdon+]</div>
<h3><a href="/[~[+id+]~]">[+pagetitle+]</a> </h3>
<div class="tag"><span>Tags: </span> [+tv.tag+] </div>
<div class="content">
    <a href="/[~[+id+]~]" title="[+pagetitle+]"><img src="[+tv.img+]" /></a>
    <p>[+summary+]...</p>
    <a href="/[~[+id+]~]" title="Details">More details</a>
</div>
</div>

```### Using configs

`[!DocLister? &config=`test`!]`

 Following this we create the JSON file **test.json** in the snippet subfolder **/config/custom/** with the following content:

 ```
<pre class="brush: xml">{
    "display" : "20",
    "summary" : "notags,len",
    "dateSource" : "pub_date",
    "parents" : "5",
    "tvList" : "img,tag",
    "id" : "lastnews",
    "tpl" : "ListSummaryPost"
}

``` This call will have an identical result to the previous example.

### Using lexicons

`[!DocLister? &tpl=`example` &customLang=`news`!]`

 Following this, we create the PHP file news.php containing a `$_lang` array in the snippet's **/lang/** folder.

 ```
<pre class="brush: xml"><?php if (!defined('MODX_BASE_PATH')) {    die('What are you doing? Get out of here!');}
$_lang = array();
$_lang['newsTitle'] = 'Latest news';
return $_lang;

``` The chunk **example** can now use the tag `[%newsTitle%]`, which will be automatically replaced by the message "Latest news".

### Advanced example with pagination

 ```
<pre class="brush: xml">[!DocLister? &display=`4` &depth=`2` &tpl=`ListSummaryPost` 
&summary=`notags,len:500` &dateFormat=`%d.%m.%Y в %H:%M` 
&dateSource=`pub_date` &parents=`2` &tvList=`img,tag` &renderTV=`img` 
&id=`list` &showParent=`0` &addWhereList=`c.template IN (6,7)` 
&sortBy=`menuindex` &paginate=`pages` &TplNextP=`` 
&TplPrevP=`` 
&TplPage=`@CODE: <li><a href="[+link+]">[+num+]</a></li>` 
&TplCurrentPage=`@CODE: <li class="active"><a href="[+link+]">[+num+]</a></li>` 
&TplWrapPaginate=`@CODE: <div class="pagination"><ul>[+wrap+]</ul></div>`!]

[+list.pages+]

```In this example all documents from the container with ID=2, to a depth of 2 and based on templates 6 or 7, are selected. Container documents will then be filtered out (the documents within which the search was carried out. That is, document with ID=2 and all its children that are containers). Upon output, "page" pagination will be applied and the templates for paginated items will be redefined as those named in the **TplWrapPaginate**, **TplCurrentPage** and **TplPage** parameters. The "next" and "previous" link templates will be empty (hence no text will be output for them). The prefix _list_ will be added to all the DocLister placeholders, and the values of the template variables `img` and `tag` will be added to every document that is output in the placeholders `tv.img` and `tv.tag` respectively. Template variable `img` will be rendered in accordance with the widget set when it was created. A total of four documents will be displayed per page. Sorting will be not by creation date, but by `menuindex` (position in the menu). The document's publication date will be used as the date source.

Here is the **ListSummaryPost** chunk

 ```
<pre class="brush: xml"><div class="post">
<div class="date">[+createdon+]</div>
<h3><a href="/[~[+id+]~]">[+pagetitle+]</a> </h3>
<div class="tag"><span>Теги: </span> [+tv.tag+] </div>
<div class="content">
    <a href="/[~[+id+]~]" title="[+pagetitle+]">[+tv.img+]</a>
    <p>[+summary+]...</p>
    <a href="/[~[+id+]~]" title="Details">More details</a>
</div>
</div>

```### Example of output from a table other than site\_content

 ```
<pre class="brush: xml">[!DocLister? &contentField=`snippet` &sortBy=`name` &sortDir=`ASC` 
&display=`10` &idField=`id` &table=`site_snippets` &tpl=`snippet` 
&controller=`onetable` &id=`snip` &showParent=`0` &paginate=`pages`!]

```The **snippet** chunk: ```
<pre class="brush: xml"><div class="row"><div class="span12">
 <h3 class="pagination-centered">[+name+]</h3>
 <code>[+snippet+]
```In this example the information will be output from the _site\_snippets_ table. The `id` field acts as the PrimaryKey column. Sorting is in ascending order of the` name` column.