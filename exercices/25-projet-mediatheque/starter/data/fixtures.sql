INSERT INTO adherent (nom, email, suspendu) VALUES
    ('Ada Lovelace', 'ada@example.test', 0),
    ('Alan Turing', 'alan@example.test', 0),
    ('Grace Hopper', 'grace@example.test', 1);

INSERT INTO document (titre, type, annee, reference, resume) VALUES
    ('Frankenstein', 'livre', 1818, '9780141439471', 'Un récit fondateur de la science-fiction.'),
    ('Alien', 'film', 1979, 'FILM-ALIEN-1979', 'Un équipage rencontre une forme de vie inconnue.'),
    ('Le Voyage de Chihiro', 'film', 2001, 'FILM-CHIHIRO-2001', 'Une jeune fille traverse un monde spirituel.'),
    ('Catan', 'jeu', 1995, 'JEU-CATAN-1995', 'Commerce et développement sur une île.'),
    ('Les Misérables', 'livre', 1862, '9782253096344', 'Destins croisés dans la France du XIXe siècle.');

INSERT INTO auteur (nom) VALUES
    ('Mary Shelley'),
    ('Ridley Scott'),
    ('Hayao Miyazaki'),
    ('Klaus Teuber'),
    ('Victor Hugo');

INSERT INTO document_auteur (document_id, auteur_id) VALUES
    (1, 1), (2, 2), (3, 3), (4, 4), (5, 5);

INSERT INTO emprunt (document_id, adherent_id, emprunte_le, echeance_le, retour_le) VALUES
    (2, 1, '2026-09-01', '2026-09-22', NULL),
    (3, 2, '2026-08-01', '2026-08-22', '2026-08-20');
