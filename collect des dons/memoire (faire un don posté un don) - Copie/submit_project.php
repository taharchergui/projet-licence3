<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = $_POST['projectName'];
    $projectDescription = $_POST['projectDescription'];
    $projectGoal = $_POST['projectGoal'];
    $beneficiaryName = $_POST['beneficiaryName'];
    $beneficiaryEmail = $_POST['beneficiaryEmail'];

    // Connect to the database (update with your database connection info)
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the project into the database
    $sql = "INSERT INTO projects (projectName, projectDescription, projectGoal, beneficiaryName, beneficiaryEmail)
            VALUES ('$projectName', '$projectDescription', '$projectGoal', '$beneficiaryName', '$beneficiaryEmail')";

    if ($conn->query($sql) === TRUE) {
        echo "Projet soumis avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = $_POST['projectName'];
    $projectDescription = $_POST['projectDescription'];
    $projectGoal = $_POST['projectGoal'];
    $beneficiaryName = $_POST['beneficiaryName'];
    $beneficiaryEmail = $_POST['beneficiaryEmail'];

    // Gestion du fichier uploadé
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifiez si le fichier est une image ou un fichier PDF
    if ($fileType != "pdf" && $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        echo "Désolé, seuls les fichiers PDF, JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifiez si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifiez la taille du fichier
    if ($_FILES["fichier"]["size"] > 5000000) { // 5MB maximum
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Si $uploadOk est 0, le fichier ne sera pas téléchargé
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
            echo "Le fichier ". htmlspecialchars(basename($_FILES["fichier"]["name"])). " a été téléchargé.";

            // Connectez-vous à la base de données
            $conn = new mysqli('localhost', 'username', 'password', 'database');

            // Vérifiez la connexion
            if ($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            // Insérez le projet dans la base de données
            $sql = "INSERT INTO projects (projectName, projectDescription, projectGoal, beneficiaryName, beneficiaryEmail, filePath)
                    VALUES ('$projectName', '$projectDescription', '$projectGoal',



                    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = $_POST['projectName'];
    $projectDescription = $_POST['projectDescription'];
    $projectGoal = $_POST['projectGoal'];
    $beneficiaryName = $_POST['beneficiaryName'];
    $beneficiaryEmail = $_POST['beneficiaryEmail'];

    // Gestion du fichier uploadé
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifiez si le fichier est une image ou un fichier PDF
    if ($fileType != "pdf" && $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        $error_message = "Désolé, seuls les fichiers PDF, JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifiez si le fichier existe déjà
    if (file_exists($target_file)) {
        $error_message = "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifiez la taille du fichier
    if ($_FILES["fichier"]["size"] > 5000000) { // 5MB maximum
        $error_message = "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Si $uploadOk est 0, le fichier ne sera pas téléchargé
    if ($uploadOk == 0) {
        $message = "Désolé, votre fichier n'a pas été téléchargé. $error_message";
    } else {
        if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
            $success_message = "Le fichier " . htmlspecialchars(basename($_FILES["fichier"]["name"])) . " a été téléchargé.";

            // Connectez-vous à la base de données
            $conn = new mysqli('localhost', 'username', 'password', 'database');

            // Vérifiez la connexion
            if ($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            // Insérez le projet dans la base de données
            $sql = "INSERT INTO projects (projectName, projectDescription, projectGoal, beneficiaryName, beneficiaryEmail, filePath)
                    VALUES ('$projectName', '$projectDescription', '$projectGoal', '$beneficiaryName', '$beneficiaryEmail', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                $message = "Projet soumis avec succès! $success_message";
            } else {
                $message = "Erreur: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            $message = "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
} else {
    $message = "Aucune donnée soumise.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Soumission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="alert <?php echo isset($success_message) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="index.html" class="btn btn-primary">Retour à la page de soumission</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
