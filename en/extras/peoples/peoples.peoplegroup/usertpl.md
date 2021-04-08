---
title: "userTpl"
_old_id: "946"
_old_uri: "revo/peoples/peoples.peoplegroup/peoples.peoplegroup.usertpl"
---

## PeopleGroup's userTpl Chunk

This is the Chunk displayed with the &userTpl property on the [PeopleGroup](extras/peoples/peoples.peoplegroup "Peoples.PeopleGroup") snippet.

## Default Value

```php
<li class="[[+cls]]">[[+username]] - <em>[[+role]]</em></li>
```

## Available Placeholders

| Name     | Description                                               |
| -------- | --------------------------------------------------------- |
| id       | The ID of the User.                                       |
| username | The username of the User.                                 |
| active   | Either 1 or 0, depending on if the User is active or not. |
| role     | The name of the Role of the User in the group.            |
| role_id  | The ID of the Role of the User in the group.              |

If &getProfile is set to 1 on the [PeopleGroup](extras/peoples/peoples.peoplegroup "Peoples.PeopleGroup") snippet, also available is any field in the User's Profile.

## See Also

-   [Peoples.PeopleGroup](extras/peoples/peoples.peoplegroup)
    -   [Peoples.PeopleGroup.userTpl](extras/peoples/peoples.peoplegroup/usertpl)
-   [Peoples.PeopleGroups](extras/peoples/peoples.peoplegroups)
    -   [Peoples.PeopleGroups.tpl](extras/peoples/peoples.peoplegroups/tpl)
-   [Peoples.Peoples](extras/peoples/peoples)
    -   [Peoples.Peoples.tpl](extras/peoples/peoples/tpl)
