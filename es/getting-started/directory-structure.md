---
title: "Explicación de la Estructura de Directorios"
_old_id: "108"
_old_uri: "2.x/getting-started/an-overview-of-modx/glossary-of-revolution-terms/explanation-of-directory-structure"
---

El directorio raíz de MODX se divide en varios subdirectorios, cada uno con su propio conjunto de responsabilidades y tareas. Algunos de estos directorios se pueden renombrar y mover, y sus ubicaciones se pueden configurar durante el proceso de ajustes.

## connectors/

Los conectores son, esencialmente, puntos de entrada para solicitudes AJAX en MODX. No hacen ninguna manipulación de la base de datos por su cuenta; simplemente cargan la clase MODX principal, sanitizan cualquier dato de la solicitud y luego manejan la solicitud apuntando al archivo del procesador apropiado.

Por ejemplo, cuando creamos un recurso, solicitamos connectors/resource/index.php?Action=create. El archivo index.php incluirá el archivo de conector base (Connectors/index.php) que crea una instancia del objeto MODX principal, manejará cualquier cambio personalizado de [Contexto](building-sites/contexts "Contexts"), y sanitizará la peticion GET o POST. El archivo `connectors/resource/index.php` "manejará" la solicitud y llamará al archivo de procesador correcto, lo cual discutiremos más adelante.

### Archivos Destacables

- **connectors/index.php**- Este archivo es especialmente útil en la creación de tus propios conectores. Simplemente incluye este archivo en tus conectore, y entonces maneja las solicitudes usando  `$modx->request->handleRequest()`;

## core/

El Core (`núcleo`) es lo que hace que MODX sea MODX. Es la base de todas las librerias en Revolution. Casi todo lo que necesita, a excepción de los archivos del administrador y los archivos de configuración, se encuentran en este directorio.

### core/cache/

El directorio de caché contiene todos los archivos de caché generados por MODX. MODX genera datos bajo demanda, elementos, recursos, RSS y Smarty, lo que significa que solo se almacenan en caché después de acceder por primera vez.

#### core/cache/logs/

Todo el registro de actividad en MODX se realiza aquí. Aquí encontrarás el archivo error.log, que contiene la fecha, la hora, el archivo y el error que MODX registró.

Para registrar una entrada en este archivo, puede usar el método `$modx->log ()`.

#### core/cache/mgr/

Este directorio contiene datos de caché para el contexto mgr (Manager). Al igual que la caché de cada contexto, almacenará en caché cualquier configuración de contexto que se haya cambiado de su configuración predeterminada del sistema.

#### core/cache/rss/

Una caché de cada fuente RSS en MODX.

#### core/cache/web/

El caché en MODX Revolution está dividido en varias partes. Cada contexto (por ej. web y mgr) tiene un archivo context.cache.php. Este es un archivo como el config.cache.php, excepto que solo almacena en caché la configuración que se ha modificado de los Ajustes de sistema predeterminados. Cualquier ajuste de contexto puede invalidar su homónimo ajuste de sistema.

Además, el caché de contexto web contendrá directorios separados para recursos y elementos. Un recurso con ID 12 se encontrará en `cache/web/resources/12.cache.php`. Este nuevo mecanismo de almacenamiento en caché significa que los tiempos de carga disminuirán y el límite en el número de recursos almacenables en caché desaparecerá.

### core/components/

Cuando instalas un paquete utilizando el [Administrador de Paquetes](extending-modx/transport-packages "Package Management"), un directorio `core/components/ /` se creará para contener los archivos necesarios para que se ejecute el componente instalado. Por lo general, todos los archivos necesarios para ejecutarse en el Administrador, como controladores, datos de modelo/esquema, procesadores y archivos de clase, deben almacenarse aquí, así como cualquier archivo que no se desee que sea accesible desde la web.

### core/config/

Este directorio contiene el archivo de configuración de MODX Revolution. Configura las credenciales de la base de datos y una serie de constantes MODX \ _ para el correcto funcionamiento del sitio.

### core/docs/

Este directorio contiene el archivo changelog.txt, la licencia GPL y cualquier tutorial que se haya creado para Revolution.

### core/error/

Contiene plantillas predeterminadas para mensajes de respuesta de error en el front-end de Revolution. Puedes personalizar esas páginas aquí.

### core/export/

Después de ejecutar la función Exportar en MODX Revolution, los archivos HTML exportados para su sitio se ubicarán aquí.

### core/import/

Para ejecutar la función Importar en MODX Revolution, debes mover tus archivos HTML a este directorio.

### core/lexicon/

En Revolution, los archivos de léxico se dividen en directorios separados, dependiendo de su código IANA de dos dígitos (por ejemplo, los léxicos en inglés se almacenan en `/core/lexicon/en/`). Dentro de estos subdirectorios hay varios archivos, en el formato "tema.inc.php". Un "tema" es simplemente un archivo de léxico único. Dividir los léxicos en temas significa que solo se cargan las cadenas `_required_language`, ahorrando memoria y tiempo de carga.

Todos los léxicos se almacenan en la base de datos MODX y luego se almacenan en caché a pedido. Esto permite gestionar los léxicos directamente desde el Administrador, dentro del área \[Administración del Idioma\].

Para cargar un léxico, se usaría un formato como este:

``` php
$modx->lexicon->load( 'lang:namespace:topic' );
```

\# **lang**- el código IANA de 2 dígitos. Este es opcional, y por defecto es 'en'.

1. **namespace**- Cada léxico tiene su [Espacio de nombres](extending-modx/namespaces "Namespaces"). El espacio de nombres para MODX es "core". Los creadores de paquetes también podrán crear un espacio de nombres personalizado, y los usuarios del Manager también pueden crear sus propios espacios de nombres.
2. **topic**- El archivo del tema específico que se quiere cargar.

### core/model/

Aquí estás el modelo. ¿Y qué es un modelo, dirás? Bueno, es la M en MVC (model-view-controller), que es un paradigma OO que establece que debe haber al menos tres partes en una aplicación. El modelo, que contiene la estructura de la base de datos y los enganches ("hooks") en ella; la Vista, que es la parte GUI de la aplicación que no contiene lógica, solo presentación; y los Controladores, que conectan el modelo a la vista.
Por lo tanto, MODX hace un modelo similar. Realmente hacemos un modelo MVC/C, en el que agregamos un punto de acceso de conector y procesadores al modelo. Lo explicaremos a medida que nos acerquemos a ello. Lo que necesitas saber es que el modelo contiene todas las clases de PHP que ejecutan Revolution, incluidos los procesadores que manejan funciones específicas, como guardar fragmentos, eliminar fragmentos, etc.

### core/model/modx/

"¡Espera! ¡Pensé que ya estábamos en un directorio modx? ¿Por qué otro subdirectorio modx?" Buena pregunta. Bueno, MODX Revolution usa xPDO para la gestión de su base de datos.xPDO utiliza la idea de 'paquetes' para diferentes conexiones a diferentes modelos. Entonces, si yo quisiera crear mis propias tablas personalizadas, crearía un nuevo paquete xPDO y lo agregaría en tiempo de ejecución. De esta manera, podría usar los mapas y las clases creadas sin tener que modificar el núcleo MODX. Esto se explica en el tutorial [Crear un componente de terceros](extending-modx/tutorials/developing-an-extra "Escribir un componente de terceros en MODX Revolution, Pt. I").

Dicho esto, se puede inferir que el directorio core/model/modx se refiere al paquete "modx". Si entras verás un montón de clases. Estas son las clases que son xPDOObjects, que son clases PHP que representan tablas en el DB (es decir, modsnippet.class.php es una clase PHP que es un objeto de modx\_site\_snippets ), o son clases funcionales, como `modcachemanager.class.php`.

Los subdirectorios en esta carpeta - sin incluir mysql o processors - are subcategories of classes, son subcategorías de clases, que se cargan como: `$modx->loadClass('transport.modPackageBuilder');` con "." como separación de directorios.

#### core/model/modx/mysql/

Este directorio contiene los archivos de clase y mapa para cada objeto xPDO. Los mapas son simplemente matrices PHP que contienen la estructura de la tabla de la base de datos a la que hacen referencia.

Otras plataformas de bases de datos como pgsql, mssql y otras también aparecerían aquí.

##### core/model/modx/processors/

Este directorio contiene los archivos de procesador individuales utilizados en la manipulación de la base de datos. Nunca se accede directamente; en su lugar se accede a través de conectores. Esto permite bloquearlos para evitar el acceso no autorizado.

#### core/model/schema/

El esquema es la representación XML de la base de datos MODX. Esto se usa en la construcción de nuevos mapas y clases, pero en realidad nunca se lee o analiza cuando se ejecuta MODX. En principio, puedes ignorar este directorio, ya que se utiliza principalmente para trabajos de desarrollo. El tutorial [Crear componentes de terceros](extending-modx/tutorials/developing-an-extra "Escribir un componente de terceros en MODX Revolution, Pt. I") te explicará más acerca de los esquemas.

#### core/model/smarty/

Este directorio contiene las bibliotecas Smarty. Es simplemente una extracción de los archivos Smarty que puedes obtener de <http://smarty.php.net>. Nada en esta carpeta está personalizado para MODX, eso sucede en otros lugares.

Smarty es un motor de plantillas inteligente orientado a objetos que utiliza marcadores de posición dinámicos y modificables. La mayoría de las páginas vistas en el Administrador y durante la instalación son archivos de plantilla Smarty (.tpl) con los que MODX interactúa.

Cuando editas un recurso (a menudo un documento) en el Administrador, por ejemplo, estás viendo una página generada por el controlador en manager/controllers/resource/staticresource/update.php. Después de establecer las características del recurso en la matriz $resource, este código muestra la página:

``` php
$modx->smarty->assign('resource',$resource); return $modx->smarty->fetch('resource/staticresource/update.tpl');
```

Los marcadores de posición ("placeholders") de Smarty en update.tpl se completan con los datos contenidos en la matriz $resource.

### core/packages/

Aquí encontrarás los paquetes de transporte que hayas descargado a través de la sección [Administrador de Paquetes](extending-modx/transport-packages "Administración de Paquetes") de Revolution, como TinyMCE, Ditto, etc. El paquete principal también se encuentra aquí. Esto permite una fácil instalación y eliminación, así como la actualización remota de los paquetes instalados.
Cuando crea un paquete (por ejemplo, después de salir de SVN), el paquete de transporte se almacenará aquí.

### core/xpdo/

MODX Revolution fue diseñado para usar OpenExpedio (xPDO), una extensión de PDO. Proporciona una interfaz uniforme para manipular bases de datos y hace posible que MODX admita varias plataformas de bases de datos además de MySQL.

Este directorio contiene todos los archivos de clase que necesita xPDO para hacer todo, desde el almacenamiento en caché de consultas hasta la creación de paquetes de transporte y la salida de datos como un objeto JSON conveniente.
MODX utiliza estas clases internamente, y los desarrolladores nunca deberían necesitar tratarlas directamente.

### Archivos destacables

- **core/cache/config.cache.php** - Este es el archivo de caché para todas las [Configuraciones del sistema](building-sites/settings "System Settings") en MODX. Sus equivalentes en base de datos se encuentran en la tabla _system_settings, y sus equivalentes xPDO son objetos modSystemSetting.
    - **_Truco_** - Si alguna vez quedas bloqueado por el componente CAPTCHA, puedes editar este archivo y establecer _use _captcha_ en '0' para deshabilitar CAPTCHA. Luego puedes iniciar sesión y desactivar CAPTCHA en [Configuración del sistema](building-sites/settings "Configuración del Sistema").
- **core/cache/sitePublishing.idx.php** - En Revolution, este archivo ahora realiza un seguimiento de los intervalos de actualización de caché.

- **core/cache/mgr/actions.cache.php** - Un mapa de todos los objetos modAction.

## manager/

El Manager es el back-end modX o área de administración para crear recursos, administrar usuarios y realizar tareas generales de mantenimiento del sitio.

### manager/assets/

Este directorio contiene las librerías [ExtJS](http://extjs.com/), así como la implementación personalizada de ModExt. ModExt amplía la biblioteca ExtJS original, para hacer el desarrollo más conveniente para los usuarios.

### manager/controllers/

Los controladores son los archivos PHP vinculados a modActions. Simplemente, capturan datos y los devuelven o envían al navegador para su representación y visualización. Cada vez que cargues una página en el Manager, en efecto, le estás diciendo a MODX que cargue un controlador en particular, el cuál simplemente carga una plantilla Smarty y envía cualquier JavaScript necesario al navegador.

### manager/templates/

Este directorio contiene los archivos de plantilla para cada página del administrador. No contienen código PHP, sino que se utilizan para organizar HTML. Si está buscando el archivo Smarty .tpl para una página de administrador en particular, comprueba el directorio manager/templates/default/.

### Archivos destacables

- **manager/assets/ext2/ext-all.js** - Este es el archivo principal de la biblioteca Ext, que debe incluirse en todas las páginas del Manager (o cualquier página que utilice Ext). Se comprime para ahorrar espacio, reducir el tiempo de descarga y acelerar las cargas de páginas. Sin embargo, si estás realizando un montón de trabajo de JavaScript, estás expuesto a sufrir algunos errores crípticos debido a la compresión. La mejor manera de lidiar con esto, es simplemente cambiar el nombre del archivo ext-all.js a ext-all-debug.js para usar la versión sin comprimir durante el desarrollo. ¡Asegúrate de cambiarlos después!

## setup/

Este directorio contiene los archivos necesarios para ejecutar el programa de instalación y realizar una [Instalación nueva](getting-started/installation "Nueva Instalación") o una Actualización.

## \_build/

Este directorio solo está presente en la versión de MODX Revolution descargada desde el servidor de subversion (así como en la distribución "SDK"). Contiene los archivos de datos principales MODX empaquetados necesarios para instalar MODX en una base de datos.

### Archivos destacables

- **\_build/transport.core.php** - Este archivo debe ejecutarse después de descargar MODX Revolution y antes de ejecutar el programa de instalación. Después de la finalización, debe aparecer un directorio "core" dentro del directorio core/packages/, que contendrá todos los valores necesarios para instalar MODX Revolution.

## assets/

Este directorio no está presente en MODX Revolution de forma predeterminada, pero es común colocar imágenes, CSS, JavaScript y otros medios aquí.

### assets/components/

Al instalar un paquete mediante el [Administrador de paquetes](extending-modx/transport-packages "Administración de Paquetes"), se creará un directorio assets/components/ que contendrá los archivos de componentes necesarios, así como JavaScript o imágenes.
