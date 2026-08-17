---
title: "home"
description: "Контроллер главной страницы форума Discuss с категориями, досками и недавними постами"
translation: "extras/discuss/discuss.controllers/home"
---

Контроллер Home это главный обзор форума. Он показывает категории и доски внутри них, а также может выводить недавние посты.

## Основная информация

| Since Version         | 1.0                            |
| --------------------- | ------------------------------ |
| Controller File       | controllers/web/home.class.php |
| Controller Class Name | DiscussHomeController          |
| Controller Template   | pages/home.tpl                 |
| Manifest Name         | home                           |

## Опции

Если вы не знаете, что такое manifest, вернитесь к документу [Начало работы](extras/discuss/discuss.getting-started "Discuss.Getting Started"). Опции ниже поместите в массив options «board» manifest.

| Key                    | Default             | Description                                                                                                                                                                 |
| ---------------------- | ------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| showBoards             | true                | Показывать ли доски. Обычно нужно. Значение попадает в `[[+boards]]`.                                                          |
| showRecentPosts        | false               | Недавние посты в `[[+recent_posts]]`. Для каждого поста chunk postTpl (default=post/disThreadLi).                             |
| showLogoutActionButton | false               | При включении задаёт `[[+discuss.authLink]]` с `<a>` для выхода. `[[+discuss.authLink]]` для входа доступен по умолчанию. |
| showLoginForm          | false               | При включении задаёт `[[+discuss.loginForm]]` с содержимым чанка dislogin.                                                                             |
| hideIndexBreadcrumbs   | false               | При включении breadcrumbs скрыты на главной.                                                                                                                 |
|                        |                     |                                                                                                                                                                             |
|                        |                     | **Recent Posts**                                                                                                                                                            |
| postTpl                | post/disThreadLi    | Chunk для каждого поста.                                                                                                                                        |
| limit                  | 10                  | Число недавних постов.                                                                                                                                             |
|                        |                     |                                                                                                                                                                             |
|                        |                     | **Boards**                                                                                                                                                                  |
| lastPostTpl            | board/disLastPostBy | Заполняет `[[+lastPost]]`. Доступные плейсхолдеры:                                                                                                              |
|                        |                     | - createdon                                                                                                                                                                 |
|                        |                     | - user (disUser ID)                                                                                                                                                         |
|                        |                     | - username                                                                                                                                                                  |
|                        |                     | - thread (ID)                                                                                                                                                               |
|                        |                     | - id (last post ID)                                                                                                                                                         |
|                        |                     | - url (URL to the last post0                                                                                                                                                |
|                        |                     | - author_link                                                                                                                                                              |

``` php
 Array('createdon' => strftime($modx->getOption('discuss.date_format'),strtotime($board['last_post_createdon'])),
 'user' => $board['last_post_author'],
 'username' => $username,
 'thread' => $board['last_post_thread'],
 'id' => $board['last_post_id'],
 'url' => $board['last_post_url'],
 'author_link' => $canViewProfiles ? '<a href="'.$discuss->request->makeUrl('u/'.$board['last_post_username']).'">'.$username.'</a>' : $username,
 );
 ```

```php Array(
 'createdon' => strftime($modx->getOption('discuss.date_format'),strtotime($board\['last_post_createdon'\])),
 'user' => $board['last_post_author'],
 'username' => $username,
 'thread' => $board['last_post_thread'],
 'id' => $board['last_post_id'],
 'url' => $board['last_post_url'],
 'author_link' => $canViewProfiles ? '<a class="dis-last-post-by" href="'.$discuss->request->makeUrl('u/'.$board['last_post_username']).'">'.$username.'</a>' : $username,
 );
```
