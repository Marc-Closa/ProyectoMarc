CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,  -- Identificador único, autoincremental
    nombre VARCHAR(255) NOT NULL,                -- Nombre del producto, no puede ser nulo
    descripcion TEXT,                            -- Descripción opcional del producto
    imagen VARCHAR(100),                      -- Categoría del producto (Ej: Frutas, Lácteos)
    precio DECIMAL(10,2),                        -- Precio del producto con 2 decimales
    ultima_modificacion DATE                       -- Fecha de vencimiento (puede ser NULL si no aplica)
);

INSERT INTO productos (nombre, descripcion, imagen, precio, ultima_modificacion)
VALUES
('Pato Pekinés', 'Pato laqueado servido con pancakes finos, pepino y salsa Hoisin, un clásico de la gastronomía de Beijing.', 'pato_pekinés.jpg', 18.00, '2024-11-01'),
('Arroz Frito', 'Arroz cocido salteado con verduras, huevo y a veces carne o mariscos, un plato esencial de la cocina cantonesa.', 'arroz_frito.jpg', 7.50, '2024-10-30'),
('Pollo Kung Pao', 'Pollo salteado con cacahuates, pimientos y salsa de soja, un plato picante y sabroso originario de Sichuan.', 'pollo_kung_pao.jpg', 12.00, '2024-10-28'),
('Dim Sum', 'Pequeñas empanaditas rellenas de cerdo, camarones o vegetales, servidas al vapor o fritas. Acompañan las tradicionales comidas chinas.', 'dim_sum.jpg', 6.50, '2024-10-25'),
('Sopa Agripicante', 'Sopa espesa con tofu, setas y un toque de vinagre y chile, muy popular en la cocina de Sichuan.', 'sopa_agripicante.jpg', 5.00, '2024-10-22'),
('Mapo Tofu', 'Tofu firme en salsa picante de frijoles y carne de cerdo, uno de los platos más emblemáticos de la cocina Sichuan.', 'mapo_tofu.jpg', 9.00, '2024-10-20'),
('Chow Mein', 'Fideos fritos salteados con carne, pollo o verduras, uno de los platos más populares de la cocina cantonesa.', 'chow_mein.jpg', 8.00, '2024-10-18'),
('Cerdo a la Mostaza', 'Cerdo cocinado en salsa espesa de mostaza, un plato tradicional con un sabor fuerte y delicioso.', 'cerdo_mostaza.jpg', 11.00, '2024-10-15'),
('Sopa de Wonton', 'Sopa ligera con wontons rellenos de cerdo y camarones, acompañada de caldo claro y fideos finos.', 'sopa_wonton.jpg', 4.50, '2024-10-10'),
('Pescado al Vapor con Jengibre', 'Pescado fresco cocinado al vapor con jengibre, cebollín y salsa de soja, una receta ligera y sabrosa.', 'pescado_al_vapor.jpg', 14.50, '2024-10-05');


CREATE TABLE Usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL
);

-- Usuario admin con contraseña hashada "123"
INSERT INTO Usuarios (nombre, pass)
VALUES ('admin', '123');

-- Usuario aleatorio 1
INSERT INTO Usuarios (nombre, pass)
VALUES ('Juan Lopez', '123');

-- Usuario aleatorio 2
INSERT INTO Usuarios (nombre, pass)
VALUES ('Maria Gonzalez', '123');