---
title: "О темах Fred"
description: "Состав темы, Default Element, сборка transport package для публикации"
translation: "extras/fred/themer/cmp/themes"
---

У большинства пользователей одна тема, но на сайте может быть несколько. Тема включает всё для создания сайта _кроме_ примеров страниц (исключение: Blueprints ниже).

Несколько Themes позволяют авторам выпускать разные темы с общими options (Option sets) между Elements.

## Из чего состоит Theme

Themes состоят из нескольких частей:

-   О темах Fred
    -   Из чего состоит Theme
        -   Default Element
        -   Elements
        -   Blueprints
        -   Templates and TVs
        -   Categories
        -   Extras
        -   Assets
        -   License, Changelog and Readme Files
    -   Сборка Theme для публикации

При создании Theme Fred автоматически создаёт каталог `assets/themes/{{theme-name}}`. Храните там assets темы: images, css, fonts и javascript.

**ВАЖНО:** В версии 1.0 Fred не экспортирует Media Sources. Если вы их использовали, опишите настройку в README.

### Default Element

Default element задаёт Fred Element по умолчанию и target area для контента существующих документов. Формат `ID|target`, где ID это номер Fred Element, а target HTML object с `data-fred-name`. Полезно при переводе обычного resource на Fred: существующий контент попадёт в default element.

Если не видите ID Fred Element, правый клик по заголовку сетки elements и включите колонку ID.

### Elements

Theme Builder автоматически включает все Element Categories темы со всеми [Elements](extras/fred/elements). Также включаются все [Option Sets](extras/fred/themer/cmp/option_sets) и [RTE Configs](rte_configs.md) темы.

### Blueprints

Theme Builder автоматически включает **public** Blueprint Categories темы со всеми **public** [Blueprints](extras/fred/blueprints).

### Templates and TVs

Theme Builder включает все MODX Templates темы. TV, назначенные этим Templates, тоже включаются.

### Categories

Пользователь выбирает корневую MODX Category для темы. Theme Builder включает все дочерние categories, snippets, chunks и plugins корневой или дочерней category.

### Extras

Extras это MODX packages, нужные теме для полной работы. Пользователь должен установить все перечисленные extras перед установкой Theme. `Fred` всегда в зависимостях по умолчанию.

### Assets

Assets темы: CSS/SASS/SCSS, images, JS и похожие файлы упаковываются в `assets/theme/{{your-theme-name}}`.

### License, Changelog and Readme Files

Эти файлы показываются при установке Extra из MODX Package Manager.

## Сборка Theme для публикации

Fred Manager Extra (3PC) позволяет делиться темами с коллегами или отправить их в [репозиторий MODX Extras](https://modx.com/extras/):

1. Откройте вкладку `Themes`.
2. Найдите тему для публикации.
3. Правый клик по имени и выберите `Build theme`.
4. Заполните поля и выберите один из двух вариантов экспорта внизу.

Готовая к установке тема сохранится в `core/packages/` как `{{theme-name}}.transport.zip`. Можно также собрать и скачать копию в локальную папку загрузок.
