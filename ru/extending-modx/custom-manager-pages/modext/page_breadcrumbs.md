---
title: "MODx.util.getHeaderBreadCrumbs"
translation: "extending-modx/custom-manager-pages/modext/page_breadcrumbs"
---

## MODx.util.getHeaderBreadCrumbs

Для некоторых страниц вы можете захотеть показывать хлебные крошки как быстрый способ навигации по иерархии. В `MODx.util` есть функция `getHeaderBreadCrumbs`, которая сделает заголовок крошки для вашей страницы.

## Parameters

| Имя    | Описание                                                                                                                                                  | По умолчанию |
| ------ | --------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
| header | Строковый идентификатор заголовка, который должен быть создан, или объекта заголовка (также необходим идентификатор).                                     |              |
| trail  | Массив объектов trail. Объект trail должен иметь свойства `text` и `href`. Если вы не хотите устанавливать `href`, установите его как `null` или `false`. | []           |

## Returns

Эта функция возвращает объект `modx-breadcrumbs-panel` с таким идентификатором: `modx-header-breadcrumbs`. Функции которые стоит отметить, которые вы можете использовать:

-   updateTrail - принимает параметры `trail` и `replace`. `trail` может быть массивом объектов следа или отдельным объектом следа. Если значение `true` передано в `replace`, весь `trail` будет заменен
-   updateHeader - принимает в качестве параметра `text` и обновляет сам заголовок (последняя часть хлебных крошек)

## Примеры

Примеры использования можно найти в `modx.panel.resource.js`, `modx.panel.user.js`, `modx.panel.source.js` или`modx.panel.context.js`.

Обычно вы вызываете элементы панели утилит функции и определяете домашнюю крошку:

```javascript
MODx.util.getHeaderBreadCrumbs("modx-context-name", [
    {
        text: _("contexts"),
        href: MODx.getPage("context")
    }
]);
```

Затем из слушателя `setup` или ключевых событий `name` (или любого другого), переданного, вы вызываете `updateHeader`:

```javascript
Ext.getCmp("modx-header-breadcrumbs").updateHeader(r.object.key);
```
