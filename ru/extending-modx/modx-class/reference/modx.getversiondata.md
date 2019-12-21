---
title: "modX.getVersionData"
translation: "extending-modx/modx-class/reference/modx.getversiondata"
---

## modX::getVersionData

Возвращает данные версии ядра modX. Массив содержит следующие ключи (примеры для версии " MODX Revolution 2.0.0-beta-3"):

- `version` - Текущий номер версии, например: 2
- `major_version` - Текущий основной номер версии, например: 0
- `minor_version` - Текущий номер младшей версии, например: 0
- `patch_level` - Текущий уровень выпуска, например: 'beta-3'
- `code_name` - Кодовое название продукта, например: 'Revolution'
- `full_version` - Скомпилированное полное имя версии, например: '2.0.0-beta-3'
- `full_appname` - Полное имя версии, например: 'MODX Revolution 2.0.0-beta-3'

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getVersionData()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getVersionData())

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
