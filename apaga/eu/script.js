function marcaHorario(checkbox) {
    var td = checkbox.parentNode;

    if(checkbox.checked) {
        td.classList.add('selected');
    }
    else {
        td.classList.remove('selected');
    }
}