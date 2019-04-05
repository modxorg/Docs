---
title: "PeopleGroup"
_old_id: "945"
_old_uri: "revo/peoples/peoples.peoplegroup"
---

## The PeopleGroup Snippet

This snippet displays a User Group and the Users within it.

## Usage

Display the User Group "HR Department", along with its Users:

``` php 
[[PeopleGroup? &usergroup=`HR Department` &toPlaceholder=`users`]]

<h2>[[+peoplegroups.name]] ([[+peoplegroups.userCount]] Users)</h2>

<ul>
[[+users]]
</ul>
```

## Available Properties

| Name | Description | Default |
|------|-------------|---------|
| userTpl | The Chunk to use for each User. | pplGroupUser |
| limit | The number of user groups to limit per call. Defaults to 10. Set to 0 to show all. | 0 |
| start | The start index to begin with when limiting. | 0 |
| sortBy | The field name to sort by.) | username |
| sortByAlias | The class to use with the sort field. | modUser |
| sortDir | The direction to sort by. | ASC |
| cls | Will append this CSS class to each item. | ppl-user |
| altCls | Optional. If set, will append this CSS class to every even item. |  |
| firstCls | Optional. If set, will append this CSS class to the first item. |  |
| lastCls | Optional. If set, will append this CSS class to the last item. |  |
| placeholderPrefix | The prefix to use when setting global placeholders, such as total. | peoplegroups. |
| outputSeparator | The separator between each user record. |  |
| toPlaceholder | Optional. If set, will set the output to this placeholder and return empty. |  |
| userClass | The class name of the Users object. | modUser |
| getProfile | If true, will also get the Profile fields for each User. | 0 |
| profileAlias | The class alias of the Profile object. | Profile |

## PeopleGroup Chunks

The only chunk used in the PeopleGroup snippet is the &userTpl property, which uses the default of pplGroupUser.

- [userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl "Peoples.PeopleGroup.userTpl")

## Examples

Show all the Users of the User Group "Marketing", but sort by Role Authority instead of username:

``` php 
[[!PeopleGroup? 
  &usergroup=`Marketing`
  &placeholderPrefix=`ug.` 
  &toPlaceholder=`ug.users`
  &sortBy=`authority`
  &sortByAlias=`UserGroupRole`
]]

<h2>Users in [[+ug.name]]</h2>

[[+ug.users]]
```

## See Also

1. [Peoples.PeopleGroup](/extras/revo/peoples/peoples.peoplegroup)
  1. [Peoples.PeopleGroup.userTpl](/extras/revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
2. [Peoples.PeopleGroups](/extras/revo/peoples/peoples.peoplegroups)
  1. [Peoples.PeopleGroups.tpl](/extras/revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
3. [Peoples.Peoples](/extras/revo/peoples/peoples.peoples)
  1. [Peoples.Peoples.tpl](/extras/revo/peoples/peoples.peoples/peoples.peoples.tpl)
4. [Peoples.Roadmap](/extras/revo/peoples/peoples.roadmap)