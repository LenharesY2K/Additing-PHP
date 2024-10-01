CREATE TABLE Livros (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    titulo VARCHAR(255),                
    autor VARCHAR(255),                
    ano_publicacao INT,                 
    genero VARCHAR(100)               
);

INSERT INTO Livros (titulo, autor, ano_publicacao, genero)
VALUES
('1984', 'George Orwell', 1949, 'Distopia'),
('Dom Quixote', 'Miguel de Cervantes', 1605, 'Clássico'),
('O Senhor dos Anéis', 'J.R.R. Tolkien', 1954, 'Fantasia'),
('Cem Anos de Solidão', 'Gabriel Garcia Marquez', 1967, 'Realismo Mágico'),
('Orgulho e Preconceito', 'Jane Austen', 1813, 'Romance'),
('O Apanhador no Campo de Centeio', 'J.D. Salinger', 1951, 'Ficção'),
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 1943, 'Infantil'),
('Crime e Castigo', 'Fiódor Dostoiévski', 1866, 'Drama'),
('A Revolução dos Bichos', 'George Orwell', 1945, 'Satírica'),
('Moby Dick', 'Herman Melville', 1851, 'Aventura');
