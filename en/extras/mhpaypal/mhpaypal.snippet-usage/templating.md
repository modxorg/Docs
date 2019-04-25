---
title: "Templating"
_old_id: "921"
_old_uri: "revo/mhpaypal/mhpaypal.snippet-usage/mhpaypal.snippet-usage.templating"
---

## Templating

_This document provides information on the mhPayPal snippet templating. If looking for more information about the mhPayPal package in which the snippet is included, please visit ?_\[mhPayPal|display/ADDON/mhPayPal\] instead.

Templating mhPayPal is done through the use of tpl chunks.

## formTpl, formTplAnonymous

Default:

``` php
<form action="[[+action]]" method="[[+config.method]]" id="mhpp_form_[[+config.id]]">
    <p>Your donation will be safely processed by PayPal, allowing you to donate via a PayPal account or directly with a credit card.</p>
    [[+errors:notempty=`
        <p>Uh oh.. The following error(s) were found in your form: <br />[[+errors]]</p>
    `]]
    <div>
        <label for="mhpp_amount_[[+config.id]]">Amount</label>
        <div>
            <select name="currency" id="mhpp_currency_[[+config.id]]">
                <option value="EUR"[[+currency_EUR:notempty=` selected="selected"`]]>EUR &euro;</option>
                <option value="USD"[[+currency_USD:notempty=` selected="selected"`]]>USD &#36;</option>
                <option value="GBP"[[+currency_GBP:notempty=` selected="selected"`]]>GBP &#163;</option>
            </select>


            <input type="text" name="amount" id="mhpp_amount_[[+config.id]]" />
            [[+currency.error]] [[+amount.error]]
        </div>
    </div>

    <div>
        <div>
            <input type="submit" name="[[+config.submitVar]]" value="Donate!" />
        </div>
    </div>
</form>
```

Available Placeholders

| Placeholder `[[+name here]]` | Description                                                                                                                                      |
| ---------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------ |
| config.\_\_\_                | The value of the snippet property identified with the \_\_. See \[mhPayPal\] for all snippet properties available.                               |
| action                       | An URL to the current page to make sure it posts to itself.                                                                                      |
| amount                       | The filled in amount (if any).                                                                                                                   |
| currency                     | The chosen currency (if any).                                                                                                                    |
| currency\_CURRENCYKEY        | The chosen currency key will get this placeholder set to 1, for example currency\_USD. This can help with selectboxes like in the default above. |
| \_\_\_\_\_.error             | Where \_\_\_\_\_ is the name of a field, this placeholder contains an error for it.                                                              |
| errors                       | A collection of errors as fieldname: error, separated by the &errorSeparator property.                                                           |

### Examples

Bring it on..

## errorTpl

Default:

``` php
<span>[[+error]]</span>
```

Placeholders:

| Placeholder `[[+name here]]` | Description        |
| ---------------------------- | ------------------ |
| error                        | The error message. |

## successTpl

Default:

``` php
<div>
    <h3>Thanks! You're awesome!</h3>
    <p>PayPal says your [[+description]] ([[+currency]] [[+amount]]) transaction is [[+PAYMENTSTATUS]]! You're really cool for helping out on this project further. Do not hesitate to get in touch should you need help!</p>
</div>
```

| Placeholder `[[+name here]]` | Description             |
| ---------------------------- | ----------------------- |
| Any data fields' name        | The data fields' value. |
