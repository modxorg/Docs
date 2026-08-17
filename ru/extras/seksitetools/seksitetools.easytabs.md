---
title: "easytabs"
description: "CSS-вкладки на странице через сниппет easytabs"
translation: "extras/seksitetools/seksitetools.easytabs"
---

## Что такое easytabs?

Easytabs создаёт CSS-вкладки на странице.

## Использование

Пример для easytabs:

``` php
[[easytabs? &tabContent=`
    [{"tab_id":"one","tab_name":"One","tab_content":"Content 1"},
    {"tab_id":"two","tab_name":"Two","tab_content":"Content 2"},
    {"tab_id":"three","tab_name":"Three","tab_content":"$chunkName"}]
`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Name       | Description                                  | Default | Required | Version |
| ---------- | -------------------------------------------- | ------- | -------- | ------- |
| tabContent | JSON-массив данных для вкладок.   |         | Yes      | >0.0.2  |
| cssFile    | Путь к CSS-файлу. |         |          | >0.0.2  |

### tabContent

| Name         | Description                                                                                      | Default | Required | Version |
| ------------ | ------------------------------------------------------------------------------------------------ | ------- | -------- | ------- |
| tab\_id      | ID поля.                                                                                |         | Yes      | >0.0.2  |
| tab\_name    | Подпись на вкладке.                                                                      |         | Yes      | >0.0.2  |
| tab\_content | Содержимое вкладки. Для вывода из чанка добавьте «$» перед именем чанка. |         | Yes      | >0.0.2  |
