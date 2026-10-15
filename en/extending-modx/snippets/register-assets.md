---
title: "Adding CSS and JS"
description: "Learning How to Register CSS and JS"
---

Register CSS and JavaScript from a Snippet instead of a Template Variable you would otherwise edit on every Resource.

<!-- MEDIA: diagram | must | Where each call lands in the page: regClientCSS, regClientStartupScript and regClientStartupHTMLBlock go to the HEAD in call order, regClientScript and regClientHTMLBlock go just before the closing BODY tag, a repeated URL is registered once | Draw it from the two section headings and the method descriptions below -->

## Adding to the HEAD

These methods append CSS and/or JavaScript to the HEAD of the current page in the order you call them, so call them in the order the assets should appear. Registration is de-duplicated by URL: calling a method twice with the same `$src` keeps only the first registration, so an asset's position is fixed by its first call.

### regClientCSS

Register a CSS file by passing its URL:

``` php
$modx->regClientCSS('assets/css/my-custom.css');
```

Prefer the **MODX\_ASSETS\_URL** constant so the Snippet keeps working when the assets location is non-standard:

``` php
$modx->regClientCSS(MODX_ASSETS_URL.'css/my-custom.css');
```

An optional second argument adds a `media` attribute to the generated `<link>` tag:

``` php
$modx->regClientCSS(MODX_ASSETS_URL.'css/print.css', 'print');
```

If the string already contains `<style` or `<link`, it is inserted as-is instead of being wrapped in a `<link>` tag.

### regClientStartupScript

Register a script for the HEAD:

``` php
$modx->regClientStartupScript('assets/js/site.js');
```

``` php
$modx->regClientStartupScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
```

If the string already contains `<script`, it is inserted as-is; the optional second argument `$plaintext = true` forces this raw-insert behavior (this is how `regClientStartupHTMLBlock` works under the hood).

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

These methods insert JavaScript or HTML just before the BODY tag closes — typical for analytics or for scripts that must run at body level rather than in the HEAD.

### regClientScript

Similar to [regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript) except that it runs before the closing BODY tag:

``` php
$modx->regClientScript('assets/js/footer.js');
```

As with `regClientStartupScript`, a string containing `<script` is inserted raw, and `$plaintext = true` forces raw insertion.

### regClientHTMLBlock

Similar to [regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock) except that it runs before the closing BODY tag:

``` php
$modx->regClientHTMLBlock('
<div>custom stuff here</div>
<script type="text/javascript">
runAnalytics();
</script>');
```

In an Extra you distribute, make CSS/JS insertion a toggle, so the user can switch it off or replace the content.

## See Also

1. [Templating Your Snippets](extending-modx/snippets/templating)
2. [How to Write a Good Snippet](extending-modx/snippets/good-snippet)
3. [How to Write a Good Chunk](extending-modx/snippets/good-chunk)
