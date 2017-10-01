# CellphoneKBS

To run this project, set up a LAMP, MAMP or WAMP server.  This will be running Apache, MySQL, and PHP.

---------------

For Linux (if you are using a Debian based distro), all three of these can be can be found in the aptitude package manager.
Instructions: https://wiki.debian.org/LaMp
The services can be turned on through the command "service <servicename> start" run as root
configuration files are found under "/etc/".
/etc/apache2
/etc/php5
/etc/mysql
PHP will and MySQL will need to be configured to work with the Apache webserver (see Instructions).

For Windows, set up XAMPP
XAMPP website: https://www.apachefriends.org/index.html
Install/Setup: https://blog.udemy.com/xampp-tutorial/
Follow the installation wizard and install the nessesary services
The configurations and actions for each service are listed on the control panel

Configure the path (for Apache) to point to the location of the provided build directory.  Make sure it has the correct permissions to read and execute.  This differs depending on the OS you are using.  See Instructions.

Once everything is set up, log into the MySQL server, create a database called cell_db and run the SQL queries listed in the provided "create" and "insert.txt" text files.
