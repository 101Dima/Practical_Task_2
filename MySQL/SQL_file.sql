DROP TABLE IF EXISTS contacts;

CREATE TABLE IF NOT EXISTS contacts (
    contacts_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    surname VARCHAR(255),
    gm_address VARCHAR(255),
    telephone_num VARCHAR(15),
    PRIMARY KEY (contacts_id)
);

DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS orders;

CREATE TABLE IF NOT EXISTS products (
    products_id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(255),
    price INT,
    PRIMARY KEY (products_id)
);

CREATE TABLE IF NOT EXISTS orders (
    orders_id INT NOT NULL AUTO_INCREMENT,
    product_num INT,
    date VARCHAR(255),
    PRIMARY KEY (orders_id)
);

DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS comments;

CREATE TABLE IF NOT EXISTS posts (
    posts_id INT NOT NULL AUTO_INCREMENT,
    headline VARCHAR(255),
    text VARCHAR(255),
    date VARCHAR(255),
    PRIMARY KEY (posts_id)
);

CREATE TABLE IF NOT EXISTS comments (
    comments_id INT NOT NULL AUTO_INCREMENT,
    text VARCHAR(255),
    date VARCHAR(255),
    author VARCHAR(255),
    PRIMARY KEY (comments_id),
);

DROP TABLE IF EXISTS author_books;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS authors;

CREATE TABLE IF NOT EXISTS authors (
    authors_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    surname VARCHAR(255),
    PRIMARY KEY (authors_id)
);

CREATE TABLE IF NOT EXISTS books (
    books_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255),
    publication_year INT,
    isbn VARCHAR(255),
    PRIMARY KEY (books_id)
);

CREATE TABLE IF NOT EXISTS author_books (
    authors_id INT NOT NULL,
    books_id INT NOT NULL,
    PRIMARY KEY (books_id, authors_id),
    CONSTRAINT
        FOREIGN KEY (books_id) REFERENCES books(books_id)
            ON DELETE CASCADE,
    CONSTRAINT
        FOREIGN KEY (authors_id) REFERENCES authors(authors_id)
            ON DELETE CASCADE
);

DROP TABLE IF EXISTS grades;
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS subjects;

CREATE TABLE IF NOT EXISTS students (
    students_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    surname VARCHAR(255),
    group VARCHAR(15),
    PRIMARY KEY (students_id)
);

CREATE TABLE IF NOT EXISTS subjects (
    subjects_id INT NOT NULL AUTO_INCREMENT,
    subject VARCHAR(255),
    teacher VARCHAR(255),
    PRIMARY KEY (subjects_id)
);

CREATE TABLE IF NOT EXISTS grades (
    grades_id INT AUTO_INCREMENT NOT NULL,
    students_id INT NOT NULL,
    subjects_id INT NOT NULL,
    grade INT,
    PRIMARY KEY (grades_id),
    CONSTRAINT
        FOREIGN KEY (students_id) REFERENCES students(students_id)
            ON DELETE CASCADE,
    CONSTRAINT
        FOREIGN KEY (subjects_id) REFERENCES subjects(subjects_id)
            ON DELETE CASCADE
);
