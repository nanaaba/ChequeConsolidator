    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
<!--          <div class="navbar-header"><a href="#" class="navbar-brand"></a>
          </div>-->
          <div class="be-right-navbar">
          
            
              
            <ul class="nav navbar-nav navbar-right be-icons-nav">
              
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                      Welcome, User <?php echo e(session('name')); ?>

<!--                      <span class="icon mdi mdi-apps"></span>-->
                  </a>
                <ul class="dropdown-menu be-connections">
                  <li>
                      <a href="<?php echo e(url('users/changepassword')); ?>" >Change Password</a>
                  </li>
                  <li>
                      <a href="<?php echo e(url('logout')); ?>" >Logout</a>
                  </li>
                  <li>
                      <a href="#"> <span><strong>Last Login : <?php echo e(session('lastlogin')); ?></strong></span></a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>