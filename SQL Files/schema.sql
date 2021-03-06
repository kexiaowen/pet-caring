/**
* Specifies the schema for the project
*/

DROP TABLE IF EXISTS bid CASCADE;
DROP TABLE IF EXISTS availability CASCADE;
DROP TABLE IF EXISTS pet CASCADE;
DROP TABLE IF EXISTS admin CASCADE;
DROP TABLE IF EXISTS account CASCADE;

CREATE TABLE account (
	name VARCHAR(64) NOT NULL,
	email VARCHAR(355) PRIMARY KEY,
	password VARCHAR(50) NOT NULL,
	region VARCHAR(10) CHECK (region = 'North' OR region = 'South' OR region = 'East' OR region = 'West'),
	address VARCHAR(355) NOT NULL,
	postal_code CHAR(6) NOT NULL
);

CREATE TABLE admin (
	user_name VARCHAR(100) PRIMARY KEY,
	user_pass VARCHAR(200) NOT NULL
);

CREATE TABLE pet (
	pet_name VARCHAR(64),
	type VARCHAR(32) NOT NULL,
	CONSTRAINT validType CHECK (type = 'dog' OR type = 'cat' OR type = 'hamster' OR type = 'rabbit' OR type = 'bird'),
	species VARCHAR(64) NOT NULL,
	dob DATE NOT NULL,
	size VARCHAR(10) CHECK (size = 'small' OR size = 'medium' OR size = 'large' OR size = 'giant'),
	owner VARCHAR(355) REFERENCES account(email) ON UPDATE CASCADE ON DELETE CASCADE,
	PRIMARY KEY (pet_name, owner)
);

CREATE TABLE availability (
	start_date DATE,
	end_date DATE,
	type_of_pet VARCHAR(32) NOT NULL,
	CONSTRAINT validType CHECK (type_of_pet = 'dog' OR type_of_pet = 'cat' OR type_of_pet = 'hamster' OR type_of_pet = 'rabbit' OR type_of_pet = 'bird'),
	caretaker VARCHAR(355) REFERENCES account(email) ON UPDATE CASCADE ON DELETE CASCADE,
	min_bid integer NOT NULL,
	accepted_bid boolean DEFAULT false,
	remark TEXT,
	PRIMARY KEY (start_date, end_date, caretaker)
);

CREATE TABLE bid (
	price integer NOT NULL,
	accepted_bid boolean DEFAULT false,
	bidder VARCHAR(355),
	caretaker VARCHAR(355),
	pet_name VARCHAR(32),
	start_date DATE,
	end_date DATE,
	FOREIGN KEY (caretaker, start_date, end_date) REFERENCES availability(caretaker, start_date, end_date) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (bidder, pet_name) REFERENCES pet(owner, pet_name),
	PRIMARY KEY (bidder, pet_name, caretaker, start_date, end_date)
);

SET datestyle = "ISO, YMD";
