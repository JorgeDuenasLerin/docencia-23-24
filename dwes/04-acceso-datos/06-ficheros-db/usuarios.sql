CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    pass VARCHAR(100),
    perfil_img VARCHAR(255)
);

INSERT INTO usuarios(nombre, pass, perfil_img) VALUES ('Jorge', '1234', 'jorge.jpg');
INSERT INTO usuarios(nombre, pass, perfil_img) VALUES ('Paco', '1234', 'oso.png');

--INSERT INTO usuarios(nombre, pass, perfil_img) VALUES ('<script>alert(1)</script>', '1234', 'linus.png');