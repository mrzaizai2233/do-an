<!DOCTYPE html>
<html lang="">

<head>

    <script type="text/javascript">
    var xhttp = new XMLHttpRequest();
        console.log(xhttp);
    function loadDoc() {
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "text.php", true);
        xhttp.send();
    }
    </script>
</head>

<body>
    <h1>The XMLHttpRequest Object</h1>
    <button type="button" onclick="loadDoc()">Request data</button>
    <p id="demo"></p>
</body>

</html>
