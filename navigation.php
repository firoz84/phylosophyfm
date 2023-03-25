<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

<nav class="header__nav-wrap">

    <h2 class="header__nav-heading h6">Site Navigation</h2>
    

   <?php 
   
   $philosophy_children = wp_nav_menu(array(

        'theme_location' => 'menu-1',
        'menu_id'=>'menu-1',
        "menu_class"=>'header__nav',
        'echo'=>false

   ));

   //menu তে কি ভাবে ক্লাস change করা যায় 

   $philosophy_children= str_replace('menu-item-has-children','menu-item-has-children has-children', $philosophy_children);
   
   echo  $philosophy_children;
   
   ?>

    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

</nav> <!-- end header__nav-wrap -->
