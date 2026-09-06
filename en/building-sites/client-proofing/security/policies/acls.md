---
title: "ACLs"
_old_id: "9"
_old_uri: "2.x/administering-your-site/security/policies/acls"
---

## What is an ACL (Access Control List)?

An ACL, or Access Control List, is a set of [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions") attached to an object. More information on ACLs can be found [here in Wikipedia](http://en.wikipedia.org/wiki/Access_control_list).

## Usage

In MODX, ACLs can be applied to any modAccessibleObject. Primarily MODX Revolution 2.0 allows for ACLs on Resources and Contexts.

### Context ACL

A Context ACL is referenced of 4 parts:

- A [Context](building-sites/contexts "Contexts")
- A [User Group](building-sites/client-proofing/security/user-groups "User Groups")
- A [Minimum Role](building-sites/client-proofing/security/roles "Roles")
- An [Access Policy](building-sites/client-proofing/security/policies "Policies")

This means that one can assign a ACL to a Context that will apply to:

- All the Users in a User Group
- ...with at least the Minimum Role specified
- ...that will give the Users all the Permissions in the Access Policy assigned.

### Resource ACL

Resource ACLs behave a bit differently, and basically allow you to restrict access to Resources (such as Documents, Weblinks, etc) by Resource Groups. They are comprised of 5 Parts:

- A [Resource Group](building-sites/client-proofing/security/resource-groups "Resource Groups")
- A [User Group](building-sites/client-proofing/security/user-groups "User Groups")
- A [Minimum Role](building-sites/client-proofing/security/roles "Roles")
- An [Access Policy](building-sites/client-proofing/security/policies "Policies")
- A [Context](building-sites/contexts "Contexts")

This means that an ACL applied to a Resource Group will:

- Effect all the Users in the specified User Group
- ... with at least the Minimum Role specified
- ... give the Resource Permissions (save, load, delete, etc) in the Policy specified
- ... to all the Resources in the Resource Group

## Manager publishing and multiple groups

Manager publish UI (Published checkbox, publish/unpublish dates, tree Publish/Unpublish actions, and the publish/unpublish processors) gates on the context permission `publish_document` (and `unpublish_document`) through `modX::hasPermission()`. In the manager, the current context is **`mgr`**.

That has a few practical consequences:

1. A policy that grants `publish_document` only on a frontend context (`web` or another site context) does **not** unlock manager publish controls. You need a Context Access ACL on **`mgr`**.
2. Resource ACL permissions `publish` / `unpublish` (on the [Resource Policy](building-sites/client-proofing/security/policies/permissions/resource-policy)) are a different ACL surface. The current manager publish UI and save path do not use them.
3. Multiple user groups still **OR** together for a given context. `checkPolicy` returns true when **any** matching Context Access ACL for that context grants the permission. You do not need every group to include publish.
4. A common trap: one shared group gives **Content Editor** (no publish) on `mgr`, and a second group puts a custom policy with publish only on another context. The user is in both groups, but still cannot publish in the manager until `publish_document` exists on an **`mgr`** Context Access ACL.

To fix that setup: add Context Access for **`mgr`** on at least one of the user's groups, with a policy that includes `publish_document` (and `unpublish_document` if needed). Leave Content Editor on the other group if you want. Flush sessions/permissions and retest.

See also [Administrator Policy](building-sites/client-proofing/security/policies/permissions/administrator-policy) (`publish_document`) and [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access). Background: [modxcms/revolution#14925](https://github.com/modxcms/revolution/issues/14925).

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
8. [Troubleshooting Security](building-sites/client-proofing/security/troubleshooting-security)
    1. [Resetting a User Password Manually](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
