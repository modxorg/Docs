---
title: "getFeed"
description: "Сниппет для чтения RSS и вывода элементов через чанк"
translation: "extras/getfeed/index"
---

## Что такое getFeed?

Простой сниппет для получения RSS-ленты и итерации элементов через чанк.

## Требования

- MODX Revolution 2.0.0-RC-2 или новее
- PHP5 или новее

## История

getFeed написал [Jason Coward](https://github.com/opengeek), первый релиз 11 июня 2010 года.

### Загрузка

Скачайте через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из MODX Extras Repository: <https://modx.com/extras/package/getfeed>

### Разработка и сообщения об ошибках

getFeed на GitHub: <http://github.com/splittingred/getFeed>

Issues: <http://github.com/splittingred/getFeed/issues>

## Использование

Вставьте вызов сниппета в контент и передайте параметр «url»:

``` php
[[!getFeed? &url=`http://path.com/to/my/rss.feed.rss`]]
```

### Доступные свойства

| Name          | Description                                                                                                 | Default |
| ------------- | ----------------------------------------------------------------------------------------------------------- | ------- |
| url           | URL ленты для загрузки.                                                                                |         |
| tpl           | Имя чанка для элемента. Если пусто, выводятся массивы плейсхолдеров.                  |         |
| limit         | Лимит элементов. 0: без лимита.                                                         | 0       |
| offset        | Нулевой индекс первого элемента в результатах.                                           | 0       |
| totalVar      | Имя плейсхолдера с общим числом элементов ленты. Для совместимости с getPage. | total   |
| toPlaceholder | Если задано, вывод попадёт в этот плейсхолдер. Иначе результат выводится напрямую.         |         |

### Плейсхолдеры чанка

Разные ленты дают разные плейсхолдеры. Вызовите getFeed без «tpl», чтобы увидеть массив полей и значений. Ключи массива используйте как плейсхолдеры.

Частые плейсхолдеры:

- **title**: заголовок записи.
- **link**: прямая ссылка на запись.
- **description**: описание записи.
- **pubdate**: дата публикации.
- **guid**: GUID записи.
- **author**: автор записи.
- **category**: теги или категории записи.
- **summary**: краткое summary записи.
- **date\_timestamp**: timestamp записи.

## Примеры

- [Adding a Twitter Feed](extras/getfeed/getfeed.adding-a-twitter-feed "getFeed.Adding a Twitter Feed")
