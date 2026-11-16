---
title: "Making Member-Only Pages"
description: "Protect the pages of a MODX site so that only the members of a group can see them."
_old_id: "186"
_old_uri: "2.x/administering-your-site/security/security-tutorials/making-member-only-pages"
---

## The Steps

These steps protect front-end pages so that only certain users can see them. They assume users already register and log in with the [Login](/extras/login "Login") package. They do not change which resources a user can see or edit in the manager.

1. Create a Resource Group (the lock icon in the user menu → **Resource Groups** → **Create Resource Group**)
2. Link your member-only resource to the Resource Group. (By editing the resource, or by dragging them from the resource tree to the right)
3. Create a User Group (the lock icon in the user menu → **Access Control Lists** → the tab **User Groups & Users** -> New User Group)
4. Add a resource group entry on the Resource Group Access tab (context: web, minimum role: Member (9999), access policy: Resource)
5. Add users to the user group with the role of Member. (the lock icon in the user menu → **Users**)
6. Flush permissions (**Flush Your Permissions**) and try it in another browser (not just another browser window: another browser)

## Access Wizard

The wizard of the resource group walks you through the whole process. The result is the same as when you set every step by hand.

### 1. Create a Resource Group

A [Resource Group](building-sites/client-proofing/security/resource-groups "Resource Groups") is a collection of resources you can link to user groups and access list entries.

Go to the lock icon in the user menu → **Resource Groups** and click **Create Resource Group**. A window similar to this should pop up: ![](create-resource-group.png)

| Section | Explanation | Tutorial Default |
| --- | --- | --- |
| Name | The name of the resource group that we're generating. Make it descriptive and easy-to-remember. | Protected |
| Contexts | The context where you want the rules to apply. For this tutorial, we only have one context, "web", and we only want to hide things there. | web |
| Automatically give Administrator Group Access | Checking this box gives every user in the default administrator group access to the resource group. The default admin user is marked as a "sudo" user. A sudo user bypasses the checks of the policies, so they see every resource group whether or not the administrator group has access. Check the box if other administrators lack sudo and should see the resources in the group. | checked |
| Automatically give Anonymous Group Access | Checking this box will give the anonymous user access to the resource group. When someone comes to your website and is not logged in, they are the anonymous user. We want to protect our pages from users who aren't logged in, so let's leave this box unchecked for this tutorial. | unchecked |
| Create Parallel User Group | You may not wish to have everyone who can view the member-only pages be in the administrator group (if you've checked the "Automatically give Administrator Group Access" option). In this case, you can create another user group that has access to the resources in this resource group. Let's check that, as our members aren't administrators. | checked |
| Automatically Give Other User Groups Access | If you have any other user groups that you've defined previously to this tutorial to whom you want to give access, you can list them here. | |

### 2. Add Resources to the Resource Group

Tell MODX which Resources to protect. Stay on the page from Step 1 (the lock icon in the user menu → **Resource Groups**). On the right, open the web context to see the pages on your site. Drag them from the right column into your Resource Group. Or edit each Resource, open the Resource Groups tab, and check **Access** on the "Protected" row.

### 3. Add Users to the User Group

Go to the lock icon in the user menu → **Access Control Lists**. On the **User Groups & Users** tab you see the user groups. Right-click the "Protected" group and select **Add User to Group**. For the "Name", select the user you want in the user group. For the Role, let's select "Member" for now. Roles define what an individual user can do within a user group, but we don't need that fine of control for this tutorial. Click Save.

A resource is protected when it is assigned to one or more resource groups. That group is linked to a user group with an access control. Those pages no longer show for users who are not linked to it. The default page is the 404 error. To return 401 instead, give the anonymous user "load" permission for the resource group. More on that in a later tutorial. At this point the page is still not visible, because you have not added it to a user group.

When you use a websignup snippet, make sure it puts the new users into the right user group.

The user group has no context access to the front-end context, web. If that context were available, the protected resources would be available too. It is not available yet. Add that access next.

### 4. Add Context Access to the User Group

Go to the lock icon → **Access Control Lists**. Right-click the protected user group and select **Edit User Group**. Open the **Contexts** tab and click **Add Context Access**. The dialog has these fields: ![](context-access.png)

| Section | Explanation | Tutorial Default |
| --- | --- | --- |
| Context | This specifies to which context we're giving access. The basic use case will have web and mgr. Web is the public front-end of your website, and mgr is the private back-end of your website (i.e., the manager that you're logged in). | web |
| Minimum Role | This specifies what user roles this rule will apply to. If we want all users in this user group, select "Member - 9999". This is where some of that fine control comes in that we talked about earlier. | Member - 9999 |
| Access Policy | This specifies what permissions we're giving to the users. Different policies will allow user groups to do different things. | Administrator |

Make one rule with "web", "Member - 9999", and "Load, List and View". To let users view the manager, add a second rule for the mgr context: "mgr", "Member - 9999", and "Administrator". Those users get admin access. To limit their permissions, choose "Content Editor" or "Developer" for their access policy. You can also make your own policy on the **Access Policies** tab of **Access Control Lists**.

### 5. Flush Permissions

Before you can see a change, flush what your users can see and do. Go to **Flush Your Permissions**. To test the front end, use a different browser. Most of the trouble comes from testing in the same browser or skipping the flush.

In some cases you may need to clear the site cache, specifically for the mgr (manager) context, because elements and resources may cache their permissions.

## Still can't get it to work?

Check the steps and the flush. If the pages still fail, ask on the [MODX Community](https://community.modx.com).

Two further readings help with the permissions themselves. [Bob's permissions guide](http://bobsguides.com/revolution-permissions.html) covers the model in depth. The [Login.Basic Setup](/extras/login/login.tutorials/basic-setup "Login.Basic Setup") tutorial shows a basic "Members Only" area built with the Login Snippet.

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
