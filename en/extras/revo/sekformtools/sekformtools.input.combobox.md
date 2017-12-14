---
title: "sekFormTools.input.combobox"
_old_id: "978"
_old_uri: "revo/sekformtools/sekformtools.input.combobox"
---

What is input.combobox?
-----------------------

Add a combobox to a form quickly and easily using this snippet.

Usage
-----

Example for input.combobox using a value list:

```
<pre class="brush: php">
[[input.combobox? &value_list=`[{ "value": "r", "label": "Red" }, { "value": "b", "label": "Blue" }]`]]

```Example for input.combobox using an object:

```
<pre class="brush: php">
[[input.combobox? &object=`[{"name": "sekftStates", "sortby": "state_name", "value": "state_abbr", "label": "state_name"}]`]]

```Properties
----------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>input\_id</td><td>The id to assign to the input box. While not required, it is best to give all fields an input id.   
</td><td>  
</td><td>  
</td><td>>0.0.1</td></tr><tr><td>name</td><td>The name to assign to the input box.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>value</td><td>The value to assign to the input box.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>object</td><td>JSON array of options to return a combobox list.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>snippet</td><td>A snippet call to return a custom JSON list.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>value\_list</td><td>Create a custom list for the combobox.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>filter</td><td>JSON array to filter the combo list.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>helper\_snippet</td><td>Name of the snippet to call by ajax request to change option list.   
</td><td> </td><td> </td><td>>0.0.1</td></tr></tbody></table>### object

The object property has several parts to quickly define combo box options from a modx table.

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th><th>Required   
</th><th>Version   
</th></tr><tr><td>name</td><td>The name of the modx table called by the object name.   
</td><td>  
</td><td>Yes</td><td>>0.0.1</td></tr><tr><td>sortby</td><td>The table field to sort by.   
</td><td> </td><td> </td><td>>0.0.1</td></tr><tr><td>groupby   
</td><td>Simply group values together ?(most likely to be used if the value and label fields are the same).   
</td><td> </td><td> </td><td>>0.0.4   
</td></tr><tr><td>value</td><td>The table field that will be used as the value for the option.   
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

### Value List

The simplest way to create a quick combo box.

```
<pre class="brush: php">
[[!input.combobox? &value_list=`[
{ "value": "101", "label": "Regular" },
{ "value": "102", "label": "Chocolate" },
{ "value": "103", "label": "Blueberry" },
{ "value": "104", "label": "Devil's Food"}
]`]]

```### Object

Grabbing data by a table object is simple and straight forward. Using a json string, enter the name of the object, the optional sort by, and the table fields to use in the combo box options label and value.

```
<pre class="brush: php">
[[!input.combobox?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    ]]

```You can even filter the data by using the filter option. Here we just want to grab all the cities with the state id of 62, which in this case is Kansas.

```
<pre class="brush: php">
[[!input.combobox?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
      &filter=`{"field": "state_id", "value": "62"}`
    ]]

```We can also filter the combo box using xpdo's powerful relational filters. Here we use the filter->name field to grab the states table. The field we filter on is the abbreviation, and the value we want to filter "KS". XPDO will then do the work by finding the relationship between the two tables ( the "id" of the states table and the "state\_id" field of the city table ) and return the filtered list by state.

```
<pre class="brush: php">
[[!input.combobox?
      &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
      &filter=`{"name": "sekftStates", "field": "state_abbr", "value": "KS"}`
    ]]

```The combo box can also be filter live using jquery. please view the [Advanced Examples](/extras/revo/sekformtools/sekformtools-advanced-examples "sekFormTools Advanced Examples") for more information.

### Snippet

If more advanced filters are needed, a custom snippet can be called to fill the combo box.

```
<pre class="brush: php">
[[!input.combobox? &snippet=`xpdo`]]

```The snippet must must return a json array.

```
<pre class="brush: php">
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

```Similarly, a large list of values can be placed in an array within a snippet.

```
<pre class="brush: php">
[[!input.combobox? &snippet=`array`]]

```The snippet must must return a json array.

```
<pre class="brush: php">
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