---
title: "CamperManagement.cmCamperDetails Snippet"
_old_id: "800"
_old_uri: "revo/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcamperdetails-snippet"
---

- [Snippet properties](#CamperManagement.cmCamperDetailsSnippet-Snippetproperties)
- [How to use this Snippet](#CamperManagement.cmCamperDetailsSnippet-HowtousethisSnippet)



The cmCamperDetails snippet can be used to provide a "Vehicle Details" page. The snippet itself will not actually return any information, but instead it will set a bunch of placeholders to use in your template. See the \[Placeholders page for information on placeholders.

| display/ADDON/CamperManagement.Placeholders+you+can+use\] |
|-----------------------------------------------------------|

The cmCamperDetails snippet requires a "cid" url or post parameter being available, which is used to identify the vehicle to display. If it is not present it can either send the user to a certain resource, or the snippet will return an error message. As your template will look very empty without, I suggest setting up a "Camper does not exist"-kind of page. Also see the cid\*Action properties.

## Snippet properties

| &property | Description | Default Value |
|-----------|-------------|---------------|
| cidEmptyAction | 0 | a valid resource ID. When not 0, this will 301 redirect the user to the resource ID you specified. This is triggered when there was no "cid" url/post parameter found. | 1 |
| cidInvalidAction | 0 | a valid resource ID. When not 0, this will 301 redirect the user to the resource ID you specified. This is triggered when the "cid" parameter found was not a valid camper object (not found). | 1 |
| hideInactive | 0 | 1. When set to 1, this will look at the cidInactiveAction and either display an error message or redirect the user if the vehicle is in status 0 (unconfirmed) or 5 (inactive). | 0 |
| cidInactiveAction | 0 | a valid resource ID. When not 0, this will 301 redirect the user to the resource ID you specified. This is triggered when the camper was found, but it is not | 1 |
| includeBrand | 1 | 0. Determines if the related brand object should be retrieved. Can save some processing time when not needed. | 1 |
| includeOwner | 1 | 0. Determines if the related owner object should be retrieved. Can save some processing time when not needed. | 0 |
| includeImages | 1 | 0. Determines if the related images should be retrieved. Can save some processing time when not needed. | 1 |
| includeOptions | 1 | 0. Determines if the related options should be retrieved. Can save some processing time when not needed. | 1 |
| tplImageOuter | Chunkname. Outer template to wrap the entire image result set, called for every vehicle item. | cmDefaultTplImageOuter |
| tplImageItem | Chunkname. Template for one image item. | cmDefaultTplImageItem |
| tplOptionsOuter | Chunkname. Outer template to wrap the entire options result set, called for every vehicle item. | cmDefaultTplOptionsOuter |
| tplOptionsItem | Chunkname. Template for one option item. | cmDefaultTplOptionsItem |
| tplOwner | Chunkname. Template to use for displaying owner information. | cmDefaultTplOwner |
| locale | Locale used for the money\_format function which formats the price. | it\_IT |

## How to use this Snippet

This snippet sets placeholders which are prefixed with cm. and which placeholders are set depend on your include\* sections.

Make sure the snippet is before using the actual placeholders, as they will not be set then. Both your snippet and the placeholders will need to be uncached as it depends on the request.

Here is an example of calling the snippet:

``` php 
[[!cmCamperDetails? &tplImageItem=`cmDetailImage` &includeImages=`1` &includeOwner=`0`]]
```

where cmDetailImage has the following content, which is used for a slideshow script and uses the phpthumbof snippet:

``` php 
<li>
  <h3>[[+brand]] [[+type]] </h3>
  <span>[[+image:phpthumbof=`w=620&h=360&far=c`]]</span>
  <img src="[[+image:phpthumbof=`w=45&h=33&zc=1`]]" alt="thumb" />
</li>
```

And in the template itself you simply use the placeholders like this:

``` php 
<ul>
  <li><span>Brand</span>[[!+cm.brand:default=`&nbsp;`]]</li>
  <li><span>Type</span>[[!+cm.type:default=`&nbsp;`]]</li>
  <li><span>Price</span>&euro; [[!+cm.price:default=`&nbsp;`]]</li>
  <li><span>Car</span>[[!+cm.car:default=`&nbsp;`]]</li>
  <li><span>Engine</span>[[!+cm.engine:default=`&nbsp;`]]</li>
</ul>
```

The default output modifier can be used for default values (in this case a non breaking space as the template required that when there is no value).