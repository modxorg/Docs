---
title: "YAMS Setup"
_old_id: "754"
_old_uri: "evo/yams/yams-english-documentation/yams-setup"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Setup (de)](/extras/evo/yams/yams-deutsche-dokumentation/yams-setup-(de))</td></tr><tr><td><span class="icon icon-page">Page:</span> [Configurar YAMS](/extras/evo/yams/yams-documentación-español/configurar-yams)</td></tr><tr><td><span class="icon icon-page">Page:</span> [YAMS Setup](/extras/evo/yams/yams-english-documentation/yams-setup)</td></tr></table></div>Setting up YAMS.
================

These instructions explain how to set up a new site or convert an existing site to be multilingual in a way that will cause the least disruption. In theory it is possible to convert a site to a multilingual one without having to take it offline except while reloading the server config. If everything goes smoothly, then at no point should the website be broken during the setup process.

These instructions are for people who are starting from scratch and want to develop a multilingual site, or those or have a monolingual site and would like to add additional languages.

Starting from scratch or from a mono-lingual site
-------------------------------------------------

It will be assumed that the YAMS module, plugin and snippet are already installed according to [the instructions](/extras/evo/yams/yams-english-documentation/yams-installation "YAMS Installation"). Installing the [ManagerManager](http://modxcms.com/extras/package/255) plugin and configuring it to use the YAMS rules is highly recommended, since YAMS can use it to organise the multiple language fields into separate tabs and to hide redundant document variable fields on the document view.

YAMS has been designed to work with friendly URLs or friendly alias paths.

The default YAMS install does nothing. Multilingual functionality has to be configured manually by specifying document templates as multilingual.

Step by Step YAMS Setup
-----------------------

<table><tbody><tr><th>Step</th><th>Action</th><th>Description</th></tr><tr><td>1</td><th>Backup</th><td>It's always wise to take a backup before modifying a site.</td></tr><tr><td>2</td><th>Decide on URL format</th><td>Before starting to configure YAMS it is necessary to decide how the language of the documents will be identified from the URL. YAMS will operate in different modes, depending on how the URLs are configured: **Server Name** mode, **Root Name** mode, **Unique Multilingual Aliases** mode and **Query Param** mode. These modes are described in detail on the [modes page](/extras/evo/yams/yams-english-documentation/yams-language-modes "YAMS Language Modes"). Examples of how different language versions of a single document could be configured are given below: ### Using Unique Multilingual Aliases

- Each language variant is referred to with a different name.
- Every language variant of every document has a unique name.
- Can be used with or without friendly alias paths.
- Document language determined from the document alias.   
  **Example:**
- [http://server\_name/home.html](http://server_name/home.html)
- [http://server\_name/accueil.html](http://server_name/accueil.html)  
  ### Using Server Name and Root Name modes
- Can be used with or without unique or non-unique multilingual aliases.
- Can be used with or without friendly alias paths.   
  **Examples:**
- Server name mode only. Eg: 
  - [http://en.server\_name.com/mydoc.html](http://en.server_name.com/mydoc.html)
  - [http://fr.server\_name.com/mydoc.html](http://fr.server_name.com/mydoc.html)
- Root name mode only. Eg: 
  - [http://server\_name.com/en/mydoc.html](http://server_name.com/en/mydoc.html)
  - [http://server\_name.com/fr/mydoc.html](http://server_name.com/fr/mydoc.html)
- Root name mode only, with one language at root. Eg: 
  - [http://server\_name.com/mydoc.html](http://server_name.com/mydoc.html)
  - [http://server\_name.com/fr/mydoc.html](http://server_name.com/fr/mydoc.html)
- Server name mode, root name mode, friendly alias paths, multilingual aliases and >7bit URLs. Eg: 
  - [http://en.server\_name.com/england/folder/mydoc.html](http://en.server_name.com/england/folder/mydoc.html)
  - [http://fr.server\_name.com/la-france/répertoire/mon-doc.html](http://fr.server_name.com/la-france/r%C3%A9pertoire/mon-doc.html)  
      ### Using Query Param mode
- This is the fallback if it is not possible to determine the language of the doc any other way.
- Can be used with or without friendly aliases and friendly alias paths.
- The name of the query parameter is customisable.   
  **Example:**
- [http://server\_name.com/mydoc.html?yams\_lang=en](http://server_name.com/mydoc.html?yams_lang=en)
- [http://server\_name.com/mydoc.html?yams\_lang=fr](http://server_name.com/mydoc.html?yams_lang=fr)

</td></tr><tr><td>3</td><th>Configure Language Settings</th><td>The second step is to configure the language settings for each language group that will be used on multilingual documents. This is done on the 'Language Settings' tab of the module interface.   
Each language group has an id. This is used, for example, in the multilingual versions of the template variables for that language. Eg: `description_<em>id</em>`, where `<em>id</em>` = `en`, `fr` or `de`  
A language group can be set up to represent a group of languages (en), a specific localised language (en-gb) or a selection of localised languages (en,en-gb,en-us,...) by specifying a comma separated list of language tags.   
In addition to the language group id and URL settings for each language group, it is possible to specify a language direction, text associated with each language and a MODx language name.   
One language group must be chosen as the default language group. This language will be assumed for monolingual documents.</td></tr><tr><td>4</td><th>Update Friendly URLs config</th><td>Next the server needs to be configured to handle the chosen language configuration. This can be done by copying the generated code from the 'Server Config' tab into the .htaccess file. It may be necessary to restart/reload the server.   
The server config file will have to be updated any time a language group is activated or deactivated, its server or root name is changed, or the query parameter is renamed.   
At this stage the website should still be functioning normally. By default all pages are considered monolingual (or non-multilingual), so no change in the website will be observed at this stage.</td></tr><tr><td>5</td><th>Check URLs</th><td>YAMS will automatically recognise and convert MODx style internal URLs that are surrounded by quotes to multilingual URLs that point to the correct language variant. The URL formats recognised and automatically handled by YAMS are: "`[(site_url)][~<em>something</em>~]`" or "`[(base_url)][~<em>something</em>~]`" and "`[~<em>something</em>~]`".   
The multilingual URLs generated by the YAMS always consist of the complete URL, including server name and full path. As a result they are not affected by the base href setting. The URLs are also configurable using the controls on the 'Other Params' tab. For example, it is possible to request that weblink URLs always resolve to their destination URL, or to request that the filename of the site start document of the default language is not output.   
URLs of physical resources like images, style and javascript files are not affected by YAMS. Relative URLs to such resources can be affected by the base href setting however, especially when using server name mode. The recommended method is to use the `(yams_server)` placeholder as follows:   
```
<pre class="brush: php">
<base href="(yams_server)"></base>

```For any internal URLs that are not automatically handled by MODx the recommended method of generating the correct multilingual URL is to use the following YAMS placeholders:   
`(yams_doc:<em>docId</em>)` or `(yams_docr:<em>docId</em>)` within document templates and content; and:   
`(yams_doc:[+<em>docId</em>+])` or `(yams_docr:[+<em>docId</em>+])` within snippet templates.   
See the YAMS placeholders tab for full details.

</td></tr><tr><td>6</td><th>Update Language Tags and Direction</th><td>The next step is to add language and language direction attributes to the opening html tag using YAMS placeholders: `lang="(yams_tag)"` and/or `xml:lang="(yams_tag)"` and `dir="(yams_dir)"`</td></tr><tr><td>7</td><th>Update Snippets</th><td>Any snippets which output URLs or directly contain multilingual text that is not embedded in multilingual placeholders will need to be updated. Guidance on how to do this for Wayfinder, Ditto, eForm, jot and other snippets is on the 'How To?' tab.   
Note that the `(yams_mname)` placeholder can be used to pass the correct manager language to snippet calls. For example, with ditto and eForm snippet calls `&language=`(yams_mname)`` can be used.</td></tr><tr><td>8</td><th>Redirection Strategy</th><td>It is now possible to specify certain templates as multilingual. When this is done all documents associated with those templates will be given multiple language versions as defined on the 'Language Settings' tab, the content for which is controllable via additional language specific template variables. In addition, the URLs of the associated documents will change dependent on the language. YAMS will automatically redirect from the old/monolingual URLs to the correct language variant. Several redirection modes are available and these are controllable via the 'URL Redirection Settings' section of the 'Other Params' tab.   
Initially, before the content has been translated, the redirection mode called 'default' can be used. This redirects to a valid page in the default language. Only once content has been written for the other languages the mode can be switched to, for example, 'Current else Browser' mode. This will keep the page in the current language, if one has already been set (by a previous visit to a page for example), else it will choose an appropriate language based on the user's browser settings.   
It is also possible to control the HTTP status codes that are sent when the redirection occurs. For existing sites the status code for redirection from the existing pages to the new default language pages can be left as "Temporary" (307) until a site is ready, at which point the status code should be switched to "Permanent" (301). That way search engines will know to correctly re-index existing pages. The status code to use when redirecting to pages that are in anything other than the default language can be left as "See Other" (303), which will indicate to search engines that the new but not the old page should be cached/indexed.</td></tr><tr><td>9</td><th>ManagerManager Interface</th><td>Now is the time to install ManagerManager if it hasn't been done already. This is highly recommended. Please follow [the instructions on the Installation page](/extras/evo/yams/yams-english-documentation/yams-installation#YAMSInstallation-ManagerManagerSetup).   
Once ManagerManager is installed it is possible to control how the fields of multilingual documents are organised when a document is edited. This is done by modifying settings on the 'Document Layout Settings' section of the 'Other Params' tab.   
When a document is converted to be a multilingual document the existing document variables, including the pagetitle, retain their existing values. However, all but the pagetitle become redundant. A setting exists that allows the redundant template variables to be hidden. With YAMS, the document pagetitle takes on the role of a text identifier for the document and all its language variants within the MODx back-end. This identifier is visible in the MODx document tree, but not on any web output. For convenience, YAMS provides an option to automatically update this document pagetitle with the contents of the default language multilingual pagetitle template variable on document save.</td></tr><tr><td>10</td><th>Multilingual Templates</th><td>It is finally possible to configure certain templates as multilingual. This is done from the 'Multilingual Templates' tab.   
All that needs to be done is to select yes for those templates that should be multilingual. YAMS will create multilingual template variables for those templates as required. It is possible to experiment first, by first creating a new template, then selecting it as multilingual, then associating it with a new document and then populating it with some default content. Multiple versions of each template variable for each language will be created automatically. These will be associated with the multilingual templates and default document content will be copied over into the newly created default language template variables.</td></tr><tr><td>11</td><th>Translate</th><td>Multiple language versions of the documents can now be viewed by browsing to the appropriate URL. However, initially all but the default language version has content written for it. Now when a multilingual document is edited there will be one tab per language and the content can be translated. Note that the site will continue to look normal and there wont be any links pointing to the new language versions until the next step.</td></tr><tr><td>12</td><th>Publicise</th><td>Once the content is translated it is possible to start publicising it. The snippet calls   
```
<pre class="brush: php">
[[YAMS? &get=`list`]]

```or

```
<pre class="brush: php">
[[YAMS? &get=`selectform`]]

```can be used to include a list based or form based language selection tool into multilingual templates. These commands can now be modified using custom templates. See [the YAMS Snippet page](/extras/evo/yams/yams-english-documentation/yams-snippet "YAMS Snippet") for full details.

</td></tr><tr><td>13</td><th>All Done</th><td>The site is now up and running as a multilingual site. The redirection mode and http status codes can be updated. Make sure that any search engine site maps contain a list of all documents, and not just those of a single language. See the 'How To?' tab for more details about how to achieve this.</td></tr></tbody></table>