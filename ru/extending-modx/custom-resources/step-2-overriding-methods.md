---
title: Шаг 2 - переопределение методов
_old_id: '71'
_old_uri: 2.x/developing-in-modx/advanced-development/custom-resource-classes/creating-a-resource-class/creating-a-resource-class-step-2
---

Этот урок является частью серии:

- [Часть I: Создание пользовательского класса ресурсов](extending-modx/custom-resources "Creating a Resource Class")
- Часть II: Обработка нашего поведения CRC
- [Часть III: Настройка контроллеров](extending-modx/custom-resources/step-3-controllers "Creating a Resource Class - Step 3")
- [Часть IV: Настройка процессоров](extending-modx/custom-resources/step-4-processors "Creating a Resource Class - Step 4")

Теперь, когда у нас есть наш класс, мы хотим добавить к нему дату нашего авторского права. Вперед:

## Переопределение getContent

Давайте добавим этот метод в ваш класс защищенных авторскими правами `авторских прав: resource.class.php`:

```php
public function getContent(array $options = array()) {
  $content = parent::getContent($options);
  $year = date('Y');
  $content .= '<div class="copyright">© '.$year.'. Все права защищены.</div>';
  return $content;
}
```

Это автоматически добавит авторское право в конец каждого содержимого для ресурса - не конец [шаблона](building-sites/elements/templates "Templates"), а конец содержимого плейсхолдера [[*content]].

## Следующие шаги

На этом наши дополнения к нашему классу `CopyrightedResource` заканчиваются. Мы могли бы сделать гораздо больше, переопределив другие функции из родительского класса `modResource`, но это выходит за рамки данного руководства.

Вот список некоторых функций, которые вы можете переопределить (мы включим функции, которые мы уже переопределили). Смотрите файл /core/model/modx/modresource.class.php родительского класса.

- **getContextMenuText** отображает текст для щелчка правой кнопкой мыши по дереву
- **getResourceTypeName** – простое имя типа ресурса
- **prepareTreeNode** позволяет манипулировать узлом древа для ресурса перед его отправкой
- **listGroups** возвращает сортируемую, ограниченную коллекцию (и общее количество) групп ресурсов для данного ресурса.
- **getTemplateVarCollection** возвращает коллекцию переменных шаблона для ресурса.
- **process** обрабатывает ресурс, преобразовав исходный контент в выходной.
- **getContent** возвращает необработанный исходный контент для ресурса.
- **setContent** устанавливает исходный контент для данного элемента.

На этом этапе вы можете войти в менеджер и щелкнуть правой кнопкой мыши по дереву файлов. Вы увидите наш новый CRC, отображаемый в качестве опции для создания. Когда вы создаете новый «Защищенный авторским правом ресурс», вы должны помнить, что URL-адрес изменяется внутри менеджера. В то время как обычно при создании страницы ваш URL будет выглядеть примерно так: `http://yoursite.com/manager/index.php?id=1&a=55&parent=0&context_key=web`, то теперь URL-адрес включает параметр class_key : `http://yoursite.com/manager/index.php?id=0&a=55&class_key=CopyrightedResource&parent=0&context_key=web`

Однако при попытке добавить новый защищенный авторским правом ресурс вы получите только белый экран! Это нормально - мы еще не создали файлы контроллера.

Теперь давайте создадим [файлы нашего контроллера](extending-modx/custom-resources/step-3-controllers "Creating a Resource Class - Step 3").
