---
title: 'Connectors'
note: 'This is a stub. You can help by expanding it.'
---

Connectors are simple PHP files that extras can use to expose their processors to manager users. 

The core connector (`connectors/index.php`) only allows routing AJAX requests in the manager to the core processors, so extras typically place their own in `assets/components/NAME-OF-EXTRA/connector.php`, and use that for their own [custom manager pages](/extending-modx/custom-manager-pages).
