---
title: "mxFormBuilder.Create Form List in TV"
_old_id: "1677"
_old_uri: "revo/mxformbuilder/mxformbuilder.create-form-list-in-tv"
---

 TV from mxFormBuilder's Form List 
-----------------------------------

 You could create a quick TV to allow content creators to select from any of the published forms created in mxFormBuilder with the packaged **_mxfbTVFormList_** snippet.

###  Creating the TV 

 In your Manager select elements tab from the left panel and then right mouse click _Elements_ -or- click on the TV icon in the menu bar. When the new template varible window displays you can provide the information you desire in the General Information tab, in our case we used the following:

- **Name** - mxform
- **Caption** - Select Form
- **Description** - (enter more information about the specific use case in your templates)

 Now select the **Input Options** tab and select your input type you want the users to interact with; I always select Listbox (Single-Select). Then we need to tell the TV that we want to use the renderings from our snippet to populate the content for the select list, so in our **Input Options Values** content area place the following:

 ```
<pre class="brush: plain">
@EVAL return '-- Select --||' . $modx->runSnippet('mxfbTvFormList');

``` This should look something like below

 ![](/download/attachments/73fcdf0007b17bddad5cc696dfe4eb85/mxfb-tv-create.png)

<div class="info"> By default only active forms and forms that are have blank (non-set) context and/or current context are listed.  
 Specify the &context or &active to change default filtering as needed.   
Ex: **$modx->runSnippet('mxfbTvFormList', _array('context'=>'web')_ )**  </div> Then you can set any additional properties you need for your specific use. The only other thing that I normally set is the templates that we want to have access to the TV. Click on the **Template Access** tab and place a check next to each template that you want to have this TV option visible. Now save your new TV.

###  TV Selection 

 After you have saved your new TV load a resource that uses any of the templates that you allowed access to the TV. Default rendering of the TV in the new resource will now be displayed in the **Template Variables** tab of the resource.

 ![](/download/attachments/73fcdf0007b17bddad5cc696dfe4eb85/mxfb-tv-example.jpeg)

<div class="info"> Example TV was placed in a category called mxFormBuilder; this will depend on your specific category assigned during creating the TV and any Form Customization. </div>###  Displaying the Form from assigned in TV 

 Now that we've got our TV and a Resource set with a selected form lets actually display the form. In the area that you want to display the form we need to call the **mxfb** snippet and pass the **_&formid_** parameter value of the TV.

 ```
<pre class="brush: plain">
[[!mxfb? &formid=`[[*mxform]]` ]]

```<div class="info"> Note that **mxform** is the name of the TV we created in our example. Update this to match the name you specified as your TV's name. </div><div class="info"> mxFormBuilder will only process if it finds a valid parameter for formid </div>