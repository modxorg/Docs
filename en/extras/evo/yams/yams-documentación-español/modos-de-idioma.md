---
title: "Modos de Idioma"
_old_id: "1371"
_old_uri: "evo/yams/yams-documentación-español/modos-de-idioma"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Language Modes](/extras/evo/yams/yams-english-documentation/yams-language-modes)</td></tr></table></div>Modos de Idioma
===============

YAMS necesita saber que idioma mostrar para cada documento. YAMS determina esto por medio del URL usado para accesar el documento. Estos modos no son exclusivos uno a otro. Cualesquiera que sean los modos activos, la configuración del servidor (htaccess) también necesitará estar configurada apropiadamente para que YAMS funcione correctamente.

YAMS permite alias con caractéres de más de 7bits (hasta muti-byte). YAMS automáticamente codificará los URLs para salida HTML y los decodifica cuando está analizando las solicitudes del servidor. El proceso de codificación para cada parte del URL es como sigue: Primero se convierte a UTF-8 (si es necesario) y luego rawurlencode.

Modo de Aliases Multi-idioma Únicos
-----------------------------------

Este modo es activado al configurar primero el tipo de alias multi-idioma a 'Único' en la pestaña de 'Otros Parámetros' y después activando los aliases multi-idioma usando el parámetro debajo del mismo. Si los aliases multi-idioma no han sido previamente activados, entonces esto creará aliases multi-idioma para todos los documentos los cuales, asumiendo que los aliases de documentos existentes son únicos, también serán únicos. Desde este momento es la responsabilidad del usuarion asegurar que los aliases son únicos. Cuando las rutas de los alias amigables no estén siendo usados, todos los aliases de todas las variantes de idioma de todos los documentos, incluyendo los aliases mono-idioma, deben de ser únicos. Sin embargo, las rutas de alias amigables están siendo usadas, la restricción es ligeramente menos estricta: Para cualquier documento todas las variantes de idioma de todos sus hermanos deben de ser únicos.

Cuando este modo es activado es posible que YAMS determine el documento y el idioma solicitado basado en la ruta de alias solamente. Así los nombres del servidor y de la raiz pueden ser configurados libremente o dejados completamente sin configurar y no tienen que ser únicos.

Es posible usar aliases multi-idioma con o sin hacer respetar la originalidad y pueden también ser usados en conjunción con los modos de nombre de servidor y de raiz, los cuales se discuten abajo.

### Ejemplos de URLS

Es posible accesar diferentes variantes de idioma del mismo documento via URLs diferentes:

- [http://nombre\_servidor/mi-doc-es.html](http://server_name/my-doc-en.html)
- [http://nombre\_servidor/mon-doc-fr.html](http://server_name/mon-doc-fr.html)

Modos de Nombre del Servidor y Nombre de la Raiz
------------------------------------------------

El modo de **Nombre de Servidor** y el modo de **Nombre de Raiz** pueden ser usados simultáneamente o independientemente. El formato general del URL cuando se usa uno de estos modos es:

[http://(nombre\_servidor)/(subfolder/)(nombre\_raiz/)(path/)(filename](http://(server_name)/(subfolder/)(root_name/)(path/)(filename))

donde solo hay un (subfolder/) si ha sido configurado en la pestaña 'Otros Parámentros' y hay solo un (path/) si las rutas de alias amigables han sido configuradas.

Siempre debe de ser posible para YAMS determinar el idioma de un documento de su URL. Si aliases multi-idioma únicos no son usados, entonces el 'URLs del Sitio' para cada idioma debe de ser único. El 'URLs del Sitio' son mostrados en la pestaña 'Configuración de Idioma'. Desde YAMS 1.1.5 alpha, el URL del sitio mono-idioma puede ser el mismo que uno de los URLs del sitio multi-idioma. Si YAMS es cnfigurado de manera que el URLs del Sition no son únicos entonces YAMS se colocará en modo de Parametro de Búsqueda y esperará un parámetro de búsqueda para usarlo para especificar el idioma. (ver abajo)

El modo de Nombre de Servidor es cambiado a ON al especificar un nombre del servidor para cada grupo de idioma y un nombre de servidor para páginas mono-idioma/ordinarias en la pestaña de 'Configuración de Idiomas'. Para usar el modo de Nombre de Servidor, es necesario configurar los varios nombres de servidor como aliases o huéspedes virtuales en el servidor. Si el modod de nombre de servidor está OFF, entonces el nombre de servidor es determinado de la manera usual por MODx y será consistente con \[(site\_url)\]. Es posible especificar direcciones IP y URLs terminados en localhost para facilitar el desarrollo en servidores locales.

Para habilitar el modo de nombre de raiz, es necesario especificar por lo menos un nombre de raiz en la pestaña de Configuración de Idiomas. Si el modo de nombre de servidor está OFF entonces un nombre de raiz necesitará ser especificado para cada grupo de idioma.

Con cualquiera de los modos de alias multi-idioma único, modo de nombre de servidor y modod de nombre de raiz es posible cambiar el aidioma de una página mandando una solicitud a la página actual con el ID del nuevo grupo de idioma especificado con una variable de GET o POST. Esta variable se llama yams\_new\_lang, pero puede ser configurada a llamarse de otra manera en la pestaña de 'Otros Parámetros'. Un placeholder que accesa este nombre y las llamadas de snippet que generan una lista para habilitar el cambio de idioma están disponibles. Ver la documentación de YAMS de [Placeholders](/extras/evo/yams/yams-english-documentation/yams-placeholders "YAMS Placeholders") y [Snippet](/extras/evo/yams/yams-english-documentation/yams-snippet "YAMS Snippet").

### Ejemplos de URLS

Sólo mode de nombre de servidor:

- [http://en.nombre\_servidor.com/mydoc.html](http://en.server_name.com/mydoc.html)
- [http://fr.nombre\_servidor.com/mydoc.html](http://fr.server_name.com/mydoc.html)

Sólo modo nombre de raiz:

- [http://nombre\_servidor.com/en/mydoc.html](http://server_name.com/en/mydoc.html)
- [http://nombre\_servidor.com/fr/mydoc.html](http://server_name.com/fr/mydoc.html)

Sólo modo nombre de raiz, con un idioma en la raiz:

- [http://nombre\_servidor.com/mydoc.html](http://server_name.com/mydoc.html)
- [http://nombre\_servidor.com/fr/mydoc.html](http://server_name.com/fr/mydoc.html)

Nodo nombre de servidor, modo nombre de raiz, rutas de alias amigables, aliases muti-idioma y URLs >7bits:

- [http://en.nombre\_servidor.com/england/folder/mydoc.html](http://en.server_name.com/england/folder/mydoc.html)
- [http://fr.nombre\_servidor.com/la-france/r](http://fr.server_name.com/la-france/r)épertoire/mon-doc.html

Modo Parámetro de Búsqueda
--------------------------

El modo Parámetro de Búsqueda (Query Param) es proveído principalmente por compatibilidad con EasyLingual y no puede ser usadon en conjunción con los otros modos. Para accesar este modo, los aliases multi-idioma únicos no deben de estar activos, no se deben de especificar nombres de raiz y el nombre del servidor no debe de ser espedificado o debe de ser igual para todos los grupos de idioma y para las página mono-idioma. Para distinguir un idioma del otro un parámetro de búsqueda es añadido a todos los URLs: [http://nombre\_servidor/(subfolder/)(path/)filename?yams\_lang=id](http://server_name/(subfolder/)(path/)filename?yams_lang=id)

Este parámetro de búsqueda es llamado yams\_lang. Sin embargo, es configurable en la pestaña de 'Otras Opciones'. Debe de ser cambiado a lang si se requiere compatibilidad con EasyLingual.