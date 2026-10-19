---
title: "Пространства имён"
description: Как пространства имён MODX находят лексивы, контроллеры менеджера и пакеты моделей, и что выполняется в bootstrap.php пространства имён."
translation: "extending-modx/namespaces"
---

Пространство имён организует компоненты: сопоставляет короткое имя каталогу на диске, по которому MODX находит лективы компонента, контроллеры менеджера и пакеты моделей без прописанных в коде путей.

Лексивы и контроллеры находятся через пространство имён. **Процессоры — нет**, см. [Процессоры](extending-modx/processors).

## Использование

Страницу менеджера задают два параметра запроса: `namespace` (по умолчанию `core`) и `a`, в котором лежит действие. По `?a=some/action&namespace=quip` MODX ищет контроллер в каталоге пространства имён `quip` — чаще всего это `core/components/quip/controllers/some/action.class.php`.

Если у пространства имён `quip` путь `/www/modx/core/components/quip/`, файл выше найдётся как `/www/modx/core/components/quip/controllers/some/action.class.php`.

Пункты меню хранят ту же пару: в `modMenu` есть колонки `action` и `namespace` (по умолчанию `core`). Колонки `controller` нет — класс `modAction` и его поле `controller` удалены в 3.0. Полный порядок разрешения описан в разделе [Контроллеры и меню](extending-modx/menus/actions "Controllers and Menus").

## Лексивы в пространствах имён

Пространства имён изолируют лективы и темы. Чтобы загрузить тему `comment` из пространства имён `quip`, укажите пространство имён перед именем темы через двоеточие:

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

::: warning
`_initNamespaces()` выполняется рано — до загрузки пакетов расширений, до инициализации культуры и до события `OnMODXInit`. В этот момент `$modx->lexicon` ещё `null`, а модели компонентов не зарегистрированы. Здесь регистрируйте автозагрузчики и сервисы; всё, что зависит от лексикона или модели, выполняйте из `OnMODXInit`.
:::

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