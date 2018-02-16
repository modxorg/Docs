---
title: "ACLs"
_old_id: "9"
_old_uri: "2.x/administering-your-site/security/policies/acls"
---

<div>- [What is an ACL (Access Control List)?](#ACLs-WhatisanACL%28AccessControlList%29%3F)
- [Usage](#ACLs-Usage)
  - [Context ACL](#ACLs-ContextACL)
  - [Resource ACL](#ACLs-ResourceACL)
- [See Also](#ACLs-SeeAlso)

</div>What is an ACL (Access Control List)?
-------------------------------------

An ACL, or Access Control List, is a set of [Permissions](administering-your-site/security/policies/permissions "Permissions") attached to an object. More information on ACLs can be found [here in Wikipedia](http://en.wikipedia.org/wiki/Access_control_list).

Usage
-----

In MODx, ACLs can be applied to any modAccessibleObject. Primarily MODx Revolution 2.0 allows for ACLs on Resources and Contexts.

### Context ACL

A Context ACL is referenced of 4 parts:

- A [Context](administering-your-site/contexts "Contexts")
- A [User Group](administering-your-site/security/user-groups "User Groups")
- A [Minimum Role](administering-your-site/security/roles "Roles")
- An [Access Policy](administering-your-site/security/policies "Policies")

This means that one can assign a ACL to a Context that will apply to:

- All the Users in a User Group
- ...with at least the Minimum Role specified
- ...that will give the Users all the Permissions in the Access Policy assigned.

### Resource ACL

Resource ACLs behave a bit differently, and basically allow you to restrict access to Resources (such as Documents, Weblinks, etc) by Resource Groups. They are comprised of 5 Parts:

- A [Resource Group](administering-your-site/security/resource-groups "Resource Groups")
- A [User Group](administering-your-site/security/user-groups "User Groups")
- A [Minimum Role](administering-your-site/security/roles "Roles")
- An [Access Policy](administering-your-site/security/policies "Policies")
- A [Context](administering-your-site/contexts "Contexts")

This means that an ACL applied to a Resource Group will:

- Effect all the Users in the specified User Group
- ... with at least the Minimum Role specified
- ... give the Resource Permissions (save, load, delete, etc) in the Policy specified
- ... to all the Resources in the Resource Group

See Also
--------

1. [Users](administering-your-site/security/users)
2. [User Groups](administering-your-site/security/user-groups)
3. [Resource Groups](administering-your-site/security/resource-groups)
4. [Roles](administering-your-site/security/roles)
5. [Policies](administering-your-site/security/policies)
  1. [Permissions](administering-your-site/security/policies/permissions)
      1. [Permissions - Administrator Policy](administering-your-site/security/policies/permissions/permissions-administrator-policy)
      2. [Permissions - Resource Policy](administering-your-site/security/policies/permissions/permissions-resource-policy)
  2. [ACLs](administering-your-site/security/policies/acls)
  3. [PolicyTemplates](administering-your-site/security/policies/policytemplates)
6. [Security Tutorials](administering-your-site/security/security-tutorials)
  1. [Giving a User Manager Access](administering-your-site/security/security-tutorials/giving-a-user-manager-access)
  2. [Making Member-Only Pages](administering-your-site/security/security-tutorials/making-member-only-pages)
  3. [Creating a Second Super Admin User](administering-your-site/security/security-tutorials/creating-a-second-super-admin-user)
  4. [Restricting an Element from Users](administering-your-site/security/security-tutorials/restricting-an-element-from-users)
  5. [More on the Anonymous User Group](administering-your-site/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Hardening MODX Revolution](administering-your-site/security/hardening-modx-revolution)
8. [Security Standards](administering-your-site/security/security-standards)
9. [Troubleshooting Security](administering-your-site/security/troubleshooting-security)
  1. [Resetting a User Password Manually](administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually)