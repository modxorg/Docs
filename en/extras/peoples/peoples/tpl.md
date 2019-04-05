---
title: "tpl"
_old_id: "950"
_old_uri: "revo/peoples/peoples.peoples/peoples.peoples.tpl"
---

## Peoples's tpl Chunk

This is the Chunk displayed with the &tpl property on the [Peoples](/extras/revo/peoples/peoples.peoples "Peoples.Peoples") snippet.

## Default Value

``` php 
<li class="[[+cls]]">[[+username]]</li>
```

## Available Placeholders

| Name | Description |
|------|-------------|
| id | The ID of the User. |
| username | The username of the User. |
| active | Either 1 or 0, if the User is active or not. |
| cls | The current CSS class(es) for the item. |

Also available is any field in the User's profile, such as email, fullname, etc.

Extended and Remote Data fields can be accessed via:

``` php 
[[+extended.nameOfExtendedAttribute]]
[[+remote_data.nameOfRemoteDataAttribute]]
```

## See Also

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)