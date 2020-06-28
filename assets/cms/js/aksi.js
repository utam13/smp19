//lihat password
function lihatpassword() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
		$("#iconlihat").removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	} else {
		x.type = "password";
		$("#iconlihat").removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	}
}

//tampilkan loading indikator
function showloading() {
	$("#divloading").css("display", "block");
}

/*----------------------------upload file---------------------------------*/

/*----------upload logo----------*/
function upload() {
	$("#pilih").click();
}

$('#pilih').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat").hide();
			$("#progress_div").show();
			$("#progress_bar").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file").val();
			var lokasi = $("#lokasi").val();
			var folder = $("#folder").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.addEventListener("load", completeHandler, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar").css("width", Math.round(percent) + "%");
}

function completeHandler(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div").hide();
		$("#nama_file").val(nama_file);
		$("#file_target").val(nama_file);
		$("#link").attr("href", berkas);
		$("#btnlihat").show();
	}
}

function upload_beranda() {
	$("#pilih_beranda").click();
}

$('#pilih_beranda').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat_beranda").hide();
			$("#progress_div_beranda").show();
			$("#progress_bar_beranda").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file_beranda").val();
			var lokasi = $("#lokasi_beranda").val();
			var folder = $("#folder_beranda").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_beranda, false);
			ajax.addEventListener("load", completeHandler_beranda, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_beranda(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_beranda").css("width", Math.round(percent) + "%");
}

function completeHandler_beranda(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_beranda").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_beranda").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div_beranda").hide();
		$("#nama_file_beranda").val(nama_file);
		$("#file_target_beranda").val(nama_file);
		$("#link_beranda").attr("href", berkas);
		$("#btnlihat_beranda").show();
	}
}

function upload_profil() {
	$("#pilih_profil").click();
}

$('#pilih_profil').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat_profil").hide();
			$("#progress_div_profil").show();
			$("#progress_bar_profil").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file_profil").val();
			var lokasi = $("#lokasi_profil").val();
			var folder = $("#folder_profil").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_profil, false);
			ajax.addEventListener("load", completeHandler_profil, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_profil(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_profil").css("width", Math.round(percent) + "%");
}

function completeHandler_profil(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_profil").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_profil").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div_profil").hide();
		$("#nama_file_profil").val(nama_file);
		$("#file_target_profil").val(nama_file);
		$("#link_profil").attr("href", berkas);
		$("#btnlihat_profil").show();
	}
}

function upload_ekskul() {
	$("#pilih_ekskul").click();
}

$('#pilih_ekskul').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat_ekskul").hide();
			$("#progress_div_ekskul").show();
			$("#progress_bar_ekskul").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file_ekskul").val();
			var lokasi = $("#lokasi_ekskul").val();
			var folder = $("#folder_ekskul").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_ekskul, false);
			ajax.addEventListener("load", completeHandler_ekskul, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_ekskul(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_ekskul").css("width", Math.round(percent) + "%");
}

function completeHandler_ekskul(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_ekskul").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_ekskul").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div_ekskul").hide();
		$("#nama_file_ekskul").val(nama_file);
		$("#file_target_ekskul").val(nama_file);
		$("#link_ekskul").attr("href", berkas);
		$("#btnlihat_ekskul").show();
	}
}

function upload_fasilitas() {
	$("#pilih_fasilitas").click();
}

$('#pilih_fasilitas').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat_fasilitas").hide();
			$("#progress_div_fasilitas").show();
			$("#progress_bar_fasilitas").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file_fasilitas").val();
			var lokasi = $("#lokasi_fasilitas").val();
			var folder = $("#folder_fasilitas").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_fasilitas, false);
			ajax.addEventListener("load", completeHandler_fasilitas, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_fasilitas(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_fasilitas").css("width", Math.round(percent) + "%");
}

function completeHandler_fasilitas(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_fasilitas").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_fasilitas").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div_fasilitas").hide();
		$("#nama_file_fasilitas").val(nama_file);
		$("#file_target_fasilitas").val(nama_file);
		$("#link_fasilitas").attr("href", berkas);
		$("#btnlihat_fasilitas").show();
	}
}

function upload_berita() {
	$("#pilih_berita").click();
}

$('#pilih_berita').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat_berita").hide();
			$("#progress_div_berita").show();
			$("#progress_bar_berita").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file_berita").val();
			var lokasi = $("#lokasi_berita").val();
			var folder = $("#folder_berita").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_berita, false);
			ajax.addEventListener("load", completeHandler_berita, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_berita(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_berita").css("width", Math.round(percent) + "%");
}

function completeHandler_berita(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_berita").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_berita").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div_berita").hide();
		$("#nama_file_berita").val(nama_file);
		$("#file_target_berita").val(nama_file);
		$("#link_berita").attr("href", berkas);
		$("#btnlihat_berita").show();
	}
}

function upload_galeri() {
	$("#pilih_galeri").click();
}

$('#pilih_galeri').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat_galeri").hide();
			$("#progress_div_galeri").show();
			$("#progress_bar_galeri").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file_galeri").val();
			var lokasi = $("#lokasi_galeri").val();
			var folder = $("#folder_galeri").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_galeri, false);
			ajax.addEventListener("load", completeHandler_galeri, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_galeri(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_galeri").css("width", Math.round(percent) + "%");
}

function completeHandler_galeri(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_galeri").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_galeri").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div_galeri").hide();
		$("#nama_file_galeri").val(nama_file);
		$("#file_target_galeri").val(nama_file);
		$("#link_galeri").attr("href", berkas);
		$("#btnlihat_galeri").show();
	}
}

function upload_kontak() {
	$("#pilih_kontak").click();
}

$('#pilih_kontak').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 500 Kb!");
		} else {
			$("#btnlihat_kontak").hide();
			$("#progress_div_kontak").show();
			$("#progress_bar_kontak").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file_kontak").val();
			var lokasi = $("#lokasi_kontak").val();
			var folder = $("#folder_kontak").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_kontak, false);
			ajax.addEventListener("load", completeHandler_kontak, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_kontak(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_kontak").css("width", Math.round(percent) + "%");
}

function completeHandler_kontak(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_kontak").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_kontak").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div_kontak").hide();
		$("#nama_file_kontak").val(nama_file);
		$("#file_target_kontak").val(nama_file);
		$("#link_kontak").attr("href", berkas);
		$("#btnlihat_kontak").show();
	}
}

function upload_pdf() {
	$("#pilih_pdf").click();
}

$('#pilih_pdf').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 10000000) {
			alert("Ukuran file melebihi 10 Mb!");
		} else {
			$("#btnlihat_pdf").hide();
			$("#progress_div_pdf").show();
			$("#progress_bar_pdf").attr("aria-valuenow", 0);

			var nama_file = $("#nama_pdf").val();
			var lokasi = $("#lokasi_pdf").val();
			var folder = $("#folder_pdf").val();
			var target_proses = lokasi + folder + "/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler_pdf, false);
			ajax.addEventListener("load", completeHandler_pdf, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandler_pdf(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar_pdf").css("width", Math.round(percent) + "%");
}

function completeHandler_pdf(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi_pdf").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div_pdf").hide();

		alert("Gagal upload file, silakan coba upload file PDF yang berbeda");
	} else {
		$("#progress_div_pdf").hide();
		$("#nama_pdf").val(nama_file);
		$("#file_pdf").val(nama_file);
		$("#link_pdf").attr("href", berkas);
		$("#btnlihat_pdf").show();
	}
}
/*---------end upload --------*/

function errorHandler(event) {
	alert("Upload Failed");
}

function abortHandler(event) {
	alert("Upload Aborted");
}

//prestasi----------------------------------------------------------------------
/*
function ambil_prestasi(a, kode, tahun, nama, lokasi, uraian, file_target, gambar, file_target) {
	$("#frm_prestasi").attr("action", a);

	$("#kode").val(kode);
	$("#tahun").val(tahun);
	$("#nama").val(nama);
	$("#lokasi_kejuaraaan").val(lokasi);
	$("#uraian").val(uraian);
	$("#nama_file").val(gambar);
	$("#file_target").val(file_target);
	if (file_target == "") {
		$("#btnlihat").hide();
	}
	$("#link").attr("href", file_target);
}

$('#form_prestasi').on('shown.bs.modal', function () {
	$('#tahun').focus();
})

$('#nama').change(function () {
	var value = $(this).val();

	if (value.indexOf('\'') >= 0 || value.indexOf('"') >= 0) {
		alert("Nama TIDAK BOLEH ada tanda petik ganda atau pun petik tunggal");
		$('#nama').val("");
		$('#nama').focus();
	}
});
*/
/*--------------------------------------end--------------------------------------------*/

//ekskul----------------------------------------------------------------------
function ambil_ekskul(a, kode, nama, fb, ig, tw, utama, gambar, file_target) {
	$("#frm_ekskul").attr("action", a);

	$("#kode").val(kode);
	$("#nama").val(nama);
	$("#link_facebook").val(fb);
	$("#link_ig").val(ig);
	$("#link_twitter").val(tw);
	$("#nama_file").val(gambar);
	$("#file_target").val(utama);
	$("#link").attr("href", file_target);
	if (file_target == "") {
		$("#btnlihat").hide();
	}
}

$('#form_ekskul').on('shown.bs.modal', function () {
	$('#nama').focus();
})
/*--------------------------------------end--------------------------------------------*/

//fasilitas----------------------------------------------------------------------
function ambil_fasilitas(a, kode, nama, utama, gambar, file_target) {
	$("#frm_fasilitas").attr("action", a);

	$("#kode").val(kode);
	$("#nama").val(nama);
	$("#nama_file").val(gambar);
	$("#file_target").val(utama);
	$("#link").attr("href", file_target);
	if (file_target == "") {
		$("#btnlihat").hide();
	}
}

$('#form_fasilitas').on('shown.bs.modal', function () {
	$('#nama').focus();
})
/*--------------------------------------end--------------------------------------------*/

//berita / informasi---------------------------------------------------------------------
function ambil_informasi(a, kode, tgljam, judul, nama_pdf, pdf, file_pdf, youtube, nama_gambar, gambar, file_target) {
	$("#frm_informasi").attr("action", a);

	$("#kode").val(kode);
	$("#tgljam").val(tgljam);
	$("#judul").val(judul);
	$("#youtube").val(youtube);
	$("#nama_pdf").val(pdf);
	$("#file_pdf").val(nama_pdf);
	$("#link_pdf").attr("href", file_pdf);
	$("#nama_file").val(gambar);
	$("#file_target").val(nama_gambar);
	$("#link").attr("href", file_target);
	if (file_pdf == "") {
		$("#btnlihat_pdf").hide();
	}
	if (file_target == "") {
		$("#btnlihat").hide();
	}
}

$('#form_informasi').on('shown.bs.modal', function () {
	$('#tgljam').focus();
})
/*--------------------------------------end--------------------------------------------*/

//staff---------------------------------------------------------------------
function ambil_staff(a, kode, nip, nama, jabatan, golongan, fb, ig, tw, nama_gambar, gambar, file_target) {
	$("#frm_staff").attr("action", a);

	$("#kode").val(kode);
	$("#awal").val(awal);
	$("#nip").val(nip);
	$("#nama").val(nama);
	$("#jabatan").val(jabatan);
	$("#golongan").val(golongan);
	$("#link_facebook").val(fb);
	$("#link_ig").val(ig);
	$("#link_twitter").val(tw);
	$("#nama_file").val(gambar);
	$("#file_target").val(nama_gambar);
	$("#link").attr("href", file_target);
	if (file_target == "") {
		$("#btnlihat").hide();
	}
}

$('#form_staff').on('shown.bs.modal', function () {
	$('#nip').focus();
})
/*--------------------------------------end--------------------------------------------*/


//galeri---------------------------------------------------------------------
function ambil_galeri() {
	$("#judul").val("");
	$("#file_target").val("");
	$("#btnlihat").hide();
}

$('#form_galeri').on('shown.bs.modal', function () {
	$('#tgl').focus();
})
/*--------------------------------------end--------------------------------------------*/
