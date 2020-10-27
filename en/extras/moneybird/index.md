---
title: "MoneyBird"
_old_id: "683"
_old_uri: "revo/moneybird"
---

## What is MoneyBird?

MoneyBird is a online invoice system which is very popular in the Netherlands, but also outside. With the MoneyBird component for MODX you're able to bind MoneyBird contacts to your local MODX users and list the invoices of that user at their account page with some simple snippets and customizable chunks.

Tip: secure pages with [Resource Groups](administering-your-site/security/resource-groups "Resource Groups") and use [Login](extras/login "Login") to make your front-end login page and functionalities.

MoneyBird for MODX just supports only invoices listing with contacts for front-end usage.
In the future more features could be added.

## History

MoneyBird was written by Bert Oost as a MoneyBird invoice listing Extra, and first released on June 17th, 2012.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <https://modx.com/extras/package/moneybird>

### Development and Bug Reporting

MoneyBird is stored and developed in GitHub, and can be found here: <https://github.com/bertoost/MODX-MoneyBird>

Bugs can be filed here: <https://github.com/bertoost/MODX-MoneyBird/issues>

## Usage

The MoneyBird Extra is composed of 3 snippets (1 output filter):

- [Invoices](extras/moneybird/moneybird.invoices "MoneyBird.Invoices") - For listing the invoices of all contacts of a single user
- [Contacts](extras/moneybird/moneybird.contacts "MoneyBird.Contacts") - For listing the contacts of a single user
- [NrFormat](extras/moneybird/moneybird.nrformat "MoneyBird.NrFormat") - For formatting a the prices with PHPs Number Format

## See Also

1. [MoneyBird.Contacts](extras/moneybird/moneybird.contacts)
2. [MoneyBird.Invoices](extras/moneybird/moneybird.invoices)
3. [MoneyBird.NrFormat](extras/moneybird/moneybird.nrformat)
