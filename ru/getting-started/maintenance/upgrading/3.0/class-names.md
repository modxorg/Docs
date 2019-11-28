---
title: Изменение Имен Классов
note: Этот список может быть неполным, пожалуйста, отредактируйте эту страницу, чтобы помочь сделать его полным. 
translation: 'getting-started/maintenance/upgrading/3.0/class-names'
---

Чтобы реализовать пространства имен и понять смысл определенного кода, многие файлы и классы были переименованы и перемещены в 3.0. Это приводит к потенциальным нарушающим изменениям.

В некоторых случаях вы можете столкнуться с предупреждениями или ошибками (включая фатальные ошибки):

- при использовании прямых операторов `include`/`require`, нацеленных на любой соответствующий файл, которого больше нет
- при расширении одного из этих классов
- когда тип намекает против этих классов

## Примечание о моделях и классах обслуживания

Большинство классов моделей и служб, которые загружаются через `$modx->loadClass` (который включает в себя конструктор запросов xPDO для классов моделей) или `$modx->getService` будет по-прежнему работать, так как `loadClass` внутренне переводит их в свои новые имена классов.

Для примера `$modx->getIterator('modResource')` все равно будет работать - _пока_, хотя `\modResource` класс сейчас `\MODX\Revolution\modResource`.

Это будет регистрировать устаревшее сообщение в журнале ошибок, призывающее вас обновить ссылку. Правильный вызов был бы `$modx->getIterator(\MODX\Revolution\modResource::class)`.

Важно отметить, что если вы **проверяете тип** результат такого вызова (например `if ($foo instanceof modResource)`), вы не можете сразу столкнуться с ошибкой (по сравнению с typehinting, например `public function(modResource $foo)`, что действительно вызывает ошибку), но это **будет оценивать к `false`** потому что старое имя класса больше не существует, так что проверка всегда терпит неудачу.

Вы можете ввести проверку против несуществующих классов без предупреждения в PHP, поэтому вы можете решить это путем проверки типов для имени класса 2.x и 3.0. (например, `if (($foo instanceof modResource) || $foo instanceof \MODX\Revolution\modResource))`

## Мягкие Изменения

Следующие имена классов были изменены, но были псевдонимы в версии 3.0, чтобы облегчить проблемы обновления, поскольку они обычно используются. Псевдонимы автоматически включаются через автозагрузчик.

**Псевдонимы больше не будут автоматически доступны в MODX 3.3.** Если вы еще не обновили соответствующий код к тому времени, вы можете вручную потребовать `core/include/deprecated.php` чтобы временно решить эту проблему, но вы все равно должны обновить код до новых классов.

Этот уровень обратной совместимости, вероятно, будет полностью удален в MODX 4.0.

### xPDO

| Новый Class                       | Старый Class       |
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

| Новый Class                                   | Старый Class                  |
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

| Новый Class                  | Старый Class |
| ---------------------------- | ------------ |
| \MODX\Revolution\modResource | \modResource |

## Жесткие Изменения

Изменения имени класса в этом разделе **не** имеют отдельного уровня совместимости, сразу же недоступны в версии 3.0. Они (относительно) не используются в расширенных классах, но могут использоваться для указания типа.

... все процессоры. ..
