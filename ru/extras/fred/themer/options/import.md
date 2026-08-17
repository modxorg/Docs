---
title: "Импорт partial Option Sets"
description: "Ключ fred-import, полный и частичный импорт настроек"
translation: "extras/fred/themer/options/import"
---

Импорт Option Set выполняется ключом `fred-import` в JSON-объекте импорта.

-   Импортировать можно только partial Option Sets
-   Импорт работает только для Settings
-   Весь объект импорта заменяется содержимым partial Option Set

## Полный импорт

Полный импорт вместо complete Option Set уместен, когда базовый набор опций одинаков для многих Elements, включая Element, который использует только базовые опции. Пример: кнопки call to action во многих Elements, включая Element только с одной CTA-кнопкой.

### Полный импорт Settings для Element только с CTA-кнопкой

```json
{
    "settings": {
        "fred-import": "cta_settings"
    }
}
```

### Partial Option Set `cta_settings`

```json
[
    {
        "name": "cta_class",
        "label": "CTA Class",
        "type": "select",
        "options": {
            "danger": "Red CTA",
            "info": "Blue CTA",
            "default": "Default CTA"
        },
        "value": "default"
    },
    {
        "name": "show_cta",
        "label": "Show CTA",
        "type": "toggle",
        "value": false
    }
]
```

## Частичный импорт

Часто используемые partial option sub-sets можно импортировать в complete Option Set.

### Complete Option Set

Импорт `cta_settings` описан выше.

```json
{
    "settings": [
        {
            "name": "panel_class",
            "label": "Panel Class",
            "type": "text",
            "value": ""
        },
        {
            "fred-import": "cta_settings"
        },
        {
            "fred-import": "text_color"
        }
    ]
}
```

### Partial Option Set `text_color`

```json
{
    "name": "color",
    "label": "Text Color",
    "type": "colorswatch",
    "value": "black",
    "options": [
        { "value": "primary", "color": "blue", "label": "Primary" },
        "lightcoral",
        "black",
        "rgba(0,255,0,.5)"
    ]
}
```
