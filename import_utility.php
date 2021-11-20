<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';

require_once ('./assets/inc/head.php');

echo '<body class="home">';

require_once ('./assets/inc/banner.php');

$servername = DBHOST;
$username = DBUSER;
$password = DBPWD;
$dbname = DBNAME;
$sql = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_FILES['csv-import-tool'])) {
        $fileName = $_FILES['csv-import-tool']['tmp_name'];
        if($_FILES['csv-import-tool']['size'] > 0) {
            $file = fopen($fileName, 'r');

            while(($column = fgetcsv($file)) !== false) {
                $sql = "SET @DBBackup = 'dbname.dbtable';
                        REPLACE INTO dbname.dbtable (field_one, field_two, field_three, field_four, field_five, field_six, field_seven)
                        VALUES ('" . $column[0] . "', '" . $column[1] . "', '" . $column[2] . "', '" . $column[3] . "', '" . $column[4] . "', '" . $column[5] . "', '" . $column[6] . "');";

                // use prepare() and execute() to protect and update data.
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }
        }
    }
    echo "<p style='color:green'>New record created successfully.</p>";
    echo "<META http-equiv='REFRESH' content='2; url=./index.php'>";
} catch(PDOException $e) {
    echo $sql . "<p class='error-message'>" . $e->getMessage() . "</p>";
}

$conn = null;

require_once ('./assets/inc/footer.php');

echo '</body>
</html>';