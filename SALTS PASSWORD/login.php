<?php




$salt = saltGenerator();













function saltGenerator(): string {
    $characters = array_merge(
      range('a', 'z'),
      range('A', 'Z'),
      range('0', '9'),
      ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '~']
    );
  
    shuffle($characters);
  
    $salt = '';
    for ($i = 0; $i < 128; $i++) {
      $value = rand(0, count($characters) - 1);
      $salt .= $characters[$value];
    }
  
    return $salt;
  }

?>