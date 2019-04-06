---
title: "Getting Started"
_old_id: "826"
_old_uri: "revo/discuss/discuss.getting-started"
---

After the installation of Discuss, you will likely want to throw your own style in it right away. Now, before you get going, grab yourself a coffee, you've got some learning to do.

Ready? Okay. Discuss is big. No really, it is. Even though you may not expect it, forums are complicated! This getting started guide will help you make sense of the various moving parts and how to make Discuss your b.. er how to make it your own. Here's what we'll discuss:

## Discuss Controller(s)

If you installed Discuss with the demo data, you will see that we use one resource with a blank template and possibly the simplest yet most powerful snippet call in the world:

``` php 
[[!Discuss]]
```

This resource is essentially what routes every request to your forum (including print pages, xml feeds etc) to Discuss, which does all kinds of magic with it. This saves having to set up individual resources and templates for every different view (controller), and makes it easier to maintain.

What Discuss does internally is basically look at the url for the request, which might be something like this:

> <http://forums.modx.com/thread/32480/discuss-native-threaded-forum-for-modx-revolution>

.. and Discuss than takes it apart to find out what you're really looking for. In this specific case, it will find that we're looking for a thread which has an ID of 32480 and it adds the alias for search friendly URLs. So it will basically hand over processing of the current page to the "thread" controller, which looks at the ID and more and does the hard lifting of showing that page. This routing process happens on every request, and it will point to any of the over 30 different controllers.

Each controller needs a template too. Most controllers are wrapped by the "wrapper.tpl" template (exceptions are the xml controllers), which is then filled with the controller-specific template. These are also file based, and by default, these are named exactly the same as the controller (for example, the thread/unread controller has a template named thread/unread in the core/components/discuss/themes/<theme\_name>/pages/ directory). That said, it is possible to use a different template file through the Manifest (more on that really soon), so it may not always be the same depending on the theme.

## The Discuss Manifest

In an effort to make an easy to maintain, theme-specific and super flexible theming solution, Discuss themes need a manifest. This manifest contains information on controller-specific javascript and css to load, but it also lets you change a number of controller-specific options and it even features a chunk-like approach for common markup (like sidebars) we reference to as modules.

The Manifest is a single file which is attached to a theme and is located in the main directory of a theme, for example the manifest for the default theme is at [core/components/discuss/themes/default/manifest.php](https://github.com/modxcms/Discuss/blob/develop/core/components/discuss/themes/default/manifest.php). It is indeed a PHP file but if you don't know PHP, _don't run away yet_! It's really easy to understand what is going on and we'll guide you through how to do it later on and we will also provide a full spec of the options you can use.

In a nutshell, the manifest allows you to define:

1. The global CSS and JS to load. You don't have to define this in the manifest (could just do it in the wrapper.tpl itself), but any file you add here will be injected into the output on most pages (xml pages are the exception again).
2. CSS and JS to load on specific controllers only, such as the print controller, home, thread/reply etc.
3. Options to apply to specific [controllers](/extras/discuss/discuss.controllers "Discuss.Controllers").
4. Modules (we'll cover these later).

While the manifest brings you lot of opportunity, as a best practice it should be advisable to limit the amount of dynamically assigned CSS and JS files either globally or for specific controllers.

The general structure of the manifest is a big multi-dimensional PHP array. Whoah, lot of big words there. It's basically a three level deep collection of keys and values, written in PHP. Here's a somewhat simplified excerpt:

``` php 
$manifest = array(
    'global' => array(
        'css' => array(
            'header' => array(
                'index.css',
                'forums-styles.css',
                'jquery-ui-1.8.16.custom.css',
            ),
        ),
        'js' => array(
            'header' => array(
                'jquery-1.6.2.min.js',
                'jquery-ui-1.8.16.custom.min.js',
                'forums.js',
            ),
        ),
    ),
    'print' => array(
        'css' => array(
            'header' => array(
                'print.css',
            ),
        ),
    ),
    'home' => array(
        'js' => array(
            'header' => array(
                'forums.home.js',
            ),
        ),
        'options' => array(
            'showBoards' => true,
            'showBreadcrumbs' => true,
            'showRecentPosts' => false,
            'showStatistics' => true,
            'showLoginForm' => false,
            'bypassUnreadCheck' => true,
            'checkUnread' => true,
            'showLogoutActionButton' => false,
            'hideIndexBreadcrumbs' => true,
            'subBoardSeparator' => '',
        ),
    ),

);
return $manifest;
```

We'll see we are defining a variable $manifest as an array, with a first element called "global" which in turn defines an array. In this second level, we have two items: css and js. They both define the third level of the array which in this case defines files (relative from the assets/components/discuss/themes/theme\_name/css or js/ directory) that should be loaded in the header of the page on every controller. In the case of js, we can also tell it to register it in the footer by replacing "header" with "footer" or adding that as another item in the array, and we can even define "inline" for js which wraps whatever you put there in a <script> tag in the header of the page. This can be useful for when your theme needs certain configuration options from settings or Discuss.

Below the global definition, we will see a print and a home controller in which we can also define css or js in the same way as with the global, but you will also find the "options" array in the home controller's bit. This contains a bunch of options that either have a true or false value, or a string value such as the subBoardSeparator option shown in the excerpt above. These are the options you will want to change to adjust behaviour of the controller. So when you're looking at the [controllers documentation](/extras/discuss/discuss.controllers "Discuss.Controllers"), keep that in mind.

## Themes

Theming in MODX revolves around the core/components/discuss/themes/theme\_name/ directory and a matching assets/components/discuss/themes/theme\_name/ directory for files that need to be directly accessible (js, css and images). The core theme directory contains a "chunks" and "pages" directory by default. These files contain the html, into which content will be injected with placeholders. If you have developed a site using Wayfinder or getResources before, this concept shouldn't be entirely new for you. To choose a theme, change the **discuss.theme** setting to the name of the directory you want to use. If it doesn't exist, it will default to "default".

The files in the "pages" directory all end in .tpl, and mostly correspond directly with the name of a [controller](/extras/discuss/discuss.controllers "Discuss.Controllers"), such as "board" or "thread/new". These are basically the content of the individual controllers and contain the markup specific to what controller is requested.

The special "wrapper.tpl" and "print-wrapper.tpl" are used as outer wrappers to the controller wrappers depending on the request.

Next, the files in the "chunks" directory are used for smaller bits of html and they all end in .chunk.tpl. For example the "board/disboardli.chunk.tpl" file contains the html that is used to loop over individual boards and "category/discategoryli.chunk.tpl" contains the markup for categories. Email templates can also be found here, in the "emails" subfolder.

We'll go in deeper into creating custom themes in a different tutorial.