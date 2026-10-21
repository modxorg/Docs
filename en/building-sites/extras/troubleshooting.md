---
title: "Troubleshooting Package Management"
description: "What to check when a package cannot be downloaded, installed or unpacked in MODX: cURL, the packages directory, the archive format and the archive_with setting."
---

Most problems with Package Management come from the environment of the server rather than from MODX. Check the causes below.

## cURL Is Missing

MODX asks the providers over HTTP with the PSR-18 client, which needs the extension cURL. The manager checks it when the page opens. Without cURL a notice is shown above the page, and the button **Download Extras** is replaced by the search of the local directory.

Ask your host for the extension cURL.

## The Packages Directory Is Not Writable

The packages are unpacked into `core/packages/`, and the archives are written there as well. When PHP cannot write into that directory, the download and the installation fail. Make the directory writable by PHP.

## The Archive Cannot Be Unpacked

Some servers have a broken build of ZipArchive, and the unpack fails with an error from `extractTo` or `archiveTo`. The message comes from PHP, not from MODX.

Set the system setting `archive_with` to **Yes** (the value `1`). MODX then unpacks the archives with PCLZip, which is shipped with MODX and needs no extension of PHP.

## The Archive Is Missing

A package that is installed but whose archive was deleted from `core/packages/` can be fetched from the provider again. MODX downloads it once more when it needs the archive.

## The Upload Is Refused

The **Upload a package** entry of the menu of the **Download Extras** button takes only an archive with the name `<signature>.transport.zip`. A file with another name, or a file that is not a zip, is refused with a message that says so.

## See Also

1. [Package Management](building-sites/extras)
2. [Providers](building-sites/extras/providers)
3. [archive_with](building-sites/settings/archive_with)
