
<?php
 @ $db = new mysqli('localhost', 'root', '', 'javajam');

 if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
 }   
 $query = "SELECT * FROM coffee WHERE 1";    
 $result = $db->query($query); 
 $num_results = $result->num_rows;

 for ($i=0; $i <$num_results; $i++) {
    $row = $result->fetch_assoc();
    if($row['name']=="Just_Java")
    {
      $JustJava=$row['price'];
    }
    elseif($row['name']=="Cafe_au_Lait"&&$row['is_double']==0){
      $CafeauLaitSingle=$row['price'];
    }
    elseif($row['name']=="Cafe_au_Lait"&&$row['is_double']==1){
      $CafeauLaitDouble=$row['price'];
    }
    elseif($row['name']=="Iced_Capuccino"&&$row['is_double']==0){
      $IcedCapuccinoSingle=$row['price'];
    }
    elseif($row['name']=="Iced_Capuccino"&&$row['is_double']==1){
      $IcedCapuccinoDouble=$row['price'];
    }
 }

 

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JavaJam Coffee House - Menu</title>
    <meta charset="utf-8" />
    <link href="./CSS/priceupdate.css" rel="stylesheet" />
    <script type="text/javaScript" src="./JS/priceupdate.js"></script>
  </head>
  <body>
    <div id="wrapper">
      <header>
        <img src="./Images/header.jpg" alt="JavaJam Coffee House" />
      </header>
      <nav>
        <ul>
          <li>
            <a href="priceupdate.html"
              >Produce <br />
              Price<br />
              Update
            </a>
          </li>
        </ul>
      </nav>
      <main>
        <h2 >Coffee at JavaJam</h2>
        <table border="0">
          <tr>
            <td class="specialcolumn" >
              <label>
                <input type="checkbox" onclick="myFunction(this,1)" />
              </label>
            </td>
            <td class="bold center">Just Java</td>
            <td>
              Regular house blend, decaffeinated coffee, or flavor of the day.
              <br />
              Endless Cup 
              <span class="uncheck">
              $ <?php echo $JustJava ?> 
              </span>
              
              <span class="checked" style="display:none">
              <form action="updateprice.php" method="post">
              <input type="text" name="name" value="Just_Java" style="display: none;">
              $ <input type="number" name="singlePrice" require  min="0" max="10" step="0.5" value="<?php echo $JustJava ?>">
              <input type="submit" class="confirmbutton" value="confirm" >  
              </form>    
            </span>
            </td>
          </tr>
          
          <tr>
            <td>
              <label>
                <input type="checkbox" onclick="myFunction(this,2)" />
              </label>
            </td>

            <td class="bold center">Cafe au Lait</td>
            <td>
              House blended coffee infused into a smooth, steamed milk.
              <br>
             
                <span class="uncheck">
                Single $ <?php echo $CafeauLaitSingle ?> Double $ <?php echo $CafeauLaitDouble ?>
                </span>
              <span class="checked" style="display:none">

              <form action="updateprice.php" method="post">
              <input type="text"name="name" value="Cafe_au_Lait"style="display: none;">
              Single $ 
              <input type="number"name="singlePrice" require  min="0" max="10" step="0.5" value="<?php echo $CafeauLaitSingle ?>">
              Double $
              <input type="number"name="doublePrice" require  min="0" max="10" step="0.5" value="<?php echo $CafeauLaitDouble ?>">
              <input type="submit" class="confirmbutton" value="confirm" > 
              </form>
              </span>
   
              
            </td>
          </tr>
          <tr>
            <td class="specialcolumn">
              <label>
                <input type="checkbox" onclick="myFunction(this,2)" />
              </label>
            </td>

            <td class="bold center">Iced Capuccino</td>
            <td>
              Sweetened espresso blended with icy-cold milk and served in a
              chilled glass.
              <br />
              <span class="uncheck">
                Single $ <?php echo $IcedCapuccinoSingle ?> Double $ <?php echo $IcedCapuccinoDouble ?>
                </span>
              <span class="checked" style="display:none">

              <form action="updateprice.php" method="post">
              <input type="text"name="name" value="Iced_Capuccino"style="display: none;">
              Single $ 
              <input type="number"name="singlePrice" require  min="0" max="10" step="0.5" value="<?php echo $IcedCapuccinoSingle ?>">
              Double $
              <input type="number"name="doublePrice" require  min="0" max="10" step="0.5" value="<?php echo $IcedCapuccinoDouble ?>">
              <input type="submit" class="confirmbutton" value="confirm" > 
              </form>
              </span>
            </td>
          </tr>
        </table>
      </main>
      <footer>
        <small
          ><i>
            Copyright &copy; 2014 JavaJam Coffee House
            <br />
            <a href="mailto:jiawei@lim.com">jiawei@lim.com</a>
          </i></small
        >
      </footer>
    </div>
  </body>
</html>