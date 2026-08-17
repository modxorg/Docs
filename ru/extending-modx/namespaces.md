---
title: "Пространства имён"
translation: "extending-modx/namespaces"
---

Пространства имён организуют компоненты: связывают строки лексикона и пакеты и показывают Revolution, какие объекты к какому пакету относятся.

Лексиконы, контроллеры, процессоры и пакеты моделей обычно лежат внутри конкретного пространства имён.

## Использование

Revolution по путям пространства имён находит файлы сторонних компонентов для пользовательских страниц Менеджера и подтягивает для них языковые строки.

Пример: пространство имён `quip` с путём `/www/modx/core/components/quip/`. Когда CMP открывается из [Action](extending-modx/menus/actions) с контроллером `index`, MODX ищет `/www/modx/core/components/quip/index.php` и подставляет его как страницу CMP. Практичнее указать контроллер `controllers/index`, тогда файл будет `/www/modx/core/components/quip/controllers/index.php` (обычная схема путей для Extras в MODX).

## Лексиконы в пространствах имён

Пространство имён изолирует лексиконы и темы. При загрузке укажите пространство имён перед именем темы через двоеточие. Тема `comment` для `quip`:

```php
$modx->lexicon->load('quip:comment');
```

Для английского языка система ищет `lexicon/en/comment.inc.php` в пути пространства имён Quip. Темы подгружаются по этому пути. Класть файлы тем в каталоги ядра MODX не нужно.

- [Интернационализация](extending-modx/internationalization)

## Bootstrap сервисов

Если в корне пространства имён есть файл `bootstrap.php`, MODX подключит его при инициализации.

Так можно [регистрировать сервисы в DI-контейнере](extending-modx/di-container).

В `bootstrap.php` доступны:

- `MODX\Revolution\modX $modx`
- `array $namespace`

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
