---
title: "encode"
_old_id: "1872"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/encode"
---

## xPDOObject::encode

Encodes a value before it is stored. In xPDO 3.x only the `password` and `md5` types are accepted, and both of them produce the same MD5 hash. Any other type logs an error and returns the source unchanged. A non-string or empty `$source` is also logged and returned as passed.

To use a stronger algorithm, override this method in your own `xPDOObject` derivative class.

## Syntax

``` php
string encode (string $source, [string $type = 'md5'])
```

- `$source` — the value to encode.
- `$type` — the encoding type. Both `password` and `md5` fall through to `md5()`.

## Example

``` php
$hash = $user->encode($plainPassword, 'password');
```

## See Also

- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")