---
title: "Upgrading from MODx Evolution"
_old_id: "320"
_old_uri: "2.x/administering-your-site/upgrading-modx/upgrading-from-modx-evolution"
---

<div class="warning">Due to the significant differences in the codebases, tag syntax, and users, upgrading from MODX Evolution to Revolution is more involved process with a number of manual steps.</div>It is **strongly recommended that you back up your data prior to performing any upgrade.**. Once you've done so, simply run the upgrade mode in the setup/ program, and your database tables will be upgraded.

 From there, a few things will happen. One, you'll probably notice most of your 3rd party scripts will be broken. You'll need to convert them to the Revolution core, as well as all of your tags to the new [Tag Syntax](/revolution/2.x/making-sites-with-modx/tag-syntax "Tag Syntax"). Component developers will hopefully already be converting their scripts by this point, so you may be able to find Revolution-compatible scripts via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or on [modxcms.com](http://modxcms.com/extras.html) or in the [forums](http://www.modxcms.com/forums/).

 Also, it's worth noting that there are no more "web users" or "manager users" - only Users. And the [new permissions scheme](/revolution/2.x/administering-your-site/security "Security") is vastly different than in 0.9.6/Evolution.

 Again, we don't recommend this, but if you're a \*brave\* soul, feel free to backup and try it.

<div class="info"> An excellent resource on upgrading from Evolution can be found here: <http://bobsguides.com/migrating-revolution.html></div>Extras Changes from Evolution
-----------------------------

 Some Extras in Evolution have been discontinued or are no longer in active development. Below is a list of Evolution Extras and their Revolution equivalents:

 <table><tbody><tr><th> Evolution </th> <th> Revolution </th> </tr><tr><td> Ditto </td> <td> [getResources](/extras/revo/getresources "getResources"), [getPage](/extras/revo/getpage "getPage"), [tagLister](/extras/revo/taglister "tagLister"), [Archivist](/extras/revo/archivist "Archivist") </td> </tr><tr><td> Jot </td> <td> [Quip](/extras/revo/quip "Quip") </td> </tr><tr><td> SiteMap </td> <td> [GoogleSiteMap](/extras/revo/googlesitemap "GoogleSiteMap") </td> </tr><tr><td> MaxiGallery </td> <td> [Gallery](/extras/revo/gallery "Gallery") </td> </tr><tr><td> eForm </td> <td> [FormIt](/extras/revo/formit "FormIt") </td> </tr><tr><td> Wayfinder </td> <td> [Wayfinder](/extras/evo/wayfinder "Wayfinder") </td> </tr><tr><td> DocManager </td> <td> [Batcher](/extras/revo/batcher "Batcher") </td> </tr><tr><td> AjaxSearch </td> <td> [SimpleSearch](/extras/revo/simplesearch "SimpleSearch") </td> </tr><tr><td> WebLogin </td> <td> [Login](/extras/revo/login "Login") </td></tr></tbody></table>See Also
--------

1. [Functional Changes from Evolution](/revolution/2.x/administering-your-site/upgrading-modx/upgrading-from-modx-evolution/functional-changes-from-evolution)

- [Bob's Guide to Upgrading to Revolution](http://bobsguides.com/migrating-revolution.html)