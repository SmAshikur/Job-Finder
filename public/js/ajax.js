
$.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

$(document).on("submit","#avatarImage", function (e) {
    e.preventDefault();
    let avatafromData= new FormData(this)

    $("#king").show()
    $.ajax({
        type: "post",
        url: "profile/update",
        data: avatafromData,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log(response);
            avatar();
        },error:function(err){
            console.log(err);
            $("#imageErr").html(err.responseJSON.errors.avatar)
        }
    });
});
function avatar(){
    $.ajax({
        type: "GET",
        url: "avatar/get",
        data:"",
        dataType: "json",
        success: function (response) {
           console.log(response);
           $.each(response, function(key,value){
                $("#king").html('<img id="king" src="images/'+value.avatar+'" alt="" height="200px" width="100%">')
                $('#address').html("<b>"+value.address+"</b>")
                $('#mobile').html("<b>"+value.mobile+"</b>")
                $('#exprience').html("<b>"+value.exprience+"</b>")
                $('#bio').html("<b>"+value.bio+"</b>")
           })

        },error:function(err){
            console.log("vul");
        }
    });

}
avatar();
user()

function user(){
    $.ajax({
        type: "GET",
        url: "details/get",
        data:"",
        dataType: "json",
        success: function (response) {
           console.log(response);
           $('#name').html(response)
           $.each(response, function(key,value){
                $('#name').html("<b>"+value.name+"</b>")
                $('#email').html("<b>"+value.email+"</b>")
                $('#cname').html("<b>"+value.name+"</b>")
                $('#cemail').html("<b>"+value.email+"</b>")
           })

        },error:function(err){
            console.log("vul");
        }
    });

}
function company(){
    $.ajax({
        type: "GET",
        url: "manike",
        data:"",
        dataType: "json",
        success: function (response) {
           console.log(response);
           $.each(response, function(key,value){
            $("#ping").html('<img id="ping" src="images/'+value.cover_photo+'" alt="" height="220px" width="100%">')
            $("#ming").html('<img id="ming" src="images/'+value.logo+'" alt="" height="180px" width="100%" >')
            $('#caddress').html("<b>"+value.address+"</b>")
            $('#cmobile').html("<b>"+value.phone+"</b>")
            $('#cdes').html("<b>"+value.description+"</b>")
            $('#cslogan').html("<b>"+value.slogan+"</b>")
            $('#cwebsite').html("<b>"+value.website+"</b>")

       })

        },error:function(err){
            console.log("lol");
        }
    });

}
company()
$(document).on("submit","#profileDetails", function (e) {
    e.preventDefault();
    let detailsfromData= new FormData(this)

    $.ajax({
        type: "post",
        url: "details/update",
        data: detailsfromData,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log(response);
            avatar();

        },error:function(err){
            console.log(err);
            //$().html(err.responseJSON.errors)
        }
    });
});
$(document).on("submit","#coverform", function (e) {
    e.preventDefault();
    let detailsfromData= new FormData(this)

    $.ajax({
        type: "post",
        url: "coverLetter/update",
        data: detailsfromData,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log(response);
            avatar();

        },error:function(err){
            console.log(err);
            //$().html(err.responseJSON.errors)
        }
    });
});
$(document).on("submit","#resumeform", function (e) {
    e.preventDefault();
    let detailsfromData= new FormData(this)

    $.ajax({
        type: "post",
        url: "resume/update",
        data: detailsfromData,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log(response);
            avatar();

        },error:function(err){
            console.log(err);
            //$().html(err.responseJSON.errors)
        }
    });
});

$(document).on("submit","#comProfileDetails", function (e) {
    e.preventDefault();
    let detailsfromData= new FormData(this)
    alert('are u ready')
    $.ajax({
        type: "post",
        url: "bal/update",
        data: detailsfromData,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log(response);
            avatar();
            company();
            user();

        },error:function(err){
            console.log(err);
            //$().html(err.responseJSON.errors)
        }
    });
});
$(document).on("submit","#updateCover", function (e) {
    e.preventDefault();
    let detailsfromData= new FormData(this)

    $.ajax({
        type: "post",
        url: "cover/update",
        data: detailsfromData,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log("Success re vai");
            company();

        },error:function(err){
            console.log(err);
            //$().html(err.responseJSON.errors)
        }
    });
});
$(document).on("submit","#updateLogo", function (e) {
    e.preventDefault();
    let detailsfromData= new FormData(this)

    $.ajax({
        type: "post",
        url: "logo/update",
        data: detailsfromData,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log(response);
            company();

        },error:function(err){
            console.log(err);
            //$().html(err.responseJSON.errors)
        }
    });
});
