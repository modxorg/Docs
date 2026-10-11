---
title: Изменение Имен Классов
note: Этот список может быть неполным, пожалуйста, отредактируйте эту страницу, чтобы помочь сделать его полным.
translation: "getting-started/upgrading-to-3.0/class-names"
---

Чтобы реализовать пространства имен и понять смысл определенного кода, многие файлы и классы были переименованы и перемещены в 3.0. Это приводит к потенциальным нарушающим изменениям.

В некоторых случаях вы можете столкнуться с предупреждениями или ошибками (включая фатальные ошибки):

-   при использовании прямых операторов `include`/`require`, нацеленных на любой соответствующий файл, которого больше нет
-   при расширении одного из этих классов
-   когда тип намекает против этих классов

## Примечание о моделях и классах обслуживания

Большинство классов моделей и служб, которые загружаются через `$modx->loadClass` (который включает в себя конструктор запросов xPDO для классов моделей) или `$modx->getService` будет по-прежнему работать, так как `loadClass` внутренне переводит их в свои новые имена классов.

Сам `$modx->getService()` в 3.x **устарел**. phpdoc xPDO (и PhpStorm) всё ещё пишут про удаление в 3.1. Его не удалили: метод на месте, ядро его вызывает. В новом коде регистрируйте и забирайте объекты через `$modx->services`. См. [modX.getService](extending-modx/modx-class/reference/modx.getservice) и [DI-контейнер](extending-modx/di-container).

Для примера `$modx->getIterator('modResource')` все равно будет работать - _пока_, хотя `\modResource` класс сейчас `\MODX\Revolution\modResource`.

Это будет регистрировать устаревшее сообщение в журнале ошибок, призывающее вас обновить ссылку. Правильный вызов был бы `$modx->getIterator(\MODX\Revolution\modResource::class)`.

Важно отметить, что если вы **проверяете тип** результата такого вызова (например `if ($foo instanceof modResource)`), вы не сразу столкнётесь с ошибкой (в отличие от typehinting вроде `public function(modResource $foo)`, который действительно падает). Пока загружены устаревшие глобальные псевдонимы — это поведение по умолчанию, — старое имя является настоящим классом, и проверка работает. Только если вы отключили `load_deprecated_global_class_aliases` (см. ниже), `instanceof modResource` молча вернёт `false`, а type hint и тогда упадёт.

Вы можете проверять тип против несуществующих классов без предупреждения в PHP, поэтому проверяйте тип и для имени класса 2.x, и для 3.0 (например `if (($foo instanceof modResource) || $foo instanceof \MODX\Revolution\modResource))`). Именно такая двойная проверка позволяет коду работать независимо от того, загружены псевдонимы или нет.

## Мягкие Изменения

Следующие имена классов были изменены, но были псевдонимы в версии 3.0, чтобы облегчить проблемы обновления, поскольку они обычно используются. Псевдонимы автоматически находятся в `modX::loadConfig`, если `load_deprecated_global_class_aliases` равно true, что по умолчанию. Это можно отключить, добавив ключ со значением `false` в ваши `$config_options` в `core/config/config.inc.php`.

**Автоподключение этих псевдонимов прекратится в будущем релизе 3.x — в комментарии кода в `core/include/deprecated.php` сказано «likely 3.3 or 3.4».** Если вам всё ещё нужны псевдонимы, можно вручную подключить `core/include/deprecated.php`, но код всё равно следует перевести на новые классы.

Слой обратной совместимости (включая ручное подключение файла) вероятно, будет полностью удалён в MODX 4.0.

### xPDO

| Новый класс                       | Старый класс       |
| --------------------------------- | ------------------ |
| \xPDO\xPDO                        | \xPDO              |
| \xPDO\Om\xPDOCriteria             | \xPDOCriteria      |
| \xPDO\Om\xPDOSimpleObject         | \xPDOSimpleObject  |
| \xPDO\Om\xPDOQuery                | \xPDOQuery         |
| \xPDO\Om\xPDOObject               | \xPDOObject        |
| \xPDO\Cache\xPDOCacheManager      | \xPDOCacheManager  |
| \xPDO\Cache\xPDOFileCache         | \xPDOFileCache     |
| \xPDO\Transport\xPDOTransport     | \xPDOTransport     |
| \xPDO\Transport\xPDOObjectVehicle | \xPDOObjectVehicle |

Как связаны Composer, PSR-4, `metadata.mysql.php` и вызовы `addPackage` в Extra: [xPDO 3](getting-started/upgrading-to-3.0/xpdo).

### Ядро MODX и контроллеры

| Новый класс                                   | Старый класс                  |
| --------------------------------------------- | ----------------------------- |
| \MODX\Revolution\modX                         | \modX                         |
| \MODX\Revolution\modManagerController         | \modManagerController         |
| \MODX\Revolution\modParsedManagerController   | \modParsedManagerController   |
| \MODX\Revolution\modExtraManagerController    | \modExtraManagerController    |

### Классы моделей MODX

| Новый класс                  | Старый класс |
| ---------------------------- | ------------ |
| \MODX\Revolution\modResource | \modResource |

### Сервисы, интерфейсы и утилиты

| Новый класс                                    | Старый класс                 |
| ---------------------------------------------- | ---------------------------  |
| \MODX\Revolution\modParser                     | \modParser                   |
| \MODX\Revolution\Mail\modMail                  | \modMail                     |
| \MODX\Revolution\Mail\modPHPMailer             | \modPHPMailer                |
| \MODX\Revolution\Sources\modMediaSource        | \modMediaSource              |
| \MODX\Revolution\modSystemEvent                | \modSystemEvent              |
| \MODX\Revolution\modTemplateVarInputRender     | \modTemplateVarInputRender   |
| \MODX\Revolution\modTemplateVarOutputRender    | \modTemplateVarOutputRender  |
| \MODX\Revolution\modDashboardWidgetInterface   | \modDashboardWidgetInterface |

### Процессоры

Все процессоры были переименованы и перемещены, включая базовые классы процессоров (`\modProcessor`, `\modObjectProcessor`, `\modObject*Processor`, `\modProcessorResponse`, `\modProcessorResponseError` — у всех есть псевдонимы, см. [таблицу процессоров](getting-started/upgrading-to-3.0/processors)). Процессоры с плоскими файлами также больше не поддерживаются. [Смотрите документацию по выделенным процессорам](getting-started/upgrading-to-3.0/processors)

## Измененные классы, без пути обновления

Все остальные классы моделей и служб автоматического псевдонима не имеют — это ежедневные объекты, которые вы получаете через `getObject`/`getCollection`: `\MODX\Revolution\modContext`, `\MODX\Revolution\modUser`, `\MODX\Revolution\modChunk`, `\MODX\Revolution\modSnippet`, `\MODX\Revolution\modPlugin`, `\MODX\Revolution\modTemplate` и т. д.

## Удаленные классы

Эти классы были навсегда удалены из 3.0 без альтернативы:

-   `modDeprecatedProcessor`
-   `modParser095`
-   `modTranslate095`
-   `modTranslator`
-   All classes and functions related to the `xmlrss` service/utility: `Snoopy`, `MagpieRSS`, `modRSSParser`, `RSSCache`, function `parse_w3cdtf`, function `fetch_rss`. To fetch RSS feeds, you can now use SimplePie.
-   All classes and functions related to the `xmlrpc` and `jsonrpc` services/utilities: `modXMLRPCResponse`, `modJSONRPCResponse`, `modXMLRPCResource` (+ platform classes), `modJSONRPCResource` (+ platform classes)
-   `modManagerControllerDeprecated`

Flash-хелперы copy-to-clipboard из ExtJS удалены вместе с Flash [#13697](https://github.com/modxcms/revolution/pull/13697). Используйте clipboard API браузера.

## Изменения подписи

-   `modResponse::_construct` (и унаследовал `modManagerResponse`/`modConnectorResponse`) теперь помечен как «открытый» и больше не содержит амперсанд, поскольку объекты всегда передаются по ссылке.
-   `Processor::getInstance` и `modManagerController::getInstance` больше не использовать амперсанд для передачи modX в качестве ссылки.
