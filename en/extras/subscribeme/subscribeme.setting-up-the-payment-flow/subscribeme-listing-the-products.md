---
title: "SubscribeMe - Listing the Products"
_old_id: "724"
_old_uri: "revo/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-listing-the-products"
---

The smListProducts snippet, included in the package, can and should be used to output a list of your products (managed in the SubscribeMe Component).

## User Check

SubscribeMe needs the soon to be paying member to already have a user account, so depending on your website structure, you may want to create a registration page before linking to this page. You could also use [If](extras/if "If") to display a user login/registration form, before showing the product list. You can use [Register](extras/login/login.register "Login.Register") to handle the user registration and making a [member only page](administering-your-site/security/security-tutorials/making-member-only-pages "Making Member-Only Pages") if you haven't already setup a members area of your website.

## Minimum Call

``` php
[[smListProducts]]
```

The minimum call is a functional assuming you have set up a PayPal account, or PayPal Sandbox account properly and have [FormIt](extras/formit "FormIt") installed. You must edit the OptionsResource located in the smListProducts.outer file, in order for SubscribeMe to function properly.

## Available Properties

You can use all of the following properties in the smListProducts snippet, all of these are also available from the snippets' Properties tab.

| Property      | Description                                                                                           | Default                                 |
| ------------- | ----------------------------------------------------------------------------------------------------- | --------------------------------------- |
| start         | Possible offset for products.                                                                         | 0                                       |
| limit         | Number of products to show.                                                                           | 5                                       |
| sort          | The column to sort on (see tpl placeholders further down or the schema file on Github)                | sortorder                               |
| sortdir       | ASC or DESC                                                                                           | asc                                     |
| tplOuter      | Chunk to wrap the results in.                                                                         | smListProducts.outer (included as file) |
| tplRow        | Chunk to use to output each result.                                                                   | smListProducts.row (included as file)   |
| activeOnly    | When 1 or true this will only display active products. Set to 0 to override and display all products. | true                                    |
| separator     | Separator between the tplRow's.                                                                       | \\n (linebreak)                         |
| toPlaceholder | When set the results will be outputted to a placeholder instead of returned right away                |                                         |
| debug         | Set to 1 or true to output debug data on the screen.                                                  | false (0)                               |

This snippet also uses the following **system settings** for some parts of its behavior:

| Key                      | Description                             |
| ------------------------ | --------------------------------------- |
| subscribeme.currencysign | The currency sign to use. Defaults to € |
| subscribeme.currencycode | The currency code. Defaults to EUR.     |

## tplOuter

Default value (from core/components/subscribeme/elements/chunks/smListProducts.outer.tpl):

``` php
[[!FormIt?
  &hooks=`smNewSubscription`
  &optionsResource=`4`
]]
<p>Choose the product you would like to subscribe to:</p>
<ul>
    [[+products]]
</ul>
```

**Note**: You should NOT edit the default file directly, as future updates will overwrite any changes to this file. It is highly recommended you duplicate the file, or create a chunk with the contents, updating the snippet call, or snippet parameters accordingly.

In your outer template (or near it) you should set up your FormIt call like the above. The optionsResource setting points to the next step in the checkout flow, which is the payment options screen. This ID is used to redirect from the smNewSubscription hook. If you use multiple formit calls and they seem to be conflicting, use unique form IDs, refer to the [FormIt](extras/formit "FormIt") documentation.

The smNewSubscription hook contacts PayPal with the product details to set up a token for the transaction, this link will be used in the next page.

The tplOuter chunk only has access to the products placeholder.

## tplRow

Default value (from core/components/subscribeme/elements/chunks/smListProducts.row.tpl):

``` php
<li style="width: 450px; border: 2px solid #333; list-style-type: none; padding: 15px;">
    <form action="[[~[[*id]]]]" method="POST">
        <input type="hidden" name="product" value="[[+product_id]]" / >
        <input type="submit" value="Subscribe!" style="float: right;" />
        <h3>[[+name]] ([[+currency]] [[+amount_total]] / [[+periods:gt=`1`:then=`[[+periods]] [[+period]]`:else=`[[+period]]`]])</h3>
        <p>[[+description]]</p>
    </form>
</li>
```

**Note**: You should NOT edit the default file directly, as future updates will overwrite any changes to this file. It is highly recommended you duplicate the file, or create a chunk with the contents, updating the snippet call, or snippet parameters accordingly.

Unless you're an inline-style lover you'll probably want to change this default. :D

The row template consists of a form posting to itself with a hidden field (name: product) that contains the product\_id property and a submit button.

You can already see most of the placeholders in the default, here's a total list:

| Placeholder      | Description                                                |
| ---------------- | ---------------------------------------------------------- |
| product\_id      | Unique ID of the product.                                  |
| name             |                                                            |
| description      |                                                            |
| sortorder        |                                                            |
| price            | Subscription price                                         |
| amount\_shipping | Shipping costs                                             |
| amount\_vat      | Sales tax / VAT costs                                      |
| periods          | Number of periods per each cycle                           |
| period           | Length of one period (day/week/month/year)                 |
| active           | 1/0                                                        |
| count            | Total amount of products in this list                      |
| amount\_total    | Total amount (price + amount\_shipping + amount\_vat)      |
| currency         | The value from the subscribeme.currencysign system setting |
| currencycode     | The value from the subscribeme.currencycode system setting |

## Displaying the Payment Methods

The next step in the checkout process is the [payment methods](extras/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-setting-up-the-payment-methods "SubscribeMe - Setting up the Payment Methods") page. You may also optionally disable this page as outlined.