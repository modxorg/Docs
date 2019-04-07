---
title: "Peoples"
_old_id: "689"
_old_uri: "revo/peoples"
---

## What is Peoples?

Peoples is a simple User and User Group listing component for MODx Revolution. It can be used in community sites to show who is signed up as a User for a site, and any User Groups within that site.

### Requirements

- MODx Revolution 2.0.0 or later
- PHP5 or later

### History

Peoples was written by [Shaun McCormick](/display/~splittingred) as a simple user and usergroup listing component, and first released on October 19th, 2010.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/peoples>

## Snippets

Peoples comes with 3 separate snippets:

- [Peoples](extras/peoples/peoples.peoples "Peoples.Peoples") - Displays a list of Users.
- [PeopleGroups](extras/peoples/peoples.peoplegroups "Peoples.PeopleGroups") - Displays a list of User Groups.
- [PeopleGroup](extras/peoples/peoples.peoplegroup "Peoples.PeopleGroup") - Displays a User Group and all Users within.

## Usage examples

List first 10 users, sorted by username.

``` php
[[Peoples]]
```

List first 10 user groups, sorted by name.

``` php
[[PeopleGroups]]
```

Display the User Group "HR Department", and output the Users in the group to the placeholder 'users':

``` php
[[PeopleGroup? &usergroup=`HR Department` &toPlaceholder=`users`]]

<h2>[[+peoplegroups.name]] ([[+peoplegroups.userCount]] Users)</h2>

[[+users]]
```

## See Also

- [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
  - [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
- [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
  - [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
- [Peoples.Peoples](extras/peoples/peoples.peoples)
  - [Peoples.Peoples.tpl](extras/peoples/peoples.peoples/peoples.peoples.tpl)
- [Peoples.Roadmap](extras/peoples/peoples.roadmap)
