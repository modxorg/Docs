---
title: "Creating a Discuss Theme"
_old_id: "823"
_old_uri: "revo/discuss/discuss.creating-a-discuss-theme"
---

This document will walk you through the basics of creating a Discuss Theme. We will first discuss the basics, and follow up with more in depth instructions on how to theme and what you should keep in mind using a git powered workflow.

## Understanding the File Structure

Discuss themes consist of 2 parts: the theme assets (css, javascript and images) and the templates (basically, the chunks used by Discuss). These are located in their respective directories:

- assets: assets/components/discuss/themes/**THEME\_NAME**/
- templates: core/components/discuss/templates/**THEME\_NAME**/

Both **THEME\_NAME's** should obviously be the same, and that name is also what needs to be defined in the **discuss.theme** setting to use the theme.
The default theme included in Discuss is loosely based on the official MODX Forums theme and as a result it also uses SASS to generate the CSS. You can find the SASS source files in assets/components/discuss/themes/default/sass/, with the compiled css in the /css/ directory. [You can learn more about SASS here](http://sass-lang.com/).

## Basic Theming Considerations

Just like any other MODX Extra, Discuss gives you infinite markup freedom. This does mean there's a lot of different templates in use for various bits of the template. To give you an idea, here's a visual view of the forum home breakdown.

![](https://www.evernote.com/shard/s265/sh/14aa5e38-ec33-4a44-be2d-ba2698f1d6ab/b9f56412352884f8e6f9522a638d45ea/res/35d30b10-9174-4430-a8c4-286c203cfae5/skitch.png)

Luckily, there's an easy way for you to figure out what markup is coming from what template file. Simply enable the **discuss.debug\_templates** system setting, and every referenced chunk template will be pre- and suffixed with a HTML comment indicating what chunk (and its filename) was referenced. Example:

``` html
<!-- Start: board/disBoardLi from file: themes/default/chunks/board/disboardli.chunk.tpl -->
 <div class="Depth2 row dis-category h-group dis-category-1 dis-unread">
    <a href="http://localhost/modx-stable2/forums/board/1/blue-sky" class="h-group">
        <div class="f1-f7">
            <div class="wrap">
                <span class="folder">35</span>
                <strong>Blue Sky</strong>
                <p class="dis-board-description">Thoughts and peer-to-peer discussions for Partners only</p>
            </div>
        </div>
        <div class="f8-f10">
            <span class="clickable" data-link="http://localhost/modx-stable2/forums/thread/74739/this-is-a-test/#dis-post-414487">This is a test</span>
        </div>
        <div class="f11 l-txtcenter">418</div>
        <div class="f12 l-txtcenter">37</div>
    </a>
    <div class="h-group f-all"><p class="dis-board-subs dis-unread">
<!-- Start: board/disSubForumLink from file: themes/default/chunks/board/dissubforumlink.chunk.tpl -->
 <a href="forums/board/?board=277">New Board</a>

<!-- /End: board/disSubForumLink -->
</p></div>
</div>

<!-- /End: board/disBoardLi -->
```

The entire page is wrapped by **pages/wrapper.tpl** with the controller specific page template placed in the `[[+content]]` placeholder.

The controller specific page template is by default the file in the /pages/ directory with the same name as the controller (and to some extent the URL). For example the home controller uses the pages/home.tpl template, while viewing the recent thread posts uses pages/thread/recent.tpl.

However, different themes allow reusing templates across controllers through a manifest option.

Let's look at the manifest item for the **thread/reply** controller.

``` php
    'thread/reply' => array(
        'js' => array(
            'footer' => array(
                'dis.thread.js',
            ),
        ),
        'options' => array(
            'pageTpl' => 'common/thread-with-form',
        ),
        /* ...*/
    ),
```

Besides registering a javascript file to the footer (located in assets/components/discuss/themes/THEME\_NAME/js/), we are passing it an option of pageTpl, pointing it to common/thread-with-form. This means that instead of using the pages/thread/reply.tpl template, it will actually use the pages/common/thread-with-form.tpl template for this controller. This allows you to reuse markup across similar controllers without having to repeat yourself.

With this information you can start basic theming, using primarily CSS customization hooking into the many available classes. But if you want to go further...

## Using the Manifest to further Customise your Theme

The manifest, which we briefly referred to above, is a powerful tool allowing you to go beyond basic CSS customisations and making some changes to the template files. It allows you to configure a number of options per controllers, change templates and add something called modules. You'll find we've applied a bunch of these in the default template and you may not need to do this yourself, but it's great to know how it works in case you want to change it for your specific needs.

The manifest is a big php array located in the themes' templates directory called "manifest.php". It is several levels deep.

1. The first level is the controller's name or the special "global" which is applied everywhere.
2. The second level can be either of the following:
     1. "js": allows you to define javascript to load on specific controllers. This option has a third level, which is one of the following: "header", "footer" or "inline". This third level then contains an array of files to load from assets/components/discuss/theme\_name/js/.
     2. "css": allows you to define stylesheets to load on specific controllers. This third level then contains an array of files to load from assets/components/discuss/theme\_name/css/.
     3. "options": defines controller specific options to configure the behaviour of the controller. The options vary from controller to controller, and you can find them all in the [Controllers](extras/discuss/discuss.controllers "Discuss.Controllers") documentation.

If you're scared by the thought of PHP or PHP Arrays, have a look through [these](http://www.tizag.com/phpT/arrays.php) [resources](http://www.htmlandphp.com/beginner-php/207-introduction-to-arrays-in-php.html). What we're doing is called a multidimensional associative array.

## Git-powered Theme workflow

To get started creating a Discuss theme in a git-powered workflow, kick it off by creating a fork of the main Discuss repository at <https://github.com/modxcms/Discuss>. Then, clone your fork to a local directory and add the original repository as an upstream remote.

``` php
git clone git@github.com:Your_Username/Discuss.git
git remote add upstream https://github.com/modxcms/Discuss.git
```

Next, check out the current release branch which contains the most up to date version. At time of writing that is release-1.1, but check the [Discuss Contributors Guidelines](extras/discuss/discuss.contributing "Discuss.Contributing") for latest instructions.

``` php
cd Discuss
git checkout release-1.1
```

Once you did that, we're going to create a different theme branch, which will help make collaboration easier in case you want to [contribute back to Discuss](extras/discuss/discuss.contributing "Discuss.Contributing") \*cough\*. If you want to fix stuff in the default branch, you would instead create a fix branch, eg fix-colorsbug.

``` php
git checkout -b theme-name_of_theme
```

Once you did all this, you'll need to connect this Discuss codebase with a MODX installation. The easiest way to do that is to install the Discuss package (that sets up all the required bits within MODX), and to adjust the namespace (via System > Namespaces) to point to the git-versioned core/components/discuss/ directory and creating a discuss.core\_path setting with the same path as the value and discuss.assets\_url with an absolute url to the git-versioned assets/components/discuss/ directory.

Depending on your setup you will also need to set the session\_cookie\_path setting to / (yes, just a single slash) and to avoid session-clashes if you have multiple local MODX installs, you may want to change the session\_name setting to something unique. Next, we'll also need a config.core.php file in the root of our discuss project pointing to our MODX installation. You can copy this from the root of your MODX install, or custom craft it yourself using the template below.

``` php
<?php
define('MODX_CORE_PATH', '/Applications/MAMP/htdocs/modx/core/');
define('MODX_CONFIG_KEY', 'config');
```

You should have a functional Discuss install now, or at least be ready to follow the [Installation instructions](extras/discuss/discuss.installation "Discuss.Installation") and get theming :)
