---
title: "Roadmap"
_old_id: "883"
_old_uri: "revo/gallery/gallery.roadmap"
---

## Gallery Roadmap

This is a work-in-progress roadmap for Gallery.

Tasks in purple are already finished in [Git](http://github.com/splittingred/Gallery). Ones in green are finished in beta/rc versions.

## Future Versions

### Far Future Features

- Video support

### Future Features

- Integration (either data grabbing or importing from) with flickr, picasa, other 3rd party services

## Released Versions

### 1.5

- Add DB caching to Gallery and GalleryAlbums snippets, reducing page load times
- Add total number of items to galleryalbums album item when cover is shown
- Add Slimbox2 as a front-end plugin
- Add url to the item attributes for each item
- Add parameter &checkForRequestAlbumVar to change parameter &parent when you want to show child albums of current album
- Add per page box to paging bar in album items view
- Better optimization of DB fields
- Gallery 1.5+ only supports MODX 2.2+ and greater
- Add GalleryAlbums Media Source type
- Fix absolute paths in Gallery settings that caused pain when moving sites
- Trim item/album names on save

### 1.4

- Add &gallerifficCss property for specifying an alternate CSS file for Galleriffic plugin
- Fix issue with thumbnails and caching in certain environments
- Fix issue with TinyMCE not being re-instantiated when opening the update item window after the first time.
- Update ajaxupload to support IE / old-school image upload.
- Add ability to clear successful / failed uploads in multi upload window

### 1.3

- Add multi-upload to Gallery albums
- Add richtext (if TinyMCE installed) to Item/Album description page

### 1.2

- Change thumbnail logic to use phpthumbof style php code in connector, vastly improving load/thumbnailing speed, and properly caching images
- Zip upload now accepts zip files with just files inside
- Fix issue with Gallery and Revolution 2.1.1+
- Added GalleryAlbumList custom TV, for selecting Albums in a TV
- Fix bug where creating Album did not respect parent
- Add random sorting to albums in GalleryAlbums

### 1.1

- Watermark support for albums
- Allow batch import from .zip files
- Add getPage support
- Add URL field to galItem objects
- Migrate storage of images from date-centric to album-centric
- i18n of Snippet properties

### 1.0

- Add a custom TV for selecting images from Gallery itself and inserting them into a TV
- Add album cover ability to GalleryAlbums snippet
- Improve caching

### 0.1

- Batch import from a directory into an album
- Plugin architecture for different front-end display modes
- Galleriffic support as FE plugin
- Drag/drop sorting in backend for albums
- Tight integration between all snippets
- Initial release