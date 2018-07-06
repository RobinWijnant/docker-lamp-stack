-- This sql file is executed during the docker container build

-- Change the root user authentication method
-- This user uses mysql_native_password as authentication method
-- instead of the default sha256_password. This user is also used 
-- by phpMyAdmin.
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';

-- Create a new root user with caching_sha2_password auth method
-- Use this user if you want to use the new and fancy method
-- Note: This method requires an SSL/TLS setup
CREATE USER 'root_sha2'@'%' IDENTIFIED WITH caching_sha2_password BY 'root';
GRANT ALL PRIVILEGES ON * . * TO 'root_sha2'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;

-- Test db
CREATE DATABASE testdb;