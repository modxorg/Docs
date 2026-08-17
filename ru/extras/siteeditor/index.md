---
title: "SiteEditor"
description: "Редактирование сайта MODX с фронтенда без менеджера"
translation: "extras/siteeditor/index"
---

## Что такое SiteEditor?

SiteEditor позволяет вам или клиентам редактировать сайт MODX© с фронтенда, без менеджера.

Сейчас alpha: права доступа не интегрированы, редактируются только text / richtext поля ресурсов и TV.

SiteEditor создан и поддерживается [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

## Требования

SiteEditor требует MODX® Revolution 2.1.x или новее.

## История

| Version      | Release date        | Author                                                                                                                                      | Changes          |
| ------------ | ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- |
| 0.0.1-alpha1 | February 25th, 2013 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release. |

## Загрузка и установка

Установите пакет через package manager MODX®.

## Настройка SiteEditor

Перед использованием на фронтенде добавьте SiteEditor к полям в шаблоне или чанке.

**Сейчас нужен вход в менеджер перед редактированием на фронтенде. Войдите в менеджер, затем откройте сайт.**

Для `[[*introtext]]` с SiteEditor:

``` php
[[*introtext:siteEditorField]]
```

Тот же подход для TV и других полей. SiteEditor сохраняет в **ТЕКУЩИЙ РЕСУРС**. Чтобы редактировать поля других ресурсов с текущей страницы (например пункты меню), откройте чанк меню.
Вместо `[[*pagetitle]]` будет `[[+pagetitle]]`. При `+` укажите SiteEditor ID ресурса:

``` php
[[+pagetitle:siteEditorField=`resource=[[+id]]`]]
```

В wayfinder placeholder другое имя, в row wayfinder:

``` php
[[+wf.linktext:siteEditorField=`resource=[[+wf.docid]]&field=pagetitle`]]
```

SiteEditor получает pagetitle ресурса `[[+wf.docid]]`. Можно редактировать заголовки меню с фронтенда.

Добавьте в getResources row TPL:

``` php
[[+pagetitle:siteEditorField=`resource=[[+id]]`]]
[[+introtext:siteEditorField=`resource=[[+id]]`]]
```

Наведите на поле на фронтенде, появится карандаш. Клик, правка, клик в пустое место для сохранения.

## Примеры

Пример шаблона с SiteEditor:

``` php
<html>
    <head>
    </head>
    <body>
        <h1>[[*pagetitle:siteEditorField]]</h1>
        <p>
                [[*introtext:siteEditorField]]
        </p>
        [[*content:siteEditorField]]
        <hr />
        [[*footerTv:siteEditorField]]
    </body>
</html>
```

Пример getResources rowTpl:

``` php
<li>
    <a href="[[~[[+id]]]]">[[+pagetitle:siteEditorField=`resource=[[+id]]`]]</a>
</li>
```

## Внешние источники

Developers website: <http://www.scherpontwikkeling.nl>
