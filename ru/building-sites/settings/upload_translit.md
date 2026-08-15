---
title: 'upload_translit'
translation: 'building-sites/settings/upload_translit'
description: 'Транслитерация имён загружаемых файлов теми же правилами path-segment, что и для псевдонимов Friendly URL.'
---

## upload\_translit

**Name**: Транслитерировать имена загружаемых файлов?
**Type**: Да/Нет
**Default**: Да
**Available In**: MODX 3.0+

При значении **Да** Media Manager (и другие загрузки через media source) перед сохранением пропускают имя файла через `modX::filterPathSegment()`. Это тот же санитайзер, что для псевдонимов ресурсов. Результат зависит от [friendly_alias_translit](building-sites/settings/friendly_alias_translit) (в том числе Translitor / именованная таблица транслитерации), разделителей слов, лимита длины и ограничений на символы.

### Пропадает точка перед расширением

Если в активном шаблоне ограничения символов есть `.`, санитайзер убирает все точки. `photo.jpg` превращается в `photojpg`. Браузер файл иногда открывает, но Manager видит пустое расширение (удаление/переименование может дать «тип файла не разрешён»).

Чаще всего `.` добавили в [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern), чтобы в псевдонимах ресурсов не было точек. В MODX **3.1.0+** задайте отдельный шаблон для загрузок в [upload_translit_restrict_chars_pattern](building-sites/settings/upload_translit_restrict_chars_pattern) и не включайте в него `.` (в значении по умолчанию точки нет). На старых сборках 3.0.x уберите `.` из FURL-шаблона или поставьте **upload_translit** в **Нет**.

Остальные настройки Friendly URL тоже действуют на всё имя, включая расширение. Низкий [friendly_alias_max_length](building-sites/settings/friendly_alias_max_length) может обрезать `very-long-name.jpg` и так же «съесть» расширение.

### Связанные настройки

- [upload_translit_restrict_chars_pattern](building-sites/settings/upload_translit_restrict_chars_pattern) (3.1.0+)
- [friendly_alias_translit](building-sites/settings/friendly_alias_translit)
- [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern)
- [friendly_alias_max_length](building-sites/settings/friendly_alias_max_length)
