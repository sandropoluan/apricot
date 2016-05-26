var ajax_request=false;

function error_alert(judul,konten){
		$(".modal-error").html("<div class='modal fade modal-danger' id='modal-error'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>	<h4 class='modal-title'><span class='glyphicon glyphicon-warning-sign'></span> "+judul+"</h4></div><div class='modal-body'><p>"+konten+"</p></div><div class='modal-footer'></div></div></div></div>");
		$("#modal-error").modal();

}

function konfirmasi(judul,konten,fn,t){
		$(".modal-konfirmasi").html("<div class='modal fade modal-warning' id='modal-konfirmasi'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>	<h4 class='modal-title'><span class='glyphicon glyphicon-warning-sign'></span> "+judul+"</h4></div><div class='modal-body'><p>"+konten+"</p></div><div class='modal-footer'><button type='button' class='btn btn-primary' data-dismiss='modal'>Batal</button><button  type='button' class='btn btn-warning lanjutkan'>Lanjutkan</button></div></div></div></div>");
		$("#modal-konfirmasi").modal();
			$(".lanjutkan").on("click",function(){
			fn(t);
			$("#modal-konfirmasi").modal('hide');
		}); 
}

function show_proses(konten){
		$(".notif-proses").html(konten).fadeIn();
}

function hide_proses(){
		$(".notif-proses").hide();
}

var warna= ["#5211f6","#1188f6","#11d8f6","#11f68d","#47f611","#b8f611","#f6de11","#f69811","#f65211","#f611a8","#f61142","#ff0404"];
function warna2(){
		$("div[class~=cari]").each(function(){
			var lev=$(this).attr('alt');
			$(this).css("background-color",warna[lev]);
		});
}

$(function(){

	$(".modal-error").on("hidden.bs.modal",function(){
		$(".sidebar-mini").attr("style","padding-right: 0px;");
		console.log("closed");
	});

	$('.tambah-kat').click(function(){
		$('.row-hide').show('fast');
	});

	warna2();

	$(document).on("mouseover","div[class~=cari]",function(){
		var id=$(this).attr('id');
		$(this).css("background-color",'#777');
		$("div[class~=PAR_"+id+"]").css("background-color",'#777');
	}).on("mouseleave","div[class~=cari]",function(){
		warna2();
	})


	var h=$(".sidebar-menu").height();
	
});