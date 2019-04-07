---
title: "Hooks"
_old_id: "920"
_old_uri: "revo/mhpaypal/mhpaypal.snippet-usage/mhpaypal.snippet-usage.hooks"
---

# Hooks

_This document provides information on the mhPayPal snippet hooks, its properties and some example usages. If looking for more information about the mhPayPal package in which the snippet is included, please visit_ [?mhPayPal](extras/mhpaypal "mhPayPal") _instead. If you are looking for more information on the mhPayPal snippet itself, please visit ?__[mhPayPal.Snippet Usage](extras/mhpaypal/mhpaypal.snippet-usage "mhPayPal.Snippet Usage")__._

## Introduction

By means of the &preHooks, &postHooks and &postPaymentHooks, the mhPayPal snippet allows you to customize the flow and add functionality to the mhPayPal core, without having to wreck upgrade paths.

A hook is either included in mhPayPal or is a snippet installed in your MODX set up.

## Built-in Hooks

### email, email2

The email and email2 hooks do exactly the same, allowing you to send out two entirely different emails to different emailaddresses. They both support the same properties and its behavior is the same.

You assign the properties mentioned below to the mhPayPal snippet itself.

When using the email2 hook, make sure to append a "2" to the property, eg emailTo becomes emailTo2.

| &property     | Description                                                                                                                                                             | Default value                    | Version |
| ------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------- | ------- |
| emailTpl      | \[string\] Name of a chunk to use for the email contents.                                                                                                               | mhPayPalEmail (file-based)       | 1.1.0   |
| emailSubject  | \[string\] The subject of the email to send. Can include all properties included in the data returned.                                                                  | Thank you for your Donation!     | 1.1.0   |
| emailTo       | \[string\] Comma separated list of emails to send the email to. Can use \[\[+email\]\] in this property, which will be replaced with the email as received from PayPal. | The "emailsender" system setting | 1.1.0   |
| emailCC       | \[string\] Comma separated list of emails to CC the email to.                                                                                                           |                                  | 1.1.0   |
| emailBCC      | \[string\] Comma separated list of emails to BCC the email to.                                                                                                          |                                  | 1.1.0   |
| emailFrom     | \[string\] Email address to set up as "from" email.                                                                                                                     | The "emailsender" system setting | 1.1.0   |
| emailFromName | \[string\] The name to attach to the "from" email.                                                                                                                      | The "site\_name" system setting. | 1.1.0   |

### Redirect

The redirect hook can be used to redirect the user to a different page. You would most likely want to do this after the payment was completed, by sending the user to a different "Thank you" style page.

| &property       | Description                                                                                                                                                                            | Default value                                | Version |
| --------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------- | ------- |
| redirectTo      | \[integer                                                                                                                                                                              | string\] Either a resource ID or a full URL. |         | 1.1.0 |
| redirectParams  | \[JSON string\] A JSON style string with extra parameters you want to add to the URL. Only used if redirectTo is a resource ID.                                                        |                                              | 1.1.0   |
| redirectContext | \[string\] The key of the context to use in building the URL if redirectTo is a resource ID.                                                                                           | Current context                              | 1.1.0   |
| redirectScheme  | Any valid value for the [modX::makeUrl](developing-in-modx/other-development-resources/class-reference/modx/modx.makeurl "modX.makeUrl") scheme, indication what kind of url to build. | link\_tag\_scheme setting or -1              | 1.1.0   |

## Developing Custom Hooks

Custom hooks may not yet be fully implemented, but will be in a future release.

Simply call a snippet in one of the hooks properties, and it will be executed.

Available in the $scriptProperties and as $variables are all the data available at that point. Configuration properties. $mhpp class.

### Examples

Nothing yet. Sorry!

## More Documentation

- [mhPayPal.Snippet Usage](extras/mhpaypal/mhpaypal.snippet-usage "mhPayPal.Snippet Usage")