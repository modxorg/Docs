---
title: "Git FAC (Frequently Accessed Commands)"
_old_id: "1131"
_old_uri: "contribute/using-git-and-github/git-fac-(frequently-accessed-commands)"
---

This page briefly goes over some common scenarios when using Git for MODX development. 

## How do I get and keep my local develop branch in sync?

First you should make sure to **never commit directly to a version branch**. That alone will make working with git much more pleasant.

To update your local development copy, for example of the 2.x major version branch, run:

``` php
git fetch upstream
git checkout 2.x
Switched to branch "2.x"
git merge --ff-only upstream/2.x
```

This assumes that the official repository is added as "upstream", and that you have a fork added as "origin". [Learn more about remotes](https://git-scm.com/book/en/v2/Git-Basics-Working-with-Remotes)

## How do I create a feature branch?

Make sure your local copy of the version branch (e.g. `2.x`) is up-to-date, first. See the previous section.

Then, run:

``` php
git checkout -b myFeatureBranchName 2.x
```

## Is there a naming convention for feature branches?

Typically one of: `issue-1234` or `feature-1234` or `fix-1234`, where `1234` is the ID Of the relevant issue on GitHub. 

If there is no issue for what you plan to work on, considering creating one to discuss it, or use a descriptive branch name like `feature-magic-resources`. 

Avoid names that resemble release version numbers. 

``` php
git checkout -b myAwesomeFeature 2.x
```

## Do I need a new feature branch for every issue that I work on?

Yes. Never commit directly to the version branch. Always create a separate branch for each feature or issue you work on.

## How do I keep my feature branch in sync with the upstream version branch?

If you're working on a feature that's taking a while, you may need to keep in sync with upstream changes. 

While it's tempting to use `git merge` to pull in the changes from upstream, that adds additional redundant commits to your changes. 

It's better to "replay" your commits using `git rebase`.

On your feature branch, run:

``` php
git fetch upstream
git rebase upstream/2.x
```

If you've diverged further from the release branch, using interactive mode is useful to help you address any conflicts one-at-a-time. 

``` php
git fetch upstream
git rebase upstream/2.x
```

To learn more, here's the git rebase manpage: <http://www.kernel.org/pub/software/scm/git/docs/git-rebase.html>

## Do I really need to worry about basing off the right (version) branch?

Yes. The core integrators much prefer spending their time reviewing and accepting great contributions, rather than having to jump through complicated hoops and merge conflicts to get your change applied to the right branch.

[See the contributors guide for guidance on which branches to use](contribute/code/contributors-guide), and ask in the [Slack community](https://modx.org) or [forum](https://community.modx.com) if you're not sure what branch is appropriate. 
