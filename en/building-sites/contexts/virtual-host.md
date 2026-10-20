---
title: "Serving a Second Domain"
description: "Serving a second domain from one MODX installation: the context and its settings, the gateway directory with its own config.context.php, and the virtual host of the web server."
---

MODX 3 does not match a host with a context by itself. The context of a request is chosen by the gateway that starts it, so a second domain needs a second gateway — a directory with its own `index.php` and a `config.context.php` that names the context.

This page builds such a gateway for the context `dev` on the host `dev.example.com`.

## Creating the Context

Create the context in the manager: **Admin** → **Contexts** → **Create**. The **Context Key** is `dev` — the key is what the gateway names — and the name is free. The keys `mgr`, `web` and `root` are reserved by the core.

Then create the resources of the domain in the branch of the context in the resource tree. The tree looks like this:

![](subctx1.png)

## The Settings of the Context

Four settings on the **Context Settings** tab of the context decide how the URLs of the domain are built:

| Setting | Value |
| --- | --- |
| `base_url` | `/` |
| `http_host` | `dev.example.com` |
| `site_start` | the ID of the resource that opens the domain |
| `site_url` | `http://dev.example.com/` — the scheme, the host and the path, with a trailing slash |

Any other setting can be overridden here as well — `cultureKey` for the language of the domain, for example. Changing a setting clears the cache of the context, so a manual cache clear is not needed.

## The Gateway Directory

The gateway is a directory of its own with four files:

| File | What it holds |
| --- | --- |
| `index.php` | a copy of the `index.php` of the installation |
| `config.core.php` | a copy of the `config.core.php` of the installation |
| `.htaccess` | a copy of the `.htaccess` of the installation |
| `config.context.php` | the key of the context |

`config.context.php` holds one line:

``` php
<?php
return 'dev';
```

`config.core.php` holds the path to the core of the installation as an absolute path — the installer writes it that way:

``` php
define('MODX_CORE_PATH', '/home/example.com/public_html/core/');
```

That path is the only thing to correct in the copy: the other two files work as they are.

The `.htaccess` of the gateway needs one change — `RewriteBase` has to point to the directory of the gateway:

```
RewriteBase /dev/
```

## The Virtual Host

The web server needs a host of its own for that directory. For Apache 2.4:

``` apache
<VirtualHost *:80>
    ServerName dev.example.com
    DocumentRoot /home/example.com/public_html/dev
    ErrorLog logs/dev-error_log
    CustomLog logs/dev-access_log
</VirtualHost>
```

Restart the web server and open `http://dev.example.com/` — the resource named by `site_start` answers.

## Links Between the Contexts

A link to a resource of another context names that context:

```
[[~135:context=`web`]]
```

The URL is absolute, because the resource lives in another context. A link without a context stays in the context of the request and is relative:

```
[[~135]]
```

The same holds in PHP:

``` php
$url = $modx->makeUrl(135, 'web');
```

## See Also

1. [Contexts](building-sites/contexts)
2. [Using a Gateway Plugin](building-sites/contexts/gateway-plugin)
3. [System Settings](building-sites/settings)
