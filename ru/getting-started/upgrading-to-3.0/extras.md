---
title: "Обновление дополнений для 3.0"
description: "Чеклист для авторов Extras: пространства имён, процессоры, модели xPDO, меню и CRC при переходе с MODX 2.x на 3.x."
translation: "getting-started/upgrading-to-3.0/extras"
sortorder: 2
---

Владельцы сайтов идут по [Обновлению с 2.x до 3.0](getting-started/upgrading-to-3.0). Эта страница для тех, кто собирает и сопровождает transport-пакеты.

Список совместимых пакетов: [SiteDash](https://sitedash.app/extras). Подробности на связанных страницах ниже. Заметки [theboxer](https://github.com/theboxer) по [Collection](https://github.com/modxcms/Collections) (сводка на [modx.pro](https://modx.pro/development/19429)) показывают Extra, который расширяет `modResource`.

## Какой объём поддержки

| Цель | Подход |
| --- | --- |
| Только MODX 3 | Имена с namespace, модели PSR-4, `bootstrap.php`. Убрать `require_once` старых путей ядра. |
| Один пакет на 2.x и 3.x | Ветвление по версии (`$modx->version['version'] >= 3`), префиксы имён классов или динамические родительские классы. Больше работы. Обзор: [Modernizing Extras cheat sheet](https://modx.com/blog/modernizing-extras-conversion-cheat-sheet). |

Глобальные алиасы (`modResource`, `modObjectCreateProcessor`, …) в 3.0-3.2 по умолчанию ещё подключаются через `load_deprecated_global_class_aliases`. Автоподключение планируют убрать в **3.3**. К этому моменту код лучше перевести на namespace. См. [Изменённые имена классов](getting-started/upgrading-to-3.0/class-names).

## Чеклист

Пройдите пункты, которые относятся к вашему Extra.

1. **Версия PHP**: ориентируйтесь на минимум той линейки MODX, которую поддерживаете ([требования](getting-started/upgrading-to-3.0/requirements)).
2. **Имена классов**: в `extends`, type hint и `instanceof` вместо коротких имён ядра используйте `MODX\Revolution\…` / `xPDO\…`. Таблицы: [Изменённые имена классов](getting-started/upgrading-to-3.0/class-names).
3. **Процессоры**: наследуйтесь от новых namespace процессоров. Flat-file процессоры уберите. Удалите `require_once` на `core/model/modx/modprocessor.class.php` и `…/processors/resource/*.class.php` (эти пути исчезли). Подробнее: [Процессоры](getting-started/upgrading-to-3.0/processors).
4. **Модели xPDO**: в схеме `package` это PHP-namespace, `version="3.0"`, пересоберите `metadata.mysql.php`, вызовите `addPackage` с префиксом namespace, зарегистрируйте PSR-4. Гайд: [xPDO 3](getting-started/upgrading-to-3.0/xpdo).
5. **`bootstrap.php`**: необязательный файл в корне Extra (путь namespace). Autoload, `addPackage`, сервисы DI. См. [Пространства имён](extending-modx/namespaces) и [DI-контейнер](extending-modx/di-container).
6. **Меню / CMP**: без `modAction`. В меню `action` это имя контроллера в namespace (`/manager/?namespace=myextra&a=home`). См. [modAction и связанные](getting-started/upgrading-to-3.0/actions).
7. **JS менеджера**: `MODx.config.manager_language` → `MODx.config.cultureKey` ([Язык менеджера](getting-started/upgrading-to-3.0/manager-language)).
8. **HTTP-клиент**: `modRestClient` удалён. Используйте [HTTP-сервис](extending-modx/services/http).
9. **Сборка / установка**: проверьте install и upgrade на MODX 3. Для 3.x удобнее актуальная заготовка ([ModExtra3](https://github.com/modx-pro/ModExtra3)). В 3.0 Markdown в атрибутах пакета разбирается ([скрипт сборки](extending-modx/transport-packages/build-script)).

## Пример: Extra расширяет `modResource` (паттерн Collections)

Если кастомный ресурс должен попадать в `$modx->getDescendants(\MODX\Revolution\modResource::class)`, в схеме у `extends` нужно полное имя класса ядра.

### Схема

Было:

```php
<object class="CollectionContainer" extends="modResource">
    <!-- колонки без изменений -->
</object>
```

Стало:

```php
<object class="CollectionContainer" extends="MODX\Revolution\modResource">
    <!-- колонки без изменений -->
</object>
```

Пересоберите модель, чтобы обновился `metadata.mysql.php`.

### PHP-класс и процессоры

Уберите устаревшие подключения, например:

```php
require_once MODX_CORE_PATH . 'model/modx/modprocessor.class.php';
require_once MODX_CORE_PATH . 'model/modx/processors/resource/create.class.php';
require_once MODX_CORE_PATH . 'model/modx/processors/resource/update.class.php';
```

Наследуйтесь от типов с namespace:

| 2.x | 3.x |
| --- | --- |
| `modResource` | `MODX\Revolution\modResource` |
| `modResourceCreateProcessor` | `MODX\Revolution\Processors\Resource\Create` |
| `modResourceUpdateProcessor` | `MODX\Revolution\Processors\Resource\Update` |

То же для любых `{ClassKey}CreateProcessor` / `{ClassKey}UpdateProcessor`. См. [Процессоры](getting-started/upgrading-to-3.0/processors) и [пользовательские классы ресурсов](building-sites/resources/custom-resources).

## Связанные страницы

- [Критические изменения](getting-started/upgrading-to-3.0/breaking-changes)
- [Изменённые имена классов](getting-started/upgrading-to-3.0/class-names)
- [Процессоры](getting-started/upgrading-to-3.0/processors)
- [xPDO 3](getting-started/upgrading-to-3.0/xpdo)
- [modAction и связанные](getting-started/upgrading-to-3.0/actions)
- [Пространства имён](extending-modx/namespaces)
- [Modernizing Extras (серия в блоге MODX)](https://modx.com/blog/modernizing-extras-conversion-cheat-sheet)
