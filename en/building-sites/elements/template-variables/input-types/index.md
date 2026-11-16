---
title: "Template Variable Input Types"
_old_id: "489"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-input-types"
---

There are a number of built-in template variable (TV) types. Be aware that:

- Built-in input types not found on this page are deprecated or have been removed and may not work in the current version of MODX.
- For TV types containing user-defined, selectable lists (listbox, checkbox, radio, etc.), it's best to enter list definitions having multiple values on a single line with no carriage returns.

## Input Types

### Auto-Tag (autotag)

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "parent_resources": ""
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-autotag.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type is a compound field with a text field for tag entry and rows of clickable pre-existing tags. It can be useful for blog content, Resources that can belong to multiple categories, or anytime you need a list of tags that have been used before. Every time you edit or create a Resource with access to an Auto-Tag TV, you will see rows of tags that have been used before. You can easily click on these tags to assign them to the current Resource.

**Auto-Tag** saves a comma-separated list. The Delimiter output type splits only on `||`, so it does not split these tags. Split on the comma in a Snippet or an output filter. 

#### Linking Tags to Resources

To output tags so each one links to a certain Resource and passes the tag in the URL (as a GET parameter), you can use an output filter (Snippet). For example:

```php
<?php

// In case the TV is empty
if ($input == '') {
    return 'Error';
}

$output = [];

// Based on a delimiter of "," this will split each one up in an array
$tags = array_map('trim', explode(',', $input));

// Loop through tags, adding each to an output array with a link to Resource 9 and the tag as a get parameter
foreach ($tags as $key => $value) {
    $url = $modx->makeurl(9, '', ['tag' => $value]);
    $output[] = <<<LINK
    <a href="{$url}">{$value}</a>
    LINK;
}

// Convert the output array to a string
return implode(', ', $output);

```

### Check Box (checkbox)

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "displayAsSwitch": "false",
    "columns": "1",
    "columnDirection": "vertical",
    "columnWidth": "medium",
    "wrapColumnText": "false"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-checkbox.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type renders one or more checkbox fields based on a list of options you define.

#### Single Checkbox

The most basic usage of this type of field is a single checkbox, often used for confirmation of some condition. Use the following sample configuration to control the checkbox’s initial state:

| Config Field | Value <br>(default checked) | Value <br>(default unchecked) |
| ---- | ---- | ---- |
| Checkbox Options | `My Option==1` | `My Option==1` |
| Default Option(s) | `1` | `0` |
|||


Although the values of `1` and `0` are a natural choice for this type of field, any values can be used. As long as the value following the `==` matches the *Default Option(s)* value, the checkbox will be checked. 

#### Multiple Checkboxes

If you want to set default of a check box template variable to multiple values, you have to separate the values with the "||" delimiter.

##### Basic Definition

In their simplest form, lists are defined using labels separated by double-pipes. In this format, the label is also the value. Using the following sample configuration, three checkboxes would be rendered with “Option B” checked by default.

| Config Field | Value |
| ---- | ---- |
| Checkbox Options | `Option A\|\|Option B\|\|Option C` |
| Default Option(s) | `Option B` |
|||

##### Label==Value Definition (with multiple default selections)

You can distinguish between labels and values using double-equals (`==`) and between each option using double-pipes (`||`). Using the following sample configuration, three checkboxes would be rendered with both “Option A” and “Option C” checked by default.

| Config Field | Value |
| ---- | ---- |
| Checkbox Options | `Option A==1\|\|Option B==2\|\|Option C==3` |
| Default Option(s) | `1\|\|3` |
|||

##### Dynamic Definition (using mySQL query)

| Config Field | Value |
| ---- | ---- |
| Checkbox Options | `@SELECT pagetitle, id FROM modx_site_content WHERE parent=35` |
| Default Option(s) | `(empty)` (no default) |
|||

With several checkboxes, set **Output Type** to Delimiter (for example a comma) so you can tell the stored values apart.


### Date (date)

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "disabledDates": "",
    "disabledDays": "",
    "minDateValue": "",
    "minTimeValue": "",
    "maxDateValue": "",
    "maxTimeValue": "",
    "startDay": "0",
    "timeIncrement": "15",
    "hideTime": "false"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-date.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type provides a picker widget, allowing you to set a date and/or a time.

If you’d like your TV to have a specific date selected by default, you can choose from MODX’s preset options or enter a custom option in the *Default Date and Time* field.

<hr>

#### Preset Relative Date Options

| Keyword | Result |
| --- | --- |
| `yesterday` | The previous day at midnight. The Manager label is **Yesterday (midnight)**. |
| `today` | Today at midnight. The Manager label is **Today (midnight)**. |
| `now` | Today at the current time. The Manager label is **Today with Current Time**. |
| `tomorrow` | The next day at midnight. The Manager label is **Tomorrow (midnight)**. |

The date string is passed to PHP `strtotime`. `+72` is not “72 hours ago”. The Manager hint still talks about hours. Type a string `strtotime` understands, such as `-72 hours`, or type the date itself.

| Value | Result |
| --- | --- |
| `-72 hours` | 72 hours before the current time |
| `+72 hours` | 72 hours after the current time |
| `2026-07-01 14:00` | 1 July 2026 at 14:00 |

Format the value on the page with the [Date TV output type](building-sites/elements/template-variables/output-types/date). That output type calls `strftime`. See the note on that page.

### Email

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "maxLength": "",
    "minLength": ""
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-email.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type is a text field that automatically validates its value against a preset email address pattern. To validate against your own custom pattern, create a Text TV instead and enter your pattern in the *Regular Expression Validator* field.

### File

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-file.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type creates a file input field to browse the server for a file. Files can be uploaded through the MODX File Manager. A TV’s optional *Default File* is also selectable using the File Manager.

### Hidden

A hidden field does not show up in the manager, so it's rare that you'd use this option. Some example usages include:

- Making a default value available to all pages
- Storing a Snippet that takes a page’s ID as input
- Storing a calculated value based on other fields’ values

### Image

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-image.svg" class="input-type" style="max-width: 460px; margin: 1rem 0 0 0;">
<p><small>Photo courtesy of Victor Serban, Unsplash</small></p>

This TV type creates a file input field to browse the server for an image. Images can be uploaded through the MODX File Manager. A TV’s optional *Default Image* is also selectable using the File Manager.

To associate this TV with a Media Source other than the default one, you can do so by visiting the “Media Sources” tab while in the TV editor view. This tab lists all Contexts this TV is available to and presents a dropdown menu to assign a specific Media Source to each (double-click a Source name in the grid to access its menu).

To learn about the various Media Source settings that influence where this TV’s files are located and determine their validity (*i.e.*, file storage paths, allowed file types/extensions, upload limits, etc.), *see* the [Media Sources](building-sites/media-sources "Media Sources") documentation page.

By default, this input type returns the link (to be used as `src` attribute) to the image. As an alternative to constructing the `<img>` tag for this TV in your front-end template, you can select [“Image”](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/image-tv-output-type) in *Output Options*; this will return a full image tag that includes the attributes you specify, *e.g.*:

```html
<img src="path/to/image.png" alt="Photo" id="photo" class="photo" style="width: 200px;">
```

`src` in that example is not one of the editable output options.

### Listbox (Single-Select) (listbox)

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "title": "",
    "typeAhead": "false",
    "typeAheadDelay": "250",
    "forceSelection": "false",
    "listEmptyText": ""
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-listbox.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type produces a select field where only a single option can be selected. The methods of defining its options are shown in the Listbox (Multi-Select) section below.

### Listbox (Multi-Select) (listbox-multiple)

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "stackItems": "false",
    "preserveSelectionOrder": "false",
    "title": "",
    "typeAhead": "false",
    "typeAheadDelay": "250",
    "forceSelection": "false",
    "listEmptyText": ""
    
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-listbox-multi.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type produces a custom select field where one or more options can be selected. Selections are presented as a row of dismissable options. As with the other chooser-type TVs, this field can be powered by using a `@SELECT` binding in its “Dropdown List Options” field. Set **Output Type** to Delimiter so you can tell the stored values apart.

#### Simple Usage

Just like with the Checkbox options, you can simply specify a list of values separated by double-pipes:

```
Man||Bear||Pig
```

#### Separate Options/Values

Often it's nice to have a more readable label. You can display something nice and still store a different value using the double-equals and double-pipes format used by checkboxes:

```
Option 1==value1||Option 2==value2
```

### Number

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "minValue": "",
    "maxValue": "",
    "allowDecimals": "false",
    "decimalPrecision": "2",
    "strictDecimalPrecision": "false",
    "decimalSeparator": "."
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-number.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type simulates a real number field using a special text field with pre-defined and user-defined constraints: Only the digits 0 to 9, a minus sign (-), and a period (*i.e.*, decimal point) are accepted.

#### Usage Notes

- If you want trailing zeros to be preserved (*i.e.*, 4.50 doesn’t get trimmed to 4.5), set “Strict Decimal Precision” to “Yes.” This can be helpful for currency fields.
- To prevent negative values, set the TV’s “Min Value” to 0 (or greater)

#### Unsupported Values and Features

- Complex numbers (*e.g.*, radicals “2^10,” scientific notation “2.8e6,” etc.)
- Number-specific special controls like `step` and the ability to change the entered value via the up and down arrow keys

### Radio Options (option)

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "columns": "1",
    "columnDirection": "vertical",
    "columnWidth": "medium",
    "wrapColumnText": "false"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-radio.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type displays a list of radio button options. Unlike Check Box TVs, only a single selection can be made when using a Radio Options TV.

#### Simple Usage

Using the configuration below, this TV would initially display as shown in the image above.

| Input Option | Value |
| ---- | ---- |
| Radio Button Options | `Red==1\|\|Green==2\|\|Blue==3` |
| Default Option | `2` |
|||

#### Advanced Usage

Radio Options values are not restricted to just hard-coded text and numbers; you can incorporate Chunks and/or TVs that output more complex content as a value (without the aid of an Extra or custom Snippet). For example, to build a sidebar selector:

| Input Option | Value |
| ---- | ---- |
| Radio Button Options | `[[$my_related_chunk]]\|\|Content==[[*sidebar-txt]]\|\|Twitter==[[$my_twitter_chunk]]` |
| Default Option | `[[$my_related_chunk]]` |
|||

### Resource List (resourcelist)

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "1",
    "parents": "",
    "depth": "10",
    "includeParent": "1",
    "limitRelatedContext": "0",
    "where": "",
    "limit": "0",
    "typeAhead": "false",
    "typeAheadDelay": "250",
    "forceSelection": "false",
    "listEmptyText": ""
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-resourcelist.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type is a single-select list of Resources. The stored value is the id of the Resource you pick. The list follows the **Parents** field. With **Parents** empty, the list is not limited to the children of one Resource. **Depth** starts at 10.

A blank choice labeled `-` is always in the list.

You can filter the list with a JSON `where` value. These are examples, not the defaults:

```php
[{"template:=":"4"}]
```

```php
[{"pagetitle:!=":"Home"}]
```

### RichText

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-richtext.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

When a rich text editor is installed (for example TinyMCE, CKEditor, or Redactor), this TV type becomes available. It shows a small WYSIWYG field for HTML text.

### Tag

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "1"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-tag.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type shows rows of clickable tags. The starting values come from **Tag Options**. Like Auto-Tag, the text field can add comma-separated tags. Tags you add on the Resource stay on that Resource. The options are set up like a Check Box TV.

**Tag** saves a comma-separated list, including tags you add on the Resource. The Delimiter output type splits only on `||`, so it does not split these tags. **Check Box** and **Listbox (Multi-Select)** store `||`, and Delimiter does split those.

### Text

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "maxLength": "",
    "minLength": "",
    "regex": "",
    "regexText": ""
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-text.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type produces a standard text field.

### Textarea

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true",
    "inputHeight": "140",
    "textareaGrow": "false",
    "textareaResizable": "false"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-textarea.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type produces a standard textarea. **Height** is in pixels and starts at 140.

### URL

<details>
    <summary><em>JSON Input Options Template</em></summary>

```json
{
    "allowBlank": "true"
}
```

</details>
<img src="https://docs.modx.com/3.x/en/building-sites/elements/template-variables/input-types/type-url.svg" class="input-type" style="max-width: 460px; margin: 1rem 0;">

This TV type is a prefix list plus a text field. The prefixes are **(none)**, `http://`, `https://`, `ftp://`, and `mailto:`. **(none)** is stored as `--`. There is no format check. For a strict URL, use a Text TV with a regular expression validator.

On save, MODX removes `http://` and `ftp://` from the text part, then adds the prefix you chose. `https://` and `mailto:` stay in the text. If that prefix is already selected, the saved value can contain it twice. Leave the scheme out of the text part.

## Dynamically-Defined Input Options

This section is about the TV definition, not the choices a listbox shows.

Outside the Manager form, for example in MIGX, input options can be a JSON object.

Tags in that JSON stay as plain text. Type the limit in **Earliest Date** and **Latest Date**. To calculate a TV value, call a [Snippet](extending-modx/snippets "Snippets"). A Snippet tag inside this JSON is not run.
