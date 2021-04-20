---
title: "tpl"
_old_id: "948"
_old_uri: "revo/peoples/peoples.peoplegroups/peoples.peoplegroups.tpl"
---

## PeopleGroups's tpl Chunk

This is the Chunk displayed with the &tpl property on the [PeopleGroups](extras/peoples/peoples.peoplegroups "Peoples.PeopleGroups") snippet.

## Default Value

```php
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

-   [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    -   [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
-   [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    -   [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
-   [Peoples.Peoples](extras/peoples/peoples)
    -   [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
