-- Creazione Database 
CREATE DATABASE IF NOT EXISTS e_commerce;
USE e_commerce;

-- Creazione Tabelle
CREATE TABLE IF NOT EXISTS cliente (
    mail VARCHAR(255) PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS categoria (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    descrizione VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS prodotto (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    descrizione VARCHAR(255) NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    -- Precision (10) è il numero massimo di caratteri che può avere / Scale (2) è il numero di cifre decimali massimo che vengono visualizzate
    ID_Categoria INT NOT NULL,
    img_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (ID_Categoria) REFERENCES categoria(ID)
);

CREATE TABLE IF NOT EXISTS carrello (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    mail_Cliente VARCHAR(255) NOT NULL,
    
    FOREIGN KEY (mail_Cliente) REFERENCES cliente(mail)
);

CREATE TABLE IF NOT EXISTS ordine (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Data_Ordine DATE NOT NULL, 
    indirizzo VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS dettaglio_ordine (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_Ordine INT NOT NULL,
    
    FOREIGN KEY (ID_Ordine) REFERENCES ordine(ID)
);

CREATE TABLE if NOT EXISTS prodotti_Carrello (
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Mail_Cliente VARCHAR(255) NOT NULL,
	ID_Carrello INT NOT NULL,
	ID_Prodotto INT NOT NULL,
	
	FOREIGN KEY (ID_Carrello) REFERENCES carrello(ID),
	FOREIGN KEY (Mail_Cliente) REFERENCES cliente(mail),
	FOREIGN KEY (ID_Prodotto) REFERENCES prodotto(ID)
);


-- Inserimento dati nelle tabelle delle categorie

INSERT INTO categoria (nome, descrizione)
VALUES 
    ('Mobili da Cucina', 'Mobili e attrezzi per la cucina'),
    ('Arredamento per il Salotto', 'Mobili e accessori per il salotto'),
    ('Elettronica', 'Prodotti elettronici per la casa');

-- Inserimento dati nelle tabelle dei prodotti
INSERT INTO prodotto (nome, descrizione, prezzo, ID_Categoria, img_path)
VALUES
    ('Set di Coltelli da Cucina', 'Coltelli di alta qualità per la cucina', 49.99, 1, '../resources/images/1.jpg'),
    ('Bilancia Digitale', 'Bilancia digitale precisa per la cucina', 29.99, 1, '../resources/images/2.jpg'),
    ('Divano Moderno', 'Divano moderno e confortevole', 399.99, 2, '../resources/images/3.jpg'),
    ('Tavolino da Salotto in Vetro', 'Tavolino elegante per il tuo salotto', 59.99, 2, '../resources/images/4.jpg'),
    ('Smart Speaker', 'Altoparlante intelligente con assistente virtuale', 79.99, 3, '../resources/images/5.jpg'),
    ('Lampada Intelligente', 'Lampada con controllo intelligente', 29.99, 3, '../resources/images/6.jpg');