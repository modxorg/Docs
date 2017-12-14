---
title: "CamperManagement.cmCamperDetails Snippet"
_old_id: "800"
_old_uri: "revo/campermanagement/campermanagement.developing-the-front-end/campermanagement.cmcamperdetails-snippet"
---

<div>- [Snippet properties](#CamperManagement.cmCamperDetailsSnippet-Snippetproperties)
- [How to use this Snippet](#CamperManagement.cmCamperDetailsSnippet-HowtousethisSnippet)

</div>The cmCamperDetails snippet can be used to provide a "Vehicle Details" page. The snippet itself will not actually return any information, but instead it will set a bunch of placeholders to use in your template. See the \[Placeholders page for information on placeholders.

<table><tbody><tr><td>display/ADDON/CamperManagement.Placeholders+you+can+use\]</td></tr></tbody></table>The cmCamperDetails snippet requires a "cid" url or post parameter being available, which is used to identify the vehicle to display. If it is not present it can either send the user to a certain resource, or the snippet will return an error message. As your template will look very empty without, I suggest setting up a "Camper does not exist"-kind of page. Also see the cid\*Action properties.

Snippet properties
------------------

<table><tbody><tr><th>&property</th><th>Description   
</th><th>Default Value   
</th></tr><tr><td>cidEmptyAction   
</td><td>0 | a valid resource ID. When not 0, this will 301 redirect the user to the resource ID you specified. This is triggered when there was no "cid" url/post parameter found.   
</td><td>1   
</td></tr><tr><td>cidInvalidAction   
</td><td>0 | a valid resource ID. When not 0, this will 301 redirect the user to the resource ID you specified. This is triggered when the "cid" parameter found was not a valid camper object (not found).   
</td><td>1   
</td></tr><tr><td>hideInactive   
</td><td>0 | 1. When set to 1, this will look at the cidInactiveAction and either display an error message or redirect the user if the vehicle is in status 0 (unconfirmed) or 5 (inactive).   
</td><td>0   
</td></tr><tr><td>cidInactiveAction   
</td><td>0 | a valid resource ID. When not 0, this will 301 redirect the user to the resource ID you specified. This is triggered when the camper was found, but it is not   
</td><td>1   
</td></tr><tr><td>includeBrand   
</td><td>1 | 0. Determines if the related brand object should be retrieved. Can save some processing time when not needed.   
</td><td>1   
</td></tr><tr><td>includeOwner   
</td><td>1 | 0. Determines if the related owner object should be retrieved. Can save some processing time when not needed.   
</td><td>0   
</td></tr><tr><td>includeImages   
</td><td>1 | 0. Determines if the related images should be retrieved. Can save some processing time when not needed.</td><td>1   
</td></tr><tr><td>includeOptions   
</td><td>1 | 0. Determines if the related options should be retrieved. Can save some processing time when not needed.</td><td>1   
</td></tr><tr><td>tplImageOuter   
</td><td>Chunkname. Outer template to wrap the entire image result set, called for every vehicle item.   
</td><td>cmDefaultTplImageOuter   
</td></tr><tr><td>tplImageItem   
</td><td>Chunkname. Template for one image item.   
</td><td>cmDefaultTplImageItem   
</td></tr><tr><td>tplOptionsOuter   
</td><td>Chunkname. Outer template to wrap the entire options result set, called for every vehicle item.   
</td><td>cmDefaultTplOptionsOuter   
</td></tr><tr><td>tplOptionsItem   
</td><td>Chunkname. Template for one option item.   
</td><td>cmDefaultTplOptionsItem   
</td></tr><tr><td>tplOwner   
</td><td>Chunkname. Template to use for displaying owner information.   
</td><td>cmDefaultTplOwner   
</td></tr><tr><td>locale   
</td><td>Locale used for the money\_format function which formats the price.   
</td><td>it\_IT   
</td></tr></tbody></table>How to use this Snippet
-----------------------

This snippet sets placeholders which are prefixed with <ins>cm.</ins> and which placeholders are set depend on your include\* sections.

Make sure the snippet is before using the actual placeholders, as they will not be set then. Both your snippet and the placeholders will need to be uncached as it depends on the request.

Here is an example of calling the snippet:

```
<pre class="brush: php">
[[!cmCamperDetails? &tplImageItem=`cmDetailImage` &includeImages=`1` &includeOwner=`0`]]

```where cmDetailImage has the following content, which is used for a slideshow script and uses the phpthumbof snippet:

```
<pre class="brush: php">
<li>
  <h3>[[+brand]] [[+type]] </h3>
  <span>[[+image:phpthumbof=`w=620&h=360&far=c`]]</span>
  <img src="[[+image:phpthumbof=`w=45&h=33&zc=1`]]" alt="thumb" />
</li>

```And in the template itself you simply use the placeholders like this:

```
<pre class="brush: php">
<ul>
  <li><span>Brand</span>[[!+cm.brand:default=`&nbsp;`]]</li>
  <li><span>Type</span>[[!+cm.type:default=`&nbsp;`]]</li>
  <li><span>Price</span>&euro; [[!+cm.price:default=`&nbsp;`]]</li>
  <li><span>Car</span>[[!+cm.car:default=`&nbsp;`]]</li>
  <li><span>Engine</span>[[!+cm.engine:default=`&nbsp;`]]</li>
</ul>

```The default output modifier can be used for default values (in this case a non breaking space as the template required that when there is no value).