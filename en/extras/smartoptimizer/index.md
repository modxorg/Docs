---
title: "SmartOptimizer"
_old_id: "717"
_old_uri: "revo/smartoptimizer"
---

## What is SmartOptimizer?

This extra is a MODX version of SmartOptimizer by _Ali Farhadi_ :

"_SmartOptimizer (previously named JSmart) is a PHP library that enhances your website performance by optimizing the front end using techniques such as minifying, compression, caching, concatenation and embedding. All the work is done on the fly on demand._"

To know more about SmartOptimizer : <http://farhadi.ir/works/smartoptimizer>.

### Requirements

- MODX Revolution 2.0.x or later
- PHP5 or later

### Public Releases

| Version     | Date              | Author       | Product    |
| ----------- | ----------------- | ------------ | ---------- |
| 1.0.0-pl    | April 19, 2012    | ben\_omycode | Revolution |
| 1.0.0-beta2 | January 10, 2012  | ben\_omycode | Revolution |
| 1.0.0-beta1 | December 20, 2011 | ben\_omycode | Revolution |

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modx.com/extras/package/smartoptimizer>

### Support, Comments, Development and Bug Reporting

**Github** : <https://github.com/benjamin-vauchel/smartoptimizer>
**Support/Comments** : <http://forums.modx.com/thread/72679/support-comments-for-smartoptimizer>

## Usage: the snippet way

If you can't edit your .htaccess or if you want to ponctually use SmartOptimizer.

### Properties

| Name  | Description                  |
| ----- | ---------------------------- |
| files | path to your CSS or JS files |

### Examples

Before (without SmartOptimizer

``` html
<!-- Your CSS files -->
<link rel="stylesheet" href="assets/css/file1.css"/>
<link rel="stylesheet" href="assets/css/file2.css"/>

<!-- Your JS files -->
<script src="assets/js/file.js"></script>
```

After (with SmartOptimizer)

``` html
<!-- Your CSS files -->
<link rel="stylesheet" href="[[SmartOptimizer? &files=`assets/css/file1.css,file2.css`]]"/>

<!-- Your JS files -->
<script src="[[SmartOptimizer? &files=`assets/js/file.js`]]"></script>
```

## Usage: the output filter way

If you can't edit your .htaccess or if you want to ponctually use SmartOptimizer.

### Examples

Before (without SmartOptimizer)

``` html                      |
<!-- Your CSS files -->
<link rel="stylesheet" href="[[+link_to_css]]"/>

<!-- Your JS files -->
<script src="[[+link_to_js]]"></script>
```

After (with SmartOptimizer)

``` php
<!-- Your CSS files -->
<link rel="stylesheet" href="[[+link_to_css:smartoptimizer]]"/>

<!-- Your JS files -->
<script src="[[+link_to_js:smartoptimizer]]"></script>
```

## Usage: the .htaccess way

Use this method if you want all your css and js files processed by SmartOptimizer

Add this at the end of your .htaccess :

``` php
<IfModule mod_expires.c>
  <FilesMatch "\.(gif|jpg|jpeg|png|swf|css|js|html?|xml|txt|ico)$">
    ExpiresActive On
    ExpiresDefault "access plus 10 years"
  </FilesMatch>
</IfModule>
<IfModule mod_rewrite.c>
  RewriteEngine On  
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^(.*\.(js|css))$ assets/components/smartoptimizer/connector.php?$1
  <IfModule mod_expires.c>
    RewriteCond %{REQUEST_FILENAME} -f
    RewriteRule ^(.*\.(js|css|html?|xml|txt))$ assets/components/smartoptimizer/connector.php?$1
  </IfModule>
  <IfModule !mod_expires.c>
    RewriteCond %{REQUEST_FILENAME} -f
    RewriteRule ^(.*\.(gif|jpg|jpeg|png|swf|css|js|html?|xml|txt|ico))$ assets/components/smartoptimizer/connector.php?$1
  </IfModule>
</IfModule>
<FilesMatch "\.(gif|jpg|jpeg|png|swf|css|js|html?|xml|txt|ico)$">
  FileETag none
</FilesMatch>
```

If you enabled friendly URLs, add also :

``` php
RewriteCond %{REQUEST_FILENAME} !(\.css)$
RewriteCond %{REQUEST_FILENAME} !(\.js)$
```

Before :

``` php
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
```

Finally, call your stylesheets and scripts this way :

``` html
<link rel="stylesheet" href="assets/css/file1.css,file2.css"/>
<link rel="stylesheet" href="assets/css/file1.css,file2.css"/>
```
