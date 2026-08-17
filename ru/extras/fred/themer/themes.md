---
title: "Руководство по созданию темы"
description: "Пошаговая установка Fred, шаблонов, категорий и первых Elements"
translation: "extras/fred/themer/themes"
---

Когда дизайн готов, собрать тему для публикации несложно. Чтобы начать, выполните шаги ниже.

1. Установите [Fred с MODX.com](https://modx.com/extras/package/fred), [icon picker](https://modx.com/extras/package/fredfontawesome5iconeditor) и [TinyMCE RTE](https://modx.com/extras/package/fredtinymcerte)
2. Настройте MODX Template с content Dropzone
3. Назначьте этот Template теме Fred
4. Создайте Categories для Fred Elements
5. Создайте Fred Elements

## Шаг 1: Установка Fred

Fred доступен как transport package. В установке MODX откройте `Extras` > `Installer` и нажмите Download Extras. Найдите Fred в поиске.

В списке также будут Extras для Fred, например Font Awesome icon picker и TinyMCE RTE. Если вы их добавляете, следуйте инструкциям по настройке.

После загрузки установите пакеты из сетки Packages.

## Шаг 2: Настройка Template

Fred нужна «dropzone», чтобы знать, куда помещать контент. Добавьте атрибут `data-fred-dropzone` к HTML-элементу, часто к тегу `div`. Там, где в Template обычно стоит `[[*content]]`, добавьте следующее:

```html
<div data-fred-dropzone="content">
    [[*content]]
</div>
```

Значение `data-fred-dropzone="content"` указывает, куда сохранять отрендеренный контент Fred, в данном случае в `[[*content]]`. Fred поддерживает несколько Dropzones. Подробнее см. [документацию по templates](extras/fred/templates).

## Шаг 3: Назначение Template теме Fred

1. В MODX Manager откройте меню `Extras` > `Fred` > вкладка `Themes` и перейдите в боковую панель `Themed Templates`
2. Нажмите `Assign Theme to a Template`
3. Выберите все Templates, которые хотите использовать с этой темой Fred
4. Выберите тему `Default`
5. Нажмите `Save`

Resources с Templates, назначенными теме Fred, получат кнопку «Open in Fred» в Manager. На фронтенде вы увидите три иконки запуска Fred внизу слева или боковую панель Fred.

## Шаг 4: Создание Categories для Elements

Fred группирует Elements по категориям. Откройте страницу Elements Manager через `Extras` > `Fred` > `Elements` и на вкладке `Categories` создайте категории. Для демо, например:

-   Page Content
-   Intros
-   Text
-   Images
-   Testimonials
-   …

Перед созданием content Element нужна хотя бы одна Category.

## Шаг 5: Создание первых Elements

Fred Elements могут быть простым текстом или сложной вёрсткой вроде адаптивной карточки товара. Начните с простого заголовка, часто первого блока на странице.

На вкладке `Elements` в CMP Elements (`Extras` > `Fred` > `Elements`) нажмите `Create Element`. Заполните имя (`H1 Heading`), category (`Blocks`), image (`https://placehold.it/300x150&text=H1+Heading`).

Добавьте разметку:

```html
<h1 data-fred-name="heading">H1 Heading</h1>
```

![Element Creation 3PC Screenshot](../media/create-element.png)

Сохраните Element, вернитесь на фронтенд Resource и обновите страницу.

Нажмите оранжевую иконку Elements или иконку MODX в launcher внизу слева. На вкладке Elements в боковой панели появятся категории из шага 4. Наведите на `Text`, найдите `H1 Heading` и перетащите его в пустую dropzone.

<video width="640" height="480" controls>
  <source src="basic-use.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>

Вы добавили первый Element на страницу через Fred.

Выделите текст «Hello, world.» и начните печатать. При наведении на Element появится панель для дублирования, удаления или перемещения. Когда заголовок готов, нажмите зелёную галочку для сохранения.

Создайте Element для одного абзаца:

1. Создайте Element в той же category с именем `Basic Paragraph`, изображением `https://placehold.it/600x150&text=A+paragraph+of+text` и разметкой `<p data-fred-name="paragraph">Your content goes here…</p>`
2. Сохраните в Manager
3. Обновите страницу на фронтенде
4. Перетащите новый Element под заголовок
5. Измените текст и сохраните

<video width="640" height="480" controls>
  <source src="basic-use-2.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>

## Экспорт темы

Fred Manager Extra (3PC) позволяет делиться темами с коллегами или отправить их в [репозиторий MODX Extras](https://modx.com/extras/):

1. Откройте вкладку `Themes`.
2. Найдите тему для публикации.
3. Правый клик по имени и выберите `Build theme`.
4. Заполните поля и выберите один из двух вариантов экспорта внизу.

Готовая к установке тема сохранится в `core/packages/` как файл `{{theme-name}}.transport.zip`. Можно также собрать и скачать копию в локальную папку загрузок.
