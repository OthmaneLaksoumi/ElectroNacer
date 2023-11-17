CREATE DATABASE electronacer;
CREATE TABLE users(identifiant VARCHAR(20) NOT NULL, pass VARCHAR NOT NULL);
CREATE TABLE products(reference INT UNSIGNED ZEROFILL PRIMARY KEY AUTO_INCREMENT, image_src VARCHAR(100), libelle varchar(100) NOT NULL, prix_unitaire DECIMAL(10, 2), quantite_min INT(11), quantite_min INT(11), quantite_stock INT(11), categorie VARCHAR(20));
USE electronacer;
INSERT INTO users(identifiant, pass)
    VALUES ('laksoumi99', 'laksoumiPass'),
    ('ahmed', 'ahmedPass'),
    ('hassan', 'hassanPass'),
    ('mohammed', 'mohammedPass'),
    ('youssef', 'youssefPass');

UPDATE products
    SET quantite_stock = 9
    WHERE reference = 1;


