---
title: "profile"
description: "Устаревший контроллер редиректа профиля из SMF в Discuss"
translation: "extras/discuss/discuss.controllers/profile"
---

Контроллер Profile служит legacy **редиректом** из SMF. У него нет опций и шаблонов: он пытается разобрать URL профиля в стиле SMF и перенаправить на формат Discuss (user/index).

Контроллер помечен как **deprecated** 18 декабря 2012 года. В будущей версии планируют вынести legacy-редиректы в отдельное место.

## Основная информация

| Since Version         | 1.0                               |
| --------------------- | --------------------------------- |
| Controller File       | controllers/web/profile.class.php |
| Controller Class Name | DiscussProfileController          |
| Controller Template   | None                              |
| Manifest Name         | profile                           |
| Deprecated            | 2012-12-18                        |

## Опции

У контроллера Profile нет опций manifest.

## Шаблон контроллера

У этого контроллера нет шаблона.

## Системные события

На этом контроллере не срабатывают пользовательские системные события.
