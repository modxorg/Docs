---
title: "Настройка темы для работы с Gitify"
description: "Git, .gitignore, конфиг .gitify и первый push темы Fred"
translation: "extras/fred/collab/initial_extract"
---

Войдите в Github и нажмите зелёную кнопку `New`. Задайте имя и описание репозитория. Это будет origin для участников совместной работы. Не инициализируйте репозиторий README: его добавит тема позже.

Скопируйте URL проекта: стрелка у `Clone or download`, SSH URL вида `git@github.com:your_name/example_theme.git`.

## Подключение к проекту MODX с темой

Подключитесь по SSH к Cloud и перейдите в webroot `www/`. Инициализируйте git с SSH URL выше:

```shell
git init
git remote add origin git@github.com:your_name/example_theme.git
```

## Git Ignore

Создайте файл `.gitingnore` с содержимым ниже, чтобы исключить файлы MODX, которые не нужны в репозитории. Замените `!/assets/themes/{{your-theme-name}}` на реальное имя, например `!/assets/themes/lightcoral`:

```plain
# MODX & Gitify #
#################
/_backup
/config.core.php
/connectors
/core
/ht.access
/index.php
/manager
/assets/*
!/assets/themes/{{your-theme-name}}

# IDE files (optional or add more #
###################################
.idea
.vscode
.settings
nbproject
.project

# OS generated files (optional) #
#################################
.DS_Store
.DS_Store?
._*
.Spotlight-V100
.Trashes
ehthumbs.db
Thumbs.db
node_modules
npm-debug.log
.sass-cache
```

## YAML-конфигурация Gitify

Создайте в webroot файл `.gitify` с содержимым:

```yaml
data_directory: _data/
backup_directory: _backup/
data:
    fred_themes:
        class: FredTheme
        primary: id
        exclude_keys: ["config"]
        package: fred
    fred_element_categories:
        class: FredElementCategory
        primary: id
    fred_element_option_sets:
        class: FredElementOptionSet
        primary: id
        extension: .json
    fred_element_rte_configs:
        class: FredElementRTEConfig
        primary: id
        extension: .json
    fred_elements:
        class: FredElement
        primary: id
        extension: .html
    fred_blueprint_categories:
        class: FredBlueprintCategory
        primary: id
    fred_blueprints:
        class: FredBlueprint
        primary: id
        extension: .json
```

Gitify включит все Elements и категории, их Option Sets, публичные Blueprints и категории, RTE configs и Themes. Media sources пока не поддерживаются при экспорте темы и опущены.

## Первый commit

Отправьте код в source repo. Когда готовы делиться темой и работать в команде:

```shell
cd ~/www
gitify extract
git add --all  # or git add on files you want to commit
git commit -m "Initalize My Awesome Theme"  # please write your own message
git push origin master
```

Теперь можно [работать с другими участниками](extras/fred/collab/gitify_in_action).
