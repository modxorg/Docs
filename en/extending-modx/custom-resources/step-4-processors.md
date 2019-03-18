---
title: "Step 4 - Processors"
_old_id: "73"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-4"
---

 This tutorial is part of a Series:

- [Part I: Creating a Custom Resource Class](extending-modx/custom-resources "Creating a Resource Class")
- [Part II: Handling our CRC Behavior](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-2 "Creating a Resource Class - Step 2")
- [Part III: Customizing the Controllers](developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-3 "Creating a Resource Class - Step 3")
- Part IV: Customizing the Processors

 This is a bit of bonus material to help identify some of the things you can do by extending the default processors.

## Extending the Processors for our CRC

 Extending the Processors for our CopyrightedResource is fairly simple. Load up your **copyrightedresource.class.php** file that contains your main class, and at the top, put this:

 ``` php 
require_once MODX_CORE_PATH.'model/modx/modprocessor.class.php';
require_once MODX_CORE_PATH.'model/modx/processors/resource/create.class.php';
require_once MODX_CORE_PATH.'model/modx/processors/resource/update.class.php';
```

 This tells MODX to load some base classes that we'll need – yes, we're sort of double-dipping here. Because our main class file is on MODX's radar and will be included when MODX loads, we just can require more files from there. At the bottom of the same file, after your CopyrightedResource class, put this:

 ``` php 
class CopyrightedResourceCreateProcessor extends modResourceCreateProcessor {
}
class CopyrightedResourceUpdateProcessor extends modResourceUpdateProcessor {
}
```

 Now we've overridden the processors for our class; MODX will automatically use these classes as the processor class when creating or updating our CRC. We can then override methods to provide custom functionality for our CopyrightedResource class. For example, here is a stub for our CopyrightedResource class and the Update processor that shows some methods that you could override:

 ``` php 
class CopyrightedResourceUpdateProcessor extends modResourceUpdateProcessor {
    /**
     * Do any processing before the fields are set
     * @return boolean
     */
    public function beforeSet() {
        $beforeSet = parent::beforeSet();
        /* force all Copyrighted Page CRCs to be cacheable always */
        $this->setProperty('cacheable',true);
        return $beforeSet;
    }
    /**
     * Do any processing before the save of the Resource but after fields are set.
     * @return boolean
     */
    public function beforeSave() {
        $beforeSave = parent::beforeSave();
        if ($this->object->get('longtitle') == 'Send an Error') {
            $this->addFieldError('longtitle','Specify a different longtitle!');
        }
        /* force CopyrightedResource objects to always be non-folders */
        $this->object->set('isfolder',false);
        return $beforeSave;
    }
    /**
     * Do any custom after save processing
     * @return boolean
     */
    public function afterSave() {
        $afterSave = parent::afterSave();
        $this->modx->log(modX::LOG_LEVEL_DEBUG,'Saving a Copyrighted Page!');
        return $afterSave;
    }
}
```

 These are just trivial examples, but hopefully you get the idea. If you've been paying close attention to our examples on these pages, you may have noticed that we set some properties in the **CopyrightedResource** class (class\_key), and we set others in **CopyrightedResourceUpdateProcessor** (cacheable, isfolder). This may leave you confused as to where you should modify a behavior – in the resource child class? In the controller class? or in the processor?

 If the attribute is something that can be controlled by the GUI, then you'll have to do some customizations in the processors.

## Extra Attributes

 There are some attributes that are not in the **modx\_site\_content** table. See the comments in the **modresource.class.php** file for a list of attributes. You can set them in your resource class via the set method, e.g.:

 ``` php 
$this->set('show_in_tree',false);
$this->set('hide_children_in_tree',true);
```

You can customize the icon used in the MODX resource by creating a System Setting named after your custom resource class: `mgr_tree_icon_ + strtolower($class_key)`. Set its value to CSS class that will be used.

## Conclusion

 And that's about it! There's obviously tons of possibilities with CRCs, and you can really go nuts on the customization that you can apply to them and their processing and rendering logic. Have fun!
