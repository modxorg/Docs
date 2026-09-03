---
title: Интерфейс системы управления в 3.0
translation: "getting-started/upgrading-to-3.0/manager-ui"
---

Система управления в 3.0 остаётся приложением ExtJS с новой темой и правками вёрстки. Здесь собраны оставшиеся изменения интерфейса цикла 3.0, у которых нет отдельной инструкции.

Редизайн установщика и входа описаны в [Обновлении до 3.0](getting-started/upgrading-to-3.0) и на странице [входа в систему управления](building-sites/client-proofing/manager-login). Смена языка описана в [языке системы управления](getting-started/upgrading-to-3.0/manager-language).

## Подсказки

Подсказки с описанием полей можно выключить. Можно задать, сколько они висят на экране:

- [manager_tooltip_enable](building-sites/settings/manager_tooltip_enable) (по умолчанию Да)
- [manager_tooltip_delay](building-sites/settings/manager_tooltip_delay) (по умолчанию 2300 мс, ExtJS `dismissDelay`)

Превью картинок в Медиабраузере задаёт [modx_browser_tree_hide_tooltips](building-sites/settings/modx_browser_tree_hide_tooltips), не эти настройки.

## Профиль и формы ресурсов

- Экраны профиля пользователя используют одну вёрстку. [#14731](https://github.com/modxcms/revolution/pull/14731), [#14420](https://github.com/modxcms/revolution/pull/14420)
- Настройки ресурса и окно быстрого обновления ресурса используют одну раскладку полей. [#14726](https://github.com/modxcms/revolution/pull/14726)
- В формах шаблона и TV вкладка TV стоит перед Настройками. В редактировании ресурса TV тоже стоят раньше. [#14251](https://github.com/modxcms/revolution/pull/14251), [#14250](https://github.com/modxcms/revolution/pull/14250)
- Кнопки «Создать» в таблицах приведены к одному шаблону. [#14312](https://github.com/modxcms/revolution/pull/14312)

## Прочее поведение

- На странице Сведения о системе → Таблицы базы данных после операции с таблицей появляется уведомление об успехе. [#14525](https://github.com/modxcms/revolution/pull/14525)
- Верхняя строка поиска (uberbar) обрезает пробелы по краям запроса. [#14523](https://github.com/modxcms/revolution/pull/14523)
- CSS системы управления начинается с normalize.css. [#14369](https://github.com/modxcms/revolution/pull/14369)
