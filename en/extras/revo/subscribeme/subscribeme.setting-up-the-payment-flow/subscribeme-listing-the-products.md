---
title: "SubscribeMe - Listing the Products"
_old_id: "724"
_old_uri: "revo/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-listing-the-products"
---

The smListProducts snippet, included in the package, can and should be used to output a list of your products (managed in the SubscribeMe Component).

User Check
----------

SubscribeMe needs the soon to be paying member to already have a user account, so depending on your website structure, you may want to create a registration page before linking to this page. You could also use [If](/extras/revo/if "If") to display a user login/registration form, before showing the product list. You can use [Register](/extras/revo/login/login.register "Login.Register") to handle the user registration and making a [member only page](/revolution/2.x/administering-your-site/security/security-tutorials/making-member-only-pages "Making Member-Only Pages") if you haven't already setup a members area of your website.

Minimum Call
------------

```
<pre class="brush: php">
[[smListProducts]]

```The minimum call is a functional assuming you have set up a PayPal account, or PayPal Sandbox account properly and have [FormIt](/extras/revo/formit "FormIt") installed. You must edit the OptionsResource located in the smListProducts.outer file, in order for SubscribeMe to function properly.

Available Properties
--------------------

You can use all of the following properties in the smListProducts snippet, all of these are also available from the snippets' Properties tab.

<table><tbody><tr><th>Property   
</th><th>Description   
</th><th>Default   
</th></tr><tr><td>start   
</td><td>Possible offset for products.   
</td><td>0   
</td></tr><tr><td>limit   
</td><td>Number of products to show.   
</td><td>5   
</td></tr><tr><td>sort   
</td><td>The column to sort on (see tpl placeholders further down or the schema file on Github)   
</td><td>sortorder   
</td></tr><tr><td>sortdir   
</td><td>ASC or DESC   
</td><td>asc   
</td></tr><tr><td>tplOuter   
</td><td>Chunk to wrap the results in.   
</td><td>smListProducts.outer (included as file)   
</td></tr><tr><td>tplRow   
</td><td>Chunk to use to output each result.   
</td><td>smListProducts.row (included as file)   
</td></tr><tr><td>activeOnly   
</td><td>When 1 or true this will only display active products. Set to 0 to override and display all products.   
</td><td>true   
</td></tr><tr><td>separator   
</td><td>Separator between the tplRow's.   
</td><td>\\n (linebreak)   
</td></tr><tr><td>toPlaceholder   
</td><td>When set the results will be outputted to a placeholder instead of returned right away   
</td><td> </td></tr><tr><td>debug   
</td><td>Set to 1 or true to output debug data on the screen.   
</td><td>false (0)   
</td></tr></tbody></table>This snippet also uses the following **system settings** for some parts of its behavior:

<table><tbody><tr><th>Key   
</th><th>Description   
</th></tr><tr><td>subscribeme.currencysign   
</td><td>The currency sign to use. Defaults to €   
</td></tr><tr><td>subscribeme.currencycode   
</td><td>The currency code. Defaults to EUR.   
</td></tr></tbody></table>tplOuter
--------

Default value (from core/components/subscribeme/elements/chunks/smListProducts.outer.tpl):

```
<pre class="brush: php">
[[!FormIt?
  &hooks=`smNewSubscription`
  &optionsResource=`4`
]]
<p>Choose the product you would like to subscribe to:</p>
<ul>
    [[+products]]
</ul>

```**Note**: You should NOT edit the default file directly, as future updates will overwrite any changes to this file. It is highly recommended you duplicate the file, or create a chunk with the contents, updating the snippet call, or snippet parameters accordingly.

In your outer template (or near it) you should set up your FormIt call like the above. The optionsResource setting points to the next step in the checkout flow, which is the payment options screen. This ID is used to redirect from the smNewSubscription hook. If you use multiple formit calls and they seem to be conflicting, use unique form IDs, refer to the [FormIt](/extras/revo/formit "FormIt") documentation.

The smNewSubscription hook contacts PayPal with the product details to set up a token for the transaction, this link will be used in the next page.

The tplOuter chunk only has access to the products placeholder.

tplRow
------

Default value (from core/components/subscribeme/elements/chunks/smListProducts.row.tpl):

```
<pre class="brush: php">
<li style="width: 450px; border: 2px solid #333; list-style-type: none; padding: 15px;">
    <form action="[[~[[*id]]]]" method="POST">
        <input type="hidden" name="product" value="[[+product_id]]" / >
        <input type="submit" value="Subscribe!" style="float: right;" />
        <h3>[[+name]] ([[+currency]] [[+amount_total]] / [[+periods:gt=`1`:then=`[[+periods]] [[+period]]`:else=`[[+period]]`]])</h3>
        <p>[[+description]]</p>
    </form>
</li>

```**Note**: You should NOT edit the default file directly, as future updates will overwrite any changes to this file. It is highly recommended you duplicate the file, or create a chunk with the contents, updating the snippet call, or snippet parameters accordingly.

Unless you're an inline-style lover you'll probably want to change this default. :D

The row template consists of a form posting to itself with a hidden field (name: product) that contains the product\_id property and a submit button.

You can already see most of the placeholders in the default, here's a total list:

<table><tbody><tr><th>Placeholder   
</th><th>Description   
</th></tr><tr><td>product\_id   
</td><td>Unique ID of the product.   
</td></tr><tr><td>name   
</td><td> </td></tr><tr><td>description   
</td><td> </td></tr><tr><td>sortorder   
</td><td> </td></tr><tr><td>price   
</td><td>Subscription price   
</td></tr><tr><td>amount\_shipping   
</td><td>Shipping costs   
</td></tr><tr><td>amount\_vat   
</td><td>Sales tax / VAT costs   
</td></tr><tr><td>periods   
</td><td>Number of periods per each cycle   
</td></tr><tr><td>period   
</td><td>Length of one period (day/week/month/year)   
</td></tr><tr><td>active   
</td><td>1/0   
</td></tr><tr><td>count   
</td><td>Total amount of products in this list   
</td></tr><tr><td>amount\_total   
</td><td>Total amount (price + amount\_shipping + amount\_vat)   
</td></tr><tr><td>currency   
</td><td>The value from the subscribeme.currencysign system setting   
</td></tr><tr><td>currencycode   
</td><td>The value from the subscribeme.currencycode system setting   
</td></tr></tbody></table>Displaying the Payment Methods
------------------------------

The next step in the checkout process is the [payment methods](/extras/revo/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-setting-up-the-payment-methods "SubscribeMe - Setting up the Payment Methods") page. You may also optionally disable this page as outlined.