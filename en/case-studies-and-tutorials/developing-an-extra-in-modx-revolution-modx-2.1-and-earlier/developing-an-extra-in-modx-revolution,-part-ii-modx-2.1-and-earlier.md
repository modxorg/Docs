---
title: "Developing an Extra in MODX Revolution, Part II - MODX 2.1 and Earlier"
_old_id: "1050"
_old_uri: "2.x/case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-ii-modx-2.1-and-earlier"
---

This tutorial is part of a Series:

- [Part I: Getting Started and Creating the Doodles Snippet](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier "Developing an Extra in MODX Revolution - MODX 2.1 and Earlier")
- Part II: Creating our Custom Manager Page
- [Part III: Packaging Our Extra](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-iii-modx-2.1-and-earlier "Developing an Extra in MODX Revolution, Part III - MODX 2.1 and Earlier")

- [First Setup Steps](#first-setup-steps)
  - [Namespaces](#namespaces)
  - [Actions and Menus](#actions-and-menus)
  - [Lexicons](#lexicons)
- [Setting up the Controllers with MODExt](#setting-up-the-controllers-with-modext)
  - [The Base Controller](#the-base-controller)
  - [Custom Request Routing](#custom-request-routing)
  - [The Header Controller](#the-header-controller)
- [Our Doodles CMP Page](#our-doodles-cmp-page)
  - [The Section JS File](#the-section-js-file)
  - [The Panel JS File](#the-panel-js-file)
- [The Doodles Grid](#the-doodles-grid)
  - [Hooking Up via Connectors](#hooking-up-via-connectors)
  - [Adding Search](#adding-search)
  - [Adding an Update Window](#adding-an-update-window)
  - [Adding a Remove Context Menu Option](#adding-a-remove-context-menu-option)
  - [Creating the Create Form](#creating-the-create-form)
  - [Adding Inline-Editing](#adding-inline-editing)
- [Summary](#summary)



This section will cover creating the Custom Manager Page (CMP) for our Doodles Extra we created in [step 1](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier "Developing an Extra in MODX Revolution - MODX 2.1 and Earlier"). This includes explaining controllers/connectors/processors, making our Namespace, Action and Menu item, and working with ExtJS to create the UI.

## First Setup Steps

We've got our snippet and our basic directory structure. Now we need to setup a few things before we can start developing our Custom Manager Page. The first is our Namespace.

### Namespaces

[Namespaces](developing-in-modx/advanced-development/namespaces "Namespaces") in MODX Revolution are basically silos of development in the system. They load the base path for your CMP, and allow MODX to know where to grab the files for it and for Lexicon files (i18n). They allow you to develop and run your Extras without having to modify core MODX files or get in the way of Git/SVN deployments of MODX.

We'll want to create ours. Go ahead and click on the Namespaces submenu item in the System menu:

![](/download/attachments/37683304/namespaces-menu.png?version=1&modificationDate=1325795553000)

From there, go ahead and click the 'Create New' button above the grid to load a Create Namespace window. Input these values into the form:

- **Name** - doodles
- **Path** - /www/doodles/core/components/doodles/

Let's explain. This gives us a Namespace key of 'doodles', which we can reference our Namespace with. Secondly, we're pointing the path to our doodles core directory that we've been developing in. This tells MODX to load the controller files that load the CMP (more on that in a sec) from that directory, which is what we want. When someone else installs this component later, their Namespace path will look like:

> {core\_path}components/doodles/

Because that's where we'll be installing the files with the Transport Package. However, setting it to an absolute path in our environment allows us to develop it outside of the MODX webroot.

### Actions and Menus

Next, we'll need to create our Actions and Menus for the CMP. What is an "Action" in MODX? Well, it's basically an abstract representation of a Manager page. Each MODX manager page has an Action in the modx\_actions table, which can be referenced. This allows you to create any number of "Actions" that can be used as CMPs in the manager.

Load up the Actions page on System -> Actions. This should load 2 trees:

![](/download/attachments/37683304/doodles-actions.png?version=1&modificationDate=1325795553000)

We'll be first focused on the left-hand tree, which is the tree of Actions. The first level of the tree is all our Namespaces, which show as little computer icons. Below that are all the Actions for that Namespace. Our 'doodles' Namespace shows up there, but it's empty and has no Actions inside it. Let's remedy that. Right-click on the 'doodles' Namespace icon, and click 'Create Action Here'.

That should load a window, in which we'll want to input these values:

- **Controller** - controllers/index
- **Namespace** - doodles
- **Parent Controller** - _(leave blank)_
- **Load Headers** - _checked_
- **Language Topics** - doodles:default
- **Assets** - _(leave blank)_

Let's explain what each of these fields mean.

**Controller**: This tells MODX where the controller file is at for this Action, relative to the Namespace path, without the .php extension. Our file is going to be at /www/doodles/core/components/doodles/controllers/index.php. So, minus our Namespace path, that ends up being controllers/index.php. We drop the .php, and we get "controllers/index".

**Namespace**: The reference to the Namespace this Action is a part of. This should have automatically been filled in for you.

**Parent Controller**: For hierarchical display, Actions can be structured in tree form. This doesn't affect their behavior at all, and doesn't really concern us, so we'll skip it and leave it blank.

**Load Headers**: This tells MODX whether or not to load the contents of the controller in the manager's header and footer template, or if not checked, to only load the contents of the file and nothing else. This can be useful to uncheck if you want to create a CMP that runs isolated of the manager interface but is accessible via a menu. We want to leave it checked.

**Language Topics**: MODX will automatically load any Lexicon Topics (language files) that are listed here, in comma-separated format. We want to load a custom topic, called 'default', from our Doodles namespace. So we set it as 'doodles:default', which tells MODX to load the 'default' topic from the 'doodles' Namespace. We'll create this file later.

**Assets** - This field is currently not used in MODX Revolution, so we'll skip it.

Great, we've now got ourselves an Action. Now we need to tie that Action to a Menu item, which will show up in our main menu at the top of the manager. 'Menu' objects in MODX allow you to completely rearrange (and hide) menu items in the manager interface, enabling you to completely customize navigation for your MODX installation.

We're going to want to create our Doodles menu item under the 'Components' menu, which is where 3rd Party Extras usually go. We could place it anywhere, but for standards-sake, let's place it under Components. Right-click on the 'Components' tree node in the right-hand tree, and click 'Place Action Here'. That will load a window, which we can fill with these values:

- **Lexicon Key** - doodles
- **Description** - doodles.desc
- **Action** - doodles - controllers/index
- **Icon** -
- **Parameters** -
- **Handler** -
- **Permissions** -

And let's explain each field:

**Lexicon Key**: This is the lexicon key for the menu item. Since MODX allows you to view the manager in a multiple number of languages, MODX provides us the option to load a Lexicon string (in our lexicon topic we said to load for the action earlier, _doodles:default_) to translate this with. We'll put _doodles_ and provide that as a Lexicon string later.

**Description**: Similar to the first field, this allows us to provide either a straight up description, or a lexicon key to be translated. We'll provide a lexicon key, because we want that to be translated.

**Action** - This tells MODX what action to load when the Menu item is clicked.

**Icon** - Currently not used in the default manager interface, this allows menu items to have an icon. We'll skip it.

**Parameters** - This allows you to attach GET parameters to the menu item when clicked. We don't need this, so we'll skip it.

**Handler** - This allows you to run JavaScript instead of loading a page when running a menu item. It's useful for menu items that don't actually load a page but do things, such as the "Clear Cache" menu item under the Site menu. We'll skip this.

**Permissions** - Here you can specify a MODX Permission that MODX will check to see if the user has when loading the menu. If the user doesn't have this Permission, this menu item won't load. We don't want to restrict our CMP, so we'll leave this blank.

Great! We've got an Action and Menu now. Let's go ahead and create our default Lexicon Topic.

### Lexicons

[Lexicons](developing-in-modx/advanced-development/internationalization "Internationalization") in MODX Revolution allow you to provide MODX with translations for your Extra (and anything, really) in any language. We want our Extra to be i18n-compatible, so we want to utilize this feature. Each string (also called an Entry) has its own key, such as 'doodles.desc' shown above. The common practice for Lexicon keys for Extras is to prefix them with the Namespace path and a dot. This prevents collisions with other Extras.

Lexicon strings are collected in files called 'Lexicon Topics'. This means your strings can be isolated by a specific area (similar to how the core/lexicon/ directory does it), and makes it so you don't have to load _all_ the strings for your Extra when you may only want to load a few.

If you wanted to use your Lexicons in a Snippet, you could use $modx->lexicon->load('doodles:default'). This would load the 'default' topic from the 'doodles' Namespace. For CMPs, however, this is a little different; you load it in the Action via the 'Language Topics' field we filled out earlier. This loads the topic in our page so we can easily access it.

But we haven't actually _made_ that Lexicon Topic file, so let's go do this now. Lexicons on the filesystem are structured thus:

> {namespace\_path}/lexicon/{language}/{topic}.inc.php

So we'll go ahead and create our file here: /www/doodles/core/components/doodles/lexicon/en/default.inc.php and fill it with this:

``` php 
<?php
$_lang['doodle'] = 'Doodle';
$_lang['doodles'] = 'Doodles';
$_lang['doodles.desc'] = 'Manage your doodles here.';
$_lang['doodles.description'] = 'Description';
$_lang['doodles.doodle_err_ae'] = 'A doodle with that name already exists.';
$_lang['doodles.doodle_err_nf'] = 'Doodle not found.';
$_lang['doodles.doodle_err_ns'] = 'Doodle not specified.';
$_lang['doodles.doodle_err_ns_name'] = 'Please specify a name for the doodle.';
$_lang['doodles.doodle_err_remove'] = 'An error occurred while trying to remove the doodle.';
$_lang['doodles.doodle_err_save'] = 'An error occurred while trying to save the doodle.';
$_lang['doodles.doodle_create'] = 'Create New Doodle';
$_lang['doodles.doodle_remove'] = 'Remove Doodle';
$_lang['doodles.doodle_remove_confirm'] = 'Are you sure you want to remove this doodle?';
$_lang['doodles.doodle_update'] = 'Update Doodle';
$_lang['doodles.downloads'] = 'Downloads';
$_lang['doodles.location'] = 'Location';
$_lang['doodles.management'] = 'Doodles Management';
$_lang['doodles.management_desc'] = 'Manage your doodles here. You can edit them by either double-clicking on the grid or right-clicking on the respective row.';
$_lang['doodles.name'] = 'Name';
$_lang['doodles.search...'] = 'Search...';
$_lang['doodles.top_downloaded'] = 'Top Downloaded Doodles';
```

There's quite a few strings in there! We'll use them, don't worry. Note that all we're doing is filling a PHP array called $\_lang. That's it; MODX will do the rest.

You can also see our 'doodles' and 'doodles.desc' strings we referenced earlier in here.

Great! We're all setup to start developing our CMP.

## Setting up the Controllers with MODExt

CMPs in MODX are generated with [ExtJS](http://sencha.com/), a JavaScript framework by Sencha that allows for rapid and powerful UI development. MODX adds functionality to a few of the ExtJS tools (and calls them MODExt). We're going to use those tools in our CMP. This tutorial is not meant to teach you ExtJS, as there are plenty of tutorials on that on the web, and on the [Sencha main site](http://sencha.com/). But we will go over how to use them to create a neat grid that can do CRUD actions.

We're going to need to setup some basic controllers first before we can proceed with development.

### The Base Controller

Let's create our controller at: /www/doodles/core/components/doodles/controllers/index.php. And put this in it:

``` php 
return 'Test.'
```

That should return something like this:

![](/download/attachments/37683304/cmp-test.png?version=1&modificationDate=1325795553000)

Alright! We've got our own CMP working! Now, you could just output forms and code here, and do all your stuff in this index.php file. You don't have to use ExtJS, or any of the other functions. But, MODX provides it, and it's pretty darn powerful, and it would make your CMP be all shiny. So why not?

### Custom Request Routing

Now that we know that it works, let's up the complexity a bit to make our CMP a bit more flexible. What if we wanted to have multiple pages in our CMP? Well, we _could_ use Actions, or we could create a custom request handler to redirect to the page we want (which is what we're going to do) while still using our main Action. This allows us to do all our development and URL mapping from within our single Action. Replace the controllers/index.php file with this:

``` php 
<?php
require_once dirname(dirname(__FILE__)).'/model/doodles/doodles.class.php';
$doodles = new Doodles($modx);
return $doodles->initialize('mgr');
```

That's it. Note how we're loading our Doodles class that we loaded in Part I of this tutorial. See, told you it'd come in handy! Next, we are running the ->initialize('mgr') method on it...wait, we never created that method! Let's do so now. Go into doodles.class.php and add this method:

``` php 
public function initialize($ctx = 'web') {
   switch ($ctx) {
        case 'mgr':
            $this->modx->lexicon->load('doodles:default');
            if (!$this->modx->loadClass('doodlesControllerRequest',$this->config['modelPath'].'doodles/request/',true,true)) {
               return 'Could not load controller request handler.';
            }
            $this->request = new doodlesControllerRequest($this);
            return $this->request->handleRequest();
        break;
    }
    return true;
}
```

Okay, so we're using this method to initialize the mgr context for our Doodles CMP. We tell it to load our default Doodles Lexicon Topic, and then to load another class (via our custom paths) and run the ->handleRequest method on it. But we haven't made that class yet! Let's do so. In this method, note how we're loading the class name in the first parameter of the loadClass call, and then the 2nd is the path, which translates into: /www/doodles/core/components/doodles/model/doodles/request/. So we'll create our file here:

> /www/doodles/core/components/doodles/model/doodles/request/doodlescontrollerrequest.class.php

And we'll fill it with this:

``` php 
<?php
require_once MODX_CORE_PATH . 'model/modx/modrequest.class.php';
class doodlesControllerRequest extends modRequest {
    public $doodles = null;
    public $actionVar = 'action';
    public $defaultAction = 'index';

    function __construct(Doodles &$doodles) {
        parent :: __construct($doodles->modx);
        $this->doodles =& $doodles;
    }

    public function handleRequest() {
        $this->loadErrorHandler();

        /* save page to manager object. allow custom actionVar choice for extending classes. */
        $this->action = isset($_REQUEST[$this->actionVar]) ? $_REQUEST[$this->actionVar] : $this->defaultAction;

        $modx =& $this->modx;
        $doodles =& $this->doodles;
        $viewHeader = include $this->doodles->config['corePath'].'controllers/mgr/header.php';

        $f = $this->doodles->config['corePath'].'controllers/mgr/'.$this->action.'.php';
        if (file_exists($f)) {
            $viewOutput = include $f;
        } else {
            $viewOutput = 'Controller not found: '.$f;
        }

        return $viewHeader.$viewOutput;
    }
}
```

Okay. So note how we're including the MODX request handler class, modRequest, and extending it with this class. The modRequest class does all of our sanitization, error class loading, and other stuff for us. We're going to override the handleRequest method in this, though, and tell it to load the MODX Error Handler class, and then add an 'action' parameter. MODX loads its Actions via the ?a= param; we're going to load our internal controller files in that Action we created earlier via the ?action= parameter. Think of our custom ones as like a 'sub-action', so to speak.

We also at the beginning of the class define which action with load first, with the 'defaultAction' class var. This is important, as it tells our class which file to load when someone clicks the Menu item we made earlier.

Next, we make references to the MODX object, and the Doodles object, so our controllers can use them. Then, we'll load a "mgr/header.php" controller, which we'll be creating shortly - this will have all of our Doodles-CMP-shared code in it. And finally, we'll load the current active controller, and return it. Cool!

You don't have to use a custom request router. You could just load the contents of mgr/header.php and mgr/index.php (discussed later) in the controllers/index.php file and be done with it. Custom request routing as described here, though, allows you to have multiple pages for your CMP - which might be useful.

### The Header Controller

So now we need to create our header controller, which has all the base Doodles CMP stuff in it. Let's add a file here: /www/doodles/core/components/doodles/controllers/mgr/header.php and put this in it:

``` php 
<?php
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/doodles.js');
$modx->regClientStartupHTMLBlock('<script type="text/javascript">
Ext.onReady(function() {
    Doodles.config = '.$modx->toJSON($doodles->config).';
});
</script>');
return '';
```

So this header basically loads a common JS file, _mgr/doodles.js_, in our JS directory. Then it runs a JS method when ExtJS has loaded that loads the config vars for our $doodles->config in the 'Doodles.config' JS object (which we'll use for paths and such). In our doodles.js file (which is found at /www/doodles/assets/components/doodles/js/mgr/doodles.js), we have this:

``` php 
var Doodles = function(config) {
    config = config || {};
    Doodles.superclass.constructor.call(this,config);
};
Ext.extend(Doodles,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('doodles',Doodles);
Doodles = new Doodles();
```

So, basically, we're loading a Doodles object which extends the Ext.Component class. This also gives us a nice JavaScript namespace of 'Doodles'. We're done with the header stuff. Let's start on our initial page.

## Our Doodles CMP Page

Create a file at /www/doodles/core/components/doodles/controllers/mgr/index.php (remember in our defaultAction var, 'index' was it?) and fill it with this:

``` php 
<?php
//$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/widgets/doodles.grid.js');
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/widgets/home.panel.js');
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/sections/index.js');

return '<div id="doodles-panel-home-div"></div>';
```

Great! So we're doing a couple things here. We're loading a few 'widgets', and then loading a 'section'. These terms are arbitrary, but we're using them here in the same way MODX uses them in MODExt to render the manager interface. Basically, a "widget" is something like a grid of objects (such as Doodles), or a tree, or a specialized panel. Putting them in separate files allows you to use them in different pages without having to duplicate code. A "section" is a piece of JS that actually _loads_ the widgets onto a page. Including a widget won't load and render it - a section will render it.

We're going to load first the doodles.grid.js, which is a widget that displays a grid of Doodles. Secondly, we load the 'home' panel, which is our home page's main panel, that the grid will reside in. And finally, we load the 'index' section, which renders the UI.

We're going to leave the grid commented out for now, but we'll come back to it. Promise.

We could have put all these JS files in one file, which would have loaded the page faster. For illustration purposes, we put them in 3 separate files, to make explaining this tutorial easier. Feel free to do whatever you want when developing your CMP.

### The Section JS File

Let's first create the index.js file, at /www/doodles/assets/components/doodles/js/mgr/sections/index.js:

``` js 
Ext.onReady(function() {
    MODx.load({ xtype: 'doodles-page-home'});
});

Doodles.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'doodles-panel-home'
            ,renderTo: 'doodles-panel-home-div'
        }]
    });
    Doodles.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.page.Home,MODx.Component);
Ext.reg('doodles-page-home',Doodles.page.Home);
```

Okay, let's explain. The first thing that happens is that we tell ExtJS, when the page is nice and loaded, "load" the component (or widget/object/panel) with 'xtype' _doodles-page-home_. How ExtJS works is that it allows you to define components with an 'xtype', which is kind of like a unique identifier for a panel, tree, etc. Think of it like an ID for a class. MODx.load simply instantiates that object.

Below that, we actually define the 'doodles-page-home' object, and make it extend MODx.Component. MODx.Component is basically an abstracted JS class that renders a page in the MODX manager interface. It provides a few helper methods that make quick generation of MODX pages smoother. All we have to pass into it is the components we want to load; currently, in this case, the 'doodles-panel-home' component (which we haven't defined yet; it'll be in the home.panel.js file mentioned earlier). We also want it to render to the DOM ID of 'doodles-panel-home-div', which, as you might remember, was the "div" we returned earlier in our mgr/index.php controller.

Finally, we register this page to the 'doodles-page-home' xtype, which we are referencing in the MODx.load call earlier.

Great! On to the panel.

### The Panel JS File

We've got our page, but now we want to load a panel in it. Let's create a file at www/doodles/assets/components/doodles/js/mgr/widgets/home.panel.js and put this in it:

``` js 
Doodles.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,items: [{
            html: '<h2>'+_('doodles.management')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,bodyStyle: 'padding: 10px'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,items: [{
                title: _('doodles')
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<p>'+_('doodles.management_desc')+'</p><br />'
                    ,border: false
                }]
            }]
        }]
    });
    Doodles.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.panel.Home,MODx.Panel);
Ext.reg('doodles-panel-home',Doodles.panel.Home);
```

So, first, at the bottom, note how we're registering this panel to 'doodles-panel-home', which we referenced in our section. Also note that this panel extends MODx.Panel, which in turn extends Ext.Panel. Why not just extend Ext.Panel? Well, extending MODx.Panel does the same, and adds a CSS class to the panel to give it the nice manager MODX styling.

We're going to give this panel a baseCls of 'modx-formpanel', which lets our top part have a transparent background. Then, we'll make sure it doesn't have a border.

Next, we'll define the 'items' in the panel. First, we add a header:

``` js 
{
   html: '<h2>'+_('doodles.management')+'</h2>'
   ,border: false
   ,cls: 'modx-page-header'
}
```

Basically this just inserts some HTML into the top of the panel with a class of 'modx-page-header', and puts a nice h2 tag up there. Note the \_() method. This is MODX's way of doing i18n (Lexicons) in the manager JS. This tells MODX to translate this key. If you remember, we defined the 'doodles.management' string earlier with: "Doodles Management". So this will render the translation of this key in the h2 tag.

Next, we'll add a TabPanel. We could just load the panel straight without tabs, but what if down the line we wanted to add another tab? Let's define it:

``` js 
,{
   xtype: 'modx-tabs'
   ,bodyStyle: 'padding: 10px'
   ,defaults: { border: false ,autoHeight: true }
   ,border: true
   ,items: /* ... */
}
```

Note we load our tabpanel with the xtype 'modx-tabs'. This loads a MODX-specific tabpanel, which has some MODX-specific configuration options. Then we give it some padding, a border, and make sure the defaults for its tabs have no border and an automatic height. Then, we add the tab itself:

``` js 
{
   title: _('doodles')
   ,defaults: { autoHeight: true }
   ,items: [{
      html: '<p>'+_('doodles.management_desc')+'</p><br />'
      ,border: false
   }]
}
```

Okay, this is going to load our first tab with a tab title translated to 'Doodles'. Then, we'll put some stuff in the tab (which is an Ext.Panel, by the way). We'll first put a nice little description with our "doodles.management\_desc" lexicon string.

Let's load the page and take a look now.

![](/download/attachments/37683304/doodles-panel1.png?version=1&modificationDate=1325795553000)

Cool! We've got a MODX-styled panel going. Unfortunately, it's pretty useless. We need to add a grid to manage our Doodles. Let's go ahead and do that now.

## The Doodles Grid

First off, go ahead and uncomment this line in your mgr/index.php controller:

``` php 
$modx->regClientStartupScript($doodles->config['jsUrl'].'mgr/widgets/doodles.grid.js');
```

This tells MODX to load the grid widget file, which we'll now create at /www/doodles/assets/components/doodles/js/mgr/widgets/doodles.grid.js:

``` js 
Doodles.grid.Doodles = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'doodles-grid-doodles'
        ,url: Doodles.config.connectorUrl
        ,baseParams: { action: 'mgr/doodle/getList' }
        ,fields: ['id','name','description','menu']
        ,paging: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'name'
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,sortable: true
            ,width: 60
        },{
            header: _('doodles.name')
            ,dataIndex: 'name'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('doodles.description')
            ,dataIndex: 'description'
            ,sortable: false
            ,width: 350
            ,editor: { xtype: 'textfield' }
        }]
    });
    Doodles.grid.Doodles.superclass.constructor.call(this,config)
};
Ext.extend(Doodles.grid.Doodles,MODx.grid.Grid);
Ext.reg('doodles-grid-doodles',Doodles.grid.Doodles);
```

Whew, a lot in there! Let's start off with the configuration parameters we're setting.

- **id**: We give this panel an ID of 'doodles-grid-doodles'.
- **url**: We point it to the connector file at Doodles.config.connectorUrl (we'll get to connectors here in a second).
- **baseParams**: We setup it's base parameters to send when getting records for the grid via REQUEST with a key of 'action' and a value of 'mgr/doodle/getList'. More on this in a second.
- **fields**: We setup the fields we'll get from the AJAX request to populate the grid. Basically, these are the fields of our Doodle.
- **paging**: We want pagination for our grid, so MODExt handles all of this just by setting 'paging: true' here.
- **remoteSort**: We set this to true, and Ext will allow our grid columns to be sortable.
- **anchor**: We want this grid to stretch the panel width, so we set it to 97% (3% less to account for padding).
- **autoExpandColumn**: We want to stretch the 'name' column to dynamically be the biggest column on the grid.

Then, we define some columns for our grid. We also allow 'name' and 'description' to be editable by attaching an editor to each column. More on this later. Note how the 'dataIndex' parameter matches the name of the Doodles field we want to display.

Finally, let's add the grid to our panel. Change this part in our Doodles.panel.Home:

``` js 
,items: [{
   html: '<p>'+_('doodles.management_desc')+'</p><br />'
   ,border: false
}]
```

to this:

``` js 
[{
   html: '<p>'+_('doodles.management_desc')+'</p><br />'
   ,border: false
},{
   xtype: 'doodles-grid-doodles'
   ,preventRender: true
}]
```

That loads our grid right below the message we posted earlier in our panel. The preventRender attribute tells Ext not to render the grid until the rest of the panel loads.

If you tried to load the page now, the grid would show, but not load any data - we haven't made our Connector yet, and so the grid doesn't have anywhere to fetch its data. Let's do that.

### Hooking Up via Connectors

What is a Connector in MODX? A Connector is, technically, a file that 'connects' to the model layer of MODX, or the Processors. Processors are form-layer files that run DB queries and other things that modify the model and/or database.

In laymen's terms, Processors are where you will do all your database modifying. Connectors are a 'gateway' to them. They restrict access, check access permissions, and 'route' requests to the appropriate processor. They also limit the access points to your model, further securing your app. Think of your model as a fortress, your DB as the palace in the center, the processors the roads in that fortress, and connectors as the gates in the walls around your fortress. You want those gates to be secure, and limited in number.

Back to our Extra. Our ExtJS grid needs to load its data for its rows via AJAX by our connector. But we need to **create** our connector first. Let's make it at /www/doodles/assets/components/doodles/connector.php:

``` php 
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('doodles.core_path',null,$modx->getOption('core_path').'components/doodles/');
require_once $corePath.'model/doodles/doodles.class.php';
$modx->doodles = new Doodles($modx);

$modx->lexicon->load('doodles:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->doodles->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));
```

That's it. We first load the config.core.php file. We'll go ahead and add it here in our development environment; in standard MODX installs, this will already exist.

Create a file at /www/doodles/config.core.php and put this in it:

``` php 
<?php
define('MODX_CORE_PATH', '/www/modx/core/');
define('MODX_CONFIG_KEY', 'config');
```

Obviously, you'll need to change those values to your MODx installation paths. And if you're using SVN or Git for your Extra, you'll want to add those to your ignore file (ie, .gitignore), since you don't want those in your source repository.

Next in our connector, we load the config file, and the MODX connectors/index.php file.

Then, we load our Doodles class (with our magic system settings!), which will add our xPDO custom Doodles model into MODX, and then load our default doodles Lexicon Topic. Finally, we 'handle' the request using our custom Processors path we defined in our Doodles class, and tell MODX to load the processors.

This file will do nothing on its own when access. Loading it directly will give you this:

> {"success":false,"message":"Access denied.","total":0,"data":\[\],"object":\[\]}

There's a few reasons for this. One is that the connectors are locked down and don't allow anyone without a MODX manager session to access them. Secondly, all requests to connectors **must** pass a unique-to-your-site authorization key that prevents CRSF attacks. It can either be passed in the HTTP headers as 'modAuth', or in a REQUEST var as HTTP\_MODAUTH. The value will be $modx->siteId, which is set on a new install, and loaded when MODX is loaded.

Don't ever paste or share with anyone your $modx->siteId or HTTP\_MODAUTH key. It keeps your site secure.

The great thing, though, is you won't have to worry about this. MODX already handles this in MODExt - all HTTP requests made by ExtJS in MODX pass this variable in via their HTTP headers.

The second reason loading the connector file directly wont work is that we didn't specify a routing path - remember baseParams in the grid? Remember how we set the 'action' param in it to 'mgr/doodle/getList'? That's our routing path. That tells the connector to load the file at:

> /www/doodles/core/components/doodles/processors/mgr/doodle/getlist.php

So let's go ahead and make that file to give our grid some data:

``` php 
<?php
$isLimit = !empty($scriptProperties['limit']);
$start = $modx->getOption('start',$scriptProperties,0);
$limit = $modx->getOption('limit',$scriptProperties,10);
$sort = $modx->getOption('sort',$scriptProperties,'name');
$dir = $modx->getOption('dir',$scriptProperties,'ASC');

/* build query */
$c = $modx->newQuery('Doodle');
$count = $modx->getCount('Doodle',$c);
$c->sortby($sort,$dir);
if ($isLimit) $c->limit($limit,$start);
$doodles = $modx->getIterator('Doodle', $c);

/* iterate */
$list = array();
foreach ($doodles as $doodle) {
    $doodleArray = $doodle->toArray();
    $list[]= $doodleArray;
}
return $this->outputArray($list,$count);
```

Great. So a few things. You'll note the $modx object, and an array called $scriptProperties, is already available. What is $scriptProperties? Well here it's a sanitized array of REQUEST vars - anything passed in goes in that array. So you'll notice we're setting up some default parameters to handle sorting and pagination at the beginning.

Then, we're creating a new [xPDOQuery](xpdo/class-reference/xpdoquery "xPDOQuery") object to do sorting and pagination on the query with our passed-in parameters. We grab a collection of Doodle objects then with $modx->getIterator. $modx->getIterator is the same as $modx->getCollection, with one big caveat; it only loads objects as they are requested - so it's faster than getCollection when just looping over a collection of objects like we're doing here.

Finally, we use a foreach loop to loop over our data, store an associative array of their fields and values using ->toArray, and then run a special-to-processors method called 'outputArray'. This method returns a JSON array of data, with 2 parameters - the first being the array of data, and the second being the total number of objects. We are passing in a $count var here, because if we had more than 10 Doodles, we'd want to get the total number (as we're only returning 10 by default).

That's it. Now let's load up our grid:

![](/download/attachments/37683304/doodles-grid1.png?version=1&modificationDate=1325795553000)

Great! We've got a working grid. Now, let's add some functionality to it, since right now all it does is list Doodles.

### Adding Search

Add this bit of code to your grid panel, right after the columns: definition:

``` js 
,tbar:[{
    xtype: 'textfield'
    ,id: 'doodles-search-filter'
    ,emptyText: _('doodles.search...')
    ,listeners: {
        'change': {fn:this.search,scope:this}
        ,'render': {fn: function(cmp) {
            new Ext.KeyMap(cmp.getEl(), {
                key: Ext.EventObject.ENTER
                ,fn: function() {
                    this.fireEvent('change',this);
                    this.blur();
                    return true;
                }
                ,scope: cmp
            });
        },scope:this}
    }
}]
```

We just added a textfield to the top bar of our grid, and we gave it some 'emptyText', meaning that when empty, display this text. Also, we gave it a DOM ID of 'doodles-search-filter', and told it to run the 'this.search' method when it changes. Also, the code in the 'render' listener means to fire the change event when someone hits ENTER on their keyboard when editing it.

So let's define the 'this.search' method - since our Panel is OOP, this means that this.search can be defined in our grid object. To do that, find this code:

``` js 
Ext.extend(Doodles.grid.Doodles,MODx.grid.Grid);
```

And replace it with this:

``` js 
Ext.extend(Doodles.grid.Doodles,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
```

What we're telling it to do here is to extend the MODx.grid.Grid class, and then add another method called 'search'. In that method, we're getting the grid's "Store", which is where the data for the grid is stored and what determines where the data comes from. Then, we are adding a 'query' parameter to our baseParams (remember that earlier?), changing the current page of the grid back to 1, and refreshing it.

This will pass a 'query' REQUEST parameter to our getList processor. Since we're not doing anything to handle that yet, let's go open it up. Right below our $dir = $modx->getOption line, add this:

``` php 
$query = $modx->getOption('query',$scriptProperties,'');
```

And right below our $modx->newQuery('Doodle') call, add this:

``` php 
if (!empty($query)) {
    $c->where(array(
        'name:LIKE' => '%'.$query.'%',
        'OR:description:LIKE' => '%'.$query.'%',
    ));
}
```

Note the first part sets the default query. The 2nd bit adds a WHERE statement to our SQL query if the search value isn't empty, and checks to see if the value of any of our DB entries contain the value of our search. Now load your grid, and you'll get:

![](/download/attachments/37683304/doodles-grid-search.png?version=1&modificationDate=1325795553000)

And there's our searchable grid. Now let's work on updating records.

### Adding an Update Window

First off, MODX grids usually have context menus when you click them. Ours doesn't, and that's because we haven't defined it yet. Let's go ahead and define it. Add a 'getMenu' method to your Doodles.grid.Grid definition, right below your search: method we just added:

``` js 
,getMenu: function() {
    var m = [{
        text: _('doodles.doodle_update')
        ,handler: this.updateDoodle
    },'-',{
        text: _('doodles.doodle_remove')
        ,handler: this.removeDoodle
    }];
    this.addContextMenuItem(m);
    return true;
}
```

MODX looks for a getMenu method on grids that extend it, and if it finds it, it runs it. Here we've added 2 menu items for our context menu, one that runs a this.updateDoodle method, and the other that runs a this.removeDoodle method. We'll get to the removeDoodle method here in a bit. For now, let's add another JS method below the getMenu call, and call it updateDoodle:

``` js 
,updateDoodle: function(btn,e) {
    if (!this.updateDoodleWindow) {
        this.updateDoodleWindow = MODx.load({
            xtype: 'doodles-window-doodle-update'
            ,record: this.menu.record
            ,listeners: {
                'success': {fn:this.refresh,scope:this}
            }
        });
    } else {
        this.updateDoodleWindow.setValues(this.menu.record);
    }
    this.updateDoodleWindow.show(e.target);
}
```

A few things. What this little bit of code does is checks for a class variable named 'updateDoodleWindow'. If it doesn't find it, it creates it. This prevents us from having to have ExtJS create a new window every time (it's faster and better to prevent DOM ID conflicts). Also, it passes in a few values:

- **xtype** - This is obviously our unique xtype for the window, which is 'doodles-window-doodle-update'. We'll get to that soon.
- **record** - MODx.Window objects will automatically fill their fields with whatever is passed into the 'record' configuration param. Also, MODx.grid.Grid objects always have the current row values stored in the 'this.menu.record' object. So we'll just pass that right in to our Window.
- **listeners** - These execute on different events in the window. For now, we just want to refresh the grid (via the 'this.refresh' method for the MODx.grid.Grid) whenever the window succeeds; meaning whenever the window's form successfully submits and returns a 'success' response.

After we create the window, we'll run the show() method on it to show it. The 'e.target' just tells it to animate the opening from wherever the mouse was. If we already had a window object, before that we call setValues on it, which sets the values of the Window's form to the passed in value (similar to the record: param). This allows us to re-use windows.

Now let's actually define the window:

``` js 
Doodles.window.UpdateDoodle = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('doodles.doodle_update')
        ,url: Doodles.config.connectorUrl
        ,baseParams: {
            action: 'mgr/doodle/update'
        }
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('doodles.name')
            ,name: 'name'
            ,width: 300
        },{
            xtype: 'textarea'
            ,fieldLabel: _('doodles.description')
            ,name: 'description'
            ,width: 300
        }]
    });
    Doodles.window.UpdateDoodle.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.window.UpdateDoodle,MODx.Window);
Ext.reg('doodles-window-doodle-update',Doodles.window.UpdateDoodle);
```

Similar to what you've seen in the grids, except this time we have 'fields' as the fields for the Window's form. We've provided some fields to edit - and remember, since this is an "Update" form, we need to provide the ID of the Doodle, passed in as a hidden field.

MODx.Window wraps Ext.Window, but provides a form inside that will automatically try and connect to the url: param with the baseParams: parameters, as well as the fields' values. It also automatically provides OK/Cancel buttons. Right-click on a record in the grid, and your window should look like this now:

![](/download/attachments/37683304/doodles-window-update.png?version=1&modificationDate=1325795553000)

Excellent! We've got a nice little update window. Now as you probably noticed in our baseParams, we're looking now for the 'mgr/doodle/update' processor. So let's create a file at: /www/doodles/core/components/doodles/processors/mgr/doodle/update.php:

``` php 
<?php
/* get Doodle */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('doodles.doodle_err_ns'));
$doodle = $modx->getObject('Doodle',$scriptProperties['id']);
if (empty($doodle)) return $modx->error->failure($modx->lexicon('doodles.doodle_err_nf'));

/* set Doodle fields */
$doodle->fromArray($scriptProperties);

/* save Doodle */
if ($doodle->save() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_save'));
}

return $modx->error->success('',$doodle);
```

Here we're grabbing the Doodle object by its passed ID. If we don't find it, we'll run a 'failure' method on the $modx->error object. This method basically just passes back a failure message to our form, with the message of the first parameter.

If we find it, however, we'll set its fields with $doodle->fromArray from the $scriptProperties parameter (which, remember, contains all the fields in the form). Then, we'll save it. Finally, we'll return a success response, with the 2nd parameter being our updated Doodle (this will allow us to reference it from the JS if we want). Now we have a working Update form!

### Adding a Remove Context Menu Option

Let's finish off the remove part of our UI. We've already got the context menu showing up, so we just need to add the JS method and the processor. After our updateDoodle method in our JS grid, add this:

``` js 
,removeDoodle: function() {
    MODx.msg.confirm({
        title: _('doodles.doodle_remove')
        ,text: _('doodles.doodle_remove_confirm')
        ,url: this.config.url
        ,params: {
            action: 'mgr/doodle/remove'
            ,id: this.menu.record.id
        }
        ,listeners: {
            'success': {fn:this.refresh,scope:this}
        }
    });
}
```

MODx.msg.confirm pops up a confirmation dialog, and if confirmed, runs a processor via a connector. Let's take a look at each parameter:

- **title** - This is the title of the confirmation dialog.
- **text** - The text of the dialog. Here it basically asks if we really want to remove a Doodle.
- **url** - The URL to the connector.
- **params** - Any REQUEST parameters to send to the processor. We're going to send the processor path, and the ID of the Doodle to remove.
- **listeners** - Similar to our update form's listeners, whenever this succeeds, refresh the grid.

Now let's create our remove processor at /www/doodles/core/components/doodles/processors/mgr/doodle/remove.php:

``` php 
<?php
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('doodles.doodle_err_ns'));
$doodle = $modx->getObject('Doodle',$scriptProperties['id']);
if (empty($doodle)) return $modx->error->failure($modx->lexicon('doodles.doodle_err_nf'));

if ($doodle->remove() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_remove'));
}

return $modx->error->success('',$doodle);
```

Pretty similar to the update processor, except this time, we run $doodle->remove, which deletes the Doodle from the database. That's it! We can now remove Doodles.

### Creating the Create Form

So we've got R, U and D of our CRUD interface. What about C? Let's work on a create form. Let's add a button to the top toolbar of the grid to load the create window. Add this to the tbar: property on the grid config, right after our search textfield:

``` js 
,{
   text: _('doodles.doodle_create')
   ,handler: { xtype: 'doodles-window-doodle-create' ,blankValues: true }
}
```

MODExt allows you to pass JSON objects into the handler: method on toolbars. What this does is loads the Window with the xtype 'doodles-window-doodle-create', makes sure its values are blanked on load, and runs this.success on a successful window form submit (basically shortcuts the stuff we've been doing). That's what we want, so let's now define the window at the end of our file:

``` js 
Doodles.window.CreateDoodle = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('doodles.doodle_create')
        ,url: Doodles.config.connectorUrl
        ,baseParams: {
            action: 'mgr/doodle/create'
        }
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('doodles.name')
            ,name: 'name'
            ,width: 300
        },{
            xtype: 'textarea'
            ,fieldLabel: _('doodles.description')
            ,name: 'description'
            ,width: 300
        }]
    });
    Doodles.window.CreateDoodle.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.window.CreateDoodle,MODx.Window);
Ext.reg('doodles-window-doodle-create',Doodles.window.CreateDoodle);
```

This is **very** similar to our Update window, except this one doesn't have an ID field, and passes 'create' as the processor. So, on to the processor at: /www/doodles/core/components/doodles/processors/mgr/doodle/create.php:

``` php 
<?php
if (empty($scriptProperties['name'])) {
    $modx->error->addField('name',$modx->lexicon('doodles.doodle_err_ns_name'));
} else {
    $alreadyExists = $modx->getObject('Doodle',array('name' => $scriptProperties['name']));
    if ($alreadyExists) {
        $modx->error->addField('name',$modx->lexicon('doodles.doodle_err_ae'));
    }
}

if ($modx->error->hasError()) { return $modx->error->failure(); }

$doodle = $modx->newObject('Doodle');
$doodle->fromArray($scriptProperties);

if ($doodle->save() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_save'));
}

return $modx->error->success('',$doodle);
```

Similar to the update and remove methods, again, except we aren't grabbing the object, but rather using newObject to create it. Also, we have a bit of form validation beforehand - we're going to make sure the name isn't blank, and if it is, return a custom error message on that specific field. If it's not blank, then we'll make sure there's no other Doodles with that name. The $modx->error->hasError() method checks to see if any errors have been registered earlier in the processor, and returns true if there were. If there were errors, we'll return a failure message, and we'll get an error message like so:

![](/download/attachments/37683304/doodles-error-no-name.png?version=1&modificationDate=1325795553000)

Pretty neat, huh? Field-specific validation, built right in. And we've got a working create form!

### Adding Inline-Editing

MODExt also has automatic inline editing built right into its grids. Simply add this to your Doodles.grid.Grid config object, right below the 'autoExpandColumn' property:

``` php 
,save_action: 'mgr/doodle/updateFromGrid'
,autosave: true
```

That tells the grid to turn on inline editing and saving; and also to send any saves to the processor at mgr/doodle/updateFromGrid. So let's create it, at: /www/doodles/core/components/doodles/processors/mgr/doodle/updatefromgrid.php:

``` php 
<?php
/* parse JSON */
if (empty($scriptProperties['data'])) return $modx->error->failure('Invalid data.');
$_DATA = $modx->fromJSON($scriptProperties['data']);
if (!is_array($_DATA)) return $modx->error->failure('Invalid data.');

/* get obj */
if (empty($_DATA['id'])) return $modx->error->failure($modx->lexicon('doodles.doodle_err_ns'));
$doodle = $modx->getObject('Doodle',$_DATA['id']);
if (empty($doodle)) return $modx->error->failure($modx->lexicon('doodles.doodle_err_nf'));

$doodle->fromArray($_DATA);

/* save */
if ($doodle->save() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_save'));
}

return $modx->error->success('',$doodle);
```

Note the similarity to our update.php processor, except one thing - we're first processing a param in the $scriptProperties array called "data". This contains a JSON object of our row in the grid, with all the values. We'll just use $modx->fromJSON() to convert it to a nice, readable array, and then use its values in the rest of our processor. Simple, eh?

## Summary

We've got ourselves a nice CRUD user interface now, with creating, updating, removing, searching, pagination, and sorting. And all pretty easily, too.

Next, in Part III, we'll explore [creating a Transport Package](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-iii-modx-2.1-and-earlier "Developing an Extra in MODX Revolution, Part III - MODX 2.1 and Earlier") for our Doodles Extra so that we can distribute it on modxcms.com and via Revolution's Package Management system.

This tutorial is part of a Series:

- [Part I: Getting Started and Creating the Doodles Snippet](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier "Developing an Extra in MODX Revolution - MODX 2.1 and Earlier")
- Part II: Creating our Custom Manager Page
- [Part III: Packaging Our Extra](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-iii-modx-2.1-and-earlier "Developing an Extra in MODX Revolution, Part III - MODX 2.1 and Earlier")