---
title: "Транслитерация псевдонимов"
translation: "getting-started/friendly-urls/transliteration"
description: "Как MODX превращает нелатинские заголовки в псевдонимы для Friendly URLs"
---

## Что такое транслитерация

Когда MODX строит псевдоним (alias) ресурса из pagetitle (или когда вы вводите alias), он может заменить не-ASCII символы на удобные для URL. Это и есть транслитерация: `Кафе` станет `kafe`, `Straße` может стать `Strasse`, в зависимости от выбранного метода.

Без транслитерации ограничения по символам могут вырезать буквы и оставить битый или пустой alias. При включённых Friendly URLs чистые псевдонимы дают читаемые адреса.

MODX применяет транслитерацию в `modResource::filterPathSegment()` при генерации и фильтрации сегментов пути. Тот же пайплайн кормит поле alias в менеджере в реальном времени и output-фильтр [`filterPathSegment`](building-sites/tag-syntax/output-filters).

## Какие настройки участвуют

Откройте **Системные настройки**, область **Friendly URL** (поиск по `friendly_alias`):

| Настройка | Назначение |
| --------- | ---------- |
| [friendly\_alias\_translit](building-sites/settings/friendly_alias_translit) | Метод: `none`, `iconv`, `iconv_ascii` или имя таблицы из дополнения |
| [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class) | Сервисный класс для именованных таблиц (по умолчанию `translit.modTransliterate`) |
| [friendly\_alias\_translit\_class\_path](building-sites/settings/friendly_alias_translit_class_path) | Откуда грузить класс (по умолчанию `{core_path}components/`) |
| [automatic\_alias](building-sites/settings/automatic_alias) | Генерировать alias из pagetitle при сохранении, если поле пустое |

Связанные фильтры (разделители слов, нижний регистр, длина, ограничение символов) работают после транслитерации. Смотрите остальные `friendly_alias_*` в той же области.

В стандартной установке `friendly_alias_translit` равен `none` (без транслитерации). В коде, если настройка не задана и есть расширение iconv, запасной вариант: `iconv`. Задайте значение явно, чтобы поведение было понятным.

## Встроенный вариант: none

Оставьте `friendly_alias_translit` пустым или поставьте `none`. Символы не маппятся. Так делают, когда заголовки уже в ASCII или alias вводите вручную.

## Встроенный вариант: iconv

Поставьте `friendly_alias_translit` в `iconv`. Нужно расширение PHP `iconv`.

MODX конвертирует строку с флагами `//TRANSLIT//IGNORE` в кодировку сайта (`modx_charset`, обычно UTF-8). Качество зависит от сборки PHP/iconv и локали. Это быстрый вариант без пакетов, не языковая таблица.

### iconv\_ascii

Значение `iconv_ascii` гонит строку в ASCII (`ASCII//TRANSLIT//IGNORE`). Берите его, если нужны только латинские сегменты URL, а обычный `iconv` всё ещё оставляет не-ASCII.

## Именованные таблицы: пакет Translit

Для стабильных языковых таблиц (русский и другие) установите пакет [Translit](https://extras.modx.com/package/translit) через Управление пакетами. Он даёт класс `translit.modTransliterate`, который уже указан в настройках ядра по умолчанию.

Типичная настройка после установки:

1. Установите **translit**.
2. `friendly_alias_translit_class` = `translit.modTransliterate` (обычно уже так).
3. `friendly_alias_translit_class_path` = `{core_path}components/` (по умолчанию).
4. `friendly_alias_translit` = имя таблицы, например `russian` (не `iconv`).
5. Включите `automatic_alias`, если alias должен создаваться из pagetitle.
6. Очистите кэш сайта.

Значение `friendly_alias_translit`: **имя таблицы**, которую грузит сервис (имя файла без `.php` в таблицах Translit). Другие таблицы или своя копия (например `custom`) работают так же: в настройку пишете имя таблицы.

Другие дополнения (Translitor, yTranslit и похожие) могут ставить свой класс или свои настройки. Следуйте их документации и при необходимости укажите `friendly_alias_translit_class` / path на их сервис.

## Проверка

1. Включите [friendly\_urls](building-sites/settings/friendly_urls) и настройте rewrite ([гайд по Friendly URLs](getting-started/friendly-urls)).
2. Создайте ресурс с нелатинским pagetitle.
3. Сохраните (с `automatic_alias` или подставьте предложенный alias).
4. Убедитесь, что поле alias и URL на сайте в транслите.

Уже сохранённые ресурсы держат старый alias, пока вы его не перегенерируете. Смена настройки сама по себе дерево не переписывает.

## Загрузка файлов

В MODX 3.x настройка [upload\_translit](building-sites/settings/upload_translit) может транслитерировать имена загружаемых файлов по тем же глобальным правилам. Это отдельно от FURL-псевдонимов, но полезно на тех же мультиязычных сайтах.

## См. также

- [Использование дружественных URL](getting-started/friendly-urls)
- [friendly\_alias\_translit](building-sites/settings/friendly_alias_translit)
- [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class)
- [friendly\_alias\_translit\_class\_path](building-sites/settings/friendly_alias_translit_class_path)
- [upload\_translit](building-sites/settings/upload_translit)
- [Translit на extras.modx.com](https://extras.modx.com/package/translit)
