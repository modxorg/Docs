---
title: "Гидратация полей"
translation: "extending-modx/xpdo/create-xpdo-instance/hydrating-fields"
---

## Что такое гидратация?

Гидратация (hydration) заполняет значениями поля и связанные объекты, которые представляет `xPDOObject`. По умолчанию к этим полям вы обращаетесь только через методы `get()`, `getOne()` и `getMany()` у `xPDOObject`, и они должны быть описаны подходящими метаданными в map объекта. Есть несколько опций, которыми вы расширяете, как xPDO гидратирует поля и связанные объекты.

Опции передают в параметр `$config` [конструктора xPDO](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor"):

- `xPDO::OPT_HYDRATE_FIELDS` - если true, поля гидратируются как публичные свойства объекта.
- `xPDO::OPT_HYDRATE_RELATED_OBJECTS` - если true, связанные объекты гидратируются как публичные свойства объекта.
- `xPDO::OPT_HYDRATE_ADHOC_FIELDS` - если true, разрешены и гидратируются ad-hoc поля (также учитывает `xPDO::OPT_HYDRATE_FIELDS`).

## Гидратация полей

Если `xPDO::OPT_HYDRATE_FIELDS` равен true, помимо доступа через `xPDOObject::get()` все поля объекта доступны для чтения напрямую как публичные свойства. Пример:

``` php
$object->set('name',$name);
echo $object->name;
```

Будет выведено поле `name` объекта, если оно описано в схеме объекта.

**Это «сырые» значения**
Прямой доступ к полям объекта даёт только «сырое» значение, загруженное из БД, без метаданных поля и без логики метода `get()` вашего класса `xPDOObject` (или родительских классов). Рекомендуется всегда использовать `get()` для доступа к полям объекта, кроме случаев, когда вам нужно сырое значение или нужно обойти логику `get()` по конкретной причине.

## Гидратация ad-hoc полей

Если `xPDO::OPT_HYDRATE_ADHOC_FIELDS` равен true, гидратация полей включается и для произвольных полей, не описанных в class map. Это шаг дальше: гидратируются все _ad hoc_ поля, то есть любые поля вне схемы. Допустим, вы хотите задать произвольное поле `puns` у объекта Person:

``` php
$object->set('name','Arthur Dent');
$object->set('puns',42);
echo $object->get('name') .' has '. $object->get('puns') . ' puns.';
```

Будет выведено нужное значение, даже если поле `puns` не описано в схеме.

Опция учитывает `xPDO::OPT_HYDRATE_FIELDS` при том, делать ли _ad hoc_ поля доступными напрямую как публичные свойства объекта.

## Гидратация связанных объектов

Если `xPDO::OPT_HYDRATE_RELATED_OBJECTS` равен true, все связанные объекты доступны как публичные свойства объекта. По умолчанию связанные объекты доступны только через [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne") или [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany") у xPDOObject, но эта опция (аналогично `xPDO::OPT_HYDRATE_FIELDS`) делает уже загруженные этими методами связанные объекты доступными напрямую как переменные. Пример:

``` php
$fordPrefect->getMany('Beers');
foreach ($fordPrefect->Beers as $beer) {
   echo $beer->get('name').'<br />';
}
```

Будет выведен список всех Beers, связанных с объектом `$fordPrefect` и загруженных методом [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany").

**Один и многие**
Объекты, загруженные через [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne"), доступны напрямую как объект этого класса, а через [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany") как массив объектов класса.

## Смотрите также

- [Конструктор xPDO](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor")
- [Установка полей объекта](extending-modx/xpdo/setting-object-fields "Setting Object Fields")
- [Работа со связанными объектами](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
