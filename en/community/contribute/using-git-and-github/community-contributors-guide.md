---
title: "Community Contributor's Guide"
_old_id: "1128"
_old_uri: "contribute/using-git-and-github/community-contributors-guide"
---

## A GitHub-based branching strategy for collaborative development

 In order to facilitate collaborative development on the MODX source code managed at GitHub, a clear and consistent branching strategy has been adopted. This strategy consists of maintaining a major-version branch, e.g. `2.x`, that represents work to be incorporated into the "next significant release". If the current stable release of version 2 is 2.2.1, the work in the `2.x` branch would incorporate work intended for the 2.3.0 release.

 In addition, there is a branch maintained for the current stable minor release of each major-version. If this is 2.2, then the branch would be `2.2.x`. This would represent development intended for the next patch release of 2.2. Following Semantic Versioning, only bug fixes would target these temporary minor release branches.

### The major-version branches

 The major-version branch, e.g. `2.x` and `3.x` is essentially a virtual `master` branch for each major release of MODX Revolution. This branch has an infinite lifetime and contains new features that do not break backwards compatiblity intended for the next minor release. You can think of this as the "integration branch" where all changes are delivered for the next significant release.

 When the code in these branches reaches a stable point and is ready to be released, a commit is tagged with a new minor release number, e.g. `v2.2.0`, and the release is produced from that tag.

### The minor-version branches

 There are supporting temporary branches in our process that are used to aid in collaborative development of bugfixes and translation updates which can be quickly applied to patch releases. These branches are referred to as minor-version branches and have a limited lifetime as long as their parent minor release is the current stable release. They contain only bugfixes and translation updates. Following the rules of semantic versioning, new features that do not break backwards compatibility, must go in the next minor release; never in a minor-version branch from which patch releases will be produced.

### Working with your GitHub fork

 MODx contributors must work directly with their private forks on GitHub. Here is the suggested way to prepare your local repository as a developer for contributing back to any MODx project:

 ``` php 

$ git clone git@github.com:YourGitUsername/revolution.git
$ cd revolution
$ git remote add upstream -f http://github.com/modxcms/revolution.git

```

 This setup makes your fork the standard `origin` remote, and adds/fetches the "blessed" repository as the remote `upstream`. You may want to add other remotes to other developer forks as well, and I would name those remotes appropriately so you can keep track of each one.

 You'll want to go ahead and create local tracking branches for the major version branch and/or minor-version branch you will want to work with from your fork, a.k.a. `origin`:

 ``` php 

$ git checkout -b 2.x origin/2.x
Switched to a new branch "2.x"
$ git checkout -b 2.4.x origin/2.4.x
Switched to a new branch "2.4.x"

```

 To keep your local tracking branches for `2.x` and `2.4.x` up-to-date from the `upstream` repository:

 ``` php 

$ git fetch upstream
$ git checkout 2.4.x
Switched to branch "2.4.x"
$ git merge --ff-only upstream/2.4.x
$ git checkout 2.x
Switched to branch "2.x"
$ git merge --ff-only upstream/2.x
$ git push origin 2.4.x 2.x

```

 Note however, that the push is mainly for show, as the permanent branches should never be a target for contributor commits, even in the forks. IOW, `2.4.x` and `2.x` in your fork should match the `upstream` branches of the same name. It is expected that all contributions will be submitted via a feature branch originating from the appropriate up-to-date major-version branch, or a bugfix branch originating from a minor-version branch in the upstream repository.

 Also note the `--ff-only` flag ensures that only fast-forward merges are performed (in case you accidentally do commit to the major or minor-version branches on your fork without realizing it).

 **Important** 
 Please make sure you have your autocrlf settings set appropriately before making any commits to your fork. See <http://help.github.com/dealing-with-lineendings/> to determine the setting you need based on the platform you are developing on. 

### Feature branches

- May branch from: major-version branch
- Naming convention: completely up to you

 Feature branches, also known as topic branches, are used to develop a specific new feature (or set of features) for a future release. Once it is accepted and ready to be incorporated in the next minor release, it is merged into the major-version branch by an integrator. If the feature is never completed or accepted, it can simply be discarded.

 Feature branches exist in developer forks, not in the "blessed", or `upstream` repository.

#### Creating a feature branch

 When starting work on a new feature, branch off from the major-version branch you are targeting, e.g. `2.x`.

 ``` php 

$ git checkout -b my-bc-feature 2.x
Switched to a new branch "my-bc-feature"

```

#### Submitting a pull request for a finished feature

 Once you have completed development of a feature on your branch, you should first make sure your work is replayed over the latest updates from `develop`:

 ``` php 

$ git fetch upstream
$ git checkout 2.x
Switched to branch "2.x"
$ git merge --ff-only upstream/2.x
$ git checkout my-bc-feature
Switched to branch "my-bc-feature"
$ git rebase 2.x

```

 This will make it easier for integrators to incorporate your work without conflict.

 Now simply push your feature to your fork (you can do this early on if you want to share your feature branch for collaboration or review):

 ``` php 

$ git push origin my-bc-feature

```

 And you are ready to [submit a pull request](http://help.github.com/pull-requests/) for your feature branch.

### Bug Branches

 If there's a bug in the MODX [GitHub Issues](https://github.com/modxcms/revolution/issues) that you would like to fix, here's a simple workflow you can follow.

 First, fork the MODX Git repo on github, then clone your fork (see above).

 Before you begin work on coding your fix, create a new branch devoted to your upstream target (where XXXX is the bug number):

 ``` php 

git checkout -b bug-XXXX 2.4.x

```

 Now you're ready to make your changes and fix the nasty bug!

 Once the bug is fixed, you can commit your changes and push your bugfix branch to your fork:

 ``` php 

git commit .
git push origin bug-XXXX

```

 Then you're ready to issue your pull request from Github.

 Log into your Github account, find your MODX fork, then hit the button at the top that says "Pull Request".

 ![](/download/attachments/33948128/github_modx_pull_request.jpg?version=1&modificationDate=1370290791000)

 Make sure you select the "base branch" – you want to issue the pull request to the branch you originally branched from (2.4.x in the above example).