---
title: "SmartOptimizer"
description: "Оптимизация CSS и JS на фронтенде MODX через SmartOptimizer"
translation: "extras/smartoptimizer/index"
---

## Что такое SmartOptimizer?

MODX-версия SmartOptimizer от _Ali Farhadi_:

"_SmartOptimizer (previously named JSmart) is a PHP library that enhances your website performance by optimizing the front end using techniques such as minifying, compression, caching, concatenation and embedding. All the work is done on the fly on demand._"

Подробнее: <http://farhadi.ir/works/smartoptimizer>.

### Требования

- MODX Revolution 2.0.x или новее
- PHP5 или новее

### Публичные релизы

| Version     | Date              | Author       | Product    |
| ----------- | ----------------- | ------------ | ---------- |
| 1.0.0-pl    | April 19, 2012    | ben\_omycode | Revolution |
| 1.0.0-beta2 | January 10, 2012  | ben\_omycode | Revolution |
| 1.0.0-beta1 | December 20, 2011 | ben\_omycode | Revolution |

### Загрузка

Установите через [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте: <https://modx.com/extras/package/smartoptimizer>

### Поддержка, комментарии, разработка и баги

**Github** : <https://github.com/benjamin-vauchel/smartoptimizer>
**Support/Comments** : <http://forums.modx.com/thread/72679/support-comments-for-smartoptimizer>

## Использование: через сниппет

Если нельзя править .htaccess или нужен точечный SmartOptimizer.

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

## Использование: через output filter

Если нельзя править .htaccess или нужен точечный SmartOptimizer.

### Examples

Before (without SmartOptimizer)

``` html
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

## Использование: через .htaccess

Если нужна обработка всех css и js через SmartOptimizer.

Добавьте в конец .htaccess:

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

При friendly URLs добавьте:

``` php
RewriteCond %{REQUEST_FILENAME} !(\.css)$
RewriteCond %{REQUEST_FILENAME} !(\.js)$
```

Перед:

``` php
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
```

Подключайте стили и скрипты так:

``` html
<link rel="stylesheet" href="assets/css/file1.css,file2.css"/>
<link rel="stylesheet" href="assets/css/file1.css,file2.css"/>
```
