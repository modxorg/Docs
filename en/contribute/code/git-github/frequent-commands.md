---
title: "Git FAC (Frequently Accessed Commands)"
_old_id: "1131"
_old_uri: "contribute/using-git-and-github/git-fac-(frequently-accessed-commands)"
---

### How do I get and keep my local develop branch in sync?

 First, with MODX's collaboration and branching model, you won't be making commits to your major-version branch, so it's easy to keep it up to date. Let's assume you are working with `2.x`:

 ``` php
$ git fetch upstream
$ git checkout 2.x
Switched to branch "2.x"
$ git merge --ff-only upstream/2.x
```

 This assumes that the modxcms or _blessed_ repo is set up as a remote named upstream. (git remote manpage: <http://www.kernel.org/pub/software/scm/git/docs/git-remote.html>)

### How do I create a feature branch?

 If you've just merged in the upstream repo's latet changes to the major-version branch you are targeting, then it's simple:

 ``` php
$ git checkout -b myFeatureBranchName 2.x
```

 If you have not fetched the latest changes from upstream and merged them locally, you should [do that first](#GitFAC%28FrequentlyAccessedCommands%29-HowdoIgetandkeepmylocaldevelopbranchinsync%3F).

### Is there a naming convention for feature branches?

 If you are making changes related to a ticket in the issue tracker (please file a ticket for any bugs first if there isn't one) then you could name your branch "issue-xxxx" where xxxx is the issue number from the bug tracker.

``` php
$ git checkout -b issue-1234 2.4.x
```

Note that this is not requirement, but might help you organize your local branches if you have many of them.

 If you are working on a feature which does not have a ticket, you can name it anything you want, but avoid names that look like release version numbers.

``` php
$ git checkout -b myAwesomeFeature 2.x
```

### Do I need a new feature branch for every issue that I work on?

 Yes.

``` php
$ echo 'Yes'
```

### How do I keep my feature branch in sync with the upstream develop branch?

 If you're working on a feature that's taking a while, you may find it beneficial to keep in sync with upstream changes. Git allows you to "replay" your commits over top of changes in the develop branch using the rebase command.

 In fact, it's generally a good idea to do this before any final commits to your fork and issuing a Pull Request.

 ``` php
$ git fetch upstream
$ git checkout 2.x
Switched to branch "2.x"
$ git merge --ff-only upstream/2.x
$ git checkout my-bc-feature
Switched to branch "my-bc-feature"
$ git rebase 2.x
```

 To learn more, here's the git rebase manpage: <http://www.kernel.org/pub/software/scm/git/docs/git-rebase.html>

### Do I really need to worry about the minor-version branch?

 No, not really. But if you are fixing bugs that should be included in a patch release as soon as possible, you might consider branching from and targeting the minor-release branches instead of the major in case in needs to be backported due to conflicts in changes between major and minor. But it's not critical to the workflow of a contributor at all.

 ``` php
$
```