---
title: "Интеграция ядра"
sortorder: 6
note: "Этот раздел документации предназначен для core integrators."
translation: "contribute/integrators"
---

- [GitHub CLI](https://cli.github.com/)

## Процесс merge

Все PR мержите через Squash and Merge в GitHub. Squashed commit message должен быть changelog-ready и заканчиваться ссылкой на PR в скобках. Пример: `Fix parsing long template tags under some conditions (#16316)`

Главное: подготовить PR к этому squash and merge.

### Случай 1: PR без влияния на скомпилированные assets (js/css)

Если CI зелёный, после локального ревью и теста нажмите зелёную кнопку Squash and Merge и проверьте, что commit message changelog-ready.

Для локального теста используйте `gh pr checkout` и затем отбросьте ветку, если правки не нужны. Если правки нужны, добавьте коммит в ветку PR и после прохождения CI сделайте squash and merge.


### Случай 2: PR влияет на скомпилированные assets

Если PR трогает scss/css или список сжатых js assets (см. `_build/templates/default/gruntfile.js`, переменная `coreJSFiles`), сначала обновите локальную копию base branch PR, затем checkout ветки PR через `gh pr checkout`. **До** теста и ревью **перебазируйте PR на base branch**, например `git rebase 3.x`, если цель ветка `3.x`. Затем в `_build/templates/default` выполните `grunt build`, закоммитьте скомпилированные assets отдельным коммитом с сообщением `grunt build` и тестируйте PR. Дополнительные правки от интегратора коммитьте на этом же этапе.

После теста **force push** перебазированных коммитов, включая grunt build и дополнительные правки, в ветку PR. Дождитесь зелёного CI и дальше действуйте как в случае 1: Squash and Merge.

**Если PR ещё должен доработать автор, не делайте force push**, чтобы не ломать его локальные ветки. Force push только когда PR готов к merge.

## Port и back-port изменений

Фиксы, которые нужно перенести (например, 3.0.x → 3.x) или откатить назад (например, 3.x → 3.0.x), переносят cherry-pick. Если cherry-pick не ложится чисто или конфликты сложные, лучше открыть новый PR под порт.

### Без скомпилированных изменений

PR **без compiled changes** можно cherry-pick из **squashed commit**, чтобы сохранить исходный commit message.

### Со скомпилированными изменениями

PR **с compiled changes** требуют cherry-pick каждого исходного коммита, затем `grunt build` и один коммит с исходным сообщением из squashed commit.

````bash
git cherry-pick -n commitHash1 commitHash2 ...
cd _build/templates/default && grunt build && cd ../../../
git add -u
git commit -m "Original PR commit message (#12345)"
````

### Push перенесённых изменений

Если уверены, один коммит с cherry-pick можно пушить сразу в целевую ветку. Если есть риск для целевой ветки, создайте новую ветку, запушьте в свой fork и откройте PR. После CI или доп. тестов сделайте squash and merge как в случае 1, если за это время целевая ветка не менялась.
