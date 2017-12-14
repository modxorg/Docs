---
title: "More on the Anonymous User Group"
_old_id: "1352"
_old_uri: "2.x/administering-your-site/security/security-tutorials/more-on-the-anonymous-user-group"
---

Who's Anonymous?
----------------

### 

Anyone who visits the site and is not logged in belongs to the Anonymous [User Group](/revolution/2.x/administering-your-site/security/user-groups "User Groups").

You can edit the User Group by navigating to the top menu item Security » Access Controls, User Groups tab. Then right-click on the Anonymous User Group's name and select "Update User Group". ![](/download/attachments/42565753/Access+Controls.png?version=1&modificationDate=1350716439000)

What Can Anonymous Users Do?
----------------------------

### 

By default, Anonymous Users are granted Load Only permissions in every [Context](/revolution/2.x/administering-your-site/contexts "Contexts") except the "mgr" Context. Without Load Only permissions, requests to the Context would result in a 404 Page Not Found response.

![](/download/attachments/42565753/User+Group_+anonymous.png?version=2&modificationDate=1350710081000)

Load Only permissions doesn't necessarily mean they can View the Resource (see below).

For example, if you create a [Resource Group](/revolution/2.x/administering-your-site/security/resource-groups "Resource Groups") and grant access permissions to a specific User Group, the Anonymous User Group won't be able to access that Resource Group at all. This is the basis of [Creating Member Only Pages](/revolution/2.x/administering-your-site/security/security-tutorials/making-member-only-pages "Making Member-Only Pages").

### 401 vs 404 Response on Protected Pages

When you create protected Resource Groups, the Anonymous User Group won't have Load permissions on it by default - they will get a 404 Page Not Found response. If you want them to see a 401 Unauthorized response instead, you have to grant the Anonymous User Group access to the Resource Group with Load Only permissions.

You can do this in the Resource Group Access tab of the Anonymous User Group editing page.

![](/download/attachments/42565753/Screen+Shot+2012-10-19+at+11.43.46+PM.png?version=1&modificationDate=1350715791000)

Click on "Add Resource Group", select the protected Resource Group in the dropdown, select the Context in which you want to grant access (don't select the "mgr" context) and choose Load Only as the Access Policy. Click "Save" and you're done.

They still will not be able to view the Resources in that protected Resource Group - they will only be able to "Load" it, and get a 401 response. You can specify a Resource ID to serve as a custom Unauthorized page by using the [Unauthorized Page System Setting](/revolution/2.x/administering-your-site/settings/system-settings/unauthorized_page "unauthorized_page").