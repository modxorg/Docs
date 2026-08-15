---
title: "xPDO 3"
description: "Composer, PSR-4 и миграция кастомных моделей с MODX 2.x на MODX 3 / xPDO 3."
sortorder: 5
translation: "getting-started/upgrading-to-3.0/xpdo"
---

В MODX 3 **xPDO 3** ставится через Composer (`xpdo/xpdo` в `composer.json`). Библиотека больше не лежит россыпью в `core/xpdo/`. Классы моделей живут в PHP-namespaces и грузятся через PSR-4. [#14534](https://github.com/modxcms/revolution/pull/14534), [#13781](https://github.com/modxcms/revolution/pull/13781)

Эта страница — ориентир для апгрейда. Пошаговая сборка нового Extra: [Использование пользовательских таблиц БД](extending-modx/tutorials/using-custom-database-tables). Справочник API: [xPDO](extending-modx/xpdo).

## Что меняется для вас

| Тема | MODX 2 / xPDO 2 | MODX 3 / xPDO 3 |
| --- | --- | --- |
| Где лежит xPDO | `core/xpdo/` | `core/vendor/xpdo/` через Composer |
| Autoload | загрузчики MODX / xPDO | Composer `autoload.php` + PSR-4 |
| Модели ядра | `core/model/modx/*.class.php` | `core/src/Revolution/` в `MODX\Revolution\` |
| Атрибут `package` в schema | короткое имя пакета (`modx`) | PHP-namespace (`MODX\Revolution\`) |
| Базовые классы | `xPDOObject`, `xPDOSimpleObject` | `xPDO\Om\xPDOObject`, `xPDO\Om\xPDOSimpleObject` |
| Метаданные пакета | поклассовые `*.map.inc.php` в `mysql/` | пакетный `metadata.mysql.php` с `class_map` (schema `version="3.0"`) |
| `addPackage` | путь + папка пакета | путь + namespaced package + опциональный `$namespacePrefix` |

`modX` по-прежнему расширяет `xPDO\xPDO`, поэтому `$modx->getObject()`, `newQuery()` и остальное остаются на экземпляре MODX.

## Composer и PSR-4

Зависимости ставятся из корня проекта (там, где `composer.json`):

```bash
composer install
# или после смены зависимостей
composer update
```

Composer кладёт библиотеки в `core/vendor/` и собирает `core/vendor/autoload.php`. Setup и фронт-контроллеры подключают этот autoloader. Отдельные файлы классов xPDO подключать не нужно.

Код ядра MODX тоже идёт через Composer (`"MODX\\": "core/src/"`). Поэтому [каталог core должен оставаться `/core/`](getting-started/upgrading-to-3.0/core-folder) в корне проекта.

## Раскладка моделей ядра

Схемы по-прежнему в `core/model/schema/` (например `modx.mysql.schema.xml`). Сгенерированные классы и карты — в `core/src/`:

- Класс: `core/src/Revolution/modResource.php` → `MODX\Revolution\modResource`
- Метаданные пакета: `core/src/Revolution/metadata.mysql.php`
- Карты платформы: `core/src/Revolution/mysql/*.php`

Пересборка ядра (Git / contributor):

```bash
composer run-script parse-schema
```

Скрипт вызывает `core/vendor/bin/xpdo parse-schema` с `--psr4=MODX\\` в `core/src/`. Подробнее: [Building model/schema](contribute/code/tooling/model).

## Загрузка пакета Extra

Регистрация namespaced-модели из bootstrap компонента (пути зависят от Extra; `$namespace['path']` — core path Extra):

```php
$modx->addPackage(
    'ToDo\\Model',
    $namespace['path'] . 'src/',
    null,
    'ToDo\\'
);
```

- Первый аргумент: PHP-пакет / сегмент namespace, где лежит `metadata.{dbtype}.php`.
- Второй: корень файловой системы для этого PSR-4 префикса (часто `.../src/`).
- Третий: свой table prefix или `null` для префикса сайта.
- Четвёртый: `$namespacePrefix`, чтобы xPDO корректно повесил PSR-4, когда путь пакета вложен под этот префикс.

После успешного `addPackage` работайте с FQCN:

```php
$item = $modx->newObject(\ToDo\Model\Task::class);
$item = $modx->getObject(\ToDo\Model\Task::class, $id);
```

Про подводные камни prefix: [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage).

## Schema и сгенерированные файлы

Минимальная schema для MODX 3:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="ToDo\Model" baseClass="xPDO\Om\xPDOObject" platform="mysql"
       defaultEngine="InnoDB" version="3.0">
    <object class="Task" table="todo_task" extends="xPDO\Om\xPDOSimpleObject">
        <field key="title" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
    </object>
</model>
```

Генерация — вашим build-скриптом или CLI xPDO (`core/vendor/bin/xpdo parse-schema ...`). На выходе ожидайте:

- `src/Model/Task.php` с `namespace ToDo\Model;`
- `src/Model/metadata.mysql.php` (`version` ≥ `3.0`, `namespace`, `namespacePrefix`, `class_map`)
- `src/Model/mysql/Task.php` (карта платформы)

Старые раскладки 2.x только с `model/mycomp/mysql/myobject.map.inc.php` без `metadata.mysql.php` версии 3.0 дают warning по metadata и не регистрируют PSR-4 так же.

## Миграция модели Extra с 2.x

Пройдите чеклист для каждого кастомного пакета:

1. **Перенесите классы** в дерево `src/`, зеркалящее PHP-namespace (`MyExtra\Model\...`).
2. **Перепишите schema**: `package` = PHP-namespace, `version="3.0"`, namespaced `extends` и `class` у связей (`xPDO\Om\...`, при связях с ядром — `MODX\Revolution\...`).
3. **Перегенерируйте** карты и классы. Закоммитьте `metadata.mysql.php` и карты в `mysql/`.
4. **Обновите `addPackage`** до namespaced-формы и вызывайте его из [`bootstrap.php`](extending-modx/namespaces) при загрузке Extra.
5. **Замените строковые имена классов** на `::class` или FQCN в `getObject`, `newObject`, `newQuery`, процессорах и атрибутах vehicle.
6. **Исправьте `instanceof` и type hint’ы** на namespaced-классы. Короткие имена вроде `modResource` или старого `MyObject` в 3.x не являются реальными PHP-классами.
7. **Уберите** `require`/`include` для `xpdo.class.php` и отдельных model-файлов. Опирайтесь на Composer и `addPackage`.

### Было / стало (объект ядра)

```php
// MODX 2.x
$resource = $modx->getObject('modResource', $id);
if ($resource instanceof modResource) { /* ... */ }

// MODX 3.x
use MODX\Revolution\modResource;

$resource = $modx->getObject(modResource::class, $id);
if ($resource instanceof modResource) { /* ... */ }
```

`$modx->getObject('modResource', $id)` ещё может отработать через перевод в `loadClass` и записать deprecation в лог. Лучше namespaced-форма. `instanceof modResource` со старым global-именем всегда false. Таблица алиасов: [Изменение имён классов](getting-started/upgrading-to-3.0/class-names).

### Было / стало (свой пакет)

```php
// MODX 2.x
$modx->addPackage('myextra', MODX_CORE_PATH . 'components/myextra/model/');
$row = $modx->getObject('myExtraItem', $id);

// MODX 3.x
$modx->addPackage('MyExtra\\Model', MODX_CORE_PATH . 'components/myextra/src/', null, 'MyExtra\\');
$row = $modx->getObject(\MyExtra\Model\Item::class, $id);
```

## CLI xPDO

В xPDO 3 есть `core/vendor/bin/xpdo`. Ядро вызывает его из Composer-скриптов (`parse-schema`). Extra может вызывать тот же бинарник со своим schema-путём и `--psr4=YourPrefix\\`. При желании пропишите это в `composer.json` пакета.

## Связанные страницы

- [Использование пользовательских таблиц БД](extending-modx/tutorials/using-custom-database-tables) — пошаговая модель Extra
- [Изменение имён классов](getting-started/upgrading-to-3.0/class-names) — алиасы и `instanceof`
- [Каталог core](getting-started/upgrading-to-3.0/core-folder) — почему `/core/` фиксирован
- [Структура каталогов](getting-started/directory-structure) — `vendor/` и `src/`
- [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage)
- [Building model/schema](contribute/code/tooling/model) — пересборка schema ядра
