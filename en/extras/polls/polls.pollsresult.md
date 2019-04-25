---
title: "PollsResult"
_old_id: "955"
_old_uri: "revo/polls/polls.pollsresult"
---

## Description

Shows the result of a given poll-id. This is basically the same as the view when voting by the PollsLatest snippet. Only this one could be viewed without having to vote.

## Usage

Too use this snippet, just simple add this tag to the template or your resource content.

``` php
[[!PollsResult]]
```

For some properties see the tables below.

## Available properties

### Template properties

| Name      | Description                                               | Default                 |
| --------- | --------------------------------------------------------- | ----------------------- |
| tpl       | The main result template for the poll view                | pollsLatestResultOuter  |
| tplAnswer | The result template for the answers inside the outer view | pollsLatestResultAnswer |

### Linking properties

| Name          | Description                                                                                                    | Default |
| ------------- | -------------------------------------------------------------------------------------------------------------- | ------- |
| resultLinkVar | (Optional) When using resultResource on PollsLatest, this is the same paramatername the snippet is looking for | poll    |

## Template placeholders

Within the templates for this snippet you can use the following placeholders to generate your view.

### tpl

| Placeholder          | Description                                                                       |
| -------------------- | --------------------------------------------------------------------------------- |
| `[[+id]]`            | The question id of the current poll view                                          |
| `[[+question]]`      | The question text                                                                 |
| `[[+totalVotes]]`    | The total number of votes on this poll                                            |
| `[[+category_name]]` | The name of the poll category _(only availbale when using the category property)_ |
| `[[+answers]]`       | Contains the output of the answers generated for this poll question               |

### tplAnswers

| Placeholder    | Description                                                           |
| -------------- | --------------------------------------------------------------------- |
| `[[+id]]`      | The id of the answer record                                           |
| `[[+answer]]`  | The answer text                                                       |
| `[[+votes]]`   | The number of votes for this answer                                   |
| `[[+percent]]` | The percentage of the number of votes for this answer                 |
| `[[+logdate]]` | The datetime of the vote of the current visitor (based on IP address) |

## Examples

The basic call for this snippet is without any properties. You can create a propertyset also.

``` php
[[!PollsResult?
  &tpl=`myVoteOuter`
  &tplAnswer=`myVoteAnswer`
  &resultLinkVar=`myPoll`
]]
```
