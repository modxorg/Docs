---
title: "allow_tags_in_post"
description: "If set to true, will allow POST requests to contain HTML form tags."
---

**Name**: Allow Tags in Post  
**Type**: Yes/No  
**Default**: No  

If false, all POST variables will be stripped of HTML script tags, numeric entities, and MODX tags. MODX recommends to leave this set to false for Contexts other than mgr, where it is set to true by default

**Do not** change this value for the manager context. Only use this in a Context if you specifically want to. This can cause problems in a MODX install if you change it without an explicit purpose.