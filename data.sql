CREATE DATABASE IF NOT EXISTS webservice;
USE webservice;

CREATE TABLE IF NOT EXISTS space (  
    name VARCHAR(255), 
    cpu VARCHAR(255),  
    gpu VARCHAR(255),  
    ram VARCHAR(255),  
    psu VARCHAR(255)   
);