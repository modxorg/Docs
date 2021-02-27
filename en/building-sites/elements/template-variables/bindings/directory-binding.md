---
title: "DIRECTORY Binding"
_old_id: "100"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/directory-binding"
---

## What is the @DIRECTORY Binding?

The DIRECTORY binding reads the contents of a directory. This can really useful when you tie it into a List control widget, e.g. if you want to do something like give the user a list of logo images to choose for a page, or choose which mp3 file plays on a particular page. REMEMBER: it returns **ALL** contents of a directory, including all files and all directories - with the sole exception of directories prefixed with a period.

## Usage

When you create a Template Variable, place the following text into the **Input Option Values** box:

``` php
@DIRECTORY /path/to/some_directory
```

Frequently, this is coupled with an Input Type of "DropDown List Menu" to allow the user to select a file from the list.

In MODX Revolution, the path used for the @DIRECTORY binding is relative to the site's root. It is **not** an absolute file path. If you want to list files above your site's root, you must use the ".." syntax, e.g. **@DIRECTORY /../dir\_above\_root** This binding will work with or without a trailing slash in the directory name.

If you are using the @DIRECTORY binding for your template variable `[[*myTV]]`, you can easily imagine that your template code could have some stuff in it like:

``` html
<img src="[[*myTV]]" alt="" />
```

## Additional Info

Can you filter which files are selected? E.g. using \*.jpg? The following DOES NOT WORK:

``` php
@DIRECTORY /list/*.jpg  # doesn't work!
```

There are PHP code snippets out there that emulate this functionality. See the following forum thread: <https://forums.modx.com/index.php/topic,3124.0.html>

## Security

Depending on how the file is used on the page, it may pose a security risk. Be careful if you were using this binding to select JavaScript files to be executed. What if a user had the ability to upload (and thus execute) a JavaScript file? Also, always be wary of letting users see your directory structure.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")
