---
title: "VersionX"
_old_id: "732"
_old_uri: "revo/versionx"
description: "Keep track of changes to your resources and elements with VersionX "
---

VersionX is an extra for MODX Revolution which keeps track of your changes to Resources, Templates, Chunks, Template Variables, Snippets and Plugins. 

## VersionX + Revolution Compatibility

- VersionX 1.0 only worked in Revolution 2.0.x and is no longer supported.
- VersionX 2.0 supported Revolution 2.0-2.2.
- VersionX 2.1 no longer claims Revolution 2.0 support, but instead needs Revolution 2.1 by default. It should theoretically work, but no Revolution 2.0 specific testing or patches will be released.
- VersionX 2.2 required at least Revolution 2.2 to take advantage of new coding standards.
- VersionX 2.3.2+ supports MODX 2 and 3 (alpha2+)
- VersionX 3.0 supports MODX 2.7+ and 3.0-alpha2+

## History & Legacy

VersionX was first developed in December 2010 by Mark Hamstra and made it up to VersionX 1.0.0-Alpha5 in March 2011 before time ran out to further develop and support the component. Unfortunately VersionX 1.0 did not support MODX Revolution 2.1 or up.

In 2011-2012, it was rewritten completely and 2.0 was released on May 3rd, 2012. This release kept getting minor updates and added features for about a decade. 

In 2023, following a crowdfunding campaign, it was rewritten again to no longer store full copies of objects, but just the changes (deltas) to save on diskspace. This release was in beta for a few months before the official release. 

## Upgrading to 3.0

3.0 uses a new data model so older data created in 2.0 is not immediately available. 

When installing the 3.0 release, you can choose to create fresh snapshots and essentially start from scratch based on the current state. Or, you can migrate existing data over from the command line by using the following command from the root of your MODX installation:

```
php core/components/versionx/migrate.php
```

Depending on the size of your version history, that may take a while to process. 

Old data is not automatically removed. After updating, you may want to delete or truncate the `modx_versionx_*` tables **except** for the tables starting with `modx_versionx_delta`. 

## Development & Bug reporting

For reporting issues or requesting features, please visit <https://github.com/modmore/VersionX>. 

## Usage & Features

VersionX consists of two parts. The first part is a plugin running in the background which triggers on every Resource and Element create and update to make a copy of the data at that point. The second part is the back-end module (manager page) which may be accessed through the Components menu. This page offers you searchable grids with all the different versions stored in the database, with the possibility to open up the details. From there you are able to choose a different version to compare it with, or to revert the live resource or element from an older version.

### Version tabs on Resource & Element panels

To really provide an integrated experience, VersionX creates unbranded tabs on Resource and Element update panels, where the user can list versions and instantly revert (as of 2.1) the resource or element to an older version. Choosing to view details will send the user to the VersionX component where the version details are available.

### Take a Snapshot during Installation

To provide a baseline to compare to you can create a snapshot during the installation. You will be presented with checkboxes which you can tick or leave empty, indicating which types of elements and resources you would like to create a snapshot version of. 

Basically this creates a version for all resources or element types you choose. You can run this any time by reinstalling the package from the package manager. If you have a large amount of resources (several thousand or more) this could potentially be a long process.

Versions created as a result of the snapshot during setup will have a "mode" set of "Snapshot".

### Dashboard Widgets (for MODX 2.2+)

If you use MODX 2.2.0 or up, you may be pleased to find VersionX comes with a dashboard widget that shows you the latest resource changes right on the dashboard for a quick overview of what is happening. This widget could potentially replace the existing "Recently edited resources" that only shows recently edited resources for the currently logged in user.

To set up the VersionX Dashboard Widget, please see the instructions on [Managing your Dashboard](administering-your-site/dashboards/managing-your-dashboard "Managing Your Dashboard").

If you installed VersionX in Revolution 2.1.x and upgraded to Revolution 2.2+ afterwards, re-run the VersionX installer to add the widget to the system.
