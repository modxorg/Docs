---
title: "OnResourceDuplicate"
description: "Fires just after the Resource has been duplicated."
---

## Event: OnResourceDuplicate

Fires just after the Resource has been duplicated.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name              | Description                                                                    |
| ----------------- | ------------------------------------------------------------------------------ |
| newResource       | A reference to the newly created modResource object.                           |
| oldResource       | A reference to the modResource object that was duplicated.                     |
| newName           | The name given to the duplicate.                                               |
| duplicateChildren | Whether child Resources were duplicated as well.                               |
| prefixDuplicate   | Whether a prefix was added to the name of the duplicate.                       |
| publishedMode     | The publish state to give the duplicate: 'preserve', 'publish' or 'unpublish'. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
