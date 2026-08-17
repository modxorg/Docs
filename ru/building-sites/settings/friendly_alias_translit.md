---
title: "friendly_alias_translit"
translation: "building-sites/settings/friendly_alias_translit"
---

## friendly_alias_translit

-   **Имя**: Транслитерация псевдонимов
-   **Тип**: textfield
-   **По умолчанию**: none
-   **Доступно в**: Revolution 2.0.8+

Метод транслитерации для псевдонима ресурса. Пустое значение или `none` отключает транслитерацию (значение по умолчанию в поставке). Другие варианты:

- `iconv` (если есть расширение PHP)
- `iconv_ascii` (принудительно в ASCII через iconv)
- имя таблицы из сервисного класса, например пакета [Translit](https://extras.modx.com/package/translit) (`russian` и т.п.)

Класс сервиса задаётся в [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class). Гайд: [Транслитерация псевдонимов](getting-started/friendly-urls/transliteration).
