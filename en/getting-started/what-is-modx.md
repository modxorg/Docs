---
title: "An Overview of MODX"
sortorder: "1"
_old_id: "22"
_old_uri: "2.x/getting-started/an-overview-of-modx/"
---

## What is MODX?

MODX is a Content Application Platform. What does this mean? Well, that depends on who you are:

![](avgjoe.png)

### End-Users (Average Joe)

MODX offers you a system that lets you publish your offline content onto the web in any form, shape or presence you want. It also offers a completely customizable backend interface that you can make as simple (or as complex) as you like.

You can setup everything from a simple site, to a blog, to a full-scale web presence with MODX, and keep your admin interface simple and usable. Drag and drop your webpages around to reorder and move them. Get a full WYSIWYG view of your Resources. Leave Resources unpublished before you finish them. Schedule Resources to publish at certain times.

MODX helps you organize your content the way you want it, and get stellar built-in SEO results. MODX is fully, 100% Friendly URL compatible, so getting mysite.com/my/own/custom/url.html is incredibly simple, and as easy as structuring your site that way.

![](coolcarl.png)

### Designers (Cool Carl)

Ever wanted complete freedom with your HTML and CSS? Tired of hacking existing systems to get your design to work the way you comp'ed it? MODX does not generate one single line of HTML - it leaves the front-end design up to you.

You can use MODX as your Content Management System (CMS) of choice, as MODX offers completely flexible templating and no-holds-barred content delivery. Put your CSS and images where you want them. And once you're done designing, either hand off the development duties to your developer, or point-and-click install Extras straight from within the manager. Simple.

![](badassbilly.png)

### Developers (Badass Billy)

You've looked at different CMSes, but have found developing in them to be either a mishmash of too many unconnected code pieces, or simply not powerful or elegant enough. You've looked at PHP frameworks, and have found they have the power, but don't do Content Management nor have a good enough UI for your clients. You want the power and flexibility of a framework, with the UI and content management of a CMS.

Enter MODX Revolution. A completely flexible, powerful and robust API, built on OOP principles and using a PDO-powered Object Relational Model (ORM) called [xPDO](extending-modx/xpdo). Add in a rich, [Sencha](http://sencha.com)-powered UI for your clients, that's fully customizable. Custom properties and sets. Internationalization support. Package distribution built-in so you can pack up your code, and distribute it across any Revolution install. Add custom manager pages to run entire applications within MODX.

## Basic Concepts

MODX, in essence, has a ton of moving parts. But the basics parts are:

### Resources

[Resources](building-sites/resources "Resources") are basically a webpage location. It can be actual HTML content, or a file, forwarding link, or a symlink, or anything else.

### Templates

[Templates](building-sites/elements/templates "Templates") are the house a Resource lives in. They usually contain the footer and header for a page.

### Template Variables

[Template Variables](building-sites/elements/template-variables "Template Variables") (TVs) are custom fields for a Template that allow the user to assign dynamic values to a Resource. A great example would be a 'tags' TV that allows you to specify tags for a Resource. You can have an unlimited number of TVs per page.

### Chunks

[Chunks](building-sites/elements/chunks "Chunks") are simply small blocks of content, be it whatever you want inside it. They can contain [Snippets](extending-modx/snippets "Snippets"), or any other Element type (Snippet, Chunk, TV, etc).

### Snippets

[Snippets](extending-modx/snippets "Snippets") are dynamic bits of PHP code that run when the page is loaded. They can do anything you can code, including building custom menus, grabbing custom data, tagging elements, processing forms, grabbing tweets, etc.

### Plugins

Plugins are event hooks that run whenever an event is fired. They are usually used for extending the Revolution core to do something during a part of the loading process - such as stripping out bad words in content, adding dictionary links to words, managing redirects for old pages, etc.

### System Settings

System Settings give you near infinite configuration options. Most of these are set the best way they should be, but some things (such as [friendly urls](getting-started/friendly-urls "Using Friendly URLs")) are disabled by default or could be improved for your specific needs just by changing a setting value. After installation, head over to System > System Settings in the Manager and browse through the available options. Definitely check out the "Site" area (use the dropdown that says "Filter on area..."), there are some interesting things there for you.

## So What Happens on a Request?

MODX loads the requested [Resource](building-sites/resources "Resources"), fetches that Resource's [Template](building-sites/elements/templates "Templates"), and then places the Resource's content in that Template. MODX then parses the resulting combined content, including any tags that might be in it, in the order they are reached. From there, it outputs the response to the user's browser.

## See Also

1. [Glossary of Revolution Terms](getting-started/an-overview-of-modx/glossary-of-revolution-terms)
    1. [Explanation of Directory Structure](getting-started/an-overview-of-modx/glossary-of-revolution-terms/explanation-of-directory-structure)
2. [Roadmap](getting-started/an-overview-of-modx/roadmap)
3. [MODX Revolution Framework Structure Ideology](getting-started/an-overview-of-modx/modx-revolution-framework-structure-ideology)
