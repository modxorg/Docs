---
title: "sekFormTools.input.datepicker"
_old_id: "979"
_old_uri: "revo/sekformtools/sekformtools.input.datepicker"
---

What is input.datepicker?
-------------------------

Add a datepicker to a form quickly and easily using this snippet.

Usage
-----

Example for input.datepicker:

```
<pre class="brush: php">
[[input.datepicker? &value=`5/3/2012`]]

```Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>input\_id</td><td>The id to assign to the input box.   
</td><td>  
</td><td>  
</td><td>>0.0.1</td></tr><tr><td>name</td><td>The name to assign to the input box.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>value</td><td>The value to assign to the input box.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>menu</td><td>Enter "1" to add year and month drop down to the date picker.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>date\_format</td><td>Add year and month drop down to the date picker.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>min\_date</td><td>Set the minimum date to use.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>max\_date</td><td>Set the maximum date that can be used.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>animation</td><td>The method the calendar is displayed.   
</td><td>show</td><td> </td><td>>0.0.1</td></tr></tbody></table>### date\_format

The date can be formatted in several ways, below are a few examples:

- mm/dd/yy
- yy-mm-dd
- d M, y
- d MM, y
- DD, d MM, yy

### animation

There are several different animations available:

- show (default)
- slideDown
- fadeIn
- blind
- bounce
- clip
- drop
- fold
- slide