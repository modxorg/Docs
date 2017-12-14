---
title: "Discuss.Controllers.profile"
_old_id: "819"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.profile"
---

The Profile controller acts as a legacy **redirect** coming from SMF. It does not have any options or templates, but just attempts to parse an SMF-style profile url to the proper Discuss style (user/index).

This controller has been marked as **deprecated** on 2012-12-18 with the goal of isolating legacy redirects someplace else in a future version.

<div>- [Basic Information](#Discuss.Controllers.profile-BasicInformation)
- [Options](#Discuss.Controllers.profile-Options)
- [Controller Template](#Discuss.Controllers.profile-ControllerTemplate)
- [System Events](#Discuss.Controllers.profile-SystemEvents)

</div>Basic Information
-----------------

<table><tbody><tr><td>Since Version</td><td>1.0</td></tr><tr><td>Controller File</td><td>controllers/web/profile.class.php</td></tr><tr><td>Controller Class Name</td><td>DiscussProfileController   
</td></tr><tr><td>Controller Template</td><td>None</td></tr><tr><td>Manifest Name</td><td>profile</td></tr><tr><td>Deprecated</td><td>2012-12-18</td></tr></tbody></table>Options
-------

The Profile controller does not have any manifest options.

Controller Template
-------------------

There is no template for this controller.

System Events
-------------

No custom system events trigger on this controller.