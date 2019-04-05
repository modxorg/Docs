---
title: "cookieJar"
_old_id: "1724"
_old_uri: "revo/cookiejar"
---

## <a name="cookieJar-WhatiscookieJar"></a>What is cookieJar?

 This extra includes a set of MODX Revolution snippets for setting, retrieving and deleting browser Cookies.

## <a name="cookieJar-History"></a>History

 cookieJar was first written by David Pede and last released on December 13, 2018.

## <a name="cookieJar-Download"></a>Download

 It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/cookiejar>

 The source code and build script is also available on GitHub: <https://github.com/tasianmedia/cookiejar>

## <a name="cookieJar-Bugs&FeatureRequests"></a>Bugs & Feature Requests

 Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/cookiejar/issues>

## <a name="cookieJar-AvailableSnippets"></a>Available Snippets

### <a name="cookieJar-AvailableSnippets-setCookie"></a>setCookie

 The setCookie snippet can be called using the tag:

 ``` php 
[[setCookie]]

```

 setCookie can be called cached or un-cached. 

### <a name="cookieJar-AvailableSnippets-getCookie"></a>getCookie

 The getCookie snippet can be called using the tag:

 ``` php 
[[getCookie]]

```

 getCookie can be called cached or un-cached. 

## <a name="cookieJar-AvailableProperties"></a>Available Properties

### <a name="cookieJar-AvailableProperties-setCookie"></a>setCookie

 | Name | Description | Default Value | Added in Version |
|------|-------------|---------------|------------------|
| name | The name of the cookie. \[REQUIRED\] |  | 1.0.0-pl |
| value | The value of the cookie. This value is stored on the clients computer, do not store sensitive information. |  | 1.0.0-pl |
| expires | The time the cookie expires. This is a Unix timestamp so is in number of seconds. Use `0` to set a session cookie. Use any date in the past to delete a cookie. | 0 | 1.0.0-pl |
| expiresType | The period unit for the cookie expires. Valid inputs are: 'years', 'months', 'days', 'weeks', 'hours', 'minutes' and 'seconds'. | seconds | 1.1.0-pl |
| path | The path on the server in which the cookie will be available on. Use `/` to make available within the entire domain. | / | 1.0.0-pl |
| domain | The domain that the cookie is available to. |  | 1.0.0-pl |
| secure | Indicates that the cookie should only be transmitted over a secure HTTPS connection from the client. | 0 | 1.0.0-pl |
| httponly | Indicates that the cookie will be made accessible only through the HTTP protocol. This means that the cookie wont be accessible by scripting languages, such as JavaScript. | 0 | 1.0.0-pl |

### <a name="cookieJar-AvailableProperties-getCookie"></a>getCookie

 | Name | Description | Default Value | Added in Version |
|------|-------------|---------------|------------------|
| name | The name of the cookie to be returned. \[REQUIRED\] |  | 1.0.0-pl |
| tpl | Name of a chunk serving as a template. |  | 1.0.0-pl |
| toPlaceholder | If set, will assign the output to this placeholder instead of outputting it directly. | value | 1.0.0-pl |

## <a name="cookieJar-Examples"></a>Examples

### <a name="cookieJar-Examples-setCookie"></a>setCookie

 Set a Session Cookie:

 ``` php 
[[setCookie?
  &name=`foo`
  &value=`foobar`
  &expires=`0`
]]

```

 Set a secure Cookie that expires in one hour:

 ``` php 
[[setCookie?
  &name=`foo`
  &value=`foobar`
  &expires=`1`
  &expiresType=`hours`
  &secure=`1`
]]
//or using seconds
[[setCookie?
  &name=`foo`
  &value=`foobar`
  &expires=`3600`
  &secure=`1`
]]

```

 Set a secure Cookie that expires in one day:

 ``` php 
[[setCookie?
  &name=`foo`
  &value=`foobar`
  &expires=`1`
  &expiresType=`days`
  &secure=`1`
]]

```

 Delete a Cookie named 'foo':

 ``` php 
[[!setCookie?
  &name=`foo`
  &expires=`-3600`
]]

```

### <a name="cookieJar-Examples-getCookie"></a>getCookie

 Output the value of a Cookie named 'foo':

 ``` php 
[[getCookie?
  &name=`foo`
]]

```

 Output the value of a Cookie named 'foo', using a 'cookieTpl' chunk and assign the value to a placeholder:

 ``` php 
[[getCookie?
  &name=`foo`
  &tpl=`cookieTpl`
  &toPlaceholder=`cookieValue`
]]

```