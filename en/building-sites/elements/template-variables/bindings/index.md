---
title: "Bindings"
_old_id: "33"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings"
---

An @ binding sets the data source for a Template Variable. Editors usually meet it on a list or checkbox TV: the choices are loaded when the Resource is edited.

Sources include:

- a file sent to the server, for example by FTP
- a database table MODX can read
- a [Resource](building-sites/resources "Resources") in the Resource tree
- a [Chunk](building-sites/elements/chunks "Chunks") in the Elements tree
- the result of a PHP script

The commands are:

- @FILE file_path
- @RESOURCE resource_id
- @CHUNK chunk_name [properties as json]
- @SNIPPET snippet_name [properties as json]
- @SELECT sql_query
- @DIRECTORY path_relative_to_base_path
- @INHERIT
- @DOCUMENT resource_id
- @INLINE available in some Extras (e.g. getResources), this specifies a formatting chunk in-line as a string.

The source can return a string (including a number or a date), an array, or a recordset. Which one you get depends on the binding. Some input types then try to turn that result into a string or an array.

For example, controls that accept string values such as a radio button group or select list will attempt to convert a record set (rows and columns) into the following format:

``` php
col1row1Value==col2row1Value||col1row2Value==col2row2Value,...
```

A binding in **Input Option Values** builds the choices while you edit the Resource. A binding in **Default Value** fills the TV when that Resource has no value of its own. A binding saved on the Resource also runs when the page outputs `[[*tvName]]`, if the stored value starts with `@`.

## Types

- [@FILE](building-sites/elements/template-variables/bindings/file-binding "FILE Binding")
- [@RESOURCE](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE Binding")
- [@CHUNK](building-sites/elements/template-variables/bindings/chunk-binding "CHUNK Binding")
- [@SELECT](building-sites/elements/template-variables/bindings/select-binding "SELECT Binding")
- [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET Binding")
- [@DIRECTORY](building-sites/elements/template-variables/bindings/directory-binding "DIRECTORY Binding")
- [@INHERIT](building-sites/elements/template-variables/bindings/inherit-binding "INHERIT Binding")
- [@DOCUMENT](building-sites/elements/template-variables/bindings/document-binding "DOCUMENT Binding")
- [@INLINE](building-sites/elements/template-variables/bindings/inline-binding "INLINE Binding")

Certain extras, such as [getResources](/extras/getresources "getResources"), support `@INLINE` or `@FILE` bindings for their chunks.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")