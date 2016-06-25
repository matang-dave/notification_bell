# notification_bell
A demo application to display user notification as bell using yii.
Application tries to mimic notification as shown in notification bell sample.png 


1)Installation

nginx - sudo apt-get install nginx
php  - sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
mysql - sudo apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql

2)change nginx configuration to add new site "myblog.com":
please change the root path to actual application path on your system.

sudo gedit /etc/nginx/sites-enabled/default



server {
	listen 80;

    ##actual path to code##
	root /var/www/wingify/;   
	index index.html index.htm index.php;

	# Make site accessible from http://localhost/
	server_name myblog.com www.myblog.com;

	location / {
		# First attempt to serve request as file, then
		# as directory, then fall back to displaying a 404.
		try_files $uri $uri/ /index.html;
		# Uncomment to enable naxsi on this location
		# include /etc/nginx/naxsi.rules
	}

	error_page 404 /404.html;

	# pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
	location ~ \.php$ {
		try_files $uri =404;	
		fastcgi_split_path_info ^(.+\.php)(/.+)$;
	#	fastcgi_pass 127.0.0.1:7777;
		fastcgi_pass unix:/var/run/php5-fpm.sock;
		fastcgi_index index.php;
		include fastcgi_params;
		fastcgi_send_timeout 7200s;
		fastcgi_read_timeout 7200s;
		fastcgi_buffers 256 16k;                                               
		fastcgi_buffer_size 512k; 
		fastcgi_max_temp_file_size 0;                                            
	#	fastcgi_busy_buffers_size 256k;                                       
	#	fastcgi_temp_file_write_size 256k;                                    
	}


	# deny access to .htaccess files, if Apache's document root
	# concurs with nginx's one
	location ~ /\.ht {
		deny all;
	}
	if (!-e $request_filename) {
                rewrite ^.*$ /index.php last;
        }
}

Restart nginx server with 
sudo service nginx restart

3)Edit /etc/hosts to add

127.0.0.1	www.myblog.com
127.0.0.1	myblog.com


4)Change Mysql configuration in the code in
    wingify/protected/config/main.php

5) To add notification in the database randomly run

./wingify/protected/yiic updatenotification 

This is a console application which will add notification in database on predefined event

6) import database structure from the data folder

6) we are pulling the data from the server . Current pulling period is every 5 second . It can be changed from in wingify/js/main.js .

7) You need to login in to the app using
    username : demo
    password : demo
    
8)  Notifications will be visible on top right corner.  
    
    




