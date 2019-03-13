---
title: "Static Elements"
_old_id: "1753"
_old_uri: "2.x/developing-in-modx/basic-development/static-elements"
---

Since MODX Revolution 2.2 you can create Static Elements to make managing your elements easier. This feature is available for all elements, including Templates, Chunks, Snippets and Plugins.

A static element is an element which gets its content from a file. When edited via the manager, the file will get updated. Similarly, when you edit the file via an IDE, it will get updated in MODX the next time the element is requested.

To create an element as a static element, simply check the _Is Static_ checkbox, select the Media Source, and add the path to the file relative to that media source to the _Static File_ input. You can also click the icon in the _Static File_ input to open the MODX Browser to select the file, rather than entering it manually.

![](/download/attachments/050decc19b4e3f704a1486c182d34271/static-template.png)

This process is the same for all types of elements.

Please be aware that MODX still stores the contents in the database as well, in order for the element to be processed normally. MODX only checks the contents of the file when the element is requested uncached, so be sure to clear the cache while developing. For this reason you might find static elements to be most useful when working on uncached snippets or plugins, and slightly less useful on templates and chunks. 

To improve the editing experience with static elements, there are several Extras available that can help automatically create the elements in the MODX database, or that automatically clear the cache for you.