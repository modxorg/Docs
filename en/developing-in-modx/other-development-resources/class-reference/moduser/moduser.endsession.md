---
title: "modUser.endSession"
_old_id: "1342"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.endsession"
---

## modUser::endSession

Ends a user session completely, including all contexts.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::endSession()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::endSession())

```
<pre class="brush: php">
void endSession ()

```## Example

End the user's session.

```
<pre class="brush: php">
$user->endSession();

```## See Also

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")