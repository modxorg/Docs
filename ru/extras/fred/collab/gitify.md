---
title: "Настройка Gitify"
description: "Установка Gitify и загрузка темы Fred в экземпляр MODX"
translation: "extras/fred/collab/gitify"
---

[Gitify](https://github.com/modmore/Gitify) даёт двустороннюю синхронизацию данных, которые обычно лежат в базе MODX, и делает их версионируемыми через git. Это CLI-инструмент, похожий на Composer, для работы с MODX.

Документ может показаться объёмным, но по сути это простая последовательность команд copy/paste. Вам понадобится:

1. Аккаунт Github
2. Базовые навыки SSH в командной строке
3. (Опционально, но проще следовать гайду) Аккаунт MODX Cloud или хостинг с поддержкой git

## Начало работы

В этом учебнике мы предполагаем, что вы используете MODX Cloud.

Создайте пустой экземпляр MODX на последней версии. Также нужно [`ssh` на сайт](https://support.modx.com/hc/en-us/articles/217294267-Access-Instances-with-SFTP-SSH), чтобы настроить Gitify.

### Шаг 1: Установка Composer и Gitify

После создания экземпляра выполните команды ниже по SSH из домашней директории. Они установят Composer и скопируют Gitify на сайт.

```shell
cd www; curl http://modx.co/scripts/install.sh | sh
mkdir ../gitify; cd ../gitify
git clone https://github.com/modmore/Gitify.git ./
```

Выйдите из SSH и войдите снова, чтобы использовать Composer. Либо выполните `source /paas/cXXXX/.profile`, подставив свой каталог Cloud вместо `cXXXX`.

### Шаг 2: Настройка Gitify

Из SSH в домашней директории Cloud:

```shell
cd ~/gitify
composer install
chmod +x Gitify; cd ~/.bin; ln -s ../gitify/Gitify gitify
```

После `composer install` успех подтверждает зелёная строка «Generating autoload files». Снова выйдите из SSH, чтобы пользоваться Gitify, или выполните команду `source…` выше.

### Шаг 3: URL для clone

В этом учебнике мы используем гипотетическую Example Theme. Чтобы получить URL для clone, на github.com откройте нужный репозиторий, нажмите стрелку у зелёной кнопки `Clone or download` и скопируйте SSH URL, например `git@github.com:modxcms/example.git`

Чтобы начать новый проект темы, см. [Настройку темы для работы с Gitify](extras/fred/collab/initial_extract).

### Шаг 4: Clone общей темы в экземпляр MODX

`git clone` не работает в непустую директорию, поэтому клонируем во временное место и переносим файлы в web root. URL clone: стрелка у `Clone or download` в проекте темы на Github, SSH URL вида `git@github.com:modxcms/fred-theme-starter.git`

```shell
cd ~/www
git clone git@github.com:modxcms/fred-theme-starter.git tmp
```

Репозиторий темы окажется в `~/www/tmp/` в Cloud. Перенесите содержимое `tmp/` под `www/`:

```shell
rsync -av ./tmp ./
```

Убедитесь, что каталог `.git/` и файлы лежат под `www/`. Когда всё на месте, удалите `tmp/`:

```shell
rm -rf ./tmp
```

### Шаг 5: Загрузка темы через Gitify

Загрузите тему в экземпляр MODX. Скорее всего установятся несколько Extras, процесс может занять минуту и дольше в зависимости от канала. Вы увидите сообщения о загрузке и установке Extras:

```shell
cd ~/www
gitify package:install --all
gitify build
```

При успешной установке появится зелёное слово `Done!`. При успешной сборке то же сообщение плюс статистика памяти и времени.

### Шаг 6: Вход в Manager для просмотра темы

После завершения войдите в Manager. Вы увидите установленные Extras, включая Fred, а также Elements, Blueprints и Options темы.

## Следующие шаги

После clone темы в экземпляр MODX вы можете работать с удалённым репозиторием и [совместно править через git](extras/fred/collab/gitify_in_action).
