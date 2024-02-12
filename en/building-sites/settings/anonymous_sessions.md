---
title: "anonymous_sessions"
description: "If disabled, only authenticated users will have access to a PHP session"
---

**Name**: Anonymous Sessions  
**Type**: Yes/No  
**Default**: Yes  
**Available In**: Revolution 2.5.0+

If disabled, only authenticated users will have access to a PHP session. This can reduce overhead for anonymous users and the load they impose on a MODX site if they do not need access to a unique session. If `session_enabled` is false, this setting has no effect as sessions would never be available.

!!! danger "Use as context setting only"
    Only use this as a context setting, if you add this to the main system settings and set it to No you will lock yourself out of the manager!
    
    This setting has to be added manually to the context settings when anonymous sessions should be disabled. Setting it to "No" stops MODX from writing session entries of anonymous users to the database (and storing session cookies) and can make a site without required front-end sessions faster.

    If session_enabled is false, this setting has no effect as sessions would never be available.
