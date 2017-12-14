---
title: "Peoples"
_old_id: "689"
_old_uri: "revo/peoples"
---

<div>- [What is Peoples?](#Peoples-WhatisPeoples%3F)
  - [Requirements](#Peoples-Requirements)
  - [History](#Peoples-History)
  - [Download](#Peoples-Download)
- [Snippets](#Peoples-Snippets)
- [Usage Examples](#Peoples-UsageExamples)
- [See Also](#Peoples-SeeAlso)

</div>What is Peoples?
----------------

Peoples is a simple User and User Group listing component for MODx Revolution. It can be used in community sites to show who is signed up as a User for a site, and any User Groups within that site.

### Requirements

- MODx Revolution 2.0.0 or later
- PHP5 or later

### History

Peoples was written by [Shaun McCormick](/display/~splittingred) as a simple user and usergroup listing component, and first released on October 19th, 2010.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/peoples>

Snippets
--------

Peoples comes with 3 separate snippets:

- [Peoples](/extras/revo/peoples/peoples.peoples "Peoples.Peoples") - Displays a list of Users.
- [PeopleGroups](/extras/revo/peoples/peoples.peoplegroups "Peoples.PeopleGroups") - Displays a list of User Groups.
- [PeopleGroup](/extras/revo/peoples/peoples.peoplegroup "Peoples.PeopleGroup") - Displays a User Group and all Users within.

Usage Examples
--------------

List first 10 users, sorted by username.

```
<pre class="brush: php">
[[Peoples]]

```List first 10 user groups, sorted by name.

```
<pre class="brush: php">
[[PeopleGroups]]

```Display the User Group "HR Department", and output the Users in the group to the placeholder 'users':

```
<pre class="brush: php">
[[PeopleGroup? &usergroup=`HR Department` &toPlaceholder=`users`]]

<h2>[[+peoplegroups.name]] ([[+peoplegroups.userCount]] Users)</h2>

[[+users]]

```See Also
--------

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)