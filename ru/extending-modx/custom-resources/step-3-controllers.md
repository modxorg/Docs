---
title: "Шаг 3 - Контроллеры"
translation: "extending-modx/custom-resources/step-3-controllers"
---

Этот урок является частью серии:

- [Часть I: Создание пользовательского класса ресурсов](extending-modx/custom-resources "Creating a Resource Class")
- [Часть II: Обработка нашего поведения CRC](extending-modx/custom-resources/step-2-overriding-methods "Creating a Resource Class - Step 2")
- Часть III: Настройка контроллеров
- [Часть IV: настройка процессоров](extending-modx/custom-resources/step-4-processors "Creating a Resource Class - Step 4")

## Создание контроллеров ресурсов

Помните, как на [шаге 1](extending-modx/custom-resources "Creating a Resource Class") мы сообщили MODX, где находится наш каталог "controllers/" через метод getControllerPath? Чтобы освежить вашу память, вот этот код

```php
return $modx->getOption('copyrightedresource.core_path',null,$modx->getOption('core_path').'components/copyrightedresource/').'controllers/';
```

Как вы уже догадались, мы собираемся поместить два файла в каталог `core/components/copyrightedresource/controllers/`. Создайте каталог, если вы этого еще не сделали, а затем создайте файл с именем **create.class.php**:

```php
<?php
class CopyrightedResourceCreateManagerController extends ResourceCreateManagerController {
    public function getLanguageTopics() {
        return array('resource','copyrightedresource:default');
    }
}
```

Затем добавьте **update.class.php**:

```php
<?php
class CopyrightedResourceUpdateManagerController extends ResourceUpdateManagerController {
    public function getLanguageTopics() {
        return array('resource','copyrightedresource:default');
    }
}
```

Итак, когда мы закончим, наша файловая структура должна выглядеть примерно так:

![](controllers.png)

И это все, что нужно, чтобы наши настраиваемые контроллеры были запущены и работали. Вам даже не нужно включать вызов getLanguageTopics, но мы сделали это, чтобы загрузить наш собственный словарь для страницы. Прочтите это еще раз: вам не нужно создавать функцию **getLanguageTopics()**! Вам нужно создавать контроллеры и создавать классы, но вам не нужно добавлять к ним какие-либо функции. Если вы в замешательстве, вспомните нашу подсказку из [Части I](extending-modx/custom-resources "Creating a Resource Class"): каждый раз, когда вы расширяете класс PHP, вы должны просматривать родительский класс, который вы расширяете. В этом случае вы можете взглянуть на родительские классы:

- `manager/controllers/default/resource/create.class.php`
- `manager/controllers/default/resource/create.class.php`

В случае, если вам нужно вспомнить объектно-ориентированное программирование, любой метод в ResourceUpdateManagerController или ResourceCreateManagerController может быть переопределен - общий метод для переопределения это «loadCustomCssJs», который позволит вам добавить свой собственный CSS / JS и т.п. для вашего собственного пользовательского интерфейса вашего CRC.

Теперь вы можете перейти к древу ресурсов и создать «страницу, защищенную авторским правом». При этом загрузится панель редактирования ресурсов. Обратите внимание, поскольку мы ничего не переопределяли в контроллере, он будет выглядеть *в точности* как обычная панель редактирования ресурсов. Но после того, как вы создадите свою страницу и увидите ее в интерфейсе, вы заметите, что авторское право будет автоматически добавлено:

![](fe-view.png)

Замечательно! Это должно дать вам хорошее представление о том, как ресурсы обрабатываются в MODX. Вы можете на этом остановиться, но мы продолжим немного дальше, чтобы описать, как [расширить процессоры для вашего CRC](extending-modx/custom-resources/step-4-processors "Creating a Resource Class - Step 4"). Вот где все становится особенно интересным... вы можете настроить поведение менеджера и контролировать, как всё сохраняется в базе данных, а также много другое.
