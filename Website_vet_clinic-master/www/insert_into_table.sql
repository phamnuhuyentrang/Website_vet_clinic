insert into Client values 
	(1,'Nguyen','Triet','1998-06-12','15 Rue Winston Churchill','0698593783'),
	(2,'Nguyen','Dung','1998-01-04','1 Rue de Paris','0697142635'),
	(3,'Colin','Lafond','1998-01-01','Compiegne','0123456789'),
	(4,'Bennis','Saad','1998-02-02','France','0123456779'),
	(5,'Nguyen','Bo','1998-08-12','Delaidde','0987654321');

insert into Classe_animal values 
	('Mammifiere'),
	('Oiseaux'),
	('Reptiles'),
	('Autres');

insert into Veterinaire values 
	(1,'Alex','Sandro','1970-08-14','12 Rue Saint Saens','0789124536','Mammifiere'),
	(2,'Mohamed','Salah','1983-07-09','1 Rue Victoria','0304512368','Oiseaux'),
	(3,'Triet','Tran','1989-09-08','13 Rue Winston Churchill','0998989898','Reptiles'),
	(4,'Nguyen','Po','1997-12-12','Vietnam','0798899889','Mammifiere'),
	(5,'Pham','Trang','1978-02-01','France','0890090909','Autres');

insert into Assistant values 
	(6,'Kilian','Mbappe','1989-06-21','12 Rue Palais','0898456321','Mammifiere'),
	(7,'Leonel','Messi','1987-05-04','1 Rue Auguste','0945361785','Reptiles');

insert into Espece values 
	('Chien','Mammifiere'),
	('Chat','Mammifiere'),
	('Perrot','Oiseaux'),
	('Poisson','Autres'),
	('Scarabee','Reptiles');

insert into Animal values 
	(1,'Phe',20,20,'2008-06-01','Chien',2),
	(2,'KiKi',30,25,'2006-01-06','Chat',1),
	(3,'Nemo',5,5,'2001-01-01','Poisson',5),
	(4,'Jason',10,10,'2009-01-01','Perrot',3),
	(5,'Triet',4,4,'2010-01-01','Scarabee',4);

insert into Medicament values 
	('Vitamin A','bon pour yeux'),
	('Vitamin D','bon pour os'),
	('Vitamin B','bon pour ventre'),
	('Omega 3','vitamin A et D');

insert into Effets_secondaires values
	(1,'pas bon pour bebe'),
	(2,'pas bon pour female pregnant');

insert into Medicament_Effet values 
	('Vitamin A',1),
	('Vitamin A',2),
	('Vitamin D',2),
	('Omega 3',1),
	('Vitamin B',2);

insert into Med_correspond_Ani values 
	('Vitamin A','Chat'),
	('Vitamin A','Chien'),
	('Vitamin D','Chien'),
	('Vitamin D','Chat'),
	('Omega 3','Poisson'),
	('Vitamin B','Scarabee'),
	('Omega 3','Scarabee');

insert into Rendez_vous values
	(1,1,2,'2019-11-11','08:00:00'),
	(2,2,3,'2019-11-20','10:00:00'),
	(3,5,4,'2019-11-28','11:30:00'),
	(4,4,5,'2019-12-12','13:00:00'),
	(5,3,1,'2019-12-14','15:30:00');

insert into Traitement values 
	(1,1,'01:00:00','Optique'),
	(2,2,'01:30:00','Osteopathie'),
	(3,4,'02:01:00','Soin de ventre'),
	(4,3,'00:30:00','Soin des yeux'),
	(5,5,'01:00:00','Traitement general');

insert into Traitement_Medicament values 
	(1,'Vitamin D',4),
	(2,'Omega 3',5),
	(3,'Vitamin A',4),
	(4,'Vitamin B',6),
	(5,'Omega 3',8),
	(5,'Vitamin D',2);
