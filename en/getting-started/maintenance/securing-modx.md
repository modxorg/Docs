git reset --hard HEAD~1

---
title: "Hardening MODX Revolution"
_old_id: "361"
_old_uri: "2.x/administering-your-site/security/hardening-modx-revolution"
---

## Overview

Hardening any web application, including MODX Revolution, involves auditing all layers of your site, including your server, all of its services, and the application itself. Make no mistake: it's a war out there. If you're not afraid, then you aren't paying attention. The simple act of having a website online will ensure that you will be targeted by hacks. Their motives vary, but the weakest link will be sought out and exploited.

Hardening is a huge topic, so this page seeks to help you identify what might be the most common attack vectors on your site and help you close them.

## Everything but MODX

There are **many** aspects to hardening that have nothing to do with MODX. We make perfunctory mention of them here, but this page is focused specifically on how to harden MODX. A thorough security audit will focus on the entire environment, so do not neglect to consider the following aspects:

### Your Computer

Using any version of Windows prior to Windows Vista is almost a death-wish. Hardening older Windows systems is a herculean effort and unless you are _extremely_ skilled and vigilant, your pre-Vista computer will likely contain severe security holes.

But don't be fooled: _ANY_ operating system can be hacked. Don't think you're impervious if you're on a Mac or Linux. Run as a user with limited permissions and keep your system patched and run dynamic intrusion detection software to protect you from key-loggers or screen-capture viruses. Never save your passwords or other login info as plain text, use secure software like [LastPass](https://lastpass.com/) to store your passwords.

NEVER use a public computer: for all you know, that computer is logging every username and password you type.

### Your Connection

Assume that someone is monitoring what you do any time you're connected to a public wifi network.

If possible, use _only_ wired connections (no Wifi). Never use public Wifi, and never use a wireless connection that uses anything less than [WPA2](http://en.wikipedia.org/wiki/Wpa2#WPA2) encryption. It's far too easy to intercept packets as they travel across a router. With only modest hacking skills, someone can read your usernames and passwords as they travel get beamed around the coffeeshop.

### Your Server

No matter how secure all other elements are, it amounts to nothing if your server is not adequately secure. If your FTP password is cracked, then there's nothing you can do to guarantee the integrity of your site. Turn off all unnecessary services and if possible, turn off FTP entirely in favor of SFTP. Consider turning off password authentication entirely in favour of [SSH keyed logins](http://tipsfor.us/2009/06/15/securing-a-linux-server-ssh-and-brute-force-attacks/), and if you use an SSH key, make sure you use a complex passphrase.

Make sure that your server has a good firewall installed and some form of intrusion detection that dynamically detects hacking attempts. [ModSecurity](getting-started/installation/troubleshooting/modsecurity) is a security module for Apache, and it helps deter a number of malicious attacks.

Update your server and its technologies often! If any weak link is discovered in any part of your server, it could be the crack in the dam that floods your entire site with a world of hurt. Keep your server patched!

### Passwords and Logins

Choose long, randomly generated passwords and update them regularly. Longer passwords are usually more mathematically complex than shorter passwords, even if your passwords use special characters. [Salting](http://en.wikipedia.org/wiki/Salt_(cryptography)) your passwords with a easily-remembered phrase to increase the password length is a good technique to reduce the odds of a brute-force attack succeeding. Again, you **MUST** store your passwords securely, in some sort of encrypted format. It's far better to write your passwords in a notebook that you keep in a locked filing cabinet than it is to keep them in a plaintext file on your computer.

Very important: **never use the same password twice.** Frequently hacks succeed because one service is compromised and the password deciphered, and a user has ignorantly or lazily used the same password for other sites or services. **DO NOT BE LAZY!!!**

### Keep it Clean

Delete anything unnecessary from your site. Delete any unused images or javascript files. Especially bad are any lingering PHP scripts or god-forbid, any backups or zip files inside of your document root. Think of your site as a sinking airship: if you don't need it, throw it out before you crash and burn. If you're not using a particular Plugin, Snippet, or template, for example, then delete its files from your server. Just because it's not activated doesn't mean it can't be exploited!

### Backups

One of the most important things you can do for your web site is to set up incremental, off-site backups. There is never a guarantee that you won't get hacked, so the best thing you can do is to ensure that at a minimum, you have backups to restore your site if and when it gets nuked.

### Social Engineering

Many hacks involve some plain old trickery: someone calling or emailing you and asking for information under false pretexts. Don't be fooled! Are you SURE it's your client asking you for their password? Or is it someone who got into their email account? For a good read, check out Kevin Mitnick's [Ghost in the Wires](http://www.amazon.com/Ghost-Wires-Adventures-Worlds-Wanted/dp/0316037702): he was able to get the source code from many LARGE companies merely by placing believable phone-calls to the right person.

## Locking down MODX

You'll notice that this is only one small section of the hardening process. Remember: MODX is only one aspect of your environment, so do not neglect the previous section!

### Changing Default Paths

Unlike Evolution, MODX Revolution makes it fairly easy to change the names of its various folders and move the core outside the web root. Note that only the core can (and should) be moved outside the web root because the other directories must be accessible via the web. Changing the directory names is critical if you want to avoid your site being fingerprinted and ending up on the speed-dial list of every hacker-bot out there.

The Advanced Distribution allows you to specify the names and locations of the various directories during the install, but it won't install successfully on some hosts.

Before you do any of this, make a backup of your site and your database!

#### core

This is perhaps the most important path to change. Move your core directory **out** of the web server's document root. You don't want anyone poking around in there via a browser and exploiting any potential weaknesses. One simple place to put it is simply one folder above your document root, i.e. `<sub>/core/</sub>` instead of `/public_html/core/`. Once you move it, you'll have to update the following configuration details:

- core/config/config.inc.php (change the **$modx\_core\_path** variable)
- /config.core.php (at the site root)
- /connectors/config.core.php
- /manager/config.core.php
- The **modx\_workspaces** database table (this is only necessary in older versions of MODX) – this is best done by re-running the setup as you might do when [moving your site](getting-started/maintenance/moving-your-site)

**Important:** If you move and/or rename the core, you'll also have to modify the processors path ($modx\_processors\_path) in the config.inc.php file unless it is defined relative to the core directory, since the processors directory is under the core directory.

You'll probably want to go ahead and update the other paths, but just keep in mind that once you're done, you'll should run the setup to ensure that all your paths are clean.

#### manager

The manager is arguably the second most important path to change. After all, if someone sees that you've got a nice MODX login page at <http://yoursite.com/manager/> it won't take a genius to figure out that you're running MODX and the brute-force hacking attempts can begin.

Choose a randomly generated alphanumeric bit of text to use as your new manager folder. For maximum compatibility, it should use only lowercase letters. Then update the **core/config/config.inc.php** file to something like the following:

``` php
$modx_manager_path = '/home/youruser/public_html/r4nd0m/';
$modx_manager_url = '/r4nd0m/';
```

Moving the manager will avoid the fingerprinting bots from easily sniffing your site out as a MODX site, but it's still possible that someone could eventually find your new manager directory (not easy, but entirely possible). For an even more thorough solution, you could put the manager URL on a completely different domain, e.g. `<strong>$modx_manager_url</strong>``= 'http://othersite.com/r4nd0m/';` This would require that you have multiple domains on your server, but the advantage here is that it would really throw off attempts to hack your site because it wouldn't be clear that the 2 domains are related, but it would require far more sysadmin work to make this type of setup work.

You can also lock down access to the manager by configuring your server and/or its firewall to allow access to the manager url from specific IP addresses. E.g. if your site is only accessed by workers in an office, you could configure your server to deny requests from outside the office's IP addresses. Another tactic would be to put an .htaccess password on the manager directory. This would mean that users would have to enter 2 separate passwords before entering the MODX manager. Perhaps that's not convenient, but it is more secure.

#### connectors

Just as with the manager directory, choose a random alphanumeric name for your **connectors** directory, and then update your core/config/config.inc.php to reflect the new location, e.g.

``` php
$modx_connectors_path = '/home/youruser/public_html/0therp4th/';
$modx_connectors_url = '/0therp4th/';
```

As with the manager, this could also potentially live on a separate domain, however as the manager uses the connectors as AJAX endpoints, this needs to be on the same domain as the manager unless you also allow cross origin requests.

#### assets

The assets URL can be changed, but this is the lowest priority change because anyone visiting your site will be able to examine the source HTML and see the paths to this directory. But it's good to change anyway, simply to confuse any efforts at fingerprinting.

``` php
$modx_assets_path = '/home/youruser/public_html/4ssetsh3r3/';
$modx_assets_url = '/4ssetsh3r3/';
```

Again, this could potentially live on another domain (e.g. one optimized to serve up static content). As extras install their javascript here for back-end components, this will typically need to share the same domain (origin), unless you set up cross origin requests. You can use Media Sources in MODX to place your front-end assets or uploads anywhere, so keeping the assets on the same domain as the manager is usually best.

### Path Followup

After changing all these paths, save the new locations in a secure place (as with your passwords), and then re-run the MODX setup utility to ensure that everything was set correctly.

Doing this will make your site more secure, but updating your site will become more complex: you will have to merge the various component directories one at a time for each MODX update.

### Change your Login Page

You can also mask your manager login page so it's not obvious that you're running MODX. See the page on [Manager Templates](building-sites/client-proofing/custom-manager-themes) for more information.

### Changing Default Database Prefixes

This is best done when you first install MODX, but it's always a good habit to avoid the defaults and choose a custom database prefix for your tables instead of the default **modx\_** prefix. If a hacker is somehow able to issue arbitrary SQL commands via a SQL injection attack, using custom table prefixes will make the attack just that much more difficult.

### Use a unique name for the Admin User

If your admin username is hard to guess, it will slow down any attempt at a brute-force hack. A randomly generated series of characters would make for the most secure username. Never use a name that is easy to guess (do NOT EVER use a username like **admin**, **manager**, or a name that matches the site's name – they're too easy to guess). Remember that a big part of hacking is [social engineering](http://en.wikipedia.org/wiki/Social_engineering_(security)) – you want to make it virtually impossible for someone to guess your admin user name.

### Force a Password Policy

Delete any stagnant users from your site (e.g. if you created a login for a developer when you first setup the site, be sure to deactivate that user once his/her work is done). Ensure that each user is using a complex password.

### Set up a dedicated 404 page

Don't just point your 404 page to your homepage. Set up a dedicated 404 page. We don't want our site to get any undue attention because a scanner thinks that you have a page on your site that you do not. E.g. if scanner looks for a known vulnerability at <http://yoursite.com/malicious/hack>, and the request comes back as an HTTP 200, then the scanner might think that you actually have that vulnerable file on your site, and it will attract other hacks or scans. You can use the FireFox "Web Developer" add-on (or several others) to view page headers and verify that 404s are actually 404s.

## Forcing SFTP Access

Never use plain FTP, it is insecure by design. If your server doesn't support SFTP or connecting over a secure shell, you'd be better off finding a different host.

## Adding an SSL Certificate to your Manager

Sending usernames and passwords via plaintext is silly: any fool hacker with an ounce of dedication can intercept them. If security is a priority, you should **always** access your MODX manager via a secure connection (i.e. via [HTTPS](http://en.wikipedia.org/wiki/HTTP_Secure)). While you're at it, you may as well decide to serve your entire site over HTTPS.

If you're unsure about how to set up a certificate, contact your hosting provider.

There are different options for certificates.

### Using a shared Certificate

Some hosts offer a shared SSL certificate per server. These are often ugly URLs such as server321.myhost.com/~myuser/manager/, but can be a quick and simple solution.

### Using a self-signed Certificate

Self-signed certificates are not trusted by browsers (for good reason), but it can be a viable option. While it doesn't prove to you that you are talking to the right server, it does allow the communication to be encrypted. [Read more about self-signed certificates here](http://en.wikipedia.org/wiki/Self-signed_certificate).

### Using a proper certificate

Proper certificates are issued by certificate authorities who usually charge you money for it, depending on the level of validation. Domain validation is the simplest which just validates that you have access to the domain you're requesting a certificate for, usually via email or by uploading a file to the server. Extended or Organisation validated certificates also verify that you are who you say you are, and as a result offer enhanced security for your visitors.

Many hosting providers have recently started offering free domain validated SSL certificates which can be installed with the click of a button.

### Forcing SSL connections to the Manager

Once you've got your site hooked up to use HTTPS, you need to force the manager (and the rest of the manager) to use SSL. First, you should confirm that both <http://yoursite.com/> AND <https://yoursite.com/> work as expected. Make sure to check for mixed content warnings which mean there are files included on the page that are loaded over a non-secure connection.

Once you've verified that HTTPS works, you can now modify your .htaccess file to force all connections to the manager to occur over port 443 (i.e. over a secure connection).

Inside your manager's folder (which you've changed by now from the default /manager/ directory), you should edit your **/manager/.htaccess** file to force a secure connection.

Here is a sample **.htaccess** file to put inside your manager directory:

``` php
RewriteEngine On
RewriteBase /
RewriteCond %{SERVER_PORT} 80
RewriteRule ^(.*)$ https://example.com/manager/$1
```

Test this by trying to navigate to the non-secure url, e.g. <http://yoursite.com/manager> – if it doesn't redirect to HTTPS, you'll have to tweak the .htaccess.

## Monitoring your Site and Server

Once you've locked down your site and server, you'll benefit from regular monitoring of it. There are some free services available. The best ones will monitor specific files and report any changes made to them. If your index.php suddenly changed, then that might indicate that somebody maliciously modified it.

Changing the [Manager Templates](building-sites/client-proofing/custom-manager-themes "Manager Templates and Themes") as per the documentation is a nice way to customize your login page!
