---
title: Построение базовой модели
translation: "contribute/code/building-core-model"
---

Если вы работаете с базовой моделью и вам необходимо заново сгенерировать модель на основе базовой схемы, вы можете использовать следующие команды.

### Для MySQL

Сборка `modx.mysql.schema.xml`:

```bash
core/vendor/bin/xpdo parse-schema --config=core/model/schema/config.php --psr4=MODX\\ --update=1 mysql core/model/schema/modx.mysql.schema.xml core/src/
```

### Для sqlsrv

Сборка `modx.sqlsrv.schema.xml`:

```bash
core/vendor/bin/xpdo parse-schema --config=core/model/schema/config.php --psr4=MODX\\ --update=1 sqlsrv core/model/schema/modx.sqlsrv.schema.xml core/src/
```
