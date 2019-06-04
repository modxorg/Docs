---
title: "Snippet Usage"
_old_id: "919"
_old_uri: "revo/mhpaypal/mhpaypal.snippet-usage"
---

## mhpaypal Snippet Usage

_This document provides information on the mhPayPal snippet, its properties and some example usages. If looking for more information about the mhPayPal package in which the snippet is included, please visit ?__[mhPayPal](extras/mhpaypal "mhPayPal")_ instead.

## Introduction

The mhPayPal snippet is the core of the mhPayPal package. It outputs your form, validates the input, sends the visitor to PayPal for immediate payment and processes any hooks you may have configured. There are basically two ways you can use this snippet. Either to accept donations where the user types in the amount they want to donate, or to accept one product payments based on a price you set in the snippet call.

Since the result of the mhPayPal snippet depends on the user, URL parameters etc, **the mhPayPal snippet always needs to be called uncached!**

## Snippet Properties

The list below is a list of all the properties you may use with mhPayPal. Please refer to the ?[Tag Syntax](making-sites-with-modx/tag-syntax "Tag Syntax") if you are unsure on how to use these properties.

| &property           | Description                                                                                                                                                                                                                                                                       | Default value                                                                                  | Version |
| ------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ------- |
| currencies          | A comma separated list of currency codes which you will want your visitors to be able of paying with. See the list of [Currency Codes on PayPal](https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_nvp_currency_codes).                     | EUR,USD,GBP                                                                                    | 1.1.0   |
| amount              | \[float\] If you are using mhPayPal for **fixed price payments**, make sure to set the amount to a numeric value larger than 0. See the examples on using mhPayPal for payments elsewhere.                                                                                        | 0                                                                                              | 1.1.0   |
| amountTax           | \[float\] Amount of taxes to add to the payment/donation.                                                                                                                                                                                                                         | 0                                                                                              | 1.1.0   |
| amountFees          | \[float\] Amount of fees to add to the payment/donation.                                                                                                                                                                                                                          | 0                                                                                              | 1.1.0   |
| amountHandling      | \[float\] Amount of handling costs to add to the payment/donation.                                                                                                                                                                                                                | 0                                                                                              | 1.1.0   |
| minAmount           | \[float\] When using mhPayPal for **donations where users choose the price**, you can force a minimum amount with this property.                                                                                                                                                  | 5.00                                                                                           | 1.1.0   |
| decimals            | \[integer\] Amount of decimals to show.                                                                                                                                                                                                                                           | 2                                                                                              | 1.1.0   |
| description         | \[string\] The text to use as description. Can contain placeholders of any fields like currency and amount.                                                                                                                                                                       | Your `[[+currency]]` `[[+amount]]` Donation                                                    | 1.1.0   |
| outputSeparator     | \[string\] Text/markup to place between bits of output. The form is one piece of output, and so is the collection of error messages and anything hooks may have added.                                                                                                            | \\n                                                                                            | 1.1.0   |
|                     |                                                                                                                                                                                                                                                                                   |                                                                                                |         |
|                     | **Form Handling**                                                                                                                                                                                                                                                                 |                                                                                                |         |
| formTpl             | \[string\] Name of a chunk to use. See Templating elsewhere in these docs for more information on how to use your own form. Defaults to a form with a currency selector and an amount input box.                                                                                  | mhPayPalTpl (file-based)                                                                       | 1.1.0   |
| formTplAnonymous    | \[string\] Name of a chunk to use when there is no user logged in. Could be used to display a message or login box if you only want users with an account to make a payment or donation. When left empty (default), it will use the chunk as specified with the formTpl property. |                                                                                                | 1.1.0   |
| errorTpl            | \[string\] Name of ac hunk to use for individual error messages.See templating for more information on how to customize this.                                                                                                                                                     | mhPayPalErrorTpl (file-based)                                                                  | 1.1.0   |
| successTpl          | \[string\] Name of a chunk to use to display a success message. See templating for more information on how to customize this.                                                                                                                                                     | mhPayPalSuccess (file-based)                                                                   | 1.1.0   |
| errorSeparator      | ?\[string\] String/text/markup to use in between individual error messages.                                                                                                                                                                                                       |                                                                                                | 1.1.0   |
| extraRequiredFields | \[string\] Comma separated list of field names that are required and cannot be left empty, can be used to collect extra data about the user for use in a custom hook or the likes.                                                                                                |                                                                                                | 1.1.0   |
| method              | \[GET                                                                                                                                                                                                                                                                             | POST\] Either GET or POST, indicating if the form should use URL parameters or a POST request. | POST    | 1.1.0 |
| submitVar           | \[string\] The name of a field that needs to exist in the GET or POST (depending on &method) in order for this snippet to start processing.                                                                                                                                       | makeDonation                                                                                   | 1.1.0   |
| id                  | \[string\] Can be used when you have multiple forms on one page, to ensure there are no ID conflicts.                                                                                                                                                                             | pp                                                                                             | 1.1.0   |
| showFormOnSuccess   | \[1                                                                                                                                                                                                                                                                               | 0\] Indicates if the snippet needs to show the form when the payment was successful.           | 1       | 1.1.0 |
| shipping            | \[1                                                                                                                                                                                                                                                                               | 0\] Tells PayPal if the user needs to confirm shipping details or not.                         | 0       | 1.1.0 |
|                     |                                                                                                                                                                                                                                                                                   |                                                                                                |         |
|                     | **Hooks** (though inspired by FormIt, do note that FormIt hooks are not compatible with mhPayPal)                                                                                                                                                                                 |                                                                                                |         |
| preHooks            | \[string\] Comma separated list of hooks to be executed before viewing the form. This only triggers when the form has not yet been submitted.                                                                                                                                     |                                                                                                | 1.1.0   |
| postHooks           | \[string\] Comma separated list of hooks to be executed after succesfully submitting the form, but before connecting with PayPal to set up the payment. Could be used to (for example) calculate taxes before it is registered with PayPal, or to further validate the data.      |                                                                                                | 1.1.0   |
| postPaymentHooks    | \[string\] Comma separated list of hooks to be executed after making a successful payment and receiving details about the payer from PayPal. Can be used to notify users via email (see the email hook) or to add data about the payment to a custom table.                       |                                                                                                | 1.1.0   |

## Example Usage

Please also see the specific pages for hooks and templating for more detail about those. Please note that this assumes a correct installation and configured PayPal API access.

### Minimum Snippet Call

Displays the default form with all default options, meaning it will allow users to fill in their desired donation with a minimum of 5 EUR/USD/GBP.

``` php
[[!mhPayPal]]
```

### Using mhPayPal to make a one-product fixed price payments

This example still uses the default form (you probably don't want that in this case), but ignores what the user choses and forces the USD currency at an amount of 15 bucks + 2.85 taxes. This also sets a description. This could be a great starting point, along with a custom chunk tpl and a hook or two, for allowing super quick check out of products.

``` php
[[!mhPayPal?
  &amount=`15`
  &amountTax=`2.85`
  &description=`Product XYZ ([[+currency]][[+amount]])`
  &currencies=`USD`
  ]]
```

## More mhPayPal documentation

- [mhPayPal.Snippet Usage](extras/mhpaypal/mhpaypal.snippet-usage "mhPayPal.Snippet Usage")
