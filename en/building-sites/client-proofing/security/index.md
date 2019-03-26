---
title: "Security (ACLs)"
_old_id: "488"
_old_uri: "2.x/administering-your-site/security"
---

## Security in MODx Revolution

Security in MODx Revolution is primarily driven by an Attribute-Based Access Control (ABAC) paradigm.

Each user in MODx has a [User](building-sites/client-proofing/security/users "Users") object, which can be assigned to any number of [User Groups](building-sites/client-proofing/security/user-groups "User Groups"). Each User Group then has attributes assigned to it via [Access Control Lists](building-sites/client-proofing/security/policies/acls "ACLs") (ACLs). These ACLs take a variety of names depending on how they are applied, but all share one common principle - they contain a list of [Permissions](building-sites/client-proofing/security/policies/permissions "Permissions"). These Permissions allow access to different areas or actions within MODx.

ACLs usually have the following:

- **Principal** - The object that is getting the access permissions. This is in MODx, by default, a User Group.
- **Target** - The object they apply to, for example, a Context or Resource Group.
- **Access Policy** - The list of Permissions that is gained by this ACL.
- **Authority** - The minimum Authority level required to use this ACL (see [Roles](building-sites/client-proofing/security/roles "Roles")).

Access is **allow/deny** in MODx, meaning that access is "open" by default. Once an ACL is applied to an object, such as a Context or Resource Group, those Contexts or Resource Groups will now only be accessible to the objects with appropriate Permissions.

### Security Tutorial Video

Demonstrates by applying concepts to the MODx Sample Site to:

- Restrict RSS feed to Directors and up
- Restrict Blog to Staff only
- Create a 'secure' context for Directors and up only
- Restrict some element categories to administrators only

![](http://assets.modx.com/docs/understanding-revo-acls.jpg)

### Example: Context Access

A good example is creating a Context named 'test', and assigning an ACL to it. This can be done by editing the Context, and going to the 'Access Permissions' tab. From here, you can give a User Group (say, 'HR Dept') explicit access to this Context by selecting the User Group, the 'Administrator' Access Policy, and specifying a required Authority (say, 9999 for 'Member') to have:

![](/download/attachments/18678085/sec-ugctx1.png?version=1&modificationDate=1280173915000)

This will restrict the 'test' Context to users who are a Member (or [Role](building-sites/client-proofing/security/roles "Roles") with more authority) of the 'HR Dept' User Group.
