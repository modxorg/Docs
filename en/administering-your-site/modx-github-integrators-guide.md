---
title: "MODX GitHub Integrator's Guide"
_old_id: "1139"
_old_uri: "2.x/administering-your-site/modx-github-integrators-guide"
---

## A GitHub-based branching and release management strategy

In order to facilitate release management with the MODx source code managed at GitHub, a clear and consistent branching strategy is necessary for collaborative development. This strategy will consist of maintaining two permanent branches in each main Git repository, master, which represents code that is assumed to be in a production-ready state, and develop, which contains work to be incorporated into the "next release". However, there are a number of important supporting branches that will only live for a limited amount of time, including feature branches, production hotfix branches, and specific release branches. Though they are normal Git branches, the differ significantly in the way they are used in the development process.

### The permanent branches

The master branch should be familiar to any Git user, representing the stable, production-ready code in the repository. In our process, we maintain another branch with an infinite lifetime, develop. You can think of this as the "integration branch" where all changes are delivered for the next release. This is also where nightly builds will originate.

When the code in develop reaches a stable point and is ready to be released, all of the changes should be merged back to master (via the defined process which we will explore in detail in sections covering the supporting branches) and tagged with a release number. Thus, each merge commit back to master represents a production release, by definition.

### Supporting branches

There are a number of supporting branches in our process that are used to aid in collaborative development of features, facilitate tracking specific features, preparing releases, and quickly applying patches to production releases. These branches are referred to as:

- Feature branches
- Release branches
- Hotfix branches

Each has a special purpose and strict rules governing origination and merge targets, but are otherwise normal Git branches.

### Working with GitHub forks

Integration managers must work directly with the "blessed" repository when merging to/from develop and master (as well as when sharing release or hotfix branches is necessary), but can share feature branches on their GitHub forks as any contributing developer would. Here is the suggested way to prepare your local repository as an integrator for working with both the "blessed" repository and your own developer fork (which you create on GitHub):

 ``` php 
$ git checkout -b master origin/master
Switched to a new branch "master"
$ git checkout -b develop origin/develop
Switched to a new branch "develop"
```

To keep your local tracking branches up-to-date when your working copy is clean:

 ``` php 
$ git fetch origin
$ git checkout develop
Switched to branch {{develop}}
$ git rebase origin/develop
```

Please note that the permanent branches in our workflow are irrelevant in the GitHub developer forks. Any work that is incorporated into the "blessed" repository's master or develop branch should eventually match in all forks. Contributors will be taught to create and share topic branches that can contain new features or bug fixes they wish to contribute back to the project. It is the integrator's responsibility to make sure any work that is incorporated into the "blessed" repository is from a developer who has signed and returned their CLA.

That said, as long as you never commit to it, you can keep your master branch up-to-date in your fork like this (assuming you have your local tracking branch for master up-to-date from origin):

 ``` php 
$ git checkout -b mydevelop opengeek/develop
$ git merge --ff-only develop
$ git push opengeek mydevelop:develop
```

Note the --ff-only flag ensures that only fast-forward merges are performed (in case you accidentally commit to the main branches on your fork or origin without realizing it or, in the case of origin, without pushing the changes).

**Important**
Please make sure you have your autocrlf settings set appropriately before making any commits to your fork or the "blessed" repository. See <http://help.github.com/dealing-with-lineendings/> to determine the setting you need based on the platform you are developing on.

**Do Not...**
At this time, GitHub pull requests should never ever be directly applied to a branch in the "blessed" repository. Make sure all pull requests are applied to your local environment first, and properly merged into the appropriate target branch.

### Feature branches

- May branch from: develop
- Must merge into: develop
- Naming convention: anything except master, develop, release-, or hotfix-

Feature branches, also known as topic branches, are used to develop a specific new feature (or set of features) for the next release, or for a future release. The target release for the feature to be incorporated may well be unknown, and the branch will exist only as long as that feature is in development. Once it is ready to be incorporated in the next release, it is merged into the develop branch. If the feature is never completed or accepted, it can simply be discarded.

Feature branches typically exist in developer forks only for sharing purposes, not in the "blessed" repository (aka origin).

#### Creating a feature branch

When starting work on a new feature, branch off from the develop branch.

 ``` php 
$ git checkout develop
Switched to branch 'develop'
$ git merge --no-ff --log --no-commit myfeature
Automatic merge went well; stopped before committing as requested
$ git commit
$ git branch -d myfeature
Deleted branch myfeature (was 05e5997).
$ git push origin develop
```

**Important**
The --no-ff flag prevents a fast-forward merge, always creating a new commit object, even if the merge could be performed with a fast-forward. This avoids losing critical information about the existence of a feature branch. It also groups the changes into one commit object so the entire feature can easily be reverted.
 The --log flag adds the first line of the commit message for every commit that is merged into the merge commit message.
 The --no-commit prevents the commit from automatically occurring; you can then manually commit and edit the commit message as needed.

### Release branches

- May branch from: develop
- Must merge into: develop and master
- Naming convention: release-\*

Release branches exist for the sole purpose of preparing a new production release. They allow for last-minute bug fixes and adjustments to the changes being incorporated for a release without conflicting with on-going development and integration work for future releases. For instance, if we are ready to release all the changes currently integrated into develop as 2.1, we create the release-2.1 branch, bump the version number, and begin the process of QA.

#### Creating a release branch

Release branches are created from develop and will be shared in origin:

 ``` php 
$ git checkout master
Switched to branch 'master'
$ git merge --no-ff --log --no-commit release-2.1
Automatic merge went well; stopped before committing as requested
$ git commit
$ git tag -u "Jason Coward (MODx, LLC) <jason@modx.com>" v2.1 -m "Tagging version 2.1"
$ git push origin master --tags
```

Then merging the changes made in the release branch back to develop:

 ``` php 
$ git branch -d release-2.1
Deleted branch release-2.1 (was ff452fe).
$ git push origin :release-2.1
```

### Hotfix branches

- May branch from: master
- Must merge into: develop and master
- Naming convention: hotfix-\*

Unplanned production releases, typically in response to security-related or other critical bugs discovered in an existing production release, can be managed in a hotfix branch. It is similar to a release branch but originates directly from a specific production release tag on master, since develop potentially contains new features intended for the next planned release. This allows development to continue uninhibited while the quick production fix is prepared.

#### Creating the hotfix branch

Hotfix branches are created from master; imagine that a critical security flaw is discovered in the current production release, but changes sitting in the develop branch are as yet untested and thus not stable. The solution is to create a hotfix branch in which to address the problem:

 ``` php 
$ git commit -m "Fixed severe production problem"
[hotfix-2.1.1 abbe5d6] Fixed severe production problem
5 files changed, 32 insertions(+), 17 deletions(-)
```

Hotfix branches will generally not be pushed to any public repositories unless collaborative development needs to take place on the fix.

#### Finishing the hotfix branch

Similar to the release branch, the hotfix branch must be merged into both master for release, and develop to ensure future releases also get the fix.

First, update master and tag the release:

 ``` php 
$ git checkout develop
Switched to branch 'develop'
$ git merge --no-ff --log --no-commit hotfix-2.1.1
Automatic merge went well; stopped before committing as requested
$ git commit
```

There is an exception to this though: if a release branch exists, the hotfix changes need to be merged into the release branch instead of develop, where it will eventually be merged back into develop anyway. But you can safely merge it into develop as well, if work in develop immediately requires the fix.

Once you have merged it everywhere you need to, go ahead and get rid of the temporary hotfix branch:

 ```
$ git branch -d hotfix-2.1.1
Deleted branch hotfix-2.1.1 (was abbe5d6).
```