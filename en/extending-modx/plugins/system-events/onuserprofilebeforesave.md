---
title: "OnUserProfileBeforeSave"
---

## Event: OnUserProfileBeforeSave

Fires right before a `modUserProfile` is saved. That is the extended profile row (email, full name, phone, blocked flags, `extended` JSON, and so on), not the `modUser` login record. Use [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave) when you need the user object itself.

Invoked from `modUserProfile::save()` in MODX Revolution 3.x.

- Service: 1 - Parser Service Events
- Group: User Profiles

## Event Parameters

| Name | Description |
| ---- | ----------- |
| userprofile | A reference to the `modUserProfile` object about to be saved. |
| mode | `modSystemEvent::MODE_NEW` (`new`) or `modSystemEvent::MODE_UPD` (`upd`), depending on whether the profile is new. |
| cacheFlag | The `$cacheFlag` value passed into `save()`. |

## See Also

- [OnUserProfileSave](extending-modx/plugins/system-events/onuserprofilesave)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)
