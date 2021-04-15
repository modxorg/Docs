---
title: "modX.lexicon"
translation: "extending-modx/modx-class/reference/modx.lexicon"
description: "lexicon() получает обработанную запись словаря"
---

## modX::lexicon

Получает обработанную запись словаря. 

Это также может быть объект `modLexicon`, если лексикон был загружен. PHP поддерживает наличие объектов и методов с одинаковыми именами.

## Синтаксис

API Doc: [modX::lexicon()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::lexicon())

``` php
string lexicon (string $key, [array $params = array()], [$language = ''])
```

- `$key` _(string)_ ключ словаря. **обязателен**
- `$params` _(array)_ массив дополнительных параметров для передачи значений внутрь записи, смотрите второй пример ниже.
- `$language` _(string)_ ключ языка, иначе значение `cultureKey` будет использовано по умолчанию.

## Пример

Выведите перевод записи "welcome_message" и установите в ней плейсхолдер "name".

``` php
echo $modx->lexicon('welcome_message', array('name' => 'Иван'), 'ru');
```

В приведенном выше примере предполагается, что сообщение содержит плейсхолдер для "name", например

``` php
$_lang['welcome_message'] = 'Привет [[+name]]!  Как дела?';
```

## Смотрите также

- [Internationalization](extending-modx/internationalization "Internationalization")
- [cultureKey](building-sites/settings/culturekey)