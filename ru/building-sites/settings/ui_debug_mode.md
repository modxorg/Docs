---
title: "ui_debug_mode"
translation: "building-sites/settings/ui_debug_mode"
---

## ui\_debug\_mode

**Имя**: UI Debug Mode
**Тип**: Да/Нет
**По умолчанию**: Нет

(2.1+ только)

При включении все вызовы функции JS MODX.debug(msg) будут выводиться с помощью console.log(). Это полезно для отладки [Пользовательских страниц менеджера](extending-modx/custom-manager-pages "Custom Manager Pages") и другого пользовательского кода, не нарушая производственный сайт, поскольку он будет подавлять ведение журнала, если для этого параметра установлено значение Нет.
