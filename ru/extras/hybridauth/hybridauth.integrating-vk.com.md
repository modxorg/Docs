---
title: "Интеграция VK.com"
description: "Регистрация приложения ВКонтакте для HybridAuth в MODX"
translation: "extras/hybridauth/hybridauth.integrating-vk.com"
---

Интеграция любого сервиса проста. Сначала прочитайте про [Facebook](extras/hybridauth/hybridauth.integrating-facebook), затем посмотрите инструкцию ниже.

#### Регистрация приложения

**1**. Перейдите на <http://vk.com/editapp?act=create>

**2**. Выберите **Website** и укажите адрес сайта и базовый домен.

**3**. Для системной настройки MODX **ha.keys.Vkontakte** (возможно, её нужно создать) укажите значение:

``` php
{"id":"Application ID","secret":"Secure key"}
```
