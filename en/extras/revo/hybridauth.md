---
title: "HybridAuth"
_old_id: "660"
_old_uri: "revo/hybridauth"
---

<div>- [Installation](#HybridAuth-Installation)
- [Parameters](#HybridAuth-Parameters)
  - [Examples](#HybridAuth-Examples)
- [Known issues](#HybridAuth-Knownissues)
- [Integration of service](#HybridAuth-Integrationofservice)
- [See also](#HybridAuth-Seealso)

</div>An integration of open source social sign on php library [HybridAuth](http://hybridauth.sourceforge.net/) into MODX Revolution.

_The main goal of HybridAuth library is to act as an abstract api between your application and various social apis and identities providers such as Facebook, Twitter, MySpace, LinkedIn, Google and Yahoo._

_HybridAuth enable developers to easily build social applications to engage websites vistors and customers on a social level by implementing social signin, social sharing, users profiles, friends list, activities stream, status updates and more._

In MODX we can log in to site and link our accounts on remote services to one user profile.

Installation 
-------------

Fist of all watch this video

<object height="360" width="640"><param name="movie" value="http://www.youtube.com/v/ron_VTaQeWE&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed allowfullscreen="true" allowscriptaccess="always" flashvars="$flashVars" height="360" src="http://www.youtube.com/v/ron_VTaQeWE&hl=en&fs=1" type="application/x-shockwave-flash" width="640"></embed></object>1\. Register and get api keys from needed services. For example, create twitter application - <https://dev.twitter.com/apps/new>

2\. Open system settings in manager, switch to hybridauth and make\\update ha.keys.Servicename. In our example it will be ha.keys.Twitter

3\. You need to set your keys as json string with array.

```
<pre class="brush: html">
{"key":"your key from twitter","secret":"secret from twitter"}

```![](/download/attachments/43417801/ha3.png?version=1&modificationDate=1356616628000)

It is needed for proper initialization of the library (<http://hybridauth.sourceforge.net/userguide/Configuration.html>).

4\. Now you can run snippet `[[!HybridAuth?providers=`Twitter`]]` on any page.

<div class="info">If there are any errors on library initialization - it will be logged in system log. </div>Parameters 
-----------

<table><tbody><tr><th>Param </th><th>Description </th><th>Default </th></tr><tr><td>providers </td><td>Comma separated list of a providers for authentification. All available providers are here /core/components/hybridauth/model/hybridauth/lib/Providers/. For example, &providers=`Google,Twitter,Facebook`. </td><td>none </td></tr><tr><td>rememberme   
</td><td>If true, user will be remembered for a long time.   
</td><td>true </td></tr><tr><td>groups   
</td><td>Comma separated list of existing user groups for joining by user at the first login. For example, &groups=`Users:1` will add new user to group "Users" with role "member"   
</td><td>none   
</td></tr><tr><td>action   
</td><td>Mode of work. By default it loads chunks for user according to his status.   
</td><td>loadTpl   
</td></tr><tr><td></td><td></td><td></td></tr><tr><td>loginTpl   
</td><td>This chunk will see any anonymous user.   
</td><td>tpl.HybridAuth.login   
</td></tr><tr><td>logoutTpl   
</td><td>This chunk will see any authenticated user.   
</td><td>tpl.HybridAuth.logout   
</td></tr><tr><td>profileTpl   
</td><td>Chunk for display and edit user profile.   
</td><td>tpl.HybridAuth.profile   
</td></tr><tr><td></td><td></td><td></td></tr><tr><td>loginContext   
</td><td>Main context for authentication. By default - it is current context.   
</td><td>current </td></tr><tr><td>addContexts   
</td><td>Comma separated list of additional contexts for authentication. For example &addContexts=`web,ru,en`   
</td><td>none </td></tr><tr><td></td><td></td><td></td></tr><tr><td>profileFields   
</td><td>Chunk for display and edit user profile.   
</td><td>username:25,email:50,fullname:50...   
</td></tr><tr><td>requiredFields   
</td><td>Comma separated list of required user fields when update. This fields must be filled for successful update of profile. For example, &requiredFields=`username,fullname,email`.   
</td><td>username,email,fullname   
</td></tr><tr><td></td><td></td><td></td></tr><tr><td>loginResourceId   
</td><td>Resource id to redirect to on successful login. By default, it is 0 - redirect to self.   
</td><td>0 </td></tr><tr><td>logoutResourceId   
</td><td>Resource id to redirect to on successful logout. By default, it is 0 - redirect to self.   
</td><td>0 </td></tr></tbody></table>### Examples 

Register to group Users

```
<pre class="brush: html">
[[!HybridAuth? providers=`Google,Twitter,Facebook` &groups=`Users`]]

```Update profile

```
<pre class="brush: html">
[[!HybridAuth? providers=`Google,Twitter,Facebook` &action=`UpdateProfile`]]

```Update profile with required photo

```
<pre class="brush: html">
[[!HybridAuth? providers=`Google,Twitter,Facebook` &action=`UpdateProfile` &requiredFields=`username,email,photo` &profileFields=`username,fullname,email,photo`]]

```Known issues 
-------------

1\. Error "**You cannot access this page directly**" occurs when user session is cached by opcode-cacher, such as **php-apc**. For example, at [MODXCloud](http://modxcloud.com) this error always occurs.

For solving this, you need to add to the /index.php at the root of site this line for disabling apc caching:

```
<pre class="brush: php">
ini_set('apc.cache_by_default', 0);

```Otherwise, your session will be cached and snippet will not working properly.

Integration of service 
-----------------------

1. [HybridAuth.Integrating Facebook](/extras/revo/hybridauth/hybridauth.integrating-facebook)
2. [HybridAuth.Integrating Google](/extras/revo/hybridauth/hybridauth.integrating-google)
3. [HybridAuth.Integrating Twitter](/extras/revo/hybridauth/hybridauth.integrating-twitter)
4. [HybridAuth.Integrating VK.com](/extras/revo/hybridauth/hybridauth.integrating-vk.com)

See also 
---------