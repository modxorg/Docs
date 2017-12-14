---
title: "YAMS Language Modes"
_old_id: "748"
_old_uri: "evo/yams/yams-english-documentation/yams-language-modes"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Language Modes](/extras/evo/yams/yams-english-documentation/yams-language-modes)</td></tr></table></div>Language Modes
==============

YAMS needs to know which language variant of each document to display. It determines this from the URL used to access the document. These modes are not mutually exclusive. Whatever the active modes, the server settings (htaccess) will also need to be configured appropriately for YAMS to function correctly.

YAMS allows aliases with >7bit (multibyte even) characters to be used. YAMS will automatically encode the URLs for HTML output and decode them when it is analysing requests from the server. The encoding procedure for each part of the URL is as follows: First convert to UTF-8 (if necessary) and then rawurlencode.

Unique Multilingual Aliases mode
--------------------------------

This mode is activated by first setting the multilingual alias type to 'Unique' on the 'Other Params' tab, and then activating multilingual alases using the parameter beneath it. If multilingual aliases haven't been previously activated, then this will create multilingual aliases for all the documents which, assuming the existing document aliases are unique, will also be unique. From this point onwards it is the user's responsibility for ensuring the uniqueness of the aliases. When friendly alias paths are not being used, all aliases of all language variants of all documents, including monolingual aliases, must be unique. However, if friendly alias paths are being used the restriction is slightly less strict: For any given document all language variants of all its siblings must be unique.

When this mode is activated it is possible for YAMS to determine the required document and language from the alias path alone. Therefore server and root names can be set freely or left completely unset and needn't be unique.

It is possible to use multilingual aliases with or without enforcing uniqueness and they can also be used in conjunction with server and root name modes discussed below.

### Example URLS

It is possible to access different language variants of the same document via different URLs. Eg:

- [http://server\_name/my-doc-en.html](http://server_name/my-doc-en.html)
- [http://server\_name/mon-doc-fr.html](http://server_name/mon-doc-fr.html)

Server Name and Root Name modes
-------------------------------

**Server Name** mode and **Root Name** mode can be used simultaneously or independently. The general format of the URL when using these modes is:   
[http://(server\_name)/(subfolder/)(root\_name/)(path/)(filename](http://(server_name)/(subfolder/)(root_name/)(path/)(filename))   
where there is only a (subfolder/) if it has been configured on the 'Other Params' tab, and there is only a (path/) if friendly alias paths have been configured.

It must always be possible for YAMS to determine the language of a document from the URL. If unique multilingual aliases are not being used, then the 'Site URLs' for each language must be unique. The 'Site URLs' are displayed on the 'Language Settings' tab. From YAMS 1.1.5 alpha, the monolingual site URL may be the same as one of the multilingual site URLs. If YAMS is configured in such a way that the Site URLs are not unique then YAMS will drop into query param mode and will expect a query parameter to be used to specify the language. (See below.)

Server name mode is switched ON by specifying a server name for each language group and a server name for monolingual/ordinary pages on the 'Language Settings' tab. To use server name mode, it is necessary to configure the various server names as aliases or virtual hosts on the server. If server name mode is off, then the server name is determined in the usual way by MODx and so is consistent with \[(site\_url)\]. It is possible to specify IP addresses and URLs ending in localhost in order to facilitate development on local servers.

To enable root name mode, it is necessary to specify at least one root name on the Language Settings tab. If server name mode is OFF then one root name will need to be specified for each language group.

With any of unique multilingual alias mode, server name mode and root name mode it is possible to change the language of a page by sending a request back to the current page with the id of the new language group specified with a GET or POST variable. By default this variable is called yams\_new\_lang, but it can be configured otherwise on the 'Other Params' tab. A placeholder that accesses this name and snippet calls that generate a list or drop down boxes to enable changing the language are all available. See the YAMS [Placeholders](/extras/evo/yams/yams-english-documentation/yams-placeholders "YAMS Placeholders") and [Snippet](/extras/evo/yams/yams-english-documentation/yams-snippet "YAMS Snippet") documentation.

### Example URLS

Server name mode only. Eg:

- [http://en.server\_name.com/mydoc.html](http://en.server_name.com/mydoc.html)
- [http://fr.server\_name.com/mydoc.html](http://fr.server_name.com/mydoc.html)

Root name mode only. Eg:

- [http://server\_name.com/en/mydoc.html](http://server_name.com/en/mydoc.html)
- [http://server\_name.com/fr/mydoc.html](http://server_name.com/fr/mydoc.html)

Root name mode only, with one language at root. Eg:

- [http://server\_name.com/mydoc.html](http://server_name.com/mydoc.html)
- [http://server\_name.com/fr/mydoc.html](http://server_name.com/fr/mydoc.html)

Server name mode, root name mode, friendly alias paths, multilingual aliases and >7bit URLs. Eg:

- [http://en.server\_name.com/england/folder/mydoc.html](http://en.server_name.com/england/folder/mydoc.html)
- [http://fr.server\_name.com/la-france/r](http://fr.server_name.com/la-france/r)épertoire/mon-doc.html

Query Param mode
----------------

**Query Param** mode is provided primarily for compatibility with EasyLingual and cannot be used in conjunction with the other modes. To access this mode unique multilingual aliases must not be active, no root names must be specified and the server name must be unspecified or identical for all language groups and for monolingual pages. So, to distinguish one language from another a query parameter is appended to all URLs: [http://server\_name/(subfolder/)(path/)filename?yams\_lang=id](http://server_name/(subfolder/)(path/)filename?yams_lang=id)

By default this query param is called yams\_lang. However, it is configurable on the 'Other Options' tab. It should be changed to lang if compatibility with EasyLingual is required.