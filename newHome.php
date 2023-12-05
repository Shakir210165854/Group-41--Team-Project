<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Design.css"/>
</head>

<style>
body {
    display: flex;
    margin: 0;
}

nav {
    flex: 1;
    max-width: 200px;
    display: flex;
    justify-content: space-around;
    flex-direction: column;
    background: #5e1698;
    z-index: 3; 
}

nav button {
    background-color: #5e1698;
    border: none;
    color: white;
    padding: 30px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
}

nav button:hover {
    background-color: #252322;
}

nav button:active {
    background-color: #252322;
}

.logo {
    text-align: center;
    outline: none;
}

.logo img {
    max-height: 80px;
}

.header {
    background-color: #5e1698;
    color: rgb(246, 242, 242);
    padding: 10px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.mainContent {
    flex: 3;
    background: #252322;
    min-height: 100vh;
    font-family: Montserrat, sans-serif;
    position: relative;
    z-index: 1; 
}

.footer {
    background-color: #5e1698;
    color: rgb(246, 242, 242);
    padding: 10px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.title {
    color: rgb(246, 242, 242);
    font-size: 50px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    text-align: center;
    background-color: #5e1698;
}

.subtitle {
    color: rgb(246, 242, 242);
    font-size: 40px;
    font-family: 'Arial', sans-serif;
    text-align: center;
}

.hero-image {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    margin-bottom: 20px;
}

.paragraph-one {
    color: rgb(246, 242, 242);
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    padding-left: 50px;
    padding-right: 50px;
}

.paragraph-two {
    color: rgb(246, 242, 242);
    font-size: 16px;
    font-style: italic;
    text-align: center;
    padding-left: 50px;
    padding-right: 50px;
}

login button {
    background-color: #5e1698; /* Purple */
    border: none;
    color: white;
    padding: 10px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-top-left-radius: 25px; /* Rounded top-left corner */
    border-bottom-left-radius: 25px; /* Rounded bottom-left corner */
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    margin-left: 90%;
    margin-top: 2%;
}
login button:hover {
    background-color: #420c6d; /* Purple */
}
</style>

<body>

    <nav>

        <a class="logo" onclick="return false;"><img src="https://i.ibb.co/ZBsn56k/ATlogo.jpg" alt="ATlogo"></a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
        
    </nav>


    <div class='mainContent' style="color: aliceblue;">
        
<!-- a login button should disappear when a user is logged-in -->
        <login>
            <button onclick="window.location.href = 'loginpage.php';">login</button>
        </login>

        <?php
// Include the database connection file
include ('db_connection.php');

// Perform a SELECT query
$sql = "SELECT user_id, first_name, email FROM users";
$result = $conn->query($sql);

// Display the results as a test for now
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["user_id"] . " - Username: " . $row["first_name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "";
}

// Close the connection
$conn->close();
?>
    <h1 class="title">AlphaTech</h1>
    <img class="hero-image" src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/campaign/alienware/gaming/awr16-aw2723df-aw420k-aw620m-aw720h-xml-pl-gaminggetaway-front.psd?fmt=png-alpha&wid=4000&hei=2249" alt="Hero Image">
    <p class="paragraph-one">paragraph 1 here.</p>
    <p class="paragraph-two">paragraph 2 here.</p>

    <h1 class="subtitle">Subtitle here</h1>

</div>
    
</body>

</html>
