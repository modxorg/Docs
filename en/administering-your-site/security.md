---
title: "Security"
_old_id: "488"
_old_uri: "2.x/administering-your-site/security"
---

Security in MODx Revolution
---------------------------

Security in MODx Revolution is primarily driven by an Attribute-Based Access Control (ABAC) paradigm.

Each user in MODx has a [User](administering-your-site/security/users "Users") object, which can be assigned to any number of [User Groups](administering-your-site/security/user-groups "User Groups"). Each User Group then has attributes assigned to it via [Access Control Lists](administering-your-site/security/policies/acls "ACLs") (ACLs). These ACLs take a variety of names depending on how they are applied, but all share one common principle - they contain a list of [Permissions](administering-your-site/security/policies/permissions "Permissions"). These Permissions allow access to different areas or actions within MODx.

ACLs usually have the following:

- **Principal** - The object that is getting the access permissions. This is in MODx, by default, a User Group.
- **Target** - The object they apply to, for example, a Context or Resource Group.
- **Access Policy** - The list of Permissions that is gained by this ACL.
- **Authority** - The minimum Authority level required to use this ACL (see [Roles](administering-your-site/security/roles "Roles")).

<div class="note">Access is **allow/deny** in MODx, meaning that access is "open" by default. Once an ACL is applied to an object, such as a Context or Resource Group, those Contexts or Resource Groups will now only be accessible to the objects with appropriate Permissions.</div>### Security Tutorial Video

<object height="500" width="780"><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=13856994&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed allowfullscreen="true" allowscriptaccess="always" flashvars="$flashVars" height="500" src="http://vimeo.com/moogaloop.swf?clip_id=13856994&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" width="780"></embed></object>Demonstrates by applying concepts to the MODx Sample Site to:

- Restrict RSS feed to Directors and up
- Restrict Blog to Staff only
- Create a 'secure' context for Directors and up only
- Restrict some element categories to administrators only

![](http://assets.modx.com/docs/understanding-revo-acls.jpg)

### Example: Context Access

A good example is creating a Context named 'test', and assigning an ACL to it. This can be done by editing the Context, and going to the 'Access Permissions' tab. From here, you can give a User Group (say, 'HR Dept') explicit access to this Context by selecting the User Group, the 'Administrator' Access Policy, and specifying a required Authority (say, 9999 for 'Member') to have:

![](/download/attachments/18678085/sec-ugctx1.png?version=1&modificationDate=1280173915000)

This will restrict the 'test' Context to users who are a Member (or [Role](administering-your-site/security/roles "Roles") with more authority) of the 'HR Dept' User Group.

See Also
--------

1. [Users](administering-your-site/security/users)
2. [User Groups](administering-your-site/security/user-groups)
3. [Resource Groups](administering-your-site/security/resource-groups)
4. [Roles](administering-your-site/security/roles)
5. [Policies](administering-your-site/security/policies)
  1. [Permissions](administering-your-site/security/policies/permissions)
      1. [Permissions - Administrator Policy](administering-your-site/security/policies/permissions/permissions-administrator-policy)
      2. [Permissions - Resource Policy](administering-your-site/security/policies/permissions/permissions-resource-policy)
  2. [ACLs](administering-your-site/security/policies/acls)
  3. [PolicyTemplates](administering-your-site/security/policies/policytemplates)
6. [Security Tutorials](administering-your-site/security/security-tutorials)
  1. [Giving a User Manager Access](administering-your-site/security/security-tutorials/giving-a-user-manager-access)
  2. [Making Member-Only Pages](administering-your-site/security/security-tutorials/making-member-only-pages)
  3. [Creating a Second Super Admin User](administering-your-site/security/security-tutorials/creating-a-second-super-admin-user)
  4. [Restricting an Element from Users](administering-your-site/security/security-tutorials/restricting-an-element-from-users)
  5. [More on the Anonymous User Group](administering-your-site/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Hardening MODX Revolution](administering-your-site/security/hardening-modx-revolution)
8. [Security Standards](administering-your-site/security/security-standards)
9. [Troubleshooting Security](administering-your-site/security/troubleshooting-security)
  1. [Resetting a User Password Manually](administering-your-site/security/troubleshooting-security/resetting-a-user-password-manually)