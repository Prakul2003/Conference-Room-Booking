const buttons = document.getElementsByTagName("button");
function myFunction() {
  confirm("Confirm the chosen time slot?");
}
function nothing(){

}

for (let button of buttons) {
  button.addEventListener("click", (event)=>ins(event));
}

function ins(event){
    var target = event.target || event.srcElement;
    if (target.className == "invalid"){

    }
    // var date = '<?php echo $date;?>'
    // var conf_room='<?php echo $conf_room;?>'
    // var user_name='B21312'
    // var js_var = '<?php echo $time_slot_var ;?>';
    else{
    var a=target.id
    const date = document.getElementById('date').textContent
    const conf_room = document.getElementById('conf_room').textContent
    const username = document.getElementById('username').textContent
    const designation = document.getElementById('designation').textContent
    
    window.location.href = "http://conferenceroom-b3ddc4hvbnaze7gf.centralindia-01.azurewebsites.net/register_prakul.php?p1=" + a + "&p2=" + date + "&p3=" + conf_room + "&username=" + username + "&designation=" + designation;

    // Delay the redirection to the thank-you page by 1-2 seconds to ensure the first redirect finishes
    // setTimeout(() => {
    //     location.href = "thankyou.html";
    // }, 2000);
    }
}