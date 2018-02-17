---
title: "modX.sendRedirect"
_old_id: "1103"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendredirect"
---

## modX::sendRedirect

Sends a redirect to the specified URL using the specified method.

## **Syntax**

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::sendRedirect()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendRedirect())

```
<pre class="brush: php">
void sendRedirect (string $url, [array $options = false], [string $type = ''], [string $responseCode])

```Please note that the $type and $responseCode have been deprecated and will likely be removed in an upcoming release. **Do not rely on those**.

$url needs to be a proper url, which could be generated using modX::makeUrl, to redirect to.

$options accepts an array with one or more of the following key/value pairs:

- type, one of the following (REDIRECT\_HEADER is the default): 
  - **REDIRECT\_REFRESH** - Uses the header refresh method
  - **REDIRECT\_META** - Sends a a META HTTP-EQUIV="Refresh" tag to the output
  - **REDIRECT\_HEADER** - Uses the header location method
- responseCode which needs to be the proper HTTP response, so not just "301" or "302". It defaults to HTTP/1.1 302 Moved Temporarily, but you could set it to "HTTP/1.1 301 Moved Permanently" for a 301-style redirect.
- count\_attempts indicates the number of attempts to redirect before halting.

$type, which is deprecated and should not be used, is the same as the type $options array key. 
$responseCode, which is deprecated and should not be used, is the same as the responseCode $options array key.

## Examples

Send a redirection request to the Resource with ID 54.

```
<pre class="brush: php">
$url = $modx->makeUrl(54);
$modx->sendRedirect($url);

```Send a redirect to modx.com. Do so via the META HTTP-EQUIV refresh tag.

```
<pre class="brush: php">
$modx->sendRedirect('http://modx.com',array('type' => 'REDIRECT_META'));

```Send a 301 Moved Permanently response code instead of the default 302 Moved Temporarily response code.

```
<pre class="brush: php">
$modx->sendRedirect('http://modx.com',array('responseCode' => 'HTTP/1.1 301 Moved Permanently'));

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.makeUrl](developing-in-modx/other-development-resources/class-reference/modx/modx.makeurl "modX.makeUrl")
- [modX.sendForward](developing-in-modx/other-development-resources/class-reference/modx/modx.sendforward "modX.sendForward")
- [modX.sendErrorPage](developing-in-modx/other-development-resources/class-reference/modx/modx.senderrorpage "modX.sendErrorPage")