---
title: "getResources. Индексная страница категории с миниатюрами"
translation: "extras/getresources/getresources.examples/category-index-page-with-thumbnails"
description: "Индексная страница категории с миниатюрами через getResources и phpThumbOf"
---

Установите phpThumbOf: он масштабирует миниатюры.

## TV

Нужен способ прикрепить изображение к каждой странице.

1. Создайте новую TV с именем: page-thumbnail
2. Тип ввода: Image
3. Выберите нужные шаблоны в доступе к шаблонам и сохраните.

## Чанки

Удобно выносить вызовы сниппетов в чанк, чтобы RTE не превращал & в &amp;

Создайте чанк с именем list-docs-thumb.

``` php
<div class="list-docs thumb grid">
    [[!getResources?  
        &parents=`[[*id]]`
        &tpl=`list-docs-thumb-tpl`  
        &limit=`100`  
        &sortdir=`ASC`  
        &includeTVs=`1`  
        &includeContent=`1`
        &depth=`0`  
        &sortby=`menuindex`  
    ]]  
</div><!-- eof list-docs -->?
```

 **Создайте второй чанк для шаблона getResources с именем: list-docs-thumb-tpl** (заметили закономерность в именах? Соглашения об именовании помогают.)

``` php
<div class="list-item column span-6">
    <h2>[[+pagetitle]]</h2>
    <a href="[[~[[+id]]]]" title="[[+pagetitle]]">
        <img src="[[+tv.page-thumb:phpthumbof=`w=153&h=200&zc=1`]]" alt="[[+pagetitle]]" />
    </a>  
    <p>[[+introtext]]</p>
</div>  <!-- eof item -->?
```

## Установка

Вставьте `[[$list-docs-thumb]]` на любую страницу с дочерними ресурсами и заполненными TV, и всё заработает.

Если content в шаблоне не используется, можно ускорить вывод, убрав параметр &includeContent :)

Этот пример требует установленного phpThumbOf для отображения изображений. Его можно установить через менеджер пакетов.

Используйте ```&tvFilters=`page-thumb==%` ```, чтобы пропускать ресурсы с пустой TV
