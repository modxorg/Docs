---
title: Настройка входа в Менеджер
translation: "building-sites/client-proofing/manager-login"
description: "Страница входа в менеджер MODX: логотип, фоновое изображение, блок справки, язык и настройки, которые их меняют."
---

У страницы входа в MODX 3 свои настройки, свой шаблон и свои события. Внешний вид можно сменить, не трогая остальной менеджер.

## Логотип

По умолчанию используется логотип сайта из `/manager/templates/default/images/modx-logo-color.svg`.

Чтобы поставить другой логотип, укажите URL изображения в системной настройке `login_logo`. Подойдёт локальный файл или полный внешний URL. Ширина ограничена 192 CSS-пикселями.

Логотип используется и в письмах менеджера, в стандартном шаблоне `email/default.tpl`.

**Своей теме нужен свой логотип**
Логотип по умолчанию читается из каталога темы, без отката на `default`. В теме без `images/modx-logo-color.svg` на странице входа будет битый логотип.

Favicon страницы задаётся отдельно, настройкой `manager_favicon_url`.

## Фоновое изображение

Фон страницы входа по умолчанию лежит в `/manager/templates/default/images/login/default-background.jpg`. Фото в MODX 3.0.0 снял Christian Seel ([источник](https://github.com/modxcms/revolution/pull/13773#issuecomment-364594061)).

Чтобы сменить фон, укажите адрес изображения в системной настройке `login_background_image`. Подойдёт локальный файл или полный внешний URL. Лучше работает горизонтальное изображение.

> [!NOTE]
> Если вы используете свою тему менеджера, добавьте и файл `/manager/templates/YOUR-THEME/images/login/default-background.jpg` как фон по умолчанию.

### Смена из кода

Фон можно задать и плагином. Так каждому посетителю достаётся своя картинка.

Готовый пример: дополнение [DailyPhoto](https://modx.com/extras/package/dailyphoto). Каждый день оно подставляет случайное фото с Unsplash.

Свою логику сделайте плагином на событие `OnManagerLoginFormRender`:

```php
$modx->controller->setPlaceholder('background', '/full/url/to/image.jpg');
```

Событие `OnManagerLoginFormPrerender` вставляет свой вывод перед формой. Плагин на этом событии не задаёт фон: тема записывает плейсхолдер уже после Prerender.

## Блок справки

На странице входа есть блок помощи. По умолчанию он выключен. Включите системную настройку `login_help_button`, и внизу панели входа появится ссылка Help.

Текст блока лежит в лексиконе. Откройте **Админ → Управление словарями**. Namespace: `core`, topic: `login`, нужный язык. Ключи: `login_help_button_text`, `login_help_text`, `login_help_title`. Правьте значение двойным кликом.

Текст приветствия выбирается по времени суток из ключей `login_greeting_morning`, `login_greeting_afternoon`, `login_greeting_evening` и `login_greeting_night` той же темы.

## Язык

Язык страницы входа выбирается прямо на ней. Это не настройка `manager_language`. В MODX 3 такую настройку удаляют при обновлении, а язык живёт в сессии.

Страница берёт первый источник, в котором язык есть:

| Порядок | Источник |
| --- | --- |
| 1 | Запрос |
| 2 | Сессия |
| 3 | Браузер |
| 4 | `en` |

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

Вместо имени и пароля страница может предложить [вход по волшебной ссылке](building-sites/client-proofing/security/passwordless-login). С настройкой `passwordless_activated` форма показывает только поле для адреса почты. Срок действия ссылки задаёт настройка `passwordless_expiration`, по умолчанию 3600 секунд.

## Смотрите также

1. [Настройка системы управления для клиента](building-sites/client-proofing)
2. [Пользовательские темы системы управления](building-sites/client-proofing/custom-manager-themes)
3. [Настройка входа в Менеджер](building-sites/client-proofing/manager-login)
4. [Вход без пароля](building-sites/client-proofing/security/passwordless-login)
