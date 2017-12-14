---
title: "mhPayPal.Snippet Usage.Hooks"
_old_id: "920"
_old_uri: "revo/mhpaypal/mhpaypal.snippet-usage/mhpaypal.snippet-usage.hooks"
---

_This document provides information on the mhPayPal snippet hooks, its properties and some example usages. If looking for more information about the mhPayPal package in which the snippet is included, please visit_ [?mhPayPal](/extras/revo/mhpaypal "mhPayPal") _instead. If you are looking for more information on the mhPayPal snippet itself, please visit ?__[mhPayPal.Snippet Usage](/extras/revo/mhpaypal/mhpaypal.snippet-usage "mhPayPal.Snippet Usage")__._

Introduction
------------

By means of the &preHooks, &postHooks and &postPaymentHooks, the mhPayPal snippet allows you to customize the flow and add functionality to the mhPayPal core, without having to wreck upgrade paths.

A hook is either included in mhPayPal or is a snippet installed in your MODX set up.

<div>- [Introduction](#mhPayPal.SnippetUsage.Hooks-Introduction)
- [Built-in Hooks](#mhPayPal.SnippetUsage.Hooks-BuiltinHooks)
  - [email, email2](#mhPayPal.SnippetUsage.Hooks-email%2Cemail2)
  - [Redirect](#mhPayPal.SnippetUsage.Hooks-Redirect)
- [Developing Custom Hooks](#mhPayPal.SnippetUsage.Hooks-DevelopingCustomHooks)
  - [Examples](#mhPayPal.SnippetUsage.Hooks-Examples)
- [More Documentation](#mhPayPal.SnippetUsage.Hooks-MoreDocumentation)

</div>Built-in Hooks
--------------

### email, email2

The email and email2 hooks do exactly the same, allowing you to send out two entirely different emails to different emailaddresses. They both support the same properties and its behavior is the same.

You assign the properties mentioned below to the mhPayPal snippet itself.

When using the email2 hook, make sure to append a "2" to the property, eg emailTo becomes emailTo2.

<table><tbody><tr><th>&property   
</th><th>Description   
</th><th>Default value   
</th><th>Version   
</th></tr><tr><td>emailTpl   
</td><td>\[string\] Name of a chunk to use for the email contents.   
</td><td>mhPayPalEmail (file-based)   
</td><td>1.1.0   
</td></tr><tr><td>emailSubject   
</td><td>\[string\] The subject of the email to send. Can include all properties included in the data returned.   
</td><td>Thank you for your Donation!   
</td><td>1.1.0   
</td></tr><tr><td>emailTo   
</td><td>\[string\] Comma separated list of emails to send the email to. Can use \[\[+email\]\] in this property, which will be replaced with the email as received from PayPal.   
</td><td>The "emailsender" system setting   
</td><td>1.1.0   
</td></tr><tr><td>emailCC   
</td><td>\[string\] Comma separated list of emails to CC the email to.</td><td> </td><td>1.1.0   
</td></tr><tr><td>emailBCC   
</td><td>\[string\] Comma separated list of emails to BCC the email to.</td><td> </td><td>1.1.0   
</td></tr><tr><td>emailFrom   
</td><td>\[string\] Email address to set up as "from" email.   
</td><td>The "emailsender" system setting</td><td>1.1.0   
</td></tr><tr><td>emailFromName   
</td><td>\[string\] The name to attach to the "from" email.   
</td><td>The "site\_name" system setting.   
</td><td>1.1.0   
</td></tr></tbody></table>### Redirect

The redirect hook can be used to redirect the user to a different page. You would most likely want to do this after the payment was completed, by sending the user to a different "Thank you" style page.

<table><tbody><tr><th>&property   
</th><th>Description   
</th><th>Default value   
</th><th>Version   
</th></tr><tr><td>redirectTo   
</td><td>\[integer|string\] Either a resource ID or a full URL.   
</td><td> </td><td>1.1.0   
</td></tr><tr><td>redirectParams   
</td><td>\[JSON string\] A JSON style string with extra parameters you want to add to the URL. Only used if redirectTo is a resource ID.   
</td><td> </td><td>1.1.0   
</td></tr><tr><td>redirectContext   
</td><td>\[string\] The key of the context to use in building the URL if redirectTo is a resource ID.   
</td><td>Current context   
</td><td>1.1.0   
</td></tr><tr><td>redirectScheme   
</td><td>Any valid value for the [modX::makeUrl](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.makeurl "modX.makeUrl") scheme, indication what kind of url to build.   
</td><td>link\_tag\_scheme setting or -1   
</td><td>1.1.0   
</td></tr></tbody></table>Developing Custom Hooks
-----------------------

// Custom hooks may not yet be fully implemented, but will be in a future release.

Simply call a snippet in one of the hooks properties, and it will be executed.

Available in the $scriptProperties and as $variables are all the data available at that point. Configuration properties. $mhpp class.

### Examples

Nothing yet. Sorry!

More Documentation
------------------

- [mhPayPal.Snippet Usage](/extras/revo/mhpaypal/mhpaypal.snippet-usage "mhPayPal.Snippet Usage")