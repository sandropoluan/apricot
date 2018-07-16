<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

       <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          
        </div>
        <!-- Default to the left -->
        <strong> Dispersembahkan oleh:  <a href="http://www.sandro.id/" target='_blank'>Sandro ID</a></strong> 
      </footer>
      


      <div class='modal-error'></div>
      <div class='notif-proses'></div>
      <div class='modal-konfirmasi'></div>


      <div class="modal fade" id="modal-upload-foto" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4>Upload Foto</h4>
                      
                  </div>
                  <div class="modal-body">
                      <div class="area-pop-up-upload dropzone well dz-clickable"></div>
                      <div class="input-group">
                          <div class="input-group-addon">URL</div>
                          <input type='text' class='form-control just-upload-field' />
                      </div>
                  </div>
                  <div class="modal-footer">
                  </div>
              </div>
          </div>
 </div>


 <div class="modal fade" id="modal-direct-upload" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4>Upload Foto</h4>
                      
                  </div>
                  <div class="modal-body">

<iframe id="iframe-direct-upload" style="width: 100%" height="400" src="" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>

                  </div>
                  <div class="modal-footer">
                  </div>
              </div>
          </div>
 </div>



    </div><!-- ./wrapper -->




 <!-- jQuery 2.1.4 -->
 <!--<script src="<?php path_adm() ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script> -->

 <script src="<?php path_adm() ?>/plugins/jQuery/jquery-1.12.0.min.js"></script> 


<script src="<?php path_adm() ?>/plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script> 
<script src="<?php path_adm() ?>/plugins/jquery.ui.touch-punch.min.js"></script> 




    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php path_adm() ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php path_adm() ?>/dist/js/app.min.js" type="text/javascript"></script>


  <!-- DATATABLES -->
    <script src="<?php path_adm() ?>/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="<?php path_adm() ?>/plugins/datatables/media/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script src="<?php path_adm() ?>/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>

    <script src="<?php path_adm() ?>/plugins/datatables/extensions/Responsive/js/responsive.bootstrap.js" type="text/javascript"></script>
  <!-- DATATABLES -->


  <!--isotope-->
    <script src="<?php path_adm() ?>/plugins/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/imagesloaded.pkgd.min.js" type="text/javascript"></script>
  <!--isotope-->

    <script src="<?php path_adm() ?>/plugins/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/chartJs/Chart.Bar.js" type="text/javascript"></script>

 
    <script src="<?php path_adm() ?>/dist/js/ando_admin.js" type="text/javascript"></script>

   <script src="<?php path_adm() ?>/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>


    <script src="<?php path_adm() ?>/dist/dropzone/dropzone.min.js" type="text/javascript"></script>


    <script src="<?php path_adm() ?>/dist/codemirror/lib/codemirror.js" type="text/javascript"></script>

    <script src="<?php path_adm() ?>/dist/codemirror/mode/javascript/javascript.js" type="text/javascript"></script>

    <script src="<?php path_adm() ?>/dist/codemirror/mode/css/css.js" type="text/javascript"></script>


   <script src="<?php path_adm() ?>/dist/js/mosaicflow.min.js" type="text/javascript"></script>






<?php
  echo '<script src="'.rpath_adm().'/dist/js/speakingurl.min.js" type="text/javascript"></script>';
  echo '<script src="'.rpath_adm().'/dist/tinymce/tinymce.min.js" type="text/javascript"></script>';
  ?>


<?php  if($npage==1){ ?>

   <script src="<?php path_adm() ?>/flappy/js/phaser.min.js" type="text/javascript"></script>
   <script src="<?php path_adm() ?>/flappy/game/game.js" type="text/javascript"></script>

   <script type="text/javascript">

      var path="<?php path_adm()  ?>";
      initFlappy(path+"/flappy");

   </script>

<?php } ?>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->

      <!--Apa ini?? kenapa javascript nya gak buat dalam file sendiri/embed??
          Semua sintax di bawah ini adalah sintax sintax yang berurusan dengan Ajax,
          Sangat gak memungkinkan menaruhnya di file embed dikarenakan untuk mendefinisikan properti URL menggunakan fungsi PHP "base_url()" 
          Kalo ada yang bisa jurusnya,atau punya saran, plese let me know :)-->
      <script type="text/javascript">
        Dropzone.autoDiscover = false;

        $(function(){


  $('[data-toggle="popover"]').popover();
  $('[data-toggle="tooltip"]').tooltip()

          modalUploadOn=false;

        //  $.material.init();

          
          $(".content-wrapper").prepend("<section class='koneksi'><div class='koneksi_stat'></div> </section>")

         var koneksi=true
         cek_koneksi(); 

          
          function cek_koneksi(){
            var target=$('.koneksi_stat');
            $.ajax({
              type:'POST',              
              url:'<?php echo base_url() ?>test_connection.php',
              cache:'false',
              timeout: 5000,
              success: function(a){               
                inter=setTimeout(cek_koneksi,15000);
                target.css({
                  "background-color":"#77d804",
                  "color":"white"
                }).html(" <i class='fa fa-check text-green'></i> Terhubung dengan server");
                koneksi=true;

              },

              error: function(){

                if(koneksi){

                target.css({
                  "background-color":"red",
                  "color":"white"
                }).html(" <i class='fa fa-times text-red'></i> Koneksi ke server terputus");
                koneksi=false;
                cek_koneksi();

                }
                else {
                   inter=setTimeout(cek_koneksi,3000);
               
                  target.css({
                  "background-color":"red",
                  "color":"white"
                }).html(" <i class='fa fa-times text-red'></i> Koneksi terputus! Mencoba menghubungkan kembali...");
                  koneksi=false;
                 

                }

              }

            });
          }


          var foto_pop_up=new Dropzone(".area-pop-up-upload",{
            url:"<?php echo base_url() ?>AN_ajax_admin/upload_pop_up",
            maxFilesize:2,
            maxFiles:1,
            method:"post",
            acceptedFiles:"image/*",
            paramName:"userfile",            
            dictDefaultMessage:"Drop foto/gambar disini",
            dictInvalidFileType:"Type file ini tidak dizinkan"
          });

          foto_pop_up.on("success",function(a,b){
            $(".just-upload-field").val("<?php echo base_url() ?>an-component/media/upload-gambar-pendukung/"+b).select();
          });



          $(".pop-up-upload").click(function(){
            $("#modal-upload-foto").modal();
          });


          $("#modal-upload-foto").on("hidden.bs.modal",function(){
              foto_pop_up.removeAllFiles(true);
              $(".just-upload-field").val("");
             });



          <?php if($npage=="1"){ ?>


var pieData = [


<?php 

  foreach ($data['admin'] as $admin) {
    echo "
        {
          value: '$admin[hasil]',
          label: '$admin[name_user]'
        },

    ";
  }

 ?>

    ];


        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);



          <?php } if($npage=="2"){ ?>
          /*--Untuk update Main kategori--*/
          $(".tom-tambah").click(function(){
            if(!ajax_request){
              show_proses('Menambahkan kategori...');
              ajax_request=true
            var nil_kat=$(".form-kategori").val();
            var reg=/^([\w-]+(\s+)?([\w-]+)?)+$/;
            var main=$(this);
            if(reg.test(nil_kat)){
              $.ajax({
                type:"POST",
                url:'<?php echo base_url() ?>AN_ajax_admin/new_kategori',
                data:{value_k:nil_kat},
                cache:false,
                success:function(a){
                  var c_reg=/^\{.+\}$/;
                 if(c_reg.test(a)){
                 var has=JSON.parse(a);
                 var v_hasil="<li class='level1' id='"+has.id+"'><div class='level1 label label-default cari' id='"+has.id+"' alt='1'><i class='fa fa-plus t_sub_kategori' data-toggle='tooltip' data-placement='left' title='Tambahkan sub kategori'></i><span class='judul_kategori'> "+has.nama+" </span><form><input type='text' class='form-ubah-kategori' value='"+has.nama+"' data-toggle='tooltip' data-placement='top' title='Tekan Enter untuk menyimpan'></form><i class='fa fa-edit edit_kat' data-toggle='tooltip' data-placement='top' title='Ubah Nama'></i><i class='fa fa-times non_kategori' data-toggle='tooltip' data-placement='left' title='Non aktifkan Kategori ini'></i><i class='fa fa-trash hapus_kategori' id='"+has.id+"' data-toggle='tooltip' data-placement='right' title='Hapus Kategori ini'></i></div><ul class='level2'></ul></li>";
                 $(".list_kategori").prepend(v_hasil);
                 warna2();

                  ajax_request=false
                 } else {
                  error_alert("Terjadi kesalahan","Maaf! terjadi kesalahan tak terduga. Silahkan coba lagi <br> Jika error ini muncul terus, hubungi developer!<br> Pesan Error:<br>"+a);
                  ajax_request=false;
                 }

                 main.parents('.row-hide').hide('fast');
                 $(".form-kategori").val("");
                 hide_proses();
                },
                error:function(a,b,c){
                  error_alert("Operasi gagal","Pesan Error<br>"+c);
                  console.log(a)
                  console.log(b)
                  ajax_request=false;
                 main.parents('.row-hide').hide('fast');
                 $(".form-kategori").val("");
                 hide_proses();
                }

              });
                } else {
                error_alert("Salah pemakaian karakter!","1. Jangan menaru spasi diawal kata <br>2. Box isian tidak boleh kosong <br>3. Hanya karakter alphabet(A_Z),digit(0-9),spasi,underscore(_),garis datar (-) yang dizinkan ");
                  ajax_request=false;
                  hide_proses();
                }
                 }
             });

          <!--Untuk menambah Sub kategori-->
          $(document).on("click",".t_sub_kategori",function(){
          $('li.aktif_be').remove();
            var id_p=$(this).parent('div').attr('id');
           $('li#'+id_p+' > ul').prepend('<li class="aktif_be" id="'+id_p+'"><div class="input-group sub_kate_area"><input type="text" class="form-control form-sub-kategori" placeholder="Tambah Sub-kategori"><span class="input-group-btn"><button class="btn btn-success tom-tambah-sub" type="button">Tambah!</button></span></div></li>');
          });

          $(document).on("click",".tom-tambah-sub",function(){
            if(!ajax_request){
            var poin=$(this);
            var id_n=poin.parents('li.aktif_be').attr('id');
            var nilai_d=poin.parent('span').siblings('.form-sub-kategori').val();
            var leg_class=poin.parent().parent().parent().parent().siblings('div').attr('class');
            var fil_l_class=/PAR.*_\d+/.exec(leg_class);
            var turunan=(fil_l_class==null)?"":fil_l_class;
            var patr=/^([\w-]+(\s+)?([\w-]+)?)+$/;
            if(patr.test(nilai_d)){              
            ajax_request=true;
            show_proses("Menambahkan Sub-Kategori");
              $.ajax({
                  type:"POST",
                  url:'<?php echo base_url() ?>AN_ajax_admin/new_kategori/'+id_n,
                  data:{value_k:nilai_d,legasi:turunan[0]},
                  cache:false,
                  success: function(a){
                    var d_reg=/^\{.+\}$/;
                    if(d_reg.test(a)){
                      var dat_k=JSON.parse(a);
                      var capedeh=/\d+/.exec(poin.parent().parent().parent().parent().attr('class'));
                      var level_sekarang=Number(capedeh[0]);
                      var next_level=level_sekarang+1;
                      var siapin='<li class="level'+level_sekarang+'" id="'+dat_k.id+'"><div class="level'+level_sekarang+' '+dat_k.turunann+' label label-default cari" id="'+dat_k.id+'" alt="'+level_sekarang+'"><i class="fa fa-plus t_sub_kategori" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambahkan sub kategori "></i><span class="judul_kategori">'+dat_k.nama+'</span><form><input type="text" class="form-ubah-kategori" value="'+dat_k.nama+'"" data-toggle="tooltip" data-placement="top" title="Tekan Enter untuk menyimpan"></form> <i class="fa fa-edit edit_kat" data-toggle="tooltip" data-placement="top" title="Ubah Nama"></i><i class="fa fa-times non_kategori" data-toggle="tooltip" data-placement="left" title="Non aktifkan Kategori ini"></i><i class="fa fa-trash hapus_kategori" id="'+dat_k.id+'" data-toggle="tooltip" data-placement="right" title="Hapus Kategori ini"></i></div><ul class="level'+next_level+'"></ul></li>';
                      poin.parent().parent().parent().parent().prepend(siapin);
                     
                      warna2(); 
                    } else {
                      error_alert("Terjadi kesalahan","Maaf! terjadi kesalahan tak terduga. Silahkan coba lagi <br> Jika error ini muncul terus, hubungi developer!<br> Pesan Error:<br>"+a);
                    }                    
                    ajax_request=false;
                    hide_proses();
                   $('li.aktif_be').remove();
                  },
                  error: function(a,b,c){
                    ajax_request=false;
                    hide_proses();
                    error_alert("Operasi gagal","Cek Koneksi internet anda <br>Pesan Error:<br>"+c);
                  }
               });
            } else {
                error_alert("Salah pemakaian karakter!","1. Jangan menaru spasi diawal kata <br>2. Box isian tidak boleh kosong <br>3. Hanya karakter alphabet(A_Z),digit(0-9),spasi,underscore(_),garis datar (-) yang dizinkan ");
                }
             }
          });
 
          <!--Untuk menghapus kategori-->           
       function hapus_kat(t){
             if(!ajax_request){
                  show_proses('menghapus kategori...')
                  ajax_request=true;
                var k_id=t.attr('id');
                $.ajax({
                      type:"POST",
                      url:'<?php echo base_url() ?>AN_ajax_admin/hapus_kategori',
                      data:{id:k_id},
                      cache:false,
                      success: function(a){
                        if(a=='ok'){
                          $('li#'+k_id).remove();
                         ajax_request=false;
                        }
                        else{
                          error_alert("Terjadi kesalahan","Silahkan coba lagi");
                        }
                        hide_proses();
                      },
                      error: function(a,b,c){
                        error_alert("Gagal!","Mohon periksa koneksi internet!<br>Pesan Error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                        console.log(a);
                      }
                  })
                } else {
                  alert("ops, ada proses yg sementara berlangsung");
                }
              }; 
            

          $(document).on("click",".hapus_kategori",function(){
            if(!ajax_request){
              konfirmasi("Hapus Kategori","Anda yakin akan menghapus kategori?<br>Menghapus kategori akan menyebabkan sub-kategorinya ikut terhapus",hapus_kat,$(this));
            }
           
          })

          <!--Menonaktifkan Kategori-->
            function nonaktif_kategori(t){
              if(!ajax_request){
                ajax_request=true;
                show_proses("Menonaktifkan Kategori");
                id_no=t.parent().attr("id");
                $.ajax({
                  type:"POST",
                  url:'<?php echo base_url() ?>AN_ajax_admin/nonaktifkan_kategori',
                  data:{id:id_no},
                  cache:false,
                  success:function(a){
                    if(a=='ok'){
                     // alert("berhasil");
                     t.attr({
                      class:"fa fa-check akt_kategori",
                      'data-original-title':"Aktifkan Kategori ini"
                     })
                    } else {
                      error_alert("Error","Maaf terjadi kesalahan tidak terduga. Harap coba lagi<br>Pesan Error:"+a);
                    }
                    ajax_request=false;
                    hide_proses();
                  },
                  error:function(a,b,c){
                    error_alert("Gagal!","Mohon periksa koneksi internet!<br>Pesan Error:<br>"+c);
                    ajax_request=false;
                    hide_proses();
                  }
                });
              }
            }
          $(document).on("click",".non_kategori",function(){
            if(!ajax_request){
              konfirmasi("Nonaktifkan Kategori","Menonaktifkan kategori tidak akan membuat sub kategori ternonaktif.<br> Dapak yang dapat timbul adalah sub kategorinya tidak akan muncul  di menu front end selama parent kategorinya tidak aktif.",nonaktif_kategori,$(this));
            }
          });

          <!--Mengaktifkan kategori-->
          $(document).on("click",".akt_kategori",function(){
            if(!ajax_request){
              ajax_request=true;
              show_proses("Mengkatifkan Kategori");
              var li=$(this);
              var a_id=li.parent().attr("id");
              $.ajax({
                type:"POST",
                url:'<?php echo base_url() ?>AN_ajax_admin/aktifkan_kategori',
                data:{id_a:a_id},
                cache:false,
                success:function(a){
                  if(a=="ok"){
                     li.attr({
                      class:"fa fa-times non_kategori",
                      'data-original-title':"Non aktifkan Kategori ini"
                     })
                  }else{
                    error_alert("Error","Maaf, terjadi kesalahan yang tidak terduga. Silahkan coba lagi<br>Pesan Error:<br>"+a);
                  }
                  ajax_request=false;
                  hide_proses();
                },
                error:function(a,b,c){
                  error_alert("Error","Harap cek koneksi internet anda<br>Pesan Error:<br>"+c);
                  ajax_request=false;
                  hide_proses();
                }
              });
            }
          })

        <!--Ubah nama kategori-->
        function bukaform(t){
          var form=t.siblings('form').children(".form-ubah-kategori");
          var inputan=t.siblings('.judul_kategori');
          form.fadeIn();
          inputan.hide();
        }
        $(document).on("click",".edit_kat",function(){
          bukaform($(this));
        })

        $(document).on("submit","div.cari form",function(e){
          e.preventDefault();
          if(!ajax_request){
            ajax_request=true;
            show_proses("Mengubah nama");
          var form_sekarang=$(this).children('.form-ubah-kategori');
          var span_judul=$(this).siblings('.judul_kategori');
          var vall=form_sekarang.val();
          var idd=$(this).parent().parent().attr('id');          
          var regg=/^([\w-]+(\s+)?([\w-]+)?)+$/;
          if(regg.test(vall)){
            $.ajax({
              type:"POST",
              url:'<?php echo base_url() ?>AN_ajax_admin/ubah_kategori',
              data:{nama_kategori:vall,id_kategori:idd},
              cache:false,
              success:function(a){
                if(a=='ok'){
                  form_sekarang.val(vall).hide();
                  span_judul.html(vall).fadeIn();
                } else {
                    error_alert("Error","Maaf, terjadi kesalahan yang tidak terduga. Silahkan coba lagi<br>Pesan Error:<br>"+a);
                  }
                   ajax_request=false;
                  hide_proses();

              },
              error:function(a,b,c){                
                  error_alert("Error","Harap cek koneksi internet anda<br>Pesan Error:<br>"+c);
                  ajax_request=false;
                  hide_proses();
              }
            })
          } else {

            error_alert("Salah pemakaian karakter!","1. Jangan menaru spasi diawal kata <br>2. Box isian tidak boleh kosong <br>3. Hanya karakter alphabet(A_Z),digit(0-9),spasi,underscore(_),garis datar (-) yang dizinkan ");
             hide_proses();
             ajax_request=false;
          }
          }
        });
        <?php } ?>

        
       
        
       
         <?php  if($npage=="3"){ ?>
         /*From menambah user*/

        /* Untuk mencek inputan user*/
        var valid_username=false,
            valid_email=false,
            valid_full_name=false,
            valid_password=false,
            valid_repassword=false

        /*username*/
        $(".form-user-baru input#username").blur(function(){
          var userval=$(this).val();
          var p=$(this);
          if(userval!=''){
            if(/^[\w]+$/.test(userval)){
            if(userval.length>2){
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/cek_new_username",
              data:{username:userval},
              cache:false,
              success:function(a){
                if(a=='ok' && userval.length>2){
                 p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
                  p.parent().siblings('span.label-danger').html("");
                  valid_username=true;
                 
                }
                else if(a=='terpakai') {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Username ini sudah terpakai');
                   valid_username=false;
                }
              }
            });
            }
            else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Harus minimal 3 karakter');
                   valid_username=false;
            }
          }
          else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Karakter hanya diperbolehkan huruf/kata/underscore, dan jgn ada spasi');
                   valid_username=false;
          }
          }else{
             p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Tidak boleh kosong');
                   valid_username=false;
          }
        })

      /*email*/
      $(".form-user-baru input#email").on("blur keyup",function(){
        var mailval=$(this).val();
        var z=$(this);
        if(/^[\w-.]+@[0-9a-zA-Z_.]+\.[0-9a-zA-Z_.]+$/.test(mailval)){
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           z.parent().siblings('span.label-danger').html("");
           valid_email=true;
                 
                }
         else {
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           z.parent().siblings('span.label-danger').html('Format email tidak benar');
           valid_email=false;
        }

      });


      $(".form-user-baru input#nama_lengkap").on("blur keyup",function(){
        var namavall=$(this).val();
        var zz=$(this);
        if(namavall!=''){
          if(/^\w[\w\s]+$/.test(namavall)){
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           zz.parent().siblings('span.label-danger').html('');
           valid_full_name=true;
          } else {
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Hanya diperbolehkan huruf/angka/underscore/spasi. Dan jg ada spasi di awal');
           valid_full_name=false;
          }
        } else {
           zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_full_name=false;
        }
      });


      $(".form-user-baru input#password").on("blur keyup",function(e){
        if(e.type='keyup'){
          $(".form-user-baru input#repassword").val('').siblings('.form-control-feedback').attr('class','form-control-feedback');
           valid_repassword=false;
        }
        var passvall=$(this).val();
        var yy=$(this);
        if(passvall!=''){
          if(passvall.length>=8){
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yy.parent().siblings('span.label-danger').html('');
           valid_password=true;

          }else{
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Minimal 8 karakter');
           valid_password=false;
          }
        } else {
          yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_password=false;
        }
      });
      
      $(".form-user-baru input#repassword").on("blur keyup",function(e){
        var repass=$(this).val();
        var yyy=$(this);
        var passbef=$(".form-user-baru input#password").val();
        
        if(repass==passbef){
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yyy.parent().siblings('span.label-danger').html('');
           valid_repassword=true;
        } else {
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yyy.parent().siblings('span.label-danger').html('Password tidak sama');
           valid_repassword=false;
        }

      });

      var form_no_error=false;
      function cek_no_error(){
        if(valid_username && valid_email && valid_full_name && valid_password && valid_repassword){
          form_no_error=true;
        }else{
          form_no_error=false;
        }
      }
      setInterval(cek_no_error,500);

      
          /* Untuk upload avatar admin */
           var sedang_upload_avatar=false;
           var avatar_terupload=false;
           var form_username_has_error=false;
           var file_temp_telah_terhapus=false;
           var sesi=$('.sesi-from').val();
           var AvatarBaru=new Dropzone(".avatar_user", { url: "<?php echo base_url() ?>AN_ajax_admin/avatar_new" ,
                                                      maxFilesize: 2,
                                                      maxFiles: 1,
                                                      method:'post',
                                                      acceptedFiles:"image/*",
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      headers: {sesi:"2"},
                                                      dictDefaultMessage:"Drop foto/gambar disini untuk dijadikan gambar profil user <br> (160px x 160px)",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan gambar ini"
                                                    });
           AvatarBaru.on("sending",function(a,b,c){
            a.token=Math.random();
            c.append('sesi',sesi);
            c.append('token_foto',a.token);
            sedang_upload_avatar=true;
           
            console.log('mengirim');
            console.log('sedang_upload_avatar:'+sedang_upload_avatar);
           })
           AvatarBaru.on("success",function(a,b,c){
            sedang_upload_avatar=false;
            avatar_terupload=true;
            file_temp_telah_terhapus=false;
            console.log('success');
            console.log('sedang_upload_avatar:'+sedang_upload_avatar);
            console.log('avatar_terupload:'+avatar_terupload);
            console.log(a.token);
           // alert(b)
           })
           AvatarBaru.on("error",function(a,b){ 
            sedang_upload_avatar=false;
            avatar_terupload=(avatar_terupload)?true:avatar_terupload;
            console.log('error');
            console.log('sedang_upload_avatar:'+sedang_upload_avatar);
            console.log('avatar_terupload:'+avatar_terupload);
           })

           AvatarBaru.on("canceled",function(){
            sedang_upload_avatar=false;
             avatar_terupload=false;
           })

           AvatarBaru.on("removedfile",function(a){
            if(a.status=='success'){
              avatar_terupload=false;
              var token=a.token;
              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>AN_ajax_admin/delete_foto_temp",
                data:{foto_token:token},
                cache:false,
                success:function(){
                  file_temp_telah_terhapus=true;
                }

              })

            }
            console.log(avatar_terupload);
           
           })


            $('.form-user-baru').submit(function(e){
                e.preventDefault();
                if(!ajax_request){
                if(form_no_error){
                    if(sedang_upload_avatar){
                      konfirmasi("Upload foto masih sementara barlangsung","Dengan mengklik tombol lanjutkan,Proses penyimpanan akan berlangsung tapi upload foto akan dibatalkan",proses_new_admin,$(this));
                    } else {
                      if(!avatar_terupload){
                        //avatar tidak terupload
                        konfirmasi("Tidak ada foto yang diupload","Dengan mengklik tombol lanjutkan, data akan disimpan tanpa foto",proses_new_admin,$(this));
                      } else {
                        //avatar terupload
                        proses_new_admin($(this));
                      }
                    }
                 }
                 else {
                  error_alert("Form belum terisi dengan benar","Masih ada input yang belum terisi dengan benar. Pastikan semua input sudah tercentang hijau");
                 }
               }
              });

            function proses_new_admin(_this){
              if(!ajax_request){
                ajax_request=true;
                show_proses("Menambahkan admin baru...");
              var username=_this.find("input#username").val(),
                  email=_this.find("input#email").val(),
                  nama_lengkap=_this.find("input#nama_lengkap").val(),
                  password=_this.find("input#password").val(),
                  repassword=_this.find("input#repassword").val(),
                  admin_level=_this.find("select#leveladmin").val();
                  sessi=_this.find("input.sesi-from").val();
                  avatar=(avatar_terupload==true)?"1":"0";

                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>AN_ajax_admin/new_admin",
                  data:{"username":username,"email":email,"nama":nama_lengkap,"password":password,"repassword":repassword,"admin_level":admin_level,"sessi":sessi,"avatar":avatar},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                   show_proses("Berhasil!, mengalihkan halaman...")
                    window.location="<?php echo base_url() ?>admin/all_user";
                     //error_alert("berhasil",a);
                    } else if(a=='taken'){
                      error_alert("Tindakan Ilegal!","Username yang anda masukan sudah pernah terdaftar! Masukkan yang lain");
                      ajax_request=false;
                    } else {
                      error_alert("Error","Maaf ada kesalahan tidak terduga. Mohon coba lagi<br> Pesan Error: <br>"+a);
                      ajax_request=false;
                    }
                    hide_proses();
                  },
                  error:function(a,b,c){                    
                      error_alert("Error","Terjadi kesalahan. Mungkin koneksi internet terputus atau server down. Mohon coba lagi<br> Pesan Error: <br>"+c);
                      hide_proses();
                      ajax_request=false;
                  }
                });
              }
            }

          <?php  } //Akhir untuk form user baru
           ?> 

          <?php  if($npage=="4"){ ?>
            $('#daftar-user').DataTable();

            $(document).on("click","table#daftar-user span.username",function(){
              var nil=$(this).html();
              $(this).hide();
              $(this).siblings('form').find('input').val(nil).fadeIn();
            });

            $(document).on("submit","table#daftar-user form.username",function(e){
              e.preventDefault();
              if(!ajax_request){
                ajax_request=true;
                //show_proses("Memperbaharui username");
                var th=$(this);
                var valu=th.find('input').val();
                if(/^[\w]{3,100}$/.test(valu)){
                  show_proses("Memperbaharui username");
                  var id=th.parent().parent().attr("id");
                  $.ajax({
                    type:"POST",
                    url:"<?php echo base_url() ?>AN_ajax_admin/edit_username",
                    data:{"id":id,"username":valu},
                    cache:false,
                    success:function(a){
                      if(a=="sama" || a=="ok"){
                        th.find('input').hide();
                        th.siblings("span.username").html(valu).fadeIn();
                        ajax_request=false;
                        hide_proses();
                      } else if (a=="terpakai"){
                        error_alert("Update Gagal","Username sudah di dipakai. Harap gunakan lain");
                        ajax_request=false;
                        hide_proses();
                      } else {
                        error_alert("Kesalahan tidak terduga","Harap coba lagi. <br> Pesan Error: <br>"+a);
                        ajax_request=false;
                        hide_proses();
                      }
                    },
                    error: function(a,b,c){
                      error_alert("Proses gagal","Laporkan error ini ke developer: <br>"+c);
                      ajax_request=false;
                      hide_proses();
                    }
                  }); 
                } else {
                   ajax_request=false;
                   error_alert("Karakter tidak berlaku","1. Karakter yang diperbolehkan hanyalah huruf,angka,underscore <br> 2. Jangan menggunakan spasi <br> 3. Harus Minimal 3 karakter")
                }
              }
            });
              
            $(document).on("click","table#daftar-user span.full_name",function(){
              var nil=$(this).html();
              $(this).hide();
              $(this).siblings('form').find('input').val(nil).fadeIn();
            });

            $(document).on("submit","table#daftar-user form.full_name",function(e){
              e.preventDefault();
              if(!ajax_request){
                ajax_request=true;
                var th=$(this);
                var valu=th.find('input').val();
                if(/^\w[\w\s]+$/.test(valu)){
                  show_proses("Memperbaharui nama user");
                  var id=th.parent().parent().attr("id");
                  $.ajax({
                    type:"POST",
                    url:"<?php echo base_url() ?>AN_ajax_admin/edit_fullname",
                    data:{"id":id,"name":valu},
                    cache:false,
                    success:function(a){
                      if(a=="ok"){
                        th.find('input').hide();
                        th.siblings("span.full_name").html(valu).fadeIn();
                        ajax_request=false;
                        hide_proses();
                      } else {
                        error_alert("Kesalahan tidak terduga","Harap coba lagi. <br> Pesan Error: <br>"+a);
                        ajax_request=false;
                        hide_proses();
                      }
                    },
                    error: function(a,b,c){
                      error_alert("Proses gagal","Laporkan error ini ke developer: <br>"+c);
                      ajax_request=false;
                      hide_proses();
                    }
                  }); 
                } else {
                   ajax_request=false;
                   error_alert("Karakter tidak berlaku","1. Karakter yang diperbolehkan hanyalah huruf,angka,underscore<br>2. Jangan ada spasi di awal kata <br> 3. Minimal 2 karakter");
                }
              }
            });

            $(document).on("click","table#daftar-user span.email",function(){
              var nil=$(this).html();
              $(this).hide();
              $(this).siblings('form').find('input').val(nil).fadeIn();
            });

            $(document).on("submit","table#daftar-user form.email",function(e){
              e.preventDefault();
              if(!ajax_request){
                ajax_request=true;
                var th=$(this);
                var valmail=th.find('input').val();
                if(/^[\w-.]+@[0-9a-zA-Z_.]+\.[0-9a-zA-Z_.]+$/.test(valmail)){
                  show_proses("Memperbaharui email user");
                  var id=th.parent().parent().attr("id");
                  $.ajax({
                    type:"POST",
                    url:"<?php echo base_url() ?>AN_ajax_admin/edit_email",
                    data:{"id":id,"email":valmail},
                    cache:false,
                    success:function(a){
                      if(a=="ok"){
                        th.find('input').hide();
                        th.siblings("span.email").html(valmail).fadeIn();
                        ajax_request=false;
                        hide_proses();
                      } else {
                        error_alert("Kesalahan tidak terduga","Harap coba lagi. <br> Pesan Error: <br>"+a);
                        ajax_request=false;
                        hide_proses();
                      }
                    },
                    error: function(a,b,c){
                      error_alert("Proses gagal","Laporkan error ini ke developer: <br>"+c);
                      ajax_request=false;
                      hide_proses();
                    }
                  }); 
                } else {
                   ajax_request=false;
                   error_alert("Format Email tidak benar","Format email salah, silahkan ulangi.<br> Jangan ada spasi di awal dan akhir <br>Contoh: nama@domain.com");
                }
              }
            });

              select_open=false;
             $(document).on("click","table#daftar-user span.level",function(){
              if(!select_open){
              var nil=$(this).html();
              $(this).hide();
              $(this).siblings('select.level').fadeIn();
              select_open=true
              }
            });

             $(document).on("change","table#daftar-user select.level",function(e){
              if(!ajax_request){
                show_proses("Mengubah level user");
                var level=$(this).val();
                var _this=$(this);
                var id=_this.parent().parent().attr("id");
                ajax_request=true;
                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>AN_ajax_admin/edit_level",
                  data:{"id":id,"level":level},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      var show=(level=="0")?"Admin":"Super Admin";
                      _this.siblings("span.level").html(show).fadeIn();
                      _this.hide();
                      ajax_request=false;
                      hide_proses();
                      select_open=false;
                    } else {
                        error_alert("Kesalahan tidak terduga","Harap coba lagi.<br><b>HALAMAN INI AKAN DI RELOAD DALAM 5 DETIK</b> <br> Pesan Error: <br>"+a);
                        ajax_request=false;
                        hide_proses();
                        select_open=false;
                        window.setTimeout(function(){
                          window.location.reload();
                        },5000);
                    }
                  },
                  error:function(a,b,c){
                     error_alert("Proses gagal","Cek koneksi Internet<br>Laporkan error ini ke developer: <br>"+c);
                     ajax_request=false;
                     hide_proses();
                  }
                })

              }
              
             });


            $(document).on("click","table#daftar-user span.status span",function(){
              if(!select_open){
              var nil=$(this).html();
              $(this).hide();
              $(this).parent().siblings('select.status').fadeIn();
              select_open=true
              }
            });

            $(document).on("change","table#daftar-user select.status",function(e){
              if(!ajax_request){
                show_proses("Mengubah status user");
                var status=$(this).val();
                var _this=$(this);
                var id=_this.parent().parent().attr("id");
                ajax_request=true;
                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>AN_ajax_admin/edit_status",
                  data:{"id":id,"status":status},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      var show=(status=="Y")?"<span class='label label-success'>Aktif</span>":"<span class='label label-danger'>Tidak Aktif</span>";
                      _this.siblings("span.status").html(show).fadeIn();
                      _this.hide();
                      ajax_request=false;
                      hide_proses();
                      select_open=false;
                    } else {
                        error_alert("Kesalahan tidak terduga","Harap coba lagi.<br><b>HALAMAN INI AKAN DI RELOAD DALAM 5 DETIK</b> <br> Pesan Error: <br>"+a);
                        ajax_request=false;
                        hide_proses();
                        select_open=false;
                        window.setTimeout(function(){
                          window.location.reload();
                        },5000);
                    }
                  },
                  error:function(a,b,c){
                     error_alert("Proses gagal","Cek koneksi Internet<br>Laporkan error ini ke developer: <br>"+c);
                     ajax_request=false;
                     hide_proses();
                  }
                })

              }
              
             });

              var editpass=false;
              var reeditpass=false;
              $(document).on("click","table#daftar-user button.password",function(){
                editpass=false;
                reeditpass=false;
                var id=$(this).parent().parent().attr("id");
                var username=$(this).parent().siblings().find("span.username").html();
                $("#modal-password span.username").html(username);
                $("#modal-password span.label-danger").html("");
                $("#modal-password input.id").val(id);
                $("#modal-password #editpassword").val("");
                $("#modal-password #editrepassword").val("");
                $("#modal-password .form-control-feedback").attr("class","form-control-feedback");

                $("#modal-password").modal();
              });

             
              $(document).on("blur keyup","#modal-password input#editpassword",function(){
                var _this=$(this);
                var val=_this.val();
                if(val.length>=8){
                  editpass=true;
                  _this.parent().siblings("span.label-danger").html("");
                  _this.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');

                } else {
                  editpass=false;
                  _this.parent().siblings("span.label-danger").html("Harus Minimal 8 karakter");
                  _this.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                }


                  reeditpass=false;
                  var red=$("#modal-password input#editrepassword");
                  red.parent().siblings("span.label-danger").html("");
                  red.siblings(".form-control-feedback").attr("class","form-control-feedback");
              });

              $(document).on("blur keyup","#modal-password input#editrepassword",function(){
                var _this=$(this);
                var val=_this.val();
                var pass=$("#modal-password input#editpassword").val();
                if(val==pass){
                   reeditpass=true;
                  _this.parent().siblings("span.label-danger").html("");
                  _this.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');

                } else {
                   reeditpass=false;
                  _this.parent().siblings("span.label-danger").html("Password harus sama");
                  _this.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                }
              });

              $(document).on("click","#modal-password button.save",function(){
                if(!ajax_request){
                  if(!editpass){
                  $("#modal-password input#editpassword").parent().siblings("span.label-danger").html("Harus Minimal 8 karakter");
                  $("#modal-password input#editpassword").siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                  $("#modal-password input#editpassword").focus();
                  } else if (!reeditpass){
                  $("#modal-password input#editrepassword").parent().siblings("span.label-danger").html("Password harus sama");
                  $("#modal-password input#editrepassword").siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                  $("#modal-password input#editrepassword").focus();
                  } else {
                    var _this=$(this);
                    _this.html("Harap tunggu..");
                    ajax_request=true;
                    var val=$("#modal-password input#editpassword").val();
                    var id=$("#modal-password input.id").val();
                    $.ajax({
                      type:"POST",
                      url:"<?php echo base_url() ?>AN_ajax_admin/edit_password",
                      data:{"id":id,"password":val},
                      cache:false,
                      success:function(a){
                        if(a=="ok"){
                           $("#modal-password").modal("hide");
                           _this.html("Save");
                        } else {
                           _this.html("Save");
                          alert("Error: "+a);
                        }
                        ajax_request=false;
                      },
                      error:function(a,b,c){
                         _this.html("Save");
                        alert("Error: "+c);
                        ajax_request=false;
                      }
                    });
                  }
                } else {
                $(".ajax-notif").show().fadeOut(5000);
                }
              });


            var main_foto=false;
           var foto_box= new Dropzone("#modal-foto .area-foto",{ url: "<?php echo base_url() ?>AN_ajax_admin/avatar_update" ,
                                                      maxFilesize: 2,
                                                      maxFiles: 1,
                                                      method:'post',
                                                      acceptedFiles:"image/*",
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      dictDefaultMessage:"Drop foto/gambar disini untuk dijadikan pengganti gambar profil user <br> (160px x 160px)",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan gambar ini"
                                                    });


           function showOk(){
            $("#modal-foto button.ok").show();
            $("#modal-foto button.fakeOk").hide();
           }

           function hideOk(){
            $("#modal-foto button.ok").hide();
            $("#modal-foto button.fakeOk").show();
           }

           foto_box.on("sending",function(a,b,c){
            var id_=$("#modal-foto input.id").val();
            a.token=Math.random();
            c.append('token_foto',a.token);
            c.append('id',id_);
           });
           foto_box.on("success",function(a,b,c){
            if(b!="ok"){
            console.log("Upload Error dari server: "+b);
              alert("Upload Error: "+b);
              main_foto=false;
              hideOk()
            } else {
              main_foto=true;
            console.log("Upload Berhsil");
            showOk();
          }
           });
           foto_box.on("error",function(a,b,c){
            if(!main_foto){
              hideOk()
            }
            console.log("errorMessage: "+b);
            console.log("XMLHttpRequest error : "+c);
           });
           foto_box.on("removedfile",function(a,b,c){
           
            if(a.status=="success"){
              var _token=a.token;
              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>AN_ajax_admin/delete_foto_temp",
                data:{foto_token:_token},
                cache:false,
                success:function(){
                  hideOk();
                  main_foto=false;
                },
                error: function(){ 
                  hideOk();
                  main_foto=false;
                }

              });
            }

           

           })
           foto_box.on("complete",function(a){
            console.log("Complete: "+a);
           })

            $(document).on("click","table#daftar-user button.foto",function(){
              if(!ajax_request){
              var id=$(this).parent().parent().attr("id");
              var username=$(this).parent().siblings().find("span.username").html();
              $("#modal-foto span.username").html(username);
              $("#modal-foto input.id").val(id);
             $("#modal-foto").modal(); 
             }
            });

            $(document).on("click","#modal-foto button.ok",function(){
             var __id=$("#modal-foto input.id").val();
             $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/ganti_user_avatar",
              data:{id:__id},
              cache:false,
              success:function(a,b,c){
                if(a=="ok"){
                console.log("Foto Berhasil Diganti: "+a);
               } else {
                console.log("Foto GAGAL Diganti. Error: "+a);

               } 
              }, 
              error:function (a,b,c){
                 console.log("Terjadi error. Error: "+a);
                 console.log("Terjadi error. Error: "+b);
                 console.log("Terjadi error. Error: "+c);
              }

             });
              $("#modal-foto").modal("hide");
            });

             $("#modal-foto").on("hidden.bs.modal",function(){
              foto_box.removeAllFiles(true);
              main_foto=false;
              hideOk();

             });


             $(document).on("click","table#daftar-user button.hapus",function(){
              if(!ajax_request){
               konfirmasi("Hapus User","Anda yakin akan menhapus user ini?",hapus_user,this);
            }
          });

             function hapus_user(_this){
               ajax_request=true;
               show_proses("Menghapus User");
              var id_r=$(_this).parent().parent().attr("id");
              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>AN_ajax_admin/delete_user",
                data:{"id":id_r},
                cache:false,
                success:function(a){
                  if(a=="ok"){
                    show_proses("Berhasil! Mereload halaman...")
                    window.location.reload();
                  } else{
                    error_alert("Error","Pesan Error: <br>"+ a);
                    ajax_request=false;
                    hide_proses();
                  }
                },
                error:function(a,b,c){
                   error_alert("Error","Pesan Error: <br>"+ c);
                   ajax_request=false;
                   hide_proses();
                }
              });
             }


            <?php  } 
           ?> 

           <?php if($npage==5){ 
           ?> 

           $("#ganti-password-user").click(function(){
              var _this=$(this);
              if(!_this[0].memproses){
                _this[0].memproses=true;
                var password=$("#password-lama").val();
                var password_baru=$("#password-baru").val();
                var konfirmasi_password=$("#konfirmasi-password-baru").val();

                if(password=="" || password==" "){
                  error_alert("Tidak Lengkap","Masukan Password Lama");
                  _this[0].memproses=false;
                } else if(password_baru.length<8){
                  error_alert("Tidak lengkap","Password baru harus Minimal 8 Karakter");
                  _this[0].memproses=false;
                } else if(password_baru!=konfirmasi_password){
                  error_alert("Tidak lengkap","Password Tidak sama");
                  _this[0].memproses=false;
                } else {
                 show_proses("Mengganti Password");
                  $.ajax({
                    type:"post",
                    url:"<?php echo base_url('AN_ajax_admin/proses_update_password') ?>",
                    data:{
                      password_lama:password,
                      password_baru:password_baru
                    },
                    cache:false,
                    dataType:"json",
                    success:function(a){

                      if(a.status=="success"){
                        
                        show_proses("Password telah berhasil diganti");

                        setTimeout(function() {
                          window.location.reload();
                        }, 2000);

                      } else if(a.status=="error"){
                        error_alert("Kesalahan",a.pesan);
                        _this[0].memproses=false;
                        hide_proses();
                      }

                    },
                    error:function(){
                      error_alert("Kesalahan","Harap coba kembali");
                      _this[0].memproses=false;
                      hide_proses();
                    }


                  });

                }

              }
           });
         

           <?php } if($npage==6){
            ?>

            $("#judul_artikel").on("keyup",function(){
              var s_url=getSlug($(this).val());
              $("#seo_url").val(s_url);
            });

textEditor(".isi_artikel");


  /*
  variable2 berikut ini diperlukan untuk validasi form
  */
  <?php
  if($artikel_tags!=false){
    echo "var tag_terpilih= [$artikel_tags];";
  } else {
    echo "var tag_terpilih= [];";
  }
  ?>

  $('span.span-tag').each(function(index){
    var _1this=$(this);
    var id1=_1this.attr('id');
    $.each(tag_terpilih,function(i,v){
      if(v==id1){
        _1this.attr({class:"label label-success span-tag",title:"selected"});
        return false;
      }
    });
  });
  
  var uupload_in_progress=false;

<?php
 if($artikel_sbg_headline==false){
  //default harus true
  echo "var headline=true;";
 } else {
   $tF=($artikel_sbg_headline=="Y")?"true":"false";
   echo "var headline=$tF;";
 }

if($artikel_editable==false){
  echo "var editable=true;";
} else {
  $tG=($artikel_editable=="Y")?"true":"false";
   echo "var editable=$tG;";
}



if($artikel_status==false){
  echo "var aStatus=false;";
} else if ($artikel_status=='publish') {
  echo "var aStatus='publish';";
} else if ($artikel_status=='draft') {
  echo "var aStatus='draft';";
}
?>


  var tags;
  $(document).on("click",".span-tag",function(){
    var sta=$(this).attr("title");
    var id_t=Number($(this).attr("id"));
    if(sta=="not_select"){
      $(this).attr({class:"label label-success span-tag",title:"selected"});
      tags=tag_terpilih.push(id_t);
    } else if (sta=="selected"){      
      $(this).attr({class:"label label-default span-tag",title:"not_select"});
      $.each(tag_terpilih,function(i,v){
        if(v==id_t){
          tags=tag_terpilih.splice(i,1);
          return false;
        }
      });
    }
    $(".area_count").html(tag_terpilih.length);
   
  });

  $(".area_count").html(tag_terpilih.length);
  
          <?php if($artikel_id!=0){
            echo "var inEdit=true, idE=$artikel_id;";
          } else{
            echo "var idE=0;";
          } ?>


          var j_foto_yaang_diupload=0;

           var foto_artikel=new Dropzone(".foto_gallery_artikel", { url:"<?php echo base_url() ?>AN_ajax_admin/foto_gallery_artikel" ,
                                                      maxFilesize: 2,
                                                      method:'post',
                                                      acceptedFiles:"image/*",
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      dictDefaultMessage:"Drop foto/gambar disini",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan gambar ini"
                                                    }); 
            var sesi=$(".sesi-from_artikel").val(); 
           foto_artikel.on("sending",function(a,b,c){

            uupload_in_progress=true;
            a.token=Math.random();
            c.append('sesi',sesi);
            c.append('token_foto',a.token);
            c.append('id',idE);
          
            console.log('mengirim');
           
           });

         

           foto_artikel.on("removedfile",function(a){
            var tok=a.token;
            $.ajax({
              type:"POST",
              data:{"token":tok},
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_foto_artikel_temp",
              cache:false,
              success:function(a){
                j_foto_yaang_diupload-=1;
                console.log("delete sukses");
              },
              error: function(a,b,c){
                console.log("delete gagal, cek koneksi internet")
              }
            });
           
           });



           foto_artikel.on("queuecomplete",function(){
            uupload_in_progress=false;
             <?php if($artikel_id!=0){ ?>
              $(".dropzone").css("min-height","96px");
              $(".dz-message").css("display","block");
              <?php
             }
           ?>
            console.log("Semua operasi selesai");
           });

          <?php if($artikel_id!=0){
          ?>

          foto_artikel.on("success",function(a,b){
           
            $(".dz-success").remove();
           var data_n=JSON.parse(b);
           var html="<div class='aPhotoThumb col-md-4 col-xs-4'><span class='label label-danger hapus_label'> menghapus... </span>  <button class='btn btn-warning btn-sm featured-tombol'>jadikan featured image</button><span class='glyphicon glyphicon-remove hapus_foto_artikel' id='"+data_n.id+"'></span><div class='hover_foto_artikel' ></div><img src='<?php echo base_url() ?>an-component/media/upload-gambar-artikel-thumbs/"+data_n.gambar+"'></div>";

            $(".foto-artikel-area").prepend(html);

          });

          <?php
          } else {
            ?>


        foto_artikel.on("success",function(a,b){
               j_foto_yaang_diupload+=1;
        });
             
            
            <?php
          } ?>

           (function($){
            var targ=$(".cek_headline");
            if(headline){
               targ.css("background-color","#00a65a").html("YES");
            } else {
               targ.css("background-color","#d9534f").html("NO");
            }
              var targ2=$(".iz_edit");
            if(editable){
               targ2.css("background-color","#00a65a").html("YES");
            } else {
               targ2.css("background-color","#d9534f").html("NO");
            }
           })(jQuery);

           $(".cek_headline").click(function(){
            if(headline){
              $(this).css("background-color","#d9534f").html("NO");
              headline=false;
            }else{
              $(this).css("background-color","#00a65a").html("YES");
              headline=true;
            }
           });



            $(".iz_edit").click(function(){
            if(editable){
              $(this).css("background-color","#d9534f").html("NO");
              editable=false;
            }else{
              $(this).css("background-color","#00a65a").html("YES");
              editable=true;
            }
           });

            function setData(){

            }





           $(".save-artikel").click(function(){
            if(!ajax_request){

            var ada_foto=((<?php echo $artikel_id ?>==0 && j_foto_yaang_diupload>0) || (<?php echo $artikel_id ?>>0 && $(".aPhotoThumb").length >0 ));
              var judul_k=$("#judul_artikel").val();
              var sesi_a=$(".sesi-from_artikel").val();
              var id_aa=$(".id_artikel").val();
              var seo_url=$("#seo_url").val();
              var isi_a=tinymce.get("isi_artikel").getContent();
              var kategori_a=$("#kategori_artikel").val();
              var tags_artikel_a=tag_terpilih.toString();
              var headline_artikel_a=(headline)?"Y":"N";
              var editable_artikel_a=(editable)?"Y":"N";
              var meta_description_a=$("#meta_description").val();
              var meta_author_a=$("#meta_author").val();
              var meta_keyword_a=$("#meta_keyword").val();
              var og_title_a=$("#og_title").val();
              var og_description_a=$("#og_description").val();
              var og_image_a=$("#og_image").val();
             
              var alamat_a=(id_aa==0)?"<?php echo base_url() ?>AN_ajax_admin/submit_artikel/0":"<?php echo base_url() ?>AN_ajax_admin/submit_artikel/3"
              if(judul_k==""){
                $("#judul_artikel").focus();
                 error_alert("Judul artikel tidak boleh kosong","Harap masukan judul");
              } else if (seo_url==""){
                $("#seo_url").focus();
                error_alert("SEO URL tidak boleh kosong","Harap masukan ");
              } else if (kategori_a=="0"){
                $("#kategori_artikel").focus();
                error_alert("Kategori belum dipilih","Harap masukan kategori");                
              } else if(!ada_foto){
                error_alert("Belum foto", "Belum Ada satupun foto yang diupload");
              } else {
                ajax_request=true;
                show_proses("Menginput Data");
                if(!/^[\w-]+$/.test(seo_url)){
                 seo_url=getSlug(judul_k);
                }
                var __data={
                  "judul":judul_k,
                  "sesi":sesi_a,
                  "id":id_aa,
                  "seo":seo_url,
                  "isi":isi_a,
                  "kategori":kategori_a,
                  "tags":tags_artikel_a,
                  "headline":headline_artikel_a,
                  "editable":editable_artikel_a,
                  "meta_description":meta_description_a,
                  "meta_author":meta_author_a,
                  "meta_keyword":meta_keyword_a,
                  "og_title":og_title_a,
                  "og_description":og_description_a,
                  "og_image":og_image_a,
                  "sesi_artikel":$(".sesi-from_artikel").val(),
                  "aStatus":aStatus,
                  'returnDraft':false
                };

                $.ajax({
                  type:"POST",
                  url:alamat_a,
                  data: __data,
                  cache: false,
                  success: function(a){
                    if(a=='publish'){
                      show_proses("Update Berhasil! Mereload Halaman...");
                       window.location.reload();
                    } else {
                      if(/^[\d]+$/.test(a)){

                      show_proses("Input Berhasil! Mereload Halaman...");
                      window.location.assign("<?php echo base_url() ?>admin/artikel/"+a);
                      } else {
                        error_alert("Terjadi Kesalahan",a);
                         ajax_request=false;
                         hide_proses();
                      }
                    }
                   // error_alert("PESAN",a);
                   
                  },
                  error: function(a,b,c){
                     error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                  }
                });
              }
             
            }
           });

           $(".tampilkan-meta").click(function(){
              var _con=$(this).attr("alt");
              if(_con=='0'){
                $(this).html("Sembunyikan Informasi Tambahan").attr("alt","1");
                $(".tambahan_p_artikel").slideDown("fast");
              } else if (_con=='1'){                
                $(this).html("Tampilkan Informasi Tambahan").attr("alt","0");
                $(".tambahan_p_artikel").slideUp("fast");
              }
           });

           var lagiSimpanDraft=false;
           var timeDraft=16;

           $(document).on("save-draft",function(){
            if(!lagiSimpanDraft){
              lagiSimpanDraft=true;
              var Djudul_k=$("#judul_artikel").val();
              var Dsesi_a=$(".sesi-from_artikel").val();
              var Did_a=$(".id_artikel").val();
              var Dseo_url=$("#seo_url").val();
              var Disi_a=tinymce.get("isi_artikel").getContent();
              var Dkategori_a=$("#kategori_artikel").val();
              var Dtags_artikel=tag_terpilih.toString();
              var Dheadline_artikel=(headline)?"Y":"N";
              var Deditable_artikel=(editable)?"Y":"N";
              var Dmeta_description=$("#meta_description").val();
              var Dmeta_author=$("#meta_author").val();
              var Dmeta_keyword=$("#meta_keyword").val();
              var Dog_title=$("#og_title").val();
              var Dog_description=$("#og_description").val();
              var Dog_image=$("#og_image").val();
              $('.pesan-draft').html('sedang menyimpan ke draft...');
              var __Ddata={
                  "judul":Djudul_k,
                  "sesi":Dsesi_a,
                  "id":Did_a,
                  "seo":Dseo_url,
                  "isi":Disi_a,
                  "kategori":Dkategori_a,
                  "tags":Dtags_artikel,
                  "headline":Dheadline_artikel,
                  "editable":Deditable_artikel,
                  "meta_description":Dmeta_description,
                  "meta_author":Dmeta_author,
                  "meta_keyword":Dmeta_keyword,
                  "og_title":Dog_title,
                  "og_description":Dog_description,
                  "og_image":Dog_image,
                  "sesi_artikel":$(".sesi-from_artikel").val(),
                  "aStatus":aStatus,
                  'returnDraft':true
                };
                $.ajax({
                  type:"POST",
                  url:(Did_a==0)?"<?php echo base_url() ?>AN_ajax_admin/submit_artikel/0":"<?php echo base_url() ?>AN_ajax_admin/submit_artikel/3",
                  data: __Ddata,
                  cache: false,
                  success: function(a){

                    $('.pesan-draft').html('<span style="color: green">berhasil tersimpan ke draft</span>');
                    lagiSimpanDraft=false;
                    if(a=='draft' && aStatus=='publish'){
                        window.location.reload();
                    }

                    timeDraft=16;
                    
                  },
                  error: function(a,b,c){                     
                      lagiSimpanDraft=false;
                      $('.pesan-draft').html('<span style="color: red">gagal menyimpan ke draft</span>');      
                      timeDraft=16;             
                  }
                });
              }
           });

        
           function triggerDraft(){
            $(document).trigger('save-draft');
           }

           $(document).on('click','.draft-artikel',triggerDraft);

          if(lagiSimpanDraft==false && (aStatus==false || aStatus=='draft')){
            window.setInterval(function(){
          if(lagiSimpanDraft==false){
              $('.time-draft').text('otomatis kembali menyimpan ke draft dalam waktu '+timeDraft+' detik. ');
              timeDraft--;
              if(timeDraft==-1){
                triggerDraft();
              }
            }
            },1000);
          }

          /* if(aStatus==false || aStatus=='draft'){
           window.setInterval(triggerDraft,17000);
          } */





          var hapusTerpilih=[];
          var menghapusMultiple=false;
          $(document).on("click",".aPhotoThumb",function(e){
            if(!$(e.target).is(".featured-tombol") && !$(e.target).is(".hapus_foto_artikel")){
            var id_terpilih=$(this).find(".hapus_foto_artikel").attr("id");
            if(!$(this)[0].terpilih){
            hapusTerpilih.push(id_terpilih);
            $(this).css({"border":"5px solid red"});
            $(this)[0].terpilih=true;
            } else {
            $(this).css({"border":"0"});
            $.each(hapusTerpilih,function(i,v){
              if(v==id_terpilih){
                hapusTerpilih.splice(i,1);
                return false;
              }
            });
            $(this)[0].terpilih=false;
            }
            if(hapusTerpilih.length>0){
              $(".tbl-hapus-multi").fadeIn();
            } else {
              $(".tbl-hapus-multi").fadeOut();
            }
          }
          });


          $(".tbl-hapus-multi").click(function(){
           konfirmasi("Menghapus Foto","Yakin akan menghapus foto foto ini? Foto yang telah terhapus tidak dapat dikembalikan lagi",hapusMultiPhoto,$(this));
          });

          function hapusMultiPhoto(_this){
             if(!menghapusMultiple){
            menghapusMultiple=true;
            var _dataHapus=hapusTerpilih.toString();
            $.ajax({
              type: "POST",
              url: "<?php echo base_url() ?>AN_ajax_admin/delete_multi_photos",
              data: {"id":_dataHapus},
              cache: false,
              success: function(a){
                menghapusMultiple=false;
                $.each(hapusTerpilih,function(i,v){
                  $(".aPhotoThumb:has(span#"+v+")").fadeOut(function(){
                    $(this).remove();
                  });
                });
                hapusTerpilih=[];
                 $(".tbl-hapus-multi").fadeOut();

              },
              error:function(a,b,c){
                menghapusMultiple=false;
              },
              complete: function(){
               
              }
            })
           }
          }

          var featuring=false;
          $(document).on("click",".featured-tombol",function(){
            if(!featuring){
            featuring=true;
            var this_=$(this);
            var textN=$(this).text();
            var id_s=$(this).siblings(".hapus_foto_artikel").attr("id");

            $(this).text("tunggu sebentar...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/set_featured_image",
              data:{"id":id_s,'artikel_id':<?php echo $artikel_id ?>},
              cache:false,
              success: function(a){
                if(a=="ok"){
                 $(".aPhotoThumb > .featured-label").remove();
                 $(".aPhotoThumb").removeClass("featured-true");

                 this_.parent().addClass("featured-true").prepend("<span class='label label-primary featured-label'>Featured</span>");
                 $(".featured-tombol").fadeOut();

                } else {
                   error_alert("Terjadi Kesalahan",a);
                }
                this_.text(textN);
                featuring=false;
              },
              error:function(a,b,c){
                error_alert("Terjadi Kesalahan",c);
                this_.text(textN);
                featuring=false;
              }
            });
            }

          });



          $(document).on("mouseenter mouseleave",".aPhotoThumb",function(e){
            if(e.type=="mouseenter"){
             $(this).find('.hapus_foto_artikel').fadeIn();
             $(this).find('.hover_foto_artikel').fadeIn();
             var posisi=$(this).offset();
             if(!$(this).is(".featured-true")){
             $(this).find(".featured-tombol").fadeIn();
             }

             if(!$(this)[0].sudahHover){ 
             var lebarG=$(this).find('img').width();
             $(this)[0].lebarGambar=lebarG;
             $(this)[0].sudahHover=true;
             }
            
             $(this).find('img').animate({width: $(this)[0].lebarGambar-40});

           } else {
             if(!$(this).is(".featured-true")){
             $(this).find(".featured-tombol").fadeOut();
             }
             $(this).find('.hapus_foto_artikel').fadeOut();
             $(this).find('.hover_foto_artikel').fadeOut();
              var lebarG=$(this).find('img').width();
             $(this).find('img').animate({width:$(this)[0].lebarGambar});
           }
           } ); 

           var isDletetingPhotos=false;
           $(document).on("click",".hapus_foto_artikel",function(){
            if(!isDletetingPhotos){
            konfirmasi("Menghapus Foto","Yakin mau menghapus foto ini? Foto yang sudah terhapus tidak bisa dikembalikan lagi",hapusFoto,$(this));

            }

           });

           function hapusFoto(_this){
            isDletetingPhotos=true;
            var _4id=_this.attr("id");
            _this.siblings('.hapus_label').show();
            $.ajax({
              type: "POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_atikel_foto",
              data:{"id": _4id},
              cache:false,
              success: function(a){
                if(a=='deleted'){
                  error_alert("Kesalahan","Foto sudah tidak ada lagi. Silahkan refresh halaman ini");
                } else if(a=='sukses'){
                  _this.parent().remove();
                  $.each(hapusTerpilih,function(i,v){
                    if(_4id==v){
                      hapusTerpilih.splice(i,1);
                      return false;
                    }
                  });
                  if(hapusTerpilih.length==0){
                    $(".tbl-hapus-multi").fadeOut();
                  }
                } else {
                   error_alert("Kesalahan",a);
                }
                isDletetingPhotos=false;
                 _this.siblings('.hapus_label').hide();
              },
              error: function(a){
                error_alert("Kesalahan",a);
                isDletetingPhotos=false;
                _this.siblings('.hapus_label').hide();
              }

            });
           
           }


          direct_upload(".pilih-fb-url","#og_image");


            <?php
           }
           ?>

             <?php if($npage==7){
            ?>
             var art_table=$(".slug-table").DataTable({
              aaSorting:[]
             });

             $(document).on("click",".btn-hapus-artikel",function(){
              if(!ajax_request){
              konfirmasi('Hapus Artikel','Yakin akan menghapusnya?',hapus_artikel,$(this));
              }

             });


             function hapus_artikel(_this){
              show_proses("Menghapus artikel");
              ajax_request=true;
               var id=_this.attr('id');
               $.ajax({
                type: 'post',
                url:"<?php echo base_url() ?>AN_ajax_admin/delete_artikel",
                data: {'id':id},
                cache: false,
                success: function(a){
                  if(a=='ok'){
                 // window.location.reload();
                  $("[class~='artikel_tr'][id='"+id+"']").fadeOut("slow",function(){
                    art_table.row(this).remove().draw(false);
                  });
                  } else {
                    error_alert('Kesalahan',a);
                  }
                },
                error: function(a,b,c){
                  error_alert('Kesalahan',c);
                },
                complete: function(){
                  ajax_request=false;
                  hide_proses();
                }
               });
             }

            <?php
            } 
            ?>


            <?php if($npage==8){
            ?>

            $(".slug-table").DataTable();

            $("#tags").keyup(function(){
              var tag=$(this).val();
              var slug=getSlug(tag);
            $("#slug").val(slug);
            });

            $(".tambah-tag-btn").click(function(){   
            if(!ajax_request) { 
            ajax_request=true;          
              var _tag=$("#tags").val();
              var _slug=$("#slug").val();
              if(!/^\w[a-zA-Z0-9 -]{2,20}$/.test(_tag)){
                error_alert("Ilegal karakter","1. Jangan gunakan spasi di awal<br> 2. Karakter minimal 3 karakter, Max 30<br> 3. Karakter yang dijinkan hanyalah huruf, angka,underscore,garis datar dan spasi<br> 4. Field harus diisi tidak boleh kosong");
                ajax_request=false;
              } else{
                __slug=(!/^\w[\w-]{2,50}$/.test(_slug))?getSlug(_tag):_slug;
                var _data={"tag":_tag,"slug":__slug};
                
                  show_proses("Menambahkan tag...");
                  $.ajax({
                    type: "POST",
                    url:"<?php echo base_url() ?>AN_ajax_admin/new_tag",
                    data:_data,
                    cache:false,
                    success:function(a){
                      if(a=="ok"){
                        show_proses("Berhasil! Mereload halaman");
                        window.location.reload();
                      }else{
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                      }
                    },
                    error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                    }
                  });
                
              }
            }
            });

      
        var _dataObj={};

            $(document).on("click",".slug-table span",function(){
              var _this=$(this);
              var nilai=_this.html();
              _this.hide();
              _this.siblings("form").children("input").val(nilai).fadeIn();

            });

            $(document).on("keyup",".slug-table .nama_tag input",function(){
              var nil1=$(this).val();
              $(this).parent().parent().siblings(".slug_tag").find("span").html(getSlug(nil1));
            });

            $(document).on("submit",".slug-table form",function(e){
              e.preventDefault();
              if(!ajax_request){
                ajax_request=true;
              __this=$(this);
              var id=__this.parent().parent().attr("id");
              var val=__this.find("input").val();
              var modul=__this.parent().attr("class");
              var cek_patern=(modul=="nama_tag")?/^\w[a-zA-Z0-9 -]{2,20}$/:/^\w[\w-]{2,50}$/;

              _dataObj={"id":id,"value":val};
              _dataObj.modul=(modul=="nama_tag")?"nama_tag":"slug_tag";
              _dataObj.aSlug=(modul=="nama_tag")?getSlug(val):"None";

              if(modul=="nama_tag"){
                if(!cek_patern.test(val)){
                   error_alert("Ilegal karakter","1. Jangan gunakan spasi di awal<br> 2. Karakter minimal 3 karakter, Max 20<br> 3. Karakter yang dijinkan hanyalah huruf, angka,underscore,garis datar dan spasi<br> 4. Field harus diisi tidak boleh kosong");
                   ajax_request=false;
                } else {
                  eksekusi(val);
                }
              } else if(modul=="slug_tag"){
                if(!cek_patern.test(val)){
                  val=getSlug(__this.parent().parent().find("span").html());                  
                }
                eksekusi(val);
              }


             



            }

            });


              function eksekusi(__val){
                _dataObj.value=__val;
                show_proses("Mengubah tag");
                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>AN_ajax_admin/edit_tag",
                  data:_dataObj,
                  cache:false,
                  success: function(a){
                    if(a=="ok"){
                      __this.find("input").hide();
                      __this.siblings("span").html(_dataObj.value).fadeIn();
                    } else {
                      error_alert("Error tidak terduga","Pesan Error: <br>"+a);
                     
                    }
                    ajax_request=false;
                    hide_proses();
                  },
                  error: function(a,b,c){
                    error_alert("Error","Periksa koneksi anda. <br> Pesan error:<br>"+c);
                    ajax_request=false;
                    hide_proses();
                  }
                });
              }

            $(document).on("click",".slug-table .hapus_tag button",function(){
              if(!ajax_request){
              var id=$(this).parent().parent().attr("id");
              konfirmasi("Hapus Tag","Anda yakin akan menghapus tag ini?",hapus_tag,id);
             }
            });

            function hapus_tag(id){
              ajax_request=true;
              show_proses("Menghapus tag");
              $.ajax({
                type:"POST",
                data:{"id":id},
                url:"<?php echo base_url() ?>AN_ajax_admin/hapus_tag",
                cache:false,
                success:function(a){
                  if(a=="ok"){                    
                        show_proses("Berhasil! Mereload halaman");
                        window.location.reload();
                  } else {
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                  }
                },
                error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                }
              });
            }


            <?php
           }
           ?>



            <?php if($npage==9){
            ?>

             $(".media-table:first").DataTable({
              aaSorting:[2,'ASC']
             });

             $(".media-table:last").DataTable({
              aaSorting:[]
             });

            $(document).on("click",".pilih",function(){
              $(this).parent().next().select();
            });
            $(document).on("focus",".area-url",function(){
              $(this).select();
            });

            var menghapusFoto=false;
            $(document).on("click",".hapus-media",function(){
              if(!menghapusFoto){
                konfirmasi("Menghapus Foto!","Yakin akan menghapus foto ini?",hapusMedia,$(this))
              }
            });

            function hapusMedia(_this){
              menghapusFoto=true;
              var mediaId=_this.attr('id');
              show_proses("Menghapus Media, tunggu sejenak...");
              $.ajax({
                type:'POST',
                url:'<?php echo base_url() ?>AN_ajax_admin/delete_media',
                data:{'id':mediaId},
                cache:false,
                success: function(a){
                  if(a=='ok'){
                    show_proses("Berhasil!,mereload halaman..");
                    window.location.reload();
                  } else {
                    error_alert("Kesalahan","Maaf terjadi kesalahan internal <br>Error:"+a)
                    menghapusFoto=false;
                    hide_proses();
                  }
                },
                error: function(a,b,c){
                  error_alert("Kesalahan","Maaf terjadi kesalahan. Cek koneksi anda <br>Error:"+c)
                    menghapusFoto=false;
                    hide_proses();
                }
              });
            }


             var menghapusPendukung=false;
            $(document).on("click",".hapus-pendukung",function(){
              if(!menghapusPendukung){
                konfirmasi("Menghapus Foto!","Yakin akan menghapus foto ini?",hapusPendukung,$(this));
              }
            });

            function hapusPendukung(_this){
              menghapusPendukung=true;
              var mediaName=_this.attr('title');
              show_proses("Menghapus Media, tunggu sejenak...");
              $.ajax({
                type:'POST',
                url:'<?php echo base_url() ?>AN_ajax_admin/delete_media_pendukung',
                data:{'nama':mediaName},
                cache:false,
                success: function(a){
                  if(a=='ok'){
                    show_proses("Berhasil!,mereload halaman..");
                    window.location.reload();
                  } else {
                    error_alert("Kesalahan","Maaf terjadi kesalahan internal <br>Error:"+a)
                    menghapusPendukung=false;
                    hide_proses();
                  }
                },
                error: function(a,b,c){
                  error_alert("Kesalahan","Maaf terjadi kesalahan. Cek koneksi anda <br>Error:"+c)
                    menghapusPendukung=false;
                    hide_proses();
                }
              });
            }

          var upload_media_pendukung=new Dropzone(".multiple-area",{
            url:"<?php echo base_url() ?>AN_ajax_admin/upload_multiple_pendukung",
            maxFilesize:2,
            method:"post",
            acceptedFiles:"image/*",
            paramName:"userfile",
            dictDefaultMessage:"Drop foto/gambar disini",
            dictInvalidFileType:"Type file ini tidak dizinkan"
          });

          upload_media_pendukung.on("processing",function(){
            console.log("Mulai Memproses");
            show_proses("Mengupload media...")
          });

          upload_media_pendukung.on("success",function(a,b){
              console.log(b);
          });

          upload_media_pendukung.on("queuecomplete",function(){
            show_proses("Upload selesai! Mereload Halaman..")
            window.location.reload();
          });




            <?php
           }
           ?>

            <?php if($npage==10){
            ?>
            $("#accordion").collapse();

            direct_upload(".favicon-select-btn","#favicon");
            direct_upload(".logo-select-btn","#logo-web");
            direct_upload(".thumbnail-sm-btn","#thumbnail_sm");
            direct_upload(".featured-image-btn","#featured-image");

            textEditor("#deskripsi",150);
            textEditor("#disclaimer",150);
            textEditor("#termcondition",150);
            textEditor("#privacy",150);

            var customCSS = CodeMirror.fromTextArea($("#custom-css")[0],{mode:"css",lineNumbers:true,theme:"3024-day"});

            $("#sleep_sampai").datepicker({
             format: "yyyy/mm/dd"
            });

            $(document).on("click","#simpan-infromasi",function(){
              if(!$(this)[0].menimpan){
              var __this=$(this);
              __this[0].menimpan=true;
              __this.text("menyimpan...");
              var namaweb=$("#nama-web").val();
              var deskripsi=tinymce.get("deskripsi").getContent();
              var favicon=$("#favicon").val();
              var logoweb=$("#logo-web").val();
              var featuredimage=$("#featured-image").val();

              var disclaimer=tinymce.get("disclaimer").getContent();
              var termcondition=tinymce.get("termcondition").getContent();
              var privacy=tinymce.get("privacy").getContent();

              var metadescription=$("#meta-description").val();
              var metakeyword=$("#meta-keyword").val();
              var thumbnail_sm=$("#thumbnail_sm").val();

              var w_artikel=$("#width-thum-art").val();
              var w_galleri=$("#width-thum-gal").val();
              var w_produk=$("#width-thum-pro").val();

              var default_title=$("#default-title").val();
              var pefix_title=$("#pefix-title").val();
              var prefix_sbg=$("#prefix-sbg").val();

              var customcss=customCSS.getValue();
              var data={nama:namaweb,
              deskripsi:deskripsi,
              favicon:favicon,
              logoweb:logoweb,
              disclaimer:disclaimer,
              termcondition:termcondition,
              privacy:privacy,
              metadescription:metadescription,
              metakeyword:metakeyword,
              thumbnail_sm:thumbnail_sm,
              customcss:customcss,
              featuredimage:featuredimage,
              thumb_art:w_artikel,
              thumb_gal:w_galleri,
              thumb_pro:w_produk,
              prefix_suffix_title:pefix_title,
              prefix_suffix_sebagai:prefix_sbg,
              default_title:default_title,
              max_populer_artikel:$("#max_populer_artikel").val(),
              max_headline_artikel:$("#max_headline_artikel").val(),
              max_tampil_artikel:$("#max_tampil_artikel").val(),
              max_headline_galeri:$("#max_headline_galeri").val(),
              max_tampil_galeri:$("#max_tampil_galeri").val(),
               max_headline_produk:$("#max_headline_produk").val(),
              max_tampil_produk:$("#max_tampil_produk").val(),

              max_tampil_agenda:$("#max_tampil_agenda").val(),
              max_tampil_agenda_umum:$("#max_tampil_agenda_umum").val(),
              max_tampil_download:$("#max_tampil_download").val(),
              max_tampil_download_umum:$("#max_tampil_download_umum").val(),



              sleep_mode:$("#sleep_mode").val(),
              sleep_sampai:$("#sleep_sampai").val()
              }

              show_proses("Mengupdate informasi...");
              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>AN_ajax_admin/simpaninformasi",
                data:data,
                cache:false,
                success:function(a){
                  if(a=="ok"){
                  show_proses("Update berhasil...");

                  setTimeout(function(){
                    hide_proses();
                  },3000);

                  } else {
                    error_alert("Kesalahan","Terjadi kesalahan<br>Error: "+a);
                  hide_proses();
                  }
                },
                error:function(a,b,c){
                  error_alert("Kesalahan","Terjadi kesalahan<br>Error: "+c);
                  hide_proses();
                },
                complete: function(){
                   __this.text("Simpan");
                  __this[0].menimpan=false;
                }
              });
              }
            });


            <?php
           } if ($npage==11){
           ?>

          direct_upload(".bio-foto-btn","#foto-bio");
          textEditor("#deskripsi-editor");

          $(document).on("click",".update-biodata",function(){
            var nama=$("#nama-bio").val();
            var fotobio=$("#foto-bio").val();
            var link_fb=$("#link-fb").val();
            var deskripsisingkat=$("#deskripsi-singkat").val();
            var deskripsi=tinymce.get("deskripsi-editor").getContent();

            show_proses("Mengupdate biodata...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/simpanbiodata",
              data:{"nama":nama,"fotobio":fotobio,"deskripsisingkat":deskripsisingkat,"deskripsi":deskripsi,"link-fb":link_fb},
              cache:false,
              success:function(a){
                  if(a=="ok"){
                  show_proses("Update berhasil!... mereload halaman..");
                  window.location.reload();
                  } else {
                    error_alert("Kesalahan","Terjadi kesalahan<br>Error: "+a);
                  hide_proses();
                  }
                },
              error:function(a,b,c){
                  error_alert("Kesalahan","Terjadi kesalahan<br>Error: "+c);
                  hide_proses();
              }
            });

          });

          <?php
           }

           if($npage==12){
           ?>           
            direct_upload(".btn-foto","#featured_image");
            textEditor("#isi_page");
            var customJS = CodeMirror.fromTextArea($("#js")[0],{mode:"javascript",lineNumbers:true,theme:"3024-day"});

            $("#judul_page").on("keyup",function(){
              var seo_url2=getSlug($(this).val());
              $("#url_page").val(seo_url2);
            });

            $(document).on("click","#save-page",function(){
              if(!ajax_request){
                ajax_request=true;
              var id_page=$("#id_page").val();
              var judul_page=$("#judul_page").val();
              var isi_page=tinymce.get("isi_page").getContent();
              var url_seo=$("#url_page").val();
              var featured_image=$("#featured_image").val();
              var status_page=$("#status_page").val();
              var keywords=$("#keywords").val();
              var description=$("#description").val();
              var js_page=customJS.getValue();

                if(!/^[\w-]+$/.test(url_seo)){
                 url_seo=getSlug(judul_page);
                }
                show_proses("Menyimpan Page...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/page",
              data:{"id":id_page,"judul":judul_page,"isi_page":isi_page,"url":url_seo,"image":featured_image,"status":status_page,"js":js_page,"keywords":keywords,"description":description},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil! Mereload halaman...");
                  window.location.reload();
                } else{
                  if(/^[\d]+$/.test(a)){
                    window.location.assign("<?php echo base_url(); ?>admin/page/"+a);

                  } else {
                    error_alert("Error","Terjadi kesalahan internal<br>Error:"+a);
                    hide_proses();
                    ajax_request=false;
                  }
                }

              },
              error:function(a,b,c){
                error_alert("Error","Terjadi kesalahan, cek koneksi anda<br> Error:"+c);
                ajax_request=false;
                hide_proses();
              }
            });

            
            $(".submit-galeri").on("click",function(){
              var _this=$(this);

              $.ajax({

              });
            });

            // error_alert("Test","id="+id_page+"<br> judul="+judul_page+"<br> isi="+isi_page+"<br> URL="+url_seo+"<br>Image="+featured_image+"<br> Status="+status_page+"<br> Js="+js_page);
              }
            });


           <?php
           } if($npage==13){
           ?>

           $(".slug-table").DataTable();

           $(document).on("focus",".area-url",function(){
              $(this).select();
            });
           $(document).on("click",".pilih-url",function(){
              $(this).parent().siblings(".area-url").select();
           });

           $(document).on("click",".hapus-page",function(){
            if(!ajax_request){
            konfirmasi("Menghapus page!","Anda yakin akan menghapus page ini?",delete_page,$(this));    
              }   
           });

           function delete_page(_this){
            ajax_request=true;
            var id_page=_this.attr("id");
            show_proses("Menghapus Page...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_page",
              data:{"id":id_page},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil! mereload halaman...");
                  window.location.reload();
                } else {
                  error_alert("Error","Internal Error<br>Error"+a);
                  hide_proses();
                  ajax_request=false;
                }

              },
              error:function(a,b,c){
                error_alert("Error","Cek koneksi anda<br>Error:"+c);
                hide_proses();
                ajax_request=false;
              }
            });
           }
          

          <?php
           }
           if($npage==14){
           ?>

           textEditor("#deskripsi-galeri");

           upload_galeri_in_progress=false;

        var foto_galeri=new Dropzone(".foto_galeri", { url:"<?php echo base_url() ?>AN_ajax_admin/foto_galeri" ,
                                                      maxFilesize: 2,
                                                      method:'post',
                                                      acceptedFiles:"image/*",
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      dictDefaultMessage:"Drop foto/gambar disini",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan gambar ini"
                                                    }); 
           
            var sesi=$(".sesi-from_galeri").val(); 
            var id_galeri=$(".id_galeri").val();

            $("#nama-galeri").on("keyup",function(){
              var seo_url_galeri=getSlug($(this).val());
              $("#seo_url").val(seo_url_galeri);
            });


            $(document).on("click",".submit-galeri",function(){
              if(!ajax_request){
              if(!upload_galeri_in_progress){
                proses_simpan(this);
              } else {
                konfirmasi("Upload sementara berlangsung!","Upload foto sementara berlangsung. Foto yang belum terupload akan dibatalkan. Yakin akan melanjutkan?",proses_simpan,this);
              }
            }
            });





            function proses_simpan(_this){
              ajax_request=true;
              var id=$(_this).attr("id");
              var nama_galeri=$("#nama-galeri").val();
              var featuredimage=$("#featured-image").val();
              var seo_url=$("#seo_url").val();
              var deskripsi_galeri=tinymce.get("deskripsi-galeri").getContent();
              var status_galeri=$("#galeri-status").val();
              var keyword_meta=$("#meta-keyword").val();
              var metadescription=$("#meta-description").val();
              var ogimage=$("#og-image").val();
              var ogdeskripsi=$("#og-deskripsi").val();
              var sesi_page=$(".sesi-from_galeri").val();
              var kategori=$("#galeri-kategori").val(); 

                if(!/^[\w-]+$/.test(seo_url)){
                 seo_url=getSlug(nama_galeri);
                }
              var tombol=new tombol_animasi($(_this));

                tombol.memproses();

              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>AN_ajax_admin/save_galeri",
                data:{"id":id,"nama":nama_galeri,"seo":seo_url,"deskripsi":deskripsi_galeri,"status":status_galeri,"meta_keyword":keyword_meta,"meta_description":metadescription,"og_image":ogimage,"og_description":ogdeskripsi,"sesi":sesi_page,"featured":featuredimage,"kategori":kategori},
                cache:false,
                success: function(a){
                  if(a=="ok"){                    
                    ajax_request=false;
                    tombol.success();
                  } else {
                    if(/^[\d]+$/.test(a)){
                    window.location.assign("<?php echo base_url() ?>admin/galeri/"+a);
                  //  ajax_request=false;
                    } else {
                      error_alert("Terjadi kesalahan","Maaf terjadi internal error.<br>Error: "+a);
                      tombol.stop();
                      ajax_request=false;
                    }
                  }
                },
                error: function(a,b,c){
                   error_alert("Terjadi kesalahan","Periksa koneksi anda.<br>Error: "+c);
                   tombol.stop();
                   ajax_request=false;
                }


              });
               // alert(nama_galeri);
            }


            direct_upload(".btn-galeri","#featured-image");
            direct_upload(".btn-og-galeri","#og-image");


            foto_galeri.on("sending",function(a,b,c){
            upload_galeri_in_progress=true;
            a.token=Math.random();
            c.append('sesi',sesi);
            c.append('token_foto',a.token);
            c.append('id',id_galeri);          
            console.log('mengirim');           
           });

         

           foto_galeri.on("removedfile",function(a){
            var tok=a.token;
            $.ajax({
              type:"POST",
              data:{"token":tok},
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_foto_galeri_temp",
              cache:false,
              success:function(a){
                console.log("delete sukses");
              },
              error: function(a,b,c){
                console.log("delete gagal, cek koneksi internet")
              }
            });
           
           });



           foto_galeri.on("queuecomplete",function(){
            upload_galeri_in_progress=false;
             <?php if($data['id']!=0){ ?>
              $(".dropzone").css("min-height","96px");
              $(".dz-message").css("display","block");
              <?php
             }
           ?>
            console.log("Semua operasi selesai");
           });


           $(document).on("click",".edit-deskripsi",function(){
            var id_area=$(this).attr("id");
            $("[class='desk-edit-wrap'][id='"+id_area+"']").slideToggle(function(event){
                $(this).find("#floatingBarsG").hide();
            });
           });

           $(document).on("click",".btn-simpan-desk",function(){
            var id1=$(this).attr("id");
            var val1=$("[class~='desk-foto-text'][id='"+id1+"']").val();
            $("[id='floatingBarsG'][class='"+id1+"']").show();
             $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/edit_deskripsi_galeri",
              data:{"id":id1,"deskripsi":val1},
              cache: false,
              success: function(a){
              if(a=="ok"){
                $("[class='desk-edit-wrap'][id='"+id1+"']").slideToggle(function(event){
                    $(this).find("#floatingBarsG").hide();
                });
                } else {
               $("[id='floatingBarsG'][class='"+id1+"']").hide();
                }
              },
              error: function(a){
                $("[id='floatingBarsG'][class='"+id1+"']").hide();

              }
             });

           });



            var grid= $('.galeri_area').isotope();
            grid.imagesLoaded().progress(function(){
              grid.isotope('layout');
             }); 


          <?php if($data['id']!=0){
          ?>

          foto_galeri.on("success",function(a,b){
            $(".dz-success").remove();
            console.log(b);
           var data_n=JSON.parse(b);

         //  var html="<div class='aPhotoThumb col-md-4 col-xs-4'><span class='label label-danger hapus_label'> menghapus... </span>  <button class='btn btn-warning btn-sm featured-tombol'>jadikan featured image</button><span class='glyphicon glyphicon-remove hapus_foto_artikel' id='"+data_n.id+"'></span><div class='hover_foto_artikel' ></div><img src='<?php echo base_url() ?>an-component/media/upload-gambar-artikel-thumbs/"+data_n.gambar+"'></div>";
        var prepGambar='<?php echo base_url()."an-component/media/upload-galeri-thumbs/"; ?>'+data_n.gambar;

      //   var elem=$("<div id='"+data_n.id+"' class='grid-item gallery-img-container'><img src='"+prepGambar+"'><span class='delete_btn_container'><span class='fa fa-times delete_btn'></span> <span class='fa fa-comment-o' data-toggle='popover' data-title='Deskripsi foto' data-placement='top' data-content='"+data_n.deskripsi+"'></span></span></div>");

      var elem=$("<div id='"+data_n.id+"' class='grid-item gallery-img-container'><img src='"+prepGambar+"'><span class='delete_btn_container'><span class='fa fa-pencil-square-o edit-deskripsi' id='"+data_n.id+"' data-toggle='tooltip' data-plecement='top' title='Ubah deskripsi'></span>&nbsp;<span class='fa fa-times delete_btn' data-toggle='tooltip' placement='top' title='Hapus foto'></span></span><div class='desk-edit-wrap' id='"+data_n.id+"'><div class='col-md-12'><div class='form-group'><textarea class='form-control desk-foto-text' id='"+data_n.id+"'>"+data_n.deskripsi+"</textarea></div><div class='form-group'><button class='btn btn-sm btn-success btn-simpan-desk' id='"+data_n.id+"'>Simpan</button><div id='floatingBarsG' class='"+data_n.id+"'><div class='blockG' id='rotateG_01'></div> <div class='blockG' id='rotateG_02'></div><div class='blockG' id='rotateG_03'></div><div class='blockG' id='rotateG_04'></div><div class='blockG' id='rotateG_05'></div><div class='blockG' id='rotateG_06'></div><div class='blockG' id='rotateG_07'></div><div class='blockG' id='rotateG_08'></div></div></div></div></div></div>");

        $(".galeri_area").prepend(elem).isotope("prepended",elem);
          grid.imagesLoaded().progress(function(){
              grid.isotope('layout');
              $(function () {
                $('[data-toggle="popover"]').popover()
              })
             }); 
           

          });

          <?php
          } ?>


           $(document).on("click",".delete_btn",function(){
              if(!ajax_request){
                konfirmasi("Menghapus foto","Anda yakin akan menghaous foto ini?",delete_galeri_foto,$(this));
              }
             });


          function delete_galeri_foto(_this){
            show_proses("Menghapus gambar... tunggu sebentar");
            var id_foto_gal=_this.parent().parent().attr("id");
            ajax_request=true;
           // alert(id);
            $.ajax({
              type:"POST",              
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_foto_galeri",
              data:{"id":id_foto_gal},
              cache: false,
              success:function(a){
                if(a=="ok"){
                  var __this=_this.parent().parent();
                  grid.isotope("remove",__this).isotope("layout");                
                  ajax_request=false;

                } else {
                  //error
                  error_alert("Kesalahan!","Terjadi internal error<br> Error: "+a);
                  ajax_request=false;
                }

                hide_proses();

              },
              error:function(a,b,c){
                error_alert("Kesalahan!","Terjadi kesalahan. Cek koneksi anda <br> Error: "+ c);
                ajax_request=false;
                hide_proses();
              }
           });
           }







          <?php
           } if ($npage==15) {
           ?>

           $(".slug-table").DataTable({
            aaSorting:[]
           });


           $(document).on("click",".hapus-galeri",function(){
            if(!ajax_request){
              konfirmasi("Menhapus galeri","Anda yakin akan menghapus galeri ini?",hapus_galeri,$(this));
            }
           });

           function hapus_galeri(_this){
            ajax_request=true;
            show_proses("Menghapus galeri... tunggu sebentar");
            var id_galeri=_this.attr("id");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_galeri",
              data:{"id":id_galeri},
              cache: false,
              success:function(a){
                if(a=="ok"){                  
            show_proses("Berhasil!... Mereload halaman");
                  window.location.reload();
                } else {
                 error_alert("Terjadi Kesalahan!","Terjadi Kesalahan tidak terduga. <br> Error:"+a);
                 ajax_request=false;
                 hide_proses();             
                }
              },
              error:function(a,b,c){
                error_alert("Terjadi Kesalahan!","Coba cek koneksi anda. <br> Error:"+c);
                ajax_request=false;
                hide_proses();
              }
            });

           }

         <?php
           } if ($npage==16){
           ?>

           
           $(document).on("click",".show-edit-menu",function(){

           if(!$(this).parent().siblings(".new-sub-menu").is(":hidden")){
            $(this).parent().siblings(".new-sub-menu").slideToggle();
           }

            $(this).parent().siblings(".detail-sett").slideToggle();
           
           });

           $(document).on("click",".add-sub-menu",function(){

            if( !$(this).parent().siblings(".detail-sett").is(":hidden")){
              $(this).parent().siblings(".detail-sett").slideToggle();
            }


            $(this).parent().siblings(".new-sub-menu").slideToggle();

            
           });

           $(document).on("click",".fa-sort-up",function(){
              $(this).parent().parent().slideToggle();
           });


           $(".custom-menu").click(function(){
              $(".custom-menu-box").slideToggle();
           });


           var jumlahMenu=$(".sort>li").length;
              console.log(jumlahMenu);

           $(".tambahkan-ke-menu ,.tambahkan-ke-menu2").click(function(event){

              var id_menu="<?php echo $id; ?>";
              var nama_menu,url_menu,code_menu,target_menu;



            
              if($(event.target).is(".tambahkan-ke-menu2")){
               nama_menu=$("#nama-menu-custom").val()
               url_menu=$("#url-menu-custom").val();
               code_menu="";
               target_menu=$("#target-menu-custom").val();
              } else {

               nama_menu=$(this).parent().attr("data-nama");
               url_menu=$(this).parent().attr("data-url");
               code_menu=$(this).parent().attr("data-code");
               target_menu="_self";

              }

            
           //   add_to_list(0,{id:100,nama:"test",code:"testCode",url:"http://test.com","target":"_blank"});

             $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>AN_ajax_admin/insert_new_menu",
                data:{"id":id_menu,"nama":nama_menu,"url":url_menu,"code":code_menu,"target":target_menu,"posisi":jumlahMenu+1},
                cache: false,
                dataType:"json",
                success: function(a){
                  add_to_list(0,a);
                  jumlahMenu++;
                },
                error: function(a,b,c){
                  console.log(a.responseText);
                  console.log(c);
                }
              });

           });


          $(document).on("click",".tombol-menu-baru",function(){
          var _tombol=$(this);
          if(!_tombol[0].memproses){
            _tombol[0].memproses=true;

          var memproses=$(" <span><span style='margin-left:5px;' class='fa fa-refresh'></span>menambah menu...</span>").insertAfter(_tombol);

          var id_parrent_menu="<?php echo $id; ?>"
          var id=_tombol.attr("id");
          var context=$("[class~='new-sub-menu'][id='"+id+"']");

          var nama_menu=context.find("#nama-menu-baru").val();
          var url_menu=context.find("#url-menu-baru").val();
          var target_menu=context.find("#target-menu-baru").val();

          $.ajax({
            type:"POST",
            url:"<?php echo base_url() ?>AN_ajax_admin/insert_new_sub_menu",
            data:{
              "parent":id_parrent_menu,
              "id":id,
              "nama":nama_menu,
              "url":url_menu,
              "target":target_menu,
              "posisi":jumlahMenu+1

            },
            cache:false,
            dataType:"json",
            success:function(a){
              memproses.remove();
              context.slideToggle();
              add_to_list(id,a);
              context.find("#nama-menu-baru").val("");
              context.find("#url-menu-baru").val("");
              context.find("#target-menu-baru").val("_self");


              jumlahMenu++;
            },
            error: function(a,b,c){
                memproses.remove();
                $(" <span style='color:red; margin-left:5px;'><span class='fa fa-times'></span>gagal</span>").insertAfter(_tombol).fadeOut(1000,function(){
                 $(this).remove();
                })

               console.log(a.responseText);
               console.log(c);
            },
            complete: function(){
              _tombol[0].memproses=false;
            }
            

          });


          }




          });


           function add_to_list(parent,newEle){
              var ULtarget=$("[class~='sort'][id='"+parent+"']");

              var _target=["_self","_blank","_parent","_top"];

              var create_target,pilih;

              _target.forEach(function(el,ind,ar){
                pilih=el==newEle.target?"selected":"";
                create_target+="<option value='"+el+"' "+pilih+">"+el+"</option>";
              });


              var content="<li id='"+newEle.id+"' data-code='"+newEle.code+"'> <div class='list-group-item-new' id='"+newEle.id+"'> <span class='fa fa-arrows-alt'></span> &nbsp;<span class='nama-menu-show'>"+newEle.nama+"</span> <span class='fa fa-exclamation-triangle menu-belum-active' data-toggle='tooltip' data-placement='top' title='menu belum aktif. Nanti akan aktif ketika tombol [update posisi] sudah di klik '></span><span class='menu-right-panel'>  <span class='link-menu-show'>"+newEle.url+" ("+newEle.target+")</span> <span class='fa fa-plus add-sub-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Tambah sub menu'></span>  <span class='fa fa-gear show-edit-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Edit menu' ></span> <span id='"+newEle.id+"' class='fa fa-close show-delete-menu right-padd-10' data-toggle='tooltip' data-placement='top' title='Delete menu' ></span> </span><div class='well new-sub-menu' id='"+newEle.id+"' > <div class='form-group'> <h5>Menambahkan Sub Menu </h5> </div><div class='form-group'> <label><small>Nama menu</small></label> <input type='text' id='nama-menu-baru' class='form-control' value=''> </div>  <div class='form-group'> <label><small>URL</small></label>  <input type='text' id='url-menu-baru' class='form-control' value=''>  </div> <div class='form-group'> <label><small>Target link</small></label><select id='target-menu-baru' class='menu-target form-control'> <option value='_self' >_self</option> <option value='_blank' >_blank</option><option value='_parent' >_parent</option><option value='_top' >_top</option>  </select> </div> <div class='form-group'><button id='"+newEle.id+"' class='btn btn-sm btn-default tombol-menu-baru'>Tambah Sub Menu</button> <span class='fa fa-sort-up' style='float:right;cursor:pointer'></span>  </div>  </div> <div class='well detail-sett' id='"+newEle.id+"'>  <div class='form-group'><label><small>nama menu</small></label> <input type='text' class='form-control' id='nama-menu' value='"+newEle.nama+"'> </div><div class='form-group'><label><small>URL</small></label> <input type='text' class='form-control' id='url-menu' value='"+newEle.url+"'></div><div class='form-group'><label><small>Target link</small></label><select class='menu-target form-control'>"+create_target+"</select></div><div class='form-group'> <button id='"+newEle.id+"'  class='btn btn-sm btn-default update-menu'>Update Menu</button> <span class='fa fa-sort-up' style='float:right;cursor:pointer'></div></div> </div><br> <ul class='sort' id='"+newEle.id+"' > <span class='nbsp'> &nbsp; </span></ul> </li>";

             
              if(parent==0){
                var scroll_to=$(".target-scroll").offset();

                $("body").animate({scrollTop:scroll_to.top-75},{
                  complete: function(){
                    $(content).hide().appendTo(ULtarget).fadeIn("slow",function(){
                
                   set_menu_list();
                 });
                    }
                  })

              } else {
                 $(content).hide().appendTo(ULtarget).fadeIn("slow",function(){
                  
                   set_menu_list();
                 });
              }

              //  $(document).sortable("destroy");

            

              
             }


      $(document).on("click",'.update-menu',function(){
        if(!$(this)[0].memproses){
        $(this)[0].memproses=true;
       // show_proses("Mengupdate Menu");
        var menu_id="<?php echo $id; ?>";
        var _this=$(this);
        var id=$(this).attr("id");
        var scope=$("[class~='detail-sett'][id='"+id+"']");
        var scope2=$("[class='list-group-item-new'][id='"+id+"']");
        var nama_menu=scope.find("input#nama-menu").val();
        var url_menu=scope.find("input#url-menu").val();
        var target_menu=scope.find("select.menu-target").val();

        var memproses=$(" <span><span style='margin-left:5px;' class='fa fa-refresh'></span>memproses...</span>").insertAfter(_this);

       

        $.ajax({
          type:"POST",
          url:"<?php echo base_url() ?>AN_ajax_admin/update_menu",
          data:{"parent_id":menu_id,"id":id,"nama":nama_menu,"url":url_menu,"target":target_menu},
          cache:false,
          success:function(a){
            if(a=="ok"){

              scope2.find("span.nama-menu-show").text(nama_menu);
              scope2.find("span.link-menu-show").text(url_menu+" ("+target_menu+")");

             
              memproses.remove();
               $(" <span style='color:green; margin-left:5px;'><span class='fa fa-check'></span>berhasil</span>").insertAfter(_this).fadeOut(1000,function(){
                 $(this).remove();
                }
              );


            } else {
              //gagal

              error_alert("Internal Error","Terjadi kesalahan tidak terduga. Silahkan coba lagi. <br> Error: "+a);


              memproses.remove();
               $(" <span style='color:red; margin-left:5px;'><span class='fa fa-times'></span>gagal</span>").insertAfter(_this).fadeOut(1000,function(){
                 $(this).remove();
                }
              );
            }
          },
          error:function(a,b,c){
            memproses.remove();
            error_alert("Terjadi Kesalahan","Cek koneksi anda. <br>Error"+c);
              $(" <span style='color:red; margin-left:5px;'><span class='fa fa-times'></span>gagal</span>").insertAfter(_this).fadeOut(1000,function(){
                 $(this).remove();
                }
              );
          },
          complete:function(){           
            _this[0].memproses=false;
          }
        });
      }
      });

      
      var menghapus_menu=false;
      $(document).on("click",".show-delete-menu",function(){

        if(!menghapus_menu){

          konfirmasi("Menghapus Menu","Menghapus menu akan menyebabkan sub menu didalamnya ikut terhapus.<br> Yakin akan melakukan ini?",hapus_menu,this);
        

        }

      });

      function hapus_menu(_this){
          menghapus_menu=true;
          show_proses("Menghapus Menu...");
          var menu="<?php echo $id; ?>";
          var _tombol=$(_this);
          var id=_tombol.attr("id");
          var menuLi=$("li#"+id+"");
          $.ajax({
            type:"POST",
            url:"<?php echo base_url('AN_ajax_admin/delete_menu_child'); ?>",
            data:{"menu":menu,"id":id},
            cache:false,
            success:function(a){

              if(a=='ok'){

              menuLi.fadeOut("slow",function(){
                $(this).remove(); 
                });

              } else {

                error_alert("Terjadi kesalahan","Terjadi Internal Error. Silahkan Coba kembali <br> Error: "+a);
              
              } 

            },
            error:function(a,b,c){

                error_alert("Terjadi kesalahan","Terjadi kesalahan. Periksan Koneksi Anda <br> Error: "+c); 
                console.log(a);

            },
            complete:function(){
              hide_proses();
              menghapus_menu=false;
            }

          });          


     

      }


      $(".update-posisi").click(function(){
        var id_menu="<?php echo $id ?>";
        var data_menu={};
        var urutan_menu={};
        var hitung=0
        $(".sort>li").each(function(){
          hitung++;
          data_menu[$(this).attr("id")]=$(this).parent().attr("id");
          urutan_menu[$(this).attr("id")]=hitung;
          
        });


        if(hitung>0){
        show_proses("Mengupdate menu...");
        $.ajax({
          type:"POST",
          url:"<?php echo base_url() ?>AN_ajax_admin/atur_menu",
          data:{"id":id_menu,"data":data_menu,"urutan":urutan_menu},
          cache: false,
          success: function(a){
            if(a=="ok"){              
              $(".menu-belum-active").remove();
              
            } else {
              error_alert("internal error","terjadi kesalahan internal <br>Error: "+a);
            }
          },
          error: function(a,b,c){
            error_alert("Terjadi kesalahan","Terjadi kesalahan. Cek koneksi internet anda. <br>Error: "+c);
          },
          complete: function(){
            hide_proses();
          }


        });
        }

        //console.log(data);
        //console.log(hitung);

      });



      set_menu_list();

      var ngeScroll=false;


     function set_menu_list() {

      $("ul.sort").sortable({
                       items: "li",
                       handle:".fa-arrows-alt",
                       placeholder:"placeholder-list",
                       connectWith:"ul.sort",
                       scroll:true,
                       sort: function(event,ui){
                          ui.item.offset({
                          top: event.pageY-20,
                          left: event.pageX-20
                           });
          
                   var bawah=$(window).height()-50,atas=50;
          
                      if(event.clientY>bawah){
                        if(!ngeScroll){                
                          $('body').animate(
                            { scrollTop:(event.pageY+150)+"px" },
                            { start: function(){
                              ngeScroll=true;
                              },
                              complete:function(){
                              ngeScroll=false;
                              },
                            duration:2000
                           }
                          ) 
                      }
                         
                      } else if (event.clientY<atas){
                        if(!ngeScroll){                
                          $('body').animate(
                            { scrollTop:(event.pageY-150)+"px" },
                            { start: function(){
                              ngeScroll=true;
                              },
                              complete:function(){
                              ngeScroll=false;
                              },
                            duration:1000
                           }
                        ) 
                      }
          
          
                          }
                        
          
                        },
                       
          
          
                        over: function(){
          
                        }
                     });

                  
                }





         $(".tambah").click(function(){
        var arr=  $(".list-group").sortable("serialize");
        console.log(arr);
         }) 
          


          <?php
           } if ($npage==17){
           ?>


           var table=$(".slug-table").DataTable({
            aaSorting:[]
           });



           $(document).on("click",".hapus-menu",function(){
            if(!ajax_request){
              
              konfirmasi("Menghapus Menu","Yakin ingin menghapus menu ini?",proses_hapus_menu,this);             

            }
             

           });


           function proses_hapus_menu(_this){
            ajax_request=true;
            show_proses("Menghapus Menu...");
            var id=$(_this).attr("id");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url('AN_ajax_admin/hapus_group_menu') ?>",
              data:{"id":id},
              cache:false,
              success: function(a){
                if(a=="ok"){
                  $("[class~='menu_tr'][id='"+id+"']").fadeOut("slow",function(){
                    table.row(this).remove().draw(false);
                   
                  });
                } else {

                 error_alert("Terjadi Kesalahan","Terjadi kesalahan Internal, silahkan coba lagi. <br> Error: "+a);                 
                }
              },
              error: function(a,b,c){
                error_alert("Terjadi Kesalahan","Terjadi kesalahan, periksa koneksi anda. <br> Error: "+c);
              },
              complete: function(a){
                ajax_request=false;
                hide_proses();
              }
            });
           }




           $(".menu-baru-btn").click(function(){
             $(".menu-baru-box").slideToggle();
           });


           $(".buat-menu-btn").click(function(){
                if(!ajax_request){
                  ajax_request=true;
                  show_proses("Menambahkan Menu baru");
                  var nama_menu=$("#nama-menu").val();
                  var code_menu=$("#code-menu").val();
                  if(!/^[\w]{5,50}$/.test(code_menu)){
                    error_alert("Ilegal karakter","Hanya angka, huruf dan underscore yang di izinkan, tanpa spasi!  Minimal 5 karakter.");
                    hide_proses();
                    ajax_request=false;

                  } else {
                    $.ajax({
                      type:"POST",
                      url:"<?php echo base_url() ?>AN_ajax_admin/cek_code_menu",
                      data: {"code":code_menu},
                      cache: false,
                      success: function(a){
                        if(a=="ok"){

                          //janjut
                          $.ajax({
                          type:"POST",
                          url:"<?php echo base_url() ?>AN_ajax_admin/menu_baru",
                          data: {"code":code_menu,"nama":nama_menu},
                          cache: false,
                          success: function(a){
                            if(/^[\d]+$/.test(a)){
                          show_proses("Berhasil... mereload halaman")
                           window.location.assign("<?php echo base_url(); ?>admin/menu/"+a);
                            } else {
                              error_alert("Kesalahan","Terjadi internal error, silahkan coba kembali <br>Error: "+a);
                              ajax_request=false;
                              hide_proses();                              
                            }
                          },
                          error: function(a,b,c){
                              error_alert("Kesalahan","Terjadi kesalahan, Cek koneksi anda <br>Error: "+c);
                              ajax_request=false;
                              hide_proses();
                              console.log(a);
                          }

                          });

                        } else if(a=="taken"){
                          error_alert("Code sudah digunakan","Silahkan pakai code lain");
                          ajax_request=false;
                          hide_proses()
                        } else {
                          error_alert("Kesalahan","Terjadi internal error, silahkan coba kembali <br>Error: "+a);
                          ajax_request=false;
                          hide_proses();
                        }
                      }, 
                      error: function(a,b,c){
                          error_alert("Kesalahan","Terjadi kesalahan, Cek koneksi anda <br>Error: "+c);
                          ajax_request=false;
                          hide_proses();
                      }

                    });
                  }
               }
             });


          <?php
           }  if ($npage==18){
           ?>

           $(".btn-new-kategori").click(function(){
              $(".new-kategori").show().focus();
           });

           $(".new-kategori").on("keydown blur focusout",function(evt){

             var _this=$(this);
              if(evt.type=="keydown"){
                
                  if(evt.keyCode== 13 ){                     
                     if(!_this[0].menyimpan){

                       _this[0].menyimpan=true; 
                       
                       if(!/^[\s]+$/.test(nama=$(this).val()) && nama!=""){
                        
                        $.ajax({
                          type: "POST",
                          data:{"nama":nama},
                          cache:false,
                          dataType: "json",
                          url:"<?php echo base_url('AN_ajax_admin/new_kategori_galeri') ?>",
                          success:function(a){
                            _this.hide().val();
                            var ele="<li class='list-group-item' data-id='"+a.id+"'><span data-toggle='tooltip' data-placement='top' title='Klik untuk mengedit' data-id='"+a.id+"' class='kategori-nama-wrap' >"+a.nama+"</span><input data-toggle='tooltip' data-placement='right' title='Tekan ENTER untuk save' data-id='"+a.id+"'  type='text' class='kategori-nama' value='"+a.nama+"' style='display:none'/><i class='fa fa-close delete-kategori' style='margin-left:15px;float:right;color:red;cursor:pointer' data-id='"+a.id+"'></i><i data-id='"+a.id+"' class='fa fa-eye disable-kategori'></i> </li>";

                            $(ele).hide().prependTo(".group-kategori").fadeIn("slow");

                          },
                          error:function(a,b,c){
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                          },
                          complete:function(){
                            _this[0].menyimpan=false;
                          }
                        });

                       } else {
                         _this[0].menyimpan=false;
                       }
                                         
                     }

                    
                  }
              } else if(evt.type=="blur" || evt.type=="focusout"){
                $(this).hide().val("");              
              }
            
           });


           $(document).on("keydown",".kategori-nama",function(evt){
            //alert(evt.keyCode);
             var _this=$(this);
              if(evt.keyCode== 13 ){    
     
                 evt.preventDefault();

                if(!_this[0].hai){
                  _this[0].hai=true;
                  var id=_this.attr("data-id");
                  var nama=_this.val();

                 $.ajax({

                  type:"POST",
                  data:{"id":id,"nama":(/^[\s]+$/.test(nama) || nama=='')?'[error]':nama},
                  url:"<?php echo base_url('AN_ajax_admin/edit_kategori_galeri/nama') ?>",
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                     _this.hide();
                     $("[class~='kategori-nama-wrap'][data-id='"+id+"']").text(nama).show();
                    } else if(a=="fail"){
                      error_alert("Tidak boleh kosong","Halaman akan direload dalam 3 detik");
                     } else {
                      console.log("ERROR: "+a);
                    }
                  },
                  error:function(a,b,c){
                     console.log("ERROR: "+c);
                  }, 
                  complete:function(){
                    _this[0].hai=false;
                  }

                 });


                }
                 
              }
             
           });

            $(document).on("click",".kategori-nama-wrap",function(evt){
              var id=$(this).attr("data-id");

                  $(this).hide();
                  $("[class~='kategori-nama'][data-id='"+id+"']").show().focus();

            });


            $(document).on("click",".delete-kategori",function(){
              konfirmasi("Hapus ketegori","Yakin akan menghapus Kategori ini?",hapus_kategori,$(this));
            });


            function hapus_kategori(_this){
              var id=_this.attr("data-id");
              $.ajax({
                type:"POST",
                data:{"id":id},
                url:"<?php echo base_url('AN_ajax_admin/edit_kategori_galeri/hapus') ?>",
                cache:false,
                success:function(a){
                  if(a=="ok"){
                    $("li[class~='list-group-item'][data-id='"+id+"']").remove();
                  } else {
                    console.log("ERROR (SERVER RESPONSE): "+a);
                  }
                },
                error:function(a,b,c){
                   console.log("ERROR : Cek koneksi internet anda");
                   console.log("ERROR : "+c);
                }
              });
            }


            $(document).on("click",".disable-kategori, .enable-kategori",function(){
              if(!$(this)[0].updating){

              $(this)[0].updating=true;
             var _this=$(this);
             var id=_this.attr("data-id");

             var modul=_this.is("[class~='disable-kategori']")?"disable":"enable";

             $.ajax({
              type:"POST",
              data:{"id":id},
              cache:false,
              url:"<?php echo base_url().'AN_ajax_admin/edit_kategori_galeri/' ?>"+modul,
              success:function(a){
                if(a=="ok"){
                  _this.toggleClass("enable-kategori disable-kategori");
                } else {
                   console.log("ERROR (SERVER RESPONSE): "+a);
                }
              },
              error:function(a,b,c){
                console.log("ERROR : Cek koneksi internet anda");
                console.log("ERROR : "+c);
              },
              complete:function(){
                _this[0].updating=false;
              }
             });

           //   
            }
            })
          

          <?php
           } if($npage==19){
           ?>

           $(".btn-new-kategori").click(function(){
              $(".new-kategori").show().focus();
           });



           $(document).on("keydown focusout",".new-kategori , .kategori-baru-field",function(evt){
              kategori_baru($(this),evt);            
           });

           $(document).on("click",".sub-kategori-toggle",function(){
              var id=$(this).attr("data-id");
              $("[class~='kategori-baru-field'][data-id~='"+id+"']").show().focus();
           });


           $(document).on("click",".fa-eye",function(){
              aktif_toggle_kategori($(this));

           });


           function aktif_toggle_kategori(_this){
              if(!_this[0].memproses){
                _this[0].memproses=true;
                var modul=_this.is("[class~='disable-kategori']")?"disable":"enable";
                var id=_this.attr("data-id");

                var siapin=_this.is("[class~='disable-kategori']")?"enable-kategori":"disable-kategori";

                $.ajax({
                  type:"POST",
                  data:{"id":id,"modul":modul,"context":"update"},
                  url:"<?php echo base_url('AN_ajax_admin/aktif_kategori_produk'); ?>",
                  cache:false,
                  dataType:"json",
                  success:function(a){
                    $.each(a,function(i,v){

                      if(!$("[class~='fa-eye'][data-id='"+v+"']").is("[class~='"+siapin+"']")){
                     $("[class~='fa-eye'][data-id='"+v+"']").toggleClass("disable-kategori enable-kategori");

                      }


                    })
                  },
                  error:function(a,b,c){
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                  },
                  complete:function(){
                    _this[0].memproses=false;
                  }

                });

              }
           }


        $(document).on("click",".hapus-kategori-produk",function(){
          konfirmasi("Menghapus Kategori","Mengapus kategori akan menyebabkan sub kategori ikut terhapus. Yakin akan menghapus?",delete_kategori,$(this));
        });          


           function delete_kategori(_this){
              if(!_this[0].memproses){
                _this[0].memproses=true;

                var id=_this.attr("data-id");

                $.ajax({
                  type:"POST",
                  data:{"id":id,"context":"delete"},
                  url:"<?php echo base_url('AN_ajax_admin/aktif_kategori_produk'); ?>",
                  cache:false,
                  dataType:"json",
                  success:function(a){
                      $("li[data-id~='"+id+"']").hide(600,function(){
                        $(this).remove();
                      })
                  },
                  error:function(a,b,c){
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                  },
                  complete:function(){
                    _this[0].memproses=false;
                  }

                });

              }
           }





            function kategori_baru(_this,evt){
              console.log(_this[0])
             if(evt.type=="keydown"){
                  var id=_this.attr("data-id");
                  if(evt.keyCode== 13 ){                     
                     if(!_this[0].menyimpan){

                       _this[0].menyimpan=true; 
                       
                       if(!/^[\s]+$/.test(nama=_this.val()) && nama!=""){
                        
                        $.ajax({
                          type: "POST",
                          data:{"nama":nama,"parent":id},
                          cache:false,
                          dataType: "json",
                          url:"<?php echo base_url('AN_ajax_admin/new_kategori_produk') ?>",
                          success:function(a){
                            _this.hide().val();

                          var akt=a.aktif=="Y"?"disable-kategori":"enable-kategori";

                            var ele="";

       ele+="<li data-id='"+a.id+"' >";
        ele+="<div class='panel-kat'>";
        ele+="<span class='nama-kategori' data-id='"+a.id+"' data-toggle='tooltip' data-placement='top' title='Klik untuk mengedit' >";
        ele+=a.nama;
        ele+="</span>";
        ele+="<input type='text' class='nama-kategori-field' data-id='"+a.id+"' value='"+a.nama+"' data-toggle='tooltip' data-placement='right' title='Tekan ENTER untuk simpan'>";
        ele+="<span class='panel-edit'>";
        ele+="<input type='text' data-id='"+a.id+"' class='kategori-baru-field' >";
        ele+="<i data-id='"+a.id+"' class='fa fa-plus sub-kategori-toggle' data-toggle='tooltip' data-placement='top' title='Sub kategori baru'></i>";
        ele+="<i data-id='"+a.id+"' class='fa fa-tasks' data-toggle='tooltip' data-placement='top' title='Atur spesifikasi'></i>";
        ele+="<i data-id='"+a.id+"' class='fa fa-eye "+akt+"' data-toggle='tooltip' data-placement='top' title='Aktif/nonaktif kategori'></i>";
        ele+="<i data-id='"+a.id+"' class='fa fa-close hapus-kategori-produk' data-toggle='tooltip' data-placement='top' title='Hapus kategori'></i>";
        ele+="</span>";
        ele+="</div>";
        ele+="<ul data-id='"+a.id+"' class='konten-list' >";
        ele+="</ul>";
        ele+="</li>";


          $(ele).hide().prependTo("ul[class~='konten-list'][data-id='"+a.parent+"']").fadeIn("slow");
          _this.hide().val("");
                          },
                          error:function(a,b,c){
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                          },
                          complete:function(){
                            _this[0].menyimpan=false;
                          }
                        });

                       } else {
                         _this[0].menyimpan=false;
                       }
                                         
                     }

                    
                  }
              } else if(evt.type=="focusout"){
                _this.hide().val("");  
                          
              }              
            }


           $(document).on("click",".nama-kategori",function(){
            var id=$(this).attr("data-id");
            var nama=$(this).text();
            $(this).hide();
            $("[class~='nama-kategori-field'][data-id~='"+id+"']").val(nama).show().focus();
           }); 


          $(document).on("keydown",".nama-kategori-field",function(evt){
            kategori_update($(this),evt);
          });    

            function kategori_update(_this,evt){            
                  var id=_this.attr("data-id");
                  if(evt.keyCode== 13 ){                   
                     if(!_this[0].menyimpan){
                       _this[0].menyimpan=true;
                       if(!/^[\s]+$/.test(nama=_this.val()) && nama!=""){  
                        $.ajax({
                          type: "POST",
                          data:{"nama":nama,"id":id},
                          cache:false,
                          dataType: "json",
                          url:"<?php echo base_url('AN_ajax_admin/update_kategori_produk') ?>",
                          success:function(a){
                            _this.hide().val("");
                            $("[class~='nama-kategori'][data-id~='"+id+"']").text(a.nama).show();
                          },
                          error:function(a,b,c){
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                          },
                          complete:function(){
                            _this[0].menyimpan=false;
                          }
                        });
                       } else {
                         _this[0].menyimpan=false;
                       }     
                     }                    
                  }                        
            }


         <?php
           } if($npage==20){
           ?>


            direct_upload(".pilih-banner","#gambar-banner");

            $(".add-banner-baru").click(function(){
                $(".form-banner-baru").slideToggle();
            });


            $(".banner-baru").click(function(){
              _this=$(this);
              if(!_this[0].menyimpan){
                _this[0].menyimpan=true;
                show_proses("Menambahkan Banner");
                var data={
                  "gambar":$("#gambar-banner").val(),
                  "header":$("#header-banner").val(),
                  "caption":$("#header-caption").val(),
                  "link":$("#link-banner").val(),
                  "text":$("#link-text").val()
                }

                $.ajax({
                  type:"POST",
                  data:data,
                  url: "<?php echo base_url('AN_ajax_admin/new_banner_depan') ?>",
                  cache: false,
                  dataType: "json",
                  success:function(a){
                    $(".form-banner-baru").slideToggle();
                    $(".form-banner-baru").find("input").each(function(){
                      $(this).val("");
                    });
                    $(".form-banner-baru").find("textarea").val("");

            var ele="";
            ele+= "<tr data-id='"+a.id+"'>";
            ele+= "<td>";
            ele+= "<span class='banner-header-name editable-span' data-id='"+a.id+"' >"+a.header+"</span>";
            ele+= "<input type='text' data-id='"+a.id+"' value='"+a.header+"' class='form-control banner-header-field sembunyi' />";
            ele+= "</td>";

            ele+= "<td>";
            ele+= "<span class='banner-caption-name editable-span' data-id='"+a.id+"'>"+a.caption+"</span>";
            ele+= "<input type='text'  data-id='"+a.id+"' value='"+a.caption+"' class='form-control banner-caption-field sembunyi' />";
            ele+= "</td>";

            ele+= "<td>";
            ele+= "<span class='banner-link-name editable-span' data-id='"+a.id+"'>"+a.link_href+"</span>";
            ele+= "<input type='text' data-id='"+a.id+"' value='"+a.link_href+"' class='form-control banner-link-field sembunyi' />";
            ele+= "</td>";

            ele+= "<td>";
            ele+= "<span class='banner-link-text-name editable-span' data-id='"+a.id+"'>"+a.link_text+" </span>";
            ele+= "<input type='text' data-id='"+a.id+"' value='"+a.link_text+"' class='form-control banner-link-text-field sembunyi' />";
            ele+= "</td>";

            ele+= "<td>";
            ele+= "<span class='banner-gambar-name editable-span' data-id='"+a.id+"'>"+a.gambar+" </span>";
            ele+= "<div class='wrap-group sembunyi' data-id='"+a.id+"'><div class='input-group'><input type='text' data-id='"+a.id+"' value='"+a.gambar+"' class='form-control banner-gambar-field' id='target-field-gambar-"+a.id+"' data-toggle='tooltip' data-placement='top' title='tekan ENTER untuk menyimpan' /><span class='input-group-addon btn btn-primary tombol-pilih-gambar' data-select='' data-id='"+a.id+"'>pilih</span></div></div>";
            ele+= "</td>";

            ele+= "<td>";
            ele+= "<i class='fa hapus-banner fa-close hapus-icon' data-id='"+a.id+"'></i>";
            ele+= "</td>";     

            ele+= "</tr>";

            var elem=$(ele).hide().prependTo(".body-table-banner").fadeIn(2000);

            var tombol=elem.find(".tombol-pilih-gambar");
            direct_upload_dinamis(tombol);

                    console.log(a);
                  },
                  error:function(a,b,c){
                    error_alert("Terjadi kesalahan","Cek koneksi anda atau periksa Console untuk melihat error.<br> Silahkan coba lagi");                    
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                  },
                  complete:function(){
                    hide_proses();
                    _this[0].menyimpan=false;
                  }
                })


              }
            });


            $(".tombol-pilih-gambar").each(function(){
              direct_upload_dinamis($(this));
            });


            $(document).on("click",".banner-header-name, .banner-caption-name, .banner-link-name, .banner-link-text-name, .banner-gambar-name ",function(e){
              var id=$(this).attr("data-id");
              var target=$(e.target);
              target.hide();
              if(target.is('.banner-gambar-name')){
                target.siblings("[class~='wrap-group'][data-id~='"+id+"']").show().focus();
              } else {
                target.siblings("input[data-id~='"+id+"']").show().focus();
              }
            });

            $(document).on("keydown",".banner-header-field, .banner-caption-field, .banner-link-field, .banner-link-text-field, .banner-gambar-field",function(e){
                var target=$(e.target);
                var id=target.attr("data-id");
                if(e.keyCode==13){
                  if(!target[0].menyimpan){
                    target[0].menyimpan=true;
                    var val=target.val();
                    var data={"id":id,"nilai":val};
                    if(target.is(".banner-header-field")){
                      data.modul="banner-header-field";
                    } else if(target.is(".banner-caption-field")){
                      data.modul="banner-caption-field";
                    } else if(target.is(".banner-link-field")){
                      data.modul="banner-link-field";
                    } else if(target.is(".banner-link-text-field")){
                      data.modul="banner-link-text-field";
                    } else if(target.is(".banner-gambar-field")){
                      data.modul="banner-gambar-field";
                    }

                    $.ajax({
                      type:"post",
                      data:data,
                      dataType:"json",
                      url:"<?php echo base_url('AN_ajax_admin/update_banner_depan') ?>",
                      cache:false,
                      success:function(a){
                        target.val(a.val);
                        if(target.is(".banner-gambar-field")){
                          var parent=$("[class~='wrap-group'][data-id='"+id+"']");
                          parent.hide();
                          parent.siblings("span[class~='banner-gambar-name'][data-id='"+id+"']").text(a.val).show();

                        } else {
                          target.hide();
                          target.siblings("span[class~='editable-span'][data-id='"+id+"']").text(a.val).show(); 
                        }
                      },
                      error:function(a,b,c){
                        error_alert("Terjadi kesalahan","Cek koneksi anda atau periksa Console untuk melihat error.<br> Silahkan coba lagi");                    
                         console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                         console.log("ERROR: "+b);
                         console.log("ERROR: "+c);
                      },
                      complete:function(){
                        target[0].menyimpan=false;
                      }
                    });

                  }
                }

            });

            $(document).on("click",".hapus-banner",function(){
              if(!$(this)[0].menghapus){
                konfirmasi("Hapus Banner","Yakin akan menghapus banner ini?",hapus_banner,$(this));
              }
            });

            function hapus_banner(_this){
              _this[0].menghapus=true;
              var id=_this.attr("data-id");
              $.ajax({
                type:"post",
                data:{id:id},
                url:"<?php echo base_url('AN_ajax_admin/delete_banner_depan')  ?>",
                dataType:"json",
                cache:false,
                success: function(a){
                  $(".body-table-banner tr[data-id='"+id+"']").fadeOut("slow",function(){
                    $(this).remove();
                  })
                },
                error: function(a,b,c){
                        error_alert("Terjadi kesalahan","Cek koneksi anda atau periksa Console untuk melihat error.<br> Silahkan coba lagi");                    
                         console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                         console.log("ERROR: "+b);
                         console.log("ERROR: "+c);                  
                },

                complete: function(){
                  _this[0].menghapus=false;
                }
              });
            }

           <?php
           }  
           if ($npage==21){
           ?>

           $(".tambah-berita").click(function(){
            var _this=$(this);
            if(!_this[0].menambahkan){
              _this[0].menambahkan=true;

              var berita=$('#berita-ticker').val();
              var link=$('#link-ticker').val();

              show_proses("Menambahkan news ticker...")

              $.ajax({
                type:"POST",
                data:{berita:berita,link:link},
                url:"<?php echo base_url('AN_ajax_admin/news_ticker') ?>",
                cache:false,
                dataType: 'json',
                success:function(a){

    var ele='';
    ele += "<tr data-id='"+a.id+"'>";
    ele += "<th class='nomor'>1</th>";
    ele += "<td> <span class='berita-text editable-span' data-id='"+a.id+"'>"+a.berita+"</span>";
    ele += "<input type='text' class='form-control form-berita sembunyi' data-id='"+a.id+"' value='"+a.berita+"' />";
    ele += "</td>"; 
    ele += "<td> <span class='link-text editable-span' data-id='"+a.id+"'>"+a.link+"</span>";
    ele += "<input type='text' class='form-control form-link sembunyi' data-id='"+a.id+"' value='"+a.link+"' />";
    ele += "</td>";
    ele += "<td><i class='fa hapus-news fa-close hapus-icon' data-id='"+a.id+"'></i></td>";
    ele += "</tr>";                
    
    var elem=$(ele).hide().prependTo('.body-table-berita').show(1000);

      $('#berita-ticker').val('');
      $('#link-ticker').val('');

    urutkan_nomor('.nomor');
                },
                error:function(a,b,c){
                        error_alert("Terjadi kesalahan","Cek koneksi anda atau periksa Console untuk melihat error.<br> Silahkan coba lagi");                    
                         console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                         console.log("ERROR: "+b);
                         console.log("ERROR: "+c);
                    },
                complete:function(){
                  hide_proses();
                  _this[0].menambahkan=false;

                }
              }); 
            }
           });


  $(document).on("click",".berita-text, .link-text",function(e){
    var target=$(e.target);
    var id=target.attr('data-id');
    target.hide();
    if(target.is(".berita-text")){
      $("input[class~='form-berita'][data-id='"+id+"']").show().focus();
    } else if (target.is(".link-text")){
      $("input[class~='form-link'][data-id='"+id+"']").show().focus();

    }
  });



  $(document).on("keydown",".form-berita , .form-link",function(e){
       var target=$(e.target);

       if(e.keyCode==13){
          if(!target[0].menyimpan){
            target[0].menyimpan=true;
          var id=target.attr('data-id'); 
          var vall=target.val();
          var data={id:id,nilai:vall};

            if(target.is(".form-berita")){
              data.modul="berita";

            } else if (target.is(".form-link")){
              data.modul="link";

            }

            $.ajax({
              type:"POST",
              data:data,
              url:"<?php echo base_url('AN_ajax_admin/update_news_ticker'); ?>",
              cache:false,
              dataType: 'json',
              success: function(a){

              target.val(a.value).hide();

             if(target.is(".form-berita")){
              
              $("span[class~='berita-text'][data-id='"+id+"']").text(a.value).show();

              } else if (target.is(".form-link")){

              $("span[class~='link-text'][data-id='"+id+"']").text(a.value).show();

              }
               

              },
              error: function(a,b,c){
                        error_alert("Terjadi kesalahan","Cek koneksi anda atau periksa Console untuk melihat error.<br> Silahkan coba lagi");                    
                         console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                         console.log("ERROR: "+b);
                         console.log("ERROR: "+c);
              },
              complete: function(){
                target[0].menyimpan=false;
              }

            });

          }
       } 

 


  });


  $(document).on("click",".hapus-news",function(){
    var _this=$(this);
    if(!_this[0].menghapus){
     konfirmasi("Hapus news ticker","yakin akan menghapus?",hapus_news_ticker,_this);
    }
  });


  function hapus_news_ticker(_this){
    _this[0].menghapus=true;
    var id=_this.attr("data-id");
    $.ajax({
      type:"post",
      data:{id:id},
      url:"<?php echo base_url('AN_ajax_admin/delete_news_ticker'); ?>",
      cache:false,
      dataType: 'json',
      success : function(){
        $("tr[data-id='"+id+"']").fadeOut("slow",function(){
          $(this).remove();
          urutkan_nomor(".nomor");
        });
      },
      error: function(a,b,c){
                        error_alert("Terjadi kesalahan","Cek koneksi anda atau periksa Console untuk melihat error.<br> Silahkan coba lagi");                    
                         console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                         console.log("ERROR: "+b);
                         console.log("ERROR: "+c);
      },
      complete: function(){
        _this[0].menghapus=false;

      }
    });
  }



           <?php
           }   if ($npage==22){ 
           ?>


            var googleAnalitycs = CodeMirror.fromTextArea($("#google-analytics")[0],{mode:"javascript",lineNumbers:true,theme:"3024-day"});

           $("form.pihak_ketiga").submit(function(e){
            e.preventDefault();
            _this=$(this);
            if(!_this[0].menyimpan){
              _this[0].menyimpan=true;
              show_proses('Menyimpan...');
              var data=_this.serialize();
              data+="&script_google_analytics="+googleAnalitycs.getValue();

              //console.log(data);


              $.ajax({

                type:"POST",
                data:data,
                url:_this.attr('action'),
                cache: false,
                success:function(a){
                  if(a=='ok'){
                    show_proses("Berhasil!");
                    setTimeout(() => {
                      hide_proses();
                      _this[0].menyimpan=false;
                    }, 2000);
                  } else {
                  error_alert("Internal Error","Terjadi kesalahan tidak terduga<br>Pesan Error:<br>"+a);
                  _this[0].menyimpan=false;
                  }
                },
                error:function(a,b,c){

                  error_alert("Error","Harap cek koneksi internet anda<br>Pesan Error:<br>"+c);
                  _this[0].menyimpan=false;
                },
                complete:function(){
                  
                 // console.log(data);
                }

              });

            }
           });




           <?php
           }   if($npage==23){
           ?>

              $(".table-kontak").DataTable({
              aaSorting:[]
             })


              $(document).on("click",".lihat-pesan",function(){
                var _this=$(this);
                var id=_this.attr("data-id");
                var modal=$("#pesanModal");

                modal.find(".nama,.email,.tanggal,.pesan").html("");


                modal.find(".overlay").show();

                modal.modal("show");

                $.ajax({

                  type:"POST",
                  data:{id:id},
                  url:"<?php echo base_url('AN_ajax_admin/baca_inbox'); ?>",
                  cache:false,
                  dataType:"json",
                  success: function(a){
                    modal.find(".overlay").hide();
                    modal.find(".nama").html(a.nama);
                    modal.find(".email").html(a.email);
                    modal.find(".tanggal").html(a.tanggal);
                    modal.find(".pesan").html(a.pesan);
                    modal.find(".balas-pesan").attr("href","<?php echo base_url('admin/reply') ?>/"+id);
                    modal.find(".tombol-hapus-pesan").attr("data-id",a.id);
                    $(".table-kontak").find("tr[data-id='"+a.id+"']").css("font-weight","normal");
                  },
                  error: function(a,b,c){
                    error_alert("Error","Terjadi Kesalahan! Harap cek console");
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                     modal.modal("hide");
                  },
                  complete: function(){

                  }


                });


              });

              $(document).on("click",".hapus-pesan,.tombol-hapus-pesan",function(){
                    var id=$(this).attr("data-id");
                    konfirmasi("Hapus Pesan","Yakin akan menghapus pesan ini?",hapus_pesan,id);
              });

              function hapus_pesan(id){  
                var id=id;              
                $("#pesanModal").modal("hide");
                $.ajax({
                  type:"POST",
                  data:{id:id},
                  url:"<?php echo base_url('AN_ajax_admin/hapus_pesan'); ?>",
                  cache: false,
                  dataType:"json",
                  success: function(a){

                    $(".table-kontak").find("tr[data-id='"+id+"']").hide("slow",function(){
                        $(this).remove();
                    });                 
                  },
                  error: function(a,b,c){
                    error_alert("Error","Terjadi Kesalahan! Harap cek console");
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                  },
                  complete: function(){

                  }
                });
              }

           <?php
           } if($npage==24){
           ?>

            $(".distribusikan").click(function(){
              _this=$(this);

              if(!_this[0].memproses){
                _this[0].memproses=true;
                _this.html("memproses...");
                var tema=$("#tema").val();
                var versi=$(".versi").val();
                var gm=$(".gambar").val();
                var author=$(".author-tema").val();
                var web=$(".author-web").val();
                if(tema>0 && versi>=1 && gm!=""){

                  var formdata= new FormData();
                  formdata.append("userfile",$(".gambar")[0].files[0]);
                  formdata.append("tema",tema);
                  formdata.append("versi",versi);
                  formdata.append("author",author);
                  formdata.append("web",web);

                  $.ajax({
                    type:"POST",                    
                    data:formdata,
                    url:"<?php echo base_url('AN_ajax_admin/distribusi_tema'); ?>",
                    dataType:"json",
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(a){
                      $("#tema").val("0");
                      $(".versi").val("1.0");
                      $(".gambar").val("");
                      $(".author-tema").val("");
                      $(".author-web").val("");
                      $(".zip-link").attr("href",a.link).show("slow");
                      


                    },
                    error: function(a,b,c){
                    error_alert("Error","Terjadi Kesalahan! Harap cek console");
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                    },
                    complete: function(){
                      _this[0].memproses=false;
                      _this.html("Distribusikan");
                    }
                  });

                } else {
                  error_alert("Kesalahan","Pastikan tema sudah terpilih , masukan versi minimal 1, dan upload screenshot");
                  _this[0].memproses=false;
                   _this.html("Distribusikan");
                }
              }
            });


            $(".tombol-tema-baru").click(function(){
              _this=$(this);
              if(!_this[0].memproses){

              var nama=$(".nama_tema_baru").val();
              if(/^[\w-]{4,100}$/.test(nama)){
                  _this[0].memproses=true;
                  _this.html("Memproses...");

                  $.ajax({
                    type:"POST",
                    data:{nama:nama},
                    url:"<?php echo base_url('AN_ajax_admin/tema_baru') ?>",
                    dataType: "json",
                    cache: false,
                    success: function(a){
                      if(a.status=="error"){
                        error_alert("Error",a.pesan);
                      } 
                      else {
                      $(".nama_tema_baru").val("");
                      $(".pemberitahuan").html("<div class='alert alert-success'>"+a.pesan+"</div>");
                      }

                    },
                    error: function(a,b,c){
                          error_alert("Error","Terjadi Kesalahan! Harap cek console");
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                    },
                    complete: function(){
                      _this[0].memproses=false;
                      _this.html("Buat Tema");
                    }

                  });
              } else {
               error_alert("Karakter tidak dijinkan","1. Jangan ada spasi. Termasuk diawal dan akhir nama. <br/> 2. Karakter yang dijinkan hanyalah huruf,angka,underscore,dan hyphen. <br> 3. Minimum 7 karakter");
              }               
              }


            });

          


           <?php
           }  if($npage==25){
           ?>

          $(".aktifkan-tema").click(function(){
            var _this=$(this);
            var id=_this.attr("data-id");
            show_proses("mengaktifkan Tema....")
            $.ajax({
              type:"POST",
              data:{id:id},
              dataType: "json",
              url: "<?php echo base_url('AN_ajax_admin/aktifkan_tema') ?>",
              cache: false,
              success: function(a){
                if(a.status=="error"){
                  hide_proses()
                  error_alert("Error",a.pesan);
                } else {
                  show_proses("Berhasil!... Sedang mereload halaman");
                  window.location.reload();
                }
              },
              error: function(a,b,c){
                hide_proses()
                        error_alert("Error","Terjadi Kesalahan! Harap cek console");
                         console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                         console.log("ERROR: "+b);
                         console.log("ERROR: "+c);
              },
            });

          });


    $(".hapus-tema").click(function(){
      var _this=$(this);
      konfirmasi("Hapus Tema","Yakin Akan Mengapus Tema ini?",hapus_tema,_this);


    });


    function hapus_tema(_this){ 
      show_proses("Menghapus tema");
      var id=_this.attr("data-id");
      $.ajax({
        type: "post",
        data:{id:id},
        dataType: "json",
        url: "<?php  echo base_url('AN_ajax_admin/hapus_tema') ?>",
        cache:false,
        success: function(a){
          if(a.status=="error"){
            error_alert("Error",a.pesan);
            hide_proses()
          } else {
            show_proses("Berhasil! Mereload halaman...");
            window.location.reload();
          }
        },
        error: function(a,b,c){
          hide_proses();
                error_alert("Error","Terjadi Kesalahan! Harap cek console");
                console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                console.log("ERROR: "+b);
                console.log("ERROR: "+c);
              },
      });

    }

    $("#upload-tema-tombol").click(function(){
        $(this).hide();
        $("#upload-tema-container").slideToggle();
    });

    $(".upload-aksi-zip").click(function(){
        var _this=$(this);
        if(!_this[0].mengupload){
          _this[0].mengupload=true;
          var file=$("#tema-zip")[0].files[0];

          if(file){
            show_proses("Sedang menginstal tema baru");
            var data=new FormData();
            data.append("userfile",file);
            _this.html("Menginstal...");

            $.ajax({
              type:"post",
              data:data,
              url:"<?php echo base_url('AN_ajax_admin/upload_tema_baru'); ?>",
              dataType: "json",
              cache: false,
              processData: false,
              contentType: false,
              success: function(a){
                if(a.status=="error"){
                  error_alert("Error",a.pesan);
                  _this[0].mengupload=false;
                  hide_proses();
                  _this.html("Upload");

                } else {
                  
                  _this.html("Berhasil!");
                  show_proses("Tema berhasil teinstal! Halaman akan di reload dalam 5 detik");

                  window.setTimeout(function(){
                    window.location.reload();
                  },5000);

                }
              },
              error: function(a,b,c){
                error_alert("Error","Terjadi Kesalahan! <br>"+a.responseText);
                console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                console.log("ERROR: "+b);
                console.log("ERROR: "+c);   
                _this[0].mengupload=false; 
                  _this.html("Upload");                
                hide_proses();            
              }
            });

          } else {
            error_alert("Opz","Kamu belum memilih file");
          _this[0].mengupload=false;
          }
        }
    });



           <?php
           } if($npage==26){
           ?>

           direct_upload(".agenda-foto-btn","#agenda-foto");
           textEditor("#deskripsi-editor");

           $("#tanggal-mulai").datepicker({
            format: "yyyy/mm/dd"
           });
           $("#tanggal-selesai").datepicker({
            format: "yyyy/mm/dd"
           });


           $(".update-agenda").click(function(){
              var _this=$(this);
              if(!_this[0].memproses){
                _this[0].memproses=true;

                show_proses("Memproses agenda...");

                var id=_this.attr("data-id");
                var judul=$("#agenda-judul").val();
                var foto=$("#agenda-foto").val();
                var deskripsi=tinymce.get("deskripsi-editor").getContent();
                var tanggal_mulai=$("#tanggal-mulai").val()
                var tanggal_selesai=$("#tanggal-selesai").val()


                $.ajax({
                  type:"post",
                  url:"<?php echo base_url('AN_ajax_admin/input_agenda') ?>",
                  data:{
                    id:id,
                    judul:judul,
                    foto:foto,
                    deskripsi:deskripsi,
                    tanggal_mulai:tanggal_mulai,
                    tanggal_selesai:tanggal_selesai
                  },
                  cache: false,
                  dataType:"json",
                  success: function(a){
                      show_proses("Proses Berhasil!")

                    if(a.status=="baru"){
                      setTimeout(function(){
                        window.location.href="<?php echo base_url('admin/agenda/') ?>"+"/"+a.id;
                      },1500);


                    } else {

                      setInterval(function(){
                      window.location.reload();                        
                      },1500);

                    }
                  },
                  error: function(){
                    error_alert("Kesalahan","Silahkan coba lagi");
                    hide_proses();
                  },
                  complete: function(){
                    _this[0].memproses=false;
                  }
               }); 

              }
           });


           <?php
           } if($npage==27){
           ?>

            $("#table-agenda").dataTable({
              aaSorting:[]
            });

            $(document).on("click",".hapus-agenda",function(){
              konfirmasi("Hapus data","Yakin akan menghapus data ini?",function(a){
              var id=a.attr("data-id");
              $.ajax({
                type:"post",
                data:{id:id},
                url:"<?php echo base_url('AN_ajax_admin/hapus_agenda') ?>",
                dataType:"json",
                cache:false,
                success:function(){
                  window.location.reload();
                },
                error:function(){
                  error_alert("Kesalahan","Coba lagi");
                }
              })                
              },$(this));
            });

           <?php
           } if($npage==28){
           ?>

            $(document).on("click",".hapus-download",function(){

              konfirmasi("Hapus data","Yakin akan menghapus data ini?",function(a){
              var id=a.attr("data-id");
              $.ajax({
                type:"post",
                data:{id:id},
                url:"<?php echo base_url('AN_ajax_admin/hapus_download') ?>",
                dataType:"json",
                cache:false,
                success:function(){
                  window.location.reload();
                },
                error:function(){
                  error_alert("Kesalahan","Coba lagi");
                }
              })                
              },$(this));    

            });

           <?php
           }  if($npage==29){
           ?>

            textEditor("#deskripsi-file");
            var file_download_terupload=false;

            var file_download=new Dropzone(".file_download", { url:"<?php echo base_url() ?>AN_ajax_admin/file_download" ,
                                                      method:'post',
                                                      maxFiles:1,
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      dictDefaultMessage:"Drop file disini",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan file ini"
                                                    }); 
           var sesi=$("#sesi-form-upload").val();
           var id=$("#id-file-download").val(); 

           var file_token;

           file_download.on("sending",function(a,b,c){

            a.token=file_token=Math.random();
            c.append('sesi',sesi);
            c.append('token_file',a.token);
            c.append('id',id);
          
            console.log('mengirim');
           
           });


           file_download.on("success",function(a,b){
              console.log(b);
              file_download_terupload=true;
           })

         

           file_download.on("removedfile",function(a){
            var tok=a.token;
            $.ajax({
              type:"POST",
              data:{"token":tok},
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_file_download_temp",
              cache:false,
              success:function(a){
                console.log("delete sukses");
                file_download_terupload=false;
              },
              error: function(a,b,c){
                console.log("delete gagal, cek koneksi internet")
              }
            });
           
           });


           $(window).unload(function(){

            $.ajax({
              type:"POST",
              data:{"token":file_token},
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_file_download_temp",
              cache:false,
              success:function(a){
                console.log("delete sukses");
              },
              error: function(a,b,c){
                console.log("delete gagal, cek koneksi internet")
              }
            });

           });


           $(".simpan-file").click(function(){
              var _this=$(this);
              var id=_this.attr("data-id");

              if(!file_download_terupload && id<1){
                error_alert("Belum upload file","Harap upload file")
                return;
              }

              if(!_this[0].memproses){
                show_proses("Menyimpan data...");
                _this[0].memproses=true;
                var nama=$("#nama-file").val();
                var sesi=$("#sesi-form-upload").val();
                var deskripsi=tinymce.get("deskripsi-file").getContent();
                $.ajax({
                  type:"post",
                  url:"<?php echo base_url('AN_ajax_admin/proses_input_download') ?>",
                  data:{
                    id:id,
                    nama:nama,
                    sesi:sesi,
                    deskripsi:deskripsi
                  },
                  dataType:"json",
                  cache: false,
                  success:function(){
                    show_proses("Proses berhasil!!");
                    if(id<1){

                    setTimeout(function(){
                      window.location.href="<?php echo base_url('admin/semua_download') ?>";
                    },1500);

                      return;
                    } else {

                      setTimeout(function(){
                        window.location.reload();
                      },1500);

                    }
                  },
                  error:function(){
                    error_alert("Kesalahan","Silahkan coba lagi");
                  },
                  complete:function(){
                   _this[0].memproses=false;
                  }
                });
              }
           });

        /*   file_download.on("queuecomplete",function(){
            uupload_in_progress=false;
             <?php if($artikel_id!=0){ ?>
              $(".dropzone").css("min-height","96px");
              $(".dz-message").css("display","block");
              <?php
             }
           ?>
            console.log("Semua operasi selesai");
           }); */



           <?php
           }  if($npage==32){
           ?>

           $(".update-smtp").click(function(){
            var _this=$(this);
            if(!_this[0].memproses){
              _this[0].memproses=true;
              var nama=$("#nama-email").val();
              var host=$("#host-email").val();
              var user=$("#user-email").val();
              var password=$("#password-email").val();
              var port=$("#port-email").val();
              var ssl_connection='N';

              if($("#ssl").is(":checked")){
                ssl_connection='Y';
              }

              show_proses("Mengupdate...");
              $.ajax({
                type:"post",
                data:{
                  host:host,
                  nama:nama,
                  user:user,
                  password:password,
                  port:port,
                  ssl_connection:ssl_connection
                },
                url:"<?php echo base_url('AN_ajax_admin/update_smtp') ?>",
                cache: false,
                dataType:"json",
                success:function(){
                  show_proses("Berhasil");
                  $("#password-email").val("");
                  setTimeout(function(){
                    hide_proses();
                  },2000);
                  _this[0].memproses=false;
                },
                error: function(){
                  _this[0].memproses=false;
                  hide_proses();
                  error_alert("Gagal","Terjadi kesalahan. Harap coba lagi");
                }
              });

            }


           });


           <?php
           }  if($npage==33){
           ?>

           textEditor("#pesan-email");


           $(".kirim-email").click(function(){
              var _this=$(this);
              if(!_this[0].memproses){
                _this[0].memproses=true;

                show_proses("Mengirim...");
                var judul=$("#judul-pesan").val();
                var email=$("#tujuan-email").val();
                var isi=tinymce.get("pesan-email").getContent();

                $.ajax({
                  type:"post",
                  url:"<?php echo base_url('AN_ajax_admin/kirim_email') ?>",
                  data:{
                    judul:judul,
                    email:email,
                    isi:isi
                  },
                  cache: false,
                  dataType:'json',
                  success:function(a){
                    show_proses("Pesan berhasil terkirim!");
                    setTimeout(function(){
                      hide_proses();
                      _this[0].memproses=false;
                    },5000);
                  },
                  error:function(){
                    error_alert("Kesalahan","Harap coba lagi");
                    _this[0].memproses=false;
                    hide_proses();
                  },
                  complete:function(){
                   
                  }
                });

              }
           });


            $("table").dataTable({
              aaSorting:[]
            });


            $(document).on("click",".hapus-pelatihan",function(){

                konfirmasi("Hapus Pelatihan","Yakin akan menghapus data ini?",function(a){
                  var id=a.attr("data-id");

                 $.ajax({
                    type:"post",
                    data:{id:id},
                    url:"<?php echo base_url('AN_ajax_admin/hapus_pelatihan') ?>",
                    cache:false,
                    dataType:"json",
                    success:function(){
                      window.location.reload();
                    },
                    error:function(){
                      error_alert("Kesalahan","Coba lagi");
                    }
                 });

                },$(this));

            });

           <?php
           }  if($npage==34){
           ?>

            $(document).on("click",".hapus-faq",function(){
              var _this=$(this);
              if(!_this[0].memproses){
                konfirmasi("Hapus pertanyaan","Yakin akan menghapus pertanyaan ini?",function(a){
                  if(!_this[0].memproses){
                    _this[0].memproses=true;
                    var id=_this.attr('data-id');
                    show_proses('Sedang memproses');
                      $.ajax({
                      type:"post",
                      data:{id:id},
                      url:"<?php echo base_url('AN_ajax_admin/hapus_faq') ?>",
                      cache:false,
                      dataType:"json",
                      success:function(){
                        window.location.reload();
                      },
                      error:function(error){
                        console.log(error);
                        hide_proses();
                        _this[0].memproses=false;
                        error_alert("Kesalahan","Harap coba lagi");
                      }
                  });                   
                  }
                },_this);
              }
            });


           <?php
           }  if($npage==35){
           ?>
            textEditor('#jawaban-faq');
            
            $('#submit-faq').click(function(){
              var _this=$(this);
              if(!_this[0].memproses){
                var pertanyaan = $(".pertanyaan-faq").val().trim();
                var jawaban = tinymce.get("jawaban-faq").getContent();
                var id = _this.attr('data-id');
                if(!pertanyaan.length){
                  error_alert('Pertanyaan','Masukan pertanyaan');
                } else if(!jawaban.length){
                  error_alert('Jawaban','Masukan jawaban');
                } else {
                  _this[0].memproses=true;
                  show_proses('Memproses...');
                  $.ajax({
                    type:'post',
                    data:{id:id,pertanyaan:pertanyaan,jawaban:jawaban},
                    url:"<?php echo base_url('AN_ajax_admin/insert_faq') ?>",
                    dataType:"json",
                    cache:false,
                    success:function(data){
                      show_proses('Berhasil!');
                      setTimeout(() => {
                        window.location.href="<?php echo base_url('admin/faq') ?>"+"/"+data.id;
                        _this[0].memproses=false;
                      }, 1500);
                    },
                    error:function(a){
                      console.log(a);
                      error_alert('Gagal','Terjadi kesalahan. Harap coba lagi');
                      hide_proses();
                      _this[0].memproses=false;
                    },
                    complete:function(){
                      
                      
                    }
                  });
                }
              }
            });


           <?php
           }  if($npage==36){
           ?>

            $(document).on("click",".hapus-group-banner",function(){
              var _this= $(this);
              if(!_this[0].memproses){
                konfirmasi("Hapus group banner","Yakin akan menghapus group banner ini?",function(a){
                  if(!_this[0].memproses){
                    _this[0].memproses=true;
                    var id = _this.attr('data-id');
                    show_proses('Sedang menghapus group banner');
                    $.ajax({
                      type:'post',
                      url:"<?php echo base_url('AN_ajax_admin/hapus_group_banner') ?>",
                      data:{id:id},
                      cache:false,
                      dataType:'json',
                      success:function(a){
                        show_proses('Berhasil terhapus. Mereload halaman...');
                        window.location.reload();
                      },
                      error:function(a){
                        hide_proses();
                        console.log(a);
                        error_alert('Gagal','Harap coba lagi');
                        _this[0].memproses=false;
                      }
                    })
                  }
                });
              }
            });

           <?php
           }  if($npage==37){
           ?>

             direct_upload(".btn-new-banner-field","#new-banner-field");
             direct_upload(".btn-edit-banner-field","#edit-banner-field");

             $("#add-button-toggle").click(function(){
               $("#new-banner-area").slideToggle();
             });

             $(document).on("click","#submit-new-banner-field",function(){
               var _this = $(this);
               if(!_this[0].memproses){
                 var gambar = $("#new-banner-field").val().trim();
                 var header = $("#header-banner-field").val().trim();
                 var caption = $("#caption-banner-field").val().trim();
                 var alt_text = $("#alt-banner-field").val().trim();
                 var link_text = $("#link-text-banner-field").val().trim();
                 var link_href = $("#link-href-banner-field").val().trim();
                 if(!gambar.length){
                   error_alert("Gambar","Anda belum memilih gambar");
                 } else {
                   var id= Math.random(); 
                   var el="";
                   el+= "<tr class='item-row' data-id='"+id+"'>";
                   el+= "<td class='gambar'>"+gambar+"</td>";
                   el+= "<td class='header'>"+header+"</td>";
                   el+= "<td class='caption'>"+caption+"</td>";
                   el+= "<td class='alt-text'>"+alt_text+"</td>";
                   el+= "<td class='link-text'>"+link_text+"</td>";
                   el+= "<td class='link-href'>"+link_href+"</td>";
                   el+= "<td class='aksi'>";
                     el+= "<div class='btn btn-success btn-edit-banner'>Edit</div> ";
                     el+= "<div class='btn btn-danger btn-hapus-banner'>Hapus</div>";
                   el+= "</td>";
                   el+= "</tr>";
                  
                  $("#new-banner-field").val("")
                  $("#header-banner-field").val("")
                  $("#caption-banner-field").val("")
                  $("#alt-banner-field").val("")
                  $("#link-text-banner-field").val("")
                  $("#link-href-banner-field").val("")

                  $(".body-table").prepend(el);
                  $("#new-banner-area").slideToggle();
                 }
               }
             });

             $(document).on("click",".btn-hapus-banner",function(){
               var _this = $(this);
               konfirmasi("Hapus","Yakin akan menghapus banner ini",function(a){
                 var parent =_this.parent().parent();
                 var id = parent.attr('data-id');
                 parent.remove();
               },_this);
             });

            $("#simpan-perubahan-banner").click(function(){
              var _this=$(this);
              if(!_this[0].memproses){
                var data = [];
                $(".item-row").each(function(index){
                  var _this =$(this);
                  var gambar = _this.children('.gambar').html();
                  var header = _this.children('.header').html();
                  var caption = _this.children('.caption').html();
                  var alttext = _this.children('.alt-text').html();
                  var linktext = _this.children('.link-text').html();
                  var linkhref = _this.children('.link-href').html();
                  data.push({
                    gambar:gambar,
                    alttext:alttext,
                    header:header,
                    caption:caption,
                    link_href:linkhref,
                    link_text:linktext,
                  });
                });
                var nama_group =$("#nama-group").val().trim();
                var id = _this.attr('data-id');

                if(!nama_group.length){
                  error_alert("Nama group kosong","Nama group belum dimasukan");
                } else if(!data.length){
                  error_alert("Banner kosong","Belum ada banner yang dimasukan");
                } else {
                  if(!_this[0].memproses){
                    _this[0].memproses=true;
                    show_proses("Memproses...");
                    $.ajax({
                      type:'post',
                      data:{id:id,nama:nama_group,data:data},
                      url:"<?php echo base_url('AN_ajax_admin/submit_item_banner') ?>",
                      cache:false,
                      dataType:'json',
                      success:function(data){
                        show_proses("Berhasil... Mereload halaman...");
                        setTimeout(function(){
                          window.location.href = "<?php echo base_url('admin/banner/') ?>"+data.id;
                        },2000);
                      },
                      error:function(a){
                        console.log(a);
                        _this[0].memproses=false;
                        hide_proses();
                        error_alert('Gagal','Harap coba lagi');
                      }
                    });
                  }
                }
              }
            });


            $(document).on("click",".btn-edit-banner",function(){
              var _this = $(this);
              var parent = _this.parent().parent();
              var id = parent.attr('data-id');
              $("#submit-modal-edit").attr('data-id',id);

              var gambar = parent.children('.gambar').html();
              var header = parent.children('.header').html();
              var caption = parent.children('.caption').html();
              var alttext = parent.children('.alt-text').html();
              var linktext = parent.children('.link-text').html();
              var linkhref = parent.children('.link-href').html();
            
             $("#edit-banner-field").val(gambar);             
             $("#edit-header-banner-field").val(header);
             $("#edit-caption-banner-field").val(caption);
             $("#edit-alt-banner-field").val(alttext);
             $("#edit-link-text-banner-field").val(linktext);
             $("#edit-link-href-banner-field").val(linkhref);

             $("#modal-edit").addClass('force_show').modal('show');
              
            });

              

              $("#tutup-modal-edit").click(function(){
                $("#modal-edit").removeClass('force_show').modal('hide');
              });


              $("#submit-modal-edit").click(function(){
                var _this = $(this);
                var id = _this.attr("data-id");

                var gambar = $("#edit-banner-field").val().trim(); 
                var header = $("#edit-header-banner-field").val().trim();
                var caption = $("#edit-caption-banner-field").val().trim();
                var alttext = $("#edit-alt-banner-field").val().trim();
                var linktext = $("#edit-link-text-banner-field").val().trim();
                var linkhref = $("#edit-link-href-banner-field").val().trim();
                if(!gambar.length){
                  error_alert('Gambar kosong','Anda masih belum memilih gambar');
                } else {
                  var elem = $(".item-row[data-id="+id+"]");
                  elem.children('.gambar').html(gambar);
                  elem.children('.header').html(header);
                  elem.children('.caption').html(caption);
                  elem.children('.alt-text').html(alttext);
                  elem.children('.link-text').html(linktext);
                  elem.children('.link-href').html(linkhref);
                  $("#modal-edit").removeClass('force_show').modal('hide');
                }
                
              });

           <?php
           }
           ?>

  $("#clear-cache").click(function(){
    var _this= $(this);
    if(!_this[0].memproses){
      konfirmasi("Hapus cache","Yakin akan menghapus semua cache?",function(a){
        if(!_this[0].memproses){
        _this[0].memproses=true;
        show_proses('Sedang menghapus cache');
        
        $.ajax({
          type:'post',
          data:null,
          url:"<?php echo base_url('AN_ajax_admin/hapus_cache') ?>",
          cache:false,
          dataType :'json',
          success:function(data){
            show_proses('Cache berhasil terhapus');
            setTimeout(function(){
              hide_proses();
            },1500);
            _this[0].memproses=false;
            console.log(data);
          },
          error:function(error){
            console.log(error);
            _this[0].memproses=false;
            error_alert('Gagal','Harap coba lagi');
            hide_proses();
          }
        })          
        }

    },$(this));    
    }
  })         


  function urutkan_nomor(classTarget){

    setTimeout(function(){
     var no=1;
     $(classTarget).each(function(){

      $(this).text(no);
      no++

     });     
    },50)


  } 


           function direct_upload(selector,IDtarget){
            $(selector).attr({'data-toggle':'modal','data-target':'#modal-direct-upload'})
            $(document).on("click",selector,function(){
              $("#iframe-direct-upload").attr("src","");
              var target=$(IDtarget).attr("id");
              var address="<?php echo base_url() ?>an-theme/admin/dist/filemanager/dialog.php?akey=<?php echo $_SESSION['random_filemanager_key'] ?>&type=1&field_id="+target;
              setTimeout(function() {
              $("#iframe-direct-upload").attr("src",address);                
              }, 10);
            });
           }


           function direct_upload_dinamis(selector){
                selector.attr({'data-toggle':'modal','data-target':'#modal-direct-upload'});
                var id=selector.attr("data-id");

               selector.click(function(){
                $("#iframe-direct-upload").attr("src","")
                var address="<?php echo base_url() ?>an-theme/admin/dist/filemanager/dialog.php?akey=<?php echo $_SESSION['random_filemanager_key'] ?>&type=1&field_id=target-field-gambar-"+id;

              setTimeout(function() {
              $("#iframe-direct-upload").attr("src",address);                
              }, 10);



                });

           }





           function textEditor(selector,tinggi){
              tinggi= typeof tinggi!=='undefined'?tinggi:300
                  tinymce.init({
                      style_formats: [
                          {
                              title: 'Image Left',
                              selector: 'img',
                              styles: {
                                  'float': 'left', 
                                  'margin': '0 10px 0 10px'
                              }
                           },
                           {
                               title: 'Image Right',
                               selector: 'img', 
                               styles: {
                                   'float': 'right', 
                                   'margin': '0 0 10px 10px'
                               }
                           }
                      ],
                      element_format : "html",
                      entities:"38,amp,60,lt,62,gt",
                      entity_encoding:"raw",
                      encoding: "xml",
                      relative_urls: false,
                      remove_script_host : false,
                      selector: selector,
                      theme: "modern",
                      skin: "lightgray",
                      menubar: false,
                      height:tinggi,
                      plugins: [
                          "advlist codesample  autolink lists link image charmap print preview hr anchor pagebreak",
                          "searchreplace wordcount visualblocks visualchars code fullscreen",
                          "insertdatetime media nonbreaking save table contextmenu directionality",
                          "emoticons template paste textcolor colorpicker textpattern responsivefilemanager"
                      ],
                      toolbar1: "code fullscreen insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | link image responsivefilemanager ",
                      toolbar2: "print preview media | forecolor backcolor emoticons | codesample",
                       external_filemanager_path:"<?php path_adm() ?>/dist/filemanager/",
                      filemanager_title:"Filemanager" ,
                      external_plugins: { "filemanager" : "<?php path_adm() ?>/dist/filemanager/plugin.min.js"},
                      filemanager_access_key:"<?php echo $_SESSION['random_filemanager_key']; ?>",
                      setup: function (editor) {
                          editor.on('init', function(args) {
                              editor = args.target;

                              editor.on('NodeChange', function(e) {
                                  if (e && e.element.nodeName.toLowerCase() == 'img') {
                                      tinymce.DOM.setAttribs(e.element, {'width': null, 'height': null});
                                  }
                              });
                          });
                      }
                  });


           }


           function tombol_animasi(tombol){
            this.defaultText=tombol.html();
            tombol.html("<span class='btn-wrap'>"+this.defaultText+"</span>");
            var defText=this.defaultText;
            var animate;
            var degree=0;
            var rotate=function(){              
              tombol.find(".rotate").css({WebkitTransform: "rotate("+degree+"deg)"});
              tombol.find(".rotate").css({"-moz-transform": "rotate("+degree+"deg)"});
              tombol.find(".rotate").css({"-transform": "rotate("+degree+"deg)"});
              animate=setTimeout(function(){
                 degree++;
                 rotate();
               // console.log("hai")
              },5);
            };
            this.memproses=function(){
              tombol.find(".btn-wrap").html("<i class='glyphicon glyphicon-repeat rotate'></i> memproses")
              rotate();
            };
            this.stop=function(){
              degree=0;
              window.clearTimeout(animate);
              tombol.html(this.defaultText);
              //console.log("berhenti");
            };
            this.success=function(){
              ajax_request=true;
              tombol.find(".btn-wrap").html("<i class='glyphicon glyphicon-ok rotate'></i> berhasil").fadeOut(3000,function(){
                ajax_request=false
                tombol.html(defText);
               // alert("ok")
              });
              window.clearTimeout(animate);
              //tombol.find(".btn-wrap").css({left:"-10px"},2000);
            //  tombol.html().fadeOut();
            }
           }

           setInterval(function(){
             $(".input-group-addon").each(function(index){
               var _this = $(this);
               var input_form= _this.siblings("input[class~='form-control']");

               if(input_form.length){
                var value = input_form.val().trim();
                var ID = input_form.attr('id');
                var preview_area= $(".foto-produk-preview-area[data-area='"+ID+"']"); 

                if(preview_area.length){                  
                  if(value.length){
                  preview_area.html("<img src="+value+" />");
                  } else {
                  preview_area.html('');
                  }
                }

                }


             });
           },1500);

        })
      </script>
  </body>
</html>