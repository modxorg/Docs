---
title: "CamperManagement.Placeholders you can use"
_old_id: "806"
_old_uri: "revo/campermanagement/campermanagement.developing-the-front-end/campermanagement.placeholders-you-can-use"
---

Both the cmCampers and cmCamperDetail snippets work with the same data and allow you to include/exclude certain objects with properties. This page will give you an overview of the different placeholders you can use. In some chunks (eg tplImageItem) you should be able to use any of the parent chunks as well, for example camper details.

<div class="note">When using cmCampers, you should use the placeholders in your chunks CACHED to prevent weird behaviour. Example: \[\[+brand\]\] When using cmCamperDetails, you should use the placeholders prefixed with cm. (don't forget the dot), and make sure you are calling them UNCACHED. Example: \[\[!+cm.brand\]\]

</div>Table of Contents:

<div>- [Snippet specific: cmCamper](#CamperManagement.Placeholdersyoucanuse-Snippetspecific%3AcmCamper)
  - [tplItem Chunk](#CamperManagement.Placeholdersyoucanuse-tplItemChunk)
  - [tpl\*Outer Chunks (as well as placeholders set by cmCamperDetails!)](#CamperManagement.Placeholdersyoucanuse-tplOuterChunks%28aswellasplaceholderssetbycmCamperDetails%5C%21%29)
- [Campers (Class: cmCamper)](#CamperManagement.Placeholdersyoucanuse-Campers%28Class%3AcmCamper%29)
- [Options (Class: cmOption, many-to-many class: cmCamperOptions)](#CamperManagement.Placeholdersyoucanuse-Options%28Class%3AcmOption%2Cmanytomanyclass%3AcmCamperOptions%29)
- [Brand (Class: cmBrand)](#CamperManagement.Placeholdersyoucanuse-Brand%28Class%3AcmBrand%29)
- [Owner (Class: cmOwner)](#CamperManagement.Placeholdersyoucanuse-Owner%28Class%3AcmOwner%29)
- [Images (Class: cmImages)](#CamperManagement.Placeholdersyoucanuse-Images%28Class%3AcmImages%29)

</div>Also see:   
?

1. [CamperManagement.cmCamperDetails Snippet](/extras/revo/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcamperdetails-snippet)
2. [CamperManagement.cmCampers Snippet](/extras/revo/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcampers-snippet)
3. [CamperManagement.Placeholders you can use](/extras/revo/campermanagement/campermanagement.developing-the-front-end/campermanagement.placeholders-you-can-use)

Snippet specific: cmCamper
--------------------------

These are specific placeholders for the cmCamper snippet. Besides these, look at the object placeholders mentioned further down below to see what you can use from each object retrieved.

### tplItem Chunk

<table><tbody><tr><th>Placeholder   
</th><th>Description   
</th></tr><tr><td>url   
</td><td>The href part of the link to the resource identified with the &target property. Will contain an url parameter "cid" with the camper ID as value.   
</td></tr><tr><td>owner   
</td><td>Depends on your includeOwner property. When 1 it will output the result of the tplOwner property chunk, if not it will return the owner ID.   
</td></tr><tr><td>images   
</td><td>Depending on the includeImages and numImages (>0) property this will be filled with the contents of the tplImageOuter property chunk, which in turn was filled with the contents of the tplImageItem property chunk for each image item.   
</td></tr><tr><td>options   
</td><td>Depending on the includeOptions property, this will return your options as formatted by the tplOptionsOuter and within that the tplOptionsItem chunks.   
</td></tr></tbody></table>### tpl\*Outer Chunks (as well as placeholders set by cmCamperDetails!)

<table><tbody><tr><th>tpl\*Outer   
</th><th>Placeholder   
</th><th>Description   
</th></tr><tr><td>tplOuter   
</td><td>items   
</td><td>Contents of all tplItem chunks, separated by a linebreak. (\\n)   
</td></tr><tr><td>tplImageOuter   
</td><td>images   
</td><td>Contents of all tplImageItem chunks, separated by a linebreak (\\n).   
</td></tr><tr><td>tplOptionsOuter   
</td><td>options   
</td><td>Contetns of all tplOptionsItem chunks, separated by the separater specified in the &optionsSeparator property of the cmCamper snippet.   
</td></tr></tbody></table>Campers (Class: cmCamper)
-------------------------

<table><tbody><tr><th>Placeholder</th><th>Notes   
</th></tr><tr><td>brand   
</td><td>When not including the brand object (&includeBrand=`0`) this will only output the ID of the related brand object. Else it will be the brand name.   
</td></tr><tr><td>type   
</td><td> </td></tr><tr><td>place   
</td><td> </td></tr><tr><td>car   
</td><td> </td></tr><tr><td>engine   
</td><td> </td></tr><tr><td>manufactured   
</td><td>Will be formatted d/m/Y using strftime.   
</td></tr><tr><td>beds   
</td><td> </td></tr><tr><td>weight   
</td><td> </td></tr><tr><td>mileage   
</td><td> </td></tr><tr><td>periodiccheck   
</td><td>Will be formatted d/m/Y using strftime.   
</td></tr><tr><td>remarks   
</td><td>Stored plain, so no HTML tags. If using line ends in the remarks textarea, you may want to apply the nl2br output modifier.   
</td></tr><tr><td>price   
</td><td>Formatted using money\_format (is included if not present on your machine) using options: %!.2n</td></tr><tr><td>status   
</td><td>Status ID (0-5 inclusive), representing:   
0. Unconfirmed   
1. Active   
2. Favorite   
3. Conditionally sold   
4. Sold   
5. Inactive   
</td></tr><tr><td>statusname   
</td><td>The translated string related to your status ID.   
</td></tr><tr><td>keynr   
</td><td> </td></tr><tr><td>owner   
</td><td>Owner object relational ID, not further information.   
</td></tr><tr><td>id   
</td><td>Camper object unique ID   
</td></tr><tr><td>added   
</td><td>d/m/Y formatted timestamp the object was added.   
</td></tr><tr><td>archived   
</td><td>d/m/Y formatted timestamp the object was archived.</td></tr></tbody></table>Options (Class: cmOption, many-to-many class: cmCamperOptions)
--------------------------------------------------------------

<table><tbody><tr><th>Placeholder   
</th><th>Notes   
</th></tr><tr><td>id   
</td><td> </td></tr><tr><td>name   
</td><td> </td></tr></tbody></table>Brand (Class: cmBrand)
----------------------

Typically not accessed directly, but replaces the camper brand placeholder with the brand name from this object.

Owner (Class: cmOwner)
----------------------

The owner object could be used as a very rudimentary customer relationships system. Unless you have build some kind of classifieds system, you will probably NOT show any of this info to the site visitor anywhere.

<table><tbody><tr><th>Placeholder   
</th><th>Notes   
</th></tr><tr><td>firstname   
</td><td> </td></tr><tr><td>lastname   
</td><td> </td></tr><tr><td>email   
</td><td>Suggest not to use this in a publicly accessible place.</td></tr><tr><td>bank   
</td><td>Suggest not to use this in a publicly accessible place.   
</td></tr><tr><td>phone1   
</td><td>Suggest not to use this in a publicly accessible place.</td></tr><tr><td>phone2   
</td><td>Suggest not to use this in a publicly accessible place.</td></tr><tr><td>address   
</td><td>Suggest not to use this in a publicly accessible place.</td></tr><tr><td>postal   
</td><td>Suggest not to use this in a publicly accessible place.</td></tr><tr><td>city   
</td><td>Suggest not to use this in a publicly accessible place.</td></tr><tr><td>country   
</td><td>Suggest not to use this in a publicly accessible place.</td></tr></tbody></table>Images (Class: cmImages)
------------------------

<table><tbody><tr><th>Placeholder   
</th><th>Notes   
</th></tr><tr><td>camper   
</td><td>Camper ID reference   
</td></tr><tr><td>rank   
</td><td> </td></tr><tr><td>image   
</td><td>Relative URL, can be used with phpthumbof to resize.   
</td></tr></tbody></table>