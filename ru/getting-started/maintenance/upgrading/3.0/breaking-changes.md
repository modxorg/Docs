---
title: Критические изменения
description: 'Критические изменения в MODX 3, которые могут повлиять на обновления и пакеты сайта.'
sortorder: 1
translation: 'getting-started/maintenance/upgrading/3.0/breaking-changes'
---

В качестве основного релиза MODX 3.0 поставляется с рядом критических изменений. Всегда есть баланс, который нужно поддерживать между разрушительными изменениями, которые очищают технический долг,и не нарушают вещи без необходимости.

## Самые важные критические изменения

Самые большие критические изменения можно суммировать следующим образом:

- [Минимальная поддерживаемая версия PHP была увеличена до 7.1](getting-started/maintenance/upgrading/3.0/requirements)
- [Большое количество классов (ранее не размещенных в пространстве имен) были переименованы и перемещены](getting-started/maintenance/upgrading/3.0/class-names), включая процессоры и классы моделей.

## Очистка устаревших функций

- `modResource->contentType` поле было удалено. Оно было заменено в Revolution 2.0 полем `content_type`, которое сопоставляется с экземпляром "modcontenttype". [#14057](https://github.com/modxcms/revolution/pull/14057)
- `modParser095`, `modTranslate095`, и `modTranslator` были удалены. Это были утилиты для переноса шаблонов из синтаксиса Evolution. [#14133](https://github.com/modxcms/revolution/pull/14133)
- `/manager/min/` каталог был удален, не использовался с 2.5. [#12778](https://github.com/modxcms/revolution/pull/12778), [#13194](https://github.com/modxcms/revolution/pull/13194), [#14416](https://github.com/modxcms/revolution/pull/14416)
- `@EVAL` привязка была удалена с TV (переменных шаблонов) [#13865](https://github.com/modxcms/revolution/pull/13865)
