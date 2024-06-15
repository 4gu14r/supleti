-- Criação da tabela ufs
use laravel;

CREATE TABLE IF NOT EXISTS ufs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    sigla VARCHAR(2) NOT NULL,
    nome VARCHAR(100) NOT NULL
);

-- Inserção de dados na tabela ufs
INSERT INTO ufs (sigla, nome) VALUES
('SP', 'São Paulo'),
('RJ', 'Rio de Janeiro'),
('MG', 'Minas Gerais');

-- Criação da tabela rodovias
CREATE TABLE IF NOT EXISTS rodovias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);

-- Inserção de dados na tabela rodovias
INSERT INTO rodovias (nome) VALUES
('BR-101'),
('BR-116'),
('BR-381');

-- Criação da tabela trechos
CREATE TABLE IF NOT EXISTS trechos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data_referencia DATE NOT NULL,
    uf_id INT NOT NULL,
    rodovia_id INT NOT NULL,
    quilometragem_inicial FLOAT NOT NULL,
    quilometragem_final FLOAT NOT NULL,
    geo JSON NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (uf_id) REFERENCES ufs(id),
    FOREIGN KEY (rodovia_id) REFERENCES rodovias(id)
);

-- Inserção de dados na tabela trechos
INSERT INTO trechos (data_referencia, uf_id, rodovia_id, quilometragem_inicial, quilometragem_final, geo) VALUES
('2024-06-15', 1, 1, 100.5, 150.7, '{"type": "LineString", "coordinates": [[-45.1234, -23.4567], [-45.6789, -23.9876]]}'),
('2024-06-16', 2, 2, 80.2, 110.8, '{"type": "LineString", "coordinates": [[-46.7890, -22.3456], [-47.1234, -22.9876]]}');

-- Fim do arquivo SQL
