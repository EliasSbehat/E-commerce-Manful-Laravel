//Show and hide mobile navigation on icon click
const btnMobile = document.getElementById('btnMobile');
const mobileNav = document.getElementById('mobileNav');

btnMobile.addEventListener('click', function(){
  mobileNav.classList.toggle('translate-x-64');
  mobileNav.classList.toggle('translate-x-0');
})


//Quantity according to user input
//Method 1
let num = document.getElementById('quantity');
num.value = 1;
num.addEventListener('input', function(){
  let valAsNumber = parseInt(num.value);
  return valAsNumber;
});
//Method 2
// let input = document.getElementById('quantity');
// input.value = 1
// input.addEventListener('change', quantityChanged)
// function quantityChanged(event){
  //   var input  = event.target
  //   if(isNaN(input.value || input.value <= 0)){
//     input.value = 1
//   }
// }




//Offer countdown logic
// Set the date we're counting down to
// var countDownDate = new Date('Jan 5, 2024 15:37:25').getTime();

// // Update the count down every 1 second
// let x = setInterval(function() {

//   // Get today's date and time
//   let now = new Date().getTime();

//   // Find the distance between now and the count down date
//   let distance = countDownDate - now;

//   // Time calculations for days, hours, minutes and seconds
//   let days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   let seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   // Display the result in the element with id="countdown"
//   document.getElementById('countdown').innerHTML = days + 'd ' + hours + 'h '
//   + minutes + 'm ' + seconds + 's ';

//   // If the count down is finished, write some text
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById('countdown').innerHTML = 'EXPIRED';
//   }
// }, 1000);

//Display success message after user clicks on add to cart button
let messages = document.querySelector('.message');
const addToCartBtn = document.getElementById('addToCart');
addToCartBtn.addEventListener('click', ()=>{
  //Set the text in the p tag inside the div 
  messages.firstElementChild.innerHTML = 'Product Added Successfully!';
  //Remove the hidden class
  messages.classList.remove('hidden');
  //Display the message for 2 seconds
  setTimeout(function(){
    messages.style.display = 'none';
  }, 2000);
})
