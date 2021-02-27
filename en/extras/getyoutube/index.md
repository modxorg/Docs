---
title: "getYoutube"
_old_id: "1716"
_old_uri: "revo/getyoutube"
---

## What is getYoutube?

A simple video retrieval snippet for MODX Revolution.

This snippet uses the YouTube Data API (v3) to search for specified channels or videos and return the associated data.

## History

getYoutube was first written by David Pede (@davepede) and released on April 14th, 2014.

## Download

It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <https://modx.com/extras/package/getYoutube>

The source code and build script is also available on GitHub: <https://github.com/tasianmedia/getYoutube>

## Bugs & Feature Requests

Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/getYoutube/issues>

## Usage

The getYoutube snippet can be called using the tag:

``` php
[[!getYoutube]]
```

Calls must be un-cached. '&mode' property is required.

## System Settings

Google requires you to register your application so that it can submit requests to the YouTube Data API (v3). Please follow [this guide](https://developers.google.com/youtube/registering_an_application) to obtain your Google Public API Key.

| Key                 | Description                                                             |
| ------------------- | ----------------------------------------------------------------------- |
| getyoutube.api\_key | A valid Google Public API Key for either browser or server applications |

You must provide your Google Public API Key in order to use getYoutube

## Available Properties

### Selection Properties

| Name       | Description                                                                                                                         | Mode     | Default Value | Added in Version |
| ---------- | ----------------------------------------------------------------------------------------------------------------------------------- | -------- | ------------- | ---------------- |
| mode       | Select the search mode. (OPTIONS: channel, playlist or video)                                                                       | N/A      | video         | 1.0.0-pl         |
| video      | A comma-separated list of video IDs to return.                                                                                      | video    |               | 1.0.0-pl         |
| channel    | The ID of a YouTube Channel to search. All videos within the channel will be returned.                                              | channel  |               | 1.0.0-pl         |
| playlist   | The ID of a YouTube Playlist to search. All videos within the playlist will be returned.                                            | playlist |               | 1.1.0-pl         |
| sortby     | A placeholder name to sort by. (OPTIONS: date, rating, title, viewCount)                                                            | N/A      | date          | 1.0.0-pl         |
| limit      | Limits the number of Videos returned. (NOTE: Acceptable values are 0 to 50, inclusive. Please see pagination docs for more details) | N/A      | 50            | 1.0.0-pl         |
| safeSearch | Select whether the results should include restricted content as well as standard content. (OPTIONS: none, moderate, strict)         | N/A      | none          | 1.0.0-pl         |

### Templating Properties

| Name          | Description                                                                           | Mode | Default Value | Added in Version |
| ------------- | ------------------------------------------------------------------------------------- | ---- | ------------- | ---------------- |
| tpl           | Name of a chunk serving as a template. (REQUIRED)                                     | N/A  | videoTpl      | 1.0.0-pl         |
| tplAlt        | Name of a chunk serving as a template for every other Video.                          | N/A  |               | 1.0.0-pl         |
| toPlaceholder | If set, will assign the output to this placeholder instead of outputting it directly. | N/A  |               | 1.0.0-pl         |
| Name | Description | Mode | Default Value | Added in Version |
| totalVar | Define the key of a placeholder set by getYoutube indicating the total number of Videos returned. | N/A | total | 1.0.0-pl |

## Available Placeholders

### Video Placeholders

| Placeholder               | Description                                                                                     | Mode            | Added in Version |
| ------------------------- | ----------------------------------------------------------------------------------------------- | --------------- | ---------------- |
| `[[+id]]`                 | Video ID                                                                                        | N/A             | 1.0.0-pl         |
| `[[+title]]`              | Video title                                                                                     | N/A             | 1.0.0-pl         |
| `[[+description]]`        | The description for the video                                                                   | N/A             | 1.0.0-pl         |
| `[[+url]]`                | URL to the videos YouTube Page                                                                  | N/A             | 1.0.0-pl         |
| `[[+embed_url]]`          | URL to use when embedding videos                                                                | N/A             | 1.1.0-pl         |
| `[[+publish_date]]`       | The date/time the video was published ( [ISO 8601](https://www.w3.org/TR/NOTE-datetime) format) | N/A             | 1.0.0-pl         |
| `[[+thumbnail_small]]`    | URL to a small version of the thumbnail (120 x 90px)                                            | N/A             | 1.0.0-pl         |
| `[[+thumbnail_medium]]`   | URL to a medium version of the thumbnail (320 x 180px)                                          | N/A             | 1.0.0-pl         |
| `[[+thumbnail_large]]`    | URL to a large version of the thumbnail (480 x 360px)                                           | N/A             | 1.0.0-pl         |
| `[[+thumbnail_standard]]` | URL to a standard version of the thumbnail (640 x 480px)                                        | video, playlist | 1.1.1-pl         |
| `[[+thumbnail_maxres]]`   | URL to a max resolution version of the thumbnail (1280 x 720px)                                 | video, playlist | 1.1.1-pl         |
| `[[+channel_title]]`      | Channel title                                                                                   | N/A             | 1.0.0-pl         |
| `[[+playlist_id]]`        | Playlist ID                                                                                     | playlist        | 1.1.0-pl         |
| `[[+duration]]`           | Duration of the video ( [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601#Durations) format)    | video           | 1.0.0-pl         |
| `[[+viewCount]]`          | # of views                                                                                      | video           | 1.0.0-pl         |
| `[[+likeCount]]`          | # of likes                                                                                      | video           | 1.0.0-pl         |
| `[[+dislikeCount]]`       | # of dislikes                                                                                   | video           | 1.0.0-pl         |
| `[[+favoriteCount]]`      | # of favorites                                                                                  | video           | 1.0.0-pl         |
| `[[+commentCount]]`       | # of comments                                                                                   | video           | 1.0.0-pl         |
| `[[+tags]]`               | Comma separated list of tags                                                                    | video           | 1.2.0-pl         |

If you require additional video data as placeholders, please request here: <https://github.com/tasianmedia/getYoutube/issues>.

### Other Placeholders

| Placeholder     | Description                                                              | Mode | Added in Version |
| --------------- | ------------------------------------------------------------------------ | ---- | ---------------- |
| `[[+total]]`    | Returns the total number of Videos in the output                         | N/A  | 1.0.0-pl         |
| `[[+nextPage]]` | URL to the next 50 results in the output (See pagination docs below)     | N/A  | 1.0.0-pl         |
| `[[+prevPage]]` | URL to the previous 50 results in the output (See pagination docs below) | N/A  | 1.0.0-pl         |

## Examples

Output all videos from the YouTube 'Spotlight' Channel, using the 'videoTpl' chunk:

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl`]]
```

Output all videos from the YouTube 'POP Music Playlist 2017 (Songs of All Time)' Playlist, using the 'videoTpl' chunk:

``` php
[[!getYoutube? &mode=`playlist` &playlist=`PLMC9KNkIncKtPzgY-5rmhvj7fax8fdxoj` &tpl=`videoTpl`]]
```

Output only specified videos, using the 'videoTpl' chunk:

``` php
[[!getYoutube? &mode=`video` &video=`_X-jSkrqYzk,FoRRybrFR0c,yXBPbnv1H-U` &tpl=`videoTpl`]]
```

Output all videos from the YouTube 'Spotlight' Channel, using the 'videoTpl' chunk and assign the output to a placeholder:

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl` &toPlaceholder=`videos`]]
[[+videos:notempty=`[[+videos]]`]]
```

## Pagination Examples

The YouTube Data API (v3) returns results in blocks of 50. Use the built in pagination placeholders when returning more than 50 videos or when using the &limit property.

Output all videos from the YouTube 'Spotlight' Channel, using the 'videoTpl' chunk:

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl`]]
[[+prevPage:notempty=`<a href="[[+prevPage]]">prevPage</a><br>`]]
[[+nextPage:notempty=`<a href="[[+nextPage]]">nextPage</a><br>`]]
Total: [[+total]]
```

Output all videos from the YouTube 'Spotlight' Channel, 10 at a time, using the 'videoTpl' chunk:

``` php
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl` &limit=`10`]]
[[+prevPage:notempty=`<a href="[[+prevPage]]">prevPage</a><br>`]]
[[+nextPage:notempty=`<a href="[[+nextPage]]">nextPage</a><br>`]]
Total: [[+total]]
```
