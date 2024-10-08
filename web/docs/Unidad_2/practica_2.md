# Apache Práctica 2. Certificado SSL/TLS

!!! success "Objetivos de la práctica"

    - Crear un certificado SSL/TLS autofirmado con la herramienta openssl.
    - Configurar el servidor web Apache para que utilice el certificado SSL/TLS autofirmado.

## 1. Crear un certificado SSL/TLS autofirmado con la herramienta openssl

Para crear un certificado SSL/TLS autofirmado, se utilizará la herramienta openssl. Para instalar la herramienta, se puede utilizar el siguiente comando:

```bash
sudo apt install openssl
```

Una vez instalada la herramienta, se puede utilizar para generar un certificado SSL/TLS autofirmado con el siguiente comando:

```bash
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout key.pem -out cert.pem
```

Este comando genera un certificado SSL/TLS autofirmado con una duración de 365 días. El certificado se generará en el archivo cert.pem y la clave privada se generará en el archivo key.pem.

## 1.2 Cómo automatizar la creacion de un certificado autofirmado

```bash
#!/bin/bash
set -x

# Configuramos las variables con los datos que necesita el certificado
OPENSSL_COUNTRY="ES"
OPENSSL_PROVINCE="Valencia"
OPENSSL_LOCALITY="CULLERA"
OPENSSL_ORGANIZATION="MI CASA"
OPENSSL_ORGUNIT="PEPITO PEPINILLO"
OPENSSL_COMMON_NAME="ivan0te.com"
OPENSSL_EMAIL="ivanmonterdemartinez@gmail.com"

# Creamos el certificado autofirmado

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/apache-selfsigned.key -out /etc/ssl/certs/apache-selfsigned.crt -subj "/C=$OPENSSL_COUNTRY/ST=$OPENSSL_PROVINCE/L=$OPENSSL_LOCALITY/O=$OPENSSL_ORGANIZATION/OU=$OPENSSL_ORGUNIT/CN=$OPENSSL_COMMON_NAME/emailAddress=$OPENSSL_EMAIL"
```
[Descargar](../scripts/autossl.sh){ .md-button .md-button--primary }

## 1.3 Configuración de un VirtualHost con SSL/TSL en el servidor web Apache.

### Paso 1.

Editamos el archivo de configuración del virtual host donde queremos habilitar el tráfico HTTPS.

En nuestro caso, utilizaremos el archivo de configuración que tiene Apache por defecto para SSL/TLS, que está en la ruta:/etc/apache2/sites-available/default-ssl.conf.

El contenido del archivo será el siguiente:

```bash
<VirtualHost *:443>
    #ServerName practica-https.local
    DocumentRoot/var/www/html
    DirectoryIndex index.php index.html
    SSLEngine on
    SSLCertificateFile /etc/ssl/certs/apache-selfsigned.crt
    SSLCertificateKeyFile /etc/ssl/private/apache-selfsigned.key
</VirtualHost>
```

### Paso 2.

Habilitamos el virtual host que acabamos de configurar.

```bash
sudo a2ensite autossl.conf
```

### Paso 3.

Habilitamos el modulo SSL en Apache.

```bash
sudo a2enmod ssl
```

### Paso 4.

Configuramos el virtual host de HTTP para que redirija todo el tráfico a HTTPS.

En nuestro caso, el virtual host que maneja las peticiones HTTP está en el archivo de configuración que utiliza

Apache por defecto para el puerto 80 :/etc/apache2/sites-available/000-default.conf.

El contenido del archivo será el siguiente:

```bash
<VirtualHost *:80>
    ServerName ivan0te.com
    DocumentRoot/var/www/html
    Redirige alpuerto 443 (HTTPS)
    RewriteEngineOn
    RewriteCond%{HTTPS} off
    RewriteRule^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</VirtualHost>
```

### Paso 5.

Para que el servidor web Apache pueda hacer la redirección de HTTP a HTTPS es necesario habilitar el módulo rewrite en Apache.

```bash
sudo a2enmod rewrite
```

### Paso 6.

Reiniciamos el servicio de Apache.

```bash
sudo systemctl restart apache2
```

### Paso 7.

Una vez llegado a este punto, es necesario comprobar que el puerto 443 está abierto en las reglas del firewall para permitir el tráfico HTTPS.

### Paso 8.

Accede desde un navegador web al nombre de dominio que acabas de configurar. En nuestro caso será: https://ivan0te.com