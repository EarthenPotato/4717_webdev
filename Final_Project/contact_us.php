<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="styles/contact_us.css">
</head>
<body>
    <div id="wrapper">
        <div id="leftcolumn">
            <button class="cartButton" onclick="location.href='shopping_cart.php'"><a class="cartButtonText">CART</a></button>
            <nav> 
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="catalog.html">Catalog</a>
                        <div class="dropdown-content">
                            <a href = "audio\category_audio.html">Audio</a>
                            <a href = "computer\category_computer.html">Computer</a>
                            <a href = "techacc\category_techacc.html">Accessory</a>
                        </div>
                    </li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div id="rightcolumn">
            <div class="content">
                <h3>Contact Us</h3>
                <p class="contactusMessage">
                    You can join our discord to submit a ticket if emailing isn't your thing.<br><br>
                    Please be adviced that our office hours are from Monday to Saturday.
                    We will respond to your inquiries during these days.
                    Thank you for your understanding.<br><br>
                    <strong>
                    Please refrain from sending duplicate inquiries through email and discord
                    for faster resolution of your issue.
                    </strong>
                <h4>Drop us a line</h4>
                <div class="textboxGroup">
                <div>
                    <input type="text" placeholder="Name">
                    <input type="text" placeholder="Email">
                </div>
                <div>
                    <textarea placeholder="Message"></textarea>
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electronic Shop<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>
</html>