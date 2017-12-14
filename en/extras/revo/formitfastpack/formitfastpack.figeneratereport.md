---
title: "fiGenerateReport"
_old_id: "1711"
_old_uri: "revo/formitfastpack/formitfastpack.figeneratereport"
---

How it works
------------

 The fiGenerateReport generates a simple list of field names and values from the submitted request data. It allows you to use a single email template for multiple forms.

 Labels are generated simply by using output filters on the field name submitted through the request. The default method replaces underscores with spaces and capitalizes the first letter of each resulting word.

 Examples for the default row template:

 <table><tbody><tr><td> Example Form Field </td> <td> Generated Label </td> </tr><tr><td>`<field name="first_name" value="VALUE" />` </td> <td>```<p><strong>First Name:</strong> VALUE</p>` </td> </tr><tr><td>`<field type="checkbox" name="are_you_vegetarian" checked="checked" />` </td> <td>```<p><strong>Are You Vegetarian:</strong> 1</p>` </td> </tr><tr><td>`<field name="companyAddress" value="VALUE" />` </td> <td>```<p><strong>companyAddress:</strong> VALUE</p>` </td></tr></tbody></table><div class="warning"> If using this hook, be careful when naming your form fields to make field names that are properly parsed by the output filters into readable labels. </div>Usage
-----

 Use as a FormIt hook before the "email" hook:

 ```
<pre class="brush: plain">[[!FormIt? &hooks=`math,spam,fiGenerateReport,email,redirect` ...]]

``` In your emailTpl (FormIt report template) or any other FormIt-parsed templates, use the figr\_values placeholder instead of having to manually place each field label and value:

 ```
<pre class="brush: plain"> <p>A <strong>[[++site_name]]</strong> contact form submission was sent from the <strong>[[*pagetitle]]</strong> page:</p>
[[+figr_values]]

``` You can pass additional configuration options directly into the FormIt call:

 ```
<pre class="brush: plain">[[!FormIt? &hooks=`math,spam,fiGenerateReport,email,redirect` ...
    &figrExcludedFields=`op1,op2,operator,math`
]]

```Checkboxes and Other Array Values
---------------------------------

Some (later?) versions of FormIt handle array values already, but if you have any trouble with multiple checkboxes or other array values not being output on the report, add the fiProcessArrays hood right before fiGenerateReport:

```
<pre class="brush: plain">[[!FormIt? &hooks=`math,spam,fiProcessArrays,fiGenerateReport,email,redirect` ...
    &figrExcludedFields=`op1,op2,operator,math`
]]<br>
```Available Properties
--------------------

 The following parameters can be passed to the FormIt call:

 <table><tbody><tr><td> Name </td> <td> Description </td> <td> Default Value </td> <td> Version Added </td> </tr><tr><td> figrExcludedFields </td> <td> Fields to exclude from the list. Merged with figrDefaultExcludedFields. </td> <td> </td> <td> 1.1.0-pl

 </td> </tr><tr><td> figrDefaultExcludedFields </td> <td> Additional fields to exclude from the list. Available as an option in case you need to disable the defaults. </td> <td> nospam,blank,recaptcha\_challenge\_field,recaptcha\_response\_field </td> <td> 1.1.0-pl </td> </tr><tr><td> figrTpl

 </td> <td> The template to use for each row. </td> <td> formReportRow

 </td> <td> 1.1.0-pl

 </td> </tr><tr><td> figrAllValuesLabel </td> <td> The placeholder to use for the output. </td> <td> figr\_values </td> <td> 1.1.0-pl </td> </tr><tr><td>figrIncludeArrays</td> <td>If True, will include fields whose values are arrays. Leave as False if using fiProcessArrays or similar to convert arrays to True. </td> <td>False</td><td>_1.1.1_</td> </tr><tr><td>figrFields</td> <td>The list of fields to limit the automatic report to. This can also be used to sort the fields in a custom order. </td> <td></td> <td>_1.1.1_</td></tr></tbody></table>figrTpl Chunk
-------------

 By default, the following formReportRow chunk contents are used:

 ```
<pre class="brush: plain"><p><strong>[[+field:replace=`_== `:ucwords]]:</strong> [[+value:nl2br]]</p><br>

``` The only placeholders available in the chunk are `[[+field]]` (for the field name submitted in the request) and `[[+value]]` (for the field value submitted in the request).

Security
--------

 FormIt will not remove or validate added fields, so there is nothing to stop a savvy user from adding additional fields to the request. Such additional fields will be added to the email report.

 However, FormIt does perform basic sanitization on all request data, so such improperly added fields should not be more dangerous than the other submitted data.

Roadmap
-------

 Add figrIncludedFields to limit and order the desired fields.

 Better handling of array values.