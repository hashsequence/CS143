/*Give me the names of all the actors in the movie 'Die Another Day'. Please also make sure actor names are in this format:  <firstname> <lastname>   (seperated by a single space). You may need to use MySQL CONCAT Function (very important). */

SELECT CONCAT(a.first, ' ', a.last) AS list_of_names_in_die_another_day
FROM Actor AS a, Movie AS b, MovieActor AS c 
WHERE a.id = c.aid AND b.id = c.mid AND b.title = 'Die Another Day';

/*Give me the count of all the actors who acted in multiple movies.*/
SELECT COUNT(aid) AS count_of_all_actors_with_multiple_movies 
FROM (SELECT aid , COUNT(mid) AS n FROM MovieActor AS a GROUP BY aid)
AS Actors_Multiple 
WHERE Actors_Multiple.n > 1;

/*Give me the title of movies that sell more than 1,000,000 tickets.*/
SELECT DISTINCT title AS title_with_over_a_million_tickets
FROM Movie AS a, Sales AS b 
WHERE a.id = b.mid AND b.ticketsSold > 1000000;

/*Find the avg tickets sold for drama movies */

SELECT AVG(ticketsSold) AS avg_tickets_sold_for_drama_movies
FROM MovieGenre AS a, Sales AS b
WHERE a.mid = b.mid ;

/*All directors who directed films with IMDb rating of over 70*/

SELECT DISTINCT CONCAT(a.first, ' ', a.last) AS directors_who_directed_films_with_imdb_rating_over_90 
FROM Director AS a, MovieDirector as b, MovieRating as c
WHERE a.id = b.did AND b.mid = c.mid AND c.imdb > 90;


