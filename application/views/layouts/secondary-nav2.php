<!-- Mobile Device show menu button -->
<nav class="navbar-default home-nav">
    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        Main Menu
    </button>
    <ul class="list-unstyled list-inline pull-right home-nav-btn">
       
        <li>
            <div class="btn-group">
              <button type="button" class="btn btn-primary gnt-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$name;?>&nbsp;<span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a data-toggle="modal" data-target="#myModal" href="#">পাসওয়ার্ড পরিবর্তন</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo site_url('logout_admin');?>">লগ আউট</a></li>
              </ul>
            </div>
        </li>
    </ul>
</nav>