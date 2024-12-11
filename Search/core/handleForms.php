<?php  

require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['insertUserBtn'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Age = $_POST['Age'];
    $YearsOfExperience = $_POST['YearsOfExperience'];
    $Specialization = $_POST['Specialization'];
	$insertUser = insertNewUser($pdo, $FirstName, $LastName, $Age, $YearsOfExperience, $Specialization );

	if ($insertUser) {
		$_SESSION['message'] = "Successfully inserted!";
		header("Location: ../index.php");
	}
}


if (isset($_POST['editUserBtn'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Age = $_POST['Age'];
    $YearsOfExperience = $_POST['YearsOfExperience'];
    $Specialization = $_POST['Specialization'];
    $editUser = editUser($pdo, $FirstName, $LastName, $Age, $YearsOfExperience, $Specialization, $_GET['id']);
    if ($editUser) {
        $_SESSION['message'] = "Successfully edited!";
        header("Location: ../index.php");
      
    }
}


if (isset($_POST['deleteUserBtn'])) {
	$deleteUser = deleteUser($pdo,$_GET['id']);
	if ($deleteUser) {
		$_SESSION['message'] = "Successfully deleted!";
		header("Location: ../index.php");
	}
}

if (isset($_GET['searchBtn'])) {
	$searchForAUser = searchForAUser($pdo, $_GET['searchInput']);
	foreach ($searchForAUser as $row) {
		echo "<tr> 
				<td>{$row['med_id']}</td>
				<td>{$row['FirstName']}</td>
				<td>{$row['LastName']}</td>
				<td>{$row['Age']}</td>
				<td>{$row['YearsOfExperience']}</td>
				<td>{$row['Specialization']}</td>
			  </tr>";
	}
}

?>