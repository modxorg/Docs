---
title: Testing Pull Requests
---

Contributors around the world are always [creating new pull requests](https://github.com/modxcms/revolution/pulls) with bug fixes, new features, and other improvements. 

The responsibility to accept and merge those falls on a rather small team of volunteer _Core Integrators_, and it can sometimes take some time for those to properly test and approve changes. 

Luckily, you can help with that!

By testing pull requests and reporting your feedback, you help provide integrators the confidence needed to accept a change. Or you might just find an issue with the proposal that the contributor needs to fix, first, which is equally helpful.

This guide explains how you can help testing pull requests. It's helpful to also checkout the [contributors guide](contribute/code/contributors-guide), which explains the process a contributor goes through to create the pull request. 

## 1. Find an open pull request

[Browse the list of pull requests on GitHub](https://github.com/modxcms/revolution/pulls) to find something you'd like to test. It's useful to pick something that matches your own skills, but not required. 

Almost all pull requests will be tagged with a `pr-state`. It's most useful to focus on those tagged `pr-state/review-needed`, as those have not yet been formally reviewed. 

## 2. Read - what is it about?

Before diving into the code, try to familiarise yourself with the problem it tries to fix. Read the pull request description and the linked issues. Decide if it's something you can test, or move on to another pull request.

Especially for bug fixes, try to reproduce the problem in the relevant release branch before testing the change. This makes sure it's clear how to reproduce and to confirm that the pull request actually does fix the problem.

([More information about the different release branches can be found in the contributors guide.](contribute/code/contributors-guide))

If you can't seem to reproduce a bug based on the provided information, ask in either the original issue or the pull request how you can help test it.

During realtime events such as bug hunts, it's useful (and sometimes necessary to score points) to comment on the pull request to "claim" it and score points, but that's not needed if you're just doing your good deed for the day.

## 3. Run the pull request locally

In order to test the pull request, you will need to patch a [local git installation](getting-started/installation/git) of MODX with the proposed changes.


### Access the pull request branch

How to access the pull request depends on how often you expect you'll test pull requests. 

If you only want to test this one pull request, use the manual checkout. 

If however you want to test pull requests more often, there is a trick to make it a lot quicker and easier to pull in all pull requests no matter who created it; that just requires a bit of setup. 

#### Option 1: Manual Checkout

To do a manual checkout of a pull request, you will need to add the repository of the person that created the pull request to your local git installation. Don't worry, this doesn't give them any access, you just need to tell git specifically where to find it.

This is called adding a _remote_. 

You can list your current remotes with `git remote -v`; that will show  you their names and URLs. It should look something like this:

``` bash
$ git remote -v
origin    git@github.com:YourUserName/revolution.git (fetch)
origin    git@github.com:YourUserName/revolution.git (push)
upstream  git@github.com:modxcms/revolution.git (fetch)
upstream  git@github.com:modxcms/revolution.git (push)
```

**If you only see `origin`, pointing to `modxcms/revolution`, but no upstream**, make sure to replace references to `upstream` in this guide with `origin`. 

Now add the remote for the person that created the pull request. Let's say their username is `janedoe`, then we'll add a remote with their name and repository url:

``` bash
git remote add janedoe git@github.com:janedoe/revolution.git
```

Now we can fetch information from their repository:

``` bash
git fetch janedoe
```

At this point we can access the pull request branch with a checkout or a merge attempt. 

#### Option 2: Fetching all pull requests

To make it easier to fetch pull request branches, you can make a small tweak to your git configuration. With this trick, you wont have to manually add any remotes.

Using a text editor or the terminal, edit the `.git/config` file. For example use `nano .git/config` from the root of your local copy of MODX.

Find the `[remote "upstream"]` section  (or `[remote "origin"]` if you don't have a separate upstream remote). It should look like this:

``` ini
[remote "upstream"]
        url = git@github.com:modxcms/revolution.git
        fetch = +refs/heads/*:refs/remotes/upstream/*
```

Add one more line to the fetch; note the indentation.

``` ini
[remote "upstream"]
        url = git@github.com:modxcms/revolution.git
        fetch = +refs/heads/*:refs/remotes/upstream/*
        fetch = +refs/pull/*/head:refs/remotes/upstream/pr/*
```

(If you don't have an `upstream` remote, replace it with `origin`.)

Now when you do `git fetch upstream` or `git pull upstream`, you'll get special branches for each pull request. 

``` bash
$ git fetch upstream
remote: Enumerating objects: 279, done.
remote: Counting objects: 100% (279/279), done.
remote: Total 355 (delta 278), reused 279 (delta 278), pack-reused 76
Receiving objects: 100% (355/355), 74.90 KiB | 6.81 MiB/s, done.
Resolving deltas: 100% (285/285), completed with 181 local objects.
From github.com:modxcms/revolution
   ab0da3bcf..73a5a8df3  2.x                  -> upstream/2.x
   dc184c801..bea16ac43  3.x                  -> upstream/3.x
   a4e22026b..558369bc5  refs/pull/14860/head -> upstream/pr/14860
 * [new ref]             refs/pull/14888/head -> upstream/pr/14888
 * [new ref]             refs/pull/14889/head -> upstream/pr/14889
 * [new ref]             refs/pull/14890/head -> upstream/pr/14890
...
```

The first time you run this, it will include what's called a "ref" for every pull request ever created. That's a long list, and may take a minute, but it'll only fetch changes the next time you run it.

To access the changes in a pull request, we can simply checkout or merge it with the special `upstream/pr/<id of pull request>` reference.

### Merge the changes 

To test the changes, there are two things you can do now. Either you can use `git checkout` to see the exact changes in the pull request, or you can do a merge. 

> In the commands below, **replace `name-of-branch`** with either the name of the pull request branch as created by the pull request author (shown at the top of the pull request view), or the special `upstream/pr/<id-of-pr>` ref if you've used the trick to fetch pull requests.

The benefit of using `git checkout` is that you're loading a specific version that already exists, so it's easier. You can checkout with:

``` bash
git checkout name-of-branch
```

The downside of checking out is that any changes made to the official branches since the contributor started on their change **will be discarded**. 

This means the code may be different when merged compared to the proposal, which is why merging would be preferred when testing. 

The downside: you may run into merge conflicts and need to take extra care not to commit any changes.

To merge a pull request locally, execute:

``` bash
$ git merge --no-ff --no-commit name-of-branch
Automatic merge went well; stopped before committing as requested
```

Ideally, you'll see the merge went well, but it is possible to run into errors at this stage.

- If you see the message `error: Your local changes to the following files would be overwritten by merge:`, you have local, uncommitted, changes. You can [stash any changes you want to keep](https://git-scm.com/docs/git-stash), or do a hard reset to _discard all changes_ with `git reset --hard upstream/2.x` (replace `2.x` with the version branch you're using). Run the merge command again.
- If the message reports **merge conflicts**, git tried to apply the changes from the pull request, but failed to determine how conflicting changes should be applied. The message should point you to the specific files; in there you'll find blocks of duplicated code that you'll need to manually correct. 

At this point, you're running the proposed change. Yay!

## 4. Running build steps and refreshing caches

Depending on the pull request and what it changed, you may need to do one (or more) of the following before you can test:

- [Run the core build script](contribute/code/tooling/core), followed by going through the setup
- [Run the assets build workflow](contribute/code/tooling/assets)
- Clear the browser cache
- Clear the MODX cache
- (MODX3) Run `composer install`, `composer update`, or `composer dump-autoload` for changed dependencies or other `composer.json` changes.

## 5. Testing pull requests

Look back at the pull request and issues to determine how to best test the changes. 

For bug fixes you'll want to try reproducing the bug again, which hopefully wont work because it's fixed. For new features you'll want to make sure it works as described by the pull request author. 

It's also fun to try to break a change. Is there a way you can manipulate the change so that it no longer does what it should? What happens when you provide invalid values? That type of testing can point to potential security issues or new bugs, and are best to catch early. 

If you're comfortable with the programming language used in the change (typically PHP, JavaScript, or Sass/CSS), you can also do a code review.

How much and what type of testing you can do will depend on your skills. If you're a hardcore hacker you may be better at testing for security issues, while others may be better suited to comment on design changes. 

## 6. Report your findings

All of the above is pointless if you don't share your results with the community, so now it's time to share!

- Is a bug not fixed yet?
- Should something be done differently? (Don't forget to explain why.)
- Or is it working exactly as advertised?

Reply to the pull request with what you found. 

## 7. Cleanup your local installation

When you're done with testing, you'll want to restore your local MODX installation to the official version branch.

- If you used the `git checkout` approach, you can simply checkout the version branch again with `git checkout 2.x` - if you had to run any build steps, you may need to revert those changes with `git reset --hard name-of-branch` before you can checkout.
- If you used the `git merge` approach, you can cancel the merge and revert any build steps using `git reset --hard upstream/2.x`

## Need help?

If you're trying to test a pull request but get stuck, don't forget to ask for help. Your testing is very valuable, and if we can get you up and running that will be better for everyone.

Get help in the [MODX Community Slack #development](https://modx.org/) or on the [MODX Community Forums](https://community.modx.com/).
