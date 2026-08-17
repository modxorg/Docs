---
title: "Контроллеры"
description: "Обзор web-контроллеров Discuss, общих опций и плейсхолдеров шаблонов"
translation: "extras/discuss/discuss.controllers"
---

Контроллеры Discuss настраиваются через темы и файлы manifest.php темы. Документация ещё не завершена: объём большой, и помощь с дополнением приветствуется.

Этот документ описывает **web**-контроллеры, а не mgr-контроллеры бэкенда Discuss.

## Контроллеры в Discuss

Не ограничивайтесь этим списком: ниже описаны общие опции и плейсхолдеры шаблонов контроллеров.

- [Discuss.Controllers.board](extras/discuss/discuss.controllers/board "Discuss.Controllers.board")
    - [Discuss.Controllers.board.xml](extras/discuss/discuss.controllers/board/xml "Discuss.Controllers.board.xml")
- [Discuss.Controllers.home](extras/discuss/discuss.controllers/home "Discuss.Controllers.home")
- [Discuss.Controllers.login](extras/discuss/discuss.controllers/login "Discuss.Controllers.login")
- [Discuss.Controllers.logout](extras/discuss/discuss.controllers/logout "Discuss.Controllers.logout")
- [Discuss.Controllers.profile](extras/discuss/discuss.controllers/profile "Discuss.Controllers.profile")
- [Discuss.Controllers.register](extras/discuss/discuss.controllers/register "Discuss.Controllers.register")
- [Discuss.Controllers.search](extras/discuss/discuss.controllers/search "Discuss.Controllers.search")
- [Discuss.Controllers.thread](extras/discuss/discuss.controllers/thread "Discuss.Controllers.thread")

## Опции

Опции контроллера задаются в manifest темы. Если вы не знаете, что это значит, откройте документ [Начало работы](extras/discuss/discuss.getting-started "Discuss.Getting Started").

## Шаблон контроллера

Шаблон контроллера по сути является полем content контроллера. В нём разметка и плейсхолдеры, нужные конкретному контроллеру. Шаблон контроллера оборачивается в pages/wrapper.tpl или pages/print-wrapper.tpl.

На подстраницах этого документа описаны отдельные контроллеры и их плейсхолдеры. Кроме того, часть плейсхолдеров доступна почти во всех контроллерах. Они описаны в этом разделе.

| Placeholder       | Description                                                                                                                                                                                                                                                                                                                                                                               |
| ----------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| actionbuttons     | Кнопки из чанка chunks/disactionbutton.chunk.tpl, обёрнутые в chunks/disactionbuttons.chunk.tpl. Действия зависят от контроллера: login, logout, reply, subscribe и т. д. Каждой кнопке назначается класс dis-action-action_name, где action_name. имя действия. Его можно использовать для отдельного оформления кнопок. |
| discuss.user.*   | Вызывайте без кэша. Если пользователь авторизован, плейсхолдер discuss.user.field_name содержит данные текущего пользователя. Доступные поля:                                                                                                                                                                                                                                      |
|                   | - id                                                                                                                                                                                                                                                                                                                                                                                      |
|                   | - username                                                                                                                                                                                                                                                                                                                                                                                |
|                   | - fullname                                                                                                                                                                                                                                                                                                                                                                                |
|                   | - name_first                                                                                                                                                                                                                                                                                                                                                                             |
|                   | - name_last                                                                                                                                                                                                                                                                                                                                                                              |
|                   | - email                                                                                                                                                                                                                                                                                                                                                                                   |
|                   | - posts                                                                                                                                                                                                                                                                                                                                                                                   |
|                   | - posts_formatted                                                                                                                                                                                                                                                                                                                                                                        |
|                   | - avatar_url                                                                                                                                                                                                                                                                                                                                                                             |
|                   | - isModerator (1 or 0)                                                                                                                                                                                                                                                                                                                                                                    |
|                   | - ... and much more TBA                                                                                                                                                                                                                                                                                                                                                                   |
| discuss_version  | Текущая установленная версия Discuss.                                                                                                                                                                                                                                                                                                                                                 |
| discuss.pagetitle | Вызывайте без кэша. Содержит заголовок текущего контроллера.                                                                                                                                                                                                                                                                                                                              |
