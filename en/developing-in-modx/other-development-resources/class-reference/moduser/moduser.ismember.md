---
title: "modUser.isMember"
_old_id: "1347"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.ismember"
---

## modUser::isMember

 States whether a user is a member of a user group or multiple user groups. You may specify either a string name of the user group, or an array of user group names.

## Syntax

 API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#\\\\modUser::isMember()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::isMember())

 ```
<pre class="brush: php">boolean isMember (mixed $groups)

```## Example

 Get a user object:

 ```
<pre class="brush: php">$user = $modx->getObject('modUser', array('username' => 'boss'));

``` See if the User is a member of the 'Staff' user group:

 ```
<pre class="brush: php">$user->isMember('Staff');

``` See if the User is a member of EITHER the 'Staff' or 'Investors' user group.

 ```
<pre class="brush: php">$user->isMember(array('Staff','Investors'));

``` See if the User is a member of BOTH the 'Staff' and 'Investors' user group.

 ```
<pre class="brush: php">$user->isMember(array('Staff','Investors'), true);

```## See Also

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")