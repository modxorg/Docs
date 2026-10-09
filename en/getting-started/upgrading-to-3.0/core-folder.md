---
title: Core folder
---

In 3.0 the core folder can no longer be moved to a custom path or renamed. Composer manages dependencies and autoloading for the core, which requires the standard location. [#15476](https://github.com/modxcms/revolution/issues/15476)

## Upgrading

If you have a custom core directory, or the core sits outside the webroot, reverse that before upgrading:

1. Move the core directory back to /core/ in the root of the installation.
2. Edit `config.core.php`, `/manager/config.core.php`, and `/connectors/config.core.php` to use the updated core path.

The `MODX_CORE_PATH` definition in `core/config/config.inc.php` is only a fallback that never runs once `config.core.php` already defines the constant, so it does not need changing — keep the two in sync if you edit it anyway.

After those steps, run the MODX installer to verify the path was updated correctly.


## But what about security?

From a security point of view, there is zero difference between physically moving the core out of the webroot to prevent direct access, and blocking access to it in a different way.

Here's how you could block access to the core (and various other common sensitive directories or files, including any dotfiles except the .well_known directory) on Apache:

```` 
RewriteRule ^(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php)  /index.php?q=doesnotexist [L,R=404]
````

And for nginx:

````
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    rewrite ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) /index.php?q=doesnotexist;    
}
````

These examples pass the request on to MODX with a non-existent alias, which has the benefit of ensuring it looks like the rest of your site. 

On high-traffic sites you can prevent such requests from hitting MODX by immediately returning a 404. That response then differs from a regular error, which lets an attacker conclude the requested files probably do exist.

For nginx, that would look like this:

````
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    return 404;    
}
````
