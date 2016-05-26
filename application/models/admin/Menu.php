<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Model{

	public $hasil;
	public $namaMenu;

	function __construct(){

		parent::__construct();

	}


	function sub_menu($id,$parent){

		$query2=$this->db->query("SELECT * FROM menu_child WHERE menu_id='$id' AND menu_child_parent='$parent' ORDER BY posisi ASC");

		if($query2->num_rows()>0){

			foreach($query2->result_array() AS $data){

					$aktif=$data['aktif']=="N"?"<span class='fa fa-exclamation-triangle menu-belum-active' data-toggle='tooltip' data-placement='top' title='menu belum aktif. Nanti akan aktif ketika tombol [update posisi] sudah di klik '></span>":"";

					$_target=array("_self","_blank","_parent","_top");

$this->hasil.=" <li id='$data[menu_child_id]' data-code='$data[menu_child_code]'> 

                  <div class='list-group-item-new' id='$data[menu_child_id]'> 

	                  <span class='fa fa-arrows-alt'></span> &nbsp; 

	                  <span class='nama-menu-show'>$data[menu_child_nama]</span>
	                  
	                  $aktif

	                  <span class='menu-right-panel'>

		                  <span class='link-menu-show'>$data[menu_child_url] ($data[menu_child_target])</span>

	                 	  <span class='fa fa-plus add-sub-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Tambah sub menu'></span>

	                 	  <span class='fa fa-gear show-edit-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Edit menu' ></span>

	                  	  <span id='$data[menu_child_id]'  class='fa fa-close show-delete-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Delete menu' ></span>
	                  </span>


	                  <div class='well new-sub-menu' id='$data[menu_child_id]' >

	                   	  <div class='form-group'>
	                   		 <h5>Menambahkan Sub Menu </h5>
	                  	   </div>

		                   <div class='form-group'>
		                      <label><small>Nama menu</small></label>
		                      <input type='text' id='nama-menu-baru' class='form-control' value=''>
		                   </div>

		                   <div class='form-group'>
		                     <label><small>URL</small></label>
		                     <input type='text' id='url-menu-baru' class='form-control' value=''>
		                   </div>

		                    <div class='form-group'>
		                      <label><small>Target link</small></label>
		                        <select id='target-menu-baru' class='menu-target form-control'>
		                          <option>_self</option>
		                          <option>_blank</option>
		                          <option>_parent</option>
		                          <option>_top</option>
		                        </select>
		                    </div>

		                    <div class='form-group'>
		                      <button id='$data[menu_child_id]' class='btn btn-sm btn-default tombol-menu-baru'>Tambah Sub Menu</button> <span class='fa fa-sort-up' style='float:right;cursor:pointer'></span>
		                    </div>

	                   </div>

	                   <div class='well detail-sett' id='$data[menu_child_id]'>

		                    <div class='form-group'>
		                     <label><small>nama menu</small></label>
		                     <input type='text' class='form-control' id='nama-menu' value='$data[menu_child_nama]'>
		                    </div>

		                    <div class='form-group'>
		                      <label><small>URL</small></label>
		                      <input type='text' class='form-control' id='url-menu' value='$data[menu_child_url]'>
		                    </div>

		                    <div class='form-group'>
		                      <label><small>Target link</small></label>
		                        <select class='menu-target form-control'>";
		                   		   foreach($_target AS $d){
		                      		$select=$d==$data["menu_child_target"]?"selected":"";
		                    		 $this->hasil.="<option value='$d' $select>$d</option>";
		                      			}
		                  		 $this->hasil.="</select>
		                    </div>

		                    <div class='form-group'>
		                      <button id='$data[menu_child_id]'  class='btn btn-sm btn-default update-menu'>Update Menu</button> <span class='fa fa-sort-up' style='float:right;cursor:pointer'>
		                    </div>

	                  </div> 

	             </div>



                <br> <ul class='sort' id='$data[menu_child_id]' > <span class='nbsp'> &nbsp; </span>";
                $this->sub_menu($id,$data['menu_child_id']);
                $this->hasil.=" </ul>  
				 </li>";


			}

			return;
		}

	}



	function get_menu($id=0){
		if($id>0){

			$query0=$this->db->query("SELECT * FROM menu WHERE menu_id='$id'");

			if($query0->num_rows()>0){
				$d=$query0->row();
				$this->namaMenu=$d->menu_nama;

				$query=$this->db->query("SELECT * FROM menu_child WHERE menu_id='$id' AND menu_child_parent='0' ORDER BY posisi ASC");

				foreach($query->result_array() AS $data){

					$aktif=$data['aktif']=="N"?"<span class='fa fa-exclamation-triangle menu-belum-active' data-toggle='tooltip' data-placement='top' title='menu belum aktif. Nanti akan aktif ketika tombol [update posisi] sudah di klik '></span>":"";

					$_target=array("_self","_blank","_parent","_top");

$this->hasil.=" <li id='$data[menu_child_id]' data-code='$data[menu_child_code]'> 

                  <div class='list-group-item-new' id='$data[menu_child_id]'> 

	                  <span class='fa fa-arrows-alt'></span> &nbsp; 

	                  <span class='nama-menu-show'>$data[menu_child_nama]</span> 

	                  $aktif

	                  <span class='menu-right-panel'>

		                  <span class='link-menu-show'>$data[menu_child_url] ($data[menu_child_target])</span>

	                 	  <span class='fa fa-plus add-sub-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Tambah sub menu'></span>

	                 	  <span class='fa fa-gear show-edit-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Edit menu' ></span>

	                  	  <span id='$data[menu_child_id]' class='fa fa-close show-delete-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Delete menu' ></span>
	                  </span>


	                  <div class='well new-sub-menu' id='$data[menu_child_id]' >

	                   	  <div class='form-group'>
	                   		 <h5>Menambahkan Sub Menu </h5>
	                  	   </div>

		                   <div class='form-group'>
		                      <label><small>Nama menu</small></label>
		                      <input type='text' id='nama-menu-baru' class='form-control' value=''>
		                   </div>

		                   <div class='form-group'>
		                     <label><small>URL</small></label>
		                     <input type='text' id='url-menu-baru' class='form-control' value=''>
		                   </div>

		                    <div class='form-group'>
		                      <label><small>Target link</small></label>
		                        <select id='target-menu-baru' class='menu-target form-control'>
		                          <option>_self</option>
		                          <option>_blank</option>
		                          <option>_parent</option>
		                          <option>_top</option>
		                        </select>
		                    </div>

		                    <div class='form-group'>
		                      <button id='$data[menu_child_id]' class='btn btn-sm btn-default tombol-menu-baru'>Tambah Sub Menu</button> <span class='fa fa-sort-up' style='float:right;cursor:pointer'></span>
		                    </div>

	                   </div>

	                   <div class='well detail-sett' id='$data[menu_child_id]'>

		                    <div class='form-group'>
		                     <label><small>nama menu</small></label>
		                     <input type='text' class='form-control' id='nama-menu' value='$data[menu_child_nama]'>
		                    </div>

		                    <div class='form-group'>
		                      <label><small>URL</small></label>
		                      <input type='text' class='form-control' id='url-menu' value='$data[menu_child_url]'>
		                    </div>

		                    <div class='form-group'>
		                      <label><small>Target link</small></label>
		                        <select class='menu-target form-control'>";
		                   		   foreach($_target AS $d){
		                      		$select=$d==$data["menu_child_target"]?"selected":"";
		                    		 $this->hasil.="<option value='$d' $select>$d</option>";
		                      			}
		                  		 $this->hasil.="</select>
		                    </div>

		                    <div class='form-group'>
		                      <button id='$data[menu_child_id]'  class='btn btn-sm btn-default update-menu'>Update Menu</button> <span class='fa fa-sort-up' style='float:right;cursor:pointer'>
		                    </div>

	                  </div> 

	             </div>



                <br> <ul class='sort' id='$data[menu_child_id]' > <span class='nbsp'> &nbsp; </span>";
                $this->sub_menu($id,$data['menu_child_id']);
                $this->hasil.="  </ul>  
				 </li>";

 			
				}
				return true;

			} else {
				return false;
			}

		} else {
			return false;
		}
	}

}