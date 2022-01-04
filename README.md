ABOUT
-----

MELC genomics is a framework for DNA assembly.

Here we made available a pipeline for de novo genome assembly, where the user will be able to:

- system information and performance monitoring;
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
- Matplotlib


INSTALLATION
------------

- Download files melc-genomics-2.0.tar.gzaa, melc-genomics-2.0.tar.gzab and melc-genomics-2.0.tar.gzac and uncompress.

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

- To add or remove a user, edit the users.txt file. Each username and password are separated by ":", one per line. The default username and password are "admin" and "admin".
        
        admin:admin

- To change the email address used in the "Forgot password?" login page, and in the "CONTACT" section, edit the contact.txt file, adding only your email address.

- Access the MELC in your browser.

        http://your.server/melc


AUTHOR AND CONTACT
------------------

Evaldo B. Costa - evaldodacosta@gmail.com


COPYRIGHT
---------

Copyright 2021 Evaldo B. Costa
