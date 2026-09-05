---
title: "OnWebLogout"
translation: "extending-modx/plugins/system-events/onweblogout"
---

## Событие: OnWebLogout

Вызывается после того, как процессор выхода снял session contexts пользователя во фронтенд-контексте (не `mgr`). Плагины не меняют уже произошедший выход.

- Служба: 3 - Web Access Events
- Группа: Нет

## Параметры события

| Имя                | Описание                                                                                      |
| ------------------ | --------------------------------------------------------------------------------------------- |
| **&** user         | Ссылка на объект modUser пользователя. **Передано по ссылке**                                 |
| userid             | Идентификатор пользователя. (Устаревшее)                                                      |
| username           | Имя username пользователя. (Устаревшее)                                                       |
| **&** loginContext | Ключ контекста, в котором происходит выход из системы. **Передано по ссылке**                 |
| **&** addContexts  | Дополнительные контексты, в которых также происходит выход из системы. **Передано по ссылке** |

## `$modx->getUser()` во время OnWebLogout

Процессор выхода снимает session contexts **до** вызова `OnWebLogout`. Для этого контекста `$modx->user->isAuthenticated($loginContext)` уже false.

Перед событием процессор **не** обнуляет и не перезагружает `$modx->user`. `$modx->getUser()` берёт закэшированный объект и всё ещё возвращает пользователя, который только что вышел (тот же id). Код с `$modx->getUser()` (или другие плагины, которые его вызывают) может выглядеть «всё ещё в системе», хотя session context уже снят.

Берите вышедшего пользователя из параметра события `$user` (или `$scriptProperties['user']`). Не считайте `$modx->getUser()` текущим пользователем сессии во время этого события.

Если нужен именно `$modx->getUser()` в состоянии «разлогинен», сбросьте и перезагрузите после снятия session contexts:

```php
$modx->user = null;
$modx->getUser($loginContext, true);
```

Тот же процессор для `mgr` вызывает [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout) и тоже не обновляет `$modx->user`. Трекинг в ядре: [modxcms/revolution#17015](https://github.com/modxcms/revolution/issues/17015).

## Пример

Записать в журнал ошибок, кто вышел. Берите `$user` из события, не `$modx->getUser()`:

```php
<?php
$eventName = $modx->event->name;
switch ($eventName) {
    case 'OnWebLogout':
        $id = $user->get('id');
        $modx->log(
            modX::LOG_LEVEL_ERROR,
            'Вышел пользователь с id ' . $id . ' из контекста ' . $loginContext
            . ' и ещё вот этих ' . print_r($addContexts, true)
        );
        break;
}
```

## Смотрите также

- [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
- [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
- [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
- [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
- [Системные события](extending-modx/plugins/system-events)
- [Плагины](extending-modx/plugins)
