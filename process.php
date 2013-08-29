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

   <body>
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
        <div class="row-fluid">
            <div class="span12">
                <div class="alert alert-info"><i class='icon-search'></i> <b>Wine Search Filter</b></div>
				
                <table class="table table-bordered table-striped" style="width:95%; margin:auto;">
                    
					<th>ID</th>
                    <th>Wine Name</th>
                    <th>Grape Variety</th>
                    <th>Year</th>
                    <th>Winery Name</th>
                    <th>Region</th>
                    <th>Cost of wine in inventory</th>
                    <th>Total Number of bottles avail.</th>
                    <th>Total stock sold of wine</th>
                    <th>Total Sales Revenue of wine</th>


<?php
          
        $wine_name =  isset($_GET["wineName"]) ? htmlspecialchars($_GET["wineName"]) : 0;
        $winery_name = isset($_GET["wineryName"]) ? htmlspecialchars($_GET["wineryName"]) : 0;
        $grape_variety = isset($_GET["grapeVariety"]) ? intval($_GET["grapeVariety"]) : 0;
        $region_id = intval($_GET["region"]);
        $minYear = intval($_GET["minYear"]);
        $maxYear = intval($_GET["maxYear"]);
        $minWineInStock = intval($_GET["minWineInStock"]);
        $minWineOrdered = intval($_GET["minWineOrdered"]);
        $minPrice = doubleval($_GET["minPrice"]);
        $maxPrice = doubleval($_GET["maxPrice"]);
          
        $query = "SELECT 
                  DISTINCT wine.wine_id,
                  wine.wine_name,
                  grape_variety.variety_id,
                  grape_variety.variety,
                  wine.year,
                  winery.winery_name,
                  region.region_name,
                  region.region_id,
                  inventory.cost,
                  inventory.on_hand
                FROM 
                  winery, 
                  region, 
                  wine, 
                  wine_variety, 
                  grape_variety, 
                  inventory, 
                  wine_type,
                  items
                WHERE 
                  winery.region_id = region.region_id
                AND 
                  wine.winery_id = winery.winery_id
                AND 
                  grape_variety.variety_id = wine_variety.variety_id
                AND
                  wine.wine_id = wine_variety.wine_id
                AND
                  inventory.wine_id = wine_variety.wine_id
                AND
                  wine.wine_type = wine_type.wine_type_id
                AND 
                  wine.wine_id = items.wine_id
                ";
                  
      
          if(!empty($wine_name))
            $query .= " AND wine.wine_name = \"$wine_name\"";  
              
          if(!empty($winery_name))
            $query .= " AND winery.winery_name = \"$winery_name\"";
          
          if(!empty($grape_variety))
            $query .= " AND grape_variety.variety_id = \"$grape_variety\"";
          
          //If user has entered a specific region and not all, then to the SQL query
          if(!empty($region_id) && $region_id != 1)
            $query .= " AND winery.region_id = \"$region_id\"";
          
          if(!empty($minYear) && $minYear > 0)
            $query .= " AND wine.year >= $minYear";
        
          if(!empty($maxYear) && $maxYear > 0)
            $query .= " AND wine.year <= $maxYear";
        
          if(!empty($minWineInStock) && $minWineInStock > 0)
            $query .= " AND inventory.on_hand >= $minWineInStock";
            
          if(!empty($minWineOrdered) && $minWineOrdered > 0)
            $query .= " AND inventory.cost >= $minWineOrdered";
        
          $query .= " ORDER BY 
                  wine.wine_id,
                  wine.wine_name
              ";

          $result = mysql_query($query);
          while($query_data = mysql_fetch_array($result)){
            $wine_id = $query_data["wine_id"];
            $wine_name = $query_data["wine_name"];
            $grape_variety = $query_data["variety"];
            $wine_year = $query_data["year"];
            $winery_name = $query_data["winery_name"];
            $region_name = $query_data["region_name"];
            $cost = $query_data["cost"];
            $on_hand = $query_data["on_hand"];
            $quantity = $query_data["quantity"];
            $total_stock_sold = $query_data["total_stock_sold"];
            
          echo "  <tr>
                <td>{$wine_id}</td>
                <td>{$wine_name}</td>
                <td>{$grape_variety}</td>
                <td>{$wine_year}</td>
                <td>{$winery_name}</td>
                <td>{$region_name}</td>
                <td>{$cost}</td>
                <td>{$on_hand}</td>
                <td>{$quantity}</td>
                <td>{$total_stock_sold}</td>
              </tr>
                ";
          }
          ?>
            </div>
         </div><!-- close span12 -->
     </body>
</html>