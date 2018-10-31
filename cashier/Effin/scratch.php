		<div class="col-sm-12">
		<center>
        		<label>SELECT PACKAGE:</label>
                <SELECT name="Package" class="form-control" >
                <OPTION>PACKAGE</OPTION>
                <?php 
                include_once('../summarycon.php');
                $select = "SELECT DISTINCT id, PackName, PackPrice FROM qpd_package";
		        $result = mysqli_query($con, $select);
		        $i=0;
		        while($row = mysqli_fetch_array($result))
		        {
		        	echo "<option value='".$row['id']."'>".$row['PackName']." ( ".$row['PackPrice']." ) </option>";
				}?>
	            </SELECT>
	    </center>
        </div>



<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<div class="search-box">
			<p>Package to Avail:</p>
        	<input type="text" autocomplete="off" name="PackName" placeholder="Search Package Name..." id="txtbox" />
        	<div class="result"></div>
        </div>

    /* Formatting search box */
    .search-box{
        width: 380px;
        position: relative;
        display: inline-block;
        font-size: 18px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 18px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        background: #CCCCCC
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #CCCCCC;
    }