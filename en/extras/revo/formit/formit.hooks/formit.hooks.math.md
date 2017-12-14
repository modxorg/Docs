---
title: "FormIt.Hooks.math"
_old_id: "859"
_old_uri: "revo/formit/formit.hooks/formit.hooks.math"
---

<div>- [FormIt math Hook](#FormIt.Hooks.math-FormItmathHook)
- [Available Properties](#FormIt.Hooks.math-AvailableProperties)
- [Usage](#FormIt.Hooks.math-Usage)
  - [Customizing the Operator Text](#FormIt.Hooks.math-CustomizingtheOperatorText)
- [See Also](#FormIt.Hooks.math-SeeAlso)

</div>FormIt math Hook
----------------

 The _math_ hook will allow you to have a math-based question on your form to prevent spam. It will render a math question that must be answered correctly, as follows:

> 12 + 23?

Available Properties
--------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> </tr><tr><td> mathMinRange </td> <td> The minimum range for each number in the equation. </td> <td> 10 </td> </tr><tr><td> mathMaxRange </td> <td> The maximum range for each number in the equation. </td> <td> 100 </td> </tr><tr><td> mathField </td> <td> The name of the input field for the answer. </td> <td> math </td> </tr><tr><td> mathOp1Field </td> <td> The name of the field/placeholder for the 1st number in the equation. </td> <td> op1 </td> </tr><tr><td> mathOp2Field </td> <td> The name of the field/placeholder for the 2nd number in the equation.</td> <td> op2 </td> </tr><tr><td> mathOperatorField </td> <td> The name of the field/placeholder for the operator in the equation.</td> <td> operator </td></tr></tbody></table>Usage
-----

 Include it as a hook in your FormIt call:

 ```
<pre class="brush: php">[[!FormIt? &hooks=`math`]]

``` To make the math question required, use the call as follows:

 ```
<pre class="brush: plain">[[!FormIt? &hooks=`math` &validate=`math:required`]]

``` Paste this sample HTML in the part of the form you want to include the math question:

 ```
<pre class="brush: php"><label>[[!+fi.op1]] [[!+fi.operator]] [[!+fi.op2]]?</label>
[[!+fi.error.math]]
<input type="text" name="math" value="[[!+fi.math]]" />
<input type="hidden" name="op1" value="[[!+fi.op1]]" />
<input type="hidden" name="op2" value="[[!+fi.op2]]" />
<input type="hidden" name="operator" value="[[!+fi.operator]]" />

``` The math question in the place of the input named "math".

NOTE: The form fields 'op1', 'op2' and 'operator' are not used anymore from FormIt version 2.2.11 and up.

### Customizing the Operator Text

 If you don't want just "-" or "+" as the operator, and want to hide it even more from spam bots, you can use output filters to further add ambiguity to the math equation. Change the line with the equation text in it to:

 ```
<pre class="brush: php"><label>[[!+fi.op1]] [[!+fi.operator:is=`-`:then=`minus`:else=`plus`]] [[!+fi.op2]]?</label>

``` This will render the equation like "23 plus 41?" or "50 minus 12?" instead of a -/+ symbol, making it harder for spam bots.

See Also
--------

1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](http://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
4. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
5. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
6. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
7. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)