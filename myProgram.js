const url = "http://localhost:81/mySite/GitHub/CRUD-Operations-in-PHP-Using-MySQL/customers/main.php";

$(document).ready(function () {
    // Call Function

});


$.getJSON(url, function (response) {
    data = response.data;

    combine = '';
    data.forEach(element => {
        console.log(element.name);
        combine += '<tr>' +
            '<td>' + element.name + '</td>' +
            '<td>' + element.email + '</td>' +
            '<td>' + element.phone + '</td>' +
            '<td class="text-warning bi bi-pencil-square"> Edit</td>' +
            '<td class="text-danger bi bi-trash3"> Delete</td>' +
            '</tr>';
    });
    $('#data').html(combine);




});



function mypostForm() {
    let x = document.getElementById('custumForm').style.display;
    if (x === 'none') {
        document.getElementById('custumForm').style.display = 'block';
    } else {
        document.getElementById('custumForm').style.display = 'none';
    }

}


function DelFun() {
    alert('Delete data!')
}

