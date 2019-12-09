---
title: "Roadmap"
_old_id: "894"
_old_uri: "revo/googlesitemap/googlesitemap.roadmap"
---

## GoogleSiteMap Roadmap

This is a work-in-progress roadmap for GoogleSiteMap.

Tasks in purple are already finished in Git. Ones in green are finished in beta/rc versions.

## Future Versions

- None planned yet!

## Released Versions

### 2.0

### - Complete rewrite based on Garry's blazing fast sitemap code

- Added cachemanager
- Efforts were made to make it backwards compatible using runSnippet to call the legacy snippet if legacy features are required.
- RC release could use some testing

### 1.1

- Add maxDepth, excludeResources properties
- Refactor to work with overridable chunks for templates
- Fix URL generation bug where home URL was incorrectly generating
- i18n of properties

### 1.0

- Add fix for when editedon is empty (thanks Andrey Federov!)
- Add changelog- Initial release
