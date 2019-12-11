---
title: "Разработка RESTful API"
translation: "extending-modx/developing-restful-api"
---

В MODX 2.3 появился удобный метод разработки API-интерфейсов RESTful поверх MODX. Это делается с помощью класса modRestService и производных modRestController. Он поддерживает множество интересных функций для взаимодействия с экземплярами xPDOObject. Цель этого документа - предоставить вам информацию, необходимую для создания собственного API.

## Рекомендуемое предварительное чтение

Перед созданием RESTful API полезно знать, что такое RESTful API и как это должно работать. В Интернете доступно множество ресурсов, и "[Разработка API, который вы не будете ненавидеть](https://leanpub.com/build-apis-you-wont-hate)" автора Phil Sturgeon - это отличная (электронная) книга, которую полезно почитать.

## В двух словах

1. Создайте файл `index.php`, который обрабатывает загрузку MODX, настраивает службу REST с правильной конфигурацией и передает запрос контроллеру (см. п.3).
2. Создайте файл `.htaccess`, который направляет все запросы (в поддиректории или в определенном домене) в  `index.php`  из п.1.
3. Создайте контроллеры для каждой из ваших конечных точек

## 1. Начальная загрузка API

Классы `modRestService` и `modRestController` значительно облегчат вашу работу, но вам нужно настроить некоторый базовый код для его подключения. Для этого документа мы предполагаем, что вы помещаете свой API в папку `/rest/`, при необходимости корректируйте пути.

Сначала создайте файл `rest/index.php`, который выглядит примерно так:

```php
<?php
// Загрузить MODX
require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');
// Загрузить любые классы или пакеты (модели), которые вам потребуются
$path = $modx->getOption('mypackage.core_path', null,
  $modx->getOption('core_path').'components/mypackage/') . 'model/mypackage/';
$modx->getService('mypackage', 'myPackage', $path);
// Загрузить класс modRestService и передать ему некоторую базовую конфигурацию
$rest = $modx->getService('rest', 'rest.modRestService', '', array(
   'basePath' => dirname(__FILE__) . '/Controllers/',
   'controllerClassSeparator' => '',
   'controllerClassPrefix' => 'MyController',
   'xmlRootNode' => 'response',
));
// Подготовить запрос
$rest->prepare();
// Удостовериться, что пользователю предоставлены необходимые права доступа; вернуть пользователю ошибку 401 в обратном случае
if (!$rest->checkPermissions()) {
   $rest->sendUnauthorized(true);
}
// Выполнить запрос
$rest->process();
```

После этого вам необходимо убедиться, что все запросы к вашей папке `/rest/` действительно обрабатываются сервером REST. Чтобы сделать это, добавьте следующее в ваш`.htaccess` (или эквивалент в nginx или других системах) в корне вашего сайта:

### Apache

```plain
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-s
RewriteRule ^(.*)$ rest/index.php?_rest=$1 [QSA,NC,L]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^(.*)$ rest/index.php [QSA,NC,L]
```

### NGINX

```plain
location /rest/ {
   try_files $uri @modx_rest;
}
location @modx_rest {
   rewrite ^/rest/(.*)$ /rest/index.php?_rest=$1&$args last;
}
```

Если вы сейчас откроете /rest/foobar в вашем браузере, вы должны получить ошибку, которая указывает на то, что ваш API работает, ура!

```json
{
 success: false,
 message: "Method not allowed",
 object: [ ],
 code: 405
}
```

Теперь мы можем начать с фактической разработки API!

## 2. Построение конечных точек API

Настоящий API состоит из нескольких конечных точек. Если вы хотите создать правильный RESTful API, каждая конечная точка будет соответствовать «ресурсу» (не обязательно виду из левого древа MODX!), И различные HTTP-глаголы (GET, POST, PUT и DELETE) будут использоваться для взаимодействия с конкретными объектами. Допустим, вы создаете API для управления списком дел, у вас могут быть «элементы» конечной точки со следующими действиями:

- `GET /items`: возвращает элементы в вашем списке дел
- `GET /items/15`: возвращает элемент с первичным ключом 15
- `POST /items`: создать новый элемент в списке дел
- `PUT /items/15`: обновить одно или несколько значений в вашем списке дел с помощью первичного ключа 15
- `DELETE /items/15`: удалить элемент с помощью первичного ключа 15

В интернете много спорят о том, как назвать ваши конечные точки - в данном случае мы выбрали множественные «пункты». Стоит отметить, что у нас нет конечных точек, таких как /items/create, - это уже покрыто POST для /items и является ключевым аспектом построения API RESTful.

Чтобы создать конечную точку элементов (items), вам необходимо создать контроллер элементов (items controller). Исходя из конфигурации, которую мы передали в modRestService ранее, и значений по умолчанию, каждый контроллер должен начинаться с MyController, помещаться в каталог `/rest/Controllers/`, а файл должен соответствовать имени конечной точки с суффиксом `.php`. Поэтому создайте новый файл `/rest/Controllers/Items.php` и скопируйте в него следующий код:

```php
class MyControllerItems extends modRestController {
   public $classKey = 'ToDoItem';
   public $defaultSortField = 'sortorder';
   public $defaultSortDirection = 'ASC';
}
```

Предполагая, что ToDoItem является именем допустимого производного xPDOObject, и вы загрузили его где-то с помощью $modx->addPackage() (например, в свой класс Service, который мы вызвали в index.php), теперь у вас есть полностью функциональный RESTful API для ваших объектов ToDoItem. Просто запросите /rest/items, и данный вызов должен вернуть ваши ToDoItems в симпатичном формате JSON.

Если у вас нет готового пакета, вы также можете установить для свойства classKey значение «modResource» и для defaultSortField значение «id», чтобы настроить API для всех ресурсов.

```json
{
 results: [
   {
      id: 1,
      sortorder: 1,
      name: "Заканчиваем документировать RESTful API",
      added: "2014-09-14",
      target_completion_date: "2014-10-14",
      assigned_to: ""
   },
   // ...
 ],
 total: 1
}
```

Это как волшебство! Но вы знаете, что еще лучше? Это полноценный API сейчас... И если вы вернетесь к действиям, которые мы упоминали ранее, все они будут работать "из коробки". Например, `/rest/items/1`, вернет только элемент to do с идентификатором 1. Чтобы проверить POST, PUT и DELETE, вам, вероятно, потребуется использовать что-то вроде [Postman](https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm) или curl для отправки правильных запросов, но теперь они также должны быть функциональными.

Теперь, когда у вас работает базовый API, пришло время приступить к реальной разработке и заставить ее работать так, как вы хотите.

## 3. Делая ваши конечные точки умнее

Большая часть следующей работы сводится к тому, чтобы сделать ваши конечные точки более умными и добавить их больше. Возможно, вы захотите изменить способ возврата ваших данных, отфильтровать ненужные данные и многое другое. У ModRestController есть все опции и хуки для вас, чтобы сделать это.

Каждый из запросов передается определенному методу в вашем контроллере. Это означает, что когда вы, например, запрашиваете `GET /items`, который возвращает список объектов, он обрабатывается методом `modRestController.getList()`. Вот как запросы направляются на контроллер:

- GET /items: `modRestController.get()`, который вызывает `modRestController.getList()`
- GET /items/5: `modRestController.get()`, который вызывает `modRestController.read()`
- POST /items: `modRestController.post()`
- PUT /items/5: `modRestController.put()`
- DELETE /items/5: `modRestController.delete()`

Эти методы по умолчанию делают то, что вы ожидаете от них, с некоторой разумной обработкой ошибок и - по большей части - не нуждаются в настройке. Существуют также такие методы, как `modRestController.beforePost()`, `modRestController.beforePut()`, `modRestController.beforeDelete()`, которые позволяют предотвратить действие (создание, обновление или удаление объекта соответственно) путем возврата false. Обсуждаемый объект доступен через `$this->object`, так что вы можете убедиться, что у пользователя есть разрешение на выполнение действия или другую подготовку. Существует также `modRestController.afterRead()`, `modRestController.afterPost()`, `modRestController.afterPut()` и `modRestController.afterDelete()` для выполнения действий после завершения действия. Этим методам передается массив по ссылке, который содержит объект, который должен быть возвращен.
