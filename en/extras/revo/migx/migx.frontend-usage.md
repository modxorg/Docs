---
title: "MIGX.Frontend-Usage"
_old_id: "925"
_old_uri: "revo/migx/migx.frontend-usage"
---

<div>- [Displaying MIGX Items](#MIGX.Frontend-Usage-DisplayingMIGXItems)
- [Sample Usage](#MIGX.Frontend-Usage-SampleUsage)
- [Using MIGX with getResources](#MIGX.Frontend-Usage-UsingMIGXwithgetResources)
  - [Using getResources values in a MIGX call](#MIGX.Frontend-Usage-UsinggetResourcesvaluesinaMIGXcall)
- [Properties](#MIGX.Frontend-Usage-Properties)
- [Placeholders](#MIGX.Frontend-Usage-Placeholders)
- [Advanced Usage](#MIGX.Frontend-Usage-AdvancedUsage)
  - [Switching Template](#MIGX.Frontend-Usage-SwitchingTemplate)

</div> Displaying MIGX Items 
-----------------------

 MIGX includes a snippet named getImageList that is used to output information from MIGX TVs. Despite the snippet name, non-images can be retrieved as well. Think of it as the ever-popular snippet [getResources](/extras/revo/getresources "getResources") but for MIGX.

 Here are some sample uses of getImageList:

- image galleries
- image or HTML sliders
- tabular data
- CSV or XML output

 Let's get to it!

 Sample Usage 
--------------

 Let's display some images that we input in Step 3. Paste this code wherever you would like to display the images:

```
<pre class="brush: html"><ul>
  [[getImageList? 
    &tvname=`myMIGXtv`
    &tpl=`@CODE:<li>[[+idx]]<img src="[[+image]]"/><p>[[+title]]</p></li>
  `]]
</ul>

``` Let's break this down. The first parameter, &tvname, refers to the name of the MIGX TV that we created in Backend Usage, Step 2. &tpl refers to either a code string for which to use with the MIGX items or the name of a chunk. If you're using a code string, make sure to prepend the code as above with @CODE.

 If you're using [phpthumbof](/extras/revo/phpthumbof "phpThumbOf"), you will need to use a chunk and not a code string.

```
<pre class="brush: html"><ul>
  [[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`thumbTpl`]]
</ul>

``` **thumbTpl**

```
<pre class="brush: html"><li>
  <img src="[[+image:phpthumbof=`w=300&h=300&zc=1`]]" alt="[[+title]]"/>
</li>

``` Using MIGX with getResources 
------------------------------

 You can call getImageList from [getResources](/extras/revo/getresources "getResources") to build a gallery of galleries.

```
<pre class="brush: html"><li>
  <a href="[[~[[+id]]]]">[[+pagetitle]]</a>  
  [[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`thumbTpl`
    &limit=`1`
    &docid=`[[+id]]`
  ]]
</li>

``` … and that's that! You now have your very own MIGX image gallery.

###  Using getResources values in a MIGX call 

 If you would like to use getResources values in your chunk called by getImageList, you can do so by including them as parameters in the getImageList snippet call and refer to them by the +property placeholder.

 Include them in the snippet call:

```
<pre class="brush: html">[[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`thumbTpl2`
    &docid=`[[+id]]`
    &limit=`1`
    &pagetitle=`[[+pagetitle]]`
    &originalResourceId=`[[+id]]`
]]

``` and then refer to them in the chunk, prepended with "+property.":

```
<pre class="brush: html">  <li>
    <img src="[[+image:phpthumbof=`w=300&h=300&zc=1`]]" alt="[[+title]]" />
    <a href="[[~[[+property.originalResourceId]]]]">See more images from [[+property.pagetitle]]</a>
  </li>

``` Here's another [example from the forum post](http://forums.modx.com/thread/78950/odd-issue-with-migx#dis-post-435072) that lead to the above example.

 Properties 
------------

<table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> tvname   
</td> <td> the Name of your MIGX-TV </td> <td> </td> </tr><tr><td> tpl   
</td> <td> chunkname to render each record. You can also use @CODE: or @FILE: if empty, getImageList will output an array-string of the records </td> <td> </td> </tr><tr><td> docid </td> <td> if you want to show MIGX-records from other resources. Usefull in [getResources](/extras/revo/getresources "getResources")-tpls with &docid=`\[\[+id\]\]` </td> <td> \[\[\*id\]\]   
</td> </tr><tr><td> value </td> <td> if you want to send your own JSON-string to getImageList instaed of using the TV-output. tvname and docid are ignored then. </td> <td> </td> </tr><tr><td> limit </td> <td> If set to non-zero, will only show X number of items. </td> <td> 0 </td> </tr><tr><td> offset </td> <td> The index to start grabbing from when limiting the number of items. </td> <td> 0 </td> </tr><tr><td> totalVar </td> <td> the key for the total-placeholder, usefull together with [getPage](/extras/revo/getpage "getPage") for pagination. </td> <td> total </td> </tr><tr><td> randomize   
</td> <td> set &randomize=`1` if you want randomized output </td> <td> 0 </td> </tr><tr><td> preselectLimit </td> <td> together with &randomize, this will preselect items from top to limit, for images you want to see in any case in ranomized output </td> <td> 5 </td> </tr><tr><td> where </td> <td> filter items. example: ```
<pre class="brush: javascript">{"active:=":"1","rating:>":"5"}

``` </td><td> </td></tr><tr><td> sort </td> <td> sort items by multiple fields. example:```
<pre class="brush: javascript">[{"sortby":"age","sortdir":"DESC","sortmode":"numeric"},{"sortby":"name","sortdir":"ASC"}]

``` </td><td> </td></tr><tr><td>reverse</td> <td>set &reverse=1 to output everything in reverse order</td><td>0</td></tr><tr><td> toPlaceholder   
</td><td> outputs to placeholder. example: &toPlaceholder=`MIGX` - get the output by \[\[+MIGX\]\] </td><td> </td></tr><tr><td> toSeparatePlaceholders   
</td><td> outputs items to seperate placeholders. example: &toSeparatePlaceholders=`MIGX` - get the items by \[\[+MIGX.1\]\] \[\[+MIGX.2\]\] ...... </td><td> </td></tr><tr><td> placeholdersKeyField   
</td><td> together with &toSeparatePlaceholders. example: &placeholdersKeyField=`title` - get the items by \[\[+MIGX.firsttitle\]\] \[\[+MIGX.thirdtitle\]\] ...... </td><td> </td></tr><tr><td> outputSeparator   
</td><td> a seperator between items </td><td> </td></tr><tr><td> toJsonPlaceholder   
</td><td> output items as json into a placeholder, usefull when you want for example show randomized items on different places.   
 example: &toJsonPlaceholder=`jsonoutput` -> \[\[getImagelist? &value=`\[\[+jsonoutput\]\]`................\]\] </td><td> </td></tr><tr><td> jsonVarKey   
</td><td> example: &jsonVarKey=`migx\_json` - this will use the value from $\_REQUEST\['migx\_json'\] as value, if any   
 useful together with the backend-preview-feature </td><td> migx\_outputvalue   
</td></tr></tbody></table> Placeholders 
--------------

<table><tbody><tr><th> Placeholder </th> <th> Description </th> </tr><tr><td> \[\[+fieldname\]\]   
</td> <td> replace 'fieldname' with your fieldnames </td> </tr><tr><td> \[\[+idx\]\]   
</td> <td> the index of each item, begins allways with 1 </td> </tr><tr><td> \[\[+\_first\]\]   
</td> <td> returns 1, if in first row </td> </tr><tr><td> \[\[+\_last\]\]   
</td> <td> returns 1, if in last row </td> </tr><tr><td> \[\[+\_alt\]\]   
</td> <td> returns 1 every second row </td> </tr><tr><td> \[\[+total\]\]   
</td> <td> count of all rows, replace 'total' with your totalVar </td> </tr><tr><td> \[\[+property.name\]\]   
</td> <td> you can use every script property/param that's set in the actual snippet call, for example if you have &docid=`20` the placeholder \[\[+property.docid\]\] will return 20 </td></tr></tbody></table> Advanced Usage 
----------------

###  Switching Template 

 Using &tpl=`@FIELD:` you can use any field as the template name to switch template from item to item

```
<pre class="brush: html">  [[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`@FIELD:tpl`
  ]]

``` If you have specified a field name "tpl" from the MIGX TV setup, getImageList will use the value of this field for the items's tpl. The value must be exactly what you would put in the &tpl property - a chunk name, @CODE:... @FILE...