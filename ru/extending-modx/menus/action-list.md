---
title: "Список действий"
translation: "extending-modx/menus/action-list"
description: "Откуда в MODX 3 берутся действия менеджера и как переходить по ним через MODx.loadPage"
---

MODX Revolution использует URL-параметр **a** для определения действия (контроллера) в менеджере; на сервере он читается через `$_REQUEST`. До MODX 2.3 у каждого действия был собственный ID и объект `modAction`; начиная с MODX 2.3 действия устарели, и в параметр **a** передаётся имя действия (путь контроллера). В 3.x `modAction` и URL вида `?a=<id>` удалены.

## Есть ли список действий?

В 3.x фиксированного, генерируемого списка действий менеджера нет. Множество «действий» — это:

- контроллеры под `manager/controllers/default/**` (плюс PSR-4 классы в `core/src/Revolution/Controllers/`) — один файл на страницу менеджера;
- записи меню в `_build/data/transport.core.menus.php`, чьи поля `action` называют эти контроллеры.

Страница «Меню» (`?a=system/action`) редактирует дерево меню; поле Action в ней — обычное текстовое, выпадающего списка известных действий нет.

В 2.x такой список существовал и был захардкожен: `_build/data/transport.core.actions.php` поставлялся с 52 записями `modAction` и фиксированными ID. В 3.x этого файла нет.

Если `a` пуст, менеджер загружает страницу welcome — это настройки `welcome_action` и `welcome_namespace` (значения по умолчанию `welcome` / `core`).

## Действия в JavaScript

JS-объект `MODx.action` из 2.x (карта ID действий, затем имён контроллеров) в 3.x больше не существует — не используйте его. Навигация через `MODx.loadPage()`:

``` javascript
// core-контроллер с параметрами
MODx.loadPage('resource/update', 'id=5');

// контроллер пользовательской страницы в пространстве имён
MODx.loadPage('update', 'namespace=mycomponent&foo=bar&bar=foo');
```

`MODx.loadPage` внутри собирает `?a=…` и существует с 2.0, поэтому эти вызовы работают и в 2.3+, и в 3.x.

### История: до Revolution 2.3

В 2.1/2.2 навигация шла через карту ID `MODx.action`:

``` javascript
// только 2.2 — MODx.action отдаёт имена контроллеров с префиксом пространства имён
MODx.loadPage(MODx.action['resource/update'], 'id=5');
MODx.loadPage(MODx.action['mycomponent:update'], 'foo=bar&bar=foo');
// До Revo 2.2 приходилось использовать это, но можно было столкнуться с ядром или другими пакетами
MODx.loadPage(MODx.action['update'], 'foo=bar&bar=foo');
```

Эти примеры оставлены для чтения старого кода; в 3.x они не выполняются.
