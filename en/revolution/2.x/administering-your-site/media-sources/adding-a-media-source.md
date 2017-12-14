---
title: "Adding a Media Source"
_old_id: "343"
_old_uri: "2.x/administering-your-site/media-sources/adding-a-media-source"
---

<div>- [Creating the Media Source](#AddingaMediaSource-CreatingtheMediaSource)
- [Editing your new Media Source](#AddingaMediaSource-EditingyournewMediaSource)
- [Using Your Source](#AddingaMediaSource-UsingYourSource)

</div>This article describes how to add a [Media Source](/revolution/2.x/administering-your-site/media-sources "Media Sources") to your MODX installation.

Creating the Media Source
-------------------------

First find your way to the Media Sources page, often located under "Tools". From here, you will see a grid of your currently available media sources:

![](/download/attachments/35586535/20110907-8gp9xhgh2dphmhbnwsihtxaeya.jpeg?version=1&modificationDate=1315427096000)

Before we proceed, it is important to note the difference between a "Media Source" and a "Media Source Type" - a source type is a classification of a Source, such as a S3 Source Type, or a Filesystem Source Type. These types point the Source to different media storage systems.

For now, go ahead and create a Media Source by clicking on the "Create New Media Source" button above the grid. This should pop up a window with a basic form for the source:

![](/download/attachments/35586535/20110907-bmtk5qd8b27w8rfhyn4xftw2wj.jpeg?version=1&modificationDate=1315427096000)

Go ahead and choose the Filesystem source type for now, and give it a nice name. For information on creating an S3 Media Source, [click here](/revolution/2.x/administering-your-site/media-sources/media-source-types/media-source-type-s3 "Media Source Type - S3"). Once that's done, you'll see your Media Source in the grid. Right-click on it, and click "Update Media Source".

Editing your new Media Source
-----------------------------

This screen will show your new media source's basic information, a grid with type-specific properties for the source that you can change, and an "Access Permissions" tab that will let you restrict access to the source.

For now, go ahead and set the 'basePath' property to "assets/", and then the 'baseUrl' property to "assets/" as well. Save the source.

<div class="note">**Right-Click Only**  
All properties are available only after you have created the Media Source and then right-click it to edit it.</div>The other available properties include the following:

- basePath
- basePathRelative (yes|no)
- baseUrl
- baseUrlRelative (yes|no)
- allowedFileTypes
- imageExtensions
- thumbnailType
- thumbnailQuality
- skipFiles

Using Your Source
-----------------

After you've created it, you should be able to see the source in the dropdown in the left-hand tree under the Files tab. If you select that source, you should now only be able to see the contents of the 'assets/' directory in your MODX installation! (If you have not yet created an assets/ directory in your install, do so now.)

Furthermore, you can attach this Source to a TV. Read the [Assigning Media Sources to TVs](/revolution/2.x/administering-your-site/media-sources/assigning-media-sources-to-tvs "Assigning Media Sources to TVs") article to learn how.