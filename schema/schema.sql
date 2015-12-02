CREATE DATABASE IF NOT EXISTS SecretSanta;

CREATE TABLE IF NOT EXISTS Users(
    userID int auto_increment primary key,
    username varchar(25) unique not null,
    passwordreset bool default true,
    password char(255),
    secretPerson char(255)
);

CREATE TABLE IF NOT EXISTS Items(
    itemID int auto_increment primary key,
    item text not null,
    location varchar(50) not null,
    userID int,
    FOREIGN KEY (userID) REFERENCES Users(userID)
);