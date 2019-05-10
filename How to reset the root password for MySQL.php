#How to reset the root password for MySQL
#Ubuntu
1. service mysql stop
2. mkdir /var/run/mysqld
3. mysqld_safe --skip-grant-tables &

Run mysql command to enter mysql cli

4. mysql
5. update user set authentication_string=password('PASSWORD') where user='root';
6. FLUSH PRIVILEGES;
7. exit;
8. mysqladmin -u root -p shutdown
9. service mysql start
