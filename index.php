<!DOCTYPE html>
<html lang="en">
<?php
    require_once ('./assets/inc/head.php');
?>
<body class="home">
<?php
    require_once ('./assets/inc/banner.php');
?>
<section class="section">
    <div class="has-centered-content">
        <form  name="csv-import-tool" id="csv-import-tool"  method="post" action="import_utility.php"
           enctype="multipart/form-data" >
            <h3>CSV Import Utility</h3>
            <div>
                <div id="field-one" class="field-container"><br/>
                    <div class="import-field is-flex flex-wrap" >
                        <label class="upload-label" for="file-upload">Import CSV file:</label>
                        <input type="file" tabindex="2" class="file-upload" id="file-upload" name="file-upload"
                               title="CSV File Upload"
                               accept=".csv, .xls, .xlsx" />
                        <input type="submit" class="import-button" name="file-import" id="file-import"
                               value="Import" />
                        <p id="file-upload-error" class="error-message"></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
    require_once ('./assets/inc/footer.php');
?>
<div class="back-to-top"><i class="fas fa-angle-up sp-arrow-up"></i></div>
<script src="./assets/js/scripts.js"></script>
</body>
</html>