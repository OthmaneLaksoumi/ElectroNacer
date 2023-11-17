let filter = document.getElementById("filter");
let arduino = document.querySelectorAll(".Arduino");
let afficheur = document.querySelectorAll(".Afficheur");
let robot = document.querySelectorAll(".Robot");
let catg = [arduino, afficheur, robot];

filter.addEventListener('change', function () {
    catg.forEach(function (categorie) {
        categorie.forEach(function (pro) {
            pro.style.display = 'none';
        });
    });

    if (filter.value === '0') {
        catg.forEach(function (categorie, i) {
            categorie.forEach(function (pro) {
                pro.style.display = 'block';
            });
        });
    }

    if (Number(filter.value) <= catg.length && Number(filter.value) > 0) {
        catg[Number(filter.value) - 1].forEach(function (pro) {
            pro.style.display = 'block';
        });
    }

    if (filter.value === '4') {
        catg.forEach(function (categorie, i) {
            categorie.forEach(function (pro) {
                let qntMin = pro.querySelector('.qntMin');
                let qntStock = pro.querySelector('.qntStc');
                if (Number(qntMin.innerHTML.match(/\d+/)[0]) >= Number(qntStock.innerHTML.match(/\d+/)[0])) {
                    pro.style.display = 'block';
                }


            });
        });
    }



});
