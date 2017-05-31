Tutorial de utilização do PUGXMultiUserBundle
========================

Conferir em http://www.gerald.eti.br

Configuração arquivo nginx, a ser colocado na pasta "conf/nginx/conf.d". Apenas se for utilizar o Docker. Estas pastas são criadas nas pastas "antes" da pasta do projeto.

    server {
    listen 80;
    server_name localhost;
    root /var/www/html/web;
    location / {
        try_files $uri /app_dev.php$is_args$args;

    }
    location ~ ^/(app_dev|config)\.php(/|$) {
        #include snippets/fastcgi-php.conf;
        fastcgi_pass fpm:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param HTTPS off;
		fastcgi_read_timeout 3000;

    }
    location ~ \.php$ {
      return 404;
    }
    error_log /var/log/nginx/pugx_error.log;
    access_log /var/log/nginx/pugx_access.log;
}
