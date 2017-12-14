---
title: "Quip.QuipReply"
_old_id: "964"
_old_uri: "revo/quip/quip.quipreply"
---

The QuipReply Snippet
---------------------

Displays a reply form for a given thread.

Usage
-----

Place anywhere you would like a reply form for a thread.

```
<pre class="brush: php">
[[!QuipReply? &thread=`myThread`]]

```Not specifying a thread will make the QuipReply snippet look for the 'quip\_thread' GET parameter. This is useful for threaded comments.

Available Properties
--------------------

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>requireAuth</td><td>If set to true, only logged in users will be able to comment on the thread.</td><td>0</td></tr><tr><td>closed</td><td>If set to 1, the thread will not accept new comments.</td><td>0</td></tr><tr><td>closeAfter</td><td>The number of days at which the thread will automatically close after it was created. Set to 0 to leave open indefinitely.</td><td>14</td></tr><tr><td>moderate</td><td>If set to true, all new posts to the thread will be moderated.</td><td>0</td></tr><tr><td>moderateAnonymousOnly</td><td>If set to 0, only anonymous (non-logged-in users) will be moderated.</td><td>0</td></tr><tr><td>moderateFirstPostOnly</td><td>If set to 0, only the first post of the user will be moderated. All subsequent posts will be auto-approved. This only applies to logged-in users.</td><td>1</td></tr><tr><td>moderators</td><td>A comma-separated list of moderator usernames for this thread.</td><td> </td></tr><tr><td>moderatorGroup</td><td>Any Users in this User Group will have moderator access.</td><td>Administrator</td></tr><tr><td>dontModerateManagerUsers</td><td>Never moderate users logged into the manager.</td><td>1</td></tr><tr><td>dateFormat</td><td>The format of the date to show for a comment's post date. The syntax is in PHP [strftime](http://php.net/strftime) format.</td><td>%b %d, %Y at %I:%M %p</td></tr><tr><td>notifyEmails</td><td>A comma-separated list of email addresses to send a notification email to when a new post is made on this thread.</td></tr><tr><td>recaptcha</td><td>If true, will enable reCaptcha in the add comment form.</td><td>0</td></tr><tr><td>disableRecaptchaWhenLoggedIn</td><td>Disable reCaptcha validation for logged in users.</td><td>1</td></tr><tr><td>autoConvertLinks</td><td>If true, will automatically convert URLs to links.</td><td>1</td></tr><tr><td>useGravatar</td><td>Whether or not to show Gravatar icons in comments.</td><td>1</td></tr><tr><td>gravatarIcon</td><td>The type of Gravatar icon to use for a user without a Gravatar.</td><td>identicon</td></tr><tr><td>gravatarSize</td><td>The size in pixels of the Gravatar.</td><td>50</td></tr><tr><td>postAction</td><td>The name of the submit field to initiate a comment post.</td><td>quip-post</td></tr><tr><td>previewAction</td><td>The name of the submit field to preview a comment post.</td><td>quip-preview</td></tr><tr><td>tplAddComment</td><td>The add comment form. Can either be a chunk name or value. If set to a value, will override the chunk. See [tplAddComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpladdcomment "Quip.QuipReply.tplAddComment") for the default form used. It lives on the filesystem: core/components/quip/elements/chunks/quipaddcomment.chunk.tpl</td><td> </td></tr><tr><td>tplLoginToComment</td><td>The portion to show when the user is not logged in. Can either be a chunk name or value. If set to a value, will override the chunk. The default chunk lives on the filesystem: core/components/quip/elements/chunks/quipaddcomment.chunk.tpl</td><td> </td></tr><tr><td>tplPreview</td><td>The preview view. Can either be a chunk name or value. If set to a value, will override the chunk.</td><td> </td></tr><tr><td>idPrefix</td><td>If you want to use multiple Quip instances on a page, change this ID prefix.</td><td>qcom</td></tr><tr><td>requirePreview</td><td>If set to 1, will require a user to preview their comment before posting.</td><td>0</td></tr></tbody></table>QuipReply Chunks
----------------

There are 3 chunks that are processed. Their corresponding parameters are:

- [tplAddComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpladdcomment "Quip.QuipReply.tplAddComment") - The Chunk to use for the add comment form.
- [tplLoginToComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpllogintocomment "Quip.QuipReply.tplLoginToComment") - Will display when requireAuth is set to 1 and the user is not logged in.
- [tplPreview](/extras/revo/quip/quip.quipreply/quip.quipreply.tplpreview "Quip.QuipReply.tplPreview") - The preview view for an about-to-be-posted comment.

Examples
--------

Display a reply form for the thread 'myThread', with the moderators in the User Group 'Moderators':

```
<pre class="brush: php">
[[!QuipReply? &thread=`myThread` &moderatorGroup=`Moderators`]]

```See Also
--------

1. [Quip.Quip](/extras/revo/quip/quip.quip)
  1. [Quip.Quip.tplComment](/extras/revo/quip/quip.quip/quip.quip.tplcomment)
  2. [Quip.Quip.tplCommentOptions](/extras/revo/quip/quip.quip/quip.quip.tplcommentoptions)
  3. [Quip.Quip.tplComments](/extras/revo/quip/quip.quip/quip.quip.tplcomments)
  4. [Quip.Quip.tplReport](/extras/revo/quip/quip.quip/quip.quip.tplreport)
2. [Quip.QuipCount](/extras/revo/quip/quip.quipcount)
3. [Quip.QuipLatestComments](/extras/revo/quip/quip.quiplatestcomments)
4. [Quip.QuipReply](/extras/revo/quip/quip.quipreply)
  1. [Quip.QuipReply.tplAddComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpladdcomment)
  2. [Quip.QuipReply.tplLoginToComment](/extras/revo/quip/quip.quipreply/quip.quipreply.tpllogintocomment)
  3. [Quip.QuipReply.tplPreview](/extras/revo/quip/quip.quipreply/quip.quipreply.tplpreview)
5. [Quip.QuipRss](/extras/revo/quip/quip.quiprss)
6. [Quip.Roadmap](/extras/revo/quip/quip.roadmap)
7. [Quip.Upgrading](/extras/revo/quip/quip.upgrading)
  1. [Quip.Upgrading to 1.0.1](/extras/revo/quip/quip.upgrading/quip.upgrading-to-1.0.1)