---
title: "mhPayPal.Snippet Usage.Templating"
_old_id: "921"
_old_uri: "revo/mhpaypal/mhpaypal.snippet-usage/mhpaypal.snippet-usage.templating"
---

_This document provides information on the mhPayPal snippet templating. If looking for more information about the mhPayPal package in which the snippet is included, please visit ?_<span class="error">\[mhPayPal|display/ADDON/mhPayPal\]</span> instead.

Templating mhPayPal is done through the use of tpl chunks.

<div>- [formTpl, formTplAnonymous](#mhPayPal.SnippetUsage.Templating-formTpl%2CformTplAnonymous)
  - [Examples](#mhPayPal.SnippetUsage.Templating-Examples)
- [errorTpl](#mhPayPal.SnippetUsage.Templating-errorTpl)
- [successTpl](#mhPayPal.SnippetUsage.Templating-successTpl)

</div>formTpl, formTplAnonymous
-------------------------

Default:

```
<pre class="brush: php">
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

```Available Placeholders

<table><tbody><tr><th>Placeholder \[\[+<ins>name here</ins>\]\]   
</th><th>Description   
</th></tr><tr><td>config.\_\_\_   
</td><td>The value of the snippet property identified with the \_\_. See \[mhPayPal\] for all snippet properties available.   
</td></tr><tr><td>action   
</td><td>An URL to the current page to make sure it posts to itself.   
</td></tr><tr><td>amount   
</td><td>The filled in amount (if any).   
</td></tr><tr><td>currency   
</td><td>The chosen currency (if any).   
</td></tr><tr><td>currency\_CURRENCYKEY   
</td><td>The chosen currency key will get this placeholder set to 1, for example currency\_USD. This can help with selectboxes like in the default above.   
</td></tr><tr><td>\_\_\_\_\_.error   
</td><td>Where \_\_\_\_\_ is the name of a field, this placeholder contains an error for it.   
</td></tr><tr><td>errors   
</td><td>A collection of errors as fieldname: error, separated by the &errorSeparator property.   
</td></tr></tbody></table>### Examples

Bring it on..

errorTpl
--------

Default:

```
<pre class="brush: php">
<span>[[+error]]</span>

```Placeholders:

<table><tbody><tr><th>Placeholder \[\[+<ins>name here</ins>\]\]   
</th><th>Description   
</th></tr><tr><td>error   
</td><td>The error message.   
</td></tr></tbody></table>successTpl
----------

Default:

```
<pre class="brush: php">
<div>
    <h3>Thanks! You're awesome!</h3>
    <p>PayPal says your [[+description]] ([[+currency]] [[+amount]]) transaction is [[+PAYMENTSTATUS]]! You're really cool for helping out on this project further. Do not hesitate to get in touch should you need help!</p>
</div>

```<table><tbody><tr><th>Placeholder \[\[+<ins>name here</ins>\]\]</th><th>Description   
</th></tr><tr><td>Any data fields' name   
</td><td>The data fields' value.   
</td></tr></tbody></table>