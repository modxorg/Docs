---
title: "Assigning a Gallery album to a specific resource"
_old_id: "1757"
_old_uri: "revo/gallery/gallery.gallery/assinging-a-gallery-album-to-a-specifc-resource"
---

Gallery does not assign albums to Resources out of the box. Use a Listbox TV whose options come from the album table.

`@EVAL` bindings are removed in MODX 3. Prefer `@SELECT` (below) or an [`@SNIPPET`](building-sites/elements/template-variables/bindings/snippet-binding) that returns `label==id` pairs.

1. Install the [Gallery](extras/gallery) Extra.

2. Create albums and add images.

3. Create a Listbox TV named `assignedGallery` (single or multi, depending on how many albums you need per Resource).

**Input Option Values** — load active albums from the Gallery tables (adjust the table prefix if yours is not `modx_`):

```sql
@SELECT GROUP_CONCAT(name, '==', id SEPARATOR '||') FROM `modx_gallery_albums` WHERE active=1
```

- Default Value: `0`
- Enable Type-Ahead: Yes
- Force Selection to List: Yes

1. Assign the TV to the templates that should pick an album. Save.

2. Edit a Resource, open Template Variables, choose the album, Save.

3. In the page Template, render the album:

```php
[[!Gallery? &album=`[[*assignedGallery]]`]]
```
