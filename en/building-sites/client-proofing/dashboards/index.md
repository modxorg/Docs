---
title: "Dashboards"
description: "The Dashboard of MODX: the widgets on the page a user sees after logging in, the core widgets, and the personal copy each user gets."
---

## What a Dashboard Is

A Dashboard is the page that opens when a user logs in to the manager. The MODX logo in the top left leads to it as well.

A Dashboard holds widgets: boxes with content. A widget is a file, a MODX Snippet, straight HTML, or PHP code, and the widgets can be arranged in any order.

Each User Group is assigned a Dashboard. This is how different users get different Dashboards. If a user belongs to two groups, the Dashboard of the Primary Group is used. The Primary Group is set on the User editing screen.

## The Core Widgets

MODX ships seven widgets:

| Widget | Permission |
| --- | --- |
| MODX News Feed | — |
| MODX Security Feed | — |
| Who's Online | — |
| Configuration Check | — |
| Buttons | — |
| Recently Edited Resources | `view_document` |
| Updates | `workspaces` |

The last two are shown only to the users who hold the permission, so they are missing on the Dashboard of an ordinary user.

## Customizable Dashboards

A Dashboard has a **Customizable** setting. When it is on (the default), MODX clones the layout of the widgets for every user the first time they open the Dashboard. Each user then has a personal copy, which they can rearrange, add widgets to, or remove widgets from, without touching the Dashboard of anyone else.

A user can also resize a widget on their own copy, as long as the Dashboard is customizable.

When **Customizable** is off, all users share the same layout and cannot change it.

A Dashboard has a second setting, **Hide Left-Hand Trees**. It hides the trees on the left while the Dashboard is shown.

### How Template Changes Propagate

The layout configured on the Dashboards manager page serves as the **template** of a customizable Dashboard. When you add or remove widgets from the template, the changes propagate to all existing users of that Dashboard:

- **Widgets added** to the template appear for all users who already have a personal copy.
- **Widgets removed** from the template are removed from all users' personal Dashboards.

The order of the widgets is not affected by template changes. A widget added to the template arrives at the existing users with the default size, at the end of the list, not with the size of the template.

Changes made directly on the Dashboard of a user affect that user only and do not change the template. This covers removing a widget with the close button and adding a widget from the Dashboard itself.

## Permissions

The Dashboards page and all the actions on the widgets require the permission `dashboards`. The Dashboard itself is shown to any user who is allowed into the manager.

## See Also

1. [Dashboards](building-sites/client-proofing/dashboards)
2. [Managing Your Dashboard](building-sites/client-proofing/dashboards/managing)
3. [Assigning a Dashboard to a User Group](building-sites/client-proofing/dashboards/usergroups)
4. [Creating a Dashboard Widget](building-sites/client-proofing/dashboards/creating-a-widget)
5. [Dashboard Widget Types](building-sites/client-proofing/dashboards/widget-types)
    1. [Dashboard Widget Type - File](building-sites/client-proofing/dashboards/widget-types/file)
    2. [Dashboard Widget Type - HTML](building-sites/client-proofing/dashboards/widget-types/html)
    3. [Dashboard Widget Type - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
    4. [Dashboard Widget Type - Snippet](building-sites/client-proofing/dashboards/widget-types/snippet)
