---
title: "ContextRouter"
translation: "extras/contextrouter"
---

ContextRouter это плагин Mark Hamstra для маршрутизации contexts по доменам или субдоменам. Подпапки ContextRouter не маршрутизирует.

Если нужны и подпапки, лучше [XRouting](https://modx.com/extras/package/xrouting): конфигурация похожая, возможностей больше. [Как работает XRouting](https://modx.today/posts/2015/05/using-xrouting-for-multilingual-websites-in-modx).

## Установка и настройка

Поставьте ContextRouter через Package Management или с сайта [MODX Extras](https://modx.com/extras/package/contextrouter). Отдельного CMP нет. Нужна корректная настройка contexts и при необходимости системные настройки плагина.

### Настройка Context

Минимум: у каждого маршрутизируемого context должна быть настройка **http\_host**. Это хост доступа, например `sub.domain.com` или `otherdomain.tld`. Несколько хостов на один context задайте через запятую в **http\_host\_aliases**.

Для нормальной работы MODX также задайте **base\_url** (например `/`), **site\_url** (например <http://sub.domain.com/>) и **site\_start** (например `15` для ресурса 15).

Если эти настройки уже были до установки ContextRouter, при первом фронтенд-запросе плагин подхватит их сам. Если настроили после установки, сделайте **Site → Clear Cache**.

### Системные настройки

Откройте **Система → Системные настройки** и в namespace выберите `contextrouter` (по умолчанию там `core`).

| Key                          | Description                                                                                                      |
| ---------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| contextrouter.includeWww     | Если включено, ContextRouter сам делает alias www и no-www вариаций хоста на текущий context. |
| contextrouter.defaultContext | Ключ context для хостов без явной маршрутизации.                      |
