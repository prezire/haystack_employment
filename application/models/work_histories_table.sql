CREATE TABLE work_histories(id INT NOT NULL AUTO_INCREMENT,
resume_id INT NOT NULL,
position VARCHAR(255) NOT NULL,
company VARCHAR(255) NOT NULL,
location VARCHAR(255) NOT NULL,
summary TEXT NOT NULL,
from DATE,
to DATE,
is_current_work TINYINT(1) NOT NULL,
PRIMARY KEY (id))