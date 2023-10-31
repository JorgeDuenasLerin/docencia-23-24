CREATE DATABASE examen;
CREATE USER 'examen'@'localhost' IDENTIFIED BY 'examen';
GRANT ALL PRIVILEGES ON examen.* TO 'examen'@'localhost' WITH GRANT OPTION;
