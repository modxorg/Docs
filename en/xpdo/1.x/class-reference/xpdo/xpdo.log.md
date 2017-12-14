---
title: "xPDO.log"
_old_id: "1592"
_old_uri: "1.x/class-reference/xpdo/xpdo.log"
---

xPDO::log
---------

Log a message with details about where and when an event occurs.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#log>

```
<pre class="brush: php">
void log (integer $level, string $msg, [string $target = ''], 
[string $def = ''], [string $file = ''], [string $line = ''])

```Example
-------

Log an error message:

```
<pre class="brush: php">
$xpdo->log(xPDO_LOG_LEVEL_ERROR,'An error occurred.');

```Log a debug message:

```
<pre class="brush: php">
$xpdo->log(xPDO_LOG_LEVEL_DEBUG,'This is a debugging statement.');

```See Also
--------

- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")