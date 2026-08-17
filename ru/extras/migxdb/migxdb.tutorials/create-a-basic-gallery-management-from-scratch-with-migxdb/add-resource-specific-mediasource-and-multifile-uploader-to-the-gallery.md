---
title: "Mediasource для ресурса и мультизагрузка в галерею"
description: "Динамический mediasource по ресурсу, кнопка uploadfiles_db и вывод путей на фронтенде"
translation: "extras/migxdb/migxdb.tutorials/create-a-basic-gallery-management-from-scratch-with-migxdb/add-resource-specific-mediasource-and-multifile-uploader-to-the-gallery"
---

## Создание динамического mediasource для ресурса

- Откройте: Media -> Media Sources
- Создайте новый mediasource
    - name: ResourceMediaPath
    - source type: Filesystem
- Обновите mediasource
    - basepath и baseurl: `[[migxResourceMediaPath? &pathTpl=`assets/mygallery/{id}/` &createFolder=`1`]]`

Возможно, понадобится каталог с правами записи для php: assets/mygallery/

## Привязка mediasource к полю image

1. Откройте: Extras -> MIGX
2. Отредактируйте конфигурацию (правый клик по элементу в сетке)
3. Вкладка «Formtabs» -> Formtab «Image» -> поле «Image»
    3.1. На вкладке «Mediasources» добавьте два элемента для контекстов «web» и «mgr» с id нового mediasource

## Изменение tpl

Создайте сниппет «addmediasourcepath» с кодом:

``` php
$output = str_replace('./','',$input);
if ($mediasource = $modx->getObject('sources.modMediaSource',$options)){
    $output = $mediasource->prepareOutputUrl($output);
}
return '/' . $output;
```

В tpl замените плейсхолдер image, например:

``` php
[[+image:addmediasourcepath=`3`]]
```

Если используете pthumb для ресайза:

``` php
[[+image:addmediasourcepath=`3`:pthumb=`w=500`]]
```

Замените id mediasource в примере «3» на свой!

## Добавление кнопки загрузки

1. Откройте: Extras -> MIGX
2. Отредактируйте конфигурацию (правый клик по элементу в сетке)
3. В «Mediasource ID» укажите id mediasource
4. На вкладке «Actionbuttons» выберите «uploadfiles\_db» и снимите «addItem»
5. Сохраните изменения
