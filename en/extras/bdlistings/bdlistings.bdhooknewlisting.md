---
title: "bdHookNewListing"
_old_id: "791"
_old_uri: "revo/bdlistings/bdlistings.bdhooknewlisting"
---

The bdHookNewListing snippet is to be used as a hook in a formit snippet call, which can be used to allow front-end users to create new listings.

## Form Fields

You will want to cover every field the user needs to enter into the database. These are the expected field names you will want in the form (you can also checkout [the schema on Github](https://github.com/Mark-H/bdListings/blob/master/_build/schema/bdlistings.mysql.schema.xml)).

- title
- description
- keywords
- price (saved with 2 decimals)
- pricegroup (integer ID of price group)
- category (integer ID of category)
- subcategory (integer ID of subcategory)
- target (integer ID of target group (ages))
- publishedon - date / timestamp, recognizes most formats.
- companyname
- contactinfo
- address
- neighborhood
- zip
- city
- country
- website
- latitude and longitude. If both are empty it will retrieve it automatically based on address/zip/city/country values entered. If you don't need the country, add it as a hidden field to make sure enough data is available to retrieve the lat/long pair from the Google Maps API.

## Form Example

Hopefully coming soon!