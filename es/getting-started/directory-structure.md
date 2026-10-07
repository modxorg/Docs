---
title: "Explicación de la Estructura de Directorios"
sortorder: 6
_old_id: "108"
_old_uri: "2.x/getting-started/an-overview-of-modx/glossary-of-revolution-terms/explanation-of-directory-structure"
translation: "getting-started/directory-structure"
---

Distribución típica de nivel superior tras la instalación:

| Ruta | Propósito |
|---|---|
| `index.php` | Front controller del contexto web |
| `ht.access` | Plantilla de reescritura de Apache; renómbralo a `.htaccess` para URL amigables |
| `composer.json` | Dependencias PHP, se instalan en `core/vendor/` |
| `connectors/` | Puntos de entrada de solicitudes AJAX |
| `core/` | Código de la aplicación, configuración, caché, paquetes, librerías vendor |
| `manager/` | Interfaz del Manager (back-end) |
| `setup/` | Instalador y actualizador; elimínalo tras instalar o actualizar |
| `_build/` | Construye el paquete de transporte del core (solo checkouts de Git) |
| `assets/` | Archivos front-end de medios y de los Extras |

`core/` debe permanecer en `/core/` en la raíz del proyecto: no se puede mover ni renombrar en 3.x. Los directorios `manager/` y `connectors/` se pueden renombrar durante una [Instalación avanzada](getting-started/installation/advanced). Ver también [Cambios de la carpeta core en 3.0](getting-started/upgrading-to-3.0/core-folder).

## connectors/

Los conectores son puntos de entrada HTTP para solicitudes AJAX del Manager y otras. Cada conector carga MODX, sanitiza la solicitud y la entrega a un [Procesador](extending-modx/processors). Nunca modifica la base de datos por sí mismo.

En 3.x, la mayoría del tráfico del Manager pasa por `connectors/index.php` con un parámetro `action` (por ejemplo `Resource/Create`). El action se resuelve en una clase bajo `core/src/Revolution/Processors/`.

### Archivos destacables

- **connectors/index.php** - bootstrap principal del conector. Los conectores personalizados suelen incluir este archivo (o replicar su bootstrap) y luego llamar a `$modx->request->handleRequest()`.
- **connectors/config.core.php** - creado por el instalador; apunta a la ruta del core y la clave de configuración.
- **connectors/system/** - algunos endpoints de conector dedicados al sistema siguen siendo scripts separados.

## core/

Todo lo que hace funcionar a MODX, excepto la interfaz del Manager y el setup.

### core/vendor/

Creado por `composer install` y incluido en los paquetes tradicionales. Aquí viven las librerías de terceros: xPDO, Smarty, Flysystem, Guzzle, PHPMailer. El autoloader es `core/vendor/autoload.php`. No edites este árbol a mano; cambia las dependencias a través de Composer.

### core/src/

Raíz PSR-4 del espacio de nombres `MODX\` (`"MODX\\": "core/src/"` en `composer.json`).

#### core/src/Revolution/

Clases del core con espacio de nombres (`MODX\Revolution\...`): el servicio `modX`, objetos del modelo, servicios, controladores del Manager y componentes relacionados.

| Directorio | Contenido |
|---|---|
| `Processors/` | Manejadores de solicitudes llamados a través de conectores, agrupados por área: `Browser/`, `Context/`, `Element/`, `Model/`, `Resource/`, `Search/`, `Security/`, `SoftwareUpdate/`, `Source/`, `System/`, `Workspace/` |
| `Controllers/` | Controladores de páginas del Manager |
| `Services/` | Servicios compartidos (cliente HTTP y otros en el contenedor MODX) |
| `Transport/` | Construcción/instalación de paquetes de transporte |
| `Sources/` | Controladores de fuentes de medios |
| `Smarty/` | Integración con Smarty (`modSmarty`) |
| `mysql/` | Archivos de mapa/clase xPDO específicos de MySQL para objetos del core |
| `Error/`, `Exceptions/` | Clases de errores y excepciones |
| `File/` | Utilidades y manejadores de archivos |
| `Filters/` | Filtros de entrada/salida |
| `Formatter/` | Formateadores de datos |
| `Hashing/` | Hashing y operaciones con contraseñas |
| `Mail/` | Envío de correo |
| `Registry/` | Almacenamiento del registro (comunicación vía conectores) |
| `Rest/` | Servidor API REST |
| `Security/` | Autenticación y control de acceso |
| `Validation/` | Validación de datos |

### core/model/

Reservado principalmente para el **esquema** XML y una carga ligera de compatibilidad hacia atrás.

- **core/model/schema/** - esquemas XML usados para generar mapas y clases durante el desarrollo (`modx.mysql.schema.xml`, esquemas de transport/sources, archivos relacionados). No se leen en cada petición del front-end.
- **core/model/modx/modx.class.php** - carga ligera que incluye el autoloader de Composer para rutas de include antiguas.

Las clases del modelo y los procesadores en runtime viven en `core/src/Revolution/`, no en el árbol antiguo de 2.x bajo `core/model/modx/`.

### core/include/

- **deprecated.php** - funciones de compatibilidad para APIs obsoletas de la era 2.x cuyos alias todavía existen.

### core/cache/

MODX reconstruye la caché bajo demanda, así que limpiar `core/cache/` es seguro. Escribe entradas de registro con `$modx->log()`; van a `core/cache/logs/` (`error.log`).

La caché del contexto `web` guarda ajustes de contexto sobreescritos, recursos y elementos, por ejemplo `cache/web/resources/12.cache.php`.

| Directorio | Contenido |
|---|---|
| `system_settings/` | Ajustes del sistema |
| `context_settings/` | Ajustes de contextos |
| `auto_publish/` | Próximos horarios de autopublicación/despublicación |
| `lexicon_topics/` | Temas del léxico |
| `namespaces/` | Espacios de nombres |
| `scripts/` | Scripts compilados de snippets y chunks |
| `includes/` | Archivos include compilados |
| `elements/` (en `scripts/`, `includes/`) | Elementos compilados |
| `menu/` | Menú del Manager |
| `mgr/` | Caché del contexto Manager |
| `registry/` | Estado del registro |
| `rss/` | Fuentes RSS |
| `logs/` | Archivos de registro |

Archivos destacables:

- **core/cache/system_settings/config.cache.php** - [Ajustes del sistema](building-sites/settings) en caché. Limpiar `core/cache/` fuerza una reconstrucción desde la base de datos.
- **core/cache/auto_publish/auto_publish.cache.php** - almacena el horario del próximo evento de autopublicación/despublicación por recurso; no es una caché del contenido del sitio.

### core/components/

Si un Extra distribuye PHP que no debe ser accesible desde la web (procesadores, código de modelo, archivos privados), vive en `core/components/<package>/`. No todo paquete tiene una carpeta core; depende del paquete.

### core/config/

`config.inc.php` contiene las credenciales de la base de datos, rutas y opciones relacionadas; el instalador lo crea y actualiza. Mantén el archivo privado y haz copias de seguridad.

### core/docs/

Changelog (`changelog.txt`), texto de la licencia y `version.inc.php`.

### core/error/

Plantillas de páginas de error para fallos graves donde MODX no puede ejecutarse.

### core/export/ y core/import/

Destinos de las herramientas de exportación/importación HTML del Manager y de los Extras: `export/` para la salida, `import/` para los archivos que colocas allí para importar.

### core/lexicon/

Temas de léxico basados en archivos organizados por código de cultura (`core/lexicon/en/`); cada tema es un archivo como `default.inc.php`. La Gestión del Léxico guarda las entradas editadas en la base de datos.

Carga un tema en código con:

``` php
$modx->lexicon->load('lang:namespace:topic');
```

| Parámetro | Significado |
|---|---|
| `lang` | Clave de cultura opcional; por defecto la cultura actual, a menudo `en` |
| `namespace` | `core` para las cadenas integradas, o el espacio de nombres de un Extra |
| `topic` | Nombre del archivo del tema sin `.inc.php` |

### core/packages/

[Paquetes de transporte](extending-modx/transport-packages) descargados y construidos, incluido `core.transport.zip` que usa el instalador. Gestión de Paquetes lee y escribe aquí.

## manager/

### manager/assets/

Recursos front-end de la interfaz del Manager:

- **ext3/** - librerías Ext JS 3 usadas por el Manager
- **modext/** - capa ModExt y widgets del Manager sobre Ext JS
- **lib/**, **fileapi/** - librerías JS de apoyo

### manager/controllers/

Scripts PHP de entrada que arrancan las páginas del Manager (tema por defecto: `manager/controllers/default/`). Preparan datos y registran componentes Ext JS / ModExt; la lógica más pesada vive en `core/src/Revolution/Controllers/`.

Los subdirectorios corresponden a las áreas del Manager: `browser/`, `context/`, `dashboard/`, `element/`, `media/`, `resource/`, `security/`, `source/`, `system/`, `workspaces/`.

### manager/templates/

Plantillas Smarty de las páginas del Manager en `manager/templates/default/`: HTML y Smarty, no lógica de negocio en PHP.

Los subdirectorios reflejan los controladores, más `css/`, `js/`, `images/`, `fonts/` y plantillas `email/` compartidos.

### Archivos destacables

- **manager/index.php** - front controller del Manager
- **manager/config.core.php** - creado por el instalador; apunta al core

## setup/

El instalador incluye sus propios directorios `controllers/`, `processors/`, `templates/`, `lang/`, `includes/`, `assets/` y `provisioner/`, más una entrada CLI (`cli-install.php`). Ver [Instalación](getting-started/installation) e [Instalación desde la línea de comandos](getting-started/installation/cli).

Como precaución de seguridad, el instalador deja un directorio `.locked` tras su uso. Se niega a ejecutarse mientras ese directorio exista.

## \_build/

Construye `core/packages/core.transport.zip` con `php _build/transport.core.php` después de instalar las dependencias de Composer. No es necesario en sitios de producción instalados desde un paquete tradicional. Ver [Instalación desde Git](getting-started/installation/git).

## assets/

Un checkout mínimo del core no crea el directorio por defecto; las instalaciones tradicionales y casi todos los sitios lo usan.

### assets/components/

Archivos de Extras accesibles desde la web (JS, CSS, imágenes) instalados por Gestión de Paquetes, normalmente espejados con `core/components/<package>/`.

## Relacionado

- [Requisitos del servidor](getting-started/server-requirements)
- [Endurecer MODX](getting-started/maintenance/securing-modx) (bloquear el acceso público a `core/` y rutas relacionadas)
- [Actualización de 2.x a 3.0](getting-started/upgrading-to-3.0) (espacios de nombres, procesadores, ruta fija del core)
