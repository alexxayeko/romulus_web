<?php
/**
 * $Desc
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2021 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */ 
$header = apply_filters('inusti_get_header_layout', null );

if(!empty($header) && class_exists('Gavias_Themer_Header') && Gavias_Themer_Header::getInstance()->header_builder_exists($header)){
  get_template_part('header', 'builder');
}else{
  get_template_part('header', 'default');
}