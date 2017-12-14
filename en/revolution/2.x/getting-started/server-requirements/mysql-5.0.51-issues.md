---
title: "MySQL 5.0.51 Issues"
_old_id: "1115"
_old_uri: "2.x/getting-started/server-requirements/mysql-5.0.51-issues"
---

Why does MODx not support MySQL server version 5.0.51?
------------------------------------------------------

MySQL 5.0.51, including 5.0.51a, has serious bugs with PDO, specifically grouping, ordering and prepare statements.

It will cause uncorrectable errors in normal queries in MODx, as well as other open source applications, and therefore MODx does not support installations with MySQL 5.0.51 installed. Please upgrade your MySQL installation.

MySQL 5.0.51 Server Buglist
---------------------------

Here are just some of the bugs that occur:

- <http://bugs.mysql.com/bug.php?id=32202>
- <http://bugs.php.net/bug.php?id=47655>
- <http://bugs.mysql.com/bug.php?id=36406>