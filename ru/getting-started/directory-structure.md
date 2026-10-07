---
title: "Структура каталогов"
sortorder: 6
_old_id: "108"
_old_uri: "2.x/getting-started/an-overview-of-modx/glossary-of-revolution-terms/explanation-of-directory-structure"
translation: "getting-started/directory-structure"
---

Типичная структура верхнего уровня после установки:

| Путь | Назначение |
|---|---|
| `index.php` | Фронт-контроллер веб-контекста |
| `ht.access` | Шаблон перезаписи Apache; переименуйте в `.htaccess` для дружественных URL |
| `composer.json` | PHP-зависимости, ставятся в `core/vendor/` |
| `connectors/` | Точки входа AJAX-запросов |
| `core/` | Код приложения, конфиг, кеш, пакеты, библиотеки vendor |
| `manager/` | Интерфейс Менеджера (бэкенд) |
| `setup/` | Установщик и инструмент обновления; удалите после установки или обновления |
| `_build/` | Сборка транспортного пакета ядра (только Git-клоны) |
| `assets/` | Медиа и фронтенд-файлы Extras |

`core/` должен оставаться по пути `/core/` в корне проекта — его нельзя переместить или переименовать в 3.x. Каталоги `manager/` и `connectors/` можно переименовать при [расширенной установке](getting-started/installation/advanced). См. также [Изменения каталога core в 3.0](getting-started/upgrading-to-3.0/core-folder).

## connectors/

Коннекторы: HTTP-точки входа для AJAX-запросов Менеджера (и других). Сами базу данных не меняют. Они загружают MODX, очищают запрос и передают его [процессору](extending-modx/processors).

В 3.x большая часть трафика Менеджера идёт через `connectors/index.php` с параметром `action` (например `Resource/Create`). Это разрешается в класс под `core/src/Revolution/Processors/`.

### Важные файлы

- **connectors/index.php**: основной bootstrap коннектора. Пользовательские коннекторы обычно подключают этот файл (или повторяют его bootstrap), затем вызывают `$modx->request->handleRequest()`.
- **connectors/config.core.php**: создаётся установщиком, указывает путь к ядру и ключ конфигурации.
- **connectors/system/**: несколько отдельных системных коннекторов всё ещё живут отдельными скриптами.

## core/

Всё, что заставляет MODX работать, кроме ресурсов UI Менеджера и setup.

### core/vendor/

Создаётся командой `composer install` (и входит в традиционные дистрибутивы). Содержит сторонние библиотеки: xPDO, Smarty, Flysystem, Guzzle, PHPMailer и др. Автозагрузчик Composer: `core/vendor/autoload.php`. Не правьте это дерево вручную, меняйте зависимости через Composer.

### core/src/

Корень PSR-4 для пространства имён `MODX\` (`"MODX\\": "core/src/"` в `composer.json`). Код приложения 3.x в основном здесь.

#### core/src/Revolution/

Классы ядра с пространством имён (`MODX\Revolution\...`): сервис `modX`, объекты модели, сервисы, контроллеры Менеджера и связанные компоненты.

Заметные подкаталоги:

| Каталог | Содержимое |
|---|---|
| `Processors/` | Обработчики запросов через коннекторы, сгруппированные по областям: `Browser/`, `Context/`, `Element/`, `Model/`, `Resource/`, `Search/`, `Security/`, `SoftwareUpdate/`, `Source/`, `System/`, `Workspace/` |
| `Controllers/` | Контроллеры страниц Менеджера |
| `Services/` | Общие сервисы (HTTP-клиент и другие, зарегистрированные в контейнере MODX) |
| `Transport/` | Поддержка сборки и установки транспортных пакетов |
| `Sources/` | Драйверы источников медиа |
| `Smarty/` | Интеграция Smarty (`modSmarty`) |
| `mysql/` | MySQL-специфичные файлы карт и классов xPDO для объектов ядра |
| `Error/`, `Exceptions/` | Классы ошибок и исключений |
| `File/` | Файловые утилиты и обработчики |
| `Filters/` | Фильтры ввода/вывода |
| `Formatter/` | Форматтеры данных |
| `Hashing/` | Хэширование и операции с паролями |
| `Mail/` | Отправка почты |
| `Registry/` | Хранилище реестра (связь через коннекторы) |
| `Rest/` | Сервер REST API |
| `Security/` | Аутентификация и контроль доступа |
| `Validation/` | Валидация данных |

### core/model/

В основном зарезервирован под XML-**схему** и тонкую заглушку обратной совместимости.

- **core/model/schema/**: XML-схемы для генерации карт и классов при разработке (`modx.mysql.schema.xml`, схемы transport/sources и связанные файлы). На каждый фронтенд-запрос не читаются.
- **core/model/modx/modx.class.php**: устаревшая заглушка, подключающая автозагрузчик Composer для старых путей include.

Классы модели и процессоры в runtime лежат в `core/src/Revolution/`, а не в старом дереве классов `core/model/modx/` из 2.x.

### core/include/

- **deprecated.php**: вспомогательные функции совместимости для устаревших API эпохи 2.x, где ещё есть алиасы.

### core/cache/

MODX пересобирает кеш по запросу, поэтому очистка `core/cache/` безопасна. Записи лога пишите через `$modx->log()`; они попадают в `core/cache/logs/` (`error.log`).

Кеш контекста `web` хранит переопределённые настройки контекста, ресурсы и элементы, например `cache/web/resources/12.cache.php`.

Основные подкаталоги кеша:

| Каталог | Содержимое |
|---|---|
| `system_settings/` | Системные настройки |
| `context_settings/` | Настройки контекстов |
| `auto_publish/` | Время следующих событий авто-публикации |
| `lexicon_topics/` | Темы лексикона |
| `namespaces/` | Пространства имён |
| `scripts/` | Скомпилированные сниппеты и чанки |
| `includes/` | Скомпилированные include-файлы |
| `elements/` (в `scripts/`, `includes/`) | Скомпилированные элементы |
| `menu/` | Меню Менеджера |
| `mgr/` | Кеш контекста Менеджера |
| `registry/` | Состояние реестра |
| `rss/` | RSS-ленты |
| `logs/` | Файлы логов |

Важные файлы:

- **core/cache/system_settings/config.cache.php**: закешированные [системные настройки](building-sites/settings).
- **core/cache/auto_publish/auto_publish.cache.php**: время следующего события авто-публикации/снятия с публикации ресурса, а не кеш контента сайта.

### core/components/

Если Extra поставляет PHP, который не должен быть доступен из веба (процессоры, код модели, закрытые файлы), он размещается в `core/components/<package>/`. Не у каждого пакета есть такая папка — зависит от пакета.

### core/config/

Содержит `config.inc.php` (учётные данные БД, пути и связанные опции). Создаётся и обновляется установщиком. Держите файл закрытым и делайте резервные копии.

### core/docs/

Changelog (`changelog.txt`), текст лицензии и `version.inc.php`.

### core/error/

Шаблоны страниц ошибок для серьёзных сбоев, когда MODX не может нормально запуститься.

### core/export/ и core/import/

Каталоги для инструментов экспорта/импорта HTML в Менеджере и сторонних Extras (`export/`: вывод, `import/`: файлы для импорта).

### core/lexicon/

Файловые темы лексикона по коду культуры (например `core/lexicon/en/`). Темы: файлы вроде `default.inc.php`. Записи можно переопределить через управление лексиконами, тогда они хранятся в базе.

Загрузка темы в коде:

``` php
$modx->lexicon->load('lang:namespace:topic');
```

| Параметр | Значение |
|---|---|
| `lang` | Необязательный ключ культуры; по умолчанию текущая, часто `en` |
| `namespace` | `core` для встроенных строк или пространство имён Extra |
| `topic` | Имя файла темы без `.inc.php` |

### core/packages/

Загруженные и собранные [транспортные пакеты](extending-modx/transport-packages), включая `core.transport.zip` для setup. Управление пакетами читает и пишет сюда.

## manager/

### manager/assets/

Фронтенд-ресурсы UI Менеджера:

- **ext3/**: библиотеки Ext JS 3 для Менеджера
- **modext/**: слой ModExt MODX и виджеты Менеджера поверх Ext JS
- **lib/**, **fileapi/**: вспомогательные JS-библиотеки

### manager/controllers/

PHP-скрипты, которые загружают страницы Менеджера (под `manager/controllers/default/` для темы по умолчанию). Они готовят данные и регистрируют компоненты Ext JS / ModExt, более тяжёлая логика: в классах под `core/src/Revolution/Controllers/`.

Подкаталоги соответствуют областям Менеджера: `browser/`, `context/`, `dashboard/`, `element/`, `media/`, `resource/`, `security/`, `source/`, `system/`, `workspaces/`.

### manager/templates/

Smarty-шаблоны страниц Менеджера (`manager/templates/default/`). Это HTML/Smarty, не бизнес-логика на PHP.

Подкаталоги повторяют контроллеры: `browser/`, `context/`, `dashboard/`, `element/`, `resource/`, `security/`, `system/`, `workspaces/`, плюс общие `css/`, `js/`, `images/`, `fonts/` и шаблоны `email/`.

### Важные файлы

- **manager/index.php**: фронт-контроллер Менеджера
- **manager/config.core.php**: создаётся установщиком, указывает на ядро

## setup/

Установщик и инструмент обновления. Запускайте для новых установок и обновлений, затем удалите каталог `setup/`. Ключевые подкаталоги: `controllers/`, `processors/`, `includes/`, `lang/`, `templates/`, `assets/`, `provisioner/`, а также CLI-точка входа (`cli-install.php`). См. [Установка](getting-started/installation) и [Установка из командной строки](getting-started/installation/cli).

В целях безопасности после использования в setup создаётся каталог `.locked`. Установщик откажется запускаться, пока этот каталог на месте.

## \_build/

Присутствует при установке из Git (и похожих dev-раскладках). Используется для сборки `core/packages/core.transport.zip` командой `php _build/transport.core.php` после установки зависимостей Composer. На продакшене с традиционным пакетом не нужен. См. [Установка из Git](getting-started/installation/git).

## assets/

Минимальный checkout ядра по умолчанию не создаёт этот каталог, но традиционные установки и почти все сайты используют его для медиа, CSS и JavaScript.

### assets/components/

Веб-доступные файлы Extras (JS, CSS, изображения), установленные через управление пакетами, обычно зеркалят `core/components/<package>/`.

## См. также

- [Требования к серверу](getting-started/server-requirements)
- [Усиление безопасности MODX](getting-started/maintenance/securing-modx) (закрыть публичный доступ к `core/` и связанным путям)
- [Обновление с 2.x до 3.0](getting-started/upgrading-to-3.0) (пространства имён, процессоры, фиксированный путь к ядру)
