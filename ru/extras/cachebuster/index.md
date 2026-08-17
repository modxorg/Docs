---
title: "cachebuster"
translation: "extras/cachebuster"
---

 [Cachebuster](https://modx.com/extras/package/cachebuster) управляет тем, грузятся ли assets свежими с сервера или с версией из настройки сайта. Добавьте чанк smartcache в конец URL asset, как ниже.

## Использование Cachebuster

``` html
<link rel="stylesheet" href="[[++assets_url]]css/styles.css?nc=[[$smartcache]]">
```

 Если системная настройка `cb.cachebust` включена, браузер не закэширует asset. Если выключена, вернётся текущая версия сайта из `cb.site_ver`. Версия в URL не даёт вернувшимся посетителям тянуть устаревшие файлы из кэша браузера после выкладки на production.

## Опциональные настройки

### Placeholder

 Cachebuster может писать в плейсхолдер вместо возврата значения. Передайте имя плейсхолдера:

``` php
[[$smartcache? &placeholder=`cbtime`]]
```

### Параметр в URL

 Чтобы добавить URL-параметр к результату, используйте `param`:

``` php
[[$smartcache? &param=`?cb`]]
```

## Смотрите также

- [Проект на Github](https://github.com/jpdevries/Cachebuster)
