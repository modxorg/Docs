---
title: "Creating a CMP for output to the admin panel"
translation: "extras/migx/migx.tutorials/creating-cmp"
---

In the last article I explained how you can create your component using MIGX. Now I will show how you can create and edit data in the admin panel.

Who does not know what it is about, link to [first article](extras/migx/migx.tutorials/creating-tables-through-migx).

In fact, creating your own page is essentially no different from creating the usual MIGX TV.

Go to the tab MIGX:

![](creating-cmp-1.png)

Fill:

**Name**: electrica
**Add item replacement**: Create string
**unique MIGX ID**: electrica

Then open the CMP-Settings tab and fill in:

![](creating-cmp-2.png)

Then go to the tab **MIGXdb-Settings** and fill **package** (package name with XML markup) and **Classname**:

![](creating-cmp-3.png)

Push **Save**.

Then go to settings - Menu. Create found menu:

![](creating-cmp-4.png)

In the parameters we write your customization of your component, as you called it.

Well, that's all, we can now open it:

![](creating-cmp-5.png)

We continue to display all our fields.

Editing our MIGX configuration, adding a contextmenus:

![](creating-cmp-6.png)

In the tab **Columns** fill in our fields:

**IMPORTANT!!!** In the columns you need to create the id field, otherwise you will not be able to edit the data

![](creating-cmp-7.png)

In the Formtabs tab, fill in our fields:

![](creating-cmp-8.png)

That's all!

![](creating-cmp-9.png)

Well, the output on the front has already been described in [previous article](extras/migx/migx.tutorials/creating-tables-through-migx). Create a snippet and make the selection or sampling we need.

Well, or you can use **snippet**:

``` php
[[!migxLoopCollection?
    &packageName=`electrica`
    &classname=`electricaItem`
    &tpl=`testTPL`
]]
```

**Chunk**:

``` php
<h1>[[+title]]</h1>
<p>[[+description]]</p>
```

And that's what we got:

![](creating-cmp-10.png)
