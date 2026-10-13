---
title: "modX.getVersionData"
description: "Возвращает данные версии ядра modX."
translation: "extending-modx/modx-class/reference/modx.getversiondata"
---

## modX::getVersionData

Возвращает данные версии ядра modX. Массив содержит следующие ключи (примеры для версии "MODX Revolution 3.3.0-dev"):

| Ключ | Пример | Значение |
|---|---|---|
| `version` | `'3'` | Текущий номер версии |
| `major_version` | `'3'` | Текущий основной номер версии |
| `minor_version` | `'0'` | Текущий номер младшей версии |
| `patch_level` | `'dev'` | Текущий уровень выпуска |
| `code_name` | `'Revolution'` | Кодовое название продукта |
| `distro` | `'@git@'` | Маркер дистрибутива сборки; для выпущенного пакета — имя дистрибутива |
| `full_version` | `'3.3.0-dev'` | Скомпилированное полное имя версии |
| `full_appname` | `'MODX Revolution 3.3.0-dev (git)'` | Полное имя версии |

## Синтаксис

``` php
array getVersionData ()
```

## Пример

Распечатайте текущую полную версию:

``` php
$vers = $modx->getVersionData();
echo $vers['full_version'];
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
