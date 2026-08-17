---
title: "Elements"
description: "Создание и обновление Fred Elements в Manager"
translation: "extras/fred/themer/cmp/elements"
---

Elements это базовые блоки для страниц Fred.

## Создание Element

Свойства Element:

-   **Name**, обязательно. Имя Element.
-   **Description**, опционально. Краткое описание Element.
-   **Image**, обязательно. Без изображения Fred создаст серый блок с именем Element. Изображения используются при drag-and-drop Elements в макеты.
-   **Category**, обязательно. Категория Element.
-   **Rank**, опционально. Порядок Element в категории.
-   **Markup**, опционально. HTML и Twig разметка Element, включая [атрибуты Fred](extras/fred/themer/elements/attributes) для целей сохранения, видимости при создании или просмотре и т.д.
-   **Option Set**, опционально. Можно выбрать полный Option Set
-   **Options Override**, опционально. Переопределение выбранного Option Set или разовые options для этого Element

![Element Panel](img/element_panel.png)

![Element Panel Options](img/element_panel_options.png)

## Изображения Element

Изображения Element это превью для drag-and-drop на страницы. Вы можете сделать свои превью или Fred создаст их двумя способами:

-   серый блок с именем Element по центру (по умолчанию, если изображение не задано)
-   после использования Element, при праве «Take Screenshots», по иконке камеры над Element в фокусе

**Note:** Библиотека скриншотов хорошая, но не все CSS-свойства понимает. Превью может выглядеть не идеально. Для лучшего результата делайте ручные скриншоты шириной 500px.

## Обновление Elements

Elements это мастер-шаблоны, их можно менять в любой момент. При обновлении разметки или option set Element все вхождения на сайте должны отразить изменения.

Чтобы увидеть результат, пересохраните страницу или используйте вкладку «Rebuild» в Fred 3PC.
