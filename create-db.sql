drop database IF EXISTS TddContactUs;

CREATE DATABASE IF NOT EXISTS TddContactUs;
use TddContactUs;

CREATE TABLE Submissions (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(200),
    creationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY( id )
);

show tables;
