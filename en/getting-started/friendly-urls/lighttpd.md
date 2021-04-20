---
title: "Friendly URLs on Lighttpd"
_old_id: "169"
_old_uri: "2.x/getting-started/installation/basic-installation/lighttpd-guide"
---

lighttpd does not use the same system, or even same idea as Apache does for URL rewriting. All URL rewriting is done in the `lighttpd.conf` file.

## Enable the URL Rewriting module

First we need to make sure that the URL rewriting module is enabled.

- So open your lighttpd.conf config file (In Linux it is usually located in `/etc/lighttpd/lighttpd.conf`)
- Look for the directive server.modules.
- Under this directive, look for an entry named `mod_rewrite`,.
- By default it has a # in front of it. This is a comment symbol. Please remove the # from the line and save the file.

## Add the rewrites

Next we need to find the location in which to put the friendly URL code. So lets search for something that looks like this:

``` php
$SERVER["socket"] == ":80" {
$HTTP["host"] =~ "yourdomainname.com" {
    server.document-root = "/path/to/your/doc/root"
    server.name = "yourservername"
```

Directly under this you should add the following code.

``` php
    url.rewrite-once = ( "^/(assets|manager|core|connectors)(.*)$" => "/$1/$2",
           "^/(?!index(?:-ajax)?\.php)(.*)\?(.*)$" => "/index.php?q=$1&$2",
           "^/(?!index(?:-ajax)?\.php)(.*)$" => "/index.php?q=$1"
     )
```

## Important: excluding directories

While this configuration should do teh trick, it's important to realise Lighttpd handles url-rewrites a bit differently.

You **must** exclude any files or folders you do not want rewritten in the config file. Excluded dirs/files in the example above are `(assets|manager|core|connectors)`. If you wish to add more to these, simple add another `|` followed by the folder or filename you wish to omit from url rewriting.

After this is done, you will have working friendly URLs in lighttpd.
