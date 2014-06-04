

       <div class="navtopper navbar navbar-inverse navbar-fixed-top">
            <div class=" navbar-inner navtopper-inner" id="navbarflex">
                <div class="container-left">
                  <div class="row">
                    <div class="span12 ima1">
                      <a href="#"><img style="margin-top: 9px;position:relative;left:20px;" src="<?php echo base_url('img/brandcopia.jpg'); ?>"/></a>
                      <div id="oted">OFICINA TÉCNICA DE ESTADÍSTICA DEPARTAMENTALES - OTED</div>
                    </div>
                  </div>

                </div>
          </div>
      </div>
       <!--  <div class="navbar navbar-inverse navbar-fixed-top " > -->
       <div id="menu_nav2" class="navbar navbar-inverse navbar-fixed-top navbottom ">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">


  <style type="text/css">


.ima1{

text-align: 10px !important;

}




  #navbarflex {
  background: none repeat scroll 0 0 #FFFFFF !important;
  border-bottom: 20px solid #00A1C7 !important;
  top: 20px !important;

  }


  #oted{
  color: #00A1C7;
  height: 30px;
  position: absolute;
  right: 20px;
  text-align: right;
  text-transform: uppercase;
  top: 33px;
  font-size: 14px !important;
  }

#container-fluid{

  height: 60px !important;
}



  </style>


      <?php
          if($this->tank_auth->is_logged_in()){
            $roles = $this->tank_auth->get_roles();
            if(!empty($roles)){
      ?>
        <ul class="nav">
                    <?php
                      $i = 1;
                      foreach ($roles as $role) {
                        $c = "";
                        if($this->uri->segment(1) == $role->url){
                          $c = ' class="active"';
                        }
                    ?>
                    <li <?php echo $c; ?>><?php echo anchor(base_url()  . strtolower($role->url), utf8_encode($role->rolename)); ?></li>
                    <?php
                      }
                    ?>

          </ul>
              <?php } }else{?>
               <ul class="nav">
                   <li><a href="<?php echo base_url('index.php/auth/login'); ?>">Login</a></li>
                </ul>

            <?php }?>



                    </div>
                </div>
            </div>
        </div>



        <?php if(isset($fluid)){ ?>
        <div class="container-fluid front">
        <?php }else{ ?>
        <div class="container front">
        <?php } ?>
         <?php

                $this->load->view('backend/includes/breadcrumb');

        ?>