let tbody = document.getElementById('tbody');

function cambiarCheck(num) {
    
    const check = tbody.children[num-1].children[2].children[0];
    // console.log(check)
    if(check.checked == true){
        tbody.children[num-1].children[3].children[0].disabled = false;
        tbody.children[num-1].children[4].children[0].disabled = false;
        tbody.children[num-1].children[5].children[0].disabled = false;
        tbody.children[num-1].children[6].children[0].disabled = false;
        tbody.children[num-1].children[7].children[0].className = 'btn btn-block btn-warning';
        tbody.children[num-1].children[7].children[1].className = 'hidden btn btn-block btn-danger';
        // console.log(tbody.children[num-1].children[5].children[0])

    }else{
        tbody.children[num-1].children[3].children[0].disabled = true;
        tbody.children[num-1].children[4].children[0].disabled = true;
        tbody.children[num-1].children[5].children[0].disabled = true;
        tbody.children[num-1].children[6].children[0].disabled = true;
        tbody.children[num-1].children[7].children[0].className = 'hidden btn btn-block btn-warning';
        tbody.children[num-1].children[7].children[1].className = 'btn btn-block btn-danger';

    }


}



