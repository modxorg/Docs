---
title: "Разработка для Fred"
description: "Расширение Fred через плагины, события MODX и toolbar/sidebar"
translation: "extras/fred/developer/index"
---

Fred поддерживается [на Github](https://github.com/modxcms/fred) как open source проект под лицензией MIT. Issues и Pull Requests с улучшениями и исправлениями приветствуются.

Разработчики могут расширять Fred плагинами. Известные плагины Fred:

-   **Fred Ace Integration**, подсказки кода type-ahead в Fred Manager для авторов тем
-   **TinyMCE for Fred**, редактирование rich text в Fred через TinyMCE с конфигурацией на Element
-   **Font Awesome 5 icon picker**, выбор иконок Font Awesome 5 в контенте

## События MODX

[События MODX](extras/fred/developer/modx_events) позволяют Fred взаимодействовать с другими действиями через плагины Fred. Плагины регистрируют на одно или несколько событий в зависимости от задачи.

## Toolbar Plugins

Дополнительный функционал для Elements, например выбор маркера Google Map, регистрируют через [Toolbar Plugins](extras/fred/developer/toolbar_plugins).

## Sidebar Plugins

Дополнительный функционал sidebar, например медиа-менеджер или галерея, создают через [Sidebar Plugins](extras/fred/developer/sidebar_plugins).
