---
title: "OnUserChangePassword"
description: "Fires anytime the user properly changes their password."
_old_id: "471"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserchangepassword"
---

## Event: OnUserChangePassword

Fires when a User changes their password.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name         | Description                                    |
| ------------ | ---------------------------------------------- |
| user         | A reference to the modUser object.                   |
| newpassword  | The new password being set.                    |
| oldpassword  | The old password being overridden.             |
| userid       | The ID of the User. (deprecated)          |
| username     | The username of the User. (deprecated)         |
| userpassword | The new password being set. (deprecated)       |

## Example

Log the password change to the error log:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnUserChangePassword':
        $name = $user->get('username');
        $modx->log(modX::LOG_LEVEL_ERROR, 'User '.$name.' changed the password from '.'from '.$newpassword.' to '.$oldpassword);
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
