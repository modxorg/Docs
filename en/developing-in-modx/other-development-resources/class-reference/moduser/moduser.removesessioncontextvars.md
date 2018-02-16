---
title: "modUser.removeSessionContextVars"
_old_id: "1350"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.removesessioncontextvars"
---

modUser::removeSessionContextVars
---------------------------------

Removes the session vars associated with a specific context.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::removeSessionContextVars()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::removeSessionContextVars())

```
<pre class="brush: php">
void removeSessionContextVars (string $context)

```Example
-------

Remove all session vars for the User in the 'sports' Context.

```
<pre class="brush: php">
$user->removeSessionContextVars('sports');

```See Also
--------

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
- [Contexts](administering-your-site/contexts "Contexts")