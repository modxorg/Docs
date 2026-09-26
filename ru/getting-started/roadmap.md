---
title: "Roadmap ядра"
description: "Где смотреть планы и прогресс MODX Revolution для 3.x (и дальше)."
translation: "getting-started/roadmap"
sortorder: 11
---

Страница ведёт к живым источникам планов MODX Revolution. Это не фиксированный контракт по фичам. Milestones и привязка issue меняются по мере слияния работы.

Старый roadmap в docs (2.5 / планы 2.6 / «3.0 Next») убрали при миграции документации. Длинный статичный список фич здесь снова устареет.

## Куда смотреть

| Источник | Что даёт |
| --- | --- |
| [Milestones на GitHub](https://github.com/modxcms/revolution/milestones) | Issue и PR по целевому релизу (например открытые milestones вроде `v3.3.0` и `v4.0.0`) |
| [Changelog в ветке `3.x`](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt) | Уже влитые правки и заметки к ближайшим и недавним релизам |
| [Releases](https://github.com/modxcms/revolution/releases) и [блог MODX](https://modx.com/blog/) | Что уже вышло |
| [Issues](https://github.com/modxcms/revolution/issues) / [Pull requests](https://github.com/modxcms/revolution/pulls) | Текущие обсуждения и ревью |
| [Руководство контрибьютора](contribute/code/contributors-guide) | В какую git-ветку целиться (`3.x`, patch-ветки, следующий major) |
| [Форум сообщества](https://community.modx.com/) | Обсуждение продукта (в том числе цикл релизов и приоритеты) |

Совместимые Extras при обновлении сайта: [список на SiteDash](https://sitedash.app/extras).

## Текущая линейка (3.x)

Разработка MODX 3 идёт в ветке [`3.x`](https://github.com/modxcms/revolution/tree/3.x). Patch и minor режут с этой линии (и с коротких patch-веток, если они есть). См. [Branches](contribute/code/contributors-guide#branches) в руководстве контрибьютора.

Про уже случившиеся breaking changes в 3.0 и связанные заметки (алиасы классов, процессоры, xPDO, `modAction`) начинайте с [Обновления с 2.x до 3.0](getting-started/upgrading-to-3.0).

Для авторов пакетов: устаревшие глобальные алиасы классов планируют отключить от автозагрузки в **3.3**. Подробности: [Изменение Имен Классов](getting-started/upgrading-to-3.0/class-names).

## Как пользоваться

1. Откройте [milestones](https://github.com/modxcms/revolution/milestones) нужного релиза.
2. Посмотрите верх [`changelog.txt` в `3.x`](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt): что уже влито.
3. Неслитые issue и пустые milestones считайте намерением, а не датой релиза.

Если сопровождаете Extra или свой код, следите за deprecation в логе на актуальной 3.x и за страницами обновления выше до следующего minor, где уберут алиасы или API.
