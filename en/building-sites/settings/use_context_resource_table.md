---
title: "use_context_resource_table"
description: "When enabled, context refreshes use the context_resource table"
---

 **Name**: Use the context resource table  
**Type**: Yes/No  
**Default**: Yes  
**Available In**: Revolution 2.6.0+

When enabled, context refreshes use the `context_resource` table. This enables you to programmatically have one resource in multiple contexts. If you do not use those multiple resource contexts via the API, you can set this to false. On large sites you will get a potential performance boost in the manager then.