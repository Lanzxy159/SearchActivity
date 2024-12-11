CREATE TABLE MedicalProfessionals (
    med_id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Age INT NOT NULL,
    YearsOfExperience INT NOT NULL,
    Specialization VARCHAR(100) NOT NULL
);
