---
title: "Core roadmap"
description: "Where to follow MODX Revolution plans and progress for 3.x (and beyond)."
sortorder: 11
_old_id: "267"
_old_uri: "2.x/getting-started/an-overview-of-modx/roadmap"
---

This page points to live sources for MODX Revolution plans. It is not a fixed feature contract. Milestones and issue assignments change as work lands.

The older docs roadmap (2.5 / planned 2.6 / "3.0 Next") was removed during the docs migration. Restoring a long static feature list here would go stale again.

## Where to look

| Source | What you get |
| --- | --- |
| [GitHub milestones](https://github.com/modxcms/revolution/milestones) | Issues and PRs grouped by target release (for example open milestones such as `v3.3.0` and `v4.0.0`) |
| [Changelog on the `3.x` branch](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt) | Merged fixes and notes for the next and recent releases |
| [Releases](https://github.com/modxcms/revolution/releases) and the [MODX blog](https://modx.com/blog/) | What already shipped |
| [Issues](https://github.com/modxcms/revolution/issues) / [Pull requests](https://github.com/modxcms/revolution/pulls) | Active discussion and review |
| [Contributor's guide](contribute/code/contributors-guide) | Which git branch to target (`3.x`, patch branches, major next) |
| [Community forum](https://community.modx.com/) | Product discussion (for example threads about release cycle and priorities) |

Compatible Extras for site upgrades: [SiteDash extras list](https://sitedash.app/extras).

## Current line (3.x)

Development for MODX 3 happens on the [`3.x`](https://github.com/modxcms/revolution/tree/3.x) branch. Patch and minor releases are cut from that line (and from short-lived patch branches when they exist). See [Branches](contribute/code/contributors-guide#branches) in the contributor's guide.

For breaking changes already in 3.0 and later notes (class aliases, processors, xPDO, `modAction`), start at [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0).

Documented heads-up for package authors: deprecated global class aliases are expected to stop loading automatically in **3.3**. Details: [Changed class names](getting-started/upgrading-to-3.0/class-names).

## How to use this

1. Open the [milestones](https://github.com/modxcms/revolution/milestones) for the release you care about.
2. Skim the top of [`changelog.txt` on `3.x`](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt) for what is already merged.
3. Treat unmerged issues and empty milestones as intent, not a ship date.

If you maintain Extras or custom code, watch deprecation notices on a current 3.x site and the upgrade docs above before the next minor that removes aliases or APIs.
