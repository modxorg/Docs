---
title: "Пространства имён"
description: Как пространства имён MODX находят лексивы, контроллеры менеджера и пакеты моделей, и что выполняется в bootstrap.php пространства имён."
translation: "extending-modx/namespaces"
---

Пространство имён сопоставляет короткое имя каталогу на диске. По этому каталогу MODX находит лексиконы компонента, контроллеры менеджера и пакеты моделей без прописанных в коде путей.

Лексиконы и контроллеры находятся через пространство имён. **Процессоры так не находятся.** См. [Процессоры](extending-modx/processors).

## Использование

Страницу менеджера задают два параметра запроса: `namespace` (по умолчанию `core`) и `a`, в котором лежит действие. По `?a=some/action&namespace=quip` MODX ищет контроллер в каталоге пространства имён `quip` — чаще всего это `core/components/quip/controllers/some/action.class.php`.

Если у пространства имён `quip` путь `/www/modx/core/components/quip/`, файл выше найдётся как `/www/modx/core/components/quip/controllers/some/action.class.php`.

Класс внутри файла не совпадает с именем файла. MODX пишет пространство имён с заглавной буквы, склеивает его с действием и режет строку по `/`. Каждый кусок пишется с заглавной буквы, а `.`, `_` и `-` убираются.

- пространство имён `quip`, действие `home` → `QuiphomeManagerController`
- пространство имён `quip`, действие `some/action` → `QuipsomeActionManagerController`

Класс с другим именем менеджер не загрузит.

Пункты меню хранят ту же пару: в `modMenu` есть колонки `action` и `namespace` (по умолчанию `core`). Колонки `controller` нет — класс `modAction` и его поле `controller` удалены в 3.0. Полный порядок разрешения описан в разделе [Контроллеры и меню](extending-modx/menus/actions "Controllers and Menus").

## Лексиконы в пространствах имён

Пространства имён изолируют лексиконы и темы. Чтобы загрузить тему `comment` из пространства имён `quip`, укажите пространство имён перед именем темы через двоеточие:

```php
$modx->lexicon->load('quip:comment');
```

Для английского языка система ищет `lexicon/en/comment.inc.php` в пути пространства имён, поэтому темы можно держать вне каталогов ядра MODX и подгружать по требованию.

- [Интернационализация](extending-modx/internationalization)

## Bootstrap сервисов

Если в корне пространства имён есть файл `bootstrap.php`, MODX подключит его при инициализации.

Так можно [регистрировать сервисы в DI-контейнере](extending-modx/di-container).

В файле доступны:

- `MODX\Revolution\modX $modx`
- `array $namespace`

> [!WARNING]
> `_initNamespaces()` выполняется рано — до загрузки пакетов расширений, до инициализации культуры и до события `OnMODXInit`. В этот момент `$modx->lexicon` ещё `null`, а модели компонентов не зарегистрированы. Здесь регистрируйте автозагрузчики и сервисы. Всё, что зависит от лексикона или модели, выполняйте из `OnMODXInit`.

### Примеры

PSR-4 автозагрузчик на каталог `src` пространства имён:

```php
\MODX\Revolution\modX::getLoader()->addPsr4('My\\Component\\', $namespace['path'] . 'src/');
```

Загрузка модели xPDO:

```php
$modx->addPackage('My\\Component\\Model', $namespace['path'] . 'src/', null, 'My\\Component\\');
```

Регистрация сервиса в [DI-контейнере](extending-modx/di-container):

```php
$modx->services->add('my_service', function($c) use ($modx) {
    return new My\Component\MyService($modx);
});
```

Выберите уникальное имя сервиса.