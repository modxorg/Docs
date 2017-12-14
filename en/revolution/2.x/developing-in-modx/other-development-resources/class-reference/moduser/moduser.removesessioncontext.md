---
title: "modUser.removeSessionContext"
_old_id: "1349"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.removesessioncontext"
---

modUser::removeSessionContext
-----------------------------

Removes a user session context.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::removeSessionContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::removeSessionContext())

```
<pre class="brush: php">
void removeSessionContext (string|array $context)

```Example
-------

Remove the session for the User in the 'sports' Context.

```
<pre class="brush: php">
$user->removeSessionContext('sports');

```See Also
--------

- [modUser](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/moduser "modUser")
- [Contexts](/revolution/2.x/administering-your-site/contexts "Contexts")