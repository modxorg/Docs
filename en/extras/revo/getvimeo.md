---
title: "getVimeo"
_old_id: "1362"
_old_uri: "revo/getvimeo"
---

 What is getVimeo? 
-------------------

 A simple video retrieval snippet for MODX Revolution.

 This snippet uses the Vimeo Simple API to search a specified channel and return requested videos and associated data.

 History 
---------

 getVimeo was first written by David Pede (davidpede) and released on June 12th, 2013.

 Download 
----------

 It can be downloaded from within the MODX Revolution manager via [Package Management](/display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/getvimeo>

 The source code and build script is also availiable on GitHub: <https://github.com/tasianmedia/getVimeo>

 Bugs & Feature Requests 
-------------------------

 Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/getVimeo/issues>

 Usage 
-------

 The getVimeo snippet can be called using the tag:

 ```
<pre class="brush: php">
[[getVimeo]]

```<div class="note"> Calls without the &channel, &id and &tpl properties specified will output nothing. </div>###  Available Properties 

###  Selection Properties 

 <table><tbody><tr><th> Name   
</th> <th> Description   
</th> <th> Default Value   
</th> <th> Added in Version   
</th> </tr><tr><td> channel </td> <td> The URL Name or Numeric ID of the target Vimeo Channel. (REQUIRED) </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> id </td> <td> A comma-separated list of Numeric Video IDs to output from target Channel. Use `all` to output all Videos. (REQUIRED) </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> sortby </td> <td> A placeholder name to sort by. (NOTE: Please see placeholder docs for more details) </td> <td> upload\_date </td> <td> 1.0.0-pl </td> </tr><tr><td> sortdir </td> <td> Order which to sort by. (OPTIONS: DESC or ASC) </td> <td> DESC </td> <td> 1.0.0-pl </td> </tr><tr><td> limit </td> <td> Limits the number of Videos returned. Use `0` for unlimited results. </td> <td> 0 </td> <td> 1.1.0-pl </td> </tr><tr><td> offset </td> <td> An offset of Videos to skip. </td> <td> 0 </td> <td> 1.1.0-pl </td></tr></tbody></table>###  Templating Properties 

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> <th> Added in Version </th> </tr><tr><td> tpl </td> <td> Name of a chunk serving as a template. (REQUIRED) </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> tplAlt </td> <td> Name of a chunk serving as a template for every other Video. </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> tplWrapper </td> <td> Name of a chunk serving as a wrapper template for the output. (NOTE: Does not work with &toPlaceholder. The placeholder where the items are inserted is \[\[+output\]\]) </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> toPlaceholder </td> <td> If set, will assign the output to this placeholder instead of outputting it directly. (NOTE: Does not work with &tplWrapper) </td> <td> </td> <td> 1.0.0-pl </td></tr></tbody></table>###  Other Properties 

 <table><tbody><tr><td> totalVar </td> <td> Define the key of a placeholder set by getVimeo indicating the total number of Videos that would be returned, NOT considering the LIMIT value. </td> <td> total </td> <td> 1.1.0-pl </td></tr></tbody></table>###  Available Placeholders 

 The placeholders available to your getVimeo template Chunks are mostly dependent on the Vimeo Simple API.

####  Video Placeholders 

 <table><tbody><tr><th> Placeholder   
</th> <th> Description   
</th> <th> Added in Version   
</th> </tr><tr><td> \[\[+title\]\] </td> <td> Video title </td> <td> </td> </tr><tr><td> \[\[+url\]\] </td> <td> URL to the Video Page </td> <td> </td> </tr><tr><td> \[\[+id\]\] </td> <td> Video ID </td> <td> </td> </tr><tr><td> \[\[+description\]\] </td> <td> The description of the video </td> <td> </td> </tr><tr><td> \[\[+thumbnail\_small\]\] </td> <td> URL to a small version of the thumbnail </td> <td> </td> </tr><tr><td> \[\[+thumbnail\_medium\]\] </td> <td> URL to a medium version of the thumbnail </td> <td> </td> </tr><tr><td> \[\[+thumbnail\_large\]\] </td> <td> URL to a large version of the thumbnail </td> <td> </td> </tr><tr><td> \[\[+user\_name\]\] </td> <td> The user name of the video’s uploader </td> <td> </td> </tr><tr><td> \[\[+user\_url\]\] </td> <td> The URL to the user profile </td> <td> </td> </tr><tr><td> \[\[+upload\_date\]\] </td> <td> The date/time the video was uploaded on </td> <td> </td> </tr><tr><td> \[\[+user\_portrait\_small\]\] </td> <td> Small user portrait (30px) </td> <td> </td> </tr><tr><td> \[\[+user\_portrait\_medium\]\] </td> <td> Medium user portrait (100px) </td> <td> </td> </tr><tr><td> \[\[+user\_portrait\_large\]\] </td> <td> Large user portrait (300px) </td> <td> </td> </tr><tr><td> \[\[+stats\_number\_of\_likes\]\] </td> <td> # of likes </td> <td> </td> </tr><tr><td> \[\[+stats\_number\_of\_views\]\] </td> <td> # of views </td> <td> </td> </tr><tr><td> \[\[+stats\_number\_of\_comments\]\] </td> <td> # of comments </td> <td> </td> </tr><tr><td> \[\[+duration\]\] </td> <td> Duration of the video in seconds </td> <td> </td> </tr><tr><td> \[\[+width\]\] </td> <td> Standard definition width of the video </td> <td> </td> </tr><tr><td> \[\[+height\]\] </td> <td> Standard definition height of the video </td> <td> </td> </tr><tr><td> \[\[+tags\]\] </td> <td> Comma separated list of tags </td> <td> </td></tr></tbody></table><div class="info"> Please see: <http://developer.vimeo.com/apis/simple#video-response> for an up to date list of video response data provided by the API. </div>####  Other Placeholders 

 <table><tbody><tr><th> Placeholder   
</th> <th> Description   
</th> <th> Added in Version   
</th> </tr><tr><td> \[\[+total\]\]   
</td> <td> Returns the total number of Videos in the output.   
</td> <td> 1.0.1-pl   
</td> </tr><tr><td> \[\[+idx\]\] </td> <td> Returns each Videos numerical position within the output. Increases with each iteration, starting with 1.   
</td> <td> 1.1.0-pl </td></tr></tbody></table> Examples 
----------

 Output a list of ALL videos from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk:

 ```
<pre class="brush: php">
[[!getVimeo? &channel=`staffpicks` &id=`all` &tpl=`vimeoTpl`]]

``` Output only the videos specified from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk:

 ```
<pre class="brush: php">
[[!getVimeo? &channel=`staffpicks` &id=`68688561,69239313,68146128` &tpl=`vimeoTpl`]]

``` Output a list of ALL videos from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk and assign the output to a placeholder:

 ```
<pre class="brush: php">
[[!getVimeo? &channel=`staffpicks` &id=`all` &tpl=`vimeoTpl` &toPlaceholder=`videos`]]
[[+videos:notempty=`[[+videos]]`]]

```<div class="info"> You CANNOT pass a placeholder name (&toPlaceholder) to a wrapper chunk (&tplWrapper). </div> Using getPage for Pagination 
------------------------------

 When combined with [getPage](/display/ADDON/getPage "getPage"), getVimeo allows you to do powerful and flexible pagination on your pages.

 Output a list of ALL videos from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk:

 ```
<pre class="brush: php">
[[!getPage?
  &element=`getVimeo`
  &channel=`staffpicks`
  &id=`all`
  &tpl=`vimeoTpl`
  &limit=`5`
]]

<div class="paging">
  <ul class="pageList">
    [[!+page.nav]]
  </ul></div>

```