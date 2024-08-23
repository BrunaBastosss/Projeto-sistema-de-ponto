function maskCPF(i){
    let v = i.value
    i.setAttribute('maxlength', '14')
    i.setAttribute('minlength', '14')
    if (v.length == 3 || v.length == 7) {
            i.value += '.';
        } else if (v.length == 11) {
            i.value += '-';
    }
}

function maskcep(i){
    let v = i.value
    i.setAttribute('maxlength', '9')
    if(v.length == 5){
        i.value += '-'
    }
}