---
title: "SmartOptimizer"
_old_id: "717"
_old_uri: "revo/smartoptimizer"
---

<div>- [What is SmartOptimizer?](#SmartOptimizer-WhatisSmartOptimizer%3F)
  - [Requirements](#SmartOptimizer-Requirements)
  - [Public Releases](#SmartOptimizer-PublicReleases)
  - [Download](#SmartOptimizer-Download)
  - [Support, Comments, Development and Bug Reporting](#SmartOptimizer-Support%2CComments%2CDevelopmentandBugReporting)
- [Usage : the snippet way](#SmartOptimizer-Usage%3Athesnippetway)
  - [Properties](#SmartOptimizer-Properties)
  - [Examples](#SmartOptimizer-Examples)
- [Usage : the output filter way](#SmartOptimizer-Usage%3Atheoutputfilterway)
  - [Examples](#SmartOptimizer-Examples)
- [Usage : the .htaccess way](#SmartOptimizer-Usage%3Athe.htaccessway)

</div>What is SmartOptimizer?
-----------------------

This extra is a MODx version of SmartOptimizer by _Ali Farhadi_ :

"_SmartOptimizer (previously named JSmart) is a PHP library that enhances your website performance by optimizing the front end using techniques such as minifying, compression, caching, concatenation and embedding. All the work is done on the fly on demand._"

To know more about SmartOptimizer : <http://farhadi.ir/works/smartoptimizer>.

### Requirements

- MODx Revolution 2.0.x or later
- PHP5 or later

### Public Releases

<table><tbody><tr><th>Version</th><th>Date</th><th>Author</th><th>Product</th></tr><tr><td>1.0.0-pl   
</td><td>April 19, 2012   
</td><td>ben\_omycode   
</td><td>Revolution   
</td></tr><tr><td>1.0.0-beta2   
</td><td>January 10, 2012   
</td><td>ben\_omycode   
</td><td>Revolution   
</td></tr><tr><td>1.0.0-beta1</td><td>December 20, 2011</td><td>ben\_omycode</td><td>Revolution</td></tr></tbody></table>### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/smartoptimizer>

### Support, Comments, Development and Bug Reporting

**Github** : <https://github.com/benjamin-vauchel/smartoptimizer>  
**Support/Comments** : <http://forums.modx.com/thread/72679/support-comments-for-smartoptimizer>

Usage : the snippet way
-----------------------

<div class="info">If you can't edit your .htaccess or if you want to ponctually use SmartOptimizer.</div>### Properties

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>files   
</td><td>path to your CSS or JS files   
</td></tr></tbody></table>### Examples

<table><tbody><tr><th>Before (without SmartOptimizer)   
</th><th>After (with SmartOptimizer)   
</th></tr><tr><td>```
<pre class="brush: php">
<!-- Your CSS files -->
<link rel="stylesheet" href="assets/css/file1.css"/>
<link rel="stylesheet" href="assets/css/file2.css"/>

<!-- Your JS files -->
<script src="assets/js/file.js"></script>

```</td><td>```
<pre class="brush: php">
<!-- Your CSS files -->
<link rel="stylesheet" href="[[SmartOptimizer? &files=`assets/css/file1.css,file2.css`]]"/>

<!-- Your JS files -->
<script src="[[SmartOptimizer? &files=`assets/js/file.js`]]"></script>

```</td></tr></tbody></table>Usage : the output filter way
-----------------------------

<div class="info">If you can't edit your .htaccess or if you want to ponctually use SmartOptimizer.</div>### Examples

<table><tbody><tr><th>Before (without SmartOptimizer)   
</th><th>After (with SmartOptimizer)   
</th></tr><tr><td>```
<pre class="brush: php">
<!-- Your CSS files -->
<link rel="stylesheet" href="[[+link_to_css]]"/>

<!-- Your JS files -->
<script src="[[+link_to_js]]"></script>

```</td><td>```
<pre class="brush: php">
<!-- Your CSS files -->
<link rel="stylesheet" href="[[+link_to_css:smartoptimizer]]"/>

<!-- Your JS files -->
<script src="[[+link_to_js:smartoptimizer]]"></script>

```</td></tr></tbody></table>Usage : the .htaccess way
-------------------------

<div class="info">Use this method if you want all your css and js files processed by SmartOptimizer</div>Add this at the end of your .htaccess :

```
<pre class="brush: php">
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

```If you enabled friendly URLs, add also :

```
<pre class="brush: php">
RewriteCond %{REQUEST_FILENAME} !(\.css)$
RewriteCond %{REQUEST_FILENAME} !(\.js)$

```Before :

```
<pre class="brush: php">
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]

```Finally, call your stylesheets and scripts this way :

```
<pre class="brush: php">
<link rel="stylesheet" href="assets/css/file1.css,file2.css"/>
<link rel="stylesheet" href="assets/css/file1.css,file2.css"/>

```