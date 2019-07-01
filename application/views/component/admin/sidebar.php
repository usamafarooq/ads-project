<ul class="nav" id="side-menu">
  <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
  <?php 
    foreach ($menus as $menu) {
      echo '<li><a href="'.base_url($menu['url']).'" class="material-ripple"><i class="material-icons">'.$menu['icon'].'</i> '.$menu['name'].'</a></li>';
    }
  ?>
</ul>
<!-- 
   
       <ul class="nav" id="side-menu">
                        <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                        <li><a href="<?php echo base_url()?>" class="material-ripple"><i class="material-icons">home</i> Dashboard</a></li>
                        <li><a href="<?php echo base_url()?>modules" class="material-ripple"><i class="material-icons">home</i> Modules</a></li>
                        <li><a href="<?php echo base_url()?>role" class="material-ripple"><i class="material-icons">home</i> Role</a></li>
                        <li>
                            <a href="<?php echo base_url()?>admin/view_order" class="material-ripple"><i class="material-icons">home</i>View Request Order</a>
                        </li>
                      
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">home</i>Reporting Hierarchy</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>admin/previous_review" class="material-ripple"><i class="material-icons">home</i>Previous Review</a>
                        </li>

                    
  
   
   	
   	

   		        <li>
                            <a href="<?php echo base_url()?>admin/price" class="material-ripple"><i class="material-icons">home</i>Create Order</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>admin/show_order" class="material-ripple"><i class="material-icons">home</i>Show</a>
                        </li>
                       
   






     



      <li><a href="<?php echo base_url()?>admin/distributor_order" class="material-ripple"><i class="material-icons">home</i>Orders</a></li>
                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">home</i>Product</a>
                            <ul>
                              <li>
                               <a href="<?php echo base_url()?>admin/add_products" class="material-ripple"><i class="material-icons">home</i>Add Product</a>
                               
                              </li>
                              <li>
                               <a href="<?php echo base_url()?>admin/view_product_detail" class="material-ripple"><i class="material-icons">home</i>View Product</a>
                               
                              </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="material-ripple"><i class="material-icons">home</i>Distributor</a>
                            <ul>
                              <li>
                               <a href="<?php echo base_url()?>admin/add_distributor" class="material-ripple"><i class="material-icons">home</i>Add Distributor</a>
                               
                              </li>
                              <li>
                               <a href="<?php echo base_url()?>admin/view_distributor" class="material-ripple"><i class="material-icons">home</i>View Distributor</a>
                               
                              </li>
                            </ul>
                        </li>
                        
    </ul>
 

    
   
 -->