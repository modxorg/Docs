---
title: "modX.lexicon"
translation: "extending-modx/modx-class/reference/modx.lexicon"
---

## modX::lexicon

Захватывает обработанную запись лексикона.

Это также может быть объект `modLexicon`, если лексикон был загружен. PHP поддерживает наличие объектов и методов с одинаковыми именами.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::lexicon()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::lexicon())

``` php
string lexicon (string $key, [array $params = array()])
```

## Пример

Выведите перевод записи "welcome_message" и установите в ней плейсхолдер "name".

``` php
echo $modx->lexicon('welcome_message',array('name' => 'John'));
```

В приведенном выше примере предполагается, что сообщение содержит плейсхолдер для "name", например

``` php
$_lang['welcome_message'] = 'Hello [[+name]]!  How are you today?';
```

## Смотрите также

- [Internationalization](extending-modx/internationalization "Internationalization")
