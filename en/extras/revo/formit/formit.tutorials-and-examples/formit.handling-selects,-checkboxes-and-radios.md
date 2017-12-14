---
title: "FormIt.Handling Selects, Checkboxes and Radios"
_old_id: "855"
_old_uri: "revo/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios"
---

<div>- [Handling Selects, Checkboxes and Radios](#FormIt.HandlingSelects%2CCheckboxesandRadios-HandlingSelects%2CCheckboxesandRadios)
  - [Handling Select Fields](#FormIt.HandlingSelects%2CCheckboxesandRadios-HandlingSelectFields)
  - [Handling Checkboxes and Radios](#FormIt.HandlingSelects%2CCheckboxesandRadios-HandlingCheckboxesandRadios)
      - [Handling Required on Checkboxes](#FormIt.HandlingSelects%2CCheckboxesandRadios-HandlingRequiredonCheckboxes)
      - [Handling Checkboxes and Multiple Selects in a Custom Hook](#FormIt.HandlingSelects,CheckboxesandRadios-HandlingCheckboxesSelectsCustomHook)
- [See Also](#FormIt.HandlingSelects%2CCheckboxesandRadios-SeeAlso)

</div>Handling Selects, Checkboxes and Radios
---------------------------------------

 While FormIt can handle any type of field, special directions are required for selects, radios and checkboxes due to their value nature.

### Handling Select Fields

 FormIt provides a utility snippet, called FormItIsSelected, which can be used as an [Output Filter](/revolution/2.x/making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") to handle the selected="selected" part of the option. Example:

 ```
<pre class="brush: php"><select name="color">
   <option value="blue" [[!+fi.color:FormItIsSelected=`blue`]] >Blue</option>
   <option value="red" [[!+fi.color:FormItIsSelected=`red`]] >Red</option>
   <option value="green" [[!+fi.color:FormItIsSelected=`green`]] >Green</option>
   <!-- This would also work -->
   <option value="yellow" [[!+fi.color:is=`yellow`:then=`selected`]]>Yellow</option>
</select>

``` This will automatically handle the "selected" part of the option field, persisting it through validation and error handling.

### Handling Checkboxes and Radios

 Handling checkboxes and radios is very similar to handling selects, with the only difference being how you handle "required" validation on them. FormIt provides a FormItIsChecked assistance OutputFilter, similar to FormItIsSelected, for handling value persistence.

 This example will handle checkboxes, persisting their values:

 ```
<pre class="brush: php"><label>Color: [[!+fi.error.color]]</label>
<input type="checkbox" name="color[]" value="blue" [[!+fi.color:FormItIsChecked=`blue`]] > Blue 
<input type="checkbox" name="color[]" value="red" [[!+fi.color:FormItIsChecked=`red`]] > Red 
<input type="checkbox" name="color[]" value="green" [[!+fi.color:FormItIsChecked=`green`]] > Green

``` Note that the \[\] is stripped when setting the "fi.error.color" placeholder.

#### Handling Required on Checkboxes

 Since HTML does not send a value if a checkbox is not checked, handling the "required" validation on a checkbox can be tricky. You'll need to add a "hidden" field before so that at least an empty value is sent:

 ```
<pre class="brush: php">[[!FormIt? &validate=`color:required`]]
...
<label>Color: [[!+fi.error.color]]</label>
<input type="hidden" name="color[]" value="" />
<input type="checkbox" name="color[]" value="blue" [[!+fi.color:FormItIsChecked=`blue`]] > Blue 
<input type="checkbox" name="color[]" value="red" [[!+fi.color:FormItIsChecked=`red`]] > Red 
<input type="checkbox" name="color[]" value="green" [[!+fi.color:FormItIsChecked=`green`]] > Green

``` This will successfully check to make sure at least one checkbox was selected when submitting the form.

#### Handling Checkboxes and Multiple Selects in a Custom Hook

 If you want to set an array field (i.e. a checkbox group with the same name, a select multiple field) in a preHook, you have to json\_encode the array value.

 ```
<pre class="brush: php">$hook->setValue('hobbies',json_encode(array('music','films','books')));

```See Also
--------

1. [FormIt.Examples.Custom Hook](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.custom-hook)
2. [FormIt.Examples.Simple Contact Page](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)
3. [FormIt.Handling Selects, Checkboxes and Radios](/extras/revo/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios)
4. [FormIt.Using a Blank NoSpam Field](/extras/revo/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field)