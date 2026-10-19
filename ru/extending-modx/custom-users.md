---
title: "Расширения для пользователей"
description: "Руководство по расширению класса modUser в MODX Revolution: дополнительные данные пользователей, схема, генерация модели и использование."
translation: "extending-modx/custom-users"
---

## Целевая аудитория

Для разработчиков, которым нужны дополнительные данные пользователей MODX и дополнительная функциональность связанных классов. Шаги ниже носят технический характер и опираются на xPDO: необходимо знакомство с объектами и методами xPDO (например, [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")).

Быстрый выход — отдельная таблица с внешним ключом на `modx_users`. Эта статья описывает более глубокую интеграцию: расширение базового класса `modUser`.

### Смотрите также

- [Обратный инжиниринг классов xPDO из существующей таблицы базы данных](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer "Reverse Engineer xPDO Classes from Existing Database Table")
- [Дополнительные примеры файлов схемы XML xPDO](extending-modx/xpdo/custom-models/defining-a-schema/more-examples "More Examples of xPDO XML Schema Files")
- [Генерация кода модели](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code")

## Правила

Расширение `modUser` **не** означает записи в таблицу `modx_users`: вы добавляете отдельную связанную таблицу и связываете её с исходной внешним ключом. Ни в коем случае не заменяйте класс `modUser` целиком — стройтесь на нём.

Единственный след расширенного пользователя — его `class_key`: он меняется с `MODX\Revolution\modUser` (значение по умолчанию в 3.x; `modUser` в 2.x) на имя вашего расширенного класса.

Основные правила расширения `modUser`:

1. Используйте расширение только для доступа к собственным данным. Не взаимодействуйте с пользовательскими объектами, которые не расширены.
2. Не дублируйте уже реализованную функциональность `modUser` — используйте встроенную работу с пользователями.
3. Изучите `modUser` и `modPrincipal` до начала разработки. Некоторые их методы (например, работа с атрибутами) действуют в разрезе контекста или ресурса.
4. Работайте с атрибутами через `modPrincipal::loadAttributes()` / `getAttributes()`. Они управляются системной настройкой `principal_targets`.
5. Обращайтесь к методам `modUser` через предложения (suggestions) `modUser`.

## Шаги к расширению modUser

### 1. Создание схемы расширенного пользователя и генерация модели

Создайте схему расширенного пользователя, которая расширяет modUser. У «основного» класса, который расширяет modUser, нет агрегатного отношения вверх.

Префикс вспомогательной таблицы задаётся в узле `<model>`.

#### Простой пример

Добавим к пользовательским данным один дополнительный атрибут (например, _facebook\_url_). В базе данных это означает отдельную таблицу с двумя столбцами: внешний ключ на таблицу **modx\_users** и сам новый атрибут:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="extendeduser" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" tablePrefix="ext_">
       <!-- расширяем класс modUser -->
       <object class="extUser" extends="modUser">
               <composite alias="Data" local="id" class="Userdata" foreign="userdata_id" cardinality="one" owner="local" />
       </object>
       <object class="Userdata" table="data" extends="xPDOSimpleObject">
               <field key="userdata_id" dbtype="int" precision="11" phptype="integer" null="false" attributes="unsigned"/>
               <field key="facebook_url" dbtype="varchar" precision="100" phptype="string" null="true" />
               <index alias="userdata_id" name="userdata_id" primary="false" unique="true" type="BTREE">
                   <column key="userdata_id" length="" collation="A" null="false" />
               </index>
               <aggregate alias="extUser" local="userdata_id" foreign="id" cardinality="one" owner="foreign" />
       </object>
</model>
```

Расширение modUser происходит внутри одного узла _object_.

#### Более сложный пример

Устарело: `index="unique"` — индексы следует объявлять в отдельном узле, как в примере выше:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="extendeduser" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" tablePrefix="ext_">
   <!-- наследуем класс пользователя MODX и расширяем его -->
   <object class="extUser" extends="modUser">
       <composite alias="Phones" local="id" foreign="user" cardinality="many" owner="local" />
       <composite alias="Table2" local="id" foreign="user" cardinality="many" owner="local" />
   </object>
   <!-- добавляем номера телефона пользователя -->
   <object table="phone_numbers" extends="xPDOSimpleObject">
       <field key="user" dbtype="int" phptype="integer" null="false" default="0" index="index" />
       <field key="areacode" dbtype="varchar" precision="3" phptype="string" null="false" default="" />
       <field key="number" dbtype="varchar" precision="7" phptype="string" null="false" default="" />
       <aggregate alias="extUser" local="user" foreign="id" cardinality="one" owner="foreign" />
   </object>
   <!-- расширяем пользователя -->
   <object table="table2" extends="xPDOSimpleObject">
       <field key="user" dbtype="int" phptype="integer" null="false" default="0" index="index" />
       <field key="myspaceurl" dbtype="varchar" precision="255" phptype="string" null="false" />
       <aggregate alias="extUser" local="user" foreign="id" cardinality="one" owner="foreign" />
   </object>
</model>
```

Проанализируйте схему и создайте связанную с ней карту модели. Этот процесс выходит за рамки статьи: см. «[Использование пользовательских таблиц базы данных в ваших сторонних компонентах](extending-modx/tutorials/using-custom-database-tables "Using Custom Database Tables in your 3rd Party Components")».

### 2. Редактирование класса расширенного пользователя

Укажите в `_modx_users` в поле `class_key` имя вашего расширенного класса (например, `extUser`). По умолчанию там `MODX\Revolution\modUser`.

Отредактируйте сгенерированный файл `extuser.class.php` (он находится в каталоге `model/mysql/`):

```php
<?php
/**
* @package extendeduser
* @subpackage user.mysql
*/
use MODX\Revolution\modUser;
class extUser extends modUser {
   function __construct(xPDO $xpdo) {
       parent::__construct($xpdo);
       $this->set('class_key','extUser');
   }
}
?>
```

### 3. Создание (или правка) extension\_packages в системных настройках

В системных настройках (меню «Система») найдите [extension\_packages](building-sites/settings/extension_packages "extension_packages").

**Если ключ уже существует**, добавьте в JSON-массив:

```php
,{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}}
```

**Если ключ не существует**, создайте новую системную настройку:

- Название: `extension_packages`
- Ключ: `extension_packages`
- Тип поля: Текстовое поле
- Значение:

```php
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}}]
```

### 4. Создание класса для доступа к расширенному пользователю

Для работы с расширенными данными создайте класс доступа к ним. Обычно это делается в сниппете, плагине или пользовательской странице менеджера (CMP).

#### Пример для сниппета

Вот как можно работать с расширенными данными в сниппете:

```php
$modx->addPackage('extendeduser', MODX_CORE_PATH . 'components/extendeduser/model/', 'ext_');
$user = $modx->getObject('extUser', 123); // где 123 - это идентификатор (ID) пользователя
$data = $user->getOne('Data'); // используйте псевдоним из схемы
// toArray распечатает все дополнительные данные, например, facebook_url
return print_r($data->toArray(), true);
```

#### Более сложный пример класса

```php
<?php
/**
*  File        sample.class.php (требует MODX Revolution 2.x)
* Created on    Август 18, 2010
* Project        shawn_wilkerson
* @package     extendedUser
* @version    1.0
* @category    Расширение пользователя
* @author        W. Shawn Wilkerson
* @link        http://www.shawnWilkerson.com
* @copyright  Авторское право (c) 2010, W. Shawn Wilkerson.  Все права защищены.
* @license      GPL
*
*/
if (!class_exists('Extendeduser')) {
   class Extendeduser
   {
       function __construct(modX $modx, array $config= array ()) {
           /* Импортируем modx */
           $this->modx= $modx;
           /* Создадим среду */
           $this->extPath= $modx->getOption('core_path',null, MODX_CORE_PATH).'components/extendeduser/';
           $this->modx->addPackage('extendeduser', $this->extPath .'model/', 'ut_');
           $this->_config= array_merge(array (
               'userID' => $this->modx->user->get('id'),
           ), $config);
           /* Определим пользователя */
           $this->userObj = $this->setUser($this->_config['userID']);
           $this->userID = $this->userObj->get('id');
       }
       function __destruct() {
           unset ($this->extPath, $this->userObj, $this->userID, $this->_config);
       }
       /**
        * Возвращает объект с типом Phone.
        */
       public function getPhoneObj() {
           $this->userObj->getOne('Phones');
           return $this->userObj->Phones;
       }
       /**
        * Возвращает экземпляр объекта modUser, по умолчанию - текущий пользователь.
        * @param $userID
        */
       public function getUserObj($userID) {
           return $this->modx->getObject('modUser', $userID);
       }
       /**
        * Устанавливает пользователя.
        * @param int $userID
        */
       public function setUser($userID){
           return $this->getUserObj($userID);
       }
   }
}
```

#### 5.) Доступ к расширенному классу пользователя

В нашем примере расширенный пользователь нужен по всему сайту, поэтому мы загружаем его как сервис:

```php
<?php
$x = $modx->getService('extendeduser','Extendeduser',$modx->getOption('core_path',null, MODX_CORE_PATH).'components/extendeduser/',$scriptProperties);
if (!($x instanceof Extendeduser)) {
   $modx->log(modX::LOG_LEVEL_ERROR,'[Extendeduser] Could not load Extendeduser class.');
   $modx->event->output(true);
}
return;
```

## Стоит отметить

1. Любой ранее существовавший пользователь по-прежнему имеет `modUser` в качестве `class_key`, поэтому он **не** будет расширен и не создаст объект типа `extUser`, пока вы не измените это значение.
2. `modUser::setSudo()` — предпочтительный способ выставить привилегированный флаг `sudo`, поскольку массовое присваивание `sudo` блокируется в `modUser::set()`.
3. `modUser::save()` переопределён: он вызывает события MODX (например, `OnUserBeforeSave`) и проставляет `createdon` для новых пользователей. Имейте в виду, что сохранение расширенного пользователя приведёт к срабатыванию этих событий.
4. Дважды проверьте файл `modx.mysql.schema.xml`, чтобы убедиться, что не используете уже занятые имена классов или псевдонимов: иначе ваши расширения перекроют определения `modUser` по умолчанию (включая атрибуты с псевдонимом `Profile`).
5. У `extUser` **не** будет таблицы, созданной в базе данных, но прикреплённые отношения будут.
6. Таблица(ы) расширенных классов **должна(ы)** находиться в той же базе данных, что и обычная таблица `_modx\_users`.
7. Признаки ошибки в шаге 3 (путь `extension_packages`):
   - Пользователь с `class_key`, равным `extUser`, вернёт ошибку при входе: «Пользователь не может быть найден…». Если это администратор, обратитесь напрямую к базе данных, верните `class_key` к `MODX\Revolution\modUser`, войдите в систему и только после этого исправьте путь.
   - Сниппеты, прикреплённые к классу, могут работать с перебоями или не работать вовсе.
8. Чтобы посчитать свои данные (например, сколько телефонных номеров у этого человека), используйте любой из вариантов ниже (можно добавить любые критерии):

```php
    $this->modx->getCount('extPhones', array('user' => $this->userID));
    $this->modx->getCount('extPhones');
```

Несколько расширенных систем modUser могут работать параллельно: повторите процесс для каждого расширения, меняя `class_key` на соответствующий расширенный класс. Их можно даже объединить — например, расширив rpx-расширение в гибридную систему.

## Предлагаемые дополнительные соображения

- Файлы модели можно редактировать, добавляя методы и описания (см. модели MODX/xPDO).
- Автоматизируйте обработку при входе пользователя: см. modActiveDirectory от splittingred:
    - Плагин: `plugin.activedirectory.php`
    - События: `onauthentication.php`, `onusernotfound.php`

## Доступные расширенные классы modUser

[modActiveDirectory](http://github.com/splittingred/modActiveDirectory) — приложение, обеспечивающее взаимодействие с контроллером домена Microsoft.

[Расширение rpx](http://github.com/opengeek/engaged) позволяет входить через Facebook и другие социальные сети.

## Изменение class\_key

Всякий раз, когда вы меняете `class_key` встроенного объекта MODX, учитывайте, как это меняет поведение объекта. `class_key` определяет, какие агрегаты и композиты доступны объекту. Например, если у пользователя `class_key` равен `extUser`, объект по-прежнему можно получить через родительский класс:

```php
// оба варианта работают, когда class_key равен "extUser":
$User = $modx->getObject('modUser', 123);
$User = $modx->getObject('extUser', 123);
```

Однако агрегаты и составные отношения зависят от _сохранённого значения_ `class_key`.

```php
$Data = $modx->newObject('Userdata');
$Data->set('facebook_url',$url); // и т.д.
$User->addOne($Data);
$User->save(); // это не сохранит связанные данные, если у class_key нет нужных отношений!
$User->set('class_key', 'extUser');
$User->save(); // теперь мы можем установить связанные данные
$User->addOne($Data);
$User->save(); // а теперь мы можем сохранить связанные данные
```