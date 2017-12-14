---
title: "MODX Revolution Framework Structure Ideology"
_old_id: "375"
_old_uri: "2.x/getting-started/an-overview-of-modx/modx-revolution-framework-structure-ideology"
---

<div>- [Controllers](#MODxRevolutionFrameworkStructureIdeology-Controllers)
- [Templates](#MODxRevolutionFrameworkStructureIdeology-Templates)
- [Connectors](#MODxRevolutionFrameworkStructureIdeology-Connectors)
- [Processors](#MODxRevolutionFrameworkStructureIdeology-Processors)

</div> The manager in MODX Revolution is structured like so.

- Controllers
- Templates
- Connectors
- Processors

Controllers
===========

 Controllers are the PHP pages loaded prior to rendering the page. They grab information and assign variables to Smarty.

 Controllers are abstracted in the MODX framework as "modAction". This way the user can create manager pages simply by creating the files and then creating a modAction object. Doing so will allow the developer to add controllers directly into the top menu. MODX also caches its action map ($modx->actionMap) for quick and easy redirection to the proper controller.

 Controllers never manipulate data - they simply fetch it.

Templates
=========

 Templates are [Smarty](http://smarty.php.net) templates that are primarily XHTML, Smarty tags, and a little JS here and there. They are used to separate code from content, and are loaded based upon their parallel controller.

Connectors
==========

 Connectors are isolated PHP scripts that all require the connectors/index.php file. They then forward data manipulation or remote data fetching requests to the processors, which then return it to the AJAX request made in the JS files. They determine the processor to load based on the $\_REQUEST 'action' variable, specified in the JS request.

 Connectors are locked down to receive requests only from authorized sources, to prevent internal hacking.

Processors
==========

 Processors are the 'cogs' of MODX. They are called _only_ by connectors or controllers, and never accessed directly. They manipulate or fetch database records, and are isolated by the task what they perform (using CRUD structure) to allow for quick and easy debugging.

 They send error messages through the modJSONError PHP class, which is an abstraction layer class that allows for easy JSON-formatted error messages to be sent back to the browser's XMLHttpRequest.