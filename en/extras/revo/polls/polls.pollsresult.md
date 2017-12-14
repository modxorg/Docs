---
title: "Polls.PollsResult"
_old_id: "955"
_old_uri: "revo/polls/polls.pollsresult"
---

<div>- [Description](#Polls.PollsResult-Description)
- [Usage](#Polls.PollsResult-Usage)
- [Available properties](#Polls.PollsResult-Availableproperties)
  - [Template properties](#Polls.PollsResult-Templateproperties)
  - [Linking properties](#Polls.PollsResult-Linkingproperties)
- [Template placeholders](#Polls.PollsResult-Templateplaceholders)
  - [tpl](#Polls.PollsResult-tpl)
  - [tplAnswers](#Polls.PollsResult-tplAnswers)
- [Examples](#Polls.PollsResult-Examples)

</div>Description
-----------

Shows the result of a given poll-id. This is basically the same as the view when voting by the PollsLatest snippet. Only this one could be viewed without having to vote.

Usage
-----

Too use this snippet, just simple add this tag to the template or your resource content.

```
<pre class="brush: php">
[[!PollsResult]]

```For some properties see the tables below.

Available properties
--------------------

### Template properties

<table><tbody><tr><th>Name   
</th><th>Description   
</th><th>Default   
</th></tr><tr><td>tpl   
</td><td>The main result template for the poll view</td><td>pollsLatestResultOuter   
</td></tr><tr><td>tplAnswer</td><td>The result template for the answers inside the outer view</td><td>pollsLatestResultAnswer   
</td></tr></tbody></table>### Linking properties

<table><tbody><tr><th>Name   
</th><th>Description   
</th><th>Default   
</th></tr><tr><td>resultLinkVar   
</td><td>(Optional) When using resultResource on PollsLatest, this is the same paramatername the snippet is looking for</td><td>poll   
</td></tr></tbody></table>Template placeholders
---------------------

Within the templates for this snippet you can use the following placeholders to generate your view.

### tpl

<table><tbody><tr><th>Placeholder   
</th><th>Description   
</th></tr><tr><td>\[\[+id\]\]   
</td><td>The question id of the current poll view   
</td></tr><tr><td>\[\[+question\]\]   
</td><td>The question text   
</td></tr><tr><td>\[\[+totalVotes\]\]   
</td><td>The total number of votes on this poll   
</td></tr><tr><td>\[\[+category\_name\]\]   
</td><td>The name of the poll category _(only availbale when using the category property)_  
</td></tr><tr><td>\[\[+answers\]\]   
</td><td>Contains the output of the answers generated for this poll question   
</td></tr></tbody></table>### tplAnswers

<table><tbody><tr><th>Placeholder   
</th><th>Description   
</th></tr><tr><td>\[\[+id\]\]   
</td><td>The id of the answer record   
</td></tr><tr><td>\[\[+answer\]\]   
</td><td>The answer text   
</td></tr><tr><td>\[\[+votes\]\]   
</td><td>The number of votes for this answer   
</td></tr><tr><td>\[\[+percent\]\]   
</td><td>The percentage of the number of votes for this answer   
</td></tr><tr><td>\[\[+logdate\]\]</td><td>The datetime of the vote of the current visitor (based on IP address)</td></tr></tbody></table>Examples
--------

The basic call for this snippet is without any properties. You can create a propertyset also.

```
<pre class="brush: php">
[[!PollsResult? &tpl=`myVoteOuter` &tplAnswer=`myVoteAnswer` &resultLinkVar=`myPoll`]] 

```