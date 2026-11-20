# Sistema Nacional de Diseño (SND) – Componente: Indicador de carga (`loader`)

- **Fuente:** https://www.snd.gob.mx/componentes/indicador-carga
- **Título de la página:** Indicador de carga (loader) | Sistema Nacional de Diseño
- **Versión del SND:** 1.0.0 (`01/11/2026`)

Elemento visual que indica que un proceso está en curso.

---

## 1. Descripción

*(Imagen: `Indicador de carga paso 1 al 12`)*

Ejemplo de uso: Un círculo girando mientras se cargan resultados de búsqueda.

### Reglas de implementación
El componente de cargando aparece cuando el usuario está esperando a que se despliegue alguna información en específico ya sea en la misma página o que exista un salto a otra.

Su tamaño dependerá del lugar en donde se visualice el componente y se deberá de posicionar en medio de toda la pantalla.

*(Imágenes: `Indicador de carga en pantalla pequeña`, `Indicador de carga en pantalla grande`)*

---

## 2. Diseño

### Anatomía
*(Imagen: `Anatomía de un indicador de carga`)*
- **Color base**
  - Color de símbolo: `presidencia guinda - 900`, `presidencia verde - 900`
  - `Punto` Opacidad: `100%`
  - `Punto` Opacidad: `5%`
  - `Punto` Opacidad: `10%`
  - `Punto` Opacidad: `10%`
  - `Punto` Opacidad: `20%`
  - `Punto` Opacidad: `30%`
  - `Punto` Opacidad: `40%`
  - `Punto` Opacidad: `50%`
  - `Punto` Opacidad: `60%`
  - `Punto` Opacidad: `70%`
  - `Punto` Opacidad: `80%`
  - `Punto` Opacidad: `90%`
- **Cargando...**
  - Color de texto: `neutro - 800`

### Tamaños
- **Loading LG:** Área Altura: `88 px` | Ancho: `88 px` | Punto Altura: `12 px` | Ancho: `12 px` *(imagen: `Indicador de carga grande`)*
- **Loading MD:** Área Altura: `48 px` | Ancho: `48 px` | Punto Altura: `6 px` | Ancho: `6 px` *(imagen: `Indicador de carga mediano`)*

### Layout y espaciados
- **Loading:** Dirección: `Vertical` | Alineación: `Centro arriba` | Cambio de tamaño vertical: `Ajustado al contenido` | Cambio de tamaño horizontal: `Ajustado al contenido` | Espaciado entre elementos: `24 px` | Padding: `24 px` *(imagen: `Layout y espaciados`)*

---

## 3. Desarrollo

*(Nota del sitio oficial: la pestaña **Desarrollo** de `/componentes/indicador-carga` se encuentra vacía actualmente en el sitio oficial; solo renderiza el encabezado y las pestañas `Descripción`, `Diseño`, `Desarrollo` sin contenido adicional.)*
