---
title: "Configuring Sphinx for Search"
_old_id: "1355"
_old_uri: "revo/discuss/configuring-sphinx-for-search"
---

## Requirements for Sphinx Search with Discuss

Discuss has only few requirements to work with Sphinx search:

- Sphinx 2.0 or newer installed on server (current Discuss version tested on 2.0.8)
- Configured sources and indexes for discuss post table (Configuration example below)
- Configured MODx system settings correctly

For more how to install Sphinx can be found from [official Sphinx documentation](http://sphinxsearch.com/docs/)

## Example Configuration

Example configuration uses two indexes for Sphinx; the main index and delta index for faster and more frequent indexing. Using delta index is preferred when forum is active or there are considerable amount of posts which can cause indexer to take long re-indexing main index. Delta index can also keep search more up to date with results depending on indexing frequency.

```
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

Before running indexer with the configuration, create new table with next sql piece to your database which has discuss installed. You can rename the delta table to anything you want, as long it matches with the pre\_query delta update and delta query table in the main index.

```
CREATE TABLE `modx_discuss_sphinx_delta` (
  `counter_id` int(11) NOT NULL,
  `max_doc_id` int(11) NOT NULL,
  PRIMARY KEY (`counter_id`)
)
```

You can read more about delta index updates and merging to main index from official documentation for [Delta Updates](http://sphinxsearch.com/docs/manual-2.0.8.html#delta-updates)

## Setting Sphinx to Discuss Settings

Go to [System Settings](administering-your-site/settings/system-settings "System Settings") and change the following settings:

- **discuss.search\_class** -> Change to disSphinxSearch
- **discuss.sphinx.host\_name** -> Set to hostname where Sphinx server is running
- **discuss.sphinx.indexes** -> List of indexes mentioned in the configuration file. The list can be separated with semicolon, comma or space
- **discuss.sphinx.port** -> Set port number that Sphinx is listening to