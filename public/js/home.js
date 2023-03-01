const readmore = document.querySelectorAll('.card-text')

readmore.forEach(element => {

    var text = element.innerHTML.split(' ')
    text.splice(15)

    element.innerHTML = text.join(' ')

});
