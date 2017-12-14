---
title: "PHP Tidy (plugin)"
_old_id: "690"
_old_uri: "revo/php-tidy-(plugin)"
---

<div>- [HTML 5](#PHPTidy%28plugin%29-HTML5)
- [UTF 8](#PHPTidy%28plugin%29-UTF8)

</div>This plugin is based on [PHP Tidy](http://php.net/manual/en/book.tidy.php) parser, ported to MODX by goldsky.   
This is only for MODX Revolution, and can be downloaded from the Package Management.   
This runs on the MODX's OnWebPagePrerender event trigger.

To change properties of this plugin, change them in the plugin's property tab.   
The complete reference of the property can be found in [HTML Tidy Configuration Options](http://tidy.sourceforge.net/docs/quickref.html)

HTML 5
======

Edit **new-blocklevel-tags**, add this:

> article, aside, bdi, command, details, summary, figure, figcaption, footer, header, hgroup, mark, meter, nav, progress, ruby, rt, rp, section, time, wbr, audio, video, source, embed, track, canvas, datalist, keygen, output

UTF 8
=====

To make this plugin works for UTF-8 characters, change **char-encoding**, **input-encoding**, and **output-encoding**, to **utf8**