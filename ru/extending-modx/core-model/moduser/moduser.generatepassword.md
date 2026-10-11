---
title: "modUser.generatePassword"
translation: "extending-modx/core-model/moduser/moduser.generatepassword"
description: "Собрать случайный пароль из настраиваемого алфавита"
---

## modUser::generatePassword

Пароль собирается из `random_bytes()`: на каждую позицию приходится один символ алфавита.

При `$length = null` длина берётся из настройки `password_generated_length` (по умолчанию `16`). Какой бы длины ни был результат, он поднимается до минимума `password_min_length` (по умолчанию `12`). Ключ `allowable_characters` в `$options` заменяет алфавит, остальные ключи массива метод не читает.

## Синтаксис

``` php
string generatePassword ([integer $length = null [, array $options = array()]])
```

- `$length` _(integer)_ Длина пароля, по умолчанию `null` — взять из настройки `password_generated_length`.
- `$options` _(array)_ Хранит `allowable_characters`, по умолчанию `array()`.

## Пример

``` php
$password = $user->generatePassword();
$pin      = $user->generatePassword(20, array('allowable_characters' => '0123456789'));
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [password_generated_length](building-sites/settings/password_generated_length)
- [password_min_length](building-sites/settings/password_min_length)
