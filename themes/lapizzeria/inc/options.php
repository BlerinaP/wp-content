<?php

function lapizzeria_options(){
 add_menu_page('La Pizzeria', 'La Pizzeria Options', 'administrator', 'lapizzeria_options', 'lapizzeria_adjustments', '', 20);

 add_submenu_page('lapizzeria_options', 'Reservations', 'Reservations', 'administrator', 'lapizzeria_reservations', 'lapizzeria_reservations');
}

  add_action('admin_menu','lapizzeria_options');


   function lapizzeria_adjustments(){
       echo "Hello from lapizzeria_adj!";
   }

   function lapizzeria_reservations() {
       echo "Hello from lapizzeria_reservations!";
   }
?>