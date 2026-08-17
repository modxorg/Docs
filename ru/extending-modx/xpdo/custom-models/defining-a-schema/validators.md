---
title: "Правила валидации"
translation: "extending-modx/xpdo/custom-models/defining-a-schema/validators"
description: "Правила валидации полей в XML-схеме xPDO (callable, preg_match, xPDOValidationRule)"
---

## Обзор

В XML-схеме правила валидации задают узлами такого вида:

``` xml
<validation>
    <rule
        field="$name_of_field"
        name="$name_of_rule"
        type="callable|preg_match|xPDOValidationRule"
        rule="$various"
        value="$optional_parameter"
        message="string"
    />
</validation>
```

У элемента **rule** могут быть атрибуты:

- **field**: имя поля _(обязательный)_
- **name**: уникальное имя правила. На одно поле можно повесить несколько правил _(обязательный)_
- **type**: только `callable`, `preg_match` или `xPDOValidationRule` _(обязательный)_. Нужно писать `callable`, не `callback`. В старых текстах иногда встречался `callback`; валидатор xPDO принимает только `callable` (см. `xPDOValidator` в Revolution 3.x: `core/vendor/xpdo/.../Validation/`)
- **rule**: зависит от **type**. Для `callable` — имя PHP-функции или `Class::method`. Для `preg_match` — регулярное выражение. Для `xPDOValidationRule` — класс-наследник `xPDOValidationRule` _(обязательный)_
- **value**: необязательный аргумент для части классов `xPDOValidationRule` _(необязательный)_
- **message**: текст при ошибке _(обязательный)_. В MODX 2+ часто ключ лексикона для перевода

``` xml
<rule
    field="category"
    name="preventBlank"
    type="xPDOValidationRule"
    rule="xPDOMinLengthValidationRule"
    value="1"
    message="category_err_ns_name"
/>
```

## Валидация регулярным выражением

Пример из схемы `modChunk`:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="modElement">
    <field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
    <!-- ... другие поля ... -->
    <validation>
        <rule
            field="name"
            name="invalid"
            type="preg_match"
            rule="/^(?!\s)[a-zA-Z0-9\x2d-\x2f\x7f-\xff_-\s]+(?!\s)$/"
            message="chunk_err_invalid_name"
        />
    </validation>
</object>
```

## Валидация через callable

Укажите `type="callable"`, чтобы вызвать свою PHP-функцию через [`call_user_func_array()`](https://www.php.net/manual/ru/function.call-user-func-array.php). Имя задано в XML, поэтому экземпляр объекта передать нельзя. Используйте глобальную функцию (`my_function`) или статический метод (`MyClass::myFunction`). См. также [правило callable](extending-modx/xpdo/custom-models/validation#правило-callable).

## Валидация xPDOValidationRule

Встроенные правила лежат в xPDO: `core/vendor/xpdo/xpdo/src/xPDO/Validation/` (Revolution 3.x). Часто используют:

- `xPDOMinLengthValidationRule`
- `xPDOMaxLengthValidationRule`
- `xPDOMinValueValidationRule`
- `xPDOMaxValueValidationRule`
- `xPDOObjectExistsValidationRule`
- `xPDOForeignKeyConstraint`

Пример из `modContentType`:

``` xml
<object class="modContentType" table="content_type" extends="xPDOSimpleObject">
    <field key="name" dbtype="varchar" precision="255" phptype="string" null="false" index="unique" />
    <!-- ... другие поля ... -->
    <validation>
        <rule
            field="name"
            name="name"
            type="xPDOValidationRule"
            rule="xPDOMinLengthValidationRule"
            value="1"
            message="content_type_err_ns_name"
        />
    </validation>
</object>
```

## Использование xPDOValidator

Можно заранее проверить `xPDOObject` валидатором или дать `save()` сделать это, если включён `xPDO::OPT_VALIDATE_ON_SAVE`.

Паттерн предварительной проверки из `modObjectCreateProcessor` в Revolution:

``` php
if (!$this->object->validate()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'], $this->modx->lexicon($message['message']));
        }
    }
}
```

После неудачного `save()`:

``` php
if (!$this->object->save()) {
    /** @var modValidator $validator */
    $validator = $this->object->getValidator();
    if ($validator->hasMessages()) {
        foreach ($validator->getMessages() as $message) {
            $this->addFieldError($message['field'], $this->modx->lexicon($message['message']));
        }
    }
}
```

### Свои правила валидации

Для своего подкласса `xPDOValidationRule` положите по одному PHP-файлу на правило в model-каталог пакета, например `core/components/my_pkg/model/my_pkg/normalparents.class.php`. Имя файла — в нижнем регистре с расширением `.class.php`, чтобы xPDO нашёл класс.

Фрагмент схемы для Custom Resource Class, которому разрешены только встроенные родители:

``` xml
<object class="MyCRC" extends="modResource">
    <composite alias="Things" cardinality="many" class="Things" foreign="parent" local="id" owner="local"></composite>
    <validation>
        <rule
            field="parent"
            message="Invalid parent"
            name="parent"
            rule="NormalParents"
            type="xPDOValidationRule"
        />
    </validation>
</object>
```

Соответствующий класс:

``` php
<?php
/**
 * @param mixed $value проверяемое значение
 * @param array $options атрибуты из XML-схемы
 * @return boolean false при ошибке, true при успехе
 */
class NormalParents extends xPDOValidationRule
{
    public function isValid($value, array $options = array())
    {
        parent::isValid($value, $options);
        $result = false;
        $obj = &$this->validator->object;
        $xpdo = &$obj->xpdo;
        $xpdo->log(xPDO::LOG_LEVEL_INFO, 'Running NormalParents validation rule');
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

## Смотрите также

- [Валидация объектов](extending-modx/xpdo/custom-models/validation)
- [xPDOValidator](extending-modx/xpdo/class-reference/xpdovalidator)
