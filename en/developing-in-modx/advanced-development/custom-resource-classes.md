---
title: "Custom Resource Classes"
_old_id: "79"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-resource-classes"
---

Custom Resource Classes are available in MODX 2.2 and later only. 

- [What is a Custom Resource Class?](#CustomResourceClasses-WhatisaCustomResourceClass%3F)
  - [When to Use](#CustomResourceClasses-WhentoUse)
  - [When Not to Use](#CustomResourceClasses-WhenNottoUse)
- [Usage](#CustomResourceClasses-Usage)
- [Creating a CRC](#CustomResourceClasses-CreatingaCRC)



## What is a Custom Resource Class? 

A Custom Resource Class (CRC) is a PHP class that extends the modResource class, allowing custom Resource types that can represent various types of data or applications. The MODX core uses four different types of Resource Classes: Documents, WebLinks, SymLinks, and Static Resources. Other types of CRCs could be a Blog type, a Forum type, a Gallery Album type, a RSS Feed type, etc – basically any type of content for which you want a URL (remember the "R" in URL stands for _Resource_).

CRCs are created by extending the modResource class in PHP and loading the new class into the MODX system via Extension Packages. They store their data in the same table as normal Resources (in modx\_site\_content, but they will use a custom value for the class\_key column), but they can behave differently and have a custom management interface.

### When to Use 

CRCs are useful for creating "embedded applications" into MODX, such as a Blog Post type (such as [modBlog](/extras/revo/articles "Articles")) that lets you place a blog into your already existing MODX site. You can use them when you've got a fair amount of developer experience and you're comfortable with object-oriented code and you understand how your application can fit into the MODX content table along with other resources.

### When Not to Use 

CRCs are not recommended to use when you are just wanting to add a few extra fields to a Resource, or alter the presentation of a Resource on the front-end. Those situations are best dealt with by using [Templates](making-sites-with-modx/structuring-your-site/templates "Templates") and [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables"). Do not use CRCs if you are not a strong developer or if your additions do not need to be manipulated and displayed via the built-in MODX Resource listings.

Also remember that CRCs cannot be overridden themselves: you cannot extend a CRC.

**"Rule of Thumb"**
If it can be done more easily using [Snippets](developing-in-modx/basic-development/snippets "Snippets") or [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables"), then it's probably best to do it that way: CRCs are much more difficult to develop. 

## Usage 

CRCs look like normal Resources in the tree. The CRC class can also hook into the context menus on the Resource tree to add options for creating a CRC type, such as "Create a Blog Here", etc. They can use the default Resource editing panels, or can provide an entirely separate user interface for managing their content. Some CRCs might even have other sub-classes (such as modBlogPost when using the modBlog CRC) that are completely hidden from the main Resource tree. This is useful when dealing with lots of Resources that do not scale well in a tree UI.

CRCs can have their Controllers, Processors and main rendering functionality extended and overridden. You can, for example, automatically append text to the output of any CRC's content by overriding the process() or getContent() method of the CRC in the PHP class. Any method in the modResource class is available to be overridden when using CRCs.

## Creating a CRC 

Please follow the tutorial on [Creating a Resource Class](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class "Creating a Resource Class").