/*  Movie  */
/*PRIMARY KEY CONSTRAINT 1*/
INSERT INTO Movie VALUES(2, 'blah', 2017,'Blah', 'Blah');
/*
ERROR 1062 (23000) at line 1: Duplicate entry '2' for key 'PRIMARY'

This statement violates the constraint on the primary key because we have unique movie id's
*/

/*  Actor  */
PRIMARY CONSTRAINT 2
/*INSERT INTO Actor VALUES(1, 'b', 'Actor', 'M', '6666-66-66', NULL);*/
/*
ERROR 1062 (23000) at line 11: Duplicate entry '1' for key 'PRIMARY'

This statement violates the constraint on the primary key because we have unique Actor id's
*/

/*Sales*/
/*PRIMARY CONSTRAINT 3 */
INSERT INTO Sales VALUES(2, 1,1);
/*
ERROR 1062 (23000) at line 22: Duplicate entry '2' for key 'PRIMARY'

This violates primary key because we have unique id's
*/

/*FOREIGN KEY CONSTRAINT 1*/
INSERT INTO Sales VALUES(7, 1, 1);
/*
ERROR 1452 (23000) at line 29: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`Sales`, CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

Violates because you cannot add a Sales tuple that reference a movie that does not exist in Movie
*/

/*FOREIGN KEY CONSTRAINT 2*/
INSERT INTO MovieGenre VALUES(1,'blahs'); 
/*ERROR 1452 (23000) at line 38: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE)

Cannot insert a tuple with a mid that does not exist in the parent table, Movie
*/

/*FOREIGN KEY CONSTRAINT 3*/
UPDATE MovieDirector SET did=113 WHERE mid=3;
/*
ERROR 1452 (23000) at line 45: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`) ON DELETE CASCADE)

You cannot update a row in the child entry because the foreign key prevents modification without modifying the parents'
*/

/*FOREIGN KEY CONSTRAINT 4*/
UPDATE MovieActor SET mid=1 WHERE mid=2 AND aid=162;
/*
ERROR 1452 (23000) at line 53: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE)

You cannot update a row in the child entry refered by foreign key constraint because the foreign key prevents modification without modifying the parents'
*/

/*FOREIGN KEY CONSTRAINT 5*/
UPDATE MovieRating SET mid=1 WHERE mid=2;
/*
ERROR 1452 (23000) at line 61: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieRating`, CONSTRAINT `MovieRating_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE)

You cannot update a row in the child entry refered by foreign key constraint because the foreign key prevents modification without modifying the parents'
*/


/*FOREIGN KEY CONSTRAINT 6*/
UPDATE MovieActor SET mid=1 WHERE mid=2 AND aid=162;
/*
ERROR 1452 (23000) at line 70: Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`) ON DELETE CASCADE)

You cannot update a row in the child entry refered by foreign key constraint because the foreign key prevents modification without modifying the parents'
*/

/*CHECK CONSTRAINT 1*/
UPDATE Actor SET dod=1875-05-25 WHERE id=1;
/*
This would violate the check constraint because here dob is 1975-05-25 and an Actor cannot die before being born 

*/

/*CHECK CONSTRAINT 2*/
UPDATE MovieRating SET rot=9001 WHERE mid=2;
/*
This update is impossible the check constraint prevents any ratings that are not withing the specified bounds
*/

/*CHECK CONSTRAINT 3*/
INSERT INTO Review VALUES('bob', '2017-01-01',1);

/*
I put a constraint where you cannot have a entry with the rating and the comment empty because the entry will be useless because this person
did not give any feedback on the movie
*/
