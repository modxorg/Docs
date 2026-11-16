---
title: "Resource Policy"
description: "The Resource policy of MODX and the permissions it holds."
_old_id: "219"
_old_uri: "2.x/administering-your-site/security/policies/permissions/permissions-resource-policy"
---

## The Resource Policy

This policy is packaged into MODX and is given to users on any context who want to have basic object access to content. The Permissions are generic and apply across all MODX objects.

## Default Permissions

| Name |
| --- |
| `add_children` |
| `copy` |
| `create` |
| `delete` |
| `list` |
| `load` |
| `move` |
| `publish` |
| `remove` |
| `save` |
| `steal_lock` |
| `undelete` |
| `unpublish` |
| `view` |

Do not confuse Resource permissions `publish` / `unpublish` with Administrator/context permission `publish_document`. The manager publish checkbox, dates, tree actions, and publish processors gate on `publish_document` for the **`mgr`** context. Resource `publish` / `unpublish` alone will not open those controls. See [ACLs: Manager publishing and multiple groups](building-sites/client-proofing/security/policies/acls#manager-publishing-and-multiple-groups).

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
