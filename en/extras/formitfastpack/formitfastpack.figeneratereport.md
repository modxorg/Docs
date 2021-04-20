---
title: "fiGenerateReport"
_old_id: "1711"
_old_uri: "revo/formitfastpack/formitfastpack.figeneratereport"
---

## How it works

The fiGenerateReport generates a simple list of field names and values from the submitted request data. It allows you to use a single email template for multiple forms.

Labels are generated simply by using output filters on the field name submitted through the request. The default method replaces underscores with spaces and capitalizes the first letter of each resulting word.

Examples for the default row template:

| Example Form Field                                                      | Generated Label                                 |
| ----------------------------------------------------------------------- | ----------------------------------------------- |
| `<field name="first_name" value="VALUE" />`                             | `<p><strong>First Name:</strong> VALUE</p>`     |
| `<field type="checkbox" name="are_you_vegetarian" checked="checked" />` | `<p><strong>Are You Vegetarian:</strong> 1</p>` |
| `<field name="companyAddress" value="VALUE" />`                         | `<p><strong>companyAddress:</strong> VALUE</p>` |

If using this hook, be careful when naming your form fields to make field names that are properly parsed by the output filters into readable labels.

## Usage

Use as a FormIt hook before the "email" hook:

```php
[[!FormIt?
    &hooks=`math,spam,fiGenerateReport,email,redirect`
    ...
]]
```

In your emailTpl (FormIt report template) or any other FormIt-parsed templates, use the figr_values placeholder instead of having to manually place each field label and value:

```html
<p>
    A <strong>[[++site_name]]</strong> contact form submission was sent from the
    <strong>[[*pagetitle]]</strong> page:
</p>
[[+figr_values]]
```

You can pass additional configuration options directly into the FormIt call:

```php
[[!FormIt?
    &hooks=`math,spam,fiGenerateReport,email,redirect`
    ...
    &figrExcludedFields=`op1,op2,operator,math`
]]
```

## Checkboxes and Other Array Values

Some (later?) versions of FormIt handle array values already, but if you have any trouble with multiple checkboxes or other array values not being output on the report, add the fiProcessArrays hood right before fiGenerateReport:

```php
[[!FormIt?
    &hooks=`math,spam,fiProcessArrays,fiGenerateReport,email,redirect`
    ...
    &figrExcludedFields=`op1,op2,operator,math`
]]
```

## Available Properties

The following parameters can be passed to the FormIt call:

| Name                      | Description                                                                                                                         | Default Value                                                   | Version Added |
| ------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------- | ------------- | --- |
| figrExcludedFields        | Fields to exclude from the list. Merged with figrDefaultExcludedFields.                                                             |                                                                 | 1.1.0-pl      |
| figrDefaultExcludedFields | Additional fields to exclude from the list. Available as an option in case you need to disable the defaults.                        | nospam,blank,recaptcha_challenge_field,recaptcha_response_field | 1.1.0-pl      |
| figrTpl                   | The template to use for each row.                                                                                                   | formReportRow                                                   | 1.1.0-pl      |
| figrAllValuesLabel        | The placeholder to use for the output.                                                                                              | figr_values                                                     | 1.1.0-pl      |
| figrIncludeArrays         | If True, will include fields whose values are arrays. Leave as False if using fiProcessArrays or similar to convert arrays to True. | False                                                           | _1.1.1_       |     |
| figrFields                | The list of fields to limit the automatic report to. This can also be used to sort the fields in a custom order.                    |                                                                 | _1.1.1_       |

## figrTpl Chunk

By default, the following formReportRow chunk contents are used:

```php
<p><strong>[[+field:replace=`_== `:ucwords]]:</strong> [[+value:nl2br]]</p><br>
```

The only placeholders available in the chunk are `[[+field]]` (for the field name submitted in the request) and `[[+value]]` (for the field value submitted in the request).

## Security

FormIt will not remove or validate added fields, so there is nothing to stop a savvy user from adding additional fields to the request. Such additional fields will be added to the email report.

However, FormIt does perform basic sanitization on all request data, so such improperly added fields should not be more dangerous than the other submitted data.
