let gtrans = document.querySelector('.g-translate');
gtrans.style.visibility = 'hidden';
function showTrans() {
        if (gtrans.style.visibility === 'hidden'){
            gtrans.style.visibility = 'visible';
        }
        else {
            gtrans.style.visibility = 'hidden';
        }
    }