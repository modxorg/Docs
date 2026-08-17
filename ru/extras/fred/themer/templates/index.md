---
title: "Подготовка MODX Templates для Fred"
description: "Dropzones, один и несколько зон контента, Template Variable Fred Dropzone"
translation: "extras/fred/themer/templates/index"
---

Fred загружается только на страницах с MODX Templates, назначенными теме Fred (`Extras` > `Fred` > `Themed Templates`). Resource с template из этой таблицы блокирует поле Content в Manager и загружает Fred на фронтенде для редактирования под учётной записью.

## Dropzones

В большинстве templates есть _content_ Dropzone. Fred поддерживает несколько Dropzones для sidebar, header, footer и других зон. В Fred Templates зоны задают атрибутами `data-fred-…` в HTML.

### Простой пример Template с одной Dropzone

```html
<html>
    <head>
        <title>[[*pagetitle]]</title>
    </head>
    <body>
        <div data-fred-dropzone="content" data-fred-min-height="500px">
            [[*content]]
        </div>
    </body>
</html>
```

Минимальная высота dropzone по умолчанию 5 пикселей, что может быть слишком мало для попадания курсором. Чтобы увеличить «пустое» состояние, добавьте `data-fred-min-height="250px"`. Большая min-height упрощает сброс Elements в пустую зону. Размер может меняться, если Elements перекрываются, например fixed top navigation.

Атрибут `data-fred-dropzone="content"` обязателен и указывает, куда сохранять отрендеренный контент Fred. Внутри должна быть ссылка на тег `[[*content]]`. Когда Fred активен, он очищает контент в dropzone и подставляет данные Elements. Без Fred рендерятся обычные теги в этой области.

### Несколько Dropzones

Для сложной вёрстки с основной областью и sidebar Fred добавляет тип Template Variable `Fred Dropzone`. Чтобы создать ещё одну dropzone:

1. В MODX Manager откройте дерево `Elements` > `Template Variables` > иконку `+` для новой TV
2. Задайте имя, например «sidebar», и назначьте категорию Fred
3. На вкладке `Input Options` выберите Input Type «Fred Dropzone»
4. Чтобы видеть отрендеренный контент в Manager, для «Hide Field from Manager:» выберите «No».

![Fred Dropzone TV Screenshot]()

#### Пример Template с Dropzone `sidebar`

```html
<html>
    <head>
        <title>[[*pagetitle]]</title>
    </head>
    <body>
        <section id="wrapper">
            <div
                id="main"
                data-fred-dropzone="content"
                data-fred-min-height="500px"
            >
                [[*content]]
            </div>
            <aside
                id="sidebar"
                data-fred-dropzone="sidebar"
                data-fred-min-height="250px"
            >
                [[*sidebar]]
            </aside>
        </section>
    </body>
</html>
```
