---
title: "Assigning Media Sources to TVs"
_old_id: "346"
_old_uri: "2.x/administering-your-site/media-sources/assigning-media-sources-to-tvs"
---

<div>- [Creating the TV](#AssigningMediaSourcestoTVs-CreatingtheTV)
- [Limiting the Source to Specific Folders](#AssigningMediaSourcestoTVs-LimitingtheSourcetoSpecificFolders)
- [Editing the TV](#AssigningMediaSourcestoTVs-EditingtheTV)
- [See Also](#AssigningMediaSourcestoTVs-SeeAlso)

</div>This article describes how to assign a Media Source to a TV. It is recommended to read the [Adding a Media Source](/revolution/2.x/administering-your-site/media-sources/adding-a-media-source "Adding a Media Source") article before reading this one.

<div class="info">Only "image" and "file" type TVs use Sources at this time.</div>Creating the TV
---------------

First we will start by creating a TV that we will attach a media source to. Go ahead and create a TV called "TestSourceTV", and save it. Notice then you'll see a new tab on your TV, a "Media Sources" tab. This will have a grid of [Contexts](/revolution/2.x/administering-your-site/contexts "Contexts") that are available, and the Sources that are associated with those Contexts.

This means that TVs can use different Sources per Context. This will take effect when editing a TV in a Resource from that Context, as well as when that TV is rendered in that Context.

For now, go ahead and assign all contexts to the Source "My New Source", which we created in the [Adding a Media Source](/revolution/2.x/administering-your-site/media-sources/adding-a-media-source "Adding a Media Source") article. Set your TV's input type, under the "Input Options" tab, to "image". Assign it to a Template. Save your TV.

Limiting the Source to Specific Folders
---------------------------------------

Often, you'll want users to select files from a specific folder when selecting a value for a TV. You can set up this restriction when you define your Media Source.

1\. First, create your Media Source under **Tools -> Media Sources**  
2\. After you've created the Media Source, right-click it and select "Update Media Source"   
3\. Scroll down and edit the following properties:

- **basePath** - set to something like "assets/images/"
- **baseUrl** - set to something like "assets/images/"

Leave **basePathRelative** and **baseUrlRelative** set to "Yes". That's the most common way to set this up.

<div class="note">**basePath** and **baseUrl** should start _without_ a slash, but they should end with a trailing slash.</div>Editing the TV
--------------

Now, when you edit that TV in a Resource, you'll notice that it uses the Source we created earlier:

![](/download/attachments/35586538/20110907-pd72jtn9bhdbn5q5qb7wadku5a.jpeg?version=1&modificationDate=1315428297000)

Clicking the dropdown will load the MODx.Browser window using the Source that we specified - note that our source here only loads the contents of the assets/ directory.

Now we'll probably want to consider restricting access to this Source, so that our Content Editors can't accidentally edit it and mess it up. Read the [next article](/revolution/2.x/administering-your-site/media-sources/securing-a-media-source "Securing a Media Source") to find out how.

See Also
--------

1. [Adding a Media Source](/revolution/2.x/administering-your-site/media-sources/adding-a-media-source)
2. [Assigning Media Sources to TVs](/revolution/2.x/administering-your-site/media-sources/assigning-media-sources-to-tvs)
3. [Securing a Media Source](/revolution/2.x/administering-your-site/media-sources/securing-a-media-source)
  1. [Creating a Media Source for Clients Tutorial](/revolution/2.x/administering-your-site/media-sources/securing-a-media-source/creating-a-media-source-for-clients-tutorial)
4. [Media Source Types](/revolution/2.x/administering-your-site/media-sources/media-source-types)
  1. [Media Source Type - File System](/revolution/2.x/administering-your-site/media-sources/media-source-types/media-source-type-file-system)
  2. [Media Source Type - S3](/revolution/2.x/administering-your-site/media-sources/media-source-types/media-source-type-s3)