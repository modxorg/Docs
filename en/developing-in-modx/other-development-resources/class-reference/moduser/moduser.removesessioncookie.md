---
title: "modUser.removeSessionCookie"
_old_id: "1351"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.removesessioncookie"
---

## modUser::removeSessionCookie

Removes a session cookie for a user.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::removeSessionCookie()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::removeSessionCookie())

```
<pre class="brush: php">
void removeSessionCookie (string $context)

```## Example

Remove the Session Cookie for the User in the 'sports' Context.

```
<pre class="brush: php">
$user->removeSessionCookie('sports');

```## See Also

Page: [modUser](developing-in-modx/other-development-resources/class-reference/moduser)Page: [Users](administering-your-site/security/users)