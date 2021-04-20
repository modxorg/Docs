---
title: "anonymous_sessions"
description: "If disabled, only authenticated users will have access to a PHP session"
---

**Name**: Anonymous Sessions  
**Type**: Yes/No  
**Default**: Yes  
**Available In**: Revolution 2.5.0+

If disabled, only authenticated users will have access to a PHP session. This can reduce overhead for anonymous users and the load they impose on a MODX site if they do not need access to a unique session. If `session_enabled` is false, this setting has no effect as sessions would never be available.