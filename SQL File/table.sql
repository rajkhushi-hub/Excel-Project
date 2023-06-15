/* create database */
CREATE DATABASE exceldb;
/*create empolyee table*/
CREATE TABLE empolyee(`SNO` INT(7) PRIMARY KEY,
                      `EMPOLYEE ID` VARCHAR(30),
                      `EMPOLYEE NAME` VARCHAR(30),
                      `EMPOLYEE DOB` DATE,
                      `DEPARTMENT` VARCHAR(30),
                      `DESIGNATION` VARCHAR(30),
                      `SALARY` FLOAT(9,2),
                      `MOBILE` BIGINT(15),
                      `EMAIL ID` VARCHAR(30),
                      `ADDRESS` VARCHAR(100));