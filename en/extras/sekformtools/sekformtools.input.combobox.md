---
title: "sekFormTools.input.combobox"
_old_id: "978"
_old_uri: "revo/sekformtools/sekformtools.input.combobox"
---

## What is input.combobox?

Add a combobox to a form quickly and easily using this snippet.

## Usage

Example for input.combobox using a value list:

``` php
[[input.combobox? &value_list=`[{ "value": "r", "label": "Red" }, { "value": "b", "label": "Blue" }]`]]
```

Example for input.combobox using an object:

``` php
[[input.combobox? &object=`[{"name": "sekftStates", "sortby": "state_name", "value": "state_abbr", "label": "state_name"}]`]]
```

## Properties

| Name            | Description                                                                                       | Default | Required | Version |
| --------------- | ------------------------------------------------------------------------------------------------- | ------- | -------- | ------- |
| input\_id       | The id to assign to the input box. While not required, it is best to give all fields an input id. |         |          | >0.0.1  |
| name            | The name to assign to the input box.                                                              |         |          | >0.0.1  |
| value           | The value to assign to the input box.                                                             |         |          | >0.0.1  |
| object          | JSON array of options to return a combobox list.                                                  |         |          | >0.0.1  |
| snippet         | A snippet call to return a custom JSON list.                                                      |         |          | >0.0.1  |
| value\_list     | Create a custom list for the combobox.                                                            |         |          | >0.0.1  |
| filter          | JSON array to filter the combo list.                                                              |         |          | >0.0.1  |
| helper\_snippet | Name of the snippet to call by ajax request to change option list.                                |         |          | >0.0.1  |

### object

The object property has several parts to quickly define combo box options from a modx table.

| Name    | Description                                                                                        | Default | Required | Version |
| ------- | -------------------------------------------------------------------------------------------------- | ------- | -------- | ------- |
| name    | The name of the modx table called by the object name.                                              |         | Yes      | >0.0.1  |
| sortby  | The table field to sort by.                                                                        |         |          | >0.0.1  |
| groupby | Simply group values together ?(most likely to be used if the value and label fields are the same). |         |          | >0.0.4  |
| value   | The table field that will be used as the value for the option.                                     |         | Yes      | >0.0.1  |
| label   | The table field that will be used as the label for the option.                                     |         | Yes      | >0.0.1  |

### filter

The filter property has several parts to filter the data returned by the object property.

| Name      | Description                                                             | Default | Required | Version |
| --------- | ----------------------------------------------------------------------- | ------- | -------- | ------- |
| input\_id | The id of an input field that will dynamically change the options list. |         |          | >0.0.1  |
| name      | The object name to base filter on.                                      |         |          | >0.0.1  |
| field     | The field that will be used to filter the results.                      |         | Yes      | >0.0.1  |
| value     | The value to filter on.                                                 |         |          | >0.0.1  |

## Examples

Some additional examples

### Value List

The simplest way to create a quick combo box.

``` php
[[!input.combobox? &value_list=`[
{ "value": "101", "label": "Regular" },
{ "value": "102", "label": "Chocolate" },
{ "value": "103", "label": "Blueberry" },
{ "value": "104", "label": "Devil's Food"}
]`]]
```

### Object

Grabbing data by a table object is simple and straight forward. Using a json string, enter the name of the object, the optional sort by, and the table fields to use in the combo box options label and value.

``` php
[[!input.combobox?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    ]]
```

You can even filter the data by using the filter option. Here we just want to grab all the cities with the state id of 62, which in this case is Kansas.

``` php
[[!input.combobox?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
      &filter=`{"field": "state_id", "value": "62"}`
    ]]
```

We can also filter the combo box using xpdo's powerful relational filters. Here we use the filter->name field to grab the states table. The field we filter on is the abbreviation, and the value we want to filter "KS". XPDO will then do the work by finding the relationship between the two tables ( the "id" of the states table and the "state\_id" field of the city table ) and return the filtered list by state.

``` php
[[!input.combobox?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
      &filter=`{"name": "sekftStates", "field": "state_abbr", "value": "KS"}`
    ]]
```

The combo box can also be filter live using jquery. please view the [Advanced Examples](extras/sekformtools/sekformtools-advanced-examples "sekFormTools Advanced Examples") for more information.

### Snippet

If more advanced filters are needed, a custom snippet can be called to fill the combo box.

``` php
[[!input.combobox? &snippet=`xpdo`]]
```

The snippet must must return a json array.

``` php
$items = $modx->getCollection('sekftStates');
$itemListArray = array();
foreach ($items as $item) {
  $itemArray = $item->toArray();
  $itemList = array();
  $itemList['value'] = $itemArray['id'];
  $itemList['label'] = $itemArray['state_name'];
  $itemListArray[] = $itemList;
}
return $modx->toJSON($itemListArray);
```

Similarly, a large list of values can be placed in an array within a snippet.

``` php
[[!input.combobox? &snippet=`array`]]
```

The snippet must must return a json array.

``` php
$itemListArray = array(
  array(
    'value' => '1',
    'label' => 'One'
  ),
  array(
    'value' => '2',
    'label' => 'Two'
  ),
  array(
    'value' => '3',
    'label' => 'Three'
  ),
  array(
    'value' => '4',
    'label' => 'Four'
  )
);
return $modx->toJSON($itemListArray);
```