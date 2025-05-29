# Imagen base ligera con Nginx
FROM nginx:alpine

# Borra la página de inicio por defecto
RUN rm -rf /usr/share/nginx/html/*

# Copia todos los archivos del repositorio al directorio servido por Nginx
COPY . /usr/share/nginx/html

# Expón el puerto 80
EXPOSE 80

# El contenedor arrancará con Nginx
CMD ["nginx", "-g", "daemon off;"]