<?php

$sql = "CREATE TABLE gentes
(
    Id SERIAL PRIMARY KEY,
    gente_name CHARACTER VARYING(100)
)";

$sql = "CREATE TABLE authors
(
    Id SERIAL PRIMARY KEY,
    author_name CHARACTER VARYING(100) NOT NULL   
)";

CREATE TABLE books(
    book_id INT NOT NULL GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	book_name VARCHAR(100) NOT NULL,
	author INT NOT NULL DEFAULT 1,
	gente INT NOT NULL DEFAULT 1,
	quantity INT NOT NULL DEFAULT 0,
	CONSTRAINT fk_book_authors FOREIGN KEY (author) REFERENCES authors (author_id),
	CONSTRAINT fk_book_genteS FOREIGN KEY (gente) REFERENCES gentes (gente_id)
);

CREATE TABLE users(
    user_id INT NOT NULL GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	user_name VARCHAR(80) NOT NULL,
	password VARCHAR(80) NOT NULL,
	date date
);

CREATE TABLE library(
    user_id INT NOT NULL,
	book_id INT NOT NULL,
	date_interval date NOT NULL,

	CONSTRAINT fk_user_library FOREIGN KEY (user_id) REFERENCES users (user_id),
	CONSTRAINT fk_book_library FOREIGN KEY (book_id) REFERENCES books (book_id)
)



    CREATE TABLE gentes(
    getne_id SERIAL PRIMARY KEY,
	gente_name CHARACTER VARYING(80)
);


CREATE TABLE authors(
    author_id SERIAL PRIMARY KEY,
	author_name CHARACTER VARYING(80)
);