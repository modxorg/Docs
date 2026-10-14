---
title: "OnUserProfileBeforeSave"
description: "Fires right before a `modUserProfile` is saved."
---

## Event: OnUserProfileBeforeSave

Fires right before a `modUserProfile` is saved, in `modUserProfile::save()`.

The profile row holds the email, full name, phone, blocked flags, `extended` JSON and more — not the `modUser` login record. Use [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave) when you need the User object itself.

- Service: 1 - Parser Service Events
- Group: User Profiles

## Event Parameters

| Name        | Description                                                                                                        |
| ----------- | ------------------------------------------------------------------------------------------------------------------ |
| userprofile | A reference to the `modUserProfile` object about to be saved.                                                      |
| mode        | `modSystemEvent::MODE_NEW` (`new`) or `modSystemEvent::MODE_UPD` (`upd`), depending on whether the profile is new. |
| cacheFlag   | The `$cacheFlag` value passed into `save()`.                                                                       |


## See Also

- [OnUserProfileSave](extending-modx/plugins/system-events/onuserprofilesave)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)
