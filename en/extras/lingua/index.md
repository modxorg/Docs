---
title: "Lingua"
_old_id: "1364"
_old_uri: "revo/lingua"
---


 A MODX's Lexicon switcher for front-end interface. 
 This can be downloaded from Manager's Package Manager. 
 The extra page is <http://modx.com/extras/package/lingua>. 
 Any issues can be reported to here: <https://github.com/goldsky/Lingua/issues>

## Background

 This package was written by goldsky, and first released on June 6, 2013, initially prepared for [Adam Wintle](http://forums.modx.com/u/adamwintle) of [Monogon](http://www.monogon.co) to create a Chinese and a Thai website.

 This add-on was made to answer the need of creating a multilingual website without messing up with contexts. 
 The concept was based on [Translations](http://modx.com/extras/package/translations) package, but independently developed from scratch and heading in different direction.

## CMP

 The Custom Manager Page is provided to manage the list of languages and their settings.

 [![](/download/thumbnails/46137393/Lingua_CMP.png)](/download/attachments/46137393/Lingua_CMP.png)

## Plugin

 The plugin is used to manage the cookie and session of the selected language. 
 This plugin then provides a placeholder **\[\[+lingua.cultureKey\]\]** for the page. 
 But to get this value for other snippet, like language selection of a email hook, the developer can use **\[\[!lingua.cultureKey\]\]** below.

## Snippets

 For front-end usage, Lingua has some utility snippets. 
 ALL snippets have &toArray to dump all the placeholders and &toPlaceholder to hold the output and store it into the given placeholder's name.

### lingua.selector

 This snippet is the language selector on the front-end. 
 The chunks have [twitter bootstrap's dropdown-toogle style](http://getbootstrap.com/components/#dropdowns) as default, just to give an idea of how they were prepared.

 [![](/download/thumbnails/46137393/lingua.selector.png)](/download/attachments/46137393/lingua.selector.png)

 When the user clicks the link, then the page will be redirected back to the same page, but with additional REQUEST url to initiate the language session. 
 The REQUEST key can be defined in System Setting, but the default key is **_lang_**.

#### Properties

 | Name       | Description                                                              | Example                 | Default Value                          | Options                                              |
 | ---------- | ------------------------------------------------------------------------ | ----------------------- | -------------------------------------- | ---------------------------------------------------- |
 | tplWrapper | the wrapper template chunk                                               | &tplWrapper=`chunkName` | lingua.selector.wrapper                | chunk's name, @BINDINGs enabled                      |
 | tplItem    | the item template chunk                                                  | &tplItem=`chunkName`    | lingua.selector.item                   | chunk's name, @BINDINGs enabled                      |
 | sortby     | sort the output by a field name                                          | &tplItem=`lcid\_string` | id                                     | id, local\_name, lang\_code, lcid\_string, lcid\_dec |
 | sortdir    | the direction of the sorting                                             | &sortdir=`ASC`          | asc                                    | asc, desc                                            |
 | phsPrefix  | placeholder's prefix to avoid conflict with other packages' placeholders | &phsPrefix=`lingua.`    | lingua.                                | (string)                                             |
 | codeField  | the field of which will be used as the value of the options              | &codeField=`lang\_code` | System Setting's **lingua.code.field** | id, local\_name, lang\_code, lcid\_string, lcid\_dec |

 @BINDING in chunks means the developer can use:

- chunk name
- @FILE:\[\[++core\_path\]\]path/to/chunk/file.tpl
- @CODE:  \[\[+lingua.languages\]\]

#### Default Chunks

##### lingua.selector.wrapper

 ``` php 

<div class="container">
        <div class="btn-group">
                <button
                        class="btn btn-link btn-mini dropdown-toggle"
                        data-toggle="dropdown"
                        >[[%lingua.select_language]]
                </button>
                <ul class="dropdown-menu">
                        [[+lingua.languages]]
                </ul>
        </div>
</div>

```

##### lingua.selector.item

 ``` php 

[[+lingua.cultureKey:is=`[[+lingua.lang_code]]`:then=``:else=`<li>
        <a href="[[+lingua.url]]" title="[[+lingua.local_name]]">
                <img src="[[+lingua.flag]]" alt=""/> [[+lingua.local_name]]
        </a>
</li>`]]

```

 On this chunk, the default content tries to ignore the language of the current language using Output Filter.

### lingua.cultureKey

 This snippet to get the current active language. 
 This snippet only contains

 ``` php 

return $modx->cultureKey;

```

 No! It's different to

 ``` php 

return $modx->getOption('cultureKey');

```

 This snippet is the most important part to grab the language's lexicons.

 **Version 1: Please notice the exclamation mark in front of the %login. The lexicon must be +UN+CACHED.**

 ``` php 

[[!%login? &namespace=`Login` &language=`[[!lingua.cultureKey]]`]]

```

 **Version 2:** Lingua has its own cache folder. All translated pages are stored on different files, so everything can be cached.

 ``` php 

[[%login? &namespace=`Login` &language=`[[lingua.cultureKey]]`]]

```

### lingua.getField

 This snippet is to get the value of the Lingua's language setting for the running language on the page. 
 The value will be switched to the selected active language.

#### Properties

 | Name      | Description                                                 | Example                     | Default Value                          | Options                                                                                                                                   |
 | --------- | ----------------------------------------------------------- | --------------------------- | -------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
 | **field** | any field to be selected                                    | &field=`date\_format\_lite` |                                        | all available fields: id, active, local\_name, lang\_code, lcid\_string, lcid\_dec, date\_format\_lite, date\_format\_full, is\_rtl, flag |
 | codeField | the field of which will be used as the value of the options | &codeField=`lang\_code`     | System Setting's **lingua.code.field** | id, local\_name, lang\_code, lcid\_string, lcid\_dec                                                                                      |

##### Examples

 ``` php 

Created on: [[*createdon:date=`[[!lingua.getField? &field=`date_format_lite`]]`]]

```

### lingua.getValue

 This snippet is to get any of resource's translated field for the running language on the page. 
 The value will be switched to the selected active language.

#### Properties

 | Name                            | Description                                                      | Example                         | Default Value    | Options                                                                                                                                |
 | ------------------------------- | ---------------------------------------------------------------- | ------------------------------- | ---------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
 | **field**                       | the "key" name, or the field's name in database. **required \*** | &field=`pagetitle`              |                  | Main fields: pagetitle, longtitle, description, alias, link\_attributes, introtext, content, menutitle, uri, uri\_override, properties |
 | or any Template Variable's name |
 | id                              | The id of the resource to get the value from                     | &id=`\[\[+snippetPrefix.id\]\]` | Current resource | integer                                                                                                                                |

##### Examples

 On your wayfinder's rowTpl, change the placeholder, like this: ``` php 

<li[[+wf.id]][[+wf.classes]]>
    <a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>
        <-- [[-+wf.linktext]] -->
        [[lingua.getValue:default=`[[+wf.linktext]]`? &id=`[[+id]]` &field=`pagetitle`]]
        <!-- rowTpl -->
    </a>
    [[+wf.wrapper]]
</li>

```

## Version 2.0.0+

 Since version 2, Lingua now stores clone resource's content, the main content and all defined Template Variables.

#### Template Variables :

 You need to go to Custom Manager Page (Components > Lingua), and define which TV that will be available for translation.

#### Standard MODX fields (pagetitle, content, etc.) :

 You also **need** to define additional setting for particular context that will use Lingua.
 On your resource tree navigation > right click > edit context.

#### Editing the Context

 **Right click** on the context where Lingua should run, then click "**Edit context**":

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/select-context.png)

 Then add this setting on the "Context Settings" tag:

- key: **modRequest.class**, value: **LinguaRequest**

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/new-context-setting.png)

 After it is saved, you will see the setting on the grid like this.

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/lingua_context_settings.png)

#### Multiple contexts :

 To have different languages set for different context, you can add this setting as well:

- key: **lingua.langs**, value: **en,de,...**

 This setting will override Custom Manager Page's setting of which languages are active.

#### <= Version 2.0.0-beta3

 On the plugin itself, you would also need to set to which context this plugin should run, on your element tree navigation > Plugin > Lingua category/folder > click Lingua plugin.

 On its "Properties" tab, click "Default Properties Locked" button, and change this:

- name: **lingua.contexts**, value: **web**, **your\_other\_context1**, **your\_other\_context2**

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/lingua_plugin_settings.png)

#### Version 2.0.0-rc1

 On this version, the settings have been moved over to MODX's System Settings instead, to avoid overriding on upgrading.

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/system-settings.png)

### Template Variable's Cloning Patterns

 On cloning Template Variables, Lingua duplicate the input forms of the TVs. To avoid Javascript confliction, Lingua changes any IDs on their html/js codes.

 You need to create new ones, if you are using custom TVs.

 Go to CMP, select "Template Variables" tab, then select "Cloning Patterns".

 You will find pre-existing core TVs' patterns, and MIGX's patterns as example.

 You can either create a new one, or duplicate existing one by right-click select the row.

 ![](/download/attachments/3c7aceb2105f8370062ab6139e964a8a/lingua-cloning-patterns-update.png)

 To find out what IDs you need to set, you need to find them out from the TV's template.

 By following " [Adding a Custom TV Type - MODX 2.2](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2)" tutorial, the input form templates should have been created under **"core/components/ourtvs/tv/input/tpl/"** folder.

 You can find some IDs that are defined as `{$tv->id}`. Add that parts into our Cloning Patterns database.

## Limitation

 Because of the basic concept of Lingua, which is cloning the default MODX's content for other languages, you can not expect to have different site structure on secondary languages.

 For that purpose, [Babel](http://rtfm.modx.com/extras/revo/babel) wins.

## Incompatibility

 Lingua is not compatible with any custom Template Variables that store the values outside of MODX's TV database.

 It's known incompatible with:

- SmartTag
- [ContentBlock](https://www.modmore.com/extras/contentblocks/)