---
title: "Contributor's Guide"
_old_id: "1128"
_old_uri: "contribute/using-git-and-github/community-contributors-guide"
---

Development for MODX [happens on GitHub](https://github.com/modxcms/revolution). Everyone is invited to improve MODX, and in this guide we explain some of the common processes. 

## Branches

Development is focused on [2 branches](https://github.com/modxcms/revolution/branches). `2.x`, which contains the latest version of the 2.x series (e.g. 2.7 at time of writing), and `3.x`, which contains MODX 3. 

From time to time there may be other branches. For example there may be a branch `2.6.x` if there are any changes that need to be back-ported specifically to an older versions. Or if development for a version 2.8 is on-going while 2.7 is the latest released version, there may be a separate `2.7.x` branch for that.

This is in line with [semantic versioning](https://semver.org/). 

When you're planning an improvement, here's how to determine which branch you should target for it.

1. If the improvement **breaks backwards compatibility**, it needs to target the branch for the next major release (e.g. `3.x` or `4.x`).
2. If the improvement **introduces new functionality or includes changes that affect how users work with MODX**, it needs to target the branch for the _next_ minor release if that branch is available (e.g. `2.8.x` if 2.7 is the latest), or the branch for the current major release (e.g. `2.x`).
3. If the improvement **fixes a bug**, it needs to target the branch for the _current_ minor release if that branch is available (e.g. `2.7.x` if 2.7 is the latest), or the branch for the current major release (e.g. `2.x`)

We'll discuss the different branches that may be available in a bit more detail.

### Major version branches

The major-version branch, e.g. `2.x` and `3.x` is essentially a virtual `master` branch for each major release of MODX Revolution. This branch is always available and contains new features that do not break backwards compatiblity intended for the next minor release. You can think of this as the "integration branch" where all changes are delivered for the next significant release.

When the code in these branches reaches a stable point and is ready to be released, a commit is tagged with a new minor release number, e.g. `v2.7.0`, and the release is produced from that tag.

### Minor version branches

Minor version branches are not always available. 

They are used when the major version branch has moved forward with new functionality for the next minor version, but bug fixes are still accepted for the latest minor version. 

### l10n branches

From time to time, you'll see branches prefixed with `l10n_` followed by a version. Those are _localisation_ branches, automatically created and updated by CrowdIn. 

To submit lexicon (translation) changes for any language except English, [please use the CrowdIn platform](http://translate.modx.com/) instead of GitHub. 

## Your Fork on GitHub

The first step to contributing to the official repository is to fork it. This means you'll create a copy of the repository under your own name, which allows you to make changes to the code.

When you've finished a fix or improvement, you'll use a _Pull Request_ to propose your change to be included in the next release. The integrators team will review your proposal and work with you to get it incorporated.

To create your fork, [click on the fork button at the top right of the official repository](https://github.com/modxcms/revolution). If you don't have a GitHub account yet, you'll need to sign up first.



### 1. Tools

- A command line interface (Terminal/iTerm/etc)
- Git on your system
- PHP Storm or other client. Please just make sure you use 4 spaces, instead of tabs.
- Some sort of webserver. Apache or NGINX preferred. We use Vagrant boxes, but you might also use [MAMP](https://www.mamp.info/en/)/[XAMPP](https://www.apachefriends.org/index.html).

### 2. Github

- You'll need a Github account which can be made on [Github.com](https://github.com/)
- Then you need a fork of MODX Revolution. Go [here](https://github.com/modxcms/revolution) and click 'Fork' on the top-right.

### 3. Signed MODX Contributors License Agreement

(optional) You need to sign a Contributors License Agreement before contributing code. If you haven't signed it before, [sign it here](https://develop.modx.com/contribute/cla/). 

### 4. Setting up MODX files from a Git repository

MODX contributors must work directly with their private forks on GitHub. 

First, clone your Fork on your local machine, into the directory which will be your webroot.

**Please note:** in the examples below, you'll notice SSH-url's (git@github.com:YOURNAME/revolution.git). Github also offers HTTPS-links, which are easier to use if you're a newbie <https://github.com/YOURNAME/revolution.git>. You can simply replace them in the examples.

MODX contributors must work directly with their private forks on GitHub. Here is the suggested way to prepare your local repository as a developer for contributing back to any MODX project:

``` plain
git clone git@github.com:YOURNAME/revolution.git
cd revolution
```

Next, add the original modxcms/revolution reposition as your upstream. We'll discuss the use of this later. Right now, just do it.

``` plain
git remote add upstream git@github.com:modxcms/revolution.git
```

Now we need to checkout (read: download) the current development-branch, which is `2.7.x` at the time of writing.

``` plain
git checkout 2.7.x
```

Make sure your repository is still 'clean'. Make sure you haven't made any changes.

``` plain
git status
On branch 2.7.x
Your branch is up-to-date with 'origin/2.7.x'.
nothing to commit, working tree clean
```

If you see the above message, you're totally fine. If you do see changes, you've done something horribly wrong! Make sure it is clean and you've made no changes to files yet. Otherwise your commits will mess up the MODX repository later on.

If you don't have a clean branch 2.7.x at that moment, you could rebase your 2.7.x local branch with `upstream/2.7.x` using the following command. You are losing your local changes with that command, so please stash your changes or save them in a new branch:

``` plain
git fetch upstream
git rebase upstream/2.7.x
First, rewinding head to replay your work on top of it...
Fast-forwarded 2.7.x to upstream/2.7.x.
```

Next we'll have to do something weird. The git-version of MODX doesn't contain a pre-built core, like the regular MODX download does. We need to build this manually.

Cd into the _build-folder and make sure you're there ;-) You can do this by using the 'pwd' command. It will show the current path.

``` plain
cd _build
pwd
/your-absolute-path-here/revolution/_build
```

Next, we need to copy (DO NOT RENAME THEM) the following 2 files:

``` plain
cp build.config.sample.php build.config.php
cp build.properties.sample.php build.properties.php
```

Typically you don't have to change the contents of these files, they just need to exist there.

The next step requires you to have PHP in your path. Check if you have PHP in your path by doing the following:

``` plain
php -v
PHP 7.0.15 (cli) (built: Jan 22 2017 08:51:45) ( NTS )
Copyright (c) 1997-2017 The PHP Group
Zend Engine v3.0.0, Copyright (c) 1998-2017 Zend Technologies
```

**If you do not get something like the above, please ask someone or Google on how to get it installed.**

To build the MODX-core, do the following from within the _build-folder:

``` plain
php transport.core.php
[2017-02-24 11:52:17] (INFO @ transport.core.php) Beginning build script processes...
[2017-02-24 11:52:17] (INFO @ transport.core.php) Removed pre-existing core/ and core.transport.zip.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Core transport package created.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Core Namespace packaged.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Default workspace packaged.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged modx.com transport provider.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 2 modMenus.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged all default modContentTypes.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged all default modClassMap objects.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 181 default events.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 225 default system settings.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 2 default context settings.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 1 default user groups.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 1 default dashboards.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 1 default media sources.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 5 default dashboard widgets.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 2 default roles Member and SuperUser.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 6 default Access Policy Template Groups.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 7 default Access Policy Templates.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in 12 default Access Policies.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in web context.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in mgr context.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Packaged in connectors.
[2017-02-24 11:52:17] (INFO @ transport.core.php) Beginning to zip up transport package...
[2017-02-24 11:52:18] (INFO @ transport.core.php) Transport zip created. Build script finished.

Execution time: 1.5657 s
```

If the above shows you some random timezone-issues, it doesn't matter. The important thing is: you need the message "Transport zip created. Build script finished.". If it doesn't, ask around.

### 5. Performing the MODX setup

Now we've got all files in place, we just need to run the MODX Setup. Make sure you have a database ready and use the character set `utf8_unicode_ci`.

Run your setup and be sure that you **DO NOT remove the setup-folder**. Just leave it there and ignore the annoying red suggestion to remove it. If you do remove it, you'll mess up the MODX repository in your next commit.

After installing, change the following System Settings:

```plain
friendly_urls     => Yes
use_alias_path    => Yes
publish_default   => Yes
cache_disabled    => Yes
```

Optional (but we prefer no .html-extensions). Change the Content-Type of HTML. Remove the .html File extension. You can do this by clicking "Content" in the top MODX menu and then clicking 'Content Types'.

Clear your cache.

**Also, setup some random content, so you can do some serious testing.***

### 6. Workflows

We've got 2 workflows worked out for you: bug fixing (doing development yourself) and testing (if you're not that much into developing, but do want to help).

### 6A. Bug fixing workflow

#### 1. Pick an issue from the [MODX issue tracker](https://github.com/modxcms/revolution/issues)

#### 2. Prevent duplicate work by claiming it by commenting on it

Something along the lines of: "I'm going to try and fix this today."

#### 3. Next, create a branch from your current development branch (2.6.x), to start working in your own environment

If the issue you want to fix is a feature, name it feature-ISSUENUMBER. If it is a bug, name it bug-ISSUENUMBER. In this example we'll fix a broken link in the docs. The issue can be [found here](https://github.com/modxcms/revolution/issues/13309). It has issue number 13309.

```plain
git checkout -b bug-13309
```

Next, we'll fix our issue and change some code. If you're confident about your changes, we want to commit it back to Github. We changed the file ```core/lexicon/en/about.inc.php```

Before doing this, we need to check if git is only trying to commit the files you had in mind. Sometimes, another file you don't know of is added to your repo.

```plain
git status
On branch bug-13309
Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

	modified:   core/lexicon/en/about.inc.php

no changes added to commit (use "git add" and/or "git commit -a")
```

If the files you want added to MODX are also in the status-report above, you did well. You're all set! We need to add it to our commit and push it to our online fork on Github. Use the hashtag to reference the issue and/or to tag it for stuff like the MODX Bug Hunt.

```plain
git add .
git commit -m "Fixed issue #13309 #modxbughunt"
git push origin
git push --set-upstream origin bug-13309
Counting objects: 4, done.
Delta compression using up to 8 threads.
Compressing objects: 100% (4/4), done.
Writing objects: 100% (4/4), 1.69 KiB | 0 bytes/s, done.
Total 4 (delta 2), reused 0 (delta 0)
remote: Resolving deltas: 100% (2/2), completed with 1 local objects.
To github.com:gpsietzema/revolution.git
* [new branch]      bug-13309 -> bug-13309
Branch bug-13309 set up to track remote branch bug-13309 from origin.
```

That's it for the command line! Now we need to head over to Github to make a Pull Request (PR).

#### 4. Go to your fork on Github

You'll probably see a message resembling something like `Your recently pushed branches: bug-13309 (2 minutes ago)`. Click the "compare & pull request" button.

Now you see two repositories being compared. On the left, there is `modxcms/revolution`, set it to `base: 2.6.x`. On the right you'll see `yourname/revolution` with `bug-13309`.

If everything is fine, you'll notice a message stating the following: `Able to merge. These branches can be automatically merged.`.

Please make sure you enter some explanation about your commit for our beloved integrators (the people who will actually merge your code into MODX). This will make it easier for them to test it.

Once you've did this, click the magic button **Create pull request**

Congratulations, you did it!

#### 5. On to the next one!

If you want to fix another bug, we first need to be on the `2.6.x` branch again. To do this, we first want to make sure that our Fork's `2.6.x` branch is in sync with the original `modxcms/2.6.x` branch. Do the following to accomplish this:

```plain
git fetch upstream 2.6.x
git fetch origin 2.6.x
git checkout 2.6.x
git pull upstream 2.6.x
```

If in the last step, you get a text editor with a merge message. Just save and quit the editor and you are all fine. If this editor is VI, just hit Escape to exit type-mode, then type `:wq` and hit enter.

You now have updated your Fork. Next you can go back to step 1 in 6a. Rinse and repeat!
