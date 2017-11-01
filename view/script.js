
$(document).ready(function(){

function refresh() {

    setTimeout(function () {
        location.reload()
    }, 1000);
}

 $("#login").click(function(){

    $.ajax({

        type: "POST",
        url: "controller/users/user_login.php",
        dataType:'json',        
        data: $("#form").serialize(),
        success: function(response) {
            if(response == true){
             window.location.href = 'index.php';
            }else if(response == false){
              alert("Bilgileri kontrol ediniz");
            }
         }
      });

});


$.KategoriEkle = function KategoriEkle(){
      
     $.ajax({

        type: "POST",
        url: "controller/category/category_add.php",          
        data :$("#form").serialize(),
        dataType: 'json',
        success: function(response) {
            $.toaster(response);
            document.getElementById("form").reset();
         }
      });
}



$.KategoriSil = function KategoriSil(id){

    if(confirm("Kategoriyi iptal etmek istiyormusunuz?")){

     var dataPost = { "id" : id }
      $.ajax({
        type: 'POST',
        url: 'controller/category/category_delete.php',
        data: dataPost,
        dataType: 'json',
        success:function(response){
            $.toaster(response);
            if (response.priority == 'success') {
              refresh();
            }
        }
      });
    }
}

$.KategoriDuzenle = function KategoriDuzenle(){

        $.ajax({
        url: 'controller/category/category_update.php',
        type: 'POST',
        data :$("#form").serialize(),
        dataType:'json',
        success:function(response){
          $.toaster(response);
        }
      });
    
  }

$.UyeEkle = function UyeEkle(){
      
     $.ajax({

        type: "POST",
        url: "controller/users/user_add.php",          
        data :$("#form").serialize(),
        dataType: 'json',
        success: function(response) {
          $.toaster(response);
          if(response.priority == 'success')
            document.getElementById("form").reset();
         }
      });
}



  $.UyeSil =  function UyeSil(id){

   if(confirm("Uyeliği iptal etmek istiyormusunuz?")){


      $.ajax({
        url: 'controller/users/user_delete.php',
        type: 'POST',
        data :  { "id" : id },
       dataType:'json',
        success:function(response){
           $.toaster(response);
            if(response.priority == 'success'){
                refresh();
            }
        }
      });
    }
  }


 $.UyeDuzenle = function UyeDuzenle(){

        $.ajax({
        url: 'controller/users/user_update.php',
        type: 'POST',
        data :$("#form").serialize(),
        dataType:'json',
        success:function(response){
        $.toaster(response);
        }
      });
    
  }


$.KitapEkle = function KitapEkle(){

    $.ajax({
          url: "controller/books/book_add.php",
          type: "POST",
          data :$("#form").serialize(),
          dataType: 'json',
          success: function(response) {
            $.toaster(response);
            if(response.priority == 'success'){
              document.getElementById("form").reset();
            }
           }
      });

}

$.KitapSil = function KitapSil(id){

    if(confirm("Kitap silmek etmek istiyormusunuz?")){

      $.ajax({
        url: 'controller/books/book_delete.php',
        type: 'POST',
        data :  { "id" : id },
        dataType:'json',
        success:function(response){
          $.toaster(response);
            if(response.priority == 'success'){
                refresh();
            }
        }
      });
    }
}



 $.KitapID = function KitapID(id){

    $('#book_id').attr('value',id);
 }

 $.KitapVer = function KitapVer(){

    $.ajax({
          url: "controller/books/book_user_add.php",
          type: "POST",
          dataType:'json',
          data :$("#form").serialize(),
          success: function(response) {
            $.toaster(response);
           }
      });
 } 


$.KitapDuzenle = function KitapDuzenle(){
   
      $.ajax({
        url: 'controller/books/book_update.php',
        type: 'POST',
        data: $("#form").serialize(),
        dataType:'json',
        success:function(response){
          $.toaster(response);
        }
      });
  }

   $.KitapAl  = function KitapAl(id){

    if(confirm("Kitabı teslim almak istiyormusunuz ?")){

      $.ajax({
        url: 'controller/books/book_user_get.php',
        type: 'POST',
        data :  { "id" : id },
        dataType:'json',
        success:function(response){
          $.toaster(response);
          $("#kul_kitap").load('controller/books/book_user_list.php');
        }
      });

    }
   }

   $.K_KitapDuzenleKaydet  = function K_KitapDuzenleKaydet (){


    $.ajax({
        url: 'controller/books/k_kitapduzenle_kaydet.php',
        type: 'POST',
        data: $("#form").serialize(),
        dataType:'json',
        success:function(response){
          $.toaster(response);
          $("#kul_kitap").load('controller/books/book_user_list.php');
        }
      });


   }

  $.K_KitapDuzenle = function K_KitapDuzenle(id){

        $("#book_id").attr("value",id);

        $.ajax({
        url: 'controller/books/kullanici_kitapduzenle.php',
        type: 'POST',
        data :  { "id" : id },
        dataType:'json',
        success:function(response){

          $("#kitapadi").val(response.book_id);
          $("#adsoyad").val(response.user_id);
          $("#v_date").val(response.ubook_register_date);
          $("#t_date").val(response.delivery_date);
          $("#durum").val(response.userbook_status);
        }
      });

   }

});
