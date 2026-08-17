---
title: "MySQL 5.0.51"
_old_id: "1115"
_old_uri: "2.x/getting-started/server-requirements/mysql-5.0.51-issues"
note: "MODX теперь требует MySQL 5.7 или выше. Эта страница в архиве."
translation: "getting-started/installation/troubleshooting/mysql-5.0.51"
---

## Почему MODX не поддерживает MySQL 5.0.51?

MySQL 5.0.51, включая 5.0.51a, содержит серьёзные ошибки PDO: GROUP BY, ORDER BY и prepared statements.

Из‑за них в MODX и других open source приложениях ломаются обычные запросы. MODX не поддерживает установку на MySQL 5.0.51. Обновите MySQL.

## Список багов MySQL 5.0.51

Примеры:

- <http://bugs.mysql.com/bug.php?id=32202>
- <http://bugs.php.net/bug.php?id=47655>
- <http://bugs.mysql.com/bug.php?id=36406>
