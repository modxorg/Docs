---
title: "sekFancyBox"
description: "Порт fancyBox 2.0.4 для стандартизированных модальных окон в MODX Revolution"
translation: "extras/sekfancybox/index"
---

## Что такое sekFancyBox?

SekFancyBox это порт fancyBox 2.0.4 (см. [fancyBox](http://fancyapps.com/fancybox/)). Вы быстро стандартизируете модальные окна на всём сайте.

### Требования

- MODX Revolution 2.1.0-RC-2 или новее
- PHP5 или новее

Я тестировал в MODX 2.1, на более старых версиях может работать. SekFancyBox простой: без обращений к БД и без страниц менеджера.

### История

SekFancyBox написал Stephen Smith, первый релиз вышел 1 февраля 2012 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](extending-modx/transport-packages "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/sekfancybox>.

### Разработка и сообщения об ошибках

SekFancyBox на GitHub: <https://github.com/insomnix/sekFancyBox>, issues: <https://github.com/insomnix/sekFancyBox/issues>.

Новости sekFancyBox: <http://www.seknetsolutions.com/modx-extras/sekfancybox>

## Использование

sekFancyBox вызывается одним сниппетом:

[[sekfancybox]]

Несколько свойств задают тип модального окна:

## Доступные свойства

| Имя                                                                  | Описание                                                                                                                                                    | Тип        | По умолчанию     | Необязательно | Версия |
| --------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------- | ----------- | -------- | ------- |
| type                                                                  | Тип открываемого окна.                                                                                                                    |
| Options: inline, iframe, document, media, jcode                       |                                                                                                                                                                | inline      | yes         |          |
| link                                                                  | Для одного inline-модала не обязателен. Для нескольких inline на странице каждому вызову нужно уникальное однословное имя. |
| В других типах это URL просматриваемого элемента. |                                                                                                                                                                | sekfancybox | inline only |          |
| linktext                                                              | Текст ссылки на странице.                                                                                                                       |             |             |          |         |
| text                                                                  | Текст в модальном окне.                                                                                                                           | inline only |             |          |         |
| header                                                                | Заголовок над текстом в модальном окне в теге `<h3></h3>`.                                                                                  | inline only |             | yes      |         |
| modalwidth                                                            | Ширина модального окна на экране (в 1.0.0 лучше свойство width)                | inline only | 400         | yes      |         |
| title                                                                 | Подпись под модальным окном, полезна для изображений. Поведение меняется через helpers.                                           |             |             | yes      |         |
| modalclass                                                            | Меняет CSS-класс модального окна. This must be used if using different options on multiple modals on a single page. (i.e. using thumbnailhelper for a group of images set to one class, and using buttonhelper on a group of images of another class.) It is good practice to assign a class to all modal windows to prevent future problems if another modal is added to the page. |  | fancybox | yes |  |
| group | Группирует изображения на странице. This will create a modal slideshow. | media only |  | yes |  |
| mousewheel | Колёсико мыши листает изображения группы. Set to 1 to use. | media only | 0 | yes |  |
| buttonhelper | Кнопки над окном для навигации по группе. Set to 1 to use. | media only | 0 | yes |  |
| thumbnailhelper | Миниатюры под окном всех изображений группы. Set to 1 to use. | media only | 0 | yes |  |
| customjs | Для продвинутого использования укажите URL пользовательского JS. For more information on how to customize fancyBox, check out their [website](http://fancyapps.com/fancybox/). |  |  | yes |  |
| customcss | URL CSS для оформления модального окна. |  |  | yes |  |
| custombuttonscss | URL CSS для кнопок-помощников. |  |  | yes | 1.0.0 |
| customthumbnailcss | URL CSS для миниатюр-помощников. |  |  | yes | 1.0.0 |
| loadjquery | sekFancyBox поставляется с JQuery 1.7.1 min и загружает его автоматически. Если другие extras на той же странице тоже грузят JQuery, возможны ошибки. Чтобы отключить автозагрузку JQuery, установите `0`. (Depending on the order in which extras are installed on a site, and whether the js loads in the head or the end of the page, will decide the order the js files load. If JQuery loads after the the fancybox js, errors can occur. If other extras permit, do not load JQuery through any extras, instead load it in the template and set the 'sekfancybox.load\_jquery' system setting to false.) If system setting 'sekfancybox.load\_jquery' is set to false, loadjquery can be set to `1` to load JQuery on that page. |  | 1 | yes | 0.0.2 |
| padding | Отступ внутри fancyBox вокруг контента. Массив \[top, right, bottom, left\]. |  | 15 | yes | 1.0.0 |
| margin | Минимальный зазор между viewport и fancyBox. Массив \[top, right, bottom, left\]. Правый и нижний margin игнорируются, если контент больше viewport. |  | 20 | yes | 1.0.0 |
| width | Ширина по умолчанию для iframe и swf. Также для inline, ajax и html при autoSize=false. Число или auto. |  | 800 | yes | 1.0.0 |
| height | Высота по умолчанию для iframe и swf. Также для inline, ajax и html при autoSize=false. Число или auto. |  | 600 | yes | 1.0.0 |
| minWidth | Минимальная ширина fancyBox. |  | 100 | yes | 1.0.0 |
| minHeight | Минимальная высота fancyBox. |  | 100 | yes | 1.0.0 |
| maxWidth | Максимальная ширина fancyBox. |  | 9999 | yes | 1.0.0 |
| maxHeight | Максимальная высота fancyBox. |  | 9999 | yes | 1.0.0 |
| autoSize | При true включает autoHeight и autoWidth. |  | true | yes | 1.0.0 |
| autoHeight | При true для inline, ajax и html ширина определяется автоматически. Без размеров результат может быть неожиданным. |  | false | yes | 1.0.0 |
| autoWidth | При true для inline, ajax и html высота определяется автоматически. Без размеров результат может быть неожиданным. |  | false | yes | 1.0.0 |
| autoResize | При true контент пересчитывается после изменения размера окна. |  | true | yes | 1.0.0 |
| autoCenter | При true контент всегда по центру. |  | true | yes | 1.0.0 |
| fitToView | При true fancyBox подгоняется под viewport перед открытием. |  | true | yes | 1.0.0 |
| aspectRatio | При true сохраняется исходное соотношение сторон. |  | false | yes | 1.0.0 |
| topRatio | Доля верхнего отступа при вертикальном центрировании. 0.5 даёт равные верх и низ. 0 прижимает fancyBox к верху viewport. |  | 0.5 | yes | 1.0.0 |
| leftRatio | Доля левого отступа при горизонтальном центрировании. 0.5 даёт равные лево и право. 0 прижимает fancyBox к левому краю viewport. |  | 0.5 | yes | 1.0.0 |
| scrolling | CSS overflow для полос прокрутки: auto, yes, no или visible. |  | auto | yes | 1.0.0 |
| wrapCSS | Пользовательский CSS-класс обёртки. |  |  | yes | 1.0.0 |
| arrows | При true показываются стрелки навигации. |  | true | yes | 1.0.0 |
| closeBtn | При true показывается кнопка закрытия. |  | true | yes | 1.0.0 |
| closeClick | При true закрытие по клику на контент. |  | false | yes | 1.0.0 |
| nextClick | При true клик по контенту переходит к следующему элементу галереи. |  | false | yes | 1.0.0 |
| mouseWheel | При true навигация по галерее колёсиком мыши. |  | true | yes | 1.0.0 |
| autoPlay | При true слайдшоу стартует после открытия первого элемента. |  | false | yes | 1.0.0 |
| playSpeed | Скорость слайдшоу в миллисекундах. |  | 3000 | yes | 1.0.0 |
| preload | Число предзагружаемых изображений галереи. |  | 3 | yes | 1.0.0 |
| modal | При true отключает навигацию и закрытие. |  | false | yes | 1.0.0 |
| loop | При true циклическая навигация: после последнего элемента снова первый. |  | true | yes | 1.0.0 |
| scrollOutside | При true скрипт старается избежать горизонтальной прокрутки для iframe и html. |  | true | yes | 1.0.0 |
| openEffect | Эффект анимации (elastic, fade или none) при открытии. |  | fade | yes | 1.0.0 |
| closeEffect | Эффект анимации (elastic, fade или none) при закрытии. |  | fade | yes | 1.0.0 |
| nextEffect | Эффект анимации (elastic, fade или none) при переходе вперёд. |  | elastic | yes | 1.0.0 |
| prevEffect | Эффект анимации (elastic, fade или none) при переходе назад. |  | elastic | yes | 1.0.0 |
| openSpeed | Длительность перехода (мс или slow, normal, fast). |  | 250 | yes | 1.0.0 |
| closeSpeed | Длительность перехода (мс или slow, normal, fast). |  | 250 | yes | 1.0.0 |
| nextSpeed | Длительность перехода (мс или slow, normal, fast). |  | 250 | yes | 1.0.0 |
| prevSpeed | Длительность перехода (мс или slow, normal, fast). |  | 250 | yes | 1.0.0 |
| openOpacity | При true меняется прозрачность при elastic-переходах. |  | true | yes | 1.0.0 |
| closeOpacity | При true меняется прозрачность при elastic-переходах. |  | true | yes | 1.0.0 |
| openMethod | Метод обработки перехода. |  | zoomIn | yes | 1.0.0 |
| closeMethod | Метод обработки перехода. |  | zoomOut | yes | 1.0.0 |
| nextMethod | Метод обработки перехода. |  | changeIn | yes | 1.0.0 |
| prevMethod | Метод обработки перехода. |  | changeOut | yes | 1.0.0 |
| helpers | JSON-объект с включёнными helpers и их опциями. |  |  | yes | 1.0.0 |

### Опции helpers

В helpers задают опции и подопции.

``` php
&helpers=`{
"title":{"type":"inside"},
"overlay":{"opacity": 0.8,"css":{"'background-color'": "#000"}},
"thumbs":{"width": 50,"height": 50},
}`
```

``` php
&helpers=`{
"title":"null",
"overlay":"null"
}`
```

| Имя                   | Описание                                                                   | По умолчанию |
| ---------------------- | ----------------------------------------------------------------------------- | ------- |
| title                  | Группа title: массив значений или 'null'.                     |         |
| title \[type\]         | Отображение title: 'float', 'inside', 'outside' или 'over'.      | float   |
| overlay                | Группа overlay: массив значений или 'null'                   |         |
| overlay \[closeClick\] | При true закрытие по клику на overlay.             | true    |
| overlay \[speedOut\]   | Длительность fadeOut.                                                | 200     |
| overlay \[showEarly\]  | Открывать сразу или ждать готовности контента. | true    |
| overlay \[css\]        | Пользовательские CSS-свойства.                                                        |         |
| overlay \[locked\]     | При true контент фиксируется в overlay.                             | true    |
| overlay \[opacity\]    | Прозрачность overlay                                                    | 0.8     |
| thumbs                 | Массив опций thumbnail helper.          |         |
| thumbs \[width\]       | Ширина миниатюры.                                                              | 50      |
| thumbs \[height\]      | Высота миниатюры                                                              | 50      |

## Доступные настройки

| Имя                             | Описание                                                                                                                                                                                                                                                                                                                | По умолчанию  | Версия |
| -------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| sekfancybox.load\_jquery         | Включает или отключает загрузку JQuery при вызове sekFancyBox на странице. Если JQuery уже грузится другим extra или в шаблоне, установите No/False. Опция loadjquery переопределяет эту настройку. | Yes/True | 0.0.2   |
| sekfancybox.load\_jquery\_head   | YES загружает jquery из addon в head. NO загружает внизу страницы.                                                                                                                                                                              | Yes/True | 1.0.0   |
| sekfancybox.custom\_css          | Если пусто, CSS из sekFancyBox. &customcss всегда переопределяет.                                                                                                                                                                                                     |          | 1.0.0   |
| sekfancybox.custom\_buttons\_css | If blank, use the css file that comes with sekFancyBox. &custombuttonscss всегда переопределяет.                                                                                                                                                                                              |          | 1.0.0   |
| sekfancybox.custom\_thumbs\_css  | If blank, use the css file that comes with sekFancyBox. &customthumbnailcss всегда переопределяет.                                                                                                                                                                                            |          | 1.0.0   |

## Ручная загрузка JQuery в шаблоне

При загрузке jquery в шаблоне и load jquery = false у sekFancyBox укажите type="text/javascript" в теге script. Иначе sekFancyBox не заработает.

``` html
<script type="text/javascript" src="assets/js/libs/jquery-1.8.3.min.js"></script>
```

## Примеры

Ниже базовые примеры.
Также см. [sekFancyBox & Gallery](extras/sekfancybox/sekfancybox-and-gallery "sekFancyBox & Gallery").

### Тип Inline

Inline по умолчанию, достаточно двух свойств:

``` php
[[sekfancybox?
 &linktext=`Text to display as a link`
 &text=`Text that will display in the modal window.`
]]
```

Для нескольких inline-модалов на странице задайте link, чтобы окна не конфликтовали (для inline без пробелов):

``` php
[[sekfancybox?
 &link=`modal-one`
 &linktext=`Text 1 to display as link`
 &text=`Text 1 that will display in the modal window.`
]]
```

``` php
[[sekfancybox?
 &link=`modal-two`
 &linktext=`Text 2 to display as link`
 &text=`Text 2 that will display in the modal window.`
]]
```

Можно добавить больше опций:

``` php
[[sekfancybox?
 &link=`modal`
 &linktext=`Text to display as link`
 &title=`displays under modal`
 &text=`Text that will display in the modal window.`
 &modalwidth=`600`
 &header=`Displays at top of modal window`
]]
```

### Тип Iframe

type=iframe показывает другой сайт внутри вашего:

``` php
[[sekfancybox?
 &type=`iframe`
 &linktext=`SEKNet Solutions`
 &link=`<http://www.seknetsolutions.com>`
]]
```

Для внешнего сайта лучше создать weblink-ресурс и вызвать по id (&link=`[[~22]]`).

### Тип Document

type=document показывает файл на вашем сайте (htm, txt и т.д.):

``` php
[[sekfancybox?
 &type=`document`
 &linktext=`link to document`
 &link=`[[~19]]`
]]
```

Удобно для большого форматированного текста без inline на текущей странице. Вызывайте ресурс с пустым шаблоном или BlankTemplate (BlankTemplate даёт теги вроде [[*pagetitle]], пустой шаблон показывает только content).

Для .txt лучше static-ресурс и вызов по id.

### Тип Media

type=media для изображений или flash:

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image.jpg" />`
 &link=`images/image.jpg`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`SWF File`
 &link=`[http://www.adobe.com/jp/events/cs3\_web\_edition\_tour/swfs/perform.swf](http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf)`
]]
```

If linking to an external website, it is recommended one defines a weblink resource, then call that weblink resource by the id ( &link=`[[~122]]` ).

### Тип Media Groups

В примере четыре фото в двух группах. group1 с thumbnailhelper, group2 с buttonhelper. modalclass различает группы с разными опциями. Один класс для обеих вызовет конфликт.

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image1.jpg" />`
 &link=`images/image1.jpg`
 &modalclass=`class-thumb`
 &thumbnailhelper=`1`
 &group=`group1`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image2.jpg" />`
 &link=`images/image2.jpg`
 &modalclass=`class-thumb`
 &thumbnailhelper=`1`
 &group=`group1`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image3.jpg" />`
 &link=`images/image3.jpg`
 &modalclass=`class-button`
 &buttonhelper=`1`
 &group=`group2`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image4.jpg" />`
 &link=`images/image4.jpg`
 &modalclass=`class-button`
 &buttonhelper=`1`
 &group=`group2`
]]
```
