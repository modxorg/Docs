---
title: "Development Environments"
_old_id: "1129"
_old_uri: "contribute/becoming-a-contributor/development-environments"
sortorder: 1
description: "Local setup for contributing bug fixes and features to MODX Revolution core"
---

When you develop bug fixes or features for **MODX Revolution core**, use a local clone of your fork. For building Extras against a normal site install, see [Setting up a Development Environment](extending-modx/development-environment) instead.

You need a working local web server. This page does not cover MAMP, XAMPP, Docker, or native stacks. Match [Server Requirements](getting-started/server-requirements) for the branch you target (3.x needs PHP 8.1+ and Composer).

Many contributors keep separate checkouts for active branches (for example `3.x` and an older maintenance line) so they do not rebuild constantly when switching work.

## Step 1: prepare a fork

Click **Fork** on the [official repository](https://github.com/modxcms/revolution) and create the fork under your GitHub account if you do not have one yet.

You commit to your fork, then open a pull request against the official repository.

## Step 2: install MODX from your fork

[Follow the git installation instructions](getting-started/installation/git). Clone **your** fork URL (not `modxcms/revolution` as `origin`), run Composer, build the core package, and complete Setup.

## Step 3: add the upstream remote

So you can pull official commits into your fork:

``` bash
git remote add upstream https://github.com/modxcms/revolution.git
```

Then `git fetch upstream` and update your branch with merge or rebase as your workflow prefers.

## Step 4: configure MODX for core work

1. Turn off [`cache_lexicon_topics`](building-sites/settings/cache_lexicon_topics) so lexicon edits show up while you work.
2. Use a unique [`session_name`](building-sites/settings/session_name) if you run several local MODX installs on one host.
3. After changing core PHP or lexicon files, clear `core/cache/` (or Manage → Clear Cache) before retesting.

## Other tools

Many MODX developers use [PhpStorm](https://www.jetbrains.com/phpstorm/) as their IDE. [GitHub CLI](https://cli.github.com/) helps when you open many pull requests.

For building assets and running tests, see [tooling](contribute/code/tooling).
