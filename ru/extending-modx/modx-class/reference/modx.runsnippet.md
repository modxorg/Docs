---
title: "modX.runSnippet"
translation: "extending-modx/modx-class/reference/modx.runsnippet"
description: "Обрабатывает и возвращает вывод из фрагмента PHP по имени"
---

## modX::runSnippet

Обрабатывает и возвращает вывод из фрагмента PHP по имени.

## Синтаксис

API документация: [modX::runSnippet()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::runSnippet())

``` php
string runSnippet (string $snippetName, [array $params = array ()])
```

- `$snippetName` _(string)_ Имя сниппета, который вы хотите назвать. **обязательный**
- `$params` _(array)_ Ассоциативный массив свойств, передаваемых сниппету. 


## Пример

Запустите сниппет "Welcome" с некоторыми пользовательскими параметрами:

## Примеры

``` php
$output = $modx->runSnippet('Welcome',array(
   'name' => 'John'
));
echo $output; // распечатает 'Добро пожаловать, Сергей!'
```

### Подсказка

При вызове сниппета с помощью команды `runSnippet` выполняется код фрагмента _всегда_: результаты никогда не возвращаются из кэша. Это эквивалентно запуску фрагмента кода с помощью синтаксиса `[[!uncached]]`.

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [Сниппеты](extending-modx/snippets "Сниппеты")
