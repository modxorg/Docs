---
title: "HitsPage"
description: "Плагин для подсчёта HTTP-запросов (просмотров) страницы"
translation: "extras/hitspage/index"
---

## Что такое HitsPage?

HitsPage это плагин, который считает число HTTP-запросов или «просмотров» заданной веб-страницы.

## Требования

MODX Revolution 2.1.x или новее

## История

HitsPage написал Valentine Rasulov, релиз 27 октября 2011 года.

### Загрузка

HitsPage можно скачать через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из репозитория MODX Extras:

<https://modx.com/extras/package/hitspage>

## Использование

При установке HitsPage создаёт две новые [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables"): «HitsPage» и «hits». На момент написания TV «hits» избыточна.

На [ресурсе](building-sites/resources "Resource"), для которого вы хотите считать просмотры, используйте плейсхолдер:

``` php
[[!+hitss]]
```

Его можно поместить в content ресурса или в [шаблон](making-sites-with-modx/structuring-your-site/templates "Templates"), но он ОБЯЗАТЕЛЬНО должен быть на странице, которую вы отслеживаете. Вывод можно скрыть через CSS.

**Особенность поведения**
НЕ используйте TV-тег для вывода на странице. Это ломает плагин. Используйте только в &tpl чанках (см. ниже).

Когда плейсхолдер на месте, TV «HitsPage» динамически обновляется счётчиком просмотров и доступна [сниппетам](developing-in-modx/basic-development/snippets "Snippets") через Tpl [чанки](making-sites-with-modx/structuring-your-site/chunks "Chunks").

## Примеры

Вызов [getResources](extras/getresources "getResources") с таким &tpl вернёт список страниц с заголовками и числом просмотров:

``` php
<li>[[+pagetitle]] has been viewed [[+tv.HitsPage]] times.</li>
```

**Пример использования**
Виджет «Most Popular Posts» можно собрать по туториалу: <http://www.sepiariver.ca/blog/modx-web/modx-popular-posts-plugin-hit-counter-getresources>
