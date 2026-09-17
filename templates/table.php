<?php

function drawInitTable(){
  return '<table>';
}

function drawEndTable(){
  return '</table>';
}

function drawTableHeader(...$args){
  $code = '<tr>';

  foreach($args as $head ){
    $code .= '<th>'.$head.'</th>';
  }

  $code .= '</tr>';
  return $code;
}

function drawTableData(...$args){
  $code = '<tr>';

  foreach($args as $head ){
    $code .= '<td>'.$head.'</td>';
  }

  $code .= '</tr>';
  return $code;
}

function drawTable(...$data){
  $code = drawInitTable();

  foreach($data as $row ){
    $code .= $row;
  }  

  $code .= drawEndTable();
  return $code;
}

?>