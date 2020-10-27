---
title: "StaticSaver"
_old_id: "721"
_old_uri: "revo/staticsaver"
---

## What is StaticSaver

StaticSaver is a plugin for MODX Revolution that automatically sets up the name of file and media source of element (template, chunk, snippet, TV or plugin) when wanting to make this element be static. This is a simple helper for MODX developers.

## Installation

First install the package via the Package Management or download from [Repository](https://modx.com/extras/package/staticsaver).

After that, you need to configure [Media Sources](display/revolution20/Adding+a+Media+Source) and [System Settings](display/revolution20/System+Settings). You should filter system settings by namespace "staticsaver" to get all related settings.

You can see detailed video of configuring [StaticSaver at YouTube](http://www.youtube.com/watch?v=l3ObHPfFKTM).

## StaticSaver's system settings

| System setting                                | Description                                                                                                                                                   | Default |
| --------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| staticsaver.include\_category                 | Add category folder to the path of element. For example, Snippet MySnippet in category MyCategory will be in path\_to\_media\_source/MyCategory/MySnippet.php | false   |
| staticsaver.static\_default                   | Set all elements to be static on opening of element's form.                                                                                                   | false   |
| staticsaver.static\_file\_extension           | The extension of all elements. It is of high priority. So you need to keep it blank for setting up different extensions of different elements.                | php     |
| staticsaver.static\_chunk\_file\_extension    | The extension of chunks. See static\_file\_extension description.                                                                                             | php     |
| staticsaver.static\_plugin\_file\_extension   | The extension of plugins. See static\_file\_extension description.                                                                                            | php     |
| staticsaver.static\_snippet\_file\_extension  | The extension of snippets. See static\_file\_extension description.                                                                                           | php     |
| staticsaver.static\_template\_file\_extension | The extension of templates. See static\_file\_extension description.                                                                                          | php     |
| staticsaver.static\_tv\_file\_extension       | The extension of template variables. See static\_file\_extension description.                                                                                 | php     |
| staticsaver.static\_chunk\_media\_source      | The media source for chunks.                                                                                                                                  | 1       |
| staticsaver.static\_plugin\_media\_source     | The media source for plugins.                                                                                                                                 | 1       |
| staticsaver.static\_snippet\_media\_source    | The media source for snippets.                                                                                                                                | 1       |
| staticsaver.static\_template\_media\_source   | The media source forf templates.                                                                                                                              | 1       |
| staticsaver.static\_tv\_media\_source         | The media source for template variables.                                                                                                                      | 1       |