---
title: "Slideshow Manager"
description: "CMP и сниппет для управления слайдшоу с расписанием публикации"
translation: "extras/slideshow-manager/index"
---

## Что такое Slideshow Manager?

Slideshow Manager: CMP (custom manager page) и сниппет. В менеджере вы загружаете слайды и задаёте расписание по датам начала и окончания. Слайды можно оставить в статусе TBD (to be determined). Slideshow Manager поддерживает любое число слайдшоу (albums) на сайте.

## История

Slideshow Manager написал Josh Gulledge как надёжный менеджер слайдшоу для MODX. Первый релиз: весна 2011 года.

### Demo

Пример слайдшоу по умолчанию: [Joshua19Media.com](http://www.joshua19media.com/)

### Загрузка

Скачайте через менеджер MODX Revolution в Package Management или из [MODX Extras Repository](https://modx.com/extras/package/slideshowmanager).

### Разработка и сообщения об ошибках

Slideshow Manager на GitHub: <https://github.com/jgulledge19/Slideshowmanager>, issues: <https://github.com/jgulledge19/Slideshowmanager/issues>.

## Обновление

Обновляйте через Package Manager в MODX. Если обновление не видно, скачайте последнюю версию как новый пакет. При переходе с версии до 1.1.0pl может понадобиться однократный запуск сниппета `[[updateSlideshow]]` перед управлением слайдами и альбомами.

## Установка

Установите через package manager.

### Как использовать

Базовый вывод первого альбома:

``` php
<div id="slider-wrapper">

 [[!jgSlideShow?
   &album_id=`1`
 ]]
</div>

```

## См. также

1. [jgSlideshow Snippet](extras/slideshow-manager/jgslideshow-snippet)
2. [Slideshow Manager CMP](extras/slideshow-manager/slideshow-manager-cmp)
