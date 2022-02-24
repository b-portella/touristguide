<nav class="navbar navbar-expand-sm custom-menu navbar-dark ">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php?oldal=<?=$menu[0]['fo']['page']?>"><?=$menu[0]['fo']['megn']?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#my_navbar_id">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="my_navbar_id">
      <ul class="navbar-nav  col-8">
        <?php
          $n = count($menu);
          for($i = 1; $i < $n; $i++)
          {
            if( $menu[$i]['fo']['lathato']=='mindig' || 
                ($menu[$i]['fo']['lathato']=='be_elott' && $user->IsLogin()==false) ||
                ($menu[$i]['fo']['lathato']=='be_utan' && $user->IsLogin()==true) || 
                ($menu[$i]['fo']['lathato']=='be_utan_felh' && $user->IsLogin()==true && $user->IsAdmin()==false) ||
                ($menu[$i]['fo']['lathato']=='be_utan_admin' && $user->IsLogin()==true && $user->IsAdmin()==true) )
            {
              $page = $menu[$i]['fo']['page'];
              $megn = $menu[$i]['fo']['megn'];
              if(substr($page,0,7)=='http://' || substr($page,0,8)=='https://')
                $url = "href='$page' target='_blank'";
              else
                $url = "href=index.php?oldal=$page";
              if($menu[$i]['al'] === false)
              {
                echo '<li class="nav-item"><a class="nav-link" '.$url.'>'.$megn.'</a></li>';
              }
              else
              {
                echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">'.$megn.'</a>';
                echo '<ul class="dropdown-menu">';
                foreach($menu[$i]['al'] as $elem)
                {
                  if( $elem['lathato']=='mindig' || 
                      ($elem['lathato']=='be_elott' && $user->IsLogin()==false) ||
                      ($elem['lathato']=='be_utan' && $user->IsLogin()==true) || 
                      ($elem['lathato']=='be_utan_felh' && $user->IsLogin()==true && $user->IsAdmin()==false) ||
                      ($elem['lathato']=='be_utan_admin' && $user->IsLogin()==true && $user->IsAdmin()==true) )
                  {
                    $page = $elem['page'];
                    $megn = $elem['megn'];
                    if(substr($page,0,7)=='http://' || substr($page,0,8)=='https://')
                      $url = "href='$page' target='_blank'";
                    else
                      $url = "href=index.php?oldal=$page";
                    echo '<li><a class="dropdown-item" '.$url.'>'.$megn.'</a></li>';
                  }
                }
                echo '</ul>';
                echo '</li>';
              }
            }
          }
        ?>
      </ul>
      <?php
        if($user->IsLogin()==true)
        {
          echo 
          '
         <div class="container-fluid">          
            <a class="navbar-brand d-sm-none d-md-none d-lg-block float-end ms-2">
            '.$user->Getlogin().'
            </a>
            <a class="navbar-brand">
              <img src="img/avatar/img_avatar1.png" alt="'.$user->Getlogin().'" style="width:40px;" class="rounded-pill float-end ">
            </a>
          </div>
          ';
        }
      ?>
    </div>
  </div>
</nav>

<?php /*

<form class="d-inline-flex ">
            <span class="navbar-text fw-bold text-white d-sm-none d-md-none d-lg-block">'.$user->Getlogin().'</span>
              <img src="img/avatar/img_avatar1.png" alt="'.$user->Getlogin().'" style="width:40px;" class="rounded-pill float-right ms-2">
            </form>

?>
<br>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Főoldal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#my_navbar_id2">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="my_navbar_id2">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=menu1">Menüpont01</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?page=menu2&event=new">Menüpont02</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?page=menu3&event=edit&id=25">Menüpont03</a>
        </li>    
        <li class="nav-item">
        <a class="nav-link" href="index.php?page=menu4">Menüpont04</a>
        </li>    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Saját profil</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Jelszó módosítása</a></li>
            <li><a class="dropdown-item" href="#">Kijelentkezés</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Adminisztráció</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Link</a></li>
            <li><a class="dropdown-item" href="#">Another link</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <span class="navbar-text fw-bold text-white">Login</span>
        <img src="img/avatar/img_avatar1.png" alt="avatar" style="width:40px;" class="rounded-pill ms-2">
      </form>
    </div>
  </div>
</nav>
<?php */ ?>