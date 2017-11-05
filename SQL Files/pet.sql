/**
* Inserts data for pets
*
*
* The attributes for the pet table are as follow:
*   - Pet name VARCHAR(64) NOT NULL
*   - Type: (dog / cat / hamster/ rabbit/ bird /...) VARCHAR(32) NOT NULL
*   - Species VARCHAR(64)
*   - dob DATE NOT NULL (YMD)
*   - size VARCHAR() CHECK (size = ‘small’ OR size = ‘medium’ OR size = ‘large’ OR size = ‘giant’)
*   - Owner REFERENCES user(email address) NOT NULL
*   - (Photo) implement this later
*/

INSERT INTO pet VALUES ('Charlie', 'dog', 'pitbull', '2003-12-3', 'small', 'xujun@gmail.com');
INSERT INTO pet VALUES ('Rocko', 'dog', 'beagle', '2005-5-4', 'medium', 'fredKwok@gmail.com');
INSERT INTO pet VALUES ('Tails', 'dog', 'collie', '2007-8-1', 'large', 'JessicaYong@gmail.com');
INSERT INTO pet VALUES ('Pippen', 'dog', 'golden retriever', '2000-10-3', 'large', 'mindyZhou@gmail.com');
INSERT INTO pet VALUES ('Power', 'dog', 'great dane', '2016-4-27', 'giant', 'jordanLim@gmail.com');
INSERT INTO pet VALUES ('Maggie', 'dog', 'golden retriever', '2014-02-11', 'large', 'amychong@hotmail.com');
INSERT INTO pet VALUES ('Beauty', 'dog', 'beagle', '2014-05-12', 'small', 'xinlei@hotmail.com');

INSERT INTO pet VALUES ('Dime', 'cat', 'ragdoll', '2013-7-5', 'giant', 'jeffereyW@gmail.com');
INSERT INTO pet VALUES ('Shadow', 'cat', 'balinese', '2013-7-5', 'small', 'donaldChua@gmail.com');
INSERT INTO pet VALUES ('Scarface', 'cat', 'bobcat', '2002-2-2', 'medium', 'xujun@gmail.com');
INSERT INTO pet VALUES ('Bean', 'cat', 'maine coon', '2005-1-15', 'giant', 'huanhui@gmail.com');

INSERT INTO pet VALUES ('Prada', 'rabbit', 'mini lop', '2012-7-20', 'small', 'gerardYu@gmail.com');
INSERT INTO pet VALUES ('Balto', 'rabbit', 'flemish giant rabbit', '2011-3-9', 'giant', 'eric1990@gmail.com');

INSERT INTO pet VALUES ('Salern', 'bird', 'cockatiels', '2010-3-7', 'medium', 'aliciaOng@gmail.com');
INSERT INTO pet VALUES ('Leah', 'bird', 'verdin', '2011-7-3', 'small', 'jordanLim@gmail.com');

INSERT INTO pet VALUES ('Dinky', 'hamster', 'syrian hamster', '2015-8-6', 'large', 'donaldChua@gmail.com');
INSERT INTO pet VALUES ('Chanel', 'hamster', 'roborovski', '2016-1-9', 'small', 'donaldChua@gmail.com');
INSERT INTO pet VALUES ('Postgresql', 'hamster', 'chinese hamster', '2013-2-1', 'medium', 'aliciaOng@gmail.com');
INSERT INTO pet VALUES ('Light', 'hamster', 'roborovski', '2017-03-11', 'medium', 'xiaowen@hotmail.com');