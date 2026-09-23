CREATE TABLE genres (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE films (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    genre_id INT UNSIGNED NOT NULL,
    titre VARCHAR(120) NOT NULL,
    annee SMALLINT UNSIGNED NOT NULL,
    duree SMALLINT UNSIGNED NOT NULL,
    note DECIMAL(3,1) NULL,
    resume TEXT NOT NULL,
    archive_le DATETIME NULL,
    CONSTRAINT fk_films_genre FOREIGN KEY (genre_id) REFERENCES genres(id),
    CONSTRAINT chk_films_annee CHECK (annee >= 1895),
    CONSTRAINT chk_films_note CHECK (note IS NULL OR note BETWEEN 0 AND 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE utilisateurs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(190) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('membre', 'administrateur') NOT NULL DEFAULT 'membre',
    cree_le DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE seances (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    film_id INT UNSIGNED NOT NULL,
    commence_le DATETIME NOT NULL,
    places_restantes SMALLINT UNSIGNED NOT NULL,
    CONSTRAINT fk_seances_film FOREIGN KEY (film_id) REFERENCES films(id),
    CONSTRAINT chk_places_restantes CHECK (places_restantes >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE reservations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT UNSIGNED NOT NULL,
    seance_id INT UNSIGNED NOT NULL,
    cree_le DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT uq_reservation UNIQUE (utilisateur_id, seance_id),
    CONSTRAINT fk_reservations_utilisateur FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id),
    CONSTRAINT fk_reservations_seance FOREIGN KEY (seance_id) REFERENCES seances(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

