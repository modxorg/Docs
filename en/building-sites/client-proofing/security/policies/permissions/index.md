---
title: "Permissions"
_old_id: "217"
_old_uri: "2.x/administering-your-site/security/policies/permissions"
---

## What is a Permission? 

A Permission in Revolution is a single access control that allows or denies execution of a single task. You can think of a permission as a checkbox: can a user perform an action or not?

An example Permission is "content\_types" - if a user's Policy does not contain this Permission, then the user will not be able to perform that action. In this case, the user can not view the Content Types page.

Normally you don't deal with permissions individually, but in groups called [Access Policies](/display/revolution20/Policies "Policies"). An [Access Policy](/display/revolution20/Policies "Policies") is a list of individual permissions (also called an Access Control List or ACL). For example, if you need to grant users the permissions necessary to edit content in the manager, you can assign them to use the "Content Editor" policy.

MODX permissions are always additive: if a permission exists on "Access Policy A" and not on "Access Policy B" and you add both policies to a user, the effective policy is a collection of all the permissions defined in both policies. Adding more policies will never remove permissions for a user. For example, if you add a limited "Load Only" policy to an administrator user, the administrator user will still be able to do all the things defined in the Administrator policy.

## Usage 

In practice, Access Policies are associated with User Groups (not with individual users). Access Policies are associated with a User Group, and users may be added to the group.

Access Policies (ACLs) define lists of permissions (see Security --> Access Controls). These lists contain groups of permissions that belong together.

1. [Permissions - Administrator Policy](building-sites/client-proofing/security/policies/permissions/administrator-policy)
2. [Permissions - Resource Policy](building-sites/client-proofing/security/policies/permissions/resource-policy)

## See Also 

1. [Users](building-sites/client-proofing/security/users)
2. [User Groups](building-sites/client-proofing/security/user-groups)
3. [Resource Groups](building-sites/client-proofing/security/resource-groups)
4. [Roles](building-sites/client-proofing/security/roles)
5. [Policies](building-sites/client-proofing/security/policies)
  1. [Permissions](building-sites/client-proofing/security/policies/permissions)
      1. [Permissions - Administrator Policy](building-sites/client-proofing/security/policies/permissions/administrator-policy)
      2. [Permissions - Resource Policy](building-sites/client-proofing/security/policies/permissions/resource-policy)
  2. [ACLs](building-sites/client-proofing/security/policies/acls)
  3. [PolicyTemplates](building-sites/client-proofing/security/policies/policytemplates)
6. [Security Tutorials](building-sites/client-proofing/security/security-tutorials)
  1. [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
  2. [Making Member-Only Pages](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
  3. [Creating a Second Super Admin User](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
  4. [Restricting an Element from Users](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
  5. [More on the Anonymous User Group](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Hardening MODX Revolution](getting-started/maintenance/securing-modx)
8. [Security Standards](administering-your-site/security/security-standards)
9. [Troubleshooting Security](building-sites/client-proofing/security/troubleshooting-security)
  1. [Resetting a User Password Manually](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)

There are also "Policy Templates" -- these help organize the lists of permission in the Access Policies. An Access Policy is a list of checkboxes, the Policy Templates define which checkboxes are available for an Access Policy. Because the full list of permissions may be quite long, it's not efficient to define Access Policies while having to wade through hundreds of checkboxes. Policy Templates allow you to narrow down the options available to an Access Policy.