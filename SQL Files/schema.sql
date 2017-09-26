/**
* Specifies the schema for the project
*/

CREATE TABLE account (
	name VARCHAR(64) NOT NULL,
	email VARCHAR(355) PRIMARY KEY,
	password VARCHAR(50) NOT NULL,
	region VARCHAR(10) CHECK (region = 'North' OR region = 'South' OR region = 'East' OR region = 'West'),
	address VARCHAR(355),
	postal_code CHAR(6)
);

CREATE TABLE pet (
	pet_name VARCHAR(64),
	type VARCHAR(32) NOT NULL,
	CONSTRAINT validType CHECK (type = 'dog' OR type = 'cat' OR type = 'hamster' OR type = 'rabbit' OR type = 'bird'),
	species VARCHAR(64),
	dob DATE NOT NULL,
	size VARCHAR(10) CHECK (size = 'small' OR size = 'medium' OR size = 'large' OR size = 'giant'),
	owner ﻿VARCHAR(355) REFERENCES account(email) ON UPDATE CASCADE ON DELETE CASCADE,
	PRIMARY KEY (pet_name, owner) 
);

CREATE TABLE availability (
	start_date DATE NOT NULL,
	end_date DATE NOT NULL,
	type_of_pet VARCHAR(32) NOT NULL,
	CONSTRAINT validType CHECK (type_of_pet = 'dog' OR type_of_pet = 'cat' OR type_of_pet = 'hamster' OR type_of_pet = 'rabbit' OR type_of_pet = 'bird'),
	caretaker VARCHAR(355) REFERENCES account(email) ON UPDATE CASCADE ON DELETE CASCADE,
	min_bid integer NOT NULL,
	acceptedBid boolean,
	remark TEXT,
	PRIMARY KEY (start_date, end_date, caretaker)
);

CREATE TABLE bid (
	price integer NOT NULL,
	bidder VARCHAR(355),
	caretaker VARCHAR(355),
	start_date DATE,
	end_date DATE,
	FOREIGN KEY (caretaker, start_date, end_date) REFERENCES availability(caretaker, start_date, end_date) ON UPDATE CASCADE ON DELETE CASCADE,
	PRIMARY KEY (bidder, caretaker, start_date, end_date)
);