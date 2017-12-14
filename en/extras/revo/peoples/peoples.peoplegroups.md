---
title: "Peoples.PeopleGroups"
_old_id: "947"
_old_uri: "revo/peoples/peoples.peoplegroups"
---

The PeopleGroups Snippet
------------------------

This snippet displays all the User Groups of a site.

Usage
-----

Display the first 10 User Groups, sorted by name:

```
<pre class="brush: php">
[[!PeopleGroups]]

```Available Properties
--------------------

<table id="TBL1376497247025"><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>tpl</td><td>The Chunk to use for each User Group.</td><td>pplUserGroup</td></tr><tr><td>user</td><td>Optional. If an ID of a User is specified, will only show User Groups for that User.</td><td> </td></tr><tr><td>limit</td><td>The number of user groups to limit per call. Defaults to 10. Set to 0 to show all.</td><td>10</td></tr><tr><td>start</td><td>The start index to begin with when limiting.</td><td>0</td></tr><tr><td>sortBy</td><td>The field name to sort by.)</td><td>name</td></tr><tr><td>sortByAlias</td><td>The class to use with the sort field.</td><td>modUserGroup</td></tr><tr><td>sortDir</td><td>The direction to sort by.</td><td>ASC</td></tr><tr><td>cls</td><td>Will append this CSS class to each item.</td><td>ppl-usergroup</td></tr><tr><td>altCls</td><td>Optional. If set, will append this CSS class to every even item.</td><td> </td></tr><tr><td>firstCls</td><td>Optional. If set, will append this CSS class to the first item.</td><td> </td></tr><tr><td>lastCls</td><td>Optional. If set, will append this CSS class to the last item.</td><td> </td></tr><tr><td>placeholderPrefix</td><td>The prefix to use when setting global placeholders, such as total.</td><td>peoplegroups.</td></tr><tr><td>outputSeparator</td><td>The separator between each user record.</td><td> </td></tr><tr><td>toPlaceholder</td><td>Optional. If set, will set the output to this placeholder and return empty.</td><td> </td></tr><tr><td>userClass</td><td>The class name of the Users object.</td><td>modUser</td></tr></tbody></table>PeopleGroups Chunks
-------------------

The only chunk used in the PeopleGroups snippet is the &tpl property, which uses the default of pplUserGroup.

- [tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl "Peoples.PeopleGroups.tpl")

Examples
--------

Show all the User Groups for a site.

```
<pre class="brush: php">
[[PeopleGroups? &limit=`0`]]

```Show all the User Groups for the User with ID 23:

```
<pre class="brush: php">
[[PeopleGroups? &user=`23` &limit=`0`]]

```Show the first 10 User Groups for the User with ID 15:

```
<pre class="brush: php">
[[!PeopleGroups? &user=`15`]]

```See Also
--------

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)