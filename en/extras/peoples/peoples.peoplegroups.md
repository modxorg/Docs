---
title: "PeopleGroups"
_old_id: "947"
_old_uri: "revo/peoples/peoples.peoplegroups"
---

## The PeopleGroups Snippet

This snippet displays all the User Groups of a site.

## Usage

Display the first 10 User Groups, sorted by name:

``` php
[[!PeopleGroups]]
```

## Available Properties

| Name              | Description                                                                          | Default       |
| ----------------- | ------------------------------------------------------------------------------------ | ------------- |
| tpl               | The Chunk to use for each User Group.                                                | pplUserGroup  |
| user              | Optional. If an ID of a User is specified, will only show User Groups for that User. |               |
| limit             | The number of user groups to limit per call. Defaults to 10. Set to 0 to show all.   | 10            |
| start             | The start index to begin with when limiting.                                         | 0             |
| sortBy            | The field name to sort by.)                                                          | name          |
| sortByAlias       | The class to use with the sort field.                                                | modUserGroup  |
| sortDir           | The direction to sort by.                                                            | ASC           |
| cls               | Will append this CSS class to each item.                                             | ppl-usergroup |
| altCls            | Optional. If set, will append this CSS class to every even item.                     |               |
| firstCls          | Optional. If set, will append this CSS class to the first item.                      |               |
| lastCls           | Optional. If set, will append this CSS class to the last item.                       |               |
| placeholderPrefix | The prefix to use when setting global placeholders, such as total.                   | peoplegroups. |
| outputSeparator   | The separator between each user record.                                              |               |
| toPlaceholder     | Optional. If set, will set the output to this placeholder and return empty.          |               |
| userClass         | The class name of the Users object.                                                  | modUser       |

## PeopleGroups Chunks

The only chunk used in the PeopleGroups snippet is the &tpl property, which uses the default of pplUserGroup.

- [tpl](extras/peoples/peoples.peoplegroups/tpl "Peoples.PeopleGroups.tpl")

## Examples

Show all the User Groups for a site.

``` php
[[PeopleGroups? &limit=`0`]]
```

Show all the User Groups for the User with ID 23:

``` php
[[PeopleGroups? &user=`23` &limit=`0`]]
```

Show the first 10 User Groups for the User with ID 15:

``` php
[[!PeopleGroups? &user=`15`]]
```

## See Also

- [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    - [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
- [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    - [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
- [Peoples.Peoples](extras/peoples/peoples)
    - [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
