---
title: "FormIt"
_old_id: "644"
_old_uri: "revo/formit"
---

<div>- [What is FormIt?](#FormIt-WhatisFormIt%3F)
- [History](#FormIt-History)
  - [Download](#FormIt-Download)
  - [Development and Bug Reporting](#FormIt-DevelopmentandBugReporting)
  - [Important changes](#FormIt-Importantchanges)
- [How to Use](#FormIt-HowtoUse)
  - [Available Properties](#FormIt-AvailableProperties)
- [Validation](#FormIt-Validation)
- [Hooks](#FormIt-Hooks)
- [Troubleshooting](/extras/revo/formit/formit.tutorials-and-examples#FormIt.TutorialsandExamples-Troubleshooting)
- [See Also](#FormIt-SeeAlso)
 
</div> What is FormIt? 
-----------------

 FormIt is a dynamic form processing [Snippet](developing-in-modx/basic-development/snippets "Snippets") for MODx Revolution. It handles a form after submission, performing validation and followup actions like sending an email. It does not generate the form, but it can repopulate it if it fails validation.

 History 
---------

 FormIt was written by Shaun McCormick as a form processing Extra, and first released on October 19th, 2009. It is currently maintained by the team at Sterc.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/formit>

### Development and Bug Reporting

 FormIt is stored and developed in GitHub, and can be found here: <https://github.com/Sterc/FormIt>

 Bugs can be filed here: <https://github.com/Sterc/FormIt/issues>[](http://bugs.modx.com/projects/FormIt/issues)

 API Documentation can also be found here: <http://api.modx.com/formit/>

###  Important changes 

<div class="info"> FormIt 3.0 introduces an update to the encryption methods used for encrypting form submissions. Prior to 3.0 mcrypt was used, which in 3.0 is replaced with openssl, due to mcrypt being deprecated as of PHP 7.2. FormIt 3.0 comes with a migration page which is accessible from the manager. </div><div class="info"> As of FormIt 2.2.9, all fields will automatically have `html_entities` applied. To allow HTML tags to be saved/stored, you will need to use the ` allowSpecialChars` validator on each field, that should save raw html tags. </div><div class="info"> As of FormIt 1.1.4, all fields will automatically have `stripTags` applied. To allow HTML tags to be saved/stored, you will need to use the `allowTags` validator on each field, stipulating which tags are permitted. </div> How to Use 
------------

 Simply place the FormIt snippet call into the Resource that contains the form you want to use. Unlike similar predecessors (most notably eForm in MODx Evolution), you do not put the form into a Chunk and reference the Chunk in the FormIt snippet call: you literally put the snippet call along side the form you want it to process. Specify the "hooks" (or post-validation processing scripts) in the snippet call. Then add validation via the _&validate_ and _&customValidators_ parameters in the snippet tag.

 If you have multiple forms on a page, set the _&submitVar_ property on your Snippet call to a name of a form element within the form (ie, &submitVar=`form1-submit`). This tells FormIt to only process form requests with that POST variable. Multiple forms should be used with INPUT type="submit" name="form1-submit", button elements have been reported not working.

###  Available Properties 

 These are the available general properties for the FormIt call (not including hook-specific properties):

 <table id="TBL1376497247011"><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> hooks </td> <td> What scripts to fire, if any, after the form passes validation. This can be a comma-separated list of [hooks](/extras/revo/formit/formit.hooks "FormIt.Hooks"), and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet. </td> <td> </td> </tr><tr><td> preHooks </td> <td> What scripts to fire, if any, once the form loads. This can be a comma-separated list of [hooks](/extras/revo/formit/formit.hooks "FormIt.Hooks"), and if the first fails, the proceeding ones will not fire. A hook can also be a Snippet name that will execute that Snippet. </td> <td> </td> </tr><tr><td> submitVar </td> <td> If set, will not begin form processing if this POST variable is not passed. _Notice: Needed if you use &store property (+ set submit var in input="submit"!)._ </td> <td> </td> </tr><tr><td> validate </td> <td> A comma-separated list of fields to validate, with each field name as name:validator (eg: username:required,email:required). [Validators](/extras/revo/formit/formit.validators "FormIt.Validators") can also be chained, like email:email:required. This property can be specified on multiple lines. </td> <td> </td> </tr><tr><td> validationErrorMessage </td> <td> A general error message to set to a placeholder \[\[!+fi.validation\_error\_message\]\] if validation fails. Can contain \[\[+errors\]\] if you want to display a list of all errors at the top. </td> <td> A form validation error occurred. Please check the values you have entered.

 </td> </tr><tr><td> validationErrorBulkTpl </td> <td> HTML tpl that is used for each individual error in the generic validation error message value. </td> <td>1. \[\[+error\]\]
 </td> </tr><tr><td> errTpl </td> <td> The wrapper html for error messages. Note: not a chunk, just straight HTML. </td> <td> <span class="error">\[\[+error\]\]</span> </td> </tr><tr><td> customValidators </td> <td> A comma-separated list of custom validator names (snippets) you plan to use in this form. They must be explicitly stated here, or they will not be run. </td> </tr><tr><td> clearFieldsOnSuccess </td> <td> If true, will clear the fields on a successful form submission that does not redirect. </td> <td> 1 </td> </tr><tr><td> store </td> <td> If true, will store the data in the cache for retrieval using the [FormItRetriever](/extras/revo/formit/formit.formitretriever "FormIt.FormItRetriever") snippet. </td> <td> 0 </td> </tr><tr><td> storeTime </td> <td> If 'store' is set to true, this specifies the number of seconds to store the data from the form submission. Defaults to five minutes. </td> <td> 300 </td> </tr><tr><td> storeLocation </td> <td> When using store, this defines where the form is stored after submit. Possible options are 'cache' and 'session'. Defaults to 'cache'. </td> <td> cache </td> </tr><tr><td> placeholderPrefix </td> <td> The prefix to use for all placeholders set by FormIt for fields. Make sure to include the '.' separator in your prefix.   
</td> <td> fi. </td> </tr><tr><td> successMessage </td> <td> If not using the redirect hook, display this success message after a successful submission. </td> <td> </td> </tr><tr><td> successMessagePlaceholder </td> <td> The name of the placeholder to set the success message to. </td> <td> fi.successMessage </td> </tr><tr><td> redirectTo </td> <td> page ID of a "Thank You" page, where the visitor can be sent after successfully submitting the form, but this parameter is read ONLY if you include "redirect" in the list of &hooks. </td> <td> </td> </tr><tr><td> allowFiles </td> <td> Specify if files are allowed to be posted. Submitted files are stored in a temporary directory to prevent files getting lost in multistep forms. </td> <td> true </td></tr></tbody></table> Validation 
------------

 Validation in FormIt is done via the &validate property, and can be used to automatically handle validation on any of the fields in your form.

 For more information on validation in FormIt, see the [Validators](/extras/revo/formit/formit.validators "FormIt.Validators") page.

 Hooks 
-------

 Hooks are basically scripts that run during FormIt processing. Hooks can be chained; the first hook will execute, and if succeeds, will proceed onto the next hook.

 For more information on hooks, see the [Hooks](/extras/revo/formit/formit.hooks "FormIt.Hooks") page.

 See Also 
----------

1. [FormIt.Hooks](/extras/revo/formit/formit.hooks)
  1. [FormIt.Hooks.email](/extras/revo/formit/formit.hooks/formit.hooks.email)
  2. [FormIt.Hooks.FormItAutoResponder](/extras/revo/formit/formit.hooks/formit.hooks.formitautoresponder)
  3. [FormIt.Hooks.math](/extras/revo/formit/formit.hooks/formit.hooks.math)
  4. [FormIt.Hooks.recaptcha](/extras/revo/formit/formit.hooks/formit.hooks.recaptcha)
  5. [FormIt.Hooks.redirect](/extras/revo/formit/formit.hooks/formit.hooks.redirect)
  6. [FormIt.Hooks.spam](/extras/revo/formit/formit.hooks/formit.hooks.spam)
  7. [FormIt.Hooks.FormItSaveForm](https://rtfm.modx.com/extras/revo/formit/formit.hooks/formit.hooks.formitsaveform)
2. [FormIt.Validators](/extras/revo/formit/formit.validators)
3. [FormIt.FormItRetriever](/extras/revo/formit/formit.formitretriever)
4. [FormIt.Tutorials and Examples](/extras/revo/formit/formit.tutorials-and-examples)
  1. [FormIt.Examples.Custom Hook](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.custom-hook)
  2. [FormIt.Examples.Simple Contact Page](/extras/revo/formit/formit.tutorials-and-examples/formit.examples.simple-contact-page)
  3. [FormIt.Handling Selects, Checkboxes and Radios](/extras/revo/formit/formit.tutorials-and-examples/formit.handling-selects,-checkboxes-and-radios)
  4. [FormIt.Using a Blank NoSpam Field](/extras/revo/formit/formit.tutorials-and-examples/formit.using-a-blank-nospam-field)
5. [FormIt.Roadmap](/extras/revo/formit/formit.roadmap)
6. [FormIt.FormItCountryOptions](/extras/revo/formit/formit.formitcountryoptions)
7. [FormIt.FormItStateOptions](/extras/revo/formit/formit.formitstateoptions)