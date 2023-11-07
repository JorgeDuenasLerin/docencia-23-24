# Seguridad

[https://owasp.org/](https://owasp.org/)

[Top 10](https://owasp.org/www-project-top-ten/)


Aquí veremos SQLi e XSS

## App vulnerable



### XSS

```
$data='<div>Cosas <span>de</span><p>HTML</p></div>';
echo htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
```

```
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
```