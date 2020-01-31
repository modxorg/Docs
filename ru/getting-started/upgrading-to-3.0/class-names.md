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

Для примера `$modx->getIterator('modResource')` все равно будет работать - _пока_, хотя `\modResource` класс сейчас `\MODX\Revolution\modResource`.

Это будет регистрировать устаревшее сообщение в журнале ошибок, призывающее вас обновить ссылку. Правильный вызов был бы `$modx->getIterator(\MODX\Revolution\modResource::class)`.

Важно отметить, что если вы **проверяете тип** результат такого вызова (например `if ($foo instanceof modResource)`), вы не можете сразу столкнуться с ошибкой (по сравнению с typehinting, например `public function(modResource $foo)`, что действительно вызывает ошибку), но это **будет оценивать к `false`** потому что старое имя класса больше не существует, так что проверка всегда терпит неудачу.

Вы можете ввести проверку против несуществующих классов без предупреждения в PHP, поэтому вы можете решить это путем проверки типов для имени класса 2.x и 3.0. (например, `if (($foo instanceof modResource) || $foo instanceof \MODX\Revolution\modResource))`

## Мягкие Изменения

Следующие имена классов были изменены, но были псевдонимы в версии 3.0, чтобы облегчить проблемы обновления, поскольку они обычно используются. Псевдонимы автоматически находятся в `modX::loadConfig`, если `load_deprecated_global_class_aliases` равно true, что по умолчанию. Это можно отключить, добавив ключ со значением `false` в ваши `$config_options` в `core/config/config.inc.php`.

**Псевдонимы больше не будут автоматически доступны в MODX 3.3.** Если вы еще не обновили соответствующий код к тому времени, вы можете вручную потребовать `core/include/deprecated.php` чтобы временно решить эту проблему, но вы все равно должны обновить код до новых классов.

Этот уровень обратной совместимости, вероятно, будет полностью удален в MODX 4.0.

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

### Ядро и процессоры MODX

| Новый класс                                   | Старый класс                  |
| --------------------------------------------- | ----------------------------- |
| \MODX\Revolution\modX                         | \modX                         |
| \MODX\Revolution\modProcessor                 | \modProcessor                 |
| \MODX\Revolution\modObjectProcessor           | \modObjectProcessor           |
| \MODX\Revolution\modObjectCreateProcessor     | \modObjectCreateProcessor     |
| \MODX\Revolution\modObjectExportProcessor     | \modObjectExportProcessor     |
| \MODX\Revolution\modObjectGetListProcessor    | \modObjectGetListProcessor    |
| \MODX\Revolution\modObjectGetProcessor        | \modObjectGetProcessor        |
| \MODX\Revolution\modObjectImportProcessor     | \modObjectImportProcessor     |
| \MODX\Revolution\modObjectRemoveProcessor     | \modObjectRemoveProcessor     |
| \MODX\Revolution\modObjectSoftRemoveProcessor | \modObjectSoftRemoveProcessor |
| \MODX\Revolution\modObjectUpdateProcessor     | \modObjectUpdateProcessor     |
| \MODX\Revolution\modParsedManagerController   | \modParsedManagerController   |
| \MODX\Revolution\modObjectDuplicateProcessor  | \modObjectDuplicateProcessor  |
| \MODX\Revolution\modExtraManagerController    | \modExtraManagerController    |

### Классы моделей MODX

| Новый класс                  | Старый класс |
| ---------------------------- | ------------ |
| \MODX\Revolution\modResource | \modResource |

### Процессоры

Все процессоры были переименованы и перемещены, включая базовые классы процессоров. Процессоры с плоскими файлами также больше не поддерживаются. [Смотрите документацию по выделенным процессорам](getting-started/upgrading-to-3.0/processors)

## Измененные классы, без пути обновления

Все остальные модели и классы обслуживания не включают автоматический псевдоним. Это включает в себя утилиты, такие как парсер (`\MODX\Revolution\modParser`)

## Удаленные классы

Эти классы были навсегда удалены из 3.0 без альтернативы:

-   `modDeprecatedProcessor`
-   `modParser095`
-   `modTranslate095`
-   `modTranslator`
-   All classes and functions related to the `xmlrss` service/utility: `Snoopy`, `MagpieRSS`, `modRSSParser`, `RSSCache`, function `parse_w3cdtf`, function `fetch_rss`. To fetch RSS feeds, you can now use SimplePie.
-   All classes and functions related to the `xmlrpc` and `jsonrpc` services/utilities: `modXMLRPCResponse`, `modJSONRPCResponse`, `modXMLRPCResource` (+ platform classes), `modJSONRPCResource` (+ platform classes)
-   `modManagerControllerDeprecated`

## Изменения подписи

-   `modResponse::_construct` (и унаследовал `modManagerResponse`/`modConnectorResponse`) теперь помечен как «открытый» и больше не содержит амперсанд, поскольку объекты всегда передаются по ссылке.
-   `Processor::getInstance` и `modManagerController::getInstance` больше не использовать амперсанд для передачи modX в качестве ссылки.
