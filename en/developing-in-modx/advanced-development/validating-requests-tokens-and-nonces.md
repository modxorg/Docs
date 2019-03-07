---
title: "Validating Requests: Tokens and Nonces"
_old_id: "1694"
_old_uri: "2.x/developing-in-modx/advanced-development/validating-requests-tokens-and-nonces"
---

 Like many web applications, MODX signs requests to help prevent malicious requests from being processed. WordPress accomplishes this via [nonces](http://codex.wordpress.org/WordPress_Nonces), and MODX uses tokens. By default, this behavior only takes place inside the MODX manager.

 If you are working on Custom Manager Pages (CMPs), you may see values like the following that are included in the post data under a key named HTTP\_MODAUTH:

 ``` php 
$_POST['HTTP_MODAUTH'] => modx12345xxxx.9887_abcdef1234.0987654
```

 This value is associated with a user and his current context -- this may seem strange, but consider that sessions are also associated with a "user" (even if the user is not logged in), and you can begin to understand why the relevant code is in the modUser class, but the default behavior here is that the tokens and their validation only applies to a user who is logged in.

For example, here's how you might test a form that was posted from somewhere in the manager.

 ``` php 
$token = $modx->getOption('HTTP_MODAUTH', $_POST);
if ($token != $modx->user->getUserToken($modx->context->get('key')) {
    // ERROR! Invalid request
}
```

 Recreating this type of security on the front-end of your site may be a bit more involved since the MODX functions are only accessible to an authenticated user.

## Differences between Nonce and Token

A nonce makes a form valid for a period of time, say 30 minutes, after which it can no longer be successfully submitted. In a perfect world, you would have "single-serving" forms, where each form was uniquely signed and could only be submitted _once_. But that security model quickly breaks down in the real-world where you may have to use the back-button if a page load times out, so the nonces are usually configured to be valid for a window of time: the shorter the window, the more secure the nonce.

The tokens used by the MODX manager are session related, so as long as you are logged in (i.e. your session has expired), you can do what you want with your forms.

Example: let's say we load up a manager form, then we go out and run errands and come back 12 hours later. If the form had been signed using a nonce, you can submit the form, but it will _probably_ fail because nonces usually have shorter lifetimes. If the form had been signed using a token, you can _probably_ still submit it because your session is probably still good (sessions often have 24 hour lifetimes).