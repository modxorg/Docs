---
title: "Extras Directories"
_old_id: "110"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/extras-directories"
---

Extras are most commonly stored in 2 directories when they are installed:

- **core/components/** - This is the location for all the PHP and non-web-accessible files for the Extra.
- **assets/components/** - This is the location for the web-accessible files for the Extra, such as CSS, JS and images.

Why the separation? Well, since MODX users can move the core outside the webroot, separating out the non-accessible files into core/components allows MODX developers to add an extra level of security to their Extras.

## See Also

1. [Developer Introduction](developing-in-modx/overview-of-modx-development/developer-introduction)
2. [Getting Started Developing](extending-modx/getting-started)
3. [Extras Directories](developing-in-modx/overview-of-modx-development/extras-directories)
4. [Setting up a Development Environment](developing-in-modx/overview-of-modx-development/setting-up-a-development-environment)