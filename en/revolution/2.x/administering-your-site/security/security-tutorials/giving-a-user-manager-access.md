---
title: "Giving a User Manager Access"
_old_id: "155"
_old_uri: "2.x/administering-your-site/security/security-tutorials/giving-a-user-manager-access"
---

The Problem
-----------

 You want a User to have manager editing access, but not have all the [Permissions](/revolution/2.x/administering-your-site/security/policies/permissions "Permissions") of an Administrator user. This tutorial, partially written by BobRay, will help you through that.

The Solution
------------

1. In Access Controls ->Roles, create a new role (lets call it "Editor") with an authority of 10.
2. In Settings -> Access Control Lists -> Access Policies, duplicate the administrator policy and rename it to whatever you want, for our example we'll use "AdminLite".
3. Edit the AdminLite Policy to use whatever [Permissions](/revolution/2.x/administering-your-site/security/policies/permissions "Permissions") you want the User to have.
4. In Settings -> Access Control Lists -> User Groups, right click on the "Administrator" group and select "Update User Group."
5. On the Permissions -> Context Access tab, add two new entries to the grid: 
  1. Context: 'mgr' Minimum Role: 'Editor', Access Policy 'AdminLite'
  2. Context: 'web' Minimum Role: 'Editor', Access Policy 'Load, List and View'
6. In Manage -> Users, create the new user, or edit existing, and via the Access Permissions tab, assign them to the Administrator group with a role of Editor.
7. Click on Security -> Flush Sessions and re-login.

See Also
--------

1. [Giving a User Manager Access](/revolution/2.x/administering-your-site/security/security-tutorials/giving-a-user-manager-access)
2. [Making Member-Only Pages](/revolution/2.x/administering-your-site/security/security-tutorials/making-member-only-pages)
3. [Creating a Second Super Admin User](/revolution/2.x/administering-your-site/security/security-tutorials/creating-a-second-super-admin-user)
4. [Restricting an Element from Users](/revolution/2.x/administering-your-site/security/security-tutorials/restricting-an-element-from-users)
5. [More on the Anonymous User Group](/revolution/2.x/administering-your-site/security/security-tutorials/more-on-the-anonymous-user-group)