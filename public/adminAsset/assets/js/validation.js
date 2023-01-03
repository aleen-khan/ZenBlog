

//Check Category Name Start
function checkCategoryName(){
    //alert(category);
    var category = $('#category').val();
    var regex=/^[a-z,A-Z, ]{2,15}$/;
    if(regex.test(category)){
        $('#errorMessage').html(' ');
        return true;
    }else{
        $('#errorMessage').html('You can use only 2 to 15 letters')
        return false;
    }
}

$('#category')._keyup(function () {
    var res =checkCategoryName();
    if(res == true){
        //$('#errorMessage').html(' ');
        $('#catBtn').prop('disabled', false);
    }else{
        //$('#errorMessage').html('You can use only 2 to 15 letters')
        $('#catBtn').prop('disabled', true);
    }
})

//Check Category Code Start
function checkCategoryCode(){
    //alert(category);
    var categoryCode = $('#categoryCode').val();
    var regex=/^[a-z,A-Z,0-9, ]{2,15}$/;
    if(regex.test(categoryCode)){
        $('#errorMessageCode').html(' ');
        return true;
    }else{
        $('#errorMessageCode').html('You can use only 2 to 15 letters and numbers')
        return false;
    }
}

$('#categoryCode')._keyup(function () {
    var res =checkCategoryCode();
    if(res == true){
        //$('#errorMessage').html(' ');
        $('#catBtn').prop('disabled', false);
    }else{
        //$('#errorMessage').html('You can use only 2 to 15 letters')
        $('#catBtn').prop('disabled', true);
    }
})

$('#catForm').submit(function () {
    // alert('ok');
    // checkCategoryName();
    // checkCategoryCode();
    if(checkCategoryName() == true && checkCategoryCode() == true){
        $('#catBtn').prop('disabled', false);
    }else{
        $('#catBtn').prop('disabled', true);
    }
})


