---
title: "sekFormTools.input.autocomplete"
_old_id: "977"
_old_uri: "revo/sekformtools/sekformtools.input.autocomplete"
---

What is input.autocomplete?
---------------------------

Add an auto-complete field to a form quickly and easily using this snippet.

Usage
-----

Example for input.autocomplete using an object:

```
<pre class="brush: php">
[[input.autocomplete? &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`]]

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
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>object</td><td>JSON array of options to return a combobox list.   
</td><td> </td><td>Yes</td><td>>0.0.1</td></tr><tr><td>filter</td><td>JSON array to filter the combo list.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>helper\_snippet</td><td>Name of the snippet to call by ajax request to change option list.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>min\_length</td><td>Minimum number of characters typed before executing filter.   
</td><td>2   
</td><td> </td><td>>0.0.1</td></tr><tr><td>max\_rows</td><td>Maximum number of rows to return and display in the list   
</td><td>15   
</td><td> </td><td>>0.0.1</td></tr></tbody></table>### object

The object property has several parts to quickly define combo box options from a modx table.

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>name</td><td>The name of the modx table called by the object name.   
</td><td>  
</td><td>Yes</td><td>>0.0.1</td></tr><tr><td>sortby</td><td>The table field to sort by.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>value</td><td>The table field that will be used as the value for the option.   
</td><td> </td><td>Yes</td><td>>0.0.1</td></tr><tr><td>label</td><td>The table field that will be used as the label for the option.   
</td><td> </td><td>Yes</td><td>>0.0.1</td></tr></tbody></table>### filter

The filter property has several parts to filter the data returned by the object property.

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>input\_id</td><td>The id of an input field that will dynamically change the options list.   
</td><td>  
</td><td> </td><td>>0.0.1</td></tr><tr><td>name</td><td>The object name to base filter on.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>field</td><td>The field that will be used to filter the results.   
</td><td> </td><td>Yes</td><td>>0.0.1</td></tr><tr><td>value</td><td>The value to filter on.   
</td><td> </td><td>  
</td><td>>0.0.1</td></tr></tbody></table>Examples
--------

Some additional examples

### Object

Grabbing data by a table object is simple and straight forward. Using a json string, enter the name of the object, the optional sort by, and the table fields to use in the auto-complete label and value.

```
<pre class="brush: php">
[[!input.autocomplete?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    ]]

```The auto-complete can also be filtered live using jquery. please view the [Advanced Examples](/extras/revo/sekformtools/sekformtools-advanced-examples "sekFormTools Advanced Examples") for more information.