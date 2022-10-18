<style>
  <?php include 'CSS/salesreportresult.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JavaJam Coffee House - Menu</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <div id="wrapper">
      <header>
        <!-- http://www.blueeyedrabbit.com/chapter4/javajam4.html -->
        <img src="./Images/header.jpg" alt="JavaJam Coffee House" />
      </header>
      <nav>
        <ul>
          <li><a href="salesreport.html">Daily Sales Report</a></li>
        </ul>
      </nav>
      <main>
        <?php

          $sales_type = $_POST["sales_type"];

          if (!$sales_type) {
            echo "You have not select the sales report type. Please go back and try again.";
            exit;
          }

          @ $db = new mysqli('localhost', 'root', '', 'javajam');

          if (mysqli_connect_errno()) {
            echo 'Error: Could not connect to database. Please try again later.';
            exit;
          }


          $query_products = "SELECT name, SUM(quantity), SUM(price) FROM sales GROUP BY name";

          $query_categories = "SELECT category, SUM(quantity), SUM(price) FROM sales GROUP BY category";

          $result_products = $db->query($query_products);
          $result_categories = $db->query($query_categories);

          $num_results_products = $result_products->num_rows;

          echo "<h2>Total dollar and quantity sales by ".$sales_type.":</h2>";

          if ($sales_type == 'products') {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Product</th>";
            echo "<th>Total Dollar Sales</th>";
            echo "<th>Quantity Sales</th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
          }

          for ($i = 0; $i < $num_results_products ; $i++) {
            $row = $result_products->fetch_assoc();

            if (!isset($product_top_name)) {
              $product_top_name = $row['name'];
              $product_top_price = $row['SUM(price)'];
            } elseif ($row['SUM(price)'] > $product_top_price) {
              $product_top_name = $row['name'];
              $product_top_price = $row['SUM(price)'];
            }

            if ($sales_type == 'products') {
              echo "<tr>";
              echo "<td>".$row['name']."</td>";
              echo "<td>$".$row['SUM(price)']."</td>";
              echo "<td>".$row['SUM(quantity)']."</td>";
              echo "</tr>";
            }
          }

          if ($sales_type == 'products') {
            echo "</tbody>";
            echo "</table>";
          }

          $num_results_categories = $result_categories->num_rows;

          if ($sales_type == 'categories') {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Category</th>";
            echo "<th>Total Dollar Sales</th>";
            echo "<th>Quantity Sales</th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
          }

          for ($i = 0; $i < $num_results_categories ; $i++) {
            $row = $result_categories->fetch_assoc();

            if (!isset($category_top_name)) {
              $category_top_name = $row['category'];
              $category_top_price = $row['SUM(price)'];
            } elseif ($row['SUM(price)'] > $category_top_price) {
              $category_top_name = $row['category'];
              $category_top_price = $row['SUM(price)'];
            }

            if ($sales_type == 'categories') {
              echo "<tr>";

              if ($row['category'] == NULL) {
                echo "<td>NULL</td>";
              } else {
                echo "<td>".$row['category']."</td>";
              }
              
              echo "<td>$".$row['SUM(price)']."</td>";
              echo "<td>".$row['SUM(quantity)']."</td>";
              echo "</tr>";
            }

          }

          if ($sales_type == 'categories') {
            echo "</tbody>";
            echo "</table>";
          }

          echo "<p>Popular option of best selling product is ".$category_top_name." of ".$product_top_name.".</p>";

          $result_products->free();
          $db->close();
        ?>
        
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

