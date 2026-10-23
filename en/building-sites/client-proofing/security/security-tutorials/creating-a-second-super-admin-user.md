---
title: "Creating a Second Super Admin User"
description: "Create a second administrator of MODX, with the group and the role that give the rights."
_old_id: "74"
_old_uri: "2.x/administering-your-site/security/security-tutorials/creating-a-second-super-admin-user"
---

## The Problem

You want another User to have full manager access, with all the [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions") of an Administrator user. Perhaps it's your colleague or your client, but by creating another Administrator you are handing over the keys to the _entire_ site. This is a simplistic scenario. The other admin could modify or delete your user, so this may not be a viable solution for what you need.

To give a user manager access on a smaller scale, see [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access "Giving a User Manager Access"). Shaun McCormick's video on [Understanding MODX Revolution Security](http://vimeo.com/13856994) walks through setting up complex permission schemes.

## The Solution

After logging into your site's manager, do the following:

1. Create a new user: the lock icon in the user menu → **Users** -> New User (Button)
2. Be sure you give the new user a unique username, password, and email.
3. Before saving the user, click the tab marked **Access Permissions** and click the button marked **Add User to Group**
    1. **User Group:**`Administrator`
    2. **Role:**`Super User`
4. Save the user. (You can always return to the lock icon in the user menu → **Users** and right-click the user to update the properties).
5. Try logging in to the manager using a different browser to verify that the login works.

## Why can't I add another Administrator with a different [Role](building-sites/client-proofing/security/roles "Roles"), e.g. a "Member"?

Try it. When you try to login using the other username with only a "Member" role, permission will be denied. But why? It has to do with [Context Access](building-sites/contexts "Contexts") and [Access Policies](building-sites/client-proofing/security/policies "Policies"), which get a lot more complicated in a hurry. Have a look at the lock icon in the user menu → **Access Control Lists**, right-click the Administrator User Group -> Update User Group, then click **Context Access**. You'll see something like this:

![](user-group-perms.jpg)

By default, MODX has 2 contexts: **web** (the front-end) and **mgr** (the back-end). From this table we can learn 2 things: the _minimum_ role is the Super-User role, and the "Access Policy" for this context is "Administrator". Even if you don't understand what all of that means, this is a good place to start educating you about permissions.

### Minimum Role

From the Context Access screen, you can see that you have to be at least a "Super User". Merely being a "Member" won't cut it. So that's why logging in fails for Admins with only "Member" roles.

### Roles

While we're at it, why give another user another role if they are going to have the _exact_ same privileges as you? Technically speaking, if they have the exact same privileges, then their role is equivalent to yours. In other words, you don't need a new role.

When thinking about roles, think about that access policy there. The access policy says what your user can and can't do if you are assigned a particular role.

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
