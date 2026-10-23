---
title: "Template Variables"
sortorder: "2"
_old_id: "304"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables"
---

## What is a Template Variable?

A Template Variable (TV) is a custom field on a Resource. A Resource already has fields such as `pagetitle`, `content`, and `description`. Add a TV when you need another field, for example a second content area or a list of month names.

You can add TVs. On save, MODX does not check how many already exist.

When a [Resource](building-sites/resources "Resources") is shown on the site, `[[*name]]` is replaced with the TV value. In the Resource form, the field appears only when that Resource's Template has the TV assigned. On any other page the same tag still prints the default, or a value already saved for that Resource.

Output types format that value, for example as an image or a URL.

## Usage

A textarea TV named `bio`, assigned to the Biography Pages Template, is printed with:

```php
[[*bio]]
```

Define the TV and attach it to the Template the Resource uses. See [Creating a Template Variable](building-sites/elements/template-variables/step-by-step "Creating a Template Variable").

### Advanced Usage

A TV can take properties. A TV named `intromsg`:

> Hello `[[+name]]`, you have `[[+messageCount]]` messages.

Fill the placeholders in the call:

```php
[[*intromsg?name=`George` &messageCount=`123`]]
```

Output:

> Hello George, you have 123 messages.

An [output filter](building-sites/elements/template-variables/step-by-step "Input and Output Filters (Output Modifiers)") can change the printed value. Limit it to 100 characters:

```php
[[*bioMessage:limit=`100`]]
```

## See Also

1. [Creating a Template Variable](building-sites/elements/template-variables/step-by-step)
2. [Bindings](building-sites/elements/template-variables/bindings)
    1. [CHUNK Binding](building-sites/elements/template-variables/bindings/chunk-binding)
    2. [DIRECTORY Binding](building-sites/elements/template-variables/bindings/directory-binding)
    3. [FILE Binding](building-sites/elements/template-variables/bindings/file-binding)
    4. [INHERIT Binding](building-sites/elements/template-variables/bindings/inherit-binding)
    5. [RESOURCE Binding](building-sites/elements/template-variables/bindings/resource-binding)
    6. [SELECT Binding](building-sites/elements/template-variables/bindings/select-binding)
    7. [SNIPPET Binding](building-sites/elements/template-variables/bindings/snippet-binding)
3. [Template Variable Input Types](building-sites/elements/template-variables/input-types)
4. [Template Variable Output Types](building-sites/elements/template-variables/output-types)
    1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
    2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
    3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
    4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
    5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)
5. [Adding a Custom TV Type - MODX 2.2](extending-modx/custom-tvs)
6. [Creating a multi-select box for related pages in your template](building-sites/tutorials/multiselect-related-pages)
7. [Accessing Template Variable Values via the API](extending-modx/snippets/accessing-tvs)
