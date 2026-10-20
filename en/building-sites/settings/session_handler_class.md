---
title: "session_handler_class"
_old_id: "280"
_old_uri: "2.x/administering-your-site/settings/system-settings/session_handler_class"
---

## session\_handler\_class

**Name**: Session Handler Class Name
**Type**: String
**Default**: MODX\Revolution\modSessionHandler

For database-managed sessions, use the fully qualified class name `MODX\Revolution\modSessionHandler` (the default). Leave this blank to use standard PHP session management, or set it to your own custom session-handling class. Short class names from 2.x are not resolved by the autoloader.
