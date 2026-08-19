---
title: "Шаг 4 - Процессоры"
translation: "extending-modx/custom-resources/step-4-processors"
---

Этот урок является частью серии:

- [Часть I: Создание пользовательского класса ресурсов](extending-modx/custom-resources "Creating a Resource Class")
- [Часть II: Обработка нашего поведения CRC](extending-modx/custom-resources/step-2-overriding-methods "Creating a Resource Class - Step 2")
- [Часть III: Настройка контроллеров](extending-modx/custom-resources/step-3-controllers "Creating a Resource Class - Step 3")
- Часть IV: Настройка процессоров

Это небольшой бонусный материал, помогающий определить некоторые вещи, что можно сделать, расширяя стандартные процессоры.

## Имена классов в MODX 3.x

При создании или обновлении CRC метод `MODX\Revolution\Processors\Resource\Create::getInstance()` ищет класс `{class_key}CreateProcessor`. Процессор обновления ищет `{class_key}UpdateProcessor`. Эти классы должны расширять основные процессоры ресурсов.

Файлы 2.x `core/model/modx/processors/resource/create.class.php` и `update.class.php` удалены. Не подключайте их через `require_once`.

| Старый класс | Новый класс |
| --- | --- |
| `modResourceCreateProcessor` | `\MODX\Revolution\Processors\Resource\Create` |
| `modResourceUpdateProcessor` | `\MODX\Revolution\Processors\Resource\Update` |

`core/include/deprecated.php` даёт псевдонимы старых имён до 3.3. Для кода только под 3.0+ расширяйте классы с пространствами имён:

```php
use MODX\Revolution\Processors\Resource\Create;
use MODX\Revolution\Processors\Resource\Update;

class CopyrightedResourceCreateProcessor extends Create
{
}

class CopyrightedResourceUpdateProcessor extends Update
{
}
```

См. [процессоры в заметках об обновлении до 3.0](getting-started/upgrading-to-3.0/processors).

## Расширение процессоров для нашего CRC

Расширить процессоры для нашего CopyrightedResource довольно просто. В MODX 2.x загрузите ваш файл **copyrightedresource.class.php**, содержащий ваш основной класс, и в верхней части поместите следующий код:

```php
require_once MODX_CORE_PATH.'model/modx/modprocessor.class.php';
require_once MODX_CORE_PATH.'model/modx/processors/resource/create.class.php';
require_once MODX_CORE_PATH.'model/modx/processors/resource/update.class.php';
```

Это говорит MODX загружать некоторые базовые классы, которые нам понадобятся. Поскольку MODX видит наш файл основного класса, и этот класс будет включен при загрузке MODX, нам просто может потребоваться больше файлов оттуда. Внизу того же файла, после вашего класса CopyrightedResource, поместите следующий код:

```php
class CopyrightedResourceCreateProcessor extends modResourceCreateProcessor {
}
class CopyrightedResourceUpdateProcessor extends modResourceUpdateProcessor {
}
```

В 3.x эти строки `require_once` не нужны. Расширяйте `\MODX\Revolution\Processors\Resource\Create` и `Update`, как показано выше.

Теперь мы переопределили процессоры для нашего класса; MODX будет автоматически использовать эти классы в качестве класса процессора при создании или обновлении нашего CRC. Затем мы можем переопределить методы, чтобы обеспечить пользовательскую функциональность для нашего класса CopyrightedResource. Например, вот заглушка для нашего класса CopyrightedResource и процессора обновлений. Она показывает некоторые методы, которые вы можете переопределить:

```php
class CopyrightedResourceUpdateProcessor extends modResourceUpdateProcessor {
   /**
    * Выполнить любую обработку до того, как поля установлены
    * @return boolean
    */
   public function beforeSet() {
       $beforeSet = parent::beforeSet();
       /* включить всегда опцию кэширования принудительно для всех страниц нашего  CRC */
       $this->setProperty('cacheable',true);
       return $beforeSet;
   }
   /**
    * Выполнить любую обработку до сохранения ресурса, но после установки полей.
    * @return boolean
    */
   public function beforeSave() {
       $beforeSave = parent::beforeSave();
       if ($this->object->get('longtitle') == 'Send an Error') {
           $this->addFieldError('longtitle','Specify a different longtitle!');
       }
       /* принудительно сделать объекты CopyrightedResource не-директориями */
       $this->object->set('isfolder',false);
       return $beforeSave;
   }
   /**
    * Выполнить любой код после обработки
    * @return boolean
    */
   public function afterSave() {
       $afterSave = parent::afterSave();
       $this->modx->log(modX::LOG_LEVEL_DEBUG,'Saving a Copyrighted Page!');
       return $afterSave;
   }
}
```

Это просто тривиальные примеры, но, надеюсь, вы поняли идею. Если вы обращали пристальное внимание на наши примеры на этих страницах, вы, возможно, заметили, что мы установили некоторые свойства в классе **CopyrightedResource** (class_key), а другие - в **CopyrightedResourceUpdateProcessor** (cacheable, isfolder). Это может сбить вас с толку относительно того, где вы должны изменять поведение - в дочернем классе ресурса? В классе контроллера? Или быть может в процессоре?

Если атрибут является чем-то, что может управляться графическим интерфейсом, вам придется выполнить некоторые настройки в процессорах.

## Дополнительные атрибуты

Есть некоторые атрибуты, которых нет в таблице **modx_site_content**. См. комментарии в файле **modresource.class.php** для получения списка атрибутов. Вы можете установить их в своем классе ресурсов с помощью метода set, например:

```php
$this->set('show_in_tree',false);
$this->set('hide_children_in_tree',true);
```

Вы можете настроить значок, используемый в ресурсе MODX, создав системный параметр, названный в виде вашего пользовательского класса ресурсов: `mgr_tree_icon_ + strtolower($class_key)`. Установите его значение в используемом классе CSS.

## Заключение

И это всё! Очевидно, что с CRC существует множество возможностей. Вы действительно можете сходить с ума при настройке, которую вы можете применять к ним, а также по их логике обработки и рендеринга. Развлекайтесь!
