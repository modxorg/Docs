---
title: "Options"
description: "Option Sets, полные и частичные наборы, импорт и overrides"
translation: "extras/fred/themer/options/index"
---

Options определяют элементы управления для конечных пользователей при настройке Elements. Они задаются в Option Sets, привязанных к Elements.

## Option Sets

Option Sets задают настройки Element и часто используемые поднаборы для Elements.

### Complete Option Sets

Option Sets с флагом `complete` = `Yes` назначают отдельным [Element](extras/fred/themer/elements). Один Option Set можно привязать к нескольким Elements и переиспользовать общие настройки.

### Partial Option Sets

Option Sets с флагом `No` предназначены для [импорта](extras/fred/themer/options/import) в другие Option Sets. Так задают общие настройки или опции, которые повторяются в нескольких наборах, например палитры цветов, отступы или стили текста.

Один option set можно использовать с несколькими Elements. Часто повторяющиеся подразделы option sets выносят в partial option sets и импортируют в другие наборы, например для палитр цветов.

Разные [элементы управления и настройки options](extras/fred/themer/options/settings) дают гибкость при создании и обновлении контента. Элементы управления можно группировать в подгруппы с раскрытием для удобной организации больших option sets.

## Importing

Если похожие Option settings повторяются во многих наборах, организуйте их в partial option sets и [импортируйте](extras/fred/themer/options/import) для более простого управления Option Sets.

## Option Overrides

На странице Fred Manager в форме Create/Edit Element можно задать уникальный невоспроизводимый набор элементов управления. [Overrides](extras/fred/themer/options/override) действуют только на текущий Element и не затрагивают другие Elements с тем же Option Set.
