---
title: "Tokens and Nonces"
_old_id: "1694"
_old_uri: "2.x/developing-in-modx/advanced-development/validating-requests-tokens-and-nonces"
---

MODX signs requests so that malicious ones are rejected. WordPress does the same with [nonces](http://codex.wordpress.org/WordPress_Nonces); MODX uses tokens. By default, tokens apply only inside the MODX manager.

If you are working on Custom Manager Pages (CMPs), you may see values like the following that are included in the post data under a key named HTTP\_MODAUTH:

``` php
$_POST['HTTP_MODAUTH'] => modx1_65f3a2b1c9d8e7.12345678
```

The connector accepts the token through three equivalent channels:

- POST parameter `HTTP_MODAUTH` (the manager's AJAX layer sends it as an Ext JS `extraParams` value);
- GET parameter `HTTP_MODAUTH` (many download links pass it in the query string);
- HTTP header `ModAuth` (the manager's default via `Ext.Ajax.defaultHeaders`).

The connector validates the token in `modConnectorResponse::outputContent()`: an empty or mismatched token gets a 401 response. The `Login` (and `Security/Login`) action is exempt, so logging in does not require a token yet. Inside a processor, `HTTP_MODAUTH` is stripped from `$scriptProperties`, so your processor code never sees it.

<!-- MEDIA: diagram | must | The token's path: logging into a context stores a token in the session; a manager request carries it as a POST parameter, a GET parameter or the ModAuth header; the connector checks it and either answers 401 or lets the request through, with HTTP_MODAUTH removed before the processor runs | Draw the flow from the three channels above and the validation paragraph; check class and key names against the text -->

The token belongs to a user and their current context. Sessions are tied to a user the same way, which is why token code lives in the `modUser` class; by default, tokens apply only to a logged-in user. `modUser::generateToken()` creates the token (format: `uniqid(site_id . '_' . user id, true)`) and stores it in the session under the key `modx.{context}.user.token` when the user logs into a context via `modUser::addSessionContext()`.

For example, here's how you might test a form that was posted from somewhere in the manager.

``` php
$token = $modx->getOption('HTTP_MODAUTH', $_POST);
if ($token != $modx->user->getUserToken($modx->context->get('key'))) {
    // ERROR! Invalid request
}
```

On the front-end, you do not need to call `getUserToken` manually: the `Login` processor already returns a `token` key in its response for both manager and web contexts, so a logged-in front-end user can reuse it for authenticated connector requests.

In manager templates and CMPs, the current token is available as the `_authToken` placeholder (set by `modManagerController`); in the manager's JavaScript, the global `MODx.siteId` holds it and `Ext.Ajax` attaches it to every connector request automatically.

## Differences between Nonce and Token

A nonce expires after a fixed window — say 30 minutes — after which the form can no longer be submitted. Ideally each form would be signed for a single submission, but a page load can time out and the user may need the back button, so nonces get a validity window instead: the shorter the window, the more secure the nonce.

The tokens used by the MODX manager are session related, so as long as you are logged in (i.e. your session has **not** expired), your forms keep working.

Example: load a manager form, leave for 12 hours, then come back. A nonce-signed form probably fails, because nonces have short lifetimes. A token-signed form probably still submits, because your session is probably still alive (by default MODX ships with `session_cookie_lifetime` set to 604800 seconds, i.e. 7 days; the value is configurable via system setting).

<!-- MEDIA: diagram | nice | A timeline: the form loads, 12 hours pass, the submit goes out — the nonce has expired while the token still works because the session lives | Build it from the example above; keep the 12 hours and the 604800-second session lifetime -->
