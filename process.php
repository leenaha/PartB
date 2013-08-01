<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wine Search Results</title>
        
        <!-- Le styles -->
        <link href="bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
        <style>
            .table th, .table td {
                border-top:0px;
            }
        </style>
    </head>
    
    <?php
	require_once('db.php');
	if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) {
      		echo 'Could not connect to mysql on ' . DB_HOST . '\n';
      		exit;
   	}
	
	if(!mysql_select_db(DB_NAME, $dbconn)) {
      		echo 'Could not user database ' . DB_NAME . '\n';
     	 	echo mysql_error() . '\n';
      		exit;
   	}
    ?>
    <body>
        <div class="row-fluid">
            <div class="span12">
                <div class="alert alert-info"><i class='icon-search'></i> <b>Wine Search Filter</b></div>
            <div class="container">
                <h2>Wine Search Results</h2>
                <?php
                    $wine_name = htmlspecialchars($_GET["wineName"]);
                    $winery_name = htmlspecialchars($_GET["wineryName"]); 
                    $grape_variety = htmlspecialchars($_GET["grapeVariety"]);
                    $region = htmlspecialchars($_GET["region"]);
                    $minYear = htmlspecialchars($_GET["minYear"]);
                    $maxYear = htmlspecialchars($_GET["maxYear"]);
                    $minWineInStock = htmlspecialchars($_GET["minWineInStock"]);
                    $minWineOrdered = htmlspecialchars($_GET["minWineOrdered"]);
                    $minPrice = htmlspecialchars($_GET["minPrice"]);
                    $maxPrice = htmlspecialchars($_GET["maxPrice"]);
                ?>
                
                <table class="table table-striped">
                    <tr>
                    <th>Wine Name</th>
                    <th>Grape Variety</th>
                    <th>Year</th>
                    <th>Winery</th>
                    <th>Region</th>
                    <th>Cost of wine in inventory</th>
                    <th>Total Number of bottles avail.</th>
                    <th>Total stock sold of wine</th>
                    <th>Total Sales Revenue of wine</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div><!-- close container-->
        </div><!-- close span12 -->
    </body>
</html>