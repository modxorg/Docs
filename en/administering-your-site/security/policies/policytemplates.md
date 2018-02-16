---
title: "PolicyTemplates"
_old_id: "244"
_old_uri: "2.x/administering-your-site/security/policies/policytemplates"
---

<div>- [What are Policy Templates?](#PolicyTemplates-WhatarePolicyTemplates%3F)
  - [AdministratorTemplate](#PolicyTemplates-AdministratorTemplate)
  - [ElementTemplate](#PolicyTemplates-ElementTemplate)
  - [MediaSourceTemplate](#PolicyTemplates-MediaSourceTemplate)
  - [ObjectTemplate](#PolicyTemplates-ObjectTemplate)
  - [ResourceTemplate](#PolicyTemplates-ResourceTemplate)
  - [ContextTemplate](#PolicyTemplates-ContextTemplate)
- [See Also](#PolicyTemplates-SeeAlso)

</div>What are Policy Templates? 
---------------------------

Policy Templates define which permissions are _available_ to an [Access Policy](administering-your-site/security/policies "Policies"). A Policy Template does not say if a permission is actually granted or denied (the Access Policy does that), it just defines which permissions the Access Policy should be able to check or uncheck. Having a Policy Template is useful if need to narrow down the list of available permissions you want to define in an Access Policy.

Although there is some overlap between the specific permissions defined in each policy template, each template contains _mostly_ unique permissions. Each template defines all the permissions that apply to the Access Control Lists (ACLs) they target; each is meant to be self-contained.

### AdministratorTemplate 

Defines all permissions for working in the MODX manager. In other words, it defines what actions can be taken from a context. Generally policies based on this template are not used in contexts other than manager unless users need to execute processors from them (like front-end extension). [See all Administrator Policy Permissions](administering-your-site/security/policies/permissions/permissions-administrator-policy "Permissions - Administrator Policy")

### ElementTemplate 

Element defines extra permissions associated with Element ACLs

### MediaSourceTemplate 

This deals with permissions involved in accessing file sources.

### ObjectTemplate 

Generic xPDOObject permissions for any modAccessibleObject to make use of.

### ResourceTemplate 

Resource defines extra permissions associated with Resource Group ACLs. [See all Resource Policy permissions](administering-your-site/security/policies/permissions/permissions-resource-policy "Permissions - Resource Policy")

### ContextTemplate 

Context defines context access when administration actions are not involved.

See Also 
---------

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