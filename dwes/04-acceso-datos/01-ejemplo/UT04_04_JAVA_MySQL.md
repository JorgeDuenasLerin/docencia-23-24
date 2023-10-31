# Java

```java
// MysqlConn.java
import java.sql.*;
class MysqlConn{
  public static void main(String args[]){
    try{
      Class.forName("com.mysql.jdbc.Driver");
      Connection con=DriverManager.getConnection(
        "jdbc:mysql://localhost:3306/sonoo","root","root");

      Statement stmt=con.createStatement();
      ResultSet rs=stmt.executeQuery("SELECT * FROM cosas");
      while(rs.next()) {
        System.out.println(rs.getString(1)+"  "+rs.getString(2));
      }
      con.close();
    }catch(Exception e){ System.out.println(e);}
  }
}
```

## Compilación y ejecución
Crear fichero "MysqlConn.java"

$ javac MysqlConn.java
$ java MysqlConn

¡ERROR! No hablamos Mysql desde Java

```bash
apt install libmysql-java
```

Tenemos que volver a ejecutar incluyendo la librería que hemos instalado.
Esto lo hace Eclipse por detrás pero aquí estamos a mano.

$ java -cp ".:/usr/share/java/mysql.jar" MysqlConn
