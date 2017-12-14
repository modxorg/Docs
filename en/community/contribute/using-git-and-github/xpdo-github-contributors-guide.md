---
title: "xPDO GitHub Contributor's Guide"
_old_id: "1136"
_old_uri: "contribute/using-git-and-github/xpdo-github-contributors-guide"
---

Contributing to xPDO and Integrating with MODX Revolution
---------------------------------------------------------

xPDO is an object-oriented framework on which MODX Revolution is built. It is maintained in a separate git repository from revolution and contributing to the xPDO core of MODX requires some additional work.

xPDO contributors should follow the same basic process and branching strategy as those for MODX itself. See the [MODx GitHub Contributor's Guide](/display/community/MODx+GitHub+Contributor%27s+Guide "MODx GitHub Contributor's Guide") for details on the branching strategies for features, releases, hotfixes, and more. This guide will focus on the additional steps required to integrate your xPDO changes into MODX for testing before submitting Pull Requests on the xPDO repository.

### Forking and Cloning the Complete xPDO Repository

As with MODX, this means contributors must work directly with their private forks on GitHub. Here is the suggested way to prepare your local repository as a developer for contributing back to the complete xPDO project:

```
<pre class="brush: php">
[repos]$ git clone git@github.com:YourGitUsername/xpdo.git
[repos]$ cd xpdo
[xpdo]$ git remote add upstream -f http://github.com/modxcms/xpdo.git

```This setup makes your fork the standard `origin` remote, and adds/fetches the "blessed" repository as the remote `upstream`. You may want to add other remotes to other developer forks as well, and I would name those remotes appropriately so you can keep track of each one.

You'll want to go ahead and create local tracking branches for the permanent branches from your fork, a.k.a. `origin`:

```
<pre class="brush: php">
[xpdo]$ git checkout -b master origin/master
Switched to a new branch "master"
[xpdo]$ git checkout -b develop origin/develop
Switched to a new branch "develop"

```To keep your local tracking branches for `develop` and `master` up-to-date from the `upstream` repository:

```
<pre class="brush: php">
[xpdo]$ git fetch upstream
[xpdo]$ git checkout develop
Switched to branch "develop"
[xpdo]$ git merge --ff-only upstream/develop
[xpdo]$ git checkout master
Switched to branch "master"
[xpdo]$ git merge --ff-only upstream/master
[xpdo]$ git push origin develop master

```Note however, that the push is mainly for show, as the permanent branches should never be a target for contributor commits, even in the forks. IOW, `develop` and `master` in your fork should always match the `upstream` branches of the same name. It is expected that all contributions will be submitted via a feature or hotfix branch originating from the appropriate permanent branch, or a bug fix branch originating from a release branch in the upstream repository.

Also note the `--ff-only` flag ensures that only fast-forward merges are performed (in case you accidentally do commit to the main branches on your fork without realizing it).

<div class="note">**Important**  
Please make sure you have your autocrlf settings set appropriately before making any commits to your fork. See <http://help.github.com/dealing-with-lineendings/> to determine the setting you need based on the platform you are developing on.</div><div class="note">**Unit Tests**  
xPDO has a growing number of Unit Tests which help ensure at least basic functionality is not broken when changes are made to the code base. Make sure your changes pass the unit tests for ALL implemented drivers when submitting any Pull Requests to, or that affect, xPDO code. In addition, all bug fixes and features should be accompanied with new unit test cases where practical.</div>### Forking and Cloning the xPDO Core Repository

xPDO has two GitHub repositories. The complete repository contains Unit Tests, test models, build scripts and other assets that you would not want integrated into other projects. In order to more easily merge the project within other projects, a second repository that includes only the xpdo/ subdirectory (this contains the run-time files of xPDO only) was created. This repository is kept in sync with the complete xPDO repository via git's subtree merge technique, and this same technique can then be used to merge the xPDO Core with any other git repository.

So the next step is to fork and clone this repository as well:

```
<pre class="brush: php">
[repos]$ git clone git@github.com:YourGitUsername/xpdo-core.git
[repos]$ cd xpdo-core
[xpdo-core]$ git remote add upstream -f http://github.com/modxcms/xpdo-core.git

```### Migrating Changes for Testing

Whenever you have completed a feature or bugfix in the complete xPDO repository, all the unit tests are passing, and you are ready to test the change in another project, you can push the change to an appropriate branch on your fork. Once there, you can choose to manually copy your modified files into place in any external project you are using xPDO with, or use git's subtree merge technique to update the xpdo-core repository with your changes, and then turn around and do the same from xpdo-core into your project's repository.

To update the xpdo-core repository, we first need to add and fetch a remote for your fork of the complete xpdo repository:

```
<pre class="brush: php">
[xpdo-core]$ git remote add -f xpdo git@github.com:YourGitUsername/xpdo.git

```Once added, you can fetch changes you commit to your xpdo fork and merge them easily. Make sure your xpdo-core branches are up-to-date from upstream first, e.g. if pushing a feature branch called xpdo/feature-1234 off of the upstream/develop branch:

```
<pre class="brush: php">
[xpdo-core]$ git fetch upstream
[xpdo-core]$ git checkout develop
Switched to branch "develop"
[xpdo-core]$ git merge --ff-only upstream/develop
[xpdo-core]$ git push origin develop
[xpdo-core]$ git fetch xpdo
[xpdo-core]$ git checkout -b feature-1234 develop
[xpdo-core]$ git merge -s subtree --log xpdo/feature-1234
[xpdo-core]$ git push origin feature-1234

```At this point, your feature branch is in your xpdo-core fork and ready for merging into MODX Revolution or any other project that has xpdo-core subtree merged into it.

### Testing Changes in MODX Revolution

Now, to test your changes with MODX Revolution, you need to add and fetch your fork of the xpdo-core repository as a remote to your revolution fork. Once you do that, you can create a branch to merge in and test your xpdo-core feature branch. Change directory to your MODX Revolution git fork and get it up-to-date.

```
<pre class="brush: php">
[revolution]$ git checkout develop
Switched to branch "develop"
[revolution]$ git fetch upstream
[revolution]$ git merge --ff-only upstream/develop
[revolution]$ git push origin develop
[revolution]$ git remote add -f xpdo git@github.com:YourGitUsername/xpdo-core.git
[revolution]$ git checkout -b xpdo-feature-1234 develop
[revolution]$ git merge -s subtree --log xpdo/feature-1234

```If it works, share your branch with the xpdo-core changes integrated with the world to play with:

```
<pre class="brush: php">
[revolution]$ git push origin xpdo-feature-1234

```### Submitting the Pull Request

After all of this is done, and you are confident your changes should make it into xPDO, all you need to do is submit your original feature branch, on your fork of the complete xpdo repository, to the appropriate branch of the upstream xpdo repository.