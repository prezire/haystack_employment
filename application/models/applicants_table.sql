CREATE TABLE applicants(id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
expected_salary INT NOT NULL,
internship_position VARCHAR(255) NOT NULL,
preferred_country VARCHAR(255) NOT NULL,
industry VARCHAR(255) NOT NULL,
PRIMARY KEY (id))