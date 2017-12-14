---
title: "PDO Emulation"
_old_id: "1548"
_old_uri: "1.x/getting-started/fundamentals/pdo-emulation"
---

xPDO also provides an optional PDO emulation layer for PHP 4 and early PHP 5 configurations that do not have the PDO extension available. It can even be used when PDO is misconfigured for some reason in your environment. This allows xPDO to remain PHP 4 compatible for the 1.0 release, though 2.0 will be targeted at PHP 5.2+ in order to take advantage of PHP 5's increasingly robust object-oriented features.