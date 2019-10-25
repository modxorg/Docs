---
title: "getVimeo"
_old_id: "1362"
_old_uri: "revo/getvimeo"
---

## What is getVimeo?

A simple video retrieval snippet for MODX Revolution.

This snippet uses the Vimeo Simple API to search a specified channel and return requested videos and associated data.

## History

getVimeo was first written by David Pede (davidpede) and released on June 12th, 2013.

## Download

It can be downloaded from within the MODX Revolution manager via [Package Management](/display/revolution20/Installing+a+Package), or from the MODX Extras Repository, here: <http://modx.com/extras/package/getvimeo>

The source code and build script is also availiable on GitHub: <https://github.com/tasianmedia/getVimeo>

## Bugs & Feature Requests

Bugs, issues and feature requests can be reported in the GitHub Repository, found here: <https://github.com/tasianmedia/getVimeo/issues>

## Usage

The getVimeo snippet can be called using the tag:

``` php
[[getVimeo]]
```

Calls without the &channel, &id and &tpl properties specified will output nothing.

### Available Properties

### Selection Properties

| Name    | Description                                                                                                           | Default Value | Added in Version |
| ------- | --------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| channel | The URL Name or Numeric ID of the target Vimeo Channel. (REQUIRED)                                                    |               | 1.0.0-pl         |
| id      | A comma-separated list of Numeric Video IDs to output from target Channel. Use `all` to output all Videos. (REQUIRED) |               | 1.0.0-pl         |
| sortby  | A placeholder name to sort by. (NOTE: Please see placeholder docs for more details)                                   | upload\_date  | 1.0.0-pl         |
| sortdir | Order which to sort by. (OPTIONS: DESC or ASC)                                                                        | DESC          | 1.0.0-pl         |
| limit   | Limits the number of Videos returned. Use `0` for unlimited results.                                                  | 0             | 1.1.0-pl         |
| offset  | An offset of Videos to skip.                                                                                          | 0             | 1.1.0-pl         |

### Templating Properties

| Name          | Description                                                                                                                                                            | Default Value | Added in Version |
| ------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- | ---------------- |
| tpl           | Name of a chunk serving as a template. (REQUIRED)                                                                                                                      |               | 1.0.0-pl         |
| tplAlt        | Name of a chunk serving as a template for every other Video.                                                                                                           |               | 1.0.0-pl         |
| tplWrapper    | Name of a chunk serving as a wrapper template for the output. (NOTE: Does not work with &toPlaceholder. The placeholder where the items are inserted is `[[+output]]`) |               | 1.0.0-pl         |
| toPlaceholder | If set, will assign the output to this placeholder instead of outputting it directly. (NOTE: Does not work with &tplWrapper)                                           |               | 1.0.0-pl         |
| totalVar      | Define the key of a placeholder set by getVimeo indicating the total number of Videos that would be returned, NOT considering the LIMIT value.                         | total         | 1.1.0-pl         |

### Available Placeholders

The placeholders available to your getVimeo template Chunks are mostly dependent on the Vimeo Simple API.

#### Video Placeholders

| Placeholder                     | Description                              | Added in Version |
| ------------------------------- | ---------------------------------------- | ---------------- |
| `[[+title]]`                    | Video title                              |                  |
| `[[+url]]`                      | URL to the Video Page                    |                  |
| `[[+id]]`                       | Video ID                                 |                  |
| `[[+description]]`              | The description of the video             |                  |
| `[[+thumbnail_small]]`          | URL to a small version of the thumbnail  |                  |
| `[[+thumbnail_medium]]`         | URL to a medium version of the thumbnail |                  |
| `[[+thumbnail_large]]`          | URL to a large version of the thumbnail  |                  |
| `[[+user_name]]`                | The user name of the video’s uploader    |                  |
| `[[+user_url]]`                 | The URL to the user profile              |                  |
| `[[+upload_date]]`              | The date/time the video was uploaded on  |                  |
| `[[+user_portrait_small]]`      | Small user portrait (30px)               |                  |
| `[[+user_portrait_medium]]`     | Medium user portrait (100px)             |                  |
| `[[+user_portrait_large]]`      | Large user portrait (300px)              |                  |
| `[[+stats_number_of_likes]]`    | # of likes                               |                  |
| `[[+stats_number_of_views]]`    | # of views                               |                  |
| `[[+stats_number_of_comments]]` | # of comments                            |                  |
| `[[+duration]]`                 | Duration of the video in seconds         |                  |
| `[[+width]]`                    | Standard definition width of the video   |                  |
| `[[+height]]`                   | Standard definition height of the video  |                  |
| `[[+tags]]`                     | Comma separated list of tags             |                  |

Please see: <http://developer.vimeo.com/apis/simple#video-response> for an up to date list of video response data provided by the API.

#### Other Placeholders

| Placeholder  | Description                                                                                               | Added in Version |
| ------------ | --------------------------------------------------------------------------------------------------------- | ---------------- |
| `[[+total]]` | Returns the total number of Videos in the output.                                                         | 1.0.1-pl         |
| `[[+idx]]`   | Returns each Videos numerical position within the output. Increases with each iteration, starting with 1. | 1.1.0-pl         |

## Examples

Output a list of ALL videos from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk:

``` php
[[!getVimeo? &channel=`staffpicks` &id=`all` &tpl=`vimeoTpl`]]
```

Output only the videos specified from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk:

``` php
[[!getVimeo? &channel=`staffpicks` &id=`68688561,69239313,68146128` &tpl=`vimeoTpl`]]
```

Output a list of ALL videos from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk and assign the output to a placeholder:

``` php
[[!getVimeo? &channel=`staffpicks` &id=`all` &tpl=`vimeoTpl` &toPlaceholder=`videos`]]
[[+videos:notempty=`[[+videos]]`]]
```

You CANNOT pass a placeholder name (&toPlaceholder) to a wrapper chunk (&tplWrapper).

## Using getPage for Pagination

When combined with [getPage](extras/getpage "getPage"), getVimeo allows you to do powerful and flexible pagination on your pages.

Output a list of ALL videos from the Vimeo 'Staff Picks' Channel, using the 'vimeoTpl' chunk:

``` php
[[!getPage?
    &element=`getVimeo`
    &channel=`staffpicks`
    &id=`all`
    &tpl=`vimeoTpl`
    &limit=`5`
]]

<div class="paging">
    <ul class="pageList">
        [[!+page.nav]]
    </ul>
</div>
```
