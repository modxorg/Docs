---
title: "Upgrading from MODX Evolution"
_old_id: "320"
_old_uri: "2.x/administering-your-site/upgrading-modx/upgrading-from-modx-evolution"
sortorder: 99
---

Evolution and Revolution differ in codebase, tag syntax and users, so the migration is a manual process with several steps.

**Back up your data before any upgrade.** Then run upgrade mode in the setup program; it converts your database tables.

Most third-party scripts will break: convert them to the Revolution core, and convert your tags to the new [Tag Syntax](building-sites/tag-syntax "Tag Syntax"). Revolution-compatible versions may already exist in [Package Management](extending-modx/transport-packages "Package Management"), on [modx.com](https://modx.com/extras/) or in the [forums](https://community.modx.com/).

There are no more "web users" or "manager users" — only Users, and the [new permissions scheme](building-sites/client-proofing/security "Security") differs from Evolution and 0.9.6.

The migration is not recommended; if you proceed, test it on a copy of your site first.


## Extras Changes from Evolution

Some Extras in Evolution have been discontinued or are no longer in active development. Below is a list of Evolution Extras and their Revolution equivalents:

| Evolution   | Revolution                                                                                                                                                                        |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Ditto       | [getResources](/extras/getresources "getResources"), [getPage](/extras/getpage "getPage"), [tagLister](/extras/taglister "tagLister"), [Archivist](/extras/archivist "Archivist") |
| Jot         | [Quip](/extras/quip "Quip")                                                                                                                                                       |
| SiteMap     | [GoogleSiteMap](/extras/googlesitemap "GoogleSiteMap")                                                                                                                            |
| MaxiGallery | [Gallery](/extras/gallery "Gallery")                                                                                                                                              |
| eForm       | [FormIt](/extras/formit "FormIt")                                                                                                                                                 |
| Wayfinder   | [Wayfinder](/extras/wayfinder "Wayfinder")                                                                                                                                        |
| DocManager  | [Batcher](/extras/batcher "Batcher")                                                                                                                                              |
| AjaxSearch  | [SimpleSearch](/extras/simplesearch "SimpleSearch")                                                                                                                               |
| WebLogin    | [Login](/extras/login "Login")                                                                                                                                                    |

## See Also

- [Functional Changes from Evolution](getting-started/maintenance/upgrading/evolution/functional-changes)
- [Bob's Guide to Upgrading to Revolution](http://bobsguides.com/migrating-revolution.html)
