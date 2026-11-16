---
title: "More on the Anonymous User Group"
description: "Who the anonymous user of MODX is, and how to give the visitor a different access than the default one."
_old_id: "1352"
_old_uri: "2.x/administering-your-site/security/security-tutorials/more-on-the-anonymous-user-group"
---

## Who's Anonymous?

Anyone who visits the site and is not logged in is the anonymous user.

**The anonymous user is not a User Group**
There is no group named Anonymous. In the group tree the visitor shows up as `(anonymous)`. You can edit that entry like any other group. What you change is the anonymous user's access.

You reach it from the lock icon → **Access Control Lists**, the tab **User Groups & Users**. Right-click `(anonymous)` and select **Edit User Group**. ![](access+controls.png)

## What Can Anonymous Users Do?

By default, the anonymous user is granted Load Only in every [Context](building-sites/contexts "Contexts") except the "mgr" Context. Without Load Only, a request to the Context returns 404 Page Not Found.

![](user+group_+anonymous.png)

Load Only does not necessarily mean they can View the Resource.

If you create a [Resource Group](building-sites/client-proofing/security/resource-groups "Resource Groups") and grant it to a specific User Group, the anonymous user cannot access it. That is the basis of [Making Member-Only Pages](building-sites/client-proofing/security/security-tutorials/making-member-only-pages "Making Member-Only Pages").

### 401 vs 404 Response on Protected Pages

On a protected Resource Group, the anonymous user has no Load permission by default and gets 404 Page Not Found. To return 401 Unauthorized instead, grant that user access to the Resource Group with the Load Only policy.

Do this on the Resource Group Access tab of the anonymous user's editing page.

![](screen+shot+2012-10-19+at+11.43.46+pm.png)

Click "Add Resource Group", select the protected Resource Group, and select the Context (don't select the "mgr" context). Choose Load Only as the Access Policy and click "Save".

They still cannot view the Resources in that Resource Group. They can only Load it, and the response is 401. Set a Resource ID as the Unauthorized page with the [Unauthorized Page](building-sites/settings/unauthorized_page "unauthorized_page") system setting.

## See Also

1. [Security (ACLs)](building-sites/client-proofing/security)
2. [Users](building-sites/client-proofing/security/users)
3. [User Groups](building-sites/client-proofing/security/user-groups)
4. [Resource Groups](building-sites/client-proofing/security/resource-groups)
5. [Roles](building-sites/client-proofing/security/roles)
6. [Policies](building-sites/client-proofing/security/policies)
    1. [Permissions](building-sites/client-proofing/security/policies/permissions)
        1. [Administrator Policy](building-sites/client-proofing/security/policies/permissions/administrator-policy)
        2. [Resource Policy](building-sites/client-proofing/security/policies/permissions/resource-policy)
    2. [ACLs](building-sites/client-proofing/security/policies/acls)
    3. [Policy Templates](building-sites/client-proofing/security/policies/policytemplates)
7. [Security Tutorials](building-sites/client-proofing/security/security-tutorials)
    1. [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Making Member-Only Pages](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Creating a Second Super Admin User](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Restricting an Element from Users](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [More on the Anonymous User Group](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
8. [Troubleshooting Security](building-sites/client-proofing/security/troubleshooting-security)
    1. [Resetting a User Password Manually](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
