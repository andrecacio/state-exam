<html>
<style>
  @import url(css2.css);
</style>
<script src="https://kit.fontawesome.com/4f09f1f973.js" crossorigin="anonymous"></script>

<body>

  
  <div class="containerdx">

    <div class="box">
    <img id="logo1" src="alternanza1.jpg">
      <form>
        <span class="text-center">login</span>
        <div class="inputbox">
          <i class="far fa-user" id="icon"></i>
          <input placeholder="Username" type="text" id="username" name="username" required="" class="inputdata">
        </div>
        <div class="inputbox">
          <i class="fas fa-key" id="icon"></i>
          <input placeholder="Password" type="password" id="password" name="password" required="" class="inputdata">
        </div>
        <button type="button" class="btn" onclick="getvalues()">Login</button>
      </form>
      <div id="box">
        <p id="acce">Non sei Autenticato</p>
      </div>
    </div>
  </div>
  </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  function getvalues() {
    var us = $("#username").val();
    var ps = $("#password").val();
    $.ajax({
      type: "POST",
      url: "./login.php",
      data: "user=" + us + "&pass=" + ps,
      dataType: "html",
      success: function(risposta) {
        if (risposta == 1) {
          window.location.href = "./andamento.php";
        } else {
          $("#errore").html("Utente o/e password errati");
        }
      },
      error: function() {
        alert("Chiamata fallita!!!");
      }
    });
    return false;

  }
</script>

</html>