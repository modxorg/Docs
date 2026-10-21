---
title: "Providers"
description: "Transport providers in MODX: the remote service a package is downloaded from, how to add one, and what MODX asks it for."
---

A transport provider is a remote service that MODX downloads transport packages from. MODX ships with one — the provider of modx.com — and a site can have as many as it needs.

## What a Provider Is

A provider is a base URL of a REST service. MODX appends a fixed route to it and reads the answer as XML:

| Route | What it returns |
| --- | --- |
| `repository` | the repositories of the provider and the categories in them |
| `package` | the package of a signature |
| `package/versions` | the versions of a package |
| `package/update` | the newest version of a package |
| `home` | the statistics of the provider |
| `verify` | the answer that the service is a provider |

The provider of modx.com is the service at `https://rest.modx.com/extras/`.

> [!WARNING]
> Download packages only from providers you trust: a provider serves the code that runs on your site.

## Adding a Provider

Providers live on the tab **Providers** of the Package Management page: **Extras** in the top menu → **Installer** → **Providers**. The button **Create** opens the window with the fields of a provider:

| Field | Meaning |
| --- | --- |
| `name` | the name of the provider in the list |
| `service_url` | the base URL of the service |
| `username` | the name to send with the requests |
| `api_key` | the key to send with the requests |
| `description` | free text |

MODX checks the provider when it is saved: it asks the service `verify` and expects an answer that confirms the provider. A provider that does not answer is not saved.

Every request to the provider carries:

- the `username` and the `api_key` of the provider;
- the data of the installation: the `uuid`, the type of the database, the version of MODX, the host and the version of PHP, and the language of the manager.

## Downloading from a Provider

1. In the menu of the **Download Extras** button, choose **Select a Provider**.
2. Pick the provider.
3. Confirm with **Save and go to Package Browser**.

The Package Browser opens with the categories of the provider on the left and the packages on the right.

## See Also

1. [Package Management](building-sites/extras)
2. [Transport Packages](extending-modx/transport-packages)
3. [Creating a Third Party Component Build Script](extending-modx/transport-packages/build-script)
