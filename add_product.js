// Giovani Bergamasco
// 4/18/2024
// IT - 202 002
// Phase 5 Assignment: Read SQL Data with PHP and JavaScript
// glb7@njit.edu  
$(document).ready( () => {
    $("#code").focus();

    $("#add_product_form").submit( (event) => {
        let isValid = true;
        const code = $("#code").val();
        const name = $("#name").val();
        const description = $("#description").val(); 
        const price = $("#price").val();

        if(code == "") {
            $("#code_span").text("This field is required.");
            isValid = false;
        } else if(code.length < 4){
            $("#code_span").text("Code should be at least 4 characters.");
            isValid = false;
        } else if(code.length > 10){
            $("#code_span").text("Code should be at most 10 characters.");
            isValid = false;
        } else{
            $("#code_span").text("");
        }

        if(name == "") {
            $("#name_span").text("This field is required.");
            isValid = false;
        } else if(name.length < 10){
            $("#name_span").text("Name should be at least 10 characters.");
            isValid = false;
        } else if(code.length > 100){
            $("#name_span").text("Name should be at most 100 characters.");
            isValid = false;
        } else{
            $("#name_span").text("");
        }

        if(description == "") {
            $("#description_span").text("This field is required.");
            isValid = false;
        } else if(description.length < 10){
            $("#description_span").text("Description should be at least 10 characters.");
            isValid = false;
        } else if(code.length > 255){
            $("#description_span").text("Description should be at most 255 characters.");
            isValid = false;
        } else{
            $("#description_span").text("");
        }

        if(price == "") {
            $("#price_span").text("This field is required.");
            isValid = false;
        } else if(price < 0){
            $("#price_span").text("Price should be greater than $0.00.");
            isValid = false;
        } else if(price > 100000){
            $("#price_span").text("Price should not be greater than $100,000.");
            isValid = false;
        } else{
            $("#price_span").text("");
        }

        if(isValid == false) {
            event.preventDefault();
        }
    });
});