function deleteRow(table, userid, id, path) {
    const data = new XMLHttpRequest();
    data.onload = (data => {
        document.getElementById(path).style.display = 'none';
    });
    data.open("get", `./php/api.php?t=${table}&uid=${userid}&id=${id}`);
    data.send();
}

function addCart(name, url, price, quantity, userid, id, path) {
    if (userid != null) {
        if (document.getElementById("qunatValue")) {
        quantity = document.getElementById("qunatValue").value;
    }
    
    const data = new XMLHttpRequest();
    data.onload = (data => {
        const a = document.querySelector("#cartCount");
        a.innerText = Number(a.innerText) + 1;
       document.getElementById(path).innerText = "Cart Added";
    });
    data.open("get", `./php/api.php?name=${name}&url=${url}&price=${price}&quantity=${quantity}&userid=${userid}&id=${id}`);
    data.send();
    }
    
}

function addWishList(name, url, price, userid,id,status,path) {
     if (userid != null) {
         const data = new XMLHttpRequest();
    data.onload = (data => {
       document.getElementById(path).innerText = "Wishlist Added";
    });
    data.open("get", `./php/api.php?name=${name}&url=${url}&price=${price}&userid=${userid}&id=${id}&status=${status}`);
    data.send();
    }
   
}

function addValue(table, userid, id, path) {
    var a = document.getElementById(path).value;
    if (Number(a)) {
    const data = new XMLHttpRequest();
    data.open("get", `./php/api.php?table=${table}&userid=${userid}&id=${id}&a=${Number(a.trim())}`);
    data.send();
    }
   
}
