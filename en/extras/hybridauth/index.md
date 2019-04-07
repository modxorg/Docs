---
title: "HybridAuth"
_old_id: "660"
_old_uri: "revo/hybridauth"
---

 An integration of open source social sign on php library [HybridAuth](http://hybridauth.sourceforge.net/) into MODX Revolution.

 _The main goal of HybridAuth library is to act as an abstract api between your application and various social apis and identities providers such as Facebook, Twitter, MySpace, LinkedIn, Google and Yahoo._

 _HybridAuth enable developers to easily build social applications to engage websites vistors and customers on a social level by implementing social signin, social sharing, users profiles, friends list, activities stream, status updates and more._

 In MODX we can log in to site and link our accounts on remote services to one user profile.

## Installation

 First of all watch this video

1. Register and get api keys from needed services. For example, create twitter application - <https://dev.twitter.com/apps/new>
2. Open system settings in manager, switch to hybridauth and make\\update ha.keys.Servicename. In our example it will be ha.keys.Twitter
3. You need to set your keys as json string with array.

 ``` json
{"key":"your key from twitter","secret":"secret from twitter"}
```

 ![](/download/attachments/43417801/ha3.png?version=1&modificationDate=1356616628000)

 It is needed for proper initialization of the library ( <http://hybridauth.sourceforge.net/userguide/Configuration.html>).

4. Now you can run snippet `[[!HybridAuth?providers=`Twitter`]]` on any page.

 If there are any errors on library initialization - it will be logged in system log.

## Parameters

 | Param            | Description                                                                                                                                                                                                | Default                             |
 | ---------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------- |
 | providers        | Comma separated list of a providers for authentification. All available providers are here /core/components/hybridauth/model/hybridauth/lib/Providers/. For example, &providers=`Google,Twitter,Facebook`. | none                                |
 | rememberme       | If true, user will be remembered for a long time.                                                                                                                                                          | true                                |
 | groups           | Comma separated list of existing user groups for joining by user at the first login. For example, &groups=`Users:1` will add new user to group "Users" with role "member"                                  | none                                |
 | action           | Mode of work. By default it loads chunks for user according to his status.                                                                                                                                 | loadTpl                             |
 |                  |                                                                                                                                                                                                            |                                     |
 | loginTpl         | This chunk will see any anonymous user.                                                                                                                                                                    | tpl.HybridAuth.login                |
 | logoutTpl        | This chunk will see any authenticated user.                                                                                                                                                                | tpl.HybridAuth.logout               |
 | profileTpl       | Chunk for display and edit user profile.                                                                                                                                                                   | tpl.HybridAuth.profile              |
 |                  |                                                                                                                                                                                                            |                                     |
 | loginContext     | Main context for authentication. By default - it is current context.                                                                                                                                       | current                             |
 | addContexts      | Comma separated list of additional contexts for authentication. For example &addContexts=`web,ru,en`                                                                                                       | none                                |
 |                  |                                                                                                                                                                                                            |                                     |
 | profileFields    | Chunk for display and edit user profile.                                                                                                                                                                   | username:25,email:50,fullname:50... |
 | requiredFields   | Comma separated list of required user fields when update. This fields must be filled for successful update of profile. For example, &requiredFields=`username,fullname,email`.                             | username,email,fullname             |
 |                  |                                                                                                                                                                                                            |                                     |
 | loginResourceId  | Resource id to redirect to on successful login. By default, it is 0 - redirect to self.                                                                                                                    | 0                                   |
 | logoutResourceId | Resource id to redirect to on successful logout. By default, it is 0 - redirect to self.                                                                                                                   | 0                                   |

### Examples

 Register to group Users

 ``` php
[[!HybridAuth? providers=`Google,Twitter,Facebook` &groups=`Users`]]
```

 Update profile

 ``` php
[[!HybridAuth? providers=`Google,Twitter,Facebook` &action=`UpdateProfile`]]
```

 Update profile with required photo

 ``` php
[[!HybridAuth? providers=`Google,Twitter,Facebook` &action=`UpdateProfile` &requiredFields=`username,email,photo` &profileFields=`username,fullname,email,photo`]]
```

## Known issues

 1. Error " **You cannot access this page directly**" occurs when user session is cached by opcode-cacher, such as **php-apc**. For example, at [MODXCloud](http://modxcloud.com) this error always occurs.

 For solving this, you need to add to the /index.php at the root of site this line for disabling apc caching:

 ``` php
ini_set('apc.cache_by_default', 0);
```

 Otherwise, your session will be cached and snippet will not working properly.

## Integration of service

1. [HybridAuth.Integrating Facebook](extras/hybridauth/hybridauth.integrating-facebook)
2. [HybridAuth.Integrating Google](extras/hybridauth/hybridauth.integrating-google)
3. [HybridAuth.Integrating Twitter](extras/hybridauth/hybridauth.integrating-twitter)
4. [HybridAuth.Integrating VK.com](extras/hybridauth/hybridauth.integrating-vk.com)
