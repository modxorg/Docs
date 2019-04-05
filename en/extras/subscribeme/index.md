---
title: "SubscribeMe"
_old_id: "723"
_old_uri: "revo/subscribeme"
---

This Documentation is being worked on! If you have knowledge on the subject, please feel free to help!

SubscribeMe is a MODX Revolution addon that you can use to offer premium content for a recurring payment. You can create products which are linked to one or more User Group + Role combinations. These permissions are then being set when subscribing (or actually when a payment comes in for that product, and it doesn't have the permission yet), and through the use of a plugin triggering on page requests they will be revoked when it has expired. It is also possible to create products without permissions, allowing you to simply mark a user account as a subscriber and exporting the data per product.

SubscribeMe is **not** a (premium) newsletter addon, though it could be used to limit access to your subscribe form.

SubscribeMe works with PayPal as payment processor, and only supports Recurring Payments which are set up through the API. There are no direct plans for other payment gateways, nor has the addon been abstracted in such a way to allow quick drop-in of other payment providers. As the addon is released as Open Source GNU GPL v2 or later and [the source is available on Github](https://github.com/Mark-H/SubscribeMe/), anyone looking to integrate other payment providers or abstract the system to allow that is invited to do so and give that back to the community.

This addon has been developed by Mark Hamstra and was made possible by Jared Loman Creative.

- [1. History, Source, Bugs & Feature Requests](#SubscribeMe-1.History%2CSource%2CBugs%26FeatureRequests)
- [2. Getting Started](#SubscribeMe-2.GettingStarted)
- [3. Stuck? Here's some tips..](#SubscribeMe-3.Stuck%3FHere%27ssometips..)



## 1. History, Source, Bugs & Feature Requests

SubscribeMe 1.0.0-pl was released on Sept 29, 2011 and available as a Transport Package for MODX Revolution as well as on Github.

Download from the MODX Extras Repository: <http://modx.com/extras/package/subscribeme>
Download / View / Fork Source: <https://github.com/Mark-H/SubscribeMe>
File Bugs & Feature Requests: <https://github.com/Mark-H/SubscribeMe/issues>

There's a forum topic for discussion here: <http://forums.modx.com/thread/70680/revo-subscribeme-selling-access-to-your-premium-modx-content-with-paypal>

## 2. Getting Started

These resources should help you get started swiftly with SubscribeMe, monetizing your valuable content.

- Getting Started with the PayPal Sandbox
- [The SubscribeMe Checkout flow, and how to set it up](/extras/revo/subscribeme/subscribeme.setting-up-the-payment-flow "SubscribeMe.Setting up the Payment Flow")
- [User Account Management with SubscribeMe Subscriptions](/extras/revo/subscribeme/subscribeme.user-account-management "SubscribeMe.User Account Management")
- Component Features and how to work with them
- [Configuring API Credentials, IPN and going live!](/extras/revo/subscribeme/subscribeme.configuring-api-credentials,-ipn-and-going-live "SubscribeMe.Configuring API Credentials, IPN and going Live")

## 3. Stuck? Here's some tips..

- If you are stuck with PayPal and it is giving an unsupported response, or just a generic message first enable debugging (if you haven't yet) via the SubscribeMe System Settings. As that is a global switch it will affect snippets, the plugin and IPN messages so be prepared to get a quickly filling error.log file. **DO NOT** leave debug on in production! Important information or errors will be logged anyhow, and keeping the debug mode on will probably kill something, be it the manager when viewing the error log or your server its disk space. Anyway - with the information from the debug, you should be able to do a targeted search. If your findings indicate a bug, [please file it](https://github.com/Mark-H/SubscribeMe/issues) so it can be fixed in a future release.
- If you are getting endless save loops or empty pages in the manager, load up a tool like Firebug to see what's going on and google for that, or find assistance on the forum / the SubscribeMe repository.

This product is open source, and while I have done what I could to make this a brilliant and useful addon it is possible you encounter bugs or it doesn't work as intended. Please get in touch (preferably via [the SubscribeMe Repository on Github](https://github.com/Mark-H/SubscribeMe/issues)) if you are unable of solving an issue and would like assistance. If something goes wrong causing you to lose income, that is your risk when using this application and I, or Jared Loman Creative, is not responsible for the damage. Though time permitting together we may be able to solve the issue.