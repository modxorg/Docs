---
title: "FormIt.FormItCountryOptions"
_old_id: "852"
_old_uri: "revo/formit/formit.formitcountryoptions"
---

<div>- [What is FormItCountryOptions?](extras/revo/formit/formit.formitcountryoptions#FormIt.FormItCountryOptions-WhatisFormItCountryOptions%3F)
- [Usage](extras/revo/formit/formit.formitcountryoptions#FormIt.FormItCountryOptions-Usage)
  - [FormItCountryOptions Properties](extras/revo/formit/formit.formitcountryoptions#FormIt.FormItCountryOptions-FormItCountryOptionsProperties)
  - [Prioritizing Countries](extras/revo/formit/formit.formitcountryoptions#FormIt.FormItCountryOptions-PrioritizingCountries)
- [See Also](extras/revo/formit/formit.formitcountryoptions#FormIt.FormItCountryOptions-SeeAlso)
 
</div>What is FormItCountryOptions?
-----------------------------

 FormItCountryOptions is an assistance snippet for [FormIt](extras/revo/formit "FormIt") 1.7.0+ that will output an option list of countries in the world. It is useful for forms that need a dropdown list of countries.

Usage
-----

 Simply add the Snippet to your form, inside a `<select>` element:

 ```
<pre class="brush: php">
<select name="country">
[[!FormItCountryOptions? &selected=`[[!+fi.country]]`]]
</select>

``` Note how we are passing the value of the "fi.country" placeholder (which stores the value of the country field) into the selected parameter. This tells FormItCountryOptions to select the last-selected option in the form.

### FormItCountryOptions Properties

 FormItCountryOptions comes with some default properties you can override. They are:

 <table id="TBL1376497247013"><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> selected </td> <td> The country value to select. </td> <td> </td> </tr><tr><td> selectedAttribute </td> <td> Optional. The HTML attribute to add to a selected country. </td> <td> selected="selected" </td> </tr><tr><td> tpl </td> <td> Optional. The chunk to use for each country dropdown option. </td> <td> </td> </tr><tr><td> useIsoCode </td> <td> If 1, will use the ISO country code for the value. If 0, will use the country name. </td> <td> 1 </td> </tr><tr><td> prioritized </td> <td> Optional. A comma-separated list of ISO codes for countries that will move them into a prioritized "Frequent Visitors" group at the top of the dropdown. This can be used for your commonly-selected countries. </td> <td> </td> </tr><tr><td> prioritizedGroupText </td> <td> Optional. If set and &prioritized is in use, will be the text label for the prioritized option group. </td> </tr><tr><td> allGroupText </td> <td> Optional. If set and &prioritized is in use, will be the text label for the all other countries option group. </td> </tr><tr><td> optGroupTpl </td> <td> Optional. If set and &prioritized is in use, will be the chunk tpl to use for the option group markup. </td> <td> optgroup </td> </tr><tr><td> toPlaceholder </td> <td> Optional. Use this to set the output to a placeholder instead of outputting directly. </td> <td> </td></tr></tbody></table>### Prioritizing Countries 

 Sometimes you want to have certain countries appear at the top of the list, in an option group. FormItCountryOptions supports this, with the `&prioritized` option. For example:

 ```
<pre class="brush: php">
[[!FormItCountryOptions?
  &selected=`[[+fi.country]]`
  &prioritized=`US,GB,DE,RU,JP,FR,NL,CA,AU,UA`
]]

``` Will output a list that looks like this:

 ![](download/attachments/35586160/20110707-ckb8i6wtgk9gwrtds59nra4smh.jpeg?version=1&modificationDate=1310046984000)

 You simply pass the ISO codes of the countries you wish to prioritize in the &prioritized parameter. You can also adjust the text of the option groups with the `&prioritizedGroupText` and `&allGroupText` properties.

See Also
--------

1. [FormIt.Hooks](extras/revo/formit/formit.hooks)
  1. [FormIt.Hooks.email](extras/revo/formit/formit.hooks/formit.hooks.email)
  2. [FormIt.Hooks.FormItAutoResponder](extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
  3. [FormIt.Hooks.math](extras/revo/formit/formit.hooks/formit.hooks.math)
  4. [FormIt.Hooks.recaptcha](extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
  5. [FormIt.Hooks.redirect](extras/revo/formit/formit.hooks/formit.hooks.redirect)
  6. [FormIt.Hooks.spam](extras/revo/formit/formit.hooks/formit.hooks.spam)
2. [FormIt.Validators](extras/revo/formit/formit.validators)
3. [FormIt.FormItRetriever](extras/revo/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](extras/revo/formit/formit.tutorials-and-examples)
  1. [FormIt.Examples.Custom Hook](extras/revo/formit/formit.tutorials-and-examples/formit.examples.custom-hook)
  2. [FormIt.Examples.Simple Contact Page](extras/revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)
  3. [FormIt.Handling Selects, Checkboxes and Radios](extras/revo/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios)
  4. [FormIt.Using a Blank NoSpam Field](extras/revo/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field)
5. [FormIt.Roadmap](extras/revo/formit/formit.roadmap)
6. [FormIt.FormItCountryOptions](extras/revo/formit/formit.formitcountryoptions)
7. [FormIt.FormItStateOptions](extras/revo/formit/formit.formitstateoptions)