#!/bin/sh

# install dependencies
apt install -y mariadb-server

# start service
service mysql start

# create database with its tables, user and grant user privileges
mysql -u root < /honepot-project/Database/info.sql

# change config file for logging
cp -f /honepot-project/Database/50-server.cnf /etc/mysql/mariadb.conf.d/

# restart service
service mysql restart

# change general logging to ON
mysql -u root -e 'SET GLOBAL general_log = 'ON';'

# restart service
service mysql restart

sleep 9999999999999999999999999999