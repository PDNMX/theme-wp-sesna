# Sistema Nacional de Diseño (SND) – Componente: Mensajes emergentes (`tooltip`)

- **Fuente:** https://www.snd.gob.mx/componentes/mensajes-emergentes
- **Título de la página:** Mensajes emergentes (tooltip) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Muestra información adicional contextual y útil, pero no esencial, al interactuar con el elemento, ya sea con el mouse o al presionar en mobile.

---

## 1. Descripción

### Mensajes emergentes
Un mensaje emergente es un pequeño cuadro de texto que aparece al interactuar con un elemento, como un botón o un ícono. Su función principal es ofrecer información adicional o una breve descripción de la acción asociada, ayudando al usuario a comprender mejor su propósito sin necesidad de ejecutar la acción.

- **Información breve y clara:** El texto debe ser corto y al punto, ya que los tooltips deben proporcionar información rápida y útil.
- **Aparición discreta:** El tooltip debe mostrarse de manera sutil y no intrusiva, únicamente cuando se requiera. Se activa al interactuar con el ícono, ya sea al pasar el cursor en desktop o al presionar en pantallas táctiles.
- **Posición apropiada:** El tooltip no debe superponerse con elementos clave de la interfaz y debe ser fácil de leer. Al ser flotante, puede exceder discretamente los márgenes establecidos sin afectar la jerarquía visual.
- **Evitar sobrecargar al usuario:** No utilices tooltips para explicar funciones demasiado obvias. Empléalos únicamente cuando aporten valor adicional real.

**Importante:** En pantallas de escritorio se activa al pasar el cursor y en pantallas móviles es necesario hacer tap sobre él.

*(Imagen: `Hola soy un tooltip`)*

### Variaciones
*(Imágenes: `Tooltip Top Left`, `Tooltip Bottom Left`, `Tooltip Bottom Right`, `Tooltip Top Right`, `Tooltip inactivo`, `Tooltip activo`)*

### Ejemplos de uso
Uso del tooltip en inputs. Se recomienda colocar en un sitio donde no obstruya la información.

### Usos no permitidos
Para garantizar coherencia visual, accesibilidad y claridad en la comunicación, se deben evitar los siguientes usos:
- No usar dos o más tooltips juntos.
- El texto de ayuda no debe superar los 500 caracteres.
- No muestres información importante en tooltips ya que será fácil de perder.
- No colocar sobre el campo de texto donde se ingresará la información.

---

## 2. Diseño

### Anatomía
1. **Contenedor**
   - Alto: `Variable` | Ancho: `Ajustable al contenido`
   - Color de fondo: `azul - 100`
   - Color de borde: `azul - 500`
   - Alineación de borde: `Por fuera` | Grosor del borde: `1`
2. **Texto**
   - Color de texto: `azul - 500`
   - Estilo del texto: `Base/Small details/SDR`

### Layout y espaciados
*(Encabezado presente sin texto adicional en el DOM)*

---

## 3. Desarrollo

### Utiliza un mensaje emergente en tu proyecto
La versión 2 se activa con un solo atributo en cualquier elemento: `data-mensaje-emergente`. El script crea la burbuja, la conecta con los lectores de pantalla y la coloca en la pantalla; no hace falta escribir contenedores ni identificadores.

```html
<button type="button" class="mensajeEmergente__boton" data-mensaje-emergente="¡Hola! Soy un tooltip :)">
  <span class="oculto">
    Ayuda
  </span>
  <i class="snd__icono snd-help" aria-hidden="true"></i>
</button>
```

### Posiciones
Hay seis posiciones: arriba o abajo del elemento y alineadas a su izquierda, centro o derecha. `izquierda` alinea la caja con el borde izquierdo del elemento y `derecha` con el borde derecho.

```html
<button type="button" class="boton__secundario" data-mensaje-emergente="Superior izquierda" data-mensaje-emergente-posicion="arriba-izquierda">
  Superior izquierda
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Superior centro" data-mensaje-emergente-posicion="arriba-centro">
  Superior centro
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Superior derecha" data-mensaje-emergente-posicion="arriba-derecha">
  Superior derecha
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Inferior izquierda" data-mensaje-emergente-posicion="abajo-izquierda">
  Inferior izquierda
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Inferior centro" data-mensaje-emergente-posicion="abajo-centro">
  Inferior centro
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Inferior derecha" data-mensaje-emergente-posicion="abajo-derecha">
  Inferior derecha
</button>
```

### Colores
Primario, secundario y terciario siguen el tema activo (guinda o verde) y toman como referencia los botones primario, secundario y fantasma. Éxito, alerta y error comunican un estado.

```html
<button type="button" class="boton__secundario" data-mensaje-emergente="Mensaje informativo">
  Información
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Mensaje primario" data-mensaje-emergente-color="primario">
  Primario
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Mensaje secundario" data-mensaje-emergente-color="secundario">
  Secundario
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Mensaje terciario" data-mensaje-emergente-color="terciario">
  Terciario
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Mensaje éxito" data-mensaje-emergente-color="exito">
  Éxito
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Mensaje alerta" data-mensaje-emergente-color="alerta">
  Alerta
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Mensaje error" data-mensaje-emergente-color="error">
  Error
</button>
```

### Anchos
Úsalos cuando el mensaje sea más largo y quieras controlar cómo se acomoda el texto.

```html
<button type="button" class="boton__secundario" data-mensaje-emergente="Este mensaje usa el ancho chico: sirve para explicar un requisito con un poco más de detalle." data-mensaje-emergente-ancho="chico">
  Chico
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Este mensaje usa el ancho mediano: sirve para explicar un requisito con un poco más de detalle." data-mensaje-emergente-ancho="mediano">
  Mediano
</button>
<button type="button" class="boton__secundario" data-mensaje-emergente="Este mensaje usa el ancho grande: sirve para explicar un requisito con un poco más de detalle." data-mensaje-emergente-ancho="grande">
  Grande
</button>
```

### En cualquier elemento
Funciona en botones, enlaces, campos y texto. Si el elemento no recibe foco, como un `span`, el script lo vuelve accesible por teclado. Si un botón solo tiene icono, el mensaje se usa como su nombre para los lectores de pantalla.

```html
<a href="#" data-mensaje-emergente="Este enlace abre el aviso de privacidad">
  Enlace
</a>
<span data-mensaje-emergente="Clave Única de Registro de Población">
  CURP
</span>
<button type="button" class="mensajeEmergente__boton" data-mensaje-emergente="Abrir ayuda" data-mensaje-emergente-color="primario">
  <i class="snd__icono snd-help" aria-hidden="true"></i>
</button>
<div class="form__grupo">
  <label for="correo-v2" class="form__label">
    Correo
  </label>
  <input id="correo-v2" type="email" class="form__control" data-mensaje-emergente="Usa el correo con el que te registraste" data-mensaje-emergente-posicion="abajo-izquierda" />
</div>
```

### Contenido personalizado
Para agregar formato, como negritas o listas, escribe el contenido en un `template` y refiérelo por su `id`.

```html
<button type="button" class="boton__secundario" data-mensaje-emergente-contenido="ayuda-curp" data-mensaje-emergente-ancho="mediano">
  Con template
</button>
<template id="ayuda-curp">
  <p>
    <b>
      ¿Dónde encuentro mi CURP?
    </b>
  </p>
  <ul>
    <li>
      En tu acta de nacimiento
    </li>
    <li>
      En tu credencial para votar
    </li>
  </ul>
</template>
```

En plataformas que no respetan `template`, como Angular, usa un `div` con el atributo `hidden`. Si el contenido del `div` cambia, el mensaje se actualiza solo.

```html
<button type="button" class="boton__secundario" data-mensaje-emergente-contenido="ayuda-tramite" data-mensaje-emergente-ancho="mediano" data-mensaje-emergente-color="primario">
  Con div
</button>
<div id="ayuda-tramite" hidden>
  <p>
    <b>
      Antes de iniciar tu trámite
    </b>
  </p>
  <ul>
    <li>
      Ten a la mano tu identificación
    </li>
    <li>
      Revisa que tu CURP esté vigente
    </li>
  </ul>
</div>
```

### Reglas de comportamiento
- **Bordes de la pantalla:** si la caja se saldría por la izquierda o la derecha, se recorre hasta caber y la flecha sigue apuntando al elemento.
- **Sin espacio arriba o abajo:** la caja cambia al lado que sí tiene espacio.
- **Uno a la vez:** al abrir un mensaje se cierra el anterior.
- **Máximo 500 caracteres:** si el contenido se pasa, se recorta y aparece un aviso en la consola del navegador.
- **Contenido dinámico:** los elementos que se agregan después de cargar la página también funcionan.

```html
<div style="display:flex; justify-content:space-between; width:100%;">
  <button type="button" class="mensajeEmergente__boton" data-mensaje-emergente="Junto al borde izquierdo la caja se recorre para caber en la pantalla, y la flecha sigue apuntando al botón." data-mensaje-emergente-posicion="arriba-derecha">
    <span class="oculto">
      Ayuda izquierda
    </span>
    <i class="snd__icono snd-help" aria-hidden="true"></i>
  </button>
  <button type="button" class="mensajeEmergente__boton" data-mensaje-emergente="Junto al borde derecho la caja también se recorre para no salirse de la pantalla." data-mensaje-emergente-posicion="arriba-izquierda">
    <span class="oculto">
      Ayuda derecha
    </span>
    <i class="snd__icono snd-help" aria-hidden="true"></i>
  </button>
</div>
```

### Accesibilidad
El script agrega lo necesario para que el mensaje se pueda usar sin mouse y con lector de pantalla:

| Forma de uso | Abrir | Cerrar |
| --- | --- | --- |
| Mouse | Pasar el cursor sobre el elemento | Sacar el cursor. Se puede mover sobre el mensaje sin que se cierre. |
| Teclado | Llegar al elemento con Tab | Escape, o salir del elemento con Tab |
| Pantalla táctil | Tocar el elemento | Tocar de nuevo o tocar fuera |
| Lector de pantalla | Lee el mensaje al llegar al elemento | No aplica |

Recomendaciones:
- No pongas enlaces ni botones dentro del mensaje: el teclado no puede llegar a ellos. Si los detecta, el script avisa en la consola.
- Usa de preferencia un `button` o un enlace como disparador.
- Un botón con el atributo `disabled` no recibe foco, así que su mensaje no se abre con teclado.

### Explicación de los atributos
Solo el primero es necesario; los demás son opcionales.

| Atributo | Valores | Descripción |
| --- | --- | --- |
| `data-mensaje-emergente` | Texto | Texto del mensaje. Se muestra como texto plano, sin interpretar HTML. |
| `data-mensaje-emergente-contenido` | Id de un `template` o `div` | Contenido con formato. Sustituye al texto. |
| `data-mensaje-emergente-posicion` | `arriba-izquierda`, `arriba-centro`, `arriba-derecha`, `abajo-izquierda`, `abajo-centro`, `abajo-derecha` | Posición preferida. Por defecto: `arriba-centro`. |
| `data-mensaje-emergente-color` | `primario`, `secundario`, `terciario`, `exito`, `alerta`, `error` | Color del mensaje. Sin este atributo se usa el azul informativo. |
| `data-mensaje-emergente-ancho` | `chico`, `mediano`, `grande` | Ancho fijo de 10, 18 o 25 rem. Sin este atributo se ajusta al texto, hasta 20 rem. |
