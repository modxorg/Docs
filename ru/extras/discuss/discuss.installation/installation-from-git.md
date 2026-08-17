---
title: "Установка из Git"
description: "Fork, сборка transport-пакета и подключение версионированного репозитория Discuss к MODX"
translation: "extras/discuss/discuss.installation/installation-from-git"
---

Чтобы работать с Discuss из Git, нужно выполнить несколько дополнительных шагов.

## 1. Fork и clone

Discuss поддерживается на Github. Чтобы принимать внешние contributions, сделайте fork основного репозитория и clone его локально. Если вы новичок в Git, пройдите [интерактивный Git tutorial на Github](http://try.github.com). Если fork или локального clone ещё нет, выполните:

1. Откройте <http://github.com/modxcms/Discuss>
2. Нажмите «Fork», чтобы создать fork в своём аккаунте
3. Склонируйте локально командой в терминале:
  git clone git@github.com:**username**/Discuss.git
  В текущей директории появится папка Discuss с содержимым репозитория. Разместите её в web-доступной директории вне каталога MODX.
4. Переключитесь на нужную ветку: `git checkout <branch>`. Обычно это «develop», ветка темы или release в зависимости от задачи. См. [Discuss Contributions Guidelines](extras/discuss/discuss.contributing "Discuss.Contributing") для выбора ветки.

Дальше нужно собрать пакет для установки. Это ускорит запуск форума и снимет часть ручной настройки.

## 2. Сборка пакета

Откройте папку Discuss.

Скопируйте _build/build.config.sample.php в _build/build.config.php и укажите в MODX_BASE_PATH путь к установке MODX Revolution (2.2+). Путь может быть относительным, как в sample, или абсолютным.

Запустите _build/build.transport.php в терминале: `php _build/build.transport.php` или откройте файл в браузере. Ошибок быть не должно. При успехе пакет появится в core/packages установки MODX из build.config.php.

## 3. Установка Discuss из пакета

[Следуйте инструкциям по установке форума](extras/discuss/discuss.installation "Discuss.Installation").

## 4. Подключение версионированного репозитория Discuss к форуму

После установки Discuss созданы системные настройки, элементы на месте, можно начинать разработку. Почти.

Чтобы Discuss использовал ваш исходный код вне каталога MODX, добавьте и измените настройки:

1. В System > Namespaces укажите для namespace «discuss» путь /path/to/Discuss/core/components/discuss/
2. В System > System Settings добавьте discuss.core_path с путём /path/to/Discuss/core/components/discuss/
3. Добавьте discuss.assets_path с путём /path/to/Discuss/assets/components/discuss/
4. Добавьте discuss.assets_url с URL <http://localhost/path/to/Discuss/assets/components/discuss/>

Этого достаточно в большинстве случаев.

Если вы меняете установленные сниппеты, настройте их как static snippets:

1. Создайте media source на версионированную директорию Discuss
2. Отредактируйте сниппеты, отметьте static и выберите файл в path/to/versioned/Discuss/core/components/discuss/elements/snippets/, затем сохраните.
  Это нужно только при изменении кода сниппетов.

## 5. Работа

Готово.

В ядре включено интенсивное кэширование. Если вы меняете core, включая «hooks» в core/components/discuss/hooks/, изменения могут не отображаться сразу. Очистите кэш MODX или каталог core/cache/discuss.
