---
title: "FC-Resource"
_old_id: "114"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-pages/fc-resource"
note: "You can learn more about form customization in the Customizing the Manager section"
---

## Resource Create/Update

These pages encompass the following Actions:

- resource/update
- resource/create

When using the _resource/create_ Action, constraints will apply to the **parent** resource. So, a constraint of:

- modResource
- parent
- 2

...would apply the rule for all new Resources under the Resource with ID 2.

## Available Fields

| Field                           | Name                  | Containing Panel                   |
| ------------------------------- | --------------------- | ---------------------------------- |
| ID                              | id                    | modx-resource-main-left            |
| Page Title                      | pagetitle             | modx-resource-main-left            |
| Long Title                      | longtitle             | modx-resource-main-left            |
| Description                     | description           | modx-resource-main-left            |
| Introtext                       | introtext             | modx-resource-main-left            |
| Template                        | template              | modx-resource-main-right           |
| Alias                           | alias                 | modx-resource-main-right           |
| Menu Title                      | menutitle             | modx-resource-main-right           |
| Link Attributes                 | link\_attributes      | modx-resource-main-right           |
| Hide from Menus                 | hidemenu              | modx-resource-main-right           |
| Published                       | published             | modx-resource-main-right           |
| Content                         | modx-resource-content | modx-resource-content              |
| Parent                          | parent-cmb            | modx-page-settings-left            |
| Class Key                       | class\_key            | modx-page-settings-left            |
| Content Type                    | content\_type         | modx-page-settings-left            |
| Content Disposition             | content\_dispo        | modx-page-settings-left            |
| Menu Index                      | menuindex             | modx-page-settings-left            |
| Published On                    | publishedon           | modx-page-settings-right           |
| Publish Date                    | pub\_date             | modx-page-settings-right           |
| Un-Publish Date                 | unpub\_date           | modx-page-settings-right           |
| Container                       | isfolder              | modx-page-settings-right-box-left  |
| Searchable                      | searchable            | modx-page-settings-right-box-left  |
| Use current alias in alias path | alias\_visible        | modx-page-settings-right-box-left  |
| Rich Text                       | richtext              | modx-page-settings-right-box-left  |
| Freeze URI                      | uri\_override         | modx-page-settings-right-box-left  |
| URI for Freeze URI              | uri                   | modx-page-settings-right-box-left  |
| Cacheable                       | cacheable             | modx-page-settings-right-box-right |
| Empty Cache                     | syncsite              | modx-page-settings-right-box-right |
| Deleted                         | deleted               | modx-page-settings-right-box-right |

## Available Tabs

These tabs are available for renaming and hiding:

| Tab                | Name (#ID)                       |
| ------------------ | -------------------------------- |
| Document           | modx-resource-settings           |
| Settings           | modx-page-settings               |
| Template Variables | modx-panel-resource-tv           |
| Resource Groups    | modx-resource-access-permissions |

These tabs are available for hiding:

| Tab                                                 | Name (#ID)                         |
| --------------------------------------------------- | ---------------------------------- |
| Document (from "Page Title" to "Introtext")         | modx-resource-main-left            |
| Document (from "Template" to "Published")           | modx-resource-main-right           |
| Settings (from "Parent" to "Menu Index")            | modx-page-settings-left            |
| Settings (from "Published On" to "Un-Publish Date") | modx-page-settings-right           |
| Settings (from "Container" to "Freeze URI")         | modx-page-settings-right-box-left  |
| Settings (from "Cacheable" to "Deleted")            | modx-page-settings-right-box-right |

## Hiding the Content Field

Use these settings:

- **Field**: modx-resource-content
- **Containing Panel**: modx-resource-content
- **Rule**: Field Visible
- **Value**: 0

## TVs

Affecting TVs for a Resource is fairly straightforward - just set the "Name" attribute of the Rule to "tv#", and replace # with the ID of the TV you'd like to affect. You can leave the Containing Panel blank.

TV rules on the Resource panel apply to both create **and** update Actions. You'll only need one rule.
