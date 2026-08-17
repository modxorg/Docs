---
title: "Конфигурации Rich Text Editor (RTE)"
description: "Управление RTE configs в Manager и переопределение через data-fred-rte-config"
translation: "extras/fred/themer/cmp/rte_configs"
---

На вкладке RTE Configs вы управляете наборами конфигурации для установленных RTE.

![RTE Configs Grid](img/rte_configs_grid.png)

RTE configs должны иметь уникальное имя. Оно используется в атрибуте [data-fred-rte-config](extras/fred/themer/elements/attributes) для выбора RTE.

Убедитесь, что RTE configs это валидный JSON. Можно использовать [JSON Lint](https://jsonlint.com/) или Extra [ACE editor](https://modx.com/extras/package/ace), который помечает невалидный JSON белым X в красном квадрате в колонке номеров строк.

## Конфигурации по умолчанию

Если config называется как ваш RTE, например `TinyMCE`, он используется по умолчанию и перекрывает defaults RTE. О создании RTE configurations и примерах для TinyMCE for Fred Extra см. [документацию RTE examples](extras/fred/themer/rte_configs).

### Переопределение конфигураций по умолчанию

Fred option sets могут задавать RTE configuration для каждого Element. Атрибут [data-fred-rte-config](extras/fred/themer/elements/attributes) на HTML Element с `data-fred-name` (если data-fred-editable не false) перекрывает и default, и settings из option set.
