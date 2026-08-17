---
title: "imageHERE"
description: "Инструмент для быстрой вставки placeholder-изображений при вёрстке"
translation: "extras/imagehere/index"
---

## Что такое imageHERE?

imageHERE это простой инструмент для быстрого прототипирования: вставляет placeholder-изображения в разметку на этапе разработки. Использует скрипт holder.js от Ivan Malopinsky

<http://imsky.github.com/holder/>

### Текущая версия

Версия: 1.0.0-beta

С: 2 ноября 2012 года

## Использование

Вызывайте imageHERE через чанк в шаблоне или контенте:

`[[$imageHERE]]`

Пример с параметрами:

`[[$imageHERE?

 &w=`600`

 &h=`400`

 &bg=`#555`

 &fg=`#fff`

 &text=`Custom Text`

 &alt=`alt text here`

]]`

- &w => ширина placeholder. По умолчанию 300.
- &h => высота placeholder. По умолчанию 200.
- &bg => цвет фона в hex. Работает только вместе с &fg.
- &fg => цвет текста в hex. Работает только вместе с &bg.
- &text => свой текст. По умолчанию «width x height».
- &alt => alt-текст изображения, если важна валидация при прототипировании ;)

Параметр &attr не показан здесь: он позволяет вставить любой атрибут в элемент image. Например: &attr=`class="myClass"`.

Параметры можно задать на вкладке Chunk properties, тогда каждый вызов чанка использует этот набор по умолчанию. Несколько наборов свойств вызываются так: `[[$imageHERE@myPropertySet]]`

Когда прототип готов, отключите плагин imageHERE, чтобы holder.js больше не подключался. Или удалите imageHERE через Package Management.
