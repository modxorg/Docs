---
title: "CustomUrls"
description: "Пользовательские паттерны alias и URI для ресурсов MODX"
translation: "extras/customurls/index"
---

## Что такое CustomUrls?

Extra позволяет задавать пользовательские паттерны alias или URI для ресурсов. **Поддерживает пакеты translit и Redirector**.

Паттерны собираются из полей ресурса, TV, сниппетов и output filters с ограничениями, как в custom forms.

Например, CustomURLs может добавить ID ресурса или месяц публикации в alias всех ресурсов или только для parent = 1 или template = 1.

### Требования

- MODX Revolution 2.2.x или новее
- PHP5 или новее

### Публичные релизы

| Version   | Date              | Author       | Product    |
| --------- | ----------------- | ------------ | ---------- |
| 1.0.0-rc2 | September 9, 2012 | ben\_omycode | Revolution |
| 1.0.0-rc1 | August 23, 2012   | ben\_omycode | Revolution |

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/customurls>

### Поддержка, комментарии, разработка и баги

**Github** : <https://github.com/benjamin-vauchel/customurls>
**Support/Comments** : <http://forums.modx.com/thread/78843/support-comments-for-customurls>

## Использование

Для старта откройте Components > Custom URLs и добавьте правило.

### Свойства правил

| Name             | Description                                                                                                                                                               | Example                |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------- |
| Pattern          | Паттерн URL из текста, полей ресурса, TV, сниппета и output filters. Можно использовать плейсхолдер _cu.parent_ для полного пути alias родителей. | `[[+id]]`-`[[+alias]]` |
| Constraint field | Любое поле ресурса: id, parent, template ...                                                                                                                      | template               |
| Constraint value |                                                                                                                                                                           | 2                      |
| User group       | Группа пользователей, для которой правило активно                                                                                                                                        | Administrators         |
| URI              | По умолчанию создаётся alias, можно выбрать создание URI                                                                                                  | false                  |
| Override         | Перезаписывать alias или URI при обновлении ресурса.                                                                                                                           | true                   |
| Active           | Правило активно?                                                                                                                                                      | true                   |

## Примеры паттернов

Простой текст:

``` php
simple-text
```

Стандартный alias MODx:

``` php
[[+alias]]
```

Плейсхолдеры ресурса:

``` php
[[+id]]-[[+alias]]
```

TV:

``` php
[[+tv.mytv]]-[[+id]]
```

Сниппеты:

``` php
[[MySnippet? &id=`[[+id]]`]]
```

Output filters:

``` php
[[+publishedon:strtotime:date=`%Y-%m-%d`]]/[[+id]]-[[+alias]]
```

Стандартный URI MODx:

``` php
[[+cu.parent_uri]]/[[+alias]]
```

Более сложный URI

``` php
[[+cu.parent_uri]]/some-text/[[getResourceField? &id=`[[+parent]]`]]/[[+id]]-[[+alias]]
```
