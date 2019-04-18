---
title: Шаг 2 - переопределение методов
_old_id: '71'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-2
---

Этот урок является частью серии:

- [Part I: Creating a Custom Resource Class](extending-modx/custom-resources "Creating a Resource Class")
- Part II: Handling our CRC Behavior
- [Part III: Customizing the Controllers](extending-modx/custom-resources/step-3-controllers "Creating a Resource Class - Step 3")
- [Part IV: Customizing the Processors](extending-modx/custom-resources/step-4-processors "Creating a Resource Class - Step 4")

Теперь, когда у нас есть наш класс, мы хотим добавить к нему дату нашего авторского права. Вперед:

## Переопределение getContent

Go ahead and add this method to your CopyrightedResource class `copyrightedresource.class.php`:

```php
public function getContent(array $options = array()) {
  $content = parent::getContent($options);
  $year = date('Y');
  $content .= '<div class="copyright">© '.$year.'. All Rights Reserved.</div>';
  return $content;
}
```

This will automatically append the Copyright to the bottom of every content for the Resource - not the end of the [Template](building-sites/elements/templates "Templates"), but the end of the contents of the [[*content]] placeholder.

## Следующие шаги

That concludes our additions to our `CopyrightedResource` class. We could do a lot more here by overriding other functions from the parent `modResource` class, but that's beyond the scope of this tutorial.

Here's a list of some of the functions you can override (we'll include the functions we already overrode). See core/model/modx/modresource.class.php for the parent class.

- **getContextMenuText** – displays the text for the right-click on the tree
- **getResourceTypeName** – simple name of the resource type
- **prepareTreeNode** – Allows you to manipulate the tree node for a Resource before it is sent
- **listGroups** – Get a sortable, limitable collection (and total count) of Resource Groups for a given Resource.
- **getTemplateVarCollection** – Retrieve a collection of Template Variables for a Resource.
- **process** – Process a resource, transforming source content to output.
- **getContent** – Gets the raw, unprocessed source content for a resource.
- **setContent** – Set the raw source content for this element.

At this point, you should be able to log into the manager and right-click the file tree and see our new CRC show up as an option to create. When you create a new "Copyrighted Resource", you should note that the URL changes inside the manager. Whereas normally when you create a page, your URL will be something like `<a href="http://yoursite.com/manager/index.php?id=1&a=55&parent=0&context_key=web">http://yoursite.com/manager/index.php?id=1&a=55&parent=0&context_key=web</a>`, now the URL includes the class_key parameter: `<a href="http://yoursite.com/manager/index.php?id=0&a=55&class_key=CopyrightedResource&parent=0&context_key=web">http://yoursite.com/manager/index.php?id=0&a=55&class_key=CopyrightedResource&parent=0&context_key=web</a>`

Однако при попытке добавить новый защищенный авторским правом ресурс вы получите только белый экран! Это нормально - мы еще не создали файлы контроллера.

Now let's make things start working by [making our controller files](extending-modx/custom-resources/step-3-controllers "Creating a Resource Class - Step 3").
