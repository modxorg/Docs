---
title: Friendly URLs on Apache
description: 'Using friendly URLs on Apache.'
---

By default, MODX ships with a `ht.access` file in the root that serves as an example for [using friendly URLs](getting-started/friendly-urls) on Apache servers.

To use it, rename the file `ht.access` to `.htaccess`. 

## Required .htaccess rules

While the example `ht.access` file contains different optimisations, for friendly URLs you only need the following. 

```
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
```

## Subdirectory installations

If your MODX is installed in a subdirectory, change the `RewriteBase` accordingly.
