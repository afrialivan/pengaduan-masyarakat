const readmore = document.querySelectorAll('.readmore')

readmore.forEach(element => {

    var paragraf = element.previousElementSibling.innerHTML
    var text = element.previousElementSibling.innerHTML.split(' ')
    text.splice(80)

    if(text.length < 80) {
        element.classList.add('d-none')
    }


    element.previousElementSibling.innerHTML = text.join(' ')

    var toggle = true
    element.onclick = () => {
        toggle = !toggle

        if (toggle) {
            element.innerHTML = 'Lihat semua'
            element.previousElementSibling.innerHTML = text.join(' ')
        }
        else {
            element.innerHTML = 'Tutup'
            element.previousElementSibling.innerHTML = paragraf
        }

    }

});

const foto = document.querySelectorAll('.foto-kejadian')

foto.forEach(a => {
    var gambar = a.src.split('public/img/')
    gambar.join('')
    a.src = '../../storage/img/' +  gambar[1]
});
