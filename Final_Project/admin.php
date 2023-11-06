<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronic shop</title>
    <link rel="stylesheet" type="text/css" href="styles/catalog.css">
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
                        <li><a href="contact_us.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        <div id="rightcolumn">
            <div class="content">
            <table class="adminTable" border=1>
                <tr>
                    <th>Order ID</th>
                    <th>Order Status</th>
                    <th>Send Email</th>
                </tr>
                <tr>
                    <td>Row 1, Cell 1</td>
                    <td>
                        <select class=orderStatusSelect>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>
                                                

                    </td>
                    <td>Row 1, Cell 3</td>
                </tr>
                <tr>
                    <td>Row 2, Cell 1</td>
                    <td>Row 2, Cell 2</td>
                    <td>Row 2, Cell 3</td>
                </tr>
                <tr>
                    <td>Row 3, Cell 1</td>
                    <td>Row 3, Cell 2</td>
                    <td>Row 3, Cell 3</td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electronic Shop<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>
</html>