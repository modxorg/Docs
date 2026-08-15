---
title: "friendly_alias_restrict_chars_pattern"
translation: "building-sites/settings/friendly_alias_restrict_chars_pattern"
---

## friendly_alias_restrict_chars_pattern

-   **Имя**: Шаблон для фильтрации символов в псевдонимах
-   **Тип**: Textfield
-   **По умолчанию**: Указано ниже
-   **Доступно в**: Revolution 2.0.6+

Допустимый шаблон RegEx для ограничения символов, используемых в псевдониме ресурса.

По умолчанию:

```php
/[\0\x0B\t\n\r\f\a&=+%#<>"~:`@\?\[\]\{\}\|\^\'\\\\]/
```

Если вы добавили сюда `.`, чтобы в псевдонимах не было точек, не применяйте то же к загрузкам файлов. При включённом [upload_translit](building-sites/settings/upload_translit) в MODX 3.1.0+ для имён файлов используется [upload_translit_restrict_chars_pattern](building-sites/settings/upload_translit_restrict_chars_pattern). На 3.0.x тот же FURL-шаблон чистил и загрузки, поэтому `.` в этой настройке превращал `photo.jpg` в `photojpg`.
