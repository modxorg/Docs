---
title: "Reporting and triaging issues"
_old_id: "1130"
_old_uri: "contribute/filing-and-discussing-issues"
sortorder: 3
---

Bug reports and feature requests for MODX are handled through issues on GitHub. There are a few noteworthy issue trackers in use:

- [modxcms/revolution](https://github.com/modxcms/revolution/issues) covers MODX Revolution itself (both 2.x and 3.x) and is the primary place for reporting issues.
- [modxcms/xpdo](https://github.com/modxcms/xpdo/issues) covers xPDO specifically. 
- [modxorg/Docs](https://github.com/modxorg/Docs/issues) handles issues with the content of the documentation.

(Note that extras typically have their own repository or issue tracker, and they should **not** be reported in the above repositories for the core.)

For each of these issue trackers, there are 2 very worthwhile ways to contribute&mdash;especially for non-developers!

1. Report bugs or issues are logged in sufficient detail in the right place. Discussing problems in the forum is great, however if that points to a bug in the core it should get logged as an issue. This makes sure there's a single place that developers can look at it, when they want to know what needs their help.
2. Triaging issues, which means making sure the issues in the tracker are valid, and detailed. There are plenty of reported issues that are vague, or actually support requests rather than a specific report, and by triaging we can keep the list of issues useful.  

Below, we'll discuss each activity in a bit more detail. 

## Reporting issues

When you've stumbled across a bug, making sure it's reported in the right place goes a long way to making sure it gets resolved. 

1. Start by choosing the right repository. If you're dealing with a bug in an Extra, you'll want to find the issue tracker for that specific extra. 
2. On the Issues tab, use the search to make sure it's not already a known issue. If you're not finding anything, make sure to also try other spelling or names (e.g. "acl" or "permission"). Search for part of error messages. While you're primarily looking for _Open_ issues, a quick look in the _Closed_ tab can also surface issues that have already been resolved in the currently in-development version. 
3. If you haven't found a new issue, hit that green New Issue button at the top right in the Issues tab. 
4. When asked, choose the right template. 
5. **Fill out all the information that the issue template asks for**. Please do not remove the template and fill things out differently. Most important are (for bug reports) having clear steps to reproduce, the observed behavior, and the environment. Always include specific version numbers instead of things like "latest. 
    - If you're seeing an error message, **include the full error message** and backtrace if you have it (you may, of course, censor your specific paths or other privileged information).
    - If you're not seeing an error message when reporting a bug, try to find out. Look at your MODX error log (via System > Reports > Error log), in the browsers' developer console, and in server error logs typically accessible via a server control panel. Having an error message is incredibly useful to resolve an issue. 
    - If there has been a discussion on the forum relevant to the bug or feature request, include the link to the thread. That may provide a necessary background for the issue. 
6. Submit! :)

After reporting an issue, it'll usually get triaged pretty soon, which means someone with access gives it some labels, assigns a milestone, or asks for more information if needed.

## Triaging issues

Triaging issues basically means reviewing an issue and making sure it's complete and actionable. If you have access, it can also include labelling or assigning milestones to improve the way things are organised. 

If you're not a seasoned core developer, the most impactful thing you can do is verify an issue is reproducible. Follow the provided steps to reproduce the issue, and confirm that the explained behavior happens. If you're also able of adding more detail to an issue (for example, the issue does/doesn't happen on other PHP or MODX versions), that can also be helpful in identifying a root cause and getting it fixed. 

Should you find that an issue cannot be reproduced with the provided information: respectfully ask the reporter for more information. In some cases an issue may have already been resolved since the issue was created (look for any other issues or pull requests that have been linked in the activity), or there may be some as-of-yet undefined factor in reproducing the problem. 

If the issue is clearly resolved, the issue can be closed. Comment `@modxbot close` (if you have access to modxbot), or comment stating you propose closing the issue so someone else with access can do that for you. 

### Getting access to @modxbot

Through `@modxbot`, individual contributors can be given access to manage issues. Access to these commands are handed out by Jason (`@opengeek`) and/or John (`@theboxer`). 

If you'd like to get this access, the first step is to show activity and good judgement. 

By making the right calls on issues over a certain period of time, you prove to understand the process and what makes a good issue (or not) which is a prerequisite to getting increased access. Once you've built up a good reputation, you'll probably get it offered and don't even have to ask. 

## Reporting Security issues

Please note that any active security issues should **never be reported on a public forum**. If there's a chance that by sharing public information about a security vulnerability causes exploitation of the issue to increase before a fix is available, that would be a Very Bad Thing(tm). 

Please responsibly disclose security issues via email to: security@modx.com. That will make its way to a private group of core integrators acting as the security team. They will review it and start working on a patch if the report is valid. 

The following are not considered vulnerabilities:

- Server (mis)configurations
- Entering scripts somewhere in the manager (resource, templates), causing those scripts to be executed in the front-end. MODX is a CMS, and managing content and templating is a core tenant of that, so that's quite literally a feature, and not a bug.

While you're more than welcome to alert the security team of vulnerabilities in extras, those should typically be sent directly to the maintainer of that extra. The security team cannot typically fix issues in extras. 

At this time there's no formal bug bounty program. 


---



Please file issues for the appropriate project in the issues section at Github: <https://github.com/modxcms/>

Issues that the community can initiate or collaborate on include:

- bugs in MODX (Evolution and Revolution) and some Extras
- feature requests for MODX (Evolution and Revolution) and some Extras
- reports of bugs or problems with various MODX websites or parts thereof

Many feature requests and bug reports stem originally from discussions in the forums. If you are filing a bug report or feature request for which there is forum discussion, please include a link to the forum thread.

Dialog around your bugs and features is very helpful especially when the solution is not clear-cut. Ultimately, contributors and the code integration team working on bug fixes and features will use the issue tracker as the first, and possibly only, source of information on the problem. If there is no link to additional information, that information may never play a role in solving your bug or getting a new feature developed.
