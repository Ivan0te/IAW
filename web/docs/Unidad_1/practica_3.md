!!! success "Objetivos"

    En esta práctica vamos a desplegar una página web estática con MkDocs en GitHub Pages. Como esta que estás viendo. Para ello, deberás seguir los siguientes pasos:

    - Aprender a utilizar MarkDown
    - Aprender a utilizar MkDocs
    - Aprender a utilizar GitHub Pages
    - Desplegar una página web estática

## Practica a entregar

1. Crea un nuevo proyecto de MkDocs en tu ordenador.
   
    - Primero, asegúrate de tener MkDocs instalado en tu ordenador. Si no lo tienes, puedes instalarlo con pip:
    ```
    pip install mkdocs
    ```
    - Luego, crea un nuevo proyecto de MkDocs usando el siguiente comando:
    ```
    mkdocs new web
    ```
    ```
    cd web
    ```

    Esto creará una carpeta con el nombre del proyecto y generará una estructura básica con el archivo mkdocs.yml (para la configuración) y una carpeta docs que contendrá los archivos Markdown para la documentación.

2. Escribe la documentación de tu proyecto en formato Markdown.

    La documentacion de el projecto esta ja echa en la practica 1 y la practica 2

3. Genera la página web con MkDocs.

    ```mkdocs new nombre-del-proyecto```

4. Crea un repositorio en GitHub para tu proyecto.

5. Sube la página web a GitHub Pages.

    Para subir la pagina web a GitHub Pages:
    ```
    mkdocs gh-deploy
    ```
    En nuestro GitHub nos creara una rama que se llamara gh-pages.