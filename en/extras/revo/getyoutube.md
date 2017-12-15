---
title: "getYoutube"
_old_id: "1716"
_old_uri: "revo/getyoutube"
---

<a name="getYoutube-WhatisgetYoutube?"></a>What is getYoutube?
--------------------------------------------------------------

 A simple video retrieval snippet for MODX Revolution.

 This snippet uses the YouTube Data API (v3) to search for specified channels or videos and return the associated data.

<a name="getYoutube-History"></a>History
----------------------------------------

 getYoutube was first written by David Pede (@davepede) and released on April 14th, 2014.

<a name="getYoutube-Download"></a>Download
------------------------------------------

 It can be downloaded from within the MODX Revolution manager via [Package Management](display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/getYoutube>

 The source code and build script is also available on GitHub: <https://github.com/tasianmedia/getYoutube>

<a name="getYoutube-Bugs&FeatureRequests"></a>Bugs & Feature Requests
---------------------------------------------------------------------

 Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/getYoutube/issues>

<a name="getYoutube-Usage"></a>Usage
------------------------------------

 The getYoutube snippet can be called using the tag:

 ```
<pre class="brush: php">
[[!getYoutube]]

```<div class="warning"> Calls must be un-cached. '&mode' property is required. </div><a name="getYoutube-SystemSettings"></a>System Settings
-------------------------------------------------------

 Google requires you to register your application so that it can submit requests to the YouTube Data API (v3). Please follow [this guide](https://developers.google.com/youtube/registering_an_application) to obtain your Google Public API Key.

 <table><tbody><tr><th> Key </th> <th> Description </th> </tr><tr><td> getyoutube.api\_key </td> <td> A valid Google Public API Key for either browser or server applications </td></tr></tbody></table><div class="warning"> You must provide your Google Public API Key in order to use getYoutube </div><a name="getYoutube-AvailableProperties"></a>Available Properties
-----------------------------------------------------------------

### <a name="getYoutube-SelectionProperties"></a>Selection Properties

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Mode </th> <th> Default Value </th> <th> Added in Version </th> </tr><tr><td> mode </td> <td> Select the search mode. (OPTIONS: channel, playlist or video) </td> <td> N/A </td> <td> video </td> <td> 1.0.0-pl </td> </tr><tr><td> video </td> <td> A comma-separated list of video IDs to return. </td> <td> video </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> channel </td> <td> The ID of a YouTube Channel to search. All videos within the channel will be returned. </td> <td> channel </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> playlist </td> <td> The ID of a YouTube Playlist to search. All videos within the playlist will be returned.   
</td> <td> playlist </td> <td> </td> <td> 1.1.0-pl </td> </tr><tr><td> sortby </td> <td> A placeholder name to sort by. (OPTIONS: date, rating, title, viewCount) </td> <td> N/A   
</td> <td> date </td> <td> 1.0.0-pl </td> </tr><tr><td> limit </td> <td> Limits the number of Videos returned. (NOTE: Acceptable values are 0 to 50, inclusive. Please see pagination docs for more details) </td> <td> N/A </td> <td> 50 </td> <td> 1.0.0-pl </td> </tr><tr><td> safeSearch </td> <td> Select whether the results should include restricted content as well as standard content. (OPTIONS: none, moderate, strict) </td> <td> N/A </td> <td> none </td> <td> 1.0.0-pl </td></tr></tbody></table>### <a name="getYoutube-TemplatingProperties"></a>Templating Properties

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Mode </th> <th> Default Value </th> <th> Added in Version </th> </tr><tr><td> tpl </td> <td> Name of a chunk serving as a template. (REQUIRED) </td> <td> N/A </td> <td> videoTpl </td> <td> 1.0.0-pl </td> </tr><tr><td> tplAlt </td> <td> Name of a chunk serving as a template for every other Video. </td> <td> N/A </td> <td> </td> <td> 1.0.0-pl </td> </tr><tr><td> toPlaceholder </td> <td> If set, will assign the output to this placeholder instead of outputting it directly. </td> <td> N/A </td> <td> </td> <td> 1.0.0-pl </td></tr></tbody></table>### <a name="getYoutube-OtherProperties"></a>Other Properties

 <table><tbody><tr></tr><tr><th> Name </th> <th> Description </th> <th> Mode </th> <th> Default Value </th> <th> Added in Version </th> </tr><tr><td> totalVar </td> <td> Define the key of a placeholder set by getYoutube indicating the total number of Videos returned. </td> <td> N/A </td> <td> total </td> <td> 1.0.0-pl </td></tr></tbody></table><a name="getYoutube-AvailablePlaceholders"></a>Available Placeholders
---------------------------------------------------------------------

### <a name="getYoutube-VideoPlaceholders"></a>Video Placeholders

 <table><tbody><tr><th> Placeholder </th> <th> Description </th> <th> Mode </th> <th> Added in Version </th> </tr><tr><td> \[\[+id\]\] </td> <td> Video ID </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+title\]\] </td> <td> Video title </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+description\]\] </td> <td> The description for the video </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+url\]\] </td> <td> URL to the videos YouTube Page </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+embed\_url\]\] </td> <td> URL to use when embedding videos   
</td> <td> N/A </td> <td> 1.1.0-pl </td> </tr><tr><td> \[\[+publish\_date\]\] </td> <td> The date/time the video was published ( [ISO 8601](https://www.w3.org/TR/NOTE-datetime) format) </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+thumbnail\_small\]\] </td> <td> URL to a small version of the thumbnail (120 x 90px) </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+thumbnail\_medium\]\] </td> <td> URL to a medium version of the thumbnail (320 x 180px) </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+thumbnail\_large\]\] </td> <td> URL to a large version of the thumbnail (480 x 360px) </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+thumbnail\_standard\]\] </td> <td> URL to a standard version of the thumbnail (640 x 480px) </td> <td> video, playlist </td> <td> 1.1.1-pl </td> </tr><tr><td> \[\[+thumbnail\_maxres\]\] </td> <td> URL to a max resolution version of the thumbnail (1280 x 720px) </td> <td> video, playlist </td> <td> 1.1.1-pl </td> </tr><tr><td> \[\[+channel\_title\]\] </td> <td> Channel title </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+playlist\_id\]\] </td> <td> Playlist ID   
</td> <td> playlist </td> <td> 1.1.0-pl </td> </tr><tr><td> \[\[+duration\]\] </td> <td> Duration of the video ( [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601#Durations) format) </td> <td> video </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+viewCount\]\] </td> <td> # of views </td> <td> video </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+likeCount\]\] </td> <td> # of likes </td> <td> video </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+dislikeCount\]\] </td> <td> # of dislikes </td> <td> video </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+favoriteCount\]\] </td> <td> # of favorites </td> <td> video </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+commentCount\]\] </td> <td> # of comments </td> <td> video </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+tags\]\] </td> <td> Comma separated list of tags </td> <td> video </td> <td> 1.2.0-pl </td></tr></tbody></table><div class="info"> If you require additional video data as placeholders, please request here: <https://github.com/tasianmedia/getYoutube/issues>. </div>### <a name="getYoutube-OtherPlaceholders"></a>Other Placeholders

 <table><tbody><tr><th> Placeholder </th> <th> Description </th> <th> Mode </th> <th> Added in Version </th> </tr><tr><td> \[\[+total\]\] </td> <td> Returns the total number of Videos in the output </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+nextPage\]\] </td> <td> URL to the next 50 results in the output (See pagination docs below) </td> <td> N/A </td> <td> 1.0.0-pl </td> </tr><tr><td> \[\[+prevPage\]\] </td> <td> URL to the previous 50 results in the output (See pagination docs below) </td> <td> N/A </td> <td> 1.0.0-pl </td></tr></tbody></table><a name="getYoutube-Examples"></a>Examples
------------------------------------------

 Output all videos from the YouTube 'Spotlight' Channel, using the 'videoTpl' chunk:

 ```
<pre class="brush: php">
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl`]]

``` Output all videos from the YouTube 'POP Music Playlist 2017 (Songs of All Time)' Playlist, using the 'videoTpl' chunk:

 ```
<pre class="brush: php">
[[!getYoutube? &mode=`playlist` &playlist=`PLMC9KNkIncKtPzgY-5rmhvj7fax8fdxoj` &tpl=`videoTpl`]]

``` Output only specified videos, using the 'videoTpl' chunk:

 ```
<pre class="brush: php">
[[!getYoutube? &mode=`video` &video=`_X-jSkrqYzk,FoRRybrFR0c,yXBPbnv1H-U` &tpl=`videoTpl`]]

``` Output all videos from the YouTube 'Spotlight' Channel, using the 'videoTpl' chunk and assign the output to a placeholder:

 ```
<pre class="brush: php">
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl` &toPlaceholder=`videos`]]
[[+videos:notempty=`[[+videos]]`]]

```<a name="getYoutube-PaginationExamples"></a>Pagination Examples
---------------------------------------------------------------

 The YouTube Data API (v3) returns results in blocks of 50. Use the built in pagination placeholders when returning more than 50 videos or when using the &limit property.

 Output all videos from the YouTube 'Spotlight' Channel, using the 'videoTpl' chunk:

 ```
<pre class="brush: php">
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl`]]
[[+prevPage:notempty=`<a href="[[+prevPage]]">prevPage</a><br>`]]
[[+nextPage:notempty=`<a href="[[+nextPage]]">nextPage</a><br>`]]
Total: [[+total]]

``` Output all videos from the YouTube 'Spotlight' Channel, 10 at a time, using the 'videoTpl' chunk:

 ```
<pre class="brush: php">
[[!getYoutube? &mode=`channel` &channel=`UCBR8-60-B28hp2BmDPdntcQ` &tpl=`videoTpl` &limit=`10`]]
[[+prevPage:notempty=`<a href="[[+prevPage]]">prevPage</a><br>`]]
[[+nextPage:notempty=`<a href="[[+nextPage]]">nextPage</a><br>`]]
Total: [[+total]]

```