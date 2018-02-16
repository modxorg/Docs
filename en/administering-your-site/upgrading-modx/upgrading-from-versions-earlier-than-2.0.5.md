---
title: "Upgrading from Versions Earlier than 2.0.5"
_old_id: "1122"
_old_uri: "2.x/administering-your-site/upgrading-modx/upgrading-from-versions-earlier-than-2.0.5"
---

<div>- [Upgrading to Revolution 2.0.5](#UpgradingfromVersionsEarlierthan2.0.5-UpgradingtoRevolution2.0.5)
- [Form Customization Updates](#UpgradingfromVersionsEarlierthan2.0.5-FormCustomizationUpdates)
- [Access Policy Updates](#UpgradingfromVersionsEarlierthan2.0.5-AccessPolicyUpdates)
- [extension\_packages Changes](#UpgradingfromVersionsEarlierthan2.0.5-extensionpackagesChanges)
- [See Also](#UpgradingfromVersionsEarlierthan2.0.5-SeeAlso)

</div>Upgrading to Revolution 2.0.5
-----------------------------

There are a few changes that have occurred in 2.0.5 that will only apply to certain cases.

This upgrade process applies to you only if you:

- Use Form Customization
- Have a Custom Access Policy
- Use the extension\_packages setting

If you didn't employ any of the above on your site you don't need to read further. If your site was set up by someone else it would be wise to confer with them prior to upgrading to ensure your site doesn't.

These upgrades should go smoothly; however, if they do not, please [post on the forums](http://modxcms.com/forums) regarding your issue.

<div class="note">It is always recommended to backup your database before upgrading.</div>Form Customization Updates
--------------------------

Form Customization has been completely rewritten. It now **only works for Resource pages**. If you have FC rules that are not Resource-page targeted, **they will be erased**. Why did we do this? Well, for one, 95% of FC rules were targeted at the Resource pages. The UI prior to 2.0.5 for managing FC rules, while powerful, was confusing and complex. We decided to simplify the UI; however, this required restricting FC's scope to just the Resource pages. Also, **inactive rules will be erased**, because there is no such thing as an "Inactive Rule" in 2.0.5. There are only inactive Sets and Profiles.

An FC "Set" now is a collection of Rules that apply to one page (either create or update Resource). Constraints are now set-specific instead of rule-specific. Also, Sets can be targeted to specified Templates. Specific sets can be active or inactive.

An FC "Profile" is a collection of Sets. They can be restricted to certain User Groups, and be declared active or inactive.

Also, there are now 4 new tables and classes:

- \[prefix\]\_fc\_profiles - modFormCustomizationProfile
- \[prefix\]\_fc\_profiles\_usergroups - modFormCustomizationProfileUserGroup
- \[prefix\]\_fc\_sets - modFormCustomizationSet
- \[prefix\]\_actions\_fields - modActionField

Your old rules will be separated based on their constraints. If they had any UserGroup restrictions, they will be divided into separate Profiles. Within that, they will be separated into Sets based on their page they targeted (create or update) and any constraints they had - since constraints are now set-based. You can then use a point-and-click interface to edit rules within the set.

Access Policy Updates
---------------------

Access Policies have been enhanced to have what are now called "Access Policy Templates". These are what Access Policies used to be in a user interface sense; they have a list of Permissions you can add to or remove from. However, now when you edit an Access Policy itself, you are presented with a checkbox list of Permissions pulled from that Policy's Template. This allows for much easier editing and defining of Access Policies.

You can easily create manager policies, for example, by creating a new Access Policy based on the Administrator Access Policy Template.

Your old Policies will be upgraded into the Administrator Template if they used only Administrator policies. If you had custom Access Policies that used custom Permissions, a custom Access Policy Template will be generated for them.

extension\_packages Changes
---------------------------

The setting extension\_packages has been changed to a JSON format. The format used to be:

```
<pre class="brush: php">
package_name:package_path,another_package:another_path

```And is now:

```
<pre class="brush: php">
[{"package_name":{"path":"package_path"}},{"another_package":{"path":"another_path"}}]

```This should automatically upgrade without you having to adjust it.

See Also
--------

1. [Troubleshooting Upgrades](administering-your-site/upgrading-modx/troubleshooting-upgrades)
2. [Upgrading to 2.2.x](administering-your-site/upgrading-modx/upgrading-to-2.2.x)
3. [Upgrading from 2.0.x to 2.1.x](administering-your-site/upgrading-modx/upgrading-from-2.0.x-to-2.1.x)
4. [Upgrading from Versions Earlier than 2.0.5](administering-your-site/upgrading-modx/upgrading-from-versions-earlier-than-2.0.5)
5. [Upgrading to Revolution 2.0.0-rc-2](administering-your-site/upgrading-modx/upgrading-to-revolution-2.0.0-rc-2)
6. [Upgrading from MODx Evolution](administering-your-site/upgrading-modx/upgrading-from-modx-evolution)
  1. [Functional Changes from Evolution](administering-your-site/upgrading-modx/upgrading-from-modx-evolution/functional-changes-from-evolution)