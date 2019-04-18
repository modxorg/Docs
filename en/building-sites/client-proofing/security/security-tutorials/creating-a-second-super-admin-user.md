---
title: "Creating a Second Super Admin User"
_old_id: "74"
_old_uri: "2.x/administering-your-site/security/security-tutorials/creating-a-second-super-admin-user"
---

## The Problem

You want another MODX Revolution User to have full manager access, with all the [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions") of an Administrator user. Perhaps it's your colleague or your client, but by creating another Administrator, you are handing over the keys to the _entire_ site. This is a simplistic scenario: the other admin would be able to modify or delete your user, so it may not be a viable solution for what you need to do. In the process of walking users through this task, this page gives a brief introduction to roles and access policies.

## The Solution

After logging into your site's manager, do the following:

1. Create a new user: Manage -> Users -> New User (Button)
2. Be sure you give the new user a unique username, password, and email.
3. Before saving the user, click the tab marked **Access Permissions** and click the button marked **Add User Group to User**
    1. **User Group:**`Administrator`
    2. **Role:**`Super User`
4. Save the user. (You can always return to Security -> Manage Users and right-click the user to update the properties).
5. Try logging in to the manager using a different browser to verify that the login works.

## Why can't I add another Administrator with a different [Role](building-sites/client-proofing/security/roles "Roles"), e.g. a "Member"?

Try it. When you try to login using the other username with only a "Member" role, permission will be denied. But why? It has to do with [Context Access](building-sites/contexts "Contexts") and [Access Policies](building-sites/client-proofing/security/policies "Policies"), which get a lot more complicated in a hurry. If you have a look at Security -> Access Controls and then right-click the Administrator User Group -> Update User Group, then click on the **Context Access** tab. You'll see something like this:

![](/download/attachments/33226828/User-Group-Perms.jpg?version=1&modificationDate=1287981106000)

By default, MODX Revolution has 2 contexts: **web** (the front-end) and **mgr** (the back-end). From this table, we can learn 2 things: that the _minimum_ role is the Super-User role, and the "Access Policy" in use for this context is "Administrator". Even if you don't understand what all of that means, this is a good place to start educating you about permissions.

### Minimum Role

From the Context Access screen, you can see that you have to be at least a "Super User". Merely being a "Member" won't cut it. So that's why logging in fails for Admins with only "Member" roles.

### Roles

While we're at it, why would you want to give another user another role if he or she was going to have the _exact_ same privileges as you? Technically speaking, if they have the exact same privileges, then their role is equivalent to yours. In other words, you don't need a new role.

When thinking about roles, think about that access policy there. The access policy says what your user can and can't do if you are assigned a particular role.

## See Also

See the other tutorial about [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access "Giving a User Manager Access") for an example of how to create a user with a permission level of less than you.

Shaun McCormick's video on [Understanding MODX Revolution Security](http://vimeo.com/13856994) gives a detailed walk-through of setting up some complex permission schemes.

1. [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
2. [Making Member-Only Pages](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
3. [Creating a Second Super Admin User](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
4. [Restricting an Element from Users](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
5. [More on the Anonymous User Group](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
