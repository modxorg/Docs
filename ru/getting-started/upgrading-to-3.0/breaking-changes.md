---
title: Критические изменения
description: "Критические изменения в MODX 3, которые могут повлиять на обновления и пакеты сайта."
sortorder: 1
translation: "getting-started/upgrading-to-3.0/breaking-changes"
---

В качестве major-релиза MODX 3.0 приносит ряд критических изменений. Всегда нужен баланс между изменениями, которые закрывают технический долг, и тем, чтобы не ломать лишнее.

## Самые важные критические изменения

Главные критические изменения можно свести к следующему:

- [Минимальная версия PHP поднята до 7.2 в 3.0 и снова до 8.1 в 3.2](getting-started/upgrading-to-3.0/requirements)
- [Больше нельзя использовать свой каталог или путь к core](getting-started/upgrading-to-3.0/core-folder)
- [Поддержка sqlsrv удалена](getting-started/upgrading-to-3.0/sqlsrv)
- [Большое число (ранее без namespace) классов переименовано и перенесено](getting-started/upgrading-to-3.0/class-names), включая процессоры и классы моделей.
- [xPDO 3 через Composer и PSR-4; миграция кастомных пакетов](getting-started/upgrading-to-3.0/xpdo)
- [Все процессоры переименованы, включая базовые](getting-started/upgrading-to-3.0/processors)
- [modAction и связанный функционал удалены](getting-started/upgrading-to-3.0/actions)
- modRestClient удалён [#15781](https://github.com/modxcms/revolution/pull/15781) и [заменён новым HTTP-сервисом PSR-7/17/18](extending-modx/services/http)

## Очистка устаревшего функционала

- Поле `modResource->contentType` удалено. В Revolution 2.0 его заменило поле `content_type`, которое ссылается на экземпляр `modContentType`. [#14057](https://github.com/modxcms/revolution/pull/14057)
- `modParser095`, `modTranslate095` и `modTranslator` удалены. Это утилиты для переноса шаблонов из синтаксиса Evolution. [#14133](https://github.com/modxcms/revolution/pull/14133)
- Каталог `/manager/min/` удалён. Не использовался с 2.5. [#12778](https://github.com/modxcms/revolution/pull/12778), [#13194](https://github.com/modxcms/revolution/pull/13194), [#14416](https://github.com/modxcms/revolution/pull/14416)
- Удалены неиспользуемые сетки ExtJS: assets/modext/widgets/resource/modx.grid.resource.security.js, assets/modext/widgets/security/modx.grid.role.user.js, assets/modext/workspace/lexicon/language.grid.js, assets/modext/workspace/lexicon/lexicon.topic.grid.js [#14895](https://github.com/modxcms/revolution/pull/14895)
- Привязка `@EVAL` удалена у TV [#13865](https://github.com/modxcms/revolution/pull/13865)
