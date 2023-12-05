<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
    /*background-color: #5e1698; Make the purple strip and nav bar have a gap between */
}

.subtitle {
    color: rgb(246, 242, 242);
    font-size: 40px;
    font-family: 'Arial', sans-serif;
    text-align: center;
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

.image-container {
    text-align: center;
    margin-top: 20px;
}

.image-container img {
    max-width: 100%;
    border-radius: 10px;
}

.team-members {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.team-member {
    text-align: center;
    margin: 20px;
    flex: 1 0 20%;
    max-width: 300px;
}

.team-member img {
    max-width: 100%;
    border-radius: 50%;
}

.team-member h2 {
    margin-top: 10px;
    color: #333;
}

.team-member p {
    margin-top: 5px;
    color: #555;
}

</style>
</head>

<body>

    <nav>
    <a class="logo" onclick="return false;"><img src="https://i.ibb.co/ZBsn56k/ATlogo.jpg" alt="ATlogo"></a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
    </nav>

    <div class='mainContent' style="color: aliceblue;">
    <h1 class="title">OUR STORY</h1>

    <p class="paragraph-one">Our journey began with a simple idea—to provide computer enthusiasts and professionals with high-quality, cutting-edge components that elevate their computing experience.</p>

    <div class="image-container">
            <img src="https://www.shutterstock.com/image-vector/computer-parts-hands-repair-pc-600nw-2192555921.jpg" alt="Sample Image">
    </div>

    <p class="paragraph-two">Founded by a team of dedicated tech enthusiasts, we set out to create a platform that not only offers a vast selection of computer parts but also ensures that each product meets our rigorous standards for performance and reliability. Our commitment to excellence drives every aspect of our business, from the carefully curated products in our inventory to the seamless shopping experience we provide. At AlphaTech, we understand that each computer build is a unique expression of creativity and functionality. Whether you're a seasoned gamer pushing the limits of performance or a professional seeking the latest innovations for your workstations, we've got you covered.</p>

    <h1 class="subtitle">Our Founders</h1>
    
    <div class="team-members">
        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 1">
            <h2>Ahmed Abdiqadir</h2>
            <p>Founder</p>
        </div>

        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 2">
            <h2>Amgad Salim</h2>
            <p>Founder</p>
        </div>

        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 3">
            <h2>Jack Brookes</h2>
            <p>Founder</p>
        </div>

        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 4">
            <h2>Maxwell Ansah</h2>
            <p>Founder</p>
        </div>


        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 5">
            <h2>Mehran Raja</h2>
            <p>Founder</p>
        </div>

        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 6">
            <h2>Mohammed Khan</h2>
            <p>Founder</p>
        </div>

        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 7">
            <h2>Shakir Mahmood</h2>
            <p>Founder</p>
        </div>

        <div class="team-member">
            <img src="https://via.placeholder.com/150" alt="Person 8">
            <h2>Vrutik Gohel</h2>
            <p>Founder</p>
        </div>
    </div>

    </div>
    
</body>
</html>