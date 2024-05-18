function DateValidation(itemId, MinDate = null, MaxDate = null) {
    
    if (!MaxDate) {
        MaxDate = new Date().toISOString().split('T')[0];
    }

    if (!MinDate) {
        MinDate = new Date().toISOString().split('T')[0];
    }

    document.getElementById(itemId).setAttribute("max", MaxDate);
    document.getElementById(itemId).setAttribute("min", MinDate);
}
