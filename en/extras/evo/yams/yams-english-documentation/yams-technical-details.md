---
title: "YAMS Technical Details"
_old_id: "757"
_old_uri: "evo/yams/yams-english-documentation/yams-technical-details"
---

<div class="warning">**Warning**  
This is an unfinished first draft...</div><div>- [YAMS Technical Details](#YAMSTechnicalDetails-YAMSTechnicalDetails)
  - [YAMS Constructs](#YAMSTechnicalDetails-YAMSConstructs)
  - [YAMS Parser](#YAMSTechnicalDetails-YAMSParser)
      - [Pre-Parse](#YAMSTechnicalDetails-PreParse)
      - [Post-Parse](#YAMSTechnicalDetails-PostParse)

</div>YAMS Technical Details
======================

YAMS works by embedding the various language versions of each bit of multilingual content in the document using various YAMS Constructs:

- The YAMS snippet call generates such constructs.
- Standard document variables are replaced by constructs containing the multilingual tv language variants.
- Most <span class="error">\[YAMS placeholders\]</span> are expanded out into YAMS constructs.

Unless something goes wrong (like PHx truncating some content which breaks an embedded construct for example), these constructs are completely hidden to the user.

Once all multilingual content has been expanded out into constructs, the end result is a single document containing all language information in a complete nested mess. It is the job of the YAMS parser to evaluate and reorder this nested mess into one single construct, containing one version of the document for each language. It will do as much of this reorganisation as possible before the document is cached, so as to minimise the performance hit from this. Up until the point that the caching occurs all language variants are retained. After that all language variants apart from the requested language are thrown away. If the document contains uncacheable snippet calls containing YAMS constructs then this can sometimes provoke some additional processing or reorganisation of the document before it is sent out.

For cacheable documents containing only cacheable snippet calls or uncacheable snippet calls that don't contain multilingual content then there is virtually no performance hit due to YAMS processing after first page access.

YAMS Constructs
---------------

These constructs are used internally by YAMS, which also generates and manages the `<em>yamsId</em>` parameter to avoid clashes. The constructs are provided here for reference only. Under normal circumstances these constructs do not need to be used. Instead a YAMS snippet call should be used, which will automatically generate the correct constructs.

<table><tbody><tr><th>YAMS Constructs Construct</th><th>Name</th><th>Description</th></tr><tr><td>`(yams-in:<em>yamsId</em>:<em>langId</em>)<em>...content...</em>(/yams-in:<em>yamsId</em>)`</td><th>YAMS In Language Block</th><td>Forces the content of the `yams-in` block to be displayed as if the current language is that specified by the language group identifier `<em>langId</em>`.   
Here `<em>yamsId</em>` is a positive integer identifier that should be unique to this block. This allows blocks to be nested. _langId_ is a language group id.</td></tr><tr><td>`(yams-select:<em>yamsId</em>)(lang:<em>yamsId</em>:<em>langId1</em>)<em>...content1...</em>(lang:<em>yamsId</em>:<em>langId2</em>)<em>...content2...</em>(/yams-select:<em>yamsId</em>)`</td><th>YAMS Select Language Block</th><td>This includes multiple language versions of content in the page. Only the current language version is displayed (except if it is within a `yams-repeat` block – see below.) The `pagetitle`, `longtitle`, `description`, `introtext`, `menutitle` and `content` document variables are automatically expanded into this form for the currently defined active languages. For any other content (chunks, tvs, etc.) that need to be expanded into multi-language form a YAMS snippet call can be used to generate the relevant construct.   
When a Yams Select block is being parsed to select the correct language content the current language is taken to be context dependent. Within Yams In blocks (and branches of Yams Repeat blocks which ultimately resolve to Yams In blocks) the current language switches to the specified language.   
Here `<em>yamsId</em>` is a positive integer identifier that should be unique to this block. This allows blocks to be nested. `<em>langId</em>` is a language group id.</td></tr><tr><td>`(yams-select+:<em>yamsId</em>)(lang:<em>yamsId</em>:<em>langId1</em>)<em>...content1...</em>(lang:<em>yamsId</em>:<em>langId2</em>)<em>...content2...</em>(/yams-select+:<em>yamsId</em>)`</td><th>YAMS Select Plus Language Block</th><td>This is the same as the Yams Select block, except that the current language is not context sensitive. So, the current language will always be the language in which the page is being viewed.</td></tr><tr><td>`(yams-repeat:<em>yamsId</em>)<em>...content...</em>(current:<em>yamsId</em>)<em>...current language content...</em>(/yams-repeat:<em>yamsId</em>)`</td><th>YAMS Repeat Language Block 1</th><td>The `yams-repeat` block will repeat any content once for each active language and is similar to specifying one `yams-in` block for each active language. The current sub-block is optional and is to allow an alternative template to be used with the current language content.   
Here `<em>yamsId</em>` is a positive integer identifier that should be unique to this block.</td></tr><tr><td>`(yams-repeat:<em>yamsId</em>:<em>langId1</em>,<em>langId2</em>,<em>...</em>)<em>...content...</em>(/yams-repeat:<em>yamsId</em>)`</td><th>YAMS Repeat Language Block 2</th><td>This variation on the YAMS Multi-Language Block will only repeat for the specified language groups. This functionality is not currently accessible via a YAMS Snippet call.</td></tr></tbody></table>YAMS Parser
-----------

The YAMS parser has two phases. It does pre-parsing, which does the expansion of constructs, evaluation of placeholders and reorganisation of the document. It does a final post-parse each time the document is requested just before it is send out. Post-parsing selects a single language variant.

### Pre-Parse

The pre-parse step does the following:

1. If the document hasn't changed since the last pre-parse, exit.
2. Evaluate all chunks. The normal YAMS chunk parser removes chunks from the document if it doesn't recognise them. However, at this stage the chunk names could contain YAMS placholders, like {{`myname_(yams_id)`}}. Since we don't want MODx to remove this, a custom chunk parser is used that leaves these intact (`YAMS::MergeChunkContent`). If the document has changed as a result of this processing the pre-parse restarts.
3. For multilingual documents, the standard document variables are expanded out into constructs containing `(yams_data)` placeholders that will pull in the multilingual template variable content later in the parse process.
4. The document variables and template variables belonging to the current document are evaluated. Once again, a custom parser is used (`YAMS::MergeDocumentContent`) rather than the standard MODx method. The custom method doesn't delete unrecognised document variables or template variables so that names that include YAMS placeholders persist until later in the parse process. If the document has changed as a result of this processing the pre-parse restarts.
5. Next, the document is searched for all `(yams_data)` placeholders in the document (`YAMS::MergeOtherDocumentContent`). These placeholders request data from template variables on different documents. Having worked out what data is needed, YAMS will grab the data from the database, `YAMS_DOC_LIMIT` items at a time. `YAMS_DOC_LIMIT` is defined as 50 by default. The `(yams_data)` placeholders are then replaced by their content. If the document has changed as a result of this processing the pre-parse restarts.
6. All MODx URL placeholders enclosed in quotes, like `"[~...~]"`, `"[(site_url)][~...~]"` or `"[(base_url)][~...~]"` are now replaced by YAMS multilingual URL placeholders `(yams_doc)` or `(yams_docr)`, depending on how YAMS has been configured.
7. All YAMS settings placeholders are evaluated using the standard MODx function (`modx::mergeSettingsContent`).
8. All YAMS placeholders are evaluated for each language and expanded out using YAMS constructs.
9. Pre-parse optimisation takes place. This untangles the nested web of YAMS constructs and replaces them by a single YAMS construct with one branch per language, taking into account the fact that some content will be repeated in multiple languages, that some content may appear in a different language to the current document, and that there may still be snippets in the document which will output more multilingual constructs later. If the document has changed as a result of this processing the pre-parse restarts.
10. The evaluation and expansion of YAMS placeholders into constructs and reorganisation of those constructs may have made more chunks and template variables which previously had YAMS placheholders in their name possible to evaluate now. Steps 2, 4 and 7 are repeated.
11. Snippets are evaluated using the standard MODx function (`modx::evalSnippets`). If the document has changed as a result of this processing the pre-parse restarts.

Once the parser has arrived here it hands control back to the standard MODx parser, which will first call the other plugins. If PHx has been installed and has been placed after YAMS in the plugin execution order, it will do its evaluation next... but by now all YAMS constructs and placeholders have been evaluated and tidied up, so it should be pretty safe to do so. MODx will then do its standard parsing ... but there is very little left for it to do. Most chunks, document variables, template variables and snippets have already been evaluated during the YAMS preparse step.

### Post-Parse

... to be continued ...