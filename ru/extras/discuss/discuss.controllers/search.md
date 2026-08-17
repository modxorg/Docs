---
title: "search"
description: "Контроллер поиска Discuss с классами disSearch, disSolrSearch и настройками manifest"
translation: "extras/discuss/discuss.controllers/search"
---

Контроллер search обрабатывает поисковые запросы. Без результатов для сообщения используется lexicon discuss.search_no_results.

Поиск выполняет search class. Её задают discuss.search_class (и опционально discuss.search_class_path). По умолчанию в Discuss есть disSearch (простой SQL) и disSolrSearch (Solr). Можно написать свой класс, расширив disSearch.

## Основная информация

| Since Version         | 1.0                              |
| --------------------- | -------------------------------- |
| Controller File       | controllers/web/search.class.php |
| Controller Class Name | DiscussSearchController          |
| Controller Template   | pages/search.tpl                 |
| Manifest Name         | search                           |

## Опции

Если вы не знаете, что такое manifest, вернитесь к документу [Начало работы](extras/discuss/discuss.getting-started "Discuss.Getting Started"). Опции ниже поместите в массив options «search» manifest.

| Key          | Default                                   | Description                                                                                                                                                                                                                      |
| ------------ | ----------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| resultRowTpl | disSearchResult                           | Имя file-based chunk для каждого результата. Плейсхолдеры: все поля [Discuss.Database Model], а также `[[+username]]`, `[[+board_name]]`, `[[+replies]]`, `[[+relevancy]]`, `[[+cls]]`, `[[+toggle]]`. |
| toggle       | +                                         | Строка для кнопки toggle                                                                                                                                                                                                |
| limit        | value of discuss.threads_per_page or 20 | Число результатов на странице                                                                                                                                                                                                       |

## Шаблон контроллера

Плейсхолдеры шаблона помимо опций выше:

| Placeholder | Description                                                                                                                          |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------ |
|             | [All fields of the disBoard object.](extras/discuss/discuss.database-model) |
| results     | Результаты поиска или сообщение об ошибке.                                                                                              |
| total       | Число результатов.                                                                                                                   |
| start       | Номер первого результата на странице.                                                                                               |
| end         | Номер последнего результата на странице или общее число результатов.                                                   |
| pagination  | Сгенерированная pagination.                                                                                                           |
| search      | Поисковый запрос.                                                                                                                     |

``` html
<form class="m-fullw-form m-styled-form h-group m-search" action="[[~[[*id]]]]search/" method="get">
    <h1>[[%discuss.search? &namespace=`discuss` &topic=`web`]]</h1>
    <div class="m-panel f1-f8">
        <div class="f1-f5 f-pad h-group">
            <label class="search" for="dis-search">[[%discuss.search]]:</label>
            <input class="search" type="text" id="dis-search" name="s" value="[[+search]]" />
        </div>
        <div class="f-all f-pad  h-group">
            <a id="dis-search-advanced-toggle" href="a-search-adavnaced">[[%discuss.search_advanced_options]]</a>
        </div>
        <div id="dis-search-advanced" class="f-all m-grouped-content">
            <div class="f-full">
                <div class="f1-f4 f-pad">
                    <label for="dis-search-board">Post type:
                        <span class="error">[[+error.board]]</span>
                    </label>
                    <select name="board" id="dis-search-qa">
                        <option value="1">(All Posts)</option>
                        <option value="2">Discussions</option>
                        <option value="3" id="QA">Questions</option>
                    </select>
                </div>
                <div id="SubOptions" class="f5-f8 sub-options">
                    <label for="dis-search-board">Question options:
                        <span class="error">[[+error.board]]</span>
                    </label>
                    <input type="radio" name="qa-options" value="Both" checked>All Questions
                    <input type="radio" name="qa-options" value="Solved">Answered
                    <input type="radio" name="qa-options" value="Unsolved">Without Answer
                </div>
            </div>

            <div class="f-full">
                <div class="f1-f4 f-pad">
                    <label for="dis-search-board">[[%discuss.board]]:
                        <span class="error">[[+error.board]]</span>
                    </label>
                    <select name="board" id="dis-search-board">[[+boards]]</select>
                </div>
                <div class="f5-f8 f-pad">
                    <label for="dis-author">[[%discuss.author]]:</label>
                    <input type="text" id="dis-author" name="user" value="[[+user]]" class="autocomplete" data-autocomplete-action="rest/find_user" data-autocomplete-single="true" />
                </div>
            </div>

            <div class="f1-f4 f-pad">
                <label for="dis-date-start">[[%discuss.date_start]]:</label>
                <input type="text" id="dis-date-start" class="m-datepicker" name="date_start" value="[[+date_start]]"/>
            </div>

            <div class="f5-f8 f-pad">
                <label for="dis-date-end">[[%discuss.date_end]]:</label>
                <input type="text" id="dis-date-end" class="m-datepicker" name="date_end" value="[[+date_end]]"/>
            </div>
        </div>
        <div class="f1-f8 f-pad">
            <input type="submit" value="[[%discuss.search]]" />
        </div>
    </div>
</form>

[[+search:notempty=`
<header class="dis-cat-header dark-gradient h-group sticky-bar top">
    [[+results:notempty=`<h1>Displaying [[+start]]-[[+end]] of [[+total]] Results</h1>`]]
    [[+pagination]]
</header>

<div class="dis-threads">
    <ul class="dis-list search-results">`]]
        [[+results]]
    [[+search:notempty=`</ul>
</div>
<div class="paginate stand-alone bottom horiz-list">
[[+pagination]]
</div>
`]]
[[+bottom]]
```

## Системные события

Нет.
