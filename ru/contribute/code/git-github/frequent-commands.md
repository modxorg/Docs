---
title: "Git FAC (часто используемые команды)"
translation: "contribute/code/git-github/frequent-commands"
---

На этой странице кратко описаны типичные сценарии работы с Git при разработке MODX.

## Как получить и синхронизировать локальную ветку develop?

Сначала **никогда не коммитьте напрямую в ветку версии**. Это уже сильно упростит работу с Git.

Чтобы обновить локальную копию для разработки, например ветку мажорной версии 2.x, выполните:

``` bash
git fetch upstream
git checkout 2.x
Switched to branch "2.x"
git merge --ff-only upstream/2.x
```

Здесь предполагается, что официальный репозиторий добавлен как `upstream`, а форк как `origin`. [Подробнее об удалённых репозиториях](https://git-scm.com/book/en/v2/Git-Basics-Working-with-Remotes)

## Как создать feature branch?

Сначала убедитесь, что локальная копия ветки версии (например, `2.x`) актуальна. См. предыдущий раздел.

Затем выполните:

``` bash
git checkout -b myFeatureBranchName 2.x
```

## Есть ли соглашение об именах feature branch?

Обычно используют одно из: `issue-1234`, `feature-1234` или `fix-1234`, где `1234` это номер issue на GitHub.

Если issue для вашей задачи нет, создайте его для обсуждения или выберите описательное имя, например `feature-magic-resources`.

Не используйте имена, похожие на номера релизов.

``` bash
git checkout -b myAwesomeFeature 2.x
```

## Нужна ли отдельная feature branch для каждой issue?

Да. Никогда не коммитьте напрямую в ветку версии. Создавайте отдельную ветку для каждой функции или issue.

## Как синхронизировать feature branch с upstream-веткой версии?

Если работа над функцией затягивается, вам может понадобиться подтянуть изменения из upstream.

`git merge` для этого добавляет лишние коммиты к вашим изменениям.

Лучше «переиграть» коммиты через `git rebase`.

На feature branch выполните:

``` bash
git fetch upstream
git rebase upstream/2.x
```

Если вы сильнее разошлись с release branch, интерактивный режим помогает разрешать конфликты по одному.

``` bash
git fetch upstream
git rebase upstream/2.x
```

Подробнее: manpage git rebase: <http://www.kernel.org/pub/software/scm/git/docs/git-rebase.html>

## Нужно ли следить за правильной базовой (версионной) веткой?

Да. Core integrators предпочитают тратить время на review и принятие хороших contributions, а не на сложные merge и конфликты, чтобы перенести ваши изменения в нужную ветку.

[См. руководство для contributors о выборе веток](contribute/code/contributors-guide). Если не уверены, спросите в [Slack-сообществе](https://modx.org) или на [форуме](https://community.modx.com).
