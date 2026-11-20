# Sistema Nacional de Diseño (SND) – Componente: Listas (`lists`)

- **Fuente:** https://www.snd.gob.mx/componentes/listas
- **Título de la página:** Listas (lists) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Utilizar listas ayuda a reducir la carga cognitiva al evitar párrafos extensos y al ofrecer una jerarquía visual más definida.

---

## 1. Descripción

Las listas permiten organizar grupos de elementos relacionados de manera clara, así los usuarios pueden escanear, identificar y comprender conjuntos de información.

### Listas ordenadas
Se utilizan para representar elementos con una secuencia lógica o jerárquica, como pasos en un flujo o procesos numerados.

Ejemplo de uso:
1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
2. Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
3. Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
4. In dignissim tortor id libero vulputate mollis.

### Listas desordenadas
Se emplean cuando el orden de los elementos no afecta su comprensión, por ejemplo, al mostrar características, tareas o elementos relacionados.

Ejemplo de uso:
- Lorem ipsum dolor sit amet, consectetur adipiscing elit.
- Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
- Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
- In dignissim tortor id libero vulputate mollis.

### Listas sin estilos
Mantienen la semántica estructural de lista, pero eliminan los estilos por defecto, permitiendo una integración visual más flexible en el layout.

Ejemplo de uso:
- Lorem ipsum dolor sit amet, consectetur adipiscing elit.
- Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
- Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
- In dignissim tortor id libero vulputate mollis.

### Lista horizontal
Alinean los ítems en una misma línea, útiles en componentes de navegación, etiquetas o configuraciones donde el espacio vertical es limitado.

Ejemplo de uso:
- Lorem ipsum dolor | Vivamus sed leo mollis | Nunc nec accumsan | In dignissim tortor

### Usos no permitidos
Las listas no deben mezclar estilos, usar símbolos improvisados, alterar jerarquías visuales, emplearse para fines distintos a la organización de contenido ni romper la alineación o espaciado definido
- ✅Lorem ipsum dolor
- ✨Lorem ipsum dolor
- 🔐Lorem ipsum dolor
- Lorem ipsum dolor / Lorem ipsum dolor / Lorem ipsum dolor *(desalineación)*

---

## 2. Diseño

### Construcción de UI
*(Imagen: `Gráfico que describe el espaciado entre los elementos de la lista`)*

### Bullet
*(Imagen: `El bullet de las listas mide 6x6 pixeles`)*

---

## 3. Desarrollo

### Utiliza una lista en tu proyecto
Las listas más empleadas son las listas desordenadas `<ul>`. Para ajustarla al estilo básico de GobMx, agrega la clase `.listaSinEstilos`. Esto ajustará el margen (`margin`), relleno (`padding`) y el tamaño de las viñetas (`bullets`).

```html
<ul class="listaSinEstilos">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ul>
```

### Listas básicas
Utiliza la clase `.listaBasica` en una lista desordenada `<ul>` para que las viñetas sean del color primario de la gama correspondiente.

```html
<ul class="listaBasica">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ul>
```

Si la lista es de una jerarquía secundaria, modifica el color de las viñetas a color dorado, con la clase `.listaBasica--secundaria`.

```html
<ul class="listaBasica listaBasica--secundaria">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ul>
```

Si la jerarquía tiene jerarquía terciaria, modifica el color de las viñetas a color gris, con la clase `.listaBasica--terciaria`.

```html
<ul class="listaBasica listaBasica--terciaria">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ul>
```

Cuando agregas la clase `.listaBasica` a una lista ordenada `<ol>` solo ajustará el margen (`margin`) y el relleno (`padding`).

```html
<ol class="listaBasica">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ol>
```

### Listas horizontales
Las listas horizontales pueden presentarse de 3 formas:
- Lista horizontal en columna
- Lista horizontal en fila
- Lista horizontal deslizable

Agrega la clase `.listaHorizontal--columna` para que cada elemento de la lista sea una columna.

```html
<ol class="listaHorizontal--columna">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ol>
```

Utiliza la clase `.listaHorizontal--fila` para que la lista se acomode por filas. Cuando la lista llegue el limite lateral, continuará en una fila nueva.

```html
<ol class="listaHorizontal--fila">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ol>
```

La clase `.deslizable` permite que la lista se desborde horizontalmente, y habilita la funcionalidad para deslizarla (`scroll`).

```html
<ol class="listaHorizontal--fila deslizable">
  <li>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  </li>
  <li>
    Vivamus sed leo mollis, ullamcorper lacus et, aliquet nibh.
  </li>
  <li>
    Nunc nec accumsan nunc. Cras ac lorem a tellus pulvinar pulvinar.
  </li>
</ol>
```
