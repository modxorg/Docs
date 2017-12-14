---
title: "Polls.PollsLatest"
_old_id: "953"
_old_uri: "revo/polls/polls.pollslatest"
---

<div>- [Description](#Polls.PollsLatest-Description)
- [Usage](#Polls.PollsLatest-Usage)
- [Available properties](#Polls.PollsLatest-Availableproperties)
  - [Template properties](#Polls.PollsLatest-Templateproperties)
  - [Selection properties](#Polls.PollsLatest-Selectionproperties)
  - [Linking properties](#Polls.PollsLatest-Linkingproperties)
- [Template placeholders](#Polls.PollsLatest-Templateplaceholders)
  - [tplVote](#Polls.PollsLatest-tplVote)
  - [tplVoteAnswers](#Polls.PollsLatest-tplVoteAnswers)
- [Examples](#Polls.PollsLatest-Examples)
 
</div>Description
-----------

 With this snippet you're able to create a view for the poll questions and answers wich you have created in the manager. You can create two pairs of chunks; one pair of two chunks for the voting form and one pair of two chunks for the result view after you voted. Read down below how the templates are working and see what parameters could be set.

Usage
-----

 The PollsLatest snippet can be used simple putting this tag in your template or resource content

 ```
<pre class="brush: php">
[[!PollsLatest]]

``` For parameter usage, please see the table below

Available properties
--------------------

### Template properties

 <table><tbody><tr><th> Name   
</th> <th> Description   
</th> <th> Default   
</th> </tr><tr><td> tplVote </td> <td> The main form template for the latest poll view </td> <td> pollsLatestVoteOuter </td> </tr><tr><td> tplVoteAnswer   
</td> <td> The form template for the answers inside the main view </td> <td> pollsLatestVoteAnswer   
</td> </tr><tr><td> tplResult   
</td> <td> The main result template for the latest poll view </td> <td> pollsLatestResultOuter   
</td> </tr><tr><td> tplResultAnswer   
</td> <td> The result template for the answers inside the outer view </td> <td> pollsLatestResultAnswer   
</td></tr></tbody></table>### Selection properties

 <table><tbody><tr><th> Name   
</th> <th> Description   
</th> <th> Default   
</th> </tr><tr><td> category   
</td> <td> (Optional) Will select the latest poll from the given category (id). Could be multiple by given a comma seperated list of category ids </td> <td> </td> </tr><tr><td> sortby   
</td> <td> (Optional) To influence the normal order, order could be any field in list </td> <td> id   
</td> </tr><tr><td> sortdir   
</td> <td> (Optional) to influence the normal order direction </td> <td> DESC   
</td></tr></tbody></table> Note: the sort options are normally not need to change!

### Linking properties

 <table><tbody><tr><th> Name   
</th> <th> Description   
</th> <th> Default   
</th> </tr><tr><td> resultResource   
</td> <td> (Optional) When set to a resource id, this resource will be used to show the poll results </td> <td> </td> </tr><tr><td> resultLinkVar   
</td> <td> (Optional) When using resultResource, this is the parametername the snippet is looking for </td> <td> poll   
</td></tr></tbody></table>Template placeholders
---------------------

 Within the templates for this snippet you can use the following placeholders to generate your view.

### tplVote

 <table><tbody><tr><th> Placeholder   
</th> <th> Description   
</th> </tr><tr><td> \[\[+id\]\]   
</td> <td> The question id of the current poll view   
</td> </tr><tr><td> \[\[+question\]\]   
</td> <td> The question text   
</td> </tr><tr><td> \[\[+publishdate\]\]   
</td> <td> The publishdate of the question   
</td> </tr><tr><td> \[\[+unpublishdate\]\]   
</td> <td> The unpublishdate of the question   
</td> </tr><tr><td> \[\[+totalVotes\]\]   
</td> <td> The total number of votes on this poll   
</td> </tr><tr><td> \[\[+category\_name\]\]   
</td> <td> The name of the poll category _(only availbale when using the category property)_   
</td> </tr><tr><td> \[\[+results\_url\]\]   
</td> <td> The URL of the results view _(only available when using the resultResource property)_   
</td> </tr><tr><td> \[\[+answers\]\]   
</td> <td> Contains the output of the answers generated for this poll question   
</td></tr></tbody></table>### tplVoteAnswer

 <table><tbody><tr><th> Placeholder   
</th> <th> Description   
</th> </tr><tr><td> \[\[+id\]\]   
</td> <td> The id of the answer record   
</td> </tr><tr><td> \[\[+idx\]\]   
</td> <td> The loop number of the answers list (start: 1)   
</td> </tr><tr><td> \[\[+answer\]\]   
</td> <td> The answer text   
</td> </tr><tr><td> \[\[+votes\]\]   
</td> <td> The number of votes for this answer   
</td> </tr><tr><td> \[\[+percent\]\]   
</td> <td> The percentage of the number of votes for this answer   
</td></tr></tbody></table> Note: for the results view of this snippet, the same placeholders as above are available, including this extra one.

 <table><tbody><tr><th> Placeholder   
</th> <th> Description   
</th> </tr><tr><td> \[\[+logdate\]\]   
</td> <td> The datetime of the vote of the current visitor (based on IP address)   
</td></tr></tbody></table>Examples
--------

 The default call of this snippet returns a basic view of the poll-vote and poll-results. You can change above parameters to create your own (also possible by propertysets).

 ```
<pre class="brush: php">
[[!PollsLatest? &tplVote=`myVoteOuter` &tplVoteAnswer=`myVoteAnswer`]]

``` To select the latest poll from a category, specify the category parameter

 ```
<pre class="brush: php">
[[!PollsLatest? &category=`1`]]

``` Selecting latest questions from multiple given id's

 ```
<pre class="brush: php">
[[!PollsLatest? &category=`1,3,5`]]

```