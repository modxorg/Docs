---
title: "Сниппет jgSlideshow"
description: "Свойства и плейсхолдеры сниппета jgSlideshow для вывода слайдшоу"
translation: "extras/slideshow-manager/jgslideshow-snippet"
---

Использование сниппета: вывод слайдшоу на странице

Базовый код:

``` html
<div id="slideShow">
[[!jgSlideshow?
    &album_id=`1`
]]
</div>
```

`album_id`: id из менеджера:

![](album_id.png)

## Доступные свойства

Version 1.1

### Basics

| Name           | Description                                                                                                                                                                                                                                                                                                                              | Default Value |
| -------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- |
| loadJQuery     | true: подключает jQuery. Если jQuery уже есть, задайте false (с 1.1+)                                                                                                                                                                                                                              | true          |
| toPlaceholder  | Плейсхолдер, куда попадёт сгенерированный HTML                                                                                                                                                                                                                                                                  |               |
| skin           | Скопируйте tpl с префиксом nivo, переименуйте с своим префиксом. Вместо перечисления каждого tpl в вызове укажите skin. Явное значение tpl перекрывает skin для этого свойства. | nivo          |
| album\_id      | id альбома для показа                                                                                                                                                                                                                                                                                                     | 1             |
| slide\_div\_id | HTML id элемента, к которому привязан JS-слайдшоу. Используется в headTpl, см. nivo\_headTpl                                                                                                                                                                                                           | slider        |

### The Chunk properties

Рекомендуется дублировать чанк перед правкой, чтобы обновления не затёрли изменения. Удобно хранить кастомные чанки в отдельной папке.

| Name           | Description                                                                              | Default Value        |
| -------------- | ---------------------------------------------------------------------------------------- | -------------------- |
| headTpl        | JS/CSS слайдшоу для head, может использовать результаты цикла | nivo\_headTpl        |
| slideHolderTpl | Контейнер для slide panes                                                           | nivo\_slideHolder    |
| htmlCaptionTpl | HTML Caption Option                                                                      | nivo\_htmlCaptionTpl |
| slideLinkTpl   | Slide pane внутри anchor                                                        | nivo\_slideLinkTpl   |
| slidePaneTpl   | Сам pane или изображение                                                                 | nivo\_slidePaneTpl   |

### Placeholders available for Chunks

| Tpls that use them                                         | Name                 | Description                                                  |
| ---------------------------------------------------------- | -------------------- | ------------------------------------------------------------ |
| all Chunks                                                 |                      |                                                              |
|                                                            | slide\_div\_id       | HTML id элемента для JS-слайдшоу. |
|                                                            | count                | Общее число слайдов                                   |
| only headTpl                                               |                      |                                                              |
|                                                            | id                   | id альбома                                                 |
|                                                            | title                | Заголовок альбома                                              |
|                                                            | description          | Описание альбома                                        |
|                                                            | file\_allowed        | Допустимые типы файлов альбома                                |
|                                                            | file\_size\_limit    | Максимальный размер файла альбома                |
|                                                            | file\_width          | Ширина изображений слайдшоу                           |
|                                                            | file\_height         | Высота изображений слайдшоу                          |
| slideHolderTpl, htmlCaptionTpl, slideLinkTpl, slidePaneTpl |                      |                                                              |
|                                                            | src                  | Полный URL изображения                                           |
|                                                            | id                   | id слайда                                                 |
|                                                            | slideshow\_album\_id | id альбома                                                 |
|                                                            | url                  | URL слайда из менеджера      |
|                                                            | title                | Заголовок слайда из менеджера   |
|                                                            | description          | Из менеджера                          |
|                                                            | notes                | Из менеджера                          |
|                                                            | html                 | Из менеджера                          |
|                                                            | options              | Из менеджера                          |
|                                                            | upload\_time         | Время загрузки изображения                          |
|                                                            | file\_path           | Только имя файла, например image.jpg                          |
|                                                            | file\_type           | jpg, png и т.д.                                              |
|                                                            | web\_user\_id        | Пользователь, последний раз обновивший слайд                         |
|                                                            | start\_date          | Дата начала показа слайда                                 |
|                                                            | end\_date            | Последний день показа слайда                        |
|                                                            | edit\_time           | Время последнего редактирования                           |
|                                                            | sequence             | Порядок слайда                         |
|                                                            | slide\_status        | Статус                                                   |
|                                                            | version              | Число редактирований                            |

## Examples

Несколько слайдшоу:

``` html
<div id="slider-wrapper">
    [[!jgSlideShow?
        &album_id=`1`
    ]]
</div>
<!-- Make sure you use a different ID for each instance: -->
<div id="slider-wrapper2">
    [[!jgSlideShow?
        &album_id=`8`
        &slide_div_id=`slider2`
    ]]
</div>
```
