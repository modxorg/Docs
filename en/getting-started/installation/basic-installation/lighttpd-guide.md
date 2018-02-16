---
title: "Lighttpd Guide"
_old_id: "169"
_old_uri: "2.x/getting-started/installation/basic-installation/lighttpd-guide"
---

<div>- [Lighttpd Guide for Setup and Friendly URLs.](#LighttpdGuide-LighttpdGuideforSetupandFriendlyURLs.)
  - [Friendly URL Setup](#LighttpdGuide-FriendlyURLSetup)

</div>Lighttpd Guide for Setup and Friendly URLs.
-------------------------------------------

<div class="note">- This is still a work in progress, and currently only covers the URL rewriting aspect.
- This guide assumes you already have a working lighttpd, mysql, and PHP installation.
- This guide only covers proper settings and the use of friendly URL Rewriting.

</div>### Friendly URL Setup

<div class="note">lighttpd does not use the same system, or even same idea as Apache does for URL rewriting. All URL rewriting is done in the lighttpd.conf file</div>- First we need to make sure that the URL rewriting module is enabled. 
  - So open your lighttpd.conf config file (In Linux it is usually located in /etc/lighttpd/lighttpd.conf)
  - Look for the directive server.modules.
  - Under this directive, look for an entry named "mod\_rewrite",.
  - By default it has a # in front of it. This is a comment symbol. Please remove the # from the line and save the file.

- Next we need to find the location in which to put the friendly URL code. 
  - So lets search for something that looks like this: ```
      <pre class="brush: php">
         $SERVER["socket"] == ":80" {
        $HTTP["host"] =~ "yourdomainname.com" {
          server.document-root = "/path/to/your/doc/root"
          server.name = "yourservername"
          
      
      ```
  - Directly under this you should add the following code. ```
      <pre class="brush: php">
      url.rewrite-once = ( "^/(assets|manager|core|connectors)(.*)$" => "/$1/$2",
                               "^/(?!index(?:-ajax)?\.php)(.*)\?(.*)$" => "/index.php?q=$1&$2",
                               "^/(?!index(?:-ajax)?\.php)(.*)$" => "/index.php?q=$1"
                         )
      
      ```

<div class="note">This does not mean you are done! Lighttpd handles url-rewrites a bit differently. You HAVE to exclude any files or folders you do not want rewritten in the config file. Excluded dirs/files in the example above are (assets|manager|core|connectors). If you wish to add more to these, simple add another | followed by the folder or filename you wish to omit from url rewriting.</div><div class="tip">After this is done, you will have working friendly URLs again in lighttpd.</div>