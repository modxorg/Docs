---
title: "SmartTag"
_old_id: "1714"
_old_uri: "revo/smarttag"
---

 Description 
-------------

  **SmartTag** is a tagging system for MODX Revolution and is intended to replace MODX's original auto-tag TV.

 By having its own tables, SmartTag can be managed easier compared to the normal auto-tag TV which is stored as comma separated values. SmartTag uses an AJAX combobox for the TV when adding a new tag, and a CMP to list and manage all the tags.

 From the CMP you can rename the tag, or delete it entirely from the system, on all resources. You can convert existing auto-tag TVs to be SmartTag TV, or revert SmartTag back to other tag type.

 History 
---------

 SmartTag was first written by goldsky and released on March 28, 2014.

 Collaborator: [Adam Wintle](http://www.monogon.co).

Download
--------

 It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/smarttag>

 The source code and build script is also available on GitHub: <https://github.com/goldsky/SmartTag>[](https://github.com/tasianmedia/getDate)

Bugs & Feature Requests
-----------------------

 Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/goldsky/SmartTag/issues>

System Settings
---------------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> <th> Version </th> </tr><tr><td> smarttag.limit </td> <td> Number of tags limit when listing them in Custom Manager Page </td> <td> 50 </td> <td> </td> </tr><tr><td> smarttag.use\_filter </td> <td> (Optional) Whether use MODX's cleanAlias function and lowercase the character when inserting new tag.   
 Set it to false if tags are in non-latin characters. </td> <td> true </td> <td> 1.0.2-pl </td></tr></tbody></table>Template Variable 
------------------

 When creating the TV, you need to select the proper input type and output type.

<div> ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/inputtype-selection.png)![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/outputtype-selection.png)</div><div style="display: block; clear:both;"> </div>###  Input Type Options 

 In input type options, they are exactly as same as [auto-tag](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-input-types#TemplateVariableInputTypes-AutoTag) options, except the **queryLimit**.

 The default value of this queryLimit is 20.

 **(v. 1.0.4-pl)** If you want the typeahead drop-down tag TV gets all tags regardless their TVs' scopes, set **Global Tags** to true.

###  Output Type Options 

 In output type options, they adapt [Delimiter](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/delimiter-tv-output-type) and [URL TV](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/url-tv-output-type) output types.

 The difference is that in adding link for tags, you need to define the "href" of the link. This is required for link.

 The content can be \[\[~pageId\]\] or <http://www.domain.com>

<div class="warning"> If the Output Type not set, the output will be raw values delimited by double pipelines "||". </div><div class="danger"> The tags are case sensitive! If you need them to all lowercase, just rename them from the Custom Manager Page. </div>### Add a new Tag

 You can either add new tag or use existing ones.

 If you activate the field, you can type in the tag directly into that "textfield".

 If you have not click **\[ENTER\]** key in **1 second**, the dropdown will come up to offer you any similar tag based on it, or just closed off directly if none is found.

 The drop down will force you to select existing one if it lists tags.

 If you just want to add new tag, just hit **\[ENTER\]** <u>before</u> **1 second**.

Custom Manager Page 
--------------------

###  TagCloud 

 The CMP is used to make manager easily manages the tags.

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/tag-cloud-2.png)

 If the button is clicked, then a new tab will be opened containing all resources that are using that clicked tag.

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/tag-resources.png)

 On here, you can then delete, rename, or remove the tag from the selected resources.

 The Resource's titles are links, so they can be clicked (or ctrl+click or middle-mouse click) to open it.

###  Converter 

 In the second page, there's a converter utility to convert existing tag types to SmartTag or revert SmartTag TVs back to the other tag types.

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/sync.png)

 When a SmartTag TV is selected, it also can be synchronized to get all values from related resources to store them into the SmartTag's DB.

 Snippet 
---------

 SmartTag also provides a snippet to list the tags, based on some filters.

###  smarttagTags 

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Value Type </th> <th> Default Value </th> <th> Since Version </th> </tr><tr><td> docIds </td> <td> Comma delimited values of Documents' IDs </td> <td> String </td> <td>   
</td> <td> 1.0.0-beta1 </td> </tr><tr><td> parentIds </td> <td> Comma delimited values of Parent Documents' IDs </td> <td> String </td> <td>   
</td> <td> 1.0.0-beta5 </td> </tr><tr><td> allTags </td> <td> Show all tags </td> <td> String </td> <td>   
</td> <td> 1.0.0-beta5 </td> </tr><tr><td> tvNames </td> <td> Explicitly define which TVs. Prerequisites: either **&docIds** or **&parentIds** </td> <td> Comma separated TVs' names </td> <td>   
</td> <td> 1.0.0-pl </td> </tr><tr><td> includeEmptyTags </td> <td> Do you want to include tags without resources? </td> <td> Boolean: 0|1 </td> <td> 0 </td> <td> 1.0.0-beta1 </td> </tr><tr><td> includeHiddenDocs </td> <td> Do you want to include tags on hidden resources? </td> <td> Boolean: 0|1 </td> <td> 0 </td> <td> 1.0.0-beta5 </td> </tr><tr><td> limit </td> <td> Maximum number of list. 0 will be ignored. There is "no limit" option, as intended. If you want to list all, just put 1000000 (a million) limit, but you are responsible for any problem to the server.   
</td> <td> Integer </td> <td> 10 </td> <td> 1.0.0-beta1 </td> </tr><tr><td> phsPrefix </td> <td> Prefix for the placeholders </td> <td> String </td> <td> smarttag </td> <td> 1.0.0-beta1 </td> </tr><tr><td> sort </td> <td> Comma delimited multiple sorting. Format: field direction,field direction. Mind the space in between. </td> <td> String </td> <td> count desc,tag asc </td> <td> 1.0.0-beta1 </td> </tr><tr><td> tplItem </td> <td> Name of chunk for item template of the output. @BINDING enabled (eg: @FILE:\[path/to/file.tpl\]). </td> <td> String </td> <td> smarttagtags.item </td> <td> 1.0.0-beta1 </td> </tr><tr><td> tplWrapper </td> <td> Name of chunk for wrapper template of the output. @BINDING enabled (eg: @FILE:\[path/to/file.tpl\]). </td> <td> String </td> <td> smarttagtags.wrapper </td> <td> 1.0.0-beta1 </td></tr></tbody></table> To list the tags, you **MUST** either provide docIds, parentIds, or allTags properties (parameters).