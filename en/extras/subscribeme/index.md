---
title: "SubscribeMe"
_old_id: "723"
_old_uri: "revo/subscribeme"
note: "SubscribeMe is no longer supported and should not be used."
---

SubscribeMe is a MODX Revolution addon that you can use to offer premium content for a recurring payment. You can create products which are linked to one or more User Group + Role combinations. These permissions are then being set when subscribing (or actually when a payment comes in for that product, and it doesn't have the permission yet), and through the use of a plugin triggering on page requests they will be revoked when it has expired. It is also possible to create products without permissions, allowing you to simply mark a user account as a subscriber and exporting the data per product.

SubscribeMe is **not** a (premium) newsletter addon, though it could be used to limit access to your subscribe form.

SubscribeMe works with PayPal as payment processor, and only supports Recurring Payments which are set up through the API. There are no direct plans for other payment gateways, nor has the addon been abstracted in such a way to allow quick drop-in of other payment providers. As the addon is released as Open Source GNU GPL v2 or later and [the source is available on Github](https://github.com/Mark-H/SubscribeMe/), anyone looking to integrate other payment providers or abstract the system to allow that is invited to do so and give that back to the community.

This addon has been developed by Mark Hamstra and was made possible by Jared Loman Creative.

## 1. History, Source, Bugs & Feature Requests

~SubscribeMe 1.0.0-pl was released on Sept 29, 2011 and available as a Transport Package for MODX Revolution as well as on Github.~

**SubscribeMe is no longer supported or available.**

## 2. Getting Started

These resources should help you get started swiftly with SubscribeMe, monetizing your valuable content.

- Getting Started with the PayPal Sandbox
- [The SubscribeMe Checkout flow, and how to set it up](extras/subscribeme/subscribeme.setting-up-the-payment-flow "SubscribeMe.Setting up the Payment Flow")
- [User Account Management with SubscribeMe Subscriptions](extras/subscribeme/subscribeme.user-account-management "SubscribeMe.User Account Management")
- Component Features and how to work with them
- [Configuring API Credentials, IPN and going live!](extras/subscribeme/subscribeme.configuring-api-credentials,-ipn-and-going-live "SubscribeMe.Configuring API Credentials, IPN and going Live")

## 3. Stuck? Here's some tips

Next time, read the notes that say it's no longer supported. 

- If you are stuck with PayPal and it is giving an unsupported response, or just a generic message first enable debugging (if you haven't yet) via the SubscribeMe System Settings. As that is a global switch it will affect snippets, the plugin and IPN messages so be prepared to get a quickly filling error.log file. **DO NOT** leave debug on in production! Important information or errors will be logged anyhow, and keeping the debug mode on will probably kill something, be it the manager when viewing the error log or your server its disk space. Anyway - with the information from the debug, you should be able to do a targeted search. 
- If you are getting endless save loops or empty pages in the manager, load up a tool like Firebug to see what's going on and google for that, or find assistance on the forum / the SubscribeMe repository.
