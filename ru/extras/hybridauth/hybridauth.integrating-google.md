---
title: "Интеграция Google"
description: "Регистрация OAuth-приложения Google для HybridAuth в MODX"
translation: "extras/hybridauth/hybridauth.integrating-google"
---

Интеграция любого сервиса проста. Сначала прочитайте про [Facebook](extras/hybridauth/hybridauth.integrating-facebook), затем посмотрите скриншоты.

#### Регистрация приложения

**1**. Перейдите на <https://code.google.com/apis/console/> и создайте проект.

**2**. Откройте **API Access** в **API Project**, затем **Create an OAuth 2.0 client ID**.

**3**. В окне **Create Client ID** заполните обязательные поля: имя и описание приложения.

**4**. Нажмите **Next**.

**5**. Укажите **Application type** → **Web application** и откройте расширенные настройки через **(more options)**.

**6**. Callback URL для приложения: <http://example.com/assets/components/hybridauth/action.php?hauth.done=Google>

![](ha_gg1.png)

![](ha_gg2.png)

![](ha_gg3.png)

![](ha_gg4.png)

![](ha_gg5.png)

![](ha_gg6.png)
