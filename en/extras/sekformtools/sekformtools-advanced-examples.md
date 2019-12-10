---
title: "sekFormTools Advanced Examples"
_old_id: "705"
_old_uri: "revo/sekformtools/sekformtools-advanced-examples"
---

## Combination Combo Box and Auto-Complete Examples

The best example of the power of this tool is how quickly you can create combo box filtered from another combo box, or filtering an auto-complete filed from another input. In the below example the country combo box will filter the state combo box. When a state is selected, the auto-complete will use the value from the state field as an additional filter.

``` php
<label for="ftcountry">Country</label>
[[!input.combobox? &input_id=`ftcountry` &value=`United States`
    &object=`{"name": "sekftCountries", "sortby": "country_name", "value": "country_name", "label": "country_name"}`
]]

<label for="ftstate">State</label>
[[!input.combobox? &input_id=`ftstate`
    &object=`{"name": "sekftStates", "sortby": "state_name", "value": "state_name", "label": "state_name"}`
    &filter=`{"input_id": "ftcountry", "name": "sekftCountries", "field": "country_name", "value": "United States"}`
]]

<label for="ftcity">City</label>
[[!input.autocomplete? &input_id=`ftcity`
    &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    &filter=`{"input_id": "ftstate", "name": "sekftStates", "field": "state_name"}`
]]
```

### First Step

While not required, it is best to define all fields with an input id. Here we define the input\_id as "ftcountry". This is important because we will need to use this later. The most important field is the "object" field defined as a json string that pulls the data from the table and formats for display. Notice here that the we are using the same field for the value and the label of the combo box option. Because the object->value is set to the "country\_name" we will define the &value property as "United States". If the object->value were set to "id", we would use "244" as the &value property.

``` php
<label for="ftcountry">Country</label>
[[!input.combobox? &input_id=`ftcountry` &value=`United States`
    &object=`{"name": "sekftCountries", "sortby": "country_name", "value": "country_name", "label": "country_name"}`
]]
```

### Second Step

Again, we should define the input\_id of every field, for the state we will use "ftstate". We will also define the object property the same way as before. The difference between the state and country field is the filter property. Filter has a dual role and currently can only be used between 2 combo boxes or alone. It is defined using a json array and when filtering from another combo box, it must be defined in the child.

``` php
<label for="ftstate">State</label>
[[!input.combobox? &input_id=`ftstate`
    &object=`{"name": "sekftStates", "sortby": "state_name", "value": "state_name", "label": "state_name"}`
    &filter=`{"input_id": "ftcountry", "name": "sekftCountries", "field": "country_name", "value": "United States"}`
]]
```

In this example we are filtering based on another combo box ("ftcountry"), but if we just wanted to filter on page load, we would simple not define filter->input\_id. sekFormTools takes advantage of xpdo's relational data, so using a table to filter another table is very easy. Here we use filter->name to grab the "sekftCountries" table object. The filter->field tells sekFormTools what field to filter on, and because we set a default value on the "ftcountry" combo box, we will pass "United States" to the optional filter->value.

When the country combo box is changed to "Canada", the value "Canada" is passed to the helper resource along with the object and filter information. The helper will then grab "sekftCountries" object, find the relationship with "sekftStates", and return a filtered list. This is handy in case you don't want to use the full name value, but perhaps the "isoa\_two" format. That would be displayed as:

``` php
<label for="ftcountry">Country</label>
[[!input.combobox? &input_id=`ftcountry` &value=`US`
    &object=`{"name": "sekftCountries", "sortby": "country_name", "value": "isoa_two", "label": "country_name"}`
]]

<label for="ftstate">State</label>
[[!input.combobox? &input_id=`ftstate`
    &object=`{"name": "sekftStates", "sortby": "state_name", "value": "state_name", "label": "state_name"}`
    &filter=`{"input_id": "ftcountry", "name": "sekftCountries", "field": "isoa_two", "value": "US"}`
]]
```

This gives some freedom to use the value field for whatever you wish.

### Third Step

Many of the properties for the auto-complete field are the same as the combo box field and they work similarly. Object is the only property that is required. For this example, we will further filter the auto-complete field based on what is selected in the "ftstate" combo box. Again, we rely on xpdo for its relational information to filter down the table information at the same time the auto-complete searches for the "city\_name"

``` php
<label for="ftcity">City</label>
[[!input.autocomplete? &input_id=`ftcity`
    &object=`{"name": "sekftUSCities", "sortby": "city_name", "value": "city_name", "label": "city_name"}`
    &filter=`{"input_id": "ftstate", "name": "sekftStates", "field": "state_name"}`
]]
```
