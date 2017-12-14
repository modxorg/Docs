---
title: "mxFormBuilder.Field Types"
_old_id: "1676"
_old_uri: "revo/mxformbuilder/mxformbuilder.field-types"
---

### Field Types

 Field types provide two important functions; first they define the specific input type (user generated content) that we want to collect with full presentation code control. Then in addition each field type has what is called "field rule type" that maps to the display property. In conjunction the rule type also defines what additional constraints can be place on a given input, example a field rule type of number allows you to set a min and max number value that is validated on submission. For a complete list see [rules types](#ruletypes) below.

### Properties

 Below is a list of the field type properties that you can set.

 <table><tbody><tr><td> **Name** </td> <td> **Description** </td> <td> **Placeholder(s)** </td> </tr><tr><td> Name </td> <td> This is only used for easily identifing the type, so use a name that makes the most since to you or the end user creating the forms. </td> <td> </td> </tr><tr><td> Rule Type </td> <td> Rule types define how the form processor renders the UI code and also extends the basic validation set depending on the type selected. For example if you choose "_Number_" here then when adding a field to the form with this rule type you will be given the additional options of setting a min and max value for the number, which is validated during submission. Also when using "_text_" for the type when they select this type in the form field window they will also be given the option of setting a min and max length that the string may be for the given input. </td> <td> </td> </tr><tr><td> Options List </td> <td> Options list allows you to pre-define options for the field when the field type is one of the following; _selectlist, radiogroup, checkbox mulitple_. This saves the user time from having to recreate each option in the options grid when adding the field to the form. Use this much like you would tradiontional TV input field.   
  
**Exmaple option format (label==value):**   
 Good==good||Fair==fair||Bad==bad  
 ![](/download/attachments/73fcdf0007b17bddad5cc696dfe4eb85/Selection_030.png)

 </td> <td> </td> </tr><tr><td> Content </td> <td> The content is the inputs HTML that is rendered in the output. This will also contain the placeholders used for the field and provide you with complete control of the rendered HTML structure. </td> <td> </td> </tr><tr><td> Context </td> <td> Use the context to restrict the rule to use on specific context in the system. This would allow you to create for example a complete set of field types for mobile that are only visible when a manager is in the mobile context of the site. By default, empty, would mean that the field type is accessible to all context of the application. </td> <td> </td> </tr><tr><td> Active </td> <td> When checked the field will be visible in the form field "_rule type_" drop down list. </td> <td>   
</td></tr></tbody></table> <a name="placeholders"></a>

### Placeholders

 This is a list of available placeholder to use in the field rule type content area.

 <a name="ruletypes"></a>

### Rule Types

 The use of rule types allow the system to perform additional UI and validation logic on a given field. Below is a list of each rule including a description.

 <table><tbody><tr><td> Text </td> <td> </td> <td> This is normally used with the standard input type of text on forms. Additional form field properties for this rule type allow users to specify a min and max string length for the input. When the min and/or max are present the form processor will validate the lengths. </td> </tr><tr><td> Text Area </td> <td> </td> <td> Standard textarea field type rule; no additional properties or processing applied </td> </tr><tr><td> Number </td> <td> </td> <td> Used to define an input field that requires a numeric value (integer only). Additional form field properties for this rule type allow users to specify a min and max value for the number being entered. When a min and/or max value is specified the form processor will validate that the input is a numeric number and within the specified contraints. </td> </tr><tr><td> Checkbox </td> <td> </td> <td> Standard checkbox; no additional properties or processing applied </td> </tr><tr><td> Checkbox (mulitple) </td> <td> </td> <td> </td> </tr><tr><td> Select List/Drop Down </td> <td> </td> <td> </td> </tr><tr><td> Select Resource </td> <td> </td> <td> </td> </tr><tr><td> Radio Group (single item) </td> <td> </td> <td> </td> </tr><tr><td> State LIst (Two Digit) </td> <td> </td> <td> </td> </tr><tr><td> State List (Full name) </td> <td> </td> <td> </td> </tr><tr><td> Hidden </td> <td> </td> <td> </td> </tr><tr><td> Button </td> <td> </td> <td> </td> </tr><tr><td> Button - Submit </td> <td> </td> <td> </td> </tr><tr><td> Button - Reset </td> <td> </td> <td> </td> </tr><tr><td> Other </td> <td> </td> <td> Typically used to add description or instructional content to a given form. </td></tr></tbody></table>