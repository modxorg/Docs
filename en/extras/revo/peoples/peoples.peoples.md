---
title: "Peoples.Peoples"
_old_id: "949"
_old_uri: "revo/peoples/peoples.peoples"
---

The Peoples Snippet 
--------------------

This snippet displays all the Users of a site.

Usage 
------

```
<pre class="brush: php">
`[[Peoples]]`

```Available Properties 
---------------------

<table><tbody><tr><th>Name </th><th>Description </th><th>Default </th></tr><tr><th>1 </th><td>tpl </td><td>The Chunk to use for each User. </td><td>pplUser </td></tr><tr><th>2 </th><td>active </td><td>0 to show only inactive Users, 1 to show only active Users, 2 to show all Users. </td></tr><tr><th>3 </th><td>usergroups </td><td>Optional. A comma-separated list of User Group names to filter by. </td></tr><tr><th>4 </th><td>limit </td><td>The number of users to limit per call. Defaults to 10. Set to 0 to show all. </td></tr><tr><th>5 </th><td>start </td><td>The start index to begin with when limiting. </td></tr><tr><th>6 </th><td>sortBy </td><td>The field name to sort by. (Cannot be an extended field.) </td><td>username </td></tr><tr><th>7 </th><td>sortByAlias </td><td>The class to use with the sort field. </td><td>User </td></tr><tr><th>8 </th><td>sortDir </td><td>The direction to sort by. </td><td>ASC </td></tr><tr><th>9 </th><td>cls </td><td>Will append this CSS class to each item. </td><td>ppl-user </td></tr><tr><th>10 </th><td>altCls </td><td>Optional. If set, will append this CSS class to every even item. </td></tr><tr><th>11 </th><td>firstCls </td><td>Optional. If set, will append this CSS class to the first item. </td></tr><tr><th>12 </th><td>lastCls </td><td>Optional. If set, will append this CSS class to the last item. </td></tr><tr><th>13 </th><td>placeholderPrefix </td><td>The prefix to use when setting global placeholders, such as total. </td><td>peoples. </td></tr><tr><th>14 </th><td>outputSeparator </td><td>The separator between each user record. </td></tr><tr><th>15 </th><td>toPlaceholder </td><td>Optional. If set, will set the output to this placeholder and return empty. </td></tr><tr><th>16 </th><td>userClass </td><td>The class name of the Users object. </td><td>modUser </td></tr><tr><th>17 </th><td>userAlias </td><td>The class alias of the Users object. </td><td>User </td></tr></tbody></table>Peoples Chunks 
---------------

The only chunk used in the Peoples snippet is the &tpl property, which uses the default of pplUser.

Examples 
---------

Show all the Users for a site.

```
<pre class="brush: php">
[[Peoples]]

```Available Properties 
---------------------

<table id="TBL1376497247026"><tbody><tr><th>Name </th><th>Description </th><th>Default </th></tr><tr><td>tpl </td><td>The Chunk to use for each User. </td><td>pplUser </td></tr><tr><td>active </td><td>0 to show only inactive Users, 1 to show only active Users, 2 to show all Users. </td><td>1 </td></tr><tr><td>usergroups </td><td>Optional. A comma-separated list of User Group names to filter by. </td><td> </td></tr><tr><td>limit </td><td>The number of users to limit per call. Defaults to 10. Set to 0 to show all. </td><td>10 </td></tr><tr><td>start </td><td>The start index to begin with when limiting. </td><td>0 </td></tr><tr><td>sortBy </td><td>The field name to sort by. (Cannot be an extended field.) </td><td>username </td></tr><tr><td>sortByAlias </td><td>The class to use with the sort field. </td><td>User </td></tr><tr><td>sortDir </td><td>The direction to sort by. </td><td>ASC </td></tr><tr><td>cls </td><td>Will append this CSS class to each item. </td><td>ppl-user </td></tr><tr><td>altCls </td><td>Optional. If set, will append this CSS class to every even item. </td><td> </td></tr><tr><td>firstCls </td><td>Optional. If set, will append this CSS class to the first item. </td><td> </td></tr><tr><td>lastCls </td><td>Optional. If set, will append this CSS class to the last item. </td><td> </td></tr><tr><td>placeholderPrefix </td><td>The prefix to use when setting global placeholders, such as total. </td><td>peoples. </td></tr><tr><td>outputSeparator </td><td>The separator between each user record. </td><td> </td></tr><tr><td>toPlaceholder </td><td>Optional. If set, will set the output to this placeholder and return empty. </td><td> </td></tr><tr><td>userClass </td><td>The class name of the Users object. </td><td>modUser </td></tr><tr><td>userAlias </td><td>The class alias of the Users object. </td><td>User </td></tr></tbody></table>Peoples Chunks 
---------------

The only chunk used in the Peoples snippet is the &tpl property, which uses the default of pplUser.

- [tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl "Peoples.Peoples.tpl")

Examples 
---------

Show all the Users for a site.

```
<pre class="brush: php">
[[Peoples? &limit=`0`]]

```Show the first 10 users in the User Group "HR Department":

```
<pre class="brush: php">
[[Peoples? &limit=`10` &usergroups=`HR Department`]]

```Show all the inactive users in the site:

```
<pre class="brush: php">
[[Peoples? &limit=`0` &active=`0`]]

```See Also 
---------

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)