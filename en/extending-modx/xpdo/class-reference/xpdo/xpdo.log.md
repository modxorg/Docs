---
title: "xPDO.log"
_old_id: "1250"
_old_uri: "2.x/class-reference/xpdo/xpdo.log"
---

## xPDO::log

Log a message with details about where and when an event occurs.

## Syntax

``` php
$xpdo->log($level, $msg, $target= '', $def= '', $file= '', $line= '');
```

- `$level` (integer) The verbosity level of the logged message. See Verbosity Constants below
- `$msg` (string) The message to log.
- `$target` (mixed) The logging target. If a string, this should be FILE, HTML, or ECHO. If an array, see examples below.
- `$def` (string) The name of a defining structure (such as a class) to help identify the log event source.
- `$file` (string) A filename in which the log event occurred. Usually you would use the \_\_FILE\_\_ constant.
- `$line` (string) A line number to help locate the source of the event. Usually you would use the \_\_LINE\_\_ constant

API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_xpdo.class.html#%5CxPDO](http://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#%5CxPDO)

``` php
void log (integer $level, string $msg, [string $target = ''], [string $def = ''], [string $file = ''], [string $line = ''])
```

## Log Levels

In many cases, you can use the MODX equivalent constants for log levels.

What gets printed is controlled by the `log_level` System Setting. You can override this at runtime using the `setLogLevel` method.

## Examples

### Simple

Simple log message, will write to the default log file (e.g. `core/cache/logs/error.log`):

``` php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, '[Mobile Detect] An error occurred.');
```

In the logs, this would appear like this:

``` php
[2013-09-15 14:21:25] (ERROR @ /index.php) [Mobile Detect] An error occurred.
```

### Specify the Snippet

Because MODX application ultimately runs via the index.php file, it can be helpful to add some extra information:

``` php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'An error occurred.', '', 'MySnippet');
```

``` php
[2013-09-15 14:22:48] (ERROR in MySnippet @ /index.php) An error occurred
```

### Specify File and Line

Remember that ultimately, all MODX Snippets and Plugins run from cached files, so the source file listed will be the cached file. 

``` php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'This is my error message...', '', 'MySnippet', __FILE__, __LINE__);
```

``` php
[2013-09-15 14:48:02] (ERROR in MySnippet @ /path/to/core/cache/includes/elements/modsnippet/28.include.cache.php : 7) This is my error message...
```

### Custom Log File

You may wish to send errors to a destination other than the default MODX error log. To accomplish this, you must pass an array to the `$target` argument. You must verbosely specify 'FILE' as the target, otherwise, the message will be echoed back to the page.

``` php
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Error for my custom log file', array(
    'target' => 'FILE',
    'options' => array(
        'filename' => 'custom.log'
    )
));
```

By default, the path for log files is `core/cache/logs/` so in this example, we find our log message inside the `custom.log` file:

``` php
[2013-09-15 15:01:07] (ERROR @ /index.php) Error for my custom log file
```

If desired, you may also specify the path via the `filepath` argument.

Because this is a bit verbose, you may find it cleaner to define your logging target once then reference the array:

``` php
$log_target = array(
    'target'=>'FILE',
    'options' => array(
        'filename'=>'my_custom.log'
    )
);
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'My Error...',$log_target);
$xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Some other error...',$log_target);
```

### Debugging

You can change the level of the logged message by adjusting the first parameter. E.g. to log a debug message:

``` php
$xpdo->log(xPDO::LOG_LEVEL_DEBUG,'This is a debugging statement.');
```

### Custom Use in Snippets

It can be really handy to increase logging verbosity for a single Snippet or plugin. To accomplish this, use the `setLogLevel()` function. You can use this to override the global value of the **log\_level** System Setting:

``` php
// Call your snippet like this: [[mySnippet? &log_level=`4`]]
// Override global log_level value
$log_level = $modx->getOption('log_level', $scriptProperties, $modx->getOption('log_level'));
$modx->setLogLevel($log_level);
```

## Verbosity Constants

| xPDO Constant           | MODX Constant           | Value |
| ----------------------- | ----------------------- | ----- |
| xPDO::LOG\_LEVEL\_FATAL | MODX\_LOG\_LEVEL\_FATAL | 0     |
| xPDO::LOG\_LEVEL\_ERROR | MODX\_LOG\_LEVEL\_ERROR | 1     |
| xPDO::LOG\_LEVEL\_WARN  | MODX\_LOG\_LEVEL\_WARN  | 2     |
| xPDO::LOG\_LEVEL\_INFO  | MODX\_LOG\_LEVEL\_INFO  | 3     |
| xPDO::LOG\_LEVEL\_DEBUG | MODX\_LOG\_LEVEL\_DEBUG | 4     |

## See Also

- **log\_level** System Setting
- **log\_target** System Setting
- [xPDO](extending-modx/xpdo "xPDO")
