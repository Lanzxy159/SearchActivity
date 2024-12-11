<?php  

require_once 'dbConfig.php';

function getAllUsers($pdo) {
	$sql = "SELECT * FROM medicalprofessionals 
			ORDER BY FirstName ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getUserByID($pdo, $id) {
	$sql = "SELECT * from medicalprofessionals WHERE med_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function searchForAUser($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM medicalprofessionals WHERE 
			CONCAT(FirstName,LastName,Age,YearsOfExperience,Specialization) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}



function insertNewUser($pdo,$FirstName,$LastName,$Age,$YearsOfExperience,$Specialization) {

	$sql = "INSERT INTO medicalprofessionals 
			(
				FirstName,
				LastName,
				Age,
				YearsOfExperience,
				Specialization
			)
			VALUES (?,?,?,?,?)
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([
        $FirstName,$LastName,$Age,$YearsOfExperience,$Specialization
	]);

	if ($executeQuery) {
		return true;
	}

}

function editUser($pdo, $FirstName, $LastName, $Age, $YearsOfExperience, $Specialization, $Med_id) {
    $sql = "UPDATE medicalprofessionals
            SET FirstName = ?,
                LastName = ?,
                Age = ?,
                YearsOfExperience = ?,
                Specialization = ?
            WHERE med_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$FirstName, $LastName, $Age, $YearsOfExperience, $Specialization, $Med_id]);

    return $executeQuery;
}


function deleteUser($pdo, $id) {
	$sql = "DELETE FROM medicalprofessionals 
			WHERE med_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return true;
	}
}




?>