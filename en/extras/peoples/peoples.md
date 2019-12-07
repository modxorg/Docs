---
title: "Peoples"
_old_id: "949"
_old_uri: "revo/peoples/peoples.peoples"
---

## The Peoples Snippet

This snippet displays all the Users of a site.

## Usage

`[[Peoples]]`

## Available Properties

| Name | Description       | Default                                                                          |
| ---- | ----------------- | -------------------------------------------------------------------------------- |
| 1    | tpl               | The Chunk to use for each User.                                                  | pplUser  |
| 2    | active            | 0 to show only inactive Users, 1 to show only active Users, 2 to show all Users. |
| 3    | usergroups        | Optional. A comma-separated list of User Group names to filter by.               |
| 4    | limit             | The number of users to limit per call. Defaults to 10. Set to 0 to show all.     |
| 5    | start             | The start index to begin with when limiting.                                     |
| 6    | sortBy            | The field name to sort by. (Cannot be an extended field.)                        | username |
| 7    | sortByAlias       | The class to use with the sort field.                                            | User     |
| 8    | sortDir           | The direction to sort by.                                                        | ASC      |
| 9    | cls               | Will append this CSS class to each item.                                         | ppl-user |
| 10   | altCls            | Optional. If set, will append this CSS class to every even item.                 |
| 11   | firstCls          | Optional. If set, will append this CSS class to the first item.                  |
| 12   | lastCls           | Optional. If set, will append this CSS class to the last item.                   |
| 13   | placeholderPrefix | The prefix to use when setting global placeholders, such as total.               | peoples. |
| 14   | outputSeparator   | The separator between each user record.                                          |
| 15   | toPlaceholder     | Optional. If set, will set the output to this placeholder and return empty.      |
| 16   | userClass         | The class name of the Users object.                                              | modUser  |
| 17   | userAlias         | The class alias of the Users object.                                             | User     |

## Peoples Chunks

The only chunk used in the Peoples snippet is the &tpl property, which uses the default of pplUser.

## Examples

Show all the Users for a site.

``` php
[[Peoples]]
```

## Available Properties

| Name              | Description                                                                      | Default  |
| ----------------- | -------------------------------------------------------------------------------- | -------- |
| tpl               | The Chunk to use for each User.                                                  | pplUser  |
| active            | 0 to show only inactive Users, 1 to show only active Users, 2 to show all Users. | 1        |
| usergroups        | Optional. A comma-separated list of User Group names to filter by.               |          |
| limit             | The number of users to limit per call. Defaults to 10. Set to 0 to show all.     | 10       |
| start             | The start index to begin with when limiting.                                     | 0        |
| sortBy            | The field name to sort by. (Cannot be an extended field.)                        | username |
| sortByAlias       | The class to use with the sort field.                                            | User     |
| sortDir           | The direction to sort by.                                                        | ASC      |
| cls               | Will append this CSS class to each item.                                         | ppl-user |
| altCls            | Optional. If set, will append this CSS class to every even item.                 |          |
| firstCls          | Optional. If set, will append this CSS class to the first item.                  |          |
| lastCls           | Optional. If set, will append this CSS class to the last item.                   |          |
| placeholderPrefix | The prefix to use when setting global placeholders, such as total.               | peoples. |
| outputSeparator   | The separator between each user record.                                          |          |
| toPlaceholder     | Optional. If set, will set the output to this placeholder and return empty.      |          |
| userClass         | The class name of the Users object.                                              | modUser  |
| userAlias         | The class alias of the Users object.                                             | User     |

## Peoples Chunks

The only chunk used in the Peoples snippet is the &tpl property, which uses the default of pplUser.

- [tpl](extras/peoples/peoples.peoples/peoples.peoples.tpl "Peoples.Peoples.tpl")

## Examples

Show all the Users for a site.

``` php
[[Peoples? &limit=`0`]]
```

Show the first 10 users in the User Group "HR Department":

``` php
[[Peoples? &limit=`10` &usergroups=`HR Department`]]
```

Show all the inactive users in the site:

``` php
[[Peoples? &limit=`0` &active=`0`]]
```

## See Also

- [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    - [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl)
- [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    - [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl)
- [Peoples.Peoples](extras/peoples/peoples.peoples)
    - [Peoples.Peoples.tpl](extras/peoples/peoples.peoples/peoples.peoples.tpl)
- [Peoples.Roadmap](extras/peoples/peoples.roadmap)
