---
title: "xPDOTransport.pack"
_old_id: "1304"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.pack"
---

## xPDOTransport::pack

Pack the [xPDOTransport](/xpdo/2.x/class-reference/xpdotransport "xPDOTransport") instance in preparation for distribution. This packs the transport into a zip file in the target directory.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/transport/xPDOTransport.html#pack>

```
<pre class="brush: php">
boolean pack ()

```## Example

Package the transport into a zip file.

```
<pre class="brush: php">
$transport->pack();

```## See Also

- [xPDOTransport](/xpdo/2.x/class-reference/xpdotransport "xPDOTransport")