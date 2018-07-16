<?php 

function apricot_password($password){
    return password_hash($password,PASSWORD_BCRYPT);
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

function hapus_cache($cache='cache.file'){

    $path=APPPATH."/cache/".$cache;
    if(file_exists($path)){
        unlink($path);
    }

}


function host_smtp(){
    $CI =& get_instance();
    return $CI->db->where('id','1')->get('smtp_email')->row()->host;    
}

function user_smtp(){
    $CI =& get_instance();
    return $CI->db->where('id','1')->get('smtp_email')->row()->user;    
}

function nama_smtp(){
    $CI =& get_instance();
    return $CI->db->where('id','1')->get('smtp_email')->row()->nama;    
}
function password_smtp(){
    $CI =& get_instance();
    return $CI->db->where('id','1')->get('smtp_email')->row()->password;    
}
function port_smtp(){
    $CI =& get_instance();
    return $CI->db->where('id','1')->get('smtp_email')->row()->port;    
}



function ssl_connection(){
    $CI =& get_instance();
    return $CI->db->where('id','1')->get('smtp_email')->row()->ssl_connection;    
}



function kirim_email($alamat_email,$judul,$pesan){

    $from=user_smtp();
    $nama_pengirim=nama_smtp();

    $CI=& get_instance();

    $CI->load->library('email');

    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
    $config['priority'] = 1;
    $config['protocol'] = 'smtp';
    $config['charset'] = 'UTF-8';

    $config['smtp_host'] = host_smtp();
    $config['smtp_user'] = user_smtp();
    $config['smtp_pass'] = password_smtp();
    $config['smtp_port'] = port_smtp();

    if(ssl_connection()=='Y'){
       $config['smtp_crypto'] = "ssl"; 
    }



    $CI->email->initialize($config);

    $CI->email->from($from,$nama_pengirim);
    $CI->email->to($alamat_email);
    $CI->email->subject($judul);
    $CI->email->message($pesan);

    $CI->email->send();

    return $CI->email->print_debugger(array('headers'));

}

