<!DOCTYPE HTML>
<html lang="en">

  <!---------------------- START: Header ------------------------------->
  <header class="site-header">
    <div class="site-header-base">
      <div class="site-logo">
        <a title="TAPAS Homepage" target="_top" href="
          <?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_index.php">
          <img src="images/Logo_home.jpg" width="87" height="53" alt="TAPAS Logo"></a>
      </div>
      <div class="header_org_div">
        <h2 class="header_org_name">Tapas Global Consulting</h2>
      </div>

      <button id="site-nav-toggler" class="site-nav-toggler" aria-expanded="false" aria-controls="site-nav">
        <span class="sr-only">Toggle navigation</span>
        &#9776;
      </button>
    </div>

    <nav id="site-nav" class="site-nav">

      <div class="site-links">
        <ul id="horizontal-list">
          <li><a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_index.php">Home</a></li>
          <!-- <li><a href="<?php /*$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) */?>/test_project/main_services.php#services_section_on_home">Services <span>&#x25BE;</span></a> -->
          <li><a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_index.php#services_section_on_home">Services <span>&#x25BE;</span></a> 
          <!-- <li><a href="#services_section_on_home">Services <span>&#x25BE;</span></a> -->

            <ul class="menu_item_2">
              <li> <a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_services_internship.php"> Internship </a></li>
              <li> <a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_services_recruitment.php"> Recruitment </a></li>
              <!--
						<li> <a href="#"> Info2 <span>&#x25BE;</span></a>
								<ul class="menu_item_3">
									<li> <a href="#"> Aaaaa </a></li>
									<li> <a href="#"> Bbbbb </a></li>
									<li> <a href="#"> Ccccc </a></li>
								</ul>
						</li>
						<li> <a href="#"> Info3 </a></li>
						-->
            </ul>
          </li>
          <!--
				<li><a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/indutries.php">Indutries</a></li>
				-->
          <li><a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_why_us.php">Why us</a></li>
          <li><a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_about_us.php">About</a></li>
          <li><a href="<?php $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) ?>/test_project/main_contact_us.php">Contact</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <!----------------------  END: Header ------------------------>

</html>