---
title: "PolicyTemplates"
_old_id: "244"
_old_uri: "2.x/administering-your-site/security/policies/policytemplates"
---

## What are Policy Templates?

Policy Templates define which permissions are _available_ to an [Access Policy](building-sites/client-proofing/security/policies "Policies"). A Policy Template does not say if a permission is actually granted or denied (the Access Policy does that), it just defines which permissions the Access Policy should be able to check or uncheck. Having a Policy Template is useful if need to narrow down the list of available permissions you want to define in an Access Policy.

Although there is some overlap between the specific permissions defined in each policy template, each template contains _mostly_ unique permissions. Each template defines all the permissions that apply to the Access Control Lists (ACLs) they target; each is meant to be self-contained.

### AdministratorTemplate

Defines all permissions for working in the MODX manager. In other words, it defines what actions can be taken from a context. Generally policies based on this template are not used in contexts other than manager unless users need to execute processors from them (like front-end extension). [See all Administrator Policy Permissions](building-sites/client-proofing/security/policies/permissions/administrator-policy "Permissions - Administrator Policy")

### ElementTemplate

Element defines extra permissions associated with Element ACLs

### MediaSourceTemplate

This deals with permissions involved in accessing file sources.

### ObjectTemplate

Generic xPDOObject permissions for any modAccessibleObject to make use of.

### ResourceTemplate

Resource defines extra permissions associated with Resource Group ACLs. [See all Resource Policy permissions](building-sites/client-proofing/security/policies/permissions/resource-policy "Permissions - Resource Policy")

### ContextTemplate

Context defines context access when administration actions are not involved.

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