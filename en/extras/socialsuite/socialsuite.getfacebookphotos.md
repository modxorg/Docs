---
title: "getFacebookPhotos"
_old_id: "1005"
_old_uri: "revo/socialsuite/socialsuite.getfacebookphotos"
---

The getFacebookPhotos snippet can be used to generate listings of albums and photos on a facebook profile (user or page). In the current version, it only works for **public** data. All data is extensively cached to save performance - if you need more to-the-minute accurate stuff you can play with the cache properties.

As getFacebookPhotos uses its own caching mechanisms, you can call getFacebookPhotos **uncached**.

## Available Properties

This list of properties is current as of version 1.0.0. Required properties are in **bold**.

| Property                    | Accepted Values                      | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                     | Default Value                    |
| --------------------------- | ------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------- |
| **user**                    | ID or name                           | The name or ID of the user or page you want to retrieve photos from. For example "modxcms" for the [MODX facebook page](https://www.facebook.com/modxcms).                                                                                                                                                                                                                                                                                                                      |                                  |
| albums                      | comma separated list of IDs or names | If you want to show only a selection of albums, you can fill in either the name or the IDs of the albums here as a comma separated list. As it's possible to change the name of an album, you'll want to use the ID if you can.                                                                                                                                                                                                                                                 |                                  |
| perAlbum                    | 1 or 0                               | Group images per album. This enables use of the **albumTpl** property, which is used as wrapper for each album.                                                                                                                                                                                                                                                                                                                                                                 | 1 (true)                         |
|                             |                                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |                                  |
|                             |                                      | **Templates & Output**                                                                                                                                                                                                                                                                                                                                                                                                                                                          |                                  |
| albumTpl                    | name of a chunk                      | The chunk to use as wrapper for the collection of images from a specific album. Is only used when **perAlbum** is enabled.                                                                                                                                                                                                                                                                                                                                                      | See Templating - albumTpl below. |
| albumSeparator              | anything                             | String to use as glue between albums.                                                                                                                                                                                                                                                                                                                                                                                                                                           | `<br />`                         |
| outerTpl                    | name of a chunk                      | The chunk to use as wrapper for the entire result including albums and their images.                                                                                                                                                                                                                                                                                                                                                                                            | See Templating - outerTpl below. |
| photoTpl                    | name of a chunk                      | The chunk to use for individual images.                                                                                                                                                                                                                                                                                                                                                                                                                                         | See Templating - photoTpl below. |
| photoSeparator              | anything                             | String to use as glue between images.                                                                                                                                                                                                                                                                                                                                                                                                                                           | \\n (linebreak)                  |
|                             |                                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |                                  |
|                             |                                      | **Pagination**                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |                                  |
| offset                      | number                               | Where to start in the result set for getPage pagination or if you want to skip some of the first items.                                                                                                                                                                                                                                                                                                                                                                         | 0                                |
| limit                       | number                               | Amount of items per page for getPage pagination or to show in total when not paginating.                                                                                                                                                                                                                                                                                                                                                                                        | 20                               |
|                             |                                      |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |                                  |
|                             |                                      | **Caching**                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |                                  |
| cacheOutput                 | 1 or 0                               | When enabled, the output (including chunk contents) will be cached for even better performance. Note that in this case you will need to specifically set a different option on the snippet, empty the core/cache/socialsuite/\_processed/facebook/photos/ directory manually or wait for the image or album cache to expire before seeing changes to tpl chunks. Disabled by default.                                                                                           | 0 (false)                        |
| cacheExpires                | number (seconds)                     | The time in seconds the album cache is valid for. The album cache contains a list of album names and their IDs as well as the raw data returned from facebook's Graph API. When albums are requested, all of their images are also requested in one big query instead of a number of smaller ones - this resulted in much better performance overall.                                                                                                                           | 172800 (= 2 days)                |
| cacheExpiresPhotos          | number (seconds)                     | The time in seconds the photos cache is valid for. Also see the cacheExpiresPhotosVariation, below. Photos are cached per album and the cache contains the raw data returned from Facebook's Graph API using FQL. This time can not be bigger than the time in cacheExpires, as whenever we fetch the albums, all photos for that album are also retrieved and will be refreshed. So yes, if you are paying attention: the default value here indeed doesn't make much sense :P | 345600 (= 4 days)                |
| cacheExpiresPhotosVariation | number (seconds)                     | When the cacheExpiresPhotos time is smaller than the cacheExpires time, this means the cache of images in specific albums will be refreshed before the complete album cache is refreshed. This means we may see photos added to specific albums \*before\* new albums are visible.                                                                                                                                                                                              |

As the album cache retrieves all albums and all their photos in one big optimized query, we can see a performance hit when all of a sudden just the photos cache has expired and all visible albums suddenly start making small queries to facebook. This cacheExpiresPhotosVariation properties negates that effect by spreading out the time the photos cache expires.

So if you have getFacebookPhotos configured to show three albums with a cacheExpires time of 2 days, and a cacheExpiresPhotos of 12 hours, we will see that every 12 hours there are 3 requests to facebook for the photos in those specific albums. If we wouldn't have cacheExpiresPhotosVariation, the expiry time for each album would be equal, and one poor visitor would have to wait for 3 requests to come back from Facebook (which isn't neccessarily fast with this kind of thing).
Now enter cacheExpiresPhotosVariation. If it's set to 1 hour (the default), this means that the photo cache for each album gets a cache expiry time which is within 1 hour from what is set on cacheExpiresPhotos: so in our example anything (randomly) between 11 and 13 hours. This means there's no one poor visitor waiting for 3 requests to facebook to come back, but there's 3 visitors each only taking a small hit. Win-win-win-win! | 3600 ( = 1 hour) |

## Templating

For templating your Facebook photo feed, we can use three different template chunks. There's the photoTpl which is used for each individual photo, the albumTpl for wrapping albums if perAlbum is enabled, and outerTpl which throws it all together.

This section will give you information on defaults and available placeholders for you to use.

### photoTpl

The default chunk is as follows:

``` php
<li>
    <img src="[[+src_small]]" width="[[+src_small_width]]" height="[[+src_small_height]]" />
</li>
```

These are all the placeholders to use in the photoTpl chunk. Some may not be available due to permissions.

| Placeholder        | Type        | Description                                                                                                                                                   |
| ------------------ | ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| object\_id         | int         | The object\_id of the photo.                                                                                                                                  |
| pid                | string      | The ID of the photo being queried. The pid cannot be longer than 50 characters.                                                                               |
| aid                | string      | The ID of the album containing the photo being queried. The aid cannot be longer than 50 characters.                                                          |
| owner              | string      | The user ID of the owner of the photo being queried.                                                                                                          |
| src\_small         | string      | The URL to the thumbnail version of the photo being queried. The image can have a maximum width of 75px and a maximum height of 225px. This URL may be blank. |
| src\_small\_width  | int         | Width of the thumbnail version, in px. This field may be blank.                                                                                               |
| src\_small\_height | int         | Height of the thumbnail version, in px. This field may be blank.                                                                                              |
| src\_big           | string      | The URL to the full-sized version of the photo being queried. The image can have a maximum width or height of 960px                                           |
| src\_big\_width    | int         | Width of the full-sized version, in px. This field may be blank.                                                                                              |
| src\_big\_height   | int         | Height of the full-sized version, in px. This field may be blank.                                                                                             |
| src                | string      | The URL to the album view version of the photo being queried. The image can have a maximum width or height of 130px. This URL may be blank                    |
| src\_width         | int         | Width of the album view version, in px. This field may be blank.                                                                                              |
| src\_height        | int         | Height of the album view version, in px. This field may be blank.                                                                                             |
| link               | string      | The URL to the page on facebook containing the photo being queried.                                                                                           |
| caption            | string      | The caption for the photo being queried.                                                                                                                      |
| created            | time (unix) | The date when the photo being queried was added. Format with the "date" output filter.                                                                        |
| modified           | time (unix) | The date when the photo being queried was last modified. Format with the "date" output filter.                                                                |
| position           | int         | The position of the photo in the album.                                                                                                                       |
| album\_object\_id  | int         | The object\_id of the album the photo belongs to.                                                                                                             |
| place\_id          | int         | Facebook ID of the place associated with the photo, if any.                                                                                                   |
| images             | array       | An array of objects containing width, height, source each representing the various photo sizes. Use as `[[+images.2.source]]`.                                |
| like\_info         | object      | The like information of the photo being queried. This is an object containing can\_like, like\_count, and user\_likes                                         |
| comment\_info      | object      | The comment information of the photo being queried. This is an object containing can\_comment and comment\_count                                              |
| can\_delete        | bool        | true if the viewer is able to delete the photo                                                                                                                |

### albumTpl

The default albumTpl chunk is as follows; please keep in mind you need to have perAlbum enabled in order to use this.

``` php
 <h2><a href="[[+link]]">[[+name]]</a> <span>([[+photo_count]] photos, created on [[+created:date=`%d/%m/%Y`]])</span></h2>
<div>
    <ul>
        [[+photos]]
    </ul>
</div>
```

You have access to the following placeholders; some may not be available due to permissions:

| Placeholder       | Type        | Description                                                                                                                                                                                                 |
| ----------------- | ----------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| photos            |             | The photos in this album, as parsed through the photoTpl chunk.                                                                                                                                             |
| aid               | string      | The album ID                                                                                                                                                                                                |
| object\_id        | int         | The object\_id of the album on Facebook. This is used to identify the equivalentAlbum object in the Graph API. You can also use the object\_id to let users comment on an album with the Graph API Comments |
| owner             | int         | The user ID of the owner of the album                                                                                                                                                                       |
| cover\_pid        | string      | The album cover photo ID string                                                                                                                                                                             |
| cover\_object\_id | int         | The album cover photo object\_id                                                                                                                                                                            |
| name              | string      | The title of the album                                                                                                                                                                                      |
| created           | time (unix) | The time the photo album was initially created expressed as a unix time.                                                                                                                                    |
| modified          | time (unix) | The last time the photo album was updated expressed as a unix time.                                                                                                                                         |
| description       | string      | The description of the album                                                                                                                                                                                |
| location          | string      | The location of the album                                                                                                                                                                                   |
| size              | int         |                                                                                                                                                                                                             |
| link              | string      | A link to this album on Facebook                                                                                                                                                                            |
| visible           | string      | Visible only to the album owner. Indicates who can see the album.                                                                                                                                           |
| modified\_major   | time (unix) | Indicates the time a major update (like addition of photos) was last made to the album expressed as a unix time.                                                                                            |
| edit\_link        | string      | The URL for editing the album                                                                                                                                                                               |
| type              | string      | The type of photo album, can be profile, mobile, wall or normal.                                                                                                                                            |
| can\_upload       | bool        | Determines whether a given UID can upload to the album.                                                                                                                                                     |
| photo\_count      | int         | The number of photos in this album                                                                                                                                                                          |
| video\_count      | int         | The number of videos in the album                                                                                                                                                                           |
| like\_info        | object      | The like information of the album being queried. This is an object containingcan\_like, like\_count, and user\_likes                                                                                        |
| comment\_info     | object      | The comment information of the album being queried. This is an object containing can\_comment and comment\_count                                                                                            |

### outerTpl

The default outerTpl is the following:

``` php
 <ul>
    [[+photos]]
</ul>
```

and you can only use the "photos" placeholder in this template.

## Examples

Man, so many possibilities!

### Simple Example, grouping all photos per album with default tpls

Snippet call:

``` php
[[!getFacebookPhotos?
  &user=`modxcms`
  &perAlbum=`1`
]]
```

which without any customization results in the following output:

``` php
<h2><a href="http://www.facebook.com/album.php?fbid=437577137979&id=19110642979&aid=235059">Profile Pictures</a> <span class="smalldate">(1 photos, created on 12/09/2010)</span></h2>
<div class="gfp-photos-wrapper">
    <ul>
        <li class="gfp-photo">
    <img src="http://photos-a.ak.fbcdn.net/hphotos-ak-snc6/179529_10150898281902980_465676445_t.jpg" width="75" height="75" />
</li>

    </ul>
</div>
<br />


<h2><a href="http://www.facebook.com/album.php?fbid=10150883337702980&id=19110642979&aid=434455">CMS Expo 2012</a> <span class="smalldate">(33 photos, created on 12/05/2012)</span></h2>
<div class="gfp-photos-wrapper">
    <ul>
        <li class="gfp-photo">
    <img src="http://photos-c.ak.fbcdn.net/hphotos-ak-ash3/529915_10150883341757980_1041537877_t.jpg" width="75" height="56" />
</li>

<li class="gfp-photo">
    <img src="http://photos-d.ak.fbcdn.net/hphotos-ak-ash3/537753_10150883341637980_1323647473_t.jpg" width="75" height="56" />
</li>
<!-- ... -->
<li class="gfp-photo">
    <img src="http://photos-c.ak.fbcdn.net/hphotos-ak-ash3/534903_10150883337842980_1414876671_t.jpg" width="75" height="50" />
</li>

    </ul>
</div>
<!-- ... -->
```

... which then looks like something like this:

![](http://markh.nl/s/q3/juB.png)
