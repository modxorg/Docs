---
title: "YAMS Configuration"
_old_id: "739"
_old_uri: "evo/yams/yams-english-documentation/yams-configuration"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Configuration](/extras/evo/yams/yams-english-documentation/yams-configuration)</td></tr></table></div>YAMS Configuration Options
==========================

The following tables document the options available for configuring YAMS.

Multilingual Aliases
--------------------

<table><tbody><tr><th>Name</th><th>Choices\\Example</th><th>Description</th></tr><tr><th><a id="YAMSConfiguration-UniquenessofMultilingualAliases"></a>Uniqueness of Multilingual Aliases</th><td>- Not Unique
- Unique

</td><td>Whether or not multilingual aliases (if they activated) will be unique. If you are intending to switch on multilingual alias functionality then this parameter should be set beforehand.   
Under normal circumstances aliases are considered to be non-unique. In that case YAMS must be able to identify the language of the current page from the server and root names alone. However, by respecting certain rules it is possible for YAMS to be able to identify the language of a page from the alias alone. In that case it is possible to use the same server and root name for different (or all) languages. If you wish to take advantage of this then here are the conditions that must be adhered to:   
- If using friendly alias paths then, for each document, all language variants of all its children must be given given unique aliases.
- If not using friendly alias paths, then all aliases of all language variants of all documents must be made unique.   
  If unique multilingual aliases are used, then the default alias will be set to the document variable alias for the default language variant and `<em>langId</em>-<em>documentAlias</em>` for the other language variants.   
  If unique multilingual aliases are not used, then when switching on multilingual alias mode the default values for multilingual aliases will be the document variable alias.

</td></tr><tr><th><a id="YAMSConfiguration-UseMultilingualAliases"></a>Use Multilingual Aliases?</th><td>- Yes
- No

</td><td>Whether or not to manage multilingual aliases. (Each language variant of a multilingual document may have its own alias.)</td></tr></tbody></table>URL Redirection Settings
------------------------

<table><tbody><tr><th>Name</th><th>Choices\\Example</th><th>Description</th></tr><tr><th><a id="YAMSConfiguration-RedirectionMode"></a>Redirection Mode</th><td>- None
- Default
- Current
- Current else Browser
- Browser

</td><td>Controls redirection when a page request is not associated with a valid multilingual URL. Prior to making a page multilingual page it may have been situated at the site root. For example: <http://www.example.com/example.html>  
However, as a multilingual page it may now be located at

[http://(server\_name)/(root\_name)/example.html](http://(server_name)/(root_name)/example.html)  
where the server name and root name are language dependent. The available options are:

- **None**: Don't redirect. Show the content at the given URL using the current language. (This setting is not advised. It means duplicate content, which search engines don't like.)
- **Default**: Redirect to the correct URL for the default language.
- **Current**: Redirect to the correct URL for the current language, whatever that happens to be. (Will be the language of the last multilingual page if they have previously visited one, or the default language.)
- **Current else Browser**: Redirect to the correct URL for the current language, whatever that happens to be. (Will be the language of the last multilingual page if they have previously visited one, else it will be determined from the browser settings, else the default language.)
- **Browser**: Choose the language based on the Accept-Language request header. If a suitable language doesn't exist then use default language. Redirect to the correct URL for the language.

</td></tr><tr><th><a id="YAMSConfiguration-StatusCodeforRedirectiontoPagesintheDefaultLanguage"></a>Status Code for Redirection to Pages in the Default Language</th><td>- multiple choices (300)
- permanent (301)
- found (302)
- see other (303)
- temporary (307)

</td><td>The HTTP status code to use when performing the redirection described above to pages in the default language. Choose temporary if just experimenting with YAMS. Once certain, this can be switched to permanent.</td></tr><tr><th><a id="YAMSConfiguration-StatusCodeforRedirectiontoPagesinNonDefaultLanguages"></a>Status Code for Redirection to Pages in Non-Default Languages</th><td>- multiple choices (300)
- permanent (301)
- found (302)
- see other (303)
- temporary (307)

</td><td>The HTTP status code to use when performing the redirection described above to pages in non-default languages. I suggest See other (303), since "the new URI is not a substitute reference for the originally requested resource.".</td></tr><tr><th><a id="YAMSConfiguration-StatusCodeforChangeofLanguage"></a>Status Code for Change of Language</th><td>- multiple choices (300)
- permanent (301)
- found (302)
- see other (303)
- temporary (307)

</td><td>The HTTP status code to use when performing a redirection in response to a request for the same page in a different language.</td></tr><tr><th><a id="YAMSConfiguration-MODxURLs"></a>MODx URLs</th><td>- \*
- a comma separated list of document ids

</td><td>Under normal circumstances YAMS will redirect MODx friendly URLs and URLs of the form index.php?id=... to the multilingual alias version of the URL for SEO friendliness. However, there may be occasions where it is preferable that YAMS accepts the old MODx form of the URL without redirection. This could occur when dealing with non-YAMS aware snippets and plugins.   
A comma separated list of document ids for which the standard MODx form of the URL will be accepted without redirection can be specified here. \* can be used to represent all documents.   
Note that when using this option language information is lost from the URL and so a language cookie will be used to keep the document in the same language as the last page visited.</td></tr></tbody></table>Document Layout Settings
------------------------

Most of these settings require that ManagerManager is installed and that the YAMS specific rules are configured first.

<table><tbody><tr><th>Name</th><th>Choices\\Example</th><th>Description</th></tr><tr><th><a id="YAMSConfiguration-HideRedundantFields"></a>Hide Redundant Fields</th><td>- Hide Fields
- Show Fields

</td><td>Whether or not to show or hide a) the document variables on multilingual documents and b) the multilingual alias fields when not using multilingual aliases. Once YAMS is set up it is not necessary to see the standard document variables because multilingual template variables are used instead. _This feature requires the YAMS ManagerManager rules_.</td></tr><tr><th><a id="YAMSConfiguration-DocumentLayout"></a>Document Layout</th><td>- Tabify TVs by Lang
- List TVs

</td><td>This can be used to place the multilingual template variables for each language on a separate tab. _This feature requires the YAMS ManagerManager rules_</td></tr><tr><th><a id="YAMSConfiguration-AutoupdateManagerDocumentTitle"></a>Autoupdate Manager Document Title</th><td>- Yes
- No

</td><td>This automatically updates the document pagetitle field with the content of the default language pagetitle on multilingual documents when a document is saved.</td></tr></tbody></table>URL Formatting
--------------

<table><tbody><tr><th>Name</th><th>Choices\\Example</th><th>Description</th></tr><tr><th><a id="YAMSConfiguration-UseMODxstripAlias"></a>Use MODx stripAlias</th><td>- Yes
- No

</td><td>Whether or not to use call the OnStripAlias event (or to call the stripAlias function on older versions of MODx) on multilingual aliases. The OnStripAlias event is normally pre-configured to convert the aliases to be lower-case, to include latin-characters only and to be dash-separated with no spaces, which used to be more search engine friendly. However, YAMS will correctly encode multibyte characters in aliases, so if you want to make use of that functionality then the MODx stripAlias functionality can be switched off here.</td></tr><tr><th><a id="YAMSConfiguration-UseMimetypedependentsuffixes?"></a>Use Mime-type dependent suffixes?</th><td>- Yes
- No

</td><td>Whether or not to use alias suffixes which are dependent on the document mime/content type. If yes, then friendly URL suffix becomes the default should no matching mime-type be found. The mapping between mime types and suffixes is defined within the yams.config.inc.php file. If necessary, this can be edited manually, but please take care and take a back up first, since an error here could break your YAMS installation</td></tr><tr><th><a id="YAMSConfiguration-Sitestartfilename"></a>Site start filename</th><td>- Include filename
- Don't include filename

</td><td>Whether or not to include the filename (alias) of the site\_start document in URLs created using the `yams_doc` and `yams_docr` placeholders.</td></tr><tr><th><a id="YAMSConfiguration-Containersasfolders"></a>Containers as folders</th><td>- Rewrite as folders
- Leave as files

</td><td>The final document in an URL is normally considered to be a file and is formatted as {`<em>prefix</em>}{<em>alias</em>}{<em>suffix</em>`}. If this option is switched on then documents which are containers will instead be formatted as {`<em>alias</em>}/`</td></tr><tr><th><a id="YAMSConfiguration-ConfirmLanguageParam"></a>Confirm Language Param</th><td>eg: yams\_lang</td><td>The name of the GET param that can be used to confirm to YAMS what the language of the current document should be. The mod\_rewrite rules in the htaccess file normally set this automatically to the language group id based on the request URL.   
EasyLingual users don't user server name mode or root name mode. Instead this query parameter should be used to specify the document language. The query param should be tagged on to the end of every document URL using a placeholder. (The `(yams_doc)` and `(yams_docr)` placeholders can be used to create a full URL that is valid across all configurations.) EasyLingual usually employs `lang` as the name this param.   
The name of this GET param can be accessed using the `(yams_confirm)` placeholder.</td></tr><tr><th><a id="YAMSConfiguration-ChangeLanguageParam"></a>Change Language Param</th><td>eg: yams\_new\_lang</td><td>The name of the GET or POST param that should be submitted when the user wants to stay on the same page but change language. This cannot have the same value as the query parameter used to confirm the current language. The value of the POST/GET should be set to the language group id.   
The name of this GET/POST param can be accessed using the `(yams_change)` placeholder.</td></tr><tr><th><a id="YAMSConfiguration-MODxSubdirectory"></a>MODx Subdirectory</th><td>eg: sub1/sub2</td><td>If MODx is installed into/configured as active within a subdirectory, eg: <http://www.example.com/sub1/sub2/index.php>, then this parameter should be set to the subdirectory path: sub1/sub2 with no trailing or leading slash. _In future versions of YAMS this parameter will probably be removed and determined automatically._

</td></tr><tr><th><a id="YAMSConfiguration-URLConversionMode"></a>URL Conversion Mode</th><td>- None
- Default
- Resolve

</td><td>Controls automatic conversion of standard MODx internal URLs to valid multilingual URLs. For example, a standard MODx internal URL might be expressed as `<span class="error">[(site_url)]</span><span class="error">[\~2\~]</span>` which might resolve to <http://www.example.com/doc-2-alias.html>. Automatic URL conversion would replace this by a YAMS placeholder of the form `(yams_doc:2)` or `(yams_docr:2)`, which will always resolve to an URL that points to the correct language version of the destination document. For example,

<http://www.example.com/en/doc-2-alias.html>.   
Currently YAMS will only convert URLs that are enclosed in double quotes (as is always the case with (X)HTML) and which are of the form `[~something~]` or `[(site_url)][~something~]` or `[(base_url)][~something~]`. The available options are:

- **None**: Do not do any automatic URL conversion.
- **Default**: Do standard URL conversion. The URL always resolves to the alias of the output document or weblink for the correct language.
- **Resolve**: As default, but for weblinks the URL resolves to the destination URL rather than the weblink alias.

</td></tr></tbody></table>Easylingual Compatibility
-------------------------

This was originally included to help people using Easylingual try YAMS, but I don't think anyone is actually using (or has ever used!) this. For that reason, I will probably remove this feature from YAMS in a future version. Please contact me via the YAMS forums if you don't want me to do that.

<table><tbody><tr><th>Name</th><th>Choices\\Example</th><th>Description</th></tr><tr><th><a id="YAMSConfiguration-EasylingualCompatibilityMode"></a>Easylingual Compatibility Mode</th><td>- Yes
- No

</td><td>Whether or not to activate EasyLingual compatibility mode. In this mode, EasyLingual placeholders are accepted.</td></tr></tbody></table>