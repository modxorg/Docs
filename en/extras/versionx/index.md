---
title: "VersionX"
_old_id: "732"
_old_uri: "revo/versionx"
---

## What is VersionX

VersionX is an extra for MODX Revolution which adds Resource, Template, Chunk, Template Variable, Snippet and Plugin versioning to your MODX site.

### VersionX + Revolution Compatibility

- VersionX 1.0 only worked in Revolution 2.0.x and is no longer supported.
- VersionX 2.0 supported Revolution 2.0-2.2.
- VersionX 2.1 no longer claims Revolution 2.0 support, but instead needs Revolution 2.1 by default. It should theoretically work, but no Revolution 2.0 specific testing or patches will be released.
- VersionX 2.2 (future release) will likely start requiring at least Revolution 2.2 to take advantage of new coding standards.

### History& Legacy

VersionX was first developed in December 2010 by Mark Hamstra and made it up to VersionX 1.0.0-Alpha5 in March 2011 before time ran out to further develop and support the component. Unfortunately VersionX 1.0 did not support MODX Revolution 2.1 or up.

In August 2011, the first steps towards a complete rewrite were made, which happened mostly in private repositories until late November. With the first version of the 2.0.0 branch released on May 3rd, 2012, VersionX is now future-proof, flexible and able of versioning all elements and resources.

| Version      | Release date | Remarks / highlights                                                                              |
| ------------ | ------------ | ------------------------------------------------------------------------------------------------- |
| 1.0.0-alpha  | 9 Jan 2011   | Initial release.                                                                                  |
| 1.0.0-alpha2 | 11 Jan 2011  | Several fatal issues fixed, German translation added                                              |
| 1.0.0-alpha3 | 14 Jan 2011  | Important fixes filed, usability improvements, French and Russian translated added                |
| 1.0.0-alpha4 | 18 Mar 2011  | Many bugfixes.                                                                                    |
| 1.0.0-alpha5 | 24 Mar 2011  | Few fatal bugfixes.                                                                               |
| 2.0.0-rc1    | 03 May 2012  | Complete rewrite including versioning of Elements and actually functional restoring of resources. |
Compatible with Revolution 2.0.8 - 2.2.x (excluding 2.2.0-pl2, including basic support for Custom Resource Classes).
Tabs added to Resource and Templates. |
| 2.0.0-rc2 | 28 May 2012 | Bugfixes, dashboard widget, DE and RU translations. Fixes critical bug with static resources. |
| 2.0.0-rc3 | 08 July 2012 | Bugfixes, UI improvements and plugin and snippet versioning UIs added. |
| 2.0.0-rc4 | 19 July 2012 | Critical bugfix for specific browsers. |
| 2.0.0-pl | 29 October 2012 | Bugfixes, better UTF-8 support, ability to revert Resources. |
| 2.1.0-pl | 14 January 2013 | Bugfixes, ability to revert all elements, remember open tabs in component. |

**VersionX 1.0 and 2.0 are NOT compatible with eachother**
Due to the severity of the rewrite, VersionX 1.0 and 2.0 are not compatible with eachother. However, considering the huge advantages of 2.0 over 1.0, VersionX 2.0 will be pushed out as an update to 1.0 and the update process should be pretty smooth.. **minus the fact that your stored revisions will not be imported to VersionX 2.0** and you will not be able to interact with them through the Manager after updating to 2.0. You can, however, access your old data by opening up the extra\_versionx table in a tool such as PhpMyAdmin. An import is not planned, however during the setup procedure of VersionX 2.0 you are presented with options to create a snapshot of the current data. See for more information under Usage & Features.

## Development & Bug reporting

VersionX 1.0 is no longer supported or developed, but for legacy sakes you can find the source on Github: <https://github.com/Mark-H/VersionX> - you will have to switch branches, but it's still there!

VersionX 2.0 has been publicly released on May 3rd 2012, is developed in a separate repository on Github: <https://github.com/Mark-H/VersionX2> - bugs & feature requests are very much welcome there as well.

## Usage& Features

VersionX consists of two parts. The first part is a plugin running in the background which triggers on every Resource and Element create and update to make a copy of the data at that point. The second part is the back-end module (manager page) which may be accessed through the Components menu. This page offers you searchable grids with all the different versions stored in the database, with the possibility to open up the details. From there you are able to choose a different version to compare it with, or to revert the live resource or element from an older version.

### Version tabs on Resource & Element panels

To really provide an integrated experience, VersionX creates unbranded tabs on Resource and Element update panels, where the user can list versions and instantly revert (as of 2.1) the resource or element to an older version. Choosing to view details will send the user to the VersionX component where the version details are available.

### Take a Snapshot during Installation

To provide a baseline to compare to you can create a snapshot during the installation. You will be presented with checkboxes which you can tick or leave empty, indicating which types of elements and resources you would like to create a snapshot version of. Basically this creates a version for all resources or element types you choose. You can run this any time by reinstalling the package from the package manager. If you have a large amount of resources (several thousand or more) this could potentially be a long process.

Versions created as a result of the snapshot during setup will have a "mode" set of "Snapshot".

### Dashboard Widgets (for MODX 2.2+)

If you use MODX 2.2.0 or up, you may be pleased to find VersionX comes with a dashboard widget that shows you the latest resource changes right on the dashboard for a quick overview of what is happening. This widget could potentially replace the existing "Recently edited resources" that only shows recently edited resources for the currently logged in user.

To set up the VersionX Dashboard Widget, please see the instructions on [Managing your Dashboard](administering-your-site/dashboards/managing-your-dashboard "Managing Your Dashboard").

If you installed VersionX in Revolution 2.1.x and upgraded to Revolution 2.2+ afterwards, re-run the VersionX installer to add the widget to the system.
