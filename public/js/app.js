function removeItem(id)
{
    let xhr = new XMLHttpRequest();
    let formData = new FormData();

    formData.append("id", id);

    xhr.open("DELETE", '/delete', true);
    xhr.send(formData);
    location.reload();
}

let element = document.getElementById('phone');
let maskOptions = {
    mask: '+7 (000) 000-00-00',
    lazy: false
};

let mask = new IMask(element, maskOptions);

