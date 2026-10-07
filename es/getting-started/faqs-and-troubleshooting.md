---
title: "Preguntas frecuentes y solución de problemas"
sortorder: 2
_old_id: "1689"
_old_uri: "2.x/faqs-and-troubleshooting"
translation: "getting-started/faqs-and-troubleshooting"
---

Preguntas frecuentes y soluciones rápidas para MODX 3. ¿Sigues atascado? Pregunta en la [Comunidad MODX](https://community.modx.com) o en [Slack](https://modx.org).

## Solución de problemas relacionada

- [Solución de problemas de instalación](getting-started/installation/troubleshooting)
- [Solución de problemas de actualizaciones](getting-started/maintenance/upgrading/troubleshooting)
- [Solución de problemas de gestión de paquetes](building-sites/extras/troubleshooting)
- [Solución de problemas de seguridad](building-sites/client-proofing/security/troubleshooting-security)
- [Preguntas frecuentes y solución de problemas de desarrollo de CMP](extending-modx/custom-manager-pages/troubleshooting)

## 1. MODX 101

### 1.1. ¿Qué es MODX / MODX Revolution / MODX Evolution?

En foros y búsquedas verás varios nombres de producto. Mapa corto:

- **MODX** / **MODX Revolution 3.x** — el CMS documentado aquí; las versiones actuales son **3.x**. Conceptos: [Descripción general de MODX](getting-started/what-is-modx).
- **MODX Revolution 2.x** — la generación anterior de Revolution. Muchos sitios en producción siguen en 2.x. La actualización a 3.x es posible con planificación; guía en inglés: <https://docs.modx.com/3.x/en/getting-started/upgrading-to-3.0>.
- **MODX Evolution** — una línea **1.x** separada y antigua, no cubierta por estos documentos de 3.x. Migrar de ella es un proyecto; no hay actualización de un solo clic. Notas históricas en inglés: <https://docs.modx.com/3.x/en/getting-started/maintenance/upgrading/evolution>.

### 1.2. ¿Qué versión de PHP / servidor necesito?

Ver [Requisitos del servidor](getting-started/server-requirements). MODX 3.x (**3.2 y posteriores**) requiere **PHP 8.1 o superior**; antes de 3.2: PHP 7.2.5+ (3.0), PHP 7.4+ (3.1).

### 1.3. ¿Qué etiquetas puedo usar? ¿Qué es `[[*pagetitle]]`, `[[Wayfinder]]`, etc.?

Ver [Sintaxis de etiquetas](building-sites/tag-syntax). Los campos de recursos usables en etiquetas están en [Recursos](building-sites/resources).

## 2. El Manager

### 2.1. ¡Ayuda! ¿A dónde fue la barra lateral / el árbol de recursos?

Probablemente la colapsaste: haz clic en la pequeña flecha del borde izquierdo de la pantalla ([ver esta imagen](subtlearrow.PNG)) para restaurar el árbol. Actualiza la página si sigue vacío tras expandirlo.

### 2.2. ¿Cómo cambio qué campos de recurso están visibles al editar?

Usa la [Personalización de formularios](building-sites/client-proofing/form-customization) para ocultar, renombrar o reorganizar campos en las pantallas de creación/edición de recursos (y limitar reglas a ciertos grupos de usuarios o plantillas).

### 2.3. ¿Qué significan modDocument / modWeblink / modSymLink / modStaticResource?

Nombres de clase de los tipos de recurso integrados (en 3.x viven en el espacio de nombres `MODX\Revolution\`; los nombres cortos siguen siendo comunes). Todos aparecen en el Árbol de recursos:

- [Documentos](building-sites/resources) (clase `modDocument`): páginas normales con contenido. A menudo se dice «Recurso» cuando se quiere decir un Document.
- [Weblinks](building-sites/resources/weblink): redirigen a otro recurso o a una URL externa
- [Symlinks](building-sites/resources/symlink): reutilizan el contenido de otro documento en otra URL
- [Recursos estáticos](building-sites/resources/static-resource): el contenido viene de un archivo del sistema de archivos

### 2.4. ¿Cuál es la diferencia entre un Recurso y un Documento?

Un Recurso (`modResource`) es la clase base; un Documento (`modDocument`) es la página HTML habitual. En el uso cotidiano, «Recurso» suele significar «esa página del árbol»: un Documento, Weblink, Symlink o Recurso estático.

### 2.5. No puedo entrar al manager / olvidé mi contraseña

Ver [Restablecer una contraseña de usuario manualmente](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually).

### 2.6. Error 500 Internal Server Error en el manager

Prueba primero:

1. Borra o renombra `core/cache/` (una caché corrupta es una causa frecuente).
2. Abre el manager en una ventana privada/incógnita (descarta cookies/sesiones defectuosas).
3. Confirma que PHP cumple los [Requisitos del servidor](getting-started/server-requirements) de tu versión de MODX.
4. Revisa `core/cache/logs/error.log` para el error PHP real. (Si el sitio define un logger PSR-3 propio con `modX::setLogger()`, los errores van allí.)

Más casos de instalación: [Solución de problemas de instalación](getting-started/installation/troubleshooting).

### 2.7. El manager está en blanco / muestra «undefined» / diseño roto

Carga fallida de JS/CSS o una caché mala. Borra `core/cache/`, fuerza la actualización del navegador y consulta la lista de la comunidad: [Blank manager with undefined message](https://community.modx.com/t/blank-manager-with-undefined-message/3799/20). También ver [Solución de problemas de instalación](getting-started/installation/troubleshooting) (incluido desactivar `compress_js` / `compress_css` si las URL de recursos fallan).

## 3. Problemas de frontend y caché

### 3.1. Páginas en blanco en el frontend que se recuperan al borrar la caché

En algunos hosts (sobre todo cloud/shared), el bloqueo de archivos al escribir la caché puede dejar páginas en blanco o errores 500 tras guardar hasta que borres `core/cache/`.

En `core/config/config.inc.php`, desactiva flock añadiendo `use_flock` a `$config_options` con valor `false`:

``` php
$config_options = array(
    'use_flock' => false,
);
```

(Combínalo con las entradas `$config_options` existentes en lugar de reemplazarlas.) Con `use_flock` desactivado, MODX usa lock files en `core/cache/locks/` en lugar de bloqueo de archivos.

### 3.2. Un Snippet o Plugin no hace nada

Confirma que está instalado y activado (Extras → Installer / el árbol de elementos), que el nombre de la etiqueta coincide y que limpiaste la caché tras instalarlo o editarlo. Las páginas en caché siguen sirviendo la salida antigua hasta que la borres.

## 4. Actualización

### 4.1. ¿Cómo actualizo dentro de 3.x, o de 2.x a 3.x?

Sigue [Actualización de MODX](getting-started/maintenance/upgrading). Para un salto de 2.x a 3.x, lee antes [Actualización de 2.x a 3.0](getting-started/upgrading-to-3.0): cambian los espacios de nombres de clases, los procesadores, la ruta del core y los requisitos de PHP. **3.2+ necesita PHP 8.1+**.
