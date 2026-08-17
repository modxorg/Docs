---
title: "board"
description: "Контроллер списка тем на доске форума Discuss: опции manifest и плейсхолдеры"
translation: "extras/discuss/discuss.controllers/board"
---

Контроллер board формирует обзор тем на доске.

## Основная информация

| Since Version         | 1.0                             |
| --------------------- | ------------------------------- |
| Controller File       | controllers/web/board.class.php |
| Controller Class Name | DiscussBoardController          |
| Controller Template   | pages/board.tpl                 |
| Manifest Name         | board                           |

## Опции

Если вы не знаете, что такое manifest, вернитесь к документу [Начало работы](extras/discuss/discuss.getting-started "Discuss.Getting Started"). Опции ниже поместите в массив options «board» manifest.

| Key                              | Default                    | Description                                                                                                                                                                                                                                                                                                                                                          |
| -------------------------------- | -------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| showSubBoards                    |                            | При true поддоски доступны в плейсхолдере «boards». Если досок нет, «boards» пуст, а «boards_toggle» получает «display: none;» для скрытия обёрток поддосок.                                                                                                                                                                  |
| showReaders                      |                            | При true пользователи, просматривающие доску, попадают в «readers». Нужно право discuss.view_online. Настройка discuss.show_whos_online должна быть включена. Текст строится из username в `<a>`, если доступны профили, несколько зрителей через запятую. |
| showModerators                   |                            | При true модераторы доски в «moderators». Текст из display name или username в `<a>` при доступе к профилям, несколько модераторов через запятую.                                                            |
| showPaginationIfOnePage          |                            | Если страница одна, решает, показывать ли pagination в «pagination».                                                                                                                                                                                                                          |
| **board/getlist common options** |                            |                                                                                                                                                                                                                                                                                                                                                                      |
| lastPostTpl                      | board/disLastPostBy        | Chunk для плейсхолдера «lastpost» с плейсхолдерами:                                                                                                                                                                                                                                                                     |
|                                  |                            | - createdon: timestamp поста по discuss.date_format.                                                                                                                                                                                                                                                                                     |
|                                  |                            | - user: ID автора последнего поста                                                                                                                                                                                                                                                                                                                              |
|                                  |                            | - username: username автора последнего поста                                                                                                                                                                                                                                                                                                                    |
|                                  |                            | - thread: ID темы последнего поста                                                                                                                                                                                                                                                                                                                            |
|                                  |                            | - id: ID поста                                                                                                                                                                                                                                                                                                                                                    |
|                                  |                            | - url: URL последнего поста                                                                                                                                                                                                                                                                                                                                      |
|                                  |                            | - author_link: `<a>` на автора при доступе к профилям, иначе username.                                                                                                                                                                                                                                                                |
| subBoardTpl                      | board/disSubForumLink      | Chunk для подфорумов в «subforums» после join через subBoardSeparator. Плейсхолдеры:                                                                                                                                                                   |
|                                  |                            | - id: ID поддоски                                                                                                                                                                                                                                                                                                                                         |
|                                  |                            | - title: заголовок поддоски                                                                                                                                                                                                                                                                                                                                   |
| subBoardSeparator                | comma and line break (\n) | Разделитель между subBoardTpl chunks.                                                                                                                                                                                                                                                                                                          |
| categoryRowTpl                   | category/disCategoryLi     | Chunk для категорий. Плейсхолдеры:                                                                                                                                                                                                                                                                                                 |
|                                  |                            | - list: доски категории через boardRowTpl, join через newline (\n)                                                                                                                                                                                                                                         |
|                                  |                            | - rowClass: классы категории «alt» или «even».                                                                                                                                                                                                                                                                                                |
| boardRowTpl                      | board/disBoardLi           | Chunk для досок. Плейсхолдеры:                                                                                                                                                                                                                                                                                                     |
|                                  |                            | - [All board fields](extras/discuss/discuss.database-model) и следующие:                                                                                                                                                                                                                              |
|                                  |                            | - unread `(1|0)`: прочитана ли доска пользователем                                                                                                                                                                                                                                                                                                      |
|                                  |                            | - unread-cls `(dis-unread|dis-read)`: класс для read/unread досок.                                                                                                                                                                                                                                                            |
|                                  |                            | - last_post_createdon: user ID последнего автора                                                                                                                                                                                                                                                                                                                      |
|                                  |                            | - last_post_udn: display name последнего автора или нет                                                                                                                                                                                                                                                                                                                    |
|                                  |                            | - last_post_display_name: display name последнего автора                                                                                                                                                                                                                                                                                                         |
|                                  |                            | - lastPost: форматированный последний пост. См. lastPostTpl. Пусто, если постов нет.                                                                                                                                                                                                                                                    |
|                                  |                            | - subforums: список поддосок. См. subBoardTpl. Пусто без поддосок.                                                                                                                                                                                                                                                         |
|                                  |                            | - post_stats: статистика доски по lexicon discuss.board_post_stats.                                                                                                                                                                                                                                                   |
|                                  |                            | - is_locked: при locked доске пустой div с классом dis-board-locked, иначе пусто.                                                                                                                                                                                                                                          |
| checkUnread                      | true                       | При false доска не проверяет прочитанность: для гостей всё read, для авторизованных unread. Влияет на unread и unread-cls в boardRowTpl.                                                                                                        |

## Шаблон контроллера

Плейсхолдеры шаблона контроллера помимо опций выше:

| Placeholder    | Description                                                                                                                                    |
| -------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
|                | [All fields of the disBoard object.](extras/discuss/discuss.database-model)           |
| posts          | Посты на этой доске.                                                                                                                       |
| boards         | Поддоски, если доступны и включены (см. опции выше).                                                                        |
| boards_toggle | «display:none;» или пусто в зависимости от boards.                                                                              |
| top            | Пусто, пока плагин на OnDiscussRenderBoard не задаст через $modx->event->output(array('name-of-placeholder' => 'stuff'));               |
| bottom         | См. плейсхолдер «top».                                                                                                                         |
| aboveThreads   | См. плейсхолдер «top».                                                                                                                         |
| belowBoards    | См. плейсхолдер «top».                                                                                                                         |
| belowThreads   | См. плейсхолдер «top».                                                                                                                         |
| pagination     | Pagination для доски.                                                                                                                     |
| readers        | Пользователи, просматривающие доску                                                                                                                       |
| moderators     | Модераторы доски                                                                                                                      |
| trail          | Breadcrumbs для доски                                                                                                                     |
| actionbuttons  | Доступные действия. См. actionbuttons на странице [Controllers](extras/discuss/discuss.controllers "Discuss.Controllers"). |

``` html
[[+top]]
<div>
    <form action="[[~[[*id]]]]search" method="GET">
        <input type="hidden" name="board" value="[[+id]]" />
        <input type="text" name="s" value="" style="width: 200px; margin-right: 5px;" placeholder="[[%discuss.search_this_board]]" />

        <input type="submit"  value="[[%discuss.search]]" />
    </form>
</div>
[[+trail]]

[[+aboveBoards]]
<ol style="[[+boards_toggle]]">
[[+boards]]
</ol>

[[+belowBoards]]

<br />

[[+actionbuttons]]

<div><span>[[%discuss.pages? &namespace=`discuss` &topic=`web`]]:</span> <ul>[[+pagination]]</ul></div>

<br />

<div>
<div>
    <div>
        <div style="width: 25%">[[%discuss.last_post]]</div>
        <div style="width: 10%">[[%discuss.replies]]</div>
        <div style="width: 10%">[[%discuss.views]]</div>
        <div style="width: 55%;">[[%discuss.message]]</div>
    </div>
    <br />
</div>
<ol>
[[+posts]]
</ol>
</div>

<br />

[[+actionbuttons]]

<div><span>[[%discuss.pages]]:</span> <ul>[[+pagination]]</ul></div>

[[+belowThreads]]

<p>[[+readers]]</p>
<p>[[+moderators]]</p>
<p>[[+trail]]</p>

[[+bottom]]
```

## Системные события

### OnDiscussRenderBoard

Все текущие плейсхолдеры доступны в массиве $placeholders. return или $modx->event->output() должны вернуть массив плейсхолдеров для переопределения. Плагин на этом событии. единственный способ задать top, bottom, aboveThreads, belowThreads, aboveBoards и belowBoards.
