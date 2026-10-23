---
title: "Troubleshooting Package Management"
description: "What to check when a package cannot be downloaded, installed or unpacked in MODX: cURL, the packages directory, and the archive_with setting."
---

Most problems with Package Management come from the server.

## cURL Is Missing

Without the cURL extension, you see a warning above the page when it opens. MODX replaces **Download Extras** with **Search Locally for Packages**.

Ask your host to enable the cURL extension.

## The Packages Directory Is Not Writable

MODX unpacks packages into `core/packages/` and writes the archives there. When PHP cannot write to that directory, the download and the installation fail. Make the directory writable by PHP.

## The Archive Cannot Be Unpacked

If an archive does not unpack, set `archive_with` to **Yes**. MODX then unpacks the archive with its own means, without the PHP Zip extension.

## The Archive Is Missing

If the archive is no longer in `core/packages/`, the manager does not fetch it from the provider. Put `<signature>.transport.zip` into `core/packages/` and choose **Search Locally for Packages**.

## The Upload Is Refused

**Upload a package**, in the **Download Extras** menu, accepts only an archive named `<signature>.transport.zip`. The manager refuses a file with another name, or a file that is not a zip, and says so.

## See Also

1. [Package Management](building-sites/extras)
2. [Providers](building-sites/extras/providers)
3. [archive_with](building-sites/settings/archive_with)
