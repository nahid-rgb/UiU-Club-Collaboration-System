$(".verify_user_btn").click(function () {
  var user_id_v = $(this).data("userId");
  var button = this;
  $(button).attr("disabled", true);

  $.ajax({
    url: "php/admin_ajax.php?verify_user",
    method: "post",
    dataType: "json",
    data: { user_id: user_id_v },
    success: function (response) {
      console.log(response);
      if (response.status) {
        $(button).text("Verified");
      } else {
        $(button).attr("disabled", false);
        alert("something is wrong,try again after some time");
      }
    },
  });
});

$(".block_user_btn").click(function () {
  var user_id_v = $(this).data("userId");
  var button = this;
  $(button).attr("disabled", true);

  $.ajax({
    url: "php/admin_ajax.php?block_user",
    method: "post",
    dataType: "json",
    data: { user_id: user_id_v },
    success: function (response) {
      console.log(response);
      if (response.status) {
        $(button).hide();
        $(button).siblings(".unblock_user_btn").show();
        $(button).siblings(".unblock_user_btn").attr("disabled", false);
      } else {
        $(button).attr("disabled", false);
        alert("something is wrong,try again after some time");
      }
    },
  });
});

$(".unblock_user_btn").click(function () {
  var user_id_v = $(this).data("userId");
  var button = this;
  $(button).attr("disabled", true);

  $.ajax({
    url: "php/admin_ajax.php?unblock_user",
    method: "post",
    dataType: "json",
    data: { user_id: user_id_v },
    success: function (response) {
      console.log(response);
      if (response.status) {
        $(button).hide();
        $(button).siblings(".block_user_btn").show();
        $(button).siblings(".block_user_btn").attr("disabled", false);
      } else {
        $(button).attr("disabled", false);
        alert("something is wrong,try again after some time");
      }
    },
  });
});

// $(document).ready(function() {
//   $("#save_changes_btn").click(function() {
//     var club_name = $("#club_name").val();
//     var email = $("#email").val();
//     var club_description = $("#club_description").val();
//     var profile_pic = $("#profile_pic").prop("files")[0];

//     if(club_name == '' || email == '' || club_description == '' || profile_pic == ''){
//       alert('Please fill all fields');
//       return false;
//     }

    
//     var form_data = new FormData();
//     form_data.append("club_name", club_name);
//     form_data.append("email", email);
//     form_data.append("club_description", club_description);
//     form_data.append("profile_pic", profile_pic);

    

//     $.ajax({
//       url: "admin_function.php",
//       type: "POST",
//       data: form_data,
//       contentType: false,
//       processData: false,
//       success: function(data) {
//         // Handle the response from the server
//       }
//     });
    
//   }
//   );
// });

