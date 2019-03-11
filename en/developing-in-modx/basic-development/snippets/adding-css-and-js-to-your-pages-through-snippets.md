---
title: "Adding CSS and JS to Your Pages Through Snippets"
_old_id: "13"
_old_uri: "2.x/developing-in-modx/basic-development/snippets/adding-css-and-js-to-your-pages-through-snippets"
---

## Learning How to Register CSS and JS

 So, you've got a Snippet that you've been writing and want to add CSS and/or JavaScript to your pages, but don't want to have to setup a custom Template Variable and edit it on every Resource your Snippet is used on. You want the Snippet to do it, dagnabbit! Well, it's pretty easy, actually, using some MODx API methods.

 **Other CMSs** 
 This is a common need in any CMS, so if you're coming from another platform, here are some of the related functions. - **WordPress** – uses its _wp\_enqueue\_script_, _wp\_register\_script_, _wp\_enqueue\_style_, _wp\_register\_style_ functions.

## Adding to the HEAD

 There are a few methods that automatically add CSS and/or JavaScript to the HEAD of the current page. They will run in the order that they're added, so if you need them in a certain order, make sure you execute the methods in that order as well.

### regClientCSS

 This function lets you register any CSS file to the HEAD of the content by providing the URL in the method:

 ``` php 
$modx->regClientCSS('assets/css/my-custom.css');
```

 Or, more correctly, you would use the **MODX\_ASSETS\_URL** constant so your Snippet or plugin would work even on a site that was configured to use a non-standard assets location.

 ``` php 
$modx->regClientCSS(MODX_ASSETS_URL.'css/my-custom.css');
```

### regClientStartupScript

 This function lets you register any custom JavaScript to the HEAD of the document:

 ``` php 
$modx->regClientStartupScript('assets/js/site.js');
```

 ``` php 
$modx->regClientStartupScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"');
```

``` php 
$modx->regClientStartupScript('http://code.jquery.com/jquery-latest.min.js');
```

### regClientStartupHTMLBlock

 This function is useful if you need to set some JS variables, or output some HTML into the HEAD:

 ``` php 
$modx->regClientStartupHTMLBlock('
<meta tag="here" />
<script type="text/javascript">
var myCustomJSVar = 123;
</script>');
```

## Adding Before the BODY End

 There are also methods that can be used to insert Javascript or HTML at the end of every page, right before the BODY tag closes. They are often useful for custom analytics scripts, or JS that needs to be run at the body-level rather than in the HEAD.

### regClientScript

 Similar to [regClientStartupScript](#AddingCSSandJStoYourPagesThroughSnippets-regClientStartupScript) except that it runs before the closing BODY tag:

 ``` php 
$modx->regClientScript('assets/js/footer.js');
```

 ``` php 
$modx->regClientScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"');
```

``` php 
$modx->regClientScript('http://code.jquery.com/jquery-latest.min.js');
```

### regClientHTMLBlock

 Similar to [regClientStartupHTMLBlock](#AddingCSSandJStoYourPagesThroughSnippets-regClientStartupHTMLBlock) except that it runs before the closing BODY tag:

 ``` php 
$modx->regClientHTMLBlock('
<div>custom stuff here</div>
<script type="text/javascript">
runAnalytics();
</script>');
```

## Conclusion

 MODx offers Extras developers many options on how to insert custom CSS/JS into their pages at the Snippet level. However, MODx also recommends in any Extras you are distributing, to make sure inserting CSS or JS into a page is a toggleable option, so that the user can customize the content or javascript framework should they so choose.

## See Also

1. [Templating Your Snippets](developing-in-modx/basic-development/snippets/templating-your-snippets)
2. [Adding CSS and JS to Your Pages Through Snippets](developing-in-modx/basic-development/snippets/adding-css-and-js-to-your-pages-through-snippets)
3. [How to Write a Good Snippet](developing-in-modx/basic-development/snippets/how-to-write-a-good-snippet)
4. [How to Write a Good Chunk](developing-in-modx/basic-development/snippets/how-to-write-a-good-chunk)