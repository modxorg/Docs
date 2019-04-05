---
title: "StatCache"
_old_id: "720"
_old_uri: "revo/statcache"
---

### A Static Caching Plugin for MODX Revolution

The statcache extra is made up of a Plugin for MODX Revolution that writes out static representations of fully cacheable MODX Resources to a configurable location on the filesystem. You can then use your web server's rewrite engine (or equivalent) to serve the static files first, if they exist. This has the advantage of bypassing MODX (and PHP) entirely, allowing you to serve potentially thousands of more requests per second. It has the disadvantage of not allowing any dynamic content to be served.

### Requirements

- MODX Revolution 2.1.x or later
- Apache or NGINX webserver

GitHub: <https://github.com/opengeek/statcache> 
 Issues: <https://github.com/opengeek/statcache/issues>

**Install via Package Manager**

### Web Server Configuration for nginx

Once the extra is installed and the StaticCache plugin is enabled and generating your static files, you can configure nginx to serve those files first by preceding the standard MODX rules for nginx:

#### MODX in DOCUMENT\_ROOT

``` php 
location / {
    try_files /statcache$uri~index.html /statcache$uri $uri $uri/ @modx-rewrite;
}
location @modx-rewrite {
    rewrite ^/(.*)$ /index.php?q=$1 last;
}

```

This instructs nginx to look for a static representation of the requested resource within the statcache/ directory inside your document root before all the standard MODX checks. The initial version with the ~index.html check is there to handle MODX-generated URI's that end with a trailing /. These are written by the plugin as ~index.html files so they can be served properly by the web server.

#### MODX in subdirectory of DOCUMENT\_ROOT

``` php 
location /modx {
    try_files /modx/statcache$uri~index.html /modx/statcache$uri $uri $uri/ @modx-rewrite2;
}
location @modx-rewrite2 {
    rewrite ^/(.[^/]*)/(.*)$ /$1/index.php?q=$2 last;
}

```

This instructs nginx to look for a static representation of the requested resource within the statcache/ directory inside your MODX\_BASE\_PATH before all the standard MODX checks. The initial version with the ~index.html check is there to handle MODX-generated URI's that end with a trailing /. These are written by the plugin as ~index.html files so they can be served properly by the web server.

### Web Server Configuration for Apache

Once the extra is installed and the StaticCache plugin is enabled and generating your static files, you can configure Apache to serve those files first by preceding the standard MODX rules for Apache .htaccess with:

#### MODX in DOCUMENT\_ROOT

``` php 
# If MODX is directly in your DOCUMENT_ROOT,
# add this before your MODX Friendly URLs RewriteCond's and RewriteRule...
RewriteCond %{DOCUMENT_ROOT}/statcache%{REQUEST_URI}/~index.html -f
RewriteRule ^(.*)$ statcache/$1~index.html [L,QSA]

RewriteCond %{DOCUMENT_ROOT}/statcache%{REQUEST_URI} -f
RewriteRule ^(.*)$ statcache/$1 [L,QSA]

```

#### MODX in subdirectory of DOCUMENT\_ROOT

``` php 
# If MODX is in a subdirectory of your DOCUMENT_ROOT,
# add this before your MODX Friendly URLs RewriteCond's and RewriteRule...
RewriteCond %{DOCUMENT_ROOT}/modx/statcache%{REQUEST_URI}/~index.html -f
RewriteRule ^(.*)$ modx/statcache/$1~index.html [L,QSA]

RewriteCond %{DOCUMENT_ROOT}/modx/statcache%{REQUEST_URI} -f
RewriteRule ^(.*)$ modx/statcache/$1 [L,QSA]

```

You can add an exemption to serve post requests and query strings directly from MODX instead of the static pages, by adding these two lines to your .htaccess

``` php 
RewriteCond %{REQUEST_METHOD} !=POST
RewriteCond %{QUERY_STRING} !.*=.*

```

Note: You will need this twice, ones before the first rule set and once before the second rule set.

### Troubleshooting

- Make sure you have the "statcache" directory in your web root and that it is writable by PHP
- Ensure that "OnBeforeSaveWebPageCache" and "OnSiteRefresh" are checked under System Events.