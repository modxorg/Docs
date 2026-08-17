---
title: "Создание темы Discuss"
description: "Структура файлов темы, manifest, debug_templates и git-workflow для разработки тем"
translation: "extras/discuss/discuss.creating-a-discuss-theme"
---

Этот документ проведёт через основы создания темы Discuss. Сначала базовые понятия, затем подробнее о темизации и git-workflow.

## Структура файлов

Тема Discuss состоит из двух частей: assets темы (css, javascript, images) и шаблоны (chunks Discuss). Они лежат в соответствующих каталогах:

- assets: assets/components/discuss/themes/**THEME_NAME**/
- templates: core/components/discuss/templates/**THEME_NAME**/

Оба **THEME_NAME** должны совпадать. То же имя указывают в настройке **discuss.theme**.

Тема default в Discuss основана на официальной теме форумов MODX и использует SASS для CSS. Исходники SASS в assets/components/discuss/themes/default/sass/, скомпилированный css в /css/. [Подробнее о SASS](http://sass-lang.com/).

## Базовые принципы темизации

Как и у других MODX Extras, Discuss даёт полную свободу разметки. Шаблонов много для разных частей интерфейса. Ниже схема разбора главной страницы форума.

![](basic-theme-structure.png)

Чтобы понять, какой markup из какого файла шаблона, включите системную настройку **discuss.debug_templates**. Каждый chunk будет обёрнут HTML-комментариями с именем chunk и именем файла. Пример:

``` html
<!-- Start: board/disBoardLi from file: themes/default/chunks/board/disboardli.chunk.tpl -->
 <div class="Depth2 row dis-category h-group dis-category-1 dis-unread">
    <a href="http://localhost/modx-stable2/forums/board/1/blue-sky" class="h-group">
        <div class="f1-f7">
            <div class="wrap">
                <span class="folder">35</span>
                <strong>Blue Sky</strong>
                <p class="dis-board-description">Thoughts and peer-to-peer discussions for Partners only</p>
            </div>
        </div>
        <div class="f8-f10">
            <span class="clickable" data-link="http://localhost/modx-stable2/forums/thread/74739/this-is-a-test/#dis-post-414487">This is a test</span>
        </div>
        <div class="f11 l-txtcenter">418</div>
        <div class="f12 l-txtcenter">37</div>
    </a>
    <div class="h-group f-all"><p class="dis-board-subs dis-unread">
<!-- Start: board/disSubForumLink from file: themes/default/chunks/board/dissubforumlink.chunk.tpl -->
 <a href="forums/board/?board=277">New Board</a>

<!-- /End: board/disSubForumLink -->
</p></div>
</div>

<!-- /End: board/disBoardLi -->
```

Вся страница оборачивается **pages/wrapper.tpl**, а шаблон контроллера попадает в плейсхолдер `[[+content]]`.

По умолчанию шаблон контроллера это файл в /pages/ с тем же именем, что контроллер (и частично URL). Контроллер home использует pages/home.tpl, недавние посты в темах — pages/thread/recent.tpl.

Разные темы могут переиспользовать шаблоны между контроллерами через опцию manifest.

Фрагмент manifest для контроллера **thread/reply**:

``` php
    'thread/reply' => array(
        'js' => array(
            'footer' => array(
                'dis.thread.js',
            ),
        ),
        'options' => array(
            'pageTpl' => 'common/thread-with-form',
        ),
        /* ...*/
    ),
```

Кроме регистрации javascript в footer (assets/components/discuss/themes/THEME_NAME/js/) передаётся опция pageTpl со значением common/thread-with-form. Вместо pages/thread/reply.tpl используется pages/common/thread-with-form.tpl. Так переиспользуют разметку похожих контроллеров без дублирования.

С этой информацией можно начать базовую темизацию через CSS и классы. Для более глубоких изменений см. ниже.

## Manifest для дальнейшей кастомизации темы

Manifest, о котором было выше, позволяет выйти за рамки CSS: менять шаблоны и добавлять modules. В default theme уже много настроек manifest, но полезно понимать механику для своих задач.

Manifest это большой php-массив manifest.php в каталоге templates темы. Несколько уровней вложенности:

1. Первый уровень: имя контроллера или «global» для всех страниц.
2. Второй уровень:
     1. «js»: javascript для конкретных контроллеров. Третий уровень: «header», «footer» или «inline». Массив файлов из assets/components/discuss/theme_name/js/.
     2. «css»: stylesheets для контроллеров. Третий уровень: массив файлов из assets/components/discuss/theme_name/css/.
     3. «options»: опции контроллера. Набор зависит от контроллера, полный список в документации [Controllers](extras/discuss/discuss.controllers "Discuss.Controllers").

Если PHP или массивы пугают, посмотрите [эти](http://www.tizag.com/phpT/arrays.php) [материалы](http://www.htmlandphp.com/beginner-php/207-introduction-to-arrays-in-php.html). Используется многомерный ассоциативный массив.

## Git-workflow для темы

Чтобы создать тему Discuss в git-workflow, сделайте fork репозитория Discuss на <https://github.com/modxcms/Discuss>. Склонируйте fork локально и добавьте upstream:

``` php
git clone git@github.com:Your_Username/Discuss.git
git remote add upstream https://github.com/modxcms/Discuss.git
```

Переключитесь на актуальную release-ветку. На момент написания это release-1.1, но проверьте [Discuss Contributors Guidelines](extras/discuss/discuss.contributing "Discuss.Contributing").

``` php
cd Discuss
git checkout release-1.1
```

Создайте ветку темы для удобной совместной работы и возможного [contribute back в Discuss](extras/discuss/discuss.contributing "Discuss.Contributing"). Для правок default theme создайте fix-ветку, например fix-colorsbug.

``` php
git checkout -b theme-name_of_theme
```

Подключите код Discuss к установке MODX. Проще установить пакет Discuss (он настроит MODX), затем изменить namespace (System > Namespaces) на git-версию core/components/discuss/, добавить discuss.core_path с тем же путём и discuss.assets_url с абсолютным URL на git-версию assets/components/discuss/.

В зависимости от окружения может понадобиться session_cookie_path = / (один слэш) и уникальный session_name при нескольких локальных установках MODX. Нужен config.core.php в корне проекта Discuss с путём к MODX. Скопируйте из корня MODX или используйте шаблон:

``` php
<?php
define('MODX_CORE_PATH', '/Applications/MAMP/htdocs/modx/core/');
define('MODX_CONFIG_KEY', 'config');
```

Discuss должен работать, или можно следовать [инструкциям по установке](extras/discuss/discuss.installation "Discuss.Installation") и приступать к темизации :)
