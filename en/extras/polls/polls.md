---
title: "Polls"
_old_id: "952"
_old_uri: "revo/polls/polls.polls"
---

## Description

With this snippet you're able to create a view for a single poll question and answers wich you have created in the manager. You can create two pairs of chunks; one pair of two chunks for the voting form and one pair of two chunks for the result view after you voted. Read down below how the templates are working and see what parameters could be set.

## Usage

The Polls snippet can be used simple putting this tag in your template or resource content

``` php
[[!Polls? &id=`your-question-id`]]
```

For parameter usage, please see the table below

## Available properties

### Template properties

| Name            | Description                                               | Default                 |
| --------------- | --------------------------------------------------------- | ----------------------- |
| tplVote         | The main form template for the latest poll view           | pollsLatestVoteOuter    |
| tplVoteAnswer   | The form template for the answers inside the main view    | pollsLatestVoteAnswer   |
| tplResult       | The main result template for the latest poll view         | pollsLatestResultOuter  |
| tplResultAnswer | The result template for the answers inside the outer view | pollsLatestResultAnswer |

### Selection properties

| Name | Description                                                 | Default |
| ---- | ----------------------------------------------------------- | ------- |
| id   | (Required) Will select the given poll by id of the question |         |

### Linking properties

| Name           | Description                                                                                | Default |
| -------------- | ------------------------------------------------------------------------------------------ | ------- |
| resultResource | (Optional) When set to a resource id, this resource will be used to show the poll results  |         |
| resultLinkVar  | (Optional) When using resultResource, this is the parametername the snippet is looking for | poll    |

## Template placeholders

Within the templates for this snippet you can use the following placeholders to generate your view.

### tplVote

| Placeholder          | Description                                                                           |
| -------------------- | ------------------------------------------------------------------------------------- |
| `[[+id]]`            | The question id of the current poll view                                              |
| `[[+question]]`      | The question text                                                                     |
| `[[+publishdate]]`   | The publishdate of the question                                                       |
| `[[+unpublishdate]]` | The unpublishdate of the question                                                     |
| `[[+totalVotes]]`    | The total number of votes on this poll                                                |
| `[[+category_name]]` | The name of the poll category _(only availbale when using the category property)_     |
| `[[+results_url]]`   | The URL of the results view _(only available when using the resultResource property)_ |
| `[[+answers]]`       | Contains the output of the answers generated for this poll question                   |

### tplVoteAnswers

| Placeholder    | Description                                           |
| -------------- | ----------------------------------------------------- |
| `[[+id]]`      | The id of the answer record                           |
| `[[+idx]]`     | The loop number of the answers list (start: 1)        |
| `[[+answer]]`  | The answer text                                       |
| `[[+votes]]`   | The number of votes for this answer                   |
| `[[+percent]]` | The percentage of the number of votes for this answer |

Note: for the results view of this snippet, the same placeholders as above are available, including this extra one.

| Placeholder    | Description                                                           |
| -------------- | --------------------------------------------------------------------- |
| `[[+logdate]]` | The datetime of the vote of the current visitor (based on IP address) |

## Examples

The default call of this snippet returns a basic view of the poll-vote and poll-results. You can change above parameters to create your own (also possible by propertysets).

``` php
[[!Polls? &id=`your-question-id`]]
```

It's also possible to create a TV with input type "Polls question list" and use that inside the &id parameter, to make it easier to edit for non-developers

``` php
[[!Polls? &id=`[[*yourPollsTVname]]`]]
```
