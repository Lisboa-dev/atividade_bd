CREATE DATABASE academia;
USE academia;


-- Tabela plano
CREATE TABLE plano (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(20) UNIQUE NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    valorMensal INT NOT NULL
);

-- Tabela Aluno
CREATE TABLE aluno (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    dataNascimento DATE NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    email VARCHAR(255),
    codigoPlano INT NOT NULL,
    CONSTRAINT fk_plano_al FOREIGN KEY (codigoPlano) REFERENCES plano(codigo)
);

-- Tabela instrutor
CREATE TABLE instrutor (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cref CHAR(9) UNIQUE NOT NULL
);

-- Tabela treino
CREATE TABLE treino (
    numero INT AUTO_INCREMENT PRIMARY KEY,
    dataInicio DATE NOT NULL,
    objetivo VARCHAR(200) NOT NULL,
    codigoAluno INT NOT NULL,
    codigoInstrutor INT NOT NULL,
    exercicios VARCHAR(500) NOT NULL,
    
    CONSTRAINT fk_treino_al FOREIGN KEY (codigoAluno) REFERENCES aluno(codigo) ON DELETE CASCADE,
    CONSTRAINT fk_treino_ins FOREIGN KEY (codigoInstrutor) REFERENCES instrutor(codigo)
);

