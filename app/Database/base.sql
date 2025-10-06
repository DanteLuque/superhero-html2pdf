CREATE DATABASE miapp;
USE miapp;

CREATE TABLE ci_sessions (
    id                VARCHAR(128) NOT NULL,
    ip_address        VARCHAR(45) NOT NULL,
    timestamp INT(10) UNSIGNED NOT NULL DEFAULT 0,
    data              BLOB NOT NULL,
    PRIMARY KEY (id),
    KEY ci_sessions_timestamp (timestamp)
);

CREATE TABLE usuarios(
	id              BIGINT AUTO_INCREMENT PRIMARY KEY,
	nombres         VARCHAR(255) NOT NULL,
	apellidos       VARCHAR(255) NOT NULL,
    avatar          TEXT NULL,
	username        VARCHAR(70) NOT NULL,
	userpass        VARCHAR(255) NOT NULL,
	rol             ENUM('ADMIN', 'USER'),
	created_at      DATETIME NULL,
	updated_at      DATETIME NULL,
	deleted_at      DATETIME NULL
) ENGINE=INNODB;