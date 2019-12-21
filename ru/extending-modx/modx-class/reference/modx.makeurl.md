---
title: "modX.makeUrl"
translation: "extending-modx/modx-class/reference/modx.makeurl"
---

## modX::makeUrl

Создает URL-адрес, представляющий указанный ресурс.

Схема показывает, в каком формате создается URL-адрес.

- `-1`: (значение по умолчанию) URL-адрес относительно `site_url`
- `0`: смотри http
- `1`: смотри https
- `full`: URL-адрес является абсолютным, с добавлением `site_url` из конфигурации
- `abs`: URL-адрес является абсолютным, с добавлением `base_url` из конфигурации
- `http`: URL является абсолютным, принудительно по схеме http
- `https`: URL является абсолютным, принудительно по схеме https

## Синтаксис

API Doc: [modX::makeUrl()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::makeUrl())

``` php
string makeUrl (integer $id, [string $context = ''], [string|array $args = ''], [mixed $scheme = -1])
```

## Примеры

Создайте URL-адрес для ресурса с идентификатором 4.

``` php
$url = $modx->makeUrl(4);
```

Создайте URL-адрес для ресурса с идентификатором 12, но убедитесь, что он находится в HTTPS.

``` php
$url = $modx->makeUrl(12,'','','https');
```

Создайте URL-адрес ресурса с идентификатором 56, но добавьте `?hello=world` к URL-адресу.

``` php
$url = $modx->makeUrl(25, '', array('hello' => 'world'));
$url = $modx->makeUrl(25, '', 'hello=world');
```

Обратите внимание, что аргументы, доступные для этой функции, могут быть переданы тегам "[[~link]]", например

``` php
[[~123? &scheme=`full`]]
```
