---
title: "Переопределение Option Sets"
description: "Overrides на вкладке Element, merge и rteConfig"
translation: "extras/fred/themer/options/override"
---

Overrides нужны, когда меняют, например, `remote` с `true` на `false`. Ими можно полностью переопределить Settings одного Element без отдельного Option Set.

Overrides находятся на вкладке `Overrides` при редактировании Element в Fred Manager.

**Примечание:** В панель Override нужно включить _все_ settings, которые должны отображаться как элементы управления. Проще начать с копирования всего JSON узла settings: нажмите `Preview Option Set`, выделите JSON и вставьте в поле overrides.

## Переопределение отдельных опций

Эти опции доступны только через override, не при создании Option Set.

### merge

При `merge`: `true` override рекурсивно объединяется с текущим Option Set. По умолчанию `false`.

### rteConfig

Через эту опцию можно переопределить или задать новые [RTE Configs](extras/fred/themer/rte_configs).

## Пример

У вас Intro с фоновым изображением и ссылкой call to action. Нужна версия для одностраничных сайтов с якорными ссылками и версия со ссылками на другие Fred pages. Scroll-to-link не нужен, поле link должно стать MODX page select.

### Исходная настройка

```json
{
    "settings": [
        {
            "name": "image",
            "label": "Background Image",
            "type": "image",
            "value": "assets/themes/starter/img/Fred-hero.jpg"
        },
        {
            "fred-import": "background_settings"
        },
        {
            "name": "linkscroll",
            "label": "Scroll Link",
            "type": "toggle",
            "value": true
        },
        {
            "name": "link",
            "label": "Link anchor or URL",
            "type": "text",
            "value": null
        }
    ]
}
```

### Options Override

```json
{
    "settings": [
        {
            "name": "image",
            "label": "Background Image",
            "type": "image",
            "value": "assets/themes/starter/img/Fred-hero.jpg"
        },
        {
            "fred-import": "background_settings"
        },
        {
            "name": "link",
            "label": "Link",
            "type": "page",
            "value": {
                "id": 1,
                "url": "[[~1]]"
            }
        }
    ]
}
```
