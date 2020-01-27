---
title: "Удаление Объектов"
translation: "extending-modx/xpdo/removing-objects"
---

## xPDOObject.remove()

Когда вы «удаляете» объект в xPDO, вы удаляете его строку из базы данных. xPDO абстрагирует это в функции [удаление](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove "удаление"):

```php
$box = $xpdo->getObject('Box',134);

if ($box->remove() == false) {
   echo 'An error occurred while trying to remove the box!';
}
```

Функция удаления вернет либо `true`, либо `false`, в зависимости от результата удаления. Ошибки также будут регистрироваться через `$xpdo->log`.

Это также удалит любые **сложные связанные объекты** с этим объектом. Например, если бы у нашего `Box` было 4 «боковых» связанных объекта, которые были отображены как составные, они также будут удалены при вызове `$ box-> remove`.

## xPDO.removeCollection($class, $criteria)

Этот метод используется для удаления нескольких объектов.

<http://api.modxcms.com/xpdo/xPDO.html#removeCollection>

## Примеры

Из modSessionHandler:

```php
public function gc($max) {
    $max = (integer) $this->modx->getOption('session_gc_maxlifetime',null,$max);
    $maxtime= time() - $max;
    $result = $this->modx->removeCollection('modSession', array("`access` < {$maxtime}"));
    return $result;
}
```

**Внимание**
Осторожно! Если вы не указали свои критерии правильно, вы можете уничтожить всю таблицу базы данных!

### Оба параметра обязательны

Обратите внимание, что оба параметра (тип объекта и массив селекторов) являются обязательными. Если вы хотите удалить все в таблице, передайте `array()` в качестве второго параметра, и все совпадения будут удалены.

Например, чтобы удалить все объекты типа `objectName` из базы данных, выполните следующие действия.

```php
$modx->removeCollection('objectName', array());
```

### Не удаляет композиты

Когда используешь `removeCollection()` - составные связанные объекты не удаляются автоматически, в отличие от функции `remove()`.
