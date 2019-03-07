---
title: "Resources"
_old_id: "264"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources"
---

- [What is a Resource?](#what-is-a-resource)
  - [Managing Resources](#managing-resources)
- [Resource Fields](#resource-fields)
  - [General Resource Fields](#general-resource-fields)
  - [Settings Resource Fields](#settings-resource-fields)
  - [Using Resource Fields](#using-resource-fields)
 


## What is a Resource?

 A resource is a representation of a page in MODx. There are different types of Resources, such as documents, weblinks, symlinks, actual files, or many other things. The default Resource type is a Document, and simply represents a webpage on your site.

 There are 4 total types of Resources, and they are Documents, [Weblinks](making-sites-with-modx/structuring-your-site/resources/weblink "Weblink"), [Symlinks](making-sites-with-modx/structuring-your-site/resources/symlink "Symlink"), and [Static Resources](making-sites-with-modx/structuring-your-site/resources/static-resource "Static Resource").

 Each Resource also has a unique ID, or "Resource Identifier". This lets MODx know what Resource to fetch when you are loading a webpage. Also, when you're wanting to link between Resources, you should always use the ID to do so. That way MODx will generate the link and you will not have to worry about changed aliases, content types or anything - MODx will change your links also. Please see the Linking to Resources section below for more information on how to do this.

### Managing Resources

 Resources are shown in the Resources tree in the left-hand navigation of the manager. To edit one, simply click on the page you would like to edit. You can alternatively right-click the Resource and click 'Edit Resource'. This will load the Resource Edit page:

 [![](/download/attachments/bf9f8ccf5036b4f4bf8b248f7748d0c3/resource-edit1_v2.3.png)](/download/attachments/bf9f8ccf5036b4f4bf8b248f7748d0c3/resource-edit1_v2.3.png)

 The content of the Resource can then be edited in the large content field in the bottom area. Other fields related to each Resource can also be edited via the tabs on the top of the page.

## Resource Fields

 Resources come packaged with a list of predetermined fields by default. They are:

### General Resource Fields

 | Name             | Description                                                                                                                                                       |
 | ---------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- |
 | id               | The ID of the Resource.                                                                                                                                           |
 | template         | A reference to the [Template](making-sites-with-modx/structuring-your-site/templates "Templates") that this Resource is using                                     |
 | published        | If the Resource is Published, or viewable on the front-end.                                                                                                       |
 | pagetitle        | The title of the Resource.                                                                                                                                        |
 | longtitle        | A longer title of the Resource.                                                                                                                                   |
 | description      | An extended description of the Resource.                                                                                                                          |
 | introtext        | Also called 'Summary', an introductory excerpt of the Resource's content. Useful for blogs or searching.                                                          |
 | alias            | The URL alias to use, if your site is using Friendly URLs. A Resource with alias 'home' and Content Type 'html' would render 'home.html' if it isn't a Container. |
 | parent           | The Parent Resource's ID.                                                                                                                                         |
 | link\_attributes | Used with menu building snippets to add attributes to links, etc. Can be repurposed for other needs.                                                              |
 | menutitle        | The title to show for the Resource when displayed in a menu.                                                                                                      |
 | menuindex        | The order index of the Resource in a menu. Higher order means later.                                                                                              |
 | hidemenu         | Also called 'Hide from Menus', if set, this Resource will not show in most Menu or Navigation snippets.                                                           |
 | content          | The actual content of the Resource.                                                                                                                               |

### Settings Resource Fields

 | Name        | Description                                                                                                                 |
 | ----------- | --------------------------------------------------------------------------------------------------------------------------- |
 | isfolder    | Labeled as 'Container', this specifies whether or not the Resource renders with a / in Friendly URLs instead of its suffix. |
 | searchable  | If the Resource is searchable.                                                                                              |
 | cacheable   | If the Resource is cacheable.                                                                                               |
 | createdby   | The ID of the user who created the Resource.                                                                                |
 | editedby    | The ID of the last user to edit the Resource.                                                                               |
 | deleted     | If the Resource is deleted or not.                                                                                          |
 | deletedby   | The ID of the user who deleted the Resource.                                                                                |
 | publishedby | The ID of the user who last published the Resource.                                                                         |
 | createdon   | The date the Resource was created.                                                                                          |
 | publishedon | The date the Resource was published.                                                                                        |
 | editedon    | The date the Resource was last edited.                                                                                      |
 | pub\_date   | The scheduled date for a Resource to be published.                                                                          |
 | unpub\_date | The scheduled date for a Resource to be unpublished.                                                                        |

### Using Resource Fields

 Resource fields can be accessed from anywhere by using the [Template Variable](making-sites-with-modx/customizing-content/template-variables "Template Variables") syntax, ie:

 ``` php 
[[*pagetitle]] // renders the pagetitle.
[[*id]] // renders the Resource's ID
[[*createdby]] // renders the ID of the user who created this Resource

```

 They can also have [Output Filters](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") applied to them:

 ``` php 
// Renders a limited version of the introtext field.
// If it is longer than 100 chars, adds an ...
[[*introtext:ellipsis=`100`]]
// Grabs the user who last edited the Resource's username
[[*editedby:userinfo=`username`]]
// Grabs the user who published the Resource's email
[[*publishedby:userinfo=`email`]]

```

### Accessing Resource Fields in a Snippet

 Grabbing the Resource Fields in a [Snippet](developing-in-modx/basic-development/snippets "Snippets") is quite easy; MODx provides you with the Resource object in any Snippet, via the $modx->resource reference. For example, this example Snippet will return the current page's pagetitle reversed:

 ``` php 
/* output the current Resource's pagetitle */
$output = $modx->resource->get('pagetitle');
return strrev($output);

```

## Linking to a Resource

 In MODx, links to Resources are dynamically managed via "Link Tags". They look like this:

 ``` html 
[[~123]]

```

 where '123' is the ID of the Resource to link to. You can put these tags anywhere, and MODx will dynamically render the URL for the Resource.

 You can also get the Link Tag by dragging a Resource from the left tree into the content panel. 

 Also see [Named Anchor](making-sites-with-modx/structuring-your-site/resources/named-anchor "Named Anchor").

### URL Parameters for Link Tags

 Adding URL parameters in your Link Tag is quite simple in Revolution. Let's say we have Resource ID 42 that resolves to a URL of 'store/items.html'. We want to add a 'tag' parameter to the URL, with a value of 'Snacks' and a 'sort' parameter of 'Taste'. Here's how you'd do it:

 ``` html 
[[~42? &tag=`Snacks` &sort=`Taste`]]

```

 This would render as:

 ``` html 
	store/items.html?tag=Snacks&sort=Taste

```

 Note that those are **backticks** instead of apostrophes.

### URL Schemes in Link Tags

 You can specify the scheme for a Resource in your tag:

 ``` html 
[[~123? &scheme=`https`]]

```

 Would render the URL using 'https' instead of the scheme indicated by the current settings (i.e. system or context settings).

 The available schemes are:

 | Name  | Description                                                   |
 | ----- | ------------------------------------------------------------- |
 | -1    | (default) URL is relative to site\_url                        |
 | 0     | see http                                                      |
 | 1     | see https                                                     |
 | full  | Renders the link as an absolute URL, prepended with site\_url |
 | abs   | Renders the link as an absolute URL, prepended with base\_url |
 | http  | Renders the link as an absolute URL, forced to http scheme    |
 | https | Renders the link as an absolute URL, force to https scheme    |

## See Also

1. [Content Types](making-sites-with-modx/structuring-your-site/resources/content-types)
2. [Named Anchor](making-sites-with-modx/structuring-your-site/resources/named-anchor)
3. [Static Resource](making-sites-with-modx/structuring-your-site/resources/static-resource)
4. [Symlink](making-sites-with-modx/structuring-your-site/resources/symlink)
  1. [Using Resource Symlinks](making-sites-with-modx/structuring-your-site/resources/symlink/using-resource-symlinks)
5. [Weblink](making-sites-with-modx/structuring-your-site/resources/weblink)