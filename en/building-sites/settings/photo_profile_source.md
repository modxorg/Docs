---
title: "photo_profile_source"
description: "Media Source used for user profile photos and avatars."
---

**Name**: User Profile Photo Source
**Type**: Source
**Default**: (empty — the default Media Source)

Specifies the Media Source used to store and retrieve profile photos (avatars). When it is empty, MODX uses the default Media Source.

The value is read by `modUser::getProfilePhoto()` and by the user profile panels in the manager. The photo itself is stored in the `photo` field of the user profile. This setting controls where that file is looked up and how the thumbnail URL is generated.

See also: [Media Sources](building-sites/media-sources), [`default_media_source`](building-sites/settings/default_media_source).
