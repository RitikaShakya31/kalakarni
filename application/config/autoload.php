<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$autoload['packages'] = array();
 
$autoload['libraries'] = array('email','database','session','cart','table','upload' , 'form_validation');
 
$autoload['drivers'] = array();
 
$autoload['helper'] = array('url','common_helper','ui_helper','form','html','date' , 'email');
 
$autoload['config'] = array();
 
$autoload['language'] = array();
 
$autoload['model'] = array('Login_model','Dashboard_model','CommonModal');
