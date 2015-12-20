$(document).ready(function(){
  $(".button-collapse").sideNav({
    closeOnClick: true,
    edge: 'left'
  });
  $('select').material_select();
  $('.modal-trigger').leanModal();
  $('.tooltipped').tooltip({delay: 50});
  accounting.settings = {
    currency : {
      symbol : "Rp.",
      format : "%s %v",
      decimal : ",",
      thousand : "."
    },
    number : {
      precision : 0,
      thousand : ".",
      decimal : ","
    }
  }

  $('#dropdown-kas').dropdown({
    hover: true
  });

  // $('input[type=date]').pickadate({
  //   selectMonths: true, // Creates a dropdown to control month
  //   selectYears: 15 // Creates a dropdown of 15 years to control year
  // });

  $('.currency').html(function(){
    var number = $(this).html();
    $(this).html(accounting.formatMoney(number));
  });
  $('.tooltipped').attr("data-tooltip", function(){
    var number = $(this).attr("data-tooltip");
    $(this).attr("data-tooltip", accounting.formatMoney(number));
  });
});

// Open modal for edit kelas
function modalEditKelas(id, nama) {
  var id = id;
  var nama = nama;
  document.getElementById('kelas-edit-id').value = id;
  document.getElementById('kelas-edit-nama').value = nama;
  $('#siswa-edit-kelas').openModal();
}

// Open modal for edit siswa
function modalEditSiswa(id,nis,nama,kelas,alamat,orangtua,tahunmasuk) {
  var id              = id;
  var nis             = nis;
  var nama            = nama;
  var kelas           = kelas;
  var alamat          = alamat;
  var orangtua        = orangtua;
  var tahunmasuk      = tahunmasuk;
  var inputId         = document.getElementById('siswa-edit-id');
  var inputNis        = document.getElementById('siswa-edit-nis');
  var inputNama       = document.getElementById('siswa-edit-nama');
  var inputKelas      = document.getElementById('siswa-edit-kelas');
  var inputAlamat     = document.getElementById('siswa-edit-alamat');
  var inputOrangtua   = document.getElementById('siswa-edit-orang-tua');
  var inputTahunmasuk = document.getElementById('siswa-edit-tahun-masuk');

  inputId.value         = id;
  inputNis.value        = nis;
  inputNama.value       = nama;
  $('#siswa-edit-kelas option[value='+kelas+']').prop('selected',true);
  inputAlamat.value     = alamat;
  inputOrangtua.value   = orangtua;
  inputTahunmasuk.value = tahunmasuk;

  $('#siswa-edit-siswa').openModal();
}

$('#pemasukan-tambah-kelas').on("change", function(event){
  var data = this.value;
  console.log(data);
  $.get('./siswa/kelas/idkelas/'+data, function(resp){
    $('#pemasukan-tambah-nama').html(resp);
  });
});

$('#siswa-pilih-kelas').on("change", function(event){
  var data = this.value;
  console.log(data);
  $.get('../siswakelas/idkelas/'+data, function(resp){
    $('#table-siswa').html(resp);
    $('.pagination').hide();
  })
})
