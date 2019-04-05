---
title: "sekFormTools.input.autocomplete"
_old_id: "977"
_old_uri: "revo/sekformtools/sekformtools.input.autocomplete"
---

## What is input.autocomplete?

Add an auto-complete field to a form quickly and easily using this snippet.

## Usage

Example for input.autocomplete using an object:

``` php 
[[input.autocomplete? &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`]]
```

## Properties

| Name | Description | Default | Required | Version |
|------|-------------|---------|----------|---------|
| input\_id | The id to assign to the input box. |  |  | >0.0.1 |
| name | The name to assign to the input box. |  |  | >0.0.1 |
| value | The value to assign to the input box. |  |  | >0.0.1 |
| object | JSON array of options to return a combobox list. |  | Yes | >0.0.1 |
| filter | JSON array to filter the combo list. |  |  | >0.0.1 |
| helper\_snippet | Name of the snippet to call by ajax request to change option list. |  |  | >0.0.1 |
| min\_length | Minimum number of characters typed before executing filter. | 2 |  | >0.0.1 |
| max\_rows | Maximum number of rows to return and display in the list | 15 |  | >0.0.1 |

### object

The object property has several parts to quickly define combo box options from a modx table.

| Name | Description | Default | Required | Version |
|------|-------------|---------|----------|---------|
| name | The name of the modx table called by the object name. |  | Yes | >0.0.1 |
| sortby | The table field to sort by. |  |  | >0.0.1 |
| value | The table field that will be used as the value for the option. |  | Yes | >0.0.1 |
| label | The table field that will be used as the label for the option. |  | Yes | >0.0.1 |

### filter

The filter property has several parts to filter the data returned by the object property.

| Name | Description | Default | Required | Version |
|------|-------------|---------|----------|---------|
| input\_id | The id of an input field that will dynamically change the options list. |  |  | >0.0.1 |
| name | The object name to base filter on. |  |  | >0.0.1 |
| field | The field that will be used to filter the results. |  | Yes | >0.0.1 |
| value | The value to filter on. |  |  | >0.0.1 |

## Examples

Some additional examples

### Object

Grabbing data by a table object is simple and straight forward. Using a json string, enter the name of the object, the optional sort by, and the table fields to use in the auto-complete label and value.

``` php 
[[!input.autocomplete?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    ]]
```

The auto-complete can also be filtered live using jquery. please view the [Advanced Examples](/extras/revo/sekformtools/sekformtools-advanced-examples "sekFormTools Advanced Examples") for more information.