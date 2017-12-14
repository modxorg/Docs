---
title: "cookieJar"
_old_id: "1724"
_old_uri: "revo/cookiejar"
---

<a name="cookieJar-WhatiscookieJar"></a>What is cookieJar?
----------------------------------------------------------

This extra includes a set of MODX Revolution snippets for setting, retrieving and deleting browser Cookies.

<a name="cookieJar-History"></a>History
---------------------------------------

cookieJar was first written by David Pede (davidpede) and released on April 23, 2014.

<a name="cookieJar-Download"></a>Download
-----------------------------------------

It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/cookiejar>

The source code and build script is also available on GitHub: <https://github.com/tasianmedia/cookiejar>

<a name="cookieJar-Bugs&FeatureRequests"></a>Bugs & Feature Requests
--------------------------------------------------------------------

Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/cookiejar/issues>

<a name="cookieJar-AvailableSnippets"></a>Available Snippets
------------------------------------------------------------

### <a name="cookieJar-AvailableSnippets-setCookie"></a>setCookie

The setCookie snippet can be called using the tag:

 `<pre class="brush: php">[[setCookie]]`<div class="note">setCookie can be called cached or un-cached.</div>### <a name="cookieJar-AvailableSnippets-getCookie"></a>getCookie

The getCookie snippet can be called using the tag:

 `<pre class="brush: php">[[getCookie]]`<div class="note">getCookie can be called cached or un-cached.</div><a name="cookieJar-AvailableProperties"></a>Available Properties
----------------------------------------------------------------

### <a name="cookieJar-AvailableProperties-setCookie"></a>setCookie

 <table><tbody><tr><th>Name</th> <th>Description   
</th> <th>Default Value   
</th> <th>Added in Version   
</th> </tr><tr><td>name</td> <td>The name of the cookie. \[REQUIRED\]</td> <td> </td> <td>1.0.0-pl</td> </tr><tr><td>value</td> <td>The value of the cookie. This value is stored on the clients computer, do not store sensitive information.</td> <td> </td> <td>1.0.0-pl</td> </tr><tr><td>expires</td> <td>The time the cookie expires. This is a Unix timestamp so is in number of seconds. Use `0` to set a session cookie. Use any date in the past to delete a cookie.</td> <td>0</td> <td>1.0.0-pl</td> </tr><tr><td>path</td> <td>The path on the server in which the cookie will be available on. Use `/` to make available within the entire domain.</td> <td>/</td> <td>1.0.0-pl</td> </tr><tr><td>domain</td> <td>The domain that the cookie is available to.</td> <td> </td> <td>1.0.0-pl</td> </tr><tr><td>secure</td> <td>Indicates that the cookie should only be transmitted over a secure HTTPS connection from the client.</td> <td>0</td> <td>1.0.0-pl</td> </tr><tr><td>httponly</td> <td>Indicates that the cookie will be made accessible only through the HTTP protocol. This means that the cookie wont be accessible by scripting languages, such as JavaScript.</td> <td>0</td> <td>1.0.0-pl</td></tr></tbody></table>### <a name="cookieJar-AvailableProperties-getCookie"></a>getCookie

 <table><tbody><tr><th>Name</th> <th>Description   
</th> <th>Default Value   
</th> <th>Added in Version   
</th> </tr><tr><td>name</td> <td>The name of the cookie to be returned. \[REQUIRED\]</td> <td> </td> <td>1.0.0-pl</td> </tr><tr><td>tpl</td> <td>Name of a chunk serving as a template.</td> <td> </td> <td>1.0.0-pl</td> </tr><tr><td>toPlaceholder</td> <td>If set, will assign the output to this placeholder instead of outputting it directly.</td> <td>value</td> <td>1.0.0-pl</td></tr></tbody></table><a name="cookieJar-Examples"></a>Examples
-----------------------------------------

### <a name="cookieJar-Examples-setCookie"></a>setCookie

Set a Session Cookie:

 ```
<pre class="brush: php">[[setCookie?
  &name=`foo`
  &value=`foobar`
  &expires=`0`
]]

```Set a secure Cookie that expires in one hour:

 ```
<pre class="brush: php">[[setCookie?
  &name=`foo`
  &value=`foobar`
  &expires=`3600`
  &secure=`1`
]]

```Delete a Cookie named 'foo':

 ```
<pre class="brush: php">[[!setCookie?
  &name=`foo`
  &expires=`-3600`
]]

```### <a name="cookieJar-Examples-getCookie"></a>getCookie

Output the value of a Cookie named 'foo':

 ```
<pre class="brush: php">[[getCookie?
  &name=`foo`
]]

```Output the value of a Cookie named 'foo', using a 'cookieTpl' chunk and assign the value to a placeholder:

 ```
<pre class="brush: php">[[getCookie?
  &name=`foo`
  &tpl=`cookieTpl`
  &toPlaceholder=`cookieValue`
]]

```