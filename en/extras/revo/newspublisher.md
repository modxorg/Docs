---
title: "NewsPublisher"
_old_id: "1787"
_old_uri: "revo/newspublisher"
---

- [What is NewsPublisher?](#NewsPublisher-WhatisNewsPublisher)
- [Package Information](#NewsPublisher-Information)
- [History](#NewsPublisher-History)
- [Download](#NewsPublisher-Download)
- [Development and Bug Reporting](#NewsPublisher-DevelopmentandBugReporting)
- [Documentation](#NewsPublisher-Documentation)
 
What is NewsPublisher?
----------------------

 NewsPublisher allows users to create and edit Resources in the front end, without having to log in to the MODX Manager. It allows editing of all resource fields (except the id field) and any Template Variables attached to the Resource. You choose which fields to display and can make most of them read-only if necessary. Full Rich Text editing is available for the content, description, and summary (introtext) fields and for any rich text TVs using TinyMCE 4. NewsPublisher provides built-in image and file browsing, as well as image editing via elFinder.

 3.0.x -- New Features -- No more extJS/modExt. No more dependence on the MODX TinyMCE extra. Uses the elFinder browser. Allows image editing (crop, rotate, resize) in browser. Loads TinyMCE 4 from tinymce.com. Automatically redirects to Login page for not-logged-in users. See changelog for full list.

 NewsPublisher presents a modifiable form for creating new resources and editing existing resources in the front end of a web site. The NpEditThisButton snippet is also included, which displays a button to launch NewsPublisher for the current page.

 NewsPublisher responds to the MODX security permissions for a page. Users without the appropriate permissions cannot create or edit pages they are not authorized to access.

 You can now have multiple edit buttons on a single page and can place edit buttons in the Tpl chunk of getResources or any other aggregator snippet.

 Install using Package Manager and see the tutorial at [Bobs Guides](https://bobsguides.com/newspublisher-tutorial.html)

Package Information
-------------------

- Downloads: 9,424
- License: GPLv2
- Requires: Revolution 2.2.x or greater
- Supports: mysql,sqlsrv

History
-------

- Evolution Author: Raymond Irving [SlideShare](https://www.slideshare.net/xwisdom)
- Revolution Author: Bob Ray [Bob's Guides](https://bobsguides.com)
- Contributors: Invaluable fixes, improvements, and feature additions were created and tested by Markus Schlegel, donshakespeare, Bruno17, Gregor Šekoranja, Alberto Ramacciotti, and others too numerous to mention.

 This version of the NewsPublisher extra was developed by Bob Ray. It was first posted to GitHub on Nov 09, 2010. As of Jun 22, 2017 it had been last updated on Jun 22, 2017, had 714 commits, and had been downloaded 9,424 times. The NewsPublisher package consists of 3,801 separate files, containing 144,524 lines of code.

 It is currently maintained by Bob Ray.

Download
--------

 NewsPublisher can be downloaded and installed from within the MODX Revolution Manager via [Package Manager](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer), or from the [MODX Extras Repository](https://modx.com/extras/package/newspublisher).

Development and Bug Reporting 
------------------------------

 NewsPublisher is stored and developed using GitHub, and can be found here: [NewsPublisher GitHub main page](https://github.com/BobRay/newspublisher).

 Bugs and feature requests can be filed here: [NewsPublisher issues page.](https://github.com/BobRay/newspublisher/issues).

 Questions about how to use NewsPublisher should be posted on the [MODX Forums](https://forums.modx.com).

Documentation
-------------

 The full documentation for NewsPublisher can be found at the author's web site (Bob's Guides): [NewsPublisher Documentation](https://bobsguides.com/newspublisher-tutorial.html).

 