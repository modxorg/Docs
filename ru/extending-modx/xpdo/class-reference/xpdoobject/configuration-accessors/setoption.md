---
title: "setOption"
translation: "extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/setoption"
---

## xPDOObject::setOption()

Устанавливает значение параметра для этого экземпляра `xPDOObject`.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::setOption()>

```php
void setOption(
    string $key,
    mixed $value
)
```

## Пример

```php
$object->setOption(xPDO::OPT_HYDRATE_FIELDS,true);
```

Использование **setOption** не приводит к постоянному обновлению параметра, поскольку параметры xPDO не сохраняются, а загружаются при каждом запросе.
