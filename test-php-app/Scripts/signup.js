$(document).ready(function () {
  $("#submitRegisterForm").on("submit", function (e) {
    e.preventDefault();
    let name = $("#name").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let confirm_password = $("#confirm_password").val();
    let isError = true;
    //firstly do the client side validation before make the ajax call to store data
    if (!isEmpty(name)) {
      isError = false;
      $("#name_error").html("Name field is required!!");
    } else {
      $("#name_error").html("");
    }
    if (!isEmail(email)) {
      isError = false;
      $("#email_error").html("Enter Valid Email Address!!!");
    } else {
      $("#email_error").html("");
    }
    if (!isEmpty(password)) {
      isError = false;
      $("#password_error").html("Password field is required!!");
    } else {
      $("#password_error").html("");
      if (!passwordMatch(password, confirm_password)) {
        isError = false;
        $("#password_error").html("Password does not match!!");
      } else {
        $("#password_error").html("");
      }
    }
    //if there is no error then make the ajax call
    if (isError) {
      $.ajax({
        url: "../Controller/singupController.php",
        type: "POST",
        dataType: "json",
        data: {
          name: name,
          email: email,
          password: password,
          confirm_password: confirm_password,
        },
        beforeSend: function () {
          $("button[type='submit']").prop("disabled", true);
          $("#errorAlert").hide();
        },
        success: function (r) {
          $("button[type='submit']").prop("disabled", false);
          $("#errorAlert").show();
          if (r.msg === "success") {
            $("#errorAlert").removeClass("alert-danger");
            $("#errorAlert").addClass("alert-success");
            $("#showError").html(r.data);
          } else {
            $("#errorAlert").removeClass("alert-success");
            $("#errorAlert").addClass("alert-danger");
            $("#showError").html(r.data);
          }
        },
      });
    }
  });

  //check if the input is empty
  function isEmpty(value) {
    let valid = true;
    if (value.trim().length === 0) {
      valid = false;
    }
    return valid;
  }

  //email validation function
  function isEmail(value) {
    return /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(
      value
    );
  }
  // check if the passwords are matching
  function passwordMatch(pass, confirmPass) {
    return pass === confirmPass;
  }
});
