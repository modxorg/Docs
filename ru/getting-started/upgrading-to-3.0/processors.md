---
title: Процессоры
translation: "getting-started/upgrading-to-3.0/processors"
---

В MODX 3.0 все процессоры были **переименованы** и **перемещены** по сравнению с 2.x. Это также включает в себя базовые процессоры (`modObject...Processor`).

Для сторонних дополнений это означает:

-   Если вы добавите какой-либо основной процессор в пользовательский код, это потребует вашего внимания.
-   Если вы вызываете какие-либо основные процессоры с помощью `runProcessor`, они все равно должны работать, но могут иметь немного другое поведение.
-   Если вы используете процессоры с плоскими файлами, вам нужно будет переписать процессор в класс.

## Базовые процессоры

Любой процессор, который ранее унаследовал от базового процессора (такого как `modProcessor`, `modObjectProcessor`, `modDriverSpecificProcessor` и любой `modObject*Processor`), необходимо будет обновить. Практически это означает, что каждый процессор.

Чтобы облегчить переход на 3.0, старые имена классов автоматически становятся доступными как псевдонимы, но **эти псевдонимы будут удалены в MODX 3.3**.

-   Если вы хотите поддерживать оба 2.x и 3.x, вы можете продолжать использовать классы `modObject...Processor`, но вы должны составить план для MODX 3.3+. Сообщите своим пользователям, какие версии вы намерены поддерживать, и до каких пор.
-   Чтобы обновить вашу кодовую базу для поддержки 3.0+ (и не требовать дополнительных обновлений, когда выйдет 3.3), вам нужно изменить имя класса, который вы расширяете.

| Старый класс                    | Новый класс                                             |
| ------------------------------- | ------------------------------------------------------- |
| `\modProcessor`                 | `\MODX\Revolution\Processors\Processor`                 |
| `\modObjectProcessor`           | `\MODX\Revolution\Processors\ModelProcessor`            |
| `\modDriverSpecificProcessor`   | `\MODX\Revolution\Processors\DriverSpecificProcessor`   |
| `\modObjectCreateProcessor`     | `\MODX\Revolution\Processors\Model\CreateProcessor`     |
| `\modObjectDuplicateProcessor`  | `\MODX\Revolution\Processors\Model\DuplicateProcessor`  |
| `\modObjectExportProcessor`     | `\MODX\Revolution\Processors\Model\ExportProcessor`     |
| `\modObjectGetListProcessor`    | `\MODX\Revolution\Processors\Model\GetListProcessor`    |
| `\modObjectGetProcessor`        | `\MODX\Revolution\Processors\Model\GetProcessor`        |
| `\modObjectRemoveProcessor`     | `\MODX\Revolution\Processors\Model\RemoveProcessor`     |
| `\modObjectSoftRemoveProcessor` | `\MODX\Revolution\Processors\Model\SoftRemoveProcessor` |
| `\modObjectUpdateProcessor`     | `\MODX\Revolution\Processors\Model\UpdateProcessor`     |

## Вызов процессоров ядра с runProcessor

Любой вызов к ядру процессора должен быть рассмотрен. Старые имена действий в [modX::runProcessor](extending-modx/modx-class/reference/modx.runprocessor) (например `resource/create`) все еще поддерживаются, но возможно, что внутренняя логика некоторых процессоров изменилась.

## Процессоры с плоскими файлами больше не поддерживаются

Поддержка так называемых процессоров с плоскими файлами (которые заканчиваются на `.php` вместо `.class.php` и не используют класс процессора) была удалена.

Любой процессор плоских файлов должен быть преобразован в объектно-ориентированный процессор с использованием классов, упомянутых выше.
