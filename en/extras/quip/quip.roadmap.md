---
title: "Roadmap"
_old_id: "969"
_old_uri: "revo/quip/quip.roadmap"
---

This is a work-in-progress roadmap for Quip.

Tasks in purple are already finished in Git. Ones in green are finished in beta/rc versions.

## Released Versions

### Quip 2.3

- Add ability to unsubscribe to thread notifications via email, even for non-logged-in users
- Add ability to manage subscriptions to a thread in backend

### Quip 2.2

- MODX Revo 2.2 support and optimization, this version and later only works on Revo 2.2+
- Add search to Quip threads grid

### Quip 2.1

- Add &redirectTo and &redirectToUrl parameters to QuipReply for custom redirection after posting
- Refactor Quip to be OOP, implement 'controller' classes, request handler
- Add unit tests
- Add generated API docs to build

### Quip 2.0

- Abstract resolver SQL
- Add sanity check for contexts without load permission
- Add unsubscribe option for logged-in users who have subscribed to a thread
- Add extraAutoLinksAttributes property for specifying attributes to add to auto-converted links
- Add rel-nofollow to any links parsed in comments
- Add sqlsrv support for Revolution 2.1+ installs
- Add fix for threads that have complex names
- Add pre and post Hooks to Quip
- Add field-specific error messages, ensure validation of those fields happens on first submit
- Enable one-click post options bypassing preview, and added requirePreview property to force preview if wanted

### Quip 1.2

- Add QuipRss snippet to wrap quip snippet for easy RSS feed support
- Improve manager UI to be able to act on multiple comments/threads at one time
- Add ability to completely remove threads

### Quip 1.1

- Added ability to filter by user and thread simultaneously in QuipCount
- Added theme ability to reCaptcha
- Added "family" option to QuipLatestComments
- Added QuipResourceCleaner plugin, which removes threads when their Resource has been removed

### Quip 1.0

- Pagination support
- Direct moderation link from moderate notification emails
- Logged-in manager users should not have moderated posts
- Add option to disable captcha for logged-in users
- Native ol/li support in comment markup
- Add placeholders and default chunks for RSS feed support
- Add searchability to comments grid in mgr ui
- i18n of snippet properties

### Quip 0.5.1

- Auto-fix URLs without http:// prefix
- Added Russian translation

### Quip 0.5

- Comment Moderation 
  - Access Policy based
  - Notification email to moderators
  - Usergroup-based moderatorship
  - Single parameter-passed moderator usernames
  - Allow 1st-time-only moderation to comments
  - Allow users to see their unapproved comments
  - Allow notification to users when their comments are approved
- Batch actions on Comments (incl. approve/reject)
- Auto-close thread on X date or X days after current resource's publishedon date
- Auto-convert URL links to html href tags.
- Don't actually delete comments; just set deleted flag
- Gravatar support
- Fixed bug with IP not registering to posters

### Quip 0.4

- Toggleable threaded comments 
  - Restrict threading to X levels deep
- Separate snippet into separate QuipReply and Quip snippets
- Add latest comments snippet
- Add email notifications
- Add reCaptcha support
- Add anchor tag to comments

### Quip 0.3

- Allow multiple Quip instances
- Add StopForumSpam spam filtering
- Add QuipCount snippet to show number of comments in thread or by user
- Allow toggleable option for requiring login to comment
- Pre-fill logged-in users' info to reply form

### Quip 0.2

- Backend mgr UI for managing threads
- Strip non-allowed tags
- Add front-end, templatable posting interface
- Initial public release