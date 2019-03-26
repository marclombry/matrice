<div class="restarter nav-bottom-margin">
 <nav class="navbar navbar-fixed-top navbar-inverse bg-forest-blues">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/macata"><?= 'macata';?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class="" href="/macata"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <?php
              if(!isset($_SESSION['auth']) || empty($_SESSION)){
                 //echo '<li><a href="login">Se connecter</a></li>';
                //echo '<li><a href="register">Inscription</a></li>';
              }else{
               // echo '<li><a href="admin">Administration</a></li>';
                echo '<li class="show"><a href="http://localhost/macata/profil"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['auth']['email'].'</a>';
                echo '<ul class="hiding">
                        <li class="list-none cloud margin5"><a class="no-deco cloud" href="http://localhost/macata/profil"><span class="glyphicon glyphicon-globe"></span> Profil</a></li>
                        <li class="list-none cloud margin5"><a class="no-deco cloud" href="http://localhost/macata/deco"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
                      </ul>
                      </li>';
              }
              if(isset($_SESSION['auth']['idgroup']) && $_SESSION['auth']['idgroup']==5)
              {
                echo '<li class="show"><a href="http://localhost/macata/admin"><span class="glyphicon glyphicon-king"></span> Administration</a>';
                echo '<ul class="hiding">
                        <li class="list-none cloud margin5"><a class="no-deco cloud" href="http://localhost/macata/create"><span class="glyphicon glyphicon-pencil"></span> Ajouter</a></li>
                        <li class="list-none cloud margin5"><a class="no-deco cloud" href="http://localhost/macata/update"><span class="glyphicon glyphicon-wrench"></span> Modifier</a></li>
                        <li class="list-none cloud margin5"><a class="no-deco cloud" href="http://localhost/macata/delete"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></li>
                        <li class="list-none cloud margin5"><a class="no-deco cloud" href="http://localhost/macata/register"><span class="glyphicon glyphicon-list-alt"></span> Inscription</a></li>
                      </ul>
                      </li>';
              }
            ?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div>