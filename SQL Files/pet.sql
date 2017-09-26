/**
* Inserts data for pets
*
*
* The attributes for the pet table are as follow:
*   - Pet name VARCHAR(64) NOT NULL
*   - Type: (dog / cat / hamster/ rabbit/ bird /...) VARCHAR(32) NOT NULL
*   - Species VARCHAR(64)
*   - dob DATE NOT NULL (DMY)
*   - size VARCHAR() CHECK (size = ‘small’ OR size = ‘medium’ OR size = ‘large’ OR size = ‘giant’)
*   - Owner REFERENCES user(email address) NOT NULL
*   - (Photo) implement this later
*/

insert into pet values ('Charlie', 'dog', 'pitbull', 12/3/2003, 'small', 'xujun@gmail.com');
insert into pet values ('Rocko', 'dog', 'beagle', 4/5/2005, 'medium', 'fredKwok@gmail.com');
insert into pet values ('Tails', 'dog', 'collie', 1/8/2007, 'large', 'JessicaYong@gmail.com');
insert into pet values ('Pippen', 'dog', 'golden retriever', 3/10/2000, 'large', 'mindyZhou@gmail.com');
insert into pet values ('Power', 'dog', 'great dane', 27/4/2016, 'giant', 'jordanLim@gmail.com');
insert into pet values ('Dime', 'cat', 'ragdoll', 5/7/2013, 'giant', 'jeffereyW@gmail.com');
insert into pet values ('Shadow', 'cat', 'balinese', 5/7/2013, 'small', 'donaldChua@gmail.com');
insert into pet values ('Scarface', 'cat', 'bobcat', 2/2/2002, 'medium', 'xujun@gmail.com');
insert into pet values ('Bean', 'cat', 'maine coon', 15/1/2005, 'giant', 'huanhui@gmail.com');
insert into pet values ('Prada', 'rabbit', 'mini lop', 20/7/2012, 'small', 'gerardYu@gmail.com');
insert into pet values ('Balto', 'rabbit', 'flemish giant rabbit', 30/9/2011, 'giant', 'eric1990@gmail.com');
insert into pet values ('Salern', 'bird', 'cockatiels', 7/3/2010, 'medium', 'aliciaOng@gmail.com');
insert into pet values ('Leah', 'bird', 'verdin', 3/7/2011, 'small', 'jordanLim@gmail.com');
insert into pet values ('Dinky', 'hamster', 'syrian hamster', 6/8/2015, 'large', 'donaldChua@gmail.com');
insert into pet values ('Chanel', 'hamster', 'roborovski', 9/1/2016, 'small', 'donaldChua@gmail.com');
insert into pet values ('Postgresql', 'hamster', 'chinese hamster', 1/2/2013, 'medium', 'aliciaOng@gmail.com');
