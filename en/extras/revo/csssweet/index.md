---
title: "cssSweet"
_old_id: "1672"
_old_uri: "revo/csssweet/"
---

What's it for?
--------------

 cssSweet lets you manage your site's CSS within MODX. Why would you want to do that? Some use cases are described in the [documentation on github](http://sepiariver.github.io/cssSweet/). One example is if you're authoring a theme, and the end user of your site is of unknown technical experience. You can't rely on them learning Sass, but you want them to have control over certain aspects of their site's presentation. This is exactly what cssSweet was made for.

Version 2 incorporates many new features. The [full documentation site](http://sepiariver.github.io/cssSweet/) has important information about upgrading from version 1.

What do I need?
---------------

 Just install cssSweet via Package Manager in any MODX Revolution site, version 2.2.x or higher. You may also want to install [ClientConfig](extras/revo/clientconfig), as it allows your end users to manage global settings without having to navigate the System Settings page in the Manager.

How do I use it?
----------------

 The cssSweet package comes with 2 plugins and three snippets. You can find out about the snippets in the child pages herein. But before you do, there's a few System Settings you should be aware of.

<div class="warning">IMPORTANT: As of version 2, the cssSweet system settings have been deprecated in favour of plugin properties. DO NOT use the system settings in version 2 or greater of cssSweet—they will have no effect.</div>### cssSweet System Settings

 <table><tbody><tr><td>  **Key**  </td> <td>  **What it does**  </td> <td>  **Default value**  </td> </tr><tr><td> csss.custom\_css\_path </td> <td> Sets the path where the saveCustomCss plugin will output the static CSS file. </td> <td> {assets\_path}components/csssweet/ </td> </tr><tr><td> csss.custom\_css\_chunk </td> <td> Name of the chunk to parse for the contents of the CSS output file. </td> <td> csss.custom.css </td> </tr><tr><td> csss.custom\_css\_filename </td> <td> Name of the static CSS output file. </td> <td> csss-custom.css </td> </tr><tr><td> csss.minify\_custom\_css </td> <td> Enable or disable minification of the static CSS file contents. </td> <td> true </td></tr></tbody></table>### How the plugin uses these settings

 Assuming the default values shown above, whenever the Site » Clear Cache menu item in the Manager is clicked, the plugin will parse the contents of the 'csss.custom.css' Chunk and write the contents to a file at: '{assets\_path}components/csssweet/csss-custom.css'. To call this file into your template, you'll want to use the 'assets\_url' system setting, like this:

 ```
<link rel="stylesheet" href="[[++assets_url]]components/csssweet/csss-custom.css" />

``` The contents of that file will have all spaces, tabs and line breaks stripped down to a single space, since the csss.minify\_custom\_css setting is 'true'.

I could really use this feature...
----------------------------------

 cssSweet is open-source and free to use. If you'd like to chip in to the development, please submit issues or feature requests at the [repo on GitHub](https://github.com/sepiariver/cssSweet) or better yet fork it and code away! PRs are welcome and will be respectfully considered.