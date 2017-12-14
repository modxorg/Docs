---
title: "mxFormBuilder.Create Form"
_old_id: "1660"
_old_uri: "revo/mxformbuilder/mxformbuilder-create-form"
---

### Create your first form

 Now that we have our package installed you will need to refresh your browser window if you have not already done so, this will update the Components menu adding in the menu for mxFormBuilder. Now we can select "Components" -> "mxFormBuilder" from the menu to load our form builder panel. Next follow the steps to create a sample contact form for use on your site.

1. In the Contact Forms tab select the "Create New" button on the right  
  ![](/download/attachments/73fcdf0007b17bddad5cc696dfe4eb85/mxfb-00-initial-load.png)
2. Now that we have our form window we can start looking at the options:  
  
  1. **Name** - <span style="font-family: Menlo, Monaco, monospace, sans-serif; white-space: pre;">This is a friendly name of the form that will be used in the default form wrapper as a heading tag and also used to identify the form in email communications and log records</span>
  2. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Owners** - Select any ModX user(s) that you would like to receive email notifications on new submissions. Should you leave this blank then no emails will be sent for notifications.</span></font>
  3. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Open Date** - Sets a valid date/time for when the form can be accessed after. If the current date/time is before the open date then the form will not be displayed at all (blank/empty response). Leaving empty will make the form visible immediately to all users.</span></font>
  4. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Close Date** - Sets a valid date/time for when the form can be accessed until.If the current date/time is after the close date then the form will not be displayed at all (blank/empty response). Leaving empty will leave the form open as long as it's after the open date.</span></font>
  5. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Success Redirect** - Allows you to automatically redirect a users browser to a selected page on the site. In order to enable you must also set the check box for Enable Redirect (6).</span></font>
  6. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Enable Redirect** - When checked and the success redirect field are complete after any successful submission the users browser will be redirected to the selected resource (5) immediately.</span></font>
  7. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Max # Submissions** - Allows you to set a threshold for the maximum number of submissions allowed for the given form (eg: event registration for 20 guest). Should you change the open/close dates of the form over time the max number of submissions will automatically adjust for the new open/close date range allowing you to advance the form dates to allow new registrations for a different event date/time period.</span></font>
  8. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Active** - Sets the overall visibility of the form. When un-checked the form will not be rendered to the browser just an empty/blank response will be returned by the snippet call.</span></font>
  9. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Context** - Allows you to filter which context are allowed to display this form. Leaving it empty will allow all context to display the given form.</span></font>
  10. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Success Message** - Custom message to display to users after the form has been submitted successfully (passed all validation rules). If left empty then the lexicon \[\[%mxformbuilder.msg.success\]\] will be used as the default success message. (only displayed if not using the success redirect option (5,6))</span></font>
  11. <font face="Menlo, Monaco, monospace, sans-serif"><span style="white-space: pre;">**Max Submissions Reached Notice** - Provides you with the option to display a custom message to users if they view the form after the max number of submissions (7) has been reached. This will over ride the lexicon entry \[\[%mxformbuilder.msg.maxreachedmessage\]\] in the rendering. If left empty the form will display the lexicon content.  
      </span></font>![](download/attachments/73fcdf0007b17bddad5cc696dfe4eb85/mxfb-01-form-create.png)