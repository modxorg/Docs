---
title: "modResource.prepareTreeNode"
translation: "extending-modx/core-model/modresource/modresource.preparetreenode"
description: "Точка расширения для узла дерева ресурсов в менеджере"
---

## modResource.prepareTreeNode

Принимает массив, описывающий один узел дерева менеджера, непосредственно перед отправкой в браузер, и возвращает его без изменений. Процессор `Resource/GetNodes` вызывает метод как последний шаг подготовки узла.

Переопределите его в производном классе ресурса, чтобы изменить узел — его текст, подсказку или CSS-классы — только для этого класса.

## Синтаксис

``` php
array prepareTreeNode ([array $node = array()])
```

- `$node` _(array)_ данные узла в том виде, в каком их собрал процессор дерева, по умолчанию `array()`

## Пример

``` php
class MyResource extends modResource
{
    public function prepareTreeNode(array $node = [])
    {
        $node['qtip'] = 'foobar';
        return $node;
    }
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getIconClasses](extending-modx/core-model/modresource/modresource.geticonclasses)
