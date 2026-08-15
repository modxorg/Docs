---
title: "OnBeforeDocFormSave"
translation: "extending-modx/plugins/system-events/onbeforedocformsave"
description: "Событие плагина до сохранения ресурса процессором создания/обновления в Менеджере"
---

## Событие: OnBeforeDocFormSave

Срабатывает в Менеджере **до** того, как процессор создания или обновления ресурса запишет его в БД. Здесь меняют поля объекта `$resource` или блокируют сохранение.

- Служба: 1 - Parser Service Events
- Группа: Documents

Вызывается из `MODX\Revolution\Processors\Resource\Create` и `Update` (также `UpdateFromGrid`). Порядок в этих процессорах:

1. Поля попадают в объект Resource
2. Выполняется `OnBeforeDocFormSave`
3. Процессор вызывает `$resource->save()`
4. Идёт работа после сохранения (TV при update, группы ресурсов и т. д.)
5. Выполняется `OnDocFormSave`

### Изменение полей и вызов `save()`

Для полей ресурса вызывайте `$resource->set(...)`. В плагине **не** нужен `$resource->save()`: процессор сохранит объект после возврата из плагина.

Не вызывайте `$resource->save()` здесь без веской причины. Ранний `save()` может записать строку до Template Variables и прочих шагов after-save и путает момент create/update. Для TV лучше [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave) и `setTVValue`.

### Блокировка сохранения

При успехе плагин ничего не возвращает (или возвращает пустое значение). Непустое возвращаемое значение попадает в лог как ошибка. В зависимости от формы возврата сохранение при этом всё ещё может пройти.

Чтобы **остановить** сохранение и показать сообщение в Менеджере, передайте текст в `$modx->event->output(...)`. Только plain text (без HTML), иначе модальное окно может зависнуть.

## Параметры события

| Имя | Описание |
| --- | --- |
| mode | `new` или `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`) |
| resource | Ссылка на объект `modResource` (передаётся по ссылке) |
| id | ID ресурса. Для ещё не сохранённых новых ресурсов — `0` |

## Примеры

### Обязательное поле

``` php
if (empty($resource->get('longtitle'))) {
    $modx->event->output('Нужен расширенный заголовок!');
    return;
}
```

### Задать поле до сохранения процессором

``` php
if ((int) $resource->get('parent') === 123) {
    $resource->set('template', 4);
}
```

Здесь `$resource->save()` не вызывайте. Дальше сохранит процессор create/update.

### Запрет создания или обновления без introtext

``` php
<?php
switch ($modx->event->name) {
    case 'OnBeforeDocFormSave':
        if ($mode == modSystemEvent::MODE_UPD) {
            if (!$resource->get('introtext')) {
                $modx->event->output("Заполните поле «Аннотация» (introtext).");
            }
        } elseif ($mode == modSystemEvent::MODE_NEW) {
            $modx->event->output("Вам нельзя создавать ресурсы!");
        }
        break;
}
```

### Шаблон для ресурсов в корне

``` php
<?php
switch ($modx->event->name) {
    case 'OnBeforeDocFormSave':
        if ((int) $resource->get('parent') === 0) {
            $resource->set('template', 1);
        }
        break;
}
```

## Смотрите также

- [OnDocFormSave](extending-modx/plugins/system-events/ondocformsave)
- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
