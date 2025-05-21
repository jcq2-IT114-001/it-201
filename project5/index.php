<!DOCTYPE html>
<html>
<head>
  <title>Simple Chat</title>
  <script>
    var autoListenInterval = null;

    function sendChat() {
      var name = document.getElementById("name").value;
      var password = document.getElementById("password").value;
      var content = document.getElementById("myMessage").value;

      var x = new XMLHttpRequest();
      x.open("POST", "update_chat.php", true);
      x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      x.onreadystatechange = function () {
        if (x.readyState == 4 && x.status == 200) {
          document.getElementById("status").innerText = x.responseText;
        }
      };
      x.send("name=" + encodeURIComponent(name) + "&password=" + encodeURIComponent(password) + "&content=" + encodeURIComponent(content));
    }

    function listenTo() {
      var listenName = document.getElementById("listenName").value;

      var x = new XMLHttpRequest();
      x.open("GET", "get_chat.php?name=" + encodeURIComponent(listenName), true);
      x.onreadystatechange = function () {
        if (x.readyState == 4 && x.status == 200) {
          document.getElementById("listenArea").value = x.responseText;
        }
      };
      x.send();
    }

    function startAutoListen() {
      if (autoListenInterval == null) {
        autoListenInterval = setInterval(listenTo, 3000);
      }
    }
  </script>
</head>
<body onload="startAutoListen()">
  <h2>Simple Chat App</h2>

  <h3>Users</h3>
  <ul>
    <?php
    $con = mysqli_connect("sql1.njit.edu", "jcq2", "Davidranilla3#", "jcq2");
    if (!$con) {
        echo "<li>Could not connect</li>";
    } else {
        $res = mysqli_query($con, "SELECT name FROM chat");
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<li>" . htmlspecialchars($row['name']) . "</li>";
        }
        mysqli_close($con);
    }
    ?>
  </ul>

  <h3>Chat</h3>
  <input type="text" id="name" placeholder="Name">
  <input type="password" id="password" placeholder="Password"><br><br>
  <textarea id="myMessage" rows="4" cols="50" onkeyup="sendChat()" placeholder="Your message..."></textarea>
  <div id="status" style="color:red;"></div>

  <h3>Auto Listening</h3>
  <input type="text" id="listenName" placeholder="Name to listen to (auto)">
  <br><br>
  <textarea id="listenArea" rows="4" cols="50" readonly></textarea>
</body>
</html>
