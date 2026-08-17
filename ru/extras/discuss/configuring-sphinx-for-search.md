---
title: "Настройка Sphinx для поиска"
description: "Требования, пример конфигурации Sphinx и системные настройки Discuss для полнотекстового поиска"
translation: "extras/discuss/configuring-sphinx-for-search"
---

## Требования для поиска Sphinx в Discuss

Discuss предъявляет немного требований для работы с поиском Sphinx:

- Sphinx 2.0 или новее, установленный на сервере (текущая версия Discuss протестирована на 2.0.8)
- Настроенные sources и indexes для таблицы постов discuss (пример конфигурации ниже)
- Корректно настроенные системные настройки MODX

Подробнее об установке Sphinx см. [официальную документацию Sphinx](http://sphinxsearch.com/docs/)

## Пример конфигурации

Пример использует два индекса Sphinx: основной и delta для более быстрой и частой индексации. Delta-индекс предпочтителен для активного форума или большого числа постов, когда переиндексация основного индекса занимает много времени. Delta-индекс также помогает держать результаты поиска актуальнее в зависимости от частоты индексации.

``` php
source discuss_posts {
    type                    = mysql
    sql_host                = localhost
    sql_user                = dbuser
    sql_pass                = dbpassword
    sql_db                  = discuss
    sql_port                = 3306
    sql_query_pre           = SET NAMES utf8
    sql_query_pre           = REPLACE INTO modx_discuss_sphinx_delta SELECT 1, IF (MAX(post_first) >= MAX(post_last), MAX(post_first), MAX(post_last)) FROM modx_discuss_threads WHERE private = 0

    sql_query               = SELECT post.id, post.thread, post.board, post.title, post.message, UNIX_TIMESTAMP(post.createdon) AS createdon, \
                            disThread.answered AS answered, \
                            CONCAT('discuss_username_', disUser.username) AS username, CONCAT('discuss_user_id_', post.author) AS userid, \
                            disThread.class_key AS class_key \
                            FROM modx_discuss_posts post \
                            INNER JOIN modx_discuss_users disUser ON disUser.id = post.author \
                            INNER JOIN modx_discuss_threads disThread ON disThread.id = post.thread \
                            WHERE post.id <= (SELECT max_doc_id FROM modx_discuss_sphinx_delta WHERE counter_id = 1) AND disThread.private = 0

    sql_attr_uint           = thread
    sql_attr_uint           = board
    sql_attr_timestamp      = createdon
    sql_attr_uint           = answered
    sql_attr_string         = class_key
}

source discuss_delta : discuss_posts
{
    sql_query_pre           = SET NAMES utf8
    sql_query               = SELECT post.id, post.thread, post.board, post.title, post.message, UNIX_TIMESTAMP(post.createdon) AS createdon, \
                            disThread.answered AS answered, \
                            CONCAT('discuss_username_', disUser.username) AS username, CONCAT('discuss_user_id_', post.author) AS userid, \
                            disThread.class_key AS class_key \
                            FROM modx_discuss_posts post \
                            INNER JOIN modx_discuss_users disUser ON disUser.id = post.author \
                            INNER JOIN modx_discuss_threads disThread ON disThread.id = post.thread \
                            WHERE post.id > (SELECT max_doc_id FROM modx_discuss_sphinx_delta WHERE counter_id = 1) AND disThread.private = 0
}

index discuss_posts {
    source                  = discuss_posts
    path                    = /var/lib/sphinx/data/discuss_posts
    charset_type            = utf-8
}

index discuss_delta {
    source                  = discuss_delta
    path                    = /var/lib/sphinx/data/discuss_delta
    charset_type            = utf-8
}

indexer {
    mem_limit               = 256M
}

searchd {
    port                    = 9312
    log                     = /var/log/mysql/sphinx.log
    query_log               = /var/log/mysql/sphinx-query.log
    pid_file                = /var/run/sphinx.pid
}
```

Перед запуском indexer с этой конфигурацией создайте в базе данных с установленным Discuss новую таблицу следующим SQL. Имя delta-таблицы можно изменить, если оно совпадает с pre_query обновления delta и таблицей delta query в основном индексе.

``` sql
CREATE TABLE `modx_discuss_sphinx_delta` (
  `counter_id` int(11) NOT NULL,
  `max_doc_id` int(11) NOT NULL,
  PRIMARY KEY (`counter_id`)
)
```

Подробнее об обновлениях delta-индекса и слиянии с основным индексом см. [Delta Updates](http://sphinxsearch.com/docs/manual-2.0.8.html#delta-updates) в официальной документации.

## Настройки Sphinx в Discuss

Откройте [System Settings](building-sites/settings "System Settings") и измените следующие настройки:

- **discuss.search_class** -> установите disSphinxSearch
- **discuss.sphinx.host_name** -> укажите hostname сервера Sphinx
- **discuss.sphinx.indexes** -> список индексов из файла конфигурации. Элементы можно разделять точкой с запятой, запятой или пробелом
- **discuss.sphinx.port** -> укажите порт, на котором слушает Sphinx
