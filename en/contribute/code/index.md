---
title: "Code"
_old_id: "1127"
_old_uri: "contribute/becoming-a-contributor"
sortorder: 1
---

So, you want to help developing MODX Revolution? Just having that idea already makes you, like, the best person ever. <3

There's plenty of work to around, so your involvement in the core code will be greatly appreciated and can have a real impact on future releases of MODX. No pressure - just excited you're even reading this.

In this section we'll walk you through some of the processes of developing a fix or new feature for MODX.

> Not really the development type, but still want to help with code? Learn how you can help by [testing contributions from others](contribute/code/testing-pull-requests), [triaging issues](contribute/issues), or [translating MODX into different languages](contribute/translate).

## The Contributor License Agreement

First of all, some legalese. Before any improvement can be accepted, the MODX project needs you to (digitally) sign a _Contributors License Agreement_ (commonly shortened to CLA), which basically means you give the MODX project the right to take your contributor and share it. You'll only have to do this once and it wont take more than a few minutes.

When creating a pull request the helpful `@cla-bot` will automatically check if you've signed the CLA before, so you can also forget about it now and get back to it when prompted by the bot.

[Sign the CLA here](https://modx.com/community/cla/).

## Step 1: find something to work on

If you've come to this page with the idea to fix something that's been bugging you: congrats, you just completed this step! :) Skip ahead to step 2, below.

But if you don't have a specific task in mind yet, [start by browsing the issue tracker on GitHub](https://github.com/modxcms/revolution/issues). There's literally hundreds of open issues awaiting someone to take up the initiative and fix it.

What issue is right for you obviously depends on your skill set. To help narrow things down, use the _Label_ and _Milestone_ filters.

If you're looking for a somewhat straightforward issue for your first contribution, **select the next patch release in the Milestones dropdown**. Issues assigned to a milestone are usually pretty detailed and a matter of just fixing it, without a ton of internal debugging. Plus, the people [triaging issues](contribute/issues) have already determined that to be a good one to tackle in a certain releae.

The `state/confirmed` and `state/accepting-pull-request` labels are also useful. That label means the problem was confirmed by someone doing triage and definitely worthy of a fix. (That label being missing does not however indicate an issue is not worthy of being fixed!)

There are also priority labels (`priority-1-urgent`, `priority-2-high`) that may be more impactful issues.

Finally, just searching for a topic you're comfortable with can help get an idea of what to work on. Perhaps "extjs", "design", "frontend"...

When you found your target, it's time to start coding!

## Step 2: choosing the base branch

If this is your first time working on the Revolution code, [you'll need to get your development environment set up correctly](contribute/code/development-environment). That's basically a [MODX instance that was installed directly from git](getting-started/installation/git), with some additional tweaks to make developing easier. You'd typically have one environment per major release (2.x and 3.x) to avoid switching between them repeatedly.

Next is choosing the base branch to use. Generally speaking:

- **Bug fixes go in the branch for the current path release**, for example `2.8.x` (or `2.x` if `2.8.x` doesn't exist). Which branches are available will differ from time-to-time, but the right one should be fairly simple to spot.
- **New features go in the branch for the current _minor_ release**, for example `2.x`. When a new minor version is released, a new patch release branch is created from that (eg `2.9.x`).
- **Breaking changes go in the next major branch**, for example `3.x`.

> Note: at the time of writing (Feb 2021), the primary focus is on MODX3. This means that bug fixes for the current release should go into `2.x`, while new features should be built for the `3.x` branch. There's also a big focus on fixing bugs in `3.x`. That's a temporary deviation from the guidelines above, and a bit confusing.
>
> After 3.0 comes out, we'll add a separate `3.0.x` branch for 3.0 bug fixes, while new features will then target `3.x.` as described above.

Not sure if something is a bug fix or a new feature? Check if there's already been a milestone assigned to an issue to give you a hint, or bring it up in the issue or on Slack.

## Step 3: get coding!

Now that you've figured out what you're going to work on, and what branch to base it off, it's time to get to work.

> Haven't set up a development environment yet? [Follow these instructions first.](contribute/code/development-environment)

Start by creating a new issue/feature branch in your local git installation. The convention is to use the format `bug-{issue_number}`, `feature-{issue_number}` or `issue-{issue_number}`, but you're free to choose something else.

```bash
git fetch upstream
git checkout -b bug-12345 upstream/2.x
```

Make sure to adjust `upstream/2.x` to the right base branch if needed.

Now work on the task at hand. Depending on what you're working on, there is [tooling available](contribute/code/tooling) to build assets, models, etc.

When the problem is resolved or the feature added, commit your changes to your feature/bug branch. Use `git status`, `git add .` or `git add file1 file2` and `git commit -m "commit message goes here"`.

On a particularly large piece of work, committing often (whenever you have a portion working) is useful. It may be necessary to squash commits later, or integrators can squash it when merging.

Next, send your commits **to your own fork**, typically called the `origin`. By specifying `-u` in the command below, it's set up to "track the remote branch", meaning you can simply do `git push` without specific arguments next time.

````bash
git push -u origin bug-12345
````

The output of that command will look something like this:

````bash
Counting objects: 18, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (18/18), done.
Writing objects: 100% (18/18), 111.86 KiB | 1.43 MiB/s, done.
Total 18 (delta 12), reused 0 (delta 0)
remote: Resolving deltas: 100% (12/12), completed with 9 local objects.
remote:
remote: Create a pull request for 'bug-12345' on GitHub by visiting:
remote:      https://github.com/YourUsername/revolution/pull/new/bug-12345
remote:
To github.com:YourUsername/revolution.git
 * [new branch]      bug-12345 -> bug-12345
````

See that helpful link there to create a pull request? When you're happy with your work, click it to immediately go and create a pull request.

## Step 4: create a Pull Request

> If you didn't follow the "create a pull request" link from the previous step, you can also navigate your fork on GitHub, select the branch on the Code tab, and click on the Pull Request or Compare links in the gray bar below the branch selector.

When creating the pull request, make sure that the _Base Repository_ is set to `modxcms/revolution` and that the _base_ is set to the branch you chose as your base branch before. GitHub does not always pre-select the right base branch automatically.

The _head repository_ and _head_ need to point to your changes, which should be prefilled.

Click the big green button to create the pull request to get to the prefilled pull request template. Please fill that out completely to make sure the reviewers have all the information they need. Especially instructions on how to test your contribution and any relevant issues is important to have in one place.

## Step 5: see it through until the merge

When you've created the pull request, it's out of your hands (mostly). It will now need to be reviewed by the core integrators and [testers](contribute/code/testing-pull-requests), which can sometimes take longer than we'd like.

Be sure to keep an eye on any comments or questions on your pull request, as it's possible we need some help to understand what you've done or that there are small tweaks that are needed. Of the pull requests that don't make it into the core, a very large portion ends up being closed because the author no longer responds to repeated requests for changes.

But when your pull request does get merged, congrats! :) You're now part of the permanent history of MODX, and a pretty awesome human being, too.

## Step 6: rinse and repeat

Especially the first pull request may feel like a lot of work. Filling out templates, git, base and head branches... it can be daunting.

That'll get easier with experience.

If you do get stuck (_especially_ when you're only just getting started!) please ask for help. [Slack](https://modxcommunity.slack.com/) ([request an invite here](https://modx.org)) is a useful place and is filled to the brim with enthusiastic people, including core developers and integrators.

Our shared goal is making MODX better, so your help in doing so - no matter how big or small - is greatly appreciated.

## More information and tips

- New to git and github entirely? [See this page for more generic information](contribute/code/git-github) and [common git commands/scenarios](contribute/code/git-github/frequent-commands).
    - There's also a plethora of online resources, such as [GitHub's Git Handbook](https://guides.github.com/introduction/git-handbook/), [cheatsheets](https://training.github.com/), and [interactive git branching demos](https://learngitbranching.js.org/).
    - While there are also user interfaces for git (including built-in in many code editors), if you're completely new, it may be better to first learn git on the terminal. Once you've got a grasp of the concept, you can transfer knowledge of git on the terminal to a visual user interface quite easily, but the other way around is more tricky.
- Want to know how your pull request is reviewed? [Learn more about testing pull requests](contribute/code/testing-pull-requests).
- [Coding standards can be found here](contribute/code/coding-standards). Generally speaking, stick to the coding standards used in the code you're editing.

## What are the chances of a pull request getting accepted?

Generally, pretty high, but the core integrators do review pull requests carefully. Once a pull request is accepted, it becomes official and will need to be maintained for the foreseeable future, so integrators can sometimes be careful.

To improve your odds:

- One fix or feature per pull request.
- Be responsive if questions are asked or changed are requested.
- Be respectful. We're all volunteering our time here.
- Make sure there's consensus before doing the work, especially when it comes to new features. Has it been extensively discussed before, and if so what was the outcome of that? Different people may have different ideas, but we only have one core.
