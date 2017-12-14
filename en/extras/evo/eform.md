---
title: "eForm"
_old_id: "633"
_old_uri: "evo/eform"
---

<table><tbody><tr><td>Name = eForm</td></tr><tr><td>Version = 1.4.3</td></tr><tr><td>Author = TobyL</td></tr><tr><td>Since = >= 0.9.5</td></tr><tr><td>Updated = 1/7/2007</td></tr></tbody></table><div>- [What is eForm?](#eForm-WhatiseForm%3F)
  - [Downloads](#eForm-Downloads)
- [Installation](#eForm-Installation)
- [Usage](#eForm-Usage)
  - [Required Parameters](#eForm-RequiredParameters)
  - [Optional Parameters](#eForm-OptionalParameters)
- [Events](#eForm-Events)
  - - [eFormOnBeforeFormParse](#eForm-eFormOnBeforeFormParse)
      - [eFormOnValidate](#eForm-eFormOnValidate)
      - [eFormOnBeforeMailSent](#eForm-eFormOnBeforeMailSent)
      - [eFormOnMailSent](#eForm-eFormOnMailSent)
      - [eFormOnBeforeFormMerge](#eForm-eFormOnBeforeFormMerge)
- [Examples](#eForm-Examples)
  - [eForm Forms](#eForm-eFormForms)
      - [A Simple ContactForm chunk](#eForm-ASimpleContactFormchunk)
  - [eForm Report](#eForm-eFormReport)
      - [A simple ContactFormReport](#eForm-AsimpleContactFormReport)
  - [eForm Document Snippet Calls](#eForm-eFormDocumentSnippetCalls)
  - [Using eForm with Flash forms](#eForm-UsingeFormwithFlashforms)
- [Datatypes and Formatting](#eForm-DatatypesandFormatting)
  - [Data types](#eForm-Datatypes)
- [Extended Server Validation](#eForm-ExtendedServerValidation)
  - [Validation rules](#eForm-Validationrules)
  - [Hidden fields, select boxes, radio options and checkbox fields](#eForm-Hiddenfields%2Cselectboxes%2Cradiooptionsandcheckboxfields)
      - [Hidden fields](#eForm-Hiddenfields)
      - [Form field examples with validation](#eForm-Formfieldexampleswithvalidation)
- [Notes](#eForm-Notes)
- [Resources](#eForm-Resources)

</div>What is eForm?
--------------

eForm is a highly flexible form parser snippet that will let you convert web forms into an email which can then be sent via email to users you can specify in the \[[YAMS Snippet](/extras/evo/yams/yams-english-documentation/yams-snippet "YAMS Snippet")\] or the form. Some notable features include:

- Form validation using powerful validation rules
- Protection of hidden fields against tampering
- <span class="error">\[Captcha\]</span> support
- Supports html email with attachments
- Flexible report & page generation using placeholders
- Notification to mobile devices
- auto-respond email
- Support for CC and BCC fields

Please note that eForm comes with extended documentation included in the package!

### Downloads

Download the [latest version](http://modxcms.com/eForm-1003.html) of [eForm](/extras/evo/eform "eForm") from MODx repository.

Installation
------------

- Unzip the eForm ZIP file into the assets/snippet/ folder. You should now have an extra folder called eform.
- Create a new snippet, name it eForm and copy and paste the content of the eform.snippet.tpl file
- Read eform/docs/eform.htm and the examples
- Drop the eForm snippet into page and add parameters as you require
- If you are managing the server that you are running MODx on, you need to make sure that **sendmail** is installed and configured properly.

Usage
-----

### Required Parameters

- &formid - _Required_
  - Identity (id) of the form on the page that this snippet will manage. Eg: <code><form id="formid"></code>
- &tpl - _Required_
  - \[<span class="error">\[Chunk\]</span>\] name or document id to use as a template.
- &report - _Required_
  - \[<span class="error">\[Chunk\]</span>\] name or document id to use when generating reports, if using the &noemail parameter, this parameter is not required.

### Optional Parameters

- &to - _Optional_
  - Email address to send eForm information to For multiple recipients separate emails with a comma (,) If omitted the site settings email address will be used.
- &from - _Optional_
  - Sets the email address to appear in the From section of the email.
- &automessage - _Optional_
  - chunk name (non-numeric) or document id (numeric) to use as an auto-responder message Can include <span class="error">\[+form fields+\]</span>. E.g. <span class="error">\[+firstname+\]</span> - tags: <span class="error">\[form\_fields\]</span>,<span class="error">\[postdate\]</span> - note: eForm will send the auto-respond message to the email address specified inside the <span class="error">\[email\]</span> form field.   
      **More to Come...**

Events
------

#### eFormOnBeforeFormParse

Called just before the form is parsed, Parsing is done **only** if there is $\_POST data valid to the form.

#### eFormOnValidate

Called after built-in validation is parsed, for use with extended validation.

#### eFormOnBeforeMailSent

Called before the message is sent. This function is called regardless of wether &noemail is set.

#### eFormOnMailSent

Called after the message is sent. If &to is not set, or is not a valid address, this event is not called.

#### eFormOnBeforeFormMerge

Very last event called before the form is pushed to the client browser.

Examples
--------

### eForm Forms

#### A Simple ContactForm chunk

```
<pre class="brush: php">
<p class="error">[+validationmessage+]</p>

<form method="post" action="[~[*id*]~]" id="EmailForm">

        <fieldset>
                <h3> Contact Us</h3>

                <input name="formid" type="hidden" value="ContactForm" />

                <label for="cfName">Your name:
                <p><input name="name" id="cfName" class="text" type="text" eform="Your Name::1:" /></p></label>

                <label for="cfEmail">Your Email Address:
                <p><input name="email" id="cfEmail" class="text" type="text" eform="Email Address:email:1" /></p> </label>

                <label for="cfRegarding">Regarding:
                <p><input name="subject" id="cfRegarding" class="text" type="text" eform="Form Subject::1" /></p> </label>

                <label for="cfMessage">Message:
                <p><textarea name="message" id="cfMessage" eform="Message:textarea:1"></textarea></p>
                </label>

                <label>&nbsp;</label><p><input type="submit" name="contact" id="cfContact" class="button" value="Send This Message" /></p>

        </fieldset>

</form>

```\--ScottyDelicious 16:00, 5 December 2006 (PST)

### eForm Report

#### A simple ContactFormReport

```
<pre class="brush: php">
<p>This is a response sent by <b>[+name+]</b> using the feedback form on this website. The details of the message follow below:</p>

<p>Name: [+name+]</p>
<p>Email: [+email+]</p>
<p>Regarding: [+subject+]</p>
<p>Comments:<br />[+message+]</p>

<p>You can use this link to reply: <a href="mailto:[+email+]?subject=RE: [+subject+]">[+email+]</a></p>

```\--ScottyDelicious 16:00, 5 December 2006 (PST)

### eForm Document Snippet Calls

```
<pre class="brush: php">
[!eForm? &formid=`ContactForm` &subject=`[+subject+]` &to=`you@youremail.com` 
&ccsender=`1` &tpl=`ContactForm` &report=`ContactFormReport` &gotoid=`1`  !]

```### Using eForm with Flash forms

eForm can be used to process data sent through a Flash form.<br />   
The chunk template (tpl) defines all the fields in your Flash form.<br />   
Add the formid field with the appropriate name in the Flash form and post that form to a page where the eForm call is made.<br />   
You can even manage files upload with eForm and Flash. For that you will need to send all the data in one call with Flash using a similar code:

```
<pre class="brush: php">
var postData:String = "";
postData += "action=index.php?id=<eFormPage>";
postData += "&name="+escape(Util.trim(input_name.text));

fileRef["postData"] = postData;
fileRef.upload(url);

```You can format the report template as an xml document to send back to Flash to notify the success of the operation:

```
<pre class="brush: php">
<root>
<success>1</success>
</root>

```Datatypes and Formatting
------------------------

eForm incorporates a form parser which extracts formatting and validation options from each form field. To set options for a field add the eform(pseudo) attribute to each required form field.

```
<pre class="brush: php">
<input type="text" name="color" eform="A Color:string:1" />

```The basic format of the eform attribute is:

description/title:datatype:required:validation message:validation rule

### Data types

You only need to set the following data types. Others will be set automatically (radio & checkbox as they are, string for textbox and listbox for select)

Standard validation: All fields that are required will be checked if they are left empty.

- string - No specific validation besides checking if it's empty if the field is required.
- date - Checks if it is a valid date (based on php's strtotime() function)
- integer - Checks if it is a number (does not check if it is in fact an integer)
- float - Checks if it is a number
- email - Checks if it's a valid email address using a simple regular expression
- file - (for file upload input) - checks if a size error occurs, does not currently check file type
- html - Same as string except that it converts line endings (\\n) to tags

The listbox, checkbox and radio fields do normally not require the datatype to be set. eForm will recognize these automatically. It will validate the values against the list of values placed in the form. The option tags in the listbox and the checkbox must have their value attributes explicitly set for this automatic validation to work. Eg.

```
<pre class="brush: php">
<option value="Mr">Mr</option>

```Not:

```
<pre class="brush: php">
<option>Mr</option>

```Extended Server Validation
--------------------------

This version introduces extended server validation and word filtering using very flexible validation rules that can be set in the eformattribute. You can set 2 extra validation parameters, a custom error message and a validation or filter rule.

**Example**

```
<pre class="brush: php">
eform="Year of Birth:integer:1:Must be between 1950 and 2002:#RANGE 1950-2002"

```### Validation rules

- \#LIST - comma separated list of valid values   
  example: #LIST blue,red,green.maroon
- \#RANGE - a comma separated list of numbers or numeric ranges. When setting a range the order is not important.   
  1~10 or 10~1 will both validate a number between 1 and 10 (inclusive).   
  Handles negative as well as positive numbers   
  example: #RANGE 1,3,-5~-15,60~82
- \#SELECT - list of valid values retrieved from a database query The query should only return a single column of values   
  (the function only checks against the first returned column). You can use the {DBASE} {PREFIX}tags which will   
  be replaced by the MODx database name and table prefix respectively.   
  example: #SELECT keyword FROM {PREFIX}site\_keywords
- \#EVAL - string of php code. Should return either true or false   
  deprecated - Although #EVAL still works in eForm 1.4 this rule will very likely no longer be supported in future versions.   
  Use #FUNCTION instead.
- \#FUNCTION - Name of a function. The function should expect one parameter (the posted value) and return either TRUE or FALSE.   
  See the eform event example on how you can include a function. example: #FUNCTION myValidationFunction
- \#REGEX - regular expression - syntax as for preg\_match() - see php manual   
  example: #REGEX /^<span class="error">\[a-z\]</span>+ <span class="error">\[a-z0-9\_\]</span>+/i
- \#FILTER - Filters do not validate the input but simply replace words or values using filter criteria. You can use the following   
  filters:   
  o #FILTER #LIST   
  use double pipe to separate 2 comma separated lists of words and replacement values.   
  example; #FILTER #LIST badword,verybadword||goodword,verygoodword   
  o #FILTER #EVAL   
  example: #FILTER #EVAL return myFilterFunction($value);   
  (of course you have to make sure the function exists somehow)

example filter function

```
<pre class="brush: php">
            function myFilterFunction($value){
               $badWords = array('scribble','coding');
               $goodWords = array('design','sleep');
               return str_replace($badWords,$goodWords,$value);
            }
            

```o #FILTER #REGEX   
regular expression replace - syntax as for preg\_replace() separate the search and replacement expression with a double   
pipe symbol (||)   
TODO: example

### Hidden fields, select boxes, radio options and checkbox fields

Select boxes, radio options and checkbox fields now have working automatic validation. Any input for these fields is validated against the values set in your form template. This avoids anyone tampering with the form by adding their own values to these fields.

#### Hidden fields

By default hidden fields are validated as a protection against tampering by comparing the input against the value set in the form template (much like the select, checkbox and radio fields) In some circumstances this may not be desirable however. For instance when you use some javascript in your form to store a result in a hidden field. In those cases you can turn this behaviour off by setting the eform attribute (with or without it's own validation).

**Hidden field examples**

**1.** The default behaviour is handy for instance if you are storing a document id and want to be sure no one can tamper with the id. the field would look like this:

```
<pre class="brush: php">
<input type="hidden" name="docId" value="31" />

```**2.** Suppose you have a form where a javascript calculated value is stored in a hidden field. To avoid the hidden field being validated at all you add the following eform attribute:

```
<pre class="brush: php">
<input type="hidden" name="calculatedField" value="" eform="::0::" />

```**3.** Same as example 2 but suppose you want to make sure a value is returned and that it stays within a certain range. The eform attribute is set with: title,integer data type, required field, error message and validation with #RANGE (in this example a value between 1-10)

```
<pre class="brush: php">
<input type="hidden" name="calculatedField" value="" eform="Calculated Value:integer:1:Calculation out of range:#RANGE 1-10" />

```#### Form field examples with validation

**Selectbox** - set as required field (no validation required)

```
<pre class="brush: php">
<select name="mySelect" eform="Select Country::1" /> (datatype left blank)
<option value="en-au">Australia</option>
<option value="en-us">USA</option>
</select>

```**Textbox** - required and format set to date

```
<pre class="brush: php">
<input type="text" name="dobDate" eform="Date of Birth:date:1:@EVAL return (strtotime($value)!==-1)?true:false;" />

```**Multiple checkbox** - required, eform only set once.

```
<pre class="brush: php">
<input type="checkbox" name="myColors[]" value="Red" eform="Colors::1" /> (datatype left blank)
<input type="checkbox" name="myColors[]" value="Green" /> (datatype left blank)

```Notes
-----

- If you use a template rather than a chunk for the form (the tpl parameter), make sure you turn the 'rich text' attribute of the template off. Otherwise all of the 'eform' pseudo attributes will be stripped off the first time you edit the form.

- The "tick marks" in the snippet call are not single quotes, but back ticks. Using single quotes will give you a "Document or chunk not found for template id=" error.

Resources
---------

- [eForm Howtos](http://wiki.modxcms.com/index.php/Category:EForm) on old MODxWiki

LInk to author's page (www.partout.info/assets/snippets/eform/docs/eform.htm)