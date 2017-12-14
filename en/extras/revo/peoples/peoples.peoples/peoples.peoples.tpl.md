---
title: "Peoples.Peoples.tpl"
_old_id: "950"
_old_uri: "revo/peoples/peoples.peoples/peoples.peoples.tpl"
---

Peoples's tpl Chunk
-------------------

This is the Chunk displayed with the &tpl property on the [Peoples](/extras/revo/peoples/peoples.peoples "Peoples.Peoples") snippet.

Default Value
-------------

```
<pre class="brush: php">
<li class="[[+cls]]">[[+username]]</li>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>id</td><td>The ID of the User.</td></tr><tr><td>username</td><td>The username of the User.</td></tr><tr><td>active</td><td>Either 1 or 0, if the User is active or not.</td></tr><tr><td>cls</td><td>The current CSS class(es) for the item.</td></tr></tbody></table>Also available is any field in the User's profile, such as email, fullname, etc.

Extended and Remote Data fields can be accessed via:

```
<pre class="brush: php">
[[+extended.nameOfExtendedAttribute]]
[[+remote_data.nameOfRemoteDataAttribute]]

```See Also
--------

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)