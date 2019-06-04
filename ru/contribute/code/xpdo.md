---
title: "Разработка c xPDO"
translation: "contribute/code/xpdo"
---

## Разработка xPDO и интеграция с MODX Revolution

xPDO — это объектно-ориентированный фреймворк, на базе которого построена MODX Revolution. Он хранится в отдельном от MODX Revolution репозитории и внесение изменений в из xPDO в ядро MODX Revolution требует дополнительных действий.

xPDO разработчики должны следовать такой же модели процесса и стратегии ветвления, как MODX разработчики. Смотрите [Руководство участника сообщества](contribute/code/contributors-guide "Руководство участника сообщества") там описаны подробности стратегии ветвления для улучшений, релизов, быстрых правок и другие аспекты. Это руководство фокусируется на дополнительных шагах, необходимых для включения ваших правок в xPDO в MODX для тестирования перед тем, как послать pull request в репозиторий xPDO.

## Копирование и клонирование полного репозитория xPDO

Как и с MODX, разработчики должны работать напрямую со своим личным форком на GitHub. Здесь предлагается способ, как подготовить ваш локальный репозиторий для разработки полной версии проекта xPDO:

``` php
[repos]$ git clone git@github.com:YourGitUsername/xpdo.git
[repos]$ cd xpdo
[xpdo]$ git remote add upstream -f http://github.com/modxcms/xpdo.git
```

Это устанавливает ваш форк в качестве стандартного удаленного репозитория `origin` и добавляет "священный" репозиторий под именем `upstream`. Вы можете добавить ссылки на форки других разработчиков и назвать их так, чтобы вы могли отслеживать каждого из них.

Пора идти вперед и создавать локальные ветки для постоянных веток из вашего форка, который  `origin`:

``` php
[xpdo]$ git checkout -b master origin/master
Switched to a new branch "master"
[xpdo]$ git checkout -b develop origin/develop
Switched to a new branch "develop"
```

Чтобы держать свои локальные ветки свежими относительно `develop` and `master`, обновляйтесь с репозитория `upstream`:

``` php
[xpdo]$ git fetch upstream
[xpdo]$ git checkout develop
Switched to branch "develop"
[xpdo]$ git merge --ff-only upstream/develop
[xpdo]$ git checkout master
Switched to branch "master"
[xpdo]$ git merge --ff-only upstream/master
[xpdo]$ git push origin develop master
```

Стоит отметить, что push в осноном для "показать" и не стоит пушить в постоянные ветки, даже в своих форках. Другими словами, имена веток `develop` и `master` в вашем форке должны всегда соответствовать именам веток в `upstream`. Ожидается, что все исправления будут отправлены в ветках для фич или быстрых исправлений, происходящих от соответствующей постоянной ветки или ветка с исправлением ошибки, происходящая от ветки релиза в upstreamрепозитории.

Также обратите внимание на флаг `--ff-only`, который гарантирует fast-forward слияние (в случае, когда вы сделали коммит в основную ветку не осознавая этого).

**Важно**
Пожалуйста, удостоверьтесь в том, что у вас установлена настройка autocrlf перед тем, как коммитить в ваш форк. Смотрите <http://help.github.com/dealing-with-lineendings/> чтобы определить, какие настройки вам нужны. Это зависит от платформы, на которой вы работаете.

**Модульные тесты (Unit Tests)**
xPDO содержит растущее число модульных тестов, которые помогают убедиться, что основные функции не сломались, когда внесены изменения в кодовую базу. Убедитесь, что ваши изменения проходят модульные тесты для ВСЕХ реализованных драйверов (БД) перед отправкой любого pull request-а или всего, что влияет на код xPDO. Кроме того, все исправления и новые функции должны быть покрыты новыми тестами, где это возможно.

### Копирование и клонирование xPDO для ядра MODX Revolution

xPDO хранится в двух GitHub репозиториях. Полная версия содержит модульные тесты, тестовые модели, скрипты сборки и другие ресурсы, которые не хотелось бы включать в другие проекты. Для того, чтобы легче было включать проект в другие проекты, второй репозиторий содержит только папку `xpdo/` (она содержит только исполняемые файлы xPDO). Этот репозиторий синхронизирован с полной версией репозитория xPDO с помощью техники слияния подмодулей (git's subtree merge technique) и подобная техника может быть использована, чтобы сливать ядро xPDO с другими проектами.

Итак, следующий шаг — скопировать и склонировать этот репозиторий как есть:

``` php
[repos]$ git clone git@github.com:YourGitUsername/xpdo-core.git
[repos]$ cd xpdo-core
[xpdo-core]$ git remote add upstream -f http://github.com/modxcms/xpdo-core.git
```

### Миграция изменений для тестирования

Всякий раз, когда вы написали улучшение или исправили ошибку в полной версии xPDO репозитория, все модульные тесты прошли и вы готовы протестировать изменения в другом проекте, вы можете запушить изменения в соответствующую ветку в вашем форке. Вы можете вручную скопировать ваши измененные файлы в нужное место в другом проекте, использующем xPDO или использовать технику слияния подмодулей, чтобы обновить xpdo-core репозиторий с вашими изменениями и затем развернуться и сделать тоже самое с xpdo-core в вашем проекте.

Чтобы обновить xpdo-core репозиторий, мы сначала должны добавить и обновить remote для вашего форка полной версии xpdo:

``` php
[xpdo-core]$ git remote add -f xpdo git@github.com:YourGitUsername/xpdo.git
```

После добавления вы можете извлекать ваши коммиты с изменениями в вашем форке xpdo и с легкостью их сливать. Сначала убедитесь, что ваши ветки xpdo-core обновлены из `upstream`, например если пушится ветка с названием `xpdo/feature-1234` в ветку `upstream/develop`:

``` php
[xpdo-core]$ git fetch upstream
[xpdo-core]$ git checkout develop
Switched to branch "develop"
[xpdo-core]$ git merge --ff-only upstream/develop
[xpdo-core]$ git push origin develop
[xpdo-core]$ git fetch xpdo
[xpdo-core]$ git checkout -b feature-1234 develop
[xpdo-core]$ git merge -s subtree --log xpdo/feature-1234
[xpdo-core]$ git push origin feature-1234
```

На данный момент, ваша ветка в вашем форке xpdo-core и готова для включения в MODX Revolution или любой другой проект, который использует xpdo-core в качестве подмодуля.

### Тестирование изменений в MODX Revolution

Теперь, чтобы протестировать ваши изменения в MODX Revolution вам нужно добавить как remote в ваш форк с MODX ваш форк репозитория xpdo-core и обновить его. Как только вы сделаете это, вы можете создать ветку для слияния и протестировать вашу ветку с фичей из xpdo-core. Затем измените папку к вашему форку с MODX Revolution и обновите его.

``` php
[revolution]$ git checkout develop
Switched to branch "develop"
[revolution]$ git fetch upstream
[revolution]$ git merge --ff-only upstream/develop
[revolution]$ git push origin develop
[revolution]$ git remote add -f xpdo git@github.com:YourGitUsername/xpdo-core.git
[revolution]$ git checkout -b xpdo-feature-1234 develop
[revolution]$ git merge -s subtree --log xpdo/feature-1234
```

Если все работает, покажите вашу ветку с изменениями в xpdo-core миру вот так:

``` php
[revolution]$ git push origin xpdo-feature-1234
```

### Отправка Pull Request

После всего, что было сделано и если вы уверены, что изменения должны быть в xPDO, все что вам нужно сделать - это отправить вашу ветку с исправлением в ваш форк полного репозитория xPDO в соответствующую ветку основного репозитория xPDO.
