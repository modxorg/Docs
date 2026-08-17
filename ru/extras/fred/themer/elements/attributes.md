---
title: "Атрибуты"
description: "data-fred-dropzone, data-fred-name, data-fred-rte и другие атрибуты Elements"
translation: "extras/fred/themer/elements/attributes"
---

Ниже перечислены доступные атрибуты Fred Elements.

## data-fred-dropzone

Drop Zone, куда из sidebar перетаскивают Fred Elements. Атрибут не может быть пустым и должен быть уникален в Element. Dropzones может быть сколько угодно, но слишком много усложняет вёрстку. Несколько Dropzones уместны для full width, split pages, sidebar и т.п.

### Пример

```html
<div data-fred-dropzone="left" class="left-content"></div>
<div data-fred-dropzone="right" class="right-content"></div>
```

## data-fred-name

Уникальное имя каждого Element с редактируемым содержимым. Elements с этим атрибутом сохраняет и обрабатывает Fred. По умолчанию Elements с `data-fred-name` редактируемы, если явно не указано `contentedtiable="false"` (см. ниже).

Значение атрибута уникально в каждом Element, но на странице может быть несколько экземпляров одного Element. Разные Elements могут использовать общие `data-fred-name` без проблем.

**Примечание:** Fred оборачивает все Elements в `<div>`, поэтому нельзя строить elements, ломающие валидацию HTML, например table rows, list items, definition lists. Это исправят в будущем релизе.

### Примеры

```html
<!-- Simple editable paragraph -->
<p data-fred-name="description">Default value</p>

<!-- Editable image -->
<img src="http://via.placeholder.com/450x150" data-fred-name="header-image" />
```

## data-fred-editable

При `false` содержимое HTML Element не редактируется, включая вложенный контент Dropzone. Работает только вместе с `data-fred-name`.

### Пример

```html
<p
    data-fred-name="description"
    data-fred-editable="false"
    data-fred-target="description"
>
    The value from the description field goes here
</p>
```

## data-fred-attrs

Другие HTML-атрибуты через запятую для сохранения с контентом элемента, где редактор поддерживает, например alt и title у изображений.

### Пример

```html
<img
    src="http://via.placeholder.com/450x150"
    alt="Default Alt"
    data-fred-name="header-image"
    data-fred-attrs="alt,title"
/>
```

## data-fred-render

Позволяет делать self-documenting Elements с подсказками для пользователя. При `false` Element виден только когда Fred активен.

### Пример

```html
<p data-fred-render="false" class="editor-instructions">
    Add a *Link Location* setting for this Element to make a call to action
    button appear. (This block is only visible when using Fred.)
</p>
```

## data-fred-target

Resource field или TV для хранения контента. Контент Element сохраняется в обычное поле Content и дополнительно в указанный target. Атрибут нельзя использовать на dropzone.

**Доступные targets:**

-   pagetitle
-   longtitle
-   description
-   introtext
-   menutitle
-   alias
-   Template Variables (TVs)

**Примечание:** TV targets работают только с text или textarea, данные хранятся как JSON object. Некоторые типы TV в MODX Manager, например select или Google Map Markers, не подходят. Имена TV должны иметь префикс `tv_`.

### Примеры

```html
<h1 data-fred-name="title" data-fred-target="pagetitle">Default Page Title</h1>
```

```html
<h1 data-fred-name="my-tv" data-fred-target="tv_job-title">
    Targets the "job-title" TV field
</h1>
```

## data-fred-rte

При `true` для редактирования содержимого загружается Rich Text Editor.

### Пример

```html
<div data-fred-name="rte-content" data-fred-rte="true">Default Content</div>
```

## data-fred-rte-config

Когда нужен ограниченный или расширенный набор элементов RTE, укажите [альтернативный RTE config](extras/fred/themer/rte_configs) вместо конфигурации по умолчанию.

### Пример

```html
<div
    data-fred-name="rte-content"
    data-fred-rte="true"
    data-fred-rte-config="bold-and-italics-only"
>
    The RTE for this content will only show the bold and italics buttons
</div>
```

## data-fred-media-source

Media Source для Element по имени одного или нескольких Media Sources через запятую для всех типов файлов.

### Пример

```html
<a
    href="assets/pdfs/brochure.pdf"
    data-fred-name="brochure"
    data-fred-media-source="Assets"
    >download our brochure</a
>
```

## data-fred-image-media-source

Как `data-fred-media-source`, но только для изображений.

### Пример

```html
<img
    src="http://via.placeholder.com/450x150"
    data-fred-name="header-image"
    data-fred-image-media-source="Blogs,Images"
/>
```

## data-fred-block-class

Дополнительный class для обёртки `div.fred--block` вокруг Elements при загрузке Fred. Полезно, когда JS-библиотеки или CSS требуют определённых wrapper classes. Без Fred атрибут добавляется к classes самого element.

### Пример

Element Markup:

```html
<div class="image" data-fred-block-class="special-wrapper"></div>
```

Когда Fred загружен, разметка вокруг выглядит так:

```html
<div class="fred--block special-wrapper">
    <div class="fred--toolbar">…</div>
    <div
        class="fred--block_content"
        data-fred-element-id="5ce33419-44d6-4e30-90db-8c9a62d04763"
        data-fred-element-title="Image"
    >
        <div class="image"></div>
    </div>
</div>
```

Когда Fred _не_ загружен, processed markup:

```html
<div class="image special-wrapper"></div>
```

## data-fred-class

Значение добавляется к class element только когда Fred _не_ загружен.

## Example

Element Markup:

```html
<div class="row" data-fred-class="visible-grid foo"></div>
```

Когда Fred загружен, class опускается:

```html
<div class="row">…</div>
```

Когда Fred _не_ загружен, class добавляется:

```html
<div class="row visible-grid foo">…</div>
```

## data-fred-bind

Привязывает значение одной части страницы к другому месту внутри одного Element.

### Пример

Element Markup:

```html
<div data-fred-name="name" data-fred-render="false">John Doe</div>
<div class="modal">
    <div class="modal-header" data-fred-bind="name"></div>
    <div class="modal-content">Hello there</div>
</div>
```

Rendered HTML:

```html
<div class="modal">
    <div class="modal-header">John Doe</div>
    <div class="modal-content">Hello there</div>
</div>
```

## data-fred-on-drop

Имя глобально доступной JavaScript-функции при сбросе Element в любую Dropzone. Первый аргумент функции fredEl.

Используйте для вызова JS, например инициализации слайдера из `document.ready`. Без атрибута нужно сохранить страницу и перезагрузить её.

### Пример

```html
<div class="clock" data-fred-on-drop="initClock"></div>
```

## data-fred-on-setting-change

Имя глобально доступной JavaScript-функции при изменении setting Element. Первый аргумент fredEl.

### Пример

```html
<div class="clock" data-fred-on-setting-change="reInitClock"></div>
```

## data-fred-link-type

## data-fred-link-page

Используются TinyMCE RTE с `data-fred-link-page` для ссылок в формате MODX `[[~2]]`. Ссылки обрабатываются в href target перед генерацией контента.

### Пример

```html
<a href="fred.html" data-fred-link-type="page" data-fred-link-page="2">Fred</a>
```

## data-fred-min-height

Для dropzones. Значение попадает в style min-height dropzone.

### Пример

```html
<div data-fred-dropzone="content" data-fred-min-height="50px"></div>
```

## data-fred-min-width

Для dropzones. Значение попадает в style min-width dropzone.

### Пример

```html
<div data-fred-dropzone="content" data-fred-min-width="50px"></div>
```
