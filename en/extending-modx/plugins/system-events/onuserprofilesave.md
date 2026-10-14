---
title: "OnUserProfileSave"
description: "Fires after a `modUserProfile` has been saved successfully."
---

## Event: OnUserProfileSave

Fires after a `modUserProfile` is saved, in `modUserProfile::save()` — but only when `parent::save()` returns true.

The profile row holds the email, full name, phone, blocked flags, `extended` JSON and more — not the `modUser` login record. Use [OnUserSave](extending-modx/plugins/system-events/onusersave) when you need the User object itself.

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
