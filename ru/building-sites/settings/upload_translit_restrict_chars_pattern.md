---
title: 'upload_translit_restrict_chars_pattern'
translation: 'building-sites/settings/upload_translit_restrict_chars_pattern'
description: 'RegEx для очистки имён файлов при upload_translit, отдельно от ограничений псевдонимов ресурсов.'
---

## upload\_translit\_restrict\_chars\_pattern

**Name**: Шаблон ограничения символов в имени файла
**Type**: Textfield
**Default**: (см. ниже)
**Available In**: MODX 3.1.0+

Если [upload_translit](building-sites/settings/upload_translit) включён (**Да**), Media Manager передаёт этот RegEx в `filterPathSegment()` как шаблон ограничения символов для имени загружаемого файла. Так правила для файлов не зависят от [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern).

Если настройка пустая, загрузки используют ограничения Friendly URL.

Значение по умолчанию (тот же класс символов, что у заводского FURL-шаблона, **без** `.`):

``` php
/[\0\x0B\t\n\r\f\a&=+%#<>"~:`@\?\[\]\{\}\|\^\'\\\\]/
```

Не добавляйте `.` в этот шаблон, если не хотите, чтобы `report.pdf` сохранился как `reportpdf`. Чтобы убирать точки только из псевдонимов ресурсов, добавьте `.` в [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern) и оставьте upload-шаблон без точки.
