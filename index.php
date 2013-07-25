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
    <body>
        <div class="row-fluid">
            <div class="span12">
                <div class="alert alert-info"><i class='icon-search'></i> <b>Wine Search Filter</b></div>

                <form class="form-horizontal well" style='width:480px;'>

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
                      <label class="control-label" for="wineryName">Region</label>
                      <div class="controls">
                        <select>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="wineryName">Years</label>
                      <div class="controls">
                        <select>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
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
                </div><!--closes span6-->
            
        </div><!-- closes row fluid -->
    </body>
</html>

