---
title: "Template Variables"
_old_id: "304"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables"
---

<div>- [What is a Template Variable?](#TemplateVariables-WhatisaTemplateVariable%3F)
- [Usage](#TemplateVariables-Usage)
  - [Advanced Usage](#TemplateVariables-AdvancedUsage)
- [See Also](#TemplateVariables-SeeAlso)
 
</div>What is a Template Variable?
----------------------------

 **A Template Variable (TV) is a custom field**, or more specifically, it is custom field for a MODX Resource. TVs are used to extend the default attributes available for a Resource (e.g. for a Page or WebLink). A normal MODX Resource has a certain number of default fields: pagetitle, content, description, etc. If you need to add some custom fields to your pages, e.g. a second content area or a dropdown list of month names, or any other bit of custom data, you do this by adding a Template Variable to your template. MODX allows you to have a virtually unlimited number of TVs.

<div class="note"> **Why is it called a Template Variable**   
 Other content management systems call these simply "Custom Fields", so why does MODX call these "Template Variables"? Well, any time you have customized content, you will also have customized templates. Your MODX templates already have placeholders for **content** or **longtitle** because those are the built-in fields for a standard MODX "page"; the information and the template used to display that information go hand in hand. If you have a manager form with a field for entering a special date, then it stands to reason that your HTML template that you use to display that page would also have a bit dedicated to displaying that date. Likewise, you wouldn't build HTML templates with divs and tables for formatting bits of data unless the manager offered some way to edit that data. So the content is inexorably tied to the template, thus the name **Template Variable**. </div> When a [Resource](revolution/2.x/making-sites-with-modx/structuring-your-site/resources "Resources") is displayed on the web, TV tags are replaced with the actual value entered by the user. TVs are [Template](revolution/2.x/making-sites-with-modx/structuring-your-site/templates "Templates")-specific, meaning they can only be used in [Templates](revolution/2.x/making-sites-with-modx/structuring-your-site/templates "Templates") that they are assigned to.

 Template Variable Output Filters make it easier for users to add special visual effects to their web sites. With just a few clicks you can add an Image, URL or custom render to your website.

Usage
-----

 Let's say we have a TV named 'bio', that is a textarea TV that we've created. We've assigned it to our 'Biography Pages' Template, and want to show it on our page. To do so, we'd simply place this tag into our templates:

 ```
<pre class="brush: php">
[[*bio]]

```<div class="info"> To add a TV to a page, you have to think back to its template (these are _Template_ variables, remember?). Make sure you've defined the TV and attached it to the template that you're using. See the page on [Creating a Template Variable](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/creating-a-template-variable "Creating a Template Variable"). </div>### Advanced Usage

 TVs can also have Properties. Say you had a TV called 'intromsg' with the value:

> Hello \[\[+name\]\], you have \[\[+messageCount\]\] messages.

 You could fill the data with the call:

 ```
<pre class="brush: php">
[[*intromsg?name=`George` &messageCount=`123`]]

``` Which would output:

> Hello George, you have 123 messages.

 [Output Filters](revolution/2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") are also great tools to be applied to TVs. Say you wanted to limit a TV's output to 100 chars. You'd simply use the 'limit' output filter:

 ```
<pre class="brush: php">
[[*bioMessage:limit=`100`]]

```See Also
--------

1. [Creating a Template Variable](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/creating-a-template-variable)
2. [Bindings](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings)
  1. [CHUNK Binding](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings/chunk-binding)
  2. [DIRECTORY Binding](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings/directory-binding)
  3. [EVAL Binding](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding)
  4. [FILE Binding](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings/file-binding)
  5. [INHERIT Binding](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings/inherit-binding)
  6. [RESOURCE Binding](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings/resource-binding)
  7. [SELECT Binding](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/bindings/select-binding)
3. [Template Variable Input Types](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-input-types)
4. [Template Variable Output Types](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types)
  1. [Date TV Output Type](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/date-tv-output-type)
  2. [Delimiter TV Output Type](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/delimiter-tv-output-type)
  3. [HTML Tag TV Output Type](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/html-tag-tv-output-type)
  4. [Image TV Output Type](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/image-tv-output-type)
  5. [URL TV Output Type](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/url-tv-output-type)
5. [Adding a Custom TV Type - MODX 2.2](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2)
6. [Adding a Custom TV Input Type](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-input-type)
7. [Adding a Custom TV Output Type](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-output-type)
8. [Creating a multi-select box for related pages in your template](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/creating-a-multi-select-box-for-related-pages-in-your-template)
9. [Accessing Template Variable Values via the API](revolution/2.x/making-sites-with-modx/customizing-content/template-variables/accessing-template-variable-values-via-the-api)