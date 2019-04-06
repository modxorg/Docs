---
title: "CamperManagement.Placeholders you can use"
_old_id: "806"
_old_uri: "revo/campermanagement/campermanagement.developing-the-front-end/campermanagement.placeholders-you-can-use"
---

Both the cmCampers and cmCamperDetail snippets work with the same data and allow you to include/exclude certain objects with properties. This page will give you an overview of the different placeholders you can use. In some chunks (eg tplImageItem) you should be able to use any of the parent chunks as well, for example camper details.

When using cmCampers, you should use the placeholders in your chunks CACHED to prevent weird behaviour. Example: \[\[+brand\]\] When using cmCamperDetails, you should use the placeholders prefixed with cm. (don't forget the dot), and make sure you are calling them UNCACHED. Example: \[\[!+cm.brand\]\]

## Snippet specific: cmCamper

These are specific placeholders for the cmCamper snippet. Besides these, look at the object placeholders mentioned further down below to see what you can use from each object retrieved.

### tplItem Chunk

| Placeholder | Description                                                                                                                                                                                                                              |
| ----------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| url         | The href part of the link to the resource identified with the &target property. Will contain an url parameter "cid" with the camper ID as value.                                                                                         |
| owner       | Depends on your includeOwner property. When 1 it will output the result of the tplOwner property chunk, if not it will return the owner ID.                                                                                              |
| images      | Depending on the includeImages and numImages (>0) property this will be filled with the contents of the tplImageOuter property chunk, which in turn was filled with the contents of the tplImageItem property chunk for each image item. |
| options     | Depending on the includeOptions property, this will return your options as formatted by the tplOptionsOuter and within that the tplOptionsItem chunks.                                                                                   |

### tpl\*Outer Chunks (as well as placeholders set by cmCamperDetails!)

| tpl\*Outer      | Placeholder | Description                                                                                                                            |
| --------------- | ----------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| tplOuter        | items       | Contents of all tplItem chunks, separated by a linebreak. (\\n)                                                                        |
| tplImageOuter   | images      | Contents of all tplImageItem chunks, separated by a linebreak (\\n).                                                                   |
| tplOptionsOuter | options     | Contetns of all tplOptionsItem chunks, separated by the separater specified in the &optionsSeparator property of the cmCamper snippet. |

## Campers (Class: cmCamper)

| Placeholder   | Notes                                                                                                                                             |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------- |
| brand         | When not including the brand object (&includeBrand=`0`) this will only output the ID of the related brand object. Else it will be the brand name. |
| type          |                                                                                                                                                   |
| place         |                                                                                                                                                   |
| car           |                                                                                                                                                   |
| engine        |                                                                                                                                                   |
| manufactured  | Will be formatted d/m/Y using strftime.                                                                                                           |
| beds          |                                                                                                                                                   |
| weight        |                                                                                                                                                   |
| mileage       |                                                                                                                                                   |
| periodiccheck | Will be formatted d/m/Y using strftime.                                                                                                           |
| remarks       | Stored plain, so no HTML tags. If using line ends in the remarks textarea, you may want to apply the nl2br output modifier.                       |
| price         | Formatted using money\_format (is included if not present on your machine) using options: %!.2n                                                   |
| status        | Status ID (0-5 inclusive), representing:                                                                                                          |
1. Unconfirmed 
2. Active 
3. Favorite 
4. Conditionally sold 
5. Sold 
6. Inactive |
| statusname | The translated string related to your status ID. |
| keynr |  |
| owner | Owner object relational ID, not further information. |
| id | Camper object unique ID |
| added | d/m/Y formatted timestamp the object was added. |
| archived | d/m/Y formatted timestamp the object was archived. |

## Options (Class: cmOption, many-to-many class: cmCamperOptions)

| Placeholder | Notes |
| ----------- | ----- |
| id          |       |
| name        |       |

## Brand (Class: cmBrand)

Typically not accessed directly, but replaces the camper brand placeholder with the brand name from this object.

## Owner (Class: cmOwner)

The owner object could be used as a very rudimentary customer relationships system. Unless you have build some kind of classifieds system, you will probably NOT show any of this info to the site visitor anywhere.

| Placeholder | Notes                                                   |
| ----------- | ------------------------------------------------------- |
| firstname   |                                                         |
| lastname    |                                                         |
| email       | Suggest not to use this in a publicly accessible place. |
| bank        | Suggest not to use this in a publicly accessible place. |
| phone1      | Suggest not to use this in a publicly accessible place. |
| phone2      | Suggest not to use this in a publicly accessible place. |
| address     | Suggest not to use this in a publicly accessible place. |
| postal      | Suggest not to use this in a publicly accessible place. |
| city        | Suggest not to use this in a publicly accessible place. |
| country     | Suggest not to use this in a publicly accessible place. |

## Images (Class: cmImages)

| Placeholder | Notes                                                |
| ----------- | ---------------------------------------------------- |
| camper      | Camper ID reference                                  |
| rank        |                                                      |
| image       | Relative URL, can be used with phpthumbof to resize. |

## Also see: 

1. [CamperManagement.cmCamperDetails Snippet](extras/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcamperdetails-snippet)
2. [CamperManagement.cmCampers Snippet](extras/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcampers-snippet)
3. [CamperManagement.Placeholders you can use](extras/campermanagement/campermanagement.developing-the-front-end/campermanagement.placeholders-you-can-use)

