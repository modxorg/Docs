---
title: "Problems with WAMPServer 2.0i"
_old_id: "1119"
_old_uri: "2.x/getting-started/installation/basic-installation/problems-with-wampserver-2.0i"
---

How to get WAMPServer 2.0i working on MODx Revolution
-----------------------------------------------------

Mary (einsteinsboi) has a great blog post about using WAMPServer 2.0i with MODx Revolution, and some problems you might encounter.

<http://codingpad.maryspad.com/2010/01/11/modx-revolution-and-wamp/>

A short summary and explanation is below.

WAMPServer uses mismatched MySQL Server and Client builds
---------------------------------------------------------

Usually it is best to make sure in any server configuration that your MySQL server and client build versions are the same. WAMPServer allows you to start your stack with different versions of PHP/MySQL combinations.

The problem child comes in WAMPServer 2.0i's PHP 5.2.11 version. It sets its server version at 5.1.36, but its client version at 5.0.51a. MODx [does not support 5.0.51a](/revolution/2.x/getting-started/server-requirements/mysql-5.0.51-issues "MySQL 5.0.51 Issues"), and therefore will not install with this configuration.

The Solution
------------

To fix it, simply start WAMPServer with the PHP 5.3.0 build. WAMPServer 2.0i will set the server to 5.1.36, and the client to 5.0.5-dev. While still not optimal, this will allow Revolution to run smoothly without MySQL hiccups.