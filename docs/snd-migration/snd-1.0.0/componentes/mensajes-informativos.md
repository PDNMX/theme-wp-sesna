# Sistema Nacional de Diseño (SND) – Componente: Mensajes informativos (`alerts`)

- **Fuente:** https://www.snd.gob.mx/componentes/mensajes-informativos
- **Título de la página:** Mensajes informativos (alerts) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Permite comunicar de forma visible información relevante sobre el estado, resultado o progreso de una acción, proceso o sistema.

---

## 1. Descripción

Elemento visual y textual que informa sobre el estado, resultado o progreso de una acción, proceso o sistema. Puede ser informativo, de advertencia, de éxito o de error.

- **Información clara y relevante:** El mensaje debe comunicar una idea concreta de forma breve y comprensible. Utiliza un lenguaje sencillo y evita incluir información innecesaria que pueda dificultar la comprensión.
- **Usar el enlace de texto dentro mensaje:** Los enlaces de texto pueden incorporarse dentro de mensajes informativos. Como regla general, cuando el contexto lo requiera, pueden integrarse donde resulten útiles de acuerdo con la información.
- **Extensión del mensaje:** El mensaje debe contener únicamente la información necesaria para comunicar la idea con claridad. Evita textos demasiado extensos que dificulten su lectura o desvíen la atención del contenido principal. Su mensaje no debe superar los 350 caracteres.

A diferencia de la notificación flotante, el componente de mensajes informativos no puede cerrarse y permanece visible mientras la información sea relevante para la persona usuaria.

*(Imagen: `Aviso ejemplo en categoria exito`)*

### Tipos
- **Éxito:** Indica que una acción se realizó correctamente o que un proceso llegó a un resultado esperado. El mensaje de éxito deberá usar siempre el ícono "Estatus/Check-circle".
- **Informativo:** Comunica información relevante sobre una acción, proceso o cambio que la persona usuaria debe conocer. El mensaje informativo deberá usar siempre el ícono "Estatus/information".
- **Error:** Informa que una acción no pudo completarse o que ocurrió un problema durante un proceso. El mensaje de error deberá usar siempre el ícono "Estatus/Error".
- **Advertencia:** Se utiliza para comunicar una situación que requiere atención, especialmente cuando una acción es riesgosa o cuando existe una condición que la persona usuaria debe considerar. El mensaje de advertencia deberá usar siempre el ícono "Estatus/Warning".

### Estados
- **Por defecto (default):** Estado sin interacción de la persona usuaria.
- **Enfocado (focus):** Estado que indica que el mensaje se ha enfocado mediante navegación con teclado.

### Variaciones
*(4 imágenes con alt `Variaciones`)*

### Ejemplos de uso
*(Imagen: `Ejemplos de uso`)*

### Usos no permitidos
Para garantizar coherencia visual y claridad en la comunicación, se deben evitar los siguientes usos:
- No usar dos o más mensajes informativos juntos.
- El mensaje informativo no debe superar los 250 caracteres.
- Romper la coherencia visual del UI Kit, usando colores o formas distintas.
*(Imagen: `Usos no permitidos`)*

---

## 2. Diseño

### Anatomía
- **Mensajes:** Ancho: `345` | Radio de borde: `8`
- **Color de caja:** `rojo - 100`, `verde - 100`, `azul - 100`, `amarillo - 100`
- **Icono:** Depende de: `Estatus/Check-circle`
- **Texto principal:** Color de caja: `rojo - 500`, `verde - 500`, `azul - 500`, `amarillo - 500` | Estilo de texto: `Noto Sans/Body/B1R`
*(Imagen: `Anatomía de mensaje informativo en color verde`)*

### Construcción UI
- **Mensajes:** Dirección: `Horizontal` | Alineación: `Superior izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Ajustada` | Espaciado superior e inferior: `8` | Espaciado lateral izquierdo: `8` | Espaciado lateral derecho: `16`
- **Mensajes (bloque 2):** Dirección: `Horizontal` | Alineación: `Superior izquierda` | Re-dimensión vertical: `Comprimir` | Re-dimensión horizontal: `Llenar` | Espaciado inferior: `8`
*(Imágenes: `Texturas en color guinda`, `Texturas en color guinda`)*

### Accesibilidad
Para garantizar que los mensajes informativos puedan ser entendidos por todas las personas usuarias:
- El estado de los mensajes informativos no debe comunicarse únicamente mediante el color. Se deben utilizar iconos y texto para identificar claramente cada estado.
- Los enlaces de texto deben ser accesibles mediante el teclado y contar con un estado de enfoque para cuando estén seleccionados.
- El contenido debe aumentar de tamaño cuando la persona amplíe la pantalla mediante el zoom o las opciones de accesibilidad del dispositivo.

---

## 3. Desarrollo

### Utiliza un mensaje informativo en tu proyecto
Solo necesitas un `div` con la clase `.mensajeInformativo` y la clase de su tipo. El texto va directo dentro, con un máximo de 250 caracteres.

Para que funcione con teclado y lector de pantalla, agrega siempre estos atributos:
- `tabindex="0"` permite llegar al mensaje con el teclado. Al enfocarse muestra un borde del color del tipo.
- `role="note"` y `aria-roledescription="alerta"` hacen que se anuncie como “alerta” sin interrumpir al lector.
- `id` y `aria-labelledby` con ese mismo `id` hacen que se lea el texto completo. El `id` debe ser único en la página.

No requiere JavaScript propio. El mensaje no se cierra: permanece visible mientras la información sea útil.

### Mensajes de evento
Hay cuatro tipos: éxito, informativo, error y advertencia. Cada uno incluye por defecto su color y su icono, así que no necesitas agregar el icono en el HTML.

```html
<div id="mensaje-exito" class="mensajeInformativo mensajeInformativo--exito" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-exito">
  Tus datos se guardaron correctamente.
</div>
<div id="mensaje-informativo" class="mensajeInformativo mensajeInformativo--informativo" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-informativo">
  El trámite puede tardar hasta 5 días hábiles en procesarse.
</div>
<div id="mensaje-error" class="mensajeInformativo mensajeInformativo--error" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-error">
  No pudimos guardar tus datos. Inténtalo de nuevo más tarde.
</div>
<div id="mensaje-advertencia" class="mensajeInformativo mensajeInformativo--advertencia" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-advertencia">
  Una vez enviada la solicitud no podrás modificar tus datos.
</div>
```

### Con icono personalizado
Si necesitas otro icono, agrega una etiqueta `i` con la clase `snd__icono` al inicio del mensaje. Reemplaza al icono del tipo y toma su color.

```html
<div id="mensaje-personalizado" class="mensajeInformativo mensajeInformativo--informativo" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-personalizado">
  <i class="snd__icono snd-calendar" aria-hidden="true"></i>
  Tu cita está programada para el 15 de marzo a las 10:00 horas.
</div>
```

### Sin icono
Agrega `.mensajeInformativo--sinIcono` para quitar el icono. El texto ocupa todo el ancho.

```html
<div id="mensaje-sin-icono" class="mensajeInformativo mensajeInformativo--informativo mensajeInformativo--sinIcono" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-sin-icono">
  El trámite puede tardar hasta 5 días hábiles en procesarse.
</div>
```

### Con enlace de texto
Escribe el enlace dentro del texto, sin clases adicionales. Toma el color del tipo.

```html
<div id="mensaje-enlace" class="mensajeInformativo mensajeInformativo--informativo" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-enlace">
  Antes de iniciar, revisa los
  <a href="tramite/requisitos">
    requisitos del trámite
  </a>
  y ten a la mano tu identificación oficial.
</div>
```

### Mensajes que aparecen después de cargar la página
Si el mensaje ya está en el HTML al cargar la página, no necesitas nada más. Si aparece después, por ejemplo al validar un formulario, debe ir dentro de un contenedor con `role` para que los lectores de pantalla lo anuncien:
- `role="status"` para éxito, informativo y advertencia. Se anuncia sin interrumpir.
- `role="alert"` para error. Interrumpe y se anuncia de inmediato. Úsalo también en una advertencia si impide continuar o la persona puede perder algo, como una sesión por expirar.

El contenedor debe existir vacío desde que carga la página; después insertas el mensaje dentro:

```html
<div role="alert">
  <div id="mensaje-error" class="mensajeInformativo mensajeInformativo--error" tabindex="0" role="note" aria-roledescription="alerta" aria-labelledby="mensaje-error">No pudimos guardar tus datos. Inténtalo de nuevo más tarde.</div>
</div>
```

- Si el `role` se agrega junto con el mensaje, varios lectores de pantalla no lo anuncian.
- Para anunciar otra vez el mismo mensaje, vacía el contenedor antes de insertarlo.
- Si en la misma zona pueden aparecer los dos casos, usa dos contenedores, uno con cada rol. No cambies el `role` de un contenedor existente.

### Accesibilidad
- El lector de pantalla anuncia el tipo antes del texto (Éxito, Información, Error o Advertencia), aunque uses un icono personalizado o la variante sin icono.
- Escribe un texto que se entienda por sí solo: el color y el icono no se anuncian.
- Usa enlaces reales, con `href` y un texto que describa el destino, por ejemplo “requisitos del trámite” y no “aquí”.
- No fijes la altura del mensaje ni el tamaño del texto en píxeles: debe poder crecer con el zoom.
- No cambies los colores de cada tipo: ya cumplen el contraste que pide WCAG.

### Explicación de clases y atributos

| Clase o atributo | Para qué sirve |
| --- | --- |
| `mensajeInformativo` | Clase base del mensaje. |
| `mensajeInformativo--exito`, `--informativo`, `--error`, `--advertencia` | Definen el tipo: color e icono. |
| `mensajeInformativo--sinIcono` | Opcional. Quita el icono. |
| `tabindex`, `role`, `aria-roledescription`, `id`, `aria-labelledby` | Hacen el mensaje accesible con teclado y lector de pantalla. Se usan siempre juntos. |
| `role="status"`, `role="alert"` | Van en el contenedor de los mensajes que aparecen después de cargar la página. |
