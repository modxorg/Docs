---
title: "MODX GitHub Contributor's Guide"
_old_id: "1138"
_old_uri: "2.x/administering-your-site/customizing-the-manager/form-customization-sets/modx-github-contributors-guide"
---

## <a name="MODxGitHubContributor%27sGuide-AGitHubbasedbranchingstrategyforcollaborativedevelopment"></a>A GitHub-based branching strategy for collaborative development

In order to facilitate collaborative development on the MODx source code managed at GitHub, a clear and consistent branching strategy has been adopted. This strategy consists of maintaining two permanent branches in each main Git repository: master, which represents code that is assumed to be in a production-ready state, and develop, which contains work to be incorporated into the "next release". However, there are a number of important supporting branches that will only live for a limited amount of time, including feature branches, production hotfix branches, and specific release branches. Though they are normal Git branches, they differ significantly in the way they are used in the development process.

### <a name="MODxGitHubContributor%27sGuide-Thepermanentbranches"></a>The permanent branches

The master branch should be familiar to any Git user, representing the stable, production-ready code in the repository. In our process, we maintain another branch with an infinite lifetime, develop. You can think of this as the "integration branch" where all changes are delivered for the next release. This is also where nightly builds will originate.

When the code in develop reaches a stable point and is ready to be released, all of the changes should be merged back to master (via the defined process which we will explore in detail in sections covering the supporting branches) and tagged with a release number. Thus, each merge commit back to master represents a production release, by definition.

### <a name="MODxGitHubContributor%27sGuide-Supportingbranches"></a>Supporting branches

There are a number of supporting branches in our process that are used to aid in collaborative development of features, facilitate tracking specific features, preparing releases, and quickly applying patches to production releases. These branches are referred to as:

- Feature branches
- Release branches
- Hotfix branches

Each has a special purpose and strict rules governing origination and merge targets, but are otherwise normal Git branches.

### <a name="MODxGitHubContributor%27sGuide-WorkingwithyourGitHubfork"></a>Working with your GitHub fork

MODx contributors must work directly with their private forks on GitHub. Here is the suggested way to prepare your local repository as a developer for contributing back to any MODx project:

 ```
<pre class="brush: php">
$ git checkout -b master origin/master
Switched to a new branch "master"
$ git checkout -b develop origin/develop
Switched to a new branch "develop"


```To keep your local tracking branches for develop and master up-to-date from the upstream repository:

 ```
<pre class="brush: php">
$ git checkout -b myfeature develop
Switched to a new branch "myfeature"


```#### <a name="MODxGitHubContributor%27sGuide-Submittingapullrequestforafinishedfeature"></a>Submitting a pull request for a finished feature

Once you have completed development of a feature on a branch, you should first make sure your work is replayed over the latest updates from develop:

 ```
<pre class="brush: php">
$ git push origin myfeature:myfeature


```And you are ready to [submit a pull request](http://help.github.com/pull-requests/) for your feature branch.

### <a name="MODxGitHubContributor%27sGuide-Releasebranches"></a>Release branches

- May branch from: develop
- Naming convention: release-\*

Release branches exist for the sole purpose of preparing a new production release. They allow for last-minute bug fixes and adjustments to the changes being incorporated for a release without conflicting with on-going development and integration work for future releases. For instance, if we are ready to release all the changes currently integrated into develop as 2.1, we create the release-2.1 branch, bump the version number, and begin the process of QA.

Note release branches may exist for a while, until the release is ready to be rolled out. Bug fixes can be applied directly to the release branch, but adding new features here is strictly prohibited. All new features must be merged into develop and will be incorporated in the next release.

#### <a name="MODxGitHubContributor%27sGuide-Contributingtoareleasebranch"></a>Contributing to a release branch

Release branches are created from develop and will be shared in the upstream repository. For instance, if the 2.1 release is being prepared, you can fetch and get a local copy of this directly from upstream:

 ```
<pre class="brush: php">
$ git branch -d release-2.1
Deleted branch release-2.1 (was ff452fe).
$ git push origin :release-2.1


```### <a name="MODxGitHubContributor%27sGuide-Hotfixbranches"></a>Hotfix branches

- May branch from: master
- Naming convention: hotfix-\*

Unplanned production releases, typically in response to security-related or other critical bugs discovered in an existing production release, can be managed in a hotfix branch. It is similar to a release branch but originates directly from a specific production release tag on master, since develop potentially contains new features intended for the next planned release. This allows development to continue uninhibited while the quick production fix is prepared.

#### <a name="MODxGitHubContributor%27sGuide-Creatingahotfixbranch"></a>Creating a hotfix branch

Hotfix branches are created from master; imagine that you discover a critical security flaw in the current production release and know how to fix it, but changes sitting in the develop branch are as yet untested and thus not stable. The solution is to create a hotfix branch in which to address the problem. First make sure master is up-to-date from upstream:

 ```
<pre class="brush: php">
$ git checkout -b hotfix-fubar master
Switched to a new branch "hotfix-fubar"


```Now fix the bug and commit in one or more separate commits which you can push to your fork:

 ```
<pre class="brush: php">
$ git branch -d hotfix-fubar
Deleted branch hotfix-fubar (was abbe5d6).
$ git push origin :hotfix-fubar


```## <a name="MODxGitHubContributor%27sGuide-WorkflowShortcutsforCoreTeamMembers"></a>Workflow Shortcuts for Core Team Members

There are a couple of scenarios where a simpler, alternate workflow is beneficial.

### <a name="MODxGitHubContributor%27sGuide-TrivialBugsonUnreleasedCode"></a>Trivial Bugs on Unreleased Code

A committer can push commits right to modxcms/(project)/develop if the commits are fixing trivial bugs on unreleased code.

### <a name="MODxGitHubContributor%27sGuide-BranchContainingaDay%27sBugfixCommits"></a>Branch Containing a Day's Bugfix Commits

For bugfix commits that are not "critical" in nature, and do not need to be backported, a committer may maintain a daily branch to aggregate these commits, and push it to their fork by COB. Such branches shall be integrated by 8:00 am (Central) the following morning.