<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//jika bukan halaman Home
if($informasi["current_page"]!='home'){

echo "<div class='col-md-4 right-wripper'>";

echo "<div class='right-side'>";

echo "<div class='right-side-konten' style='margin-bottom:50px;'>";
echo "<form method='post' action='".baseURL("form_visitors/search_article")."' class='form-group has-feedback'> 

  <input type='text' name='keyword' class='form-control search-form' placeholder='Pencarian artikel...' /><span class='fa fa-search form-control-feedback'></span>

</form>";
echo "</div>";


echo "<div class='right-side-konten'>";
echo "<h4><span>Follow Us</span></h4>";

echo "<a href='https://www.facebook.com/JESUSisMySAVIOR.NotMyReligion' target='_blank' >";
echo "<div class='sosial-button sosial-facebook'>";
echo "</div>";
echo "</a>";

echo "<a href='https://twitter.com/gantengsintetis' target='_blank' >";
echo "<div class='sosial-button sosial-twitter'>";
echo "</div>";
echo "</a>";

echo "<a href='https://www.instagram.com/ando_poluan' target='_blank' >";
echo "<div class='sosial-button sosial-instagram'>";
echo "</div>";
echo "</a>";

echo "<a href='https://plus.google.com/116695949876921825285' target='_blank' >";
echo "<div class='sosial-button sosial-google'>";
echo "</div>";
echo "</a>";

echo "</div>";


echo "<div class='right-side-konten'>";
echo "<h4><span>Artikel Populer</span></h4>";

foreach ($artikel_populer as $artikel) {
  
echo "<a href='".artikel_url($artikel['id'],$artikel['slug'])."'><div class='populer-artikel-right-box media'>";
echo "<div class='img-box media-left'>
 <img src='".img_artikel_url($artikel['foto'],true)."' alt='$artikel[judul]'/>
 </div>";

 echo "<div class='media-body konten-body'>";
 echo "<h5>$artikel[judul]</h5>";
 echo "</div>";

echo "</div></a>";


}

echo "</div>";


echo "<div class='right-side-konten'>";
echo "<h4><span>Tags</span></h4>";

foreach ($tags as $tag) {
  echo "<a href='".tag_url($tag['id'],$tag['slug'])."'><span class='label label-info label-tag'>$tag[nama]</span></a>";
}

echo "</div>";

echo "<div class='right-side-konten'>";
echo "</div>";

echo "</div>"; //.right-side

echo "</div>"; //.col-md-4



  echo "</div>"; //tutup class .row
  echo "</div>"; //tutup class .container
  echo "</div>"; //tutup id #main-konten

}

?>



<div id='footer'>

  <div class='container'>
  <div class='row'>
    <div class='col-md-3 wow fadeInDown box-footer'>
      <h4>Gallery <small> - Kategori Galeri</small></h4>
      <div class='konten-footer'>
        <ul>
        <?php 
            foreach ($kategori_galeri as $galeri) {
             echo "<li><a href='".kategori_galeri_url($galeri['id'],$galeri['slug'])."'><i class='fa fa-angle-right bullet-li'></i> $galeri[nama]</a></li>";
            }
        ?>
        </ul>

      </div>
    </div>



    <div class='col-md-3 wow fadeInUp  box-footer'>
      <h4>CATEGORY<small> - kategori artikel</small></h4>
      
      <div class='konten-footer'>
        <ul>
        <?php

        foreach ($kategori_artikel as $kategori) {
          echo "<li><a href='".kategori_url($kategori['id'],$kategori['slug'])."'><i class='fa fa-angle-right bullet-li'></i> $kategori[nama]</a></li>";
        }

         ?>
       </ul>

      </div>


    </div>


     <div class='col-md-6 wow fadeInDown  box-footer' id='about-us'>
      <h4>ABOUT US <small> - tentang kami</small></h4>
  
      <div class='konten-footer'>
       <div class='row'>

        <div class='col-md-6' style="text-align: justify">
          Silahkan klik <a href="<?php echo baseURL('about-us'); ?>" style="text-decoration: underline">tautan ini</a> untuk membaca profil saya secara lengkap. 
          Silahkan hubungi saya melalui contact saya atau melalui form dibawah. 
        </div>

        <div class='col-md-6'>
          <i class='fa fa-home'></i> Tomohon, Sulawesi Utara <br/>
          <i class='fa fa-phone'></i><span class='angka'> +62-853-9374-1065</span> 
          <br/>
          <i class='fa fa-envelope'></i> sandrobrayen@gmail.com <br/>

 
        
         </div>

        <div class='col-md-12' >
        <form method='POST' id='kontak-form' action='<?php echo baseURL('form_visitors/contact'); ?>' style='margin-top: 10px;' autocomplete='off' >

          <div class='form-group'>
           <input type='text' class='form-control' placeholder='Nama' name='nama' />
           <input type='hidden' class='form-control' name='url' value='<?php echo current_url() ?>' />
          </div>

          <div class='form-group'>
          <div class='row'>

           <div class='col-md-6'>    
           <div class='form-group'>       
           <input type='text' class='form-control' placeholder='Email' name='email' />
           </div>
           </div>

           <div class='col-md-12'>
            <div class='form-group'>
            <div id="recaptcha" ></div>
            </div>
           </div>

          <div class='col-md-6'>
          <div class='form-group'>
           <input type='text' class='form-control' placeholder='Phone' name='phone' />
          </div>
          </div>


          </div>
          </div>


          <div class='form-group'>
           <input type='text' class='form-control' placeholder='Judul pesan' name='judul' />
          </div>

          <div class='form-group'>
           <textarea class='form-control' placeholder='Pesan' name='pesan' style='height: 100px !important;'></textarea>
          </div>

          <div class='form-group'>
           <div id='recaptcha1'></div>
          </div>

          <div class="form-group">
            <button class="btn btn-danger btn-primary"><i class="fa fa-send"></i></button>
            <div class="cssload-container" style="display: none; width: 100px">
              <div class="cssload-tube-tunnel"></div>
              </div>
          </div>

        </form> 
        </div>

       </div>



      </div>
      
    </div>

  </div>

  <div class="row">
     <div class="col-md-12">
      &copy; <?php echo $informasi['nama'] ?>.  Powered By  <a href="http://www.sandro.id/" target="_blank"><span style="color:#f39c12">Apricot</span> <span style="color:#00c0ef"><b style="color">CMS</b></span></a> |Made In Indonesia
    </div>
  </div>

  </div>

</div>



</main>


<!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.2.min.js"></script>-->
<script type="text/javascript" src="<?php echo assets_url('js/jquery-1.11.1.min.js'); ?>"></script>

<!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="<?php echo assets_url('bootstrap/js/bootstrap.min.js'); ?>"></script>


<script type="text/javascript" src="<?php echo assets_url("js/jquery.singlePageNav.min.js") ?>"></script>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>-->
<script type="text/javascript" src="<?php echo assets_url("fancybox/source/jquery.fancybox.js") ?>"></script>
<script type="text/javascript" src="<?php echo assets_url("fancybox/source/helpers/jquery.fancybox-buttons.js") ?>"></script>
<script type="text/javascript" src="<?php echo assets_url("fancybox/source/helpers/jquery.fancybox-media.js") ?>"></script>
<script type="text/javascript" src="<?php echo assets_url("fancybox/source/helpers/jquery.fancybox-thumbs.js") ?>"></script>


<script type="text/javascript" src="<?php echo assets_url("jQuery.TosRUs/src/js/jquery.tosrus.min.all.js") ?>"></script>


<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>-->
<script type="text/javascript" src="<?php echo assets_url('owl-carousel/owl.carousel.js'); ?>"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script type="text/javascript" src="<?php echo assets_url("js/jquery.slitslider.js") ?>"></script>

<script type="text/javascript" src="<?php echo assets_url("js/jquery.ba-cond.min.js") ?>"></script>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>-->
<script type="text/javascript" src="<?php echo assets_url('js/wow.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('js/imagesloaded.pkgd.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('js/masonry.pkgd.min.js'); ?>"></script>


<script type="text/javascript" src="<?php echo assets_url("js/main.js") ?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/packaged/jquery.noty.packaged.min.js"></script>

<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.1.0/jssocials.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.4.1/prism.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.4.1/components/prism-php.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.4.1/components/prism-php-extras.min.js"></script>

<script type="text/javascript">
$(function(){

  var contact_us;


  onloadCallback=function(){

  contact_us=grecaptcha.render(document.getElementById('recaptcha1'), {
          'sitekey' : "<?php echo $recaptcha['key'] ?>",
          'theme' : 'dark'
        });


  }


  $("#kontak-form").on("submit",function(evt){
    evt.preventDefault();    
    if(!$(this)[0].mengirim) {
    __this=$(this)      
    var val=__this.serialize();

    var data={};
    $.each(__this.serializeArray(),function(i,v){
       data[v.name] = v.value;
     });
      
    if(!(data.nama.trim().length > 0)){
      noty({
            text:'Nama harus diisi',
            type: 'error',
            layout: 'center',
            dismissQueue:true
      });
      return;
    } else if(!(data.email.trim().length > 0)){
      noty({
            text:'Email harus diisi',
            type: 'error',
            layout: 'center',
            dismissQueue:true
      });
      return;
    } else if(!(data.judul.trim().length > 0)){
      noty({
            text:'Judul harus diisi',
            type: 'error',
            layout: 'center',
            dismissQueue:true
      });
      return;
    } else if(!(data.pesan.trim().length > 0)){
      noty({
            text:'Pesan harus diisi',
            type: 'error',
            layout: 'center',
            dismissQueue:true
      });
      return
    } else if(!(data['g-recaptcha-response'].trim().length > 0)){
      noty({
            text:'Captcha harus diisi',
            type: 'error',
            layout: 'center',
            dismissQueue:true
      });
      return;
    }
    
    
    __this[0].mengirim=true;
    var action=__this.attr("action");
    __this.find("button").hide();
    __this.find(".cssload-container").show();
    $.ajax({
      type:"POST",
      url:action,
      data:val,
      cache:false,
      dataType:'json',
      success:function(a){
        if(a.status=='sukses'){
           noty({
            text:"Pesan anda terkirim. Terima kasih telah mengubungi kami",
            type: 'success',
            layout: 'center',            
            dismissQueue:true
            });
         $('form#kontak-form').find("input[type=text],input[type=password], textarea").val("");
        } else if(a.status=='error') {
          noty({
            text:a.name,
            type: 'error',
            layout: 'center',
            dismissQueue:true
          });
        }

      },
      error:function(){
          noty({
            text:"Cek koneksi internet anda",
            type: 'error',
            layout: 'center',
            dismissQueue:true

          });
      },
      complete:function(){
        grecaptcha.reset(contact_us);  
        __this.find("button").show();
        __this.find(".cssload-container").hide();
        __this[0].mengirim=false;      
      }
    });
  }
  });


 var $grid = $(".grid").masonry({
    itemSelector: '.grid-item',   
    });

 $grid.imagesLoaded().progress( function() {
    $grid.masonry('layout');
 });

$(".grid a").tosrus({
  caption: {
    add:true
  }
});

});

$("#share").jsSocials({
            shares: [ "facebook", "twitter","googleplus", "whatsapp"],
            
 });


<?php echo $informasi['custom_javascript']; ?>

<?php echo $google_analytics["script"]; ?>

</script>




</body>



</html>