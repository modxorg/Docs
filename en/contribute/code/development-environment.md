---
title: "Development Environments"
_old_id: "1129"
_old_uri: "contribute/becoming-a-contributor/development-environments"
sortorder: 1
---

When developing bug fixes or features for MODX Revolution, you'll need to have a local development environment. 

At the time of writing MODX3 was in development, so you'd typically end up with a 2.x and 3.x development environment to be able of working on both without constantly having to rebuild. 

> To do any of this, you'll also need a functional web server running on your local machine. This document does not describe how to set that up, as that will depend on your machine and preferences. Common options are using development tools like MAMP (Mac), XAMMP (Windows), Docker (Mac, Windows, Linux) or native local solutions. [See the Server Requirements](getting-started/server-requirements).

## Step 1: preparing a _Fork_

First things first, click the _Fork_ button at the top right of the [official repository](https://github.com/modxcms/revolution) and create the fork (if you haven't done that before) on your account. 

You will not have access to commit directly to the official repository, so will do most of your work in a fork of your own. You have full control over this fork and will send a pull request to the official repository with proposed changes.

## Step 2: install MODX from your fork

[Follow the installation from git instructions](getting-started/installation/git) to clone your fork (make sure to use your own repository url, not the official repository), and install it.  

## Step 3: connect the upstream

In order to easily update your fork from the official repository, add it as the "upstream" remote:

````bash 
git remote add upstream https://github.com/modxcms/revolution.git
````

You can now use `git fetch upstream` to get the latest commits and update your local clone with a pull, reset, or rebase.

## Step 4: configure MODX for easier development

1. Disable the `cache_lexicon_topics` system setting (in System > System Settings) to make sure lexicon changes are immediately visible when developing.
2. ....


## Other Tools

Many MODX developers use [PhpStorm](http://www.jetbrains.com/phpstorm/) as their editor (IDE) of choice. It's very powerful and available for Mac, Windows and Linux.  

[The GitHub CLI](https://cli.github.com/) is useful if you're doing a lot of work with GitHub. 

For various tooling specific to MODX development (e.g. building assets and running tests), see [tooling](contribute/code/tooling).
