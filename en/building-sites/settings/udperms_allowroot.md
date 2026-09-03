---
title: "udperms_allowroot"
_old_id: "317"
_old_uri: "2.x/administering-your-site/settings/system-settings/udperms_allowroot"
---

The `udperms_allowroot` setting was removed in MODX 3.0. Revolution already ignored it. Root resource creation is controlled by the `new_document_in_root` [permission](building-sites/client-proofing/security/policies/permissions/administrator-policy) on the Administrator Policy (granted by default).

Grant `new_document_in_root` to let users create resources at the site root. Deny it to block create, duplicate, and move into the root.
