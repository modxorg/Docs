---
title: "Templates"
sortorder: "1"
_old_id: "305"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/templates"
---

## What are Templates?

A Template holds the HTML that sets the page layout. When a Resource is requested, MODX loads that Resource and its Template, replaces the tags in the Template with values from the Resource, and sends the page to the browser.

![](template-info1.jpg)

A [Resource](building-sites/resources "Resources") uses one Template at a time. You can switch that Template later. The Template usually holds the header, footer, sidebar, or navigation.

## Usage

To create a Template, expand **Elements** in the tree, right-click Templates, and choose **Create Template**. Paste your HTML into **Template Code (HTML)**. You can start from the markup below:

``` html
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
```

`[[*content]]` is where MODX puts the Resource content.

MODX stores Templates in the database. A Template can also be a static file on a Media Source.

Creating a Template does not assign it. Edit each [Resource](building-sites/resources "Resources") and choose the Template it uses. Each Resource has one Template.

After you've created one or more Templates, you can edit any Resource and choose a Template for it by selecting one from the "Uses Template" drop-down list.

Templates can contain any tags, including [Template Variables](building-sites/elements/template-variables "Template Variables"), [Chunks](building-sites/elements/chunks "Chunks"), [Snippets](extending-modx/snippets "Snippets"), and others.

### Manager Icon Class

When you create or edit a Template, **Manager Icon Class** sets a CSS class on Resources that use that Template. Classes such as `icon-home` and `fa-home` exist in the Manager stylesheet.

If you fill the field in, both that class and the Content Type icon class stay on the tree node. Which icon you see depends on the stylesheet. An empty field keeps the Content Type icon, or the default resource icon. A folder with no template icon also gets the folder icon.

### Using Resource Fields in the Template

Resource fields use `[[*fieldName]]`. The list of fields is [on the Resource page](building-sites/resources#Resources-ResourceFields). The current Resource's `pagetitle` in the title:

``` html
<title>[[*pagetitle]]</title>
```

The current Resource's content:

``` html
<body>
[[*content]]
</body>
```

These tags can take [output filters](building-sites/tag-syntax/output-filters). For example, strip HTML from `introtext` and cut at the nearest space on character 400 or later. The end of the cut is an ellipsis character, not three dots. If there is no space at or after 400, the text stays whole:

``` html
<div id="rightbar">
[[*introtext:stripTags:ellipsis=`400`]]
</div>
```

### Template Variables in Templates

You can add TVs to a Template. On save, MODX does not check how many TVs that Template already has.

A [Template Variable](building-sites/elements/template-variables "Template Variables") (TV) is a custom field on Resources that use a given Template. Create a TV named `bioPhoto`, set its input and output type to image, and assign it to the BiographyPages Template. The field then shows on every Resource that uses that Template.

Use the same tag as a Resource field:

``` html
<div class="photo">
[[*bioPhoto]]
</div>
```

Assign the TV to the Template before you use it. After that, edit the TV value on the Resource. If a new TV is missing from the Resource form, check that assignment.

## See Also

- [Tag Syntax](building-sites/tag-syntax "Tag Syntax")
- [Template Variables](building-sites/elements/template-variables "Template Variables")
