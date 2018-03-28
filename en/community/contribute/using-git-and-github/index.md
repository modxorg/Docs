---
title: "Using Git and GitHub"
_old_id: "1135"
_old_uri: "contribute/using-git-and-github/"
---

**Git** is the distributed version control system used by MODX for source code collaboration and version control. Like MODX, it's free and open source.

- [Git's official website](http://git-scm.com/) is an excellent place to get started if you're new to Git or to [version control and software configuration management](http://en.wikipedia.org/wiki/Revision_control) in general. You'll want to install Git and get familiar with basic configuration parameters and commands.
- If you have a background in SVN, then [this crash course](http://git.or.cz/course/svn.html) may be what you need.
- If that isn't enough, there's a [great interactive cheat sheet by Andrew Peterson](http://www.ndpsoftware.com/git-cheatsheet.html), or .. [let us Google that for you](http://lmgtfy.com/?q=git+svn) ;-)

**GitHub** is where MODX Git repositories are hosted. GitHub is a service for "secure source code hosting and collaborative development" but also forms a social network for coders.

Read more about [GitHub's repository hosting](https://github.com/features/hosting) but also be sure to bookmark their excellent [Git Reference](http://gitref.org/) site.

## Overview 


Here's an overview of the workflow you'll be using to contribute changes to any MODX repository. It will help to understand this first before diving in to more detail.

**Fork**
First, you will fork a MODX code repository to your own GitHub account. This is "your fork". You will be publishing your code contributions (commits) to your fork, not directly to the modxcms repository. (This is what makes Git _distributed_, whereas SVN is centralized around one repository.) Then, in order to work with your fork, you will need a local copy, or `clone` of it.

Here's [GitHub's tutorial on forking a repo and making a local clone of it](http://help.github.com/fork-a-repo/).



**Branch and code**
All work on a single issue (bug or feature) is to be done on a _feature branch_. ``` php 
git checkout -b bug-1111
```

You will make changes to a file or files. Coding.. yay! You make one or several commits on that branch. (Multiple commits can really help keep things organized in certain circumstances.)

Along the way, or when the work is done, you _push_ the branch to your fork. You'll be able to see your feature branch and your commits on the GitHub site.

``` php 
git push myRepo bug-1111
```

_Note: Making sure your work and your commits are based on "fresh" code will help you avoid problems and help integrators understand, review and integrate (or feed back on) your work._



**Pull Request**
When you're ready to contribute the commit or commits from your branch, you'll issue a [Pull Request](http://help.github.com/pull-requests/) from your GitHub account. Your Pull Request may be accepted as-is by an integrator or they may make changes or comment, ask questions etc. GitHub facilitates communication with in-line code comments as well as a simple discussion thread on Pull Requests.



## Community Contributor's Guide 

With that basis in the workflow, your next step is to read the [Community Contributor's Guide](/community/contribute/using-git-and-github/community-contributors-guide "Community Contributor's Guide") to understand the branching model MODX is using and for more detail on putting it into practice.

## More 

1. [Community Contributor's Guide](/community/contribute/using-git-and-github/community-contributors-guide)
2. [Git FAC (Frequently Accessed Commands)](/community/contribute/using-git-and-github/git-fac-(frequently-accessed-commands))
3. [xPDO GitHub Contributor's Guide](/community/contribute/using-git-and-github/xpdo-github-contributors-guide)

## **Related**

- [Install Revolution from your Git repo](getting-started/installation/git-installation "Git Installation")