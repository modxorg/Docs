---
title: "Assigning to a User Group"
_old_id: "25"
_old_uri: "2.x/administering-your-site/dashboards/assigning-a-dashboard-to-a-user-group"
---

This article describes how to assign a Dashboard to a User Group.

First off, find the User Group that you would like to assign the Dashboard to, and edit it. You can do so by "Menu" -> "Access Controls", then right-clicking on the group in the User Groups tree, and clicking "Update User Group".

From there, you can simply click on the "Dashboard" dropdown, and select the Dashboard you want to assign to this User Group. All users in this group that have this group as their Primary Group will load that Dashboard instead of the Default now.

![](dashboard-assign.png)

## Customizable Dashboards and User Groups

If the assigned dashboard has the **Customizable** setting checked, MODX creates a personal copy of the dashboard's widget layout for each user the first time they log in. Users can then rearrange, add, or remove widgets on their own copy without affecting other group members.

When an administrator later updates the dashboard template (by adding or removing widgets through the Dashboards manager page), those changes are applied to all existing users' personal dashboards. See [Managing Your Dashboard](building-sites/client-proofing/dashboards/managing "Managing Your Dashboard") for more on how template changes propagate.

## See Also

1. [Managing Your Dashboard](building-sites/client-proofing/dashboards/managing)
2. [Assigning a Dashboard to a User Group](building-sites/client-proofing/dashboards/usergroups)
3. [Creating a Dashboard Widget](building-sites/client-proofing/dashboards/creating-a-widget)
4. [Dashboard Widget Types](building-sites/client-proofing/dashboards/widget-types)
    1. [Dashboard Widget Type - File](building-sites/client-proofing/dashboards/widget-types/file)
    2. [Dashboard Widget Type - HTML](building-sites/client-proofing/dashboards/widget-types/html)
    3. [Dashboard Widget Type - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
    4. [Dashboard Widget Type - Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)
