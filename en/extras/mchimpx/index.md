---
title: "mChimpX"
description: "mChimpX extra"
---

## What is mChimpX?

A FormIt hook provided to subscribe an email address to your Mailchimp list. Fully configurable.

_This extra stable works with Maichimp API 2.0 support (only 1.x versions support has been stopped), 3.0 version will be implemented soon._

mChimpX is created by [Bert Oost](http://oostdesign.nl).

## Requirements

mChimpX requires MODX® Revolution 2.4 or later.

## History

| Version     | Release date | Author                                                                      | Changes                       |
| ----------- | ------------ | --------------------------------------------------------------------------- | ----------------------------- |
| 1.0.0-rc1   | Dec 28, 2011 | [Bert Oost](mailto:bert@oostdesign.nl) ([OostDesign](http://OostDesign.nl)) | Initial release.              |
| 2.0.0-alpha | Apr 10, 2019 | [Oleg Pryadko](mailto:oleg@websitezen.com)                                  | Mailchimp API 2.0 support     |
| 2.1.0       | May 05, 2019 | [Anton Tarasov](https://antontarasov.com)                                   | Further maintenance & support |

## Download & Installation

Install the package through the MODX® package manager.

## Example snippet call

```php
[[!FormIt?
  &hooks=`mChimpXSubscribe`
  &mcApiKey=`xxxxxx5229a6a84acd58xxxxxx210ax-us11`
  &mcListId=`yyyyyyyyyyy`
  &mcEmailField=`EMAIL`
  &mcMergeTags=`FNAME:FNAME,LNAME:LNAME,BIRTHDATE:BIRTHDATE,CODE:CODE,SOURCE:SOURCE`
  &mcDoubleOptin=`1`
  &mcDebug=`true`
  &mcUpdateExisting=`0`
  &mcFailOnAlreadySubscribed=`1`
  &mcFailOnNotSubscribed=`1`
  &mcFailOnMissingRequired=`1`
]]
```

## Possible options which can be added to the FormIt tag

| Parameter    | Description                                                                                                                       |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------- |
| mcApiKey     | [optional] The Mailchimp API Key (can be also specified via system setting `mcApiKey`)                                            |
| mcListId     | [optional] The Mailchimp list id to subscribe to (can be also specified via system setting `mcListId`)                            |
| mcEmailField | The name of the email field in the form. Default: `email`.                                                                        |
| mcMergeTags  | The merge tags of Mailchimp combined with the form fields. Default: `FNAME:firstname,LNAME:lastname,FULLNAME:firstname:lastname`. |

## Subscribe parameters

| Parameter          | Description                                                                                                                                                                                                                                       |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| mcEmailType        | Email type preference for the email (html, text, or mobile).Default: `html`.                                                                                                                                                                      |
| mcDoubleOptin      | To control whether a double opt-in confirmation message is sent. Default: `1`                                                                                                                                                                     |
| mcUpdateExisting   | To control whether a existing subscribers should be updated instead of throwing and error. Default: `0`.                                                                                                                                          |
| mcReplaceInterests | To determine whether we replace the interest groups with the groups provided, or we add the provided groups to the member's interest groups. Default: `1`.                                                                                        |
| mcSendWelcome      | if your double*optin is false and this is true, we will send your lists Welcome Email if this subscribe succeeds - this will \_not* fire if we end up updating an existing subscriber. If double_optin is true, this has no effect. Default: `0`. |

## Error parameters

| Parameter                 | Description                                                            |
| ------------------------- | ---------------------------------------------------------------------- |
| mcDebug                   | Debug messages in MODX error log, when needed.Default: `0`.            |
| mcFailOnApiKey            | Return API key errors to the front-end form. Default: `0`              |
| mcFailOnListNotExists     | Return 'list not exists' error to the front-end form. Default: `0`.    |
| mcFailOnAlreadySubscribed | Return 'already subscribed' error to the front-end form. Default: `0`. |
| mcFailOnNotSubscribed     | Return 'not subscribed' error to the front-end form. Default: `0`.     |
| mcFailOnMissingRequired   | Return 'missing required' error to the front-end form.. Default: `0`.  |

## Official Documentation

<https://docs.modx.com/current/en/extras/mchimpx>
