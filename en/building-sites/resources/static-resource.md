---
title: "Static Resource"
description: "Serve a file from disk through a Resource, with path limits, content types, templates, and downloads."
_old_id: "293"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/static-resource"
---

## What is a Static Resource?

A Static Resource represents a file on the filesystem. The `content` field holds the file path, not the file contents. MODX reads the file at request time and returns it; it does not copy the file or create a link to it.


Like other Resources, it has an ID, appears in the Resource tree, and can belong to Resource Groups and appear in menus and search results.

The path can contain MODX tags. You can store a base path in a System Setting or use a [Snippet](extending-modx/snippets) to build it.

## Where files may live

The path is resolved against [`resource_static_path`](building-sites/settings/resource_static_path), which defaults to `{assets_path}`. The setting and the `content` field can both contain tags, and `../` sequences are stripped from the path.

An absolute path outside that base is used only when [`resource_static_allow_absolute`](building-sites/settings/resource_static_allow_absolute) is enabled. That setting lets manager users read any file the PHP process can read, so keep it off unless every manager user is trusted.

If the file is missing or unreadable, MODX sends the error page with a 404 status.

## Content Types and output

A Static Resource uses a [Content Type](building-sites/resources/content-types) like any other Resource, which decides the MIME type and the file extension in the URL.

For a text Content Type (`Binary` set to No), MODX reads the file and renders it like a Document. The Template applies and tags in the file are parsed.

For a binary Content Type, MODX sends the file as a stream:

- `Content-Type` from the Content Type.
- `Content-Length` when the size is known.
- `Content-Disposition`: `attachment` when the Resource's Content Disposition is set to attachment, otherwise `inline`.
- Any [custom headers](building-sites/resources/content-types#custom-headers) from the Content Type.


MODX then streams the file with `readfile()` and exits. The Template is not used and tags are not parsed.

## About Aliases

Do not include a file extension in the alias: the [Content Type](building-sites/resources/content-types) supplies it. For example, a Static Resource with alias `test` and the PDF Content Type renders as `test.pdf`.

## Templates

With the empty Template, MODX outputs the file contents. If you use a custom Template to add meta tags or Template Variables, include `[[*content]]` where the file contents should appear.

A binary Static Resource bypasses the Template entirely.

## Downloads

Set **Content Disposition** to `attachment` to send the file as a download with the server-side header. To force a download from a link to an already served file, add the HTML `download` attribute.

```html
<a href="assets/files/report.pdf" download="report.pdf">Download the report</a>
```

Browsers may display a PDF inline or download it, depending on their settings. The `attachment` disposition or the `download` attribute makes the behavior explicit.

## See Also

1. [Content Types](building-sites/resources/content-types)
2. [Named Anchor](building-sites/integrating-templates/named-anchor)
3. [Static Resource](building-sites/resources/static-resource)
4. [Symlink](building-sites/resources/symlink)
    1. [Using Resource Symlinks](building-sites/resources/symlink/using-resource-symlinks)
5. [Weblink](building-sites/resources/weblink)
