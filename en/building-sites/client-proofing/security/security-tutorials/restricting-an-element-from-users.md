---
title: "Restricting an Element from Users"
_old_id: "486"
_old_uri: "2.x/administering-your-site/security/security-tutorials/restricting-an-element-from-users"
---

## Introduction

This tutorial teaches you how to restrict any Element (such as a Template, Snippet, etc) from view in the MODX manager. It uses Element Category ACLs to accomplish the task, which allow you to protect any Elements in Categories from view. Users in the Editors User Group will be able to see the elements, but they will be hidden from users outside the group.

### Brief Summary

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

Go to Security -> Access Controls in the top menu, and find the "User Groups" tab. Then either create a new User Group or select a prior one. From there, right-click on the User Group and select "Update User Group".

For Revolution 2.3.x, the Access Control Lists menu item is found in the Admin menu (the gear icon).

If using the Access Wizard form, make sure the group is given "mgr" access in the Context field, and specify the Category in the Element Categories field. You can also put a list of users to be added to this group in the Users field. Right-click on the new User Group to update it if not using the Wizard.

### 4. Add the Users to the User Group

With the new User Group open for updating, find the Users tab, and then add any users you want to see the Element into this User Group. Make sure to give them a Role of **at least** Member. Alternately, you can add individual users to the new User Group from the User's editing page in the Access Permission tab.

### 5. Add the Element Category ACL

Find the "Element Category Access" tab on this screen. For Revolution 2.3.x, this will be in the sidebar of the User Group's Permissions tab.

Click "Add Category" on the button above the grid. Select:

- Category: your Category you made/selected earlier
- Minimum Role: Member
- Access Policy: Element
- Context: mgr
- Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right

### 6. Flush Permissions

On the top menu, find "Security -> Flush Permissions" and click it. For Revolution 2.3.x this is Manage -> Logout All Users.

This force everyone to log in again, and your Element Category will now be protected from users outside the Editors User Group.

## Hiding Specific Elements from Certain Users

Sometimes, you want to hide elements from all users who are not in the Administrator group. To do that, put the elements in a category as we did above, but connect it to the Administrator user group:

- Go to the Administrator User Group edit page (Security -> Access Controls -> User Groups -> right click on "Administrator" and select Update User Group) For Revolution 2.3.x this is Access Control Lists in the Admin menu (the gear icon).
- Find the Element Category Access tab
- Add the following ACL entry, by clicking on "Add Category":
  - Category: your Category you made/selected earlier
  - Minimum Role: admin Super User
  - Access Policy: Element
  - Context: mgr
  - Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right

- click Security -> Flush All Sessions in the top menu. For Revolution 2.3.x this is Manage -> Logout All Users.

Now, only the admin Super User can see the elements.

## Special Case for Templates

Lets say you restricted a Template with the method above. But you also want another User Group, which doesn't have access to the Template, the ability to edit (but not create!) Resources with that Template, and see the Template's TVs. Currently, the 2nd User Group (Let's call them Editors) would be able to see the Resource, and the ID of the Template will show in the Template combobox, but they wont be able to see the TVs. We need to add another ACL to the Editors User Group to get them to load the Template and its associated TVs.

- Go to the Editors User Group edit page (Security -> Access Controls -> User Groups -> right click on "Editors" and select Update User Group)
- Find the Element Category Access tab
- Add the following ACL entry, by clicking on "Add Category":
  - Category: your Category you made/selected earlier
  - Minimum Role: Member
  - Access Policy: Load Only
  - Context: mgr
  - Click on the "Save" button in the dialog
- Click on the "Save" button at the upper right

- Have the users in the Editors User Group logout and log back in, or alternatively click Security -> Flush Sessions in the top menu

Done! Your Editors will now be able to see and edit TVs for the Template in the protected Category and they will be hidden from users who are not in the Editors User Group.

## See Also

1. [Giving a User Manager Access](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
2. [Making Member-Only Pages](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
3. [Creating a Second Super Admin User](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
4. [Restricting an Element from Users](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
5. [More on the Anonymous User Group](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)