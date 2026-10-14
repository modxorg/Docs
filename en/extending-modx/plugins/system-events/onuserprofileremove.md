---
title: "OnUserProfileRemove"
description: "Fires after a User Profile is removed."
---

## Event: OnUserProfileRemove

Fires after a User Profile is removed, in `modUserProfile::remove()`.

- Service: 1 - Parser Service Events
- Group: User Profiles

## Event Parameters

| Name | Description |
| ---- | ----------- |
| userprofile | A reference to the modUserProfile object. |
| ancestors | An array of ancestor IDs passed to `remove()`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
