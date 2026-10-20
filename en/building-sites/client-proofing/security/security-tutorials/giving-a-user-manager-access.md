---
title: "Giving a User Manager Access"
description: "Give a user in MODX the rights of a manager: the group, the roles and the policy that do it."
_old_id: "155"
_old_uri: "2.x/administering-your-site/security/security-tutorials/giving-a-user-manager-access"
---

## The Problem

You want a User to have manager editing access, but not have all the [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions") of an Administrator user. This tutorial, partially written by BobRay, will help you through that.

## The Solution

1. In Access Controls ->Roles, create a new role (lets call it "Editor") with an authority of 10.
2. In the lock icon in the user menu → **Access Control Lists** → the tab **Policies**, duplicate the administrator policy and rename it. For our example we'll use "AdminLite".
3. Edit the AdminLite Policy to use whatever [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions") you want the User to have.
4. In the lock icon in the user menu → **Access Control Lists** → the tab **User Groups & Users**, right click the "Administrator" group and select "Update User Group.".
5. On the Permissions -> Context Access tab, add two new entries to the grid:
    1. Context: 'mgr' Minimum Role: 'Editor', Access Policy 'AdminLite'
    2. Context: 'web' Minimum Role: 'Editor', Access Policy 'Load, List and View'
6. In the lock icon in the user menu → **Users**, create the new user or edit an existing one. On the Access Permissions tab, assign them to the Administrator group with a role of Editor.
7. Click on **Logout All Users** and re-login.

## Publishing in the manager

If the user can edit resources but cannot publish (Published checkbox snaps back, no publish dates, no Publish in the tree menu):

- Stock **Content Editor** has no `publish_document` / `unpublish_document`.
- Those keys must appear on a Context Access ACL for **`mgr`**, not only on `web` or another frontend context.
- Resource Policy permissions `publish` / `unpublish` do not drive the current manager publish UI.

More detail: [ACLs: Manager publishing and multiple groups](building-sites/client-proofing/security/policies/acls#manager-publishing-and-multiple-groups).

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
