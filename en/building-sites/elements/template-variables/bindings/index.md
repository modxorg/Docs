---
title: "Bindings"
_old_id: "33"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings"
---

With at-bindings, you can define a dynamic data source for a template variable. Typically used for selectbox or checkbox TVs, where the editor can choose one or more relevant options that are dynamically shown.

For example:

- an externally generated file that is sent via FTP to the server
- a database table accessible to MODX
- a [Resource](building-sites/resources "Resources") in the resource tree
- a [Chunk](building-sites/elements/chunks "Chunks") in the Elements tree
- the result of an evaluated PHP script

These Data Sources can be tied (or "bound") to a Template Variable for formatting and displaying in document. In addition, the bound data in the TVs can be almost effortlessly formatted via the Display Controls within the TV system for some truly stunning results. The format for using the types of data source bindings available to all template variables follows:

- @FILE file\_path
- @RESOURCE resource\_id
- @CHUNK chunk\_name
- @SELECT sql\_query
- @DIRECTORY path\_relative\_to\_base\_path
- @INLINE available in some Extras (e.g. getResources), this specifies a formatting chunk in-line as a string.

These "@" commands or bindings will allow you to quickly and easily attach your template variables to virtually any database system available.

The value returned from the data source can either be a string value (including numbers, dates, etc), an array or a recordset. The value returned is dependent on the type of binding used. Some display controls will attempt to either convert the returned value into a string or an array.

For example, controls that accept string values such as a radio button group or select list will attempt to convert a record set (rows and columns) into the following format:

``` php
col1row1Value==col2row1Value||col1row2Value==col2row2Value,...
```

> Note that @-bindings only work inside "Input Option Values" or "Default Value" fields.

When placing @ bindings inside the "Input Option Values" field, they are used to format input options only when editing document within the Manager, for example to create a drop-down list of Cities or Countries.

When placing @ bindings inside the "Default Value" field the returned value is used to render to the final web page. This makes it simple to build complex forms for data input on the web very quickly.

## Types

- [@FILE](building-sites/elements/template-variables/bindings/file-binding "FILE Binding")
- [@RESOURCE](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE Binding")
- [@CHUNK](building-sites/elements/template-variables/bindings/chunk-binding "CHUNK Binding")
- [@SELECT](building-sites/elements/template-variables/bindings/select-binding "SELECT Binding")
- [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET Binding")
- [@DIRECTORY](building-sites/elements/template-variables/bindings/directory-binding "DIRECTORY Binding")
- [@INHERIT](building-sites/elements/template-variables/bindings/inherit-binding "INHERIT Binding")

Certain extras, such as [getResources](/extras/getresources "getResources"), support `@INLINE` or `@FILE` bindings for their chunks.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
