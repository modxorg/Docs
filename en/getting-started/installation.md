---
title: "Installation"
sortorder: "3"
_old_id: "165"
_old_uri: "2.x/getting-started/installation"
---

This section is for **new installations**. To upgrade an existing MODX site, see [Upgrading MODX](getting-started/maintenance/upgrading).

Before you start, confirm the host meets the [Server Requirements](getting-started/server-requirements) (PHP **8.1+** for current 3.x releases).

## Choose how to install

| Method | Who it is for | Guide |
| ------ | ------------- | ----- |
| Traditional zip | Most users; simplest path | [Basic Installation](getting-started/installation/standard) |
| Advanced zip | Renaming `manager/` and/or `connectors/` during setup | [Advanced Installation](getting-started/installation/advanced) |
| Git | Contributors and bleeding-edge installs | [Git Installation](getting-started/installation/git) |
| Composer | Developers who prefer `create-project` | [Installation with Composer](getting-started/installation/composer) |
| CLI | Scripted / unattended setup | [Command Line Installation](getting-started/installation/cli) |

Download packages from [modx.com/download](https://modx.com/download/).

### Traditional vs Advanced

- **Traditional** - Full package, ready to extract and run setup. Use this unless you have a specific reason not to.
- **Advanced** - Smaller download; setup builds/unpacks the core package and lets you set custom `manager/` and `connectors/` locations. The **core directory cannot be moved or renamed in MODX 3**. SSH (or equivalent) and writable parent directories are needed if you rename manager/connectors.

## Special situations

- [Installing alongside an existing site](getting-started/installation/existing-site) (subdirectory, old HTML/CMS, temporary URL)
- [Troubleshooting Installation](getting-started/installation/troubleshooting)
- After a successful install: [Successful installation, now what?](getting-started/getting-started)
