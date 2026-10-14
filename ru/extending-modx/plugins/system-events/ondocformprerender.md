---
title: "OnDocFormPrerender"
translation: "extending-modx/plugins/system-events/ondocformprerender"
description: "Событие запускается перед загрузкой формы редактирования ресурса в менеджере."
---

## Событие: OnDocFormPrerender

Событие запускается перед загрузкой формы редактирования ресурса в менеджере.

- Служба: 1 - Parser Service Events
- Group: Resources

## Параметры события

| Имя      | Описание                                                      |
| -------- | ------------------------------------------------------------- |
| mode     | Либо 'new' либо 'upd', в зависимости от обстоятельств.        |
| id       | Идентификатор ресурса. Будет 0 для новых ресурсов.            |
| resource | Ссылка на объект modResource. Для новых ресурсов не передаётся. |

Параметр `resource` передаётся только при редактировании существующего ресурса. При создании нового ресурса его в данных события нет вовсе (до 2.4 он был равен `null`), поэтому проверяйте через `isset($resource)`, а не через `$resource === null`.

## Пример

Такой плагин будет выводить сообщение при клике на pagetitle и добавить текст на страницу:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocFormPrerender':
        $modx->regClientStartupHTMLBlock('
        <script type="text/javascript">
        Ext.onReady(function() {
            Ext.select("#modx-resource-pagetitle").on("click", function() {
                Ext.MessageBox.alert("Attention", "You just clicked on pagetitle.");
            });
        });
        </script>');
        $modx->event->output('<h2>Hello my friend!</h2>');
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
