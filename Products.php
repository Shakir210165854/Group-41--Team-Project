<?php
session_start();
include('db_connection.php');

// Set current page variable
$currentPage = 'products'; // Change this according to the current page

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- <link rel="stylesheet" type="text/css" href="stylesheet.css"/> -->
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png">
    <style>
        <?php include 'stylesheet.css'; ?>
    </style>
</head>

<body>
    <nav>
        <a class="logo" onclick="return false;">
            <img src="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png" alt="ATlogo" />
        </a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <?php
        if (isset($_SESSION['user_id'])) {
            echo ' <button onclick="window.location.href = \'myAccount.php\';">My Account</button>';
        } else {
            echo '<button onclick="window.location.href = \'loginpage.php\';">My Account</button>';
        }
        ?>
        <button class="<?php echo ($currentPage === 'products') ? 'active' : ''; ?>" onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>

    </nav>

    <div class='mainContent' style="color: aliceblue;">
        <div class="header-con">
            <div class="search">

                <form method="post" action="">
                    <input class="searchB" type="text" placeholder="Search..." name="search">
                    <button name="submit">Search</button>
                </form>

                <div class="login">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        // If logged in, show logout button
                        echo '<div class="login">';
                        echo '<form action="logout.php" method="post">';
                        echo '<button type="submit" name="logout">Logout</button>';
                        echo '</form>';
                        echo '</div>';
                    } else {
                        // If not logged in, show login button
                        echo '<div class="login">';
                        echo '<button onclick="window.location.href = \'loginpage.php\';">Login</button>';
                        echo '</div>';
                    }
                    ?>

                    <div class="Basket">
                        <a onclick="window.location.href = 'shopping_basket.php';"><img src="Basket.png" alt="ATlogo"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <h3 class="title">Products</h3> -->
        <?php
        echo '<hr style="border: none; height: 1px; background-color: white;">';
        ?>
        <div class="title">
            <div class="sort">
                <form method="post" action="" id="sortForm">
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort" onchange="submitForm()">
                        <option value="">Select</option>
                        <option value="name_asc">Name A-Z</option>
                        <option value="name_desc">Name Z-A</option>
                        <option value="price_asc">Price Low to High</option>
                        <option value="price_desc">Price High to Low</option>
                    </select>
                </form>
                <h3 class="title" style="color: #5e1698">Products</h3>
                <h3 class="title">Products</h3>
                <h3 class="title" style="color: #5e1698">Products</h3>
                
                <form method="post" action="" id="filterForm">
                    <label for="category">Filter by Category:</label>
                    <select name="category" id="category" onchange="submitFilter()">
                        <!-- Categories will be populated dynamically -->
                        <?php
                        $sql_categories = "SELECT DISTINCT category FROM items";
                        $result_categories = $conn->query($sql_categories);

                        echo '<option value="">Select</option>';
                        while ($row_category = $result_categories->fetch_assoc()) {
                            $category = $row_category['category'];
                            echo '<option value="' . $category . '">' . $category . '</option>';
                        }
                        ?>
                    </select>
                </form>
                <h3></h3>
                <!-- <button type="submit" name="sort_submit">Sort</button> -->

                <!-- <a onclick="window.location.href = 'shopping_basket.php';"><img src="Basket.png" alt="ATlogo"></a> -->

            </div>

        </div>
        <div class="stock">
            <?php
            if (isset($_POST['submit'])) {
                // If search form is submitted

                $search = mysqli_real_escape_string($conn, $_POST['search']);

                // Used for searching
                $sql = "SELECT * FROM items
                        WHERE items.item_name LIKE '%$search%'";

                $result = $conn->query($sql);

                if ($result->num_rows === 0) {
                    echo '<p>Item not found.</p>';
                }
            } else {
                $sql = "SELECT * FROM items";

                $result = $conn->query($sql);

                if (isset($_POST['sort'])) {
                    // If sort option is selected
                    $sort_option = $_POST['sort'];
                    switch ($sort_option) {
                        case 'name_asc':
                            $order_by = 'items.item_name ASC';
                            break;
                        case 'name_desc':
                            $order_by = 'items.item_name DESC';
                            break;
                        case 'price_asc':
                            $order_by = 'items.price ASC';
                            break;
                        case 'price_desc':
                            $order_by = 'items.price DESC';
                            break;
                        default:
                            $order_by = 'items.item_name ASC';
                    }

                    $sql .= " ORDER BY $order_by";
                }
                if (isset($_POST['category'])) {
                    // If category filter is selected
                    $category_filter = $_POST['category'];
                    if ($category_filter != '') {
                        $sql .= " WHERE items.category = '$category_filter'";
                    }
                }

                $result = $conn->query($sql);
            }

            echo '<div class="items-container">';

            while ($row = $result->fetch_assoc()) {
                echo '<div class="item">';
                $image = base64_encode($row['image']);

                echo '<img src="data:image/jpeg;base64,' . $image . '" alt="Item Image">';
                echo '<div class="item-name">' . $row['item_name'] . '</div>';
                echo '<div class="item-description">' . $row['description'] . '</div>';

                // Check if quantity is 0
                if ($row['quantity'] == 0) {
                    echo '<div class="item-price" style="color: red;">Out of Stock</div>';
                } else {
                    echo '<div class="item-price">£' . $row['price'] . '</div>';
                    echo '<div class="category">' . $row['category'] . '</div>';
                    // Hide quantity label if quantity is 0
                    if ($row['quantity'] > 0) {
                        echo '<label for="quantity">Quantity:</label>';
                    }
                    // Only shows Add to Basket button if the user is logged in and the quantity is available
                    if (isset($_SESSION['user_id']) && $row['quantity'] > 0) {
                        echo '<form method="post" action="add_to_cart.php">';
                        echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '">';
                        echo '<input type="hidden" name="item_name" value="' . $row['item_name'] . '">';
                        echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
                        echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                        echo '<input type="hidden" name="category" value="' . $row['category'] . '">';
                        echo '<input type="number" name="quantity" id="quantity" min="1" max="' . $row['quantity'] . '" value="1" style="width: 50%;">';
                        echo '<button type="submit" name="add_to_cart">Add to Basket</button>';
                        echo '</form>';
                    } else {
                        // If user is not logged in or item is out of stock, display appropriate message
                        echo '<button onclick="window.location.href = \'loginpage.php\';">Login to purchase</button>';
                    }
                }

                echo '<div style="margin-top: 10px;"></div>';
                // New page to read more about product
                echo '<button class="readmore" onclick="redirectToReadMore(' . $row['item_id'] . ')">Read more</button>';
                echo '</div>';
            }

            // JavaScript function to redirect to ReadMore.php with item_id parameter
            echo '<script>
                    function redirectToReadMore(itemId) {
                        window.location.href = "ReadMore.php?item_id=" + itemId;
                    }
                  </script>';

            echo '</div>'; // Close the items container
            ?>
        </div>
    </div>
</body>
<script>
    function submitForm() {
        document.getElementById("sortForm").submit();
    }

    function submitFilter() {
        document.getElementById("filterForm").submit();
    }
</script>
</html>

