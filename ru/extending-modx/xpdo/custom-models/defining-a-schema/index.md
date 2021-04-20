---
title: "Определение Схемы"
translation: "extending-modx/xpdo/custom-models/defining-a-schema"
description: "xPDO генерирует свои файлы карт и классов, которые обеспечивают взаимосвязь между базами данных, из файлов схемы XML"
---

## Что такое Схема?

xPDO генерирует свои файлы карт и классов, которые обеспечивают взаимосвязь между базами данных, из файлов схемы XML. Схема XML основана на пакете, который определяет имя схемы и позволяет xPDO динамически загружать схему с ее классами в любое время, используя [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage).

### Версия схемы

Обратите внимание, что версия схемы по умолчанию изменена в xPDO `2.0.0-rc3` на версию `1.1`. Если вы создали свою модель в выпусках до `2.0.0-rc3` и хотите использовать новые элементы индекса для описания своих индексов, вы можете перейти на новый формат схемы с помощью инструмента обновления, включенного в xPDO. Смотрите [Обновление Модели до версий Схемы 1.1](extending-modx/xpdo/custom-models/defining-a-schema/upgrade-schema-v1.0-to-v1.1) для более подробной информации.

- [Определение базы данных и таблиц](extending-modx/xpdo/custom-models/defining-a-schema/database-and-tables)
- [Обновление Моделей до версии Схемы 1.1](extending-modx/xpdo/custom-models/defining-a-schema/upgrade-schema-v1.0-to-v1.1)
- [Определение Отношений](extending-modx/xpdo/custom-models/defining-a-schema/relationships)
- [Больше примеров файлов схемы xPDO XML](extending-modx/xpdo/custom-models/defining-a-schema/more-examples)
