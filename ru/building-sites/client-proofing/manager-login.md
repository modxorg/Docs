---
title: Настройка входа в Менеджер
translation: "building-sites/client-proofing/manager-login"
description: "Страница входа в менеджер MODX: логотип, фоновое изображение, блок справки, язык и настройки, которые их меняют."
---

В MODX 3 внешний вид страницы входа в Менеджер настраивается проще.

## Логотип

По умолчанию используется логотип MODX из `/manager/templates/default/images/modx-logo-color.svg`.

Чтобы поставить другой логотип, укажите URL изображения в системной настройке `login_logo`. Подойдёт локальный файл или полный внешний URL. Ширина ограничена 192 CSS-пикселями.

Логотип используется и в письмах Менеджера — в стандартном шаблоне `email/default.tpl`.

**Своей теме нужен свой логотип**
Логотип по умолчанию читается из каталога темы, без отката на `default`. В теме без `images/modx-logo-color.svg` на странице входа будет битый логотип.

Favicon страницы задаётся отдельно, настройкой `manager_favicon_url`.

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

Событие `OnManagerLoginFormPrerender` делает то же самое, но его вывод вставляется перед формой.

## Блок справки

На странице входа есть блок помощи, но по умолчанию он выключен. Включите системную настройку `login_help_button`. Внизу панели входа появится ссылка Help.

Текст блока лежит в лексиконе. Откройте **Admin → Лексиконы**. Namespace: `core`, topic: `login`, нужный язык. Ключи: `login_help_button_text`, `login_help_text`, `login_help_title`. Правьте значение двойным кликом.

Текст приветствия выбирается по времени суток из ключей `login_greeting_morning`, `login_greeting_afternoon`, `login_greeting_evening` и `login_greeting_night` той же темы.

## Язык

Язык страницы входа выбирается прямо на ней. Это не настройка `manager_language`: в MODX 3 такую настройку удаляют при обновлении, а язык живёт в сессии. Страница входа берёт язык из запроса, затем из сессии, затем из заголовка `Accept-Language` браузера, иначе использует `en`.

## Другие настройки

| Настройка | Что меняет |
| --- | --- |
| `allow_manager_login_forgot_password` | Показывать ли блок сброса забытого пароля. |
| `manager_login_url_alternate` | Адрес, куда отправляется неавторизованный пользователь, вместо страницы входа. |
| `manager_direction` | Направление текста, `rtl` для языка справа налево. |
| `compress_css` | Подключать ли на странице входа минифицированный стиль. |
| `password_min_length` | Минимальная длина пароля, в подсказке под полем. |
| `session_cookie_lifetime` | Время жизни сессии, в подписи к чекбоксу «запомнить меня». |

## Вход без пароля

При необходимости включите [вход по magic link](building-sites/client-proofing/security/passwordless-login) вместо логина и пароля. С настройкой `passwordless_activated` форма показывает только поле для адреса почты. Срок действия ссылки задаёт настройка `passwordless_expiration`, по умолчанию 3600 секунд.

## Смотрите также

1. [Настройка системы управления для клиента](building-sites/client-proofing)
2. [Пользовательские темы системы управления](building-sites/client-proofing/custom-manager-themes)
3. [Настройка входа в Менеджер](building-sites/client-proofing/manager-login)
4. [Вход по magic link](building-sites/client-proofing/security/passwordless-login)
