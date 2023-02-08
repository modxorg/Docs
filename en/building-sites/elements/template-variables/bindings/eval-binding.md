---
title: "EVAL Binding"
_old_id: "107"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/eval-binding"
note: "The @EVAL binding has been deprecated and removed in MODX 3.0."
---

The `@EVAL` binding was present in earlier versions of MODX and allowed executing arbitrary code to populate a template variable.

Due to the related security concerns, this has been removed in 3.0.

As an alternative, you can use a [@SELECT](building-sites/elements/template-variables/bindings/select-binding),  [@CHUNK](building-sites/elements/template-variables/bindings/chunk-binding) or [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding) binding, where the last two could be used to for example run a snippet.
