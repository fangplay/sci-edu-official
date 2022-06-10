$(document).ready(function(e){
   $('#selSchool').on('change',function(){
    var school=$(this).val();
    $.ajax({url : 'connect.php',
        type : 'POST',
        data : 'school_id'=+school,
        datatype : 'json',
        success : function(result){
            var obj = jQuery.parseJSON(result);
        }
    });
   }); 
});

$('#btnP').on('click',function(){ // เมื่อ Click ปุ๋ม เพิ่มรายการ
    var selSchool=$('#selSchool'); // ดึงเฉพาะ Element id จังหวัด
    var Num=$('#txtNum').val(); // ค่าจำนวนนับ
    }else{ 
        alert("กรุณาเลือกข้อมูลให้ครบถ้วน");	 // false
    }
});

$('#btnSubmit').click(function(){ // กด Click ปุ่ม Submit
    $('form').submit();	 // Form ทำการส่งค่า
});