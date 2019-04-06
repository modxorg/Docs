---
title: "HybridAuth.Integrating VK.com"
_old_id: "901"
_old_uri: "revo/hybridauth/hybridauth.integrating-vk.com"
---

Integration of any service is very simple. So, you can read about [Facebook](http://rtfm.modx.com/display/ADDON/HybridAuth.Integrating+Google), first, then look to screenshots and everything must be clear.

#### Registering application

**1**. Go to <http://vk.com/editapp?act=create>

**2**. Choose **"Website"** and fill Site address and Base domain.

**3**. For your MODX System Setting **ha.keys.Vkontakte** (you may need to create it) the value will be

 ``` php
{"id":"Application ID","secret":"Secure key"}
```
