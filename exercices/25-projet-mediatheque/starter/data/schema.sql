PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS emprunt;
DROP TABLE IF EXISTS document_auteur;
DROP TABLE IF EXISTS auteur;
DROP TABLE IF EXISTS document;
DROP TABLE IF EXISTS adherent;

CREATE TABLE adherent (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL CHECK (length(trim(nom)) >= 2),
    email TEXT NOT NULL UNIQUE,
    suspendu INTEGER NOT NULL DEFAULT 0 CHECK (suspendu IN (0, 1))
);

CREATE TABLE document (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titre TEXT NOT NULL CHECK (length(trim(titre)) BETWEEN 2 AND 160),
    type TEXT NOT NULL CHECK (type IN ('livre', 'film', 'jeu')),
    annee INTEGER NOT NULL CHECK (annee BETWEEN 1450 AND 2200),
    reference TEXT UNIQUE,
    resume TEXT NOT NULL DEFAULT ''
);

CREATE TABLE auteur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL UNIQUE CHECK (length(trim(nom)) >= 2)
);

CREATE TABLE document_auteur (
    document_id INTEGER NOT NULL,
    auteur_id INTEGER NOT NULL,
    PRIMARY KEY (document_id, auteur_id),
    FOREIGN KEY (document_id) REFERENCES document(id) ON DELETE CASCADE,
    FOREIGN KEY (auteur_id) REFERENCES auteur(id) ON DELETE CASCADE
);

CREATE TABLE emprunt (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    document_id INTEGER NOT NULL,
    adherent_id INTEGER NOT NULL,
    emprunte_le TEXT NOT NULL,
    echeance_le TEXT NOT NULL,
    retour_le TEXT,
    FOREIGN KEY (document_id) REFERENCES document(id),
    FOREIGN KEY (adherent_id) REFERENCES adherent(id)
);

CREATE UNIQUE INDEX un_emprunt_actif_par_document
    ON emprunt(document_id)
    WHERE retour_le IS NULL;
