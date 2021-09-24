---
title: "OnBeforeDocFormSave"
translation: "extending-modx/plugins/system-events/onbeforedocformsave"
---

## Событие: OnBeforeDocFormSave

Запускается до сохранения ресурса в менеджере через форму редактирования. Это позволяет коду предотвращать сохранение документа.

Служба: 1 - Parser Service Events
Группа: Documents

**Будь осторожен с TVs**
Изменение или вставка значений TV лучше сделать [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave "OnDocFormSave") поскольку процесс сохранения TV во время onBeforeDocFormSave более сложен из-за визуализации значений TV.

Плагины, привязанные к этому событию, должны вернуть **null** в случае успеха. Любое возвращенное значение будет отправлено в журналы как ошибка (но страница все равно будет сохранена).

Вы также можете передать сообщение в функцию `$modx->event->output()`, и оно будет отображено пользователю во всплывающем модальном окне. Если вы передаете значение здесь, **страница _не_ будет сохранена!**

**Только текст**
 Если вы передаете значение в `$modx->event->output()`, оно должно быть только текстовым! HTML-теги не допускаются: они приводят к зависанию модального окна.

## Параметры события

| Имя      | Описание                                               |
| -------- | ------------------------------------------------------ |
| mode     | Либо 'new' либо 'upd', в зависимости от обстоятельств. |
| resource | Ссылка на объект modResource.                          |
| id       | Идентификатор ресурса. Будет 0 для новых ресурсов.     |

## Примеры

### Требуемые поля

``` php
if (empty($resource->longtitle)) {
    $modx->event->output('Требуется расширенное название!'); // to modal window
    return '[MyPlugin] Не удалось сохранить id страницы '.$id.' из-за отсутствия длинного заголовка'; // в журнал ошибок
}
```

### Рассчитать значение поля

``` php
if ($resource->get('parent') == 123) {
    $resource->set('template', 4);
}
```

Такой плагин не разрешит создавать новые ресурсы, и не будет сохранять ресурсы, у которых не заполнено `introtext`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeDocFormSave':
        if ($mode == modSystemEvent::MODE_UPD) {
            //если не заполнен introtext
            if (!$resource->get('introtext')){
                $modx->event->output("Голову ты дома не забыл, а про 'Ключевые слова' забыл!");
            }
        } elseif ($mode == modSystemEvent::MODE_NEW) {
            $modx->event->output("Вам нельзя создавать ресурсы!");
        }
        break;
}
```

Такой плагин установит значение поля `template=1` у всех ресурсов находящийхся в корне т.е `parent=0`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeDocFormSave':
        if ($resource->get('parent') == 0) {
            $resource->set('template', '1');
            $resource->save();
        }
        break;
}
```

**Принудительное сохранение**
Также необходимо запустить  `$resource->save()` метод, так как это не происходит автоматически.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
