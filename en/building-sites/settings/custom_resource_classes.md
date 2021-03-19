---
title: "custom_resource_classes"
description: "A comma-separated list of custom Resource classes"
---

**Name**: Custom Resource Classes  
**Type**: String  
**Default**:  
**Removed in** 2.2.0

A comma-separated list of custom Resource classes. Specify with `lowercase_lexicon_key:className` (Ex: `wiki_resource:WikiResource`). All custom Resource classes must extend modResource. To specify the controller location for each class, add a setting with `[nameOfClassLowercase]_delegate_path` with the directory path of the create/update php files. Ex: `wikiresource_delegate_path` for a class WikiResource that extends modResource.
