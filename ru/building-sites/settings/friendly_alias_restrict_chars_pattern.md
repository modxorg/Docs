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
