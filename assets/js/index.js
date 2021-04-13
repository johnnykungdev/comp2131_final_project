function showBar(item, amount) {
    const str = `<div class="notification-bar">You added of ${amount} of ${item}</div>`
    $('body').append(str)
    setTimeout(function() {
        $('.notification-bar').fadeOut(200, function() {
            $(this).remove()
        })
    }, 1000)
}

$(document).ready(function() {

    $('#checkout').click(function() {
        if (localStorage.getItem('crazyKitchen')) {
            location.href = "./checkout.php"
        } else {
            const str = `<div class="notification-bar1">Add Something To The Cart.</div>`
            $('body').append(str)
            setTimeout(function() {
                $('.notification-bar1').fadeOut(200, function() {
                    $(this).remove()
                })
            }, 1000)
        }
    })

    $('.add-food').map(function() {
        $(this).click(function(e) {
            const id = e.target.id
            const name = $(this).parent().prev().html()

            const amount = Number($(this).prev().children().children('select').val())
            const price = $(this).prev().prev().attr('id')
            if (localStorage.getItem('crazyKitchen')) {
                const currentItems = JSON.parse(localStorage.getItem('crazyKitchen'))

                if (currentItems.filter(item => Number(item.id) === Number(id)).length) {
                    const matchedResultIndex = currentItems.findIndex(item => item.id === id)

                    currentItems[matchedResultIndex].amount  = Number(currentItems[matchedResultIndex].amount) + Number(amount)
                    // primitive, reference
                } else {
                    currentItems.push({
                        id,
                        name,
                        amount,
                        price   
                    })
                }
                localStorage.setItem('crazyKitchen', JSON.stringify(currentItems))
            } else {
                localStorage.setItem('crazyKitchen', JSON.stringify([{
                    id,
                    name,
                    amount,
                    price
                }]))
            }
            $(this).prev().children().children('select').val(1)
            /** 
             * store order in localStorage using JSON
             * 
             */
        })
    })
})