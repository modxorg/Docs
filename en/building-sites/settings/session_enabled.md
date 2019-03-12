---
title: "session_enabled"
_old_id: "1722"
_old_uri: "2.x/administering-your-site/settings/system-settings/session_enabled"
---

## session\_enabled

 **Name**: If sessions for the context the setting is added should be enabled or not 
**Type**: Yes/No 
**Default**: Yes 
**Available In:** 2.2.1+

 Only use this as a context setting, if you add this to the main system settings and set it to No you will lock yourself out of the manager! 

 This setting has to be added manually to the context settings when sessions should be disabled. Setting it to "No" stops MODX from writing session entries to the database (and storing session cookies) and can make a site without required front-end sessions faster.

 If you disable sessions the preview function from the manager will no longer work (as you don't have a session anymore that allows you to preview unpublished resources). This is fixed in the develop branch for 2.3 though. 

## See Also

- [MODX Blog Session-less contexts](http://develop.modx.com/blog/2012/04/05/new-for-2.2.1-session-less-contexts/)
- [Forum Thread](http://forums.modx.com/thread/?thread=75651)