---
title: Каталог core
translation: "getting-started/upgrading-to-3.0/core-folder"
---

В 3.0 каталог `core` нельзя переносить на произвольный путь и нельзя переименовать.

Это связано с интеграцией Composer в разработку ядра: зависимости и autoload в core. [#15476](https://github.com/modxcms/revolution/issues/15476)

## Обновление

Если сейчас у вас кастомный каталог core или он вынесен из webroot, перед обновлением до 3.0 верните стандартную схему.

Сделайте так:

1. Перенесите каталог core обратно в `/core/` в корне установки
2. Обновите путь к core в `core/config/config.inc.php`
3. Обновите путь в `config.core.php`, `/manager/config.core.php` и `/connectors/config.core.php`

После этого запустите установщик MODX и проверьте, что пути верные.

## А как же безопасность?

С точки зрения безопасности нет разницы между физическим выносом core из webroot и блокировкой доступа другим способом.

Пример блокировки core (и других чувствительных каталогов или файлов, включая dotfiles, кроме `.well_known`) на Apache:

```` 
RewriteRule ^(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php)  /index.php?q=doesnotexist [L,R=404]
````

И для nginx:

````
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    rewrite ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) /index.php?q=doesnotexist;    
}
````

Эти примеры отдают запрос в MODX с несуществующим alias, поэтому ответ выглядит как остальной сайт.

На высоконагруженных сайтах можно сразу отдавать 404 и не гонять запрос через MODX. Тогда ответ будет отличаться от обычной ошибки, и атакующий сможет предположить, что такие файлы есть.

Для nginx так:

````
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    return 404;    
}
````
