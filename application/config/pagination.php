<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['per_page'] = 10;
$config['num_links'] = 2;

$config['next_link']        = 'ถัดไป';
$config['prev_link']        = 'ย้อนกลับ';
$config['first_link']       = false;
$config['last_link']        = false;
$config['full_tag_open']    = '<ul class="pagination justify-content-center pagination-round">';
$config['full_tag_close']   = '</ul>';
$config['attributes']       = ['class' => 'page-link'];
$config['first_tag_open']   = '<li class="page-item">';
$config['first_tag_close']  = '</li>';
$config['prev_tag_open']    = '<li class="page-item">';
$config['prev_tag_close']   = '</li>';
$config['next_tag_open']    = '<li class="page-item">';
$config['next_tag_close']   = '</li>';
$config['last_tag_open']    = '<li class="page-item">';
$config['last_tag_close']   = '</li>';
$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
$config['num_tag_open']     = '<li class="page-item">';
$config['num_tag_close']    = '</li>';


/* End of file pagination.php */
/* Location: ./application/config/pagination.php */
