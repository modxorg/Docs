---
title: "board.xml"
description: "Контроллер XML (RSS) ленты доски форума Discuss"
translation: "extras/discuss/discuss.controllers/board/xml"
---

Контроллер board.xml формирует XML (RSS) ленты доски.

Этот контроллер не использует wrapper-шаблон, но наследует поведение контроллера Discuss.Controllers.board почти полностью. Исключения перечислены ниже в разделе Options.

## Основная информация

| Since Version         | 1.0                                 |
| --------------------- | ----------------------------------- |
| Controller File       | controllers/web/board.xml.class.php |
| Controller Class Name | DiscussBoardXmlController           |
| Controller Template   | pages/board.xml.tpl                 |
| Manifest Name         | board                               |

## Опции

Если вы не знаете, что такое manifest, вернитесь к документу [Начало работы](extras/discuss/discuss.getting-started "Discuss.Getting Started"). Опции ниже нужно поместить в массив options «board.xml» manifest.

Контроллер принимает все опции контроллера board с такими изменениями и дополнениями:

| Key                 | Default         | Description                                                                     |
| ------------------- | --------------- | ------------------------------------------------------------------------------- |
| tpl                 | disBoardPostXml | Tpl-чанк для отдельных записей в ленте.                                        |
| mode                | rss             | Задаёт особое поведение при получении списка элементов ленты.                   |
| get_category_name   | true            | Делает плейсхолдер category_name доступным в отдельных постах.                  |
