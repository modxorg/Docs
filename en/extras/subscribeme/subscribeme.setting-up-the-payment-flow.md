---
title: "Setting up the Payment Flow"
_old_id: "1012"
_old_uri: "revo/subscribeme/subscribeme.setting-up-the-payment-flow"
---

Perhaps the most important thing is setting up the payment flow. Every snippet included in the package is used either in the payment flow or account management and are described in their respective context.

Please remember that this extra relies on PayPal Recurring Payments and there are no drop-in replacements.

## Payment Flow in Brief

The payment flow starts with choosing the product. You can only use one product per recurring payment, so when we are done with the payment flow there will be a subscription related to one product only.

After choosing the product to subscribe to, a request is made programmatically to PayPal to configure the payment amount, description, subscription ID etc. This results in a token which is used on the Payment Options screen. Besides PayPal Recurring Payments, SubscribeMe also supports manual payments. These payments require a site administrator to receive the payment (cash, check or bank transfer) and to add a new transaction to the subscription.

When choosing the PayPal method, the user is redirected to PayPal. There they will need to login with their PayPal account and agree with the terms. They can fill in a shipping address based on what is stored in their profile.

After submitting from PayPal, the user will return to your site and will be presented a form with the shipping details entered at PayPal that they can change, and your terms and conditions. When they submit the form, a request to PayPal will be made under the hood which sets up the Recurring Payments Profile. If successful, the user will be redirected to your thank you page.

Once the Subscription has been set up, they are unable to do anything until the payment clears. Sometimes that is instant while at other times it may take up to 24 hours, you may want to indicate this on the thank you page. This is a delay at PayPal. Once the first payment has been received the user will receive an email notifying them, and their account will have been updated with the benefits they were promised.

## Payment Flow in Detail, using the SubscribeMe Snippets

- [SubscribeMe - Listing the Products](/extras/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-listing-the-products "SubscribeMe - Listing the Products")
- [SubscribeMe - Setting up the Payment Methods](/extras/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-setting-up-the-payment-methods "SubscribeMe - Setting up the Payment Methods")
- [SubscribeMe - Subscription Confirmation Page](/extras/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-subscription-confirmation-page "SubscribeMe - Subscription Confirmation Page")

Until everything has been properly documented, you can find some brief (tho surprisingly in detail) steps at Github: <https://github.com/Mark-H/SubscribeMe#readme>