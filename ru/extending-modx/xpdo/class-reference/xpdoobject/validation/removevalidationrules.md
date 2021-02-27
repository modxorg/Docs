---
title: "removeValidationRules"
translation: "extending-modx/xpdo/class-reference/xpdoobject/validation/removevalidationrules"
---

## xPDOObject::removeValidationRules()

Удаляет одно или несколько правил проверки из этого экземпляра.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#removeValidationRules>

```php
void removeValidationRules ([string $field = null], [array $rules = array()])
```

## Примеры

Удалите все правила из этого объекта Book.

```php
$book = $xpdo->getObject('Book',1);
$book->removeValidationRules();
```
