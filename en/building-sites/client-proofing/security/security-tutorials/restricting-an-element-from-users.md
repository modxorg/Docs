---
title: "Restricting an Element from Users"
description: "Hide an element of MODX from the users who may not edit it, with the access to its category."
_old_id: "486"
_old_uri: "2.x/administering-your-site/security/security-tutorials/restricting-an-element-from-users"
---

## Brief Summary

1. Create a Category or use an existing one
2. Place the Element you want to protect into your Category
3. Create a User Group or select an existing User Group
4. Add the users you want to see the Element to the User Group with the role of Member.
5. Add an Element Category ACL on the Element Category Access tab (context: mgr, minimum role: Member (9999), access policy: Element)
6. Flush permissions and reload

## Step-by-step Explanation

### 1. Create a Category

Click the Elements tab on the left-hand tree, and click the Category icon in the toolbar, or right-click "Categories" at the bottom, then click "New Category". Create and save a new category. Alternatively, you can use an already-existing Category for this tutorial.

### 2. Place the Element into the Category

Edit the Element and set its Category to be the new Category created in step 1.

### 3. Create a User Group

Go to the lock icon in the user menu → **Access Control Lists** in the top menu, and find the "User Groups" tab. Then either create a new User Group or select a prior one. From there, right-click on the User Group and select "Update User Group".

If using the Access Wizard form, make sure the group gets "mgr" access in the Context field, and specify the Category in the Element Categories field. You can also put a list of users to be added to this group in the Users field. Right-click on the new User Group to update it if not using the Wizard.

### 4. Add the Users to the User Group

With the new User Group open for updating, find the Users tab and add any users you want to see the Element. Make sure to give them a Role of **at least** Member. Alternately, you can add individual users to the new User Group from the User's editing page in the Access Permission tab.

### 5. Add the Element Category ACL

Find the "Element Category Access" tab on this screen. The tab is in the panel of the group, next to the other access tabs.

Click "Add Category" on the button above the grid. Select:

- Category: your Category you made/selected earlier
- Minimum Role: Member
- Access Policy: Element
- Context: mgr
- Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right

### 6. Flush Permissions

On the top menu, find "**Flush Your Permissions**" and click it. Then the lock icon in the user menu → **Logout All Users**.

This force everyone to log in again, and your Element Category will now be protected from users outside the Editors User Group.

## Hiding Specific Elements from Certain Users

Sometimes, you want to hide elements from all users who are not in the Administrator group. To do that, put the elements in a category as we did above, but connect it to the Administrator user group:

- Go to the Administrator User Group edit page: the lock icon in the user menu → **Access Control Lists** → the tab **User Groups & Users** -> right click "Administrator" and pick Update User Group
- Find the Element Category Access tab
- Add the following ACL entry, by clicking on "Add Category":
    - Category: your Category you made/selected earlier
    - Minimum Role: Super User
    - Access Policy: Element
    - Context: mgr
    - Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right
- Click the lock icon in the user menu → **Logout All Users**.

Now, only the admin Super User can see the elements.

## Special Case for Templates

Lets say you restricted a Template with the method above. But you also want another User Group to edit (but not create!) Resources with that Template, and to see its TVs, though it has no access to the Template. Currently, the 2nd User Group (let's call them Editors) would see the Resource, and the ID of the Template would show in the Template combobox, but they wouldn't see the TVs. We need another ACL on that group to get them to load the Template and its TVs.

- Go to the Editors User Group edit page: the lock icon in the user menu → **Access Control Lists** → the tab **User Groups & Users** -> right click "Editors" and pick Update User Group
- Find the Element Category Access tab
- Add the following ACL entry, by clicking on "Add Category":
    - Category: your Category you made/selected earlier
    - Minimum Role: Member
    - Access Policy: Load Only
    - Context: mgr
    - Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right
- Have the users in the Editors User Group logout and log back in, or alternatively click **Logout All Users** in the top menu

Done! Your Editors will now see and edit the TVs for the Template in the protected Category. The Template stays hidden from users who are not in the Editors User Group.

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
