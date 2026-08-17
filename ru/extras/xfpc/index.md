---
title: "xFPC"
description: "Полностраничное кеширование MODX Revolution с поддержкой динамического AJAX-контента"
translation: "extras/xfpc/index"
---

## Что такое xFPC?

xFPC: MODX Full Page Caching.

Компонент кеширует целые страницы MODX. Динамический контент можно вставлять через простой AJAX-сниппет. После установки кеширование начинается сразу. Время ответа сокращается до нескольких миллисекунд на запрос.

Технические навыки для установки и использования не нужны. Серверные файлы менять не требуется. Установите и пользуйтесь.

xFPC создан и поддерживается [SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl).

Отзывы после публикации первой версии:

@**jkenters**: "Yeah, totally awesome! Thanks for this! 500ms -> 60ms :-)"
@**gallenkamp**: "How can I pay you for this? Dude, this is awesome! #MODX #xFPC"
@**FickleLife**: "I just installed #xFPC on a heavy site, it's way snappier. Impressed."
@**SteveJKing**: "By the power of Grayskull - The speed increase with #MODX #xFPC is amazing."

## Требования

xFPC требует MODX® Revolution 2.2.0 или новее.

## История

| Version   | Release date        | Author                                                                                                                                      | Changes                    |
| --------- | ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------- |
| 2.0.0-PL1 | November 17th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Added Minify! Fixed paths. |
| 1.1.0-PL1 | November 15th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Added new functionality    |
| 1.0.0-PL1 | November 13th, 2012 | [Patrick Nijkamp](http://www.scherpontwikkeling.nl/over-ons/patrick-nijkamp.html) ([SCHERP Ontwikkeling](http://www.scherpontwikkeling.nl)) | Initial release.           |

## Загрузка и установка

Установите пакет через менеджер пакетов MODX®.

## Прочитайте это ПЕРЕД использованием!

Если вы это не прочитали, не жалуйтесь, что «ничего не работает», ок?

Чего xFPC НЕ делает:

- не кеширует пользовательские страницы (страницы для авторизованных)
- не кеширует страницы менеджера

Что xFPC МОЖЕТ:

- ускорить сайт
- кешировать полные страницы и снизить нагрузку на сервер
- пропускать отправку форм и обновления Quip (POST блокирует текущий URL и принудительно обновляет кеш)
- показывать динамические элементы на странице (случайные картинки, цитаты, текст и т.д.)

Страница кешируется после первого просмотра. **Только для неавторизованных пользователей. Для теста скорости выйдите и из менеджера!**
(или используйте другой браузер).

## Использование xFPC

## Полностраничный кеш

Использование простое: установите сниппет и кеш пойдёт. Файлы кеша создаются в core/cache/fpc/.
При очистке кеша сайта очищается и кеш xFPC. При сохранении ресурса (с галочкой «clear cache» или без) кеш xFPC тоже очищается.

**При тесте скорости кеша выйдите из менеджера и с фронтенда. Для авторизованных кеш отключён!**

## Параметры конфигурации

Настройте xFPC в system settings:

| Setting key          | Description                                                                                 | Values                                                                                    | Default Value |
| -------------------- | ------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------- | ------------- |
| xfpc.cachelife       | Время жизни кеша в секундах. По истечении создаётся новый файл.                            | Time in seconds                                                                           | 0 (unlimited) |
| xfpc.exclude         | Исключение страниц по подстроке URL.                                                        | Enter a keyword on each newline (eg. "members" will exclude every URL with members in it) | (empty)       |
| xfpc.excludecss      | Исключить CSS из объединения                                                                | Comma separated file list (only filenames, no paths)                                      | (empty)       |
| xfpc.excludejs       | Исключить JS из объединения                                                                 | Comma separated file list (only filenames, no paths)                                      | (empty)       |
| xfpc.combinecss      | Объединять CSS. **(ломает относительные URL, используйте абсолютные пути)**               | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.combinejs       | Объединять JS.                                                                              | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.minifycss       | Минифицировать CSS через Minify.                                                            | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.minifyjs        | Минифицировать JS через Minify.                                                             | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.combinejsandcss | **Experimental:** объединять CSS в JS.                                                      | 1 = yes, 0 = no                                                                           | 0             |
| xfpc.lifetimetv      | TV с временем кеша ресурса в секундах.                                                      | A TV ID number                                                                            | (empty)       |

**Note:** При minify CSS или JS (или обоих) xFPC сохраняет минифицированные версии в кеш и отдаёт их быстро.

## Сниппет xFPCAjax: динамический контент на странице

Для динамического контента (случайный текст, картинки) используйте xFPCAjax из комплекта xFPC.

Свойства xFPCAjax:

| Property          | Description                                                          | Values          | Default Value |
| ----------------- | -------------------------------------------------------------------- | --------------- | ------------- |
| resource          | ID ресурса с контентом для показа                                    | An ID (number)  | false         |
| url               | Вместо ID ресурса (только URL сайта)                                 | A URL string    | false         |
| showStaticContent | Показывать контент и в статическом HTML                              | 1 = yes, 0 = no | 1             |

Пример:
На странице была случайная цитата через `[[!getRandomAwesomeQuote]]`.
С xFPC цитата статична, потому что кешируется вся страница. Это можно исправить.

Создайте ресурс с пустым шаблоном и поместите `[[!getRandomAwesomeQuote]]` в content. Допустим, ID «300». Скройте ресурс из меню, но опубликуйте.
На месте `[[!getRandomAwesomeQuote]]` замените вызов на:

``` php
[[xFPCAjax?
    &resource=`300`
]]
```

При загрузке статического кеша цитата подгрузится через AJAX. Страница откроется быстро, цитата появится почти сразу. AJAX-загрузку вы, скорее всего, не заметите.

Старый шаблон:

``` php
<div class="awesome-quote">[[!getRandomAwesomeQuote]]</div>
```

Новый шаблон (динамический сниппет перенесён в ресурс с пустым шаблоном, ID 300):

``` php
<div class="awesome-quote">
[[xFPCAjax?
    &resource=`300`
]]
</div>
```

**Note:** При AJAX контент не виден в браузерах без JavaScript. Google не выполняет AJAX и не видит динамический блок. Для этого есть showStaticContent: HTML рендерится в исходнике как обычно, а в JS-браузере перезаписывается динамическим контентом. Google индексирует плейсхолдеры с максимумом информации.

## Время жизни кеша для отдельного ресурса

Чтобы у части ресурсов кеш жил меньше:

Создайте TV, например cacheLifetime, и запомните ID (допустим «10»). Назначьте TV нужным шаблонам.
В system settings найдите xfpc.lifetimetv и укажите ID TV: 10 (или ваш ID).

При редактировании ресурса введите время в секундах в TV. xFPC учтёт настройку.

## Внешние источники

Developers website: <http://www.scherpontwikkeling.nl/portfolio/modx-addons/xfpc.html>
