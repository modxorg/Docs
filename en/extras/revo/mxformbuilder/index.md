---
title: "mxFormBuilder"
_old_id: "1659"
_old_uri: "revo/mxformbuilder/"
---

Purpose:
--------

 The goal with mxFormBuilder to to provide a consolidated and easy to user interface to manage all aspects for forms in your ModX site. Additional focus was to have built in protection for common security threats associated with forms.

Getting Started:
----------------

### Installation

 The first thing you need to do is install the component if you have not already completed this. In the Manager for the site you want to install mxFormBuilder on from the top menu select "System" -> "Package Management". Once the Package Management page loads click on the "Download Extras" button. Now that we have the package browser panel loaded lets enter the search term "mxFormBuilder" in the search box on the left side of the window. Once you find the package listed as mxFormBuilder select "Download". When that completes you can now click on the the "Back to Package Management" button above the grid list. This will now allow us to select the "Install" button next to our local package list of mxFormBuilder.

### Properties

 To customize your display and settings you can use the properties below. Its recommended that you create a property set globally for your site, which allows you to quickly change properties without having to type the same ones in each time.

 <table><tbody><tr><td> Name </td> <td> Type </td> <td> Options </td> <td> Default </td> <td> Description </td> </tr><tr><td> formid

 </td> <td> int </td> <td> </td> <td> null </td> <td> The form id that you want to display for end user input. The form id is found on the mxFormBuilder grid next to the form name inside the standard snippet sample block. </td> </tr><tr><td> context

 </td> <td> string </td> <td> </td> <td> null </td> <td> Specify a specific context to filter the form rendering for context. </td> </tr><tr><td> tvOwners

 </td> <td> string </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> emailOwners

 </td> <td> string (comma delimeted) </td> <td> </td> <td> null </td> <td> Enter a comma-seperated list of email address that you'd like the success submission notification sent to. This is the same email that the form owner(s) recieve on submission if specified on the form. </td> </tr><tr><td> subjectOwners

 </td> <td> string </td> <td> </td> <td> null </td> <td> Create a specific title for the email subject when sent to email owners. The default subject is a combination of a lexicon entry and the name of the form. </td> </tr><tr><td> emailNotifications

 </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> hooks

 </td> <td> string (comma delimeted)

 </td> <td> </td> <td> null </td> <td> Calls system snippets after a successful submission. Allows you to extend logic beyond the built-in email and database options. You can use this for things like extending to a third party CRM. The snippets called will have full access to all submitted data for further parsing in hook snippet. </td> </tr><tr><td> preHooks

 </td> <td> string (comma delimeted)

 </td> <td> </td> <td> null </td> <td> Calls system snippets prior to form rendering. This allows you to modify form fields and options prior to the form rendering. Example use could be to append specific data to a form without requiring user input. Another example could be to change the rendered form output from an input field to selectlist. </td> </tr><tr><td> disablecss

 </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> disablejs

 </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> onsuccess

 </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> disableToken

 </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> **TEMPLATES** </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> itemTpl

 </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> wrapperTpl </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> successTpl </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> errorTpl </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> errorMessage </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> emailOwnerTpl </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> emailUserTpl </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td> debug </td> <td> </td> <td> </td> <td> </td> <td> </td></tr></tbody></table>### Placeholders