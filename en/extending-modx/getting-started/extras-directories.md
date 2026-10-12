---
title: "Extras Directories"
_old_id: "110"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/extras-directories"
description: "Where extras install their files: core/components and assets/components"
---

An installed Extra keeps its files in two directories:

- **core/components/** — PHP and any other files that must not be web-accessible.
- **assets/components/** — web-accessible files: CSS, JS, images.

The split exists because MODX can be installed with the core outside the webroot; keeping PHP in `core/components/` keeps it unreachable from the web.

## See Also

1. [Developer Introduction](extending-modx/getting-started/developer-introduction)
2. [Getting Started Developing](extending-modx/getting-started)
3. [Setting up a Development Environment](extending-modx/development-environment)