    
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wine Search</title>
        
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
            <div class="container" style="width:550px;">
           
                <div class="alert alert-info"><i class='icon-search'></i> <b>Wine Search Filter</b></div>
                
                
                <form class="form-horizontal well" action="process.php" method="get">

                    <div class="control-group">
                      <label class="control-label" for="wineName">Name of Wine</label>
                      <div class="controls">
                        <input type="text" id="wineName" placeholder="Wine Name">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="wineryName">Name of Winery</label>
                      <div class="controls">
                        <input type="text" id="wineryName" placeholder="Winery Name">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="grapeVariety">Grape Variety</label>
                      <div class="controls">
                        <select>
                            <?php 
                                $query = "SELECT variety_id, variety 
                                            FROM grape_variety";
                                $result = mysql_query($query);
                                while($query_data = mysql_fetch_array($result)){
                                    $variety_id = $query_data["variety_id"];
                                    $variety_name = $query_data["variety"];
                                    
                                    echo "<option value={$variety_id}>{$variety_name}</option>";
                                } 
                             ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" for="regionName">Region</label>
                      <div class="controls">
                        <select>
                            <?php 
                                $query = "SELECT region_name, region_id 
                                            FROM region";
                                $result = mysql_query($query);
                                while($query_data = mysql_fetch_array($result)){
                                    $region_id = $query_data["region_id"];
                                    $region_name = $query_data["region_name"];
                                    
                                    echo "<option value={$region_id}>{$region_name}</option>";
                                } 
                             ?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="minYears">Minimum of Years</label>
                      <div class="controls">
                            <select class="input-small" id="minYears">
                            <?php 
                                $query = "SELECT DISTINCT year
                                            FROM wine
                                            ORDER BY  wine.year ASC";
                                $result = mysql_query($query);
                                while($query_data = mysql_fetch_array($result)){
                                    $year = $query_data["year"];    
                                    echo "<option>{$year}</option>";
                                } 
                             ?>
                            </select>
                            - Maximum Years 
                            <select class="input-small" id="maxYears">
                            <?php 
                                $query = "SELECT DISTINCT year
                                            FROM wine
                                            ORDER BY  wine.year DESC";
                                $result = mysql_query($query);
                                while($query_data = mysql_fetch_array($result)){
                                    $year = $query_data["year"];    
                                    echo "<option>{$year}</option>";
                                } 
                             ?>
                            </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="minWineInStock">Minimum no. of wines in stock</label>
                      <div class="controls">
                        <input type="text" id="minWineInStock" placeholder="" class="input-small">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="minWineInStock">Minimum no. of wines orders</label>
                      <div class="controls">
                        <input type="text" id="minWineOrdered" placeholder="" class="input-small">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="minPrice">Min Price</label>  
                      <div class="controls">
                      <input type="text" id="minPrice" placeholder="" class="input-small">
                      - Max Price
                      <input type="text" id="maxPrice" placeholder="" class="input-small">
                      </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>
             </div> 
        </div><!-- closes row fluid -->
      </div>
    </body>
</html>

