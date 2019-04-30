---
title: "Создание класса ресурса"
translation: "extending-modx/custom-resources"
---

Этот урок является частью серии:

- Часть I: Создание пользовательского класса ресурсов
- [Часть II: Обработка нашего поведения CRC](extending-modx/custom-resources/step-2-overriding-methods "Creating a Resource Class - Step 2")
- [Часть III: Настройка контроллеров](extending-modx/custom-resources/step-3-controllers "Creating a Resource Class - Step 3")
- [Часть IV: Настройка процессоров](extending-modx/custom-resources/step-4-processors "Creating a Resource Class - Step 4")

Мы собираемся создать пример пользовательского класса ресурсов (CRC), который выполняет очень простую задачу - он выводит информацию об авторском праве в нижней части страницы с текущей датой. Да, кое-что из этого должно быть сделано путем помещения [сниппета](extending-modx/snippets "Snippets") в ваш [шаблон](building-sites/elements/templates "Templates"), но мы хотим проиллюстрировать концепцию CRC, используя что-то очень, очень простое, так что оставайтесь с нами :)

На этой странице рассматривается часть I - создание самого класса пользовательских ресурсов. [Часть II](extending-modx/custom-resources/step-2-overriding-methods "Creating a Resource Class - Step 2") фактически реализует поведение добавления авторского права. [Часть III](extending-modx/custom-resources/step-3-controllers "Creating a Resource Class - Step 3") будет иметь дело с переопределением контроллеров, а [часть IV](extending-modx/custom-resources/step-4-processors "Creating a Resource Class - Step 4") будет связана с переопределением процессоров. Файлы, используемые в этом руководстве, для справки можно найти на GitHub: [https://github.com/modxcms/CopyrightedResource](https://github.com/modxcms/CopyrightedResource)

## Создайте свою XML-схему

Во-первых, мы собираемся создать пакет xPDO, используя схему (если вы не знаете, как это сделать, просмотрите страницу, посвященную [разработке дополнения в MODX Revolution](extending-modx/tutorials/developing-an-extra "Developing an Extra in MODX Revolution"), и/или [учебник по определению схемы xPDO](extending-modx/xpdo/custom-models/defining-a-schema "Defining a Schema")).

Если вы планируете создать версию этого кода в Git, ваши пути могут отличаться, но в конечном итоге вы хотите, чтобы ваши файлы оказались в каталоге `core/components/your_component/`. Поэтому для данного руководства наш пакет называется "copyrightedresource", поэтому мы создадим файл схемы `core/components/copyrightedresource/model/schema/copyrightedresource.mysql.schema.xml`:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="copyrightedresource" version="1.0" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM">
   <object class="CopyrightedResource" extends="modResource" />
</model>
```

Обратите внимание, что атрибут «package» в XML должен отражать точное имя нашего пакета: «copyrightedresource».

## Генерация ваших файлов классов

Следующим шагом является создание карт и классов для модели. Вы можете сделать это, используя свой собственный скрипт. Вам просто нужно обратиться к документации по [генерации кода модели](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code") и функции [parseSchema()](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.parseschema "xPDOGenerator.parseSchema") в xPDO. Мы предоставили образец сценария ниже. Это модифицированная версия сценария, используемая при [обратном проектировании классов xPDO](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer "Reverse Engineer xPDO Classes from Existing Database Table") из существующей таблицы базы данных.

Создайте скрипт в корневом каталоге вашего сайта MODX, затем запустите его, перейдя на эту страницу в браузере.

Обратитесь к сценарию по адресу [parse_schema.php](https://github.com/craftsmancoding/modx_utils/blob/master/parse_schema.php) и настройте его по своему усмотрению.

После запуска этого сценария в вашем каталоге `core/components/copyrightedresource/model/` должно быть создано несколько файлов PHP. Смотрите изображение ниже.

![](/download/attachments/36634952/copyrightedresource_class_files.png?version=1&modificationDate=1360972022000)

Файл `copyrightedresource.class.php` должен выглядеть следующим образом:

```php
<?php
class CopyrightedResource extends modResource {
}
```

Если файлы классов не были созданы, образец сценария должен помочь вам определить ошибки (обычно проблема в разрешениях).

## Настройка вашего класса PHP

Как только у нас будут созданы базовые классы PHP, нам нужно их настроить.

**Будьте осторожны!**
После того, как вы сгенерировали классы PHP, не запускайте скрипт синтаксического анализа заново! Это уничтожит изменения, которые вы собираетесь внести.

Теперь нам нужно вызвать class_key ресурса и убедиться, что он отображается в контекстном меню "Создать ресурс" (которое мы настроим позже). Отредактируйте файл core/components/copyrightedresource/model/copyrightedresource/copyrightedresource.class.php как показано ниже:

```php
<?php
class CopyrightedResource extends modResource {
   public $showInContextMenu = true;
   function __construct(xPDO & $xpdo) {
       parent :: __construct($xpdo);
       $this->set('class_key','CopyrightedResource');
   }
}
```

Это устанавливает class_key в «CopyrightedResource», который является нашим классом, и гарантирует, что наш класс ресурса обнаруживается в контекстном меню левого дерева. Вот как мы управляем значением, установленным в столбце modx_site_content "class_key".

Вы не должны **никогда** добавлять поля в таблицу modResource (да, некоторые дополнения делали это, но это не совсем правильно). Вместо этого создайте отдельную связанную таблицу или используйте поле новых свойств Revolution версии 2.2.1 и выше для хранения дополнительных данных.

### Знакомство с классом интерфейса modResourceInterface

Для тех из вас, кто хочет писать код ответственно, будет очень хорошей идеей взглянуть на родительский класс здесь, так что загляните в файл `core/model/modx/modresource.class.php`.

**Ответственный код**
Каждый раз, когда вы расширяете класс PHP, вам нужно смотреть на родительский класс, иначе вы не будете знать, что именно вы реализуете!

Если вы заглянете в файл класса modResource, то увидите вверху интерфейс PHP, который определяет, какие методы **должны** быть определены для работы CRC:

```php
interface modResourceInterface {
   public static function getControllerPath(xPDO &$modx);
   public function getContextMenuText();
   public function getResourceTypeName();
}
```

Теперь мы подробно рассмотрим каждый из этих методов и то, как они реализуют наш CRC.

### Создайте пространство имен

Прежде чем двигаться дальше, создайте [Пространство имен](extending-modx/namespaces "Namespaces") для вашего компонента. Для ясности имя должно совпадать с названием вашего пакета: «copyrightedresource».

Войдите в диспетчер MODX и перейдите в **Система -> Пространства имен**. (значок шестеренки справа вверху)

```php
Namespace: copyrightedresource
Core Path: {core_path}components/copyrightedresource/
Assets Path: {assets_path}components/copyrightedresource/
```

![](/download/attachments/36634952/create_namespace.png?version=1&modificationDate=1360974139000)

Обратите внимание на специальные плейсхолдеры, которые вы можете использовать для ссылки на ваши каталоги.

### Добавление метода getControllerPath

После того как вы добавили пространство имен, мы добавим метод getControllerPath в наш класс, добавив его в ваш `copyrightedresource.class.php`:

```php
public static function getControllerPath(xPDO &$modx) {
   return $modx->getOption('copyrightedresource.core_path',null,$modx->getOption('core_path').'components/copyrightedresource/').'controllers/';
}
```

Этот метод говорит MODX искать контроллеры нашего менеджера в нашем пользовательском каталоге, переопределяя стандартные контроллеры по умолчанию. Сначала строка проверяет пользовательский параметр системы, который показывает, где находится наш путь к каталогу ядра CRC (мы добавляем этот параметр, чтобы облегчить нашу жизнь при разработке кода и позволить нам сохранить его в нестандартном месте). Если настройка системы не была установлена, код будет искать наш путь CRC в 'core/components/copyrightedresource/'. Система ищет код в поддиректории "controllers/".

Отлично! MODX теперь будет искать наши контроллеры в этом каталоге. Мы приступим к их созданию на шаге 2 урока.

### Добавление метода getContextMenuText

Пройдем дальше и добавим этот метод в свой класс:

```php
public function getContextMenuText() {
 $this->xpdo->lexicon->load('copyrightedresource:default');
 return array(
   'text_create' => $this->xpdo->lexicon('copyrightedresource'),
   'text_create_here' => $this->xpdo->lexicon('copyrightedresource_create_here'),
 );
}
```

Это возвращает две переведенные строки, которые MODX вставит в контекстное меню «Создать» при щелчке правой кнопкой мыши по узлу на вкладке «Ресурс» в левом дереве.

Вам нужно будет создать папки и файл лексикона в core/components/copyrightedresource/lexicon/en/default.inc.php со строками языка или, проще, загрузить папку core/components/copyrightedresource/lexicon/ из [файлов github](https://github.com/modxcms/CopyrightedResource).

Просто для пояснения, вам необязательно *нужно* использовать здесь лексиконы MODX. Вы можете вернуть текст так:

```php
public function getContextMenuText() {
 return array(
   'text_create' => 'Страница, защищенная авторским правом',
   'text_create_here' => 'Создать страницу, защищенную авторским правом, здесь',
 );
}
```

И это будет работать нормально. Но MODX позволяет вам загружать тему лексикона, чтобы вы могли переводить строки для ваших пользователей по всему миру.

### Добавление метода getResourceTypeName

Этот последний метод сообщает MODX, как переводится «имя» вашего CRC. Мы, вероятно, не хотим называть его «CopyrightedResource», поэтому мы собираемся использовать этот метод:

```php
public function getResourceTypeName() {
 $this->xpdo->lexicon->load('copyrightedresource:default');
 return $this->xpdo->lexicon('copyrightedresource');
}
```

Опять же, можно просто вернуть строку:

```php
public function getResourceTypeName() {
 return 'Страница, защищенная авторским правом';
}
```

Это говорит MODX называть ее «Защищенной авторским правом страницей», а не именем класса, когда имеешь дело с ней в менеджере.

## Добавление класса в пакеты расширения

Чтобы правильно загрузить CRC, вам необходимо добавить его в пакеты расширений. Зачем? Ну, MODX должен загружать ваш CRC при загрузке, чтобы у него была «библиотека» всех загруженных классов ресурсов. MODX версии 2.2 предоставляет вам вспомогательный метод для добавления вашего пакета в набор данных пакетов расширений:

```php
$modx->addExtensionPackage('copyrightedresource','/path/to/copyrightedresource/model/');
```

Запустите этот код один раз, и MODX автоматически добавит его в пакеты расширений. Вот еще один пример сценария, который поможет вам сделать это:

```php
<?php
/**
* Используйте этот скрипт для добавления вашего пакета расширения в 'радар' MODX.
* Это должно быть сделано только один раз.
* Обратите внимание, что мы должны создать экземпляр MODX: xPDO недостаточно
* потому что мы запускаем функции, которые существуют только в MODX, а не в
* базовом фреймворке xPDO.
*
* ИСПОЛЬЗОВАНИЕ:
* 1. Скопируйте этот файл в docroot (корневую веб директорию) вашей установки MODX.
* 2. Запустите файл, посетив его в браузере, например, http://yoursite.com/add_extension.php
*/
//------------------------------------------------------------------------------
//! КОНФИГУРАЦИЯ
//------------------------------------------------------------------------------
// Короткое название вашего пакета:
$package_name = 'copyrightedresource';
//------------------------------------------------------------------------------
// НЕ МЕНЯЙТЕ НИЧЕГО НИЖЕ ЭТОЙ ЛИНИИ
//------------------------------------------------------------------------------
define('MODX_API_MODE', true);
require_once('index.php');
if (!defined('MODX_CORE_PATH')) {
   print '<p>MODX_CORE_PATH не определен! Вы поместили этот скрипт в корневой каталог вашей установки MODX?</p>';
   exit;
}
$modx= new modX();
$modx->initialize('mgr');
$modx->setLogLevel(xPDO::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
$modx->addExtensionPackage($package_name,"[[++core_path]]components/$package_name/model/");
print 'Success!';
?>
```

Чтобы проверить, правильно ли работает этот код выше, войдите в менеджер MODX и найдите в системных настройках ключ "extension_packages". Вы должны увидеть что-то вроде этого:

```php
[{"copyrightedresource":{"path":"[[++core_path]]components/copyrightedresource/model/"}}]
```

Обратите внимание, что в этом пути вы можете использовать плейсхолдер ++core_path: это позволяет быть уверенным в том, что все будет в порядке, если вы когда-нибудь перенесете свой сайт MODX на другой сервер.

Также есть метод removeExtensionPackage для удаления пакета из MODX.

addExtensionPackage и removeExtensionPackage - очень полезные методы для добавления в резолвер, когда вы создаете дополнение для своего CRC. Они могут выполняться при установке и удалении дополнения.

## Заключение

Теперь, если вы перезагрузите страницу и щелкните правой кнопкой мыши на ресурсе в древе ресурсов, а затем перейдите к «Создать», вы должны увидеть это:

![](/download/attachments/36634952/context-menu.png?version=1&modificationDate=1322512993000)

Возможно, вам придется очистить кэш пару раз.

Великолепно! Теперь у нас есть загруженный пользовательский класс ресурсов, и мы готовы приступить к работе. [Перейдите к шагу 2](extending-modx/custom-resources/step-2-overriding-methods "Creating a Resource Class - Step 2")!
