---
title: "PollsPrevious"
_old_id: "954"
_old_uri: "revo/polls/polls.pollsprevious"
---

## Description

With this snippet you're able to create a view for the poll questions and answers wich you have created in the manager but which are not published or active (or at least not latest) anymore. You can create two pairs of chunks; one pair of two chunks for the voting form and one pair of two chunks for the result view after you voted. Read down below how the templates are working and see what parameters could be set.

## Usage

The PollsLatest snippet can be used simple putting this tag in your template or resource content

``` php
[[!PollsPrevious]]
```

For parameter usage, please see the table below

## Available properties

### Template properties

| Name      | Description                                                                | Default                 |
| --------- | -------------------------------------------------------------------------- | ----------------------- |
| tplOuter  | (Optional) An optional outer template could be set to surround the output  |                         |
| tpl       | The question template, default used the pollsLatestResultOuter             | pollsLatestResultOuter  |
| tplAnswer | The answer template per question, default used the pollsLatestResultAnswer | pollsLatestResultAnswer |

### Selection properties

| Name       | Description                                                                                                                            | Default |
| ---------- | -------------------------------------------------------------------------------------------------------------------------------------- | ------- |
| category   | (Optional) Will select the latest poll from the given category (id). Could be multiple by given a comma seperated list of category ids |         |
| unpubOnly  | (Optional) Will show unpublished polls only                                                                                            | 0       |
| showHidden | (Optional) Will show hidden polls too                                                                                                  | 0       |
| sortby     | (Optional) To influence the normal order, order could be any field in list                                                             | id      |
| sortdir    | (Optional) To influence the normal order direction                                                                                     | DESC    |
| limit      | (Optional) To limit the results.Compatibility for getPage (paging)                                                                     |         |
| offset     | (Optional) To set the offset, to start selecting from.Compatibility for getPage (paging)                                               | 0       |
| totalVar   | (Optional) Set the name of the total count of questions. Compatibility for getPage (paging)                                            | total   |

Note: the sort options are normally not need to change!

### Linking properties

| Name           | Description                                                                                | Default |
| -------------- | ------------------------------------------------------------------------------------------ | ------- |
| resultResource | (Optional) When set to a resource id, this resource will be used to show the poll results  |         |
| resultLinkVar  | (Optional) When using resultResource, this is the parametername the snippet is looking for | poll    |

## Template placeholders

Within the templates for this snippet you can use the following placeholders to generate your view.

### tplVote

| Placeholder             | Description                                                                           |
| ----------------------- | ------------------------------------------------------------------------------------- |
| \[\[+id\]\]             | The question id of the current poll view                                              |
| \[\[+question\]\]       | The question text                                                                     |
| \[\[+publishdate\]\]    | The publishdate of the question                                                       |
| \[\[+unpublishdate\]\]  | The unpublishdate of the question                                                     |
| \[\[+totalVotes\]\]     | The total number of votes on this poll                                                |
| \[\[+category\_name\]\] | The name of the poll category _(only availbale when using the category property)_     |
| \[\[+results\_url\]\]   | The URL of the results view _(only available when using the resultResource property)_ |
| \[\[+answers\]\]        | Contains the output of the answers generated for this poll question                   |

### tplVoteAnswers

| Placeholder      | Description                                           |
| ---------------- | ----------------------------------------------------- |
| \[\[+id\]\]      | The id of the answer record                           |
| \[\[+idx\]\]     | The loop number of the answers list (start: 1)        |
| \[\[+answer\]\]  | The answer text                                       |
| \[\[+votes\]\]   | The number of votes for this answer                   |
| \[\[+percent\]\] | The percentage of the number of votes for this answer |

Note: for the results view of this snippet, the same placeholders as above are available, including this extra one.

| Placeholder      | Description                                                           |
| ---------------- | --------------------------------------------------------------------- |
| \[\[+logdate\]\] | The datetime of the vote of the current visitor (based on IP address) |

## Examples

The default call of this snippet returns a basic view of the poll-vote and poll-results. You can change above parameters to create your own (also possible by propertysets).

``` php
[[!PollsLatest? &tplVote=`myVoteOuter` &tplVoteAnswer=`myVoteAnswer`]]
```

To select the latest poll from a category, specify the category parameter

``` php
[[!PollsLatest? &category=`1`]]
```

Selecting latest questions from multiple given id's

``` php
[[!PollsLatest? &category=`1,3,5`]]
```