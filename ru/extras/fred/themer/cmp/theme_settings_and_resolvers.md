---
title: "Theme Settings, Extract Templates и Resolvers"
description: "fred.theme.*, extract templates для Extras и PHP resolvers при установке"
translation: "extras/fred/themer/cmp/theme_settings_and_resolvers"
---

Theme settings и custom resolvers делают темы переносимее и гибче без ручной настройки после установки.

## Theme Settings

При сборке темы Fred автоматически включает все system settings namespace темы. Ключи должны иметь префикс `fred.theme.theme-name`, где `theme-name` имя темы. Пример для цвета фона в демо One Pager: `fred.theme.one-pager.bg-color`.

Каждая тема включает system setting `fred.theme.theme-name.theme_dir`, создаваемый по умолчанию. Это web-доступные assets темы: images и css.

В сборку попадают только settings конкретной темы. Проверьте префикс и namespace, иначе settings будут проигнорированы.

## Extract Template

Extract Templates позволяют включить settings или configuration Extras, используемых в Themes. Формат:

```json
{
    "packages": [],
    "vehicles": []
}
```

`packages` это массив из одного или нескольких third-party packages. Вызывается метод [`$modx->getService`](https://github.com/modxcms/xpdo/blob/2.x/xpdo/xpdo.class.php#L1224) с параметрами:

-   `name`: имя package, обычно lowercase
-   `class`: имя service class, часто camel case
-   `componentName`: необязательно, по умолчанию `name`, каталог внутри `components/`
-   `modelName`: необязательно, по умолчанию `name`, каталог внутри `model/`
-   `settingPrefix`: необязательно, по умолчанию `name`, префикс system setting при custom core path

`vehicles` это соответствующий массив vehicles в формате vehicle object:

-   `object`: обёртка со свойствами:
    -   `class`: имя xPDO class
    -   `graph`: xPDO graph
    -   `criteria`: необязательно, по умолчанию `[]`, xPDO criteria для фильтра объектов
    -   `graphCriteria`: необязательно, по умолчанию `null`, xPDO graph criteria
-   `attributes`: xPDOTransport attributes

### Пример для MODX Minify

```json
{
    "packages": [
        {
            "name": "modxminify",
            "class": "modxMinify"
        }
    ],
    "vehicles": [
        {
            "object": {
                "class": "modxMinifyGroup",
                "graph": {
                    "File": []
                }
            },
            "attributes": {
                "preserve_keys": false,
                "update_object": true,
                "unique_key": "name",
                "related_objects": true,
                "related_object_attributes": {
                    "File": {
                        "preserve_keys": false,
                        "update_object": true,
                        "unique_key": "filename"
                    }
                }
            }
        }
    ]
}
```

### Пример для Client Config

```json
{
    "packages": [
        {
            "name": "clientconfig",
            "class": "ClientConfig"
        }
    ],
    "vehicles": [
        {
            "object": {
                "class": "cgGroup",
                "graph": {
                    "Settings": []
                }
            },
            "attributes": {
                "preserve_keys": false,
                "update_object": true,
                "unique_key": "label",
                "related_objects": true,
                "related_object_attributes": {
                    "Settings": {
                        "preserve_keys": false,
                        "update_object": true,
                        "unique_key": ["key", "group"]
                    }
                }
            }
        }
    ]
}
```

## Resolvers

Для продвинутых разработчиков custom PHP resolvers выполняются после установки темы как финальный шаг установки, или первыми при удалении. Экземпляр `modX` доступен через `$transport->xpdo`. Resolvers запускаются при install, upgrade или uninstall через Packager Installer в MODX Manager.
