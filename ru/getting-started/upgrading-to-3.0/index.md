---
title: "Обновление с 2.x до 3.0"
sortorder: 7
translation: "getting-started/upgrading-to-3.0"
---

Этот документ подробно описывает изменения между 2.x и 3.0, которые могут повлиять на обновления. Это не полный список всех изменений (см. [changelog](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt)), а справочник (критических) изменений, которые могут затронуть дополнения и сайты.

[Список совместимых дополнений можно найти на SiteDash](https://sitedash.app/extras).

## Обновление до 3.0

В общем случае при обновлении до 3.0 можно следовать [стандартному процессу обновления](getting-started/maintenance/upgrading). Рекомендуется сначала обновиться до последнего релиза 2.8 и поработать на нём некоторое время. Он будет записывать в журнал MODX устаревший функционал, от которого зависит ваш сайт.

После обновления ядра и дополнений могут проявиться критические изменения, которые нужно исправить в дополнениях или своём коде.

- ⚠️ Важно: [каталог core теперь всегда должен находиться в корне проекта и больше не может быть переименован](getting-started/upgrading-to-3.0/core-folder)
- ⚠️ Важно: [MODX 3.0 требовал PHP 7.2, текущие 3.x (3.2+) требуют PHP 8.1+](getting-started/upgrading-to-3.0/requirements)
- ⚠️ Важно: [поддержка sqlsrv удалена](getting-started/upgrading-to-3.0/sqlsrv)
- [Список критических изменений](getting-started/upgrading-to-3.0/breaking-changes), в частности [многие классы ядра перенесены и переименованы](getting-started/upgrading-to-3.0/class-names)
- [Язык менеджера теперь динамический](getting-started/upgrading-to-3.0/manager-language)
- [Различные системные настройки удалены или изменены](getting-started/upgrading-to-3.0/system-settings)

## Другие заметные изменения и улучшения

### Менеджер и интерфейс

- Новый выбор шаблона упрощает создание ресурсов [#15535](https://github.com/modxcms/revolution/pull/15535)
- Переработан установщик [#14507](https://github.com/modxcms/revolution/pull/14507) и вход в менеджер [#13773](https://github.com/modxcms/revolution/pull/13773).
- Менеджер переработан. Улучшена работа на мобильных [#14700](https://github.com/modxcms/revolution/pull/14700), [#14735](https://github.com/modxcms/revolution/pull/14735). Изменены стили ресурсов в дереве [#14832](https://github.com/modxcms/revolution/pull/14832)
- Язык можно переключать на лету [#14046](https://github.com/modxcms/revolution/pull/14046)
- Все разрешения менеджера автоматически доступны в `MODx.perm` [#13924](https://github.com/modxcms/revolution/pull/13924), [#14425](https://github.com/modxcms/revolution/pull/14425). См. [Объект MODx](extending-modx/custom-manager-pages/modext/modext-modx-object).
- Перевод Google отключён в менеджере [#14414](https://github.com/modxcms/revolution/pull/14414)
- Более последовательное дублирование ресурсов и элементов [#14411](https://github.com/modxcms/revolution/pull/14411)

### Пакеты

- Markdown теперь разбирается в атрибутах пакета (changelog, readme, license) [#13853](https://github.com/modxcms/revolution/pull/13853). См. [Создание скрипта сборки](extending-modx/transport-packages/build-script).

### Файлы и медиа

- Медиаисточники теперь используют Flysystem [#13709](https://github.com/modxcms/revolution/pull/13709). См. [Файловая система](building-sites/media-sources/types/media-source-type-file-system) и [S3](building-sites/media-sources/types/media-source-type-s3).
- Каталоги ядра защищены от переименования и удаления из менеджера [#14374](https://github.com/modxcms/revolution/pull/14374). См. [источник File System](building-sites/media-sources/types/media-source-type-file-system).

### Ресурсы и шаблоны

- Ресурсы могут получить иконку по типу контента [#14383](https://github.com/modxcms/revolution/pull/14383). См. [Типы содержимого](building-sites/resources/content-types).
- Новые модификаторы вывода для файлов: `dirname`, `basename`, `filename`, `extension` [#14198](https://github.com/modxcms/revolution/pull/14198). См. [Фильтры/модификаторы вывода](building-sites/tag-syntax/output-filters).

### Безопасность и почта

- Письмо «забыли пароль» использует ссылку сброса (`modhash`), а не пароль в письме [#13786](https://github.com/modxcms/revolution/pull/13786). См. [forgot_login_email](building-sites/settings/forgot_login_email).

### Парсер и REST

- Литеральные одинарные `[` / `]` внутри значений тегов поддерживаются [#13904](https://github.com/modxcms/revolution/pull/13904). См. [Синтаксис тегов](building-sites/tag-syntax).
- Значения-массивы в свойствах получают стабильную serialize-подпись тега [#14689](https://github.com/modxcms/revolution/pull/14689). См. [Синтаксис тегов](building-sites/tag-syntax).
- Пустые XML-элементы во входящем теле `modRestService` становятся `''` [#14305](https://github.com/modxcms/revolution/pull/14305). См. [RESTful API](extending-modx/developing-restful-api).
