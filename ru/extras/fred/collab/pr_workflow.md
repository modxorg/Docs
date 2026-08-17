---
title: "Совместная работа через Gitify и Pull Requests"
description: "Fork, feature branch и отправка PR в upstream-проект темы Fred"
translation: "extras/fred/collab/pr_workflow"
---

Некоторые проекты требуют Pull Request (PR) в их репозиторий. Вы форкаете repo, правите feature branch в форке и отправляете PR в исходный проект.

В этом учебнике мы форкаем [Fred Starter Theme](https://github.com/modxcms/fred-theme-starter), Bootstrap 4 quickstart для авторов тем. Начните с входа в Github.

## Fork и clone в экземпляр MODX

Для PR нужен fork репозитория и работа в feature branch.

### 1. Fork репозитория

Сфоркайте репозиторий, в который хотите внести вклад. Например, откройте [Fred Theme Starter](https://github.com/modxcms/fred-theme-starter) и нажмите `fork` справа вверху.

Скопируйте HTTPS URL у `Clone or download`, например `https://github.com/modxcms/fred-theme-starter.git`. Понадобится и SSH URL вашего форка, например `git@github.com:your_username/your-fork-name.git`.

### 2. Clone форка в экземпляр MODX

`git clone` работает только в пустых директориях. Клонируем во временный `tmp/` и переносим файлы в web root. По SSH на рабочем Cloud:

```shell
cd ~/www
git clone git@github.com:your_username/your-fork-name.git tmp
```

Репозиторий окажется в `~/www/tmp/`. Перенесите содержимое `tmp/` под `www/`:

```shell
rsync -av ./tmp ./
```

Убедитесь, что `.git/` и файлы лежат в webroot `www/`. Затем удалите `tmp/` командой `rm -rf ./tmp`.

### 3. Добавление remote `upstream`

Это исходный проект. Используйте его HTTPS clone URL из шага 1:

```shell
git remote add upstream https://github.com/modxcms/fred-theme-starter.git
```

## Работа с форком

Синхронизация важна. Способ зависит от того, есть ли незапушенные правки или вы синхронизируетесь перед началом работы.

### Без локальных изменений: sync upstream с форком

Для PR **никогда** не коммитьте напрямую в master. Подробнее: [Feature Branches and Pull Requests: Walkthrough](https://gist.github.com/vlandham/3b2b79c40bc7353ae95a) и [Understanding the GitHub flow](https://guides.github.com/introduction/flow/).

Перед push в feature branch синхронизируйте локальный репозиторий с upstream. См. также [Syncing a fork](https://help.github.com/articles/syncing-a-fork/):

```shell
git checkout master
git fetch upstream
git merge --ff-only upstream/master  # only merges if local is clean
git push origin master               # push to your fork
gitify package:install --all
gitify build
```

Эти команды нужны, когда версия commit в upstream и в форке расходятся. Запускать каждый раз не вредно.

### С локальными изменениями: sync upstream с форком

Команды ниже создают локальный feature branch и коммитят правки в локальный git repo.

```shell
cd ~/www
git checkout -b my-feature   # checkout to a new branch named `my-feature`,
                             # or any other name you decide for your work
gitify extract               # extract all your local changes
git add --all                # or git add only specific changed files
git commit -m "My Changes"   # Use a more reasonable commit message
```

Дальше синхронизируем master upstream с вашим форком.

```shell
git checkout master
git fetch upstream
git merge --ff-only upstream/master
git push origin master
```

Теперь синхронизируем feature branch с изменениями master форка после merge.

````shell
git checkout my-feature      # checkout your `my-feature` branch again
git rebase master            # this pulls from your forked master```
````

Могут появиться конфликты. Их нужно разрешить до продолжения. Конфликт возникает, когда двое правят одну строку. См. [руководство Github по конфликтам](https://help.github.com/articles/resolving-a-merge-conflict-using-the-command-line/).

Соберите изменения в рабочий экземпляр MODX через Gitify.

```shell
gitify package:install --all
gitify build
```

Проверьте, что тема и правки работают как ожидается. Затем отправьте их в Github fork и оформите PR в upstream:

```shell
git push origin my-feature   # push to your `my-feature` branch on Github to
                             # submit as a PR, per the next section below
git checkout master          # return to the master branch to start your next
gitify package:install --all # restore the `master` state to your local MODX
gitify build
```

Отправьте PR в upstream-проект.

## Отправка PR в upstream

Откройте форк на Github. Должно появиться уведомление о создании PR из новой ветки. Нажмите его и отправьте PR в нужную ветку, чаще всего `master` или как указано в README исходного репозитория.
