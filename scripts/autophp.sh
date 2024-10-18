# Instalar PHP
sudo apt update -y 
sudo apt install php libapache2-mod-php -y

# Paquetes Opcionales
sudo apt install php-cli -y
sudo apt install php-cgi -y
sudo apt install php-mysql -y
sudo apt install php-pgsql -y

# Instalar phpmyadmin
sudo apt install phpmyadmin php-mbstring php-zip php-gd php-json php-curl -y    

# Acceder a MySQL para modificar configuración
sudo mysql -e 'UNINSTALL COMPONENT "file://component_validate_password";'

# Crear un nuevo usuario en MySQL con todos los privilegios
sudo mysql -e "CREATE USER 'phpmyadmin'@'localhost' IDENTIFIED BY 'phpmyadmin';"
sudo mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost' WITH GRANT OPTION;"
sudo mysql -e "FLUSH PRIVILEGES;"

# Reiniciar servidor Apache
sudo systemctl restart apache2