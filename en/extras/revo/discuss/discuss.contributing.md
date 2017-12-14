---
title: "Discuss.Contributing"
_old_id: "812"
_old_uri: "revo/discuss/discuss.contributing"
---

Discuss is maintained on Github, at <http://github.com/modxcms/Discuss>.

Branching Strategy
------------------

Discuss follows the general guidelines of MODX ['A GitHub-based branching strategy for collaborative development'](/community/contribute/using-git-and-github/community-contributors-guide "Community Contributor's Guide")

When contributing to Discuss, please keep the following branching strategy in mind:

1. The main branch to work against is the develop branch.
2. The main branch for the MODX forums and its custom theme is theme-modx
3. Specific new features or bugfixes should be developed in a feature branch (eg feature-livechat or bug-3532), and merged to develop when done and tested.

It is important to differentiate between the core of discuss, and themes. All discuss core changes should always be done against the develop branch and never against release, theme, or master branches; this changed on 16th of July 2013. Basically every theme branch should be a fork of the core (release) branch and be updated with that regularly through a merge.