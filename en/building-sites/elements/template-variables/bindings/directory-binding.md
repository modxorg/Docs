---
title: "DIRECTORY Binding"
_old_id: "100"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/directory-binding"
---

## What is the @DIRECTORY Binding?

The DIRECTORY binding lists the readable files and directories in one folder. Use it with **Listbox (Single-Select)** when the editor should pick a file, such as a logo or an mp3. The list skips only `.`, `..`, `.svn`, `.git`, and `.DS_Store`. A file such as `.htaccess` is included.

## Usage

When you create a Template Variable, place the following text into the **Input Option Values** box:

``` php
@DIRECTORY /path/to/some_directory
```

Pair it with the input type **Listbox (Single-Select)** so the editor can pick one file from the list.

In MODX Revolution, the path used for the @DIRECTORY binding is relative to the site's root. It is **not** an absolute file path. If you want to list files above your site's root, you must use the ".." syntax, e.g. **@DIRECTORY /../dir\_above\_root** This binding will work with or without a trailing slash in the directory name.

A Template can print the chosen path:

``` html
<img src="[[*myTV]]" alt="" />
```

## Additional Info

A mask such as `*.jpg` does not filter the list. This does not work:

``` php
@DIRECTORY /list/*.jpg  # doesn't work!
```

There are PHP code snippets out there that emulate this functionality. See the following forum thread: <https://forums.modx.com/index.php/topic,3124.0.html>

## Security

How the chosen file is used on the page can be a security risk. Do not use this binding to pick JavaScript that the page then runs: a user who can upload a file could then run it. Be wary of letting users see the directory structure.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")
