//Display greeting according to time of day(Admin)
let greeting = document.getElementById('greeting');
var now = new Date();
var hrs = now.getHours();
var msg = "";

if (hrs >  4) msg = "Good morning";      // After 5am
if (hrs > 12) msg = "Good afternoon";    // After 12pm
if (hrs > 17) msg = "Good evening";      // After 5pm
if (hrs > 22 || hrs >= 0) msg = "Have a good night"; //After 10pm
greeting.innerText = msg;

//Show and hide mobile navigation on icon click(User)
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




