---
title: "OnDocFormPrerender"
translation: "extending-modx/plugins/system-events/ondocformprerender"
---

## Событие: OnDocFormPrerender

Запускается до загрузки формы редактирования ресурса в менеджере.

Служба: 1 - Parser Service Events
Группа: Documents

## Параметры события

| Имя      | Описание                                                        |
| -------- | --------------------------------------------------------------- |
| mode     | Либо 'new' либо 'upd', в зависимости от обстоятельств.          |
| resource | Ссылка на объект modResource. Будет нулевым для новых ресурсов. |
| id       | Идентификатор ресурса. Будет 0 для новых ресурсов.              |

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
                var pagetitle = Ext.select("#modx-resource-pagetitle");
                pagetitle.on("click",function(node,e){
                    Ext.MessageBox.alert("Внимание","Ты только что нажал на pagetitle.");
                    
                },pagetitle);
    		});
    	</script>');
    	$modx->event->output('<h2 style="padding: 50px 0 0 15px;">Привет дружище!</h2>');
        break;
}
```  

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
