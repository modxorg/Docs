---
title: "MODX and Suhosin"
_old_id: "202"
_old_uri: "2.x/getting-started/installation/basic-installation/modx-and-suhosin"
---

- [Known Issues with Suhosin](#MODXandSuhosin-KnownIssueswithSuhosin)
  - [Recommended Configuration](#MODXandSuhosin-RecommendedConfiguration)
- [See Also](#MODXandSuhosin-SeeAlso)



## Known Issues with Suhosin 

Suhosin is a PHP extension that adds extra security measures to PHP. One of these, however, is a check to prevent access on a server if a GET variable is too long. This causes issues in the MODX manager in versions equal to or later than 2.2, as MODX uses [Google minify](http://code.google.com/p/minify) to minimize and compress the JavaScript in the manager.

This is remedied in setup/, as during MODX installation, MODX will attempt to find the value of suhosin.get.max\_value\_length, and if it's lower than 1024, turn off JS compression in the manager.

### Recommended Configuration 

If the user has suhosin on, and wants JS compression, it is recommended to set the offending param value to a higher limit, such as 4096 or greater. This can be done by editing the php.ini file and restarting the server:

```
<pre class="brush: php">
suhosin.get.max_value_length = 4096

```In some cases, it may also happen that some functionality doesn't work as expected due to the use of the eval() statement and suhosin blocking that as well. If that happens, you can disable it using the following configuration:

```
<pre class="brush: php">
suhosin.executor.disable_eval 0

```If you cannot edit the php.ini directly, consult with your host on the best way to set up these configurations. Some hosts might allow changing it through htaccess files, a control panel interface or they can do it for you.

## See Also 

1. [MODx Revolution on Debian](getting-started/installation/basic-installation/modx-revolution-on-debian)
2. [Lighttpd Guide](getting-started/installation/basic-installation/lighttpd-guide)
3. [Problems with WAMPServer 2.0i](getting-started/installation/basic-installation/problems-with-wampserver-2.0i)
4. [Installation on a server running ModSecurity](getting-started/installation/basic-installation/installation-on-a-server-running-modsecurity)
5. [MODX and Suhosin](getting-started/installation/basic-installation/modx-and-suhosin)
6. [Nginx Server Config](getting-started/installation/basic-installation/nginx-server-config)