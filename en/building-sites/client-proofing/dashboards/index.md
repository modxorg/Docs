---
title: "Dashboards"
_old_id: "90"
_old_uri: "2.x/administering-your-site/dashboards"
---

## What are Dashboards?

A Dashboard in MODX is the page that shows on initial loading of the MODX manager, or when clicking the "Dashboard" link in the top-left of the screen. Dashboards can contain an unlimited number of "widgets", which are boxes that show various content on the Dashboard. Widgets can be arranged in any order, and can be either a file, a MODX Snippet, or straight HTML.

Each User Group in MODX is assigned a Dashboard by default. This means that you can give different Users different Dashboards via the User Group they belong to.

If a User is part of two different groups, it will use the Dashboard of its Primary Group, which can be set in the User editing screen.

## Customizable Dashboards

Dashboards have a **Customizable** setting. When this is checked (the default), MODX clones the dashboard's widget layout for each user the first time they load the dashboard. This gives each user their own personal copy of the dashboard, which they can then rearrange, add widgets to, or remove widgets from without affecting other users.

When **Customizable** is unchecked, all users share the same dashboard layout and cannot make personal changes to it.

### How Template Changes Propagate

The widget layout configured through the Dashboards manager page (Dashboard -> Dashboards -> Update Dashboard) serves as the **template** for a customizable dashboard. When you add or remove widgets from the template, those changes propagate to all existing users of that dashboard:

- **Widgets added** to the template will automatically appear for all users who already have a personal copy of the dashboard.
- **Widgets removed** from the template will be removed from all users' personal dashboards.

Other personal customizations, such as widget order, are not affected by template changes.

Changes made directly on a user's dashboard page (for example, removing a widget with the close button or adding a widget via the dashboard itself) only affect that individual user and do not change the template.

## Using Dashboards

- [Managing Your Dashboard](building-sites/client-proofing/dashboards/managing "Managing Your Dashboard")
- [Assigning a Dashboard to a User Group](building-sites/client-proofing/dashboards/usergroups "Assigning a Dashboard to a User Group")
- [Creating a Dashboard Widget](building-sites/client-proofing/dashboards/creating-a-widget "Creating a Dashboard Widget")
- [Dashboard Widget Types](building-sites/client-proofing/dashboards/widget-types "Dashboard Widget Types")

## See Also

1. [Managing Your Dashboard](building-sites/client-proofing/dashboards/managing)
2. [Assigning a Dashboard to a User Group](building-sites/client-proofing/dashboards/usergroups)
3. [Creating a Dashboard Widget](building-sites/client-proofing/dashboards/creating-a-widget)
4. [Dashboard Widget Types](building-sites/client-proofing/dashboards/widget-types)
    1. [Dashboard Widget Type - File](building-sites/client-proofing/dashboards/widget-types/file)
    2. [Dashboard Widget Type - HTML](building-sites/client-proofing/dashboards/widget-types/html)
    3. [Dashboard Widget Type - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
    4. [Dashboard Widget Type - Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)