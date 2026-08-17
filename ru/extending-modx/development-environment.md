---
title: "Настройка среды разработки"
translation: "extending-modx/development-environment"
description: "Локальный MODX для разработки Extras, сниппетов, плагинов и страниц Менеджера"
---

## Для кого эта страница

Здесь описана среда для разработки **Extras** (сниппеты, плагины, CMP, транспортные пакеты) на локальном сайте MODX Revolution.

Если вы правите **ядро MODX**, смотрите [Contribute: среды разработки](contribute/code/development-environment) (форк, upstream, tooling).

Полный разбор одного Extra от сниппета до пакета — в [Создании дополнения](extending-modx/tutorials/developing-an-extra). Эта страница — чеклист окружения, на которое опирается тот учебник.

## Что нужно

- Локальный веб-сервер и PHP/MySQL по [требованиям к серверу](getting-started/server-requirements) для вашей версии MODX (Revolution 3.x — PHP 8.1+, для git-установки ещё Composer)
- Рабочий локальный сайт MODX, который можно ломать и переустанавливать
- Редактор или IDE (PhpStorm, VS Code и аналоги)
- По желанию: Git для проекта Extra и Composer, если ставите MODX из git

Отдельный MODX на каждый Extra не обязателен. Один локальный сайт тянет несколько дополнений в разработке.

## Установка локального MODX

Два пути:

1. **Обычный zip** — скачать с [modx.com/download](https://modx.com/download/), распаковать в веб-корень, запустить [Setup](getting-started/installation/standard). Быстрее всего для работы над Extra, если не нужен bleeding-edge core.
2. **Из git** — клон ветки `3.x`, `composer install`, сборка core-пакета, затем Setup. Нужно, если вы ещё и вносите правки в ядро. См. [установку из Git](getting-started/installation/git).

После Setup войдите в Менеджер и убедитесь, что сайт открывается. Чистите `core/cache/`, если эксперименты с путями и конфигом пошли криво.

Задайте этой установке **уникальный** [`session_name`](building-sites/settings/session_name) (например `modxlocaldevsession`), чтобы cookie не пересекались с другими локальными сайтами MODX на том же домене. После смены очистите `core/cache/` и войдите снова.

## Рекомендуемая раскладка каталогов

Держите Extra **вне** дерева ядра MODX. Тогда история Git чистая, и вы не закоммитите файлы core по ошибке.

Пример (пути под свою машину):

``` text
/www/modx/                 ← установка MODX Revolution (веб-корень или vhost)
/www/doodles/              ← проект Extra (свой Git-репозиторий)
  assets/components/doodles/
  core/components/doodles/
  _build/
```

После установки транспортный пакет кладёт файлы в `core/components/yourpkg/` и `assets/components/yourpkg/` внутри сайта MODX. В разработке вы либо:

- держите ту же раскладку в отдельном клоне и указываете MODX пути через Namespace / системные настройки, либо
- делаете symlink или копируете в дерево MODX (работает, но Git и обновления усложняются)

В [Создании дополнения](extending-modx/tutorials/developing-an-extra) проект лежит в `/www/doodles/`, а MODX смотрит на него через системные настройки путей. Так удобно работать командой.

Типичные каталоги Extra:

| Путь | Назначение |
| --- | --- |
| `core/components/yourpkg/` | PHP: model, elements, lexicon, processors, controllers |
| `assets/components/yourpkg/` | JS, CSS, картинки, `connector.php` для AJAX CMP |
| `_build/` | Скрипты сборки и данные пакета (в zip не входят) |

См. также [структуру компонента](extending-modx/creating-components/component-structure) и [транспортные пакеты](extending-modx/transport-packages).

## Подключить MODX к Extra

1. Создайте в Менеджере **Namespace** (`yourpkg`) с путями на `core` и `assets` вашего проекта.
2. Добавьте системные настройки вроде `yourpkg.core_path` и `yourpkg.assets_url` (или те ключи, которые ждёт Extra), чтобы сниппеты и сервисы находили файлы вне `core/components/` по умолчанию.
3. Зарегистрируйте элементы (сниппет, плагин, пункт меню CMP), которые ходят по этим путям, или поставьте их скриптом сборки/установки.

Пока пути не сходятся, `$modx->getService()` и процессоры падают с ошибками «нет класса/файла». Сначала Namespace и настройки, потом очистка кэша.

Если Extra открывается с другого локального пути, чем Менеджер (например Менеджер `/modx/manager/`, assets Extra `/doodles/`), поставьте [`session_cookie_path`](building-sites/settings/session_cookie_path) в `/`, чтобы сессия входа была общей. После смены очистите кэш и войдите снова.

## Настройки, которые ускоряют работу над Extra

| Настройка | Зачем |
| --- | --- |
| [`cache_lexicon_topics`](building-sites/settings/cache_lexicon_topics) = Нет | Правки лексикона видны без борьбы с кэшем топиков |
| [`session_name`](building-sites/settings/session_name) | Уникальное имя на каждый локальный сайт |
| [`session_cookie_path`](building-sites/settings/session_cookie_path) | Общая сессия на разных локальных путях |

Пока крутите PHP, после смены путей или class map чистите `core/cache/` или используйте «Управление → Очистить кэш». Для схемы/модели пересоберите карты скриптом Extra, затем снова очистите кэш.

## Упаковка

Когда Extra работает из Менеджера:

1. Оставьте `_build/` в репозитории Extra (resolvers, data vehicles, скрипт сборки)
2. Соберите транспортный пакет в `core/packages/` (или куда пишет ваш build)
3. Поставьте или обновите пакет на чистом локальном MODX для проверки

Пошаговая упаковка — в [Создании дополнения, часть III](extending-modx/tutorials/developing-an-extra/part-3). Для простых Extra, собранных в основном в Менеджере, подойдёт и [PackMan](extras/packman).

## Куда идти дальше

1. Эта страница — локальный сайт и раскладка Extra
2. [Введение для разработчика](extending-modx/getting-started/developer-introduction) — MVC², коннекторы, процессоры
3. [Создание дополнения](extending-modx/tutorials/developing-an-extra) — сниппет, CMP, пакет
4. [Создание компонентов](extending-modx/creating-components) — ещё один полный курс (с упором на PhpStorm)
5. [Пользовательские страницы Менеджера](extending-modx/custom-manager-pages) и [xPDO](extending-modx/xpdo) для углубления

## Смотрите также

- [Установка из Git](getting-started/installation/git)
- [Contribute: среды разработки](contribute/code/development-environment) (работа над ядром)
- [Contribute: инструменты](contribute/code/tooling)
- [Требования к серверу](getting-started/server-requirements)
