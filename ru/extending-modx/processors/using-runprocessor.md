---
title: "Использование runProcessor"
translation: "extending-modx/processors/using-runprocessor"
---

Использование runProcessor, описанное здесь, работает только в Revolution 2.0.8 и более поздних версиях. Пользователи до этого должны будут использовать устаревшие [executeProcessor](extending-modx/modx-class/reference/modx.executeprocessor "modX.executeProcessor") методы.

## Использование runProcessor

У MODX есть специальный метод, который позволяет вам запускать процессоры прямо из любого файла PHP, такого как [Плагин](extending-modx/plugins "Плагины"), [Сниппет](extending-modx/snippets "Сниппет") или внешне. Это можно сделать с помощью следующего синтаксиса:

> $response = $modx->runProcessor('action/path/to/processor',$arrayOfProperties,$otherOptions);

Затем он выполнит указанный процессор и вернет объект modProcessorResponse, который содержит ответ от процессора. Затем можно проверить, был ли процесс успешным или неудачным. Первый параметр или действие - это путь к процессору (без расширения файла) из папки `core/model/modx/processors/` (Этот каталог также может быть переопределен в массиве 3-х параметров с помощью параметра `processors_path`).

Например, этот код создает новый Чанк:

``` php
$response = $modx->runProcessor('element/chunk/create',array(
   'name' => 'NewChunk',
   'description' => 'Тестовый чанк создан с runProcessor.',
   'snippet' => '<h3>Chunkify!</h3>',
));
if ($response->isError()) {
    return $response->getMessage();
}
$chunkArray = $response->getObject();
return 'The chunk "'.$chunkArray['name'].' was created with ID '.$chunkArray['id'];
```

Этот блок кода запускает процессор `element/chunk/create`, проверяет, был ли он успешным (с помощью `isError()`), и, если так, возвращает сообщение с указанием идентификатора и имени нового чанка. Обратите внимание, что getObject возвращает **массив** объекта, который возвращается процессором. `getMessage` вернет любое сообщение, отправленное обратно процессором.

Вы также можете создать целого пользователя, включая Расширенные поля, групповые назначения, сгенерированный пароль и уведомление по электронной почте.

``` php
$groups = array();
$groups['Group1']['usergroup'] = '7'; // ID of group
$groups['Group1']['role'] = '1'; // ID of role
$groups['Group2']['usergroup'] = '8';
$groups['Group2']['role'] = '1';
$fields = array();
$fields['active'] = true;
$fields['passwordgenmethod'] = 'g';
$fields['passwordnotifymethod'] = 'e';
$fields['email'] = $email;
$fields['username'] = $username;
$fields['fullname'] = $fullname;
$fields['extended']['container']['name'] = $value;
$fields['groups'] = $groups;
$response = $modx->runProcessor('security/user/create', $fields);
```
