CREATE DATABASE gastronomy_web; 
CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50)  NOT NULL
);
CREATE TABLE utilisateur (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100)  NOT NULL,
    email VARCHAR(200)  NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES role(role_id) ON DELETE SET NULL
);

CREATE TABLE plat (
    plat_id INT AUTO_INCREMENT PRIMARY KEY,
    plat_name VARCHAR(100)  NOT NULL,
    description TEXT,
    image VARCHAR(255)
);

CREATE TABLE menu (
    menu_id INT AUTO_INCREMENT PRIMARY KEY,
    menu_name VARCHAR(100)  NOT NULL,
    description TEXT,

);


CREATE TABLE menu_plat (
    menu_id INT,
    plat_id INT,
    PRIMARY KEY (menu_id, plat_id),
    FOREIGN KEY (menu_id) REFERENCES menu(menu_id) ON DELETE CASCADE,
    FOREIGN KEY (plat_id) REFERENCES plat(plat_id) ON DELETE CASCADE
);

CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,    
    user_id INT NOT NULL,               
    menu_id INT NOT NULL,              
    reservation_date DATE NOT NULL,
    reservation_time TIME NOT NULL,         
    status ENUM('pending', 'approved', 'declined') DEFAULT 'pending', 
    FOREIGN KEY (user_id) REFERENCES utilisateur(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);

INSERT INTO role (role_name) 
VALUES ('client'),('chef');

-- this is our chef monsieur ali hassan 

INSERT INTO utilisateur (username, email, password, role_id) 
VALUES ('Ali Hassan', 'ali.hassan@chefmail.com', 'chef1234', 2);


