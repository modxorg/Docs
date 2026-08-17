---
title: "Совместная работа над темами через Gitify"
description: "Extract, commit, pull и push при командной разработке тем Fred"
translation: "extras/fred/collab/gitify_in_action"
---

Чтобы следовать инструкциям, у вас должен быть [настроен Gitify](extras/fred/collab/gitify) с темой.

## Работа с Gitify и Git

Типичная цель совместной работы над темой: набор Elements, Blueprints, Options и RTE Configs.

В этом учебнике мы предполагаем, что все участники могут коммитить напрямую в master. Чтобы поднять репозиторий для команды, см. [Настройку темы для работы с Gitify](extras/fred/collab/initial_extract).

### 1. Push изменений или pull последней версии

Перед pull или push в origin важно не потерять чужую работу. Всегда выполняйте следующее:

```shell
cd ~/www
gitify extract
git status
```

`gitify extract` синхронизирует текущую тему Fred с файловой системой. `git status` покажет, есть ли изменения для коммита.

### 2. Commit изменений в локальный репозиторий

Шаг 2 и шаг 4 ниже можно пропустить, если коммитить нечего.

Если изменения есть, сначала закоммитьте их локально:

```shell
git add --all  # or git add on files you want to commit
git commit -m "Your commit message here"  # please write your own message
```

### 3. Pull последних правок от коллег

Синхронизируйте обновления из upstream origin. Из webroot выполните:

```shell
git pull origin master
```

Могут появиться конфликты. Их нужно разрешить до продолжения. Конфликт возникает, когда двое правят одну строку кода. Как разрешать конфликты, см. [руководство Github](https://help.github.com/articles/resolving-a-merge-conflict-using-the-command-line/).

После разрешения конфликтов или после pull соберите изменения и проверьте MODX:

```shell
gitify package:install --all
gitify build
```

### 4. Push изменений в origin для коллег

Если вы только тянете удалённые правки, пропустите этот шаг, как в шаге 2.

Теперь можно безопасно отправить изменения. Появятся сообщения об Extract разных сущностей Fred. Если отложить push, возможна ошибка о новых конфликтах, если коллеги успели запушить раньше:

```shell
git push origin master
```

Вы успешно поработали над темой в команде. Если нужны PR, как для демо Fred Starter Theme от MODX, см. [Pull Request Git Workflow](extras/fred/collab/pr_workflow).
