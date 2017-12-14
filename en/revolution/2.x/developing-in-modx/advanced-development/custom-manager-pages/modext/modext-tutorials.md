---
title: "MODExt Tutorials"
_old_id: "1339"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials"
---

Introduction
------------

Because MODExt extends an existing framework (Ext JS), its documentation has suffered because the authors of the parent framework have nothing to do with MODX, so there aren't specific examples of how to use this framework _inside_ of MODX. The tutorials included here aim to introduce MODExt (and therefore Ext JS) and to show how it can be used both inside the MODX manager and on the front end of your sites. It is assumed that you have enough familiarity with Javascript to follow along with the examples here, and it is hoped that following along will boost your confidence enough to start doing some serious work with Ext JS inside the MODX manager or inside your own custom components.

What is Ext JS?
---------------

Most people have some knowledge of Javascript, and jQuery has become the king of the libraries. But know this: jQuery has its roots in developing effects and transitions for forward-facing web pages. It may not affect _what_ you can do so much as _how_ it looks. Ext JS has its roots in building _applications_. Think the MODX manager: it's a complex set of behaviors and interrelated windows that form a unified whole. jQuery was not built for stuff like that, but that's exactly where Ext JS shines. Ext JS can save developers a _lot_ of time when it comes to constructing applications like this.

In order to help you understand MODExt and Ext JS, I invite you to think about web pages a bit differently. When you build pages with Ext JS, you sort of abandon the traditional HTML approach. It can be bewildering because you no longer need to create your pages with HTML – you can end up creating an entire page (or an entire application), just by loading up some special Javascript. That thought might be a bit unsettling for any of you who are used to the "old-fashioned" way of building a web page by hand. Think of it this way: Javascript allows you to manipulate the DOM, so when you use a powerful tool like Ext JS, your browser becomes a canvas, and a few lines of Javascript can paint it any which way. The HTML in your page may become completely secondary to what's going on in the Javascript. Just keep that in mind as we go through some of the examples here.

See Also
--------

A fantastic reference for Ext JS is Jesus Garcia's [Ext JS in Action](http://www.amazon.com/Ext-JS-Action-Jesus-Garcia/dp/1935182110/ref=sr_1_1?ie=UTF8&qid=1370295075&sr=8-1&keywords=Ext+JS+in+Action).

![](/download/attachments/46137364/ext_js_cover.jpg?version=1&modificationDate=1370295179000)

Never mind the weird cover of a 19th-century breakdancing Frankenstein – this is a good reference. It's good for MODX in particular because it covers Ext JS version 3. It was updated in 2011.

1. [1. Ext JS Tutorial - Message Boxes](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
2. [2. Ext JS Tutorial - Ajax Include](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
3. [3. Ext JS Tutorial - Animation](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
4. [4. Ext JS Tutorial - Manipulating Nodes](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
5. [5. Ext JS Tutorial - Panels](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
6. [7. Ext JS Tutoral - Advanced Grid](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
7. [8. Ext JS Tutorial - Inside a CMP](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)