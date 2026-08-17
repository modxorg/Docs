---
title: "Lingua"
description: "Переключатель лексикона MODX для фронтенда без отдельных контекстов"
translation: "extras/lingua/index"
---

Переключатель лексикона MODX для фронтенда.
Скачайте через Package Manager менеджера.
Страница extra: <https://modx.com/extras/package/lingua>.
Issues: <https://github.com/goldsky/Lingua/issues>

## Background

Пакет написал goldsky, первый релиз 6 июня 2013 года, изначально для [Adam Wintle](http://forums.modx.com/u/adamwintle) из [Monogon](http://www.monogon.co) для китайского и тайского сайтов.

Addon создан для мультиязычного сайта без путаницы с контекстами.
Концепция основана на пакете [Translations](https://modx.com/extras/package/translations), но разработан с нуля и по другому пути.

## CMP

Custom Manager Page управляет списком языков и их настройками.

![](lingua_cmp.png)

## Plugin

Плагин управляет cookie и session выбранного языка.
Плагин даёт плейсхолдер **`[[+lingua.cultureKey]]`** для страницы.
Для других сниппетов, например выбора языка в email hook, используйте **`[[!lingua.cultureKey]]`** ниже.

## Snippets

На фронтенде Lingua предоставляет utility-сниппеты.
У всех сниппетов есть &toArray для вывода всех плейсхолдеров и &toPlaceholder для сохранения вывода в указанный плейсхолдер.

### lingua.selector

Сниппет переключателя языка на фронтенде.
Чанки по умолчанию в [стиле dropdown-toggle twitter bootstrap](http://getbootstrap.com/components/#dropdowns).

![](lingua.selector.png)

При клике по ссылке страница перезагружается с дополнительным REQUEST-параметром для языковой session.
Ключ REQUEST задаётся в System Setting, по умолчанию **_lang_**.

#### Properties

| Name       | Description                                                              | Example                 | Default Value                          | Options                                              |
| ---------- | ------------------------------------------------------------------------ | ----------------------- | -------------------------------------- | ---------------------------------------------------- |
| tplWrapper | чанк шаблона обёртки                                                     | &tplWrapper=`chunkName` | lingua.selector.wrapper                | chunk's name, @BINDINGs enabled                      |
| tplItem    | чанк шаблона элемента                                                    | &tplItem=`chunkName`    | lingua.selector.item                   | chunk's name, @BINDINGs enabled                      |
| sortby     | сортировка вывода по имени поля                                          | &tplItem=`lcid_string`  | id                                     | id, local\_name, lang\_code, lcid\_string, lcid\_dec |
| sortdir    | направление сортировки                                                   | &sortdir=`ASC`          | asc                                    | asc, desc                                            |
| phsPrefix  | префикс плейсхолдеров, чтобы не конфликтовать с другими пакетами          | &phsPrefix=`lingua.`    | lingua.                                | (string)                                             |
| codeField  | поле, значение которого используется для options                          | &codeField=`lang_code`  | System Setting's **lingua.code.field** | id, local\_name, lang\_code, lcid\_string, lcid\_dec |

@BINDING в чанках означает:

- chunk name
- @FILE:`[[++core_path]]`path/to/chunk/file.tpl
- @CODE:  `[[+lingua.languages]]`

#### Default Chunks

##### lingua.selector.wrapper

``` php
<div class="container">
    <div class="btn-group">
        <button class="btn btn-link btn-mini dropdown-toggle"
                data-toggle="dropdown"
                >[[%lingua.select_language]]
        </button>
        <ul class="dropdown-menu">
            [[+lingua.languages]]
        </ul>
    </div>
</div>
```

##### lingua.selector.item

``` php
[[+lingua.cultureKey:is=`[[+lingua.lang_code]]`:then=``:else=`<li>
    <a href="[[+lingua.url]]" title="[[+lingua.local_name]]">
        <img src="[[+lingua.flag]]" alt=""/> [[+lingua.local_name]]
    </a>
</li>`]]
```

В этом чанке по умолчанию текущий язык скрывается через Output Filter.

### lingua.cultureKey

Сниппет возвращает текущий активный язык.
Содержит только

``` php
return $modx->cultureKey;
```

Это не то же самое, что

``` php
return $modx->getOption('cultureKey');
```

Этот сниппет ключевой для получения лексиконов языка.

**Version 1: Обратите внимание на восклицательный знак перед %login. Лексикон должен быть +UN+CACHED.**

``` php
[[!%login? &namespace=`Login` &language=`[[!lingua.cultureKey]]`]]
```

**Version 2:** У Lingua своя папка кэша. Переведённые страницы в разных файлах, всё можно кэшировать.

``` php
[[%login? &namespace=`Login` &language=`[[lingua.cultureKey]]`]]
```

### lingua.getField

Сниппет возвращает значение настройки языка Lingua для текущего языка страницы.
Значение переключается на выбранный активный язык.

#### Properties

| Name      | Description                                                 | Example                     | Default Value                          | Options                                                                                                                                   |
| --------- | ----------------------------------------------------------- | --------------------------- | -------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| **field** | любое поле для выборки                                      | &field=`date\_format\_lite` |                                        | all available fields: id, active, local\_name, lang\_code, lcid\_string, lcid\_dec, date\_format\_lite, date\_format\_full, is\_rtl, flag |
| codeField | поле, значение которого используется для options            | &codeField=`lang\_code`     | System Setting's **lingua.code.field** | id, local\_name, lang\_code, lcid\_string, lcid\_dec                                                                                      |

##### Examples

``` php
Created on: [[*createdon:date=`[[!lingua.getField? &field=`date_format_lite`]]`]]
```

### lingua.getValue

Сниппет возвращает переведённое поле ресурса для текущего языка страницы.
Значение переключается на выбранный активный язык.

#### Properties

| Name                            | Description                                                      | Example                       | Default Value    | Options                                                                                                                                |
| ------------------------------- | ---------------------------------------------------------------- | ----------------------------- | ---------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| **field**                       | имя "key" или поля в базе данных. **required \***                 | &field=`pagetitle`            |                  | Main fields: pagetitle, longtitle, description, alias, link\_attributes, introtext, content, menutitle, uri, uri\_override, properties |
| or any Template Variable's name |
| id                              | id ресурса для получения значения                                | &id=``[[+snippetPrefix.id]]`` | Current resource | integer                                                                                                                                |

##### Examples

В rowTpl wayfinder замените плейсхолдер так:

``` php
<li[[+wf.id]][[+wf.classes]]>
    <a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>
        <-- [[-+wf.linktext]] -->
        [[lingua.getValue:default=`[[+wf.linktext]]`? &id=`[[+id]]` &field=`pagetitle`]]
        <!-- rowTpl -->
    </a>
    [[+wf.wrapper]]
</li>
```

## Version 2.0.0+

С версии 2 Lingua хранит клонированный контент ресурса, основной content и все заданные Template Variables.

### Template Variables

Откройте Custom Manager Page (Components > Lingua) и укажите TV, доступные для перевода.

#### Standard MODX fields (pagetitle, content, etc.)

Также **нужно** задать дополнительную настройку для контекста, где работает Lingua.
В дереве ресурсов > правый клик > edit context.

#### Editing the Context

**Right click** на контексте, где должен работать Lingua, затем "**Edit context**":

![](select-context.png)

Добавьте на вкладке "Context Settings":

- key: **modRequest.class**, value: **LinguaRequest**

![](new-context-setting.png)

После сохранения настройка появится в сетке.

![](lingua_context_settings.png)

#### Multiple contexts

Для разных языков в разных контекстах добавьте:

- key: **lingua.langs**, value: **en,de,...**

Эта настройка переопределяет список активных языков из Custom Manager Page.

#### <= Version 2.0.0-beta3

В самом плагине нужно было указать контексты в element tree > Plugin > категория Lingua > плагин Lingua.

На вкладке "Properties" нажмите "Default Properties Locked" и измените:

- name: **lingua.contexts**, value: **web**, **your\_other\_context1**, **your\_other\_context2**

![](lingua_plugin_settings.png)

#### Version 2.0.0-rc1

В этой версии настройки перенесены в System Settings MODX, чтобы не перезаписывались при обновлении.

![](system-settings.png)

### Template Variable's Cloning Patterns

При клонировании TV Lingua дублирует формы ввода TV. Чтобы избежать конфликтов Javascript, Lingua меняет ID в html/js кодах.

Для custom TV создайте новые паттерны.

Откройте CMP, вкладка "Template Variables", затем "Cloning Patterns".

Там примеры паттернов core TV и MIGX.

Можно создать новый или дублировать существующий правым кликом по строке.

![](lingua-cloning-patterns-update.png)

ID для паттернов берите из шаблона TV.

По tutorial " [Adding a Custom TV Type - MODX 2.2](making-sites-with-modx/customizing-content/template-variables/adding-a-custom-tv-type-modx-2.2)" формы ввода лежат в **"core/components/ourtvs/tv/input/tpl/"**.

Найдите ID вида `{$tv->id}` и добавьте их в Cloning Patterns.

## Limitation

Из-за концепции Lingua, клонирования стандартного контента MODX для других языков, нельзя ожидать другую структуру сайта на вторичных языках.

Для этого подходит [Babel](http://rtfm.modx.com/extras/revo/babel).

## Incompatibility

Lingua несовместима с custom TV, которые хранят значения вне базы TV MODX.

Известная несовместимость:

- [SmartTag](extras/smarttag)
- [ContentBlock](https://www.modmore.com/extras/contentblocks/)
