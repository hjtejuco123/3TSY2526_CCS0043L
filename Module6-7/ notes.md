What is a Database?

A database is an organized collection of related information.

Think of it as an electronic filing cabinet.

Instead of storing papers, a database stores records.

Example

Student Records

| ID | Name  | Course |
| -- | ----- | ------ |
| 1  | Juan  | BSCS   |
| 2  | Maria | BSIT   |
| 3  | Pedro | BSIS   |

# What is MySQL?

MySQL is a

* Relational Database Management System (RDBMS)
* Open-source
* Uses SQL
* Fast and reliable

# SQL

SQL stands for

**Structured Query Language**

It is used to

* Create databases
* Create tables
* Insert data
* Update data
* Delete data
* Retrieve data

**Creating a Database**

CREATE DATABASE database_name;

CREATE DATABASE dbSchool;

---



Show if exist

SHOW DATABASES;

---



Use Database

USE dbSchool;



---



Creating Table

Syntax

CREATE TABLE table_name(
column datatype,
column datatype
);

Example

CREATE TABLE tblStudent(
studentID INT AUTO_INCREMENT PRIMARY KEY,
lastname VARCHAR(50),
firstname VARCHAR(50),
course VARCHAR(30),
yearLevel INT
);

---



view Tables

SHOW TABLES;

---



Inserting Record

Syntax

INSERT INTO table
VALUES(...);

INSERT INTO tblStudent
(lastname,firstname,course,yearLevel)

VALUES

('Santos','Juan','BSCS',1);

INSERT INTO tblStudent
(lastname,firstname,course,yearLevel)

VALUES

('Cruz','Maria','BSIT',2);

---



View Records

SELECT * FROM tblStudent;

---



UPDATE table

SET column=value

WHERE condition;


UPDATE tblStudent

SET course='BSIS'

WHERE studentID=1;

---

Delete Records


DELETE FROM table

WHERE condition;


DELETE FROM tblStudent

WHERE studentID=2;

---

Searching Records

SELECT * FROM tblStudent;


SELECT *

FROM tblStudent

WHERE lastname='Santos';


---

Sorting


SELECT *

FROM tblStudent

ORDER BY lastname ASC;

ORDER BY lastname DESC;

---

Modify Column


ALTER TABLE tblStudent

MODIFY lastname VARCHAR(100);

---



Rename Column


ALTER TABLE tblStudent

CHANGE lastname surname VARCHAR(100);


---

Drop Column


ALTER TABLE tblStudent

DROP gender;

---

Drop Table

DROP TABLE tblStudent;

---
