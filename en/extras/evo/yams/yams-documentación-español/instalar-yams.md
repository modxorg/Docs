---
title: "Instalar YAMS"
_old_id: "665"
_old_uri: "evo/yams/yams-documentación-español/instalar-yams"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Installation](/extras/evo/yams/yams-english-documentation/yams-installation)</td></tr><tr><td><span class="icon icon-page">Page:</span> [Instalar YAMS](/extras/evo/yams/yams-documentación-español/instalar-yams)</td></tr><tr><td><span class="icon icon-page">Page:</span> [YAMS Installation (de)](/extras/evo/yams/yams-deutsche-dokumentation/yams-installation-(de))</td></tr></table></div>Instalando y Actualizando YAMS
==============================

Pre-requisitos
--------------

YAMS ha sido desarrollado en MODx v0.9.6.3 y con PHP >= 5.2.6-3. No funciona en servidores que corren PHP 4.

ManagerManager no es requerido para que funcione YAMS, pero es recomendado. YAMS puede usar ManagerManager para esconder variables de documento redundantes y para obtener un layout de pestañas en la vista de documento usando una pestaña por idioma.

Instrucciones para Actualizar
-----------------------------

Para actualizar de una versión previa haz lo siguiente:

1. Renombra el directorio assets/modules/yams a algo diferente. Por ejemplo assets/modules/yams\_old o assets/modules/yams\_v1.1.x
2. Copia el nuevo directori de YAMS a assets/modules/yams
3. Copia el archivo yams.config.inc.php del directorio viejo de YAMS al directorio nuevo de YAMS.
4. Asegúrate de que el directorio nuevo de YAMS y el archivo yams.config.inc.php (si existe) sean escribibles por el usuario/grupo del servidor.
5. Asegúrate de que el plugin de YAMS esté configurado como activo en todos los eventos necesarios. La lista de eventos ha cambiado de versión en versión. Por favor ve el archivo readme.txt contenido en el archivo bajado de YAMS para encontrar los eventos específicos requeridos para esa versión.
6. Checa que YAMS siempre aparezca primero en el orden de ejecución de plugins para cada evento con el cual está activo. En particular, si PHx está instalado, entonces YAMS debe de aparecer antes que PHx en el orden de ejecución de OnParseDocument.
7. Chea todo esté trabajando todavía y que las configuraciones estén correctamente mostradas en el módulo de YAMS. Si es así, el directorio viejo de YAMS puede ser removido. Si existe cualquier problema, entonces la instalación vieja puede ser reinstalada renombrando los directorios.

Instrucciones de Instalación
----------------------------

1. Copia el directorio de YAMS en assets/modules/yams
2. Asegúrate de que el directorio assets/modules/yams es escribible por el usuario/grupo bajo el cual corre tu servidor. YAMS mantiene un archivo config llamado config.inc.php en el directorio que es automaticamente actualizado via la interfase del módulo.
3. Dentro de MODx bajo Elementos > Admin Elementos > Plugins crea un plugin nuevo:   
  **Nombre del Plugin:** YAMS   
  **Descripción:** Yet Another Multilingual Solution Plugin   
  **Código del Plugin:**```
  <pre class="brush: php">
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.plugin.inc.php');
  
  ```**Eventos del Sistema:** Favor de referirse al archivo readme.txt en el folder bajado de YAMS.
4. Dentro de MODx bajo Elementos > Admin Elementos > Snippets crea un snippet nuevo:**Nombre del Snippet:** YAMS   
  **Descripción:** Obtiene contenido multi-idioma.   
  **Código del Snippet:**```
  <pre class="brush: php">
  // La linea siguiente necesita ser insertada entre los marcadores de apertura
  // y cierre de PHP
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.snippet.inc.php' );
  
  ```
5. Dentro de MODx bajo Módulos>Admin Módulos crea un módulo nuevo:   
  **Nombre del Módulo:** YAMS   
  **Descripción:** Yet Another Multilingual Solution   
  **Código del Módulo:**```
  <pre class="brush: php">
  require_once( $modx->config['base_path'] . 'assets/modules/yams/yams.module.inc.php' );
  
  ```
6. Recarga la página para actualizar la vista del administrador. Si quieres usar el ManagerManager para obtener una interfase de documentos en pestañas, entonces sigue [las instrucciones de abajo](#InstalarYAMS-ManagerManagerSetup) para configuralo.
7. Sigue las instrucciones en [la página de configuración](/extras/evo/yams/yams-english-documentation/yams-setup "YAMS Setup") para configurar tu sitio multi-idiomas.

<a name="InstalarYAMS-ManagerManagerSetup"></a>Configurar ManagerManager
------------------------------------------------------------------------

Para configurar ManagerManager para obtener una interfase de documentos en pestaña, favor de hacer lo siguiente:

1. Checa que el plugin de ManagerManager esté instalado bajo Elementos > Admin Elementos > Plugins. Si no lo está, puede ser obtenido del [MODx repository](http://modxcms.com/extras/package/?package=255). La versión más nueva es generalmente recomendada, pero por favor atiendan los foros por cualquier reporte de problemas.
2. Modifica la configuración del plugin de ManagerManager para que sepa encontrar las reglas personalizadas de ManagerManager en un chunk llamado mm\_rules. En versiones nuevas esto puede ser configurado usando la pestaña de condiguración. En versiones más viejas esto se lleva a cabo incluyendo la línea siguiente en el código del plugin. ```
  <pre class="brush: php">
  $config_chunk = 'mm_rules';
  
  ```
3. Bajo Elementos > Admin Elementos > Chunks, crea un chunk llamado mm\_rules y añade la línea siguiente: ```
  <pre class="brush: php">
  require( $modx->config['base_path'] . 'assets/modules/yams/yams.mm_rules.inc.php' );
  
  ```Si ya estás usando reglas personalizadas de ManagerManager, entonces es aconsejable la línea requerida por YAMS al final de las reglas.

Configurar PHx
--------------

Si está usando el snippet PHx por favor nota lo siguiente. Por alguna razón, un archivo especificado usando include\_once es re-incluido y esto causa que la clase PHxParser sea redefinida, lo cual genera un error de parseo por PHP. Esto puede ser evitado modificando el snippet PHx al envolver el include en algún código que sólo incluya el archivo si la clase no ha sido definida todavía:

```
<pre class="brush: php">
if ( ! class_exists( 'PHxParser' ) )
{
 include_once $modx->config['rb_base_dir'] . "plugins/phx/phx.parser.class.inc.php";
}

```También, por favor recuerda que el Orden de Ejecución de Plugins de be de ser editado poiendo YAMS in primer lugar - esto es antes de PHx - en todos los eventos asociados.