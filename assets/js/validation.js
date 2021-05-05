
/*
 * validate Name
 */
function validateName(name) {
//    alert(name);
    var res = '';
    if (name.length != 0) {
        // check length of the name
        if (name.length > 2) {
            var re = /^([A-Za-z\. ]{3,100})$/;
            if (re.test(name) == false) {
                //alert("Please enter the valid email id");
                res = "*Only characters are allowed";
                $(".demo-button").removeAttr("hidden", "");
                $(".submit-button").attr("hidden", "");
            } else {
                res = "";
                $(".submit-button").removeAttr("hidden", "");
                $(".demo-button").attr("hidden", "");
            }
        } else {
            // print error message for invalid length
            res = "*Altleast 3 characters required";
            $(".demo-button").removeAttr("hidden", "");
            $(".submit-button").attr("hidden", "");
        }
    }
    return res;
}

/*
 * validate First Name
 */
function validateFirstName(name) {
    res = validateName(name);
    if(res === ''){
        $(".fname-validation").parent('div').children('input').css('border', '1px solid rgb(118, 118, 118)');
    } else {
        $(".fname-validation").parent('div').children('input').css('border', '2px solid red');
    }
    $(".fname-validation").html(res);
    return res;
}

/*
 * validate Last Name
 */
function validateLastName(name) {
    res = validateName(name);
    if(res === ''){
        $(".lname-validation").parent('div').children('input').css('border', '1px solid rgb(118, 118, 118)');
    } else {
        $(".lname-validation").parent('div').children('input').css('border', '2px solid red');
    }
    $(".lname-validation").html(res);
    return res;
}
