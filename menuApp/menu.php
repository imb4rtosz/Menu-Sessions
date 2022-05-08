<?php

$menu = array(
  array(
    'id' => 1,
    'name' => 'Start',
    'url' => '/',
    'depth' => 0,
    'parent_id' => 0
  ),
  array(
    'id' => 8,
    'name' => 'Moda',
    'url' => '/',
    'depth' => 1,
    'parent_id' => 5
  ),
  array(
    'id' => 2,
    'name' => 'Artykuły',
    'url' => '/',
    'depth' => 0,
    'parent_id' => 0
  ),
  array(
    'id' => 5,
    'name' => 'Produkty',
    'url' => '/',
    'depth' => 0,
    'parent_id' => 0
  ),
  array(
    'id' => 4,
    'name' => 'Kategoria atykułów',
    'url' => '/',
    'depth' => 1,
    'parent_id' => 2
  ),
  array(
    'id' => 11,
    'name' => 'FAQ',
    'url' => '/',
    'depth' => 0,
    'parent_id' => 0
  ),
  array(
    'id' => 1,
    'name' => 'Kontakt',
    'url' => '/',
    'depth' => 0,
    'parent_id' => 0
  ),
  array(
    'id' => 9,
    'name' => 'Kurtki',
    'url' => '/',
    'depth' => 2,
    'parent_id' => 8
  ),
  array(
    'id' => 7,
    'name' => 'Nowości',
    'url' => '/',
    'depth' => 1,
    'parent_id' => 5
  ),
  array(
    'id' => 3,
    'name' => 'Artykuł 1',
    'url' => '/',
    'depth' => 1,
    'parent_id' => 2
  ),
  array(
    'id' => 6,
    'name' => 'Promocje',
    'url' => '/',
    'depth' => 1,
    'parent_id' => 5
  ),
  array(
    'id' => 10,
    'name' => 'Płaszcze',
    'test array' => array(
      'test1' => 'test1',
      'test2' => 'test2',
      'test3' => 'test3',
    ),
    'url' => '/',
    'depth' => 2,
    'parent_id' => 8
  ),
);

;

 $ids = array_column($menu, 'id');    //create array of ids 

 array_multisort($ids, SORT_ASC, $menu); // sort menu array ascending

//  print_r($menu); 


// create names array to display only names in menu

$names = array_column($menu, 'name');


function arrayToMenu($array) 
{
    
    $ul = '<ul>';
 
    foreach($array as  $record) {
 
        
        if(!is_array($record)) {

          $ul .= '<li>' . $record . '</li>';
 
 
        } else {
 
          // $ul .= '<li>' ;
 
            
          $ul .= arrayToMenu($record);
      
         
          // $ul .= '</li>'; 
           
        }
    }
 
    //zamknięcie elementu UL
    $ul .= '</ul>';
 
    return $ul;
}


echo arrayToMenu($menu);  // change param to $names to display only
                          // name values in menu. 


/////////////


?>











<?php 
// function makeMenu ($array) 
// {
    
//     $ul = '<ul>';

//     foreach($array as $record) {
 
        
//         if(is_array($record) || $record['name'] ) {

//           $ul .= '<li>' . $record['name'] . '</li>';
        
//         } else {
//           makeMenu('$record');
//         }
//     }
 
//     $ul .= '</ul>';
 
//     return $ul;
// }

?>