<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array(APPPATH . 'third_party');
$autoload['libraries'] = array('session','database');
$autoload['helper'] = array('url','form','weburi','header','file','contentdate','stringurl','textlimiter','security','dropdown');
$autoload['drivers'] = array();
$autoload['helper'] = array();
$autoload['config'] = array('webconfig');
$autoload['language'] = array();
$autoload['model'] = array();
