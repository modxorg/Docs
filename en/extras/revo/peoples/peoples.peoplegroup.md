---
title: "Peoples.PeopleGroup"
_old_id: "945"
_old_uri: "revo/peoples/peoples.peoplegroup"
---

The PeopleGroup Snippet
-----------------------

This snippet displays a User Group and the Users within it.

Usage
-----

Display the User Group "HR Department", along with its Users:

```
<pre class="brush: php">
[[PeopleGroup? &usergroup=`HR Department` &toPlaceholder=`users`]]

<h2>[[+peoplegroups.name]] ([[+peoplegroups.userCount]] Users)</h2>

<ul>
[[+users]]
</ul>

```Available Properties
--------------------

<table id="TBL1376497247024"><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>userTpl</td><td>The Chunk to use for each User.</td><td>pplGroupUser</td></tr><tr><td>limit</td><td>The number of user groups to limit per call. Defaults to 10. Set to 0 to show all.</td><td>0</td></tr><tr><td>start</td><td>The start index to begin with when limiting.</td><td>0</td></tr><tr><td>sortBy</td><td>The field name to sort by.)</td><td>username</td></tr><tr><td>sortByAlias</td><td>The class to use with the sort field.</td><td>modUser</td></tr><tr><td>sortDir</td><td>The direction to sort by.</td><td>ASC</td></tr><tr><td>cls</td><td>Will append this CSS class to each item.</td><td>ppl-user</td></tr><tr><td>altCls</td><td>Optional. If set, will append this CSS class to every even item.</td><td> </td></tr><tr><td>firstCls</td><td>Optional. If set, will append this CSS class to the first item.</td><td> </td></tr><tr><td>lastCls</td><td>Optional. If set, will append this CSS class to the last item.</td><td> </td></tr><tr><td>placeholderPrefix</td><td>The prefix to use when setting global placeholders, such as total.</td><td>peoplegroups.</td></tr><tr><td>outputSeparator</td><td>The separator between each user record.</td><td> </td></tr><tr><td>toPlaceholder</td><td>Optional. If set, will set the output to this placeholder and return empty.</td><td> </td></tr><tr><td>userClass</td><td>The class name of the Users object.</td><td>modUser</td></tr><tr><td>getProfile</td><td>If true, will also get the Profile fields for each User.</td><td>0</td></tr><tr><td>profileAlias</td><td>The class alias of the Profile object.</td><td>Profile</td></tr></tbody></table>PeopleGroup Chunks
------------------

The only chunk used in the PeopleGroup snippet is the &userTpl property, which uses the default of pplGroupUser.

- [userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl "Peoples.PeopleGroup.userTpl")

Examples
--------

Show all the Users of the User Group "Marketing", but sort by Role Authority instead of username:

```
<pre class="brush: php">
[[!PeopleGroup? 
  &usergroup=`Marketing`
  &placeholderPrefix=`ug.` 
  &toPlaceholder=`ug.users`
  &sortBy=`authority`
  &sortByAlias=`UserGroupRole`
]]

<h2>Users in [[+ug.name]]</h2>

[[+ug.users]]

```See Also
--------

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)