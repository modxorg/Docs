---
title: "BxrExtra"
description: "Базовый шаблон для создания нового Extra в MODX Revolution"
translation: "extras/bxrextra/index"
---

BxrExtra. базовый шаблон для создания нового Extra в MODX Revolution. Основан на [modExtra](https://github.com/splittingred/modExtra) от [Shaun McCormick](https://github.com/splittingred).

## Настройка

**Инструкция** по созданию компонента с именем **YourComponent** на базе BxrExtra.

Создайте каталог 'yourcomponent'. Клонируйте BxrExtra в каталог yourcomponent командой 'git clone git://github.com/TheBoxer/BxrExtra.git .' **из папки yourcomponent**.

Папку '.git' можно удалить.

Отредактируйте файл 'config.core.php' и укажите константу 'MODX\_CORE\_PATH' **на расположение** ядра MODX.

Далее **переименуйте BxrExtra в YourComponent**. Сначала отредактируйте 'rename\_it.sh': 'repl1' = 'YourComponent', 'repl2' = 'yourcomponent', 'path' = './yourcomponent'.

Запустите 'rename\_it.sh'.

Отредактируйте 'yourcomponent/core/components/yourcomponent/templates/home.tpl' и смените id div с 'bxrextra-panel-home-div' на 'yourcomponent-panel-home-div'.

После этого **добавьте две настройки** в System Settings (в менеджере):

- 'yourcomponent.core\_path'. путь к /yourcomponent/core/components/yourcomponent/
- 'yourcomponent.assets\_url'. /yourcomponent/assets/components/yourcomponent/

URL assets должен быть **доступен** из веб.

Следующий шаг. создание **namespace** с именем 'YourComponent',
**core path** 'путь к /yourcomponent/core/components/yourcomponent/' и
**assets path** 'путь к /yourcomponent/assets/components/yourcomponent/'.

После создания namespace **добавьте action** в namespace YourComponent с **index controller** и без parent controller.

**Разместите созданный action** в меню Component (или где нужно) с lexicon key 'yourcomponent' и description 'yourcomponent.menu\_desc'.
Очистите кэш и обновите страницу менеджера.

Чтобы **создать таблицу по умолчанию** из BxrExtra, добавьте сниппет createDBTable в менеджере и сделайте его **static**. Для Static files укажите '(None)', Static file. '`[[++yourcomponent.core_path]]`/elements/snippets/snippet.yourcomponentCreateDB.php'. Вызовите сниппет createDBTable на любом ресурсе. Должно появиться сообщение **'Table created.'**

Теперь у вас должен быть рабочий extra с функциями ниже.

## Функциональность

- Пользовательская таблица «Items»
- Сниппет со списком Items, сортировка по имени, шаблон. чанк
- Страница менеджера для управления Items
- Процессоры на классах
- Grid с inline-редактированием, контекстным меню, окнами create/update/delete и поиском
- Drag and drop сортировка в grid

Если не нужна вся функциональность, удалите лишнее и измените код.

### Удаление Drag&Drop

- удалите assets/components/yourcomponent/js/mgr/extra/griddraganddrop.js
- в core/components/yourcomponent/controllers/home.class.php
    - удалите `$this->addJavascript($this->yourcomponent->config['jsUrl'].'mgr/extra/griddraganddrop.js');`
- в assets/components/yourcomponent/js/mgr/widgets/items.grid.js
    - удалите параметр ddGroup
    - удалите enableDragDrop или установите false
    - удалите listeners render и beforeDestroy
    - удалите функцию getDragDropText

#### Удаление position из базы (position используется для сортировки)

- в core/components/yourcomponent/model/schema/yourcomponent.mysql.schema.xml
    - удалите поле с ключом "position"
- удалите все php-файлы в core/component/yourcomponent/model/yourcomponent/mysql
- в \_build
    - переименуйте build.config.sample.php в build.config.php
    - в build.config.php укажите MODX\_BASE\_PATH к установке modx
- запустите \_build/build.schema.php
    - должны появиться новые файлы в core/component/yourcomponent/model/yourcomponent/mysql
- удалите таблицу yourcomponent\_items из базы
- запустите сниппет создания таблицы (см. Setup)

## Прочее

Pull requests и [issues](https://github.com/TheBoxer/BxrExtra/issues) приветствуются.
