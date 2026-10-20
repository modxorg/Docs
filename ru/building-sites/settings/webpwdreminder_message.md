---
title: "webpwdreminder_message"
translation: "building-sites/settings/webpwdreminder_message"
description: "Удалена в MODX 3.0. Неиспользуемый шаблон письма сброса пароля веб-пользователя"
---

Настройка `webpwdreminder_message` удалена в MODX 3.0. В 2.x в ней хранился HTML письма, которое уходило веб-пользователю при запросе нового пароля. Ядро этот шаблон уже не использовало.

Сброс пароля менеджера использует запись лексикона `login_forgot_email` (`core/lexicon/en/login.inc.php`); настройка [forgot_login_email](building-sites/settings/forgot_login_email) тоже удалена в 3.0. Сброс на сайте делают дополнения вроде Login.
