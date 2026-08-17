---
title: "Правила валидации"
translation: "extending-modx/xpdo/custom-models/defining-a-schema/validators"
---

## Обзор

В XML-схеме правила валидации задают узлами XML по такому шаблону:

``` xml
<validation>
    <rule field="$name_of_field"
        name="$name_of_rule"
        type="callable|preg_match|xPDOValidationRule"
        rule="$various"
        value="$optional_parameter"
        message="string" />
</validation>
```

У **rule** могут быть такие атрибуты:

- **field**: имя поля. _(обязательно)_
- **name**: уникальное имя этого правила валидации. Для каждого поля можно задать несколько правил. _(обязательно)_
- **Type**: может быть `callable`, `preg_match` или `xPDOValidationRule` _(обязательно)_
- **rule**: зависит от type. Для type=callable это имя callback-функции. Для type=preg_match это регулярное выражение. Для type=xPDOValidationRule нужно указать валидный дочерний класс. _(обязательно)_
- **value**: необязательный аргумент для функций валидации, например когда type равен `xPDOValidationRule`, а rule это класс, который его расширяет. _(необязательно)_
- **message**: строка, описывающая правило валидации при сбое. _(обязательно)_ В MODX 2+ поле message содержит строку лексикона, которая может давать переводы сообщений по языкам.

``` xml
    <rule field="category" name="preventBlank" type="xPDOValidationRule" rule="xPDOMinLengthValidationRule" value="1" message="category_err_ns_name" />
```

## Regex-валидация

Возьмём пример из схемы modChunk:

``` xml
    <object class="modChunk" table="site_htmlsnippets" extends="modElement">
        <field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
        <!-- ... more fields here -->
        <validation>
            <rule field="name" name="invalid" type="preg_match" rule="/^(?!\s)[a-zA-Z0-9\x2d-\x2f\x7f-\xff_-\s]+(?!\s)$/" message="chunk_err_invalid_name" />
        </validation>
    </object>
```

## Валидация callable

Для валидации можно использовать свои функции с type `callable`. Это опирается на PHP-функцию [call\_user\_func()](http://php.net/manual/en/function.call-user-func.php). Имя функции задают в XML, где нельзя сослаться на экземпляр объекта, поэтому допустимы только обычная PHP-функция вроде `my_function` или статический метод класса, например `MyClass::myFunction`. Дополнительно см. ['callable' Rule](extending-modx/xpdo/custom-models/validation#the-callable-rule)

## Валидация xPDOValidationRule

Так вы подключаете встроенные правила валидации MODX. Классы доступны в файле `core/xpdo/validation/xpdovalidator.class.php`:

- **xPDOMinLengthValidationRule**
- **xPDOMaxLengthValidationRule**
- **xPDOMinValueValidationRule**
- **xPDOMaxValueValidationRule**
- **xPDOObjectExistsValidationRule**
- **xPDOForeignKeyConstraint**

Например, правило, заданное для `modContentType`:

``` xml
    <object class="modContentType" table="content_type" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255" phptype="string" null="false" index="unique" />
        <!-- ... more fields here ... -->
        <validation>
            <rule field="name" name="name" type="xPDOValidationRule" rule="xPDOMinLengthValidationRule" value="1" message="content_type_err_ns_name" />
        </validation>
    </object>
```

## Использование xPDOValidator

Вы можете заранее проверить текущее состояние `xPDOObject` через xPDOValidator или позволить `save()` самому вызвать валидацию (см. `xPDO::OPT_VALIDATE_ON_SAVE`) и завершиться ошибкой при провале.

Пример предварительной валидации из класса `modObjectCreateProcessor` в MODX Revolution:

``` php
/* run object validation */
if (!$this->object->validate()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'],$this->modx->lexicon($message['message']));
        }
    }
}
```

Пример разбора сообщений валидации после неудачного `save()` из класса `modError` в MODX Revolution:

``` php
/* save object and report validation errors */
if (!$this->object->save()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'],$this->modx->lexicon($message['message']));
        }
    }
}
```

### Свои правила валидации

Если вы хотите писать свои правила валидации, создайте PHP-файл класса в папке model вашего пространства имён _для каждого определённого правила_, например `core/components/my_pkg/model/my_pkg/my_validation_rule.class.php`. Имя должно быть в нижнем регистре и с расширением `.class.php`. Так xPDO находит файл класса (это «autoload-подобная» конвенция xPDO).

Рассмотрим Custom Resource Class (CRC), который не должен вкладываться под другие CRC. Родителем он хочет только встроенные классы MODX (modDocument, WebLink и т.д.). Определение в XML-схеме:

``` xml
    <object class="MyCRC" extends="modResource">
        <composite alias="Things" cardinality="many" class="Things" foreign="parent" local="id" owner="local"></composite>
        <validation>
          <rule field="parent" message="Invalid parent" name="parent" rule="NormalParents" type="xPDOValidationRule"></rule>
        </validation>
    </object>
```

Соответствующее правило валидации из `core/components/my_pkg/model/my_pkg/normalparents.class.php`:

``` php
<?php /**
 * @param mixed $value candidate value
 * @param array $options from the XML schema
 * @return boolean false on failed validation, true on pass
 */
class NormalParents extends xPDOValidationRule {
    public function isValid($value, array $options = array()) {
        parent::isValid($value, $options);
        $result = false;
        $obj=& $this-?>validator->object;
        $xpdo=& $obj->xpdo;
                $xpdo->log(1, 'Running TaxonomyParents Validation rule');
        $validParentClasses = array('modDocument', 'modWebLink', 'modSymLink', 'modStaticResource');
        if ($obj->get('parent') === 0 || ($obj->Parent && in_array($obj->Parent->class_key, $validParentClasses))) {
           $result = true;
        }
        if ($result === false) {
            $this->validator->addMessage($this->field, $this->name, $this->message);
        }

        return $result;
    }
}
```
