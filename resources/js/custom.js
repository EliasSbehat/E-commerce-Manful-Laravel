//Show and hide mobile navigation on icon click(User)
const btnMobile = document.getElementById('btnMobile');
const mobileNav = document.getElementById('mobileNav');

btnMobile.addEventListener('click', function(){
  mobileNav.classList.toggle('translate-x-64');
  mobileNav.classList.toggle('translate-x-0');
})


//Quantity according to user input
//Method 1
// let num = document.getElementById('quantity');
// num.value = 1;
// num.addEventListener('input', function(){
//   let valAsNumber = parseInt(num.value);
//   return valAsNumber;
// });




