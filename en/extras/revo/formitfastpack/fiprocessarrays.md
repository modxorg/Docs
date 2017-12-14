---
title: "fiProcessArrays"
_old_id: "1758"
_old_uri: "revo/formitfastpack/fiprocessarrays"
---

fiProcessArrays concatenates array values into strings so that they can be used in an email report.

 Some (later?) versions of FormIt handle array values already, but fiProcessArrays can be useful if you need extra customization or if have any trouble with multiple checkboxes not showing up in fiGenerateReport.

To use, call the fiGenerateReport hook before the hooks that would use the converted values (such as "fiGenerateReport" and/or "email").

 ```
<pre class="brush: plain">[[!FormIt? &hooks=`math,spam,fiProcessArrays,fiGenerateReport,email,redirect` ...
    &figrExcludedFields=`op1,op2,operator,math`
]]<br>

```Available Properties
--------------------

 The following parameters can be passed to the FormIt call:

 <table><tbody><tr><td> Name </td> <td> Description </td> <td> Default Value </td> <td> Version Added </td> </tr><tr><td> fipaTpl </td> <td>Optional chunk to pass each value of each field through. You can use placeholders \[\[+name\]\] and \[\[+value\]\] for the field name and field value. </td><td> </td> <td>1.1.1</td></tr><tr><td>fipaWrapTpl </td> <td>Optional chunk called for each field, but only if there are values. It uses a single placeholder: \[\[+values\]\]</td> <td> nospam,blank,recaptcha\_challenge\_field,recaptcha\_response\_field </td> <td>1.1.1</td></tr><tr><td>fipaFieldSuffix

 </td> <td>The suffix to append to each array field name with the results of the array concatenation. For example, if the suffix is "\_values" and the array field name is "colors\[\]", the placeholder available on your FormIt email report is \[\[+colors\_values\]\]</td><td>\_values

 </td> <td> </td></tr><tr><td>fipaValueSeparator </td> <td> The placeholder to use for the output. </td> <td> (empty) if a fipaTpl is set, otherwise <font face="Menlo, Monaco, monospace, sans-serif">','</font> (comma)</td> <td>1.1.1</td></tr><tr><td>fipaList</td> <td>A shortcut to generate an HTML bulleted list of each field name. Wraps each array value in and all of the values for a field in </td> <td>False</td> <td></td> </tr><tr><td>fipaExcludedFields</td> <td>List of field names for which to not process array values. </td> <td></td> <td></td></tr></tbody></table>