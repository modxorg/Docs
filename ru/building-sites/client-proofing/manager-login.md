---
title: Настройка входа в Менеджер
translation: "building-sites/client-proofing/manager-login"
---

В MODX 3 внешний вид страницы входа в Менеджер настраивается проще.

## Логотип

По умолчанию используется логотип MODX из `/manager/templates/default/images/modx-logo-color.svg`.

Чтобы поставить другой логотип, укажите URL изображения в системной настройке `login_logo`. Подойдёт локальный файл или полный внешний URL. Ширина ограничена 192 пикселями (или 384 на дисплеях 2x).

## Фоновое изображение

Фон страницы входа по умолчанию лежит в `/manager/templates/default/images/login/default-background.jpg`. Фото в MODX 3.0.0 снял Christian Seel: горный хребет у Engelberg, Швейцария. Новый экран входа собирали там на SnowUp. ([Источник](https://github.com/modxcms/revolution/pull/13773#issuecomment-364594061))

> Если вы используете кастомную тему Менеджера, добавьте и файл `/manager/templates/YOUR-THEME/images/login/default-background.jpg` как фон по умолчанию.

Чтобы сменить фон, укажите URL в системной настройке `login_background_image`. Подойдёт локальный файл или полный внешний URL. Лучше работает landscape-изображение.

### Смена из кода

Фон можно менять и плагином.

Готовый пример: Extra [DailyPhoto](https://modx.com/extras/package/dailyphoto) каждый день подставляет случайное фото с Unsplash.

Свою логику сделайте плагином на событие `OnManagerLoginFormRender`:

```php
$modx->controller->setPlaceholder('background', '/full/url/to/image.jpg');
```

## Блок справки

На странице входа есть блок помощи, но по умолчанию он выключен. Включите системную настройку `login_help_button`. Внизу панели входа появится ссылка Help.

Текст блока лежит в лексиконе. Откройте **Система → Лексиконы**. Namespace: `core`, topic: `login`, нужный язык. Ключи: `login_help_button_text`, `login_help_text`, `login_help_title`. Правьте значение двойным кликом.

## Вход без пароля

При необходимости включите [вход по magic link](building-sites/client-proofing/security/passwordless-login) вместо логина и пароля.
