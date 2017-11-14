/**
* Inserts data for bids
*/
/*price integer NOT NULL,
	accepted_bid boolean DEFAULT false,
	bidder VARCHAR(355),
	caretaker VARCHAR(355),
	pet_name VARCHAR(32),
	start_date DATE,
	end_date DATE,
	FOREIGN KEY (caretaker, start_date, end_date) REFERENCES availability(caretaker, start_date, end_date) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (bidder, pet_name) REFERENCES pet(owner, pet_name),
	PRIMARY KEY (bidder, pet_name, caretaker, start_date, end_date)*/

/*INSERT INTO availability VALUES ('2017-10-02', '2017-10-05', 'cat', 'stephane@gmail.com', 10, TRUE, 'I love taking care of cats!');*/
INSERT INTO bid VALUES ('12', false, 'jeffereyW@gmail.com', 'stephane@gmail.com', 'Dime', '2017-10-02', '2017-10-05');
INSERT INTO bid VALUES ('21', true, 'donaldChua@gmail.com', 'stephane@gmail.com', 'Shadow', '2017-10-02', '2017-10-05');

/*INSERT INTO availability VALUES ('2017-10-26', '2017-10-30', 'cat', 'stephane@gmail.com', 13, FALSE);*/
INSERT INTO bid VALUES ('14', false, 'jeffereyW@gmail.com', 'stephane@gmail.com', 'Dime', '2017-10-26', '2017-10-30');
INSERT INTO bid VALUES ('20', false, 'donaldChua@gmail.com', 'stephane@gmail.com', 'Shadow', '2017-10-26', '2017-10-30');
INSERT INTO bid VALUES ('17', false, 'huanhui@gmail.com', 'stephane@gmail.com', 'Bean', '2017-10-26', '2017-10-30');

/*INSERT INTO availability VALUES ('2017-10-21', '2017-10-24', 'dog', 'stephane@gmail.com', 7, TRUE);*/
INSERT INTO bid VALUES ('12', true, 'jordanLim@gmail.com', 'stephane@gmail.com', 'Power', '2017-10-21', '2017-10-24');

/* INSERT INTO availability VALUES ('2017-11-11', '2017-11-14', 'dog', 'stephane@gmail.com', 6, FALSE, 'I am really experienced in taking care of dogs!');*/
INSERT INTO bid VALUES ('12', false, 'jordanLim@gmail.com', 'stephane@gmail.com', 'Power', '2017-11-11', '2017-11-14');
INSERT INTO bid VALUES ('15', false, 'mindyZhou@gmail.com', 'stephane@gmail.com', 'Pippen', '2017-11-11', '2017-11-14');
INSERT INTO bid VALUES ('20', false, 'amychong@hotmail.com', 'stephane@gmail.com', 'Maggie', '2017-11-11', '2017-11-14');
INSERT INTO bid VALUES ('17', false, 'xinlei@hotmail.com', 'stephane@gmail.com', 'Beauty', '2017-11-11', '2017-11-14');

/*INSERT INTO availability VALUES ('2017-12-12', '2017-12-16', 'hamster', 'stephane@gmail.com', 18, FALSE);*/
INSERT INTO bid VALUES ('22', false, 'donaldChua@gmail.com', 'stephane@gmail.com', 'Dinky', '2017-12-12', '2017-12-16');
INSERT INTO bid VALUES ('31', false, 'aliciaOng@gmail.com', 'stephane@gmail.com', 'Postgresql', '2017-12-12', '2017-12-16');
INSERT INTO bid VALUES ('19', false, 'xiaowen@hotmail.com', 'stephane@gmail.com', 'Light', '2017-12-12', '2017-12-16');

/*INSERT INTO availability VALUES ('2018-01-07', '2018-01-11', 'hamster', 'stephane@gmail.com', 10, FALSE);*/
INSERT INTO bid VALUES ('22', false, 'donaldChua@gmail.com', 'stephane@gmail.com', 'Dinky', '2018-01-07', '2018-01-11');
INSERT INTO bid VALUES ('31', false, 'aliciaOng@gmail.com', 'stephane@gmail.com', 'Postgresql', '2018-01-07', '2018-01-11');
INSERT INTO bid VALUES ('19', false, 'xiaowen@hotmail.com', 'stephane@gmail.com', 'Light', '2018-01-07', '2018-01-11');

/*INSERT INTO availability VALUES ('2018-01-15', '2018-01-18', 'bird', 'stephane@gmail.com', 10, FALSE, 'I will definitely take good care of your bird!');*/
INSERT INTO bid VALUES ('15', false, 'aliciaOng@gmail.com', 'stephane@gmail.com', 'Salern', '2018-01-15', '2018-01-18');
INSERT INTO bid VALUES ('17', false, 'jordanLim@gmail.com', 'stephane@gmail.com', 'Leah', '2018-01-15', '2018-01-18');

/*INSERT INTO availability VALUES ('2018-02-16', '2018-02-20', 'bird', 'stephane@gmail.com', 9, TRUE);*/
INSERT INTO bid VALUES ('20', false, 'aliciaOng@gmail.com', 'stephane@gmail.com', 'Salern', '2018-02-16', '2018-02-20');
INSERT INTO bid VALUES ('10', true, 'jordanLim@gmail.com', 'stephane@gmail.com', 'Leah', '2018-02-16', '2018-02-20');


/*INSERT INTO availability VALUES ('2018-01-30', '2018-02-04', 'rabbit', 'stephane@gmail.com', 8, FALSE);*/
INSERT INTO bid VALUES ('10', false, 'gerardYu@gmail.com', 'stephane@gmail.com', 'Prada', '2018-01-30', '2018-02-04');
INSERT INTO bid VALUES ('10', false, 'eric1990@gmail.com', 'stephane@gmail.com', 'Balto', '2018-01-30', '2018-02-04');


/*INSERT INTO availability VALUES ('2018-02-01', '2018-02-05', 'hamster', 'huanhui@gmail.com', 10, FALSE);*/
INSERT INTO bid VALUES ('22', false, 'donaldChua@gmail.com', 'huanhui@gmail.com', 'Dinky', '2018-02-01', '2018-02-05');
INSERT INTO bid VALUES ('13', false, 'aliciaOng@gmail.com', 'huanhui@gmail.com', 'Postgresql', '2018-02-01', '2018-02-05');
INSERT INTO bid VALUES ('29', false, 'xiaowen@hotmail.com', 'huanhui@gmail.com', 'Light', '2018-02-01', '2018-02-05');

/*INSERT INTO availability VALUES ('2017-10-30', '2017-11-04', 'rabbit', 'jianyao@gmail.com', 10, FALSE);*/
INSERT INTO bid VALUES ('12', false, 'gerardYu@gmail.com', 'jianyao@gmail.com', 'Prada', '2017-10-30', '2017-11-04');
INSERT INTO bid VALUES ('16', false, 'eric1990@gmail.com', 'jianyao@gmail.com', 'Balto', '2017-10-30', '2017-11-04');
