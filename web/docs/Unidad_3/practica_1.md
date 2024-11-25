# Actividad: PHP - Formularios

## **Formulario A**

### 1. Formulario básico con validación
- **Descripción:** Formulario en HTML para ingresar datos personales (nombre, apellido, edad, dirección, teléfono, correo electrónico).
- **Validaciones:** Los campos no deben estar vacíos. Validar con PHP.
- **Procesamiento:** Los datos se procesan en la misma página usando `$_POST`.
- **Salida:** Mostrar los datos ingresados si todos los campos son válidos.

[Descargar](){ .md-button .md-button--primary }

### 2. Selección de género
- **Descripción:** Añadir opción para seleccionar el género de la persona.
- **Campos:** `Masculino`, `Femenino`, `Otro` (usando radio buttons).
- **Salida:** Mostrar el género seleccionado junto con los otros datos.

[Descargar](){ .md-button .md-button--primary }

### 3. Selección de idiomas
- **Descripción:** Añadir casillas de verificación para seleccionar idiomas que habla la persona.
- **Idiomas:** Español, Inglés, Francés, Alemán, Italiano.
- **Salida:**
  - Si selecciona idiomas: Mostrar un mensaje de bienvenida en los idiomas seleccionados.
  - Si no selecciona idiomas: Mostrar un mensaje indicando que no seleccionó ninguno.

[Descargar](){ .md-button .md-button--primary }

---

## **Ampliación para enviar datos mediante POST a "procesar.php"**
- **Formulario modificado:** Enviar datos mediante método POST a la página `procesar.php`.
- **Procesar datos en "procesar.php":**
  - Recuperar y validar los datos enviados con `$_POST`.
  - Mostrar los datos ingresados, incluyendo género e idiomas seleccionados.
- **Cambiar a GET:** Probar el formulario con el método GET.
  - **Diferencias observadas:**
    - **POST:** Los datos no son visibles en la URL.
    - **GET:** Los datos aparecen en la URL, lo cual puede ser menos seguro.

[Descargar](){ .md-button .md-button--primary }

---

## **Formulario B: Enviar un fichero por formulario**
- **Descripción:** Formulario que permite enviar un archivo de texto.
- **Validaciones:** Asegurarse de que el archivo es de tipo texto.
- **Procesamiento:**
  - Subir el archivo al servidor usando `move_uploaded_file()`.
  - Mostrar un mensaje indicando si se guardó correctamente.
  - Leer y mostrar el contenido del archivo con `file_get_contents()`.

[Descargar](){ .md-button .md-button--primary }

---

## **Ampliaciones**
1. **Subir y mostrar una imagen:**
   - Permitir seleccionar una imagen.
   - Guardar la imagen en el servidor.
   - Mostrarla con una etiqueta `<img>`.

[Descargar](){ .md-button .md-button--primary }

2. **Subir y mostrar varios archivos de texto:**
   - Permitir múltiples selecciones.
   - Mostrar el contenido de todos los archivos.

[Descargar](){ .md-button .md-button--primary }

3. **Subir y mostrar una imagen y un archivo de texto:**
   - Selección combinada de imagen y texto.
   - Mostrar ambos en la página.

[Descargar](){ .md-button .md-button--primary }

---