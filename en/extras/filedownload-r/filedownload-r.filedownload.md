---
title: "FileDownload"
_old_id: "841"
_old_uri: "revo/filedownload-r/filedownload-r.filedownload"
---

The parameters are adopted from the evolution's with several changes, so the previous user can easily understand about their usages.

Basic usage is `[[!FileDownload?]]`

## Main

| Name            | Description                                                                                                                                              | Example                                                                                                                  | Default Value | Options   |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------ | ------------- | --------- |
| getDir          | Comma separated of directories to display                                                                                                                | &getDir=``[[++core_path]]`downloads,`[[++base_path]]`assets/downloads, assets/files`                                     | empty         | string    |
| getFile         | Comma separated of files to display                                                                                                                      | &getFile=`assets/files/readme.txt,`[[++core\_path]]`downloads/readyou.doc,`[[++base\_path]]`assets/downloads/book1.xlsx` | empty         | string    |
| userGroups      | This will make the download link active for users that belong to the specified groups. Multiple groups can be specified by using a comma delimited list. | &userGroups=`Administrator, Registered Member`                                                                           | empty         | string    |
| extShown        | Comma delimited extension of files to display with those extensions.                                                                                     | &extShown=`zip,php,txt`                                                                                                  | empty         | string    |
| extHidden       | Comma delimited extension of files to be hid with those extensions. This will overide &extShown values.                                                  | &extHidden=`zip,php,txt`                                                                                                 | empty         | string    |
| toArray         | Returns the result as an array instead, not parsed in the templates.                                                                                     | &toArray=`1`                                                                                                             | 0             | bool: 0/1 |
| downloadByOther | Disable the downloading action by this snippet, to use different way                                                                                     | &downloadByOther=`1`                                                                                                     | 0             | bool: 0/1 |
| directLink      | Use file's direct path, rather than the hashed link. Make sure it is web accessible                                                                      | &directLink=`1`                                                                                                          | 0             | bool: 0/1 |
| fdlid           | Set an ID to each of the snippet calls if there are more than once.                                                                                      | &fdlid=`1`                                                                                                               | null          | string    |
| plugins         | [Read the doc.](http://rtfm.modx.com/display/ADDON/FileDownload+R.Plugins)                                                                               |                                                                                                                          |               |           |
| prefix          | prefix for the placeholders                                                                                                                              |                                                                                                                          | 'fd.'         |           |

## downloadByOther

available since v.1.0.0-pl

Note for **&downloadByOther**:
Example:
You have the need to use javascript pop-up window to force the downloader to fill up a form before downloading.
Then through AJAX, you submit the form, and expect results with conditions.
If the result, for instance, returns true, the AJAX calls the download's API to start the download.

### File Chunk

You need to create chunk for the file's rows.
Eg: jsDownload chunk

``` html
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
```

### HTML

downloaderForm is the basic HTML form with fields.

In this example, I'm also using [jQuerytools](http://jquerytools.org/)'s overlay and validator. The for is placed directly under the snippet call. It's hidden by CSS.

So the snippet call would be like this:

``` html
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
```

### javascript

``` javascript
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
```

### connector

And the connector would be like this:

``` php
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
```

### processors

core/components/yourpackage/processors/web/file/get/
example:

``` php
<?php
if (!$modx->loadClass('FileDownload', $modx->getOption('core_path') . 'components/filedownload/models/', true, true)) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[FileDownload] Could not load FileDownload class.');
    return '';
}
$fdl = $modx->getService('fdl', 'FileDownload' , $modx->getOption('core_path') . 'components/filedownload/models/filedownload/'
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
```

## Salt for hash

| Name     | Description                                                                   | Default Value | Options |
| -------- | ----------------------------------------------------------------------------- | ------------- | ------- |
| saltText | This text will be added to the file's hashed link to disguise the direct path | FileDownload  | string  |

The link is a hashed text of the saltText, context, and filename/dirname combination.
So if you change the saltText value after a while, it will not block the content's appearance from the page, but the database will start the counter from zero again since it will not find the same hashed value.

## Additional

| Name                                           | Description                                                                                | Example                      | Default Value                               | Options             |
| ---------------------------------------------- | ------------------------------------------------------------------------------------------ | ---------------------------- | ------------------------------------------- | ------------------- |
| noDownload                                     | This property will make the list only displays files without their download links.         |
| note: this is different from the Evo's version | &noDownload=`1`                                                                            | 0                            | bool: 0/1                                   |
| browseDirectories                              | Allows users to view subdirectories of the directory specified with the &getDir parameter. | &browseDirectories=`1`       | 0                                           | bool:0/1            |
| chkDesc                                        | Allows descriptions to be added to the file listing included in a chunk.                   | &chkDesc=`fileDesc`          | fileDescription                             | chunk's name        |
| dateFormat                                     | PHP's date formatting for the list                                                         | &dateFormat=`m/d/Y`          | Y-m-d                                       | string              |
| countDownloads                                 | Tracking the downloading                                                                   | &countDownloads=`1`          | 0                                           | bool: 0/1           |
| imgTypes                                       | A chunk name to define the associations between file extension and image                   | &imgTypes=`fdImages`         | fdImages                                    | chunk's name        |
| imgLocat                                       | Path to the images to associate with each file extension.                                  | &imgLocat=`assets/filetypes` | assets/components/filedownload/img/filetype | web accessible path |

## Sorting

| Name                | Description                                                                                                          | Example                  | Default Value | Options   |
| ------------------- | -------------------------------------------------------------------------------------------------------------------- | ------------------------ | ------------- | --------- |
| sortBy              | Sort ordering.                                                                                                       |
| Options:filename    | extension                                                                                                            | path                     | size          | sizetext  | type | date | unixdate (1.1.4-pl) | description | count | &sortBy=`path` | filename | string |
| sortByCaseSensitive | Case sensitive option for sorting                                                                                    | &sortByCaseSensitive=`1` | 0             | bool: 0/1 |
| sortOrder           | Sort files in ascending or descending order.                                                                         | &sortOrder=`desc`        | asc           | asc/desc  |
| sortOrderNatural    | Sort order option by a natural order                                                                                 | &sortOrderNatural=`1`    | 1             | bool: 0/1 |
| groupByDirectory    | If multiple directories are specified in the getDir parameter, this property will group the files by each directory. | &groupByDirectory=`1`    | 0             | bool: 0/1 |

Multiple sorting orders are applied as these orders:

- File sort: filename
- browseDirectories : dir, filename
- groupByDirectory : path, dir, filename

## Example

``` php
[[!FileDownload?
    &getDir=`[[++core_path]]downloads-from-core/land rover, assets/downloads`
    &browseDirectories=`1`
    &groupByDirectory=`1`
]]
```

![](/download/attachments/35586636/browsedirectories-groupbydirectory.jpg?version=1&modificationDate=1345838638000)

## Template

| Name                | Description                                                                    | Example                          | Default Value                                                                            | Options                 |
| ------------------- | ------------------------------------------------------------------------------ | -------------------------------- | ---------------------------------------------------------------------------------------- | ----------------------- |
| tplDir              | directory row template                                                         | &tplDir=`tpl-dir`                | tpl-dir                                                                                  | chunk's name/ @Bindings |
| tplFile             | file row template                                                              | &tplFile=`tpl-file`              | tpl-file                                                                                 | chunk's name/ @Bindings |
| tplGroupDir         | This is the template of the directory path if the &groupByDirectory is enabled | &tplGroupDir=`tpl-group`         | tpl-group-dirchunk's name                                                                | chunk's name/ @Bindings |
| tplWrapper          | This is the container template of all of the snippet's results                 | &tplWrapper=`tplWrapper`         | tpl-wrapper                                                                              | chunk's name/ @Bindings |
| tplWrapperDir       | This is the container template for folders (optional)                          | &tplWrapperDir=`tplWrapperDir`   |                                                                                          | chunk's name/ @Bindings |
| tplWrapperFile      | This is the container template for files (optional)                            | &tplWrapperFile=`tplWrapperFile` |                                                                                          | chunk's name/ @Bindings |
| tplIndex            | A generated index.html file to cover up the directory from direct web access   | &tplIndex=`tpl-index`            | tpl-index                                                                                | chunk's name/ @Bindings |
| tplNotAllowed       | Template for forbidden access. `[[!Login]]` can be used in here.               | &tplNotAllowed=`tpl-notAllowed`  | @FILE: `[[++core_path]]`components/filedownload/elements/chunks/tpl-notallowed.chunk.tpl | chunk's name/ @Bindings |
| tplBreadcrumb       | Template for breadcrumb                                                        | &tplBreadcrumb =`tpl-breadcrumb` | tpl-breadcrumb                                                                           | chunk's name/ @Bindings |
| breadcrumbSeparator | separator character for the breadcrumb                                         | &breadcrumbSeparator=`/`         | /                                                                                        | string                  |

_tplWrapperDir_ & _tplWrapperFile_ (1.0.0-rc.5) are used to provide different wrappers between folders and files.
That means that they might have different headers. There are the default chunks inside **{core\_path}components/filedownload/elements/chunks/**, which are **tpl-wrapper-dir**.chunk.tpl and **tpl-wrapper file**.chunk.tpl, respectively.
To use them, _tplWrapper_ must be changed too or set it empty instead.

FileDownload R has [@BINDING](http://rtfm.modx.com/display/MODx096/What+are+%28at%29+Bindings) directives for the template:

- @CODE|@INLINE
- @FILE
- @CHUNK (or not at all) - **default**

``` html
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
```

## Example

``` php
[[!FileDownload?
    &getDir=`assets/downloads`
    &browseDirectories=`1`
    &tplWrapper=``
    &tplWrapperDir=`tpl-wrapper-dir`
    &tplWrapperFile=`tpl-wrapper-file`
]]
```

![](/download/attachments/35586636/separate-wrappers.jpg?version=1&modificationDate=1345838225000)

## Headers

| Name    | Description                                                   | Default Value                             | Options  |
| ------- | ------------------------------------------------------------- | ----------------------------------------- | -------- |
| fileCss | FileDownload's Cascading Style Sheet file for the page header | assets/components/filedownload/css/fd.css | web path | `disabled` to disable this |
| fileJs  | FileDownload's Javascript file for the page header            | assets/components/filedownload/js/fd.js   | web path | `disabled` to disable this |

## Style

| Name               | Description                                                                                                 | Example           | Default Value | Options        |
| ------------------ | ----------------------------------------------------------------------------------------------------------- | ----------------- | ------------- | -------------- |
| cssAltRow          | This specifies the class that will be applied to every other file/directory so a ledger look can be styled. |                   | fd-altRow     |
| cssDir             | Class name for all directories                                                                              |                   | fd-dir        | css class name |
| cssExtension       | With this parameter set to 1, a class will be added to each file according to the file's extension.         | &cssExtension=`1` | 0             | bool: 0/1      |
| cssExtensionPrefix | Prefix to the above cssExtension class name                                                                 |                   | fd-           | string         |
| cssExtensionSuffix | Suffix to the above cssExtension class name                                                                 |                   | null          | string         |
| cssFile            | Class name for all files                                                                                    | &cssFile=`files`  | fd-file       | class name     |
| cssFirstDir        | Class name for the first directory                                                                          |                   | fd-firstDir   | css class name |
| cssFirstFile       | Class name for the first file                                                                               |                   | fd-firstFile  | css class name |
| cssGroupDir        | Class name for the the directory for multi-directory grouping.                                              |                   | fd-group-dir  | css class name |
| cssLastDir         | Class name for the last directory                                                                           |                   | fd-lastDir    | css class name |
| cssLastFile        | Class name for the last file                                                                                |                   | fd-lastFile   | css class name |
| cssPath            | This specifies the class that will be applied to the path when using directory browsing.                    |                   | fd-path       | css class name |
