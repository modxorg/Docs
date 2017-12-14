---
title: "ObfuscateEmail-Revo"
_old_id: "686"
_old_uri: "revo/obfuscateemail-revo"
---

<div class="note">**Javascript Free!**  
This plugin does not require, create, or utilize unnecessary Javascript, thereby reducing the overhead on the web browser client.</div>What it does
------------

This MODX Revolution Plugin operates transparently in the background diligently obfuscating all e-mail addresses it finds - whether they appear as links or as straight text in the given page. It can find all common email addresses as specified by RFC2822, including all unusual but allowed characters.

How it works
------------

It turns shawn@shawnwilkerson.com into:

```
<pre class="brush: php">
s&#x68;&#97;wn&#64;&#x73;&#x68;&#97;&#119;&#x6e;&#x77;&#105;&#x6c;&#107;&#x65;&#x72;&#115;&#111;&#110;.&#x63;&#111;&#x6d;

```Who it works for
----------------

All users on the project, links to outside e-mail addresses, same-site e-mail address, etc.   
It simply works on _all_ e-mail addresses.

Additional Functionality
------------------------

While the plug-in is operating transparently in the back ground, it is also performing another task. It is constantly randomizing the encoding of the e-mail address, as to make it appear it is always change, though they work flawlessly in e-mail applications and simply cut and paste operations.

Examples
--------

This adds an additional layer of protection.The following three are all the same e-mail address from the same page:

```
<pre class="brush: php">
&#115;&#104;&#97;&#119;&#110;&#64;&#x73;&#x68;&#x61;&#x77;&#x6e;&#119;&#105;&#x6c;&#107;&#x65;r&#x73;&#111;&#110;.&#99;&#x6f;&#x6d;

``````
<pre class="brush: php">
s&#x68;&#97;wn&#64;&#x73;&#x68;&#97;&#119;&#x6e;&#x77;&#105;&#x6c;&#107;&#x65;&#x72;&#115;&#111;&#110;.&#x63;&#111;&#x6d;

``````
<pre class="brush: php">
&#x73;&#x68;&#97;&#x77;&#x6e;&#x40;&#x73;&#104;&#97;&#119;&#x6e;&#119;&#x69;&#x6c;&#107;&#101;&#114;&#x73;&#x6f;&#x6e;&#x2e;c&#x6f;&#x6d;

```Package Manager Installation
----------------------------

Simply download and install from the Package Manager. If other OnWebPagePreRender events exist in the project, order of   
execution priority may be set in the respective Plug-ins - if necessary.

Code is also available via Github
---------------------------------

The original source code can be found by visiting <http://github.com/wshawn/ObfuscateEmail>

Manual Install
--------------

1. Create a new plugin
2. Paste in the code from <http://github.com/wshawn/ObfuscateEmail>
3. Click the OnWebPagePreRender option on the events tab (near bottom)
4. Save the Plugin

Protect your projects and your users
------------------------------------

With this plug-in, it is very easy to protect the inboxes of every e-mail address located within your pages.   
Protect your users and make your self look good in the process.

History
-------

This Plugin was originally released for MODX Evolution by Aloysius Lim: <http://modx.com/extras/package/obfuscateemail>. When I made the jump to MODX Revolution a few years ago, I brought this plugin along as it had served my clients well. With the Release of MODX Revolution 2.1 and its move away from legacy code, some updates had to be performed.   
I hope you find ObfuscateEmail-Revo as effective as I have over the years.