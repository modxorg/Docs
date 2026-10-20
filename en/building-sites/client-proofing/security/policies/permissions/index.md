---
title: "Permissions"
description: "The permissions of MODX: what a single permission is, and how the policies group them."
_old_id: "217"
_old_uri: "2.x/administering-your-site/security/policies/permissions"
---

## What is a Permission?

A Permission in MODX is a single access control that allows or denies execution of a single task. You can think of a permission as a checkbox: can a user perform an action or not?

An example Permission is `content_types`: if a user's Policy does not contain it, the user cannot perform that action. In this case, the user can not view the Content Types page.

Normally you don't deal with permissions individually, but in groups called [Access Policies](building-sites/client-proofing/security/policies "Policies"). An [Access Policy](building-sites/client-proofing/security/policies "Policies") is a list of individual permissions (also called an Access Control List or ACL). For example, to grant users the permissions needed to edit content in the manager, assign them the "Content Editor" policy.

MODX permissions are always additive. If a permission exists on "Access Policy A" and not on "Access Policy B", and you add both policies to a user, the effective policy holds the permissions of both. Adding more policies will never remove permissions for a user. For example, if you add a limited "Load Only" policy to an administrator user, that user still can do everything the Administrator policy defines.

## Usage

In practice, Access Policies are associated with User Groups (not with individual users). Access Policies are associated with a User Group, and users may be added to the group.

Access Policies (ACLs) define lists of permissions (see the lock icon in the user menu → **Access Control Lists**). These lists contain groups of permissions that belong together.

1. [Administrator Policy](building-sites/client-proofing/security/policies/permissions/administrator-policy)
2. [Resource Policy](building-sites/client-proofing/security/policies/permissions/resource-policy)

Policy Templates organize the lists of permissions in the Access Policies. An Access Policy is a list of checkboxes, the Policy Templates define which checkboxes are available for an Access Policy. Because the full list of permissions may be quite long, it's not efficient to define Access Policies while having to wade through hundreds of checkboxes. Policy Templates allow you to narrow down the options available to an Access Policy.

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
