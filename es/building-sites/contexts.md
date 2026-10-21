---
title: "Contextos"
description: "Contextos en MODX: cómo anulan los ajustes del sistema, cómo crear uno, cómo se concede el acceso y la API, los eventos y los procesadores que hay detrás."
---

Un Contexto es un conjunto con nombre de anulaciones de configuración sobre el que se ejecuta una petición: sus propios ajustes, su propia rama del árbol de recursos y sus propias reglas de acceso.

MODX incluye dos contextos: `web` (Website) para el front end y `mgr` (Manager) para el gestor. Un contexto se direcciona por su **clave**, el valor que se pasa a `initialize()` y a `switchContext()`. El **nombre** es solo una etiqueta para la interfaz.

## Creando un contexto

Los contextos se gestionan en el gestor: **Admin** (el engranaje del menú superior) → **Contexts** (`?a=context`). El botón **Create** abre un formulario con cuatro campos:

| Campo | Obligatorio | Significado |
| --- | --- | --- |
| `key` | sí | el identificador del contexto |
| `name` | sí | la etiqueta que se muestra en el gestor y en el árbol de recursos |
| `description` | no | texto libre |
| `rank` | no | el orden del contexto en el árbol |

Las claves `mgr`, `web` y `root` están reservadas por el núcleo.

Un contexto nuevo recibe acceso de inmediato: el grupo de usuarios **Administrator** recibe la política *Context* y el usuario anónimo la política *Load Only*, el derecho `load` y nada más. La entrada del usuario anónimo aparece como **(anonymous)** en la pestaña **Access Permissions** del contexto, y quitarla ahí retira ese acceso.

Los contextos aparecen en el árbol de recursos como una rama propia. Los recursos se mueven entre contextos arrastrándolos.

## Ajustes de contexto

Los ajustes de un contexto anulan los [Ajustes del Sistema](/current/en/building-sites/settings) del mismo nombre, y los ajustes de un usuario anulan los del contexto. El orden es:

```
Ajuste del sistema → Ajuste del contexto → Ajuste del usuario
```

Un ajuste de contexto se edita en la pestaña **Context Settings**: **Contexts** → clic derecho en un contexto → **Edit**. Cambiar un ajuste borra la caché de ese contexto, así que no hace falta limpiar la caché a mano.

Los ajustes que un contexto suele anular:

| Ajuste | Qué cambia |
| --- | --- |
| `base_url` | la parte de ruta de las URL del contexto |
| `http_host` | el host para el que se construyen las URL |
| `site_url` | la URL completa del contexto: esquema, host y ruta |
| `site_start` | el recurso que abre el contexto |
| `cultureKey`, `locale` | el idioma y la configuración regional de la petición |

Los ajustes de sesión configuran la cookie de sesión del contexto y conservan los valores del núcleo salvo que el contexto los anule:

| Ajuste | Valor por defecto |
| --- | --- |
| `session_name` | vacío — PHP conserva el suyo |
| `session_cookie_path` | `MODX_BASE_URL`, o el ajuste `base_url` cuando está definido |
| `session_cookie_domain` | vacío |
| `session_cookie_secure` | `false` |
| `session_cookie_httponly` | `true` |
| `session_cookie_samesite` | vacío |
| `session_cookie_lifetime` | `0` |

## Acceso al contexto

El acceso a un contexto se concede por grupo de usuarios en la pestaña **Contexts** del panel de acceso: el icono del candado en el menú de usuario → **Access Control Lists** → un grupo de usuarios → **Access Permissions** → **Contexts**.

Una política sobre un contexto decide cuál de las cinco áreas de acceso se aplica: Context, Resource Group, Element Category, Media Source y Namespace. Una política sin área cubre el contexto mismo.

## Leyendo ajustes de contexto

Un ajuste del contexto actual se lee como cualquier otro ajuste; el nivel del que procede no es visible para quien lee:

``` php
[[++my_context_setting]]
```

``` php
$setting = $modx->getOption('my_context_setting');
```

El ajuste de un contexto concreto se lee de ese contexto:

``` php
$setting = $modx->context->getOption('my_context_setting');
$setting = $modx->getContext('web')->getOption('my_context_setting');
```

El idioma de una petición se toma de la primera fuente que tenga valor:

1. el parámetro `cultureKey` de la petición
2. el `cultureKey` de la sesión
3. el `cultureKey` del contexto
4. el ajuste del sistema `cultureKey`

El código solo admite en un `cultureKey` los caracteres `A-Z`, `a-z`, `0-9`, `_` y `-`.

## Elegir un contexto durante la petición

Una petición empieza en el contexto que indique la puerta de entrada. Dos mecanismos lo cambian:

- el archivo `config.context.php` junto a `index.php` — el archivo devuelve la clave del contexto en el que empieza la petición. Ver [Servir un segundo dominio](/current/en/building-sites/contexts/virtual-host);
- un Plugin en el evento `OnHandleRequest` que llame a `switchContext()`. Ver [Uso de un Plugin de puerta](/current/en/building-sites/contexts/gateway-plugin).

El método que cambia el contexto:

``` php
if ($modx->switchContext('domain2')) {
    // la petición continúa en el contexto "domain2"
}
```

`switchContext($contextKey, $reload = false)` devuelve `false` cuando el contexto no se cargó, así que conviene comprobar el resultado.

Cambiar el contexto **no** carga un manejador de sesión propio: lo define la puerta de entrada, ver [Uso de un Plugin de puerta](/current/en/building-sites/contexts/gateway-plugin).

## Eventos

| Evento | Cuándo se dispara |
| --- | --- |
| `OnContextInit` | se carga un contexto: en cada petición y en cada `switchContext()` |
| `OnContextBeforeSave` | antes de guardar un contexto |
| `OnContextSave` | después de guardar un contexto |
| `OnContextUpdate` | se actualiza un contexto en el gestor |
| `OnContextBeforeRemove` | antes de eliminar un contexto |
| `OnContextRemove` | después de eliminar un contexto |
| `OnContextFormPrerender` | antes de dibujar el formulario de un contexto |
| `OnContextFormRender` | después de dibujar el formulario de un contexto |

Los eventos de MODX 2 que se citan a menudo en material antiguo — `OnContextSwitch`, `OnSiteInit`, `OnSiteRender`, `OnManagerInit` y `OnBeforeRequest` — no existen en MODX 3.

## Ajustes del sistema

| Ajuste | Valor por defecto | Qué hace |
| --- | --- | --- |
| `default_context` | `web` | el contexto en el que se crean los recursos nuevos |
| `access_context_enabled` | `true` | comprueba el acceso a un contexto en cada petición; desactivarlo ignora todas las reglas de acceso a contextos |
| `allow_forward_across_contexts` | `false` | permite que un enlace simbólico y `sendForward()` lleguen a un recurso de otro contexto |
| `cache_context_settings` | `true` | cachea los ajustes de los contextos |
| `use_context_resource_table` | `true` | mantiene la tabla de recursos que pertenecen a varios contextos |
| `context_tree_sort` | `true` | ordena los contextos del árbol de recursos por nombre |
| `context_tree_sortby` | `rank` | el campo por el que se ordenan los contextos del árbol |
| `context_tree_sortdir` | `ASC` | la dirección de la ordenación |

## Procesadores

Los procesadores de los contextos y el permiso que necesita cada uno:

| Procesador | Permiso |
| --- | --- |
| `Context/Create` | `new_context` |
| `Context/Duplicate` | `new_context` |
| `Context/Get` | `view_context` |
| `Context/GetList` | `view_context` |
| `Context/Update` | `edit_context` |
| `Context/UpdateFromGrid` | `edit_context` |
| `Context/Remove` | `delete_context` |
| `Context/Setting/Create` | `settings` |
| `Context/Setting/Get` | `settings` |
| `Context/Setting/GetList` | `settings` |
| `Context/Setting/Remove` | `settings` |
| `Context/Setting/Update` | la política `save` del contexto |

`Context/Duplicate` copia los ajustes, las reglas de acceso y las fuentes de medios del contexto, y — con `duplicateResources=1` — también sus recursos.

## Fuentes de medios de un contexto

La fuente de medios de un elemento se puede fijar para un contexto concreto. El elemento usa la fuente de su propio contexto y conserva la fuente por defecto del elemento cuando el contexto no tiene ninguna.

## Un recurso en varios contextos

Un recurso pertenece normalmente a un contexto. Con `use_context_resource_table` activada, la tabla `context_resource` guarda los recursos que pertenecen a varios de ellos, y cada recurso así se encuentra en todos los contextos listados.

## Ver también

1. [Servir un segundo dominio](/current/en/building-sites/contexts/virtual-host)
2. [Uso de un Plugin de puerta](/current/en/building-sites/contexts/gateway-plugin)
3. [Ajustes del Sistema](/current/en/building-sites/settings)
4. [Listas de Control de Acceso](/current/en/building-sites/client-proofing/security/policies/acls)
