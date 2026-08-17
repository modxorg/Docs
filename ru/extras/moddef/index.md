---
title: "ModDef"
description: "Компонент для управления определениями терминов с подсказками на сайте"
translation: "extras/moddef/index"
---

## Что такое ModDef?

ModDef это компонент для управления определениями терминов на сайте. Определения отображаются как tooltips.

## Возможности

-   управление определениями
-   одно определение на нескольких языках

## История

Разрабатывается с 2 марта 2011 года [Jeroen Kenters](https://modx.com/extras/author/jeroenkenters).

| Version                                               | Release date | Contributors   | Remarks / highlights |
| ----------------------------------------------------- | ------------ | -------------- | -------------------- |
| [0.1.0 alpha](https://modx.com/extras/package/moddef) | Mar 02, 2011 | Jeroen Kenters | Initial release.     |

### Требования

-   MODX Revolution

### Разработка и сообщения об ошибках

ModDef развивается на Github. Там же **[report bugs](https://github.com/jkenters/ModDef/issues)**, **feature requests** и **improvements**. Можно получить последние коммиты из ветки Develop.

Github: <https://github.com/jkenters/ModDef>

## Установка

1. Установите через Package Management
2. Если jQuery уже в шаблоне, удалите его из чанка moddefHeader
3. Добавьте чанк moddefHeader в шаблон (в секцию head)
4. При необходимости настройте CSS

### Устранение неполадок

Это ранняя beta, после установки многое может пойти не так. Отключите plugin при проблемах. Не забудьте сообщить об ошибках на [github page](https://github.com/jkenters/ModDef/issues)!

## Использование

После установки откройте Components -> ModDef. Здесь вы добавляете, обновляете и удаляете определения. Введите код языка (en, nl и т.д.), текст для замены и определение. После сохранения слово заменится во всех абзацах (<p> tags) на сайте.

## Примеры

Допустим, вы хотите объяснить посетителям, что CMS значит Content Management System.

1. Откройте менеджер
2. Выберите ModDef в меню Components
3. Нажмите кнопку «New definition»
4. Заполните поля:
   4.1. Language: en (или код языка вашего сайта)
   4.2. Text: CMS
   4.3. Definition: Content Management System
5. Нажмите save

Теперь слово CMS станет tooltip во всех абзацах сайта с объяснением, что CMS значит Content Management System.
