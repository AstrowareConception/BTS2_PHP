DROP TABLE IF EXISTS notes_privees;
DROP TABLE IF EXISTS comptes;

CREATE TABLE comptes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL UNIQUE,
    mot_de_passe TEXT NOT NULL,
    role TEXT NOT NULL CHECK (role IN ('lecteur','admin'))
);

CREATE TABLE notes_privees (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    proprietaire_id INTEGER NOT NULL,
    titre TEXT NOT NULL,
    contenu TEXT NOT NULL,
    FOREIGN KEY (proprietaire_id) REFERENCES comptes(id)
);
