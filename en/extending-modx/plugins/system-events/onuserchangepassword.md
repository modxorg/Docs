---
title: "OnUserChangePassword"
_old_id: "471"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserchangepassword"
---

## Event: OnUserChangePassword

Fires anytime the user properly changes their password.

- Service: 1 - Parser Service Events
- Group: None

## Event Parameters

| Name         | Description                                    |
| ------------ | ---------------------------------------------- |
| user         | A reference to the modUser object of the user. |
| newpassword  | The new password being set.                    |
| oldpassword  | The old password being overridden.             |
| userid       | The user ID of the user. (deprecated)          |
| username     | The username of the user. (deprecated)         |
| userpassword | The new password being set. (deprecated)       |


## Example

Such a plugin will display in the Error Log "who changed the password, what was his password and what he changed it to:

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
