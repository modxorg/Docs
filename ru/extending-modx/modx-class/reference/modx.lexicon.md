---
title: "modX.lexicon"
translation: "extending-modx/modx-class/reference/modx.lexicon"
description: "lexicon() получает обработанную запись словаря"
---

## modX::lexicon

Получает обработанную запись словаря. 

Это также может быть объект `modLexicon`, если лексикон был загружен. PHP поддерживает наличие объектов и методов с одинаковыми именами.

## Синтаксис

``` php
string|null lexicon (string $key, [array $params = array()], [string $language = ''])
```

- `$key` _(string)_ ключ словаря. **обязателен**
- `$params` _(array)_ значения, подставляемые в плейсхолдеры записи
- `$language` _(string)_ ключ языка, иначе значение `cultureKey` будет использовано по умолчанию.

Возвращает переведённую строку. Возвращает `null`, если записи нет или служба лексикона не инициализирована. В этом случае в лог попадает ошибка "Culture not initialized; cannot use lexicon."

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

- [Интернационализация](extending-modx/internationalization "Интернационализация")
- Системная настройка [cultureKey](building-sites/settings/culturekey)
