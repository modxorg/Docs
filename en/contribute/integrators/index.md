---
title: "Core Integration"
sortorder: 6
note: "This section of the documentation is intended for the core integrators."
---

- [GitHub CLI](https://cli.github.com/)

## Merging process

ALL PRs should ultimately be merged using the Squash and Merge feature in GitHub, and making sure that the squashed commit message is a changelog-ready entry for the contribution, including the PR reference in parentheses at the end. e.g. `Fix parsing long template tags under some conditions (#16316)`

But getting the PR ready for this squash and merge is the key.

### Case 1: Simple PRs that do not affect compiled assets (js/css)

In this case, assuming the PR passes CI, we can simply hit the green Squash and Merge button. 

To test and review locally, you can use `gh pr checkout` prior to doing this to test and review locally. The benefit of using the Squash and Merge button though, it that it automatically uses the PR title for the commit message on the squashed commit.


### Case 2: PRs that affect compiled assets

After making sure your local base branch for the PR is up-to-date and doing a `gh pr checkout` on a PR that affects any compiled assets (touch any scss/css, or affect the list of compressed js assets which you can find listed in `_build/templates/default/gruntfile.js` within the `coreJSFiles` variable), before testing and reviewing, you will need to **rebase said PR on top of the base branch**, e.g. `git rebase 3.x` if the PR targets the 3.x branch. 

Then run the `grunt build` in the `_build/templates/default` directory and proceed to test the PR. 

When done, you will need to **force push the rebased commits** along with the grunt build commit to the PR branch. Wait for the CI process to pass and then proceed as in Case 1 by using the Squash and Merge process.

**If the PR requires further work by the contributor, do not force push to avoid causing issues with their local branches.** Only force push changes to prepare the PR for the merge.

## Backporting fixes

Any fixes that need to be backported (eg from 3.x to 3.0.x) are cherry-picked.

### No compiled changes

PRs **without compiled changes** can be cherry-picked from the **squashed commit**

### With compiled changes

PRs **with compiled changes** need each individual original commit cherry-picked, and then run the build again to push as a separate commit. 

````bash
git cherry-pick -n commitHash1 commitHash2 ...
cd _build/templates/default && grunt build && cd ../../../
git add -u
git commit
````
