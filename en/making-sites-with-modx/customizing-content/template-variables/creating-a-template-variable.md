---
title: "Creating a Template Variable"
_old_id: "75"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/creating-a-template-variable"
---

<div>- [Explanation](#CreatingaTemplateVariable-Explanation)
- [Creating the Template Variable](#CreatingaTemplateVariable-CreatingtheTemplateVariable)
  - [1. Log into the MODx manager](#CreatingaTemplateVariable-1.LogintotheMODxmanager)
  - [2. Add the Template Variable](#CreatingaTemplateVariable-2.AddtheTemplateVariable)
  - [3. Define the General Information](#CreatingaTemplateVariable-3.DefinetheGeneralInformation)
  - [4. Define the Input Options](#CreatingaTemplateVariable-4.DefinetheInputOptions)
  - [5. Configure Template Access](#CreatingaTemplateVariable-5.ConfigureTemplateAccess)
  - [6. Save the TV definition.](#CreatingaTemplateVariable-6.SavetheTVdefinition.)
  - [7. Use it: Create a Resource](#CreatingaTemplateVariable-7.Useit%3ACreateaResource)
  - [8. Edit the Value](#CreatingaTemplateVariable-8.EdittheValue)
- [Advanced Usage](#CreatingaTemplateVariable-AdvancedUsage)
- [Output Rendering Options](#CreatingaTemplateVariable-OutputRenderingOptions)
- [Properties](#CreatingaTemplateVariable-Properties)
- [Template and Resource Group Access](#CreatingaTemplateVariable-TemplateandResourceGroupAccess)
- [See Also](#CreatingaTemplateVariable-SeeAlso)
 
</div> This page outlines how to create a Template Variable in MODX Revolution. A Template Variable, in a nutshell, is a custom field. To read more about what about what a Template Variable is, see the page on [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables").

Explanation
-----------

 When we say "Create a Template Variable", there are two possible actions that we might be talking about: we can be referring to the action of adding some text or content to one of our existing custom fields when we edit a MODX page (i.e. a Resource), OR we can be referring to the action of defining this field so that it is available to our MODX resources. This page is all about the latter. In the first case, we would be creating an _instance_ of the Template Variable, whereas the second case is all about defining the Template Variable blueprint, which determines how each instance will behave.

<div class="note"> **A Class of Field**   
 When you create a Template Variable, you are really defining a _class_ of custom field; it acts as a blueprint for all instances of this custom field. </div>Creating the Template Variable
------------------------------

### 1. Log into the MODX manager

 Just to be clear, you must be logged into the MODX manager as an Administrator (or similar) for this to work!

### 2. Add the Template Variable

 On the left-hand resource-tree pane, click on the **Elements** tab

 <span class="image-wrap" style="float: left">![](download/attachments/18678061/MODx+Create+TV.png?version=1&modificationDate=1308130781000)</span>

### 3. Define the General Information

 When we define a TV, we have to define a lot of information about the behavior of this custom field. The "General Information" tab contains the basic information for this variable.

 ![](download/attachments/18678061/create-tv-general1.png?version=1&modificationDate=1268850848000)

- **Variable Name**: This corresponds to the placeholders that will be used in your templates, e.g. **bio** = \[\[\*bio\]\]. _This name should be **unique**_!
- **Caption**: This is the primary label for your variable that appears when you edit a resource that uses this TV
- **Description**: This is the secondary label for your variable
- **Category**: This affects which sub-tab the variable appears on
- **Sort Order**: If you're using more than one TV, this will determine which appear at the top (1 = top, bigger numbers sink to the bottom)

 ![](download/attachments/18678061/MODX+__+Template+Variable_+bio-1.png?version=1&modificationDate=1308136915000)

 In the picture, you can see how the settings will correspond to your pages's editor fields.

<div class="note"> The name should be unique! </div>### 4. Define the Input Options

 Next, click on the **Input Options** tab: you need to choose which kind of field this will be, e.g. a text field, a dropdown field, a WYSIWYG, etc. See the page for See the [Template Variable Input Types](making-sites-with-modx/customizing-content/template-variables/template-variable-input-types "Template Variable Input Types") for a full list of possible input types.

- **Input Type**: Your field might be a simple text field, a dropdown, a reference to another page, or many other types of field.
- **Input Options**: Some Input Types ignore this field, but others may require it. E.g. a dropdown list requires a list of possible values. Again, see the page on [Template Variable Input Types](making-sites-with-modx/customizing-content/template-variables/template-variable-input-types "Template Variable Input Types") for more info.
- **Default**: this affects what the default value for the field will be. This can be a simple value, or it can utilize one of the MODX [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings "Bindings") to do things like select a value from the database or inherit a value from a parent page.

 ![](download/attachments/18678061/create-tv-rendopt1.png?version=1&modificationDate=1268850855000)

### 5. Configure Template Access

 Click the **Template Access** tab: you must define which template(s) will actually use this custom field that you've defined – once you've defined this custom field, you can choose which template(s) can actually use it.

 Any time you create a Resource that uses a template to which a TV has been attached, the TV will be available for editing. **Make sure you attached the TV to at least one template.**

### 6. Save the TV definition.

 When you edit a page that uses a template associated to this TV, you'll be able to add data to that TV field.

### 7. Use it: Create a Resource

 Now that you've defined your TV and you've added it to a template, add a MODX Resource (e.g. right-click in the document tree and choose **Create --> Create Resource Here**). Select a template that uses this TV.

### 8. Edit the Value

 Once your MODX Resource (i.e. page) is using the template that contains your template variable, you can add data to this attribute by clicking on the page's "Template Variables" tab.

- - - - - -

Advanced Usage
--------------

 IN PROGRESS ...

 You may have noticed we skipped over a fair number of tabs in the initial walk through. Template Variables offer for some more complex functionality that you don't need for simple scenarios.

Output Rendering Options
------------------------

 Next, we'll select the output rendering options. We'll select 'Date' as well, and as you'll note, below this box (depending on the Output Render selected) some form fields will show:

 ![](download/attachments/18678061/create-tv-outtype1.png?version=1&modificationDate=1268850851000)

 Allowing us to edit more fine-grained options for that Output Render.

Properties
----------

 From there, we can specify any default properties we want for the TV. "How can you use properties on a TV?", you might ask. Well, let's say we're doing a textarea TV named "viewingSS". In our content, we've got this:

 ```
<pre class="brush: php">
Viewing: [[+subsection]]

``` We can add a list property 'subsection' to the grid, and then allow that property to be overridden via property sets. Say we created a Property Set named 'CarsSectionTVPS' (PS for Property Set). In it, we set the 'subsection' property to "Cars". We'd then attach it to the TV in our Resource, or Template, or whereever we are using it like so:

 ```
<pre class="brush: php">
[[*viewingSS@CarsSectionTVPS]]

``` This would output in the place of the TV:

> Viewing: Cars

Template and Resource Group Access
----------------------------------

 We can assign TVs to [Templates](making-sites-with-modx/structuring-your-site/templates "Templates"), as well. This allows those Resources assigned to those [Templates](making-sites-with-modx/structuring-your-site/templates "Templates") to edit the TVs for each Resource.

 Also, TVs can be restricted to certain Resource Groups, selectable in the grid labeled "Access Permissions".

See Also
--------

1. [Creating a Template Variable](making-sites-with-modx/customizing-content/template-variables/creating-a-template-variable)
2. [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings)
  1. [CHUNK Binding](making-sites-with-modx/customizing-content/template-variables/bindings/chunk-binding)
  2. [DIRECTORY Binding](making-sites-with-modx/customizing-content/template-variables/bindings/directory-binding)
  3. [EVAL Binding](making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding)
  4. [FILE Binding](making-sites-with-modx/customizing-content/template-variables/bindings/file-binding)
  5. [INHERIT Binding](making-sites-with-modx/customizing-content/template-variables/bindings/inherit-binding)
  6. [RESOURCE Binding](making-sites-with-modx/customizing-content/template-variables/bindings/resource-binding)
  7. [SELECT Binding](making-sites-with-modx/customizing-content/template-variables/bindings/select-binding)
3. [Template Variable Input Types](making-sites-with-modx/customizing-content/template-variables/template-variable-input-types)
4. [Template Variable Output Types](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types)
  1. [Date TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/date-tv-output-type)
  2. [Delimiter TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/delimiter-tv-output-type)
  3. [HTML Tag TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/html-tag-tv-output-type)
  4. [Image TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/image-tv-output-type)
  5. [URL TV Output Type](making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/url-tv-output-type)
5. [Adding a Custom TV Type - MODX 2.2](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2)
6. [Adding a Custom TV Input Type](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-input-type)
7. [Adding a Custom TV Output Type](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-output-type)
8. [Creating a multi-select box for related pages in your template](making-sites-with-modx/customizing-content/template-variables/creating-a-multi-select-box-for-related-pages-in-your-template)
9. [Accessing Template Variable Values via the API](making-sites-with-modx/customizing-content/template-variables/accessing-template-variable-values-via-the-api)