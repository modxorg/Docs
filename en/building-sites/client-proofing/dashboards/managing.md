---
title: "Managing Your Dashboard"
_old_id: "196"
_old_uri: "2.x/administering-your-site/dashboards/managing-your-dashboard"
---

This article describes how to edit a Dashboard, including on how to assign and arrange Widgets for that Dashboard.

## Editing Your Dashboard

Go to the main Dashboards page, which can be found in the top menu via "Dashboard" -> "Dashboards". Once loaded, you'll notice a grid in the first tab that holds (most likely) one dashboard, the "Default" dashboard. Right-click the row, and click "Update Dashboard". This will load the editing page for the Dashboard.

You will see a name and description field, and below, a grid of Widgets assigned to the dashboard. You can drag the widgets around to rearrange them, add widgets by clicking the "Place Widget" button, or remove widgets by right-clicking on a widget:

![](dashboard-edit.png)

## Template vs Personal Changes

Changes made on this page update the dashboard **template**. For [customizable dashboards](building-sites/client-proofing/dashboards "Dashboards"), template changes are propagated to all users who have a personal copy of that dashboard:

- When you **add a widget** here, it will appear on the dashboard for all existing users of that dashboard.
- When you **remove a widget** here, it will be removed from all users' personal dashboards.

This is different from changes made directly on the dashboard page itself (for example, using the close button on a widget or adding a widget from the dashboard view). Those changes only affect the currently logged-in user.

If you want to enforce a widget change across all users, make it from this management page. If you only want to adjust your own dashboard, make the change directly on the dashboard page instead.

## See Also

1. [Managing Your Dashboard](building-sites/client-proofing/dashboards/managing)
2. [Assigning a Dashboard to a User Group](building-sites/client-proofing/dashboards/usergroups)
3. [Creating a Dashboard Widget](building-sites/client-proofing/dashboards/creating-a-widget)
4. [Dashboard Widget Types](building-sites/client-proofing/dashboards/widget-types)
    1. [Dashboard Widget Type - File](building-sites/client-proofing/dashboards/widget-types/file)
    2. [Dashboard Widget Type - HTML](building-sites/client-proofing/dashboards/widget-types/html)
    3. [Dashboard Widget Type - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
    4. [Dashboard Widget Type - Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)