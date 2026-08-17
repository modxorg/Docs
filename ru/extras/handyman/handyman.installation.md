---
title: "Установка"
description: "Установка HandyMan через Package Manager, beta-провайдер и из Git"
translation: "extras/handyman/handyman.installation"
---

HandyMan 0.9.0 **не** поддерживает MODX Revolution 2.0.8 и ниже. В 1.0.x есть ограниченная поддержка 2.0.8, но её могут убрать в будущих версиях. Не задерживайтесь на Revo 2.0.

Пакет HandyMan создаёт папку «HandyMan» в корне сайта. На SuPHP или phpsuexec проблем не будет. Иначе в логе установки могут быть ошибки. Создайте папку «handyman» в корне сайта и выдайте права на установку (часто 777). Запустите установщик HandyMan и верните права папки на 755.

## Установка через провайдер MODX.com

HandyMan доступен в установщике пакетов MODX: <http://www.modx.com/extras/package/handyman> или в менеджере. Скачайте пакет через Package Manager и следуйте шагам установки. Если вы загрузили transport в core/packages вручную, откройте «add packages» -> «Search locally for packages».

В зависимости от сервера может понадобиться папка «handyman» в корне сайта с правами записи для MODX. Если установка не может скопировать файлы, создайте папку вручную с правами 777 и переустановите пакет. При обновлениях шаг может повториться. В версии 1.1/1.2 планируют способ без этой неудобной процедуры.

**После установки HandyMan доступен по адресу yoursite.com/handyman/.**

## Установка через Beta Provider

Beta Provider отключён. Используйте официальный репозиторий MODX.com.

## Установка (сборка) из Git

Клонируйте репозиторий <https://github.com/Mark-H/HandyMan> на локальную машину.

``` php
git clone https://github.com/Mark-H/HandyMan.git
```

Настройте core.config.php так, чтобы он указывал на вашу установку MODX.

Запустите \_build/build.transport.php через браузер или команду php в терминале.

Откройте Package Management в менеджере, Add Packages, Search Locally. HandyMan появится в сетке.

Если пакет не нужен, а вы хотите отдельную копию для разработки, задайте handyman.core\_path (core/components/handyman/), handyman.path (/handyman/) и handyman.url (/handyman/). Для темы или шаблонов также handyman.templates и handyman.theme.
