---
title: "Providers"
description: "A transport provider is the service MODX downloads packages from, and how to add one."
---

A transport provider is a remote service that MODX downloads packages from. MODX ships with the modx.com provider. A site can keep as many providers as it needs.

## What a Provider Is

A provider is the address MODX downloads packages from.

The modx.com provider is the service at `https://rest.modx.com/extras/`. Enter that address in **Service URL**.

> [!WARNING]
> Download packages only from providers you trust. A provider serves the code that runs on your site.

## Adding a Provider

Open **Extras** in the top menu, then **Installer**, then **Providers**. **Create** opens the window.

| Field | What you enter |
| --- | --- |
| **Name** | the provider's name in the list |
| **Service URL** | the service address |
| **Username** | the name for this provider |
| **API Key** | the key for this provider |
| **Description** | free text |

MODX checks the provider when you save. If the service does not confirm the address, MODX does not save the record.

Each request sends:

- the **Username** and the **API Key** from this window
- an installation identifier, the database type and the MODX version
- the host, the PHP version and the manager's language

## Downloading from a Provider

1. In the **Download Extras** menu, choose **Select a Provider**.
2. Pick the provider.
3. Confirm with **Save and go to Package Browser**.

The Package Browser opens. That provider's categories are on the left, the packages on the right.

## See Also

1. [Package Management](building-sites/extras)
2. [Transport Packages](extending-modx/transport-packages)
3. [Creating a Third Party Component Build Script](extending-modx/transport-packages/build-script)
