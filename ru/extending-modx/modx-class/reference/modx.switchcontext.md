---
title: "modX.switchContext"
translation: "extending-modx/modx-class/reference/modx.switchcontext"
description: "modX.switchContext метод для переключения контекста"
---

## modX::switchContext

Переключает основной контекст для экземпляра modX.

Помните, что переключение контекстов не позволяет загружать пользовательские классы обработки сеансов. Шлюз определяет обработку сеанса, которая применяется к одному запросу. Чтобы создать контекст с пользовательским обработчиком сеанса, вы должны создать уникальный контекстный шлюз, который непосредственно инициализирует этот контекст.

## Синтаксис

API Документация: [modX::switchContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::switchContext())

``` php
boolean switchContext (string $contextKey, [boolean $reload = false])
```

- `$contextKey` _(string)_ Ключ контекста, на который нужно переключиться. **Обязательный**
- `$reload` _(boolean)_ Установите значение в "true", чтобы принудительно создать данные контекста перед переключением на него. 

## Пример

Переключитесь на контекст "sports".

``` php
$modx->switchContext('sports');
```

## Смотрите также

- [Contexts](building-sites/contexts "Contexts")
