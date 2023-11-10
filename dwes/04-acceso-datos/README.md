# Introducción a base de datos

Breve introducción para comenzar prácticas.

Contenidos

- Introducción
- Lectura tutorial
- Consultas preparadas
- Práctica CRUD

## Tutorial

PDO
[https://diego.com.es/tutorial-de-pdo](https://diego.com.es/tutorial-de-pdo)

## Clase de ayuda

[PHP-Acceso-a-datos](https://github.com/JorgeDuenasLerin/PHP-Acceso-a-datos)

## Consultas preparadas

Fuente:
[https://write.corbpie.com/php-pdo-mysql-cheat-sheet/](https://write.corbpie.com/php-pdo-mysql-cheat-sheet/)


## Creando la base de datos

Los siguientes comandos sirven para crear bases de datos y crear usuarios con permisos totales sobre ellas.

Crear base de datos:
```
CREATE DATABASE nombre_de_base_de_datos;
```

Crear un usuario (Debes cambiar 'nombreusuario' y '1234' por sus valores MANTENIENDO LAS COMILLAS):
```
CREATE USER 'nombreusuario'@'localhost' IDENTIFIED BY '1234';
```

Conceder todos los permisos a este nuevo usuario (Debes cambiar 'nombreusuario' y nombre_de_base_de_datos MANTENIENDO LAS COMILLAS Y LAS NO COMILLAS):
```
GRANT ALL ON nombre_de_base_de_datos.* TO 'nombreusuario'@'localhost';           
```

## Ejemplos

[Ver ejemplos](01-ejemplo/)

## Práctica CRUD

Modifica la práctica anterior para utilizar persistencia en base de datos

## Subtemas




## Ejemplos PHP

SACADO DE: [https://write.corbpie.com/php-pdo-mysql-cheat-sheet/](https://write.corbpie.com/php-pdo-mysql-cheat-sheet/)

```
<?php
//Create connection
$db = new PDO('mysql:host=localhost;dbname=DATABASENAME;charset=utf8mb4', 'USERNAME', 'PASSWORD');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//https://www.php.net/manual/en/pdo.setattribute.php

//Check connection status
echo $db->getAttribute(PDO::ATTR_CONNECTION_STATUS);

//SELECT with loop
$select = $db->prepare("SELECT `col`, `col2` FROM `table`");
$select->execute();
while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    $db_col = $row['col'];
    $db_col2 = $row['col2'];
    echo "$db_col $db_col2<br>";
}

//SELECT with loop AND WHERE
$select = $db->prepare("SELECT `name` FROM `table` WHERE `status` = :status;");
$select->execute(array(':status' => $status));
while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    $db_name = $row['name'];
    echo "$db_name<br>";
}

//SELECT with WHERE one value
$uid = 1610;
$select = $db->prepare("SELECT `col`, `col2`, `col3` FROM `table` WHERE `uid` = :uid LIMIT 1;");
$select->execute(array(':uid' => $uid));
$row = $select->fetchAll(PDO::FETCH_ASSOC);
$col = $row[0]['col'];

//SELECT one row
$select = $db->prepare("SELECT `col` FROM `table` WHERE `id` = :the_id LIMIT 1;"); 
$select->execute(array(':the_id' => $id)); 
$row = $select->fetch();
$id = $row['id'];

//SELECT with WHERE shorter
$select = $db->prepare("SELECT `col`, `col2` FROM `table` WHERE `id` = :id;");
$row = $select->fetch($select->execute(array(':id' => $id)));

//fetch for one/first row fetachAll for many/all rows

//SELECT simple
$select = $db->prepare("SELECT `col`, `col2`, `col3` FROM `table`");
$select->execute();
$row = $select->fetch();
$db_col = $row['col'];
$db_col2 = $row['col2'];
$db_col3 = $row['col3'];

//SELECT with WHERE
$select = $db->prepare("SELECT `col`, `col2`, `col3` FROM `table` WHERE `id` = :id");
$select->execute(array(':id' => $value));
$row = $select->fetch();
$db_col = $row['col'];
$db_col2 = $row['col2'];

//Bind Param
$select = $db->prepare("SELECT `col` FROM `table` WHERE `id` = :id AND `first_name` = :fname");
$select->bindParam(':id', $id, PDO::PARAM_INT);//https://www.php.net/manual/en/pdo.constants.php
$select->bindParam(':fname', $first_name, PDO::PARAM_STR);
$select->execute();

//Count returned columns
$select = $db->prepare("SELECT `col` FROM `table` WHERE `col` = :id");
$select->execute(array(':id' => $id));
$column_count = $select->columnCount();//Column count

//Check if row exists
$select = $db->prepare("SELECT `col` FROM `table` WHERE `col` = :id");
$select->execute(array(':id' => $id));
$result = $select->fetchColumn();
if ($result > 0) {
    echo "Row has been found";
} else {
    echo "No row in DB";
}

//Get last inserted id
$id = $db->lastInsertId();

//INSERT
$insert = $db->prepare('INSERT INTO `table` (`col`, `col2`) VALUES (?, ?)');
$insert->execute(["$value", "$value2"]);

$insert = $db->prepare('INSERT INTO `table` (`col`, `col2`, `col3`, `col4`, `col5`, `col6`, `col7`, `col8`, `col9`, `col10`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$insert->execute(["$value", "$value2", "$value3", "$value4", "$value5", "$value6", "$value7", "$value8", "$value9", "$value10"]);

$insert = $link->prepare('INSERT INTO `table` (`col`, `col2`, `col3`)
    VALUES (:avalue, :avalue2, :avalue3)');
$insert->execute([
    'avalue' => '1',
    'avalue2' => $value2,
    'avalue3' => $value3,
]);

//INSERT shorter form
$data = [];//an array
$db->beginTransaction();
$stmt = $db->prepare("INSERT IGNORE INTO `table` (`col`, `col2`, `col3`) VALUES (?,?,?)");
for ($i = 0; $i < count($data); $i++) {
    $stmt->execute($data[$i]);
}
$db->commit();

//INSERT with UPDATE on duplicate
$query = $db->prepare('INSERT INTO table (col, col2, col3) VALUES(:var, :var2, :var3)
    ON DUPLICATE KEY UPDATE col = :var, col2 = :var2, col3 = :var3');
$query->bindParam(':var', $avar, PDO::PARAM_INT);
$query->bindParam(':var2', $avar2, PDO::PARAM_STR);
$query->bindParam(':var3', $avar3, PDO::PARAM_STR);
$query->execute();

//UPDATE on WHERE
$update = $db->prepare("UPDATE `table` SET `col` = 1 WHERE `col2` = :the_value");
$update->execute(array(':the_value' => $value));

//UPDATE on WHERE 2
$update = $db->prepare("UPDATE `table` SET `col` = :update_to WHERE `col2` = :the_value");
$update->execute(array(':update_to' => $update_to, ':the_value' => $value));

//UPDATE
$update = $db->prepare("UPDATE `table` SET `col` = 1");
$update->execute();

//DELETE
$delete = $db->prepare("DELETE FROM `table` WHERE `col2` = :the_value");
$delete->execute(array(':the_value' => $value));
```