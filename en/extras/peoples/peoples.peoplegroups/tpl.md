---
title: "tpl"
_old_id: "948"
_old_uri: "revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl"
---

## PeopleGroups's tpl Chunk

This is the Chunk displayed with the &tpl property on the [PeopleGroups](/extras/peoples/peoples.peoplegroups "Peoples.PeopleGroups") snippet.

## Default Value

``` php 
<li class="[[+cls]]">[[+name]] ([[+children]])</li>
```

## Available Placeholders

| Name     | Description                              |
| -------- | ---------------------------------------- |
| id       | The ID of the User Group.                |
| name     | The name of the User Group.              |
| parent   | The parent ID of the User Group, if any. |
| cls      | The current CSS class(es) for the item.  |
| children | The number of Users in the User Group.   |

## See Also

1. [Peoples.PeopleGroup](/extras/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/peoples/peoples.roadmap)