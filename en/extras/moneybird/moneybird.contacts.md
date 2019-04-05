---
title: "Contacts"
_old_id: "938"
_old_uri: "revo/moneybird/moneybird.contacts"
---

- [Usage](#MoneyBird.Contacts-Usage)
- [Properties](#MoneyBird.Contacts-Properties)
- [See Also](#MoneyBird.Contacts-SeeAlso)



## Usage

Example for MoneyBird Contacts:

``` php 
[[!MoneyBirdContacts]]
```

You can also specify the templates:

``` php 
[[!MoneyBirdContacts? &tpl=`mbContact` &outerTpl=`mbContacts`]]
```

See the snippet properties below for more options.

## Properties

MoneyBirdInvoices comes with some configuration properties you can set to adjust the way it behaves.

| Name             | Description                                                                                                          | Default    |
| ---------------- | -------------------------------------------------------------------------------------------------------------------- | ---------- |
| tpl              | (Req.) The template chunk for each single invoice entry                                                              | mbContact  |
| outerTpl         | (Opt.) The outer template for all invoice entries in the list (Use \[\[+wrapper\]\])                                 | mbContacts |
| toPlaceholder    | (Opt.) A placeholder name to set with the output instead of returning it                                             |            |
| outputSeparator  | (Opt.) How to separate the content from the next. Default to newline ("\\n")                                         |            |
| limit            | (Opt.) To limit the results. Only applied when greater then 0.                                                       | 0          |
| offset           | (Opt.) From where to start with the listing.                                                                         | 0          |
| totalVar         | (Opt.) The placeholder name of the placeholder containing the absolute total. Default set to "total".                | total      |
| filterKey        | (Opt.) The name of the key to bind the filter on. Default set to "mbc".                                              | mbc        |
| invoicesResource | (Opt.) The ID of the resource where the "MoneyBirdInvoices" snippet is on. Default set to itself.                    | _current_  |
| showNone         | (Opt.) Used whether to show a "none" option in the filter list. Default set to true.                                 | 0          |
| cacheExpire      | (Opt.) The time when the cache is expired and rebuild. Default set to 86400 (24 hours). Smallest is 900 (15 minutes) | 86400      |

## See Also

1. [MoneyBird.Contacts](/extras/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](/extras/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](/extras/moneybird/moneybird.nrformat)