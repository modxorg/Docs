---
title: "modExtra"
description: "Базовый шаблон Extra для разработки новых компонентов MODX Revolution"
translation: "extras/modextra/index"
---

## Что такое modExtra?

modExtra: базовый шаблон Extra для создания нового Extra в MODX Revolution. Можно git archive из репозитория и получить готовую структуру файлов для разработки.

## Использование

modExtra предназначен для «экспорта» из Git, не для прямого использования как база новых Extras.

### Exporting from Git

Клонируйте репозиторий на машине разработки:

``` php
git clone http://github.com/splittingred/modExtra.git ./
```

Обычно указывают целевую папку:

``` php
git clone http://github.com/splittingred/modExtra.git /path/to/my/downloads/modExtra
```

git clone создаёт целевую папку, путь должен указывать на несуществующую директорию.

Создайте каталог для нового repo **вне** document root MODX, чтобы не путать GIT repositories. Часто папка **выше** document root.

Перейдите в каталог modExtra и выполните:

``` php
git archive HEAD | (cd /path/where/I/want/my/new/repo/ && tar -xvf -)
```

В Windows: git archive HEAD и распакуйте tar куда нужно.

Затем git init в новой папке, файлы на месте.

### Configuration

Замените modExtra в файлах на имя нового Extra. **grep** находит вхождения (\*nix и Mac):

``` php
grep -rl 'modExtra' .
```

Или find-and-replace по нескольким файлам в редакторе. Имя extra: одно слово без спецсимволов.

modExtra встречается в файлах:

- ./\_build/build.config.sample.php
- ./\_build/build.schema.php
- ./\_build/build.transport.php
- ./\_build/data/transport.menu.php
- ./\_build/data/transport.settings.php
- ./\_build/data/transport.snippets.php
- ./\_build/properties/properties.modextra.php
- ./\_build/resolvers/resolve.paths.php
- ./\_build/resolvers/resolve.tables.php
- ./assets/components/modextra/connector.php
- ./assets/components/modextra/js/mgr/modextra.js
- ./assets/components/modextra/js/mgr/sections/home.js
- ./assets/components/modextra/js/mgr/widgets/home.panel.js
- ./assets/components/modextra/js/mgr/widgets/items.grid.js
- ./core/components/modextra/controllers/index.php
- ./core/components/modextra/controllers/mgr/header.php
- ./core/components/modextra/controllers/mgr/home.php
- ./core/components/modextra/docs/changelog.txt
- ./core/components/modextra/docs/readme.txt
- ./core/components/modextra/elements/snippets/snippet.modextra.php
- ./core/components/modextra/index.php
- ./core/components/modextra/lexicon/en/default.inc.php
- ./core/components/modextra/lexicon/en/properties.inc.php
- ./core/components/modextra/model/modextra/modextra.class.php
- ./core/components/modextra/model/modextra/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.map.inc.php
- ./core/components/modextra/model/modextra/request/modextracontrollerrequest.class.php
- ./core/components/modextra/model/schema/modextra.mysql.schema.xml
- ./core/components/modextra/processors/mgr/item/create.php
- ./core/components/modextra/processors/mgr/item/get.php
- ./core/components/modextra/processors/mgr/item/getlist.php
- ./core/components/modextra/processors/mgr/item/remove.php
- ./core/components/modextra/processors/mgr/item/update.php

Переименуйте файлы с "modextra" в имени:

``` php
find . -name *modextra*
```

Файлы для переименования:

- ./\_build/properties/properties.modextra.php
- ./assets/components/modextra
- ./assets/components/modextra/js/mgr/modextra.js
- ./core/components/modextra
- ./core/components/modextra/elements/snippets/snippet.modextra.php
- ./core/components/modextra/model/modextra
- ./core/components/modextra/model/modextra/modextra.class.php
- ./core/components/modextra/model/modextra/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.class.php
- ./core/components/modextra/model/modextra/mysql/modextraitem.map.inc.php
- ./core/components/modextra/model/modextra/request/modextracontrollerrequest.class.php
- ./core/components/modextra/model/schema/modextra.mysql.schema.xml

Создайте [System Settings](building-sites/settings "System Settings") в MODX Revo:

- 'mynamespace.core\_path' - Point to /path/to/my/extra/core/components/extra/
- 'mynamespace.assets\_url' - /path/to/my/extra/assets/components/extra/

Очистите кэш. Extra будет искать файлы в этих каталогах вне webroot.

При ошибке удалите repo и экспортируйте git head снова.

## See Also

### Copyright Information

modExtra распространяется как GPL (как MODX Revolution), copyright Shaun McCormick даёт пользователям modExtra право изменять, распространять, dual license и использовать modExtra в производных работах (не копиях modExtra) с указанием attribution в исходниках производных работ.
