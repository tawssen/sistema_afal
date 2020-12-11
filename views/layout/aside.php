
<?php if(isset($_SESSION['identity']) && isset($_SESSION['Dirigente'])):?>
<div id="sidebar" class="active bg-dark">
    <div id="side-container">
      <div class="toggle-btn">
        <span>&#9776</span>
      </div>
      <ul>
        <li><img src="images/escudo_linares.png" class="logo"></li>
        <!--<li><img src="img/logo.jpg" alt="Logo Fazt" class="logo"></li>-->
        <li><i class="fas fa-trophy"></i>Campeonatos</li>
        <li><i class="fas fa-shield-alt"></i>Clubes</li>
        <li><i class="fas fa-users"></i>Jugadores</li>
        <li><i class="fas fa-gavel"></i>Arbitros</li>
        <li><i class="fas fa-user"></i>Usuarios</li>
      </ul>
    </div>
</div>
<?php else:?>
<?php endif; ?>