<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?echo $page==1?"active":""?>   " aria-current="page" href="?page=1">Tours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?echo $page==2?"active":""?>" href="?page=2">Comments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?echo $page==3?"active":""?>" href="?page=3">Admin</a>
        </li>
        
        </ul>
        <div class="nav-item ms-auto w-25">
        <?
          if(isset($_SESSION["isAuthorised"]))
          {
            ?>
              <div class="d-flex justify-content-end">
                <div >
                  <h6 class="mb-0">Hello, <?echo $_SESSION["login"]?></h6>
                  <form method="POST"><button class="btn btn-secondary btn-sm w-100" name="logout">Log out</button></form>
                </div>
                <img style="width: 15%;" src='data:image/png;base64,<?echo $_SESSION["photo"]?>'/>
              </div>
              
            <?
          }
          else
          {
            ?>
              <div class="d-flex justify-content-end"><a class="nav-link  <?echo $page==4?"active":""?>"  href="?page=4">Log in</a></div>
            <?
          }
        ?>
        </div>
    </div>
  </div>
</nav>