---
title: "Troubleshooting Installation"
_old_id: "311"
_old_uri: "2.x/getting-started/installation/troubleshooting-installation"
---

## Common Problems

First off, make sure:

- You have eAccelerator disabled during install. eAccelerator can cause problems when doing the heavy lifting during the install process.
- You followed all the directions [here](getting-started/installation "Installation") for your distribution.
- You are using at least PHP 5.1.1+, but not 5.1.6 or 5.2.0
- You are using MySQL later than 4.1.20, but not any iteration of MySQL 5.0.51 (including 5.0.51a).
- Clear the core/cache/ directory entirely before starting setup; sometimes improper file permissions can cause issues.
- Clear your browser cache and cookies

## PDO Error Messages

If you are getting PDO-related error messages during install, before proceeding to specific error messages as below, please confirm that your PDO configuration is setup correctly. You can do so by running this code (replace user/password/database/host with your setup):

``` php 
<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=testdb;host=localhost';
$user = 'dbuser';
$password = 'dbpass';

try {
  $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>
```

If this fails, then your PDO setup is not configured correctly.

## Common Errors

Here are some common problems that might occur during installation and their solutions:

### "I get a blank white screen instead of the options page!"

You probably copied config.inc.tpl to config.inc.php, which is incorrect. Make the config.inc.php file an empty, writable file.

If you renamed the config.inc.tpl to config.inc.php, rename it back to config.inc.tpl and create a blank file named config.inc.php that is writable.

### "I clicked install and got a blank white screen!"

Make sure your 'memory\_limit' setting in php.ini is set to at least 32M. For slower servers, you might need to up it to 64M.

### "Cannot connect to database" in the database options page

One of the common causes of this problem is that you're using a non-standard port for MySQL. Try putting this syntax into the hostname field (replacing the data with your mysql server's host and port):

> my.database.com;port=3307

### Warning: PDO::\_\_construct() \[pdo.--construct\]: \[2002\] Argument invalid (trying to connect via unix://) OR "Checking database:Could not connect to the mysql server."

This means your MySQL socket is incorrectly configured. Usually this can be remedied by adding to (or updating) your php.ini:

``` php 
mysql.default_socket=/path/to/my/mysql.sock
mysqli.default_socket=/path/to/my/mysql.sock
pdo_mysql.default_socket=/path/to/my/mysql.sock
```

### The login page keeps redirecting me back to the login screen with no error

This can happen with older Revolution beta installs. To fix it, delete the following 3 system settings from the DB table `\[prefix\]\_system\_settings` (where prefix is your table prefix):

- session\_name
- session\_cookie\_path
- session\_cookie\_domain

Then delete the core/cache/config.cache.php file.

Unless, of course, you've changed these explicitly for some purpose of your own.

### Things sometimes don't load, the page flakes out, etc (eAccelerator)

Are you running eAccelerator? In some server configurations, this can cause problems. You might need to disable it. You can do so via your php.ini:

``` php 
eaccelerator.enable = 0;
eaccelerator.optimizer = 0;
eaccelerator.debug = 0;
```

or in your .htaccess in the modx root directory, if your server supports php\_flag server directives:

``` php 
php_flag eaccelerator.enable 0
php_flag eaccelerator.optimizer 0
php_flag eaccelerator.debug 0
```

### General weirdness in the Manager (not eAccelerator)

On some systems, especially with shared hosting, there can be a problem with the compress\_js and/or compress\_css System Settings. Go to System -> System Settings and type 'compress' (without the quotes) in the search box at the upper right. Turn the two settings off, then log out, delete all files in the core/cache directory, clear your browser cache and cookies, and log back in.

If the Manager is messed up enough that you can't change the settings, see the note below about changing the two System Settings in the modx\_system\_settings table in the database with PhpMyAdmin.

### Resource / Elements / File tree not appearing

Additional, page "flake outs" may stem from items stored within your own browser's cache, which may result with the resource / elements / file tree not appearing due to old versions of javascript and other files being utilized on the client side. This can be verified by accessing the manager with a browser not previously utilized in doing so.

The simple fix: clear your browser's cache, and log back into the manager.

A more complete solution:

1. Under System Clear Cache
2. Under Security Flush Permissions and then Flush Sessions
3. This will dump everything and log you out
4. Last step Clear your browser cache

### I can't login to the manager after installing!

If you're redirecting back to the login screen every time, try setting this in your .htaccess file in the root of your MODx install:

``` php 
php_value session.auto_start 0
```

### Could not connect to the database server. Check the connection properties and try again. Access Denied...

Often on shared hosting, if you create a username for your database with an underscore (\_) in it, it will cause problems. Ensure your database username does not contain an underscore, and try again.

More common issues to come...

### The manager displays as plain text after installation

The MODX manager loads compressed CSS and JS assets. Some server configuration See "JS Errors in the Manager due to Error 4

### The Manager displays as plain text, Manager parts are missing, or there are JavaScript 400 Errors in the Manager

If your MODX manager is not loading properly due to 400 errors in the manager when trying to load the Google Minify-compressed JavaScript code, this is likely due to a server misconfiguration on your end. If this cannot be rectified from a server angle, you can manually disable JS and CSS compression the following way:

1. Go into the DB using PhpMyAdmin and find the \[table\_prefix\]\_system\_settings table (table\_prefix is usually modx).
2. Find the rows with key "compress\_js" and "compress\_css" and set their value to 0 and save them.
3. Empty your core/cache/ directory.
4. Clear your browser cache and cookies
5. Log in to the manager.

This will allow you to use the manager without JS and CSS compression.

### Manager parts are missing, undefined language strings, or there are JavaScript 500 Errors in the Manager

1. Make sure your connectors/ folder has 0755 permission

## Still Having Issues?

If you're still having problems, post your error and your server environment information in [our forums here](http://modxcms.com/forums/index.php/board,378.0.html), and we'll try and address your issue as soon as possible.