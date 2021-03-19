---
title: "custom_resource_classes"
description: "A comma-separated list of custom Resource classes"
---

**Name**: Custom Resource Classes  
**Type**: String  
**Default**:  
**Removed in** 2.2.0

A comma-separated list of custom Resource classes. Specify with `lowercase\_lexicon\_key:className` (Ex: `wiki\_resource:WikiResource`). All custom Resource classes must extend modResource. To specify the controller location for each class, add a setting with \[nameOfClassLowercase\]\_delegate\_path with the directory path of the create/update php files. Ex: `wikiresource\_delegate\_path` for a class WikiResource that extends modResource.