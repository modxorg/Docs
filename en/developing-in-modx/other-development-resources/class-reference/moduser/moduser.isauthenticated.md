---
title: "modUser.isAuthenticated"
_old_id: "1346"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.isauthenticated"
---

## modUser::isAuthenticated

Determines if this user is authenticated in a specific context.

Separate session contexts can allow users to login/out of specific sub-sites individually (or in collections).

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::isAuthenticated()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::isAuthenticated())

```
<pre class="brush: php">
boolean isAuthenticated ([string $sessionContext = 'web'])

```## Example

See if the User is logged into the 'web' context. If not, deny access and send to Unauthorized Page.

```
<pre class="brush: php">
if (!$modx->user->isAuthenticated('web')) {
   $modx->sendUnauthorizedPage();
}

```## See Also

Page: [modUser](developing-in-modx/other-development-resources/class-reference/moduser)Page: [Users](administering-your-site/security/users)