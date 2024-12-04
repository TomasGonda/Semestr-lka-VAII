CREATE DATABASE db_uzivatelia;

USE db_uzivatelia;

CREATE TABLE uzivatelia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(75) NOT NULL UNIQUE,
    heslo_hash VARCHAR(255) NOT NULL;
)

INSERT INTO uzivatelia (email, heslo_hash)
VALUES ('test@test.sk', 'heslo');