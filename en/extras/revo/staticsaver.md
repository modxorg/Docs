---
title: "StaticSaver"
_old_id: "721"
_old_uri: "revo/staticsaver"
---

<div>- [What is StaticSaver](#StaticSaver-WhatisStaticSaver)
- [Installation](#StaticSaver-Installation)
- [StaticSaver's system settings](#StaticSaver-StaticSaver%27ssystemsettings)

</div>What is StaticSaver
-------------------

StaticSaver is a plugin for MODx Revolution that automatically sets up the name of file and media source of element (template, chunk, snippet, TV or plugin) when wanting to make this element be static. This is a simple helper for MODX developers.

Installation
------------

First install the package via the Package Management or download from [Repository](http://modx.com/extras/package/staticsaver).

After that, you need to configure [Media Sources](display/revolution20/Adding+a+Media+Source) and [System Settings](display/revolution20/System+Settings). You should filter system settings by namespace "staticsaver" to get all related settings.

You can see detailed video of configuring [StaticSaver at YouTube](http://www.youtube.com/watch?v=l3ObHPfFKTM).

StaticSaver's system settings
-----------------------------

<table><tbody><tr><th>System setting</th> <th>Description   
</th> <th>Default   
</th> </tr><tr><td>staticsaver.include\_category   
</td> <td>Add category folder to the path of element. For example, Snippet MySnippet in category MyCategory will be in path\_to\_media\_source/MyCategory/MySnippet.php   
</td> <td>false   
</td> </tr><tr><td>staticsaver.static\_default   
</td> <td>Set all elements to be static on opening of element's form.   
</td> <td>false   
</td> </tr><tr><td>staticsaver.static\_file\_extension   
</td> <td>The extension of all elements. It is of high priority. So you need to keep it blank for setting up different extensions of different elements.   
</td> <td>php   
</td> </tr><tr><td>staticsaver.static\_chunk\_file\_extension   
</td> <td>The extension of chunks. See static\_file\_extension description.   
</td> <td>php   
</td> </tr><tr><td>staticsaver.static\_plugin\_file\_extension   
</td> <td>The extension of plugins. See static\_file\_extension description.   
</td> <td>php   
</td> </tr><tr><td>staticsaver.static\_snippet\_file\_extension   
</td> <td>The extension of snippets. See static\_file\_extension description.   
</td> <td>php   
</td> </tr><tr><td>staticsaver.static\_template\_file\_extension   
</td> <td>The extension of templates. See static\_file\_extension description.   
</td> <td>php   
</td> </tr><tr><td>staticsaver.static\_tv\_file\_extension   
</td> <td>The extension of template variables. See static\_file\_extension description.   
</td> <td>php   
</td> </tr><tr><td>staticsaver.static\_chunk\_media\_source   
</td> <td>The media source for chunks.   
</td> <td>1   
</td> </tr><tr><td>staticsaver.static\_plugin\_media\_source   
</td> <td>The media source for plugins.   
</td> <td>1   
</td> </tr><tr><td>staticsaver.static\_snippet\_media\_source   
</td> <td>The media source for snippets.   
</td> <td>1   
</td> </tr><tr><td>staticsaver.static\_template\_media\_source   
</td> <td>The media source forf templates.   
</td> <td>1   
</td> </tr><tr><td>staticsaver.static\_tv\_media\_source   
</td> <td>The media source for template variables.   
</td> <td>1   
</td></tr></tbody></table>