---
title: "userTpl"
_old_id: "946"
_old_uri: "revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl"
---

## PeopleGroup's userTpl Chunk

This is the Chunk displayed with the &userTpl property on the [PeopleGroup](/extras/revo/peoples/peoples.peoplegroup "Peoples.PeopleGroup") snippet.

## Default Value

``` php 
<li class="[[+cls]]">[[+username]] - <em>[[+role]]</em></li>
```

## Available Placeholders

| Name | Description |
|------|-------------|
| id | The ID of the User. |
| username | The username of the User. |
| active | Either 1 or 0, depending on if the User is active or not. |
| role | The name of the Role of the User in the group. |
| role\_id | The ID of the Role of the User in the group. |

If &getProfile is set to 1 on the [PeopleGroup](/extras/revo/peoples/peoples.peoplegroup "Peoples.PeopleGroup") snippet, also available is any field in the User's Profile.

## See Also

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)