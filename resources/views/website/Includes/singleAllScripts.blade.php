<script>
    $(document).ready(function () {
        $(".register-tab").click(function () {
            $(".register-box").show();
            $(".login-box").hide();
            $(".register-tab").addClass("active");
            $(".login-tab").removeClass("active");
        });
        
        $(".login-tab").click(function () {
            $(".login-box").show();
            $(".register-box").hide();
            $(".login-tab").addClass("active");
            $(".register-tab").removeClass("active");
        });
    });
</script>
<!-- for image preview -->
<script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
                blah2.src = URL.createObjectURL(file)
            }
        }
</script>

<script>
    $(document).ready(function () {
    $("#ConfirmPassword").on('keyup', function(){
     var password = $("#Password").val();
     var confirmPassword = $("#ConfirmPassword").val();
     if (password != confirmPassword)
         $("#CheckPasswordMatch").html("Password does not match !").css("color","red");
     else
         $("#CheckPasswordMatch").html("Password match !").css("color","green");
    });
 });
</script>

<script>
    $(document).ready(function () {
    $("#ConfirmPassword2").on('keyup', function(){
     var password = $("#Password2").val();
     var confirmPassword = $("#ConfirmPassword2").val();
     if (password != confirmPassword)
         $("#CheckPasswordMatch2").html("Password does not match !").css("color","red");
     else
         $("#CheckPasswordMatch2").html("Password match !").css("color","green");
    });
 });
</script>