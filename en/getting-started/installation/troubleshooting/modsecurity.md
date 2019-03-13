---
title: "Servers with mod_security"
_old_id: "166"
_old_uri: "2.x/getting-started/installation/basic-installation/installation-on-a-server-running-modsecurity"
---

- [ModSecurity (aka mod\_security or mod\_sec)](#InstallationonaserverrunningModSecurity-ModSecurity%28akamodsecurityormodsec%29)
- [How Do I Know if I have ModSecurity Installed?](#InstallationonaserverrunningModSecurity-HowDoIKnowifIhaveModSecurityInstalled%3F)
  - [Checking on a WHM Server](#InstallationonaserverrunningModSecurity-CheckingonaWHMServer)
  - [Checking via the Command Line](#InstallationonaserverrunningModSecurity-CheckingviatheCommandLine)
  - [Other Recon](#InstallationonaserverrunningModSecurity-OtherRecon)
- [Log Files](#InstallationonaserverrunningModSecurity-LogFiles)
  - [Sample Error](#InstallationonaserverrunningModSecurity-SampleError)
- [Whitelisting a Rule for a Domain](#InstallationonaserverrunningModSecurity-WhitelistingaRuleforaDomain)
  - [Rebuild the Apache Configuration](#InstallationonaserverrunningModSecurity-RebuildtheApacheConfiguration)
  - [Edit the Virtual Hosts file](#InstallationonaserverrunningModSecurity-EdittheVirtualHostsfile)
- [Add the Whitelist Rule](#InstallationonaserverrunningModSecurity-AddtheWhitelistRule)
  - [Generic Example](#InstallationonaserverrunningModSecurity-GenericExample)
  - [Specific Example](#InstallationonaserverrunningModSecurity-SpecificExample)
  - [Broader Example](#InstallationonaserverrunningModSecurity-BroaderExample)
- [Restart Apache](#InstallationonaserverrunningModSecurity-RestartApache)
  - [cPanel: Rebuild Conf file](#InstallationonaserverrunningModSecurity-cPanel%3ARebuildConffile)
  - [Restart Apache](#InstallationonaserverrunningModSecurity-RestartApache)
- [Static Resources](#InstallationonaserverrunningModSecurity-StaticResources)
- [See Also](#InstallationonaserverrunningModSecurity-SeeAlso)



This document covers a fairly technical topic and it's not recommended that amateurs attempt this. Command-line noobs best leave this to a professional system admin or to their hosting company. Editing configuration files via the command line can be dangerous and you can destroy your server!

## ModSecurity (aka mod\_security or mod\_sec)

[ModSecurity](http://www.modsecurity.org/) is an open source web application firewall that runs as an Apache server module. It implements a comprehensive set of rules that implement general-purpose hardening, and thereby helps patch common web application security issues. It establishes an external security layer that increases security, detects, and prevents attacks before they reach web applications. It is commonly available on cPanel systems as an EasyApache module. It is a well-respected security module and can really help lock down your site from common attack vectors.

We discuss ModSecurity explicitly here because the MODX Revolution manager issues many requests that can run afoul of mod\_security rules.

**The Silent Killer**
The MODX manager may simply quietly fail if one of its actions is blocked by mod\_security. Know your server! Check your Apache error logs! Your sanity is at stake!

## How Do I Know if I have ModSecurity Installed?

Before we discuss how to make ModSecurity and MODX play nicely together, you need to know whether or not you actually have this software installed. The easy solution is to ask your hosting provider, and presumably they will know (if they don't know what software they are running, it's probably time to [find another hosting company](http://modx.com/partners/hosting-saas/)).

If you are running your own server (e.g. one born of a VPS template), then you can log into the server and check this for yourself.

### Checking on a WHM Server

Many VPS's include the WHM/cPanel administration panels. It's relatively easy to see if you are running mod\_security on a WHM server.

1. Log into your WHM instance (typically at <https://yoursite.com:2087/>)
2. Find the "Plugins" section in the left navigation
3. If ModSecurity is installed, you'll see **Mod Security** listed under your plugins.

![](/download/attachments/36634874/modSecurity+WHM.jpg?version=1&modificationDate=1321901219000)

A handy cPanel/WHM mod\_security module is available for visually editing your rules here: <http://configserver.com/>

### Checking via the Command Line

If you have SSH access to your server, you can check to see which modules Apache loads on startup. To print out which modules are loaded into Apache, you can use the **apachectl** utility on \*NIX systems, e.g.

``` php 
apachectl -t -D DUMP_MODULES
```

Or, if your **apachectl** command is not in your current $PATH, then you may need to specify a full path to the utility. To find the path, you can search for it using the **find** command:

``` php 
find / -name apachectl
```

Then once you've found the full path to the utility, you can run the command verbosely, e.g.:

``` php 
/usr/local/apache/bin/apachectl -t -D DUMP_MODULES
```

The output will be something like this:

``` php 
Loaded Modules:
 core_module (static)
 rewrite_module (static)
 so_module (static)
 suphp_module (shared)
 security2_module (shared)  # <--- this is ModSecurity
```

The mod\_security module is listed as **security2\_module**

### Other Recon

If you don't have the **apachectl** utility or you can't find it, you can manually check your Apache configuration files. It can be configured differently on different servers, but in general, Apache is setup to load its main configuration file, then it will optionally scan additional directories for additional configuration files.

1. Check the main Apache file (often inside **/etc/httpd**, e.g. **/etc/httpd/conf/httpd.conf**)
2. Check the additional configuration directories (often inside sub-folders of the main configuration directory).

## Log Files

After you've verified that are in fact running ModSecurity, you'll want to monitor your logs to see if your actions in the MODX manager are in fact tripping security alarms. This is best done via the command line: use SSH to log into your server and make sure you have appropriate access (e.g. root privileges) to view these log files.

The primary log you'll want to monitor is your Apache error log. The exact location is configured in your Apache configuration file, but often it resides inside of **/usr/local/apache/logs/error\_log** A good way to watch this file is by using the **tail** utility. You can monitor the file in real-time by using the **-f** flag, e.g.

``` php 
tail -f /usr/local/apache/logs/error_log
```

Keep that window open as you navigate the MODX manager and be alert if any errors appear in that file. (Press ctrl-C to close the utility).

You may also want to watch the contents of the mod\_security log. Again, the location is configurable, but often this is stored in **/usr/local/apache/logs/modsec\_audit.log**

### Sample Error

If you do see that errors are being tripped inside the Apache error log when you try a particular action in the MODX manager, chances are good that ModSecurity just prevented you from doing something in the manager.

Here is a sample error from the Apache error log:

``` php 
[Sat Nov 19 19:16:32 2011] [error] [client 123.123.123.123] ModSecurity: Access denied with code 500 (phase 2).
Pattern match "(insert[[:space:]]+into.+values|select.*from.+[a-z|A-Z|0-9]|select.+from|bulk[[:space:]]+insert|union.+select|convert.+\\\\(.*from)"
at ARGS:els.
[file "/usr/local/apache/conf/modsec2.user.conf"]
[line "359"]
[id "300016"]
[rev "2"]
[msg "Generic SQL injection protection"]
[severity "CRITICAL"]
[hostname "yoursite.com"]
[uri "/connectors/element/tv.php"]
[unique_id "TshG4EWntHMAAAfIFmUAAAAI"]
```

From this error, we need 3 pieces of information in order to whitelist a particular action. Take note of the following 3 items:

``` php 
[id "300016"]
[hostname "yoursite.com"]
[uri "/connectors/element/tv.php"]
```

This tells what rule was being tripped, what domain it was tripped on, and from what location inside that domain the rule is being tripped.

## Whitelisting a Rule for a Domain

Whitelisting a rule for a specific domain is accomplished through an "includes" file. This takes several steps to do safely.

### Rebuild the Apache Configuration

The first thing to do is to back up and rebuild the httpd.conf file to make sure there are no errors (run the following commands one at a time)

``` php 
cd /usr/local/apache/conf
cp -p httpd.conf httpd.conf.backup
```

If you're on a cPanel server, you can then rebuild the file by running the following command:

``` php 
/scripts/rebuildhttpdconf
```

The goal here is to verify that your existing Apache configuration file is backed-up and working _before_ we try modifying it.

### Edit the Virtual Hosts file

Many setups (include cPanel setups) don't want you messing directly with the main Apache configuration file. Instead, you'll edit the vhosts file for a given domain. Look through your main Apache configuration file (**httpd.conf**) and search for your domain name to see where it has outsourced its configuration files. You should find some references to it inside of a **VirtualHost** block.

``` php 
<VirtualHost 123.123.123.123>
    ServerName yoursite.com
    ServerAlias www.yoursite.com
    DocumentRoot /home/youruser/public_html
    # ... more stuff here ...
    Include "/usr/local/apache/conf/userdata/std/2/yoursite/*.conf"
    Include "/usr/local/apache/conf/userdata/std/2/yoursite/yoursite.com/*.conf"
</VirtualHost>
```

Based on this **VirtualHosts** directive, we can turn our attention to the 2 directories referenced:

- /usr/local/apache/conf/userdata/std/2/yoursite/
- /usr/local/apache/conf/userdata/std/2/yoursite/yoursite.com/

You can also set server-wide rules in the file:

- /usr/local/apache/conf/modsec2/whitelist.conf

That's where Apache will look for additional configurations. If you know you don't need to worry additional configuration files, you can skip ahead to the next section and simply add your whitelist rules. If you are running on a cPanel server or using some other type of setup where you either can't or shouldn't edit the main **httpd.conf** file directly, then you should place your rules into a separate configuration file. You may need to create the directories listed above, or perhaps you'll have to rtfm a bit more to figure out where Apache will look for additional configuration files.

## Add the Whitelist Rule

### Generic Example

The general whitelist rule looks like this:

``` php 
<LocationMatch "/path/to/URI">
  <IfModule mod_security2.c>
    SecRuleRemoveById (Rule number)
    SecRuleRemoveById (Rule number, if more for this domain)
    SecRuleRemoveById (etc)
    SecRuleRemoveById (etc)
  </IfModule>
</LocationMatch>
```

You can modify this and add it to your VirtualHosts directive (either in your main **httpd.conf** or inside your external **vhosts.conf** files). As long as Apache loads the configuration file, the whitelist rule will get registered.

### Specific Example

Give our sample error message earlier which identified the following error:

``` php 
[id "300016"]
[hostname "yoursite.com"]
[uri "/connectors/element/tv.php"]
```

We would go to the VirtualHosts directive for **yoursite.com** and add a rule like the following:

``` php 
<LocationMatch "/connectors/element/tv.php">
  <IfModule mod_security2.c>
    SecRuleRemoveById 300016
  </IfModule>
</LocationMatch>
```

Note that it references the MODX connector by its path and it references the ModSecurity rule by its id.

**Beware Moving your Site**
If you move your site to a new directory or if you move your **connectors** directory to a non-standard location, you will have to edit your rules! They apply to a specific URL, so if your URLs change, the rules will have to be updated.

### Broader Example

It can be maddening going through MODX functionality one admin screen at a time, but there seems to be some difficulty in white-listing entire directories. Consider renaming your "connectors" directory (see [Hardening MODX Revolution](administering-your-site/security/hardening-modx-revolution "Hardening MODX Revolution")).

``` php 
<LocationMatch "/manager/index.php">
SecRuleRemoveById 300016
</LocationMatch>

<LocationMatch "/connectors/resource/index.php">
  SecRuleRemoveById 300013 300014 300015 300016
</LocationMatch>

<LocationMatch "/connectors/element/tv.php">
  SecRuleRemoveById 300013 300016
</LocationMatch>
```

## Restart Apache

Once you've made the changes to your configuration files, you will need to restart Apache in order for the configurations to be re-read.

### cPanel: Rebuild Conf file

If you're not on a cPanel server, skip this step and just restart Apache.

On a cPanel server, you'll want to re-run the **rebuildhttpdconf** utility:

``` php 
cd /usr/local/apache/conf
/scripts/rebuildhttpdconf
```

Then you can check to see that the edits you made in your external files got slurped into the main file (again, this is ONLY on a cPanel setup: cPanel slurps up external configurations into the main **httpd.conf** file). Try browsing through the file to see that the stuff you put in the external file are now included in the main file.

### Restart Apache

Once you're edits have been made, restart the Apache process:

``` php 
/etc/init.d/httpd restart
```

If there are any errors in your files, you will be alerted to them. This can be nerve-wracking because if Apache does not come back on-line, **your site will be down!**

## Static Resources

ModSecurity can affect your MODX static resources (or any PHP script that reads a file for a user to download). What can happen is if your file is too large, the download will get terminated prematurely, and you end up with a corrupted file. Often the size of the downloaded file comes through as only about 64kb even though the original file may be significantly larger. If you experience this, it might be a good hint that ModSecurity is interfering. **There may not be a log entry for this** (!!!), so it can be very difficult to track this behavior back to ModSecurity!

In WHM, you can edit ModSecurity configuration settings by clicking the "Mod Security" plugin link (pictured earlier on this page), and clicking the "Edit Config" button.

The configuration details that can affect your downloads are the following:

- SecRequestBodyAccess
- SecRequestBodyLimit
- SecRequestBodyInMemoryLimit

An easy solution is to bypass ModSecurity entirely for downloads like this:

``` php 
SecRequestBodyAccess Off
```

See <http://www.modsecurity.org/documentation/modsecurity-apache/2.1.0/modsecurity2-apache-reference.html> for more information on the various configuration details.

Another cause of this enigmatic symptom can be a conflict between web servers: for example, if you have Apache and NGINX installed on the same server, _make sure that they both do not use gzip compression_ – the result can look very much like ModSecurity interfering! If NGINX compresses a large static resource and then Apache also tries to compress it, the effort fails and the file ends up clipping at 64kb.

## See Also

[ModSecurity Configuration Reference](http://www.modsecurity.org/documentation/modsecurity-apache/2.1.0/modsecurity2-apache-reference.html)

1. [MODx Revolution on Debian](getting-started/installation/basic-installation/modx-revolution-on-debian)
2. [Lighttpd Guide](getting-started/installation/basic-installation/lighttpd-guide)
3. [Problems with WAMPServer 2.0i](getting-started/installation/basic-installation/problems-with-wampserver-2.0i)
4. [Installation on a server running ModSecurity](getting-started/installation/basic-installation/installation-on-a-server-running-modsecurity)
5. [MODX and Suhosin](getting-started/installation/basic-installation/modx-and-suhosin)
6. [Nginx Server Config](getting-started/installation/basic-installation/nginx-server-config)
