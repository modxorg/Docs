---
title: "Участие в разработке"
description: "Стратегия веток и правила контрибуции в репозиторий Discuss на GitHub"
translation: "extras/discuss/discuss.contributing"
---

Discuss поддерживается на Github: <http://github.com/modxcms/Discuss>.

## Стратегия веток

Discuss следует общим рекомендациям MODX ['A GitHub-based branching strategy for collaborative development'](/community/contribute/using-git-and-github/community-contributors-guide "Community Contributor's Guide")

При участии в разработке Discuss учитывайте следующую стратегию веток:

1. Основная ветка для работы. develop.
2. Основная ветка для форумов MODX и их кастомной темы. theme-modx
3. Отдельные функции или исправления багов разрабатывайте в feature-ветке (например feature-livechat или bug-3532) и после тестирования сливайте в develop.

Важно разделять ядро Discuss и темы. Все изменения ядра Discuss делайте только в ветке develop, никогда в release, theme или master. Это правило действует с 16 июля 2013 года. Каждая ветка темы должна быть форком ядра (release) и регулярно обновляться через merge.
