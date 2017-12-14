---
title: "Custom Manager Pages Tutorial"
_old_id: "78"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/custom-manager-pages-tutorial"
---

<div>- [Goal](#CustomManagerPagesTutorial-Goal)
- [Explanation and Mental Preparation](#CustomManagerPagesTutorial-ExplanationandMentalPreparation)
  - [What we'll need:](#CustomManagerPagesTutorial-Whatwe%27llneed%3A)
- [Create the Namespace](#CustomManagerPagesTutorial-CreatetheNamespace)
- [Make the Controller File](#CustomManagerPagesTutorial-MaketheControllerFile)
- [Create the Action](#CustomManagerPagesTutorial-CreatetheAction)
- [Create the Menu Object](#CustomManagerPagesTutorial-CreatetheMenuObject)
- [Make your CMP Translatable (Optional)](#CustomManagerPagesTutorial-MakeyourCMPTranslatable%28Optional%29)
  - [Create a Lexicon Directory](#CustomManagerPagesTutorial-CreateaLexiconDirectory)
  - [Identify your Lexicon key](#CustomManagerPagesTutorial-IdentifyyourLexiconkey)
  - [Create the Topic File](#CustomManagerPagesTutorial-CreatetheTopicFile)
  - [Create the Entries (Provide the Translations)](#CustomManagerPagesTutorial-CreatetheEntries%28ProvidetheTranslations%29)
  - [Use Translations in your CMP](#CustomManagerPagesTutorial-UseTranslationsinyourCMP)
- [Add a Custom Permission (optional)](#CustomManagerPagesTutorial-AddaCustomPermission%28optional%29)
- [Troubleshooting / Errors](#CustomManagerPagesTutorial-Troubleshooting%2FErrors)
  - [Your action does not appear in your menu](#CustomManagerPagesTutorial-Youractiondoesnotappearinyourmenu)

</div> Goal 
------

 We want to add a custom page to the MODx Revolution manager that will load (i.e. execute) the contents of an PHP file that has been uploaded to the webserver. Technically, such a page is called a Custom Manager Page, or CMP; please refer to the page on [Custom Manager Pages](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages "Custom Manager Pages") for a more detailed description.

<div class="info"> In MODx Evolution (versions 1.x and earlier), Custom Manager Pages were handled by "Modules", but those have been deprecated in Revolution. </div><div class="info"> If you want to develop a CMP for **MODX 2.3 or later**, then please read [Custom Manager Pages in 2.3](https://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/custom-manager-pages-in-2.3)</div> Explanation and Mental Preparation 
------------------------------------

 "What's the big deal?" you might ask. "Why can't I just add an anchor tag somewhere that links to my PHP file and be done with it?"

 ```
<pre class="brush: php"><a href="/path/to/my/file.php">My Custom Manager Page</a>

``` That should work, right? Well... maybe, but it's not that simple. There are a lot of moving parts that have to get connected to make this seemingly "simple" task work. Allowing for internationalization, permissions schema, and scalability requires that this process include several layers of abstraction that are not immediately obvious. It goes far beyond what's possible with the simple anchor tag solution above. But rest assured, the extra steps will ensure that the solution will be usable in a far greater number of scenarios.

###  What we'll need: 

- A PHP file on the webserver which generates the text for our CMP (a.k.a. the controller).
- A Namespace (i.e. a path) which defines a dedicated folder for our script(s).
- A clickable Menu object (modMenu) which associates the clickable link to the action.
- An Action object (modAction) which is an abstract representation of your file.
- And optionally, a Lexicon entry which would allow you to translate the label on your menu item.

 Maybe you're baffled by the complexity here, and to be fair, for simple scenarios, this is more complicated than is strictly required, but you may find yourself at some point getting into more complicated use-cases at which point you'll realize " _AHA_!!! THAT'S why they did it this way!" For now, just trust that the smart folks behind MODx put a lot of thought into how this was built, and there's a good reason that it is the way it is. Onward.

 Create the Namespace 
----------------------

 You can think of the Namespace as a dedicated directory for your PHP file(s) that pertain to this particular manager page. Keep in mind that creating the Namespace inside the MODx manager does not actually create the directory; likewise, removing a Namespace from the manager will not actually delete files and folders. When you "create" the namespace, you're just telling MODx to treat a certain folder in a certain way.

 In our example, we've chosen to call our namespace (and its folder) **mycmp.**

1. System->Namespaces 
  1. Click **Create New**
  2. Name: **mycmp** _(all lowercase, one word)_
  3. Path: **{core\_path}components/mycmp/** _(note the use of the system "core\_path" placeholder, and remember to include the trailing slash)_
2. Using your FTP client, create a directory inside **core/components** named **mycmp**.

<div class="note"> **Watch out for typos!** Make sure the Namespace path matches the directory name! </div> Make the Controller File 
--------------------------

 For our first manager page, we're going to keep it simple. Create a file named **index.php** which contains the following:

 ```
<pre class="brush: php"><?php
return 'This is my first Custom Manager Page';
?>

``` Upload the file to your MODx site into the directory (i.e. the Namespace) you've just created: **core/components/mycmp/index.php**

 As a superficial check, you may want to try navigating to the file in a browser window: <http://yourdomain.com/core/components/mycmp/index.php>

 But for such a check, you will need to temporarily insert some HTML or a print statement in your file.

<div class="note"> Notice that we did NOT use **print**, or **echo**, or raw HTML in our PHP. If you use any of these, you'll find that the text floats to the top of the page; remember that a Custom Manager Page is really acting as a function, so it should _return_ a value. </div> Create the Action 
-------------------

 The Action object identifies the location of your index.php file within the namespace.

<div class="info"> **About Actions**   
 In this case, an Action is an abstraction, or a "wrapper" around that PHP file you created. One of the most important things that distinguishes a MODx Action from a simple link to PHP file is that you can assign different permissions to an Action: you can control who accesses it and how. </div>1. System->Actions
2. Right-click **mycmp** from the list of namespaces and select "Create Action Here".
3. Controller: **index** _(this should match the name of your PHP file WITHOUT the .php extension)_
4. Namespace: yes, use the same namespace: **mycmp**
5. Parent Controller: Leave it blank or select "No Action".

 Create the Menu Object 
------------------------

1. System->Actions _(in the same window where you created the Action)_
2. Right-Click "Components" and choose "Place Action Here" 
  1. Lexicon Key: **mycmp** (we'll translate this in a bit)
  2. Description: **mycmp.menu\_desc** (we'll translate this in a bit)
  3. Action: **mynamespace - index**
  4. **Save** (you can ignore the Icon, Parameters, Handler, and Permissions fields for now)
3. Refresh your browser page.

<div class="note"> After you edit the menu item, be sure to refresh the manager page. The menu item will not be visible until you refresh your browser; likewise, any changes you make to an existing menu item will not be visible until you refresh the page. You may need to clear the cache too! </div><div class="note"> If you add any GET Parameters to the menu item under System -> Actions, steer clear of any use of the **a** variable or any other [Reserved Parameters](/revolution/2.x/developing-in-modx/other-development-resources/reserved-parameters "Reserved Parameters"). You might be using various GET parameters if your CMP has multiple pages. </div> You should now be able to click on the "Components" menu and see your menu item, and when you click it, you should see your message!

 ![](/download/attachments/18678083/CMP.jpg?version=1&modificationDate=1272511083000)

 Make your CMP Translatable (Optional) 
---------------------------------------

 If you never intend on internationalizing your site, then you probably have no need to create a Lexicon entry. But if you do want to provide translations, the Lexicon is MODx's way of doing it. The Lexicon key is a unique identifier, e.g. 'My CMP' which can get translated into other languages.

###  Create a Lexicon Directory 

 Go to your Namespace path (usually in your Extra's core/components/mycmp/ directory) and place a "lexicon/" directory in there. From there, add an 'en' directory as well ('en' for 'English' -- or use your language code of choice). You should have something like:

> core/components/mycmp/lexicon/en/

###  Identify your Lexicon key 

1. System->Actions
2. Find your Menu action in the menu on the right (under Components)
3. Update Menu
4. Note the 'Lexicon Key' field. Set it to 'mycmp'.
5. Set the 'Description' field to 'mycmp.menu\_desc'.

 We need both a Language Topic and a Lexicon Key in order to define a Lexicon entry. By doing the above, you've now pointed your Action/Menu to use a particular Topic and Key, but you haven't yet defined them in the Lexicon. It's entirely possible to set up the Lexicon entries _first_ and then point your Action and Menu objects to reference them _second_, but here we're assuming that you are adding Lexicon entries _after_ creating the Action and Menu objects.

###  Create the Topic File 

 Create a file name **default.inc.php** in your new 'en' lexicon directory (i.e. _core/components/mycmp/lexicon/en/default.inc.php_), and place your entries in them, in this format:

 ```
<pre class="brush: php">$_lang['lexicon_entry_key'] = 'Translation for Entry';

```###  Create the Entries (Provide the Translations) 

 Go ahead and add these entries to _core/components/mycmp/lexicon/en/default.inc.php_:

 ```
<pre class="brush: php">$_lang['mycmp'] = 'My CMP';
$_lang['mycmp.menu_desc'] = 'My custom manager page.';

```<div class="warning"> **Strict Naming Conventions!**   
 If you use lexicon entries to translate custom System Settings, then be aware MODX will not look for the exact lexicon entry you typed! You must follow a strict naming convention, otherwise your lexicon entry will not be loaded and your System Setting information will not be translated! The name of your System Setting must use a Lexicon entry that is named after the setting's key, prefixed with "setting\_": ```
<pre class="brush: php">setting_ + Key
	
``` The Description must follow the same format and include a suffix of "desc":

 ```
<pre class="brush: php">setting_ + Key + _desc
	
``` See System Settings for more info.

</div> Now, clear the site cache to reload the lexicon cache, via Site -> Clear Cache.

###  Use Translations in your CMP 

 The Systems Settings dialogs should pick up your translations as long as you've followed the expected naming conventions, but in order to use translated text inside your CMP, you need to load the lexicon. You do this using the lexicon object and its load method, something like this:

 ```
<pre class="brush: php">$modx->lexicon->load('your_namespace:default');

``` Put that at the top of your CMP code.

 Add a Custom Permission (optional) 
------------------------------------

 Every MODX menu item has a built-in permission already assigned to it. If you want to enforce special access permissions to your new CMP, you do this when you create or edit the menu item. Under System -> Actions, find your menu item and right-click to edit it and type in a unique name for the permission that will define access to this page. Technically, it can be anything so long as it is unique, but it's probably best to identify it with your CMP, e.g. use your namespace's name. Remember that unique permission name and save your Menu.

 The counterpart to this action is to define the permission so MODX knows about it. Head to Security -> Access Controls -> Policy Templates. These list all the permissions (a.k.a. capabilities) that are available for manipulating a given area. We're interested in the MODX Admin dashboard, so we'll be dealing with the Administrator Template. Make a copy of the template before tinkering with it!

 Edit the Administrator Template and add a new permission. You can select from existing permissions, or you can type in your own. Enter in the **exact** text you entered when you edited your Menu item, then save the Policy Template.

 Now your CMP can be governed by the MODX permission schema! You can create an Access Policy that includes or omits that permission and thereby control which User Groups can use your CMP.

 Troubleshooting / Errors 
--------------------------

 Having problems? Here are a couple things that you may have run into.

1. Did you make sure you created a directory on your webserver with the EXACT path as defined by your Namespace?
2. Are you sure your controller file is using the **return** statement instead of using **print** or **echo**?
3. Your menu items aren't being translated? Be sure to clear your cache! **Site->Clear Cache**
4. Translations aren't appearing in your CMP? Make sure you specified the "lexicon" in the Action object (ie, "mycmp:default")

###  Your action does not appear in your menu 

 If your new action does not appear in the menu where you placed it even though it shows up in the correct place under System -> Actions, then you may be dealing with some permissions errors on your server. Specifically, be alert to any error messages that show up when you clear your site's cache. If you any errors, it may be a sign that your permissions on your server are incorrect. You may need to change the permissions on the core/components directory, or maybe you need to go as far to as to change the user/group names that Apache uses when accessing your site.

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