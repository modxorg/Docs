---
title: "modX.runSnippet"
translation: "extending-modx/modx-class/reference/modx.runsnippet"
---

## modX::runSnippet

Обрабатывает и возвращает вывод из фрагмента PHP по имени.

## Синтаксис

``` php
string runSnippet (string $snippetName, [array $params = array ()])
```

- `$snippetName` _(string)_ Имя сниппета, который вы хотите назвать. **обязательный**
- `$parameters` _(array)_ Пары ключевых значений параметров для передачи в сниппет, эквивалентные `&key=`value``

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::runSnippet()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::runSnippet())

``` php
string runSnippet (string $snippetName, [array $params = array ()])
```

## Пример

Запустите сниппет "Welcome" с некоторыми пользовательскими параметрами:

## Примеры

``` php
$output = $modx->runSnippet('Welcome',array(
   'name' => 'John'
));
echo $output; // распечатает 'Добро пожаловать, John!'
```

### Подсказка

При вызове сниппета с помощью команды `runSnippet` выполняется код фрагмента _всегда_: результаты никогда не возвращаются из кэша. Это эквивалентно запуску фрагмента кода с помощью синтаксиса `[[!uncached]]`.

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [Snippets](extending-modx/snippets "Snippets")
