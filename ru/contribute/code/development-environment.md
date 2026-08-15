---
title: "Среды разработки"
translation: "contribute/code/development-environment"
sortorder: 1
description: "Локальная среда для правок ядра MODX Revolution"
---

Если вы пишете исправления или функции для **ядра MODX Revolution**, работайте в локальном клоне своего форка. Если собираете Extras на обычной установке сайта, смотрите [Настройка среды разработки](extending-modx/development-environment).

Нужен рабочий локальный веб-сервер. Эта страница не описывает MAMP, XAMPP, Docker или нативный стек. Сверьтесь с [требованиями к серверу](getting-started/server-requirements) для целевой ветки (для 3.x — PHP 8.1+ и Composer).

Многие держат отдельные клоны для активных веток (например `3.x` и старая maintenance-линия), чтобы не пересобирать окружение при смене задачи.

## Шаг 1: подготовьте форк

Нажмите **Fork** в [официальном репозитории](https://github.com/modxcms/revolution) и создайте форк в своём аккаунте GitHub, если его ещё нет.

Коммиты идут в ваш форк. В официальный репозиторий вы отправляете pull request.

## Шаг 2: установите MODX из форка

[Следуйте установке из git](getting-started/installation/git). Клонируйте URL **вашего** форка (не `modxcms/revolution` как `origin`), запустите Composer, соберите core-пакет и пройдите Setup.

## Шаг 3: добавьте remote upstream

Чтобы подтягивать коммиты из официального репозитория:

``` bash
git remote add upstream https://github.com/modxcms/revolution.git
```

Дальше `git fetch upstream` и обновляйте ветку через merge или rebase, как принято в вашем процессе.

## Шаг 4: настройте MODX под работу с ядром

1. Отключите [`cache_lexicon_topics`](building-sites/settings/cache_lexicon_topics), чтобы правки лексикона были видны сразу.
2. Задайте уникальный [`session_name`](building-sites/settings/session_name), если на одном хосте несколько локальных установок MODX.
3. После правок PHP ядра или лексикона очищайте `core/cache/` (или «Управление → Очистить кэш») перед повторной проверкой.

## Прочие инструменты

Многие разработчики MODX используют [PhpStorm](https://www.jetbrains.com/phpstorm/) как IDE. [GitHub CLI](https://cli.github.com/) удобен, если вы часто открываете pull request.

Сборка assets и тесты — в разделе [инструменты](contribute/code/tooling).
