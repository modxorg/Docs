---
title: "Assigning a Gallery album to a specifc resource"
_old_id: "1757"
_old_uri: "revo/gallery/gallery.gallery/assinging-a-gallery-album-to-a-specifc-resource"
---

One thing Gallery lacks out-of-box is assigning albums to a resources. To get this, you'll need to create a Listbox [tv](making-sites-with-modx/customizing-content/template-variables) and use [EVAL-binding](making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding) to create the Listbox items dynamically.

 To assign a gallery to a specific resource, do the following.

1\. Install [Gallery](https://rtfm.modx.com/extras/revo/gallery/gallery.gallery) extension

 2. Create some galleries, and fill them with images.

 3. Create a chunk named "galleryDropdownList" for instance.

 ``` php 
[[+name]]==[[+id]]||
```

 4. Create a new [tv](making-sites-with-modx/customizing-content/template-variables) with a name "assignedGallery". **Input options:**

 Input type = Listbox (single- or multi- - depends on how many galleries you want to assign to a resource).

 Input Option Values (just copy-paste the following code):

 ``` php 
$output = $modx->runSnippet("GalleryAlbums",array("rowTpl"=>"galleryDropdownList"))."none==0"; return $output;
```

Default Value: 0

 Enable Type-Ahead: Yes

 Force Selection to List: Yes

5\. Assign your tv to a templates of a desired resources, and select some category for it. Save.

6\. Open target resource in manager, go to Template Variables, and locate your tv. Choose proper gallery album for it, and click Save, when you done.

7\. In your page template, place the following code where you expect your gallery to be rendered:

``` php 
[[!Gallery? &album=`[[*assignedGallery]]`]]
```