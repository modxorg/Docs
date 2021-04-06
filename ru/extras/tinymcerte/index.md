---
title: "TinyMCE RTE Редактор"
description: "TinyMCE это платформенно-независимый Javascript HTML WYSIWYG веб-редактор. Он позволяет простым пользователям форматировать контент, не зная, как кодировать"
translation: "extras/tinymcerte"
---

## Что такое редактор TinyMCE RTE?

TinyMCE это платформенно-независимый Javascript HTML WYSIWYG веб-редактор. Он позволяет простым пользователям форматировать контент, не зная, как кодировать. Этот выпуск был разработан в качестве сопутствующего проекта для [<a11y.modx.com>](https://a11y.modx.com), чтобы обеспечить доступный RTE. Он основан на кодовой базе TinyMCE 5. 

## Новое в версии TinyMCE Rich Text Editor 2.0.0

- Обновление TinyMCE до 5-й версии
- Совместимость с MODX 3
- Отредактирован плагин `modxlink` TinyMCE для использования вложенной опции `link_list`
- Отредактирован плагин `modximage` TinyMCE.
- Рекурсивное слияние внешнего конфига с базовым конфигом
- Удален устаревший `file_browser_callback`, вместо него будет использован `file_picker_callback`
- Добавлена системная настройка `link_list_enable`
- Разрешены прямые элементы `style_formats` на основе JSON
- Добавлен MODX `skintool.json` для [TinyMCE 5 Skin Tool](http://skin.tiny.cloud/t5/) 


## История

- Автор: Jan Peca [theboxer](https://github.com/theboxer)
- Контрибьюторы: [jako](https://modx.com/extras/author/jako)

## Скачать

TinyMCE Rich Text Editor можно загрузить и установить из MODX через [Управление Пакетами](developing-in-modx/advanced-development/package-management "Управление Пакетами") (**Пакеты** > **Установщик**), или из [Официального MODX репозитория](https://modx.com/extras/package/upgrademodx).

## Разработка и ошибки

TinyMCE Rich Text Editor хранится и разрабатывается с использованием GitHub, и его можно найти здесь: [TinyMCE RTE GitHub главная страница](https://github.com/modxcms/tinymce-rte).

Здесь можно отправлять сообщения об ошибках и запросы функционала: [TinyMCE Rich Text Editor ошибки](https://github.com/modxcms/tinymce-rte/issues).

## Смотри также

1. [Tiny Cloud Документация](https://www.tiny.cloud/docs/)
2. [Подключение своих шрифтов](extras/tinymcerte/customfonts)
3. [TinyMCE WYSIWYG редактор](extras/tinymce)