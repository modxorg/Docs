---
title: "What's New in 2.3"
_old_id: "1723"
_old_uri: "2.x/getting-started/an-overview-of-modx/whats-new-in-2.3"
---

_This document is a work in progress. Any help is greatly appreciated to elaborate on each of the items below!_

MODX 2.3 has been in development for a while and includes many great improvements and new features. The list below is not exhaustive (yet?), but highlights the most important changes.

- No more modAction (except for backwards compatibility), instead URL-based routing.
- Namespaces get more powerful (IIRC custom TV input types no longer need a plugin but can be read from specific directories)
- Big reduction in number of connectors that need to be installed
- New interface design
- New REST Server classes for developing REST APIs for xPDOObject's easily. Example <https://gist.github.com/splittingred/2346752>
- (Package Dependency management; need to confirm this made it in)
- Manager themes now use Grunt and Sass, which allows for quick major restyles in custom themes.
- Settings can now be applied on the User Group level
- Contexts can now be renamed
- Possible to disable CSS/JS compression during setup for those pesky servers
- Added "Other" gender for user profiles, to go with the times.
- Added dedicated Media Manager page in the manager
- Make it possible to preview resources even when front-end sessions are disabled
- Add system settings (welcome\_action/welcome\_namespace) to change the default action after login/when no ?a var is passed.
- Allow editing a resource in a new window by using shift or middle mouse button click on the resource tree
- toPlaceholder output filter no longer returns its value anymore