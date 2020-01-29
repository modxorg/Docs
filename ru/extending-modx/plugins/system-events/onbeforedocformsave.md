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
        $modx->event->output('Long title is required!'); // to modal window
        return '[MyPlugin] Failed to save page id '.$id.' due to missing longtitle'; // to the error log
}
```

### Рассчитать значение поля

``` php
if ($resource->get('parent') == 123) {
        $resource->set('template', 4);
}
```

**Автоматическое сохранение**
 Нет необходимости запускать  `$resource->save()` метод, так как это происходит автоматически.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
