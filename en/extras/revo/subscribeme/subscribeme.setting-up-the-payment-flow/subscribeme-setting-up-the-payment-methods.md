---
title: "SubscribeMe - Setting up the Payment Methods"
_old_id: "725"
_old_uri: "revo/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-setting-up-the-payment-methods"
---

If you haven't already make sure you have setup the [product listing](/extras/revo/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-listing-the-products "SubscribeMe - Listing the Products") page, and adjusted the optionsResource value.

Minimum Call
------------

```
<pre class="brush: php">
[[!smCheckout]]

```Available Properties
--------------------

You can use all of the following properties in the smListProducts snippet, all of these are also available from the snippets' Properties tab.

<table><tbody><tr><th>Property   
</th><th>Description   
</th><th>Default   
</th></tr><tr><td>debug   
</td><td>Set to 1 or true to output debug data on the screen.</td><td>0   
</td></tr><tr><td>redirect   
</td><td>When enabled, the snippet will directly redirect to PayPal and not offer the payment options screen.   
</td><td>0</td></tr><tr><td>tpl   
</td><td>Name of a chunk to use for the output of the snippet   
</td><td>smcheckout.paymentoptions (included as file)</td></tr><tr><td>toPlaceholder   
</td><td>The name of a placeholder to assign the output to. The snippet will, when set, output nothing.   
</td><td>  
</td></tr><tr><td>return\_id   
</td><td>The ID of a Resource to be used for the next checkout step. This will be passed to PayPal.   
</td><td>  
</td></tr><tr><td>cancel\_id</td><td>The ID of a Resource to be displayed when the PayPal authorization was cancelled.   
</td><td>  
</td></tr><tr><td>fail\_id   
</td><td>The ID of a Resource to be displayed when the PayPal authorization or transaction failed.   
</td><td> </td></tr></tbody></table>This snippet also uses the following **system settings** for some parts of its behavior:

<div class="note">Verification is needed for this snippets use of these system settings.</div><table><tbody><tr><th>Key   
</th><th>Description   
</th></tr><tr><td>subscribeme.paypal.cancel\_id   
</td><td>Same as cancel\_id   
</td></tr><tr><td>subscribeme.paypal.fail\_id   
</td><td>Same as fail\_id   
</td></tr><tr><td>subscribeme.paypal.return\_id</td><td>Same as return\_id</td></tr></tbody></table>tpl
---

Default value (from core/components/subscribeme/elements/chunks/smcheckout.paymentoptions.tpl):

```
<pre class="brush: php">
<style type="text/css">
    #paymentoptions {
    width: 600px;
    }
    #paymentoptions td {
    width: 50%;
    vertical-align: top;
    padding: 10px;
    text-align: center;
    }
    .paypal {
    border: 2px solid #ff9900;
    }
    .manual {
    border: 2px solid #000;
    }
</style>
<table id="paymentoptions">
    <tr>
    <td>
        <h3>Checkout with PayPal</h3>
        <p>By setting up a <strong>recurring payment</strong> via PayPal you will automatically be billed every [[+period]], maintaining your subscription state.</p>
        <p><a href="[[+paypalurl]]" title="Subscribe now!"><img src="http://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" alt="Subscribe using PayPal" /></a></p>
        <p style="font-size: 80%">You will be able to cancel your subscription at any time via your PayPal profile. Your subscription will then be cancelled at the end of the running billing cycle.</p>
    </td>
    <td>
        <h3>Manual Payments</h3>
        <p>Using PayPal is free and automates the process of giving you access to the content you are subscribing to.</p>
        <p>If you wish to subscribe without PayPal you can do so by getting in touch - our staff will gladly help you get started.</p>
        <p><a href="">Contact us</a></p>
    </td>
    </tr>
</table>

```**Note**: You should NOT edit the default file directly, as future updates will overwrite any changes to this file. It is highly recommended you duplicate the file, or create a chunk with the contents, updating the snippet call, or snippet parameters accordingly.

You should edit this chunk to include a valid Contact us link, if you wish to change the paypal button you can also do so here. The default button is best suited for websites with a white background.

If you dislike inline css and/or tables to format your content, you can also make those adjustments in this template.

PayPal Token
------------

The smCheckout snippet sets up a token with PayPal. This token is only valid for approximately 3 hours. If you haven't already, you should setup a PayPal Sandbox account for testing.