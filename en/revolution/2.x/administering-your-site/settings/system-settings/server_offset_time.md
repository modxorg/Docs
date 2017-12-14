---
title: "server_offset_time"
_old_id: "274"
_old_uri: "2.x/administering-your-site/settings/system-settings/server_offset_time"
---

server\_offset\_time
--------------------

**Name**: Server Offset Time   
**Type**: Number   
**Default**: 0

MODX uses this setting to show dates and times (e.g. the Published On, Publish Date, Unpublish Date of a Resource) to Manager users in their Local Time. The intent is to free users from having to consider the server time when reading or setting dates and times. As a System Setting, it applies to all users automatically, but can be overridden per-user with a User Setting.

Enter the number of hours time difference between where you or your Manager users are and where the server is. Fractional and negative hours are valid, e.g. 1.5, -0.5. A value of 1 will set Local Time 1 hour ahead of the Server Time.

The Reports > System Info page shows you both the Server Time and Local Time, so it's a good way to confirm you've set this correctly.

<div class="warning">**Warning**  
This setting is handled incorrectly in some places in MODX prior to 2.2.7, notably in the handling of auto publishing and unpublishing.</div><div class="info">**For the devs or dev-curious..**  
Server Time here means what time PHP thinks it is, i.e. with the time() function. MODX stores and compares Resource-related dates and times as Unix timestamps, relative to Server Time. The server\_offset\_time is used to calculate Local Time only in the view.</div>