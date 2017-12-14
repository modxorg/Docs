---
title: "MoneyBird.Contacts"
_old_id: "938"
_old_uri: "revo/moneybird/moneybird.contacts"
---

<div>- [Usage](#MoneyBird.Contacts-Usage)
- [Properties](#MoneyBird.Contacts-Properties)
- [See Also](#MoneyBird.Contacts-SeeAlso)

</div>Usage
-----

Example for MoneyBird Contacts:

```
<pre class="brush: php">
[[!MoneyBirdContacts]]

```You can also specify the templates:

```
<pre class="brush: php">
[[!MoneyBirdContacts? &tpl=`mbContact` &outerTpl=`mbContacts`]]

```See the snippet properties below for more options.

Properties
----------

MoneyBirdInvoices comes with some configuration properties you can set to adjust the way it behaves.

<table id="TBL1376497247022"><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>tpl</td><td>(Req.) The template chunk for each single invoice entry   
</td><td>mbContact</td></tr><tr><td>outerTpl</td><td>(Opt.) The outer template for all invoice entries in the list (Use \[\[+wrapper\]\])   
</td><td>mbContacts</td></tr><tr><td>toPlaceholder   
</td><td>(Opt.) A placeholder name to set with the output instead of returning it   
</td><td> </td></tr><tr><td>outputSeparator   
</td><td>(Opt.) How to separate the content from the next. Default to newline ("\\n")   
</td><td> </td></tr><tr><td>limit   
</td><td>(Opt.) To limit the results. Only applied when greater then 0.   
</td><td>0</td></tr><tr><td>offset   
</td><td>(Opt.) From where to start with the listing.   
</td><td>0</td></tr><tr><td>totalVar   
</td><td>(Opt.) The placeholder name of the placeholder containing the absolute total. Default set to "total".   
</td><td>total</td></tr><tr><td>filterKey   
</td><td>(Opt.) The name of the key to bind the filter on. Default set to "mbc".   
</td><td>mbc</td></tr><tr><td>invoicesResource   
</td><td>(Opt.) The ID of the resource where the "MoneyBirdInvoices" snippet is on. Default set to itself.   
</td><td>_current_</td></tr><tr><td>showNone   
</td><td>(Opt.) Used whether to show a "none" option in the filter list. Default set to true.   
</td><td>0</td></tr><tr><td>cacheExpire   
</td><td>(Opt.) The time when the cache is expired and rebuild. Default set to 86400 (24 hours). Smallest is 900 (15 minutes)   
</td><td>86400</td></tr></tbody></table>See Also
--------

1. [MoneyBird.Contacts](/extras/revo/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](/extras/revo/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](/extras/revo/moneybird/moneybird.nrformat)