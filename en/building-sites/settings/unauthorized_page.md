---
title: "unauthorized_page"
_old_id: "319"
_old_uri: "2.x/administering-your-site/settings/system-settings/unauthorized_page"
---

## unauthorized\_page

**Name**: Unauthorized Page
**Type**: Number
**Default**: 1

The ID of the resource you want to send users to if they have requested a secured or unauthorized resource, i.e. a virtual HTTP 403.

This will only work if you have a 'load' Permission (via a Load policy or custom policy) set to the context that the Resource being accessed is in.

Make sure the ID you enter belongs to an existing resource that has been published and is publicly accessible!

## See Also

[site\_unavailable\_page](building-sites/settings/site_unavailable_page "site_unavailable_page")
