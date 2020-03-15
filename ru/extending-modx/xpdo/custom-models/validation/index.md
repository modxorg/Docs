---
title: "Валидация объектов"
_old_id: "1198"
_old_uri: "2.x/advanced-features/object-validation"
---

## Что такое валидация объектов в xPDO?

Проверка (или валидация) объекта выполняется с помощью xPDOValidator, класса проверки в xPDO. Он автоматически доступен из любого xPDOObject объекта через метод getValidator.

## Как это делается?

Валидация может быть выполнена либо при помощи XML схемы, либо во время выполнения с помощью методов [xPDOValidator] (ru/extending-modx/xpdo/class-reference/xpdovalidator "xPDOValidator").

## Пример использования

Преждем всего давайте создадим нашу модель с этим объектом:

``` xml
<model package="test" baseClass="xPDOObject" platform="mysql"
       defaultEngine="MyISAM" tablePrefix="test_">
    <object class="myTest" table="test" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255"
               phptype="string" default="" null="false" />

        <validation>
            <rule field="name"
                  name="preventBlank"
                  type="xPDOValidationRule"
                  rule="xPDOMinLengthValidationRule"
                  value="1"
                  message="Пожалуйста укажите имя"
             />
        </validation>
    </object>
</model>
```

From there, go ahead and generate the model from the XML schema. And now in a Snippet we'll call Test:

Идем дальше и генерируем модель из XML схемы. А теперь в сниппете вызываем Test:

``` php
$output = '';
$modx->addPackage('test','/path/to/my/test/model/','test_');
$obj = $modx->newObject('myTest');
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $output .= 'Произошла ошибка в поле "'.$errorMsg['field'].'": '.$errorMsg['message'];
    }
}
```

Будет выведено:

> Произошла ошибка в поле "name": Пожалуйста укажите имя.

## Правила

Существует три вида правил, 'callable', 'preg\_match', and 'xPDOValidationRule'.

### Правило 'callable'

Это правило, основанное на функции, которую вы передаете.

Это можно сделать несколькими способами. В параметре "rule" схемы вы можете указать имя функции, например "myCallable", а затем обязательно определить функцию, прежде чем вызывать validate() функцию.

В функцию передаются два параметра, первый из которых является значением соответствующего столбца, а второй - массив других атрибутов в поле правила в схеме. Например, модель с правилом может быть следующей:

``` php
<rule field="number" name="callable2"
      type="callable" rule="myCallable"
      min="10" message="Значение слишком маленькое. Может быть 10 или больше"
/>
```

Вызывается при помощи следующего кода:

``` php
function myCallable($value,$parameters) {
    return $value < $parameters['min'];
}
$obj->set('number',101);
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $o .= 'Произошла ошибка в поле "'.$errorMsg['field'].'": '.$errorMsg['message'].'<br />';
    }
}
```

Будет возвращено:

> Произошла ошибка в поле "number": Callable failed.

Вы также можете вызывать методы класса; если у вас есть класс A с методом B, вы можете сделать xml атрибут правила вида "A::B" для доступа к функции.

### Правило 'preg\_match'

Это правило представляет собой регулярного выражения, которое должно передаваться в поле для проверки объекта. Пример правила в схеме такой: проверяется, содержит ли поле строку 'php':

``` php
<rule field="name" name="phpMatch"
      type="preg_match" rule="/php/i"
      message="Не содержит строку 'php'." />
```

А в PHP следующий вызов:

``` php
$obj->set('name','test');
$validator = $obj->getValidator();
if ($validator->validate() == false) {
    $messages = $validator->getMessages();
    foreach ($messages as $errorMsg) {
        $o .= 'Произошла ошибка в поле "'.$errorMsg['field'].'": '.$errorMsg['message'].'<br />';
    }
}
```

Вывод будет следующим:

> Произошла ошибка в поле "name": Не содержит строку 'php'.

### Правило 'xPDOValidationRule' 

Это определенный тип правила, основанный на расширении класса класса xPDOValidationRule. Это позволяет делать более сложные правила, а также использовать встроенные. Встроенные правила включают в себя:

1. [xPDOForeignKeyConstraint](ru/xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](ru/xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](ru/xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](ru/xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](ru/xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](ru/xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)

Ожидайте больше документации по этим конкретным правилам.

## Смотрите также

1. [xPDOForeignKeyConstraint](ru/xpdo/advanced-features/object-validation/xpdoforeignkeyconstraint)
2. [xPDOMaxLengthValidationRule](ru/xpdo/advanced-features/object-validation/xpdomaxlengthvalidationrule)
3. [xPDOMaxValueValidationRule](ru/xpdo/advanced-features/object-validation/xpdomaxvaluevalidationrule)
4. [xPDOMinLengthValidationRule](ru/xpdo/advanced-features/object-validation/xpdominlengthvalidationrule)
5. [xPDOMinValueValidationRule](ru/xpdo/advanced-features/object-validation/xpdominvaluevalidationrule)
6. [xPDOObjectExistsValidationRule](ru/xpdo/advanced-features/object-validation/xpdoobjectexistsvalidationrule)

- [xPDOValidator](ru/extending-modx/xpdo/class-reference/xpdovalidator "xPDOValidator")
