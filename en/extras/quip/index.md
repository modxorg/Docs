---
title: "Quip"
_old_id: "696"
_old_uri: "revo/quip"
---

## What is Quip?

Quip is a simple commenting [Snippet](developing-in-modx/basic-development/snippets "Snippets") for MODX Revolution. It allows you to quickly and easily put up comments on your website, including threaded support, moderation, url to link conversion, automatic thread closing, and more. It also allows for full comment management via the backend system in the Revolution manager.

### Requirements

-   MODX Revolution 2.0.0-RC-2 or later
-   PHP5 or later

### History

Quip was written by [Shaun McCormick](https://github.com/splittingred) as a simple commenting component, and first released on May 7th, 2009.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <http://modx.com/extras/package/quip>

API Documentation for Quip can also be found here: <http://api.modx.com/quip/>

## Usage

Quip has 2 modes, threaded and non-threaded comments.

### Non-threaded Comments

The Quip snippet can be called like so in the page you want comments to display:

```php
[[!Quip? &thread=`threadNameHere` &threading=`0`]]
<br />
[[!QuipReply? &thread=`threadNameHere`]]
```

### Threaded Comments

If you have threading turned on, you'll need to first do a couple things. One is to add a "Reply to Thread" page with these snippet calls:

```php
<h2>Reply to Thread</h2>
[[!Quip]]
<br />
[[!QuipReply]]
```

You wont need to set any properties on this call, since it will pull from your original QuipReply call on your main thread page.

And then you'll need to add the 'replyResourceId' property to your original Quip snippet call in your page where the comments will load (such as a blog post), so it will look like this with a Resource of ID 123:

```php
[[!Quip? &thread=`threadNameHere` &replyResourceId=`123`]]
<br />
[[!QuipReply? &thread=`threadNameHere`]]
```

Also, Quip provides users with an assistance snippet called [QuipCount](extras/quip/quip.quipcount "Quip.QuipCount"), which can be used to find thread comment totals or user comment totals.

## Quip Snippets

Quip comes with 4 separate snippets:

-   [Quip](extras/quip/quip "Quip.Quip") - Displays comments for a thread.
-   [QuipReply](extras/quip/quip.quipreply "Quip.QuipReply") - Displays the reply form for a thread.
-   [QuipCount](extras/quip/quip.quipcount "Quip.QuipCount") - Returns the number of comments on a thread.
-   [QuipLatestComments](extras/quip/quip.quiplatestcomments "Quip.QuipLatestComments") - Displays a list of the latest comments for all threads, a user, or specific thread.

### System Settings

Quip comes pre-packaged with some site-wide settings as well.

| Name               | Description                                                                                                                        |
| ------------------ | ---------------------------------------------------------------------------------------------------------------------------------- |
| quip.emailsFrom    | The email address to send system and moderation emails from.                                                                       |
| quip.emailsTo      | The email address to send system and moderation emails to.                                                                         |
| quip.emailsReplyTo | The email address to set the reply-to to. Defaults to emailFrom.                                                                   |
| quip.allowedTags   | The tags allowed by users in comment posting. See [php.net/strip_tags](http://php.net/strip_tags) for a list of acceptable values. |

Also, there are 3 settings for reCaptcha support, in the recaptcha namespace:

| Name                  | Description                                       |
| --------------------- | ------------------------------------------------- |
| recaptcha.public_key  | Your public key for reCaptcha.                    |
| recaptcha.private_key | Your private key for reCaptcha.                   |
| recaptcha.use_ssl     | If true, will use SSL for reCaptcha connectivity. |

## Examples

A sample code line for a blog post that's on a Resource with no threading:

```php
[[Quip? &thread=`blogpost[[*id]]` &threading=`0`]]
```

Display comments for thread `post45`, but only allow logged-in users to comment, and have the "Reply to Thread" resource be ID 123:

```php
[[!Quip? &thread=`post45` &replyResourceId=`123`]]
<br />
[[!QuipReply? &thread=`post45` &requireAuth=`1`]]
```

Display comments for thread `spamproof123`, with no threading, with reCaptcha support.

```php
[[!Quip? &thread=`spamproof123` &threaded=`0`]]
<br />
[[!QuipReply? &thread=`spamproof123` &recaptcha=`1`]]
```

## See Also

1. [Quip.Quip](extras/quip/quip)
    1. [Quip.Quip.tplComment](extras/quip/quip/tplcomment)
    2. [Quip.Quip.tplCommentOptions](extras/quip/quip/tplcommentoptions)
    3. [Quip.Quip.tplComments](extras/quip/quip/tplcomments)
    4. [Quip.Quip.tplReport](extras/quip/quip/tplreport)
2. [Quip.QuipCount](extras/quip/quip.quipcount)
3. [Quip.QuipLatestComments](extras/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](extras/quip/quip.quipreply)
    1. [Quip.QuipReply.tplAddComment](extras/quip/quip.quipreply/quipreply.tpladdcomment)
    2. [Quip.QuipReply.tplLoginToComment](extras/quip/quip.quipreply/quipreply.tpllogintocomment)
    3. [Quip.QuipReply.tplPreview](extras/quip/quip.quipreply/quipreply.tplpreview)
5. [Quip.QuipRss](extras/quip/quip.quiprss)
6. [Quip.Roadmap](extras/quip/quip.roadmap)
7. [Quip.Upgrading](extras/quip/quip.upgrading)
    1. [Quip.Upgrading to 1.0.1](extras/quip/quip.upgrading/upgrading-to-1.0.1)
