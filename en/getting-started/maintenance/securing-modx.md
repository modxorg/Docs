---
title: "Hardening MODX Revolution"
_old_id: "361"
_old_uri: "2.x/administering-your-site/security/hardening-modx-revolution"
---

Automated tools scan every public site, small sites included. They deface sites, inject malware into visitors, or turn sites into spam relays and phishing redirects.

Hardening means covering _all_ layers: the server, its services, and the application itself. This page focuses on MODX.

## Top four ways to harden MODX

Before any of this, make a backup of your site and your database.

1. Block the `/core/` directory from being web-accessible.
2. Block public access to `manager`, or obfuscate it by renaming it or moving it to a subdomain.
3. Always keep your server, MODX core, and Extras updated.
4. Put a WAF in front of your website.

The sections below add incremental layers of security, or obfuscation, and make MODX harder to identify. The tradeoff is extra time and complexity when updating or moving the site.

### Protect the core and other locations

The core contains code that can do serious damage in the hands of malicious users.

Previous versions of MODX Revolution let you move the core outside the web root; in 3.x the core folder can no longer be moved to a custom path or renamed, because Composer generates the autoloader with the `core` path baked in ([#15476](https://github.com/modxcms/revolution/issues/15476)). Denying public web access to the `core` directory gives you the same protection.

The following examples block `core` and everything inside it from being publicly accessed. They return a 404 (not found) instead of a 403 (unauthorized) on purpose.

For Apache, add the following to your `.htaccess` file:

``` apache
RewriteCond %{HTTP_HOST} ^(www\.)?example\.com$ [NC]
# Block access to dotfiles and folder people have no need to touch
RewriteRule ^(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php)  /index.php?q=doesnotexist [L,R=404]
```

To show your own error page, specify its path in `.htaccess`, for example:

``` apache
ErrorDocument 404 /404
```

For NGINX, add the following to your web rules; it passes the rewrites to the MODX error handler:

``` nginx
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    rewrite ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) /index.php?q=doesnotexist;
}
```

On a high-traffic site you may prefer to bypass PHP and return a 404 from NGINX directly (or 444, which drops the connection without returning anything):

``` nginx
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    return 404;
}
```

The default NGINX 404 error page will not match your MODX error page; to keep the fingerprint consistent, serve your own. Create raw HTML files in your web root and add the following to your NGINX rules. The custom 500 page can also carry contact details and a logo when the site errors or the database overloads into a 502 or 504. More [4xx and 5xx error codes](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status) can get their own pages:

``` nginx
error_page 404 /custom_404.html;
error_page 500 502 503 504 /custom_500.html;
```

See [example code for a custom error page](https://gist.github.com/jaygilmore/8a56e0f58c9ae50b82d349c26067eec4).

### Protect the Manager

The Manager directory is the second most important path to protect. A MODX login page at <http://example.com/manager/> identifies the platform and invites brute-force attempts.

Rather than renaming the `manager` directory, use the `manager_login_url_alternate` system setting (area `authentication`): it makes MODX redirect unauthenticated Manager requests to any URL you choose, for example a login page on a less obvious path. The standard directory layout stays in place, upgrades stay painless, and the fingerprintable `/manager/` login URL disappears.


Ideally the Manager should not be reachable on the URL that runs your website at all, as with the `core` protection above: serve editing from a subdomain such as **cms.example.com**, or something even less obvious.

For NGINX, add the following to your web rules, listing all the public (sub)domains you might use for your site:

``` nginx
# only allow manager access on cms.example.com
set $mgrcheck $host$request_uri;
if ($mgrcheck ~* "((?<!cms.)example\.com/manager)") {
    rewrite /manager /index.php?q=doesnotexist;
}
```

Or, if you implemented a custom 404 page in the previous section:

``` nginx
set $mgrcheck $host$request_uri;

if ($mgrcheck ~* "((?<!cms.)example\.com/manager)") {
    return 404;
}
```

For Apache, add the following to your `.htaccess` file:

``` apache
RewriteCond %{HTTP_HOST} ^(www\.)?example\.com$ [OR]
RewriteCond %{HTTP_HOST} ^promos\example\.com$ [OR]
RewriteCond %{HTTP_HOST} ^blog\.example\.com$ [NC]
RewriteRule ^manager/ /index.php?q=doesnotexist [L,R=404]
```

You can also lock down the Manager by allowing access to its URL only from specific IP addresses, at the server or firewall level. If the site is only edited from one office, deny requests from outside its IP range. Another tactic is an `.htaccess` password on the manager directory: users then enter two passwords before the MODX Manager, which is inconvenient but more secure.

### Deploy a firewall or WAF

Install a good firewall with intrusion detection on your server so common hacking attempts are detected and blocked dynamically.

[ModSecurity](getting-started/installation/troubleshooting/modsecurity) is a security module for both Apache and NGINX that deters a number of malicious attacks. A WAF (web application firewall) service from vendors like Cloudflare, Fastly, Imperva, StackPath and others blocks many brute-force attackers and known bad actors.

### Update your server, MODX, and extras

However secure the rest is, a compromised server defeats it: nothing guarantees the integrity of your site after that.

Patch the whole stack regularly: the OS, your web server, your database, remote connections and the encryption libraries behind them. **Keep your server patched!** Turn off services you do not need.

Keep MODX upgraded too: when a release mentions a security issue or a bug, upgrade as soon as you can.

## Other ways to protect MODX

You can go as far as making MODX look and respond like a different CMS; the measures below raise the effort an attacker needs.

### Change common paths

Easily identifiable paths are used to fingerprint your site. Obscurity is not a strong tactic on its own, but it does make automated attacks harder to aim after a future zero-day compromise.

The Advanced Distribution and Git installs let you specify the names and locations of the directories during the install, but these will not install successfully on some hosts.

After changing any paths, save the new locations in a secure place, as with your passwords, and re-run the MODX setup utility to confirm everything was set correctly.

The site becomes harder to identify, but updating it becomes more complex: you will merge the various component directories one at a time for each MODX update.

#### manager

Choose a randomly generated alphanumeric string as your new `manager` directory. For maximum compatibility, use only lowercase letters. Then update `core/config/config.inc.php`:

``` php
$modx_manager_path = '/home/youruser/public_html/r4nd0m/';
$modx_manager_url = '/r4nd0m/';
```

#### connectors

As with the `manager` directory, choose a random alphanumeric name for `connectors` and update `core/config/config.inc.php`:

``` php
$modx_connectors_path = '/home/youruser/public_html/0therp4th/';
$modx_connectors_url = '/0therp4th/';
```

The connectors could also live on a separate domain, but the Manager uses them as AJAX endpoints, so they must stay on the Manager's domain unless you allow cross-origin requests.

#### assets

The assets URL can be changed, but this is the lowest priority change: anyone visiting your site can examine the source HTML and see the paths. It still defeats simple canned fingerprinting.

``` php
$modx_assets_path = '/home/youruser/public_html/4ssetsh3r3/';
$modx_assets_url = '/4ssetsh3r3/';
```

Assets could live on another domain, for example one optimized for static content, but extras install their JavaScript here for back-end components, so the same origin is normally required unless you set up cross-origin requests. Media Sources can place front-end assets or uploads anywhere, so keeping assets on the Manager's domain is usually best.

### Change your Manager login page template

Mask the Manager login page so it is not obvious that your site is powered by MODX. See [Manager Templates](building-sites/client-proofing/custom-manager-themes).

### Change the default database prefixes

A custom database prefix instead of the default `modx_` is best chosen at install time, but it is always worth avoiding the defaults. If a hacker gets arbitrary SQL commands through an SQL injection attack, a custom prefix makes the attack harder.

### Set up a dedicated 404 page

Do not point your 404 page at your homepage.

Otherwise a scanner probing <http://yoursite.com/malicious/hack> gets an HTTP 200 and concludes that the vulnerable file exists, which attracts further hacks and scans. Use the FireFox "Web Developer" add-on, or several others, to view page headers and verify that 404s are really 404s.


## Everything else

Hardening goes well beyond MODX; the essentials of a full security audit:

### Backups

Multiple, incremental, off-site backups on redundant storage like S3 are _the most important thing you can do for your web site_. No site is guaranteed to stay clean, so make sure you can restore at a minimum. When you do, update the MODX version and all Extras before putting the site back online, and scan for obvious backdoors with a malicious file scanning tool. Learn more about [recovering from a site hack](https://modx.com/blog/recovering-from-a-hacked-site-part-1) in the MODX Blog.

### Use a unique name for the admin user

A hard-to-guess admin username slows down every brute-force attempt; a randomly generated string is the most secure choice. Never use **admin**, **manager** or the site's own name. A big part of hacking is [social engineering](http://en.wikipedia.org/wiki/Social_engineering_(security)), so make the admin username impossible to guess.

### Force a password policy

Delete any stagnant users from your site (if you created a login for a developer during the initial setup, deactivate it once the work is done). Ensure that each user uses a complex password.

### Force SSH/SFTP access

Never use plain FTP: it is insecure by design. Better still, use only SFTP with [SSH keyed logins](http://tipsfor.us/2009/06/15/securing-a-linux-server-ssh-and-brute-force-attacks/) and a complex passphrase. If your server supports neither, find a different host.

### DB admin tools

Tools like Adminer and phpMyAdmin are useful for quick fixes. Delete them as soon as you are done, or a hacker may use them on your website too.

## Always use SSL

Serving your site via an [HTTPS](http://en.wikipedia.org/wiki/HTTP_Secure) connection is table stakes for the web today: browsers warn visitors when a connection is not secure. Obtain, install, and keep a modern SSL cipher on your server, and renew your SSL certificates frequently.

Once HTTPS works, force all connections over port 443.

A sample `.htaccess` rule for Apache:

``` apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://example.com/$1 [L,R=301]
```

The same in NGINX:

``` nginx
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

Test this by navigating to the non-secure url, e.g. <http://yoursite.com/manager>. If it does not redirect to HTTPS, tweak your `.htaccess` file or NGINX web rules.

If you are unsure how to install an SSL certificate and force HTTPS, contact your hosting provider.

## Monitoring your site and server

Once the site and server are locked down, monitor them. Free services exist; the best watch specific files and report any change: an `index.php` that suddenly changed may have been modified by someone else.

### Passwords and logins

Choose long, randomly generated passwords and update them regularly. Length matters more than special characters: a passphrase assembled from several easy-to-remember words resists guessing better than a short password with symbols. Store passwords securely, in encrypted form: a notebook in a locked filing cabinet beats a plaintext file on your computer.

**Never use the same password twice.** Hacks often succeed because one service is compromised, the password is deciphered, and the same user reuses it on other sites.

### Your computer

Any operating system can be hacked, whatever it is. Run as a user with limited permissions, keep the system patched, and use intrusion detection software against key-loggers and screen-capture viruses. Never save passwords or login info as plain text; use your browser's store or a third-party password manager.

Never use a public computer: for all you know, it logs everything you type, including every username and password.

### Your connection

Assume someone is monitoring what you do on a public wifi network.

Prefer wired connections. Never use a wireless connection weaker than [WPA2](http://en.wikipedia.org/wiki/Wpa2#WPA2): packets travelling across a router are easy to intercept, and usernames and passwords can be read off a coffee-shop connection with modest skills.

### Keep it clean

Delete anything unnecessary from your site: unused images or JavaScript files, lingering PHP scripts, and any backups or zip files inside your document root. An inactive Plugin, Snippet or Template still has files on the server, and not being activated does not mean it cannot be exploited.

### Social engineering

Many hacks are plain trickery: a call or an email asking for information under a false pretext. Be sure it is really your client asking for their password and not someone who got into their mailbox.
