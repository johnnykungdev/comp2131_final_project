function showWarningBar(warningText) {
  const str = `<div class="notification-bar2">${warningText}</div>`
  $('body').append(str)
  setTimeout(function() {
      $('.notification-bar2').fadeOut(200, function() {
          $(this).remove()
      })
  }, 1000)
}

$(document).ready(function() {
  console.log(localStorage.getItem('crazyKitchen'))
  //return array of objects
  const currentItems = JSON.parse(localStorage.getItem('crazyKitchen'))
  console.log(currentItems)
  
  if (currentItems) {
    currentItems.forEach((item, index) => {
      const itemTr = `         
        <tr>
          <td>${item.amount}</td>
          <td>${item.name}</td>
          <td class="right-align">${item.price * item.amount}</td>
        </tr>
      `
      $('tbody').append(itemTr)
    })
  
    const totalPrice  = currentItems.reduce(function(accu, item) {
      return accu + Number(item.price * item.amount)
    }, 0)
  
    const tax = totalPrice * 0.05
  
    $('tbody').append(`
      <tr>
        <td></td>
        <td class="right-align">Tax</td>
        <td class="right-align">$${tax}</td>
      </tr>
    `)
  
    $('tbody').append(`
      <tr>
        <td></td>
        <td class="right-align">Total</td>
        <td class="right-align">$${totalPrice + tax}</td>
      </tr>
    `)
  }


  $('#goBackButton').click(function() {
    location.href = "./index.php"
  })

  $('#checkoutButton').click(function(event) {
    event.preventDefault()
    const orderInformation = {
      order_id: Number(new Date().getTime()),
      name: $('#name').val(),
      address: $('#address').val(),
      card_number: $('#card-number').val(),
      foodItems: currentItems
    }

    if (!orderInformation.name) {
      showWarningBar('Please enter your name.')
    } else if (!orderInformation.address ) {
      showWarningBar('Please enter your address.')
    } else if (orderInformation.card_number.length !== 16) {
      showWarningBar('Please enter valid credit card number.')
    } else {
      $.ajax({
        type: "POST",
        url: "/postOrder.php",
        data: orderInformation,
        success: function(data) {
          
          if (parseInt(data)) {
            localStorage.removeItem('crazyKitchen')
            location.href = `./complete.php?order_id=${data}`
          }
        },
        error: function(error) {
          showWarningBar(error)
        }
      })
    }




    // location.href = "./complete.php"
  })
})