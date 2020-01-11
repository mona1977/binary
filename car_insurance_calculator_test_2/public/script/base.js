/**
Developer : Surendra Gupta
Date : 6-JAN-2019
Objective :  Validate price between 100 and 100000
 */
function carPriceValidation(price) { 
    if(price < 100 || price > 100000) { 
        return false;
    }

    return true;
}

/**
Date : 6-JAN-2019
Objective :  Validate all condition of form
 */
function validate(form) { 
    
    if(carPriceValidation(parseInt(form.carValue.value)) == false) {
        form.carValue.style.borderColor = "red";
        return false;
    }

    return true;
}