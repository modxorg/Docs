---
title: "HybridAuth.Integrating Facebook"
_old_id: "898"
_old_uri: "revo/hybridauth/hybridauth.integrating-facebook"
---

All services are integrated very simple. You need to add auth link in chunk, and setup service keys in system settings.

Now, let`s go together, step-by-step!

First of all, you need to specify alailable providers for your site. For example: \*Facebook, Google, Twitter\*.

[![](/download/thumbnails/43417862/ha_1.png)](/download/attachments/43417862/ha_1.png)

Then You need to edit chunks, and add links to Facebook authorization.

[![](/download/thumbnails/43417862/ha_fb5.png)](/download/attachments/43417862/ha_fb5.png) [![](/download/thumbnails/43417862/ha_fb6.png)](/download/attachments/43417862/ha_fb6.png)

And now we need to register our application on Facebook and receive **id** and **secret**

[![](/download/thumbnails/43417862/ha_fb1.png)](/download/attachments/43417862/ha_fb1.png) [![](/download/thumbnails/43417862/ha_fb2.png)](/download/attachments/43417862/ha_fb2.png) [![](/download/thumbnails/43417862/ha_fb3.png)](/download/attachments/43417862/ha_fb3.png)

Important - **specifying url of our site**

[![](/download/thumbnails/43417862/ha_fb3.png)](/download/attachments/43417862/ha_fb3.png)

Finaly adding credentials to system settings

[![](/download/thumbnails/43417862/ha_fb4.png)](/download/attachments/43417862/ha_fb4.png)

And now we can login

[![](/download/thumbnails/43417862/ha_2.png)](/download/attachments/43417862/ha_2.png) [![](/download/thumbnails/43417862/ha_fb7.png)](/download/attachments/43417862/ha_fb7.png) [![](/download/thumbnails/43417862/ha_fb8.png)](/download/attachments/43417862/ha_fb8.png)

Thats all!

[![](/download/thumbnails/43417862/ha_fb9.png)](/download/attachments/43417862/ha_fb9.png)

As you see, after first authorization you can add more services to your profile, and already added will be inactive.

#### Registering application

**1**. Go to <https://developers.facebook.com/apps> and **create a new application** by clicking "Create New App". You may need to Register as a developer first.

**2**. Fill out any required fields such as the application name and description.

**3**. Choose **Website with Facebook Login** and put your website domain in the **Site Url** field.

**4**. Once you have registered, copy and past the created application credentials (**App ID** and **Secret**) into System Setting **ha.keys.Facebook** like

```
<pre class="brush: php">
{"id":"1234567890","secret":"f384hf3894hf8394hf843hf"}

```See Also
--------