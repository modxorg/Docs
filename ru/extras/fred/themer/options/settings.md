---
title: "Настройки Options"
description: "Глобальные settings, типы элементов управления и группы настроек"
translation: "extras/fred/themer/options/settings"
---

Option Sets могут иметь глобальные настройки для Media Sources и управления динамическими асинхронными XHR-вызовами. Визуальные Settings в браузере можно разбить на поднаборы для организации.

## Глобальные настройки

Следующие параметры управляют отдельными settings и группировкой Element на странице Fred.

### remote

`true` включает XHR-запросы для рендера Element через Twig и MODX parsers. Element также перерендеривается при изменении settings. Так на Fred page можно использовать MODX Snippets с динамическим контентом других страниц. По умолчанию: `false`.

### cacheOutput

При `true` кэширует вывод Element в статический HTML, если `remote` тоже `true`.

### mediaSource

Имя Media Source для Finder. Несколько имён через запятую `,`.

### imageMediaSource

Имя Media Source для полей image. Несколько имён через запятую `,`. Перекрывает `mediaSource`.

### toolbarPluginsInclude

Список toolbar plugins для elements.

### toolbarPluginsExclude

Список toolbar plugins для отключения у elements.

## Settings

Settings это JSON-массив объектов и [group objects](#setting-groups) с элементами управления для Elements. Settings могут [импортировать](extras/fred/themer/options/import) поднаборы через объект `fred-import`.

### Свойства settings

Следующие свойства применяются ко всем settings независимо от типа:

-   `name` - имя setting, можно использовать как переменную Twig
-   `label` - подпись setting в панели Element Settings
-   `value` - значение по умолчанию
-   `type` - тип setting, см. следующий раздел

Примечание: задайте value по умолчанию, чтобы у пользователя была отправная точка. Иначе пустой Element может не совпадать с preview image при drag and drop.

### Доступные типы Settings

Следующие типы Settings настраивают Elements в Fred.

#### text

-   Однострочный HTML `<input type="text">`
-   Любое текстовое значение

#### textarea

-   Многострочный HTML `<textarea>`
-   Любое текстовое значение
-   Свойства типа:
    -   `rows` - число строк, по умолчанию: 4

#### select

-   HTML `<select>`
-   Только одно выбранное значение
-   Свойства типа:
    -   `options` - объект свойств `value:label`

#### toggle

-   Чекбокс true/false
-   Возвращает логические `true` или `false`

#### colorswatch

-   Визуальный выбор цвета из предопределённых значений
-   Свойства типа:

    -   options
        -   Массив цветов, пример: `["lightcoral", "red", "black"]`
        -   Цвет может быть `string` или `object` со свойствами:
            -   `value` - значение для Twig
            -   `color` - отображаемый цвет swatch
            -   `colorAsClass` - при `true` значение `color` добавляется как class опции вместо background
            -   `label` - произвольная подпись swatch
            -   `width` - ширина опции цвета, по умолчанию `1`

#### colorpicker

-   Выбор произвольного цвета RGB, HSL или Hex с опциональной прозрачностью
-   Свойства типа:
    -   `showAlpha` - boolean для слайдера прозрачности, по умолчанию: `true`
    -   `options` - массив цветов, пример: `["lightcoral", "red", "black"]`

#### slider

-   Слайдер для чисел
-   Свойства типа:
    -   `min` - **ОБЯЗАТЕЛЬНО**: минимум слайдера
    -   `max` - **ОБЯЗАТЕЛЬНО**: максимум слайдера
    -   `tooltipDecimals` - число знаков после запятой в tooltip слайдера, по умолчанию: 0
    -   `step` - шаг значения слайдера, по умолчанию: 1

#### page

-   Выбор страницы MODX
-   Значение как объект: `{"id": 1, "url": "fred.html"}`
    -   ID или URL отдельно через dot syntax: `{{ page-name-example.id}}`
-   Свойства типа:
    -   `clearButton` - при `true` в поле появляется кнопка `x` для очистки значения
    -   `resources` - если задано, показываются только resources с указанными ID, строка с запятой или массив
    -   `parents` - если задано, показываются resources из этих parents включая сами parents, строка с запятой или массив
    -   `depth` - глубина поиска дочерних для `parents`, по умолчанию: 1

#### file

-   Выбор файла
-   Свойство типа:
    -   `mediaSource` - необязательное имя Media Source, перекрывает глобальную настройку `` <a href="#mediasource">`mediaSource`</a> ``

#### folder

-   Выбор папки
-   Свойства типа:
    -   `mediaSource` - необязательное имя Media Source, перекрывает глобальную настройку `` <a href="#mediasource">`mediaSource`</a> ``
    -   `showOnlyFolders` - при `true` в elFinder видны только папки, по умолчанию: false

#### image

-   Выбор изображения
-   Свойства типа:
    -   `showPreview` - при `false` preview под text input не показывается
    -   `mediaSource` - необязательное имя Media Source, перекрывает глобальную настройку `` <a href="#imagemediasource">`imageMediaSource`</a> ``

#### tagger

-   Выбор preset Tagger tags
-   Свойства типа:
    -   `autoTag` - true/false для auto tag
    -   `hideInput` - true/false для поля ввода
    -   `group` - ID группы Tagger
    -   `limit` - максимум выбранных tags

### Setting Groups

Groups организуют связанные Option Sets или убирают редко используемые settings с главного экрана.

-   `group` - имя группы связанных sub-settings, открывается во второй панели по клику. Значение `group` используется как label группы
-   `settings` - массив объектов settings

```json
{
    "group": "Group Name",
    "settings": [
        {
            …
        },
        {
            …
        }
    ]
}
```

### Соглашения об именах Settings

Фронтенд рендерится через Twig, поэтому все значения `"name"` должны следовать соглашениям JavaScript. Дефисы, пробелы и спецсимволы не допускаются, они могут быть зарезервированы в JavaScript.

#### Составные имена Settings

**Underscore:**

cta_title, cta_image, cta_link

**Upper Camel Case (Pascal Case):**

CtaTitle, CtaImage, CtaLink

**Lower Camel Case:**

ctaTitle, ctaImage, ctaLink

## Пример Option Set с Settings

```json
{
    "remote": true,
    "settings": [
        {
            "name": "panel_class",
            "label": "Panel Classes",
            "type": "text",
            "value": "col-6 col-sm-12"
        },
        {
            "name": "logo",
            "label": "Logo",
            "type": "image",
            "mediaSource": "site-assets",
            "value": "assets/images/logo.svg"
        },
        {
            "name": "nda-file",
            "label": "Upload NDA",
            "type": "file",
            "mediaSource": "site-assets-files",
            "value": "assets/files/contract.pdf"
        },
        {
            "name": "slogan",
            "label": "Slogan",
            "type": "textarea",
            "value": "Enter your slogan here"
        },
        {
            "name": "panel_type",
            "label": "Type of Panel",
            "type": "select",
            "options": {
                "info": "Info Panel",
                "warn": "Warning Panel",
                "error": "Error panel"
            },
            "value": "info"
        },
        {
            "name": "padding_top",
            "label": "Top padding",
            "type": "slider",
            "min": 0,
            "max": 100,
            "step": 10,
            "value": 20
        },
        {
            "group": "CTA",
            "settings": [
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
                },
                {
                    "name": "color",
                    "label": "Text Color",
                    "type": "colorswatch",
                    "value": "black",
                    "options": [
                        {
                            "value": "primary",
                            "color": "blue",
                            "label": "Primary"
                        },
                        "lightcoral",
                        "black",
                        "rgba(0,255,0,.5)"
                    ]
                },
                {
                    "name": "bg_color",
                    "label": "Background COlor",
                    "type": "colorpicker",
                    "value": "white",
                    "showAlpha": true,
                    "options": ["lightcoral", "black", "white"]
                },
                {
                    "name": "page",
                    "label": "Linked Page",
                    "type": "page",
                    "value": { "id": 1, "url": "[[~1]]" }
                }
            ]
        }
    ]
}
```
