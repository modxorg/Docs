---
title: "FileDownload R.FileDownloadLink"
_old_id: "842"
_old_uri: "revo/filedownload-r/filedownload-r.filedownloadlink"
---

<div>- [Main](#FileDownloadR.FileDownloadLink-Main)
- [Salt for hash](#FileDownloadR.FileDownloadLink-Saltforhash)
- [Additional](#FileDownloadR.FileDownloadLink-Additional)
- [Template](#FileDownloadR.FileDownloadLink-Template)
- [Headers](#FileDownloadR.FileDownloadLink-Headers)
- [Example](#FileDownloadR.FileDownloadLink-Example)

</div>FileDownloadLink is a snippet for a single downloadable file.   
It's just like providing the link to the direct file.   
But in this case, FileDownloadLink will hide the real path of the file with the hashed link and count the downloading action.

Basic usage is \[\[!FileDownloadLink?\]\]

Main
====

<table><tbody><tr><th>Name</th><th>Description</th><th>Example</th><th>Default Value</th><th>Options</th></tr><tr><td>getFile</td><td>You may only have ONE file path on this parameter</td><td>&getFile=`assets/files/readme.txt`</td><td>empty</td><td>string</td></tr><tr><td>userGroups</td><td>This will make the download link active for users that belong to the specified groups. Multiple groups can be specified by using a comma delimited list.</td><td>&userGroups=`Administrator, Registered Member`</td><td>empty</td><td>string</td></tr><tr><td>toArray   
</td><td>Returns the result as an array instead, not parsed in the templates.   
</td><td>&toArray=`1`</td><td>0   
</td><td>bool: 0/1   
</td></tr></tbody></table>Salt for hash
=============

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th><th>Options</th></tr><tr><td>saltText</td><td>This text will be added to the file's hashed link to disguise the direct path</td><td>FileDownload</td><td>string</td></tr></tbody></table>The link is a hashed text of the saltText, context, and filename/dirname combination.   
So if you change the saltText value after a while, it will not block the content's appearance from the page, but the database will start the counter from zero again since it will not find the same hashed value.

Additional
==========

<table><tbody><tr><th>Name</th><th>Description</th><th>Example</th><th>Default Value</th><th>Options</th></tr><tr><td>noDownload</td><td>This property will make the list only displays files without their download links.   
note: this is different from the Evo's version</td><td>&noDownload=`1`</td><td>0</td><td>bool: 0/1</td></tr><tr><td>chkDesc</td><td>Allows descriptions to be added to the file listing included in a chunk.</td><td>&chkDesc=`fileDesc`</td><td>fileDescription</td><td>chunk's name</td></tr><tr><td>dateFormat</td><td>PHP's date formatting for the list</td><td>&dateFormat=`m/d/Y`</td><td>Y-m-d</td><td>string</td></tr><tr><td>countDownloads</td><td>Tracking the downloading</td><td>&countDownloads=`1`</td><td>0</td><td>bool: 0/1</td></tr><tr><td>imgTypes</td><td>A chunk name to define the associations between file extension and image</td><td>&imgTypes=`fdImages`</td><td>fdImages</td><td>chunk's name</td></tr><tr><td>imgLocat</td><td>Path to the images to associate with each file extension.</td><td>&imgLocat=`assets/filetypes`</td><td>assets/components/filedownload/img/filetype</td><td>web accessible path</td></tr></tbody></table>Template
========

The template for this snippet is a plain href link with FileDownloadLink's placeholders, not a chunk or a template file.   
If you like to see the available placeholders, just initiate the &toArray=`1` parameter.

<table><tbody><tr><th>Name</th><th>Description</th><th>Example</th><th>Default Value</th><th>Options</th></tr><tr><td>tplCode</td><td>file template</td><td>&tplCode=`<a href="\[\[+link\]\]">\[\[+filename\]\]</a>`</td><td><a href="\[\[+link\]\]">\[\[+filename\]\]</a></td><td>HTML code</td></tr></tbody></table>Headers
=======

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th><th>Options</th></tr><tr><td>fileCss</td><td>FileDownload's Cascading Style Sheet file for the page header</td><td>assets/components/filedownload/css/fd.css</td><td>web path</td></tr><tr><td>fileJs</td><td>ileDownload's Javascript file for the page header</td><td>assets/components/filedownload/js/fd.js</td><td>web path</td></tr></tbody></table>Example
=======

```
<pre class="brush: php">
[[!FileDownloadLink?
&getFile=`[[++core_path]]downloads/Document1.doc`
&tplCode=`
<a href="[[+link]]" title="[[+filename]]">
    <span class="gradient curve-four" style="display: block; text-align: center;">
        <img src="[[+image]]" alt="" />Download this Document1.doc<hr />
        [[+date]]<br />([[+count]] downloads)
    </span>
</a>`
&dateFormat=`d-m-Y`
&toArray=`0`
]]

```![](/download/attachments/35586646/filedownloadlink.jpg?version=1&modificationDate=1315759899000)