---
title: "custom_resource_classes"
_old_id: "80"
_old_uri: "2.x/administering-your-site/settings/system-settings/custom_resource_classes"
---

## custom\_resource\_classes

**Name**: Custom Resource Classes 
**Type**: String 
**Default**:

A comma-separated list of custom Resource classes. Specify with lowercase\_lexicon\_key:className (Ex: wiki\_resource:WikiResource). All custom Resource classes must extend modResource. To specify the controller location for each class, add a setting with \[nameOfClassLowercase\]\_delegate\_path with the directory path of the create/update php files. Ex: wikiresource\_delegate\_path for a class WikiResource that extends modResource.