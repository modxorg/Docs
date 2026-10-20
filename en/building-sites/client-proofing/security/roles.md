---
title: "Roles"
description: "The roles of MODX: the number of authority they carry and how it is compared with the access of a group."
_old_id: "268"
_old_uri: "2.x/administering-your-site/security/roles"
---

## What is a Role?

A Role groups the Users of a User Group by position or status, e.g. "Editor" or "Front-end Read Only".

Roles use an integer value called "Authority". **Lower numbers represent a stronger authority.** A user passes the check of an ACL when the authority of their role is **not greater** than the authority of the ACL. A user with a role of authority 10 passes every ACL that a user with a role of authority 11 passes.

Be sure you clarify your language when talking about Authority because this inverse relationship can lead to some confusing sentences. It helps to think of "Authority" as ordinal numbers: first, second, third, etc. **Authority=1** is the first authority and trumps **Authority=2** (i.e. the second authority).

**The authority numbers are unique**
The database will not let you create two roles with the same authority: the column has a unique index.

## The Roles of MODX

MODX 3 ships with two roles:

| Role | Authority |
| --- | --- |
| Member | 9999 |
| Super User | 0 |

The role **Super User** passes the check of every ACL, because the authority of an ACL is never below 0. The role **Member** passes only the ACLs whose authority is 9999 or more.

## The Permissions of the Page

The page of the roles needs the permission `view_role` to see the list, `new_role` and `save_role` to create a role, `edit_role` to change one, and `delete_role` to delete one.

## Usage

A common example is to create Roles that mimic a basic employee position structure. Let's say we create the following Roles and Authority levels:

- Administrator - 0
- Director - 1
- Coordinator - 2
- Supervisor - 3
- Employee - 9999

![](roles-grid.png)

We can then create a User Group called "HR Department". Within that User Group, we'll assign Users to those Roles (you can have multiple Users per Role, as well).

Now, let's say John has a Role of Coordinator. Mark has a Role of Supervisor. We're going to give Mark's "HR Department" User Group an Access Policy called "AccountPolicy". It holds the following Access Permissions:

- `view_accounts`
- `save_accounts`

We've assigned this Policy to the "web" context for our User Group "HR Department". We then set its Minimum Role value to "Supervisor":

![](ug-ctx-grid1.png)

This means that Mark has these Permissions: he's in the User Group and has at least the Role of "Supervisor".

But this **also** means that John has these Permissions as well, since he is a "Coordinator" which has a stronger Authority level than "Supervisor". So, John as Coordinator has the Permissions that Mark had as Supervisor.

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
