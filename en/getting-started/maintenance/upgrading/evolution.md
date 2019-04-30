---
title: "Upgrading from MODx Evolution"
_old_id: "320"
_old_uri: "2.x/administering-your-site/upgrading-modx/upgrading-from-modx-evolution"
---

Due to the significant differences in the codebases, tag syntax, and users, upgrading from MODX Evolution to Revolution is more involved process with a number of manual steps.

It is **strongly recommended that you back up your data prior to performing any upgrade.**. Once you've done so, simply run the upgrade mode in the setup/ program, and your database tables will be upgraded.

From there, a few things will happen. One, you'll probably notice most of your 3rd party scripts will be broken. You'll need to convert them to the Revolution core, as well as all of your tags to the new [Tag Syntax](building-sites/tag-syntax "Tag Syntax"). Component developers will hopefully already be converting their scripts by this point, so you may be able to find Revolution-compatible scripts via [Package Management](extending-modx/transport-packages "Package Management"), or on [modxcms.com](http://modxcms.com/extras.html) or in the [forums](http://www.modxcms.com/forums/).

Also, it's worth noting that there are no more "web users" or "manager users" - only Users. And the [new permissions scheme](building-sites/client-proofing/security "Security") is vastly different than in 0.9.6/Evolution.

Again, we don't recommend this, but if you're a \*brave\* soul, feel free to backup and try it.

An excellent resource on upgrading from Evolution can be found here: <http://bobsguides.com/migrating-revolution.html>

## Extras Changes from Evolution

Some Extras in Evolution have been discontinued or are no longer in active development. Below is a list of Evolution Extras and their Revolution equivalents:

| Evolution   | Revolution                                                                                                                                                                        |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Ditto       | [getResources](/extras/getresources "getResources"), [getPage](/extras/getpage "getPage"), [tagLister](/extras/taglister "tagLister"), [Archivist](/extras/archivist "Archivist") |
| Jot         | [Quip](/extras/quip "Quip")                                                                                                                                                       |
| SiteMap     | [GoogleSiteMap](/extras/googlesitemap "GoogleSiteMap")                                                                                                                            |
| MaxiGallery | [Gallery](/extras/gallery "Gallery")                                                                                                                                              |
| eForm       | [FormIt](/extras/formit "FormIt")                                                                                                                                                 |
| Wayfinder   | [Wayfinder](/extras/evo/wayfinder "Wayfinder")                                                                                                                                    |
| DocManager  | [Batcher](/extras/batcher "Batcher")                                                                                                                                              |
| AjaxSearch  | [SimpleSearch](/extras/simplesearch "SimpleSearch")                                                                                                                               |
| WebLogin    | [Login](/extras/login "Login")                                                                                                                                                    |

## See Also

1. [Functional Changes from Evolution](administering-your-site/upgrading-modx/upgrading-from-modx-evolution/functional-changes-from-evolution)

- [Bob's Guide to Upgrading to Revolution](http://bobsguides.com/migrating-revolution.html)
