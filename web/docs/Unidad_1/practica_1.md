!!! success "Objetivos"

    En esta práctica vamos a desplegar una página web estática con MkDocs en GitHub Pages. Como esta que estás viendo. Para ello, deberás seguir los siguientes pasos:

    - Aprenderás el concepto de rama.
    - La gestión y el ciclo de vida (creación, modificación, borrado, …) de ramas.
    - Aprenderás el concepto de unión (merge) que nos posibilita la fusión de ramas.
    - A solucionar los posibles conflictos que pueden aparecer en el momento del merge.
  
## Practica a entregar

1. Crea una rama que se llame primera en tu local, y ejecuta la instrucción necesaria para comprobar que se ha creado.

    Creación de la rama: ```git checkout -b primera```

    Comprobación: ```git branch```

2. Crea un nuevo fichero en esta rama y fusiónalo con la principal. ¿Se ha producido conflicto? Razona la respuesta

    Cambiar de rama: ```git checkout primera```

    Creación del fichero: ```touch [nombre del fichero]```

    No se crea ningun compflicto, por que el fichero no existe en la rama principal.

3. Borra la rama primera.

    Borrado de la rama: ```git branch -d primera```

4. Crea una rama que se llame segunda, y modifica un fichero en ella para producir un conflicto al unirlo a la rama principal. Entrega el contenido del fichero donde se ha producido el conflicto.

    Creación de la rama: ```git checkout -b segunda``` 

    Cambiar de rama: ```git checkout segunda```

    Creación del fichero: ```touch [nombre del fichero]```

    Fusionar ramas: ```git merge segunda```

    Comprovación del conflicto: ```git diff```