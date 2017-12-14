---
title: "Using runProcessor"
_old_id: "493"
_old_uri: "2.x/developing-in-modx/advanced-development/using-runprocessor"
---

<div class="note"> The usage of runProcessor described here only work in Revolution 2.0.8 and later. Users prior to that will have to use the deprecated [executeProcessor](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.executeprocessor "modX.executeProcessor") method. </div><div>- [Using runProcessor](#UsingrunProcessor-UsingrunProcessor)
- [See Also](#UsingrunProcessor-SeeAlso)

</div>Using runProcessor
------------------

 MODX has a specific method that allows you to run processors straight from any PHP file, such as a [Plugin](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins"), [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") or externally. This can be done with the following syntax:

> $response = $modx->runProcessor('action/path/to/processor',$arrayOfProperties,$otherOptions);

 This will then execute the specified processor and return a modProcessorResponse object, that contains the response from the processor. That can then be checked to see if the process was a success or failure. The first parameter, or action, is the path to the processor (without the file extension) from the core/model/modx/processors/ directory (This directory can also be overridden in the 3rd parameter array with the param 'processors\_path').

 For example, this code creates a new Chunk:

 ```
<pre class="brush: php">$response = $modx->runProcessor('element/chunk/create',array(
   'name' => 'NewChunk',
   'description' => 'A test Chunk made with runProcessor.',
   'snippet' => '<h3>Chunkify!</h3>',
));
if ($response->isError()) {
    return $response->getMessage();
}
$chunkArray = $response->getObject();
return 'The chunk "'.$chunkArray['name'].' was created with ID '.$chunkArray['id'];

``` This block of code runs the 'element/chunk/create' processor, checks to see if it was successful (with isError()), and if so, returns a message saying the ID and the name of the new Chunk. Note that getObject returns an **array** of the object that is returned by the processor. getMessage will return any message sent back from the processor.

 You can also create an entire user, including Extended Fields, group assignments, a generated password and email notification.

 ```
<pre class="brush: php">$groups = array();
$groups['Group1']['usergroup'] = '7'; // ID of group
$groups['Group1']['role'] = '1'; // ID of role
$groups['Group2']['usergroup'] = '8';
$groups['Group2']['role'] = '1';
$fields = array();
$fields['active'] = true;
$fields['passwordgenmethod'] = 'g';
$fields['passwordnotifymethod'] = 'e';
$fields['email'] = $email; 
$fields['username'] = $username;
$fields['fullname'] = $fullname;
$fields['extended']['container']['name'] = $value;
$fields['groups'] = $groups;
$response = $modx->runProcessor('security/user/create', $fields);    

```See Also
--------

1. [Namespaces](/revolution/2.x/developing-in-modx/advanced-development/namespaces)
2. [Caching](/revolution/2.x/developing-in-modx/advanced-development/caching)
  1. [Setting up Memcache in MODX](/revolution/2.x/developing-in-modx/advanced-development/caching/setting-up-memcache-in-modx)
3. [Custom Manager Pages](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages)
  1. [Actions and Menus](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus)
      1. [Action List](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus/action-list)
  2. [Custom Manager Pages in 2.3](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/custom-manager-pages-in-2.3)
  3. [Custom Manager Pages Tutorial](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/custom-manager-pages-tutorial)
  4. [MODExt](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext)
      1. [MODExt MODx Object](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-modx-object)
      2. [MODExt Tutorials](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials)
            1. [1. Ext JS Tutorial - Message Boxes](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
            2. [2. Ext JS Tutorial - Ajax Include](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
            3. [3. Ext JS Tutorial - Animation](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
            4. [4. Ext JS Tutorial - Manipulating Nodes](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
            5. [5. Ext JS Tutorial - Panels](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
            6. [7. Ext JS Tutoral - Advanced Grid](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
            7. [8. Ext JS Tutorial - Inside a CMP](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)
      3. [MODx.combo.ComboBox](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.combo.combobox)
      4. [MODx.Console](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.console)
      5. [MODx.FormPanel](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.formpanel)
      6. [MODx.grid.Grid](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.grid.grid)
      7. [MODx.grid.LocalGrid](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.grid.localgrid)
      8. [MODx.msg](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.msg)
      9. [MODx.tree.Tree](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.tree.tree)
      10. [MODx.Window](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.window)
4. [Internationalization](/revolution/2.x/developing-in-modx/advanced-development/internationalization)
  1. [Adding a Translation](/revolution/2.x/developing-in-modx/advanced-development/internationalization/adding-a-translation)
5. [MODx Services](/revolution/2.x/developing-in-modx/advanced-development/modx-services)
  1. [modFileHandler](/revolution/2.x/developing-in-modx/advanced-development/modx-services/modfilehandler)
  2. [modMail](/revolution/2.x/developing-in-modx/advanced-development/modx-services/modmail)
  3. [modRegistry](/revolution/2.x/developing-in-modx/advanced-development/modx-services/modregistry)
6. [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management)
  1. [Transport Packages](/revolution/2.x/developing-in-modx/advanced-development/package-management/transport-packages)
  2. [Providers](/revolution/2.x/developing-in-modx/advanced-development/package-management/providers)
  3. [Creating a 3rd Party Component Build Script](/revolution/2.x/developing-in-modx/advanced-development/package-management/creating-a-3rd-party-component-build-script)
7. [Extending modUser](/revolution/2.x/developing-in-modx/advanced-development/extending-moduser)
8. [Using runProcessor](/revolution/2.x/developing-in-modx/advanced-development/using-runprocessor)
9. [Custom Resource Classes](/revolution/2.x/developing-in-modx/advanced-development/custom-resource-classes)
  1. [Creating a Resource Class](/revolution/2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class)
      1. [Creating a Resource Class - Step 2](/revolution/2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-2)
      2. [Creating a Resource Class - Step 3](/revolution/2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-3)
      3. [Creating a Resource Class - Step 4](/revolution/2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-4)
10. [From the Command Line (CLI)](/revolution/2.x/developing-in-modx/advanced-development/from-the-command-line-(cli))