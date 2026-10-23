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

Click the Elements tab in the left tree, then the Category icon in the toolbar. Or right-click "Categories" at the bottom and click "New Category". Save the category. An existing category works too.

### 2. Place the Element into the Category

Edit the Element and set its Category to be the new Category created in step 1.

### 3. Create a User Group

Go to the lock icon → **Access Control Lists** and open the **User Groups & Users** tab. Create a user group or select an existing one. Right-click it and select **Edit User Group**.

On the Access Wizard form, give the group "mgr" in the Context field and set the Category in the Element Categories field. The Users field can list users to add to this group. If you are not using the Wizard, right-click the new User Group and update it.

### 4. Add the Users to the User Group

With the new User Group open, open the Users tab and add the users who should see the Element. Give them a role of **at least** Member. Or add a user from that user's editing page, on the Access Permission tab.

### 5. Add the Element Category ACL

Open the "Element Category Access" tab. It sits in the group panel, next to the other access tabs.

Click "Add Category" on the button above the grid. Select:

- Category: your Category you made/selected earlier
- Minimum Role: Member
- Access Policy: Element
- Context: mgr
- Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right

### 6. Flush Permissions

Open the lock icon → **Flush Your Permissions**, then **Logout All Users**.

This forces everyone to log in again. The Element Category is then protected from users outside the Editors User Group.

## Hiding Specific Elements from Certain Users

Sometimes, you want to hide elements from all users who are not in the Administrator group. To do that, put the elements in a category as we did above, but connect it to the Administrator user group:

- Go to the Administrator User Group edit page: the lock icon in the user menu → **Access Control Lists** → the tab **User Groups & Users** -> right click "Administrator" and pick **Edit User Group**
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

You restricted a Template with the method above. Another User Group should edit Resources that use that Template, but not create them. It should see the Template's TVs, though it has no access to the Template. That group (call them Editors) would see the Resource. The Template combobox would show the Template ID, and they would not see the TVs. Add another ACL on that group so it loads the Template and its TVs.

- Go to the Editors User Group edit page: the lock icon in the user menu → **Access Control Lists** → the tab **User Groups & Users** -> right click "Editors" and pick **Edit User Group**
- Find the Element Category Access tab
- Add the following ACL entry, by clicking on "Add Category":
    - Category: your Category you made/selected earlier
    - Minimum Role: Member
    - Access Policy: Load Only
    - Context: mgr
    - Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right
- Have the users in the Editors User Group logout and log back in, or alternatively click **Logout All Users** in the top menu

Editors will now see and edit the TVs for the Template in the protected Category. The Template stays hidden from users who are not in the Editors User Group.

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
