---
title: "Коннекторы"
translation: "extending-modx/processors/connectors"
---

## Что такое коннектор

Коннектор — PHP-вход для AJAX (и похожих) запросов, которые должны запустить [процессор](extending-modx/processors). Он поднимает MODX, проверяет, что пользователь может загрузить контекст, и передаёт запрос в `modX::request->handleRequest()`, а тот вызывает [`runProcessor`](extending-modx/modx-class/reference/modx.runprocessor).

Сам коннектор базу не меняет. Это делают процессоры.

## Коннектор ядра

Запросы менеджера к действиям ядра идут через файлы в `connectors/`, которые подключают [`connectors/index.php`](https://github.com/modxcms/revolution/blob/3.x/connectors/index.php). Этот bootstrap:

1. Создаёт экземпляр MODX и инициализирует контекст (по умолчанию `mgr`, либо `ctx` из запроса).
2. Проверяет политику `load`, если действие не помечено как анонимное (например `security/login`).
3. Санитизирует запрос и направляет `action` в процессор ядра.

Типичный запрос: ExtJS-сетка шлёт POST на URL коннектора с `action=resource/getlist` (плюс заголовки авторизации, которые добавляет MODExt).

## Коннекторы дополнений

Коннектор ядра знает только пути процессоров ядра. Дополнения кладут свой файл, обычно:

`assets/components/myextra/connector.php`

Шаблон (как в [Developing an Extra, Part II](extending-modx/tutorials/developing-an-extra/part-2)):

```php
<?php
require_once dirname(__DIR__, 3) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption(
    'myextra.core_path',
    null,
    $modx->getOption('core_path') . 'components/myextra/'
);
// при необходимости загрузите сервис и лексикон …

$modx->request->handleRequest([
    'processors_path' => $corePath . 'processors/',
    'location' => '',
]);
```

`processors_path` указывает, где лежат `{action}.class.php`. Параметр `baseParams.action` сетки (например `mgr/item/getlist`) соответствует `processors/mgr/item/getlist.class.php`.

## Авторизация и CSRF

Коннекторы ждут сессию менеджера (если вы сами не открыли анонимное действие) и токен сайта. MODExt передаёт его заголовком `modAuth` (или `HTTP_MODAUTH` в запросе). Значение — `$modx->siteId`. Не публикуйте его в репозитории и клиентской документации.

Открыть URL коннектора в браузере без сессии и без `action` обычно даёт JSON вроде `success: false` / access denied. Так и задумано.

## См. также

- [Процессоры](extending-modx/processors)
- [Пользовательские страницы менеджера](extending-modx/custom-manager-pages)
- [MODExt FormPanel](extending-modx/custom-manager-pages/modext/modx.formpanel) — отправка через URL коннектора
