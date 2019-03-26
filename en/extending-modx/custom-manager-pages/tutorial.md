---
title: "Custom Manager Pages in 2.3"
_old_id: "1048"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/custom-manager-pages-in-2.3"
---

- [Setting the Namespace Path](#setting-the-namespace-path)
- [Creating the Menu](#creating-the-menu)
- [Creating the Controller File](#creating-the-controller-file)



 Creating MODX custom manager pages (CMPs) is **far** simpler in MODX Revolution 2.3 - you simply have to set a Namespace path, and then create PHP files. That's it.

## Setting the Namespace Path

 First off, we'll create a Namespace (Settings > Namespaces) called "mycmp", and set its path to "{core\_path}components/mycmp/". Set its Assets Path to "{assets\_path}components/mycmp/" as well.

 ![](/download/attachments/763b342992d3623156aef15b0dd5d168/create-namespace.png)

 **You can avoid some problems if you make your namespace and your action all lowercase with only alphanumeric characters (no spaces, hyphens, or underscores). Your namespace should be a lowercase version of the name of your CMP.**

## Creating the Menu

 Now we'll need a Menu item to link to for our CMP. Go to System -> Top Menu, and create a Menu item under the "Apps" menu item that looks like this:

 ![](/download/attachments/39354402/mycmp1.png?version=1&modificationDate=1334858685000)

 As you can see, we're specifying the Namespace as "mycmp", and then the Action as "welcome". This means our default controller will be the "welcome" controller.

## Creating the Controller File

 Next, we'll go create the Controller file at {core\_path}components/mycmp/controllers/default/welcome.class.php file. Why the "controllers/default/welcome.class.php" path? Well, MODX automatically looks in the "controllers/" directory for your controllers. Secondly, "default" here is the current Manager Theme (so you could make different controllers for different manager themes), so we're creating it in default. And finally, "welcome.class.php" is the name that corresponds to our "welcome" action we put in the menu above. If we had set the Action of the Menu to "home", we would be making a "home.class.php" file instead.

 Now, on to the file contents:

 ``` php 
<?php
class MycmpWelcomeManagerController extends modExtraManagerController {
    public function process(array $scriptProperties = array()) {}
    public function getPageTitle() {
        return 'My Test CMP';
    }
    public function getTemplateFile() {
        return 'welcome.tpl';
    }
}
```

 As you can see here, we're not doing any business logic, so we don't need to do anything in the process() method. We go ahead and set a page title for this CMP, and then tell MODX where to find our corresponding template file for this CMP. Note that your class name should begin with the name of your CMP followed by the corresponding action and that your namespace should be a lowercase version of the name of your CMP.

## Creating the Template File

 MODX uses Smarty templates for CMP pages. It will automatically look for them in the \[namespace-path\]templates/ directory for you, so all you have to do is tell it in your controller what file in that directory to look for (you can specify subdirectories here too). Create a file at: {core\_path}components/mycmp/templates/default/welcome.tpl

 Let's make the content simple:

 ``` html 
<div class="container">
<h2>Welcome!</h2>
</div>
```

 A simple h2, with a wrapping div that adds some padding. And that will display this on our CMP:

 ![](/download/attachments/b0c0afd6ef1b26df1ce35159560bcfa2/2-3-CMP.jpg)

 We're Finished!

 That's it! That's all you need to start making CMPs in MODX 2.3. You can see that our CMP is now accessible via /url/to/modx/manager/?action=welcome&namespace=mycmp - which is much neater than the ID-based actions of 2.2 and earlier.

 There's obviously more API methods that you can override in modExtraManagerController in your PHP controller class, and then you can use [MODExt](extending-modx/custom-manager-pages/modext "MODExt") and such in your actual CMP to make powerful pages, but that's beyond the scope of this tutorial.