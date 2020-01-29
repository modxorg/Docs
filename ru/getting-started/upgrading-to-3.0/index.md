---
title: "Обновление с 2.x до 3.0"
note: "Это живой документ, так как MODX 3.0 все еще находится в разработке. В настоящее время еще не рекомендуется обновлять сайты до MODX 3.0, Если вы не являетесь разработчиком, который хочет протестировать и подготовить свои дополнения"
sortorder: 1
translation: "getting-started/upgrading-to-3"
---

Этот документ подробно описывает изменения, внесенные между 2.x и 3.0, которые могут повлиять на обновления. Это не полный список всех изменений (см. [changelog для этого](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt)), но [нарушение изменений](getting-started/upgrading-to-3.0/breaking-changes), которые могут повлиять на дополнения и сайты.

## Обновление до 3.0

В общем случае при обновлении до версии 3.0 можно следовать [стандартному процессу обновления](getting-started/maintenance/upgrading). Рекомендуется сначала обновить до последней версии 2.7, которая будет регистрировать устаревшие функции, от которых зависит ваш сайт, в журнале MODX.

После обновления ядра и дополнительных компонентов могут возникнуть некоторые критические изменения, которые необходимо устранить в дополнительном коде или пользовательском коде.

-   Важно: [MODX 3.0 требует как минимум PHP 7.1](getting-started/upgrading-to-3.0/requirements)
-   [Список изменений можно найти здесь](getting-started/upgrading-to-3.0/breaking-changes), в частности [многие основные классы были перемещены и переименованы](getting-started/upgrading-to-3.0/class-names).
-   [Язык менеджера теперь динамический](getting-started/upgrading-to-3.0/manager-language)
-   [Различные системные настройки были удалены или изменены](getting-started/upgrading-to-3.0/system-settings)

## Другие заметные изменения и улучшения

### Панель управления/Интерфейс

-   Переработан установщик [#14507](https://github.com/modxcms/revolution/pull/14507) и вход в панель упралвения [#13773](https://github.com/modxcms/revolution/pull/13773).
-   Панель управления была переработана, а также улучшена для раюботы на мобильных устройствах [#14700](https://github.com/modxcms/revolution/pull/14700), [#14735](https://github.com/modxcms/revolution/pull/14735). Изменены стили ресурсов в дереве [#14832](https://github.com/modxcms/revolution/pull/14832)- Язык теперь можно переключать на лету [#14046](https://github.com/modxcms/revolution/pull/14046)
-   Все разрешения менеджера автоматически становятся доступными в `MODx.perm` [#13924](https://github.com/modxcms/revolution/pull/13924), [#14425](https://github.com/modxcms/revolution/pull/14425),
-   Перевод Гугла теперь отключен в диспетчере [#14414](https://github.com/modxcms/revolution/pull/14414)
-   Более последовательное дублирование ресурсов/элементов [#14411](https://github.com/modxcms/revolution/pull/14411)

### Пакеты

-   Markdown теперь анализируется в атрибутах пакета (changelog/readme/license) [#13853](https://github.com/modxcms/revolution/pull/13853)

### Файлы и Медиа

-   Медиаисточники теперь используют файловую систему [#13709](https://github.com/modxcms/revolution/pull/13709)
-   Основные каталоги теперь защищены от переименования/удаления из диспетчера [#14374](https://github.com/modxcms/revolution/pull/14374)

### Ресурсы и шаблоны

-   Ресурсы теперь могут получить значок на основе их типа контента [#14383](https://github.com/modxcms/revolution/pull/14383)
-   Новые модификаторы вывода, связанные с файлами: `dirname`, `basename`, `filename`, `extensions` [#14198](https://github.com/modxcms/revolution/pull/14198)
