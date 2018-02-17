---
title: "Templates"
_old_id: "305"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/templates"
---

## What are Templates?

Templates typically contain the HTML markup tags that determine the layout and appearance of your site. When a document is requested, MODx loads the document and its template, and MODx finds all the special placeholders in the template and replaces them with the corresponding values from the document before sending the finished page off to the user's browser.

Think of a Template like a house. Your [Resource's](making-sites-with-modx/structuring-your-site/resources "Resources") content, then, is a person. A person can have many different houses, but only live in one house at a time.

![](/download/attachments/18678060/template-info1.jpg?version=1&modificationDate=1280149156000)

[Resources](making-sites-with-modx/structuring-your-site/resources "Resources") can only use one Template at a time, however, a Resource can switch Templates at any time, just as a person can move from house to house at any time. The Template, just like a house, also changes the main way a page is displayed. A Template usually contains the header and footer of a page - and/or a sidebar, navigation bar, etc.

## Usage

To create a Template -- Expand the "Elements" part of the tree and right click on Templates. Select "Create a New Template" then paste your HTML into the "Template Code" textarea; you can copy and paste the text below to get started with a very simple template:

```
<pre class="brush: php">
<html>
<head>
    <title>[[*pagetitle]]</title>
    <meta name="description" content="[[*description]]"/>
</head>
<body>
<h1>[[*longtitle]]</h1>

Page ID: [[*id]]<br/>
IntroText (Summary): [[*introtext]]<br/>
MenuTitle: [[*menutitle]]

<hr/>

[[*content]]

</body>
</html>

```Note the important \[\[\*content\]\] tag; this tag tells MODx where to put the Resource's content.

MODX defaults to storing templates in its database, if you are using a version prior to 2.2.x this is your only option. In MODX 2.2.x and newer you have the option of storing templates as static files using Media Sources.

Remember that simply _creating_ a template doesn't mean that it is automatically put to use: you have to edit each [Resources](making-sites-with-modx/structuring-your-site/resources "Resources") and specify which Template it uses. This is different from some content management systems where each template has one or many pages. Each MODx page has a single Template that it uses to format output.

After you've created one or more Templates, you can edit any Resource and choose a Template for it by selecting one from the "Uses Template" drop-down list.

Templates can contain any tags, including [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables"), [Chunks](making-sites-with-modx/structuring-your-site/chunks "Chunks"), [Snippets](developing-in-modx/basic-development/snippets "Snippets"), and others.

### Using Resource Fields in the Template

As you noticed from our Template sample code above, the fields of a Resource can be referenced using the \[\[\*fieldName\]\] syntax. A list of available Resource Fields can be [found here](making-sites-with-modx/structuring-your-site/resources#Resources-ResourceFields). For example, if we wanted to show the current Resource's pagetitle in our <title> tag, we would simply do this:

```
<pre class="brush: php">
<title>[[*pagetitle]]</title>

```You can also place the content of the current Resource using the "content" tag:

```
<pre class="brush: php">
<body>
[[*content]]
</body>

```These tags are like normal MODx tags, in that they can have [output filters](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") applied to them. For example, say we wanted to display the "introtext" field on a right navbar, but strip any HTML tags from it, and only display the first 400 characters - and if longer, add an ellipsis (...):

```
<pre class="brush: php">
<div id="rightbar">
[[*introtext:stripTags:ellipsis=`400`]]
</div>

```### Template Variables in Templates

If Templates are like a house, think of [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables") (TVs) like rooms in that house. You can have an infinite number of TVs in a Template; just think of it like adding new rooms to the house.

Template Variables allow you to have custom fields for any Resource with the specified Template. Say you want a 'photo' field on your Resources in your "BiographyPages" Template. Simple - just create a TV, call it "bioPhoto", give it an input and output type of "image", and assign it to your "BiographyPages" Template. You'll then see the TV in any Resource that's using that Template.

You can then reference your "bioPhoto" TV in your content with the same tag syntax as a Resource Field:

```
<pre class="brush: php">
<div class="photo">
[[*bioPhoto]]
</div>

```Again, it's important to note that [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables") must be explicitly assigned to the Template to be used. Once assigned to the Template, a TV's value for that Resource will be able to be edited when editing the Resource. If you're not seeing a newly created TV in your Resources, make sure you've assigned that TV to the Template.

## See Also

- [Tag Syntax](making-sites-with-modx/tag-syntax "Tag Syntax")
- [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables")