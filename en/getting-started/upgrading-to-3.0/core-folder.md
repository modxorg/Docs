---
title: Core folder
---

The core folder can no longer be moved to a custom path or renamed in 3.0. 

This is due to the way Composer is integrated with the core development process for managing dependencies and enabling autoloading in the core. [#15476](https://github.com/modxcms/revolution/issues/15476)

## Upgrading 

If you currently have a custom core directory or have it moved out of the webroot, you'll need to reverse that process before upgrading to 3.0. 

That means:

1. Move the core directory back to /core/ in the root of the installation
2. Edit core/config/config.inc.php with the updated core path
3. Edit config.core.php, /manager/config.core.php, and /connectors/config.core.php to use the update core path.

After you've done those steps, you can run the MODX installer to verify it was updated correctly.

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

On high-traffic sites you can prevent such requests from hitting MODX by immediately returning a 404, however that will then look different from a regular error which from a security point of view means an attacker can determine those files probably do exist. 

For nginx, that would look like this:

````
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    return 404;    
}
````
