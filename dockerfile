# Usar a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar extensões do PHP, caso necessário
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar o módulo de reescrita do Apache (opcional)
RUN a2enmod rewrite

# Configuração do timezone (opcional)
ENV TZ=America/Sao_Paulo

# Definir o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copiar o código da aplicação para dentro do container
COPY ./src /var/www/html

# Permissões (opcional para evitar problemas com o Apache)
RUN chown -R www-data:www-data /var/www/html

# Expor a porta 80 (servidor web)
EXPOSE 80
