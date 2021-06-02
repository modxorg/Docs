---
title: "Hardening MODX Revolution"
_old_id: "361"
_old_uri: "2.x/administering-your-site/security/hardening-modx-revolution"
---

## Overview

Any publicly viewable website will be targeted by hackers and [script kiddies](https://en.wikipedia.org/wiki/Script_kiddie). There is simply no site too small today and automated tools make it easy to deploy attacks to deface your site, to create backlinks to other webistes, to infect unsuspecting site visitors with malware, to run cryptomining scripts, to send email spam from your domain, to create phishing sites, to redirect to sites that sell pills or porn, or worse…

Hardening any web application, including MODX Revolution, involves paying attention to _all_ layers of your site. This includes your server, all of its services, and the application itself.

This is a huge topic so this page seeks to help you both harden MODX and inform you of other important areas.

## Top Four Ways to Harden MODX

This is only one part of the security hardening process. Before you do any of this, though, make a backup of your site and your database!

The top four things you should tackle are 1) blocking the core from being web accessible, 2) blocking the `manager` on the public domains and use a subdomain for the Manager, 3) put a WAF in front of your website, and 4) always keep your server, MODX version and Extras updated. The other items will further help make MODX more difficult to identify and provide incremental layers of of secuirty or obsfuscation, but the tradeoff is increased time and complexity for updating or moving your website.

### Protect the Core and Other Locations

This is perhaps the most important step to take because the MODX core contains code that can do _very bad things™_ in the hands of malicious users. You don’t want anyone poking around via a browser and finding or exploiting potential weaknesses.

While previous versions of MODX Revoution allowed you to move the core outside of the web root, this is not currently possible due to how Composer and Autoloading work in MODX 3.0. However, you can accomplish the same level of security by denying public web access to the `core` directory.

The following examples block the `core` and anything within it from from being publicly accessed. Note, this is returning a 404 (not found) vs a 403 (unauthorized) response on purpose:

For Apache, add the following to you `.htaccess` file:

```
RewriteCond %{HTTP_HOST} ^(www\.)?example\.com$ [NC]
# Block access to dotfiles and folder people have no need to touch
RewriteRule ^(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php)  /index.php?q=doesnotexist [L,R=404]
```

For NGINX, add the following to your web rules which will pass the rewrites to the MODX error handler:

```
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    rewrite ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) /index.php?q=doesnotexist;    
}
```

If you have a high-traffic site, you might wish to bypass the PHP processing with MODX, and directly return a 404 from NGINX (or 444, which drops the connection without returning anything):

```
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    return 404;    
}
```

Note: this will use the default NGINX 404 error page, which almost certainly won’t match your MODX-specified Error Page. You may wish to make a custom error page that matches your MODX error page for an extra layer of obsfuscation. Create raw HTML files in your web root and add the following to your NGINX web rules. As a bonus, the custom 500 error page can contain important contact information and a branded logo if your site is erroring or if the database is overloading causing a 502 or 504. You may also want to create more custom error pages for the various other [4xx and 5xx error codes](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status):

```
error_page 404 /custom_404.html;
error_page 500 502 503 504 /custom_500.html;
```

See [example code for a custom error page](https://gist.github.com/jaygilmore/8a56e0f58c9ae50b82d349c26067eec4).

### Protect the Manager

The MODX Manager directory is arguably the second most important path to protect. If someone finds a nice MODX login page at <http://example.com/manager/> it won’t take a genius to determine that it runs MODX and the brute-force hacking attempts can begin.

Ideally, you would not allow access to the Manager on the same URL that runs your website at all, similar to the `core` protection above. For example, you might configure a subdomain to use for editing the pages like **cms.example.com** (or something preferably even more obscure/non-obvious.

For NGINX, add the following to your web rules, using all the public (sub)domains that you might use for yoru site:

```
# only allow manager access on cms.example.com
set $mgrcheck $host$request_uri;
if ($mgrcheck ~* "((?<!cms.)example\.com/manager)") {
    rewrite /manager /index.php?q=doesnotexist;    
}
```

Or if you have a custom 404 page implemented per the previous section:

```
set $mgrcheck $host$request_uri;

if ($mgrcheck ~* "((?<!cms.)example\.com/manager)") {
    return 404;    
}
```

For Apache, add the following to your `.htaccess` file:

```
RewriteCond %{HTTP_HOST} ^(www\.)?example\.com$ [OR]
RewriteCond %{HTTP_HOST} ^promos\example\.com$ [OR]
RewriteCond %{HTTP_HOST} ^blog\.example\.com$ [NC]
RewriteRule ^manager/ /index.php?q=doesnotexist [L,R=404]
```

You can also further lock down access to the Manager by configuring your server and/or its firewall to allow access to the Manager URL only from specific IP addresses. E.g. if your site is only accessed by workers in an office, you could configure your server to deny requests from outside the office’s IP addresses. Another tactic would be to put an .htaccess password on the manager directory. This would mean that users would have to enter 2 separate passwords before entering the MODX Manager. Perhaps that is inconvenient, but it is more secure.


### Deploy a Firewall or WAF

Make sure that your server has a good firewall installed with intrusion detection to dynamically detects and blocks common hacking attempts. [ModSecurity](getting-started/installation/troubleshooting/modsecurity) is a security module for both Apache and NGINX that helps deter a number of malicious attacks. You can also use a WAF (web application firewall) service from vendors like Cloudflare, Fastly, Imperva, StackPath, and others to block many brute force attackers and known bad actors.

### Update Your Server, MODX, and Extras

No matter how secure all other elements are, it amounts to nothing if your server is not adequately secure. If your server is compromised there is nothing you can do to guarantee the integrity of your site or even the entire server itself.

Always stay on top of server stack maintenance, including the software that powers encryption, your web server, your database, and remote connections. Patching your server software and core OS weekly, if not daily, is not uncommon. **Keep your server patched!**

Turn off all unnecessary services and if possible, and especially turn off FTP entirely in favor of SFTP.

Also turn off password authentication entirely in favour of [SSH keyed logins](http://tipsfor.us/2009/06/15/securing-a-linux-server-ssh-and-brute-force-attacks/). When using SSH keys, make sure to use a complex passphrase.

Finally, it’s critical to keep things upgraded to the latest version in MODX, too. When any release comes out that remotely mentions anythign that sounds like a security issue or bug, upgrade ASAP.

## Other Ways to Protect MODX

You can go to extremes to obsfuscate and further harden MODX—even so far as to make MODX look and respond like a completely different CMS platform. The following are some additional ways to protect MODX and make it more time consuming and difficult for hackers to succeed.

### Change Common Paths

Easily identifiable paths can be used as a way to fingerprint your site. While security through obscurity is not a strong tactic, it doesn’t make it simple for script kiddies using automated tools to attack your site if a future zero-day compromise is released.

The Advanced Distribution and Git Installs of MODX Revolution allow you to specify the names and locations of the various directories during the install, but these won’t install successfully on some hosts.

After changing any paths, save the new locations in a secure place (as with your passwords), and then re-run the MODX setup utility to ensure that everything was set correctly.

Doing this will make your site more secure, but updating your site will become more complex: you will have to merge the various component directories one at a time for each MODX update.

#### manager

You can also choose a randomly generated alphanumeric bit of text to use as your new `manager` directory. For maximum compatibility, it should use only lowercase letters. Then update the `core/config/config.inc.php` file to something like the following:

``` php
$modx_manager_path = '/home/youruser/public_html/r4nd0m/';
$modx_manager_url = '/r4nd0m/';
```

#### connectors

Just as with the `manager` directory, choose a random alphanumeric name for your `connectors` directory, and then update your core/config/config.inc.php to reflect the new location, e.g.:

``` php
$modx_connectors_path = '/home/youruser/public_html/0therp4th/';
$modx_connectors_url = '/0therp4th/';
```

As with the Manager, this could also _potentially_ live on a separate domain. However as the Manager uses the connectors as AJAX endpoints, this needs to be on the same domain as the Manager unless you also allow cross origin requests.

#### assets

The assets URL can be changed, but this is the lowest priority change because anyone visiting your site will be able to examine the source HTML and see the paths to this directory. But it can obsfuscate and prevent any simple canned fingerprinting efforts.

``` php
$modx_assets_path = '/home/youruser/public_html/4ssetsh3r3/';
$modx_assets_url = '/4ssetsh3r3/';
```

Again, this could potentially live on another domain (e.g. one optimized to serve up static content). As extras install their javascript here for back-end components, this will typically need to share the same domain (origin), unless you set up cross origin requests. You can use Media Sources in MODX to place your front-end assets or uploads anywhere, so keeping the assets on the same domain as the manager is usually best.

### Change your Manager Login Page Template

You can mask your Manager login page so it’s not obvious that your site is powered by MODX. See the page on [Manager Templates](building-sites/client-proofing/custom-manager-themes) for more information.

### Change the Default Database Prefixes

This is best done when you first install MODX, but it’s always a good habit to avoid the defaults and choose a custom database prefix for your tables instead of the default `modx_` prefix. If a hacker is somehow able to issue arbitrary SQL commands via a SQL injection attack, using custom table prefixes will make the attack a bit more difficult.

### Set up a Dedicated 404 Page

Don’t just point your 404 page to your homepage. Set up a dedicated 404 page.

You don’t want your site to get any undue attention because a scanner thinks that you have a page on your site that you do not. E.g., if scanner looks for a known vulnerability at <http://yoursite.com/malicious/hack>, and the request comes back as an HTTP 200, then the scanner might think that you actually have that vulnerable file on your site, attracting other hacks and scans. You can use the FireFox “Web Developer” add-on (or several others) to view page headers and verify that 404s are actually 404s.

## Everything Else

There are **many** aspects to hardening that have nothing to do with MODX. While we make perfunctory mention of them here, this page is primarily focused on how to harden MODX itself. A thorough security audit will take the entire environment into account, so do not neglect to consider the following aspects:

### Backups

One of _the most important things you can do for your web site_ is to have multiple, incremental, off-site backups, on redundant storage like S3. There is never a guarantee that you won’t get hacked, so the best thing you can do is to ensure that at a minimum, you have backups to restore your site if and when it gets nuked. If this happens, make sure you quickly update the MODX version and all Extras before putting it back online, and use a malicious file scanning tool to make sure there are no obvious backdoors laying around. Learn more about [recovering from a site hack](https://modx.com/blog/recovering-from-a-hacked-site-part-1) in the MODX Blog.

### Use a Unique Name for the Admin User

If your admin username is hard to guess, it will slow down any attempt at a brute-force hack. A randomly generated series of characters would make for the most secure username. Never use a name that is easy to guess (do NOT EVER use a username like **admin**, **manager**, or a name that matches the site’s name as they’re very easy to guess). Remember that a big part of hacking is [social engineering](http://en.wikipedia.org/wiki/Social_engineering_(security)) – you want to make it virtually impossible for someone to guess your admin user name.

### Force a Password Policy

Delete any stagnant users from your site (e.g. if you created a login for a developer when you first setup the site, be sure to deactivate that user once his/her work is done). Ensure that each user is using a complex password.

### Force SSH/SFTP Access

It bears repeating, never use plain FTP: it is insecure by design. Even better is only using SFTP with SSH keypairs. If your server doesn’t support SFTP or connecting over a secure shell, you’d be better off finding a different host.

### DB Admin Tools

Tools like Adminer and phpMyAdmin can be very useful for quick fixes to your site. As soon as you’re done, delete them, or it’s possible that a clever hacker could do the same to your website.

## Always Use SSL

Serving your site via an [HTTPS](http://en.wikipedia.org/wiki/HTTP_Secure) connection is table stakes for the web today. Even Google penalizes sites not served over HTTPS in their SERP algorithm. Obtain, install, and keep your server running a modern SSL cypher and renew your SSL certificates frequently.

Once you’ve verified that HTTPS works, you can force all connections to communicate over port 443 (i.e. over a secure connection).

Here is a sample `.htaccess` rule for Apache:

```
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://example.com/$1 [L,R=301]
```

And here’s how to accomplish the same thing in NGINX:

```
# The intended URL is "www.example.com" over HTTPS.

if ($scheme != "https") {
    return 301 https://www.example.com$request_uri;
}

# Handles redirects for the "www." on the intended URL and
# allows other URLs to work when requested over HTTPS

if ($host = "example.com") {
    return 301 https://www.example.com$request_uri;
}
```

Test this by trying to navigate to the non-secure url, e.g. <http://yoursite.com/manager> – if it doesn’t redirect to HTTPS, tweak your `.htaccess` file or NGINX web rules.

If you’re unsure about how to isntall an SSL certificate and always force serving over HTTPS, contact your hosting provider.

## Monitoring your Site and Server

Once you’ve locked down your site and server, you’ll benefit from regular monitoring of it. There are some free services available. The best ones will monitor specific files and report any changes made to them. If your index.php suddenly changed, then that might indicate that somebody maliciously modified it.

### Passwords and Logins

Choose long, randomly generated passwords and update them regularly. Longer passwords are usually more mathematically complex than shorter passwords, even if your passwords use special characters. [Salting](http://en.wikipedia.org/wiki/Salt_(cryptography)) your passwords with a easily-remembered phrase to increase the password length is a good technique to reduce the odds of a brute-force attack succeeding. Again, you **MUST** store your passwords securely, in some sort of encrypted format. It’s far better to write your passwords in a notebook that you keep in a locked filing cabinet than it is to keep them in a plaintext file on your computer.

Very important: **never use the same password twice.** Frequently hacks succeed because one service is compromised and the password deciphered, and a user has ignorantly or lazily used the same password for other sites or services. **DO NOT BE LAZY!!!**

### Your Computer

Using any version of Windows prior to Windows Vista is almost a death-wish. Hardening older Windows systems is a herculean effort and unless you are _extremely_ skilled and vigilant, your pre-Vista computer will likely contain severe security holes.

But don’t be fooled: _ANY_ operating system can be hacked. Don’t think you’re impervious if you’re on a Mac or Linux. Run as a user with limited permissions and keep your system patched and run dynamic intrusion detection software to protect you from key-loggers or screen-capture viruses. Never save your passwords or other login info as plain text, use secure software like your Browser’s or a third-party Password Manager to store your passwords.

NEVER use a public computer: for all you know, that computer is logging everything, including every username and password, you type.

### Your Connection

Assume that someone is monitoring what you do any time you’re connected to a public wifi network.

If possible, use _only_ wired connections (no Wifi). Never use public Wifi, and never use a wireless connection that uses anything less than [WPA2](http://en.wikipedia.org/wiki/Wpa2#WPA2) encryption. It’s far too easy to intercept packets as they travel across a router. With only modest hacking skills, someone can read your usernames and passwords as they beam around the coffeeshop.

### Keep it Clean

Delete anything unnecessary from your site. Delete any unused images or javascript files. Especially bad are any lingering PHP scripts or god-forbid, any backups or zip files inside of your document root. Think of your site as a sinking airship: if you don’t need it, throw it out before you crash and burn. If you’re not using a particular Plugin, Snippet, or Template, for example, then delete its files from your server. Just because it’s not activated doesn’t mean it can’t be exploited!

### Social Engineering

Many hacks involve some plain old trickery: someone calling or emailing you and asking for information under false pretexts. Don’t be fooled! Are you SURE it’s your client asking you for their password? Or is it someone who got into their email account? For a good read, check out Kevin Mitnick’s [Ghost in the Wires](http://www.amazon.com/Ghost-Wires-Adventures-Worlds-Wanted/dp/0316037702): he was able to get the source code from many LARGE companies merely by placing believable phone-calls to the right person.

Securing a website is a continuous and constant requirement today. Be vigilant, review the considerations above, lock down MODX, and always keep up with updates to both MODX and your server.
