---
title: "sekSiteTools.google.analytics"
_old_id: "983"
_old_uri: "revo/seksitetools/seksitetools.google.analytics"
---

## What is google.analytics?

Add the google analytics code to your website quickly and easily using this snippet. All that is required for this snippet to work is to register the domain with google and insert the account number into the &accountNumber property.

## Usage

Example for google.analytics:

``` php
[[google.analytics? &accountNumber=`U123456`]]
```

You can also specify a domain name, only needed if using analytics with sub domains:

``` php
[[google.analytics? &accountNumber=`U123456` &domainName=`domain.com`]]
```

See the snippet properties for more information.

## Properties

| Name          | Description                                                                                                | Default | Required | Version |
| ------------- | ---------------------------------------------------------------------------------------------------------- | ------- | -------- | ------- |
| accountNumber | The account number created when starting a google analytics account must be inserted for the code to work. |         | Yes      | >0.0.1  |
| domainName    | The domain name is only required if using subdomains.                                                      |         |          | >0.0.1  |