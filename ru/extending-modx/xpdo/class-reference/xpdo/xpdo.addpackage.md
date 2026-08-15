---
title: "xPDO.addPackage"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage"
---

## xPDO::addPackage

Загружает классы ORM-отображения xPDO, которые описывают объекты вашего пакета. По соглашению MODX эти классы лежат в каталоге `model/` компонента. После вызова `addPackage` xPDO может работать с вашими объектами и с таблицами, которые они описывают.

xPDO опирается на файл `metadata.{dbtype}.php` в каталоге пакета (`$path` + `$pkg`), например `metadata.mysql.php`. В нём перечислены активные классы и то, какие из них расширяют ядро. По смыслу это похоже на автозагрузку моделей пакета.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::addPackage()>

```php
boolean addPackage (
    [string $pkg = ''],
    [string $path = ''],
    [string|null $prefix = null],
    [string|null $namespacePrefix = null]
)
```

- `$pkg` — имя подпапки внутри `$path`. В ней лежат файлы `*.class.php` и чаще всего платформенная папка вроде `mysql/` с картами (`*.map.inc.php`) и `metadata.{dbtype}.php`.
- `$path` — абсолютный путь к каталогу, который **содержит** подпапку `$pkg`. Заканчивайте путь слэшем.
- `$prefix` — необязательный префикс таблиц только для этого пакета. В почти всём коде под MODX его не передавайте (`null`): xPDO возьмёт префикс соединения (`xPDO::OPT_TABLE_PREFIX`), то есть префикс сайта из `config.inc.php`. Любая непустая строка **переопределяет** этот префикс MODX для всех таблиц пакета.
- `$namespacePrefix` — необязательный PSR-4 префикс пространства имён для классов модели (xPDO 3 / MODX 3).

Метод возвращает `true` при успехе и `false` при ошибке. При сбое смотрите журнал.

### Когда передавать `$prefix`

**По умолчанию не передавайте `$prefix`.** Пакеты в той же БД, что и MODX, должны использовать префикс сайта. Если зашить `mypkg_` (или другую строку), а установка сидит на `modx_` или на своём «закалённом» префиксе, запросы попадут не в те таблицы. Первыми ломаются сайты, где [сменили префикс БД по умолчанию](getting-started/maintenance/securing-modx#changing-default-database-prefixes).

Явный `$prefix` нужен только когда таблицы пакета **намеренно** живут под другим префиксом, чем соединение MODX (легаси-импорт, чужая схема, второй экземпляр xPDO со своим префиксом). Тогда зафиксируйте это в схеме, картах и вызове.

Если пакет собран под тот же префикс, что и MODX, вызывайте `addPackage` с двумя аргументами (или передайте `null`) и дайте соединению подставить префикс.

## Пример

Чаще всего сниппет или плагин загружает пакет через `MODX_CORE_PATH` и указывает на `model/` компонента. Третий аргумент не передавайте: пакет возьмёт префикс таблиц MODX.

```php
$modx->addPackage('mypkg', MODX_CORE_PATH . 'components/mypkg/model/');
```

## Другой пример

На скриншоте — дерево компонента FormIt. Соседние папки внутри `model/` — это пакеты, которые вы передаёте как `$pkg`, когда `$path` указывает на `model/`:

![Дерево компонента FormIt с пакетами в model](formit-model-structure.png)

Каталог `model/` у FormIt по-прежнему выглядит так:

``` text
core/components/formit/model/
├── formit/
├── recaptcha/
├── schema/
└── stopforumspam/
```

Загрузка одного из этих пакетов:

```php
$modx->addPackage('formit', MODX_CORE_PATH . 'components/formit/model/');
```

Или другого пакета из того же пути:

```php
$modx->addPackage('recaptcha', MODX_CORE_PATH . 'components/formit/model/');
```

`addPackage` ожидает метаданные пакета (`metadata.{dbtype}.php`) в `$path/$pkg/`. Папки без этого файла могут хранить классы для [`loadClass`](extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass). Без метаданных в журнал попадёт предупреждение.

В актуальном FormIt есть и namespaced-модель xPDO в `core/components/formit/src/FormIt/Model/` (с `metadata.mysql.php`). Для неё укажите `$path` на этот каталог Model и при PSR-4 передайте `$namespacePrefix`.

## Тестирование

```php
$xpdo->setLogLevel(xPDO::LOG_LEVEL_INFO);
$xpdo->setLogTarget('ECHO');
if (!$xpdo->addPackage('my_package', '/path/to/docroot/core/components/my_package/model/')) {
    print 'Возникли проблемы при установке вашего пакета';
}
```

`$path` (2-й аргумент) должен существовать, иначе xPDO запишет ошибку. Если `$pkg` не является подпапкой `$path`, жёсткой ошибки может не быть. Смотрите журнал на предупреждения о метаданных.

При сбое метод пишет подробные сообщения в журнал.

## Добавление пакетов из других баз данных

`addPackage()` работает с любым экземпляром xPDO, у которого есть доступ к валидным файлам классов и карт. Чтобы работать с другой БД, создайте новый экземпляр xPDO с нужным подключением, как описано в [Соединения с базой данных и xPDO](extending-modx/xpdo/create-xpdo-instance/connections).

## Создание таблиц

Загрузка пакета только регистрирует PHP-классы. Если пакет описывает таблицы, их ещё нужно создать. Обычно это делает установщик пакета. Для ручной настройки используйте [xPDOManager.createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer).

## Смотрите также

- [xPDO](extending-modx/xpdo)
- [Загрузка пакетов](extending-modx/xpdo/custom-models/loading-package)
