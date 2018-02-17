---
title: "Creating a Resource Class - Step 3"
_old_id: "72"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-3"
---

This tutorial is part of a Series:

- [Part I: Creating a Custom Resource Class](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class "Creating a Resource Class")
- [Part II: Handling our CRC Behavior](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-2 "Creating a Resource Class - Step 2")
- Part III: Customizing the Controllers
- [Part IV: Customizing the Processors](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-4 "Creating a Resource Class - Step 4")





## Creating the Resource Controllers

Okay, remember how in [Step 1](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class "Creating a Resource Class") we told MODX where our controllers/ directory was, via the "getControllerPath" method? To refresh your memory, here's the code from

```
<pre class="brush: php">
return $modx->getOption('copyrightedresource.core_path',null,$modx->getOption('core_path').'components/copyrightedresource/').'controllers/';

```As you might have guessed, we're going to put two files into the `core/components/copyrightedresource/controllers/` directory. Create the directory if you haven't already and then create a file named **create.class.php**:

```
<pre class="brush: php">
<?php
class CopyrightedResourceCreateManagerController extends ResourceCreateManagerController {
    public function getLanguageTopics() {
        return array('resource','copyrightedresource:default');
    }
}

```Next add **update.class.php**:

```
<pre class="brush: php">
<?php
class CopyrightedResourceUpdateManagerController extends ResourceUpdateManagerController {
    public function getLanguageTopics() {
        return array('resource','copyrightedresource:default');
    }
}

```So when we're done with that, our file structure should look something like this:

![](/download/attachments/36634961/controllers.png?version=1&modificationDate=1360981998000)

And that's all we need to get our custom controllers up and running. You don't even have to include the getLanguageTopics call, but we did so we can load our custom Lexicon for the page. Read that again: you do not need to create the **getLanguageTopics()** function! You do need to create the controllers and create the classes, but you do not need to add any functions to them. If you're confused, remember our hot tip from [Part I](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class "Creating a Resource Class"): any time you extend a PHP class, you should review the parent class that you're extending. In this case, you can take a gander at the parent classes:

- `manager/controllers/default/resource/create.class.php`
- `manager/controllers/default/resource/update.class.php`

In case you need a brush up on your object-oriented programming, any method in the ResourceUpdateManagerController or ResourceCreateManagerController can be overridden - a common one to override is "loadCustomCssJs", which would allow you to add in your own custom CSS/JS and such for your own custom UI for your CRC.

Now you can go to the Resource tree, and create a "Copyrighted Page", and it will load the Resource editing panel. Note, since we didn't override anything in the controller, it will look _exactly_ like the normal Resource editing panel. But, after you create your page and view it in the front-end, you'll note that the copyright is automatically appended:

![](/download/attachments/36634961/fe-view.png?version=1&modificationDate=1322513681000)

Wonderful! This should give you a good understanding of how resources are handled by MODX. You could stop there, but we'll go on a little bit further to describe how to [extend the processors for your CRC](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-4 "Creating a Resource Class - Step 4"). That's where things get more interesting... you can customize the behavior of the manager and control where things get saved in the database, and all sorts of things...