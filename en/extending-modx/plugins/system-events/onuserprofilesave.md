---
title: "OnUserProfileSave"
---

## Event: OnUserProfileSave

Fires after a `modUserProfile` has been saved successfully. That is the extended profile row (email, full name, phone, blocked flags, `extended` JSON, and so on), not the `modUser` login record. Use [OnUserSave](extending-modx/plugins/system-events/onusersave) when you need the user object itself.

Invoked from `modUserProfile::save()` only when `parent::save()` returns true.

- Service: 1 - Parser Service Events
- Group: User Profiles

## Event Parameters

| Name | Description |
| ---- | ----------- |
| userprofile | A reference to the saved `modUserProfile` object. |
| mode | `modSystemEvent::MODE_NEW` (`new`) or `modSystemEvent::MODE_UPD` (`upd`), depending on whether the profile was new. |
| cacheFlag | The `$cacheFlag` value passed into `save()`. |

## See Also

- [OnUserProfileBeforeSave](extending-modx/plugins/system-events/onuserprofilebeforesave)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)
- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)
