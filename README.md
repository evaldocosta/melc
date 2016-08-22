ABOUT
-----

MELC genomics is a framework for DNA assembly and analyses.

Here we made available a complete pipeline for de novo genome assembly, where the user will be able to:

- check the quality before and after the processing of the raw data files;
- process the data, e. g. trimming adapters and low quality bases;
- assemble the genome;
- check the quality of the assembly;
- compare different assembly approaches.


SYSTEM REQUIREMENTS
-------------------

MELC Genomics runs on 64-bit Linux system.


SOFTWARE REQUIREMENTS
---------------------

- httpd
- php
- java
- perl
- R
- python
- python-matplotlib


INSTALLATION
------------

- Download melc-genomics-1.0.tgz and uncompress the file.

        # tar zxvf melc-genomics-1.0.tgz

- Move index.php file and melc directory to web directory.

        # mv index.php /var/www/html
        # mv melc /var/www/html

- Edit file /etc/httpd/conf/httpd.conf and add lines:

        ServerName <ip server>:80
        DirectoryIndex index.html index.php index.html.var

- Add service to start on boot
        # chkconfig httpd on

- Edit file /etc/php.ini and change lines:
        file_uploads = On               (Whether to allow HTTP file uploads)
        upload_max_filesize = 2M        (Maximum allowed size for uploaded files)

- If you use a firewall, insert a new rule:
        # iptables -I INPUT 1 -p tcp --dport 80 -j ACCEPT

- Restart the httpd service
        # service httpd restart

- access the MELC in your browser
        http://your.server/

- Login and password
        username: admin
        password: admin123


AUTHOR AND CONTACT
------------------

Evaldo B. Costa
melcgenomics@gmail.com


COPYRIGHT
---------

Copyright 2016 Evaldo B. Costa
