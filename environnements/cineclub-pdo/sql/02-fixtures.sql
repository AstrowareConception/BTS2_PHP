INSERT INTO genres (nom) VALUES ('Comédie'), ('Drame'), ('Fantastique'), ('Science-fiction');

INSERT INTO films (genre_id, titre, annee, duree, note, resume) VALUES
(4, 'Alien', 1979, 117, 8.5, 'Un équipage affronte une forme de vie inconnue.'),
(4, 'Metropolis', 1927, 153, 8.3, 'Une cité verticale sépare les puissants des ouvriers.'),
(2, 'Parasite', 2019, 132, 8.5, 'Deux familles que tout oppose deviennent dangereusement proches.'),
(1, 'Les Temps modernes', 1936, 87, 8.5, 'Charlot résiste avec poésie à la cadence industrielle.'),
(3, 'Le Voyage dans la Lune', 1902, 14, 8.2, 'Une expédition lunaire imaginée par Georges Méliès.');

INSERT INTO seances (film_id, commence_le, places_restantes) VALUES
(1, '2027-01-15 20:00:00', 2),
(2, '2027-01-16 18:30:00', 20);

