ALTER DATABASE llibres CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS productes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    preu DECIMAL(10,2),
    imatge VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO productes (nom, preu, imatge) VALUES
('Tirant lo Blanc', 14.00, 'img/tiranthdbien.jpg'),
('La Plaza del Diamante', 19.50, 'img/placadiamant.jpg'),
('Lazarillo de Tormes', 16.25, 'img/lazarillobien.jpg'),
('El Silencio de los Turnos', 18.90, 'img/silencioturnos.jpg'),
('Dexter, Camara, Accion', 11.00, 'img/dextercamaraaccion.jpg'),
('Cocina de 10 con Karlos', 21.75, 'img/cocinaconarguiyano.jpg');
