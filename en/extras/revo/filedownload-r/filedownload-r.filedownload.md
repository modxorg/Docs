---
title: "FileDownload R.FileDownload"
_old_id: "841"
_old_uri: "revo/filedownload-r/filedownload-r.filedownload"
---

<div>- [Main](#FileDownloadR.FileDownload-Main)
  - [downloadByOther](#FileDownloadR.FileDownload-downloadByOther)
      - [File Chunk](#FileDownloadR.FileDownload-FileChunk)
      - [HTML](#FileDownloadR.FileDownload-HTML)
      - [javascript](#FileDownloadR.FileDownload-javascript)
      - [connector](#FileDownloadR.FileDownload-connector)
      - [processors](#FileDownloadR.FileDownload-processors)
- [Salt for hash](#FileDownloadR.FileDownload-Saltforhash)
- [Additional](#FileDownloadR.FileDownload-Additional)
- [Sorting](#FileDownloadR.FileDownload-Sorting)
  - [Example](#FileDownloadR.FileDownload-Example)
- [Template](#FileDownloadR.FileDownload-Template)
  - [Example](#FileDownloadR.FileDownload-Example)
- [Headers](#FileDownloadR.FileDownload-Headers)
- [Style](#FileDownloadR.FileDownload-Style)
 
</div> The parameters are adopted from the evolution's with several changes, so the previous user can easily understand about their usages.

 Basic usage is \[\[!FileDownload?\]\]

Main
====

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Example </th> <th> Default Value </th> <th> Options </th> </tr><tr><td> getDir </td> <td> Comma separated of directories to display </td> <td> &getDir=`\[\[<ins>++core\_path\]\]downloads,\[\[</ins>++base\_path\]\]assets/downloads, assets/files` </td> <td> empty </td> <td> string </td> </tr><tr><td> getFile </td> <td> Comma separated of files to display </td> <td> &getFile=`assets/files/readme.txt,\[\[<ins>++core\_path\]\]downloads/readyou.doc,\[\[</ins>++base\_path\]\]assets/downloads/book1.xlsx` </td> <td> empty </td> <td> string </td> </tr><tr><td> userGroups </td> <td> This will make the download link active for users that belong to the specified groups. Multiple groups can be specified by using a comma delimited list. </td> <td> &userGroups=`Administrator, Registered Member` </td> <td> empty </td> <td> string </td> </tr><tr><td> extShown </td> <td> Comma delimited extension of files to display with those extensions. </td> <td> &extShown=`zip,php,txt` </td> <td> empty </td> <td> string </td> </tr><tr><td> extHidden </td> <td> Comma delimited extension of files to be hid with those extensions. This will overide &extShown values. </td> <td> &extHidden=`zip,php,txt` </td> <td> empty </td> <td> string </td> </tr><tr><td> toArray </td> <td> Returns the result as an array instead, not parsed in the templates. </td> <td> &toArray=`1` </td> <td> 0 </td> <td> bool: 0/1 </td> </tr><tr><td> downloadByOther </td> <td> Disable the downloading action by this snippet, to use different way </td> <td> &downloadByOther=`1` </td> <td> 0 </td> <td> bool: 0/1 </td> </tr><tr><td> directLink </td> <td> Use file's direct path, rather than the hashed link. Make sure it is web accessible </td> <td> &directLink=`1` </td> <td> 0 </td> <td> bool: 0/1 </td> </tr><tr><td> fdlid </td> <td> Set an ID to each of the snippet calls if there are more than once. </td> <td> &fdlid=`1` </td> <td> null </td> <td> string </td> </tr><tr><td> plugins </td> <td> [Read the doc.](http://rtfm.modx.com/display/ADDON/FileDownload+R.Plugins) </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> prefix </td> <td> prefix for the placeholders </td> <td> </td> <td> 'fd.' </td> <td> </td></tr></tbody></table>downloadByOther
---------------

<div class="tip"> available since v.1.0.0-pl </div> Note for **&downloadByOther**:   
 Example:   
 You have the need to use javascript pop-up window to force the downloader to fill up a form before downloading.   
 Then through AJAX, you submit the form, and expect results with conditions.   
 If the result, for instance, returns true, the AJAX calls the download's API to start the download.

### File Chunk

 You need to create chunk for the file's rows.   
 Eg: jsDownload chunk

 ```
<pre class="brush: html">
    <tr[[+fd.class]]>
        <td style="width:16px;"><img src="[[+fd.image]]" alt="[[+fd.image]]" /></td>
        <td>
            <a href="javascript:void(0);"
               rel="#formLink"
               id="[[+fd.hash]]"
               >[[+fd.filename]]
            </a>
            <span style="font-size:80%">([[+fd.count]] downloads)</span>
        </td>
        <td>[[+fd.sizeText]]</td>
        <td>[[+fd.date]]</td>
    </tr>
    [[-- This is the description row if the &chkDesc=`chunkName` is provided --]]
    [[+fd.description:notempty=`<tr>
        <td></td>
        <td colspan="3">[[+fd.description]]</td>
    </tr>`:default=``]]

```### HTML

 #downloaderForm is the basic HTML form with fields.   
 In this example, I'm also using [jQuerytools](http://jquerytools.org/)'s overlay and validator.   
 The for is placed directly under the snippet call.   
 It's hidden by CSS.

 So the snippet call would be like this:

 ```
<pre class="brush: html">
[[!FileDownload?
&getDir=`assets/downloads`
&tplFile=`jsDownload`
&downloadByOther=`1`
]]
<div class="form_overlay" id="formLink">
    <h2>Contact Form</h2>
    <form action="[[~[[*id]]]]" method="post" class="form" id="downloaderForm">
        <input type="hidden" name="nospam:blank" value="" />
        <input type="hidden" name="link" value="" />
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="" required="required" />
        <br />
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="" required="required" />
        <br />
        <label for="phone">Phone:</label>
        <input type="number" name="phone" id="phone" value="" required="required" />
        <br />
        <label for="country">Country:</label>
        <input type="text" name="country" id="country" value="" required="required" />
        <br />
        <div class="form-buttons">
            <button type="submit">Send Contact Inquiry</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>

```### javascript

 ```
<pre class="brush: javascript">
$(function(){
    var c = 'assets/components/yourpackage/c.php?';
    createForm();
    function createForm() {
        $(".fd-file a[rel]").each(function(i) {
            var self = $(this);
            self.overlay({
                effect: 'apple',
                onLoad: function() {
                    var id = self.attr('id');
                    $("#downloaderForm input[name=link]").val(id);
                },
                onBeforeClose: function(){
                    $(".error").hide();
                    $("#downloaderForm input").each(function(){
                        $(this).removeClass('invalid');
                    });
                    $("#downloaderForm input[name=link]").val('');
                    clearForm($("#downloaderForm"));
                }
            });
        });
        $("#downloaderForm").validator().submit(function(e){
            var form = $(this);
            if (!e.isDefaultPrevented()) {
                $.post(c + 'action=web/form/add&ctx=web&' + form.serialize(), function(data) {
                    if (data && data.success === true)  {
                        clearForm(form);
                        $(".fd-file a[rel]").each(function(i) {
                            $(this).overlay().close();
                        });
                        fileDownload(c + 'action=web/file/get&ctx=web&link=' + data.link);
                        $(".fd-file a[rel]").each(function(i) {
                            var self = $(this);
                            self.off();
                            var link = self.attr('id');
                            self.attr('onclick', 'fileDownload("' + c + 'action=web/file/get&ctx=web&link=' + link+'")');
                        });
                    } else {
                        form.data("validator").invalidate(data);
                    }
                }, "json");
                e.preventDefault();
            }
        });
    }
    function clearForm(form) {
        form.find(':input').each(function() {
            switch(this.type) {
                case 'password':
                case 'select-multiple':
                case 'select-one':
                case 'text':
                case 'email':
                case 'number':
                case 'textarea':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
            }
        });
    }
});
function fileDownload(link) {
    $('<iframe/>',{
        src: link
    }).hide().appendTo($('body'));
}

```### connector

 And the connector would be like this:

 ```
<pre class="brush: php">
<?php
/**
 * FileDownload R's AJAX connector file
 */
$validActions = array(
    'web/file/get',
    'web/form/add'
);
if (!empty($_REQUEST['action']) && in_array($_REQUEST['action'], $validActions)) {
    @session_cache_limiter('public');
    define('MODX_REQP', false);
}
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';
$corePath = $modx->getOption('filedownload.core_path', null, $modx->getOption('core_path') . 'components/filedownload/');
require_once $corePath . 'models/filedownload/filedownload.class.php';
$modx->filedownload = new FileDownload($modx);
$modx->lexicon->load('filedownload:default');
if (in_array($_REQUEST['action'], $validActions)) {
    $version = $modx->getVersionData();
    if (version_compare($version['full_version'], '2.1.1-pl') >= 0) {
        if ($modx->user->hasSessionContext($modx->context->get('key'))) {
            $_SERVER['HTTP_MODAUTH'] = $_SESSION["modx.{$modx->context->get('key')}.user.token"];
        } else {
            $_SESSION["modx.{$modx->context->get('key')}.user.token"] = 0;
            $_SERVER['HTTP_MODAUTH'] = 0;
        }
    } else {
        $_SERVER['HTTP_MODAUTH'] = $modx->site_id;
    }
    $_REQUEST['HTTP_MODAUTH'] = $_SERVER['HTTP_MODAUTH'];
}
/* handle request */
$path = $modx->getOption('core_path') . 'components/yourpackage/processors/';
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));

```### processors

 core/components/yourpackage/processors/web/file/get/   
 example:

 ```
<pre class="brush: php">
<?php
if (!$modx->loadClass('FileDownload', $modx->getOption('core_path') . 'components/filedownload/models/', true, true)) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[FileDownload] Could not load FileDownload class.');
    return '';
}
$fdl = $modx->getService('fdl'
        , 'FileDownload'
        , $modx->getOption('core_path') . 'components/filedownload/models/filedownload/'
);
$configs = array();
$configs['countDownloads'] = true;
$fdl->setConfigs($configs);
$downloadFile = $fdl->downloadFile($scriptProperties['link']);    // <== THIS IS WHERE YOU DOWNLOAD THE FILE
if (!$downloadFile) {
    $output = array('success' => FALSE);
} else {
    $output = array('success' => TRUE);
}
return json_encode($output);

```Salt for hash
=============

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> <th> Options </th> </tr><tr><td> saltText </td> <td> This text will be added to the file's hashed link to disguise the direct path </td> <td> FileDownload </td> <td> string </td></tr></tbody></table> The link is a hashed text of the saltText, context, and filename/dirname combination.   
 So if you change the saltText value after a while, it will not block the content's appearance from the page, but the database will start the counter from zero again since it will not find the same hashed value.

Additional
==========

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Example </th> <th> Default Value </th> <th> Options </th> </tr><tr><td> noDownload </td> <td> This property will make the list only displays files without their download links.   
 note: this is different from the Evo's version </td> <td> &noDownload=`1` </td> <td> 0 </td> <td> bool: 0/1 </td> </tr><tr><td> browseDirectories </td> <td> Allows users to view subdirectories of the directory specified with the &getDir parameter. </td> <td> &browseDirectories=`1` </td> <td> 0 </td> <td> bool:0/1 </td> </tr><tr><td> chkDesc </td> <td> Allows descriptions to be added to the file listing included in a chunk. </td> <td> &chkDesc=`fileDesc` </td> <td> fileDescription </td> <td> chunk's name </td> </tr><tr><td> dateFormat </td> <td> PHP's date formatting for the list </td> <td> &dateFormat=`m/d/Y` </td> <td> Y-m-d </td> <td> string </td> </tr><tr><td> countDownloads </td> <td> Tracking the downloading </td> <td> &countDownloads=`1` </td> <td> 0 </td> <td> bool: 0/1 </td> </tr><tr><td> imgTypes </td> <td> A chunk name to define the associations between file extension and image </td> <td> &imgTypes=`fdImages` </td> <td> fdImages </td> <td> chunk's name </td> </tr><tr><td> imgLocat </td> <td> Path to the images to associate with each file extension. </td> <td> &imgLocat=`assets/filetypes` </td> <td> assets/components/filedownload/img/filetype </td> <td> web accessible path </td></tr></tbody></table>Sorting
=======

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Example </th> <th> Default Value </th> <th> Options </th> </tr><tr><td> sortBy </td> <td> Sort ordering.   
 Options:filename | extension | path | size | sizetext | type | date | unixdate (1.1.4-pl) | description | count </td> <td> &sortBy=`path` </td> <td> filename </td> <td> string </td> </tr><tr><td> sortByCaseSensitive </td> <td> Case sensitive option for sorting </td> <td> &sortByCaseSensitive=`1` </td> <td> 0 </td> <td> bool: 0/1 </td> </tr><tr><td> sortOrder </td> <td> Sort files in ascending or descending order. </td> <td> &sortOrder=`desc` </td> <td> asc </td> <td> asc/desc </td> </tr><tr><td> sortOrderNatural </td> <td> Sort order option by a natural order </td> <td> &sortOrderNatural=`1` </td> <td> 1 </td> <td> bool: 0/1 </td> </tr><tr><td> groupByDirectory </td> <td> If multiple directories are specified in the getDir parameter, this property will group the files by each directory. </td> <td> &groupByDirectory=`1` </td> <td> 0 </td> <td> bool: 0/1 </td></tr></tbody></table> Multiple sorting orders are applied as these orders:

- File sort: filename
- browseDirectories : dir, filename
- groupByDirectory : path, dir, filename

Example
-------

 ```
<pre class="brush: html">
[[!FileDownload?
&getDir=`[[++core_path]]downloads-from-core/land rover, assets/downloads`
&browseDirectories=`1`
&groupByDirectory=`1`
]]

``` ![](/download/attachments/35586636/browsedirectories-groupbydirectory.jpg?version=1&modificationDate=1345838638000)

Template
========

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Example </th> <th> Default Value </th> <th> Options </th> </tr><tr><td> tplDir </td> <td> directory row template </td> <td> &tplDir=`tpl-dir` </td> <td> tpl-dir </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> tplFile </td> <td> file row template </td> <td> &tplFile=`tpl-file` </td> <td> tpl-file </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> tplGroupDir </td> <td> This is the template of the directory path if the &groupByDirectory is enabled </td> <td> &tplGroupDir=`tpl-group` </td> <td> tpl-group-dirchunk's name </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> tplWrapper </td> <td> This is the container template of all of the snippet's results </td> <td> &tplWrapper=`tplWrapper` </td> <td> tpl-wrapper </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> tplWrapperDir </td> <td> This is the container template for folders (optional) </td> <td> &tplWrapperDir=`tplWrapperDir` </td> <td> </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> tplWrapperFile </td> <td> This is the container template for files (optional) </td> <td> &tplWrapperFile=`tplWrapperFile` </td> <td> </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> tplIndex </td> <td> A generated index.html file to cover up the directory from direct web access   
</td> <td> &tplIndex=`tpl-index` </td> <td> tpl-index </td> <td> chunk's name/ @Bindings   
</td> </tr><tr><td> tplNotAllowed </td> <td> Template for forbidden access. \[\[!Login\]\] can be used in here.   
</td> <td> &tplNotAllowed=`tpl-notAllowed` </td> <td> @FILE: \[\[++core\_path\]\]components/filedownload/elements/chunks/tpl-notallowed.chunk.tpl </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> tplBreadcrumb </td> <td> Template for breadcrumb </td> <td> &tplBreadcrumb =`tpl-breadcrumb` </td> <td> tpl-breadcrumb </td> <td> chunk's name/ @Bindings </td> </tr><tr><td> breadcrumbSeparator </td> <td> separator character for the breadcrumb </td> <td> &breadcrumbSeparator=` / ` </td> <td> / </td> <td> string </td></tr></tbody></table> _tplWrapperDir_ & _tplWrapperFile_ (1.0.0-rc.5) are used to provide different wrappers between folders and files.   
 That means that they might have different headers. There are the default chunks inside **{core\_path}components/filedownload/elements/chunks/**, which are **tpl-wrapper-dir**.chunk.tpl and **tpl-wrapper file**.chunk.tpl, respectively.   
 To use them, _tplWrapper_ must be changed too or set it empty instead.

 FileDownload R has [@BINDING](http://rtfm.modx.com/display/MODx096/What+are+%28at%29+Bindings) directives for the template:

- @CODE|@INLINE
- @FILE
- @CHUNK (or not at all) - **default**
 
```
<pre class="brush: html">
[[!FileDownload?
&getDir=`assets/downloads`
&tplFile=`@CODE:    <tr[[+fd.class]]>
        <td>
            <span class="fd-icon">
                <img src="[[+fd.image]]" alt="" />
            </span>
            <a href="[[+fd.url]]">[[+fd.filename]]</a>
            <span style="font-size:80%">([[+fd.count]] downloads)</span>
        </td>
        <td>[[+fd.sizeText]]</td>
        <td>[[+fd.date]]</td>
    </tr>`
]]

```Example
-------

 ```
<pre class="brush: html">
[[!FileDownload?
&getDir=`assets/downloads`
&browseDirectories=`1`
&tplWrapper=``
&tplWrapperDir=`tpl-wrapper-dir`
&tplWrapperFile=`tpl-wrapper-file`
]]

``` ![](/download/attachments/35586636/separate-wrappers.jpg?version=1&modificationDate=1345838225000)

Headers
=======

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> <th> Options </th> </tr><tr><td> fileCss </td> <td> FileDownload's Cascading Style Sheet file for the page header </td> <td> assets/components/filedownload/css/fd.css </td> <td> web path | `disabled` to disable this </td> </tr><tr><td> fileJs </td> <td> FileDownload's Javascript file for the page header </td> <td> assets/components/filedownload/js/fd.js </td> <td> web path | `disabled` to disable this </td></tr></tbody></table>Style
=====

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Example </th> <th> Default Value </th> <th> Options </th> </tr><tr><td> cssAltRow </td> <td> This specifies the class that will be applied to every other file/directory so a ledger look can be styled. </td> <td> </td> <td> fd-altRow </td> </tr><tr><td> cssDir </td> <td> Class name for all directories </td> <td> </td> <td> fd-dir </td> <td> css class name </td> </tr><tr><td> cssExtension </td> <td> With this parameter set to 1, a class will be added to each file according to the file's extension. </td> <td> &cssExtension=`1` </td> <td> 0 </td> <td> bool: 0/1 </td> </tr><tr><td> cssExtensionPrefix </td> <td> Prefix to the above cssExtension class name </td> <td> </td> <td> fd- </td> <td> string </td> </tr><tr><td> cssExtensionSuffix </td> <td> Suffix to the above cssExtension class name </td> <td> </td> <td> null </td> <td> string </td> </tr><tr><td> cssFile </td> <td> Class name for all files </td> <td> &cssFile=`files` </td> <td> fd-file </td> <td> class name </td> </tr><tr><td> cssFirstDir </td> <td> Class name for the first directory </td> <td> </td> <td> fd-firstDir </td> <td> css class name </td> </tr><tr><td> cssFirstFile </td> <td> Class name for the first file </td> <td> </td> <td> fd-firstFile </td> <td> css class name </td> </tr><tr><td> cssGroupDir </td> <td> Class name for the the directory for multi-directory grouping. </td> <td> </td> <td> fd-group-dir </td> <td> css class name </td> </tr><tr><td> cssLastDir </td> <td> Class name for the last directory </td> <td> </td> <td> fd-lastDir </td> <td> css class name </td> </tr><tr><td> cssLastFile </td> <td> Class name for the last file </td> <td> </td> <td> fd-lastFile </td> <td> css class name </td> </tr><tr><td> cssPath </td> <td> This specifies the class that will be applied to the path when using directory browsing. </td> <td> </td> <td> fd-path </td> <td> css class name </td></tr></tbody></table>