---
title: "Invoices"
_old_id: "939"
_old_uri: "revo/moneybird/moneybird.invoices"
---

# Usage

Example for MoneyBird Invoices:

``` php
[[!MoneyBirdInvoices]]
```

You can also specify the templates:

``` php
[[!MoneyBirdInvoices? &tpl=`mbInvoice` &outerTpl=`mbInvoices`]]
```

See the snippet properties below for more options.

## Properties

MoneyBirdInvoices comes with some configuration properties you can set to adjust the way it behaves.

| Name            | Description                                                                                                          | Default    |
| --------------- | -------------------------------------------------------------------------------------------------------------------- | ---------- |
| tpl             | (Req.) The template chunk for each single invoice entry                                                              | mbInvoice  |
| outerTpl        | (Opt.) The outer template for all invoice entries in the list (Use \[\[+wrapper\]\])                                 | mbInvoices |
| toPlaceholder   | (Opt.) A placeholder name to set with the output instead of returning it                                             |            |
| outputSeparator | (Opt.) How to separate the content from the next. Default to newline ("\\n")                                         |            |
| limit           | (Opt.) To limit the results. Only applied when greater then 0.                                                       | 0          |
| offset          | (Opt.) From where to start with the listing.                                                                         | 0          |
| totalVar        | (Opt.) The placeholder name of the placeholder containing the absolute total. Default set to "total".                | total      |
| filterKey       | (Opt.) The name of the key to bind the filter on. Default set to "mbc".                                              | mbc        |
| cacheExpire     | (Opt.) The time when the cache is expired and rebuild. Default set to 86400 (24 hours). Smallest is 900 (15 minutes) | 86400      |

## See Also

1. [MoneyBird.Contacts](extras/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](extras/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](extras/moneybird/moneybird.nrformat)