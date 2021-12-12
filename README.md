ABOUT
-----

MELC genomics is a framework for DNA assembly.

Here we made available a pipeline for de novo genome assembly, where the user will be able to:

- check the quality before and after the processing of the raw data files;
- assemble the genome;
- check the quality of the assembly.


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


INSTALLATION
------------

- Download files melc-genomics-2.0.tar.gzaa, melc-genomics-2.0.tar.gzab, melc-genomics-2.0.tar.gzac and melc-genomics-2.0.tar.gzad and uncompress.

        # cat melc-genomics-2.0.tar.gz* > melc-genomics-2.0.tar.gz
        # tar xzvf melc-genomics-2.0.tar.gz
        
- Move melc directory to web directory.

        # mv melc /var/www/html

- Edit file /etc/httpd/conf/httpd.conf and add line:

        ServerName <ip server>:80

- Add service to start on boot

        # chkconfig httpd on

- Edit file /etc/php.ini and change lines:

        file_uploads = On               (Whether to allow HTTP file uploads)
        upload_max_filesize = 2M        (Maximum allowed size for uploaded files)

- If you use a firewall, insert a new rule:

        # iptables -I INPUT 1 -p tcp --dport 80 -j ACCEPT

- Restart the httpd service

        # service httpd restart

- Access the MELC in your browser. The default username and password are "admin" and "admin".

        http://your.server/melc


AUTHOR AND CONTACT
------------------

Evaldo B. Costa - evaldodacosta@gmail.com


COPYRIGHT
---------

Copyright 2021 Evaldo B. Costa
