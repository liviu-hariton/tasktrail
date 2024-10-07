# Use the official PHP 8.3 image with Apache
FROM php:8.3-apache

# Enable SSL and necessary Apache modules
RUN a2enmod ssl
RUN a2ensite default-ssl
RUN a2enmod rewrite

# Copy the SSL certificates to the container
COPY ssl/ssl.crt /etc/ssl/certs/
COPY ssl/ssl.key /etc/ssl/private/

# Update the default Apache SSL configuration to use your certificates
RUN sed -i 's|SSLCertificateFile.*|SSLCertificateFile /etc/ssl/certs/ssl.crt|' /etc/apache2/sites-available/default-ssl.conf
RUN sed -i 's|SSLCertificateKeyFile.*|SSLCertificateKeyFile /etc/ssl/private/ssl.key|' /etc/apache2/sites-available/default-ssl.conf

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql

# Set ServerName to avoid the warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Update Apache configuration to use the /public directory for both HTTP and HTTPS
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/default-ssl.conf

# Ensure correct directory permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Allow override and access for /public directory
RUN echo '<Directory "/var/www/html/public"> \n\
    AllowOverride All \n\
    Require all granted \n\
</Directory>' >> /etc/apache2/apache2.conf

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html/public

# Expose both HTTP and HTTPS ports
EXPOSE 80 443