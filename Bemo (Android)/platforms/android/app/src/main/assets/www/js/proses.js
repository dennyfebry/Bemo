$('document').ready(function(){
    $('#user').addClass('hide');
    $('#montir').addClass('hide');
    $('#admin').addClass('hide');

    var role = sessionStorage.getItem('hakAkses');
    if(role == 'user'){
        $('#user').removeClass('hide');
    }else if(role == 'montir'){
        $('#montir').removeClass('hide');
    }else {
        $('#admin').removeClass('hide');
    }

    var userID = sessionStorage.getItem('userID');
    var hakAkses = sessionStorage.getItem('hakAkses');
    var statusproses = sessionStorage.getItem('cek-pesanan');
    console.log('id user =', userID);
    console.log('hak akses =', hakAkses);
    console.log('status =', statusproses);
    
    $('#batal').click(function(){
        var r = confirm("Apakah kamu yakin ingin membatalkan antrian ini?");
        if (r == true) {
            hapusForm();
        }  
    });
});

function hapusForm(){
    var userID = sessionStorage.getItem('userID');
    var hakAkses = sessionStorage.getItem('hakAkses');
    var statusproses = sessionStorage.getItem('cek-pesanan');
    if((userID != '') && (hakAkses == 'user')){
        $.ajax({
            type:'POST',
            url:'http://dennyfebrygo.com/bemo/www/php/hapus-pesanan.php',
            data:{userID:userID,status:statusproses},
            error: function (xhr, status, error) {
            console.log(xhr);
              var result = $.parseJSON(xhr.responseText);
              console.log(result);
              alert('Terjadi kesalahan ' + result.error);
            }, 
            success:function(data){
                console.log(data);
                sessionStorage.setItem("cek-pesanan", "0");
                var result = $.parseJSON(data);
                console.log(result);
               if(result.status === 'success'){
                   $('#errorDiv').slideDown('fast', function(){
                       $('#errorDiv').append('<div class="alert alert-info">'+result.message+'</div>');
                   }).delay(2000).slideUp('fast');
                   setTimeout(function() {
                    sessionStorage.setItem("cek-pesanan", "0");
                    window.location.href = 'ambil-antrian.html';
                   }, 3000)
                }else{
                   $('#errorDiv').slideDown('fast', function(){
                       $('#errorDiv').append('<div class="alert alert-danger">'+result.message+'</div>');
                   }).delay(2000).slideUp('fast');
                }     
            }
        });
    }
}