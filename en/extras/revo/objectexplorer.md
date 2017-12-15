---
title: "ObjectExplorer"
_old_id: "1789"
_old_uri: "revo/objectexplorer"
---

- [What is ObjectExplorer?](#ObjectExplorer-WhatisObjectExplorer)
- [Package Information](#ObjectExplorer-Information)
- [History](#ObjectExplorer-History)
- [Download](#ObjectExplorer-Download)
- [Development and Bug Reporting](#ObjectExplorer-DevelopmentandBugReporting)
- [Documentation](#ObjectExplorer-Documentation)
 
What is ObjectExplorer?
-----------------------

The output of ObjectExplorer is derived from the MODX schema file, so it should match the objects in the version of MODX Revolution that you are running. It's handy to have as a reference when working on MODX code. It will also run outside of MODX.

The default output is the Quick Reference, which is recommended. As an alternative, you can have it produce the Full Reference, which is a dump of the entire schema as an array.

Create a resource and insert a tag like the following one in the Resource Content field:

\[\[ObjectExplorer\]\]

\[\[ObjectExplorer? &full=`1`\]\]

\[\[ObjectExplorer? &columns=`5`\]\]

View the resource and you should see the reference.

The default for the index at the top is 4 columns. If you change that, you'll probably need to adjust the width of the JumpList in the CSS file.

Be sure to call the snippet uncached -- it takes a while to run.

Package Information
-------------------

- Downloads: 1,054
- License: GPLv2
- Requires: Revolution 2.0.x or greater
- Supports: mysql,sqlsrv

History
-------

- Author: Bob Ray [Bob's Guides](https://bobsguides.com)

 This version of the ObjectExplorer extra was developed by Bob Ray. It was first posted to GitHub on Nov 26, 2011. As of Jun 22, 2017 it had been last updated on Jun 22, 2017, had 34 commits, and had been downloaded 1,054 times. The ObjectExplorer package consists of 201 separate files, containing 10,152 lines of code.

It is currently maintained by Bob Ray.

Download
--------

 ObjectExplorer can be downloaded and installed from within the MODX Revolution Manager via [Package Manager](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer), or from the [MODX Extras Repository](https://modx.com/extras/package/objectexplorer).

Development and Bug Reporting 
------------------------------

 ObjectExplorer is stored and developed using GitHub, and can be found here: [ObjectExplorer GitHub main page](https://github.com/BobRay/ObjectExplorer).

 Bugs and feature requests can be filed here: [ObjectExplorer issues page.](https://github.com/BobRay/ObjectExplorer/issues).

Questions about how to use ObjectExplorer should be posted on the [MODX Forums](https://forums.modx.com).

Documentation
-------------

 The full documentation for ObjectExplorer can be found at the author's web site (Bob's Guides): [ObjectExplorer Documentation](https://bobsguides.com/objectexplorer-tutorial.html).

 