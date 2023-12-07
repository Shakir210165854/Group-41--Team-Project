<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Design.css"/>
</head>

<body>

    <nav>
        <a class="logo" onclick="return false;"><img src="https://i.ibb.co/ZBsn56k/ATlogo.jpg" alt="ATlogo"></a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
    </nav>

    <div class="mainContent">  <div class="login">
            <button onclick="window.location.href = 'loginpage.php';">login</button>
</div>
      
   
        <h1 class="title"> Contact</h1>
          

            <form  id="Form2" action="process_contact_form.php" method="post">
                <h3>GET IN TOUCH</h3>
                <label for="name">Name:</label>
                <input type="text" id="name" placeholder="Name" required>
                <small class="error"></small>

                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Email" required>
                <small class="error"></small>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" placeholder="Subject" required>
                <small class="error"></small>
                
                <label for="message">Message:</label>
                <textarea id="message" placeholder="Message" rows="4" required></textarea>
                <small class="error"></small>

                <button type="submit" class="myButton">Submit</button>

				<div id="thankYouMessage" style="display: none;">
                <p>Thank you for submitting the form!</p>
            </form>

          
            </div>
        </div>
  
    <footer class="footer">
        <p1>hello</p1>
    </footer>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault(); 
            document.getElementById('thankYouMessage').style.display = 'block';
        });
    </script>

<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live Reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</body>
</html>