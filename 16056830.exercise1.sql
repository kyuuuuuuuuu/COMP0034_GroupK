DROP DATABASE IF EXISTS 16056830_music_schema;
CREATE DATABASE 16056830_music_schema;

USE 16056830_music_schema;

CREATE TABLE artist (
                     ArtistID int(11) NOT NULL,
                     ArtistName varchar(100) NOT NULL,
                     PRIMARY KEY (ArtistID)
);

CREATE TABLE genre (
                    GenreID int(11) NOT NULL,
                    Genre varchar(100) NOT NULL,
                    PRIMARY KEY (GenreID)
);

CREATE TABLE album (
                     AlbumID int(10) NOT NULL,
                     AlbumName varchar(100) NOT NULL,
                     DateReleased date,
                     ArtistID int(11),
                     GenreID int(11),
                     PRIMARY KEY (AlbumID),
                     FOREIGN KEY (ArtistID) REFERENCES artist(ArtistID),
                     FOREIGN KEY (GenreID) REFERENCES genre (GenreID)
);

/*Answers to QUERIES*/
USE sakila;

/*Query 1*/
SELECT COUNT(actor_id) as Actor_name_Will from actor
WHERE first_name = 'Will' or first_name = 'William';

/*Query 2*/
SELECT actor.first_name, actor.last_name from actor, film_actor, film
WHERE actor.actor_id = film_actor.actor_id
  AND film_actor.film_id = film.film_id
  AND film.title = 'ACE GOLDFINGER';

/*Query 3*/
SELECT actor.first_name, actor.last_name, COUNT(actor_id) as Number_of_Film
FROM actor JOIN film_actor USING (actor_id)
GROUP BY actor_id
         ORDER BY COUNT(actor_id) DESC
         LIMIT 5;

/*Query 4*/
SELECT COUNT(inventory_id) as Copies_available
FROM inventory JOIN film USING (film_id)
WHERE title = 'AGENT TRUMAN' and store_id = 1;

/*Query 5*/
SELECT customer.first_name, customer.last_name, SUM(payment.amount) as Total_Spent
FROM payment
       JOIN customer USING (customer_id)
WHERE store_id = 1 AND payment_date BETWEEN '2005-01-01 00:00:00' AND '2005-12-31 23:59:59'
GROUP BY customer.customer_id
         ORDER BY SUM(payment.amount) DESC
         LIMIT 10;
