---
title: "TinyMCE.Spellchecker"
_old_id: "1020"
_old_uri: "revo/tinymce/tinymce.spellchecker"
---

TinyMCE for Revolution doesn't feature spellchecking by default.. or does it?

There is a plugin available for it, and it seems to partially included in the package (this is version 4.1.2-pl). However, to get it working we need to do a little bit more than simply enabling it.

Add the plugin files
--------------------

First thing to do is get the spellchecker plugin from the Moxiecode website. You can [find it on this page](http://www.tinymce.com/download/download.php), download the zip file from the bottom of the page.

Unzip the file to a local directory and load up your favorite FTP editor. Browse to the folder <ins>/assets/components/tinymce/jscripts/tiny\_mce/plugins/spellchecker/</ins> and you will see that there are a few files already.. but there's a few missing which are essential to use the spellchecker in MODX.

I would advice to backup all files (or just delete them - we shouldn't need them anymore after this) and upload the contents of your unzipped spellchecker folder instead.

_If you're running into permission errors while trying to delete and/or upload files, try to chmod the directory to a looser value (0755 or 777), you can do this through the Manager if needed._

Configuring TinyMCE
-------------------

<span class="image-wrap" style="float: right">![](/download/attachments/33947937/tinymce.PNG?version=1&modificationDate=1298060383000)</span>

Now login on your manager and go to System -> System Settings and find TinyMCE in the namespace dropdown (see image to the right). You will need to modify two settings:

1. Custom Plugins (key: tiny.custom\_plugins)
2. Custom Buttons Row X (key: tiny.custom\_buttonsx)

Add "spellchecker" to the comma-seperated custom plugins list to have TinyMCE load up the spell checker during startup.   
Also add "spellchecker" to the custom buttons row of your choice.

And now you should be done.

Troubleshooting
---------------

You will need to clear the browser cache in Internet Explorer to see the result. You will probably need a force refresh for other browsers, too.