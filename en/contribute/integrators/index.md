---
title: "Core Integration"
sortorder: 6
note: "This section of the documentation is intended for the core integrators."
---

- [GitHub CLI](https://cli.github.com/)

## Merging process

ALL PRs should be merged using the Squash and Merge feature in GitHub, ensuring that the squashed commit message is a changelog-ready entry for the contribution, including the PR reference in parentheses at the end. e.g. `Fix parsing long template tags under some conditions (#16316)`

Getting the PR ready for this squash and merge process is the key.

### Case 1: PRs that do not affect compiled assets (js/css)

Assuming the PR passes CI, we can simply hit the green Squash and Merge button, ensuring that the commit message is changelog-ready when doing so. This should ONLY be done after reviewing and testing the changes locally.

To test and review locally, you can use `gh pr checkout` and simply discard the branch when done unless simple adjustments need to be made before merging the changes. If changes are necessary, they can be added and pushed as an additional commit to the PR branch, and the squash and merge can be done when CI completes following the push.


### Case 2: PRs that affect compiled assets

For any PR that affects compiled assets (touches any scss/css or affects the list of compressed js assets which you can find listed in `_build/templates/default/gruntfile.js` within the `coreJSFiles` variable), make sure your local copy of the base branch for the PR is up-to-date and then checkout the PR branch with `gh pr checkout`. **Before** testing and reviewing, you must **rebase said PR on top of the base branch**, e.g. `git rebase 3.x` if the PR targets the 3.x branch. Then run the `grunt build` in the `_build/templates/default` directory, commit the compiled assets in a separate commit with the message "grunt build" and proceed to test the PR. Any additional changes that the integrator determines should be applied before merging can be committed at this point.

When done testing, you must **force push the rebased commits** including the grunt build commit and any additional changes, to the PR branch. Wait for the CI process to pass and proceed as in Case 1 by using the Squash and Merge process.

**If the PR requires further work by the contributor, do not force push to avoid causing issues with their local branches.** Only force push changes to the PR when it is ready to merge.

## Porting or Back-porting changes

Any fixes that need to be ported (e.g. 3.0.x to 3.x) or back-ported (e.g. from 3.x to 3.0.x) are cherry-picked. If the cherry-picked commits cannot be applied cleanly or resulting conflicts cannot be easily resolved, it is recommended that a new PR be created to address the changes to be ported.

### No compiled changes

PRs **without compiled changes** can be cherry-picked from the **squashed commit** to retain the original commit message.

### With compiled changes

PRs **with compiled changes** need each of the original commits to be cherry-picked, the grunt build executed against the changes, and pushed as a single commit with the original commit message from the squashed commit. 

````bash
git cherry-pick -n commitHash1 commitHash2 ...
cd _build/templates/default && grunt build && cd ../../../
git add -u
git commit -m "Original PR commit message (#12345)"
````

### Pushing ported changes

If confidence is high, the single commit containing the cherry-picked changes can then be pushed directly to the target branch. If there is concern that the ported changes may cause problems on the target branch, it can be submitted as a new PR by checking out a new branch and pushing it to your fork. Then once CI or additional testing is completed on the PR, it can be squashed and merged as in Case 1, so long as no changes are applied to the target branch in the interim.
