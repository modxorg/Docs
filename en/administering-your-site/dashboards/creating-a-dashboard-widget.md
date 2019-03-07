---
title: "Creating a Dashboard Widget"
_old_id: "69"
_old_uri: "2.x/administering-your-site/dashboards/creating-a-dashboard-widget"
---

- [Creating a Basic Widget](#creating-a-basic-widget)
  - [Assigning the Widget to the Default Dashboard](#assigning-the-widget-to-the-default-dashboard)
  - [Viewing the Widget](#viewing-the-widget)
- [Other Widget Types](#other-widget-types)
- [See Also](#see-also)



This article describes how to create a custom Dashboard Widget, including a short description of the different Dashboard Widget types and how they work.

## Creating a Basic Widget

Go to the Dashboards page (Dashboard -> Dashboards in the top menu), and click on the "Widgets" tab. Then, click on "Create New Widget", and this will load the Widget creation screen. You'll see a few new fields:

- **Name** - The name of your new widget. Let's call ours "Hello World".
- **Description** - A short description of your widget, used internally.
- **Widget Type** - The type of Widget. We'll get into this more later, but for now, just select "HTML".
- **Size** - Widgets come in 3 sizes - half, full, and double. A half-sized widget takes up half of one row. A full takes up one whole row. A double takes up 2 rows.
- **Namespace** - The Namespace to associate the widget with. Useful for Extras developers; but for us, let's keep it at "core".
- **Lexicon** - Adds an ability to load a lexicon with this widget. Let's go ahead and leave ours at "core:dashboards", the default setting.

You'll note that as you type the name of the widget, text appears below it following what you type. This is the automatic translation tool for Widget names; if you were to type a Lexicon Entry key, it would translate it (try typing "widget\_create" for kicks to see what it does).

Now, in your dashboard widget content, go ahead and put this:

``` php 
<p>Hello, world!</p>
```

Our widget should look like this:

![](/download/attachments/35586570/dashboard-create1.png?version=1&modificationDate=1315489054000)

Go ahead and save the Widget.

### Assigning the Widget to the Default Dashboard

Now that we've got our widget, let's assign it to the Default Dashboard, by going back to the main Dashboards page, clicking on the "Dashboards" tab, and finding the default Dashboard. Right-click on it, and click "Update Dashboard". This will load the Default Dashboard editing page.

From here, click the "Place Widget" button above the Widgets grid on this page. Select our "Hello World" widget from the dropdown, and click save. Now our Widget is on the Dashboard! Let's go ahead and place it in position #2 by dragging it between the "Configuration Check" widget and the "MODX News Feed" widget:

![](/download/attachments/35586570/dashboard-create2.png?version=1&modificationDate=1315489054000)

Save your Dashboard.

### Viewing the Widget

Now, if you click the "Dashboard" top menu item on the page, you can see your new dashboard widget in place!

![](/download/attachments/35586570/dashboard-create3.png?version=1&modificationDate=1315489054000)

## Other Widget Types

Obviously, there are more widget types to create. See the [Dashboard Widget Types](administering-your-site/dashboards/dashboard-widget-types "Dashboard Widget Types") section for more information on creating different types of widgets.

## See Also

1. [Managing Your Dashboard](administering-your-site/dashboards/managing-your-dashboard)
2. [Assigning a Dashboard to a User Group](administering-your-site/dashboards/assigning-a-dashboard-to-a-user-group)
3. [Creating a Dashboard Widget](administering-your-site/dashboards/creating-a-dashboard-widget)
4. [Dashboard Widget Types](administering-your-site/dashboards/dashboard-widget-types)
  1. [Dashboard Widget Type - File](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-file)
  2. [Dashboard Widget Type - HTML](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-html)
  3. [Dashboard Widget Type - Inline PHP](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-inline-php)
  4. [Dashboard Widget Type - Snippet](administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-snippet)